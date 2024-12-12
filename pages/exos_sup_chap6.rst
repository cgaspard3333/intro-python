🏋️ Exercices supplémentaires
=========================
.. slide::
Sur cette page se trouvent des exercices supplémentaires pour vous entraîner. Ils sont classés par niveau de difficulté :
.. discoverList::
    * Facile : 🍀
    * Moyen : ⚖️
    * Difficile : 🌶️

🍀 Exercice 19 : Évaluation des notes d’une classe
--------------------------------------------------

Remplissez un fichier texte (``notes.txt``) avec les notes obtenues par des étudiants dans différentes Unités d'Enseignement (UE). Chaque ligne du fichier représente les notes d’un étudiant et chaque colonne les notes des différentes UE qu’il a suivies, séparées par des espaces.

**Consignes** :

.. step:: reset
    **Calculer les statistiques individuelles pour chaque étudiant :**

    - La moyenne générale des notes.
    - La note minimale nécessaire au prochain examen pour que l'étudiant atteigne une moyenne de 10/20.
    - Le nombre d'UE validées (une UE est validée si la note obtenue est supérieure ou égale à 10/20).

.. step::
    **Calculer les statistiques globales de la classe :**

    - La moyenne générale de la classe.
    - L'écart type des moyennes des étudiants.

.. step::
    **Afficher les résultats de manière structurée, en précisant :**

    - Les statistiques pour chaque étudiant :
        - Moyenne générale.
        - Note nécessaire au prochain examen.
        - Nombre d'UE validées.
    - Les statistiques globales de la classe :
        - Moyenne générale.
        - Écart type des moyennes.

**Astuces** :
.. spoiler::
    Exemple d'un fichier ``notes.txt`` :
    .. code-block:: text
        12 8 14 10 11
        9 11 10 12 13
        8 7 6 10 11
        10 11 12 13 14
        12 13 14 15 16

**Exemple de résultat attendu** :
.. spoiler::
    
    .. code-block:: text
        >> Statistiques par étudiant :
        >> Étudiant 1 : Moyenne = 11.0, Note nécessaire = Néant (moyenne déjà atteinte), UE validées = 4
        >> Étudiant 2 : Moyenne = 11.0, Note nécessaire = Néant (moyenne déjà atteinte), UE validées = 4
        >> Étudiant 3 : Moyenne = 8.4, Note nécessaire = 18.0, UE validées = 2

        >> Statistiques de la classe :
        >> Moyenne générale de la classe : 10.13
        >> Écart type des moyennes : 1.23

⚖️ Exercice 20 : Jeu du pendu amélioré
-------------------------------------

Dans cet exercice, vous allez développer une version avancée du jeu du pendu. Le programme sera divisé en plusieurs modules pour garantir une structure claire et organisée.

**Objectifs** :

1. Deviner un mot parmi une liste stockée dans un fichier.
2. Gérer les scores des joueurs en fonction des tentatives restantes.
3. Ajouter des niveaux de difficulté :
   - *Facile* : Plus de tentatives, mots courts.
   - *Difficile* : Moins de tentatives, mots longs.
4. Enrichir l'expérience avec des illustrations ASCII du pendu pour chaque tentative incorrecte.

**Consignes** :

.. step:: reset
    **Fichier principal (``main.py``)** :

    - Coordonne les différents modules du programme.
    - Affiche un menu principal permettant :
        - De choisir un niveau de difficulté.
        - De lancer une nouvelle partie.
        - D'afficher les scores des joueurs.
    - Demande le nom du joueur au début.
    - Affiche le score final une fois la partie terminée.

.. step::
    **Fichier de gestion des données (``data.py``)** :

    Ce fichier contient les fonctions pour :

    - **Charger les mots** : Lire une liste de mots depuis un fichier texte (``mots.txt``).
        - Mots courts (3 à 5 lettres) pour le niveau facile.
        - Mots longs (6 lettres ou plus) pour le niveau difficile.
    - **Sauvegarder les scores** : Enregistrer les scores dans un fichier texte (``scores.txt``).

