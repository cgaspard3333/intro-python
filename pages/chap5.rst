.. slide::

.. GROUPE A
Chapitre 4 - Introduction à ``numpy``
=====================================
.. GROUPE B
Chapitre 5 - Introduction à ``numpy``
=====================================
.. FIN GROUPE

🎯 Objectifs du Chapitre
---------------------

.. important:: 
    - Découvrir la bibliothèque ``numpy``, une des bibliothèques les plus utilisées en Python pour le calcul scientifique et la manipulation de données numériques.
    - Apprendre à créer et manipuler des tableaux (ou arrays) de données, à effectuer des opérations mathématiques efficaces et à utiliser des fonctions puissantes de numpy.

.. slide::
📖 1. Le package ``numpy``
-----------------------

1.1 Qu'est-ce que ``numpy`` ?
~~~~~~~~~~~~~~~~~~~~~~~~

.. note::
    ``numpy``(Numerical Python) est une **bibliothèque de calcul numérique** en Python, essentielle pour les projets de data science, de calcul scientifique et d'apprentissage automatique. Elle est optimisée pour le **traitement de grandes quantités de données**, offrant des fonctionnalités pour **créer et manipuler des tableaux multidimensionnels** (appelés arrays) et effectuer des **opérations mathématiques complexes de manière rapide et efficace**. Ils sont doncs largement dans les domaines ou la performance est un enjeu, comme le Machine Learning, le traitement d'images, etc.

Les avantages de numpy incluent :

- **Efficacité** : Les opérations sur les arrays numpy sont souvent beaucoup plus rapides que les listes Python.
- **Simplicité syntaxique** : Des opérations mathématiques vectorisées qui réduisent le code.
- **Large écosystème** : Utilisé par d’autres bibliothèques comme pandas, scipy, scikit-learn.

.. slide::
1.2 Installation de ``numpy``
~~~~~~~~~~~~~~~~~~~~~~~~~

Si numpy n’est pas déjà installé, vous pouvez l’installer via ``pip`` :

.. code-block:: bash
    pip install numpy

Une fois installé, il est courant de l’importer avec l’abréviation ``np`` pour simplifier son utilisation :

.. code-block:: python
    import numpy as np

.. slide::
1.3 Les tableaux ``numpy``
~~~~~~~~~~~~~~~~~~~~~~

Contrairement aux listes Python, les arrays ``numpy`` sont optimisés pour contenir des données de même type (typiquement des nombres) et permettent des opérations mathématiques efficaces.
Un array numpy peut être un tableau 1D (vecteur/liste), un tableau 2D (matrice) ou un tableau de dimensions supérieures.

**1.3.1 Créer un tableau ``numpy``**  
*1.3.1.1 A partir d'une liste Python*  

.. warning::
    Exemple :
    .. code-block:: python
        import numpy as np

        # Créer un array 1D
        tableau_1d = np.array([1, 2, 3, 4, 5])

        # Créer un array 2D (matrice)
        tableau_2d = np.array([[1, 2, 3], [4, 5, 6]])
        
        # La matrice tableau_2d est :
        # ⎡ 1, 2, 3 ⎤ 
        # ⎣ 4, 5, 6 ⎦

        print("Tableau 1D :", tableau_1d)
        print("Tableau 2D :\n", tableau_2d)

        >> Tableau 1D : [1 2 3 4 5]
        >> Tableau 2D : 
        >> [[1 2 3]
        >> [4 5 6]]

.. slide::
*1.3.1.2 Avec des fonctions prédéfinies*  

- ``np.zeros((n, m))`` : Crée un tableau rempli de zéros de taille ``n x m``.
- ``np.ones((n, m))`` : Crée un tableau rempli de uns de taille ``n x m``.
- ``np.arange(start, stop, step)`` : Crée un tableau 1D avec des valeurs allant de ``start`` à ``stop`` (non inclus) avec un pas ``step``.
- ``np.linspace(start, stop, num)`` : Crée un tableau 1D avec num valeurs également espacées entre ``start`` et ``stop``.

.. warning::
    Exemple : 
    .. code-block:: python
        import numpy as np

        zeros = np.zeros((2, 3))
        ones = np.ones((2, 2))
        range_array = np.arange(0, 10, 2)
        linspace_array = np.linspace(0, 1, 5)

        print("Tableau de zéros :\n", zeros)
        print("Tableau de uns :\n", ones)
        print("Tableau avec arange :", range_array)
        print("Tableau avec linspace :", linspace_array)

