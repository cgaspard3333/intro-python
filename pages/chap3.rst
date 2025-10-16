.. slide::

Chapitre 3 - Fonctions et types construits
==========================================

🎯 Objectifs du Chapitre
---------------------

.. important:: 
    - Comprendre ce qu'est une fonction en Python et apprendre à les définir et à les utiliser.
    - Découvrir l’importance de la réutilisation du code et de la modularité grâce aux fonctions.
    - Introduction aux types construits (listes, tuples, dictionnaires).

.. slide::
📖 1. Les fonctions
----------------

1.1 Qu'est-ce qu'une fonction ?
~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. note::
    Une fonction est un **bloc de code réutilisable** qui permet d'effectuer une tâche spécifique. Elle prend en entrée des **arguments** et retourne un **résultat**. Les fonctions permettent de **découper un programme en sous-programmes** plus petits et plus faciles à gérer.  

.. slide::
1.2 Définir une fonction
~~~~~~~~~~~~~~~~~~~~

En Python, une fonction se définit avec le mot-clé ``def`` suivi du nom de la fonction, des parenthèses (qui peuvent contenir des paramètres), et d’un bloc de code indenté.

.. warning::
    Exemple :
    .. code-block:: python
        def nom_de_la_fonction(param1, param2):
            # Bloc de code qui s'exécute
            return résultat  # (optionnel)

.. slide::
Pour **appeler** une fonction (c'est à dire l'exécuter), on utilise son nom suivi de parenthèses contenant les arguments à passer à la fonction.

.. warning::
    Exemple :
    .. code-block:: python
        def addition(a, b):
            c = a + b
            return c

        print(addition(2, 3))
        >> 5

.. slide::
1.3 Paramètres et arguments
~~~~~~~~~~~~~~~~~~~~~~~
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

    ``2`` et ``3`` sont les **arguments**. Ce sont les valeurs que l'on passe à la fonction lorsque celle-ci est appelée. Ces valeurs sont affectées aux paramètres ``a`` et ``b`` à l'intérieur de la fonction.

.. slide::
1.4 Valeurs de retour (*return*)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

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

.. slide::
1.5 Portée des variables
~~~~~~~~~~~~~~~~~~~~

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

.. slide::
1.6 Annotations de type
~~~~~~~~~~~~~~~~~~~

Une fonction peut être annotée avec des types de données pour indiquer le type des paramètres et de la valeur de retour. Elles permettent de documenter le code et d'améliorer sa lisibilité. De plus, elles permettent de détecter de potentielles erreurs de typage lors de l'exécution du programme.
.. note::
    **Les annotations de type (ou encore typage) font partie des bonnes méthodes de programmation que vous devez adopter.** Il faudra donc les utiliser dans chaque fonction que vous écrirez dans vos programmes.

.. warning::
    Exemple :
    .. code-block:: python
        #Fonction addition sans annotations de type
        def addition(a, b):
            c = a + b
            return c

        #Fonction addition avec annotations de type
        def addition(a: int, b: int) -> int:
            c = a + b
            return c

    Dans cet exemple, les annotations de type indiquent que les paramètres ``a`` et ``b`` ainsi que la valeur de retour de la fonction ``addition`` sont des entiers.

.. slide::
✏️ Exercice 7 : Calculatrice simple avec fonctions
--------------------------------------------------

**Objectif** : Écrire un programme qui permet de réaliser des opérations arithmétiques simples (addition, soustraction, multiplication, division) à l'aide de fonctions.

**Etapes à suivre** :

.. step:: 
    Créer une fonction ``addition(a, b)`` qui prend en paramètre deux nombres entiers et retourne leur somme.
.. step:: 
    Créer une fonction ``soustraction(a, b)`` qui prend en paramètre deux nombres entiers et retourne leur différence.
.. step:: 
    Créer une fonction ``multiplication(a, b)`` qui prend en paramètre deux nombres entiers et retourne leur produit.
.. step:: 
    Créer une fonction ``division(a, b)`` qui prend en paramètre deux nombres entiers et retourne leur quotient (**Attention au type de la valeur de retour de la fonction**).
.. step:: 
    Demander à l'utilisateur de saisir deux nombres entiers et une opération arithmétique à réaliser. Pour choisir l'opération, l'utilisateur doit saisir un symbole associé (``+``, ``-``, ``*``, ``/``).
.. step:: 
    Utiliser les fonctions précédemment créées pour afficher le résultat de l'opération demandée.

