/**
 * Comportements du cours : réglages d'affichage, sommaire, cases à cocher,
 * avancement, copie du code, démarrage de Slidey.
 *
 * Le fichier sert aussi à la page d'accueil, où Slidey n'est pas chargé :
 * chaque bloc vérifie ce dont il a besoin avant de s'exécuter.
 */
(function () {
    'use strict';

    var root = document.documentElement;
    var dark = window.matchMedia('(prefers-color-scheme: dark)');

    var store = {
        get: function (key) { try { return localStorage.getItem(key); } catch (e) { return null; } },
        set: function (key, value) { try { localStorage.setItem(key, value); } catch (e) {} },
        remove: function (key) { try { localStorage.removeItem(key); } catch (e) {} }
    };

    /* --------------------------------------------- réglages d'affichage */

    // Deux réglages indépendants : le site, et les blocs de code. « auto »
    // suit le système pour le site, et le site pour le code.
    var settings = {
        theme: { key: 'cours.theme', fallback: 'auto' },
        code: { key: 'cours.code', fallback: 'dark' }
    };

    var asked = new URLSearchParams(window.location.search);

    // ?theme=dark&code=light permet de partager un lien déjà réglé, sans
    // toucher au choix enregistré du lecteur.
    function choiceOf(name) {
        var wanted = asked.get(name);

        if (wanted === 'auto' || wanted === 'light' || wanted === 'dark') {
            return wanted;
        }

        return store.get(settings[name].key) || settings[name].fallback;
    }

    function applySettings() {
        var theme = choiceOf('theme');
        var code = choiceOf('code');
        var isDark = theme === 'dark' || (theme === 'auto' && dark.matches);

        root.dataset.theme = isDark ? 'dark' : 'light';
        root.dataset.themeChoice = theme;
        root.dataset.code = code === 'auto' ? (isDark ? 'dark' : 'light') : code;
        root.dataset.codeChoice = code;

        document.querySelectorAll('.segmented').forEach(function (group) {
            var value = choiceOf(group.dataset.setting);

            group.querySelectorAll('button').forEach(function (button) {
                button.setAttribute('aria-pressed', String(button.dataset.value === value));
            });
        });
    }

    function setupSettings() {
        document.querySelectorAll('.segmented').forEach(function (group) {
            group.addEventListener('click', function (event) {
                var button = event.target.closest('button');
                if (!button) { return; }

                store.set(settings[group.dataset.setting].key, button.dataset.value);
                applySettings();
            });
        });

        dark.addEventListener('change', applySettings);
        applySettings();
    }

    // Les menus du bandeau sont des <details> : ils fonctionnent sans script,
    // mais on les referme au clic à côté et à la touche Échap.
    function setupMenus() {
        var menus = document.querySelectorAll('.topbar details');
        if (!menus.length) { return; }

        function closeAll(except) {
            menus.forEach(function (menu) {
                if (menu !== except) { menu.open = false; }
            });
        }

        menus.forEach(function (menu) {
            menu.addEventListener('toggle', function () {
                if (menu.open) { closeAll(menu); }
            });
        });

        document.addEventListener('click', function (event) {
            if (!event.target.closest('.topbar details')) { closeAll(null); }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') { closeAll(null); }
        });
    }

    /* ------------------------------------------------- titres de section */

    // Le cours ouvre ses titres de niveau 2 par un émoji qui dit de quoi il
    // s'agit. On s'en sert pour colorer la page. Un émoji inconnu laisse
    // simplement le titre tel quel : rien ne casse.
    var SECTIONS = [
        { mark: '\u{1F3AF}', type: 'objectifs', banner: true },
        { mark: '\u{1F4D6}', type: 'cours', banner: false },
        { mark: '✏', type: 'exercice', banner: true },
        { mark: '✅', type: 'recap', banner: true },
        { mark: '\u{1F3CB}', type: 'sup', banner: true },
        { mark: '\u{1F340}', type: 'facile', banner: true },
        { mark: '⚖', type: 'moyen', banner: true },
        { mark: '\u{1F336}', type: 'difficile', banner: true }
    ];

    function typeSections() {
        document.querySelectorAll('.contents h2').forEach(function (heading) {
            var text = heading.textContent.trim();

            SECTIONS.some(function (section) {
                if (text.indexOf(section.mark) !== 0) { return false; }

                heading.classList.add('sec-' + section.type);
                if (section.banner) { heading.classList.add('is-banner'); }
                return true;
            });
        });

        var first = document.querySelector('.contents h2');
        if (first) { first.classList.add('is-first'); }
    }

    // Une liste de récapitulatif dont chaque puce commence vraiment par du
    // code — pas une phrase qui en contient — s'aligne en deux colonnes.
    function ouvreSurDuCode(item) {
        var premier = item.firstChild;

        while (premier && premier.nodeType === 3 && !premier.nodeValue.trim()) {
            premier = premier.nextSibling;
        }

        return Boolean(premier) && premier.nodeName === 'CODE';
    }

    function markSymbolItems() {
        document.querySelectorAll('.recapCard ul').forEach(function (liste) {
            var puces = Array.prototype.slice.call(liste.children);

            if (puces.length && puces.every(ouvreSurDuCode)) {
                liste.classList.add('is-symbols');
            }
        });
    }

    /* --------------------------------------------------- sommaire mobile */

    function setupNav() {
        var toggle = document.querySelector('.navToggle');
        var scrim = document.querySelector('.navScrim');
        if (!toggle) { return; }

        function close() {
            document.body.classList.remove('nav-open');
            toggle.setAttribute('aria-expanded', 'false');
        }

        toggle.addEventListener('click', function () {
            var open = document.body.classList.toggle('nav-open');
            toggle.setAttribute('aria-expanded', String(open));
        });

        if (scrim) { scrim.addEventListener('click', close); }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') { close(); }
        });

        document.addEventListener('click', function (event) {
            if (event.target.closest('.sidebar a')) { close(); }
        });
    }

    /* --------------------------------------------------------- recherche */

    // Le site est statique : l'index est téléchargé à la première frappe,
    // puis gardé en mémoire pour le reste de la visite.
    var search = { field: null, panel: null, index: null, loading: null, hits: [], active: -1 };

    function normalise(text) {
        return text.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
    }

    function escapeHtml(text) {
        return text.replace(/[&<>"]/g, function (character) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;' }[character];
        });
    }

    function loadIndex() {
        if (search.index) { return Promise.resolve(search.index); }
        if (search.loading) { return search.loading; }

        search.loading = fetch('recherche.json').then(function (response) {
            return response.ok ? response.json() : [];
        }).then(function (entries) {
            search.index = entries.map(function (entry) {
                return {
                    url: entry.u,
                    page: entry.p,
                    section: entry.s,
                    text: entry.x,
                    haystack: normalise(entry.p + ' ' + entry.s + ' ' + entry.x),
                    heading: normalise(entry.p + ' ' + entry.s)
                };
            });

            return search.index;
        }).catch(function () {
            search.index = [];
            return search.index;
        });

        return search.loading;
    }

    function excerpt(entry, term) {
        var text = entry.text;
        var at = normalise(text).indexOf(term);

        if (at === -1) { return escapeHtml(text.slice(0, 150)) + (text.length > 150 ? '…' : ''); }

        var from = Math.max(0, at - 60);
        var slice = text.slice(from, at + term.length + 90);

        return (from ? '…' : '')
            + escapeHtml(slice.slice(0, at - from))
            + '<mark>' + escapeHtml(slice.slice(at - from, at - from + term.length)) + '</mark>'
            + escapeHtml(slice.slice(at - from + term.length))
            + '…';
    }

    function runSearch(query) {
        var terms = normalise(query).split(/\s+/).filter(Boolean);

        search.hits = search.index.filter(function (entry) {
            return terms.every(function (term) { return entry.haystack.indexOf(term) !== -1; });
        }).map(function (entry) {
            // Un mot trouvé dans un titre pèse plus lourd que dans le corps.
            var score = terms.reduce(function (total, term) {
                return total + (entry.heading.indexOf(term) !== -1 ? 10 : 1);
            }, 0);

            return { entry: entry, score: score };
        }).sort(function (a, b) {
            return b.score - a.score;
        }).slice(0, 40).map(function (hit) {
            return hit.entry;
        });

        renderHits(terms[0] || '');
    }

    function renderHits(term) {
        search.active = -1;

        if (!search.hits.length) {
            search.panel.innerHTML = '<p class="searchEmpty">Aucun résultat.</p>';
            return;
        }

        search.panel.innerHTML = '<p class="searchCount">'
            + search.hits.length + (search.hits.length > 1 ? ' résultats' : ' résultat')
            + '</p><ol class="searchList">'
            + search.hits.map(function (entry) {
                return '<li><a class="searchHit" href="' + escapeHtml(entry.url) + '">'
                    + '<span class="hitPage">' + escapeHtml(entry.page) + '</span>'
                    + (entry.section ? '<span class="hitSection">' + escapeHtml(entry.section) + '</span>' : '')
                    + '<span class="hitText">' + excerpt(entry, term) + '</span>'
                    + '</a></li>';
            }).join('')
            + '</ol>';
    }

    function showResults(visible) {
        search.panel.hidden = !visible;
    }

    function closeSearch() {
        showResults(false);
        search.active = -1;
    }

    function moveActive(step) {
        var links = search.panel.querySelectorAll('.searchHit');
        if (!links.length) { return; }

        search.active = (search.active + step + links.length) % links.length;

        links.forEach(function (link, position) {
            link.classList.toggle('is-active', position === search.active);
        });

        links[search.active].scrollIntoView({ block: 'nearest' });
    }

    function setupSearch() {
        search.field = document.querySelector('.searchField');
        search.panel = document.querySelector('.searchResults');
        if (!search.field || !search.panel) { return; }

        // Le bandeau est étroit sur petit écran : l'invite s'abrège.
        var etroit = window.matchMedia('(max-width: 620px)');

        function ajusterInvite() {
            search.field.placeholder = etroit.matches ? 'Rechercher' : 'Rechercher dans le cours';
        }

        etroit.addEventListener('change', ajusterInvite);
        ajusterInvite();

        search.field.addEventListener('focus', loadIndex);

        search.field.addEventListener('input', function () {
            var query = search.field.value.trim();

            if (query.length < 2) {
                showResults(false);
                return;
            }

            loadIndex().then(function () {
                if (search.field.value.trim() !== query) { return; }

                runSearch(query);
                showResults(true);
            });
        });

        search.field.addEventListener('keydown', function (event) {
            if (event.key === 'ArrowDown' || event.key === 'ArrowUp') {
                event.preventDefault();
                moveActive(event.key === 'ArrowDown' ? 1 : -1);
            } else if (event.key === 'Enter' && search.active >= 0) {
                event.preventDefault();
                search.panel.querySelectorAll('.searchHit')[search.active].click();
            } else if (event.key === 'Escape') {
                search.field.value = '';
                closeSearch();
                search.field.blur();
            }
        });

        search.field.addEventListener('focus', function () {
            if (search.hits.length && search.field.value.trim().length >= 2) { showResults(true); }
        });

        document.addEventListener('click', function (event) {
            if (!event.target.closest('.searchBox')) { closeSearch(); }
        });

        // « / » et Ctrl+K placent le curseur dans la recherche.
        document.addEventListener('keydown', function (event) {
            var shortcut = event.key === '/' && !event.metaKey && !event.ctrlKey
                || (event.key === 'k' || event.key === 'K') && (event.metaKey || event.ctrlKey);
            if (!shortcut) { return; }

            var tag = document.activeElement && document.activeElement.tagName;
            if (tag === 'INPUT' || tag === 'TEXTAREA') { return; }

            event.preventDefault();
            search.field.focus();
            search.field.select();
        });
    }

    // Le sommaire s'ouvre sur le chapitre courant plutôt qu'en haut de la
    // liste : son déroulé est visible d'un coup d'œil. Les derniers chapitres
    // ont besoin d'une réserve en bas pour pouvoir remonter, mais elle est
    // calculée au strict nécessaire — sinon une liste qui tient entièrement à
    // l'écran deviendrait défilable pour rien.
    function setupNavScroll() {
        var sidebar = document.querySelector('.sidebar');
        if (!sidebar) { return; }

        var current = sidebar.querySelector('.navItem.is-current');
        if (!current) { return; }

        function place(scroll) {
            sidebar.style.paddingBottom = '';

            var style = window.getComputedStyle(sidebar);
            var haut = current.getBoundingClientRect().top
                - sidebar.getBoundingClientRect().top + sidebar.scrollTop;

            // Position visée : l'élément courant là où la marge haute le
            // placerait. Pour le premier de la liste, c'est zéro — donc ni
            // défilement ni réserve.
            var vise = Math.max(0, haut - (parseFloat(style.paddingTop) || 0));
            var manque = vise - (sidebar.scrollHeight - sidebar.clientHeight);

            if (manque > 0) {
                sidebar.style.paddingBottom = ((parseFloat(style.paddingBottom) || 0) + manque) + 'px';
            }

            if (scroll) { sidebar.scrollTop = vise; }
        }

        place(true);
        window.addEventListener('resize', function () { place(false); }, { passive: true });
    }

    /* ------------------------------------------- plan de la page courante */



    function setupOutline() {
        var links = Array.prototype.slice.call(document.querySelectorAll('.outlineLink'));
        if (!links.length || !('IntersectionObserver' in window)) { return; }

        var targets = links.map(function (link) {
            return document.getElementById(decodeURIComponent(link.hash.slice(1)));
        });

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) { return; }

                var index = targets.indexOf(entry.target);
                links.forEach(function (link, position) {
                    link.classList.toggle('is-active', position === index);
                });
            });
        }, { rootMargin: '-15% 0px -70% 0px' });

        targets.forEach(function (target) { if (target) { observer.observe(target); } });
    }

    /* ---------------------------------------------- étapes et avancement */

    function stepsKey(pathname) {
        return 'cours.etapes:' + pathname;
    }

    function readSteps(pathname) {
        var raw = store.get(stepsKey(pathname));
        if (!raw) { return null; }

        try {
            var data = JSON.parse(raw);
            return Array.isArray(data.done) ? data : null;
        } catch (e) {
            return null;
        }
    }

    /* -------------------------------------------- avancement de lecture */

    // La barre d'un chapitre dit jusqu'où on est descendu dans la page. Pour
    // la page ouverte elle suit le défilement ; pour les autres, elle garde le
    // point le plus bas atteint.
    function readingKey(pathname) {
        return 'cours.lecture:' + pathname;
    }

    function readingOf(href) {
        var value = parseFloat(store.get(readingKey(new URL(href, window.location.href).pathname)));

        return isNaN(value) ? null : Math.min(1, Math.max(0, value));
    }

    function scrollRatio() {
        var page = document.documentElement;
        var travel = page.scrollHeight - page.clientHeight;

        // Une page qui tient dans la fenêtre est lue dès qu'elle est ouverte.
        return travel > 8 ? Math.min(1, page.scrollTop / travel) : 1;
    }

    function setupReading() {
        var current = document.querySelector('.navItem.is-current');
        if (!current) { return; }

        var key = readingKey(window.location.pathname);
        var bar = current.querySelector('.navProgress');
        var pending = false;

        function update() {
            pending = false;
            var ratio = scrollRatio();
            var best = Math.max(ratio, readingOf(window.location.pathname) || 0);

            store.set(key, best.toFixed(3));
            if (bar) { paintBar(bar, ratio); }
        }

        window.addEventListener('scroll', function () {
            if (pending || document.body.classList.contains('slide-mode')) { return; }

            pending = true;
            window.requestAnimationFrame(update);
        }, { passive: true });

        window.addEventListener('resize', update, { passive: true });

        // La hauteur de la page bouge encore quand les images arrivent.
        window.addEventListener('load', update);
        update();
    }

    /**
     * Place la page à l'ouverture : sur l'ancre demandée, ou là où la
     * lecture s'était arrêtée.
     *
     * Le navigateur sait faire le premier cas, mais il le fait avant que ce
     * script n'encadre les étapes — ce qui décale ensuite la cible. On s'en
     * charge donc nous-mêmes, une fois la page réarrangée, puis à nouveau
     * quand les images ont fini d'arriver.
     */
    function positionPage() {
        var touched = false;

        ['wheel', 'touchstart', 'keydown', 'mousedown'].forEach(function (name) {
            window.addEventListener(name, function () { touched = true; }, { once: true, passive: true });
        });

        function rejouer(placer) {
            placer();
            window.addEventListener('load', function () {
                if (!touched) { placer(); }
            });
        }

        // « #title.1 » ne vise que le sommet de la page : ce n'est pas une
        // demande d'aller à un endroit précis.
        var ancre = window.location.hash && window.location.hash !== '#title.1'
            ? document.getElementById(decodeURIComponent(window.location.hash.slice(1)))
            : null;

        if (ancre) {
            rejouer(function () { if (!touched) { scrollSansAnimation(offsetOf(ancre)); } });
            return;
        }

        if (window.location.hash) { return; }

        var stored = readingOf(window.location.pathname);
        if (!stored || stored < 0.05 || stored > 0.97) { return; }

        rejouer(function () {
            if (touched) { return; }

            var page = document.documentElement;
            var travel = page.scrollHeight - page.clientHeight;
            if (travel < 400) { return; }

            scrollSansAnimation(stored * travel);
        });

        announceResume();
    }

    function offsetOf(element) {
        var marge = parseFloat(window.getComputedStyle(document.documentElement).scrollPaddingTop) || 0;

        return element.getBoundingClientRect().top + window.scrollY - marge;
    }

    // Le saut doit être instantané, malgré le défilement doux global.
    function scrollSansAnimation(y) {
        var page = document.documentElement;
        var precedent = page.style.scrollBehavior;

        page.style.scrollBehavior = 'auto';
        window.scrollTo(0, Math.max(0, Math.round(y)));
        page.style.scrollBehavior = precedent;
    }

    function announceResume() {
        var toast = document.createElement('div');
        toast.className = 'readingToast';
        toast.setAttribute('role', 'status');
        toast.innerHTML = '<span>Reprise là où vous en étiez.</span>'
            + '<button type="button">Revenir en haut</button>';

        toast.querySelector('button').addEventListener('click', function () {
            window.scrollTo({ top: 0 });
            toast.remove();
        });

        document.body.appendChild(toast);

        setTimeout(function () { toast.classList.add('is-leaving'); }, 6000);
        setTimeout(function () { toast.remove(); }, 6500);
    }

    function paintBar(element, ratio) {
        var percent = Math.round(ratio * 100);

        element.hidden = false;
        element.textContent = percent + ' %';
        element.style.setProperty('--p', ratio);
        element.setAttribute('aria-label', 'Page lue à ' + percent + ' %');

        if (percent >= 100) {
            element.dataset.done = 'all';
        } else {
            delete element.dataset.done;
        }
    }

    function setupSteps() {
        var steps = Array.prototype.slice.call(document.querySelectorAll('.step'));
        if (!steps.length) { return; }

        var key = stepsKey(window.location.pathname);
        var saved = readSteps(window.location.pathname);
        var done = steps.map(function (_, index) {
            return saved && saved.done[index] ? 1 : 0;
        });

        // Les étapes sont numérotées par exercice : « .. step:: reset » ouvre
        // une nouvelle série.
        var series = [];
        var current = -1;

        steps.forEach(function (step, index) {
            if (step.dataset.params === 'reset' || current === -1) { current++; series[current] = []; }
            series[current].push(index);
        });

        var rank = {};
        series.forEach(function (group) {
            group.forEach(function (index, position) {
                rank[index] = (position + 1) + '/' + group.length;
            });
        });

        function save() {
            store.set(key, JSON.stringify({ total: steps.length, done: done }));
        }

        steps.forEach(function (step, index) {
            var container = document.createElement('div');
            container.className = 'stepContainer';

            var contents = document.createElement('div');
            contents.className = 'stepContents';

            step.parentNode.insertBefore(container, step);
            contents.appendChild(step);

            var checker = document.createElement('label');
            checker.className = 'stepChecker';
            checker.innerHTML = '<input type="checkbox" /><span>' + rank[index] + '</span>';

            container.appendChild(checker);
            container.appendChild(contents);

            var box = checker.querySelector('input');
            box.checked = Boolean(done[index]);
            contents.style.opacity = box.checked ? '.45' : '1';
            box.setAttribute('aria-label', 'Étape ' + rank[index] + ' faite');

            box.addEventListener('change', function () {
                done[index] = box.checked ? 1 : 0;
                contents.style.opacity = box.checked ? '.45' : '1';
                save();
            });
        });

        store.set(key, JSON.stringify({ total: steps.length, done: done }));
    }

    /**
     * Oublie tout ce qui suit la progression de l'étudiant : cases cochées,
     * position de lecture, dernière page ouverte. Les préférences d'affichage
     * et le groupe choisi ne sont pas concernés.
     */
    function forgetProgress() {
        try {
            var condamnees = [];

            for (var index = 0; index < localStorage.length; index++) {
                var key = localStorage.key(index);

                if (key && (key.indexOf('cours.etapes:') === 0 || key.indexOf('cours.lecture:') === 0)) {
                    condamnees.push(key);
                }
            }

            condamnees.forEach(function (key) { store.remove(key); });
        } catch (e) {}

        store.remove('cours.derniere');
    }

    /**
     * L'avancement de la page ouverte seulement.
     */
    function forgetPage() {
        var chemin = window.location.pathname;

        store.remove(stepsKey(chemin));
        store.remove(readingKey(chemin));

        try {
            var derniere = JSON.parse(store.get('cours.derniere') || 'null');

            if (derniere && chemin.lastIndexOf('/' + derniere.page) === chemin.length - derniere.page.length - 1) {
                store.remove('cours.derniere');
            }
        } catch (e) {}
    }

    /**
     * Un bouton d'effacement : premier clic pour armer, second pour agir.
     * L'opération ne se rattrape pas, elle mérite une confirmation.
     */
    function armForget(button, confirmation, oublier) {
        var libelle = button.textContent.trim();
        var armed = false;
        var timer = null;

        function disarm() {
            armed = false;
            delete button.dataset.confirm;
            button.textContent = libelle;
        }

        button.addEventListener('click', function () {
            if (!armed) {
                armed = true;
                button.dataset.confirm = 'true';
                button.textContent = confirmation;
                timer = setTimeout(disarm, 5000);
                return;
            }

            clearTimeout(timer);
            oublier();

            delete button.dataset.confirm;
            button.dataset.done = 'true';
            button.textContent = 'Avancement effacé';

            setTimeout(function () { window.location.reload(); }, 700);
        });
    }

    function setupForget() {
        var page = document.querySelector('.settingsAction[data-action="forget-page"]');
        var tout = document.querySelector('.settingsAction[data-action="forget-all"]');

        if (page) {
            // La page d'accueil n'a pas d'avancement à elle.
            if (document.body.classList.contains('landingPage')) {
                page.hidden = true;
            } else {
                armForget(page, 'Confirmer : effacer cette page', forgetPage);
            }
        }

        if (tout) {
            armForget(tout, 'Confirmer : tout effacer', forgetProgress);
        }
    }

    function paintProgress() {
        document.querySelectorAll('.navLink').forEach(function (link) {
            var badge = link.querySelector('.navProgress');
            if (!badge) { return; }

            var ratio = readingOf(link.getAttribute('href'));

            // Une page jamais ouverte n'a rien à montrer.
            if (!ratio) {
                badge.hidden = true;
                return;
            }

            paintBar(badge, ratio);
        });
    }

    // Sur l'accueil d'un groupe, les tuiles portent le numéro du chapitre
    // (les pages hors numérotation n'en ont pas) et, sur leur bord supérieur,
    // l'avancement de la lecture.
    function dressCards() {
        document.querySelectorAll('.toc > ul > li').forEach(function (card) {
            var link = card.querySelector('a');
            if (!link) { return; }

            var chapter = link.textContent.match(/Chapitre\s+(\d+)/i);
            if (chapter) { card.dataset.num = chapter[1].padStart(2, '0'); }

            var ratio = readingOf(link.getAttribute('href'));
            if (!ratio || card.querySelector('.cardProgress')) { return; }

            var percent = Math.round(ratio * 100);
            var bar = document.createElement('span');

            bar.className = 'cardProgress';
            bar.style.setProperty('--p', ratio);
            bar.setAttribute('role', 'progressbar');
            bar.setAttribute('aria-valuemin', '0');
            bar.setAttribute('aria-valuemax', '100');
            bar.setAttribute('aria-valuenow', String(percent));
            bar.setAttribute('aria-label', 'Chapitre lu à ' + percent + ' %');

            if (percent >= 100) { bar.dataset.done = 'all'; }

            card.insertBefore(bar, card.firstChild);
        });
    }

    /* ------------------------------------------- reprendre la lecture */

    function rememberPage() {
        var current = document.querySelector('.navItem.is-current');
        var title = document.querySelector('.contents h1');
        if (!current || !title || current.dataset.page === 'index.html') { return; }

        store.set('cours.derniere', JSON.stringify({
            page: current.dataset.page,
            title: title.textContent.trim()
        }));
    }

    function showResume() {
        var toc = document.querySelector('.is-home .toc');
        if (!toc) { return; }

        var raw = store.get('cours.derniere');
        if (!raw) { return; }

        try {
            var last = JSON.parse(raw);
            if (!last.page || !last.title) { return; }

            var card = document.createElement('p');
            card.className = 'resumeCard';
            card.innerHTML = '<span class="resumeHint">Reprendre&nbsp;:</span> '
                + '<a href="' + encodeURI(last.page) + '"></a>';
            card.querySelector('a').textContent = last.title;

            toc.parentNode.insertBefore(card, toc);
        } catch (e) {}
    }

    /* ----------------------------------------------------- copier le code */

    function setupCopyButtons() {
        if (!navigator.clipboard) { return; }

        document.querySelectorAll('.codeBlock').forEach(function (block) {
            var button = document.createElement('button');
            button.type = 'button';
            button.className = 'copyCode';
            button.textContent = 'copier';

            button.addEventListener('click', function () {
                navigator.clipboard.writeText(block.querySelector('code').textContent).then(function () {
                    button.textContent = 'copié';
                    setTimeout(function () { button.textContent = 'copier'; }, 1400);
                });
            });

            block.appendChild(button);
        });
    }

    /* --------------------------------------------------------- Slidey */

    // La projection ne montre que le cours. Les exercices restent dans la
    // page, mais ne deviennent pas des diapositives : on retire leur classe
    // avant que Slidey ne les recense, et on les masque pendant la
    // projection.
    //
    // Une section d'exercice s'étend souvent sur plusieurs « .. slide:: »
    // sans titre : on garde donc en mémoire le type de la dernière section
    // rencontrée. « .. slide:: cours » ou « .. slide:: exercice » permettent
    // de forcer le classement au cas par cas.
    var HORS_PROJECTION = ['sec-exercice', 'sec-facile', 'sec-moyen', 'sec-difficile', 'sec-sup'];

    function keepCourseSlidesOnly() {
        var exercice = false;

        document.querySelectorAll('.contents .slide').forEach(function (bloc) {
            var titre = bloc.querySelector('h2[class*="sec-"]');

            if (titre) {
                exercice = HORS_PROJECTION.some(function (type) { return titre.classList.contains(type); });
            }

            if (bloc.classList.contains('cours')) { exercice = false; }
            if (bloc.classList.contains('exercice')) { exercice = true; }

            if (exercice) {
                bloc.classList.remove('slide');
                bloc.classList.add('noSlide');
            }
        });

        // Une page sans diapositive de cours n'a pas à proposer la projection.
        var bouton = document.querySelector('.slideMode');

        if (bouton && document.querySelectorAll('.contents .slide').length < 2) {
            bouton.hidden = true;
        }
    }

    function bootSlidey() {
        if (typeof window.Slidey === 'undefined' || typeof window.jQuery === 'undefined') { return; }

        keepCourseSlidesOnly();

        var slidey = new window.Slidey();
        window.slidey = slidey;

        if (typeof window.SlideySpoilersExtension !== 'undefined') { new window.SlideySpoilersExtension(slidey); }
        if (typeof window.SlideyPermalinkExtension !== 'undefined') { new window.SlideyPermalinkExtension(slidey); }

        slidey.on('changeMode', function () {
            document.body.classList.toggle('slide-mode', slidey.slideMode);
        });

        var commands = { up: 'precSlide', down: 'nextSlide', left: 'precDiscover', right: 'nextDiscover' };

        Object.keys(commands).forEach(function (name) {
            var button = document.querySelector('.mobileControls .' + name);
            if (button) {
                button.addEventListener('click', function () { slidey[commands[name]](); });
            }
        });

        slidey.init();

        // Les numéros n'existent qu'une fois Slidey initialisé.
        window.jQuery(document).ready(dressSlideNumbers);

        // ?diapos ouvre directement le mode diapositives : pratique pour
        // enregistrer le lien de projection d'un chapitre.
        if (new URLSearchParams(window.location.search).has('diapos')) {
            window.jQuery(document).ready(function () { slidey.runSlideMode(); });
        }
    }

    // Le numéro de diapositive, dans la marge : un repère en lecture, un
    // raccourci vers la projection au clic. Slidey pose déjà le gestionnaire
    // de clic ; on ajoute le clavier et les libellés.
    function dressSlideNumbers() {
        var numeros = document.querySelectorAll('.slideNumber');
        var total = numeros.length;

        numeros.forEach(function (numero, rang) {
            var libelle = 'Projeter la diapositive ' + (rang + 1) + ' sur ' + total;

            numero.textContent = (rang + 1) + '/' + total;
            numero.title = libelle;
            numero.setAttribute('role', 'button');
            numero.setAttribute('aria-label', libelle);
            numero.setAttribute('tabindex', '0');

            numero.addEventListener('keydown', function (event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    numero.click();
                }
            });
        });
    }

    /* ------------------------------------------------- page d'accueil */

    // Le courant de mots derrière la page de choix. Les valeurs sont écrites
    // à la main plutôt que tirées au sort : une répartition choisie se lit
    // mieux qu'un semis aléatoire, et le rendu ne change pas d'une visite à
    // l'autre.
    var COURANT = [
        ['if', 1, 1.5, 58, 0], ['print()', 6, 1, 71, 33], ['for', 11, 2, 49, 22],
        ['range()', 3, .9, 66, 48], ['else', 17, 1.35, 77, 11], ['int', 9, 1.7, 54, 60],
        ['while', 22, 1.1, 62, 40], ['#', 14, 2.2, 46, 26], ['len()', 26, .95, 69, 5],
        ['bool', 20, 1.25, 55, 51], ['import', 30, 1.05, 74, 17], ['float', 34, 1.4, 61, 38],
        ['==', 38, 1.8, 47, 8], ['break', 42, .95, 78, 57], ['list', 46, 1.15, 63, 24],
        ['%', 50, 2.1, 52, 45], ['dict', 54, .9, 72, 13], ['!=', 58, 1.55, 59, 35],
        ['type()', 62, 1, 76, 2], ['//', 66, 1.9, 50, 54], ['def', 71, 1.25, 73, 7],
        ['str', 77, .95, 57, 35], ['>>>', 83, 1.6, 68, 18], ['True', 89, 1.05, 51, 44],
        ['input()', 94, .9, 80, 15], ['+=', 80, 1.45, 60, 52], ['return', 87, .95, 75, 63],
        ['elif', 74, 1.3, 64, 29], ['numpy', 97, 1.2, 67, 41], ['False', 68, 1.05, 56, 20]
    ];

    function setupCodeField() {
        var champ = document.querySelector('.codeField');
        if (!champ || window.matchMedia('(prefers-reduced-motion: reduce)').matches) { return; }

        COURANT.forEach(function (mot) {
            var jeton = document.createElement('span');

            jeton.className = 'codeToken';
            jeton.textContent = mot[0];
            jeton.style.left = mot[1] + '%';
            jeton.style.fontSize = mot[2] + 'rem';
            jeton.style.animationDuration = mot[3] + 's';
            jeton.style.animationDelay = '-' + mot[4] + 's';

            champ.appendChild(jeton);
        });
    }

    // La page d'accueil se joue comme une vraie session Python : la question
    // se tape, puis les réponses arrivent.
    function playPrompt() {
        var bloc = document.querySelector('.prompt');
        var ligne = bloc && bloc.querySelector('.promptLine code');
        if (!ligne) { return; }

        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            bloc.classList.add('is-ready');
            return;
        }

        var texte = ligne.textContent;
        var phrase = bloc.querySelector('.promptLine');

        // La hauteur est figée avant de vider : sinon la ligne se replie et
        // tout le bloc sursaute en cours de frappe.
        phrase.style.minHeight = phrase.getBoundingClientRect().height + 'px';
        ligne.setAttribute('aria-label', texte);
        ligne.textContent = '';
        bloc.classList.add('is-typing');

        var rang = 0;

        (function frappe() {
            ligne.textContent = texte.slice(0, ++rang);

            if (rang < texte.length) {
                setTimeout(frappe, 18);
                return;
            }

            bloc.classList.remove('is-typing');
            bloc.classList.add('is-ready');
            phrase.style.minHeight = '';
        })();
    }

    function setupLanding() {
        var resume = document.querySelector('.chooserResume');
        if (!resume) { return; }

        var group = store.get('cours.groupe');
        var choice = group && document.querySelector('.choice[data-group="' + group + '"]');
        if (!choice) { return; }

        var link = resume.querySelector('.resumeLink');
        link.href = choice.getAttribute('href');
        link.textContent = 'Reprendre le cours du groupe ' + group;
        resume.hidden = false;
    }

    /* ---------------------------------------- rechargement en local */

    function setupLiveReload() {
        var local = ['localhost', '127.0.0.1', '[::1]'].indexOf(window.location.hostname) !== -1;
        if (!local) { return; }

        var known = null;

        setInterval(function () {
            fetch('/.build-id', { cache: 'no-store' }).then(function (response) {
                return response.ok ? response.text() : null;
            }).then(function (id) {
                if (!id) { return; }
                if (known !== null && id !== known) { window.location.reload(); }
                known = id;
            }).catch(function () {});
        }, 1000);
    }

    /* ------------------------------------------------------------ départ */

    setupSettings();
    setupForget();
    setupMenus();
    typeSections();
    markSymbolItems();
    setupNav();
    setupSearch();
    setupNavScroll();
    setupSteps();
    setupOutline();
    setupCopyButtons();
    paintProgress();
    setupReading();
    positionPage();
    dressCards();
    rememberPage();
    showResume();
    setupLanding();
    playPrompt();
    setupCodeField();
    setupLiveReload();
    bootSlidey();

    if (typeof window.hljs !== 'undefined') { window.hljs.highlightAll(); }
})();
