.. slide::

.. GROUPE A
Chapitre 5 - Manipulation de fichiers et de données textuelles
=====================================
.. GROUPE B
Chapitre 6 - Manipulation de fichiers et de données textuelles
=====================================
.. FIN GROUPE

🎯 Objectifs du Chapitre
---------------------

.. important:: 
    - Apprendre à manipuler des fichiers texte avec Python.
    - Comprendre les opérations fondamentales comme la lecture, l'écriture et la modification de fichiers externes.
    - Découvrir les bonnes pratiques pour la gestion des fichiers.


.. slide::
📖 1. Arborescence des fichiers et dossiers
-----------------------

1.1 Qu’est-ce qu’une arborescence de fichiers ?
~~~~~~~~~~~~~~~~~~~~~~~~

L’arborescence des fichiers est une organisation hiérarchique des fichiers et dossiers (ou répertoires) sur un système de fichiers. Chaque fichier ou dossier a une position unique dans cette hiérarchie, appelée **chemin**.

.. slide::
1.2 Chemin absolu vs chemin relatif
~~~~~~~~~~~~~~~~~~~~~~~~

**1.2.1 Chemin absolu**  
Il commence à partir de la racine du système (``/`` sous Linux/macOS ou une lettre de disque sous Windows, comme ``C:\``).

.. warning::
    Exemple :

    - ``C:\Users\John\Documents\mon_fichier.txt`` sous Windows.
    - ``/home/john/Documents/mon_fichier.txt`` sous Linux.

**1.2.2 Chemin relatif**  
Il est relatif à un dossier de travail (ou répertoire courant).

.. note::
    Quand vous ouvrez un dossier dans VSCode, il devient donc votre **dossier de travail** et les **chemins relatifs** sont **calculés par rapport à ce dossier**.

.. warning::
    Exemple :

    - ``mon_fichier.txt`` si le fichier est dans le dossier de travail.
    - ``dossier/mon_fichier.txt`` si le fichier est dans un sous-dossier du dossier de travail.
    - Si le script Python s’exécute dans ``/home/user/``, le chemin ``./documents/fichier.txt`` pointe vers ``/home/user/documents/fichier.txt``. 
    - Le point ``.`` signifie le dossier courant.

.. slide::
1.3 Naviguer dans l’arborescence avec Python
~~~~~~~~~~~~~~~~~~~~~~~~

Python propose le module ``os`` pour manipuler les fichiers et répertoires, et le module ``pathlib`` pour gérer les chemins de manière plus intuitive.

Nous considérons dans cette partie du cours une arborescence de fichiers/dossiers initiale simple. Cette arborescence sera utilisée comme référence pour les exemples.

.. code-block:: bash
    mon_projet/                 # Répertoire de travail (.)
    │
    ├── main.py                 # Script principal
    ├── data/                   # Répertoire pour les fichiers de données
    │   ├── input.txt           # Fichier d'entrée
    │   ├── output.txt          # Fichier de sortie
    │   └── logs/               # Sous-répertoire pour les journaux
    │       └── app.log
    └── utils/                  # Répertoire pour les fonctions utilitaires
        ├── __init__.py         # Fichier pour définir un package Python
        └── helpers.py          # Module avec des fonctions utiles

Le répertoire de travail (ou dossier courant) sera ici ``mon_projet/``.

.. slide::
**1.3.1 Lister des fichiers et dossiers**

Pour lister les fichiers et dossiers dans un répertoire, on peut utiliser la fonction ``os.listdir()`` ou la méthode ``iterdir()`` de l’objet ``Path``.

.. warning::
    Exemple :

    - Avec ``os.listdir()`` :

    .. code-block:: python

        import os

        # Lister les fichiers et dossiers du répertoire courant
        contenu = os.listdir(".")
        print("Contenu du répertoire courant :", contenu)
        
        >> Contenu du répertoire courant : ['main.py', 'data', 'utils']

    - Avec ``Path.iterdir()`` :

    .. code-block:: python

        from pathlib import Path

        # Lister les fichiers et dossiers du répertoire courant
        dossier = Path(".")

        for fichier in dossier.iterdir():
            print(fichier)  # Affiche tous les fichiers et sous-dossiers

        >> main.py
        >> data
        >> utils