.. slide::
**1.3.2 Accéder aux éléments d'un tableau**

Pour accéder aux éléments d'un tableau numpy, on utilise des indices entre crochets. Les indices commencent à 0 et peuvent être négatifs pour accéder aux éléments à partir de la fin.

L’accès aux éléments dans un array numpy est similaire aux listes Python, mais peut s’étendre aux tableaux multidimensionnels.
.. warning::
    Exemple :
    .. code-block:: python
        array = np.array([[1, 2, 3], [4, 5, 6], [7, 8, 9]])

        print(array[0, 1])    # Accède à l'élément de la 1ère ligne, 2ème colonne
        >> 2
        print(array[1, :])    # Accède à toute la 2ème ligne
        >> [4, 5, 6]
        print(array[:, 2])    # Accède à toute la 3ème colonne
        >> [3, 6, 9]

.. slide::
1.4 Opérations mathématiques avec ``numpy``
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

``numpy`` permet d’effectuer des opérations mathématiques de manière vectorisée, ce qui signifie que les opérations s’appliquent directement sur tous les éléments d’un array sans besoin de boucles explicites.

**1.4.1 Opérations élémentaires**
Les opérations comme l’addition, la soustraction, la multiplication, la division s'appliquent directement sur les arrays.

.. warning::
    Exemple :
    .. code-block:: python
        import numpy as np

        a = np.array([1, 2, 3])
        b = np.array([4, 5, 6])

        print("Addition :", a + b)
        >> Addition : [5 7 9]
        print("Soustraction :", a - b)
        >> Soustraction : [-3 -3 -3]
        print("Multiplication :", a * b)
        >> Multiplication : [4 10 18]
        print("Division :", a / b)
        >> Division : [0.25 0.4  0.5 ]

.. slide::
**1.4.2 Opérations mathématiques avancées**
numpy propose une large gamme de fonctions mathématiques pour des calculs avancés.

- **Exponentielle** : ``np.exp(array)``
- **Logarithme** : ``np.log(array)``
- **Racine carrée** : ``np.sqrt(array)``
- **Puissance** : ``np.power(array, n)``

.. warning::
    Exemple :
    .. code-block:: python
        import numpy as np

        array = np.array([1, 2, 3])

        print("Exponentielle :", np.exp(array))
        >> Exponentielle : [ 2.71828183  7.3890561  20.08553692]
        print("Logarithme :", np.log(array))
        >> Logarithme : [0. 0.69314718 1.09861229]
        print("Racine carrée :", np.sqrt(array))
        >> Racine carrée : [1. 1.41421356 1.73205081]
        print("Puissance :", np.power(array, 2))
        >> Puissance : [1 4 9]

.. slide::
1.5 Fonctions d'agrégation
~~~~~~~~~~~~~~~~~~~~~~

Les fonctions d'agrégation de ``numpy`` permettent de calculer des statistiques de base sur les arrays.

- **Somme** : ``np.sum(array)``
- **Moyenne** : ``np.mean(array)``
- **Écart-type** : ``np.std(array)``
- **Variance** : ``np.var(array)``
- **Minimum** : ``np.min(array)``
- **Maximum** : ``np.max(array)``
- **Indice de l'élément minimum** : ``np.argmin(array)``
- **Indice de l'élément maximum** : ``np.argmax(array)``

Ces fonctions peuvent également être appliquées sur des tableaux multidimensionnels en précisant l'axe (``axis=0`` pour les colonnes, ``axis=1`` pour les lignes).

.. warning::
    Exemple :
    .. code-block:: python
        array = np.array([[1, 2, 3], [4, 5, 6]])

        print("Somme :", np.sum(array))              # Somme de tous les éléments
        print("Moyenne :", np.mean(array))           # Moyenne de tous les éléments
        print("Écart-type :", np.std(array))         # Écart-type
        print("Somme par colonne :", np.sum(array, axis=0))  # Somme par colonne
        print("Somme par ligne :", np.sum(array, axis=1))    # Somme par ligne

.. slide::
1.6 Manipulation de la forme des arrays
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

``numpy`` propose des outils puissants pour manipuler et changer la forme des arrays sans modifier leurs données.

**1.6.1 Changer la forme d'un array avec reshape**

La fonction ``reshape`` permet de redimensionner un array tout en conservant les mêmes données.

.. warning::
    Exemple :
    .. code-block:: python
        array = np.array([1, 2, 3, 4, 5, 6])
        array_reshaped = array.reshape((2, 3))  # Transforme en un array 2x3

        print(array_reshaped)
        >> [[1 2 3]
        >> [4 5 6]]

