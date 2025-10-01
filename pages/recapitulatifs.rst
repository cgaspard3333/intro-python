.. slide::
✅ Récapitulatif de Chapitre
-------------------------

.. center::

    .. image:: images/recap_chap1.png
        :alt: Récapitulatif du Chapitre 1
        :width: 100%
        
        
.. slide::
✅ Récapitulatif de Chapitre
-------------------------

.. center::

    .. image:: images/recap_chap2.png
        :alt: Récapitulatif du Chapitre 2
        :width: 100%
           
       
.. slide::
✅ Récapitulatif de Chapitre
-------------------------

.. |puplet_notation| div::
    .. center::
    ``(1, 8, 5)``

.. |tableau_notation| div::
    .. center::
    ``[1, 8, 5]``

.. |dictionnaire_notation| div::
    .. center::
    ``{1: 'Paul', 2: 'Tom', 3: 'Nadia'}``

---

.. |puplet_construction| div::
    .. center::
    P-uplet vide: ``t = ()``
    
    ``t1 = (1, 8, 5)``

.. |tableau_construction| div::
    .. center::
    Liste vide: ``L = []``
    
    ``L1 = [1, 8, 5]``

.. |dictionnaire_construction| div::
    .. center::
    Dictionnaire vide: ``D = {}``
    
    ``d1 = {1: 'Paul', 2: 'Tom', 3: 'Nadia'}``

---

.. |puplet_elements| div::
    .. center::
    **Oui**
    
    ``t2 = (1, 'b', True)``

.. |tableau_elements| div::
    .. center::
    **Oui**
    
    ``L2 = [1, 'b', True]``

.. |dictionnaire_elements| div::
    .. center::
    Les clés peuvent être de tout type, à condition d’être non modifiables: *int, str, tuple*
    
    ``d2 = {4: 'Léa', 5: 'Téo'}``

---

.. |puplet_lecture| div::
    .. center::
    ``t1[0]`` renvoie ``1``
    
    ``t1[-1]`` renvoie le dernier élément de ``t1``, soit ``5``
    
    ``t2[2]`` renvoie ``True``

.. |tableau_lecture| div::
    .. center::
    ``L1[0]`` renvoie ``1``
    
    ``L1[-1]`` renvoie le dernier élément de ``L1``, soit ``5``
    
    ``L2[2]`` renvoie ``True``

.. |dictionnaire_lecture| div::
    .. center::
    ``d1[0]`` renvoie une erreur (clé inexistante)
    
    ``d1[1]`` renvoie ``'Paul'``

---

.. |puplet_concatenation| div::
    .. center::
    ``t1 + t2`` renvoie
    
    ``(1, 8, 5, 1, 'b', True)``

.. |tableau_concatenation| div::
    .. center::
    ``L1 + L2`` renvoie 
    
    ``[1, 8, 5, 1, 'b', True]``

.. |dictionnaire_concatenation| div::
    .. center::
    **Non**
    
    ``d1 + d2`` renvoie une erreur de type

---

.. |puplet_multiplication| div::
    .. center::
    ``2 * t1`` renvoie ``(1, 8, 5, 1, 8, 5)``

.. |tableau_multiplication| div::
    .. center::
    ``2 * L1`` renvoie ``[1, 8, 5, 1, 8, 5]``

.. |dictionnaire_multiplication| div::
    .. center::
       
    **Non**

    ``2 * d1`` renvoie une erreur

---

.. |puplet_modifiable| div::
    .. center::
    **Non**
    
    On peut créer un nouveau p-uplet

.. |tableau_modifiable| div::
    .. center::
    **Oui**
    
    Avec l'instruction ``L1[2] = 4``, ``L1`` devient ``[1, 8, 4]``

.. |dictionnaire_modifiable| div::
    .. center::
    On peut modifier les valeurs, mais pas les clés
    
    Exemple: ``d1[2] = 'Joe'`` remplace ``'Tom'`` par ``'Joe'``

---

.. |puplet_longueur| div::
    .. center::
    ``len(t1)`` renvoie ``3``

.. |tableau_longueur| div::
    .. center::
    ``len(L1)`` renvoie ``3``

.. |dictionnaire_longueur| div::
    .. center::
    ``len(d1)`` renvoie ``3``

---

