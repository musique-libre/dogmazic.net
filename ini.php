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

// Lien vers le compte-rendu de la derniere assemblee generale.
// A mettre a jour apres chaque AG : c'est le seul endroit a modifier,
// le lien est utilise dans les textes FR et EN (voir accueil/texte.php).
define('URL_AG', 'https://musique-libre.org/blog/2024/09/13/compte-rendu-de-lag-de-musique-libre/');

// Configuration locale (identifiants MySQL pour les stats).
// Fichier hors depot, voir config.php.dist. Absent = pas de stats affichees.
if (file_exists(__DIR__ . DS . 'config.php')) {
    include_once(__DIR__ . DS . 'config.php');
}

// Retourne la traduction (utile quand on doit la manipuler avant affichage,
// par exemple pour y injecter des chiffres : voir accueil/stats.php).
function trans_r($txt)
{
    include(HOME_PATH . DS . 'texte.php');
    if (!isset($trans[$txt])) {
        return "<i>Missing text</i>";
    }
    if (!isset($trans[$txt][LANG])) {
        return "<i>Missing translation " . LANG . " for <b>$txt</b></i>";
    }

    return $trans[$txt][LANG];
}

function trans($txt)
{
    echo trans_r($txt);
}
