<?php
include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ini.php');

$page_url        = '/irc/';
$canonique       = LANG === 'en' ? '/irc/?lang=en' : '/irc/';
$titre_page      = 'Dogmazic — ' . strip_tags(trans_r('irc_titre'));
?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
    <head>
        <title><?= htmlspecialchars($titre_page) ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php trans('irc_description'); ?>">
        <link rel="shortcut icon" href="//play.dogmazic.net/favicon_dogmazic.ico">
        <link rel="stylesheet" href="<?= CSS_PATH . '/dogmazic.css' ?>" type="text/css">
        <link rel="canonical" href="<?= SITE_URL . $canonique ?>">
        <link rel="alternate" hreflang="fr" href="<?= SITE_URL . $page_url ?>">
        <link rel="alternate" hreflang="en" href="<?= SITE_URL . $page_url ?>?lang=en">
        <link rel="alternate" hreflang="x-default" href="<?= SITE_URL . $page_url ?>">

        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Dogmazic">
        <meta property="og:locale" content="<?= LANG === 'fr' ? 'fr_FR' : 'en_GB' ?>">
        <meta property="og:url" content="<?= SITE_URL . $canonique ?>">
        <meta property="og:title" content="<?= htmlspecialchars($titre_page) ?>">
        <meta property="og:description" content="<?php trans('irc_description'); ?>">
        <meta property="og:image" content="<?= SITE_URL . IMG_PATH ?>/og-dogmazic.png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:image:alt" content="<?php trans('og_image_alt'); ?>">
        <meta name="twitter:card" content="summary_large_image">
    </head>

    <body>

        <?php
        $topbar_ici   = 'irc';
$topbar_stats = false;
include(HOME_PATH . DS . 'topbar.php');
?>

        <main>

            <section id="irc-tete">
                <div class="wrap">
                    <span class="eyebrow"><?php trans('irc_surtitre'); ?></span>
                    <h1><?php trans('irc_titre'); ?></h1>
                    <p class="chapeau"><?php trans('irc_chapeau'); ?></p>
                </div>
            </section>

            <section id="irc-acces">
                <div class="wrap">
                    <div class="trois irc-deux">

                        <div class="carte">
                            <span class="num"><?php trans('irc_1_num'); ?></span>
                            <h3><?php trans('irc_1_titre'); ?></h3>
                            <p><?php trans('irc_1_texte'); ?></p>
                            <button type="button" class="btn plein" id="ouvrir_chat">
                                <?php trans('irc_ouvrir'); ?>
                            </button>
                        </div>

                        <div class="carte">
                            <span class="num"><?php trans('irc_2_num'); ?></span>
                            <h3><?php trans('irc_2_titre'); ?></h3>
                            <p><?php trans('irc_2_texte'); ?></p>
                            <dl class="coordonnees">
                                <dt><?php trans('irc_serveur'); ?></dt><dd><code>irc.libera.chat</code></dd>
                                <dt><?php trans('irc_port'); ?></dt><dd><code>6697</code> (TLS)</dd>
                                <dt><?php trans('irc_salon'); ?></dt><dd><code>#dogmazic</code></dd>
                            </dl>
                        </div>

                    </div>

                    <!-- Le chat n'est charge qu'au clic : aucune connexion vers un
                         service tiers tant que le visiteur ne l'a pas demande. -->
                    <div id="chat_zone" hidden>
                        <div class="chat-cadre">
                            <p class="chat-attente"><?php trans('irc_chargement'); ?></p>
                        </div>
                        <p class="chat-note"><?php trans('irc_tiers'); ?></p>
                    </div>

                    <p class="irc-patience"><?php trans('irc_patience'); ?></p>
                </div>
            </section>

        </main>

        <footer>
            <div class="wrap">
                <?php include(HOME_PATH . DS . 'mentions.php'); ?>
            </div>
        </footer>

        <script>
        /* Chargement du webchat a la demande : tant que le bouton n'est pas
           clique, kiwiirc.com ne recoit aucune requete du visiteur. */
        (function () {
            var bouton = document.getElementById('ouvrir_chat');
            var zone   = document.getElementById('chat_zone');
            if (!bouton || !zone) {
                return;
            }

            bouton.addEventListener('click', function () {
                if (zone.dataset.charge) {
                    zone.scrollIntoView({ behavior: 'smooth', block: 'start' });

                    return;
                }
                zone.dataset.charge = '1';
                zone.hidden = false;

                var conteneur = zone.querySelector('.chat-cadre');
                var cadre     = document.createElement('iframe');
                cadre.src   = 'https://kiwiirc.com/client/irc.libera.chat:+6697/#dogmazic';
                cadre.title = <?= json_encode(trans_r('irc_cadre_titre')) ?>;

                cadre.addEventListener('load', function () {
                    var attente = conteneur.querySelector('.chat-attente');
                    if (attente) {
                        attente.remove();
                    }
                });
                conteneur.appendChild(cadre);

                bouton.textContent = <?= json_encode(trans_r('irc_ouvert')) ?>;
                zone.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        })();
        </script>

        <?php include(HOME_PATH . DS . 'matomo.php'); ?>

    </body>
</html>