.. |puplet_methodes| div::
    .. center::
    Pas de méthode spécifique à connaître

.. |tableau_methodes| div::
    .. center::
    ``L1.append(element)`` ajoute ``element`` à la fin de ``L1``
        
    ``L1.remove(element)`` supprime la première occurrence de ``element`` dans ``L1``

    ``L1.index(element)`` renvoie l'index de la première occurrence de ``element`` dans ``L1``

    ``L1.count(element)`` renvoie le nombre d'occurrences de ``element`` dans ``L1``

    ``L1.sort()`` trie les éléments de ``L1``

    ``L1.reverse()`` inverse l'ordre des éléments de ``L1``

.. |dictionnaire_methodes| div::
    .. center::
    ``d1.items()`` renvoie la collection d’objets
    
    ``d1.keys()`` renvoie les clés
    
    ``d1.values()`` renvoie les valeurs

    ``d1.get(key)`` renvoie la valeur associée à la clé ``key``

    ``d1.pop(key)`` supprime l'élément associé à la clé ``key``


.. center::
    +------------------------+------------------------+--------------------------+--------------------------------------+
    |                        | **P-uplet**            | **Tableau (liste)**      | **Dictionnaire**                     |
    +========================+========================+==========================+======================================+
    | **Notation**           | |puplet_notation|      | |tableau_notation|       | |dictionnaire_notation|              |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Construction**       | |puplet_construction|  | |tableau_construction|   | |dictionnaire_construction|          |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Les élements**       | |puplet_elements|      | |tableau_elements|       | |dictionnaire_elements|              |
    | **internes peuvent**   |                        |                          |                                      |
    | **être de différents** |                        |                          |                                      |
    | **types**              |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Lecture du contenu** | |puplet_lecture|       | |tableau_lecture|        | |dictionnaire_lecture|               |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Concaténation**      | |puplet_concatenation| | |tableau_concatenation|  | |dictionnaire_concatenation|         |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Multiplication**     | |puplet_multiplication|| |tableau_multiplication| | |dictionnaire_multiplication|        |
    | **par un entier**      |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Modifiable par**     | |puplet_modifiable|    | |tableau_modifiable|     | |dictionnaire_modifiable|            |
    | **affectation**        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Longueur**           | |puplet_longueur|      | |tableau_longueur|       | |dictionnaire_longueur|              |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Méthodes**           | |puplet_methodes|      | |tableau_methodes|       | |dictionnaire_methodes|              |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+

.. center::

    .. image:: images/recap_chap3.png
        :alt: Récapitulatif du Chapitre 3
        :width: 100%
        
        
.. slide::
✅ Récapitulatif de Chapitre
----------------------------

1. **Modules en Python**
    - Un **module** est un fichier contenant du code Python réutilisable (fonctions, variables, classes).
    - **Importation de modules** :
        - ``import module`` : importe tout le module.
        - ``from module import fonction`` : importe une fonction spécifique.
        - ``import module as alias`` : importe le module avec un alias.
    - **Modules intégrés courants** :
        - ``math`` : fonctions mathématiques.
        - ``random`` : génération de nombres aléatoires.
        - ``datetime`` : manipulation de dates et heures.

2. **Modules Externes et ``pip``**
    - ``pip`` est le gestionnaire de paquets Python pour installer des modules externes.
        - **Installer** un module : ``pip install nom_du_module``.
        - **Mettre à jour** un module : ``pip install --upgrade nom_du_module``.
        - **Désinstaller** un module : ``pip uninstall nom_du_module``.
    - Exemples de modules externes :
        - ``numpy``, ``pandas``, ``matplotlib``.

3. **Création de Modules et Packages Personnalisés**
    - **Créer un module** : écrire des fonctions dans un fichier ``.py``.
    - **Créer un package** : dossier avec un fichier ``__init__.py`` et plusieurs modules.
        - **Structure d'un package** :
            |code_struct_package|

    - **Utilisation de ``__init__.py``** :
        - Facilite les importations en spécifiant les modules accessibles.
        - Exemple : ``from .module1 import fonction1``.

