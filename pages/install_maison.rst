
Facultatif - Installation sur votre machine personnelle
========================================================

Windows
-------

Installation de Python
~~~~~~~~~~~~~~~~~~~~~~

Installation de VSCode
~~~~~~~~~~~~~~~~~~~~~~

Linux
-----

Installation de Python
~~~~~~~~~~~~~~~~~~~~~~

Par défaut Python est installé sur la plupart des distributions Linux. Pour vérifier si Python est installé sur votre machine, ouvrez un terminal et tapez la commande suivante : ``python --version`` ou ``python3 --version``. Si Python est installé, vous devriez voir la version de Python installée sur votre machine. Si Python n'est pas installé, vous pouvez l'installer en utilisant le gestionnaire de paquets de votre distribution.

Pour éviter d'avoir à jongler entre ``python`` et ``python3`` vous pouvez installer le paquet ``python-is-python3`` qui permet de lier ``python`` à ``python3`` avec la commande suivante :

.. code-block:: bash
    sudo apt install python-is-python3

Installation de VSCode
~~~~~~~~~~~~~~~~~~~~~~

Allez sur le site de Visual Studio Code : `https://code.visualstudio.com/ <https://code.visualstudio.com/>`_

Pour les distributions basées sur Debian (Ubuntu, Linux Mint, etc.), vous pouvez télécharger le fichier .deb et l'installer en utilisant la commande suivante : 

.. code-block:: bash
    sudo dpkg -i code_1.XX.X-XXXXXXXX_amd64.deb

A la fin de l'installation vous pouvez accepter d'ajouter VSCode à votre apt repository pour pouvoir le mettre à jour automatiquement.

Pour les autres distributions Linux, consultez la documentation de Visual Studio Code pour obtenir des instructions d'installation.

Configuration de VSCode
----------

