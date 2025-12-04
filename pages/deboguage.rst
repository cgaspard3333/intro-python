
.. slide::
Débogage avec VS Code
===============================

.. slide::
Introduction
------------
Lorsqu’on programme, il est normal de rencontrer des erreurs (bugs). Le **débogage** est l’art de comprendre pourquoi un programme ne fonctionne pas et de corriger les erreurs. VS Code offre un outil intégré de **débogage** qui permet de :

   - exécuter son programme pas à pas,
   - inspecter les variables,
   - mettre en pause l’exécution à un endroit précis,
   - comprendre la logique du code.

Nous allons découvrir comment utiliser le débogueur de VS Code pour un code en Python.

.. .. slide::
.. Mise en place
.. --------------

.. 1. Ouvrez votre projet Python dans VS Code.
.. 2. Assurez-vous que l’extension **Python** est installée (éditeur → Extensions → chercher **Python** → installer).
.. 3. Vérifiez que l’interpréteur Python utilisé est correct :

..    - Cliquez en bas à droite sur la version de Python,
..    - Sélectionnez l’environnement voulu (par ex. Python 3.x).


.. .. center::
..     .. image:: images/vs_code_python_version.png
..         :alt: Choix de la version de Python


.. slide::
Lancer un programme avec le débogueur
-----------------------------------------

Pour lancer un programme avec le débogueur :

1. Ouvrez le fichier Python à exécuter (ex: ``main.py``).
2. Cliquez sur l’icône « Run and Debug » (ou utilisez le raccourci ``Ctrl+Shift+D``).
3. Choisissez "Python: Fichier courant (ou Current File si votre VS Code est en anglais)".

Votre programme s’exécute, mais vous pouvez désormais le contrôler grâce au panneau de débogage.

.. center::
    .. image:: images/vs_code_lancer_debug.png
        :width: 100%
        :alt: Lancer le débogueur dans VSCode

.. slide::
Les points d’arrêt (breakpoints)
---------------------------------

Un **point d’arrêt** permet d’arrêter l’exécution du programme à une ligne précise pour analyser ce qu’il se passe.

- Cliquez à gauche d’une ligne de code pour poser un point rouge.
- Lancez le débogueur : le programme s’arrête à cette ligne.
- Vous pouvez ensuite examiner les variables, pas à pas.

.. center::
    .. image:: images/vs_code_point_arret.png
        :width: 200%
        :alt: Ajouter un point d'arrêt dans VSCode

.. slide::
Contrôler l’exécution
------------------------

Lorsque le programme est arrêté, vous disposez de plusieurs commandes :

- ``F10`` → **Step Over** : exécuter la ligne en cours sans entrer dans les fonctions.
- ``F11`` → **Step Into** : entrer dans la fonction appelée pour la déboguer.
- ``Shift+F11`` → **Step Out** : sortir de la fonction en cours.
- ``F5`` → **Continue** : reprendre l’exécution jusqu’au prochain point d’arrêt.


.. center::
    .. image:: images/vs_code_variables.png
        :width: 200%
        :alt: Inspecter les variables dans VSCode

.. slide::
Inspecter les variables
------------------------

Dans le panneau de débogage, vous pouvez :

- Observer les **variables locales** (celles définies dans la fonction en cours),
- Observer les **variables globales**,
- Ajouter des **expressions surveillées** (``Espion``ou ``Watch`` en anglais) pour suivre leur évolution.

Cela permet de vérifier pas à pas la valeur des variables et de détecter d’où vient l’erreur.  La section ``Espion`` permetd’ajouter une variable ou une expression à suivre. Cliquez sur **+**, tapez par exemple ``i`` ou ``len(liste)``, et la valeur sera mise à jour à chaque étape du débogage.

.. slide::
Exemple pratique
----------------

Prenons ce petit programme :

.. code-block:: python

    def somme(liste):
        s = 0
        for i in range(len(liste)+1):  # Erreur volontaire : +1
            s += liste[i]
        return s

    print(somme([1, 2, 3]))

Lorsqu’on l’exécute, on obtient une erreur : ``IndexError``.

- Posez un **point d’arrêt** sur la ligne ``s += liste[i]``.
- Lancez le débogueur.
- Observez la valeur de ``i`` et de ``liste``.
- Ajoutez dans ``Espion`` sur ``i``, ``liste[i]`` et ``s`` pour voir leur évolution à chaque étape.
- Vous verrez que lorsque ``i`` vaut 3, la liste n’a plus d’élément à cet index.
- Conclusion : il faut corriger la boucle en ``range(len(liste))``.


