.. slide::

Chapitre 4 - Modules, Affichage avancé
======================================

🎯 Objectifs du Chapitre
---------------------

.. important:: 
    - Apprendre à utiliser des modules pour organiser et enrichir les programmes.
    - Apprendre à installer et utiliser des modules externes avec le gestionnaire de paquets pip.
    - Découvrir des techniques avancées pour afficher les données de manière précise avec la fonction print().
    - Apprendre à arrondir et tronquer des nombres pour un affichage plus lisible.

.. slide::
📖 Les modules
--------------

Qu'est-ce qu'un module ?
~~~~~~~~~~~~~~~~~~~~~~~~
.. note::
    Un module est un fichier contenant des **définitions de fonctions**, **variables** ou **classes**, qui peuvent être réutilisées dans d'autres fichiers. Python possède de nombreux modules intégrés (comme ``math``, ``random``, ``datetime``), mais vous pouvez également créer vos propres modules.

.. slide::
Importer un module
~~~~~~~~~~~~~~~~~~

Pour utiliser un module, on l'importe dans le programme avec l'instruction ``import``. 

.. warning::
    Par exemple, pour importer le module ``math`` :
    .. code-block:: python
        import math

        # Utilisation de la fonction racine carrée du module math
        print(math.sqrt(16))
        >> 4.0

.. slide::
On peut également importer des fonctions spécifiques d’un module que l'on souhaite utiliser sans avoir à préciser le nom du module à chaque utilisation.

.. warning::
    Par exemple, pour importer la fonction ``sqrt`` du module ``math`` :
    .. code-block:: python
        from math import sqrt

        # Utilisation de la fonction racine carrée du module math
        print(sqrt(25))
        >> 5.0

.. slide::
On peut aussi renommer un module ou une fonction importée pour simplifier son utilisation.

.. warning::
    Par exemple, pour renommer le module ``math`` en ``m`` :
    .. code-block:: python
        import math as m

        # Utilisation de la fonction racine carrée du module math
        print(m.sqrt(36))
        >> 6.0

.. slide::
Modules intégrés
~~~~~~~~~~~~~~~~

Python possède de nombreux modules intégrés qui permettent d'ajouter des fonctionnalités à vos programmes. Voici quelques exemples de modules couramment utilisés :

- ``math`` : fonctions mathématiques (racine carrée, cosinus, sinus, exponentielle, logarithme, etc.)

.. warning::
    Exemple :
    .. code-block:: python
        import math

        # Calcul de la racine carrée de 16
        print(math.sqrt(16))
        >> 4.0

.. slide::
- ``random`` : génération de nombres aléatoires

.. warning::
    Exemple :
    .. code-block:: python
        import random

        # Générer un nombre aléatoire entre 1 et 10
        print(random.randint(1, 10))
        >> 7

.. slide::
- ``datetime`` : manipulation de dates et d'heures

.. warning::
    Exemple :
    .. code-block:: python
        from datetime import datetime

        # Afficher la date et l'heure actuelles
        print(datetime.now())
        >> 2021-09-15 15:30:00.000000

..slide::
Installer des modules externes
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

En plus des modules intégrés à Python, il existe de nombreux modules créés par la communauté, disponibles sur le Python Package Index (PyPI). Ces modules peuvent être installés pour étendre les capacités de Python, par exemple pour des applications de data science, de développement web, de visualisation de données, etc.

Exemples de modules externes couramment utilisés :

- ``numpy`` : pour des calculs numériques avancés et la manipulation de tableaux.
- ``pandas`` : pour l’analyse de données.
- ``matplotlib`` : pour la visualisation de données.

``pip`` est le **gestionnaire de paquets Python**. Il permet d’**installer**, **mettre à jour** et **désinstaller** des modules externes.

On peut installer un module externe avec la commande suivante (à exécuter dans un terminal) :
.. code-block:: bash
    pip install nom_du_module

.. warning::
    Par exemple, pour installer le module ``numpy`` :
    .. code-block:: bash
        pip install numpy

On peut le mettre à jour avec la commande suivante :
.. code-block:: bash
    pip install --upgrade nom_du_module

Ou le désinstaller avec la commande suivante :
.. code-block:: bash
    pip uninstall nom_du_module


.. slide::
Créer et utiliser ses propres modules
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Vous pouvez créer vos propres modules en enregistrant des fonctions dans un fichier .py, puis en les important dans un autre fichier.

.. warning::
    Exemple :

    - Création d'un fichier ``operations.py`` contenant les fonctions ``addition`` et ``soustraction``.

    .. code-block:: python
        # Contenu du fichier operations.py
        def addition(a, b):
            return a + b

        def soustraction(a, b):
            return a - b
        
        def multiplication(a, b):
            return a * b

    - Importation du module ``operations`` dans un autre fichier :

    .. code-block:: python
        # Trois façons d'importer un module ou une fonction spécifique d'un module :
        # 1. Importer le module operations et le renommer en op
        import operations as op 
        # 2. Importer la fonction soustraction du module operations
        from operations import soustraction 
        # 3. Importer la fonction multiplication du module operations et la renommer en mult
        from operations import multiplication as mult 

        # Utiliser les fonctions addition et soustraction du module operations
        print(op.addition(5, 3))
        >> 8
        print(soustraction(5, 3))
        >> 2
        print(mult(5, 3))
        >> 15



