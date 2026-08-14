<?php
include('ini.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dogmazic - <?php trans('accueil'); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="//play.dogmazic.net/favicon_dogmazic.ico">
        <link rel="stylesheet" href="<?= CSS_PATH . '/style.css' ?>" type="text/css" media="screen">
        <script src="<?= JS_PATH . '/jquery.min.js' ?>"></script>
        <script src="<?= JS_PATH . '/apps_mobiles_popup.js' ?>"></script>
        <script src="<?= JS_PATH . '/togglebox.js' ?>"></script>
        <script src="<?= JS_PATH . '/style.js' ?>"></script>
        <script src="<?= JS_PATH . '/scrollbutton.js' ?>"></script>
    </head>

    <body>
        <header>
            <a href="//play.dogmazic.net/index.php">
                <img src="<?= IMG_PATH . '/dogmaziclogo.png' ?>" title="Dogmazic" alt="Dogmazic" id="logo_dogmazic">
            </a>
            <span id="loginInfo">
                <a href="//play.dogmazic.net/login.php"><?php trans('Connexion'); ?></a>
                / <a href="//play.dogmazic.net/register.php"><?php trans('Inscription'); ?></a>
            </span>
            <div class="espace"> <!-- espace flexible, accueille le bandeau de stats -->
                <?php
                include_once(HOME_PATH . DS . 'stats.php');
statsBandeau();
?>
            </div>
            <form name="search" method="post" action="//play.dogmazic.net/search.php?type=song" enctype="multipart/form-data">
                <input name="rule_1_input" id="searchString" placeholder="<?php trans('Recherche'); ?>" class="ui-autocomplete-input" autocomplete="off" type="text">
                <input name="action" value="search" type="hidden">
                <input name="rule_1_operator" value="0" type="hidden">
                <input name="object_type" value="song" type="hidden">
                <select name="rule_1" id="searchStringRule">
                    <option value="anywhere" selected="selected"><?php trans('Anywhere'); ?></option>
                    <option value="title"><?php trans('Title'); ?></option>
                    <option value="album">Album</option>
                    <option value="artist"><?php trans('Artist'); ?></option>
                    <option value="playlist_name"><?php trans('Playlist'); ?></option>
                    <option value="tag"><?php trans('Tag'); ?></option>
                    <option value="label">Label</option>
                </select>
                <input class="button" value="<?php trans('Rechercher'); ?>" id="searchBtn" type="submit">
                <a href="//play.dogmazic.net/search.php?type=song" id="advSearch"><?php trans('Recherche_avancee'); ?></a>
            </form>
            <a href="//play.dogmazic.net/search.php?type=song" id="loupe" title="<?php trans('Rechercher'); ?>">
                <img src="<?= IMG_PATH . '/loupe_blanche.png' ?>">
            </a>
        </header>

        <main>
            <?php include(HOME_PATH . DS . 'accueil.php'); ?>
        </main>
    </body>
</html>