.. slide::
**1.6.2 Aplatir un array multidimensionnel avec ``flatten``**

La fonction ``flatten`` transforme un array multidimensionnel en un array 1D.

.. warning::
    Exemple :
    .. code-block:: python
        array = np.array([[1, 2, 3], [4, 5, 6]])
        array_flattened = array.flatten()

        print(array_flattened)
        >> [1 2 3 4 5 6]

.. slide::
**1.6.3 Concaténer des arrays avec ``concatenate``**

La fonction ``concatenate`` permet de concaténer des arrays le long d'un axe donné.

.. warning::
    Exemple 1 :
    .. code-block:: python
        a = np.array([[1, 2], [3, 4]])
        b = np.array([[5, 6]])

        # Concatène les arrays le long de l'axe 0 (colonne)
        c = np.concatenate((a, b), axis=0)  

        print(c)
        >> [[1 2]
        >> [3 4]
        >> [5 6]]

        d = np.concatenate((a, b), axis=1)

        # Les dimensions des arrays ne correspondent pas pour la concaténation le long de l'axe 1.
        >> ValueError: all the input array dimensions except for the concatenation axis must match exactly, but along dimension 0, the array at index 0 has size 2 and the array at index 1 has size 1

    Exemple 2 :
    .. code-block:: python
        array1 = np.array([1, 2, 3])
        array2 = np.array([4, 5, 6])

        # Concatène les arrays le long de l'axe 1 (ligne) par défaut
        array_concatenated = np.concatenate((array1, array2))

        print(array_concatenated) 
        >> [1 2 3 4 5 6]

.. slide::
1.7 Indexation et filtrage avancés
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

``numpy`` offre des fonctionnalités avancées pour sélectionner des éléments spécifiques dans un array en fonction de certaines conditions.

**1.7.1 Indexation par masque booléen**

L'indexation par masque booléen permet de sélectionner des éléments d'un array en fonction d'une condition donnée.

.. warning::
    Exemple :
    .. code-block:: python
        array = np.array([1, 2, 3, 4, 5, 6])

        # Sélectionner les éléments supérieurs à 3
        mask = array > 3
        print(array[mask])
        
        >> [4 5 6]

.. slide::
**1.7.2 Indexation par position**

On peut sélectionner plusieurs éléments en utilisant des listes d'indices.

.. warning::
    Exemple :
    .. code-block:: python
        array = np.array([10, 20, 30, 40, 50])

        indices = [0, 2, 4]
        print(array[indices])
        
        >> [10 30 50]

.. slide::
**1.7.3 Modification d'élements via un masque**

On peut également modifier les valeurs d'un array en utilisant un masque booléen.

.. warning::
    Exemple 1:
    .. code-block:: python
        array = np.array([1, 2, 3, 4, 5])

        array[array > 3] = 0  # Remplace les valeurs supérieures à 3 par 0
        print(array) 
        
        >> [1 2 3 0 0]

    Exemple 2:
    .. code-block:: python
        array = np.array([8, 3, 6, 1, 2])

        mask = (array > 1) & (array < 5)  # Crée un masque booléen
        array[mask] = 0  # Remplace les valeurs entre 2 et 5 par 0
        print(array) 
        
        >> [8 0 6 1 0]
    
.. slide::
1.8 Génération de nombres aléatoires avec ``numpy``
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

``numpy`` propose des fonctions pour générer des nombres aléatoires selon différentes distributions.

**1.8.1 Nombres aléatoires entre 0 et 1**

``np.random.rand()`` génère des nombres aléatoires à virgule flottante entre 0 et 1.

.. warning::
    Exemple :
    .. code-block:: python
        import numpy as np

        random_values = np.random.rand(5)
        print(random_values)  
        
        >> [0.572 0.832 0.453 0.271 0.928]

.. slide::
**1.8.2 Nombres aléatoires entiers**

``np.random.randint(start, stop, size)`` génère des nombres entiers aléatoires entre ``start`` (inclus) et ``stop`` (exclus), avec la taille spécifiée.

.. warning::
    Exemple :
    .. code-block:: python
        import numpy as np

        random_integers = np.random.randint(1, 10, size=(2, 3))
        print(random_integers)  
        
        >> [[3 5 8]
        >> [2 6 9]]

.. slide::
**1.8.3 Echantillonage aléatoire**

``np.random.choice(array, size, replace)`` permet de tirer aléatoirement des éléments d'un array avec l'array de départ (``array``), la taille de l'échantillon (``size``) et si les éléments peuvent être tirés plusieurs fois (``replace=True``).

