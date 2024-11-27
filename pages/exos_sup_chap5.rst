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

⚖️ Exercice 18 : Chaîne de Markov simple 
---------------------------------------------------------------

**Consignes** :

Un robot se déplace dans un environnement composé de plusieurs salles, numérotées de 0 à \( n-1 \). Le robot commence dans une salle initiale, et à chaque étape, il choisit sa salle suivante selon les probabilités définies par une **matrice de transition** \( P \). 

La matrice \( P \) est une matrice carrée où chaque ligne \( i \) représente la salle actuelle du robot, et chaque colonne \( j \) contient la probabilité de passer de la salle \( i \) à la salle \( j \).

**Données d'entrée** :

1. **Matrice de transition \( P \)** : 
   Saisie par l'utilisateur, c'est une matrice de taille \( n \times n \). Chaque ligne doit contenir \( n \) probabilités (des nombres flottants entre 0 et 1), et la somme des probabilités sur chaque ligne doit être égale à 1.

2. **Nombre d'étapes de simulation (\( N \))** : 
   Saisi par l'utilisateur, c'est le nombre total de déplacements du robot dans l'environnement.

3. **Nombre d'étapes pour estimer les probabilités stationnaires (\( M \))** : 
   Saisi par l'utilisateur, c'est le nombre de déplacements utilisé pour estimer les probabilités d'être dans chaque salle après un grand nombre d'étapes.

**Etapes à réaliser** : 

.. step:: reset
    **Simulation des déplacements** :  
    Simuler le déplacement du robot pendant \( N \) étapes, en choisissant la salle suivante selon les probabilités de la matrice \( P \). Le robot commence dans la salle \( 0 \).

.. step::
    **Comptage des visites** :  
    Afficher combien de fois le robot a visité chaque salle pendant les \( N \) étapes de la simulation.

.. step::
    **Estimation des probabilités stationnaires** :  
    Simuler un très grand nombre d'étapes (\( M \)) et estimer la probabilité d'être dans chaque salle en calculant la proportion de temps passé dans chaque salle.

.. step::
    **Test du programme** :  
    Testez votre programme avec la matrice de transition \( P \) suivante :

    .. math::

    P = \begin{bmatrix}
    0.2 & 0.5 & 0.3 \\
    0.1 & 0.6 & 0.3 \\
    0.4 & 0.3 & 0.3
    \end{bmatrix}

    et \( N = 100 \), le programme doit :

    - Simuler les déplacements du robot pendant 100 étapes.
    - Afficher combien de fois chaque salle a été visitée.
    - Estimer les probabilités stationnaires après \( M = 10,000 \) étapes.

**Exemple de résultat attendu** :
.. spoiler::
    .. code-block:: text

        >> Entrez la matrice de transition P (les probabilités de transition).
        >> Combien de salles (taille de la matrice carrée) ? 3
        >> Entrez les 3 lignes de la matrice (avec 3 probabilités chacune) :
        >> Ligne 1 : 0.2 0.5 0.3
        >> Ligne 2 : 0.1 0.6 0.3
        >> Ligne 3 : 0.4 0.3 0.3
        >> 
        >> Matrice de transition P :
        >>  [[0.2 0.5 0.3]
        >>  [0.1 0.6 0.3]
        >>  [0.4 0.3 0.3]]
        >> 
        >> Entrez le nombre total d'étapes pour simuler les déplacements : 100
        >> 
        >> Nombre de visites dans chaque salle après 100 étapes :
        >> Salle 0: 29 visites
        >> Salle 1: 43 visites
        >> Salle 2: 28 visites
        >> 
        >> Entrez le nombre d'étapes pour estimer les probabilités : 10000
        >> 
        >> Probabilités stationnaires (après 10000 étapes) :
        >> Salle 0: 0.2130
        >> Salle 1: 0.4887
        >> Salle 2: 0.2983