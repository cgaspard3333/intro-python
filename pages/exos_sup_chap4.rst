🏋️ Exercices supplémentaires
=========================
.. slide::
Sur cette page se trouvent des exercices supplémentaires pour vous entraîner. Ils sont classés par niveau de difficulté :
.. discoverList::
    * Facile : 🍀
    * Moyen : ⚖️
    * Difficile : 🌶️

⚖️ Exercice 13 : Gestion de budget personnel avec des modules et formatage
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

**Objectif** :
Créer un programme de gestion de budget personnel permettant de simuler les revenus et les dépenses mensuelles, de calculer le solde mensuel et d'afficher un résumé formaté des finances. Ce programme fera appel à des modules intégrés de Python et utilisera des techniques d'affichage avancé.

**Modules à utiliser** :

- ``math`` : pour arrondir les valeurs numériques.
- ``random`` : pour générer aléatoirement des revenus et des dépenses.
- ``datetime`` : pour afficher la date actuelle.
- ``statistics`` (optionnel) : pour calculer des statistiques avancées (par exemple, la moyenne des dépenses).

**Consignes** :

.. step:: reset
    **Créer et implémenter les fonctions suivantes** :

    - ``generer_revenus()`` :
        - Retourne un revenu mensuel aléatoire compris entre 2000€ et 5000€.
    - ``generer_depenses()`` :
        - Retourne une liste de dépenses aléatoires comprenant des catégories telles que le loyer, la nourriture, le transport et les loisirs. Chaque dépense doit avoir un montant aléatoire compris entre 100€ et 1500€.
    - ``calculer_solde(revenus, depenses)`` :
        - Calcule le solde mensuel en soustrayant la somme totale des dépenses du revenu.
    - ``afficher_resume_financier(revenus, depenses, solde)`` :
        - Affiche un résumé formaté, incluant les détails des revenus, des dépenses et du solde mensuel.

.. step::
    **Formatage de l'affichage** :

    - Utilisez des **f-strings** pour afficher les montants financiers arrondis à deux décimales.
    - Alignez les résultats de manière soignée pour créer un tableau clair.
    - Affichez le mois et l'année actuels en utilisant ``datetime`` pour donner un contexte temporel.

**Exemple de sortie attendue** :

.. code-block:: bash
    >> Rapport financier du mois de Novembre 2024
    >> -----------------------------------------
    >> Revenus totaux : 3,472.50 €
    >> Dépenses :
    >> - Loyer                : 1,200.00 €
    >> - Nourriture           :   650.50 €
    >> - Transport            :   300.75 €
    >> - Loisirs              :   500.00 €
    >> -----------------------------------------
    >> Solde mensuel          :   821.25 € (Positif)

**Conseils** :

- Utilisez ``random.uniform()`` pour générer des montants avec des valeurs décimales.
- Employez ``math.ceil()``, ``math.floor()`` et ``round()`` pour tester différentes méthodes d'arrondi si nécessaire.
- Organisez le code pour assurer une lisibilité optimale.


🌶️ Exercice 14 : Simulation de navigation robotique intelligente
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

**Objectif** :
Dans cet exercice, vous allez créer un programme de simulation de navigation robotique. Le programme simulera un robot se déplaçant sur une grille 10x10, évitant des obstacles et atteignant un objectif fixé. Ce programme utilisera des concepts de base en intelligence artificielle, tels que la prise de décision et la navigation autonome.

**Modules à utiliser** :

- ``random`` : pour générer des positions aléatoires d'obstacles et de l'objectif.
- ``math`` : pour calculer la distance entre le robot et l'objectif.
- ``datetime`` (optionnel) : pour mesurer le temps pris par le robot pour atteindre l'objectif.

**Consignes** :

