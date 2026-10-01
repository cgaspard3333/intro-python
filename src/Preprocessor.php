<?php

namespace Cours;

/**
 * Prépare les sources RST destinées à un groupe.
 *
 * Deux façons de faire varier une page d'un groupe à l'autre :
 *
 * 1. Des blocs dans un fichier commun
 *
 *        .. GROUPE A
 *        contenu envoyé au groupe A
 *        .. GROUPE B
 *        contenu envoyé au groupe B
 *        .. FIN GROUPE
 *
 *    Un bloc peut viser plusieurs groupes : « .. GROUPE A,B ». Ce qui est
 *    écrit en dehors des marqueurs part dans tous les groupes.
 *
 * 2. Un fichier entier : « chap3.groupeB.rst » remplace « chap3.rst » pour le
 *    groupe B, et pour lui seul.
 *
 * 3. Une page entière reprise dans une autre
 *
 *        .. INCLURE chap2 +3
 *
 *    insère à cet endroit le contenu de « pages/chap2.rst », filtré pour le
 *    même groupe. Le « +3 » décale la numérotation de ses titres : « 1. »
 *    devient « 4. », « 2.1 » devient « 5.1 ». Seuls les titres sont touchés —
 *    un « 2.1 » au fil d'une phrase ne bouge pas.
 *
 * Pour mettre un passage de côté sans le supprimer, quel que soit le groupe :
 *
 *        .. MASQUER
 *        pas encore publié
 *        .. FIN MASQUER
 *
 *    Rien de ce qui est encadré n'est lu : les marqueurs de groupe qui s'y
 *    trouvent sont eux-mêmes mis de côté, et le passage revient en retirant
 *    les deux lignes.
 *
 * S'y ajoute le sommaire : un groupe dont la configuration donne une liste de
 * pages ne voit que celles-là. Les entrées de « .. toctree:: » qui n'y sont
 * pas sont retirées, et les pages correspondantes ne sont donc pas
 * construites — le moteur ne suit que ce qui est au sommaire.
 *
 * Les lignes retirées sont remplacées par des lignes vides : les numéros de
 * ligne des messages d'erreur restent ceux du fichier que vous éditez.
 */
class Preprocessor
{
    const OPEN = '/^\s*\.\.\s+GROUPE\s+([A-Za-z0-9]+(?:\s*[,+]\s*[A-Za-z0-9]+)*)\s*$/i';
    const CLOSE = '/^\s*\.\.\s+(?:FIN\s+GROUPE|GROUPE\s+TOUS)\s*$/i';
    const TOC = '/^(\s*)\.\.\s+toctree::/';
    const HIDE = '/^\s*\.\.\s+MASQUER\s*$/i';
    const SHOW = '/^\s*\.\.\s+FIN\s+MASQUER\s*$/i';
    const INCLUDE = '/^\s*\.\.\s+INCLURE\s+([A-Za-z0-9_.\-]+)(?:\s*\+\s*([0-9]+))?\s*$/i';

    private $source;
    private $known;
    private $warnings = array();

    /**
     * $known : les identifiants de groupe qui existent. Un marqueur qui en
     * nomme un autre est signalé — sans quoi « .. GROUPE B » mal orthographié
     * ferait disparaître un passage sans rien dire.
     */
    public function __construct($source, array $known = array())
    {
        $this->source = rtrim($source, '/');
        $this->known = $known;
    }

    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
     * Écrit dans $target les sources du groupe $group — un élément de la liste
     * « groups » de site.php — et renvoie le nombre de fichiers dont le
     * contenu a changé depuis la dernière fois.
     */
    public function prepare(array $group, $target)
    {
        $target = rtrim($target, '/');

        if (!is_dir($target)) {
            mkdir($target, 0755, true);
        }

        $changed = 0;
        $expected = array();

        foreach ($this->collect($group['id']) as $name => $path) {
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

            if (preg_match('/^(.+)\.groupe([A-Za-z0-9]+)$/i', $base, $match)) {
                if ($this->same($match[2], $group)) {
                    $overrides[$match[1]] = $path;
                }
                continue;
            }

            $files[$base] = $path;
        }

        return array_merge($files, $overrides);
    }

