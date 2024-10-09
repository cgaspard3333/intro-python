.. slide::

Chapitre 3 - Fonctions, types construits et modules
===================================================

🎯 Objectifs du Chapitre
---------------------

.. important:: 
    - Comprendre ce qu'est une fonction en Python et apprendre à les définir et à les utiliser.
    - Découvrir l’importance de la réutilisation du code et de la modularité grâce aux fonctions.
    - Introduction aux types construits (listes, tuples, dictionnaires).
    - Apprendre à utiliser des modules pour organiser et enrichir les programmes.

.. slide::
📖 Les fonctions
----------------

Qu'est-ce qu'une fonction ?
~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. note::
    Une fonction est un **bloc de code réutilisable** qui permet d'effectuer une tâche spécifique. Elle prend en entrée des **arguments** et retourne un **résultat**. Les fonctions permettent de **découper un programme en sous-programmes** plus petits et plus faciles à gérer.  

.. slide::
**Définir une fonction**

En Python, une fonction se définit avec le mot-clé ``def`` suivi du nom de la fonction, des parenthèses (qui peuvent contenir des paramètres), et d’un bloc de code indenté.

.. warning::
    Exemple :
    .. code-block:: python
        def nom_de_la_fonction(param1, param2):
            # Bloc de code qui s'exécute
            return résultat  # (optionnel)

.. slide::
Pour **appeler** une fonction (c'est à dire l'exécuter), on utilise son nom suivi de parenthèses contenant les arguments à passer à la fonction.

.. warning::
    Exemple :
    .. code-block:: python
        def addition(a, b):
            c = a + b
            return c

        print(addition(2, 3))
        >> 5

.. slide::
**Paramètres et arugments**
.. discoverList::
    * Les **paramètres** sont des variables définies dans la déclaration de la fonction.
    * Les **arguments** sont les valeurs que l’on passe à la fonction lorsqu’on l’appelle.

.. warning::
    Exemples :
    .. code-block:: python
        def addition(a, b):  # a et b sont les paramètres
            c = a + b
            return c
            
    ``a`` et ``b`` sont les **paramètres** de la fonction. Ce sont des variables locales à la fonction qui reçoivent des valeurs lorsque la fonction est appelée. 

    .. code-block:: python
        print(addition(2, 3))  # 2 et 3 sont les **arguments** passés à la fonction
        >> 5

    ``2`` et ``3`` sont les **arguments**. Ce sont les valeurs que l'on passe à la fonction lorsque celle-ci est appelée. Ces valeurs sont affectées aux paramètres ``a`` et ``b`` à l'intérieur de la fonction.

.. slide::
**Valeurs de retour (*return*)**

Une fonction peut **retourner** une valeur avec l’instruction ``return``. Si aucune valeur n'est retournée, Python renvoie ``None`` par défaut. La valeur retournée peut être de n'importe quel type (entier, chaîne de caractères, liste, etc.). La valeur retournée est la valeur par laquelle est remplacée l'appel de la fonction.

.. warning::
    Exemple :
    .. code-block:: python
        def addition(a, b):
            c = a + b
            return c # Retourne la somme des deux paramètres

        print(addition(2, 3)) # addition(2, 3) est remplacé par la valeur 
                              # retournée par la fonction ce qui donne : print(5)
        >> 5

    Dans cet exemple, la fonction ``addition`` retourne la somme des deux paramètres ``a`` et ``b``. Lorsque la fonction est appelée avec les arguments ``2`` et ``3``, elle retourne la valeur ``5`` qui est affichée par la fonction ``print()``.

.. slide::
**Portée des variables**

.. note::
    Les variables définies à l’intérieur d’une fonction sont **locales** à cette fonction. Cela signifie qu'**elles ne sont pas accessibles en dehors de la fonction**.

.. warning::
    Exemple :
    .. code-block:: python
        def fonction_a():
            x = 10  # Variable locale
        return x

        print(x) # La variable x n'est pas accessible en dehors de la fonction
        >> NameError: name 'x' is not defined

.. slide::
✏️ Exercice 7 : Calculatrice simple avec fonctions
--------------------------------------------------

**Objectif** : Écrire un programme qui permet de réaliser des opérations arithmétiques simples (addition, soustraction, multiplication, division) à l'aide de fonctions.

**Etapes à suivre** :

