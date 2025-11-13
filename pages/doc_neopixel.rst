Documentation Technique – Module ``neopixel``
=============================================

Le module ``neopixel`` permet de contrôler des LEDs RGB adressables, aussi appelées *NeoPixel*.  
Ces LEDs se pilotent toutes via **une seule broche GPIO**, mais chaque LED peut afficher une couleur différente.

Sur la carte **ROBO Pico**, deux LEDs adressables sont connectées à la broche **GP18**.


Importation du module
------------------------

Pour utiliser les LEDs NeoPixel, il faut d'abord importer le module :

.. code-block:: python

    import neopixel


Création d’un objet NeoPixel
------------------------

L'objet NeoPixel représente un ensemble de LEDs connectées sur une même broche.

.. code-block:: python

    pixel = neopixel.NeoPixel(pin_de_la_broche, nombre_de_leds_sur_la_broche)


Représentation des couleurs (RGB)
------------------------

Chaque LED utilise des couleurs au format :

``(R, G, B)``

Chaque valeur va de **0 à 255**.

Exemples :

.. code-block:: python

    RED = (255, 0, 0)
    GREEN = (0, 255, 0)
    BLUE = (0, 0, 255)


Modifier la couleur des LEDs
------------------------

Pour changer la couleur d'une LED spécifique :

.. code-block:: python

    pixel[0] = (255, 0, 0)   # LED 0 en rouge
    pixel[1] = BLUE   # LED 1 en bleu

Pour changer toutes les LEDs à la fois :

.. code-block:: python

    pixel.fill((0, 255, 0))  # vert pour toutes les LEDs
    # OU
    pixel.fill(GREEN)         # vert pour toutes les LEDs


Appliquer les changements : ``write()``
------------------------

Après avoir modifié les couleurs, il faut envoyer les données vers les LEDs :

.. code-block:: python

    pixel.write()

Sans cet appel, **les LEDs ne changent pas**.