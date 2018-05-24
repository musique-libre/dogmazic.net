<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fr';
include('dogmazic.net/texte.php');
?>
<!DOCTYPE html>
<html>
	<head>
	    <title>Dogmazic - <?= $trans['accueil'][$lang] ?></title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="//play.dogmazic.net/favicon_dogmazic.ico">
	    <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen">
	    <script src="assets/js/jquery.min.js"></script>
    	<script src="assets/js/apps_mobiles_popup.js"></script>
    	<script src="assets/js/togglebox.js"></script>
    	<script src="assets/js/style.js"></script>
    	<script src="assets/js/scrollbutton.js"></script>

	</head>

    <body>       
    	<header>        	
			<a href="//play.dogmazic.net/index.php">
				<img src="Dogmazic%20-%20Accueil_fichiers/dogmazic.png" title="Dogmazic" alt="Dogmazic" id="logo_dogmazic">
			</a>
			<span id="loginInfo">
                <a href="//play.dogmazic.net/login.php"><?= $trans['Connexion'][$lang] ?></a>
            	/ <a href="//play.dogmazic.net/register.php"><?= $trans['Inscription'][$lang] ?></a>
            </span>
            <div class="espace"></div> <!-- div vide pour la mise en page en flex -->
	    	<form name="search" method="post" action="//play.dogmazic.net/search.php?type=song" enctype="multipart/form-data">
		        <input name="rule_1_input" id="searchString" placeholder="<?= $trans['Recherche'][$lang] ?>" class="ui-autocomplete-input" autocomplete="off" type="text">
		        <input name="action" value="search" type="hidden">
		        <input name="rule_1_operator" value="0" type="hidden">
		        <input name="object_type" value="song" type="hidden">
		        <select name="rule_1" id="searchStringRule">
		            <option value="anywhere" selected="selected"><?= $trans['Anywhere'][$lang] ?></option>
		            <option value="title"><?= $trans['Title'][$lang] ?></option>
		            <option value="album">Album</option>
		            <option value="artist"><?= $trans['Artist'][$lang] ?></option>
		            <option value="playlist_name"><?= $trans['Playlist'][$lang] ?></option>
		            <option value="tag"><?= $trans['Tag'][$lang] ?></option>
                    <option value="label">Label</option>
                </select>
		        <input class="button" value="<?= $trans['Rechercher'][$lang] ?>" id="searchBtn" type="submit">
		        <a href="//play.dogmazic.net/search.php?type=song" id="advSearch"><?= $trans['Recherche_avancee'][$lang] ?></a>
	    	</form>
	    	<a href="//play.dogmazic.net/search.php?type=song" id="loupe" title="<?= $trans['Rechercher'][$lang] ?>">
	    		<img src="assets/img/loupe_blanche.png">
	    	</a>
		</header>

        <main>
          <!-- <object data="./dogmazic.net/?embed=true" type="text/html" style="width:100%;" height="1980" id="mainframe"></object> -->
          <?php
          	include("./dogmazic.net/accueil.php"); 
          ?>
    	</main>
       
        <!-- <footer id="footer" class="footer-wild">
                dogmazic.net | musique-libre.org | propulsed by ampache.org                
        </footer> -->
</body>
</html>
