#!/bin/bash
#
# Aperçu local du cours.
#
#   ./watch.sh          construit le site, le sert et le reconstruit à chaque
#                       modification de pages/, themes/ ou src/
#   PORT=9000 ./watch.sh   pour changer de port
#
# En mode local, le bandeau affiche un sélecteur d'habillage et le navigateur
# se recharge tout seul après chaque reconstruction.

set -u

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$ROOT" || exit 1

PORT="${PORT:-8080}"
WATCHED=(pages themes src build.php site.php files/sources)

export DEV=1

server=""
cleanup() { [ -n "$server" ] && kill "$server" 2>/dev/null; }
trap cleanup EXIT INT TERM

build() {
    if make --no-print-directory all; then
        printf '\033[32m✓\033[0m %s — site à jour\n' "$(date +%H:%M:%S)"
    else
        printf '\033[31m✗\033[0m %s — la construction a échoué\n' "$(date +%H:%M:%S)"
    fi
}

build

php -S "localhost:$PORT" -t web/ >/dev/null 2>&1 &
server=$!

printf '\n  Cours       http://localhost:%s/\n' "$PORT"

# Les adresses des groupes viennent de site.php : renommer un groupe là-bas
# suffit.
php -r '
    $config = require "site.php";

    foreach ($config["groups"] as $group) {
        printf("  %-11s http://localhost:%s/%s/\n", $group["label"], $argv[1], $group["slug"]);
    }
' "$PORT"
printf '\n'
printf '  Ctrl+C pour arrêter.\n\n'

fingerprint() {
    find "${WATCHED[@]}" -type f -printf '%T@ %s %p\n' 2>/dev/null | sort | cksum
}

if command -v inotifywait >/dev/null 2>&1; then
    while inotifywait -qq -e modify,create,delete,move -r "${WATCHED[@]}"; do
        build
    done
else
    # inotify-tools n'est pas installé : on se rabat sur une comparaison
    # périodique, largement suffisante pour une trentaine de fichiers.
    previous="$(fingerprint)"

    while sleep 1; do
        current="$(fingerprint)"

        if [ "$current" != "$previous" ]; then
            previous="$current"
            build
        fi
    done
fi
