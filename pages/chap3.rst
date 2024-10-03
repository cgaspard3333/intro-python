Chapitre 3 - Fonctions, types construits et modules
===================================================

Objectifs
---------

.. important:: 
    - Comprendre ce qu'est une fonction en Python et apprendre à les définir et à les utiliser.
    - Découvrir l’importance de la réutilisation du code et de la modularité grâce aux fonctions.
    - Introduction aux types construits (listes, tuples, dictionnaires).
    - Apprendre à utiliser des modules pour organiser et enrichir les programmes.

📖 Les fonctions
----------------

Qu'est-ce qu'une fonction ?
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Une fonction est un **bloc de code réutilisable** qui permet d'effectuer une tâche spécifique. Elle prend en entrée des **arguments** et retourne un **résultat**. Les fonctions permettent de **découper un programme en sous-programmes** plus petits et plus faciles à gérer.  

**Définir une fonction**

En Python, une fonction se définit avec le mot-clé ``def`` suivi du nom de la fonction, des parenthèses (qui peuvent contenir des paramètres), et d’un bloc de code indenté.

.. warning::
    Exemple :
    .. code-block:: python
        def nom_de_la_fonction(param1, param2):
            # Bloc de code qui s'exécute
            return résultat  # (optionnel)

Pour **appeler** une fonction (c'est à dire l'exécuter), on utilise son nom suivi de parenthèses contenant les arguments à passer à la fonction.

.. warning::
    Exemple :
    .. code-block:: python
        def addition(a, b):
            c = a + b
            return c

        print(addition(2, 3))
        >> 5

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

    ``5`` et ``3`` sont les **arguments**. Ce sont les valeurs que l'on passe à la fonction lorsque celle-ci est appelée. Ces valeurs sont affectées aux paramètres ``a`` et ``b`` à l'intérieur de la fonction.
    
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
    Demander à l'utilisateur de saisir deux nombres et une opération arithmétique à réaliser. Pour choisir l'opération, l'utilisateur doit saisir un symbole associé (``+``, ``-``, ``*``, ``/``).
.. step:: 
    Utiliser les fonctions précédemment créées pour afficher le résultat de l'opération demandée.

📖 Les types construits
------------------------

A partir des types de base, on peut construire des types plus complexes appelés **types construits**. Les types construits les plus courants sont les listes, les p-uplets et les dictionnaires, ils sont génériques et peuvent être mis en oeuvre dans de nombreux langages de programmation. 

Les p-uplets (*tuple*)
~~~~~~~~~~~~~~~~~~~~~~~~

Un p-uplet est une **collection ordonnée d'éléments**. Chaque élément peut être de n'importe quel type. Les p-uplets sont **immuables**, c'est-à-dire qu'ils ne peuvent pas être modifiés après leur création. Si les valeurs du p-uplet doivent être changées au cours de l'execution du programme alors il faut utiliser un autre type de type de variable comme une liste/tableau (voir partie suivante : :doc:`Les tableaux <chap3#tableaux>`).

**Création d'un p-uplet**

Pour créer un p-uplet, on utilise des parenthèses et on sépare les éléments par des virgules.

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

Les tableaux / Les listes (*list*)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

