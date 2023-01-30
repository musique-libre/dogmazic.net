<?php
$lang = isset($_GET['lang']) ? strtolower($_GET['lang']) : 'fr';
if ( !in_array( $lang, array('fr', 'en') ) ) $lang='fr';

$url_embed="";
if (isset($_GET['embed'])){
	$url_embed='embed=true';
}



$trans['chat_titre']['fr']='Discuter avec notre équipe';
$trans['chat_titre']['en']='Chat with our team';

$trans['chat_texte']['fr']='Vos retours, vos questions nous aident à construire le projet et sont précieux ! Soyez présents sur IRC qui est notre principal outil pour prendre nos décisions et coordonner nos actions. <br/> Vous avez une idée, une question, ou bien juste du temps pour être présent, discuter de l\'asso et faire circuler les infos ? Rejoignez nous sur le chat IRC (<em>#dogmazic</em> sur <em>irc.libera.chat</em>). Si vous n\'obtenez pas de réponse tout de suite, c\'est juste que personne n\'est devant son écran, gardez le chat ouvert et montrez-vous patient.<br/> Pour chatter avec nous<ul><li>Connectez-vous au "Webchat" sur <a href="https://libera.chat">Libera.chat</a> (le gros bouton en haut à droite), entrez #dogmazic comme salon, choisissez un pseudo et vous êtes à bord.</li></ul><br/>';
$trans['chat_texte']['en']='Your feeback, your question are helping us building the project and are precious! Be there on IRC which is our main tool for action and decision taking. <br/> Do you have an idea, a question, or just time to be around, discuss about the non-for-profit association and flow the information around? Join us on the chatroom (<em>#dogmazic</em> on <em>irc.libera.chat</em>). If you do not get a reply immediately, this just means that nobody is in front of the computer, keep the chatroom open and please, be patient.<br/> To chat with us<ul><li>Connect to Webchat on <a href="https://libera.chat">Libera.chat</a> (the big button upper-right), enter #dogmazic as chatroom, choose a nickname and you are onboard.</li></ul>: <br/> ';

$trans['legal']['fr']='Copyright 2004-2023 Association Musique Libre. Sauf autre mention (par exemple pour les morceaux de l\'archive musicale), ce site et son contenu sont disponibles sous licence <a target="new" href="https://creativecommons.org/licenses/by-sa/2.0/">Creative Commons BY-SA</a>. Numéro CNIL : 1208661';
$trans['legal']['en']='Copyright 2004-2023 Musique Libre volunteer organisation. Unless otherwise mentioned (as an example, the tracks in the music archive), this site and its content are published under the terms of the <a target="new" href="https://creativecommons.org/licenses/by-sa/2.0/">Creative Commons BY-SA</a> license. CNIL number : 1208661';

?>
<!DOCTYPE html>
<html>
<head>
<link rel='shortcut icon' href='http://play.dogmazic.net/favicon_dogmazic.ico' />
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">

<!-- <link rel="stylesheet" href="../assets/css/style.css" type="text/css" media="screen" /> -->
<!-- <link rel="stylesheet" href="../assets/css/style_irc.css" type="text/css" media="screen" /> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dogmazic.net - Chat</title>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
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
                            <img src="../assets/img/dogmaziclogo.png" class="img1" /><img src="../assets/img/logotitre.png" alt="Dogmazic.net"/>
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
					<!--<iframe src="https://kiwiirc.com/client/irc.libera.chat:+6697/?nick=dogmazien|?&theme=cli#dogmazic" style="border:0; width:100%; height:540px;"></iframe> -->      
                  </div>
                </div>
            </div>
            
            <hr/>
            <footer>
                <p><?php echo $trans['legal'][$lang];?></p>
            </footer>
        </div>
    
    </div>

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