.. step::
    Testez maintenant votre programme en donnant deux nombres flottants au lieu de deux nombres entiers. Que se passe-t-il ? Pourquoi ?

.. step:: 
    Changer votre programme pour qu'il puisse gérer les nombres flottants (n'oubliez pas de modifier les annotations de type des fonctions).

**Notes** : 
.. discoverList::
    * Ne pas oublier de gérer les cas d'erreur (division par zéro, opération non reconnue, etc.).
    * Cet exercice est le même que l'Exercice Sup. 2 du Chapitre 2 mais en utilisant des fonctions.

.. success::
    Vous savez maintenant écrire des fonctions simples en Python et vous découvrez comment gérer leur typage.

.. slide::
📖 2. Les types construits
------------------------

A partir des types de base, on peut construire des types plus complexes appelés **types construits**. Les types construits les plus courants sont les listes, les p-uplets et les dictionnaires, ils sont génériques et peuvent être mis en oeuvre dans de nombreux langages de programmation. 

.. slide::
2.1 Les p-uplets (*tuple*)
~~~~~~~~~~~~~~~~~~~~~~~~
.. note::
    Un p-uplet est une **collection ordonnée d'éléments**. Chaque élément peut être de n'importe quel type. Les p-uplets sont **immuables**, c'est-à-dire qu'ils ne peuvent pas être modifiés après leur création. Si les valeurs du p-uplet doivent être changées au cours de l'execution du programme alors il faut utiliser un autre type de variable comme une liste/tableau (voir partie suivante : :doc:`Les tableaux <chap3#tableaux>`).

.. slide::
**2.1.1 Création d'un p-uplet**

Pour créer un p-uplet, on utilise des **parenthèses** et on sépare les éléments par des **virgules**.

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

.. slide::
**2.1.2 Accès aux éléments d'un p-uplet**

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

.. slide::
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

.. slide::
2.2 Les tableaux / Les listes (*list*)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. note::
    Un tableau est une collection ordonnée d'éléments qui sont organisés séquentiellements (les uns à la suite des autres). Contrairement aux p-uplets, les tableaux sont **mutables/muables**, c'est-à-dire qu'ils peuvent être modifiés après leur création.  
    En Python, les tableaux sont appelés **listes**.

.. slide::
**2.2.1 Création d'une liste**

Les listes sont créées en utilisant des **crochets** et en séparant les éléments par des **virgules**.

.. warning::
    Exemple :
    .. code-block:: python

        # Création d'une liste
        l = [1, 2, 3, 4, 5]
        print(l)
        >> [1, 2, 3, 4, 5]

.. slide::
**2.2.2 Accès aux éléments d'une liste**

De la même manière que pour un p-uplet, pour accéder à un élément d'une liste, on utilise l'index de l'élément. Pour une liste de taille n, les indexs des éléments vont de 0 à n-1.  

``l[i]`` permet d'accéder à l'élément à l'index ``i`` de la liste ``l``.

.. warning::
    Exemple :
    .. code-block:: python

        l = [1, 2, 3, 4, 5]
        print(l[0]) # Permet d'accéder à l'élément à l'index 0 de la liste l
        >> 1
        print(l[4]) # Permet d'accéder à l'élément en 5eme position (index 4) de la liste l
        >> 5

.. slide::
**2.2.3 Modification d'une liste par affectation**

Pour modifier un élément d'une liste, on utilise l'index de l'élément et on lui affecte une nouvelle valeur.

.. warning::
    Exemple :
    .. code-block:: python

        l = [1, 2, 3, 4, 5]
        l[1] = 10 # Modifie la valeur de l'élément à l'index 1 de la liste l
        print(l)
        >> [1, 10, 3, 4, 5]

.. slide::
**2.2.4 Ajout/suppression d'éléments d'une liste**
.. discoverList::
    * Pour ajouter une valeur à la fin une liste, on utilise la méthode ``append()``.
    * Pour supprimer une valeur d'une liste, on utilise la méthode ``remove()``.

.. warning::
    Exemple :
    .. code-block:: python

        l = [1, 2, 3, 4, 5]
        l.append(6) # Ajoute l'élément 6 à la fin de la liste l
        print(l)
        >> [1, 2, 3, 4, 5, 6]

        l.remove(3) # Supprime l'élément 3 de la liste l
        print(l)
        >> [1, 2, 4, 5, 6]

        l.remove(l[0]) # Supprime le premier élément de la liste l
        print(l)
        >> [2, 4, 5, 6]