.. step::
    **Fichier des fonctions du jeu (``jeu.py``)** :

    Ce fichier contient les fonctions principales du jeu du pendu :

    1. Sélectionner un mot : En fonction du niveau de difficulté.
    2. Affichage progressif : Montrer les lettres découvertes et masquer les autres par `_`.
    3. Gestion des entrées : Valider les lettres proposées par le joueur.
    4. Gestion des erreurs : Diminuer les tentatives restantes pour chaque erreur.
    5. Illustrations ASCII : Afficher une représentation graphique du pendu à chaque étape.

.. step::
    **Fichier de gestion des scores (``score.py``)** :

    Ce fichier contient les fonctions pour :

    1. Ajouter un score pour un joueur après une partie.
    2. Afficher les scores classés par ordre décroissant.
    3. Gérer les statistiques globales de la classe, par exemple :
        - Score moyen.
        - Joueur avec le meilleur score.

**Règles du jeu** :


- **Objectif** : Deviner un mot en proposant des lettres une par une.
- **Le joueur a un nombre limité de tentatives** :
    - Niveau *facile* : 10 tentatives.
    - Niveau *difficile* : 6 tentatives.
- Chaque tentative incorrecte réduit le nombre de coups restants.
- Si le mot est deviné avant que toutes les tentatives soient utilisées, le joueur gagne des points :
    - **Score** : Nombre de coups restants à la fin.
- Le score est sauvegardé dans ``scores.txt``.

**Organisation des fichiers** :


1. ``main.py`` : Gestion principale et menu interactif.
2. ``data.py`` : Gestion des fichiers (*mots.txt* et *scores.txt*).
3. ``jeu.py`` : Logique du jeu (affichage, vérification des lettres, etc.).
4. ``score.py`` : Gestion des scores et des statistiques.

**Exemple de résultat attendu** :
.. spoiler::
    .. code-block:: text
        >> === Jeu du Pendu === 
        >> 1. Nouvelle Partie
        >> 2. Afficher les Scores
        >> 3. Quitter
        >> Choix : 1 
        >> Entrez votre nom : Alice 
        >> Choisissez un niveau de difficulté : 
        >> 1. Facile 
        >> 2. Difficile
        >> Choix : 1 
        >> Mot à deviner : _ _ _ _ _ 
        >> Entrez une lettre : a 
        >> Mot à deviner : a _ _ _ _ 
        >> Nombre de tentatives restantes : 9 

        # ... (Suite du jeu) 

        >> === Fin de la Partie === Alice, votre score est : 6

⚖️ Exercice 21 : Recherche avancée - Recherche par interpolation
---------------------------------------------------------------

**Objectifs** : 

Écrire un programme Python qui permet de :

- Faire une recherche par interpolation pour trouver un élément donné dans une liste triée.
- Charger les données à partir d'un fichier texte contenant une liste triée de nombres.
- Écrire le résultat de la recherche dans un autre fichier texte.

**Consignes** :

.. step:: reset
    **Création des fichiers**

    - Créez un fichier texte nommé ``data.txt`` contenant une liste triée de nombres séparés par des virgules. Par exemple : ``1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31``

- Si le fichier ``data.txt`` n'existe pas, votre programme devra le créer avec un contenu par défaut (par exemple, une liste triée de nombres entre 1 et 100).

.. step::
    **Lecture des données**

    - Écrivez une fonction ``charger_liste()`` qui lit les nombres depuis le fichier ``data.txt``, les convertit en une liste d'entiers et les retourne.

.. step::
    **Recherche par interpolation**

    - Implémentez deux fonctions :

        - ``recherche_interpolation(liste, valeur)`` : Réalise une recherche par interpolation.
        - ``recherche_dichotomique(liste, valeur)`` : Réalise une recherche dichotomique.

    - Chaque fonction devra retourner :

        - L'index de l'élément cherché (ou ``-1`` s'il n'existe pas).
        - Le nombre d'itérations nécessaires.

