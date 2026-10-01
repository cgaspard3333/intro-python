<?php

namespace Cours;

use Gregwar\RST\Builder;
use Gregwar\RST\Nodes\RawNode;

/**
 * Construit le site d'un groupe : un dossier autonome dans web/.
 */
class Site extends Builder
{
    private $root;
    private $config;
    private $group;

    public function __construct($root, array $config, array $group)
    {
        parent::__construct(new Kernel);

        $this->root = rtrim($root, '/');
        $this->config = $config;
        $this->group = $group;
    }

    public function build($directory, $targetDirectory = 'output', $verbose = true)
    {
        $this->invalidateOnLayoutChange();
        $this->registerAssets();
        $this->addHook(array($this, 'decorate'));

        parent::build($directory, $targetDirectory, $verbose);

        $this->injectNavigation($targetDirectory);
        $this->writeSearchIndex($targetDirectory);
    }

    /**
     * Le moteur ne régénère que les pages dont le .rst a bougé. Si un gabarit,
     * la configuration ou le code de construction change, tout doit être
     * régénéré : on jette alors le cache de métadonnées.
     */
    private function invalidateOnLayoutChange()
    {
        $material = json_encode(array($this->config, $this->group));

        $sources = array_merge(
            glob($this->root.'/themes/layout/*.html'),
            glob($this->root.'/src/*.php'),
            glob($this->root.'/src/Nodes/*.php')
        );

        foreach ($sources as $source) {
            $material .= file_get_contents($source);
        }

        $stamp = dirname($this->getMetaFile()).'/gabarit-'.$this->group['slug'].'.md5';
        $current = md5($material);

        if (!file_exists($stamp) || file_get_contents($stamp) !== $current) {
            @unlink($this->getMetaFile());
            file_put_contents($stamp, $current);
        }
    }

    /**
     * Les métadonnées de build sont un fichier de travail : elles restent
     * hors de web/.
     */
    protected function getMetaFile()
    {
        $directory = $this->root.'/.build/cache';

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        return $directory.'/meta-'.$this->group['slug'].'.php';
    }

    /**
     * Les feuilles de style, scripts et polices sont partagés par les deux
     * groupes : ils vivent dans web/assets/, écrits une seule fois par
     * build.php. Ne restent ici que les fichiers propres au groupe.
     */
    private function registerAssets()
    {
        $this
            ->copy($this->root.'/pages/images', 'images')
            ->mkdir('files')
            ->copy($this->root.'/files/*.zip', 'files/')
        ;
    }

    /**
     * Habille un document : en-tête, bandeau, pied de page.
     */
    public function decorate($document)
    {
        $environment = $document->getEnvironment();
        $page = $environment->getUrl();

        $title = $document->getTitle();
        $title = $title ? $title.' — '.$this->config['shortTitle'] : $this->config['title'];

        $replacements = array(
            '{{title}}' => htmlspecialchars($title),
            '{{root}}' => '../',
            '{{contentsClass}}' => $page === $this->getIndexName() ? 'contents is-home' : 'contents',
            '{{mathjax}}' => $this->mathjax($page),
            '{{home}}' => $environment->relativeUrl('/index.html'),
            '{{shortTitle}}' => htmlspecialchars($this->config['shortTitle']),
            '{{settings}}' => file_get_contents($this->root.'/themes/layout/settings.html'),
            '{{groupId}}' => $this->group['id'],
            '{{groupLabel}}' => htmlspecialchars($this->group['label']),
            '{{chooser}}' => '../index.html',
            '{{teachers}}' => $this->teachers(),
            '{{moodle}}' => htmlspecialchars($this->config['moodle']),
        );

        $document->addHeaderNode(new RawNode($this->template('head.html', $replacements)));
        $document->prependNode(new RawNode($this->template('top.html', $replacements)));
        $document->addNode(new Nodes\BrowserNode($environment));
        $document->addNode(new RawNode($this->template('bottom.html', $replacements)));
    }

    /**
     * MathJax pèse deux mégaoctets : on ne le charge que sur les pages qui
     * contiennent réellement des formules.
     */
    private function mathjax($page)
    {
        $source = $this->getRST($page);

        if (!file_exists($source)) {
            return '';
        }

        $contents = file_get_contents($source);

        if (strpos($contents, '$$') === false && strpos($contents, '.. math::') === false) {
            return '';
        }

        return '<script defer src="../assets/mathjax/tex-svg.js"></script>';
    }

