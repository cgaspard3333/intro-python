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

**Consigne** : Vous devez écrire un programme qui permet de trouver un nombre entier saisi par l'utilisateur en faisant le moins d'itération possible (en faisant le moins de tentatives possible).

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


.. slide::
.. GROUPE A
⚖️ Exercice Sup. 8 : Le Grand Casino
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. GROUPE B
⚖️ Exercice Sup. 9 : Le Grand Casino
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. FIN GROUPE

**Consigne** : Vous allez écrire un programme qui permet à un joueur de jouer à deux jeux de casino populaires : la roulette et le blackjack. L'utilisateur pourra parier de l'argent fictif et tenter de gagner ou de perdre en fonction des règles des deux jeux. Vous pourrez amender ensuite le Casino avec d’autres jeux de votre choix.

.. step:: reset
**Etape 1 : Casino**

* Le joueur démarre avec une somme d'argent fictif (par exemple, 1000€).
* Le programme doit proposer à l'utilisateur de choisir entre :
    * La roulette
    * Le blackjack
    * Quitter le casino
* Après chaque jeu, le montant d'argent restant doit être mis à jour, en fonction des gains ou pertes du joueur.

.. step::
**Etape 2 : Roulette**

* Le joueur peut parier un montant et choisir entre :
    * Parier sur une couleur : rouge ou noir.
    * Parier sur un nombre : entre 0 et 36.
* Un nombre aléatoire entre 0 et 36 est tiré par la roulette.
* Si le joueur parie sur la bonne couleur, il double sa mise.
* Si le joueur parie sur le bon nombre, il gagne 35 fois sa mise.
* Si le pari est perdu, la mise est déduite de l'argent du joueur.

.. step::
**Etape 3 : Blackjack**

* Le joueur peut parier un montant et reçoit deux cartes.
* Le croupier reçoit également deux cartes, dont une seule est visible.
* Le joueur doit choisir s'il veut "tirer" une nouvelle carte ou "rester".
* Le but est d'avoir une main dont la somme des valeurs ne dépasse pas 21, tout en étant supérieure à celle du croupier.
* Le croupier doit continuer à tirer des cartes jusqu'à ce que sa main atteigne un score d'au moins 17.
* Le joueur gagne s'il a un meilleur score que le croupier sans dépasser 21.
* Si le joueur dépasse 21, il perd automatiquement.
* En cas de victoire, le joueur récupère le double de sa mise.

.. step::
**Etape 4 : Fin du jeu**

* Le jeu continue tant que le joueur a de l'argent.
* Le joueur peut choisir de quitter à tout moment.


.. slide::
.. GROUPE A
🌶️ Exercice Sup. 9 : Sudoku
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. GROUPE B
🌶️ Exercice Sup. 10 : Sudoku
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. FIN GROUPE
**Consigne** : Vous devez écrire un programme en Python pour résoudre un jeu de Sudoku 4x4. Vous devez afficher la solution du jeu.

Une grille de Sudoku 4x4 peut être représentée comme une liste de listes de cette manière :
.. code-block::
    _ = None
    grid = [
        [1, _, 2, 3],
        [_, _, 1, 4],
        [4, 1, _, _],
        [_, _, 4, 1]
    ]
**Note** : Ici, ``_`` représente une case vide.

**Règles du Sudoku** :
.. discoverList::
    * Chaque ligne doit contenir les chiffres de 1 à 4 sans répétition.
    * Chaque colonne doit contenir les chiffres de 1 à 4 sans répétition.
    * Chaque sous-grille (2x2) doit contenir les chiffres de 1 à 4 sans répétition.

.. step:: reset
    **Question 1** : Vérifier si la grille est correctement remplie  
    Créez une fonction ``is_grid_valid(grid)`` qui vérifie si la grille suit les règles du Sudoku.

.. step::
    **Question 2** : Trouver les valeurs possibles pour une cellule  
    Créez une fonction ``possible_values(grid, row, col)`` qui prend une grille et la position d'une case vide (ligne et colonne) et renvoie une liste des valeurs possibles pour cette case selon les règles du Sudoku.

.. step::
    **Question 3** : Résoudre la grille
        Créez une fonction ``solve(grid)`` qui essaie de remplir la grille Sudoku avec des valeurs valides. Utilisez une approche de type backtracking (à rechercher sur internet) pour tester différentes possibilités jusqu'à trouver une solution.

**Astuce** :

.. spoiler::
    Squelette du programme :
    .. code-block:: python
        _ = None  # Utilisation de _ pour représenter les cases vides (None)

        def is_row_valid(grid: list, row: int) -> bool:
            """
            Vérifie si une ligne donnée est valide :
            
            Args:
                grid (list): La grille du Sudoku 4x4.
                row (int): Le numéro de la ligne à vérifier.
            
            Returns:
                bool: True si la ligne est valide, False sinon.
            """
        def is_column_valid(grid: list, col: int) -> bool:
            """
            Vérifie si une colonne donnée est valide :
            
            Args:
                grid (list): La grille du Sudoku 4x4.
                col (int): Le numéro de la colonne à vérifier.
            
            Returns:
                bool: True si la colonne est valide, False sinon.
            """
        def is_subgrid_valid(grid: list, row: int, col: int) -> bool:
            """
            Vérifie si une sous-grille 2x2 est valide :
            
            Args:
                grid (list): La grille du Sudoku 4x4.
                row (int): Le numéro de la ligne de départ de la sous-grille.
                col (int): Le numéro de la colonne de départ de la sous-grille.
            
            Returns:
                bool: True si la sous-grille est valide, False sinon.
            """
        def is_grid_valid(grid: list) -> bool:
            """
            Vérifie si toute la grille est valide en respectant les règles du Sudoku.
            
            Args:
                grid (list): La grille du Sudoku 4x4.
            
            Returns:
                bool: True si toute la grille est valide, False sinon.
            """
        def possible_values(grid: list, row: int, col: int) -> list:
            """
            Renvoie la liste des valeurs possibles pour une case vide donnée.
            
            Args:
                grid (list): La grille du Sudoku 4x4.
                row (int): Le numéro de la ligne de la case vide.
                col (int): Le numéro de la colonne de la case vide.
            
            Returns:
                list: Liste des valeurs possibles pour la case vide.
            """
        def solve(grid: list) -> bool:
            """
            Résout la grille Sudoku en utilisant une approche de backtracking.
            
            Args:
                grid (list): La grille du Sudoku 4x4.
            
            Returns:
                bool: True si la grille est résolue, False sinon.
            """

.. slide::
.. GROUPE A
🌶️ Exercice Sup. 10 : Le Carré Magique
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
🌶️ Exercice Sup. 11 : Le Jeu d'Echecs "Simple"
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