.. step:: 
    Créer une fonction ``addition(a, b)`` qui prend en paramètre deux nombres et retourne leur somme.
.. step:: 
    Créer une fonction ``soustraction(a, b)`` qui prend en paramètre deux nombres et retourne leur différence.
.. step:: 
    Créer une fonction ``multiplication(a, b)`` qui prend en paramètre deux nombres et retourne leur produit.
.. step:: 
    Créer une fonction ``division(a, b)`` qui prend en paramètre deux nombres et retourne leur quotient.
.. step:: 
    Demander à l'utilisateur de saisir deux nombres flottants et une opération arithmétique à réaliser. Pour choisir l'opération, l'utilisateur doit saisir un symbole associé (``+``, ``-``, ``*``, ``/``).
.. step:: 
    Utiliser les fonctions précédemment créées pour afficher le résultat de l'opération demandée.

**Notes** : 
.. discoverList::
    * Ne pas oublier de gérer les cas d'erreur (division par zéro, opération non reconnue, etc.).
    * Cet exercice est le même que l'exercice sup. 2 du chaptire 2 mais en utilisant des fonctions.

.. slide::
📖 Les types construits
------------------------

A partir des types de base, on peut construire des types plus complexes appelés **types construits**. Les types construits les plus courants sont les listes, les p-uplets et les dictionnaires, ils sont génériques et peuvent être mis en oeuvre dans de nombreux langages de programmation. 

.. slide::
Les p-uplets (*tuple*)
~~~~~~~~~~~~~~~~~~~~~~~~
.. note::
    Un p-uplet est une **collection ordonnée d'éléments**. Chaque élément peut être de n'importe quel type. Les p-uplets sont **immuables**, c'est-à-dire qu'ils ne peuvent pas être modifiés après leur création. Si les valeurs du p-uplet doivent être changées au cours de l'execution du programme alors il faut utiliser un autre type de variable comme une liste/tableau (voir partie suivante : :doc:`Les tableaux <chap3#tableaux>`).

.. slide::
**Création d'un p-uplet**

Pour créer un p-uplet, on utilise des **parenthèses** et on sépare les éléments par des **virgules**.

.. warning::
    Exemple : 
    .. code-block:: python

        # Création d'un p-uplet
        p = (1, 2, 3, 4, 5)
        print(p)
        >> (1, 2, 3, 4, 5)

.. note::
    **Un p-uplet ne contenant qu'un seul élément doit être suivi d'une virgule**. Cela permet de différencier un p-uplet d'une expression entre parenthèses.
.. warning::
    Exemple : ``p = (1,)`` et non ``p = (1)``

.. slide::
**Accès aux éléments d'un p-uplet**

Pour accéder à un élément d'un p-uplet, on utilise l'index de l'élément (sa position dans le p-uplet). Pour un p-uplet de taille n, les indexs des éléments vont de 0 à n-1.  

``p[i]`` permet d'accéder à l'élément à l'index ``i`` du p-uplet ``p``.

.. warning::
    Exemple :
    .. code-block:: python
        
        p = (1, 2, 3, 4, 5)
        print(p[0]) # Permet d'accéder à l'élément à l'index 0 du p-uplet p
        >> 1
        print(p[4]) # Permet d'accéder à l'élément en 5eme position (index 4) du p-uplet p
        >> 5

.. slide::
La fonction ``len()`` permet de connaître la taille d'un p-uplet. Elle permet par exemple d'accéder au dernier élément d'un p-uplet.

.. warning::
    Exemple :
    .. code-block:: python

        p = (6, 7, 8, 9, 10)
        print(len(p)) # Permet de connaître la taille du p-uplet p
        >> 5
        print(p[len(p)-1]) # Permet d'accéder au dernier élément du p-uplet p
        >> 10

.. _tableaux:

.. slide::
Les tableaux / Les listes (*list*)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. note::
    Un tableau est une collection ordonnée d'éléments qui sont organisés séquentiellements (les uns à la suite des autres). Contrairement aux p-uplets, les tableaux sont **mutables/muables**, c'est-à-dire qu'ils peuvent être modifiés après leur création.  
    En Python, les tableaux sont appelés **listes**.

.. slide::
**Création d'une liste**

Les listes sont créées en utilisant des **crochets** et en séparant les éléments par des **virgules**.

