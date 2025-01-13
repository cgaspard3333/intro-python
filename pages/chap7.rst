.. slide::

Chapitre 7 - Introduction à la Programmation Orientée Objet (POO)
=====================================

🎯 Objectifs du Chapitre
---------------------

.. important:: 
    - Découvrir la programmation orientée objet (POO) de manière progressive et intuitive.
    - Comprendre les concepts fondamentaux comme les classes, les objets, les attributs et les méthodes.
    - Apprendre à créer et manipuler des objets en Python.


.. slide::

📖 1. Qu’est-ce que la Programmation Orientée Objet ?
---------------------------------------------------

1.1 Définition
~~~~~~~~~~~~~~

La Programmation Orientée Objet (POO) est une manière de structurer un programme en organisant les données et les comportements en **objets**. Ces objets sont comme des "entités" qui regroupent :

- **Des données** (appelées **attributs**) : Ce que l'objet "possède".
- **Des comportements** (appelés **méthodes**) : Ce que l'objet "fait".

.. slide::
1.2 Une analogie simple
~~~~~~~~~~~~~~~~~~~~~~~

Imaginons que vous construisez un jeu qui simule un zoo. Dans ce zoo :

- Les animaux sont des **objets**.
- Chaque animal a des caractéristiques (**attributs**) comme un nom, une espèce et un âge.
- Chaque animal peut effectuer des actions (**méthodes**) comme manger, dormir ou émettre un son.

En POO, vous créez des "modèles" pour représenter ces animaux. Ces modèles sont appelés des **classes**.

.. slide::
1.3 Pourquoi utiliser la POO ?
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
- **Modéliser des concepts réels** : Facilite la représentation d'entités du monde réel (ex. : voiture, utilisateur).
- **Réutilisation du code** : Les classes peuvent être utilisées dans plusieurs parties d'un programme.
- **Modularité** : Le code est plus organisé et facile à comprendre.
- **Évolutivité** : Plus simple à maintenir et à étendre.

.. slide::
📖 2. Les concepts de base de la POO
---------------------------------

2.1 Classes et objets
~~~~~~~~~~~~~~~~~~~~~
.. note::
Une **classe** est un **modèle** ou un **plan** pour créer des objets. Par exemple, la classe "Animal" définit ce que chaque animal possédera comme attributs et méthodes.

.. note::
Un **objet** est une **instance** de cette classe. Par exemple, "Léo le lion" est un objet de la classe "Animal".

.. slide::
2.2 Attributs et méthodes
~~~~~~~~~~~~~~~~~~~~~~~~~
.. note::
Les **attributs** sont des **variables** qui stockent les **données** spécifiques à chaque objet.
.. warning::
Ex. : Le nom, l’âge ou la couleur d’un animal.
.. note::
Les **méthodes** sont des **fonctions** définies dans une classe, qui décrivent les **actions** possibles pour un objet.
.. warning::
Ex. : Manger, dormir ou rugir pour un animal.

.. slide::
📖 3. Première classe et premier objet
-----------------------------------

3.1 Définir une classe
~~~~~~~~~~~~~~~~~~~~~~
En Python, une classe est définie avec le mot-clé ``class``. Voici un exemple simple :
.. warning::
    Exemple de classe vide :
    .. code-block:: python

        # Définir une classe "Animal"
        class Animal:
            pass  # Pour l'instant, la classe est vide

.. slide::
3.2 Créer un objet
~~~~~~~~~~~~~~~~~~
Une fois la classe définie, vous pouvez créer un **objet** (ou **instance**) de cette classe en l’appelant comme une fonction.

.. warning::
    Exemple :
    .. code-block:: python

        # Créer un objet de la classe Animal
        mon_animal = Animal()
        print(mon_animal)
        
        >> <__main__.Animal object at 0x...>

.. slide::
3.3 Ajouter des attributs
~~~~~~~~~~~~~~~~~~~~~~~~~
Pour ajouter des **attributs** à un objet, on peut les affecter directement après la création de l'objet.
.. warning::
    Exemple :
    .. code-block:: python

        # Ajouter des attributs à l'objet
        mon_animal.nom = "Léo"
        mon_animal.age = 5

        # Afficher les attributs
        print(f"Nom : {mon_animal.nom}, Âge : {mon_animal.age}")
        >> Nom : Léo, Âge : 5

.. slide::
3.4 Ajouter un constructeur pour initialiser les attributs
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Au lieu d’ajouter les attributs un par un, vous pouvez utiliser une méthode spéciale appelée **constructeur** pour les définir automatiquement à la création de l’objet. En Python, cette méthode est ``__init__``.

