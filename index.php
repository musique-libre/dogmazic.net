<?php
include('ini.php');
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
        <link rel="alternate" hreflang="fr" href="?lang=fr">
        <link rel="alternate" hreflang="en" href="?lang=en">
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
