#!/usr/bin/env python3
"""
Récupère les ressources tierces et les range dans le dépôt.
"""

import pathlib
import re
import shutil
import sys
import urllib.request

RACINE = pathlib.Path(__file__).resolve().parent.parent
POLICES = RACINE / "themes" / "fonts"
MATHJAX = RACINE / "themes" / "mathjax"

# Un navigateur récent, sinon Google Fonts renvoie du woff (deux fois plus lourd).
AGENT = (
    "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 "
    "(KHTML, like Gecko) Chrome/140.0 Safari/537.36"
)

FAMILLES = (
    "https://fonts.googleapis.com/css2"
    "?family=JetBrains+Mono:wght@400;600"
    "&family=Public+Sans:ital,wght@0,400;0,600;0,700;1,400"
    "&family=Space+Grotesk:wght@500;700"
    "&display=block"
)

# « display=block » plutôt que « swap » : les polices sont servies depuis le
# dépôt, on préfère attendre quelques millisecondes plutôt que d'afficher la
# page dans une police de repli avant de basculer.

# Le français tient dans « latin » ; « latin-ext » couvre les emprunts.
SOUS_ENSEMBLES = ("latin", "latin-ext")

MATHJAX_URL = "https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js"


def telecharger(url):
    requete = urllib.request.Request(url, headers={"User-Agent": AGENT})

    with urllib.request.urlopen(requete, timeout=60) as reponse:
        return reponse.read()


def nom_de_fichier(bloc):
    famille = re.search(r"font-family:\s*'([^']+)'", bloc).group(1)
    graisse = re.search(r"font-weight:\s*(\d+)", bloc).group(1)
    italique = "-italique" if "font-style: italic" in bloc else ""

    return "{}-{}{}".format(famille.replace(" ", "-").lower(), graisse, italique)


def polices():
    feuille = telecharger(FAMILLES).decode("utf-8")
    blocs = re.findall(r"/\* ([a-z-]+) \*/\s*(@font-face \{.*?\})", feuille, re.S)

    if POLICES.exists():
        shutil.rmtree(POLICES)
    POLICES.mkdir(parents=True)

    sorties = []

    for sous_ensemble, bloc in blocs:
        if sous_ensemble not in SOUS_ENSEMBLES:
            continue

        url = re.search(r"url\((https://[^)]+\.woff2)\)", bloc).group(1)
        fichier = "{}-{}.woff2".format(nom_de_fichier(bloc), sous_ensemble)

        (POLICES / fichier).write_bytes(telecharger(url))
        sorties.append(re.sub(r"url\(https://[^)]+\.woff2\)", "url(fonts/{})".format(fichier), bloc))
        print("  police  {}".format(fichier))

    entete = (
        "/**\n"
        " * Polices du site, servies depuis le dépôt.\n"
        " *\n"
        " * Fichier produit par tools/telecharger-dependances.py — ne pas modifier\n"
        " * à la main.\n"
        " */\n\n"
    )
    (RACINE / "themes" / "fonts.css").write_text(entete + "\n\n".join(sorties) + "\n", "utf-8")


def mathjax():
    MATHJAX.mkdir(parents=True, exist_ok=True)
    cible = MATHJAX / "tex-svg.js"
    cible.write_bytes(telecharger(MATHJAX_URL))
    print("  mathjax {} ({} ko)".format(cible.name, cible.stat().st_size // 1024))


if __name__ == "__main__":
    try:
        print("* Polices")
        polices()
        print("* MathJax")
        mathjax()
    except Exception as erreur:  # noqa: BLE001 - message lisible plutôt qu'une trace
        sys.exit("Échec du téléchargement : {}".format(erreur))

    print("* Terminé. Pensez à versionner themes/fonts/ et themes/mathjax/.")