.. warning::
    Exemple :
    .. code-block:: python

        # Création d'une liste
        l = [1, 2, 3, 4, 5]
        print(l)
        >> [1, 2, 3, 4, 5]

.. slide::
**Accès aux éléments d'une liste**

De la même manière que pour un p-uplet, pour accéder à un élément d'une liste, on utilise l'index de l'élément. Pour une liste de taille n, les indexs des éléments vont de 0 à n-1.  

``l[i]`` permet d'accéder à l'élément à l'index ``i`` de la liste ``l``.

.. warning::
    Exemple :
    .. code-block:: python

        l = [1, 2, 3, 4, 5]
        print(l[0]) # Permet d'accéder à l'élément à l'index 0 de la liste l
        >> 1
        print(l[4]) # Permet d'accéder à l'élément en 5eme position (index 4) de la liste l
        >> 5

.. slide::
**Modification d'une liste par affectation**

Pour modifier un élément d'une liste, on utilise l'index de l'élément et on lui affecte une nouvelle valeur.

.. warning::
    Exemple :
    .. code-block:: python

        l = [1, 2, 3, 4, 5]
        l[1] = 10 # Modifie la valeur de l'élément à l'index 1 de la liste l
        print(l)
        >> [1, 10, 3, 4, 5]

.. slide::
**Ajout/suppression d'éléments d'une liste**
.. discoverList::
    * Pour ajouter une valeur à la fin une liste, on utilise la méthode ``append()``.
    * Pour supprimer une valeur d'une liste, on utilise la méthode ``remove()``.

.. warning::
    Exemple :
    .. code-block:: python

        l = [1, 2, 3, 4, 5]
        l.append(6) # Ajoute l'élément 6 à la fin de la liste l
        print(l)
        >> [1, 2, 3, 4, 5, 6]

        l.remove(3) # Supprime l'élément 3 de la liste l
        print(l)
        >> [1, 2, 4, 5, 6]

        l.remove(l[0]) # Supprime le premier élément de la liste l
        print(l)
        >> [2, 4, 5, 6]

.. slide::
Les dictionnaires (*dict*)
~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. note::
    Un dictionnaire est une collection d'éléments **non ordonnée**. Chaque élément est constitué d'une **clé** et d'une **valeur**. Les dictionnaires sont **mutables/muables**. Les clés doivent être uniques et les valeurs peuvent être de n'importe quel type.

.. slide::
**Création d'un dictionnaire**

Un nouveau dictionnaire est créé en utilisant des **accolades** et en séparant les éléments par des **virgules**. Chaque élément est constitué d'une **clé** et d'une **valeur** séparées par deux points (``clé: valeur``).

.. warning::
    Exemple :
    .. code-block:: python
        #                     valeurs
        #      ____________________________________
        #      |                  |               |
        d = {"nom": "Dupont", "prénom": "Jean", "âge": 30}
        #              |                   |            |
        #              ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
        #                              clés

.. slide::
**Accès aux éléments d'un dictionnaire**

Les éléments d'un dictionnaire ne sont pas indexés (non-ordonnés) comme les listes et p-uplets. Il est donc impossible d'accéder au n-ième élément d'un dictionnaire. Pour accéder à une valeur, on utilise la clé associée à cette valeur. C'est la raison pour laquelle les clés doivent être uniques.

``d[clé]`` permet d'accéder à la valeur associée à la clé ``clé`` du dictionnaire ``d``.

.. warning::
    Exemple :
    .. code-block:: python

        d = {"nom": "Dupont", "prénom": "Jean", "âge": 30}
        print(d["nom"]) # Accès à la valeur associée à la clé "nom" du dictionnaire d
        >> Dupont
        print(d[0])
        >> KeyError: 0 # Renvoie une erreur car la clé 0 n'existe pas dans le dictionnaire d

.. slide::
**Modification d'un dictionnaire par affectation**

Il est possible de modifier, ajouter ou supprimer des éléments d'un dictionnaire en utilisant la clé associée à l'élément.

.. warning::
    Exemple :
    .. code-block:: python

        d = {"nom": "Dupont", "prénom": "Jean", "âge": 30}
        d["âge"] = 31 # Modifie la valeur associée à la clé "âge" du dictionnaire d
        print(d)
        >> {"nom": "Dupont", "prénom": "Jean", "âge": 31}

        d["ville"] = "Paris" # Ajoute un nouvel élément au dictionnaire d
        print(d)
        >> {"nom": "Dupont", "prénom": "Jean", "âge": 31, "ville": "Paris"}

        del d["prénom"] # Supprime l'élément associé à la clé "prénom" du dictionnaire d
        print(d)
        >> {"nom": "Dupont", "âge": 31, "ville": "Paris"}

