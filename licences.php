<?php
include('ini.php');
include(HOME_PATH . DS . 'licences-data.php');

/* mbstring n'est pas garanti sur tous les hebergements (cf. accueil.php). */
function minuscules($t)
{
    return function_exists('mb_strtolower') ? mb_strtolower($t, 'UTF-8') : strtolower($t);
}

/* Libelle et classe CSS d'un code de droit. */
function droit_libelle($code)
{
    $t = [
        'O' => ['oui',      trans_r('droit_oui')],
        'K' => ['oui',      trans_r('droit_copyleft')],
        'R' => ['oui',      trans_r('droit_copyfarleft')],
        'N' => ['non',      trans_r('droit_non')],
        'A' => ['accord',   trans_r('droit_accord')],
        'C' => ['accord',   trans_r('droit_conditions')],
        '?' => ['inconnu',  trans_r('droit_inconnu')],
    ];

    return isset($t[$code]) ? $t[$code] : $t['?'];
}
?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
    <head>
        <title>Dogmazic — <?php trans('licences_page_titre'); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php trans('licences_page_desc'); ?>">
        <link rel="shortcut icon" href="//play.dogmazic.net/favicon_dogmazic.ico">
        <link rel="stylesheet" href="<?= CSS_PATH . '/dogmazic.css' ?>" type="text/css">
        <link rel="stylesheet" href="<?= CSS_PATH . '/licences.css' ?>" type="text/css">
    </head>

    <body>

        <div class="topbar">
            <div class="wrap">
                <a class="marque" href="./" title="Dogmazic">DOGMA<span>ZIC</span></a>
                <nav class="galaxie-liens">
                    <a href="./"><?php trans('nav_accueil'); ?></a>
                    <a href="https://play.dogmazic.net" target="_blank" rel="noopener"><?php trans('nav_archive'); ?></a>
                    <a href="https://radio.dogmazic.net" target="_blank" rel="noopener"><?php trans('nav_radio'); ?></a>
                    <a href="https://www.musique-libre.org" target="_blank" rel="noopener"><?php trans('nav_asso'); ?></a>
                </nav>
                <div class="langues" style="margin-left:auto">
                    <a href="?lang=fr" class="<?= LANG === 'fr' ? 'ici' : '' ?>" lang="fr">FR</a>
                    <a href="?lang=en" class="<?= LANG === 'en' ? 'ici' : '' ?>" lang="en">EN</a>
                </div>
                <a class="connexion" href="//play.dogmazic.net/login.php" target="_blank" rel="noopener"><?php trans('Connexion'); ?></a>
            </div>
        </div>

        <main>
            <section id="lic-tete">
                <div class="wrap">
                    <span class="eyebrow"><?php trans('licences_surtitre'); ?></span>
                    <h1><?php trans('licences_page_titre'); ?></h1>
                    <p class="chapeau"><?php trans('licences_page_intro'); ?></p>
                </div>
            </section>

            <section id="lic-filtres">
                <div class="wrap">

                    <div class="lic-recherche">
                        <label for="q" class="invisible"><?php trans('licences_chercher'); ?></label>
                        <input type="search" id="q" placeholder="<?php trans('licences_chercher'); ?>"
                               autocomplete="off">
                    </div>

                    <p class="lic-question"><?php trans('licences_question'); ?></p>
                    <div class="lic-besoins">
                        <button type="button" data-besoin="usage_com"><?php trans('besoin_commercial'); ?></button>
                        <button type="button" data-besoin="mod_com"><?php trans('besoin_remix'); ?></button>
                        <button type="button" data-besoin="dist_privee"><?php trans('besoin_partage'); ?></button>
                        <button type="button" data-besoin="libre"><?php trans('besoin_libre'); ?></button>
                        <button type="button" data-obsoletes="1" class="actif"><?php trans('besoin_obsoletes'); ?></button>
                    </div>

                    <p class="lic-compte" id="compte" aria-live="polite"></p>
                </div>
            </section>

            <section id="lic-tableau">
                <div class="wrap">
                    <div class="lic-defile">
                        <table>
                            <caption class="invisible"><?php trans('licences_page_titre'); ?></caption>
                            <thead>
                                <tr>
                                    <th scope="col" class="col-nom"><?php trans('licences_colonne_nom'); ?></th>
                                    <?php foreach ($licences_colonnes as $cle => $lib): ?>
                                        <th scope="col" class="col-<?= $cle ?>"><?= htmlspecialchars($lib[LANG]) ?></th>
                                    <?php endforeach; ?>
                                    <th scope="col"><?php trans('licences_colonne_texte'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($licences as $l): ?>
                                    <tr data-nom="<?= htmlspecialchars(minuscules($l['nom'])) ?>"
                                        data-obsolete="<?= $l['obsolete'] ? '1' : '0' ?>"
                                        <?php foreach ($l['droits'] as $cle => $code): ?>
                                            data-<?= $cle ?>="<?= $code ?>"
                                        <?php endforeach; ?>>

                                        <th scope="row" class="col-nom">
                                            <?= htmlspecialchars($l['nom']) ?>
                                            <?php if ($l['obsolete']): ?>
                                                <span class="obsolete" title="<?php trans('licences_obsolete_info'); ?>"><?php trans('licences_obsolete'); ?></span>
                                            <?php endif; ?>
                                        </th>

                                        <?php foreach ($l['droits'] as $cle => $code): ?>
                                            <?php list($classe, $texte) = droit_libelle($code); ?>
                                            <td class="d-<?= $classe ?>" data-col="<?= htmlspecialchars($licences_colonnes[$cle][LANG]) ?>">
                                                <span><?= htmlspecialchars($texte) ?></span>
                                            </td>
                                        <?php endforeach; ?>

                                        <td class="col-texte">
                                            <?php if ($l['lien']): ?>
                                                <a href="<?= htmlspecialchars($l['lien']) ?>" target="_blank" rel="noopener"><?php trans('licences_lire'); ?></a>
                                            <?php endif; ?>
                                            <?php foreach ($l['trads'] as $code => $url): ?>
                                                <a class="trad" href="<?= htmlspecialchars($url) ?>" target="_blank" rel="noopener"><?= strtoupper($code) ?></a>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <p class="lic-vide" id="vide" hidden><?php trans('licences_aucune'); ?></p>
                </div>
            </section>

            <section id="lic-notes">
                <div class="wrap">
                    <div class="lic-legende">
                        <h2><?php trans('licences_legende'); ?></h2>
                        <ul>
                            <li><span class="pastille d-oui"></span><?php trans('legende_oui'); ?></li>
                            <li><span class="pastille d-accord"></span><?php trans('legende_accord'); ?></li>
                            <li><span class="pastille d-non"></span><?php trans('legende_non'); ?></li>
                        </ul>
                        <p class="note"><?php trans('licences_note_versions'); ?></p>
                        <p class="note"><?php trans('licences_note_obsoletes'); ?></p>
                        <p class="note"><?php trans('licences_note_source'); ?></p>
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <div class="wrap">
                <div class="legal">
                    <p><?php trans('legal'); ?> <?php trans('mention_cookie'); ?></p>
                    <p class="mentions">
                        <?php trans('mentions_editeur'); ?><br>
                        <?php trans('mentions_hebergeur'); ?>
                    </p>
                </div>
            </div>
        </footer>

        <script>
        /* Filtrage cote client : tout le tableau est deja dans la page, il n'y
           a donc aucun aller-retour serveur et la page marche sans JS (les
           filtres disparaissent, le tableau reste entierement lisible). */
        (function () {
            var lignes  = Array.prototype.slice.call(document.querySelectorAll('tbody tr'));
            var q       = document.getElementById('q');
            var compte  = document.getElementById('compte');
            var vide    = document.getElementById('vide');
            var besoins = Array.prototype.slice.call(document.querySelectorAll('[data-besoin]'));
            var btnObs  = document.querySelector('[data-obsoletes]');
            var actifs  = [];
            var voirObsoletes = true;

            var GABARIT = <?= json_encode(trans_r('licences_compte')) ?>;

            function filtre() {
                var texte = q.value.trim().toLowerCase();
                var n = 0;

                lignes.forEach(function (tr) {
                    var ok = true;

                    if (texte && tr.dataset.nom.indexOf(texte) === -1) {
                        ok = false;
                    }
                    if (ok && !voirObsoletes && tr.dataset.obsolete === '1') {
                        ok = false;
                    }
                    // Un besoin est satisfait si le droit vaut oui (O, K ou R).
                    if (ok) {
                        ok = actifs.every(function (cle) {
                            return 'OKR'.indexOf(tr.dataset[cle]) !== -1;
                        });
                    }

                    tr.hidden = !ok;
                    if (ok) { n++; }
                });

                compte.textContent = GABARIT.replace('{n}', n).replace('{total}', lignes.length);
                vide.hidden = (n > 0);
            }

            besoins.forEach(function (b) {
                b.addEventListener('click', function () {
                    var cle = b.dataset.besoin;
                    var i = actifs.indexOf(cle);
                    if (i === -1) { actifs.push(cle); } else { actifs.splice(i, 1); }
                    b.classList.toggle('actif');
                    b.setAttribute('aria-pressed', i === -1 ? 'true' : 'false');
                    filtre();
                });
            });

            btnObs.addEventListener('click', function () {
                voirObsoletes = !voirObsoletes;
                btnObs.classList.toggle('actif', voirObsoletes);
                btnObs.setAttribute('aria-pressed', voirObsoletes ? 'true' : 'false');
                filtre();
            });

            q.addEventListener('input', filtre);
            filtre();
        })();
        </script>
    </body>
</html>