.. slide::
**2.2.5 Méthodes spécifiques aux listes**
.. discoverList::
    * La méthode ``sort()`` permet de trier les éléments d'une liste.
    * La méthode ``reverse()`` permet d'inverser l'ordre des éléments d'une liste.
    * La méthode ``index()`` permet de récupérer l'index d'un élément dans une liste.
    * La méthode ``count()`` permet de compter le nombre d'occurrences d'un élément dans une liste.

.. warning::
    Exemple :
    .. code-block:: python

        l = [5, 2, 8, 1, 3]
        l.sort() # Trie les éléments de la liste l
        print(l)
        >> [1, 2, 3, 5, 8]

        l.reverse() # Inverse l'ordre des éléments de la liste l
        print(l)
        >> [8, 5, 3, 2, 1]

        print(l.index(5)) # Récupère l'index de l'élément 5 dans la liste l
        >> 1

        print(l.count(5)) # Compte le nombre d'occurrences de l'élément 5 dans la liste l
        >> 1


.. slide::
2.3 Les dictionnaires (*dict*)
~~~~~~~~~~~~~~~~~~~~~~~~~~~
.. note::
    Un dictionnaire est une collection d'éléments **non ordonnée**. Chaque élément est constitué d'une **clé** et d'une **valeur**. Les dictionnaires sont **mutables/muables**. Les clés doivent être uniques et les valeurs peuvent être de n'importe quel type.

.. slide::
**2.3.1 Création d'un dictionnaire**

Un nouveau dictionnaire est créé en utilisant des **accolades** et en séparant les éléments par des **virgules**. Chaque élément est constitué d'une **clé** et d'une **valeur** séparées par deux points (``clé: valeur``).

.. warning::
    Exemple :
    .. code-block:: python
        #                     valeurs
        #      ____________________________________
        #      |                  |               |
        d = {"nom": "Dupont", "prénom": "Jean", "âge": 30}
        #              |                   |            |
        #              ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
        #                              clés

.. slide::
**2.3.2 Accès aux éléments d'un dictionnaire**

Les éléments d'un dictionnaire ne sont pas indexés (non-ordonnés) comme les listes et p-uplets. Il est donc impossible d'accéder au n-ième élément d'un dictionnaire. Pour accéder à une valeur, on utilise la clé associée à cette valeur. C'est la raison pour laquelle les clés doivent être uniques.

``d[clé]`` permet d'accéder à la valeur associée à la clé ``clé`` du dictionnaire ``d``.

.. warning::
    Exemple :
    .. code-block:: python

        d = {"nom": "Dupont", "prénom": "Jean", "âge": 30}
        print(d["nom"]) # Accès à la valeur associée à la clé "nom" du dictionnaire d
        >> Dupont
        print(d[0])
        >> KeyError: 0 # Renvoie une erreur car la clé 0 n'existe pas dans le dictionnaire d

.. slide::
**2.3.3 Modification d'un dictionnaire par affectation**

Il est possible de modifier, ajouter ou supprimer des éléments d'un dictionnaire en utilisant la clé associée à l'élément.

.. warning::
    Exemple :
    .. code-block:: python

        d = {"nom": "Dupont", "prénom": "Jean", "âge": 30}
        d["âge"] = 31 # Modifie la valeur associée à la clé "âge" du dictionnaire d
        print(d)
        >> {"nom": "Dupont", "prénom": "Jean", "âge": 31}

        d["ville"] = "Paris" # Ajoute un nouvel élément au dictionnaire d
        print(d)
        >> {"nom": "Dupont", "prénom": "Jean", "âge": 31, "ville": "Paris"}

        del d["prénom"] # Supprime l'élément associé à la clé "prénom" du dictionnaire d
        print(d)
        >> {"nom": "Dupont", "âge": 31, "ville": "Paris"}

.. slide::
**2.3.4 Méthodes spécifiques aux dictionnaires**
.. discoverList::
    * La méthode ``keys()`` permet de récupérer la liste des clés d'un dictionnaire.
    * La méthode ``values()`` permet de récupérer la liste des valeurs d'un dictionnaire.
    * La méthode ``items()`` permet de récupérer la liste des couples clé-valeur d'un dictionnaire.

.. note::
    Le fait d'avoir ces éléments sous forme de liste permet de les manipuler plus facilement (par exemple pour les parcourir avec une boucle).

