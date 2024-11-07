.. slide::

Chapitre 4 - Modules, Affichage avancé
======================================

🎯 Objectifs du Chapitre
---------------------

.. important:: 
    - Apprendre à utiliser des modules/packages pour organiser et enrichir les programmes.
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

.. slide::
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
📖 Notion de package/bibliothèque
------------------------------

Qu'est-ce qu'un package ?
~~~~~~~~~~~~~~~~~~~~~~~~~~

.. note::
    Un **package** ou **bibliothèque** est une collection de modules regroupés dans un dossier. Cela permet de structurer un projet en organisant les modules de manière hiérarchique et logique. Les packages sont particulièrement utiles pour les projets de grande envergure comportant plusieurs modules interdépendants.

En Python, un package est simplement un dossier contenant des modules (fichiers ``.py``) et un fichier spécial nommé ``__init__.py``, qui permet à Python de reconnaître le dossier comme un package.

.. slide::
Structure d'un package
~~~~~~~~~~~~~~~~~~~~~~~

Voici un exemple de structure de package avec un dossier ``mon_projet`` qui contient un package ``calculs``, avec deux modules ``operations.py`` et ``statistiques.py`` :

.. code-block::
    mon_projet/
    │
    ├── main.py                  # Fichier principal du projet
    │
    └── calculs/                 # Dossier du package "calculs"
        ├── __init__.py          # Fichier spécial pour définir le package
        ├── operations.py        # Module pour les opérations mathématiques de base
        └── statistiques.py      # Module pour les calculs statistiques

``__init__.py ``: Ce fichier peut être vide, mais il doit exister pour que Python reconnaisse le dossier comme un package. Il est possible d’y inclure du code pour initialiser le package ou pour spécifier des modules spécifiques qui seront accessibles directement depuis le package.

.. slide::
Créer et utiliser un package
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

**Création d'un package**

Supposons que nous souhaitons créer un package ``calculs`` pour regrouper des fonctions mathématiques de base et des fonctions de statistiques.

On commence par créer un dossier ``calculs`` dans lequel se trouve un fichier ``__init__.py`` (il peut rester vide pour l’instant). On y ajoute deux modules ``operations.py`` et ``statistiques.py`` avec des fonctions spécifiques.

.. warning::
    Exemple :
    .. code-block:: python
        # Module operations.py
        def addition(a, b):
            return a + b

        def soustraction(a, b):
            return a - b

    .. code-block:: python
        # Module statistiques.py
        def moyenne(liste):
            return sum(liste) / len(liste)

        def variance(liste):
            m = moyenne(liste)
            return sum((x - m) ** 2 for x in liste) / len(liste)

.. slide::
**Importer des modules depuis un package**

Dans le fichier principal (``main.py``), on peut maintenant importer les fonctions des modules ``operations`` et ``statistiques`` du package ``calculs``.

.. warning::
    Exemple :
    .. code-block:: python
        # main.py

        # Importation des fonctions du package calculs
        from calculs.operations import addition, soustraction
        from calculs.statistiques import moyenne, variance

        # Utilisation des fonctions
        resultat_addition = addition(5, 3)
        resultat_moyenne = moyenne([1, 2, 3, 4, 5])

        print("Résultat de l'addition :", resultat_addition)
        print("Moyenne des valeurs :", resultat_moyenne)

.. slide::
**Utiliser ``__init__.py`` pour simplifier les imports**

Le fichier ``__init__.py`` permet de définir ce qui sera accessible directement depuis le package. Par exemple, si vous voulez que l’on puisse accéder à ``addition`` et ``moyenne`` directement via le package ``calculs``, ajoutez ces importations dans ``__init__.py``.

.. warning::
    Exemple de contenu de ``__init__.py`` :
    .. code-block:: python
        from .operations import addition, soustraction
        from .statistiques import moyenne, variance

.. slide::
Avec cette configuration, on peut maintenant importer les fonctions directement depuis ``calculs``, sans spécifier les modules :

