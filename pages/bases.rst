.. slide::

Comprendre les bases
================

Objectifs de la Séance
----------------------

.. important::

 - Découvrir Python, comprendre les bases de son fonctionnement.  
 - Prendre en main l’environnement de développement VSCode.  
 - Savoir écrire et exécuter des programmes simples en Python.

.. slide::

Environement de développement
-----------------------------

Pour coder en Python, il est nécessaire d'avoir un environnement de développement. Il existe plusieurs IDE (Integrated Development Environment) pour développer en Python. Parmi les plus connus, on peut citer :
.. discoverList::
    * **Visual Studio Code** : IDE multi-langage open-source développé par Microsoft
    * **Edupython** : IDE Python développé par l'Académie d'Amiens pour l'enseignement du Python en collège/lycée
    * **PyCharm** : IDE Python développé par JetBrains (Solution payante)
    * **Spyder** : IDE Python développé pour les scientifiques
    * **Jupyter** : Application web permettant de créer et partager des documents contenant du code, des équations, des visualisations et du texte

.. slide::

Lors de ce cours, nous utiliserons **Visual Studio Code** du fait de sa simplicité d'utilisation et de sa compatibilité avec de nombreux langages de programmation.

.. slide::

Interface de Visual Studio Code
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. center::

    .. image:: ../images/vscode_interface.svg
        :alt: Interface de Visual Studio Code

.. slide::

Qu'est ce que Python ?
-----------------------------

Python est un langage de programmation : 
.. discoverList::
    * **Interprété** : Le code est exécuté directement par un programme appelé interpréteur, sans passer par une compilation complète. Cela permet de voir les résultats rapidement, mais peut être un plus lent qu’un langage compilé.
    * **Haut niveau** : Le langage est conçu pour être facile à comprendre et à écrire pour les humains. Il se rapproche du langage naturel et cache les détails techniques de la machine (comme la gestion de la mémoire).
    * **Multi-paradigme** : Le langage permet d'utiliser plusieurs styles de programmation (ou paradigmes), comme la programmation orientée objet, la programmation fonctionnelle ou la programmation procédurale. Cela rend le langage plus flexible et adaptable à différents types de projets.

.. slide::

Il est populaire pour sa simplicité et sa lisibilité. Voici quelques domaines où Python est utilisé :

 * Développement web (Django, Flask).
 * Analyse de données (Pandas, NumPy).
 * Intelligence artificielle et machine learning (TensorFlow, PyTorch).
 * Scripts d’automatisation.

.. slide::

Premiers pas avec Python
-----------------------------

Les commentaires
~~~~~~~~~~~~~~~~

Un commentaire est une ligne de texte qui n’est pas exécutée par l’interpréteur. Il sert à documenter le code.

Utilisation : un commentaire s’écrit avec ``#`` au début de la ligne.

.. success::

    Exemple :
    .. code-block:: python

        # Ceci est un commentaire
        print("Hello World") # Ceci est un autre commentaire

.. slide::

Les variables
~~~~~~~~~~~~~

Une variable est un espace de stockage qui permet de conserver dans le temps les données d'un programme (texte, nombre, liste, etc.) en la stockant dans la mémoire de l'ordinateur.

La variable possède **un nom**, **un type** et **une valeur**. (Nous verrons les types dans la suite du chapitre).

.. note::

    Le nom de la variable doit être **explicite** et permettre de comprendre le role qu'elle joue dans le programme.

    Un nom de variable doit commencer par une lettre ou un underscore (_) et ne doit pas contenir d'espace.

.. slide::

.. success::

    Exemple :
    .. code-block:: python

        # Déclaration d'une variable
        longueur = 25 # longueur est le nom de la variable, 25 est la valeur

    On dit que l'on **déclare** la variable longueur et qu'on lui **affecte** la valeur 25.


.. slide::

Affichage des données
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Pour afficher des données à l'écran, on utilise la fonction ``print()``.

.. success::

    Exemple :
    .. code-block:: python

        # Affichage d'une chaîne de caractères
        print("Hello World")
        >> Hello World

        # Affichage d'une variable
        longueur = 25
        print(longueur)
        >> 25 

.. slide::

Les types de données de base
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Python possède plusieurs types de données courants : 


**Nombres entiers** (*int*) :
.. code-block:: python
    a = 5
    print(type(a))
    >> int

**Nombres décimaux** (*float*) :
.. code-block:: python
    b = 3.14
    print(type(b))
    >> float

**Chaînes de caractères** (*str*) :
.. code-block:: python
    c = "Salut"
    print(type(c))
    >> str

**Booléens** (*bool*) :
.. code-block:: python
    d = True
    print(type(d))
    >> bool

.. slide::

Les opérateurs arithmétiques simples 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Python permet de faire des opérations mathématiques de base :
.. discoverList::

    * Addition : ``+``
    * Soustraction : ``-``
    * Multiplication : ``*``
    * Division : ``/``
    * Exponentiation : ``**``

.. success::
    
        Exemple :
        .. code-block:: python
    
            a = 5
            b = 3
            print(a + b)
            >> 8
    
            print(a - b)
            >> 2
    
            print(a * b)
            >> 15
    
            print(a / b)
            >> 1.6666666666666667
    
            print(a ** b)
            >> 125

.. slide::

Exercice 1 : Créer et lancer un programme Python simple avec VSCode
------------------------------------------------------------

.. note::
    Visual Studio Code a un fonctionnement qui est basé sur de la gestion de projets par dossier.  
    Il faut donc **toujours ouvrir un dossier** pour pouvoir travailler sur un projet.  
    Il faut **oublier l'idée d'ouvrir les fichiers un par un**, comme on le ferait avec un éditeur de texte classique.

.. step::
    Commençons par créer un dossier nommé ``Intro_Python`` dans vos Documents. C'est dans ce dossier que vous aller stocker tous vos projets de programmation que vous allez réaliser dans le cadre de ce cours.

.. note::
    Les noms de fichiers et dossiers ne doivent **jamais contenir d'espaces ou de caractères spéciaux**. On se limite, généralement, aux lettres de l'alphabet, aux chiffres, au tiret (-) et à l'underscore (_).
    
.. step::
    Une fois ce dossier créé, créez un sous-dossier nommé ``Comprendre_les_bases`` de sorte à ce que vous ayez la structure suivante : ``Documents/Intro_Python/Comprendre_les_bases/``. Ouvrez ensuite ce dossier avec Visual Studio Code.

.. step::
    Créez un nouveau fichier Python en cliquant sur le bouton ``+`` dans la barre latérale gauche de Visual Studio Code. Nommez ce fichier ``exercice1.py``.

