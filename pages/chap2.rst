.. GROUPE B
.. slide::

Chapitre 2 - Conditions et boucles
======================

🎯 Objectifs du Chapitre
----------------------

.. important::
    - Apprendre à écrire des programmes dynamiques en utilisant des conditions (``if``, ``else``) et des boucles (``for``, ``while``).
    - Comprendre l’importance des structures de contrôle pour gérer le flux d'exécution d'un programme.
.. FIN GROUPE

.. slide::

📖 1. Les conditions (Structures de décision)
--------------

1.1 Principe des conditions
~~~~~~~~~~~~~~~~~~~~~~~

Les structures conditionnelles permettent de prendre des décisions dans un programme. En fonction de certaines conditions, différentes parties du code peuvent être exécutées.

.. discoverList::
    * ``if`` : vérifie une condition et exécute le bloc de code associé si elle est vraie.
    * ``elif`` : vérifie une autre condition lorsque la première est fausse et exécute le bloc de code associé si cette nouvelle condition est vraie.
    * ``else`` : exécute un bloc de code si toutes les conditions précédentes sont fausses

.. warning::
    Exemple :
    .. code-block:: python

        if condition:
            # Bloc de code exécuté si la condition est vraie
        elif autre_condition:
            # Bloc exécuté si la première condition est fausse et l’autre condition est vraie
        else:
            # Bloc exécuté si toutes les conditions précédentes sont fausses

.. note::
    Contrairement à d'autres langages tels que C/C++ ou même Java, Python utilise l’indentation (l'espace en début de ligne) pour délimiter les blocs de code.
    Cette indentation est réalisée avec la touche ``Tab`` du clavier. Le raccourci ``Shift + Tab`` permet de retirer une indentation.

.. slide::

1.2 Opérateurs de comparaison
~~~~~~~~~~~~~~~~~~~~~~~~~

Les opérateurs de comparaison permettent de comparer deux valeurs. Ils sont utilisés dans les conditions pour vérifier si une condition est vraie ou fausse :

.. discoverList::
    * ``==`` : égal à
    * ``!=`` : différent de
    * ``<`` : inférieur à
    * ``>`` : supérieur à
    * ``<=`` : inférieur ou égal à
    * ``>=`` : supérieur ou égal à

.. warning::
    Exemple :
    .. code-block:: python
        age = 18

        if age >= 18:
            print("Vous êtes majeur.")
        else:
            print("Vous êtes mineur.")
        >> Vous êtes majeur.

.. slide::

1.3 Opérateurs logiques
~~~~~~~~~~~~~~~~~~~

On peut combiner plusieurs conditions grâce aux opérateurs logiques :

.. discoverList::
    * ``and`` :  toutes les conditions doivent être vraies.
    * ``or`` : au moins une des conditions doit être vraie.
    * ``not`` : inverse la condition.

.. warning::
    Exemple :
    .. code-block:: python
        x = 12
        y = 3

        if x > 5 and y < 10:
            print("Les deux conditions sont vraies.")

        >> Les deux conditions sont vraies.

.. slide::

✏️ Exercice 3 : Un dressing intelligent
------------------------------------

.. GROUPE A
Un exemple d'organisation de vos dossiers/fichiers vous a été donné plus haut dans ce chapitre, vous pouvez vous en inspirer pour continuer à travailler de manière organisée tout au long de ce cours.
.. GROUPE B
Un exemple d'organisation de vos dossiers/fichiers vous a été donné dans le chapitre précédent, vous pouvez vous en inspirer pour continuer à travailler de manière organisée tout au long de ce cours.
.. FIN GROUPE

.. note:: 
    Rappel : Toujours ouvrir un dossier à l'ouverture de VSCode pour travailler à l'intérieur de celui-ci.

**Objectif** : Écrire un programme qui aide l’utilisateur à choisir une tenue en fonction de la température qu'il donne. 

.. step:: reset
    **Consigne** : Le programme demande à l’utilisateur la température extérieure et affiche une tenue de votre choix adaptée à la température en fonction des 4 cas suivants :

    .. discoverList::
        * Si la température est inférieure à 0°C
        * Si la température est entre 0°C et 10°C
        * Si la température est entre 10°C et 20°C
        * Si la température est supérieure à 20°C

.. success:: 
    Vous savez maintenant écrire des conditions simples.

.. slide::

✏️ Exercice 4 : Les tables de vérité
--------------------------------------------------------

Voici un tableau représentant les résultats des opérations logiques ``and`` et ``or`` :

.. center::
    +-------+-------+---------+--------+
    |   A   |   B   | A and B | A or B |
    +=======+=======+=========+========+
    | False | False | False   | False  |
    +-------+-------+---------+--------+
    | False | True  | **?**   | **?**  |
    +-------+-------+---------+--------+
    | True  | True  | **?**   | **?**  |
    +-------+-------+---------+--------+
    | True  | False | **?**   | **?**  |
    +-------+-------+---------+--------+

Ce tableau s'appelle une table de vérité. Elle permet de déterminer le résultat d'une opération logique en fonction des valeurs de vérité des variables ``A`` et ``B``.

.. step:: reset
    Écrire un programme qui demande à l'utilisateur les valeurs de vérité de ``A`` et ``B`` et affiche les résultats des opérations logiques ``and`` et ``or`` afin de compléter les tableaux ci-dessus. 

    .. note::
        La fonction ``bool()`` ne permet pas de convertir les chaînes de caractères ``"True"`` ou ``"False"`` en booléens. Pour cela, on utilise la fonction ``eval()``.