.. warning::
    Exemple :
    .. code-block:: python
        # main.py

        # Importation des fonctions du package calculs
        from calculs import addition, moyenne

        # Utilisation des fonctions
        resultat_addition = addition(5, 3)
        resultat_moyenne = moyenne([1, 2, 3, 4, 5])

        print("Résultat de l'addition :", resultat_addition)
        print("Moyenne des valeurs :", resultat_moyenne)

.. slide::
✏️ Exercice 11 : Simulateur de statistiques sportives
---------------------------------------

**Objectif** :
Dans cet exercice, vous allez créer un simulateur de statistiques sportives pour une équipe de football. Le simulateur utilisera un package nommé ``football_stats`` pour regrouper différentes fonctionnalités liées aux statistiques des matchs.

    - Créer un package ``football_stats`` qui contient plusieurs modules pour gérer les statistiques des joueurs et des équipes.
    - Simuler les performances d'une équipe sur plusieurs matchs.
    - Calculer des statistiques avancées (comme le nombre moyen de buts par match, le taux de possession, et les passes réussies).
    - Utiliser des concepts comme les fonctions aléatoires, les calculs statistiques et la structuration en packages.

.. note::
    Comme pour n'importe quel exercice, il est **fortement recommandé** de le lire en entier avant de commencer à coder. Cela vous permettra de mieux comprendre les attentes et même de gagner du temps en réfléchissant à la logique de votre programme avant de commencer à l'écrire.

**Consignes** :

.. slide::
.. step:: reset
    **Etape 1 : Structure**  
    Vous allez créer un package football_stats qui contiendra les modules suivants :
    .. code-block:: bash
        football_stats/
        ├── __init__.py
        ├── match.py           # Contient les fonctions pour simuler un match et générer des statistiques
        ├── equipe.py          # Contient les fonctions pour gérer les informations de l'équipe
        └── statistiques.py     # Contient les fonctions pour calculer les statistiques avancées
        main.py                 # Fichier principal pour exécuter la simulation

.. slide::
.. step::
    **Etape 2 : Module ``equipe.py``**  
    Dans le module ``equipe.py``, créez une fonction pour initialiser une équipe et une autre pour afficher les informations de base de l’équipe (nom, nombre de joueurs, etc.).

    Détails des fonctions dans ``equipe.py``:

        - ``creer_equipe(nom, joueurs)`` : prend en entrée le nom de l’équipe et une liste de noms de joueurs et retourne un dictionnaire avec le nom de l'équipe, la liste des joueurs et le nombre de joueurs.
        - ``afficher_equipe(equipe)`` : prend en entrée une équipe et affiche les informations de l'équipe sous un format clair.

.. slide::
.. step::
    **Etape 3 : Module ``match.py``**  
    Dans ``match.py``, vous allez écrire des fonctions pour simuler un match et générer les statistiques associées. Utilisez le module ``random`` pour simuler les événements.

    Détails des fonctions dans ``match.py``

        - ``simuler_match()`` : simule un match pour une équipe.
            * Génére un nombre aléatoire de buts entre 0 et 5 pour l’équipe.
            * Génére des statistiques aléatoires de possession (entre 40% et 60%), de tirs (entre 5 et 20), et de passes réussies (entre 70% et 90%).
        La fonction prend en entrée une équipe et retourne un dictionnaire de statistiques (buts, possession, tirs, passes réussies).

        - ``afficher_statistiques_match(stats)`` : prend en entrée un dictionnaire ``stats`` (contenant les statistiques générées par ``simuler_match()``) et les affiche sous un format lisible.

.. slide::
.. step::
    **Etape 4 : Module ``statistiques.py``**  
    Dans ``statistiques.py``, vous allez écrire des fonctions pour calculer des statistiques avancées pour une série de matchs, comme la moyenne de buts par match ou le taux de réussite de passes.

    Détails des fonctions dans ``statistiques.py``

        - ``moyenne_buts_par_match(liste_buts)`` : prend une liste des buts marqués sur plusieurs matchs et retourne la moyenne.
        - ``taux_reussite_passes(liste_passes)`` : prend une liste de pourcentages de passes réussies et retourne le taux moyen.
        - ``moyenne_possession(liste_possession)`` : prend une liste de pourcentages de possession et retourne la possession moyenne.

