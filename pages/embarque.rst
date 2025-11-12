.. slide::

# Chapitre 8 - Introduction à la Programmation Embarquée sur Raspberry Pi Pico

## 🎯 **Objectifs du Chapitre**

À la fin de ce chapitre, vous serez capables de :

* Utiliser Visual Studio Code et l’extension **Raspberry Pi Pico** pour programmer un microcontrôleur.
* Importer et utiliser des **modules MicroPython**.
* Lire des capteurs (DHT22), gérer des boutons-poussoirs, contrôler des LEDs NeoPixel.
* Concevoir un programme complet réagissant à l'environnement.

.. important::
Ce chapitre introduit l’usage de **modules externes** en Python. Vous devrez chercher dans la documentation en ligne les fonctions non présentées dans le cours.
👉 *Apprenez à vous débrouiller avec la doc*

---

.. slide::

## 📖 1. Introduction : Python dans un microcontrôleur

La Raspberry Pi Pico utilise une version allégée du Python : **MicroPython**.

Certaines différences importantes :

* Tous les modules Python classiques **ne sont pas disponibles**.
* D’autres modules **spécifiques au matériel** apparaissent : `umachine`, `utime`, `neopixel`, `dht`, etc.
* Vous programmez directement le **comportement physique** (capteurs, boutons, LEDs…).

---

## 1.1 Le rôle des modules MicroPython

Voici quelques modules que vous utiliserez dans ce chapitre :

| Module                  | Rôle                                            |
| ----------------------- | ----------------------------------------------- |
| `machine` ou `umachine` | Accès direct aux broches (GPIO), PWM, I2C, SPI… |
| `utime`                 | Temporisations, gestion du temps                |
| `dht`                   | Lecture d’un capteur de température/humidité    |
| `neopixel`              | Contrôle de LED RGB adressables                 |

.. note::
Cherchez les documentations suivantes :
- Module `machine.Pin`
- Module `utime.sleep`
- Module `dht.DHT22`
- Module `neopixel.NeoPixel`
Vous en aurez *absolument besoin* pour les exercices.

---

.. slide::

## 📦 2. Découverte des composants de la carte ROBO Pico

Votre carte ROBO Pico dispose :

* De **boutons-poussoirs** branchés sur des broches GPIO spécifiques (ex. GP20, GP21)
* De deux **LEDs RGB adressables**
* D’une **entrée/sorties** (GPIO) pour connecter des capteurs externes (ex. DHT22)
* D’un microcontrôleur **Raspberry Pi Pico** au centre

Dans ce chapitre, vous allez :

* Utiliser un bouton pour déclencher une mesure de température/humidité
* Allumer des LEDs en fonction de la température mesurée
* Utiliser un deuxième bouton pour éteindre la LED

---

.. slide::

# 🧪 Exercice Guidé : Construire un thermomètre lumineux

Dans cet exercice, vous allez programmer **vous-mêmes** un système embarqué complet.

Le but final :
👉 **Un bouton appuyé → lecture du capteur DHT22 → la LED change de couleur selon la température.**
👉 **Un second bouton → la LED s’éteint.**

---

# 🔧 Étape 1 – Lire un bouton poussoir

.. slide::

### 🎯 Objectif

Savoir si un bouton est appuyé.

.. step:: reset
Créez un nouveau fichier Python dans VS Code.

.. step::
Cherchez dans la documentation :
→ Comment configurer une broche en **entrée** avec `Pin`.

.. step::
Testez l’état du bouton *GP21* en affichant `pin.value()` dans la console.

---

# 🌡️ Étape 2 – Lire la température et l’humidité du DHT22

.. slide::

### 🎯 Objectif

Comprendre comment un module externe (ici `dht`) fonctionne.

.. important::
Le module `dht` n'est pas du Python standard : cherchez la documentation **MicroPython** !

.. step::
Importe le module `dht` et configure ton capteur.

.. step::
Utilise la méthode `measure()` pour actualiser les données.

.. step::
Affiche la température et l'humidité avec `temperature()` et `humidity()`.

Mini-exemple :

```python
capteur = dht.DHT22(Pin(3))
capteur.measure()
print(capteur.temperature())
```

👉 Testez plusieurs fois en réchauffant légèrement le capteur avec votre main.

---

# 🌈 Étape 3 – Contrôler une LED NeoPixel

.. slide::

### 🎯 Objectif

Comprendre comment allumer et colorer une LED RGB.

.. note::
Un NeoPixel se commande avec un objet `NeoPixel`
→ Cherchez : `neopixel.NeoPixel(pin, nombre_de_leds)`

.. step::
Créez un NeoPixel connecté à la broche utilisée par la carte ROBO Pico.

.. step::
Essayez d’afficher une couleur simple (ex : rouge).

Mini-exemple :

```python
led = neopixel.NeoPixel(Pin(18), 2)
led[0] = (255, 0, 0)
led.write()
```

👉 Expérimentez : vert, bleu, blanc…

---

# 🎛️ Étape 4 – Faire réagir la couleur à la température

.. slide::

### 🎯 Objectif

Associer une **boucle infinie** + **lecture du capteur** + **affichage couleur**.

.. step::
Créez une boucle `while True:`

.. step::
Lorsque le bouton température est appuyé :
- lisez le capteur
- affichez les valeurs
- changez la couleur de la LED selon la température

.. note::
Inspirez-vous de vos exercices précédents.
👉 Utilisez plusieurs `elif` pour définir des zones de couleurs.

Exemple d’idée de gradient température/couleur :

| Température | Couleur |
| ----------- | ------- |
| < 18°C      | bleu    |
| 18–19°C     | cyan    |
| 19–20°C     | vert    |
| 20–21°C     | jaune   |
| 21–22°C     | orange  |
| ≥ 22°C      | rouge   |

---

# ⬛ Étape 5 – Ajouter le bouton d’extinction (RESET couleur)

.. slide::

### 🎯 Objectif

Permettre d’éteindre la LED quand un second bouton est pressé.

.. step::
Créez un second bouton en entrée.

.. step::
Dans votre boucle infinie, testez son état.

.. step::
Si appuyé → LED en **noir** (0,0,0).