.. warning::
    Exemple :
    .. code-block:: python

        d = {"nom": "Dupont", "prénom": "Jean", "âge": 30}
        print(d.keys()) # Récupère la liste des clés du dictionnaire d
        >> dict_keys(['nom', 'prénom', 'âge'])

        print(d.values()) # Récupère la liste des valeurs du dictionnaire d
        >> dict_values(['Dupont', 'Jean', 30])

        print(d.items()) # Récupère la liste des couples clé-valeur du dictionnaire d
        >> dict_items([('nom', 'Dupont'), ('prénom', 'Jean'), ('âge', 30)])

.. slide::
✏️ Exercice 8 : Manipulation de p-uplets colorés
------------------------------------------------

.. step:: reset

    Créez un p-uplet nommé ``couleurs`` qui contient les éléments suivants : "rouge", "vert", "bleu", "jaune", et "noir".
    Affichez la première et la dernière couleur du p-uplet.

.. step::

    Utilisez la fonction ``len()`` pour afficher la taille du p-uplet ``couleurs``.
    Affichez la couleur située à la troisième position dans le p-uplet.

.. step::

    Créez un p-uplet contenant uniquement la couleur "blanc". Assurez-vous qu’il est bien reconnu comme un p-uplet.

.. step::

    Créez un deuxième p-uplet nommé ``nouvelles_couleurs`` avec les éléments "rose" et "violet".
    Créez un troisième p-uplet, ``toutes_couleurs``, qui combine ``couleurs`` et ``nouvelles_couleurs``.
    Affichez le p-uplet ``toutes_couleurs``.

.. success::
    Vous savez maintenant manipuler des p-uplets en Python.

.. slide::
    Très bien, voici un exercice plus ouvert et ludique qui laisse un peu de place à la créativité :

---

✏️ Exercice 9: "Créer mon sandwich parfait"
--------------------------------------------

**Consigne** : Vous allez créer un programme qui aide à créer un sandwich personnalisé en fonction de différents ingrédients.

.. step:: reset
    **Liste des ingrédients disponibles**  
    Créez une liste nommée ``ingredients_disponibles`` avec les éléments suivants : ``"pain"``, ``"jambon"``, ``"fromage"``, ``"salade"``, ``"tomate"``, ``"mayo"``, ``"poulet"``, ``"thon"``, ``"oeuf"``, ``"cornichon"``.

.. step::
    **Création d'une liste de sandwich**  
    Créez une liste vide appelée ``mon_sandwich``.

.. step::
    **Choix des ingrédients**  
    Utilisez une boucle pour afficher chaque ingrédient de ``ingredients_disponibles`` avec une option de choix, par exemple :

      .. code-block:: python
          Voulez-vous ajouter pain à votre sandwich ? (oui/non)

    Si la réponse est ``"oui"``, ajoutez cet ingrédient à ``mon_sandwich``.

.. step::
    **Affichage du sandwich final**  
    Affichez un message avec la liste des ingrédients choisis dans ``mon_sandwich``, par exemple :

      .. code-block:: python
          Votre sandwich contient : [pain, jambon, tomate].

.. step::
    **Option d'ajout d'un ingrédient spécial**  
    Proposez à l'utilisateur d’ajouter un ingrédient spécial de son choix qui n’est pas dans la liste initiale. Ajoutez cet ingrédient, le cas échéant.

