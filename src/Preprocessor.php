<?php

namespace Cours;

/**
 * Prépare les sources RST destinées à un groupe.
 *
 * Deux façons de faire varier une page d'un groupe à l'autre :
 *
 * 1. Des blocs dans un fichier commun
 *
 *        .. GROUPE 1
 *        contenu envoyé au groupe 1
 *        .. GROUPE 2
 *        contenu envoyé au groupe 2
 *        .. FIN GROUPE
 *
 *    Un bloc peut viser plusieurs groupes : « .. GROUPE 1,2 ». Ce qui est
 *    écrit en dehors des marqueurs part dans tous les groupes.
 *
 * 2. Un fichier entier : « chap3.groupe2.rst » remplace « chap3.rst » pour le
 *    groupe 2, et pour lui seul.
 *
 * Les lignes retirées sont remplacées par des lignes vides : les numéros de
 * ligne des messages d'erreur restent ceux du fichier que vous éditez.
 */
class Preprocessor
{
    const OPEN = '/^\s*\.\.\s+GROUPE\s+([0-9]+(?:\s*[,+]\s*[0-9]+)*)\s*$/i';
    const CLOSE = '/^\s*\.\.\s+(?:FIN\s+GROUPE|GROUPE\s+TOUS)\s*$/i';

    private $source;
    private $warnings = array();

    public function __construct($source)
    {
        $this->source = rtrim($source, '/');
    }

    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
     * Écrit dans $target les sources du groupe $group, et renvoie le nombre de
     * fichiers dont le contenu a changé depuis la dernière fois.
     */
    public function prepare($group, $target)
    {
        $target = rtrim($target, '/');

        if (!is_dir($target)) {
            mkdir($target, 0755, true);
        }

        $changed = 0;
        $expected = array();

        foreach ($this->collect($group) as $name => $path) {
            $contents = $this->filter(file_get_contents($path), $group, $path);
            $file = $target.'/'.$name.'.rst';
            $expected[$file] = true;

            if (!file_exists($file) || file_get_contents($file) !== $contents) {
                file_put_contents($file, $contents);
                $changed++;
            }
        }

        // Une page supprimée (ou devenue propre à l'autre groupe) ne doit pas
        // survivre dans le cache.
        foreach (glob($target.'/*.rst') as $file) {
            if (!isset($expected[$file])) {
                unlink($file);
                $changed++;
            }
        }

        return $changed;
    }

    /**
     * Noms des pages dont dispose un groupe.
     */
    public function pages($group)
    {
        return array_keys($this->collect($group));
    }

    /**
     * Liste des pages du groupe, sous la forme « nom de page » => « fichier ».
     */
    private function collect($group)
    {
        $files = array();
        $overrides = array();

        foreach (glob($this->source.'/*.rst') as $path) {
            $base = basename($path, '.rst');

            if (preg_match('/^(.+)\.groupe([0-9]+)$/i', $base, $match)) {
                if ((int) $match[2] === (int) $group) {
                    $overrides[$match[1]] = $path;
                }
                continue;
            }

            $files[$base] = $path;
        }

        return array_merge($files, $overrides);
    }

    /**
     * Retire d'un contenu RST les blocs réservés aux autres groupes.
     */
    private function filter($contents, $group, $path)
    {
        $lines = preg_split("/\r\n|\n|\r/", $contents);
        $active = null;
        $openedAt = null;
        $out = array();

        foreach ($lines as $number => $line) {
            if (preg_match(self::OPEN, $line, $match)) {
                $active = array_map('intval', preg_split('/\s*[,+]\s*/', $match[1]));
                $openedAt = $number + 1;
                $out[] = '';
                continue;
            }

            if (preg_match(self::CLOSE, $line)) {
                $active = null;
                $openedAt = null;
                $out[] = '';
                continue;
            }

            $out[] = ($active === null || in_array((int) $group, $active, true)) ? $line : '';
        }

        if ($active !== null) {
            $this->warnings[] = basename($path).' : bloc « .. GROUPE » ouvert ligne '
                .$openedAt.' et jamais refermé par « .. FIN GROUPE ».';
        }

        return implode("\n", $out);
    }
}
