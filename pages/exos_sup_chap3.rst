🏋️ Exercices supplémentaires
=========================
.. slide::
Sur cette page se trouvent des exercices supplémentaires pour vous entraîner. Ils sont classés par niveau de difficulté :
.. discoverList::
    * Facile : 🍀
    * Moyen : ⚖️
    * Difficile : 🌶️

.. slide::
.. GROUPE A
🍀 Exercice Sup. 5 : Le Jeu du Devin
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. GROUPE B
🍀 Exercice Sup. 6 : Le Jeu du Devin
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. FIN GROUPE

Ce jeu est **l'inverse du juste prix** (Exercice 6) : cette fois, c'est l'utilisateur qui choisit le nombre, et c'est l'ordinateur qui doit le deviner. À chaque proposition, le programme apprend seulement si le nombre cherché est plus grand ou plus petit.

**Consigne** : Vous devez écrire un programme qui permet de trouver un nombre entier saisi par l'utilisateur en faisant le moins d'itération possible (en faisant le moins de tentatives possible).

**Pistes** : il existe plusieurs façons de chercher un nombre. Renseignez-vous sur les deux méthodes suivantes et comparez le nombre d'essais dont chacune a besoin, dans le pire des cas, pour un nombre entre 1 et 100.

.. discoverList::
    * La `recherche séquentielle <https://fr.wikipedia.org/wiki/Recherche_s%C3%A9quentielle>`_ : on essaie les nombres un par un, dans l'ordre.
    * La `recherche dichotomique <https://fr.wikipedia.org/wiki/Recherche_dichotomique>`_ : on coupe en deux, à chaque essai, l'intervalle qui reste possible.

**Astuce** :
.. spoiler::
    Utilisez une méthode de recherche dichotomique pour réduire le nombre de tentatives.

**Résultat attendu** :
.. code-block:: python
        >> Bienvenue au jeu du devin !
        >> Veuillez choisir un nombre entre 1 et 100.
        >> Entrez un nombre entre 1 et 100 : 33
        >> Essai 1: Je pense que c est 50.
        >> C est trop haut.
        >> Essai 2: Je pense que c est 25.
        >> C est trop bas.
        >> Essai 3: Je pense que c est 37.
        >> C est trop haut.
        >> Essai 4: Je pense que c est 31.
        >> C est trop bas.
        >> Essai 5: Je pense que c est 34.
        >> C est trop haut.
        >> Essai 6: Je pense que c est 32.
        >> C est trop bas.
        >> Essai 7: Je pense que c est 33.
        >> J ai deviné le nombre en 7 essais ! C était bien 33.

.. slide::
.. GROUPE A
🍀 Exercice Sup. 6 : Le Jeu du Pendu
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. GROUPE B
🍀 Exercice Sup. 7 : Le Jeu du Pendu
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. FIN GROUPE

**Consigne** : Vous devez écrire un programme qui permet à un utilisateur de jouer au jeu du pendu. Le but du jeu est de deviner un mot en proposant une lettre à la fois. L'utilisateur a un nombre limité de tentatives pour deviner le mot avant de perdre.
.. discoverList::
    1. Le programme doit choisir un mot de manière aléatoire dans une liste prédéfinie de mots, à vous de les choisir.
    2. Le mot à deviner doit être affiché sous forme de tirets (_) pour chaque lettre non encore devinée.
    3. À chaque tour, l'utilisateur doit entrer une lettre.
    4. Si la lettre devinée est correcte (elle fait partie du mot), elle doit être révélée à la ou les positions correspondantes dans le mot.
    5. Si la lettre est incorrecte, l'utilisateur perd une tentative.
    6. L'utilisateur a un nombre limité de tentatives (par exemple 6).
    7. Le jeu se termine soit lorsque l'utilisateur a deviné toutes les lettres du mot, soit lorsqu'il n'a plus de tentatives restantes.

