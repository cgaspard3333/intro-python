.. slide::

Comprendre les bases 2
======================

Objectifs du Chapitre
----------------------

.. important::
    - Apprendre à écrire des programmes dynamiques en utilisant des conditions (``if``, ``else``) et des boucles (``for``, ``while``).
    - Comprendre l’importance des structures de contrôle pour gérer le flux d'exécution d'un programme.

.. slide::

Les conditions
--------------

Principe des conditions
~~~~~~~~~~~~~~~~~~~~~~~

Les structures conditionnelles permettent de prendre des décisions dans un programme. En fonction de certaines conditions, différentes parties du code peuvent être exécutées.

.. discoverList::
    * ``if`` : vérifie une condition et exécute le bloc de code associé si elle est vraie.
    * ``elif`` : vérifie une autre condition si la première est fausse.
    * ``else`` : exécute un bloc de code si aucune des conditions précédentes n’est vraie.

.. warning::
    Exemple :
    .. code-block:: python

        if condition:
            # Bloc de code exécuté si la condition est vraie
        elif autre_condition:
            # Bloc exécuté si la première condition est fausse et l’autre condition est vraie
        else:
            # Bloc exécuté si toutes les conditions précédentes sont fausses

Opérateurs de comparaison
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


Opérateurs logiques
~~~~~~~~~~~~~~~~~~~

On peut combiner plusieurs conditions grâce aux opérateurs logiques :

.. discoverList::
    * ``and`` :  toutes les conditions doivent être vraies.
    * ``or`` : au moins une des conditions doit être vraie.
    * ``not`` : inverse la condition.

.. warning::
    Exemple :
    .. code-block:: python
        x = 10
        y = 5

        if x > 5 and y < 10:
            print("Les deux conditions sont vraies.")

✏️ Exercice 1 : Un conseiller de mode
------------------------------------

Un exemple d'organisation de vos dossiers/fichiers vous a été donné dans le chapitre précédent, vous pouvez vous en inspirer pour continuer à travailler de manière organisée tout au long de ce cours.

.. note:: 
    Rappel : Toujours ouvrir un dossier à l'ouverture de VSCode pour travailler à l'intérieur de celui-ci.

.. step::
    Écrire un programme qui aide l’utilisateur à choisir une tenue en fonction de la température donnée. Le programme demande à l’utilisateur la température extérieure et recommande une tenue en fonction de celle-ci. 

.. success:: 
    Vous savez maintenant écrire des conditions simples.

✏️ Exercice 2 : Les tables de vérité
--------------------------------------------------------

Voici deux tableaux représentant le resultats des opérations logiques ``and`` et ``or`` :

.. center::
    +-------+-------+---------+--------+
    |   A   |   B   | A and B | A or B |
    +=======+=======+=========+========+
    | True  | True  | True    | True   |
    +-------+-------+---------+--------+
    | True  | False | **?**   |  **?** |
    +-------+-------+---------+--------+
    | False | True  | **?**   | **?**  |
    +-------+-------+---------+--------+
    | False | False | **?**   | **?**  |
    +-------+-------+---------+--------+

Ces tableaux s'appelent des tables de vérité. Elles permettent de déterminer le résultat d'une opération logique en fonction des valeurs de vérité des variables ``A`` et ``B``.

.. step::
    Ecrire un programme qui affiche les résultats des opérations logiques ``and`` et ``or`` pour toutes les combinaisons possibles de valeurs de ``A`` et ``B`` et qui permet donc de compléter les tableaux ci-dessus. 

.. step::
    Faire de même pour la table de vérité de l'opération ``not(A and B)`` :

    .. center::
        +-------+-------+------------+
        |   A   |   B   | not(A and B)|
        +=======+=======+============+
        | True  | True  | **?**      |
        +-------+-------+------------+
        | True  | False | **?**      |
        +-------+-------+------------+
        | False | True  | **?**      |
        +-------+-------+------------+
        | False | False | **?**      |
        +-------+-------+------------+


.. step::
    Ainsi que pour la table de vérité de l'opération ``not a or not b`` :

    .. center::
        +-------+-------+-------+-------+------------------+
        |   A   |   B   | not A | not B | not A or not B   |
        +=======+=======+=======+=======+==================+
        | True  | True  | **?** | **?** | **?**            |
        +-------+-------+-------+-------+------------------+
        | True  | False | **?** | **?** | **?**            |
        +-------+-------+-------+-------+------------------+
        | False | True  | **?** | **?** | **?**            |
        +-------+-------+-------+-------+------------------+
        | False | False | **?** | **?** | **?**            |
        +-------+-------+-------+-------+------------------+