.. warning::
    Exemple :
    .. code-block:: python
        import numpy as np

        array = np.array([1, 2, 3, 4, 5])

        # Echantillon de 3 éléments sans qu'un élément puisse être tiré plusieurs fois (remplacement=False)
        random_sample = np.random.choice(array, 3, replace=False)
        print(random_sample)  
        
        >> [3 1 5]

.. slide::
**1.8.4 Graine aléatoire (seed)**

Lorsque vous utilisez des fonctions de génération de nombres aléatoires (comme celles de ``numpy`` ou celle du module ``random``), les valeurs générées changent à chaque exécution du programme. Cependant, il peut être utile de contrôler la génération aléatoire pour reproduire des résultats identiques lors de tests ou de simulations. Cela est possible grâce à une seed (ou graine).

Une seed est un point de départ pour l’algorithme de génération de nombres pseudo-aléatoires. En fixant cette seed, vous vous assurez que les valeurs aléatoires générées seront toujours les mêmes, tant que la seed reste la même.

La fonction ``np.random.seed()`` permet de fixer la seed. Une fois la seed définie, les appels aux fonctions aléatoires de numpy produiront toujours les mêmes résultats.

.. warning::
    Exemple :
    .. code-block:: python
        import numpy as np

        # Fixer la seed
        np.random.seed(42)

        # Générer des nombres aléatoires
        random_values = np.random.rand(5)
        print("Valeurs aléatoires avec seed 42 :", random_values)
        
        >> Valeurs aléatoires avec seed 42 : [0.37454012 0.95071431 0.73199394 0.59865848 0.15601864]

Chaque fois que vous exécuterez ce code, il produira les mêmes valeurs aléatoires pour ``random_values``, car la seed a été fixée à la valeur ``42``. Si vous exécutez le code sans définir de seed, les valeurs générées seront différentes à chaque fois.

.. slide::
✏️ Exercice 14 : Pratiquer avec ``numpy``
---------------------------------------

**Consigne** : Dans un même script Python, réalisez les actions suivantes. Pour y répondre vous pouvez en premier lieu utiliser le cours ci-dessus, puis consulter la documentation de ``numpy`` sur internet pour y trouver les fonctions nécessaires.  
.. note::
    **Interdiction d'utiliser des boucles ``for`` ou ``while``** (sauf explicitement demandé), les opérations vectorisées de ``numpy`` permettent de réaliser des opérations sur l'ensemble des éléments d'un array sans avoir à utiliser de boucles (et surtout le temps de calcul en est réduit).

.. note::
    Appelez ``numpy.random.seed(42)`` **une seule fois, au tout début de votre programme**. Toutes les valeurs tirées ensuite seront les mêmes à chaque exécution, et vos résultats pourront être comparés à ceux de l'énoncé. Refixer la graine avant chaque tirage redonnerait au contraire les mêmes nombres encore et encore.

.. GROUPE A
.. slide::
**Questions simples** :

.. step:: reset
    À quoi sert de fixer la seed aléatoire dans un programme ?

.. step::
    Créer :

    - un array nul de taille 100 ;
    - un array de taille 10 avec des valeurs aléatoires entre 0 et 1 ;
    - un array nul de taille 10 dont la septième valeur est égale à 1.

.. step::
    Créer deux matrices particulières :

    - un array 2D identité de taille (3, 3) (on appelle matrice identité une matrice carrée dont tous les éléments sont nuls, sauf ceux de la diagonale principale qui sont égaux à 1) ;
    - un array 2D de taille (5, 5) avec les valeurs 1, 2, 3, 4 juste en dessous de la diagonale principale.

.. step::
    Modifier des valeurs avec un masque :

    - créer un array de taille 10 avec des valeurs entières aléatoires entre 1 et 10, puis remplacer les valeurs supérieures à 5 par 0 ;
    - dans un nouvel array du même type, remplacer les valeurs comprises entre 3 et 7 par 0 ;
    - créer un array aléatoire de taille 15, puis remplacer sa valeur minimale par 100.

.. step::
    Créer un array aléatoire de taille 40, puis calculer sa moyenne, ses valeurs minimale et maximale, et la somme de ses valeurs (avec les fonctions de ``numpy``).

.. step::
    Travailler sur les bords d'un array 2D :

    - créer un array 2D de taille (4, 4) avec des 1 sur les bords et des 0 à l'intérieur ;
    - créer un array 2D de taille (2, 2), puis lui ajouter une bordure de 0 tout autour.

