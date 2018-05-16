<?php
define('RSS_CACHE_TIME', 10); // cache flux rss en minutes
define('RSS_CACHE_DIR', '/tmp/www-dogmazic-net-cache-rss/'); // cache flux rss en minutes
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fr';
include('texte.php');
?>

    <!-- HEADER -->

	<header>

        <h1><a href="http://play.dogmazic.net" alt="Dogmazic archive">Dogmazic</a></h1>
        
        <p><?= $trans['chat_soustitre'][$lang];?><br/> 
      	<?= $trans['chat_header'][$lang];?>
        </p>       
			
        <a class="btn btn-large btn-default" href="#appsModal" style="" role="button" data-toggle="modal">
		<?php echo $trans['apps_mobiles'][$lang];?>
        </a>
               
        <a href="?lang=<?= $lang == 'fr' ? 'en' : 'fr' ?>"><img class="flag" src="assets/img/<?= $lang == 'fr' ? 'en' : 'fr' ?>.svg"></a> 

    </header>

    <!-- NOUVEAUX ALBUMS -->

	<section id="albums">	
        <h3><?php echo $trans['nouveaux_albums'][$lang];?></h3>
        <ul id="albumList">
            <?php
            albumList();
            ?>
        </ul>	
	</section>  

   <!-- COMMENTAIRES & FORUM -->

    <aside id="commentsAndForum">

        <!-- LAST COMMENTS -->
        
        <div id="comments">
            <h4><?php echo $trans['nouveaux_commentaires'][$lang];?></h4>
            <div>
                <?php
                lastComments();
                ?>
            </div>
        </div>                              

        <!-- FORUM -->

        <div id="forum">
            <h3><?php echo $trans['nouveaux_forum'][$lang];?></h3>
            <span id="fofo" style="">
                <?php
                lastPost();
                ?>				  
            </span>
        </div>
    </aside>
            
        <!-- RADIO -->

            <!-- <div style="margin-left:auto;margin-right:auto;" class="">
                <strong><a title="Dogmazic Webradio" href="javascript:void(0);" onClick="toggle(document.getElementById('radio'), 'inline');" style="text-align:left;float:none;"><h4>DogmaRadio</h4></a></strong>
                <br/>
                <span style="float:left;border:solid 4px orange;border-radius:3px;margin-bottom:0px;padding-bottom:0px" id="radio">
                    <script type="text/javascript" src="js/mrp.js"></script>
                    <script type="text/javascript">
    MRP.insert({'url':'http://dmz.fm:8000/stream.ogg', 'codec':'ogg', 'volume':90, 'autoplay':false, 'buffering':5, 'title':'Dogmazic WebRadio', 'bgcolor':'#F0F0F0',  'skin':'eastanbul', 'width':467, 'height':26});
                    </script>
        
                    <object style="display:inline;" style="margin-bottom:0px;padding-bottom:0px;" data="http://dmz.fm:8000/nowplaying.xsl" type="text/html" width="467" height="25"></object>
                </span> 
            </div> -->  

    <!-- NOW PLAYING -->
	
    <!-- <span style="" class="col-md-4">

        <h4><a style="" href="javascript:void(0);" onClick="toggle(document.getElementById('nowplaying'), 'inline');"><?php echo $trans['En écoute'][$lang];?></a></h4>
        <span class="" id="nowplaying" style=""></span>
		<script>
			function nowplay() {
					//ajax processing url ./?get=nowplaying
            
					var xhttp = new XMLHttpRequest();
					  xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
						 	document.getElementById('nowplaying').innerHTML= this.responseText;
						}
					  };
					  xhttp.open('GET', './?get=nowplaying', true);
					  xhttp.send();
            
            }	
				
			nowplay();	
			window.setInterval( nowplay, 35000);			
		</script>
    </span> -->

    <!-- CONCERTS -->

	<!-- <div id="concerts" style="border: solid 1px black;display:none;">
	<?php
	//here we go, mister D-sky
	// $dom = new DOMDocument();
	// $run=false;
	// if ($albums = get_rss_with_cache('concerts.musique-libre.org','http://concerts.musique-libre.org/rss')) {
 //    //echo htmlspecialchars($albums);
 //    $dom->loadXML($albums);
 //    $dom->preserveWhiteSpace=false;
 //    $channeltitle=$dom->getElementsByTagName('title')->item(0);
 //    $items = $dom->getElementsByTagName('item');
    //echo htmlspecialchars(var_dump($items));
 //    if ($channeltitle==='Concerts Musique Libre'){
	// 	$run=true;
	// 	}
	// }
	// if (!$run){
	// 	$concertcount=0;
		
		
	// }
	// else {
	// 	$concertcount=count($items);
	// }
	?>	
		
		
	<strong><a href="javascript:void(0);" onClick="toggle(document.getElementById('conc'), 'inline');">Concerts:</a></strong> (<?php //echo htmlspecialchars($concertcount);?>)<br/>
	<!-- leaflet map stuff --><!--
	<span id="conc" style="display:inline;">
	<div id="map" style="height:160px;"></div>
	<script>
	var map = L.map('map').setView([25, 0], 1);

		L.tileLayer('//tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

	
	<?php
	// $i = 0;
    // while(($item = $items->item($i++))&&$run) {
        // $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
        // $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
        // $lat = $item->getElementsByTagName('icbm:latitude')->item(0)->nodeValue;
        // $lon = $item->getElementsByTagName('icbm:longitude')->item(0)->nodeValue;
        
        ?>
        
        L.marker([<?php //echo floatval($lat); ?>, <?php //echo floatval($lon); ?>]).addTo(map)
    .bindPopup('<a target="new" href="<?php //echo $link;?>"><?php //echo str_replace ("'", "\\'", htmlspecialchars($title));?></a>')
    .openPopup();

        
        <?php


    // }
	?>
	</script>
	<span style="text-align:right;float:right;border: solid 1px black;"><a target="new" href="http://concerts.musique-libre.org"><?php //echo $trans['Annoncer un concert'][$lang];?></a></span>
	</div> -->

	<!-- PUBLIER VOTRE MUSIQUE -->

    <article id="publier">
        <h3><?php echo $trans['publier'][$lang];?></h3>
        <p id="pub">
        <?php echo $trans['pub_content'][$lang];?>
        </p>
    </article>

    <!-- MUSIQUE LIBRE -->

	<article id="musique_libre"> 
		<h2><?= $trans['musique_libre_titre'][$lang] ?></h2>
			<p>
                <?= $trans['musique_libre_texte'][$lang] ?>   
			</p>
					
		<h2><?= $trans['asso_titre'][$lang] ?></h2>
			<p>
				<?= $trans['asso_texte'][$lang] ?>	 
			</p>
					
        <h2><?= $trans['adherer_titre'][$lang]?></h2>
            <p>
                <a target="new" href="http://musique-libre.org" alt="Musique Libre !"><img src="assets/img/musiquelibrelogo.png" id="logo_ml" /></a>
                <div>
                    <?php echo $trans['adherer_texte'][$lang];?>
                </div>
            </p>
            <p>
				<h2><?php echo $trans['faire_un_don_titre'][$lang];?></h2>
                <div style="" id="don">
                    <?php echo $trans['faire_un_don_texte'][$lang];?>
                </div>
            </p>
    </article>

      
    <footer>
        <p><?php echo $trans['legal'][$lang];?></p>
    </footer>
    
    

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
   </div>

<?php


/*
$name nom du cache
$feed_url url du flux
$duree_cache duree du cache en minute

@return STRING avec le flux rss passé en paramètre

Il tente de faire du cache du flux RSS passé en parametre.
Le nom du cache est son point de repére, attention.
La durée de cache est optionnel, et par default a 10 minutes

Bug connu :
Si le flux interrogé ne renvoie pas un XML valide, le fichier de cache n'est pas mis à jour, et ca tente
de servir le fichier de cache actuel sans rien vérifié dessus.
*/
function get_rss_with_cache($name, $feed_url, $duree_cache=10) {
  if (! is_dir(RSS_CACHE_DIR)) {
    mkdir(RSS_CACHE_DIR, 0700, true);
  }

  $cache_time = 60*$duree_cache; // convertie la duree en seconde
  $cache_file = RSS_CACHE_DIR.$name;
  $timedif = @(time() - filemtime($cache_file));

  // Si le fichiers est assez "jeune"
  if (file_exists($cache_file) && $timedif < $cache_time) {
    $string = file_get_contents($cache_file);

  // Sinon, on récupére le fichier
  } else {
    // Timeout, okazou
    $ctx = stream_context_create(array(
      'http' => array(
         'timeout' => 3
         )
      )
    ); 
    $string = file_get_contents("$feed_url",0,$ctx);

    // On tente de parser le flux -> si on y arrive pas, on ne sauvegarde pas
    $xml = @simplexml_load_string($string);
    if ( $xml === FALSE ) {
      // Et on tente de servir la version en cache...
      $string = file_get_contents($cache_file);
      return $string;
    }
    file_put_contents($cache_file,$string);
  }

  // if ($_SERVER["HTTP_X_FORWARDED_PROTO"] == "https") { // Fufroma
  //   $string = str_replace('http://play.dogmazic.net/image.php', 'https://play.dogmazic.net/image.php', $string);
  // }

  return $string;
}

function albumList(){
    //here we go, mister D-sky
    $dom = new DOMDocument();
    #if ($albums = file_get_contents('http://play.dogmazic.net/rss.php?type=latest_album')) {
    if ($albums = get_rss_with_cache('play.dogmazic.net_latest_album','http://play.dogmazic.net/rss.php?type=latest_album')) {
        //echo htmlspecialchars($albums);
        $dom->loadXML($albums);
        $dom->preserveWhiteSpace=false;
        $items = $dom->getElementsByTagName('item');
        //echo htmlspecialchars(var_dump($items));
        $i = 0;
        $counter=1;
        while(($item = $items->item($i++))&&$i<=11) {
            $image = $item->getElementsByTagName('image')->item(0)->nodeValue;
            $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
            $description = $item->getElementsByTagName('description')->item(0)->nodeValue;
            echo '<li class="album">';
            echo '<a target="new" href="' . $link . '" ';
            
            //if ($counter<=3){echo 'float:left;';}
            //else {echo 'float:none:clear:both;';$counter=1;}
            
            echo '"><img class="albumimg" src="' . $image . '"/><br/><p>' . htmlspecialchars(substr($description, 0,30)); 
            if (substr($description, 0,30)!==$description){echo '...';}
            echo '</p></a></li>';
        }
    }
}

function lastPost()
{
    $target = 'http://musique-libre.org/forum/discussions/feed.rss';
    //here we go, mister D-sky
    $dom = new DOMDocument();
    if ($albums = get_rss_with_cache('musique-libre.org_feed',$target)) {
        //echo htmlspecialchars($albums);
        $dom->loadXML($albums);
        $dom->preserveWhiteSpace=false;
        $items = $dom->getElementsByTagName('item');
        //echo htmlspecialchars(var_dump($items));
        $i = 0;
        while (($item = $items->item($i++))&&$i<10) {
            //$image=$item->getElementsByTagName('image')->item(0)->nodeValue;
            $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
            $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
            //$creator=$item->getElementsByTagName('dc:creator')->item(0)->nodeValue;
            $pubdate = $item->getElementsByTagName('pubDate')->item(0)->nodeValue;


            echo '<p><a target="new" href="' . $link . '">' . htmlspecialchars($title) . '</a><br/>';
            echo '<span class="pubDate">' . htmlspecialchars($pubdate) . '</span></p>';
        }
    }
}

function lastComments()
{
    //here we go, mister D-sky
    $dom = new DOMDocument();
    #if ($albums = file_get_contents('http://play.dogmazic.net/rss.php?type=latest_shout')){
    if ($albums = get_rss_with_cache('play.dogmazic.net_latest_shout','http://play.dogmazic.net/rss.php?type=latest_shout')){
        //echo htmlspecialchars($albums);
        $dom->loadXML($albums);
        $dom->preserveWhiteSpace=false;
        $items = $dom->getElementsByTagName('item');
        //echo htmlspecialchars(var_dump($items));
        $i = 0;
        while(($item = $items->item($i++))&&$i<=10) {
            $image = $item->getElementsByTagName('image')->item(0)->nodeValue;
            $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
            $description = $item->getElementsByTagName('description')->item(0)->nodeValue;
            $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
            echo '<a target="new" href="' . $link . '"><p><span class="comment">' . htmlspecialchars($description) . '</span>
            <br /><span class="commentAuthor">' . str_replace('Shout by', '', htmlspecialchars($title)) . '</span></p></a>';
        }
    }
}

//Ajax hook
if (isset($_GET['get'])&&$_GET['get']==='nowplaying'){
    $hasdisplayed=false;
    $dom = new DOMDocument();
    #if ($albums = file_get_contents('http://play.dogmazic.net/rss.php?type=latest_shout')){
    if ($albums = file_get_contents('//play.dogmazic.net/rss.php')){
        //echo htmlspecialchars($albums);
        $dom->loadXML($albums);
        $dom->preserveWhiteSpace=false;
        $items = $dom->getElementsByTagName('item');
        //echo htmlspecialchars(var_dump($items));
        $i = 0;
        while(($item = $items->item($i++))&&$i<=10) {
            $hasdisplayed=true;
            $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
            $description = $item->getElementsByTagName('description')->item(0)->nodeValue;
            $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
            echo '<a style="border:solid 1px black;" target="new" href="' . $link . '" class="list-group-item">' . htmlspecialchars($description) . '</a></li>';
        }
    }
    if (!$hasdisplayed){
        echo '...';
    }
    exit();
}





//hugly emebed hack
$url_embed="";
if (isset($_GET['embed'])){
    $url_embed='embed=true';
}



?>