**Règles** :
.. discoverList::
    * Si l'utilisateur devine une lettre déjà proposée, le programme doit l'informer.
    * Le programme doit indiquer après chaque tentative si la lettre est correcte ou incorrecte.
    * À la fin du jeu, le programme doit afficher si l'utilisateur a gagné ou perdu, et révéler le mot complet si nécessaire.
    * Si une lettre choisie à plusieurs reprise par l’utilisateur est incorrecte, le nombre de tentatives restentes à jouer ne diminue qu’une seule fois.

.. slide::
.. GROUPE A
⚖️ Exercice Sup. 7 : Les tours de Hanoï
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. GROUPE B
⚖️ Exercice Sup. 8 : Les tours de Hanoï
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. FIN GROUPE

.. image:: images/Tower_of_Hanoi_4.gif
    :alt: Les tours de Hanoï
    :align: center

**Consigne** : Vous devez écrire une fonction en Python pour résoudre le problème des tours de Hanoï en déplaçant des disques d'une tour à une autre en suivant certaines règles. Vous devez afficher la séquence des mouvements effectués.

**Règles des Tours de Hanoï** :
.. discoverList::
    * Vous avez trois tours : A, B et C.
    * Il y a n disques de tailles différentes sur la tour A.
    * Vous devez déplacer tous les disques de la tour A à la tour C.
    * Vous ne pouvez déplacer qu'un disque à la fois.
    * Un disque plus grand ne peut jamais être placé sur un disque plus petit.

**Astuce 1 ** :
.. spoiler::
    .. discoverList::
        * Utiliser la récursivité pour résoudre ce problème.
        * Si vous avez un seul disque, vous pouvez directement le déplacer de la tour A à la tour C.
        * Si vous avez plus d'un disque :
            - Déplacez les n-1 disques de la tour A à la tour B (utilisez la tour C comme intermédiaire).
            - Déplacez le disque restant de la tour A à la tour C.
            - Déplacez les n-1 disques de la tour B à la tour C (utilisez la tour A comme intermédiaire).

**Astuce 2 ** :
.. spoiler::
    Implémentez une fonction récursive hanoi(n, A, B, C) qui déplace n disques de la tour A à la tour C en utilisant la tour B comme intermédiaire.

    .. code-block:: python
        
        def hanoi(n, source, auxiliary, target):
            if n == 1:
                print(f"Déplacez le disque 1 de {source} à {target}")
            else:
                # Étape 1 : Déplacer n-1 disques de 'source' vers 'auxiliary' en utilisant 'target'
                # Étape 2 : Déplacer le disque restant de 'source' vers 'target'
                # Étape 3 : Déplacer les n-1 disques de 'auxiliary' vers 'target' en utilisant 'source'


.. GROUPE B
.. INCLURE exos_casino_sudoku
.. FIN GROUPE

.. slide::
.. GROUPE A
🌶️ Exercice Sup. 8 : Le Carré Magique
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. GROUPE B
🌶️ Exercice Sup. 11 : Le Carré Magique
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. FIN GROUPE

**Consigne** : Vous devez écrire un programme en Python pour résoudre un carré magique d'ordre n saisi au clavier par l'utilisateur et afficher la solution.

**Règles du Carré Magique** :
.. discoverList::
    * Un carré magique est une matrice carrée de taille n x n contenant les nombres entiers de 1 à n².
    * La somme de chaque ligne, de chaque colonne et des deux diagonales principales doit être égale.
    * La somme de chaque ligne, de chaque colonne et des deux diagonales principales est appelée la constante magique et est égale à n(n²+1)/2.

.. warning::
    Exemple d'un carré magique d'ordre 3 :
    .. code-block::
        #    +---+---+---+
        #    | 8 | 1 | 6 | 15
        #    +---+---+---+
        #    | 3 | 5 | 7 | 15
        #    +---+---+---+
        #    | 4 | 9 | 2 | 15
        #    +---+---+---+
        #   / 15   15  15 \
        # 15                15

**Astuce** :
.. spoiler::
    Utilisez le procédé de La Loubère pour générer un carré magique d'ordre impair.