.. step::
    Créer deux damiers (alternance de 0 et de 1) : un de taille (10, 10) sans utiliser la fonction ``np.tile()``, puis un de taille (6, 6) en l'utilisant.

.. step::
    Normaliser un array aléatoire de taille 50 et expliquer ce que signifie la normalisation.

.. step::
    Multiplier un array 2D aléatoire de taille (5, 4) par un array 2D aléatoire de taille (4, 2). Quelle est la forme du résultat ?

.. slide::
**Questions plus complexes** :

.. step::
    Trouver la partie entière d'un array aléatoire dont les valeurs sont uniquement positives, en utilisant 3 méthodes différentes. Convertir ensuite un array de float (32 bits) en un array de int (32 bits).

.. step::
    Créer une fonction qui génère des nombres aléatoires, l'utiliser pour générer un array de taille 15, puis trier ses valeurs.

.. step::
    Créer deux arrays, vérifier s'ils sont égaux, puis trouver leurs valeurs communes.

.. step::
    Expliquer comment vérifier si un array 2D contient des colonnes nulles, puis comment trouver la valeur la plus fréquente d'un array.

.. GROUPE B
.. slide::
**Questions simples** :

.. step:: reset
    À quoi sert de fixer la seed aléatoire dans un programme ?

.. step::
    Créer un array nul de taille 100.

.. step::
    Créer un array de taille 10 avec des valeurs aléatoires entre 0 et 1.

.. step::
    Créer un array nul de taille 10 dont la septième valeur est égale à 1.

.. step::
    Créer un array de taille 10 avec des valeurs entières aléatoires entre 1 et 10, puis remplacer les valeurs supérieures à 5 par 0.

.. step::
    Dans un nouvel array du même type, remplacer les valeurs comprises entre 3 et 7 par 0.

.. step::
    Créer un array aléatoire de taille 15, puis remplacer sa valeur minimale par 100.

.. step::
    Créer un array aléatoire de taille 40, puis calculer sa moyenne, ses valeurs minimale et maximale, et la somme de ses valeurs, en utilisant les fonctions de ``numpy``.

.. slide::
**Passer à deux dimensions** :

.. step::
    Créer un array 2D identité de taille (3, 3) (on appelle matrice identité une matrice carrée dont tous les éléments sont nuls, sauf ceux de la diagonale principale qui sont égaux à 1).

.. step::
    Créer un array 2D de taille (4, 4) avec des 1 sur les bords et des 0 à l'intérieur.

.. step::
    Multiplier un array 2D aléatoire de taille (5, 4) par un array 2D aléatoire de taille (4, 2). Quelle est la forme du résultat, et pourquoi ?

.. slide::
**Pour finir** :

.. step::
    Normaliser un array aléatoire de taille 50, et expliquer ce que signifie la normalisation.

.. step::
    Trier les valeurs d'un array aléatoire de taille 15.

.. step::
    Convertir un array de float (32 bits) en un array d'int (32 bits).

.. FIN GROUPE

.. slide::
✏️ Exercice 15 : Encore et toujours la météo !
----------------------------------------------

**Objectifs** :
Dans cet exercice, vous allez utiliser **numpy** pour analyser et manipuler des données météorologiques. Vous allez simuler des relevés de températures sur 30 jours, calculer des statistiques et identifier des tendances.

.. note::
    Appelez ``numpy.random.seed(42)`` **une seule fois, au tout début de votre programme**. Toutes les valeurs tirées ensuite seront les mêmes à chaque exécution, et vos résultats pourront être comparés à ceux de l'énoncé. Refixer la graine avant chaque tirage redonnerait au contraire les mêmes nombres encore et encore.

**Consignes** :

.. step:: reset
    **Génération des données de température** :

        - Utilisez ``numpy.random.normal()`` pour générer un tableau de 30 températures aléatoires, avec une moyenne de 20°C et un écart-type de 5°C.
.. step::
    **Calcul des statistiques descriptives** :
    
        - Calculez la température moyenne du mois 
        - Calculez la température médiane
        - Calculez l'écart-type des températures
.. step::
    **Analyse des températures** : calculez puis affichez

        - les jours où la température est supérieure à la moyenne ;
        - le jour le plus chaud et le jour le plus froid, avec leur température ;
        - le nombre de jours où la température dépasse 25°C.

    Les jours se comptent à partir de 1, alors que les indices d'un array commencent à 0.

