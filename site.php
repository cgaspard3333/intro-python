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
    'groups' => array(
        array('id' => 1, 'slug' => 'groupe1', 'label' => 'Groupe 1'),
        array('id' => 2, 'slug' => 'groupe2', 'label' => 'Groupe 2'),
    ),

    // Contacts affichés sur la page d'accueil
    'teachers' => array(
        array('name' => 'Clément Gaspard', 'mail' => 'clement.gaspard@u-bordeaux.fr'),
        array('name' => 'Mélodie Daniel', 'mail' => 'melodie.daniel@u-bordeaux.fr'),
    ),

    'moodle' => 'https://moodle.u-bordeaux.fr/course/view.php?id=19481',
);