.. step:: reset
    **Créer et implémenter les fonctions suivantes** :

    - ``initialiser_grille()`` :
        - Crée et retourne une grille 10x10 remplie de caractères vides ``"."``.
    - ``placer_obstacles(grille, nombre_obstacles)`` :
        - Place un nombre donné d'obstacles ``"#"`` de manière aléatoire sur la grille sans chevaucher la position de départ du robot ni l'objectif.
    - ``placer_robot_et_objectif(grille)`` :
        - Place le robot ``"R"`` au coin supérieur gauche de la grille et l'objectif ``"X"`` à une position aléatoire de la grille.
    - ``afficher_grille(grille)`` :
        - Affiche la grille sous un format lisible pour suivre l'état de la simulation.
    - ``calculer_distance(robot, objectif)`` :
        - Calcule la distance euclidienne entre la position du robot et l'objectif.
    - ``deplacer_robot(grille, robot, objectif)`` :
        - Déplace le robot vers l'objectif en prenant des décisions intelligentes pour éviter les obstacles et atteindre l'objectif.
        - Le robot doit évaluer ses déplacements possibles (haut, bas, gauche, droite) et choisir celui qui minimise la distance vers l'objectif sans entrer en collision avec un obstacle.

.. step::
    **Conditions de déplacement du robot** :

    - Le robot peut se déplacer dans les quatre directions : haut, bas, gauche, droite.
    - Si le robot rencontre un obstacle, il doit recalculer sa trajectoire.
    - Implémentez un système basique de prise de décision pour choisir le meilleur mouvement possible à chaque étape.

**Étapes détaillées** :

.. step:: 
    **Étape 1 : Initialisation de la grille**
    
    - Implémentez ``initialiser_grille()`` pour créer une grille 10x10 vide.
    - Implémentez ``placer_obstacles()`` pour ajouter des obstacles de manière aléatoire sur la grille.
    - Implémentez ``placer_robot_et_objectif()`` pour positionner le robot et l'objectif.

.. step::
    **Étape 2 : Déplacement et logique du robot**

    - Implémentez ``calculer_distance()`` pour aider le robot à choisir le mouvement le rapprochant de l'objectif.
    - Implémentez ``deplacer_robot()`` pour gérer les déplacements et les décisions du robot.
    - Intégrez un mécanisme de vérification pour empêcher le robot de sortir des limites de la grille ou de traverser des obstacles.

.. step::
    **Étape 3 : Affichage et suivi de l'état**

    - Implémentez ``afficher_grille()`` pour afficher l'état de la grille après chaque mouvement du robot.
    - Suivez les déplacements du robot jusqu'à ce qu'il atteigne l'objectif et affichez le nombre total de mouvements effectués.

**Exemple de sortie attendue** :

.. code-block:: bash
    >> Grille initiale :
    >> R . . . . . . . . .
    >> . . . # . . . . . .
    >> . . . . . . # . . .
    >> . . . . . . . . . .
    >> . # . . . . . . . .
    >> . . . . . . . . . X
    >> . . # . . . . . . .
    >> . . . . . . # . . .
    >> . . . . . . . . . .
    >> . . . . . # . . . .

    >> Déplacement 1 : vers le bas
    >> Déplacement 2 : vers la droite
    >> ...
    >> Objectif atteint en 23 mouvements.

**Conseils** :

- Utilisez ``random.randint()`` pour choisir des positions aléatoires sur la grille.
- Pour le déplacement intelligent, comparez la distance actuelle à la distance résultante de chaque mouvement possible.
- Implémentez un suivi de la position du robot et assurez-vous de marquer chaque position parcourue pour éviter de repasser par le même endroit.

**Bonus** :

- Ajoutez un compteur de temps pour mesurer la durée totale de la simulation en utilisant ``datetime``.
- Implémentez une stratégie de contournement plus sophistiquée en utilisant un algorithme de recherche de chemin simplifié.


.. slide::
🌶️ Exercice Sup. 15 : Le Vrai Jeu d'Echecs
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

**Consigne** : A partir du code de l'Exercice Sup. 12 du Chapitre 3, créez un jeu d'échecs complet. 

**Règles du Jeu d'Echecs** : Vous pouvez trouver les règles du jeu d'échecs `ici <https://www.apprendre-les-echecs-24h.com/apprendre-a-jouer-aux-echecs/regles-jeu-dechecs/>`_.