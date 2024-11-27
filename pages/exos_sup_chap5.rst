🏋️ Exercices supplémentaires
=========================
.. slide::
Sur cette page se trouvent des exercices supplémentaires pour vous entraîner. Ils sont classés par niveau de difficulté :
.. discoverList::
    * Facile : 🍀
    * Moyen : ⚖️
    * Difficile : 🌶️

🍀 Exercice 16 : Résolution d’un système de n équation à n inconnues
---------------------------------------------------------------

Soit un système de n équations linéaires à n inconnues, représenté sous la forme :  
.. math::
    A \cdot X = B

Vous devez écrire un programme en Python qui permet de résoudre ce système d’équations pour trouver les ``n`` inconnues. Pour cela, il faudra demander à l’utilisateur de saisir la valeur de ``n`` et les coefficients de chacune des ``n`` variables pour chacune des ``n`` équations ainsi que le résultat de chaque équations. À la fin, le programme doit afficher la valeur de chaque variable arrondie à deux chiffres après la virgule.  

**Remarque** : Il faut également traiter le cas où la matrice $$A$$ n’est pas carrée.

**Astuces**
.. spoiler::
    - $$A$$ est une matrice ``n×n`` contenant les coefficients du système.
    - $$X$$ est un vecteur colonne contenant les ``n`` inconnues.
    - $$B$$ est un vecteur colonne contenant les résultats des équations.
    - Cherchez comment faire un produit scalaire et calculer l’inverse d’une matrice avec ``numpy``.. 

**Exemple de résultat attendu** :
.. spoiler::
        
    Si ``n = 3`` et que le système d'équations est le suivant :
    .. math::
        \begin{cases}
        2x + 3y - z = 5 \\
        -x + 7y + 2z = 3 \\
        4x - 2y + 5z = -1
        \end{cases}

    Le programme devra afficher :
    .. code-block:: python
        >> Entrez la valeur de n (nombre d équations et d inconnues) : 3
        >> Entrez les coefficients pour chaque équation :
        >> Coefficient de la variable 1 pour l équation 1 : 2
        >> Coefficient de la variable 2 pour l équation 1 : 3
        >> Coefficient de la variable 3 pour l équation 1 : -1
        >> Coefficient de la variable 1 pour l équation 2 : -1
        >> Coefficient de la variable 2 pour l équation 2 : 7
        >> Coefficient de la variable 3 pour l équation 2 : 2
        >> Coefficient de la variable 1 pour l équation 3 : 4
        >> Coefficient de la variable 2 pour l équation 3 : -2
        >> Coefficient de la variable 3 pour l équation 3 : 5
        >> Entrez les résultats pour chaque équation :
        >> Résultat de l équation 1 : 5
        >> Résultat de l équation 2 : 3
        >> Résultat de l équation 3 : -1
        >> Valeur de la variable 1 : 1.00
        >> Valeur de la variable 2 : 0.77
        >> Valeur de la variable 3 : -0.69


🍀 Exercice 17 : Jeu de la Loterie
---------------------------------------------------------------

Dans ce jeu, un joueur choisit 6 numéros distincts parmi les 49 disponibles. Une fois les numéros choisis, un tirage aléatoire de 6 numéros gagnants est effectué.
.. step:: reset
    Simulez le tirage des 6 numéros gagnants.
.. step::
    Simulez les choix de 1 000 joueurs, chacun choisissant 6 numéros distincts.
.. step::
    Pour chaque joueur, comparez ses numéros avec ceux du tirage gagnant et calculez combien de numéros il a correctement devinés (0, 1, 2, ... 6).
.. step::
    Affichez la probabilité d’obtenir 1, 2, 3, ..., 6 numéros corrects (par exemple, indiquez combien de joueurs parmi les 1000 ont obtenu 1 numéro correct, combien en ont obtenu 2 numéros, etc.)."

**Exemple de résultat attendu**
.. spoiler::
    .. code-block:: bash
        >> Numéros gagnants : [6, 11, 21, 33, 38, 47]

        >> Résultats de la loterie :
        >> 0 numéros corrects : 43.00%
        >> 1 numéros corrects : 41.20%
        >> 2 numéros corrects : 13.90%
        >> 3 numéros corrects : 1.80%
        >> 4 numéros corrects : 0.10%
        >> 5 numéros corrects : 0.00%
        >> 6 numéros corrects : 0.00%