    private function template($name, array $replacements)
    {
        $contents = file_get_contents($this->root.'/themes/layout/'.$name);

        return strtr($contents, $replacements);
    }

    private function teachers()
    {
        $parts = array();

        foreach ($this->config['teachers'] as $teacher) {
            $parts[] = '<a href="mailto:'.htmlspecialchars($teacher['mail']).'">'
                .htmlspecialchars($teacher['name']).'</a>';
        }

        return implode(' · ', $parts);
    }

    /**
     * Le sommaire latéral a besoin des titres de toutes les pages : il n'est
     * connu qu'une fois tout le site parcouru.
     */
    private function injectNavigation($targetDirectory)
    {
        $entries = $this->navigationEntries();

        foreach (glob($targetDirectory.'/*.html') as $file) {
            $contents = file_get_contents($file);

            // Le moteur écrit un « <html> » nu. La langue sert aux lecteurs
            // d'écran, et la césure du texte justifié en dépend.
            $contents = str_replace("<html>\n", "<html lang=\"fr\">\n", $contents);

            $navigation = '<!--NAV:START-->'.$this->renderNavigation($entries, basename($file)).'<!--NAV:END-->';

            // Un remplacement par fonction : le sommaire peut contenir
            // n'importe quel caractère sans être pris pour une référence.
            $updated = preg_replace_callback(
                '/<!--NAV:START-->.*?<!--NAV:END-->/s',
                function () use ($navigation) { return $navigation; },
                $contents
            );

            // Sans cette garde, un échec du remplacement viderait la page.
            if ($updated === null) {
                $this->errorManager->error('Sommaire : remplacement impossible dans '.basename($file));
                continue;
            }

            file_put_contents($file, $updated);
        }
    }

