.. slide::

Introduction
============

.. slide::

Setting up
----------

You need to install ``php`` and ``composer`` to install the dependencies.

.. code-block:: bash

    apt-get install php composer

Install the dependencies:

.. code-block:: bash

    composer install

.. slide::

Building the website
--------------------

To build the website, run:

.. code-block:: bash

    make

You can edit and adapt the `build.php` script to your needs.

.. slide::

On-the-fly generation
---------------------

Run the following for on-the-fly generation:

.. code-block::

    make watch

Result will be available live on `http://localhost:8080 <http://localhost:8080>`_

.. slide::

Publishing on GitHub pages
--------------------------

To publish on GitHub pages, you can:

* Add the provided `workflow <https://github.com/Gregwar/slidey-skeleton/blob/main/.github/workflows/build.yml>`_ to the ``.github/workflows`` directory
* Enable GitHub page through *Github Actions* source from your repository
* The workflow will trigger on every push, or can be triggered manually from the *Actions* tab