.. slide::
**1.3.2 Changer de répertoire et vérifier le répertoire courant**

Pour changer de répertoire, on peut utiliser la fonction ``os.chdir()`` ou la méthode ``chdir()`` de l’objet ``Path``.

.. warning::
    Exemple :

    - Avec ``os.chdir()`` :

    .. code-block:: python

        import os

        # Changer de répertoire
        os.chdir("data/logs") # ou os.chdir("./data/logs/")

        # Vérifier le répertoire courant
        print("Répertoire courant :", os.getcwd())

        >> Répertoire courant : /home/user/mon_projet/data/logs
        # Chemin absolu du répertoire courant

    - Avec ``Path.chdir()`` :

    .. code-block:: python

        from pathlib import Path

        # Changer de répertoire
        dossier = Path("data/logs") # ou Path("./data/logs/")
        dossier.chdir()

        # Vérifier le répertoire courant
        print("Répertoire courant :", dossier.cwd())

        >> Répertoire courant : /home/user/mon_projet/data/logs
            # Chemin absolu du répertoire courant

.. slide::
**1.3.3 Verifier l'existence d'un fichier ou d'un dossier**

Pour vérifier l'existence d'un fichier ou d'un dossier, on peut utiliser la fonction ``os.path.exists()`` ou la méthode ``exists()`` de l’objet ``Path``.

.. warning::
    Exemple :

    - Avec ``os.path.exists()`` :

    .. code-block:: python

        import os

        # Vérifier l'existence d'un fichier ou d'un dossier
        print("Le fichier existe :", os.path.exists("main.py")) # ou os.path.exists("./main.py")

        >> Le fichier existe : True

    - Avec ``Path.exists()`` :

    .. code-block:: python

        from pathlib import Path

        # Vérifier l'existence d'un fichier ou d'un dossier
        fichier = Path("main.py") # ou Path("./main.py")
        print("Le fichier existe :", fichier.exists())

        >> Le fichier existe : True

.. slide::
**1.3.4 Créer un nouveau dossier**

Pour créer un nouveau dossier, on peut utiliser la fonction ``os.mkdir()`` ou la méthode ``mkdir()`` de l’objet ``Path``.

.. warning::
    Exemple :

    - Avec ``os.mkdir()`` :

    .. code-block:: python

        import os

        # Créer un nouveau dossier
        os.mkdir("nouveau_dossier") # ou os.mkdir("./nouveau_dossier/")

    - Avec ``Path.mkdir()`` :

    .. code-block:: python

        from pathlib import Path

        # Créer un nouveau dossier
        dossier = Path("nouveau_dossier") # ou Path("./nouveau_dossier/")
        dossier.mkdir()

    La nouvelle arborescence sera alors :
    .. code-block:: bash
        mon_projet/                 # Répertoire de travail (.)
        │
        ├── main.py                 # Script principal
        ├── data/                   # Répertoire pour les fichiers de données
        │   ├── input.txt           # Fichier d'entrée
        │   ├── output.txt          # Fichier de sortie
        │   └── logs/               # Sous-répertoire pour les journaux
        │       └── app.log
        ├── utils/                  # Répertoire pour les fonctions utilitaires
        │
        └── nouveau_dossier/         # Nouveau dossier créé

.. slide::
**1.3.5 Supprimer un fichier ou un dossier**

Pour supprimer un fichier ou un dossier, on peut utiliser :
    - la fonction ``os.remove()`` ou la méthode ``unlink()`` de l’objet ``Path`` pour les **fichiers**,
    - la fonction ``os.rmdir()`` ou la méthode ``rmdir()`` de l’objet ``Path`` pour les **dossiers**.

.. warning::
    Exemple pour supprimer un fichier :

    - Avec ``os.remove()`` :

    .. code-block:: python

        import os

        # Supprimer un fichier
        os.remove("main.py") # ou os.remove("./main.py")

    - Avec ``Path.unlink()`` :

    .. code-block:: python

        from pathlib import Path

        # Supprimer un fichier
        fichier = Path("main.py") # ou Path("./main.py")
        fichier.unlink()