    /**
     * L'index de recherche.
     *
     * Le site est publié sur GitHub Pages : il n'y a pas de serveur pour
     * chercher. On écrit donc un fichier que le navigateur télécharge à la
     * première recherche, une entrée par section de niveau 2.
     */
    private function writeSearchIndex($targetDirectory)
    {
        $index = array();

        foreach (glob($targetDirectory.'/*.html') as $file) {
            $page = basename($file);
            $meta = $this->metas->get(pathinfo($page, PATHINFO_FILENAME));
            $body = $this->bodyOf(file_get_contents($file));

            if ($body === null) {
                continue;
            }

            foreach ($this->sectionsOf($body) as $section) {
                if ($section['text'] === '') {
                    continue;
                }

                $index[] = array(
                    'u' => $page.($section['anchor'] ? '#'.$section['anchor'] : ''),
                    'p' => $meta ? $this->plainText($meta['title']) : $page,
                    's' => $section['title'],
                    'x' => $section['text'],
                );
            }
        }

        file_put_contents(
            $targetDirectory.'/recherche.json',
            json_encode($index, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );
    }

    /**
     * Le contenu de la page, sans le bandeau ni le sommaire.
     */
    private function bodyOf($html)
    {
        $start = strpos($html, '<div class="contents');
        $end = strpos($html, '</div><!-- /contents -->');

        if ($start === false || $end === false || $end < $start) {
            return null;
        }

        return substr($html, $start, $end - $start);
    }

    /**
     * Découpe une page en sections de niveau 2, avec leur ancre et leur texte.
     */
    private function sectionsOf($body)
    {
        $parts = preg_split(
            '/<a id="(title\.1\.[0-9]+)"><\/a>\s*<h2[^>]*>(.*?)<\/h2>/s',
            $body,
            -1,
            PREG_SPLIT_DELIM_CAPTURE
        );

        $sections = array(array('anchor' => '', 'title' => '', 'text' => $this->plainText($parts[0])));

        for ($i = 1; $i < count($parts); $i += 3) {
            $sections[] = array(
                'anchor' => $parts[$i],
                'title' => $this->plainText($parts[$i + 1]),
                'text' => $this->plainText(isset($parts[$i + 2]) ? $parts[$i + 2] : ''),
            );
        }

        return $sections;
    }

    private function plainText($html)
    {
        $text = preg_replace('/\s+/u', ' ', strip_tags($html));
        $text = trim(html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8'));

        // Une section très longue n'apporte plus rien à la recherche passé un
        // certain point, et alourdirait le téléchargement.
        return mb_substr($text, 0, 4000);
    }

    private function navigationEntries()
    {
        $index = $this->metas->get($this->getIndexName());

        if (!$index) {
            return array();
        }

        // L'accueil n'est pas un chapitre : pas d'avancement à afficher.
        $entries = array(array(
            'url' => $index['url'],
            'title' => 'Accueil du cours',
            'titles' => array(),
            'children' => array(),
            'progress' => false,
        ));

        foreach ($index['tocs'] as $toc) {
            foreach ($toc as $file) {
                $meta = $this->metas->get($file);

                if (!$meta) {
                    continue;
                }

                $children = array();

                foreach ($meta['tocs'] as $childToc) {
                    foreach ($childToc as $childFile) {
                        $child = $this->metas->get($childFile);

                        if ($child) {
                            $children[] = array(
                                'url' => $child['url'],
                                'title' => $child['title'],
                                'titles' => $child['titles'],
                                'children' => array(),
                                'progress' => true,
                            );
                        }
                    }
                }

                $entries[] = array(
                    'url' => $meta['url'],
                    'title' => $meta['title'],
                    'titles' => $meta['titles'],
                    'children' => $children,
                    'progress' => true,
                );
            }
        }

        return $entries;
    }

    private function renderNavigation(array $entries, $current)
    {
        $html = '<nav class="siteNav" aria-label="Sommaire du cours"><ol class="navList">';

        foreach ($entries as $entry) {
            $html .= $this->renderEntry($entry, $current);
        }

        return $html.'</ol></nav>';
    }

    private function renderEntry(array $entry, $current)
    {
        $active = $entry['url'] === $current;
        $classes = 'navItem'.($active ? ' is-current' : '');

        $html = '<li class="'.$classes.'" data-page="'.htmlspecialchars($entry['url']).'">';
        $html .= '<a class="navLink" href="'.htmlspecialchars($entry['url']).'"'
            .($active ? ' aria-current="page"' : '').'>'
            .'<span class="navTitle">'.$entry['title'].'</span>'
            .(empty($entry['progress']) ? '' : '<span class="navProgress" hidden></span>')
            .'</a>';

        if ($active) {
            $html .= $this->renderOutline($entry['titles'], $entry['children']);
        }

        if ($entry['children']) {
            $html .= '<ol class="navChildren">';

            foreach ($entry['children'] as $child) {
                $html .= $this->renderEntry($child, $current);
            }

            $html .= '</ol>';
        }

        return $html.'</li>';
    }

    /**
     * Le plan de la page : les titres de section et leurs sous-titres. Les
     * ancres reproduisent celles que le moteur pose sur les titres,
     * « title.1.2.3 » désignant le troisième sous-titre de la deuxième
     * section du premier titre.
     */
    private function renderOutline(array $titles, array $children = array())
    {
        if (!isset($titles[0][1]) || !$titles[0][1]) {
            return '';
        }

        // Une section qui ne fait qu'annoncer une sous-page (« Exercices
        // supplémentaires ») est déjà dans le sommaire juste en dessous.
        $announced = array();

        foreach ($children as $child) {
            $announced[$this->plain($child['title'])] = true;
        }

        $html = '<ul class="navOutline">';

        foreach ($titles[0][1] as $position => $entry) {
            $title = $entry[0];

            if (is_array($title) || isset($announced[$this->plain($title)])) {
                continue;
            }

            $anchor = 'title.1.'.($position + 1);

            $html .= '<li><a class="outlineLink" href="#'.$anchor.'">'.$title.'</a>';
            $html .= $this->renderSubOutline($anchor, $entry[1]);
            $html .= '</li>';
        }

        return $html.'</ul>';
    }

    private function renderSubOutline($anchor, array $titles)
    {
        $html = '';

        foreach ($titles as $position => $entry) {
            if (is_array($entry[0])) {
                continue;
            }

            $html .= '<li><a class="outlineLink outlineLink-sub" href="#'.$anchor.'.'.($position + 1).'">'
                .$entry[0].'</a></li>';
        }

        return $html ? '<ul class="navOutline navOutline-sub">'.$html.'</ul>' : '';
    }

    /**
     * Un titre débarrassé de son balisage et de ses espaces, pour comparer.
     */
    private function plain($title)
    {
        return trim(html_entity_decode(strip_tags((string) $title), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    }
}
