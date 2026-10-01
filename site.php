<?php

/**
 * Configuration du site.
 *
 * DEV=1 active le mode local : rechargement automatique du navigateur.
 */

return array(
    // Titre affiché dans le bandeau et préfixe des titres d'onglet
    'title' => 'Introduction à Python',
    'shortTitle' => 'Intro Python',
    'subtitle' => 'Université de Bordeaux',

    // Les deux groupes. Le « slug » est le nom du dossier dans web/.
    //
    // « pages » limite le sommaire d'un groupe aux pages indiquées : les
    // autres ne sont ni listées, ni construites. Sans cette clé, le groupe
    // reçoit le sommaire complet. Ajouter une page ici la publie.
    //
    // La liste vaut pour tous les sommaires, y compris ceux qui sont à
    // l'intérieur d'une page : les sous-pages à garder s'y écrivent aussi.
    'groups' => array(
        array('id' => 'A', 'slug' => 'groupe-a', 'label' => 'Groupe A', 'pages' => array(
            'install_maison',
            'config_ide',
            'chap1',
            'exos_sup_chap2',
            'chap3',
            'exos_sup_chap3',
        )),
        array('id' => 'B', 'slug' => 'groupe-b', 'label' => 'Groupe B', 'pages' => array(
            'install_maison',
            'config_ide',
            'chap1',
            'chap2',
            'exos_sup_chap2',
        )),
    ),

    // Contacts affichés sur la page d'accueil
    'teachers' => array(
        array('name' => 'Clément Gaspard', 'mail' => 'clement.gaspard@u-bordeaux.fr'),
        array('name' => 'Mélodie Daniel', 'mail' => 'melodie.daniel@u-bordeaux.fr'),
    ),

    'moodle' => 'https://moodle.u-bordeaux.fr/course/view.php?id=19481',
);