.. slide::
**Méthodes spécifiques aux dictionnaires**
.. discoverList::
    * La méthode ``keys()`` permet de récupérer la liste des clés d'un dictionnaire.
    * La méthode ``values()`` permet de récupérer la liste des valeurs d'un dictionnaire.
    * La méthode ``items()`` permet de récupérer la liste des couples clé-valeur d'un dictionnaire.

.. note::
    Le fait d'avoir ces éléments sous forme de liste permet de les manipuler plus facilement (par exemple pour les parcourir avec une boucle).
    En effet, comme les dictionnaires ne sont pas ordonnés, il n'est donc **pas possible de les parcourir avec une boucle** ``for`` classique par exemple.

.. warning::
    Exemple :
    .. code-block:: python

        d = {"nom": "Dupont", "prénom": "Jean", "âge": 30}
        print(d.keys()) # Récupère la liste des clés du dictionnaire d
        >> dict_keys(['nom', 'prénom', 'âge'])

        print(d.values()) # Récupère la liste des valeurs du dictionnaire d
        >> dict_values(['Dupont', 'Jean', 30])

        print(d.items()) # Récupère la liste des couples clé-valeur du dictionnaire d
        >> dict_items([('nom', 'Dupont'), ('prénom', 'Jean'), ('âge', 30)])

.. slide::
✏️ Exercice 8 : Gestion d'un carnet d'adresses
----------------------------------------------
**Objectif** : Écrire un programme qui permet de gérer un carnet d'adresses à l'aide d'un dictionnaire.

.. .. slide::
.. Récapitulatif de Chapitre
.. -------------------------

.. .. |puplet_notation| div::
..     .. center::
..     ``(1, 8, 5)``

.. .. |tableau_notation| div::
..     .. center::
..     ``[1, 8, 5]``

.. .. |dictionnaire_notation| div::
..     .. center::
..     ``{1: 'Paul', 2: 'Tom', 3: 'Nadia'}``

.. ---

.. .. |puplet_construction| div::
..     .. center::
..     P-uplet vide: ``t = ()``
    
..     ``t1 = (1, 8, 5)``

.. .. |tableau_construction| div::
..     .. center::
..     Liste vide: ``L = []``
    
..     ``L1 = [1, 8, 5]``

.. .. |dictionnaire_construction| div::
..     .. center::
..     Dictionnaire vide: ``D = {}``
    
..     ``d1 = {1: 'Paul', 2: 'Tom', 3: 'Nadia'}``

.. ---

.. .. |puplet_elements| div::
..     .. center::
..     **Oui**
    
..     ``t2 = (1, 'b', True)``

.. .. |tableau_elements| div::
..     .. center::
..     **Oui**
    
..     ``L2 = [1, 'b', True]``

.. .. |dictionnaire_elements| div::
..     .. center::
..     Les clés peuvent être de tout type, à condition d’être non modifiables: *int, str, tuple*
    
..     ``d2 = {4: 'Léa', 5: 'Téo'}``

.. ---

.. .. |puplet_lecture| div::
..     .. center::
..     ``t1[0]`` renvoie ``1``
    
..     ``t1[-1]`` renvoie le dernier élément de ``t1``, soit ``5``
    
..     ``t2[2]`` renvoie ``True``

.. .. |tableau_lecture| div::
..     .. center::
..     ``L1[0]`` renvoie ``1``
    
..     ``L1[-1]`` renvoie le dernier élément de ``L1``, soit ``5``
    
..     ``L2[2]`` renvoie ``True``

.. .. |dictionnaire_lecture| div::
..     .. center::
..     ``d1[0]`` renvoie une erreur (clé inexistante)
    
..     ``d1[1]`` renvoie ``'Paul'``

.. ---

.. .. |puplet_concatenation| div::
..     .. center::
..     ``t1 + t2`` renvoie
    
..     ``(1, 8, 5, 1, 'b', True)``

.. .. |tableau_concatenation| div::
..     .. center::
..     ``L1 + L2`` renvoie 
    
..     ``[1, 8, 5, 1, 'b', True]``