4. **Arrondi et Troncature des Nombres**
    - **Fonction ``round()``** :
        - ``round(nombre, n)`` : arrondit à ``n`` décimales.
        - ``round(nombre)`` : arrondit à l'entier le plus proche.
    - **Fonctions du module ``math``** :
        - ``math.ceil(x)`` : arrondi au supérieur.
        - ``math.floor(x)`` : arrondi à l'inférieur.
        - ``math.trunc(x)`` : troncature de la partie décimale.

5. **Affichage Avancé avec ``print()``**
    - **Formatage de chaînes** :
        - Opérateur ``%`` : ``"Âge : %d" % age``.
        - Méthode ``format()`` : ``"Âge : {}".format(age)``.
        - F-strings (recommandé) : ``f"Âge : {age}"``.
    - **Formatage de nombres** :
        - Nombre de décimales : ``f"{pi:.2f}"`` affiche ``pi`` avec 2 décimales.
    - **Alignement et Largeur** :
        - Alignement à gauche : ``<``, droite : ``>``, centré : ``^``.
        - Exemple :
            |code_align| 

    - **Affichage de pourcentages** :
        - ``f"{taux:.1%}"`` affiche le taux en pourcentage avec 1 décimale.

.. slide::
✅ Récapitulatif de Chapitre
-------------------------

- **Qu'est-ce que ``numpy`` ?**
    - Bibliothèque essentielle pour les projets de data science, calcul scientifique et apprentissage automatique.
    - Optimisée pour le traitement de grandes quantités de données numériques.
    - Offre des fonctionnalités pour créer et manipuler des arrays et effectuer des opérations mathématiques complexes rapidement.

- **Avantages de ``numpy`` :**
    - **Efficacité** : Opérations sur les arrays plus rapides que sur les listes Python.
    - **Syntaxe simplifiée** : Opérations mathématiques vectorisées réduisant le code.
    - **Écosystème étendu** : Utilisé par d'autres bibliothèques comme ``pandas``, ``scipy``, ``scikit-learn``.

.. - Installation via ``pip`` : ``pip install numpy``
.. - Importation standard : ``import numpy as np``

1. **Création et Manipulation des Arrays**

    - **Créer un array à partir d'une liste :**
        - Array 1D : ``np.array([1, 2, 3, 4, 5])``
        - Array 2D (matrice) : ``np.array([[1, 2, 3], [4, 5, 6]])``

    - **Utiliser des fonctions prédéfinies :**

        - ``np.zeros((n, m))`` : Array de zéros de taille ``n x m``.
        - ``np.ones((n, m))`` : Array de uns de taille ``n x m``.
        - ``np.arange(start, stop, step)`` : Valeurs de ``start`` à ``stop`` avec un pas ``step``.
        - ``np.linspace(start, stop, num)`` : num valeurs également espacées entre ``start`` et ``stop``.

2. **Accès aux Éléments et Slicing**

    - **Accéder aux éléments avec des indices** :
        - Par position : ``array[i, j]`` (ligne ``i``, colonne ``j``)
        - Par ligne : ``array[i, :]`` (``:`` pour sélectionner toutes les colonnes)
        - Par colonne : ``array[:, j]`` (``:`` pour sélectionner toutes les lignes)

3. **Opérations Mathématiques avec** ``numpy``

    - **Opérations élémentaires :** Addition, soustraction, multiplication, division appliquées élément par élément. (``+, -, *, /``)

    - **Fonctions mathématiques avancées :**

        - Exponentielle : ``np.exp(array)``
        - Logarithme : ``np.log(array)``
        - Racine carrée : ``np.sqrt(array)``
        - Puissance : ``np.power(array, n)``

4. **Fonctions d'Agrégation**

    - **Calcul de statistiques sur les arrays** :

        - Somme : ``np.sum(array)``
        - Moyenne : ``np.mean(array)``
        - Écart-type : ``np.std(array)``
        - Minimum/Maximum : ``np.min(array)``, ``np.max(array)``
        - Indice du min/max : ``np.argmin(array)``, ``np.argmax(array)``

    - Application sur des axes spécifiques avec l'argument ``axis``.

5. **Manipulation de la Forme des Arrays**

    - Changer la forme avec ``reshape`` :  ``array.reshape((nouvelle_lignes, nouvelle_colonnes))``

    - Aplatir un array avec ``flatten`` : ``array_flat = array.flatten()``

    - Concaténer des arrays avec ``concatenate`` : ``np.concatenate((array1, array2), axis=0)``