.. slide::
.. warning::
    Exemple pour supprimer un dossier :

    - Avec ``os.rmdir()`` :

    .. code-block:: python

        import os

        # Supprimer un dossier
        os.rmdir("nouveau_dossier") # ou os.rmdir("./nouveau_dossier/")

    - Avec ``Path.rmdir()`` :

    .. code-block:: python

        from pathlib import Path

        # Supprimer un dossier
        dossier = Path("nouveau_dossier") # ou Path("./nouveau_dossier/")
        dossier.rmdir()

.. slide::
.. warning::
    La nouvelle arborescence sera alors :

    .. code-block:: bash
        mon_projet/                 # Répertoire de travail (.)
        │
        ├── data/                   # Répertoire pour les fichiers de données
        │   ├── input.txt           # Fichier d'entrée
        │   ├── output.txt          # Fichier de sortie
        │   └── logs/               # Sous-répertoire pour les journaux
        │       └── app.log
        └── utils/                  # Répertoire pour les fonctions utilitaires

.. slide::
📖 2. Manipulation de fichiers textuels
-----------------------

2.1 Pourquoi manipuler des fichiers avec Python ?
~~~~~~~~~~~~~~~~~~~~~~~~

Les fichiers sont une méthode essentielle pour stocker et récupérer des données dans des programmes. Les fichiers texte, en particulier, sont utilisés pour :

- Sauvegarder des résultats ou des logs.
- Charger des configurations ou des paramètres.
- Manipuler des bases de données simples (ex. : fichiers CSV).
- Traiter des contenus comme des articles, scripts, ou documents.

Dans cette partie du cours, nous continuons à utiliser l’arborescence de fichiers/dossiers précédente.

Le contenu du fichier ``input.txt`` est le suivant :

.. code-block:: text
    Les circuits rêvent de lumière douce,
    Mécanique danse dans un souffle d'ombre,
    L'esprit sans chair murmure aux étoiles,
    Un écho binaire tisse l'infini.

.. slide::
2.2 Ouverture et fermeture d’un fichier
~~~~~~~~~~~~~~~~~~~~~~~~

**2.2.1 Ouverture d'un fichier**

La fonction ``open()`` est utilisée pour ouvrir un fichier en Python. Elle retourne un objet fichier qui permet d’effectuer des opérations (lecture, écriture, etc.).

.. code-block:: python
    fichier = open("nom_du_fichier.txt", mode)

- ``nom_du_fichier.txt`` : Chemin ou nom du fichier.
- ``mode`` : Définit l'opération sur le fichier :
    * ``'r'`` : Lecture seule (mode par défaut).
    * ``'w'`` : Écriture (écrase le fichier s’il existe).
    * ``'a'`` : Ajout (ajoute du contenu à la fin du fichier).
    * ``'x'`` : Création d’un nouveau fichier (erreur si le fichier existe déjà).
    * ``'b'`` : Mode binaire (ex. : pour les images).
    * ``'t'`` : Mode texte (par défaut).

.. slide::
**2.2.2 Fermeture d’un fichier**

Il est important de fermer un fichier après utilisation pour libérer les ressources système. Pour cela, utilisez la méthode ``close()``.

.. warning::
    Exemple :

    .. code-block:: python
        fichier = open("data/input.txt", "r")
        # Opérations sur le fichier
        fichier.close()

    # Le fichier est fermé et les ressources libérées

.. slide::
**2.2.3 Bonnes pratiques avec ``with``**

Il est recommandé d’utiliser une structure ``with`` pour garantir que le fichier est correctement fermé après utilisation. 

.. warning::
    Exemple :

    .. code-block:: python

        with open("data/input.txt", "r") as fichier:
            # Opérations sur le fichier
            contenu = fichier.read()

        # Le fichier est automatiquement fermé à la fin du bloc with

.. slide::
2.3 Lire un fichier
~~~~~~~~~~~~~~~

**2.3.1 Lecture complète**

La méthode ``read()`` permet de lire tout le contenu d’un fichier en une seule fois.

.. warning::
    Exemple :
    .. code-block:: python

        with open("data/input.txt", "r") as fichier:
            contenu = fichier.read()
            print(contenu)
        
        >> Les circuits rêvent de lumière douce,
        >> Mécanique danse dans un souffle d'ombre,
        >> L'esprit sans chair murmure aux étoiles,
        >> Un écho binaire tisse l'infini.