.. slide::
📖 Approximer des nombres
-------------------------
Les nombres en Python peuvent être affichés avec une précision contrôlée. Cela est utile pour afficher des nombres décimaux de manière cohérente, par exemple avec deux chiffres après la virgule.

La fonction ``round()``
~~~~~~~~~~~~~~~~~~~~~~~~

La fonction round() permet d’arrondir un nombre à un nombre de décimales précisé.

Syntaxe : ``round(nombre, décimales)``

.. warning::
    Exemple :
    .. code-block:: python
        pi = 3.141592653589
        print(round(pi, 2))
        >> 3.14

Si le nombre de décimales n’est pas précisé, round() arrondit à l’entier le plus proche.

.. warning::
    Exemple :
    .. code-block:: python
        pi = 3.141592653589
        print(round(pi))
        >> 3

.. slide::
Les approximations avec le module ``math``
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Pour arrondir ou tronquer un nombre sans spécifier le nombre de décimales, Python offre plusieurs fonctions dans le module math :

* ``math.ceil()`` : Arrondit au plus proche entier supérieur.
* ``math.floor()`` : Arrondit au plus proche entier inférieur.
* ``math.trunc()`` : Tronque le nombre à sa partie entière, sans arrondi (équivalent de ``int()``).

.. warning::
    Exemple :
    .. code-block:: python
        import math

        nombre = 3.7

        print(math.ceil(nombre))   # Sortie : 4 (arrondi au supérieur)
        print(math.floor(nombre))  # Sortie : 3 (arrondi à l'inférieur)
        print(math.trunc(nombre))  # Sortie : 3 (troncature sans arrondi)

.. slide::
Pour les nombres négatifs, la différence entre ``math.floor()`` et ``math.trunc()`` est importante

.. warning::
    Exemple :
    .. code-block:: python
        import math

        nombre_negatif = -3.7

        print(math.ceil(nombre_negatif))   # Sortie : -3 (arrondi au supérieur)
        print(math.floor(nombre_negatif))  # Sortie : -4 (arrondi à l'inférieur)
        print(math.trunc(nombre_negatif))  # Sortie : -3 (troncature sans arrondi)

.. slide::
📖 Affichage avancé avec la fonction ``print()``
------------------------------------------------

Rappels de base de la fonction ``print()``
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La fonction ``print()`` permet d'afficher des données à l'écran. Par défaut, elle prend en entrée un ou plusieurs éléments séparés par des virgules et les affiche de manière consécutive, séparés par un espace.

.. warning::
    Exemple :
    .. code-block:: python
        nom = "Alice"
        age = 25
        print("Nom :", nom, "- Age :", age)
        >> Nom : Alice - Age : 25

.. slide::
Formatage des chaînes de caractères
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

**L'opérateur de formatage ``%``**

Python permet de formater les chaînes avec l'opérateur ``%``, en précisant le type de variable que l’on souhaite insérer (par exemple ``%s`` pour ``str``, ``%d`` pour ``int``, ``%f`` pour ``float``).

.. warning::
    Exemple :
    .. code-block:: python
        nom = "Alice"
        age = 25
        print("Nom : %s - Age : %d" % (nom, age))
        >> Nom : Alice - Age : 25

.. slide::
**La méthode ``format()``**

La méthode ``format()`` permet de spécifier des emplacements ``{}`` où les valeurs seront insérées dans la chaîne de caractères.

.. warning::
    Exemple :
    .. code-block:: python
        nom = "Alice"
        age = 25
        print("Nom : {} - Age : {}".format(nom, age))
        >> Nom : Alice - Age : 25

On peut également spécifier l'ordre des valeurs à insérer en utilisant des indices.

.. warning::
    Exemple :
    .. code-block:: python
        nom = "Alice"
        age = 25
        print("Age : {1} - Nom : {0}".format(nom, age))
        >> Age : 25 - Nom : Alice

.. slide::
**Les f-strings (``f''``)**

Les f-strings permettent de mettre des variables directement dans la chaîne en ajoutant un f avant les guillemets. 
.. note::
    Cette méthode est **rapide** et **lisible**, c'est la plus recommandée et donc **celle que nous utiliserons à partir de maintenant dans ce cours**.

.. warning::
    Exemple :
    .. code-block:: python
        nom = "Alice"
        age = 25
        print(f"Nom : {nom} - Age : {age}")
        >> Nom : Alice - Age : 25

.. slide::
Formatage de nombres flottants
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Avec le formatage avancé de ``print()``, on peut contrôler précisément l'affichage des nombres décimaux.

**Formatage avec la méthode ``format()``**

Utiliser ``:.nf`` dans ``format()`` pour spécifier le nombre de décimales (``n`` étant le nombre de décimales).