.. step::
    **Affichage final**  
    Affichez à nouveau la liste complète des ingrédients de ``mon_sandwich`` après l’ajout de l’ingrédient spécial (si l'utilisateur a accepté).

.. success::
    Vous savez maintenant manipuler des listes en Python.

.. slide::
✏️ Exercice 10 : Cours de Potion avancé
----------------------------------------------
**Consigne**: Dans cet exercice, vous allez créer une application qui permet à un apprenti sorcier de préparer des potions magiques en combinant divers ingrédients. Chaque ingrédient a des propriétés spécifiques, et certaines combinaisons peuvent produire des effets magiques supplémentaires.

.. slide::
.. step:: reset
    **Partie 1** : Définir les Ingrédients

    Définissez une liste de dictionnaires pour les ingrédients, où chaque ingrédient a :
    .. discoverList::
        * Un nom,
        * Une quantité de base,
        * Unité (grammes ou millilitres),
        * Une propriété magique
    
    Les ingrédients existent avec une quantité de base (dose unitaire) tels que :
    .. discoverList::
        * Poudre de Lune, 10g, guérison
        * Écailles de Dragon, 5g, force
        * Larmes de Licorne, 2mL, invisibilité
        * Herbes Mystiques, 8g, sérénité
        * (Vous pouvez ajouter un autre ingrédient à cette liste si vous le souhaitez)

.. slide::
.. step::
    **Partie 2** : Calculer les quantités  

    Définissez une fonction ``calculer_quantite`` qui prend deux arguments :

    .. discoverList::
        * ``ingredient`` (type ``str``): le nom de l'ingrédient,
        * ``quantite`` (type ``int``): la quantité de cet ingrédient à utiliser.
    
    Et retourne un p-uplet contenant : 
    .. discoverList::
        * La quantité totale de l'ingrédient (type ``int``),
        * L'unité de cette quantité (type ``str``),
        * L'effet de l'ingrédient (type ``str``).

    Cette fonction doit :

    .. discoverList::
        1. Rechercher l'ingrédient dans la liste des ingrédients.
        2. Multiplier la quantité de base de l'ingrédient par le nombre de doses souhaitées.
        3. Retourner la quantité totale, l'unité et l'effet de l'ingrédient.

**Aide pour le typage de la fonction** :
.. code-block:: python
    def calculer_quantite(ingredient: str, quantite: int) -> tuple[int, str, str]:
    # Code de la fonction


.. slide::
.. step::
    **Partie 3** : Créer la Potion  

    Définissez une fonction ``creer_potion`` qui prend deux listes comme paramètres :
    
    .. discoverList::
        * ``ingredient_choisis`` : une liste de noms d'ingrédients choisis.
        * ``quantites`` : une liste des quantités pour chaque ingrédient.

    Et retourne un p-uplet contenant : 
    .. discoverList::
        * La quantité totale de la potion en gramme (type ``int``),
        * La quantité totale de la potion en millilitre (type ``int``),
        * Tous les effets de la potion (type ``str``).

    Cette fonction doit :

    .. discoverList::
        1. Appeler ``calculer_quantite`` pour chaque ingrédient sélectionné.
        2. Additionner les quantités en grammes et en millilitres séparément.
        3. Rassembler tous les effets des ingrédients choisis.
        4. Retourner la quantité totale en gramme et millilitre ainsi que les effets de la potion.

.. slide::
.. step::
    **Partie 4** : Programme principal
    .. discoverList::
        * Affichez un message de bienvenue pour plonger l'utilisateur dans l'ambiance du laboratoire de potions magiques.
        * Affichez les ingrédients avec leur quantité de base et leurs effets pour que l’utilisateur sache quoi choisir.
        * Demandez à l’utilisateur de choisir des ingrédients et de spécifier la quantité en doses pour chaque ingrédient. L’utilisateur doit taper "fin" pour terminer la sélection des ingrédients.
        * Une fois les choix terminés, appelez la fonction ``creer_potion``, qui retournera les quantités totales en grammes et millilitres ainsi qu'une liste des effets des ingrédients.
        * Enfin, utilisez les valeurs retournées par ``creer_potion`` pour afficher la quantité totale et les effets de la potion.

.. slide::
**Resulat attendu** :
.. code-block::
    >> Bienvenue dans le laboratoire de potions magiques !
    >> Vous allez pouvoir créer une potion en combinant différents ingrédients.
    >> 
    >> Ingrédients disponibles :
    >> 1. Poudre de Lune, 10grammes, guérison
    >> 2. Écailles de Dragon, 5grammes, force
    >> 3. Larmes de Licorne, 2millilitres, invisibilité
    >> 4. Herbes Mystiques, 8grammes, sérénité
    >> Choisissez un ingrédient (1-4) ou tapez 'fin' pour terminer : 1
    >> Entrez la quantité (en doses) : 5
    >> Choisissez un ingrédient (1-4) ou tapez 'fin' pour terminer : 3
    >> Entrez la quantité (en doses) : 2
    >> Choisissez un ingrédient (1-4) ou tapez 'fin' pour terminer : 4
    >> Entrez la quantité (en doses) : 1
    >> Choisissez un ingrédient (1-4) ou tapez 'fin' pour terminer : fin
    >> 
    >> Potion créée :
    >> Quantité totale : 58g, 4mL
    >> Effets : guérison, invisibilité, sérénité

.. success::
    Vous savez maintenant manipuler les types construits ainsi que les fonctions en Python d'un niveau intermédiaire.



.. slide::
🏋️ Exercices supplémentaires
--------------------

.. toctree::

    exos_sup_chap3
