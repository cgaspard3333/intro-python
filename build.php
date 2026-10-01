<?php

/**
 * Construit le site dans web/ :
 *
 *     web/index.html      choix du groupe
 *     web/groupe-a/…      le cours du groupe A
 *     web/groupe-b/…      le cours du groupe B
 *
 * Variable d'environnement :
 *     DEV=1   mode local : rechargement automatique du navigateur
 */

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/src/Preprocessor.php';
require __DIR__.'/src/Directives/Card.php';
require __DIR__.'/src/Kernel.php';
require __DIR__.'/src/Landing.php';
require __DIR__.'/src/Site.php';
require __DIR__.'/src/Nodes/BrowserNode.php';
require __DIR__.'/src/Nodes/CodeNode.php';
require __DIR__.'/src/Nodes/TableNode.php';
require __DIR__.'/src/Nodes/TocNode.php';

$root = __DIR__;
$target = $root.'/web';

$config = require $root.'/site.php';
$config['dev'] = (bool) getenv('DEV');

$preprocessor = new Cours\Preprocessor(
    $root.'/pages',
    array_map(function ($group) { return $group['id']; }, $config['groups'])
);

// Coloration syntaxique : le paquet complet de highlight.js pèse 900 ko pour
// près de 200 langages. On n'assemble que ceux du cours.
$highlight = $root.'/vendor/gregwar/slidey/Gregwar/Slidey/static/slidey/highlight';
$pack = file_get_contents($highlight.'/highlight.js');

foreach (array('python', 'python-repl', 'bash') as $language) {
    $pack .= "\n".file_get_contents($highlight.'/languages/'.$language.'.min.js');
}

if (!is_dir($root.'/.build/assets')) {
    mkdir($root.'/.build/assets', 0755, true);
}

file_put_contents($root.'/.build/assets/highlight.js', $pack);

if (!is_dir($target)) {
    mkdir($target, 0755, true);
}

foreach ($config['groups'] as $group) {
    $sources = $root.'/.build/pages-'.$group['slug'];
    $preprocessor->prepare($group, $sources);

    echo '* '.$group['label']."\n";

    $site = new Cours\Site($root, $config, $group);
    $site->build($sources, $target.'/'.$group['slug'], false);
}

foreach ($preprocessor->getWarnings() as $warning) {
    fwrite(STDERR, 'Attention — '.$warning."\n");
}

// Les ressources communes aux deux groupes et à la page d'accueil, écrites
// une seule fois. Tout est servi depuis le dépôt : le site fonctionne sans
// accès à internet.
$assets = $target.'/assets';
$slidey = $root.'/vendor/gregwar/slidey/Gregwar/Slidey/static/slidey/js';

foreach (array('themes', 'themes/fonts', 'js', 'mathjax') as $directory) {
    if (!is_dir($assets.'/'.$directory)) {
        mkdir($assets.'/'.$directory, 0755, true);
    }
}

$copies = array(
    $root.'/themes/*.css' => $assets.'/themes/',
    $root.'/themes/*.js' => $assets.'/themes/',
    $root.'/themes/fonts/*.woff2' => $assets.'/themes/fonts/',
    $root.'/themes/mathjax/tex-svg.js' => $assets.'/mathjax/',
    $root.'/.build/assets/highlight.js' => $assets.'/',
);

foreach (array('jquery.js', 'slidey.js', 'slidey.permalink.js', 'slidey.spoilers.js') as $script) {
    $copies[$slidey.'/'.$script] = $assets.'/js/';
}

foreach ($copies as $source => $destination) {
    shell_exec('cp '.$source.' '.escapeshellarg($destination));
}

copy($root.'/pages/favicon.ico', $target.'/favicon.ico');

$landing = new Cours\Landing($root, $config);
$landing->write($target);

if ($config['dev']) {
    file_put_contents($target.'/.build-id', (string) microtime(true));
}

echo "* Site construit dans web/\n";