.. warning::
    Exemple :
    .. code-block:: python

        class Animal:
            def __init__(self, nom, age):
                self.nom = nom  # Attribut nom
                self.age = age  # Attribut âge

        # Créer un objet avec des attributs directement
        mon_animal = Animal("Léo", 5)
        print(f"Nom : {mon_animal.nom}, Âge : {mon_animal.age}")
        >> Nom : Léo, Âge : 5

.. slide::
3.5 Ajouter des méthodes
~~~~~~~~~~~~~~~~~~~~~~~~
Les **méthodes** sont des fonctions définies dans une classe qui décrivent les **actions d'un objet**. Elles utilisent toujours ``self`` comme premier paramètre pour accéder aux attributs de l'objet.

.. warning::
    Exemple :
    .. code-block:: python

        class Animal:
            def __init__(self, nom, age):
                self.nom = nom
                self.age = age

            def parler(self):
                print(f"{self.nom} fait un bruit.")

        # Créer un objet et appeler une méthode
        mon_animal = Animal("Léo", 5)
        mon_animal.parler()
        >> Léo fait un bruit.

.. slide::
.. warning::
    Exemple complet :
    .. code-block:: python
        class Animal:
            def __init__(self, nom, espece, age):
                self.nom = nom
                self.espece = espece
                self.age = age

            def manger(self):
                print(f"{self.nom} est en train de manger.")

            def se_presenter(self):
                print(f"Je suis {self.nom}, un {self.espece} de {self.age} ans.")

        # Créer des objets
        animal1 = Animal("Léo", "lion", 5)
        animal2 = Animal("Mimi", "chat", 2)

        # Utiliser les objets
        animal1.se_presenter() 
        animal2.manger()

        >> Je suis Léo, un lion de 5 ans.
        >> Mimi est en train de manger.

.. slide::
📖 4. Les propriétés d'instance et l’attribut ``self``
-------------------------------------------------

4.1 Qu’est-ce que ``self`` ?
~~~~~~~~~~~~~~~~~~~~~~~~~~~
Dans une méthode d’une classe, le mot-clé ``self`` est une référence à l'objet actuel. Il permet d'accéder aux attributs et méthodes de l'objet à l'intérieur de la classe. 

.. note::
    - ``self`` doit être le **premier paramètre** de toutes les méthodes d'instance.  
    - Lorsque vous appelez une méthode sur un objet, Python passe automatiquement cet objet en tant qu'argument pour ``self``.

.. warning::
    Exemple :
    .. code-block:: python

        class Animal:
            def __init__(self, nom):
                self.nom = nom  # Attribut d'instance

            def parler(self):
                print(f"{self.nom} fait un bruit.")

        # Créer un objet
        chat = Animal("Mimi")
        chat.parler()

        >> Mimi fait un bruit.
        # Ici, "chat" est passé automatiquement à la méthode comme self.

.. slide::
4.2 Différence entre attributs d'instance et attributs locaux
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Un **attribut d’instance** est lié à l’objet (avec ``self.nom``). Il est accessible dans toutes les méthodes de l'objet.

Un **attribut local** est une variable définie à l’intérieur d’une méthode, et elle n’est pas accessible en dehors.

.. warning::
    Exemple :
    .. code-block:: python

        class Animal:
            def __init__(self, nom):
                self.nom = nom  # Attribut d'instance

            def description(self):
                attribut_local = "temporaire"  # Attribut local
                print(f"{self.nom} a un attribut local : {attribut_local}")

        chien = Animal("Rex")
        chien.description()
        >> Sortie : Rex a un attribut local : temporaire

        print(attribut_local)  
        # Erreur : attribut_local n'existe pas en dehors de la méthode.

.. slide::
📖 5. Méthodes spéciales : ``__str__`` pour personnaliser l'affichage
---------------------------------------------------------------

5.1 La méthode ``__str__``
~~~~~~~~~~~~~~~~~~~~~~~~~
La méthode spéciale ``__str__`` permet de définir ce qui sera affiché lorsque vous utilisez ``print()`` sur un objet.

.. warning::
    Exemple :
    .. code-block:: python

        class Animal:
            def __init__(self, nom, espece):
                self.nom = nom
                self.espece = espece

            def __str__(self):
                return f"{self.nom} est un {self.espece}."

        # Créer un objet
        chien = Animal("Rex", "chien")
        print(chien)
        >> Sortie : Rex est un chien.

5.2 Avantages de ``__str__``
~~~~~~~~~~~~~~~~~~~~~~~~~~~
- Rendre les objets plus lisibles et compréhensibles.
- Faciliter le débogage et l’affichage des informations.