.. step::
    **Comparaison avec un second mois** : créez un tableau de 30 températures supplémentaires, de moyenne 22°C et d'écart-type 4°C, puis affichez les jours où il fait plus chaud que dans le premier tableau.

.. step::
    **Périodes de chaleur** : trouvez les périodes où la température reste au-dessus de 22°C pendant au moins 2 jours de suite, et affichez le jour où chacune commence.

.. step::
    **Chutes soudaines** : trouvez les jours où la température perd plus de 5°C par rapport à la veille.

**Résultat attendu** :
.. code-block:: text
    >> Données de température générées pour 30 jours : [22.48357077 19.30867849 23.23844269 27.61514928 18.82923313 18.82931522
    >> 27.89606408 23.83717365 17.65262807 22.71280022 17.68291154 17.67135123
    >> 21.20981136 10.43359878 11.37541084 17.18856235 14.9358444  21.57123666
    >> 15.45987962 12.93848149 27.32824384 18.8711185  20.33764102 12.87625907
    >> 17.27808638 20.55461295 14.24503211 21.87849009 16.99680655 18.54153125] 

    >> Résultats des statistiques descriptives :
    >> - Température moyenne : 19.06°C
    >> - Température médiane : 18.83°C
    >> - Écart-type des températures : 4.42°C

    >> Analyse des températures :
    >> - Jours avec température supérieure à la moyenne : [ 1  2  3  4  7  8 10 13 18 21 23 26 28]
    >> - Jour le plus chaud : Jour 7 avec 27.90°C
    >> - Jour le plus froid : Jour 14 avec 10.43°C
    >> - Nombre de jours avec une température supérieure à 25°C : 3

    >> Analyse comparative des températures :
    >> - Périodes avec température > 22°C pendant au moins 2 jours consécutifs : [3, 7]
    >> - Jours avec chute soudaine de température (> 5°C) : [5, 9, 11, 14, 19, 22, 24, 27]
    >> - Jours où la température dans le deuxième tableau est plus élevée que dans le premier : [ 2  5 10 11 12 13 14 15 16 17 18 19 20 22 24 25 26 27 29 30]

.. GROUPE A
.. slide::
✏️ Exercice 16 : ``numpy`` au service de l'IA
---------------------------------------------

**Objectif** : Les systèmes d'IA qui vous recommandent des films ou des musiques reposent sur des calculs très simples, répétés des millions de fois : des **produits de matrices**. Dans cet exercice, vous allez construire un petit système de recommandation de films, **entièrement avec** ``numpy``.

.. note::
    Chaque film est décrit par cinq notes entre 0 et 1 : sa part d'action, de comédie, de romance, de science-fiction et d'horreur. Les goûts d'un spectateur sont décrits de la même façon.
    Le **score** d'un film pour un spectateur est la somme des produits critère par critère : (action du film × goût pour l'action) + (comédie du film × goût pour la comédie) + … Plus le score est élevé, plus le film correspond aux goûts du spectateur.

.. note::
    **Aucune boucle** ``for`` **ou** ``while`` n'est autorisée dans cet exercice : chaque étape se résout avec les opérations de ``numpy``.

.. slide::
.. step:: reset
    **Les données** : recopiez le catalogue, les goûts des spectateurs et le tableau des films déjà vus :

    .. code-block:: python

        films = np.array(["Mission Explosive", "Rire aux éclats", "Coup de foudre", "Action et sentiments",
                          "Galaxie lointaine", "La maison hantée", "Zombies en vacances", "Amour sur Mars"])
        spectateurs = np.array(["Alice", "Bilal", "Chloé", "David", "Emma"])

        # Une ligne par film : action, comédie, romance, science-fiction, horreur
        F = np.array([[0.9, 0.1, 0.0, 0.3, 0.1],
                      [0.1, 0.9, 0.2, 0.0, 0.0],
                      [0.0, 0.3, 0.9, 0.0, 0.0],
                      [0.7, 0.2, 0.6, 0.1, 0.0],
                      [0.5, 0.1, 0.1, 0.9, 0.1],
                      [0.2, 0.1, 0.0, 0.1, 0.9],
                      [0.3, 0.7, 0.1, 0.0, 0.6],
                      [0.1, 0.3, 0.7, 0.8, 0.0]])

        # Une colonne par spectateur, une ligne par critère (dans le même ordre que F)
        G = np.array([[0.8, 0.1, 0.0, 0.3, 0.7],
                      [0.1, 0.9, 0.2, 0.4, 0.0],
                      [0.4, 0.2, 0.9, 0.0, 0.3],
                      [0.7, 0.0, 0.3, 0.1, 0.9],
                      [0.0, 0.3, 0.0, 0.9, 0.1]])

        # vus[i, j] vaut 1 si le spectateur j a déjà vu le film i
        vus = np.array([[1, 0, 0, 0, 1],
                        [0, 1, 0, 0, 0],
                        [0, 0, 1, 0, 0],
                        [0, 0, 0, 0, 1],
                        [1, 0, 0, 0, 0],
                        [0, 0, 0, 1, 0],
                        [0, 0, 0, 0, 0],
                        [0, 0, 1, 0, 1]])

