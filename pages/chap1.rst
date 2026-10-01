.. slide::

.. GROUPE A
Chapitre 1 - Les bases, les conditions et les boucles
=====================================================
.. GROUPE B
Chapitre 1 - Comprendre les bases
================
.. FIN GROUPE

🎯 Objectifs du Chapitre
----------------------

.. important::
 - Découvrir Python, comprendre ses possibles cas d'utilisation.
 - Prendre en main l’environnement de développement VSCode.  
 - Savoir écrire et exécuter des programmes simples en Python.
 - Savoir utiliser les opérateurs arithmétiques simples.
 .. GROUPE A
 - Écrire des programmes dynamiques en utilisant des conditions (``if``, ``else``) et des boucles (``for``, ``while``).
 - Comprendre l'importance des structures de contrôle pour gérer le flux d'exécution d'un programme.
 .. FIN GROUPE

.. slide::

📖 1. Environnement de développement
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

1.1 Interface de Visual Studio Code
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. _vscode_interface:
.. center::

    .. image:: images/vscode_interface.png
        :alt: Interface de Visual Studio Code

.. slide::

📖 2. Qu'est ce que Python ?
-----------------------------

Python est un langage de programmation : 
.. discoverList::
    * **Interprété** : Le code est exécuté directement par un programme appelé interpréteur, sans passer par une compilation complète. Cela permet de voir les résultats rapidement, mais peut être un peu plus lent qu’un langage compilé.
    * **Haut niveau** : Le langage est conçu pour être facile à comprendre et à écrire pour les humains. Il se rapproche du langage naturel et cache les détails techniques de la machine (comme la gestion de la mémoire).
    * **Multi-paradigme** : Le langage permet d'utiliser plusieurs styles de programmation (ou paradigmes), comme la programmation orientée objet (avec des objets munis d'attributs), la programmation fonctionnelle (avec des fonctions) ou la programmation impérative (instruction par instruction). Cela rend le langage plus flexible et adaptable à différents types de projets.

.. slide::

Il est populaire pour sa simplicité et sa lisibilité et il est majoritairement utilisé pour les applications suivantes : 

 * Développement web (Django, Flask).
 * Analyse de données (Pandas, NumPy).
 * Intelligence artificielle et machine learning (TensorFlow, PyTorch).
 * Scripts d’automatisation.

.. slide::

📖 3. Premiers pas avec Python
-----------------------------

3.1 Les commentaires
~~~~~~~~~~~~~~~~

Un commentaire est une ligne de texte qui n’est pas exécutée par l’interpréteur. Il sert à documenter le code.

Un commentaire s’écrit avec ``#`` au début de la ligne.

.. warning::

    Exemple :
    .. code-block:: python

        # Ceci est un commentaire
        print("Hello World") # Ceci est un autre commentaire

.. slide::

Un commentaire multi-lignes s'écrit avec des triples guillemets ``"""``.

.. warning::

    Exemple :
    .. code-block:: python

        """
        Ceci est un commentaire
        sur plusieurs lignes
        """
        print("Hello World")

.. note::
    Le raccourci clavier pour commenter/décommenter une ligne de code est ``Ctrl + /`` sur Linux  et ``Ctrl + :`` sur Windows.  
    Le raccourci clavier universel pour commenter une ligne de code est ``Ctrl + K + C`` et ``Ctrl + K + U`` pour décommenter.

.. slide::

3.2 Les variables
~~~~~~~~~~~~~

Une variable est un espace de stockage qui permet de conserver dans le temps les données d'un programme (texte, nombre, liste, etc.) en la stockant dans la mémoire de l'ordinateur.

La variable possède **un nom**, **un type** et **une valeur**. (Nous verrons les types dans la suite du chapitre).

.. note::

    Le nom de la variable doit être **explicite** et permettre de comprendre le rôle qu'elle joue dans le programme.

    Un nom de variable doit commencer par une lettre ou un underscore (_) et ne doit pas contenir d'espace.

.. warning::

    Exemple :
    .. code-block:: python

        # Déclaration d'une variable
        longueur = 25 # longueur est le nom de la variable, 25 est la valeur

    On dit que l'on **déclare** la variable longueur et qu'on lui **affecte** la valeur 25.


.. slide::

3.3 Affichage des données
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Pour afficher des données à l'écran, on utilise la fonction ``print()``.

.. warning::

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

On peut aussi afficher plusieurs éléments en les séparant par des virgules.

.. warning::

    Exemple :
    .. code-block:: python

        # Affichage de plusieurs éléments
        longueur = 25
        largeur = 10
        print("La longueur est de", longueur, "mètres et la largeur est de", largeur, "mètres.")
        >> La longueur est de 25 mètres et la largeur est de 10 mètres.