.. slide::
.. step::
    **Etape 5 : Utiliser le fichier ``__init__.py``**  
    Dans ``__init__.py``, importez les fonctions principales des modules pour simplifier leur utilisation.

    **Aide :**
    .. spoiler::
        Exemple de contenu de ``__init__.py`` :
        .. code-block:: python
            # football_stats/__init__.py

            from .equipe import creer_equipe, afficher_equipe
            from .match import simuler_match, afficher_statistiques_match
            from .statistiques import moyenne_buts_par_match, taux_reussite_passes, moyenne_possession

.. slide::
.. step::
    **Etape 6 : Utiliser le package dans le ``main.py``**  
    Dans main.py, vous allez :

    1. Créer une équipe avec creer_equipe.
    2. Simuler plusieurs matchs pour cette équipe.
    3. Stocker les statistiques générées pour chaque match.
    4. Calculer et afficher les statistiques avancées sur la série de matchs.

.. slide::
**Résumé des fonctions à implémenter :**  

- Module ``equipe.py`` :
    * ``creer_equipe(nom, joueurs)`` : crée un dictionnaire d'équipe.
    * ``afficher_equipe(equipe)`` : affiche les informations de l’équipe.
- Module ``match.py`` :
    * ``simuler_match(equipe)`` : génère des statistiques aléatoires pour un match.
    * ``afficher_statistiques_match(stats)`` : affiche les statistiques d’un match.
- Module statistiques.py :
    * ``moyenne_buts_par_match(liste_buts)`` : calcule la moyenne des buts sur plusieurs matchs.
    * ``taux_reussite_passes(liste_passes)`` : calcule le taux moyen de passes réussies.
    * ``moyenne_possession(liste_possession)`` : calcule la possession moyenne.

.. slide::
**Résultat attendu :**

.. code-block:: bash
    >> --- Informations de l équipe ---
    >> Nom de l équipe : Les Scarabés du Brésil
    >> Nombre de joueurs : 5
    >> Liste des joueurs :
    >> - Alice
    >> - Bob
    >> - Charlie
    >> - Diana
    >> - Eve

    >> --- Match 1 ---
    >> Buts marqués : 5
    >> Possession : 44%
    >> Tirs : 19
    >> Passes réussies : 78%

    >> --- Match 2 ---
    >> Buts marqués : 0
    >> Possession : 48%
    >> Tirs : 12
    >> Passes réussies : 70%

    >> --- Match 3 ---
    >> Buts marqués : 1
    >> Possession : 45%
    >> Tirs : 6
    >> Passes réussies : 82%

    >> --- Match 4 ---
    >> Buts marqués : 1
    >> Possession : 41%
    >> Tirs : 17
    >> Passes réussies : 84%

    >> --- Match 5 ---
    >> Buts marqués : 4
    >> Possession : 43%
    >> Tirs : 13
    >> Passes réussies : 90%

    >> --- Statistiques de la saison ---
    >> Moyenne de buts par match : 2.20
    >> Taux de réussite moyen des passes : 80.80%
    >> Possession moyenne : 44.20%

.. success::
    Vous savez maintenant créer et utiliser des packages pour organiser vos programmes, ainsi que des modules pour regrouper des fonctions liées. Vous avez également appris à importer des modules externes et à les utiliser dans vos programmes.

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
✏️ Exercice 12 : Une facture bien propre
---------------------------------------

**Objectif** :
Vous êtes chargé de développer un programme de facturation pour une entreprise de vente en ligne. Les prix des produits doivent être calculés précisément, mais les coûts totaux doivent être affichés selon différentes règles d'arrondi et de troncature en fonction des besoins de la comptabilité et des utilisateurs finaux.

