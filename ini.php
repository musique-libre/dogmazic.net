<?php

// Flux radio écouté par le lecteur (voir accueil.php)
$flux = 'https://radio.dogmazic.net:8001/stream.mp3';

// En-tête CORS, utile si un JS tiers (play.dogmazic.net) doit lire les
// métadonnées radio. À décommenter au besoin :
// header('Access-Control-Allow-Origin: https://play.dogmazic.net/');

// Pour couper l'affichage des erreurs en production, décommenter :
// error_reporting(0);
// ini_set('display_errors', 0);

// Séparateur pour les chemins du système de fichiers (include()).
// Les URL, elles, utilisent toujours '/' (voir plus bas).
define('DS', DIRECTORY_SEPARATOR);

// Chemins web des assets (URL : toujours '/')
define('ASSETS_PATH', 'assets');
define('IMG_PATH', ASSETS_PATH . '/img');
define('CSS_PATH', ASSETS_PATH . '/css');
define('JS_PATH', ASSETS_PATH . '/js');

// Dossier des includes de la page d'accueil
define('HOME_PATH', 'accueil');

// Langue : fr par défaut, en si demandé
$lang = isset($_GET['lang']) ? strtolower($_GET['lang']) : 'fr';
if (!in_array($lang, ['fr', 'en'])) {
    $lang = 'fr';
}
define('LANG', $lang);

function trans($txt)
{
    include(HOME_PATH . DS . 'texte.php');
    if (!isset($trans[$txt])) {
        echo "<i>Missing text</i>";

        return;
    }
    if (!isset($trans[$txt][LANG])) {
        echo "<i>Missing translation " . LANG . " for <b>$txt</b></i>";

        return;
    }
    echo $trans[$txt][LANG];
}
