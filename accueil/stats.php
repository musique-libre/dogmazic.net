<?php

/*
 * Statistiques dynamiques de l'archive Dogmazic.
 *
 * Lit directement la base MySQL d'Ampache (le site tourne sur le meme serveur)
 * et met le resultat en cache dans un fichier JSON, sur le meme principe que
 * get_rss_with_cache() dans accueil.php.
 *
 * Les identifiants de connexion sont lus depuis config.php (hors depot,
 * voir config.php.dist). Si la config est absente ou la base injoignable,
 * on n'affiche simplement rien : la page d'accueil doit continuer a marcher.
 */

// Duree du cache, en minutes.
define('STATS_CACHE_TIME', 60);

// Dossier du cache (pense a l'ajouter au .gitignore si tu le mets ailleurs).
define('STATS_CACHE_DIR', '/tmp/www-dogmazic-net-cache-stats/');

// Date d'ouverture de l'archive, sert a calculer "depuis X jours".
define('STATS_START_DATE', '2004-06-10');

// Le comptage des telechargements fait un COUNT() sur object_count, qui est
// une grosse table. C'est mis en cache 1h, mais si ca pese trop sur le serveur
// tu peux passer ca a false : seules les ecoutes seront comptees.
define('STATS_COUNT_DOWNLOADS', true);

/*
 * Familles de licences.
 *
 * Les noms de licences en base sont heterogenes ("Creative Commons - by-nc-sa 2.0",
 * "Creative Commons - by-nc-sa 3.0", ...) : on les regroupe pour avoir un
 * graphe lisible. L'ORDRE COMPTE : la premiere regex qui matche gagne, donc les
 * regles les plus specifiques (by-nc-nd) doivent passer avant les plus larges (by).
 */
function stats_licence_families()
{
    return [
        [
            'key' => 'cc_by_nc_nd',
            'label' => ['fr' => 'CC BY-NC-ND', 'en' => 'CC BY-NC-ND'],
            'regex' => '~\bby[\s_-]*nc[\s_-]*nd\b~i',
        ],
        [
            'key' => 'cc_by_nc_sa',
            'label' => ['fr' => 'CC BY-NC-SA', 'en' => 'CC BY-NC-SA'],
            'regex' => '~\bby[\s_-]*nc[\s_-]*sa\b~i',
        ],
        [
            'key' => 'cc_by_nc',
            'label' => ['fr' => 'CC BY-NC', 'en' => 'CC BY-NC'],
            'regex' => '~\bby[\s_-]*nc\b~i',
        ],
        [
            'key' => 'cc_by_nd',
            'label' => ['fr' => 'CC BY-ND', 'en' => 'CC BY-ND'],
            'regex' => '~\bby[\s_-]*nd\b~i',
        ],
        [
            'key' => 'cc_by_sa',
            'label' => ['fr' => 'CC BY-SA', 'en' => 'CC BY-SA'],
            'regex' => '~\bby[\s_-]*sa\b~i',
        ],
        [
            'key' => 'cc_by',
            'label' => ['fr' => 'CC BY', 'en' => 'CC BY'],
            'regex' => '~\bby\b~i',
        ],
        [
            'key' => 'cc0',
            'label' => ['fr' => 'Domaine public / CC0', 'en' => 'Public domain / CC0'],
            'regex' => '~(creative commons 0|\bcc0\b|public ?domain|domaine public)~i',
        ],
        [
            'key' => 'lal',
            'label' => ['fr' => 'Licence Art Libre', 'en' => 'Free Art License'],
            'regex' => '~(art ?libre|\blal\b)~i',
        ],
        [
            'key' => 'gnu',
            'label' => ['fr' => 'GNU GPL / GNU Art', 'en' => 'GNU GPL / GNU Art'],
            'regex' => '~(\bgnu\b|\bgpl\b)~i',
        ],
        [
            'key' => 'wtfpl',
            'label' => ['fr' => 'WTFPL', 'en' => 'WTFPL'],
            'regex' => '~wtfpl~i',
        ],
        [
            'key' => 'openmusic',
            'label' => ['fr' => 'Open Music', 'en' => 'Open Music'],
            'regex' => '~open ?(source )?music~i',
        ],
    ];
}

