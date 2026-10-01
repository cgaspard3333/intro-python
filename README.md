Introduction à Python
=====================

Le support du cours, écrit en reStructuredText et publié sur GitHub Pages.

Le site se compose d'une page d'accueil où l'on choisit son groupe de TP, puis
d'un site complet par groupe :

```
web/index.html      choix du groupe
web/groupe-a/…      le cours tel que le voit le groupe A
web/groupe-b/…      le cours tel que le voit le groupe B
```

Le contenu des deux sites vient des mêmes fichiers `pages/*.rst`. Un fichier
peut contenir des passages destinés à un seul groupe (voir
[Écrire pour un groupe](#écrire-pour-un-groupe)).


Prise en main
-------------

Il faut PHP (7.4 ou plus), `make` et `zip`.

```bash
php composer.phar install     # ou : composer install
./watch.sh
```

Le site ne dépend d'aucun service extérieur : polices, MathJax, coloration
syntaxique et recherche sont servis depuis le dépôt. Il fonctionne donc en
salle sans réseau, et n'envoie l'adresse IP des étudiants à personne.
`tools/telecharger-dependances.py` regénère `themes/fonts/` et
`themes/mathjax/` — à relancer seulement pour changer de police ou de version
de MathJax.

`watch.sh` construit le site, le sert sur <http://localhost:8080> et le
reconstruit à chaque modification de `pages/`, `themes/` ou `src/`. Le
navigateur se recharge tout seul. `PORT=9000 ./watch.sh` pour changer de port.

Les autres commandes :

| Commande     | Effet                                                |
|--------------|------------------------------------------------------|
| `make`       | construit le site dans `web/`                         |
| `make dev`   | identique à `./watch.sh`                              |
| `make clean` | efface `web/`, `.build/` et les archives de `files/`  |

Trois paramètres d'URL sont utiles pour se mettre dans un état précis sans
cliquer : `?theme=auto|light|dark`, `?code=auto|light|dark` et `?diapos` qui
ouvre directement le mode diapositives. Ils s'appliquent à la visite sans
modifier le réglage enregistré, donc un lien de projection reste partageable.


Écrire une page
---------------

Une page = un fichier `pages/<nom>.rst`, référencé depuis un `.. toctree::`
(celui de `pages/index.rst` pour un chapitre, celui d'un chapitre pour ses
exercices supplémentaires). Une page qui n'est référencée nulle part n'est pas
construite.

Les directives disponibles :

```rst
.. slide::                 ouvre une nouvelle diapositive

.. recap::                 la fiche récapitulative de fin de chapitre
.. carte:: Titre           une carte de cette fiche ; le corps accepte du
                           RST ordinaire (texte, listes, blocs de code)

.. lead::                  la phrase d'accroche sous le titre d'une page
.. pratique::              les informations d'organisation, centrées
                           (contacts, modalités de rendu)

.. step::                  une case à cocher ; « .. step:: reset » ouvre
                           une nouvelle série (un nouvel exercice)
.. spoiler::               un contenu masqué derrière un bouton
.. discoverList::          la liste qui suit apparaît point par point en
                           mode diapositives
.. center::                centre le bloc
.. code-block:: python     un bloc de code (python par défaut, aussi bash
                           et text)
```

Les encadrés, avec le repère affiché dans leur marge :

| Directive       | Sert à                        | Repère | Couleur |
|-----------------|-------------------------------|--------|---------|
| `.. important::`| les objectifs, une consigne clé | —    | accent  |
| `.. note::`     | un point de cours à retenir     | i    | bleu    |
| `.. exemple::`  | un exemple                      | `>>>` | ardoise |
| `.. warning::`  | idem : un exemple               | `>>>` | ardoise |
| `.. attention::`| un véritable avertissement      | !    | ambre   |
| `.. success::`  | ce qui est acquis à ce stade    | ✓    | vert    |
| `.. danger::`   | une erreur classique            | ✕    | rouge   |
| `.. astuce::`   | un coup de pouce                | +    | or      |

Dans une carte de récapitulatif, une puce qui **commence** par du code
s'aligne en deux colonnes — le symbole d'un côté, ce qu'il fait de l'autre.
Une puce rédigée en phrase garde un tiret, même si elle contient du code.

`.. warning::` rend un exemple, et non un avertissement. Ce n'est pas une
erreur : les 108 blocs `warning` du cours introduisent tous un exemple. Les
exemples sont l'encadré le plus fréquent, ils restent donc volontairement
discrets pour ne pas saturer la page. Pour un véritable avertissement, écrire
`.. attention::` ; `.. exemple::` est le nom explicite à préférer dans les
nouvelles pages.

Les cases à cocher sont enregistrées dans le navigateur de l'étudiant, par
page. Les barres du sommaire, et le filet sur le bord supérieur des tuiles de
l'accueil, disent jusqu'où on est descendu dans chaque page,
celle de la page ouverte suivant le défilement en direct. Rouvrir un chapitre
entamé y ramène directement, avec un bandeau pour remonter en haut ; une page
lue en entier, ou une adresse qui vise une ancre, repart normalement.
L'accueil du groupe propose de reprendre à la dernière page ouverte.

Les réglages proposent d'effacer l'avancement, de la page ouverte ou de tout
le cours, en deux clics — le premier arme le bouton, le second agit. Les
préférences d'affichage et le groupe choisi ne sont pas touchés.

Le sommaire s'ouvre sur le chapitre courant plutôt qu'en haut de la liste :
son déroulé est visible d'un coup d'œil.

En mode texte, le numéro de chaque diapositive s'affiche dans la marge
droite quand la fenêtre est assez large. Un clic lance la projection à partir
de cette diapositive.

La projection ne montre que le cours : les sections d'exercice (✏️ 🏋️ et les
exercices supplémentaires) restent dans la page mais ne deviennent pas des
diapositives. Une section d'exercice qui s'étend sur plusieurs `.. slide::`
est reconnue jusqu'à la section suivante. Pour forcer le classement d'une
diapositive, écrire `.. slide:: cours` ou `.. slide:: exercice`.

La recherche, dans le bandeau, porte sur tout le texte du cours, titres et
code compris. Le site étant statique, elle s'appuie sur un index
(`recherche.json`) écrit à la construction et chargé à la première frappe. `/`
ou `Ctrl+K` y place le curseur, les flèches parcourent les résultats.


Écrire pour un groupe
---------------------

Tout ce qui est écrit normalement part dans les deux groupes. Pour qu'un
passage ne parte que dans l'un d'eux, on l'encadre :

```rst
.. GROUPE A
✏️ Exercice 3 : Un dressing intelligent
---------------------------------------

**Consigne** : …

.. GROUPE B
✏️ Exercice 3 : Un dressing intelligent
---------------------------------------

**Consigne** : …

.. FIN GROUPE
```

Les règles :

- `.. GROUPE A` ouvre un passage réservé au groupe A. Il se termine au
  marqueur suivant : un autre `.. GROUPE`, ou `.. FIN GROUPE`.
- `.. GROUPE A,B` vise plusieurs groupes à la fois.
- `.. FIN GROUPE` revient au contenu commun. Ne pas l'oublier : la
  construction affiche un avertissement si un bloc reste ouvert.
- Les marqueurs s'écrivent à l'indentation du contenu qu'ils encadrent. Ils
  fonctionnent donc aussi à l'intérieur d'un `.. step::` ou d'un `.. note::`.
- Les lignes retirées sont remplacées par des lignes vides : les numéros de
  ligne des messages d'erreur restent ceux du fichier que vous éditez.

Pour une page entière plutôt qu'un passage, il suffit de la nommer :
`pages/exos_sup_chap3.groupeB.rst` remplace `pages/exos_sup_chap3.rst` pour le
groupe B, et pour lui seul.

Un marqueur qui nomme un groupe qui n'existe pas est signalé à la
construction : sans cela, un `.. GROUPE B` mal orthographié ferait disparaître
un passage sans rien dire.


### Mettre un passage de côté

```rst
.. MASQUER
✅ Récapitulatif de Chapitre
-------------------------
…
.. FIN MASQUER
```

Rien de ce qui est encadré ne part, dans aucun groupe. Le passage reste dans
le fichier et revient en retirant les deux lignes — de quoi préparer une
section avant de la publier, ou en retirer une le temps d'un TP.

L'intérieur est opaque : les marqueurs de groupe qui s'y trouvent sont mis de
côté avec le reste, donc un récapitulatif qui varie d'un groupe à l'autre se
masque d'un seul bloc. Un `.. MASQUER` laissé ouvert est signalé à la
construction.


### Le sommaire d'un groupe

Un groupe reçoit par défaut tout le sommaire de `pages/index.rst`. La clé
`pages` de `site.php` le restreint :

```php
array('id' => 'B', 'slug' => 'groupe-b', 'label' => 'Groupe B', 'pages' => array(
    'install_maison',
    'config_ide',
    'chap1',
)),
```

Les pages absentes de cette liste ne sont ni listées ni construites — le
moteur ne suit que ce qui est au sommaire. Ajouter un nom à la liste publie la
page. Sans la clé `pages`, le groupe a tout.

Une entrée de `.. toctree::` peut aussi être encadrée par les marqueurs
ci-dessus, pour qu'une page n'apparaisse qu'au sommaire d'un groupe.


### Reprendre une page dans une autre

```rst
.. INCLURE chap2 +3
```

insère à cet endroit le contenu de `pages/chap2.rst`, filtré pour le même
groupe — c'est ainsi que le groupe A lit les chapitres 1 et 2 d'une traite.
Le `+3` décale la numérotation des titres de la page reprise : `📖 1.` devient
`📖 4.`, `2.1` devient `5.1`. Seules les lignes qui sont réellement des titres
RST sont touchées ; un `2.1` au fil d'une phrase ne bouge pas.

La page reprise garde son propre fichier : on continue de l'éditer à un seul
endroit. Ce qui ne doit pas apparaître deux fois — son titre, ses objectifs,
son récapitulatif — s'encadre d'un `.. GROUPE`. Mieux vaut inclure au plus
près de la fin : au-delà du point d'inclusion, les numéros de ligne des
messages d'erreur ne correspondent plus au fichier que vous éditez.

Deux points de vigilance :

- Garder les mêmes titres de section dans les deux versions autant que
  possible : le sommaire et les liens `#ancre` s'appuient dessus.
- Vérifier les deux groupes avant de publier : `./watch.sh` les construit tous
  les deux, sur `/groupe-a/` et `/groupe-b/`. Le bandeau rappelle le groupe
  affiché sans permettre d'en changer ; le lien de bas de page ramène au choix
  initial.


Habillage
---------

Le bouton en forme d'engrenage, dans le bandeau, ouvre les réglages :

- **Thème du site** — Système, Clair ou Sombre. « Système » suit le réglage du
  système d'exploitation.
- **Thème du code** — Comme le site, Clair ou Sombre. Par défaut les blocs de
  code restent sombres même sur un site clair, comme dans un éditeur.
- **Avancement** — efface les cases cochées et les positions de lecture, pour
  la page ouverte ou pour tout le cours.

Chaque choix est retenu dans le navigateur de l'étudiant.

La colonne de texte prend la place que lui laisse le sommaire, jusqu'à 60 rem
(66 rem au-delà de 1700 px), et le corps de texte grandit avec elle pour que
le nombre de caractères par ligne reste tenable. Ces mesures sont en tête de
`themes/base.css`.

Tout l'habillage tient dans `themes/theme.css` : les couleurs vivent dans
`:root[data-theme="light"]` et `[data-theme="dark"]` pour le site,
`[data-code="light"]` et `[data-code="dark"]` pour le code. `themes/base.css`
ne connaît que ces variables et ne choisit aucune couleur.

Pour un ajustement à vous, écrivez dans `themes/perso.css` : il est chargé en
dernier et l'emporte sur tout le reste.

Les titres de niveau 2 sont colorés d'après l'émoji qui les ouvre : 🎯 ✏️ ✅ 🏋️
deviennent des bandeaux, 📖 garde un simple filet, et 🍀 ⚖️ 🌶️ reprennent les
couleurs de difficulté. La correspondance est la table `SECTIONS` en tête de
`themes/theme.js` ; un émoji absent de la table laisse le titre tel quel.


Où se trouve quoi
-----------------

```
pages/           le contenu du cours (.rst) et ses images
files/sources/   un dossier par archive à distribuer ; zippé automatiquement
themes/          habillage, gabarits de page, comportements
  base.css       structure et composants, sans aucune couleur
  theme.css      couleurs, polices, thèmes clair/sombre du site et du code
  perso.css      vos propres règles
  theme.js       réglages, recherche, sommaire, cases à cocher, avancement
  layout/        les gabarits HTML des pages
  fonts/         les polices, servies depuis le dépôt
  mathjax/       MathJax, chargé seulement sur les pages à formules
tools/           le script de récupération des ressources tierces
src/             la construction : préprocesseur des groupes, noyau RST,
                 assemblage des pages
site.php         titres, groupes, enseignants
build.php        le point d'entrée de la construction
```


Publication
-----------

Un `push` sur `main` déclenche `.github/workflows/build.yml`, qui construit le
site et le déploie sur GitHub Pages. Rien d'autre à faire.

`web/` et `.build/` ne sont pas versionnés.
