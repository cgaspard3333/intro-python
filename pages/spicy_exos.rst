Exercices supplémentaires
=========================
.. slide::
Sur cette page se trouvent des exercices supplémentaires pour vous entraîner. Ils sont classés par niveau de difficulté :
.. discoverList::
    * Facile : 🍀
    * Moyen : ⚖️
    * Difficile : 🌶️

.. slide::
🍀 Exercice Sup. 1 : Déterminer si une année est bissextile
---------------
.. step::
    Avant de commencer cet exercise vous devez faire quelques recherches sur internet pour savoir :
.. discoverList::
    * Qu’est-ce qu’une année bissextile ?
    * Comment peut-on tester si un nombre entier est divisible par un autre en Python ?

.. step::
**Consigne** : Ecrire un programme permettant de déterminer si l’année saisie par l'utilisateur est bissextile ou non et lui afficher le resultat.

.. slide::
⚖️ Exercice Sup. 2 : Triangle de Pascal
---------------
.. step::
    Ecrire un programme qui construit et affiche le traingle de Pascal de degré n
    .. warning::
        Exemple pour n = 6

        .. code-block:: text

            1  
            1  1  
            1  2  1  
            1  3  3  1  
            1  4  6  4  1  
            1  5 10 10  5  1  
            1  6 15 20 15  6  1  

**Astuces** : 
.. spoiler::
    .. discoverList::
        * Calculer et afficher seulement les valeurs jusqu’à la diagonale principale incluse (Limiter le degré à 13)  
        * Construire le triangle ligne par ligne
            - Initialiser le premier élément et l’élément de la diagonale à 1.
            - Calculer les valeurs entre les éléments initialisés de gauche à droite en utilisant la relation suivante : $$P_{i,j} = P_{i-1,j} + P_{i-1,j-1}$$


.. slide::
🌶️ Exercice Sup. 3 : Les tours de Hanoï
---------------

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
🌶️ Exercice Sup. 4 : Sudoku
---------------
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

.. step::
    **Question 1** : Vérifier si la grille est correctement remplie  
    Créez une fonction ``is_grid_valid(grid)`` qui vérifie si la grille suit les règles du Sudoku :
    .. discoverList::
        * Chaque ligne doit contenir les chiffres de 1 à 4 sans répétition.
        * Chaque colonne doit contenir les chiffres de 1 à 4 sans répétition.
        * Chaque sous-grille (2x2) doit contenir les chiffres de 1 à 4 sans répétition.

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
🌶️ Exercice Sup. 5 : Les tours de Hanoï (graphique)
---------------
.. step::
**Consigne** : Reprenez le code de l'exercice Sup. 3. Vous devez maintenant utiliser la bibliothèque graphique pygame pour afficher la séquence des mouvements effectués lors de la résolution du problème des tours de Hanoï.  
Vous utiliserez 7 disques pour cet exercice.