.. .. |dictionnaire_concatenation| div::
..     .. center::
..     **Non**
    
..     ``d1 + d2`` renvoie une erreur de type

.. ---

.. .. |puplet_multiplication| div::
..     .. center::
..     ``2 * t1`` renvoie ``(1, 8, 5, 1, 8, 5)``

.. .. |tableau_multiplication| div::
..     .. center::
..     ``2 * L1`` renvoie ``[1, 8, 5, 1, 8, 5]``

.. .. |dictionnaire_multiplication| div::
..     .. center::
       
..     **Non**

..     ``2 * d1`` renvoie une erreur

.. ---

.. .. |puplet_modifiable| div::
..     .. center::
..     **Non**
    
..     On peut créer un nouveau p-uplet

.. .. |tableau_modifiable| div::
..     .. center::
..     **Oui**
    
..     Avec l'instruction ``L1[2] = 4``, ``L1`` devient ``[1, 8, 4]``

.. .. |dictionnaire_modifiable| div::
..     .. center::
..     On peut modifier les valeurs, mais pas les clés
    
..     Exemple: ``d1[2] = 'Joe'`` remplace ``'Tom'`` par ``'Joe'``

.. ---

.. .. |puplet_longueur| div::
..     .. center::
..     ``len(t1)`` renvoie ``3``

.. .. |tableau_longueur| div::
..     .. center::
..     ``len(L1)`` renvoie ``3``

.. .. |dictionnaire_longueur| div::
..     .. center::
..     ``len(d1)`` renvoie ``3``

.. ---

.. .. |puplet_methodes| div::
..     .. center::
..     Pas de méthode spécifique à connaître

.. .. |tableau_methodes| div::
..     .. center::
..     ``L1.append(element)`` ajoute ``element`` à la fin de ``L1``

.. .. |dictionnaire_methodes| div::
..     .. center::
..     ``d1.items()`` renvoie la collection d’objets
    
..     ``d1.keys()`` renvoie les clés
    
..     ``d1.values()`` renvoie les valeurs

.. .. center::
..     +------------------------+------------------------+--------------------------+--------------------------------------+
..     |                        | **P-uplet**            | **Tableau (liste)**      | **Dictionnaire**                     |
..     +========================+========================+==========================+======================================+
..     | **Notation**           | |puplet_notation|      | |tableau_notation|       | |dictionnaire_notation|              |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     +------------------------+------------------------+--------------------------+--------------------------------------+
..     | **Construction**       | |puplet_construction|  | |tableau_construction|   | |dictionnaire_construction|          |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     +------------------------+------------------------+--------------------------+--------------------------------------+
..     | **Les élements**       | |puplet_elements|      | |tableau_elements|       | |dictionnaire_elements|              |
..     | **internes peuvent**   |                        |                          |                                      |
..     | **être de différents** |                        |                          |                                      |
..     | **types**              |                        |                          |                                      |
..     +------------------------+------------------------+--------------------------+--------------------------------------+
..     | **Lecture du contenu** | |puplet_lecture|       | |tableau_lecture|        | |dictionnaire_lecture|               |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     +------------------------+------------------------+--------------------------+--------------------------------------+
..     | **Concaténation**      | |puplet_concatenation| | |tableau_concatenation|  | |dictionnaire_concatenation|         |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     +------------------------+------------------------+--------------------------+--------------------------------------+
..     | **Multiplication**     | |puplet_multiplication|| |tableau_multiplication| | |dictionnaire_multiplication|        |
..     | **par un entier**      |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     +------------------------+------------------------+--------------------------+--------------------------------------+
..     | **Modifiable par**     | |puplet_modifiable|    | |tableau_modifiable|     | |dictionnaire_modifiable|            |
..     | **affectation**        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     +------------------------+------------------------+--------------------------+--------------------------------------+
..     | **Longueur**           | |puplet_longueur|      | |tableau_longueur|       | |dictionnaire_longueur|              |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     +------------------------+------------------------+--------------------------+--------------------------------------+
..     | **Méthodes**           | |puplet_methodes|      | |tableau_methodes|       | |dictionnaire_methodes|              |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     |                        |                        |                          |                                      |
..     +------------------------+------------------------+--------------------------+--------------------------------------+

🏋️ Exercices supplémentaires
--------------------

.. toctree::

    exos_sup_chap3