.. slide::
✅ Récapitulatif de Chapitre
-------------------------

.. center::

    .. image:: images/recap_chap1.png
        :alt: Récapitulatif du Chapitre 1
        :width: 100%
        
        
.. slide::
✅ Récapitulatif de Chapitre
-------------------------

.. center::

    .. image:: images/recap_chap2.png
        :alt: Récapitulatif du Chapitre 2
        :width: 100%
           
       
.. slide::
✅ Récapitulatif de Chapitre
-------------------------

.. |puplet_notation| div::
    .. center::
    ``(1, 8, 5)``

.. |tableau_notation| div::
    .. center::
    ``[1, 8, 5]``

.. |dictionnaire_notation| div::
    .. center::
    ``{1: 'Paul', 2: 'Tom', 3: 'Nadia'}``

---

.. |puplet_construction| div::
    .. center::
    P-uplet vide: ``t = ()``
    
    ``t1 = (1, 8, 5)``

.. |tableau_construction| div::
    .. center::
    Liste vide: ``L = []``
    
    ``L1 = [1, 8, 5]``

.. |dictionnaire_construction| div::
    .. center::
    Dictionnaire vide: ``D = {}``
    
    ``d1 = {1: 'Paul', 2: 'Tom', 3: 'Nadia'}``

---

.. |puplet_elements| div::
    .. center::
    **Oui**
    
    ``t2 = (1, 'b', True)``

.. |tableau_elements| div::
    .. center::
    **Oui**
    
    ``L2 = [1, 'b', True]``

.. |dictionnaire_elements| div::
    .. center::
    Les clés peuvent être de tout type, à condition d’être non modifiables: *int, str, tuple*
    
    ``d2 = {4: 'Léa', 5: 'Téo'}``

---

.. |puplet_lecture| div::
    .. center::
    ``t1[0]`` renvoie ``1``
    
    ``t1[-1]`` renvoie le dernier élément de ``t1``, soit ``5``
    
    ``t2[2]`` renvoie ``True``

.. |tableau_lecture| div::
    .. center::
    ``L1[0]`` renvoie ``1``
    
    ``L1[-1]`` renvoie le dernier élément de ``L1``, soit ``5``
    
    ``L2[2]`` renvoie ``True``

.. |dictionnaire_lecture| div::
    .. center::
    ``d1[0]`` renvoie une erreur (clé inexistante)
    
    ``d1[1]`` renvoie ``'Paul'``

---

.. |puplet_concatenation| div::
    .. center::
    ``t1 + t2`` renvoie
    
    ``(1, 8, 5, 1, 'b', True)``

.. |tableau_concatenation| div::
    .. center::
    ``L1 + L2`` renvoie 
    
    ``[1, 8, 5, 1, 'b', True]``

.. |dictionnaire_concatenation| div::
    .. center::
    **Non**
    
    ``d1 + d2`` renvoie une erreur de type

---

.. |puplet_multiplication| div::
    .. center::
    ``2 * t1`` renvoie ``(1, 8, 5, 1, 8, 5)``

.. |tableau_multiplication| div::
    .. center::
    ``2 * L1`` renvoie ``[1, 8, 5, 1, 8, 5]``

.. |dictionnaire_multiplication| div::
    .. center::
       
    **Non**

    ``2 * d1`` renvoie une erreur

---

.. |puplet_modifiable| div::
    .. center::
    **Non**
    
    On peut créer un nouveau p-uplet

.. |tableau_modifiable| div::
    .. center::
    **Oui**
    
    Avec l'instruction ``L1[2] = 4``, ``L1`` devient ``[1, 8, 4]``

.. |dictionnaire_modifiable| div::
    .. center::
    On peut modifier les valeurs, mais pas les clés
    
    Exemple: ``d1[2] = 'Joe'`` remplace ``'Tom'`` par ``'Joe'``

---

.. |puplet_longueur| div::
    .. center::
    ``len(t1)`` renvoie ``3``

.. |tableau_longueur| div::
    .. center::
    ``len(L1)`` renvoie ``3``

.. |dictionnaire_longueur| div::
    .. center::
    ``len(d1)`` renvoie ``3``

---

.. |puplet_methodes| div::
    .. center::
    Pas de méthode spécifique à connaître

.. |tableau_methodes| div::
    .. center::
    ``L1.append(element)`` ajoute ``element`` à la fin de ``L1``
        
    ``L1.remove(element)`` supprime la première occurrence de ``element`` dans ``L1``

    ``L1.index(element)`` renvoie l'index de la première occurrence de ``element`` dans ``L1``

    ``L1.count(element)`` renvoie le nombre d'occurrences de ``element`` dans ``L1``

    ``L1.sort()`` trie les éléments de ``L1``

    ``L1.reverse()`` inverse l'ordre des éléments de ``L1``

.. |dictionnaire_methodes| div::
    .. center::
    ``d1.items()`` renvoie la collection d’objets
    
    ``d1.keys()`` renvoie les clés
    
    ``d1.values()`` renvoie les valeurs

    ``d1.get(key)`` renvoie la valeur associée à la clé ``key``

    ``d1.pop(key)`` supprime l'élément associé à la clé ``key``


.. center::
    +------------------------+------------------------+--------------------------+--------------------------------------+
    |                        | **P-uplet**            | **Tableau (liste)**      | **Dictionnaire**                     |
    +========================+========================+==========================+======================================+
    | **Notation**           | |puplet_notation|      | |tableau_notation|       | |dictionnaire_notation|              |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Construction**       | |puplet_construction|  | |tableau_construction|   | |dictionnaire_construction|          |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Les élements**       | |puplet_elements|      | |tableau_elements|       | |dictionnaire_elements|              |
    | **internes peuvent**   |                        |                          |                                      |
    | **être de différents** |                        |                          |                                      |
    | **types**              |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Lecture du contenu** | |puplet_lecture|       | |tableau_lecture|        | |dictionnaire_lecture|               |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Concaténation**      | |puplet_concatenation| | |tableau_concatenation|  | |dictionnaire_concatenation|         |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Multiplication**     | |puplet_multiplication|| |tableau_multiplication| | |dictionnaire_multiplication|        |
    | **par un entier**      |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Modifiable par**     | |puplet_modifiable|    | |tableau_modifiable|     | |dictionnaire_modifiable|            |
    | **affectation**        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Longueur**           | |puplet_longueur|      | |tableau_longueur|       | |dictionnaire_longueur|              |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+
    | **Méthodes**           | |puplet_methodes|      | |tableau_methodes|       | |dictionnaire_methodes|              |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    |                        |                        |                          |                                      |
    +------------------------+------------------------+--------------------------+--------------------------------------+

.. center::

    .. image:: images/recap_chap3.png
        :alt: Récapitulatif du Chapitre 3
        :width: 100%
