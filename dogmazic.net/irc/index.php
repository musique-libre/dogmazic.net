<?php
if (isset($_GET['lang'])){
    $lang=$_GET['lang'];
}
else{
    $lang='fr';
}
$url_embed="";
if (isset($_GET['embed'])){
	$url_embed='embed=true';
}



$trans['chat_titre']['fr']='Discuter avec notre équipe';
$trans['chat_titre']['en']='Chat with our team';

$trans['chat_texte']['fr']='Vos retours, vos questions nous aident à construire le projet et sont précieux ! Soyez présents sur IRC qui est notre principal outil pour prendre nos décisions et coordonner nos actions. <br/> Vous avez une idée, une question, ou bien juste du temps pour être présent, discuter de l\'asso et faire circuler les infos ? Rejoignez nous sur le chat IRC (<em>#dogmazic</em> sur <em>Freenode</em>). Si vous n\'obtenez pas de réponse tout de suite, c\'est juste que personne n\'est devant son écran, gardez le chat ouvert et montrez-vous patient.<br/> Pour chatter avec nous, entrez votre pseudonyme ci-dessous : <br/>';
$trans['chat_texte']['en']='Your feeback, your question are helping us building the project and are precious! Be there on IRC which is our main tool for action and decision taking. <br/> Do you have an idea, a question, or just time to be around, discuss about the non-for-profit association and flow the information around? Join us on the chatroom (<em>#dogmazic</em> on <em>Freenode</em>). If you do not get a reply immediately, this just means that nobody is in front of the computer, keep the chatroom open and please, be patient.<br/> To chat with us, enter a nickname below: <br/> ';

$trans['legal']['fr']='Copyright 2004-2015 Association Musique Libre. Sauf autre mention (par exemple pour les morceaux de l\'archive musicale), ce site et son contenu sont disponibles sous licence <a target="new" href="https://creativecommons.org/licenses/by-sa/2.0/">Creative Commons BY-SA</a>. Numéro CNIL : 1208661';
$trans['legal']['en']='Copyright 2004-2015 Musique Libre volunteer organisation. Unless otherwise mentioned (as an example, the tracks in the music archive), this site and its content are published under the terms of the <a target="new" href="https://creativecommons.org/licenses/by-sa/2.0/">Creative Commons BY-SA</a> license. CNIL number : 1208661';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel='shortcut icon' href='http://play.dogmazic.net/favicon_dogmazic.ico' />
<link href="../css/bootstrap.min.css" rel="stylesheet">
<?php 

if (isset($_GET['embed'])===false){
?>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<?php
}  else {
?>
<link rel="stylesheet" href="style_embed.css" type="text/css" media="screen" />

<?php
}
?><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dogmazic.net - Chat</title>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="?lang=fr" class="icon-fr">Français</a></li>
            <li><a href="?lang=en" class="icon-en">English</a></li>
          </ul>
        </div>
	<div class="container container-full">
        <div class="col-xs-12 col-sm-3 sidebar-offcanvas"></div>
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-12">
                <div class="jumbotron">
					<h1>
                        <a href="../?<?php echo $url_embed;?>" alt="Dogmazic" >
                            <img src="../dogmaziclogo.png" class="img1" /><img src="../logotitre.png" alt="Dogmazic.net"/>
                        </a>
                    </h1>
                    <div class="col-xs-12 col-sm-12">
                        <h2><?php echo $trans['chat_titre'][$lang];?></h2>
                        <p>
                            <div>
                                    <?php echo $trans['chat_texte'][$lang];?>
                            </div>
                        </p>
                    </div>

                    <hr/>
					<iframe src="https://kiwiirc.com/client/irc.kiwiirc.com/?nick=guest|?#dogmazic" style="border:0; width:100%; height:450px;"></iframe>       
                  </div>
                </div>
            </div>
            
            <hr/>
            <footer>
                <p><?php echo $trans['legal'][$lang];?></p>
            </footer>
        </div>
    
    </div>

    <!-- Modal HTML -->

    <div id="appsModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo $trans['apps_mobiles'][$lang];?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo $trans['apps_mobiles_texte'][$lang]; ?></p>
                    <p class="text-warning"><small><?php echo $trans['apps_mobiles_texte_avert'][$lang]; ?></small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//piwik.dogmazic.net/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', 1]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <noscript><p><img src="//piwik.dogmazic.net/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
    <!-- End Piwik Code -->

</body>
</html>