.. slide::
**2.3.2 Lecture ligne par ligne**

Pour lire un fichier ligne par ligne, utilisez la méthode ``readline()`` ou itérez sur l’objet fichier.

.. warning::
    Exemple :

    - Avec ``readline()`` :

    .. code-block:: python

        with open("data/input.txt", "r") as fichier:
            print(fichier.readline())  # Lire la première ligne
            print(fichier.readline())  # Lire la deuxième ligne
        
        >> Les circuits rêvent de lumière douce,
        >> Mécanique danse dans un souffle d'ombre,

    - Avec une boucle ``for`` :

    .. code-block:: python

        with open("data/input.txt", "r") as fichier:
            for ligne in fichier:
                print(ligne.strip()) # la méthode strip() retire les caractères de fin de ligne (\n)
        
        >> Les circuits rêvent de lumière douce,
        >> Mécanique danse dans un souffle d'ombre,
        >> L'esprit sans chair murmure aux étoiles,
        >> Un écho binaire tisse l'infini.
        
.. slide::
**2.3.3 Lecture en tant que liste**

La méthode ``readlines()`` lit tout le contenu et retourne une liste où chaque élément est une ligne du fichier.

.. warning::
    Exemple :
    .. code-block:: python

            with open("data/input.txt", "r") as fichier:
                lignes = fichier.readlines()
                print(lignes)
            
            >> ['Les circuits rêvent de lumière douce,\n', "Mécanique danse dans un souffle d'ombre,\n", "L'esprit sans chair murmure aux étoiles,\n", "Un écho binaire tisse l'infini."]

.. note::
    Chaque élément de la liste contient le caractère de fin de ligne ``\n``. Vous pouvez **utiliser la méthode ``strip()`` pour le retirer**.
    Le caractère de fin de ligne est différent selon le système d’exploitation : ``\n`` sous Linux/macOS et ``\r\n`` sous Windows.
    Il permet d'**indiquer au système d’exploitation la fin de la ligne**.

.. slide::
2.4 Écrire dans un fichier
~~~~~~~~~~~~~~~~~~~~~

**2.4.1 Écriture complète en écrasant le contenu existant**

Utilisez le mode ``'w'`` pour écrire dans un fichier ainsi que la méthode ``write()``. Attention, cela écrase le contenu existant.

.. warning::
    Exemple :

    .. code-block:: python

        with open("data/input.txt", "w") as fichier:
            fichier.write("Hello, World!\n")

            fichier.read()  

        >> io.UnsupportedOperation: not readable
        # Erreur : le fichier est ouvert en mode écriture

    .. code-block:: python

        with open("data/input.txt", "r") as fichier:
            print(fichier.read())

        >> Hello, World!

.. slide::
**2.4.2 Écriture en ajoutant du contenu à la fin**

Utilisez le mode ``'a'`` pour ajouter du contenu à un fichier existant sans écraser son contenu.

.. warning::
    Exemple :

    .. code-block:: python

        with open("data/output.txt", "a") as fichier:
            fichier.write("Nouvelle ligne\n")
        
    .. code-block:: python

        with open("data/output.txt", "r") as fichier:
            print(fichier.read())

        >> Hello, World!
        >> Nouvelle ligne

.. slide::
2.5 Bonnes pratiques pour la lecture et l'écriture de fichiers textuels
~~~~~~~~~~~~~~~~~~~~~~~~

Pour éviter les erreurs, vérifiez si un fichier existe avant de le lire ou de l'écrire

.. warning::
    Exemple :

    .. code-block:: python

        from pathlib import Path

        fichier = Path("data/input.txt")

        if fichier.exists():
            with open(fichier, "r") as f:
                print(f.read())
        else:
            print("Le fichier n'existe pas.")

        # Le fichier est lu s'il existe, sinon un message est affiché

.. slide::
✏️ Exercice 16 : Manipulation de fichiers
---------------------------------------

**Objectif** : Cet exercice est composé de plusieurs petits exercices pour vous entraîner à manipuler et traiter des fichiers avec Python.