.. step::
    **Les scores** : calculez en une seule instruction le tableau des scores de tous les films pour tous les spectateurs. Quelle est sa forme ? Que représente la case de la ligne ``i`` et de la colonne ``j`` ?

.. step::
    **Les films déjà vus** : on ne recommande pas un film déjà vu. Construisez un nouveau tableau de scores dans lequel le score de chaque film déjà vu par un spectateur est remplacé par -1.

.. step::
    **Le top 3** : pour chaque spectateur, déterminez les trois films à lui recommander, du meilleur au moins bon, puis affichez un tableau qui associe à chaque spectateur les titres de ses trois films.

.. slide::
.. step::
    **Des goûts proches** : pour comparer les goûts de deux spectateurs, on divise d'abord chaque colonne de ``G`` par sa **norme** (la racine carrée de la somme des carrés de ses éléments). Le produit de la transposée de cette nouvelle matrice par la matrice elle-même donne alors un tableau (5, 5) de **similarités** : la case ``(j, k)`` vaut 1 si les spectateurs ``j`` et ``k`` ont exactement les mêmes goûts, et s'approche de 0 si leurs goûts n'ont rien en commun. Calculez ce tableau, puis trouvez les deux spectateurs **différents** dont les goûts sont les plus proches.

.. step::
    **« Les spectateurs qui vous ressemblent ont aimé… »** : trouvez le spectateur dont les goûts sont les plus proches de ceux d'Alice, puis affichez les films qu'il a vus et qu'Alice n'a pas encore vus.

.. step::
    **Pourquoi numpy ?** Un vrai catalogue contient des millions de films. Générez-en un million au hasard (5 critères par film, seed fixée à 42), calculez les scores de tous ces films pour les 5 spectateurs et mesurez la durée de ce calcul. Le même calcul écrit avec des boucles Python prend environ 3 secondes : combien de fois ``numpy`` est-il plus rapide ?

.. slide::
**Résultat attendu** (la durée dépend de votre machine) :

.. code-block:: bash
    >> Forme du tableau des scores : (8, 5)
    >> [[0.94 0.21 0.11 0.43 0.91]
    >>  [0.25 0.86 0.36 0.39 0.13]
    >>  [0.39 0.45 0.87 0.12 0.27]
    >>  [0.89 0.37 0.61 0.3  0.76]
    >>  [1.08 0.19 0.38 0.37 1.2 ]
    >>  [0.24 0.38 0.05 0.92 0.32]
    >>  [0.35 0.86 0.23 0.91 0.3 ]
    >>  [0.95 0.42 0.93 0.23 1.  ]]
    >> Top 3 de chaque spectateur :
    >> [['Alice' 'Amour sur Mars' 'Action et sentiments' 'Coup de foudre']
    >>  ['Bilal' 'Zombies en vacances' 'Coup de foudre' 'Amour sur Mars']
    >>  ['Chloé' 'Action et sentiments' 'Galaxie lointaine' 'Rire aux éclats']
    >>  ['David' 'Zombies en vacances' 'Mission Explosive' 'Rire aux éclats']
    >>  ['Emma' 'Galaxie lointaine' 'La maison hantée' 'Zombies en vacances']]
    >> Similarité des goûts :
    >> [[1.   0.22 0.53 0.3  0.97]
    >>  [0.22 1.   0.38 0.65 0.14]
    >>  [0.53 0.38 1.   0.11 0.47]
    >>  [0.3  0.65 0.11 1.   0.32]
    >>  [0.97 0.14 0.47 0.32 1.  ]]
    >> Goûts les plus proches : Alice et Emma (0.97)
    >> Plus proche voisin d'Alice : Emma
    >> Films à proposer à Alice : ['Action et sentiments' 'Amour sur Mars']
    >> Scores d'un million de films pour 5 spectateurs : (1000000, 5) en 0.023 s