.. warning::
    Exemple :
    .. code-block:: python
        pi = 3.141592653589
        print("Pi arrondi à 2 décimales : {:.2f}".format(pi))
        >> Pi arrondi à 2 décimales : 3.14

**Formatage avec les f-strings**

Les f-strings permettent également d’afficher un nombre de décimales précis en ajoutant ``:.nf`` directement dans l'expression.

.. warning::
    Exemple :
    .. code-block:: python
        pi = 3.141592653589
        print(f"Pi arrondi à 3 décimales : {pi:.3f}")
        >> Pi arrondi à 3 décimales : 3.142

.. slide::
Exemples de formatage avancé
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

**Alignement**

Il est souvent utile d'aligner les éléments pour créer des tableaux ou des rapports formatés, où le texte et les nombres sont alignés de manière uniforme. Les f-strings et la méthode format() permettent d'ajuster la largeur de chaque champ et de spécifier l'alignement des données.

Les options de formatage pour l’alignement incluent :

- ``<`` : aligner à gauche.
- ``>`` : aligner à droite.
- ``^`` : centrer le texte.

Dans les f-strings, on peut combiner ces options avec une largeur de champ pour contrôler l’espace dédié à chaque élément.

.. slide::
.. warning::
    Exemple :
    .. code-block:: python
        produit = "Pommes"
        prix = 1.23456
        quantite = 10

        # Affichage aligné
        print(f"{'Produit':<10} {'Prix':>10} {'Quantité':>10}")
        print(f"{produit:<10} {prix:>10.2f} {quantite:>10}")

        >> Produit          Prix    Quantité
        >> Pommes           1.23          10
    
    Explications :

    - ``{produit:<10}`` : La chaîne ``produit`` est alignée à gauche (``<``) dans un espace de 10 caractères. Cela garantit que tout ce qui sera affiché dans cette colonne occupera exactement 10 caractères de largeur.
    - ``{prix:>10.2f}`` : La valeur ``prix`` est alignée à droite (``>``) dans un espace de 10 caractères. Le ``.2f`` spécifie que le nombre sera affiché avec deux décimales.
    - ``{quantite:>10}`` : La valeur ``quantité`` est également alignée à droite dans un espace de 10 caractères.

.. slide::
**Affichage des pourcentages**

Pour afficher un nombre sous forme de pourcentage, on peut utiliser le formatage ``:.n%`` dans une f-string, où ``n`` représente le nombre de décimales souhaitées pour le pourcentage. Cela permet d’afficher les valeurs avec une mise en forme cohérente, tout en ajoutant le symbole ``%``.

.. warning::
    Exemple :
    .. code-block:: python
        taux_reussite = 0.857542
        print(f"Taux de reussite : {taux_reussite:.2%}")
        >> Taux de reussite : 85.75%

.. slide::
✏️ Exercice 11 : Une facture bien propre
---------------------------------------

**Objectif** :
Vous êtes chargé de développer un programme de facturation pour une entreprise de vente en ligne. Les prix des produits doivent être calculés précisément, mais les coûts totaux doivent être affichés selon différentes règles d'arrondi et de troncature en fonction des besoins de la comptabilité et des utilisateurs finaux.

.. step::
    **Demander** à l'utilisateur de saisir les informations suivantes pour **trois produits** :

    - Nom du produit.
    - Prix unitaire (un nombre décimal).
    - Quantité (un entier).

.. step::
    **Calculer** le coût total pour chaque produit (prix unitaire * quantité) et appliquer plusieurs méthodes d'arrondi et de troncature pour chaque coût total :

    - Arrondi au supérieur.
    - Arrondi à l'inférieur. 
    - Troncature sans arrondi. 
    - Arrondi à deux décimales.

.. step::
    **Afficher** les résultats sous forme de tableau, avec un alignement soigné des colonnes.

.. step::
    **Calculer** et **afficher** le coût total global des trois produits, en arrondissant cette somme à l'entier supérieur.

**Resultat attendu :**
.. code-block:: python
    >> Nom du produit 1 : Chaise
    >> Prix unitaire de Chaise (€) : 29.95
    >> Quantité de Chaise : 3
    >> Nom du produit 2 : Table
    >> Prix unitaire de Table (€) : 59.99
    >> Quantité de Table : 2
    >> Nom du produit 3 : Lampe
    >> Prix unitaire de Lampe (€) : 14.50
    >> Quantité de Lampe : 4

    >> Produit       Prix Unitaire (€)   Quantité  Total Brut (€)  A.Sup (€)  A.Inf (€)  Tronc (€)    Arrondi2 (€)
    >> ----------------------------------------------------------------------------------------------------------------
    >> Chaise                    29.95          3           89.85         90         89         89           89.85
    >> Table                     59.99          2          119.98        120        119        119          119.98
    >> Lampe                     14.50          4           58.00         58         58         58           58.00
    >> ----------------------------------------------------------------------------------------------------------------
    >> Total facture (arrondi au supérieur) :  268 €

