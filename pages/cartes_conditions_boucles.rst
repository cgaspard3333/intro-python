    .. Fiches du récapitulatif sur les conditions et les boucles, reprises par
       deux pages : chap1.rst pour le groupe qui lit les deux chapitres d'une
       seule page, chap2.rst pour celui qui les lit séparément.
       Elles s'écrivent à l'indentation d'un corps de « .. recap:: ».
       Ce fichier n'est construit nulle part seul : on l'édite ici, une seule fois.

    .. carte:: Opérateurs de comparaison

        * ``==`` Égal à
        * ``!=`` Différent de
        * ``<`` Inférieur à
        * ``>`` Supérieur à
        * ``<=`` Inférieur ou égal à
        * ``>=`` Supérieur ou égal à

    .. carte:: Opérateurs logiques

        * ``and`` Vrai si les deux conditions sont vraies
        * ``or`` Vrai si au moins une des conditions est vraie
        * ``not`` Inverse la condition

    .. carte:: Conditions

        .. code-block:: python

            if condition:
                # exécuté si la condition est vraie
            elif autre_condition:
                # exécuté si la première est fausse et celle-ci vraie
            else:
                # exécuté dans tous les autres cas

        Les deux-points ouvrent le bloc, l'indentation le délimite.

    .. carte:: Boucle while

        .. code-block:: python

            while condition:
                # répété tant que la condition est vraie

        * ``break`` Sort immédiatement de la boucle
        * ``continue`` Passe à l'itération suivante

    .. carte:: Boucle for

        .. code-block:: python

            for variable in sequence:
                # répété pour chaque élément de la séquence

        ``range(debut, fin, pas)`` engendre une suite d'entiers. Par défaut
        ``debut`` vaut 0 et ``pas`` vaut 1, et ``fin`` est toujours exclu :
        ``range(3)`` donne 0, 1 et 2.

        ``break`` et ``continue`` s'utilisent aussi dans une boucle ``for``.

    .. carte:: Tables de vérité

        +-------+-------+-------+-------+---------+--------+--------------+----------------+
        |   A   |   B   | not A | not B | A and B | A or B | not(A and B) | not A or not B |
        +=======+=======+=======+=======+=========+========+==============+================+
        | False | False | True  | True  | False   | False  | True         | True           |
        +-------+-------+-------+-------+---------+--------+--------------+----------------+
        | False | True  | True  | False | False   | True   | True         | True           |
        +-------+-------+-------+-------+---------+--------+--------------+----------------+
        | True  | True  | False | False | True    | True   | False        | False          |
        +-------+-------+-------+-------+---------+--------+--------------+----------------+
        | True  | False | False | True  | False   | True   | True         | True           |
        +-------+-------+-------+-------+---------+--------+--------------+----------------+