.. success::
    Vous avez construit un petit système de recommandation sans écrire une seule boucle : scores, filtrage par masque, tri, normalisation et similarité ne sont que des opérations sur des matrices. C'est ce qui permet aux systèmes d'IA de traiter des millions de données en une fraction de seconde.
.. FIN GROUPE

.. MASQUER
.. slide::
✅ Récapitulatif de Chapitre
-------------------------

- **Qu'est-ce que ``numpy`` ?**
    - Bibliothèque essentielle pour les projets de data science, calcul scientifique et apprentissage automatique.
    - Optimisée pour le traitement de grandes quantités de données numériques.
    - Offre des fonctionnalités pour créer et manipuler des arrays et effectuer des opérations mathématiques complexes rapidement.

- **Avantages de ``numpy`` :**
    - **Efficacité** : Opérations sur les arrays plus rapides que sur les listes Python.
    - **Syntaxe simplifiée** : Opérations mathématiques vectorisées réduisant le code.
    - **Écosystème étendu** : Utilisé par d'autres bibliothèques comme ``pandas``, ``scipy``, ``scikit-learn``.

.. - Installation via ``pip`` : ``pip install numpy``
.. - Importation standard : ``import numpy as np``

1. **Création et Manipulation des Arrays**

    - **Créer un array à partir d'une liste :**
        - Array 1D : ``np.array([1, 2, 3, 4, 5])``
        - Array 2D (matrice) : ``np.array([[1, 2, 3], [4, 5, 6]])``

    - **Utiliser des fonctions prédéfinies :**

        - ``np.zeros((n, m))`` : Array de zéros de taille ``n x m``.
        - ``np.ones((n, m))`` : Array de uns de taille ``n x m``.
        - ``np.arange(start, stop, step)`` : Valeurs de ``start`` à ``stop`` avec un pas ``step``.
        - ``np.linspace(start, stop, num)`` : num valeurs également espacées entre ``start`` et ``stop``.

2. **Accès aux Éléments et Slicing**

    - **Accéder aux éléments avec des indices** :
        - Par position : ``array[i, j]`` (ligne ``i``, colonne ``j``)
        - Par ligne : ``array[i, :]`` (``:`` pour sélectionner toutes les colonnes)
        - Par colonne : ``array[:, j]`` (``:`` pour sélectionner toutes les lignes)

3. **Opérations Mathématiques avec** ``numpy``

    - **Opérations élémentaires :** Addition, soustraction, multiplication, division appliquées élément par élément. (``+, -, *, /``)

    - **Fonctions mathématiques avancées :**

        - Exponentielle : ``np.exp(array)``
        - Logarithme : ``np.log(array)``
        - Racine carrée : ``np.sqrt(array)``
        - Puissance : ``np.power(array, n)``

4. **Fonctions d'Agrégation**

    - **Calcul de statistiques sur les arrays** :

        - Somme : ``np.sum(array)``
        - Moyenne : ``np.mean(array)``
        - Écart-type : ``np.std(array)``
        - Minimum/Maximum : ``np.min(array)``, ``np.max(array)``
        - Indice du min/max : ``np.argmin(array)``, ``np.argmax(array)``

    - Application sur des axes spécifiques avec l'argument ``axis``.

5. **Manipulation de la Forme des Arrays**

    - Changer la forme avec ``reshape`` :  ``array.reshape((nouvelle_lignes, nouvelle_colonnes))``

    - Aplatir un array avec ``flatten`` : ``array_flat = array.flatten()``

    - Concaténer des arrays avec ``concatenate`` : ``np.concatenate((array1, array2), axis=0)``

6. **Indexation et Filtrage Avancés**

    - Indexation par masque booléen : ``array[array > 3]`` (Sélectionne les éléments supérieurs à 3)

    - Indexation par position : ``array[[0, 2, 4]]`` (Sélectionne les éléments aux indices 0, 2 et 4)

    - Modification via un masque : ``array[array > 4] = 3`` (Remplace les valeurs supérieures à 4 par 3)


7. **Génération de Nombres Aléatoires**

    - Nombres aléatoires entre 0 et 1 : ``np.random.rand(n)``

    - Nombres entiers aléatoires : ``np.random.randint(debut, fin, size)``

    - Échantillonnage aléatoire : ``np.random.choice(array, size, replace)``

    - Fixer la seed pour reproductibilité : ``np.random.seed(fixed_seed)``
.. FIN MASQUER


.. slide::
🏋️ Exercices supplémentaires
--------------------

.. toctree::

    exos_sup_chap5