/* Licences a ne plus afficher : marquees "NE PAS UTILISER" / "DON'T USE" en base. */
function stats_licence_est_obsolete($name)
{
    return (bool) preg_match("~(ne pas utiliser|do ?n'?t use|do not use|deprecated|obsol)~i", $name);
}

/* Retourne la cle de famille d'une licence, ou 'autres'. */
function stats_licence_famille($name)
{
    foreach (stats_licence_families() as $family) {
        if (preg_match($family['regex'], $name)) {
            return $family['key'];
        }
    }

    return 'autres';
}

/*
 * Interroge la base. Retourne un tableau de donnees, ou null si ca a rate
 * (config absente, base injoignable, requete en erreur...).
 */
function stats_query()
{
    if (!defined('DB_HOST') || !defined('DB_NAME') || !defined('DB_USER')) {
        return null; // pas de config.php : on ne fait rien
    }

    try {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
            DB_USER,
            defined('DB_PASS') ? DB_PASS : '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_TIMEOUT => 3,
            ]
        );
    } catch (Exception $e) {
        return null;
    }

    try {
        // --- Volume du catalogue
        $row = $pdo->query(
            'SELECT COUNT(*) AS morceaux,
                    COALESCE(SUM(`time`), 0) AS secondes,
                    COUNT(DISTINCT artist) AS artistes,
                    COALESCE(SUM(total_count), 0) AS ecoutes
             FROM song
             WHERE enabled = 1'
        )->fetch();

        $data = [
            'morceaux' => (int) $row['morceaux'],
            'heures' => (int) round($row['secondes'] / 3600),
            'artistes' => (int) $row['artistes'],
            'ecoutes' => (int) $row['ecoutes'],
        ];

        // --- Labels
        $data['labels'] = (int) $pdo->query('SELECT COUNT(*) AS nb FROM label')->fetch()['nb'];

        // --- Telechargements (optionnel, cf. STATS_COUNT_DOWNLOADS)
        $data['telechargements'] = 0;
        if (STATS_COUNT_DOWNLOADS) {
            $data['telechargements'] = (int) $pdo->query(
                "SELECT COUNT(*) AS nb
                 FROM object_count
                 WHERE object_type = 'song' AND count_type = 'download'"
            )->fetch()['nb'];
        }

        // --- Repartition par licence
        $rows = $pdo->query(
            'SELECT s.license AS id,
                    COALESCE(l.name, "") AS name,
                    COALESCE(l.external_link, "") AS link,
                    COUNT(*) AS nb
             FROM song s
             LEFT JOIN license l ON l.id = s.license
             WHERE s.enabled = 1
             GROUP BY s.license, l.name, l.external_link'
        )->fetchAll();
    } catch (Exception $e) {
        return null;
    }

    $familles     = [];
    $nb_masques   = 0;
    $nb_utilisees = 0;

    foreach ($rows as $r) {
        $nb   = (int) $r['nb'];
        $name = trim($r['name']);

        if ($nb === 0) {
            continue;
        }
        if ($name === '' || $r['id'] === null) {
            continue; // morceaux sans licence renseignee : on ne les classe pas
        }
        if (stats_licence_est_obsolete($name)) {
            $nb_masques += $nb;
            continue;
        }

        $nb_utilisees++;
        $key = stats_licence_famille($name);

        if (!isset($familles[$key])) {
            $familles[$key] = ['nb' => 0, 'ids' => [], 'noms' => []];
        }
        $familles[$key]['nb'] += $nb;
        $familles[$key]['ids'][]  = (int) $r['id'];
        $familles[$key]['noms'][] = $name;
    }

    // Tri decroissant sur le nombre de morceaux
    uasort($familles, function ($a, $b) {
        return $b['nb'] <=> $a['nb'];
    });

    $data['licences']          = $familles;
    $data['licences_nb']       = $nb_utilisees;
    $data['licences_masquees'] = $nb_masques;
    $data['date']              = time();

    return $data;
}

