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

            if age < 18:
                print("mineur")
            elif age < 65:
                print("majeur")
            else:
                print("senior")

        Les deux-points ouvrent le bloc, l'indentation le délimite. ``elif`` et ``else`` sont facultatifs, et ``elif`` peut se répéter.

    .. carte:: Boucle while

        .. code-block:: python

            n = 0
            while n < 3:
                n = n + 1

        Répétée tant que la condition est vraie.

        * ``break`` Sort immédiatement de la boucle
        * ``continue`` Passe à l'itération suivante

    .. carte:: Boucle for

        .. code-block:: python

            for i in range(3):
                print(i)

        Répétée pour chaque élément. ``range(3)`` donne 0, 1 et 2 : la borne de fin est **exclue**. On peut aussi préciser le début et le pas.

        ``break`` et ``continue`` s'utilisent aussi ici.

    .. carte:: Pièges à éviter

        * ``=`` affecte une valeur, ``==`` compare deux valeurs.
        * Les deux-points et l'indentation délimitent le bloc : les oublier change le sens du programme.
        * ``input()`` renvoie une chaîne. Sans conversion, ``"10" < "9"`` est **vrai** : ce sont des textes qui sont comparés, pas des nombres.
        * Une boucle ``while`` dont la condition ne change jamais ne s'arrête pas.

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
