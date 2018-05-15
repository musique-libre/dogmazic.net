<!DOCTYPE html>
<html>
	<head>
	    <title>Dogmazic - Accueil</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="//play.dogmazic.net/favicon_dogmazic.ico">
		<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
	    <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen">
	    <script src="assets/js/jquery.min.js"></script>
    	<!-- <script src="assets/js/bootstrap.min.js"></script> -->
	</head>

    <body>       
    	<header>        	
			<a href="//play.dogmazic.net/index.php">
				<img src="Dogmazic%20-%20Accueil_fichiers/dogmazic.png" title="Dogmazic" alt="Dogmazic" id="logo_dogmazic">
			</a>
			<span id="loginInfo">
                <a href="//play.dogmazic.net/login.php">Se connecter</a>
            	/ <a href="//play.dogmazic.net/register.php">S'inscrire</a>
            </span>
            <div class="espace"></div> <!-- div vide pour la mise en page en flex -->
	    	<form name="search" method="post" action="//play.dogmazic.net/search.php?type=song" enctype="multipart/form-data">
		        <input name="rule_1_input" id="searchString" placeholder="Recherche..." class="ui-autocomplete-input" autocomplete="off" type="text">
		        <input name="action" value="search" type="hidden">
		        <input name="rule_1_operator" value="0" type="hidden">
		        <input name="object_type" value="song" type="hidden">
		        <select name="rule_1" id="searchStringRule">
		            <option value="anywhere" selected="selected">N'importe où</option>
		            <option value="title">Titre</option>
		            <option value="album">Album</option>
		            <option value="artist">Artiste</option>
		            <option value="playlist_name">Liste de lecture</option>
		            <option value="tag">Genre</option>
                    <option value="label">Label</option>
                </select>
		        <input class="button" value="Rechercher" id="searchBtn" type="submit">
		        <a href="//play.dogmazic.net/search.php?type=song" class="button" id="advSearchBtn">Recherche avancée</a>
	    	</form>
		</header>

        <main>
          <!-- <object data="./dogmazic.net/?embed=true" type="text/html" style="width:100%;" height="1980" id="mainframe"></object> -->
          <?php
          	include("./dogmazic.net/accueil.php"); 
          ?>
    	</main>
       
        <footer id="footer" class="footer-wild">
                dogmazic.net | musique-libre.org | propulsed by ampache.org                
        </footer>
</body>
</html>