.. step:: reset
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

.. slide::
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

.. success::
    Vous savez maintenant arrondir et tronquer des nombres pour un affichage plus lisible ainsi qu'utiliser les f-strings pour un affichage plus rapide et lisible. Vous avez également appris à aligner les éléments pour créer des tableaux formatés.

.. slide::
✏️ Exercice 13 : Un bulletin météo très aléatoire
------------------------------------------------

**Objectif** : Dans cet exercice, vous allez créer un simulateur de bulletin météo qui génère aléatoirement des prévisions météorologiques pour la journée actuelle, en utilisant les bibliothèques ``random``, ``math``, et ``datetime``. Vous simulerez des informations comme la température, la vitesse du vent, les précipitations et l'heure du lever et coucher de soleil.

**Consignes** :
.. slide::
.. step:: reset
    *Configurer la date* :

        - Utilisez ``datetime`` pour afficher la date du jour actuel au format "JJ/MM/AAAA".
        - Par défaut la date fournie par ``datetime`` est au format "AAAA-MM-JJ". Vous utiliserez donc internet pour trouver comment formater la date en "JJ/MM/AAAA" lors de son affichage. 

.. slide::
.. step::
    *Générer les prévisions météorologiques* :

        - Température : Utilisez le module ``random`` pour générer une température entre -10 et 35°C.
        - Vitesse du vent : Générez une vitesse du vent entre 0 et 100 km/h.
        - Type de météo : Créez une **liste** de types de précipitations possibles ("Ensoleillé", "Nuageux", "Pluie", "Neige") et sélectionnez-en une au hasard dans la liste avec ``random``.
        - Probabilité de précipitations : Utilisez le module ``random`` pour générer un pourcentage de précipitations (entre 0% et 100%).

.. slide::
.. step::
    *Heures de lever et coucher de soleil* :

        - En utilisant **obligatoirement** les fonctions suivantes : ``datetime.combine()``, ``datetime.min.time()``, ``timedelta()`` et ``random.randint()``; générez une heure de lever de soleil entre 5h30 et 7h30, et une heure de coucher de soleil entre 18h30 et 20h30. 
        - Pour chaque fonction vous devrez chercher sur internet comment l'utiliser.
    
    **Aide** :
    .. spoiler::
        - En effet, on souhaite garder une association entre les heures de lever et coucher de soleil et la date du jour. Pour cela, on utilise la fonction ``datetime.combine()`` qui permet de combiner une date et une heure pour obtenir un objet ``datetime`` complet. On utilise ensuite la fonction ``timedelta()`` pour ajouter un nombre d'heures et de minutes aléatoire à l'heure du lever de soleil pour obtenir l'heure du coucher de soleil.

.. slide::
.. step::
    *Calculer la durée de jour* :

        - Utilisez ``datetime`` pour calculer la durée du jour (en heures et minutes) en soustrayant l’heure du lever de celle du coucher de soleil.

.. slide::
.. step::
    *Afficher le rapport météo* :

        - Organisez les informations générées de manière structurée et lisible pour l’utilisateur en **utilisant les f-strings pour l'affichage**.

.. slide::
**Résultat attendu** :
.. code-block::
    >> Previsions meteo pour le 31/10/2024
    >> -----------------------------------
    >> Previsions meteorologiques du jour :
    >> Temperature : 26°C
    >> Vitesse du vent : 44 km/h
    >> Conditions : Pluie
    >> Probabilite de precipitations : 30%
    >> Heure du lever de soleil : 07:44
    >> Heure du coucher de soleil : 18:02
    >> Duree du jour : 10:18:00

.. success::
    Vous savez maintenant comment utiliser des modules intégrés et leurs fonctions afin d'enrichir vos programmes tout en apprenant à formater les dates et les nombres pour un affichage plus lisible.

.. slide::
🏋️ Exercices supplémentaires
--------------------

.. toctree::

    exos_sup_chap4