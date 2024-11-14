.. slide::

Chapitre 5 - Introduction à ``numpy``
=====================================

🎯 Objectifs du Chapitre
---------------------

.. important:: 
    - Découvrir la bibliothèque ``numpy``, une des bibliothèques les plus utilisées en Python pour le calcul scientifique et la manipulation de données numériques.
    - Apprendre à créer et manipuler des tableaux (ou arrays) de données, à effectuer des opérations mathématiques efficaces et à utiliser des fonctions puissantes de numpy.

.. slide::
📖 Le package ``numpy``
-----------------------

Qu'est-ce que ``numpy`` ?
~~~~~~~~~~~~~~~~~~~~~~~~

.. note::
    ``numpy``(Numerical Python) est une **bibliothèque de calcul numérique** en Python, essentielle pour les projets de data science, de calcul scientifique et d'apprentissage automatique. Elle est optimisée pour le **traitement de grandes quantités de données**, offrant des fonctionnalités pour **créer et manipuler des tableaux multidimensionnels** (appelés arrays) et effectuer des **opérations mathématiques complexes de manière rapide et efficace**. Ils sont doncs largement dans les domaines ou la performance est un enjeu, comme le Machine Learning, le traitement d'images, etc.

Les avantages de numpy incluent :

- **Efficacité** : Les opérations sur les arrays numpy sont souvent beaucoup plus rapides que les listes Python.
- **Simplicité syntaxique** : Des opérations mathématiques vectorisées qui réduisent le code.
- **Large écosystème** : Utilisé par d’autres bibliothèques comme pandas, scipy, scikit-learn.

.. slide::
Installation de ``numpy``
~~~~~~~~~~~~~~~~~~~~~~~~~

Si numpy n’est pas déjà installé, vous pouvez l’installer via ``pip`` :

.. code-block:: bash
    pip install numpy

Une fois installé, il est courant de l’importer avec l’abréviation ``np`` pour simplifier son utilisation :

.. code-block:: python
    import numpy as np

.. slide::
Les tableaux ``numpy``
~~~~~~~~~~~~~~~~~~~~~~

Contrairement aux listes Python, les arrays ``numpy`` sont optimisés pour contenir des données de même type (typiquement des nombres) et permettent des opérations mathématiques efficaces.
Un array numpy peut être un tableau 1D (vecteur/liste), un tableau 2D (matrice) ou un tableau de dimensions supérieures.

**Créer un tableau ``numpy``**  
*A) A partir d'une liste Python*  

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
*B) Avec des fonctions prédéfinies*  

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
**Accéder aux éléments d'un tableau**

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
Opérations mathématiques avec ``numpy``
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

``numpy`` permet d’effectuer des opérations mathématiques de manière vectorisée, ce qui signifie que les opérations s’appliquent directement sur tous les éléments d’un array sans besoin de boucles explicites.

**Opérations élémentaires**
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
**Opérations mathématiques avancées**
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
Fonctions d'agrégation
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
Manipulation de la forme des arrays
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

``numpy`` propose des outils puissants pour manipuler et changer la forme des arrays sans modifier leurs données.

**Changer la forme d'un array avec reshape**

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
**Aplatir un array multidimensionnel avec ``flatten``**

La fonction ``flatten`` transforme un array multidimensionnel en un array 1D.

.. warning::
    Exemple :
    .. code-block:: python
        array = np.array([[1, 2, 3], [4, 5, 6]])
        array_flattened = array.flatten()

        print(array_flattened)
        >> [1 2 3 4 5 6]

.. slide::
**Concaténer des arrays avec ``concatenate``**

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
Indexation et filtrage avancés
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

``numpy`` offre des fonctionnalités avancées pour sélectionner des éléments spécifiques dans un array en fonction de certaines conditions.

**Indexation par masque booléen**

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
**Indexation par position**

On peut sélectionner plusieurs éléments en utilisant des listes d'indices.

.. warning::
    Exemple :
    .. code-block:: python
        array = np.array([10, 20, 30, 40, 50])

        indices = [0, 2, 4]
        print(array[indices])
        
        >> [10 30 50]

.. slide::
**Modification d'élements via un masque**

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
Génération de nombres aléatoires avec ``numpy``
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

``numpy`` propose des fonctions pour générer des nombres aléatoires selon différentes distributions.