.. step::
    **Saisie utilisateur**

    - Demandez à l'utilisateur de saisir le nombre à rechercher.

.. step::
    **Comparaison des algorithmes**

    - Enregistrez dans un fichier ``resultat.txt`` :

        - La position du nombre trouvé ou un message indiquant qu'il n'existe pas.
        - Le nombre d'itérations utilisées par chaque méthode.

.. step::
    **Exemple de cas démonstratif**

    - Fournissez un exemple de liste triée où la recherche par interpolation est plus efficace que la recherche dichotomique.  
    Par exemple, une liste avec des valeurs fortement dispersées :  
    ``1, 10, 100, 1000, 10000, 100000``

    - Expliquez pourquoi, pour chercher un nombre proche de la fin de la liste, la recherche par interpolation est plus rapide.  
    Expliquer aussi dans quel cas la recherche par dichotomie est plus efficace.

**Exemple de résultat attendu** :
.. spoiler::
    1. **Contenu de ``data.txt``** :  

        - ``1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31``

    2. **Entrée utilisateur** :  

        - Entrez le nombre à rechercher : 19

    3. **Contenu de ``resultat.txt`` après exécution** :  
        
        - Résultat de la recherche pour le nombre 19 :

            - Recherche par interpolation : trouvé à l'index 9 en 1 itération.
            - Recherche dichotomique : trouvé à l'index 9 en 3 itérations.
    4. **Explication avec la liste fortement dispersée** :  

        - Si la liste est : ``1, 10, 100, 1000, 10000, 100000``
        - Chercher 100000 donnera les résultats suivants :

            - Recherche par interpolation : 1 itération.
            - Recherche dichotomique : 3 itérations.

🌶️ Exercice 22 : Jeu de Nim
---------------------------

