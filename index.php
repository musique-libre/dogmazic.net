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
        <meta property="og:image" content="<?= SITE_URL . IMG_PATH ?>/og-dogmazic.png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:image:alt" content="<?php trans('og_image_alt'); ?>">
        <meta name="twitter:card" content="summary_large_image">
        <script src="<?= JS_PATH . '/jquery.min.js' ?>"></script>
        <script src="<?= JS_PATH . '/apps_mobiles_popup.js' ?>" defer></script>
    </head>

    <body>

        <?php
        $topbar_ici = 'accueil';
include(HOME_PATH . DS . 'topbar.php');
?>

        <main>
            <?php include(HOME_PATH . DS . 'accueil.php'); ?>
        </main>

        <?php include(HOME_PATH . DS . 'matomo.php'); ?>

    </body>
</html>
