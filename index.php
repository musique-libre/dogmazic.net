<?php
include('ini.php');

// Adresses utilisees par le lien canonique et les balises de partage.
$page_url       = '/';
$canonique      = LANG === 'en' ? '/?lang=en' : '/';
$titre_page     = 'Dogmazic — ' . strip_tags(trans_r('titre_page'));
$cle_description = 'meta_description';
?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
    <head>
        <title>Dogmazic — <?php trans('titre_page'); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php trans('meta_description'); ?>">
        <link rel="shortcut icon" href="//play.dogmazic.net/favicon_dogmazic.ico">
        <link rel="stylesheet" href="<?= CSS_PATH . '/dogmazic.css' ?>" type="text/css">
        <link rel="canonical" href="<?= SITE_URL . $canonique ?>">
        <link rel="alternate" hreflang="fr" href="<?= SITE_URL . $page_url ?>">
        <link rel="alternate" hreflang="en" href="<?= SITE_URL . $page_url ?>?lang=en">
        <link rel="alternate" hreflang="x-default" href="<?= SITE_URL . $page_url ?>">

        <!-- Partage sur Bluesky, Mastodon, Signal, Discord... -->
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Dogmazic">
        <meta property="og:locale" content="<?= LANG === 'fr' ? 'fr_FR' : 'en_GB' ?>">
        <meta property="og:url" content="<?= SITE_URL . $canonique ?>">
        <meta property="og:title" content="<?= htmlspecialchars($titre_page) ?>">
        <meta property="og:description" content="<?php trans($cle_description); ?>">
        <meta property="og:image" content="<?= SITE_URL ?>/<?= IMG_PATH ?>/og-dogmazic.png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:image:alt" content="<?php trans('og_image_alt'); ?>">
        <meta name="twitter:card" content="summary_large_image">
        <script src="<?= JS_PATH . '/jquery.min.js' ?>"></script>
        <script src="<?= JS_PATH . '/apps_mobiles_popup.js' ?>" defer></script>
    </head>

    <body>

        <!-- ===================== BARRE HAUTE : LA GALAXIE ===================== -->
        <div class="topbar">
            <div class="wrap">

                <a class="marque" href="./" title="Dogmazic">DOGMA<span>ZIC</span></a>

                <nav class="galaxie-liens" aria-label="<?php trans('nav_galaxie'); ?>">
                    <a class="ici" href="./"><?php trans('nav_accueil'); ?></a>
                    <a href="https://play.dogmazic.net" target="_blank" rel="noopener"><?php trans('nav_archive'); ?></a>
                    <a href="https://radio.dogmazic.net" target="_blank" rel="noopener"><?php trans('nav_radio'); ?></a>
                    <a href="https://www.musique-libre.org" target="_blank" rel="noopener"><?php trans('nav_asso'); ?></a>
                </nav>

                <?php
                include_once(HOME_PATH . DS . 'stats.php');
statsBandeau();
?>

                <div class="langues">
                    <a href="?lang=fr" class="<?= LANG === 'fr' ? 'ici' : '' ?>" lang="fr" hreflang="fr">FR</a>
                    <a href="?lang=en" class="<?= LANG === 'en' ? 'ici' : '' ?>" lang="en" hreflang="en">EN</a>
                </div>

                <a class="recherche-mini" href="//play.dogmazic.net/search.php?type=song"
                   target="_blank" rel="noopener"
                   title="<?php trans('Rechercher'); ?>">
                    <img src="<?= IMG_PATH . '/loupe_blanche.png' ?>" alt="<?php trans('Rechercher'); ?>">
                </a>

                <a class="connexion" href="//play.dogmazic.net/login.php" target="_blank" rel="noopener"><?php trans('Connexion'); ?></a>

            </div>
        </div>

        <main>
            <?php include(HOME_PATH . DS . 'accueil.php'); ?>
        </main>

    </body>
</html>
