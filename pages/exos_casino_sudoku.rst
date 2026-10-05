.. Exercices « Le Grand Casino » et « Sudoku », repris par deux pages :
   exos_sup_chap3 pour le groupe B (exercices supplémentaires),
   chap3 pour le groupe A (exercices du chapitre).
   Ce fichier n'est construit nulle part seul : on l'édite ici, une seule fois.

.. slide::
.. GROUPE A
✏️ Exercice 11 : Le Grand Casino
--------------------------------

Pour terminer ce chapitre, deux exercices plus conséquents qui mobilisent tout ce que vous avez vu jusqu'ici : conditions, boucles, fonctions et types construits.

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
✏️ Exercice 12 : Sudoku
-----------------------
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
