GitHub Classroom - Rendu des Exercices
===============

Liens de rendu des exercices par séance
-------------
.. important::

    `Lien Rendu Exercices - Chapitre 1 <https://classroom.github.com/a/yxjZS_Dz>`_  
    `Lien Rendu Exercices - Chapitre 2 <https://classroom.github.com/a/ImaJUdO4>`_  
    `Lien Rendu Exercices - Chapitre 3 <https://classroom.github.com/a/rXUIH43_>`_  
    `Lien Rendu Exercices - Chapitre 4 <https://classroom.github.com/a/VoesZFEC>`_  
    `Lien Rendu Exercices - Chapitre 5 <https://classroom.github.com/a/crbxou9c>`_  
    `Lien Rendu Exercices - Chapitre 6 <https://classroom.github.com/a/ghHuNQ4i>`_  
    `Lien Rendu Exercices - Chapitre 7 <https://classroom.github.com/a/8nWXH3Cv>`_  

Inscription à GitHub
-------------------
Pour ceux qui n'ont pas encore de compte GitHub, inscrivez-vous en suivant ce lien : `https://github.com/signup <https://github.com/signup>`_.
Si vous avez déjà un compte GitHub, vous pouvez utiliser ce compte pour vous connecter à GitHub Classroom.

.. note::
    Le pseudo que vous entrerez pendant l'inscription vous suivra tout au long de votre carrière d'informaticien/informaticienne, choisissez-le bien.

Ajout de la clé SSH à votre compte GitHub
-----------------------------------------

Pour pouvoir cloner les dépôts de vos projets, vous devez ajouter une clé SSH à votre compte GitHub. Pour cela, suivez les étapes suivantes :

.. step::
* Ouvrez un terminal et tapez la commande suivante pour générer une paire de clé SSH (clé publique et clé privée) :

.. code-block:: bash
    ssh-keygen -t ed25519

Vous devez obtenir un message similaire à celui-ci sous Linux :

.. code-block:: bash
    Generating public/private ed25519 key pair.
    Enter file in which to save the key (/home/user/.ssh/id_ed25519):

et sous Windows :

.. code-block:: bash
    Generating public/private ed25519 key pair.
    Enter file in which to save the key (C:\Users\YOUR_USERNAME/.ssh/id_ed25519):

.. step::
* Appuyez sur ``Entrée`` pour accepter le chemin par défaut ``/home/user/.ssh/id_ed25519``(Linux) et ``C:\Users\YOUR_USERNAME/.ssh/id_ed25519`` (Windows).

Vous devez obtenir un message similaire à celui-ci :

.. code-block:: bash
    Enter passphrase (empty for no passphrase):
    Enter same passphrase again:

.. step::
* Vous pouvez choisir de protéger votre clé avec un mot de passe en entrant un mot de passe et en le confirmant. Si vous ne souhaitez pas protéger votre clé, appuyez sur ``Entrée`` deux fois.

.. step::
* Affichez la clé publique générée avec un éditeur de texte qui se trouve dans ``~/.ssh/id_ed25519.pub`` ou ``C:/Users/YOUR_USERNAME.ssh/id_ed25519.pub``.
* Puis sélectionnez exactement tout le contenu affiché (y compris ssh-ed25519, et sans espace à la fin) et faîtes un clic droit → Copier

.. step::
* Connectez-vous à votre compte GitHub.
* Cliquez sur votre photo de profil en haut à droite de la page.
* Cliquez sur ``Settings`` dans le menu déroulant.
* Cliquez sur ``SSH and GPG keys`` dans le menu de gauche.
* Cliquez sur ``New SSH key``.
* Collez la clé que vous avez copiée dans le champ ``Key``.
* Donnez un titre à votre clé dans le champ ``Title``, par exemple "Cle PC IUT"
* Cliquez sur ``Add SSH key``.

.. step::
    **Uniquement sous Linux** : 
    Pour que votre clé soit utilisée par défaut, vous devez ajouter votre clé à l'agent SSH. Pour cela, tapez la commande suivante :

    .. code-block:: bash
        chmod g-r ~/.ssh/id_ed25519
        ssh-add ~/.ssh/id_ed25519

.. note::
    Vous pouvez ajouter plusieurs clés SSH à votre compte GitHub. Il faudra recommencer les étapes ci-dessus pour chaque chaque ordinateur avec lequel vous utiliserez GitHub.
    Ainsi que pour chaque Système d'explotation si vous etes en dual-boot (Linux et Windows sur le même ordinateur).

Github Classroom
----------------

Cliquez sur le lien de la séance correspondante pour accéder à votre dépôt de projet. Vous serez redirigé vers une page où vous devrez accepter l'invitation à rejoindre la classe GitHub Classroom.

Commandes Git de bases
----------------------

Sur le site du dépôt de votre projet, cliquez sur le bouton vert ``Code`` puis copiez le lien **SSH**.

* ``git clone`` suivi de l'URL copié précedemment : Permet de cloner un dépôt distant sur votre machine.
* ``git add`` suivi du nom du fichier à ajouter : Permet d'ajouter un fichier à l'index des fichiers qui seront commités.
* ``git commit -m "message"`` : Permet de valider les modifications ajoutées à l'index avec un message **obligatoire**.
* ``git push`` : Permet d'envoyer les modifications sur le dépôt distant.
* ``git pull`` : Permet de récupérer les modifications du dépôt distant.