.. slide::
📖 6. Variables et méthodes de classe
---------------------------------------------

6.1 Variables de classe
~~~~~~~~~~~~~~~~~~~~~~~~
.. note::
    Une **variable de classe** est une variable partagée par toutes les instances d’une classe. Contrairement aux **attributs d’instance**, qui sont propres à chaque objet, une variable de classe est unique pour la classe entière.

.. warning::
    Exemple :
    .. code-block:: python

        class Animal:
            population = 0  # Variable de classe

            def __init__(self, nom):
                self.nom = nom  # Attribut d'instance
                Animal.population += 1  # Incrémente la population

        # Créer des instances
        animal1 = Animal("Léo")
        animal2 = Animal("Mimi")

        print(f"Population totale : {Animal.population}")
        # Sortie : Population totale : 2

        # La variable de classe est partagée par toutes les instances
        print(animal1.population)
        print(animal2.population)

        >> 2
        >> 2

.. slide::
6.2 Méthodes de classe
~~~~~~~~~~~~~~~~~~~~~~~
.. note::
    Une **méthode de classe** agit sur la classe elle-même, pas sur une instance particulière. Pour définir une méthode de classe, on utilise le décorateur ``@classmethod`` et un paramètre ``cls`` (référence à la classe).

.. warning::
    Exemple :
    .. code-block:: python

        class Animal:
            population = 0  # Variable de classe

            def __init__(self, nom):
                self.nom = nom
                Animal.population += 1

            @classmethod
            def afficher_population(cls):
                print(f"Population totale : {cls.population}")

        # Appeler la méthode de classe
        Animal.afficher_population()
        lion = Animal("Léo")
        Animal.afficher_population()

        >> Population totale : 0
        >> Population totale : 1

.. slide::
📖 7. Héritage
--------------

7.1 Qu’est-ce que l’héritage ?
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. note::
    L’**héritage** permet de créer une nouvelle classe (appelée **classe enfant**) à partir d’une classe existante (appelée **classe parent**). La classe enfant hérite des attributs et méthodes de la classe parent, mais peut aussi ajouter ou modifier des fonctionnalités.

.. slide::
7.2 Exemple simple d’héritage
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Imaginons une classe parent ``Animal`` et une classe enfant ``Chien``.

.. warning::
    Exemple :
    .. code-block:: python

        class Animal:
            def __init__(self, nom):
                self.nom = nom

            def parler(self):
                print(f"{self.nom} fait un bruit.")

        # Classe enfant
        class Chien(Animal):
            def parler(self):
                print(f"{self.nom} aboie.")

        # Créer des objets
        animal = Animal("Léo")
        chien = Chien("Rex")

        animal.parler()  
        chien.parler()

        >> Léo fait un bruit.
        >> Rex aboie.

.. slide::
✏️ Exercice 17 : Classe Personne
------------------------------------------

.. step:: reset
    Définissez une classe ``Personne`` avec les attributs ``nom`` et ``age``.
.. step::
    Ajoutez une méthode ``se_presenter`` qui affiche : "Je m'appelle [nom] et j'ai [age] ans."
.. step::
    Créez deux objets ``Personne`` et appelez leur méthode ``se_presenter``.
.. step::
    Ajoutez une méthode ``est_majeur`` qui retourne ``True`` si l’âge est supérieur ou égal à 18, sinon ``False``.
.. step::
    Créez un objet et affichez un message indiquant si la personne est majeure.

.. slide::
✏️ Exercice 18 : Classe Voiture
-------------------------------

.. step:: reset
    Définissez une classe ``Voiture`` avec les attributs ``marque``, ``modele`` et ``annee``.
.. step::
    Ajoutez une méthode ``decrire`` qui affiche les informations sur la voiture.
.. step::
    Créez un objet ``Voiture`` et utilisez la méthode ``decrire``.
.. step::
    Ajoutez un attribut ``distance`` à la classe ``Voiture`` pour stocker la distance parcourue.
.. step::
    Ajoutez une méthode ``avancer`` qui augmente la distance.
.. step::
    Affichez la distance totale parcourue après plusieurs appels à ``avancer``.

.. slide::
✏️ Exercice 19 : Gestion d’une bibliothèque
---------------------------------------------

.. step:: reset
    Créez une classe ``Livre`` avec les attributs ``titre``, ``auteur`` et ``disponible`` (booléen).
.. step::
    Ajoutez les méthodes :

        - ``emprunter`` : marque le livre comme emprunté si disponible.
        - ``retourner`` : marque le livre comme disponible.
