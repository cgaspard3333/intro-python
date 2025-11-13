.. slide::

Chapitre 8 - Introduction à la Programmation Embarquée sur Raspberry Pi Pico
============================================================================

🎯 Objectifs du Chapitre
------------------------

.. important::
    * Utiliser Visual Studio Code et l’extension **Raspberry Pi Pico** pour programmer un microcontrôleur.
    * Importer et utiliser des **modules MicroPython**.
    * Lire des capteurs (DHT22), gérer des boutons-poussoirs, contrôler des LEDs NeoPixel.
    * Concevoir un programme complet réagissant à l'environnement.

.. slide::

📖 1. Introduction : Python dans un microcontrôleur
---------------------------------------------------

La Raspberry Pi Pico utilise une version allégée du Python : **MicroPython**.

Certaines différences importantes :

.. discoverList::
    * Tous les modules Python classiques **ne sont pas disponibles**.
    * D’autres modules **spécifiques au matériel** apparaissent : ``umachine``, ``utime``, ``neopixel``, ``dht``, etc.
    * Vous programmez directement le **comportement physique** (capteurs, boutons, LEDs…).


.. slide::

1.1 Le rôle des modules MicroPython
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Voici quelques modules que vous utiliserez dans ce chapitre :

+------------------------+--------------------------------------------------+
|         Module         |                       Rôle                       |
+========================+==================================================+
| ``machine / umachine`` | Accès direct aux broches (GPIO), PWM, I2C,SPI…   |
+------------------------+--------------------------------------------------+
| ``utime``              | Temporisations, gestion du temps                 |
+------------------------+--------------------------------------------------+
| ``dht``                | Lecture d’un capteur de température/humidité     |
+------------------------+--------------------------------------------------+
| ``neopixel``           | Contrôle de LED RGB adressables                  |
+------------------------+--------------------------------------------------+

.. slide::

📦 2. Découverte des composants de la carte ROBO Pico
----------------------------------------------------

Votre carte ROBO Pico dispose :

.. discoverList::
    * De **boutons-poussoirs** branchés sur des broches GPIO spécifiques (ex. ``GP20``, ``GP21``)
    * De deux **LEDs RGB adressables**
    * D’une **entrée/sorties** (GPIO) pour connecter des capteurs externes (ex. DHT22)
    * D’un microcontrôleur **Raspberry Pi Pico** au centre

Dans ce chapitre, vous allez :

.. discoverList::
    * Utiliser un bouton pour déclencher une mesure de température/humidité
    * Allumer des LEDs en fonction de la température mesurée
    * Utiliser un deuxième bouton pour éteindre la LED


.. slide::

🧪 Exercice Guidé : Construire un thermomètre lumineux
----------------------------------------------------

Le but final :

👉 **Un bouton appuyé → lecture du capteur DHT22 → la LED change de couleur selon la température.**  
👉 **Un second bouton → la LED s’éteint.**


.. slide::

🔧 Étape 1 – Lire un bouton poussoir
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

**Objectif** : Savoir si un bouton est appuyé.

.. step:: reset
    Créez un nouveau fichier Python dans VS Code.

.. step::
    Cherchez en ligne la documentation du module ``machine.Pin`` pour configurer une broche en **entrée** avec ``Pin``.

.. step::
    Testez l’état du bouton ``GP21`` en affichant ``pin.value()`` dans la console.

.. slide::

🌡️ Étape 2 – Lire la température et l’humidité du DHT22
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

**Objectif** : Comprendre comment un module externe fonctionne.

.. note::
    Le module ``dht`` n'est pas du Python standard, cherchez comment l'utiliser dans la `Documentation MicroPython <https://docs.micropython.org/en/latest/index.html>`_

.. step::
    Affichez la température et l’humidité dans la console avec les unités.

👉 Testez plusieurs fois en réchauffant légèrement le capteur avec votre main.

---

.. slide::

🌈 Étape 3 – Contrôler une LED 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

**Objectif** : Comprendre comment allumer et colorer une LED RGB.

.. step::
    En utilisant la documentation du module ``neopixel``, créez un objet ``NeoPixel`` pour contrôler la LED.
    
.. toctree::
    doc_neopixel

.. step::
    Essayez d’afficher une couleur simple (par exemple : rouge).

.. step::
    Affichez une couleur différente que celles présentes dans la documentation. (par ex. : violet)

---

.. slide::

🎛️ Étape 4 – Faire réagir la couleur à la température
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

**Objectif** : Associer une **boucle infinie**, l'**appuie du bouton poussoir**, la **lecture du capteur**, et la **LED**.

.. step::
    Créez une boucle ``while True:`` pour faire tourner votre programme en continu.

.. step::
    Lorsque le bouton de mesure est appuyé :
    
    * lisez le capteur DHT22  
    * affichez la température et l’humidité  dans la console
    * changez la couleur de la LED 0 selon la température mesurée  

.. note::
    Inspirez-vous de vos exercices précédents.  
    Utilisez plusieurs ``elif`` pour définir des plages de couleurs.

Zones de température :

+--------------+---------+
| Température  | Couleur |
+==============+=========+
| < 18°C       | bleu    |
+--------------+---------+
| 18–19°C      | cyan    |
+--------------+---------+
| 19–20°C      | vert    |
+--------------+---------+
| 20–21°C      | jaune   |
+--------------+---------+
| 21–22°C      | orange  |
+--------------+---------+
| ≥ 22°C       | rouge   |
+--------------+---------+


.. step::
    Faire de même pour la LED 1, mais avec des plages d'humidité.

+-------------+---------+
| Humidité    | Couleur |
+=============+=========+
| < 40%       | violet  |
+-------------+---------+
| 40–60%      | magenta |
+-------------+---------+
| 60–80%      | rose    |
+-------------+---------+
| 80–100%     | blanc   |
+-------------+---------+


---

⬛ Étape 5 – Ajouter le bouton d’extinction (RESET couleur)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. slide::

**Objectif** : Permettre d’éteindre les LEDs quand un second bouton est pressé.

.. step::
    Créez un second bouton en entrée.

.. step::
    Dans votre boucle infinie, testez son état.

.. step::
    Si appuyé → toutes les LEDs en **noir**.