.. step:: reset
    Dans un premier temps, utilisez l'explorateur de fichiers pour créer un dossier nommé ``Exercice16`` et définissez le comme répertoire de travail dans VSCode (``Fichier > Ouvrir un dossier``).

.. step::
    Depuis l'interface de VSCode, créer l'aborescence de fichiers suivante :

    .. code-block:: bash
        .                 # Répertoire de travail (Exercice16/)
        │
        ├── main.py                 # Script principal
        ├── data/                   # Répertoire pour les fichiers de données
        │   ├── fruits.txt           # Fichier d'entrée
        │   ├── legumes.txt          # Fichier de sortie
        │   └── logs/               # Sous-répertoire pour les journaux
        │       └── logs_28-11-2024.txt
        └── utils/                  # Répertoire pour les fonctions utilitaires
            ├── __init__.py         # Fichier pour définir un package Python
            └── helpers.py          # Module avec des fonctions utiles

.. step:: 
    Dans le terminal de VSCode, tapez la commande ``tree`` (sous Linux) ou ``tree /f`` (sous Windows) et vérifiez que l'arborescence des fichiers est correcte vis à vis de l'arborescence ci-dessus.

.. note::
    Le code Python que vous écrirez dans les prochains exercices doit être **placé dans le fichier ``main.py``**.
    Lorsque vous passez au sous-exercice suivant, **commentez votre code précédent** pour éviter les conflits.

Vous pouvez utiliser ``os`` ou ``pathlib`` à votre convenance. 

.. note::
    Utilisez la documentation des modules ``os`` et ``pathlib`` sur internet pour vous aider. **Une partie des fonctions et méthodes à utiliser ne sont pas présentées dans le cour**s. 

**Exercice 16.1** : Lister et identifier les fichiers et dossiers

.. step:: reset
    Demandez à l’utilisateur d’entrer le chemin d’un dossier. (ex. : ``data/``)

.. step::
    Listez tous les éléments (fichiers et dossiers) du dossier saisi.

.. step::
    Pour chaque élément, affichez s’il s’agit d’un fichier ou d’un dossier.

**Exemples de résultat attendu** :

.. code-block:: text

    >> Entrez le chemin d'un dossier : data/
    >> Fichier : fruits.txt
    >> Fichier : legumes.txt
    >> Dossier : logs

ou encore 

.. code-block:: text

    >> Chemin du dossier : .
    >> Fichier : main.py
    >> Dossier : data
    >> Dossier : utils

**Exercice 16.2** : Création de dossiers

.. step:: reset
    Demandez à l’utilisateur un chemin pour créer un nouveau dossier.

.. step::
    Vérifiez si le dossier existe déjà :

        - S’il n’existe pas, créez-le et affichez un message de confirmation.
        - S’il existe, affichez un message indiquant que le dossier existe déjà.

.. step::
    Lancez votre programme et donnez comme nom de dossier ``data/logs2``.

**Exemples de résultat attendu** :
.. code-block:: text

    >> Entrez le chemin du dossier à créer : data/logs2
    >> Le dossier a été créé avec succès.

**Exercice 16.3** : Recherche d’un fichier spécifique
.. step:: reset
    Demandez à l’utilisateur d’entrer le nom d’un fichier et le dossier dans lequel rechercher.

.. step::
    Parcourez récursivement tout le dossier spécifié pour chercher le fichier.

.. step::
    Si le fichier est trouvé, affichez son chemin absolu; sinon, indiquez qu’il n’existe pas.

**Exemples de résultat attendu** :
.. code-block:: text

    >> Entrez le nom du fichier à rechercher : logs_28-11-2024.txt
    >> Entrez le dossier de recherche : .
    >> Fichier trouvé : ./data/logs/logs_28-11-2024.txt

ou encore

.. code-block:: text

    >> Entrez le nom du fichier à rechercher : test.py
    >> Entrez le dossier de recherche : data/
    >> Fichier non trouvé.

**Exercice 16.4** : Suppression d’un fichier

.. step:: reset
    Demandez à l’utilisateur un chemin de fichier.

.. step::
    Verifier si le fichier existe :

        - S’il existe, supprimez-le et affichez un message de confirmation.
        - S’il n’existe pas, affichez un message indiquant que le fichier n’existe pas.