.. step::
    Testez en créant plusieurs livres et en appelant ces méthodes.

.. slide::
✏️ Exercice 20 : Classe Compte Bancaire
----------------------------------------

.. step:: reset
    Créez une classe ``CompteBancaire`` avec :

        - Un attribut ``titulaire`` pour le nom du titulaire.
        - Un attribut ``solde`` initialisé à 0.
.. step::
    Ajoutez les méthodes :

        - ``deposer`` pour ajouter de l'argent au solde.
        - ``retirer`` pour retirer de l'argent si le solde est suffisant.
        - ``afficher_solde`` pour afficher le solde actuel.
.. step::
    Testez la classe avec plusieurs opérations.

.. slide::
✏️ Exercice 21 : Classe Employe avec variable de classe
----------------------------------------

.. step:: reset
    Créez une classe ``Employe`` avec les attributs ``nom`` et ``salaire``.
.. step::
    Ajoutez une **variable de classe** ``nombre_employes``, initialisée à 0.
.. step::
    Dans le constructeur, augmentez la variable ``nombre_employes`` de 1 à chaque création d’un employé.
.. step::
    Ajoutez une méthode ``afficher_nombre_employes`` (méthode de classe) qui affiche le nombre total d’employés.
.. step::
    Créez plusieurs employés et utilisez la méthode pour afficher le nombre total d’employés créés.

.. slide::
✏️ Exercice 22 : Usine de jouets
--------------------------------

.. step:: reset
    Créez une classe ``Jouet`` avec :

        - Un attribut ``nom`` (le nom du jouet).
        - Une méthode ``description()`` qui affiche : ``"Ceci est un jouet nommé [nom]"``.
.. step:: 
    Créez deux classes enfants ``Peluche`` et ``Voiture`` qui héritent de ``Jouet`` :

        - **Classe ``Peluche``** :
            - Ajoutez un attribut ``matiere`` (par exemple : ``"coton"``).
            - Ajoutez une méthode ``serrer()`` qui affiche : ``"Vous serrez [nom] en peluche, en [matiere], c'est si doux !"``.

        - **Classe ``Voiture``** :
            - Ajoutez un attribut ``vitesse_max`` (en km/h).
            - Ajoutez une méthode ``conduire()`` qui affiche : ``"Vous conduisez [nom], elle peut aller jusqu'à [vitesse_max] km/h !"``.
.. step:: 
    Testez votre code :

        - Créez un objet de chaque classe enfant.
        - Appelez les méthodes ``description()``, ``serrer()`` et ``conduire()``.

Exemple de sortie attendue :

.. code-block:: text

    >> Ceci est un jouet nommé Ours
    >> Vous serrez Ours en peluche, en coton, c'est si doux !
    >> Ceci est un jouet nommé Ferrari
    >> Vous conduisez Ferrari, elle peut aller jusqu'à 300 km/h !


.. slide::

✅ Récapitulatif de Chapitre
-------------------------

- **POO** : Une méthode pour structurer le code en organisant les données et comportements en objets.
- **Classe** : Modèle ou plan permettant de créer des objets partageant des attributs et des méthodes communs.
- **Objet** : Instance d'une classe, représentant une entité spécifique avec ses propres données et comportements.

**Attributs et méthodes** :

    - **Attributs** : Variables liées à un objet pour stocker ses données.
    - **Méthodes** : Fonctions définies dans une classe décrivant les actions possibles d'un objet.

**Constructeur (``__init__``)** :

    - Permet d'initialiser automatiquement les attributs d'un objet lors de sa création.

**Self** :

    - Référence à l'objet actuel, nécessaire pour accéder à ses attributs et méthodes à l'intérieur de la classe.

**Méthodes spéciales** :

    - Exemple : ``__str__`` pour personnaliser l'affichage d'un objet.

**Héritage** :

    - Création de classes enfants à partir de classes parents pour réutiliser ou spécialiser le comportement.
    - Exemple : Une classe ``Chien`` héritant d'une classe ``Animal``.

**Variables et méthodes de classe** :

    - **Variables de classe** : Partagées entre toutes les instances d'une classe.
    - **Méthodes de classe** : Utilisent le décorateur ``@classmethod`` et agissent sur la classe entière.

**Pourquoi utiliser la POO ?**

- Facilite la **modélisation du monde réel**.
- Encourage la **réutilisation du code** via les classes et l’héritage.
- Favorise la **modularité** et rend le code plus **facile à maintenir**.


.. slide::
🏋️ Exercices supplémentaires
----------------------------

Refaites les exercices supplémentaires des chapitres précédents en utilisant la Programmation Orientée Objet.