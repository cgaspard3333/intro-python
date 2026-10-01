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
    'groups' => array(
        array('id' => 'A', 'slug' => 'groupe-a', 'label' => 'Groupe A'),
        array('id' => 'B', 'slug' => 'groupe-b', 'label' => 'Groupe B', 'pages' => array(
            'install_maison',
            'config_ide',
            'chap1',
        )),
    ),

    // Contacts affichés sur la page d'accueil
    'teachers' => array(
        array('name' => 'Clément Gaspard', 'mail' => 'clement.gaspard@u-bordeaux.fr'),
        array('name' => 'Mélodie Daniel', 'mail' => 'melodie.daniel@u-bordeaux.fr'),
    ),

    'moodle' => 'https://moodle.u-bordeaux.fr/course/view.php?id=19481',
);