/*
 * Recupere les stats, via le cache si il est assez jeune.
 * Si la base repond pas, on sert le cache meme perime plutot que rien.
 */
function stats_get()
{
    $cache_file = STATS_CACHE_DIR . 'stats.json';
    $timedif    = @(time() - filemtime($cache_file));

    if (file_exists($cache_file) && $timedif < STATS_CACHE_TIME * 60) {
        $data = json_decode(file_get_contents($cache_file), true);
        if (is_array($data)) {
            return $data;
        }
    }

    $data = stats_query();

    if ($data === null) {
        // Base injoignable : on retombe sur le cache perime si on en a un.
        if (file_exists($cache_file)) {
            $data = json_decode(file_get_contents($cache_file), true);

            return is_array($data) ? $data : null;
        }

        return null;
    }

    if (!is_dir(STATS_CACHE_DIR)) {
        mkdir(STATS_CACHE_DIR, 0700, true);
    }
    file_put_contents($cache_file, json_encode($data));

    return $data;
}

/* Formatage des nombres selon la langue (12 345 en fr, 12,345 en en). */
function stats_nombre($n)
{
    if (LANG === 'fr') {
        return number_format($n, 0, ',', "\xE2\x80\xAF"); // espace fine insecable
    }

    return number_format($n, 0, '.', ',');
}

/*
 * Construit l'URL de recherche Ampache pour une famille de licences.
 * Une regle par licence, avec operator=or quand il y en a plusieurs.
 */
function stats_search_url(array $ids)
{
    $params = [
        'type' => 'song',
        'action' => 'search',
        'operator' => count($ids) > 1 ? 'or' : 'and',
    ];

    $i = 0;
    foreach ($ids as $id) {
        $i++;
        $params['rule_' . $i]               = 'license';
        $params['rule_' . $i . '_operator'] = 0;
        $params['rule_' . $i . '_input']    = $id;
    }

    return 'https://play.dogmazic.net/search.php?' . http_build_query($params);
}

/*
 * Liste des variantes du bandeau du haut de page.
 * Chaque entree est une cle de traduction (voir accueil/texte.php).
 * Pour en ajouter une : ajouter la cle ici + les textes fr/en dans texte.php.
 */
function stats_bandeau_variantes()
{
    return [
        'stats_bandeau_chiffres',
        'stats_bandeau_icones',
        'stats_bandeau_phrase',
        'stats_bandeau_depuis',
        'stats_bandeau_nonstop',
        'stats_bandeau_licence',
        'stats_bandeau_ecoutes',
    ];
}

/*
 * Bandeau court affiche en haut de page, dans la barre de navigation.
 * Une variante differente est tiree au sort a chaque chargement.
 * Pour en forcer une pendant les tests : ?bandeau=2 (index dans la liste).
 */