    /**
     * Retire d'un contenu RST ce qui ne revient pas à ce groupe : les blocs
     * réservés aux autres, et les entrées de sommaire qu'il ne reçoit pas.
     */
    private function filter($contents, array $group, $path, array $stack = array())
    {
        $published = isset($group['pages']) ? $group['pages'] : null;
        $lines = preg_split("/\r\n|\n|\r/", $contents);
        $active = null;
        $openedAt = null;
        $aside = null;
        $toc = null;
        $out = array();

        foreach ($lines as $number => $line) {
            if (preg_match(self::HIDE, $line)) {
                $aside = $number + 1;
                $out[] = '';
                continue;
            }

            if (preg_match(self::SHOW, $line)) {
                $aside = null;
                $out[] = '';
                continue;
            }

            // Ce qui est mis de côté est opaque : même les marqueurs de
            // groupe qui s'y trouvent restent lettre morte.
            if ($aside !== null) {
                $out[] = '';
                continue;
            }

            if (preg_match(self::OPEN, $line, $match)) {
                $active = preg_split('/\s*[,+]\s*/', $match[1]);
                $openedAt = $number + 1;
                $this->checkNames($active, $path, $openedAt);
                $out[] = '';
                continue;
            }

            if (preg_match(self::CLOSE, $line)) {
                $active = null;
                $openedAt = null;
                $out[] = '';
                continue;
            }

            // Un bloc ouvert pour d'autres groupes : la ligne ne part pas.
            $keep = $active === null || $this->targets($active, $group['id']);

            if (preg_match(self::TOC, $line, $match)) {
                $toc = strlen($match[1]);
            } elseif ($toc !== null && trim($line) !== '') {
                if (strlen($line) - strlen(ltrim($line)) <= $toc) {
                    // Désindenté : le sommaire est fini.
                    $toc = null;
                } elseif ($published !== null && !in_array(trim($line), $published, true)) {
                    $keep = false;
                }
            }

            if ($keep && preg_match(self::INCLUDE, $line, $match)) {
                $included = $this->inclusion($match[1], $group, $match, $stack, $path);

                foreach ($included as $one) {
                    $out[] = $one;
                }

                continue;
            }

            $out[] = $keep ? $line : '';
        }

        if ($active !== null) {
            $this->warnings[] = basename($path).' : bloc « .. GROUPE » ouvert ligne '
                .$openedAt.' et jamais refermé par « .. FIN GROUPE ».';
        }

        if ($aside !== null) {
            $this->warnings[] = basename($path).' : bloc « .. MASQUER » ouvert ligne '
                .$aside.' et jamais refermé par « .. FIN MASQUER ».';
        }

        return implode("\n", $out);
    }

    /**
     * Le contenu d'une page reprise dans une autre, sous forme de lignes.
     *
     * Attention : le fichier d'accueil gagne des lignes à cet endroit. Les
     * numéros de ligne de ses messages d'erreur ne correspondent plus au
     * fichier que vous éditez au-delà du point d'inclusion — raison de plus
     * pour inclure en fin de page.
     */
    private function inclusion($page, array $group, array $match, array $stack, $path)
    {
        $source = $this->source.'/'.$page.'.rst';

        if (in_array($page, $stack, true)) {
            $this->warnings[] = basename($path).' : « .. INCLURE '.$page
                .' » tourne en rond ; elle est ignorée.';

            return array('');
        }

        if (!file_exists($source)) {
            $this->warnings[] = basename($path).' : « .. INCLURE '.$page
                .' » ne trouve pas pages/'.$page.'.rst.';

            return array('');
        }

        $stack[] = $page;
        $contents = $this->filter(file_get_contents($source), $group, $source, $stack);
        $offset = isset($match[2]) ? (int) $match[2] : 0;

        if ($offset) {
            $contents = $this->renumber($contents, $offset);
        }

        // Une ligne vide de part et d'autre : le contenu inclus ne se colle
        // pas au paragraphe qui le précède.
        return array_merge(array(''), preg_split("/\n/", $contents), array(''));
    }

    /**
     * Décale la numérotation des titres d'un contenu.
     *
     * Un titre, en RST, c'est une ligne suivie d'un soulignement. S'en tenir à
     * ces lignes-là évite de toucher au « 2.1 » d'une phrase ou d'un bloc de
     * code.
     */
    private function renumber($contents, $offset)
    {
        return preg_replace_callback(
            '/^([^\n]*)\n([-=~^]{2,}[ \t]*)$/m',
            function ($heading) use ($offset) {
                // Le numéro ouvre le titre, éventuellement derrière un emoji :
                // « 📖 2. Les boucles », « 2.1 La boucle for ». Un titre qui
                // commence par un mot — « Chapitre 2 » — n'est pas numéroté.
                $title = preg_replace_callback(
                    '/^([^\p{L}\d\n]*)(\d+)/u',
                    function ($number) use ($offset) {
                        return $number[1].($number[2] + $offset);
                    },
                    $heading[1],
                    1
                );

                return $title."\n".$heading[2];
            },
            $contents
        );
    }

    /**
     * Signale un marqueur qui nomme un groupe inconnu.
     */
    private function checkNames(array $wanted, $path, $line)
    {
        if (!$this->known) {
            return;
        }

        foreach ($wanted as $one) {
            if ($this->targets($this->known, $one)) {
                continue;
            }

            $this->warnings[] = basename($path).' ligne '.$line.' : « .. GROUPE '
                .trim($one).' » ne désigne aucun groupe ; le passage ne part nulle part.';
        }
    }

    /**
     * Le groupe fait-il partie de ceux que vise un marqueur ?
     */
    private function targets(array $wanted, $group)
    {
        foreach ($wanted as $one) {
            if ($this->same($one, $group)) {
                return true;
            }
        }

        return false;
    }

    /**
     * « b », « B » et « groupeB » désignent le même groupe : les identifiants
     * se comparent sans tenir compte de la casse.
     */
    private function same($one, $other)
    {
        return strcasecmp(trim((string) $one), trim((string) $other)) === 0;
    }
}