.. slide::

3.4 Les types de données de base
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Python possède plusieurs types de données courants : 


**Nombres entiers** (*int*) :
.. code-block:: python
    a = 5
    print(type(a))
    >> <class 'int'>

**Nombres décimaux** (*float*) :
En informatique, les nombres décimaux sont souvent représentés en nombre à **virgule flottante**, encore appelés nombres flottants.
.. code-block:: python
    b = 3.14
    print(type(b))
    >> <class 'float'>
.. note::
    Compte tenu de la manière dont les nombres à virgule flottante sont stockés en mémoire, les nombres flottants sont souvent approximés, ce qui peut entraîner des erreurs de calcul. Il faut donc **éviter de tester l'égalité de deux nombres flottants**.

**Chaînes de caractères** (*str*) :
.. code-block:: python
    c = "Salut"
    print(type(c))
    >> <class 'str'>

**Booléens** (*bool*) :
.. code-block:: python
    d = True
    print(type(d))
    >> <class 'bool'>

.. note::
    En Python, il n'est pas nécessaire de déclarer le type d'une variable, le langage se charge de le déterminer automatiquement.

.. slide::

3.5 Les opérateurs arithmétiques
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Python permet de faire des opérations mathématiques de base :
.. discoverList::

    * Addition : ``+``
    * Soustraction : ``-``
    * Multiplication : ``*``
    * Division : ``/``
    * Puissance : ``**``
    * Modulo : ``%`` (reste de la division euclidienne)
    * Division entière : ``//`` (quotient **entier** de la division euclidienne)