6. **Indexation et Filtrage Avancés**

    - Indexation par masque booléen : ``array[array > 3]`` (Sélectionne les éléments supérieurs à 3)

    - Indexation par position : ``array[[0, 2, 4]]`` (Sélectionne les éléments aux indices 0, 2 et 4)

    - Modification via un masque : ``array[array > 4] = 3`` (Remplace les valeurs supérieures à 4 par 3)


7. **Génération de Nombres Aléatoires**

    - Nombres aléatoires entre 0 et 1 : ``np.random.rand(n)``

    - Nombres entiers aléatoires : ``np.random.randint(debut, fin, size)``

    - Échantillonnage aléatoire : ``np.random.choice(array, size, replace)``

    - Fixer la seed pour reproductibilité : ``np.random.seed(fixed_seed)``


.. slide::
✅ Récapitulatif de Chapitre
-------------------------

**Bibliothèque os**

- ``os.listdir("PATH")`` : Permet de lister les fichiers et dossiers contenus dans le répertoire désigné par le chemin ``PATH``.
- ``os.chdir("PATH")`` : Permet de changer le répertoire courant pour celui désigné par le chemin ``PATH``.
- ``os.getcwd()`` : Retourne le répertoire courant.
- ``os.path.exists("PATH")`` : Permet de savoir si le fichier ou le dossier désigné par le chemin ``PATH`` existe.
- ``os.mkdir("FOLDER_NAME")`` : Crée le dossier ``FOLDER_NAME`` dans le répertoire courant.
- ``os.rmdir("FOLDER_NAME")`` : Supprime le dossier ``FOLDER_NAME`` dans le répertoire courant.
- ``os.remove("FILE_NAME")`` : Supprime le fichier ``FILE_NAME`` du répertoire courant.

**Bibliothèque pathlib**

- ``pathlib.Path("PATH").iterdir()`` : Permet de lister les fichiers et dossiers contenus dans le répertoire désigné par le chemin ``PATH``.
- ``pathlib.Path("PATH").chdir()`` : Permet de changer le répertoire courant pour celui désigné par le chemin ``PATH``.
- ``pathlib.Path("PATH").cwd()`` : Retourne le répertoire courant.
- ``pathlib.Path("PATH").exists()`` : Permet de savoir si le fichier ou le dossier désigné par le chemin ``PATH`` existe.
- ``pathlib.Path("FOLDER_NAME").mkdir()`` : Crée le dossier ``FOLDER_NAME`` dans le répertoire courant.
- ``pathlib.Path("FOLDER_NAME").rmdir()`` : Supprime le dossier ``FOLDER_NAME`` dans le répertoire courant.
- ``pathlib.Path("FILE_NAME").unlink()`` : Supprime le fichier ``FILE_NAME`` du répertoire courant.

**Opérations sur un fichier**

- ``FILE = open("FILE_NAME", "MODE")`` : Ouvre le fichier ``FILE_NAME`` avec un certain mode dans la variable ``FILE``.
- ``with open("PATH", "MODE") as FILE:`` : Ouvre le fichier désigné par le chemin ``PATH`` avec un certain mode dans la variable ``FILE``.
- ``FILE.read()`` : Lit le contenu du fichier ``FILE``.
- ``FILE.readline()`` : Lit la ligne suivante du fichier ``FILE``.
- ``FILE.readline().strip()`` : Retire les caractères de fin de ligne (``\n``).
- ``FILE.readlines()`` : Lit tout le contenu et retourne une liste où chaque élément est une ligne du fichier ``FILE``.
- ``FILE.write("TEXT")`` : Écrit le texte ``TEXT`` dans le fichier ``FILE``.
- ``FILE.close()`` : Ferme le fichier ``FILE``.

**Modes d’ouverture d’un fichier**

- ``"r"`` : Lecture seule (mode par défaut).
- ``"w"`` : Écriture (écrase le fichier s’il existe).
- ``"a"`` : Ajout (ajoute du contenu à la fin du fichier).
- ``"x"`` : Création d’un nouveau fichier (erreur si le fichier existe déjà).
- ``"b"`` : Mode binaire (ex. : pour les images).
- ``"t"`` : Mode texte (par défaut).


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