**Résultat attendu** :
.. code-block:: python
    >> Saisir l'ordre du carré magique : 5
    >> Carré magique d'ordre 5 :
    >> +----+----+----+----+----+
    >> | 17 | 24 |  1 |  8 | 15 |
    >> +----+----+----+----+----+
    >> | 23 |  5 |  7 | 14 | 16 |
    >> +----+----+----+----+----+
    >> |  4 |  6 | 13 | 20 | 22 |
    >> +----+----+----+----+----+
    >> | 10 | 12 | 19 | 21 |  3 |
    >> +----+----+----+----+----+
    >> | 11 | 18 | 25 |  2 |  9 |
    >> +----+----+----+----+----+
    >> La constante magique est 65.

.. slide::
.. GROUPE A
🌶️ Exercice Sup. 9 : Le Jeu d'Echecs "Simple"
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. GROUPE B
🌶️ Exercice Sup. 12 : Le Jeu d'Echecs "Simple"
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. FIN GROUPE

**Consigne** : Implémentez un jeu d'échecs, permettant à deux joueurs de déplacer leurs pièces à tour de rôle, en saisissant au clavier les coups à jouer. Le jeu doit afficher un échiquier avec les pièces blanches en bas et les pièces noires en haut, comme dans une véritable partie d'échecs. Vous pouvez coloriser les affichage en utilisant `Colorama <https://pypi.org/project/colorama/>`_ (qui s’installe avec ``pip install colorama``). Par exemple, vous pouvez utiliser la couleur rouge pour les pièces noires.

**Règles du Jeu d'Echecs "Simple"** :  
Le programme ne prend pas en compte toutes les règles du jeu d'échecs. Par exemple :
    .. discoverList::
        * Les mouvements spécifiques à chaque type de pièce ne sont pas gérés (tous les coups sont permis tant que la case d'arrivée est valide).
        * Il n'y a pas de gestion de l'échec et mat et de la promotion de pions.
        * Les joueurs doivent simplement saisir des mouvements valides (les coups non conformes sont rejetés).

**Astuce** :
.. spoiler::
    .. discoverList::
        * Le plateau doit être initialisé avec les pièces blanches placées sur les deux premières rangées (lignes 1 et 2) et les pièces noires sur les deux dernières rangées (lignes 7 et 8).
        * Chaque case du plateau est représentée par une clé (comme a1, b2, etc.), et les pièces sont modélisées par des chaînes de caractères (ex: 'Pion_blanc' pour un pion blanc, 'Tour_noire' pour une tour noire).
        * À chaque tour, le programme demande au joueur de saisir la position de départ et la position d'arrivée d'une pièce.
        * Le programme vérifie si la position de départ contient une pièce appartenant au joueur en cours (blanc ou noir), si le mouvement ne capture pas une pièce de son propre camp, et si la destination est une case valide.
        * Si le mouvement est valide, la pièce est déplacée sur le plateau, et c'est au tour de l'autre joueur de jouer.
        * Le joueur blanc commence la partie. Le programme doit alterner entre les deux joueurs après chaque coup.
        * Si un joueur tente de déplacer une pièce qui n'est pas la sienne ou d'effectuer un coup illégal, le programme doit afficher un message d'erreur et redemander la saisie.

**Résultat attendu** :
.. code-block::
    >> Plateau d échecs:
    >> T C F R R F C T
    >> P P P P P P P P
    >> . . . . . . . .
    >> . . . . . . . .
    >> . . . . . . . .
    >> . . . . . . . .
    >> P P P P P P P P
    >> T C F R R F C T
 
    >> Tour du joueur blanc.
    >> Entrez la position de départ (ex : e2) : e2
    >> Entrez la position d arrivée (ex : e4) : e4
 
    >> Plateau d échecs:
    >> T C F R R F C T
    >> P P P P P P P P
    >> . . . . . . . .
    >> . . . . P . . .
    >> . . . . . . . .
    >> . . . . . . . .
    >> P P P P . P P P
    >> T C F R R F C T

    >> Tour du joueur noir.
    >> Entrez la position de départ (ex : e2) : e
    >> Entrez la position d arrivée (ex : e4) : 7
    >> Positions non valides. Réessayez.