**Exemple de résultat attendu** :

.. code-block:: text

    >> Entrez le chemin du fichier à supprimer : data/legumes.txt
    >> Le fichier a été supprimé avec succès.

**Exercice 16.5** : Arborescence complète d'un dossier

.. step:: reset
    Demandez à l’utilisateur d’entrer le chemin d’un dossier.

.. step::
    Parcourez récursivement tout le dossier spécifié.

.. step::
    Affichez l’arborescence complète du dossier avec les fichiers et sous-dossiers sous une forme structurée.

**Exemple de résultat attendu** :
.. code-block:: text
    >> Entrez le chemin du dossier : .
    >> ./
    >>     main.py
    >>     data/
    >>         logs2/
    >>         fruits.txt
    >>         logs/
    >>             logs_28-11-2024.txt
    >>     utils/
    >>         helpers.py
    >>         __init__.py

**Exercice 16.6** : Ecriture dans un fichier

.. step:: reset
    Déclarez dans votre code une variable de type liste contenant des fruits.

.. step::
    Créez une fonction qui prend en paramètre le chemin d’un fichier et la liste de fruits.
    Ecrivez cette fonction tel que chaque fruit de la liste soit écrit dans le fichier, un fruit par ligne.

.. step::
    Lancez votre programme et écrivez les fruits dans le fichier ``data/fruits.txt``.

.. step::
    Vérifiez le contenu du fichier pour voir si les fruits ont bien été ajoutés.

**Exemple de résultat attendu** :

.. code-block:: text
    >> Fruits écrits dans le fichier : data/fruits.txt
    >>
    >> Contenu du fichier :
    >> Pomme
    >> Banane
    >> Orange
    >> Mangue
    >> Fraise

**Exercice 16.7** : Copie d’un fichier

.. step:: reset
    Demandez à l’utilisateur le chemin du fichier à copier et le chemin de destination.

.. step::
    Vérifiez si le fichier source existe :

        - S’il existe, copiez-le dans le dossier de destination et affichez un message de confirmation.
        - S’il n’existe pas, affichez un message indiquant que le fichier n’existe pas.

.. step::
    Affichez le contenu du fichier de destination pour vérifier que la copie a bien été effectuée.

**Exemple de résultat attendu** :

.. code-block:: text

    >> Entrez le chemin du fichier à copier : data/fruits.txt
    >> Entrez le chemin de destination : data/fruits_copy.txt
    >> Le fichier a été copié avec succès.
    >> 
    >> Contenu du fichier data/fruits_copy.txt :
    >> Pomme
    >> Banane
    >> Orange
    >> Mangue
    >> Fraise

**Exercice 16.8** : Statistiques sur un répertoire

.. step:: reset
    Demandez à l’utilisateur d’entrer le chemin d’un dossier.

.. step::
    Analysez tout le contenu du dossier pour :

        - Compter le nombre total de fichiers et de dossiers.
        - Afficher la taille totale des fichiers en octets.

**Exemple de résultat attendu** :

.. code-block:: text

    >> Entrez le chemin du dossier : data/
    >> Nombre de fichiers : 3
    >> Nombre de dossiers : 2
    >> Taille totale des fichiers : 68 octets

**Exercice 16.9** : Recherche de fichiers par extension

.. step:: reset
    Demandez à l’utilisateur d’entrer une extension de fichier (ex. : ``.txt``) et un dossier dans lequel rechercher.

.. step::
    Parcourez récursivement tout le dossier spécifié pour chercher les fichiers avec l’extension donnée.

.. step::
    Affichez le nombre de fichiers trouvés et leur chemin absolu.

**Exemple de résultat attendu** :
.. code-block:: text
    >> Entrez l'extension de fichier à rechercher (ex. : .txt) : .txt 
    >> Entrez le chemin du dossier à rechercher : .
    >> 
    >> Nombre de fichiers trouvés : 3
    >> Fichiers trouvés :
    >> /home/user/Exercice16/data/fruits_copy.txt
    >> /home/user/Exercice16/data/fruits.txt
    >> /home/user/Exercice16/data/logs/logs_28-11-2024.txt


.. slide::
🏋️ Exercices supplémentaires
--------------------

.. toctree::

    exos_sup_chap6
