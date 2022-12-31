<?php
// Turn off all error reporting
/* * /
error_reporting(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
/* */

define('DS',DIRECTORY_SEPARATOR);
define('ASSETS_PATH','assets');
define('IMG_PATH',ASSETS_PATH . DS . 'img');
define('CSS_PATH',ASSETS_PATH . DS . 'css');
define('JS_PATH',ASSETS_PATH . DS . 'js');
define('HOME_PATH', 'accueil');

$lang = isset($_GET['lang']) ? strtolower($_GET['lang']) : 'fr';
if ( !in_array( $lang, array('fr', 'en') ) ) $lang='fr';
define('LANG', $lang);

function trans($txt){
  include(HOME_PATH . DS . 'texte.php');
  if (!isset($trans[$txt])){
    echo "<i>Missing text</i>";
    return;
  }
  if (!isset($trans[$txt][LANG])){
    echo "<i>Missing translation ".LANG." for <b>$txt</b></i>";
    return;
  }
  echo $trans[$txt][LANG];
}