function statsBandeau()
{
    $s = stats_get();
    if ($s === null || empty($s['morceaux'])) {
        return;
    }

    $variantes = stats_bandeau_variantes();

    if (isset($_GET['bandeau']) && isset($variantes[(int) $_GET['bandeau']])) {
        $cle = $variantes[(int) $_GET['bandeau']];
    } else {
        $cle = $variantes[array_rand($variantes)];
    }

    // Une famille de licence au hasard, pour la variante 'licence'
    $licence_nom = '';
    $licence_nb  = 0;
    if (!empty($s['licences'])) {
        $keys   = array_keys($s['licences']);
        $key    = $keys[array_rand($keys)];
        $labels = [];
        foreach (stats_licence_families() as $f) {
            $labels[$f['key']] = $f['label'][LANG];
        }
        $licence_nom = isset($labels[$key]) ? $labels[$key] : trans_r('stats_autres');
        $licence_nb  = $s['licences'][$key]['nb'];
    }

    $texte = strtr(trans_r($cle), [
        '{heures}' => '<b>' . stats_nombre($s['heures']) . '</b>',
        '{morceaux}' => '<b>' . stats_nombre($s['morceaux']) . '</b>',
        '{artistes}' => '<b>' . stats_nombre($s['artistes']) . '</b>',
        '{labels}' => '<b>' . stats_nombre($s['labels']) . '</b>',
        '{licences}' => '<b>' . stats_nombre($s['licences_nb']) . '</b>',
        '{ecoutes}' => '<b>' . stats_nombre($s['ecoutes'] + $s['telechargements']) . '</b>',
        '{jours_nonstop}' => '<b>' . stats_nombre((int) round($s['heures'] / 24)) . '</b>',
        '{annee}' => '<b>' . date('Y', strtotime(STATS_START_DATE)) . '</b>',
        '{licence_nom}' => '<b>' . htmlspecialchars($licence_nom) . '</b>',
        '{licence_nb}' => '<b>' . stats_nombre($licence_nb) . '</b>',
    ]);

    echo '<a id="stats_bandeau" href="#stats" title="' . htmlspecialchars(strip_tags(trans_r('stats_titre'))) . '">' . $texte . '</a>';
}

/* Affiche le bloc complet : phrase + barres par licence. */
function statsBlock()
{
    $s = stats_get();
    if ($s === null || empty($s['morceaux'])) {
        return; // pas de donnees : on n'affiche rien du tout
    }

    $jours = (int) floor((time() - strtotime(STATS_START_DATE)) / 86400);

    $phrase = strtr(trans_r('stats_phrase'), [
        '{heures}' => '<strong>' . stats_nombre($s['heures']) . '</strong>',
        '{morceaux}' => '<strong>' . stats_nombre($s['morceaux']) . '</strong>',
        '{artistes}' => '<strong>' . stats_nombre($s['artistes']) . '</strong>',
        '{labels}' => '<strong>' . stats_nombre($s['labels']) . '</strong>',
        '{licences}' => '<strong>' . stats_nombre($s['licences_nb']) . '</strong>',
        '{ecoutes}' => '<strong>' . stats_nombre($s['ecoutes'] + $s['telechargements']) . '</strong>',
        '{jours}' => '<strong>' . stats_nombre($jours) . '</strong>',
    ]);

    $familles = isset($s['licences']) ? $s['licences'] : [];
    $labels   = [];
    foreach (stats_licence_families() as $f) {
        $labels[$f['key']] = $f['label'][LANG];
    }
    $labels['autres'] = trans_r('stats_autres');

    $max   = 0;
    $total = 0;
    foreach ($familles as $f) {
        $max = max($max, $f['nb']);
        $total += $f['nb'];
    }
    ?>

    <section id="stats">
        <h2><?php trans('stats_titre'); ?></h2>

        <p id="stats_phrase"><?= $phrase ?></p>

        <?php if ($familles && $max > 0): ?>
            <h3><?php trans('stats_licences_titre'); ?></h3>
            <ul id="stats_licences">
                <?php foreach ($familles as $key => $f): ?>
                    <?php
                    $label   = isset($labels[$key]) ? $labels[$key] : $key;
                    $largeur = round($f['nb'] * 100 / $max, 1);
                    $part    = $total ? round($f['nb'] * 100 / $total, 1) : 0;
                    $titre   = implode(', ', $f['noms']);
                    ?>
                    <li class="stats_licence">
                        <a href="<?= htmlspecialchars(stats_search_url($f['ids'])) ?>"
                           target="_blank"
                           title="<?= htmlspecialchars($titre) ?>">
                            <span class="stats_nom"><?= htmlspecialchars($label) ?></span>
                            <span class="stats_barre">
                                <span class="stats_barre_pleine" style="width: <?= $largeur ?>%"></span>
                            </span>
                            <span class="stats_valeur"><?= stats_nombre($f['nb']) ?> (<?= $part ?>%)</span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <p class="stats_note"><?php trans('stats_licences_note'); ?></p>
        <?php endif; ?>
    </section>
    <?php
}