.. step::
    Quelle est la différence entre le fonctionnement de la fonction ``bool()`` et de la fonction ``eval()`` ?

.. GROUPE B
.. slide::

.. step::
    Faire de même pour la table de vérité de l'opération ``not(A and B)`` :

    .. center::
        +-------+-------+------------+
        |   A   |   B   | not(A and B)|
        +=======+=======+============+
        | False | False | **?**      |
        +-------+-------+------------+
        | False | True  | **?**      |
        +-------+-------+------------+
        | True  | True  | **?**      |
        +-------+-------+------------+
        | True  | False | **?**      |
        +-------+-------+------------+
.. FIN GROUPE

.. slide::

.. step::
    **Sans utiliser l'ordinateur**, remplissez à la main la table de vérité de l'opération ``not A or not B`` suivante :

    .. center::
        +-------+-------+-------+-------+------------------+
        |   A   |   B   | not A | not B | not A or not B   |
        +=======+=======+=======+=======+==================+
        | False | False | **?** | **?** | **?**            |
        +-------+-------+-------+-------+------------------+
        | False | True  | **?** | **?** | **?**            |
        +-------+-------+-------+-------+------------------+
        | True  | True  | **?** | **?** | **?**            |
        +-------+-------+-------+-------+------------------+
        | True  | False | **?** | **?** | **?**            |
        +-------+-------+-------+-------+------------------+

.. success::
    Vous savez maintenant manipuler les opérateurs logiques et avez découvert les tables de vérité.

.. slide::
✏️ Exercice 5 : Un dressing encore plus intelligent
------------------------------------

**Objectif** : Améliorer le programme de l'exercice 3 en ajoutant à la température une condition sur le temps (pluie, soleil, nuageux).

.. step:: reset
    .. GROUPE A
    **Consigne** : Reprenez le code de l'exercice 3 et ajoutez un choix de temps (pluie, soleil, nuageux) : la tenue affichée doit tenir compte de la température **et** du temps.
    .. GROUPE B
    **Consigne** : Reprenez le code de l'exercice 3. En plus de la température, vous devez offrir un choix de temps à l'utilisateur. Votre programme doit donc fonctionner de la manière suivante :

        1. Demander la température extérieure.
        2. Demander le temps qu'il fait.
        3. Afficher une tenue adaptée à la température et au temps.
    .. FIN GROUPE

    .. warning::
        Exemple : 
        .. code-block:: python
            
                >> Quelle est la température extérieure (en °C) ? 
                25
                >> Quel temps fait-il ? (choisissez une réponse en tapant le numéro correspondant)
                >> 1. Pluie
                >> 2. Soleil
                >> 3. Nuageux
                2
                >> Vous devriez porter un t-shirt et un short.



.. slide::
    
📖 2. Les boucles (Structures itératives)
-----------

2.1 La boucle ``for``
~~~~~~~~~~~~~~~~~

La boucle ``for`` permet de répéter un bloc de code un nombre déterminé de fois. Elle est souvent utilisée pour parcourir des séquences (listes, chaînes de caractères, etc.)

.. warning::
    Exemple :
    .. code-block:: python

        for variable in séquence:
            # Bloc de code exécuté pour chaque élément de la séquence
            
    .. code-block:: python
        for i in range(3):
            print(i)
        >> 0
        >> 1
        >> 2

.. slide::

2.2 La boucle ``while``
~~~~~~~~~~~~~~~~~~~

La boucle ``while`` exécute un bloc de code tant qu’une condition est vraie. 

.. warning::
    Exemple :
    .. code-block:: python

        while condition:
            # Bloc de code exécuté tant que la condition est vraie

    .. code-block:: python

        compteur = 0
        while compteur < 4:
            print(compteur)
            compteur += 1
        >> 0
        >> 1
        >> 2
        >> 3

.. slide::

2.3 Boucle infinie et sortie de boucle
~~~~~~~~~~~~~~~~~~~~~~~~

Une boucle infinie se produit quand la condition de sortie n’est jamais atteinte. Cela peut bloquer l’exécution du programme.
On peut interrompre une boucle avec l’instruction ``break``.

.. warning::
    Exemple :
    .. code-block:: python

        compteur = 0
        while True:
            print(compteur)
            compteur += 1
            if compteur == 4:
                break
        >> 0
        >> 1
        >> 2
        >> 3

.. slide::

✏️ Exercice 6 : Le juste prix
----------------------------

.. step:: reset
    Écrire un programme qui tire au sort un nombre entier entre 1 et 20 avec le module ``random``, puis demande à l’utilisateur de le deviner. En fonction de sa réponse, le programme affiche :

    .. discoverList::
        * Si le nombre est trop petit, "Trop petit ! Essayez encore."
        * Si le nombre est trop grand, "Trop grand ! Essayez encore."
        * Si c’est correct, "Bravo, vous avez trouvé !"

.. step::
    Cherchez sur internet et expliquez ce qu'est un module en Python et comment l'utiliser.

.. success:: 
    Vous savez maintenant importer et utiliser un module simple (random) ainsi que vous servir d'une boucle ``while``.

.. GROUPE B
.. slide::
✅ Récapitulatif de Chapitre
-------------------------

.. center::

    .. image:: images/recap_chap2.png
        :alt: Récapitulatif du Chapitre 2
        :width: 100%

.. slide::
🏋️ Exercices supplémentaires
--------------------

.. toctree::

    exos_sup_chap2
.. FIN GROUPE


           
       