.. warning::
    
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

            print(a % b)
            >> 2

            print(a // b)
            >> 1

.. slide::


3.6 Les opérateurs d'affectation
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Vous connaissez déjà l'opérateur d'affectation ``=`` qui permet d'assigner une valeur à une variable.

Il existe d'autres opérateurs d'affectation qui permettent de simplifier l'écriture de certaines opérations.

.. discoverList::

    * ``+=`` : Ajoute une valeur à la variable.
    * ``-=`` : Soustrait une valeur à la variable.
    * ``*=`` : Multiplie la variable par une valeur.
    * ``/=`` : Divise la variable par une valeur.
    * ``%=`` : Modifie la variable pour qu'elle contienne le reste de la division euclidienne.
    * ``//=`` : Modifie la variable pour qu'elle contienne le quotient entier de la division euclidienne.

.. warning::
    
        Exemple :
        .. code-block:: python
    
            a = 5
            a += 3 #equivalent à a = a + 3
            print(a)
            >> 8
    
            a -= 3 #equivalent à a = a - 3
            print(a)
            >> 5
    
            a *= 3 #equivalent à a = a * 3
            print(a)
            >> 15
    
            a /= 3 #equivalent à a = a / 3
            print(a)
            >> 5.0
    
            a %= 3 #equivalent à a = a % 3
            print(a)
            >> 2.0
    
            a //= 3 #equivalent à a = a // 3
            print(a)
            >> 0.0

.. slide::

✏️ Exercice 1 : Créer et lancer un programme Python simple
------------------------------------------------------------

.. note::
    Visual Studio Code a un fonctionnement qui est basé sur de la gestion de projets par dossier.  
    Il faut donc **toujours ouvrir un dossier** pour pouvoir travailler sur un projet.  
    Il faut **oublier l'idée d'ouvrir les fichiers un par un**, comme on le ferait avec un éditeur de texte classique.

.. GROUPE A
.. step::
    Créez l'arborescence ``Documents/Intro_Python/Comprendre_les_bases/``, ouvrez le dossier ``Comprendre_les_bases`` dans Visual Studio Code (``Fichier`` -> ``Ouvrir un dossier``), puis créez-y un fichier nommé ``exercice1.py``.

.. note::
    Les noms de fichiers et dossiers ne doivent **jamais contenir d'espaces ou de caractères spéciaux** : on se limite aux lettres de l'alphabet, aux chiffres, au tiret (-) et à l'underscore (_). C'est l'extension ``.py`` qui indique que le fichier est un fichier Python.

.. GROUPE B
.. step::
    Commençons par créer un dossier nommé ``Intro_Python`` dans vos Documents. C'est dans ce dossier que vous allez stocker tous vos projets de programmation que vous allez réaliser dans le cadre de ce cours.

.. note::
    Les noms de fichiers et dossiers ne doivent **jamais contenir d'espaces ou de caractères spéciaux**. On se limite, généralement, aux lettres de l'alphabet, aux chiffres, au tiret (-) et à l'underscore (_).
    
.. step::
    Une fois ce dossier créé, créez un sous-dossier nommé ``Comprendre_les_bases`` de sorte à ce que vous ayez la structure suivante : ``Documents/Intro_Python/Comprendre_les_bases/``. Ouvrez ensuite ce dossier dans Visual Studio Code. (``Fichier`` -> ``Ouvrir un dossier``)

.. step::
    Créez un nouveau fichier Python en cliquant sur le bouton ``+`` (voir photo ci-dessous) dans l'explorateur de Visual Studio Code. Nommez ce fichier ``exercice1.py``.
    
    .. image:: images/vscode_new_file.png
        :alt: Créer un nouveau fichier Python
        :width: 40%

    .. note::
        Notez que c'est l'extension ``.py`` qui indique que le fichier est un fichier Python. Il est donc important de toujours respecter cette extension.

.. FIN GROUPE

.. step::
    Dans la partie éditeur de Visual Studio Code, écrivez un programme qui déclare les variables suivantes :
    .. discoverList::
        * ``nom`` : contenant votre nom.
        * ``age`` : contenant votre âge.
        * ``taille`` : contenant votre taille en mètres.

.. step::
    Puis, **en utilisant une seule fois la fonction ``print()``** afficher un message de présentation utilisant ces variables, suivi du type de chacune d'elles.

    Pour lancer votre programme, appuyez sur le bouton d'exécution du code tel que présenté :doc:`ici <chap1#vscode_interface>`.
    Ou alors, vous pouvez utiliser le terminal intégré de Visual Studio Code en tapant ``python exercice1.py``. (**N'oubliez pas de sauvegarder votre fichier avant de lancer le programme**).

.. note:: 
    Pour sauvegarder un fichier, vous pouvez utiliser le raccourci clavier ``Ctrl + S``.

Avec l'usage d'une seule itération de la fonction ``print()``, le message est plutôt très long et s'affiche sur une seule ligne. 
.. step::
    Cherchez sur internet le caractère spécial qui permet de faire un retour à la ligne dans un même print et utilisez le pour améliorer la lisibilité de votre message. (Attention, il doit être dans une chaîne de caractères pour fonctionner).

.. success::
    Vous savez maintenant comment créer, écrire et exécuter un programme Python. Vous avez également appris à faire un retour à la ligne dans un message affiché par la fonction ``print()``.

.. slide::

✏️ Exercice 2 : Opérations simples
---------------------------------

.. step:: reset
    Créez un nouveau fichier Python nommé ``exercice2.py`` dans le dossier ``Comprendre_les_bases``.

.. step::
    Écrire un programme qui demande à l'utilisateur deux nombres entiers, puis affiche la somme, la différence, le produit et le quotient de ces deux nombres. (Aidez-vous d'internet pour savoir comment demander des valeurs à l'utilisateur en Python, ou encore pour vous rappeler de ce qu'est un quotient 🙂).

.. note::
    Lorsque vous exécutez votre code, vous voyez les sorties/affichages de celui-ci dans le terminal de Visual Studio Code. **Les erreurs éventuelles sont aussi affichées dans ce terminal**. Lors des différents exercices de ce cours vous allez devoir **apprendre à lire ces messages d'erreurs** pour **comprendre et corriger** les erreurs que vous avez commises.  
    N'ayez pas peur des erreurs, elles font partie du processus d'apprentissage, et vous permettent de progresser. 

    .. discoverList::
        * En premier lieu, essayez de comprendre l'erreur par vous-même
        * Dans un second temps, vous pouvez vous aider d'internet avec des sites de questions/réponses comme `StackOverflow <https://stackoverflow.com>`_, ou encore des sites de documentation comme `W3Schools <https://www.w3schools.com/python/>`_.
        * En dernier recours, si vous êtes vraiment bloqués, n'hésitez pas à demander de l'aide à votre enseignant.

.. success::
    Vous savez maintenant comment utiliser des opérateurs arithmétiques simples et comment demander des informations à l'utilisateur de votre programme.

.. GROUPE A
.. INCLURE chap2 +3
.. FIN GROUPE

.. MASQUER
.. slide::
✅ Récapitulatif de Chapitre
-------------------------

.. recap::

    .. carte:: Commentaires

        Ignorés à l'exécution, ils expliquent le code.

        .. code-block:: python

            # sur une ligne

            """
            sur plusieurs
            lignes
            """

    .. carte:: Variables

        Un nom, un type, une valeur.

        .. code-block:: python

            longueur = 25

        Le nom doit être explicite, commencer par une lettre ou ``_``, et ne
        contenir ni espace ni accent.

    .. carte:: Types de base

        * ``int`` entier, par exemple 25
        * ``float`` nombre à virgule, par exemple 3.14
        * ``str`` chaîne de caractères, par exemple "Salut"
        * ``bool`` booléen, True ou False
        * ``type(x)`` donne le type de x

    .. carte:: Affichage

        .. code-block:: python

            print("v =", 3, "cm", x, end=" ")

        * ``,`` sépare les éléments affichés
        * ``\n`` retour à la ligne
        * ``\t`` tabulation
        * ``end=`` ce qui termine l'affichage, un retour à la ligne par défaut

    .. carte:: Saisie

        .. code-block:: python

            s = input("Saisir une valeur : ")

        ``input()`` renvoie **toujours** une chaîne. À convertir ensuite :

        * ``int(s)`` en entier
        * ``float(s)`` en flottant
        * ``eval(s)`` en booléen

    .. carte:: Opérations arithmétiques

        * ``+`` Addition
        * ``-`` Soustraction
        * ``*`` Multiplication
        * ``/`` Division
        * ``**`` Puissance
        * ``%`` Modulo, le reste de la division euclidienne
        * ``//`` Division entière, le quotient

    .. carte:: Opérateurs d'affectation

        * ``=`` Affecte une valeur
        * ``+=`` Ajoute à la variable
        * ``-=`` Soustrait à la variable
        * ``*=`` Multiplie la variable
        * ``/=`` Divise la variable
        * ``%=`` Garde le reste
        * ``//=`` Garde le quotient entier

    .. GROUPE A
    .. carte:: Opérateurs de comparaison

        * ``==`` Égal à
        * ``!=`` Différent de
        * ``<`` Inférieur à
        * ``>`` Supérieur à
        * ``<=`` Inférieur ou égal à
        * ``>=`` Supérieur ou égal à

    .. carte:: Opérateurs logiques

        * ``and`` Vrai si les deux conditions sont vraies
        * ``or`` Vrai si au moins une des conditions est vraie
        * ``not`` Inverse la condition

    .. carte:: Conditions

        .. code-block:: python

            if condition:
                # exécuté si la condition est vraie
            elif autre_condition:
                # exécuté si la première est fausse et celle-ci vraie
            else:
                # exécuté dans tous les autres cas

        Les deux-points ouvrent le bloc, l'indentation le délimite.

    .. carte:: Boucle while

        .. code-block:: python

            while condition:
                # répété tant que la condition est vraie

        * ``break`` Sort immédiatement de la boucle
        * ``continue`` Passe à l'itération suivante

    .. carte:: Boucle for

        .. code-block:: python

            for variable in sequence:
                # répété pour chaque élément de la séquence

        ``range(debut, fin, pas)`` engendre une suite d'entiers. Par défaut
        ``debut`` vaut 0 et ``pas`` vaut 1, et ``fin`` est toujours exclu :
        ``range(3)`` donne 0, 1 et 2.

        ``break`` et ``continue`` s'utilisent aussi dans une boucle ``for``.

    .. carte:: Tables de vérité

        +-------+-------+-------+-------+---------+--------+--------------+----------------+
        |   A   |   B   | not A | not B | A and B | A or B | not(A and B) | not A or not B |
        +=======+=======+=======+=======+=========+========+==============+================+
        | False | False | True  | True  | False   | False  | True         | True           |
        +-------+-------+-------+-------+---------+--------+--------------+----------------+
        | False | True  | True  | False | False   | True   | True         | True           |
        +-------+-------+-------+-------+---------+--------+--------------+----------------+
        | True  | True  | False | False | True    | True   | False        | False          |
        +-------+-------+-------+-------+---------+--------+--------------+----------------+
        | True  | False | False | True  | False   | True   | True         | True           |
        +-------+-------+-------+-------+---------+--------+--------------+----------------+

    .. FIN GROUPE

    .. carte:: À ne pas oublier

        * Les flottants sont approchés : ne testez jamais leur égalité.
        * La fonction ``input()`` renvoie une chaîne, même si l'utilisateur tape un nombre.
        * Un fichier Python s'enregistre avec l'extension ``.py``
        * Ni espace ni accent dans les noms de fichiers et de dossiers.
        .. GROUPE A
        * L'indentation délimite les blocs : ce qui appartient à un ``if`` ou à une boucle est décalé d'un cran.
        * ``=`` affecte une valeur, ``==`` compare deux valeurs.
        .. FIN GROUPE
        
        
.. FIN MASQUER

.. GROUPE A
.. slide::
🏋️ Exercices supplémentaires
--------------------

.. toctree::

    exos_sup_chap2
.. FIN GROUPE