Implémentez un jeu interactif de Nim où deux joueurs (humains ou un humain contre l'ordinateur) s'affrontent. Pour cela, vous devrez implémenter plusieurs fonctionnalités :

.. step:: reset
    - **Affichage du plateau** : Le programme doit afficher l’état des piles à chaque tour.
.. step::
    - **Entrée utilisateur** : Chaque joueur doit pouvoir choisir une pile et le nombre d’objets à retirer.
.. step::
    - **Tour de l'ordinateur** : Implémentez une stratégie pour l’ordinateur :
        - Une stratégie simple (ex : retirer un objet).
        - Une stratégie optimale (ex : parité binaire XOR).
.. step::
    - **Gestion des erreurs** : Vérifiez la validité des choix des joueurs (pile existante, non vide, etc.).
.. step::    
    - **Fin du jeu** : Le jeu se termine lorsqu’il n’y a plus d’objets. Le joueur qui devait jouer perd la partie.
.. step::    
    - **Enregistrement des scores** : À la fin de chaque partie, enregistrez les résultats (gagnant, perdant, et nombre de tours) dans un fichier ``scores.txt``. Ce fichier doit être mis à jour à chaque nouvelle partie.
.. step::      
    - **Mode multijoueur** : Permettez à deux joueurs humains de jouer.
.. step::      
    - **Rejouer ou changer de mode** : Après chaque partie, offrez la possibilité de rejouer ou de choisir un mode différent.
.. step::      
    - **Statistiques des parties** : Affichez à la fin de chaque partie les statistiques cumulées (nombre de victoires, défaites pour chaque joueur).
.. step::      
    - **Affichage de l’historique** : Ajoutez une option pour afficher l’historique complet des parties enregistrées dans ``scores.txt``.

**Exemple de résultat attendu** :
.. spoiler::
    .. code-block:: text
        >> Bienvenue au jeu de Nim !
        >> Choisissez le mode de jeu : 1 (Joueur vs Joueur) ou 2 (Joueur vs Ordinateur) : 2
        >> Choisissez la difficulté : 1 (Simple) ou 2 (Optimale) : 1

        >> État actuel des piles :
        >> Pile 1: ||||| (5)
        >> Pile 2: ||||||| (7)
        >> Pile 3: ||| (3)

        >> C'est au tour du joueur 1.
        >> Choisissez une pile (1, 2 ou 3) : 2
        >> Combien d'objets voulez-vous retirer de la pile 2 ? 1

        >> État actuel des piles :
        >> Pile 1: ||||| (5)
        >> Pile 2: |||||| (6)
        >> Pile 3: ||| (3)

        >> C'est au tour du joueur 2.
        >> L'ordinateur retire 1 objets de la pile 1.

        >> État actuel des piles :
        >> Pile 1: |||| (4)
        >> Pile 2: |||||| (6)
        >> Pile 3: ||| (3)

        >> C'est au tour du joueur 1.
        >> Choisissez une pile (1, 2 ou 3) : 


🌶️ Exercice 23 : Cryptage et Décryptage de messages avec Clés Multiples
------------------------------------------------------

Implémentez un programme qui permet de crypter et de décrypter des messages en utilisant différentes clés de chiffrement. Les messages cryptés et décryptés seront enregistrés dans des fichiers, et le programme proposera une gestion dynamique des clés utilisées. Le cryptage est un processus visant à rendre un message illisible afin de le protéger. Le décryptage permet de retrouver le message original grâce à une clé.

Dans cet exercice, vous utiliserez essentiellement le chiffrement par décalage ASCII, une méthode où chaque caractère est décalé d'un certain nombre de positions dans la table ASCII, déterminé par une clé. Par exemple, si la clé est ``3``, le caractère ``A`` devient ``D``, et ``Z`` revient à ``C`` grâce à un effet circulaire.

Votre programme doit permettre à l’utilisateur d’interagir avec les messages et les clés, et d’enregistrer les résultats dans des fichiers spécifiques. Vous devrez gérer les clés via un fichier ``cles.txt``, les messages cryptés dans ``message_crypte.txt`` et les messages décryptés dans ``message_decrypte.txt``.

Le programme devra inclure les fonctionnalités suivantes :

1. **Choix de l'opération** : Proposez à l'utilisateur un menu interactif lui permettant de choisir entre crypter ou décrypter un message.
2. **Gestion des clés** : Gérez les clés de chiffrement/déchiffrement via un fichier ``cles.txt`` :
   - Permettez d’afficher les clés disponibles.
   - Ajoutez ou supprimez des clés dans ce fichier.
3. **Cryptage** :
   - L'utilisateur doit pouvoir choisir une clé pour crypter les messages contenus dans le fichier ``messages_a_crypter.txt``.
   - Les messages cryptés seront enregistrés dans un fichier ``message_crypte.txt``.
4. **Décryptage** :
   - L'utilisateur doit pouvoir choisir une clé pour décrypter un fichier ``message_crypte.txt``.
   - Si la clé utilisée est correcte, les messages originaux seront affichés et enregistrés dans ``message_decrypte.txt``.
5. **Validation et gestion des erreurs** :
   - Vérifiez que les clés saisies existent et que les fichiers nécessaires sont disponibles.
6. **Fonctionnalités supplémentaires** :
   - Proposez différents algorithmes de cryptage comme :
     - **Chiffrement par substitution** : chaque caractère est remplacé par un autre selon une correspondance définie.
     - **Chiffrement par transposition** : l'ordre des caractères dans le message est réorganisé selon une règle spécifique.
     - **Chiffrement XOR** : chaque caractère est transformé en appliquant une opération logique XOR avec une clé binaire.
     - **Chiffrement asymétrique** : utilisez une paire de clés (publique et privée) pour sécuriser les communications.
   - Ajoutez une option pour afficher l’historique des messages cryptés et décryptés.