**Nombres aléatoires entre 0 et 1**

``np.random.rand()`` génère des nombres aléatoires à virgule flottante entre 0 et 1.

.. warning::
    Exemple :
    .. code-block:: python
        import numpy as np

        random_values = np.random.rand(5)
        print(random_values)  
        
        >> [0.572 0.832 0.453 0.271 0.928]

.. slide::
**Nombres aléatoires entiers**

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
**Echantillonage aléatoire**

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
**Graine aléatoire (seed)**

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
Interdiction d'utiliser des boucles ``for`` ou ``while`` (sauf explicitement demandé), les opérations vectorisées de ``numpy`` permettent de réaliser des opérations sur l'ensemble des éléments d'un array sans avoir à utiliser de boucles (et surtout le temps de calcul en est réduit).

.. important::
    Tout au long de l'exercice, dès qu'il sera demandé de créer un array aléatoire, vous devrez fixer la seed à 42.

**Questions simples** :

.. step::
    A quoi sert de fixer la seed aléatoire dans un programme ?

.. step::
    Créer un array nul de taille 100.

.. step::
    Créer un array de taille 10 avec des valeurs aléatoires entre 0 et 1.

.. step::
    Créer un array nul de taille 10 mais dont la septième valeur est égale à 1.

.. step::
    Créer un array 2D identité de taille (3, 3) (On appelle une matrice identité une matrice carrée dont tous les éléments sont nuls, sauf ceux de la diagonale principale qui sont égaux à 1).

.. step:: 
    Créer un array de taille 10 avec des valeurs entières aléatoires entre 1 et 10, puis remplacer les valeurs supérieures à 5 par 0.

.. step::
    Créer un array de taille 10 avec des valeurs aléatoires entre 1 et 10, puis remplacer les valeurs entre 3 et 7 par 0.

.. step::
    Créer un array de taille 40 aléatoire et calculer sa valeur moyenne (utiliser les fonctions de numpy)

.. step::
    Créer un array de taille 30 aléatoire et trouver ses valeur maximale et minimale (utiliser les fonctions de numpy)

.. step::
    Créer un array de taille 20 aléatoire et calculer la somme de ses valeurs (utiliser les fonctions de numpy)

.. step::
    Créer un array 2D de taille (4, 4) avec des 1 sur les bords et des 0 à l'intérieur.

.. step::
    Créer un array 2D de taille (2, 2), puis lui ajouter une bordure de 0 tout autour.

.. step::
    Créer un array 2D de taille (5, 5) avec les valeurs 1, 2, 3, 4 juste en dessous de la diagonale principale.

.. step::
    Créer un array 2D de taille (10,10) et remplir ses valeurs de sorte à créer un damier (alternance de 0 et 1) sans utiliser la fonction ``np.tile()``.

.. step::
    Créer un array 2D de taille (6, 6) et remplir ses valeurs de sorte à créer un damer en utilisant la fonction ``np.tile()``.

.. step::
    Normaliser un array de taille 50 aléatoire et expliquer ce que signifie la normalisation.

.. step:: 
    Multiplier un array 2D aléatoire de taille (5, 4) par l'array 2D aléatoire de taille (4, 2). 

.. step::
    Expliquer comment trouver des valeurs communes entre deux arrays.

**Questions plus complexes** :

.. step::
    Trouver la partie entière d'un array aléatoire dont les valeurs sont uniquement positives en utilisant 3 méthodes différentes.

.. step::
    Créer un array de taille (6, 6) dont les valeurs de chaque lignes dont les nombres entiers allant de 0 à 5.

.. step::
    Créer une fonction qui génère des nombres aléatoires, puis l'utiliser pour générer un array de taille 10.

.. step::
    Créer un array de taille 15 aléatoire, puis trier ses valeurs.

.. step::
    Créer deux arrays puis vérifier s'ils sont égaux.

.. step::
    Créer un array et le rendre immuable (non modifiable).

.. step::
    Créer un array aléatoire de taille 15 puis remplacer sa valeur minimale par 100.

.. step::
    Convertir un array de float (32bits) en un array de int (32bits).

.. step::
    Expliquer comment vérifier si un array contient des colonnes nulles.

.. step::
    Comment trouver la valeur la plus fréquente dans un array ?

.. step::
    Créer un array de taille 10 aléatoire, puis échanger les lignes 3 et 6.