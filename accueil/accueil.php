<?php
define('RSS_CACHE_TIME', 10); // cache flux rss en minutes
define('RSS_CACHE_DIR', '/tmp/www-dogmazic-net-cache-rss/'); // cache flux rss en minutes
?>
    <!-- HEADER -->

    <header>
    <h1><a href="https://play.dogmazic.net" alt="Dogmazic archive" title="<?php trans('acces_archive'); ?>">Dogmazic</a></h1>
    <a href="?lang=<?= $lang == 'fr' ? 'en' : 'fr' ?>"><img class="flag" src="<?= IMG_PATH . DS . ($lang == 'fr' ? 'en' : 'fr') ?>.svg"></a>
    <div class="container_header">
      <div class="content_don" href="#don">
        <a href="#don">
          <div id="bouton_don" href="#don">
            <?php trans('faire_un_don_titre'); ?>
          </div>
          <img id="logo_don" href="#don" src="<?= IMG_PATH . DS . 'don.png' ?>">
        </a>
      </div>
      <div class="content_socials">
        <p><?php trans('text_header');?></p>
        <p><?php trans('chat_soustitre');?></p>

        <?php include_once 'socials.php'; ?>
        <!-- socials' loop -->
        <div class="container">
          <?php foreach ($socials as $social): ?>
            <a class="social_links" href="<?= $social['url']; ?>" target="_blank">
              <nav class="social_buttons" id="bouton_<?= strtolower($social['name']['fr']); ?>"><?= $social['name'][$lang]; ?></nav>
            </a>
            <?php endforeach; ?>
        </div>
      </div>
      <div id="apps_mobiles">
        <?php trans('apps_mobiles');?>
      </div>
      <img id="logo_mobile" src="<?= IMG_PATH . DS . 'smartphone.png' ?>">

    </div>

  </header>



    <!-- NOUVEAUX ALBUMS -->

    <section id="albums">
        <h3><?php trans('nouveaux_albums');?></h3>
        <ul id="albumList">
            <?php
            albumList();
            ?>
        </ul>
    </section>

    <!-- RÉCEMMENT JOUÉ-->

    <section id="recentlyPlayed">
        <h3><?php trans('récemment_joué');?></h3>
        <ul id="recentlyPlayedList">
            <?php
            recentlyPlayedList();
            ?>
        </ul>
    </section>


   <!-- COMMENTAIRES & FORUM -->

    <aside id="commentsAndForum">

         <!-- BLOG -->

        <div id="blog">
            <div class="box_title">
                <h4><?php trans('nouveaux_articles');?></h4>
                <span class="box_plus">+</span>
            </div>
            <div class="box_content" data_show="yes">
                <?php
                lastBlogPosts();
                ?>
            </div>
        </div>

        <!-- FORUM -->

        <div id="forum">
            <div class="box_title">
                <h4><?php trans('nouveaux_forum');?></h4>
                <span class="box_plus">+</span>
            </div>
            <div class="box_content" data_show="no">
                <?php
                lastPost();
                ?>
            </div>
        </div>

        <!-- LAST COMMENTS -->

        <div id="comments">
            <div class="box_title">
                <h4><?php trans('nouveaux_commentaires');?></h4>
                <span class="box_plus">+</span>
            </div>
            <div class="box_content" data_show="no">
                <?php
                lastComments();
                ?>
            </div>
        </div>

        <!-- RADIO -->

             <div id="radio">
                <div class="box_title">
                    <h4>DogmaRadio</h4>
                    <span class="box_plus">+</span>
                </div>
                <div class="box_content" data_show="yes">
                      <audio controls id="dogplayer" onpause="refreshInfos()" onplay="refreshInfos()" >
                        <source src="<?php echo $flux; ?>" type="audio/mpeg">
                        <p>
                          Look like your browser can't handle HTML5, here the <a href="<?php echo $flux; ?>">direct link</a>.
                        </p>
                      </audio>

                      <br>
                      <br>

                      <div id="display_infos">
                        <span id="metainfos">
                          <a href='#' title='Show this artist on Dogmazic' id="link_artist" target=_blank ></a> -
                          <a href='#' title='Show this song on Dogmazic' id="link_song" target=_blank ></a>
                        </span>

                        <br>
                        <br>

                        <a href="#" target=_blank id="link_album">
                          <img src='/blank_album_art.png' alt="Album Art" title="Show this album on Dogmazic" id="albumart" width="125" height="125" style="width:60%; max-width: 125px; height: auto;">
                          <br>
                          <span id="album_title"></span>
                        </a>
                      </div>

                      <img src='/pause.png' alt="Pause" title="Paused" id="pauseimg" width="125" height="125" onclick="playRadio()" style="width:60%; max-width: 125px; height: auto;">

                    </div>

                    <br/>

                    <script>

                    function playRadio() {
                      document.getElementById('dogplayer').play();
                    }

                    // Need this as a global var for refreshInfos()
                    var current_song_id = null;

                    function refreshInfos() {
                      // No refresh if the page isn't visible
                      if (document.hidden) {
                        return;
                      }

                      // No refresh if the player is paused
                      if ( document.getElementById('dogplayer').paused ) {
                        $("#display_infos").hide();
                        $("#pauseimg").show();
                        return;
                      }

                      // Ok, get the refresh infos
                      $.getJSON("https://radio.dogmazic.net/metadata.php?wanted=json", function( obj ) {

                        // If we already set this song infos, quit
                        if ( current_song_id == obj['title_id'] ) {
                          return;
                        }
                        current_song_id = obj['title_id'];

                        // Set all the informations
                        $("#album_title").html( obj['album']);
                        $("#albumart").attr('src', obj['label_img'] );
                        $("#link_album").attr('href', obj['album_url'] );
                        $("#link_artist").attr('href', obj['artist_url']);
                        $("#link_artist").html(obj['artist']);
                        $("#link_song").attr('href', obj['song_url']);
                        $("#link_song").html(obj['title']);

                        // And display them
                        $("#pauseimg").hide();
                        $("#display_infos").show();

                        navigator.mediaSession.metadata = new MediaMetadata({
                          title: obj['title'],
                          artist: obj['artist'],
                          artwork: [{
                              src: obj['label_img'],
                              sizes: "96x96",
                              type: "image/png"
                            },
                            {
                              // Not the right size, but 256x256 is necessary for
                              // Android device to display the artwork
                              src: obj['label_img'],
                              sizes: "256x256",
                              type: "image/png"
                            }
                          ],
                          album: obj['album'],
                        }); // navigator.mediaSession.metadata

                      }); // getJSON
                    }


                    // ---- REFRESH INFOS, when?
                    // at page load...
                    refreshInfos();

                    // refresh every X milliseconds
                    setInterval(function(){
                      refreshInfos()
                    }, 5000); // 5 seconds

                    // and when we display the page (ex: switching tabs)
                    document.addEventListener("visibilitychange", () => {
                      if (document.visibilityState === "visible") {
                        refreshInfos();
                      }
                    });

                    // ---- END REFRESH INFOS

                    </script>
                </div>
            </div>
    </aside>
    <!-- END of the RADIO block -->
    <!-- NOW PLAYING -->

    <!-- <span style="" class="col-md-4">

        <h4><a style="" href="javascript:void(0);" onClick="toggle(document.getElementById('nowplaying'), 'inline');"><?php trans('En écoute');?></a></h4>
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
    //     $run=true;
    //     }
    // }
    // if (!$run){
    //     $concertcount=0;


    // }
    // else {
    //     $concertcount=count($items);
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
    <span style="text-align:right;float:right;border: solid 1px black;"><a target="new" href="http://concerts.musique-libre.org"><?php //echo $trans['Annoncer un concert');?></a></span>
    </div> -->

    <!-- PUBLIER VOTRE MUSIQUE -->

    <article id="publier">
        <h3><?php trans('publier');?></h3>
        <p id="pub">
        <?php trans('pub_content');?>
        </p>
    </article>

    <!-- MUSIQUE LIBRE -->

    <article id="musique_libre">
        <h2><?php trans('musique_libre_titre'); ?></h2>
            <p>
                <?php trans('musique_libre_texte'); ?>
            </p>

        <h2><?php trans('asso_titre'); ?></h2>
            <p>
                <?php trans('asso_texte'); ?>
            </p>

        <h2><?php trans('adherer_titre');?></h2>
            <p>
                <a target="new" href="http://musique-libre.org" alt="Musique Libre !"><img src="<?= IMG_PATH . DS . 'musiquelibrelogo.png'?>" id="logo_ml" /></a>
                <div>
                    <?php trans('adherer_texte');?>
                </div>
            </p>
            <p id="don">
                <h2><?php trans('faire_un_don_titre');?></h2>
                <div id="don">
                    <?php trans('faire_un_don_texte');?>
                </div>
            </p>
    </article>

    <!-- MENU MUSIQUE -->

    <div id="menuMusique">
        <h4><?php trans('Musique');?></h4>
        <ul>
            <a href="//play.dogmazic.net/browse.php?action=artist" target="_blank"><li><?php trans('Artists'); ?></li></a>
            <a href="//play.dogmazic.net/browse.php?action=label" target="_blank"><li><?php trans('Labels'); ?></li></a>
            <a href="//play.dogmazic.net/browse.php?action=tag" target="_blank"><li><?php trans('Tags'); ?></li></a>
            <a href="//play.dogmazic.net/browse.php?action=playlist" target="_blank"><li><?php trans('Playlists');?></li></a>
        </ul>
    </div>

    <footer>
        <p><?php trans('legal');?></p>
    </footer>

    <!-- POPUP BOX -->

    <div id="apps_mobiles_popup">
        <header>
            <button>×</button>
            <h4 class="modal-title"><?php echo trans('apps_mobiles');?></h4>
        </header>
        <article>
            <p><?php trans('apps_mobiles_texte'); ?></p>
            <p class="text-warning"><small><?php trans('apps_mobiles_texte_avert'); ?></small></p>
        </article>
        <footer>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </footer>
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

/*** Affiche les 10 derniers albums publiés***/

function albumList(){
    //here we go, mister D-sky
    $dom = new DOMDocument();
    if ($albums = get_rss_with_cache('play.dogmazic.net_latest_album','https://play.dogmazic.net/rss.php?type=latest_album')) {
        //echo htmlspecialchars($albums);
        $dom->loadXML($albums);
        $dom->preserveWhiteSpace=false;
        $items = $dom->getElementsByTagName('item');
        //echo htmlspecialchars(var_dump($items));
        $i = 0;
        $counter=1;
        while(($item = $items->item($i++))&&$i<=11) {

            // Ampache < 7.4.0, rss got an <image> tag
            //$image = str_replace('https://', '//', $item->getElementsByTagName('image')->item(0)->nodeValue); // http and https available
            // Ampache >= 7.4.0, no more <image> tag
            $album_id = str_replace('album-', '', $item->getElementsByTagName('guid')->item(0)->nodeValue);
            $image = "//play.dogmazic.net/image.php?object_id=".$album_id."&object_type=album&thumb=2";

            $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
            $description = $item->getElementsByTagName('description')->item(0)->nodeValue;
            echo '<li class="album">';
            echo '<a target="new" href="' . $link . '" ';

            //if ($counter<=3){echo 'float:left;';}
            //else {echo 'float:none:clear:both;';$counter=1;}

            echo '><img class="albumimg" src="' . $image . '"/><br/><p>' . htmlspecialchars(substr($description, 0,30));
            if (substr($description, 0,30)!==$description){echo '...';}
            echo '</p></a></li>';
        }
    }
}

/*** Affiche les 10 derniers albums joués ***/

function recentlyPlayedList(){
    //here we go, mister D-sky
    $dom = new DOMDocument();
    if ($albums = get_rss_with_cache('play.dogmazic.net_recently_played','https://play.dogmazic.net/rss.php?type=recently_played')) {
        //echo htmlspecialchars($albums);
        $dom->loadXML($albums);
        $dom->preserveWhiteSpace=false;
        $items = $dom->getElementsByTagName('item');
        //echo htmlspecialchars(var_dump($items));
        $i = 0;
        $counter=1;
        while(($item = $items->item($i++))&&$i<=11) {
            $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
            $description = $item->getElementsByTagName('title')->item(0)->nodeValue;
            
            $target_songID=-1;
            
            //we now parse the link provided by the RSS feed
            //If the link can't be parsed, the song id will
            //default to -1
            
            if (($parsed_url=parse_url($link))!==false){
                $parsed_url_pairs=explode("&", $parsed_url['query']);
                foreach ($parsed_url_pairs as $pair){
                    $splited_pair=explode("=", $pair);
                    if ($splited_pair[0]='song_id'&&is_numeric($splited_pair[1])){
                            $target_songID=$splited_pair[1];
                        }
                    }
                }
            $imagelink = 'https://radio.dogmazic.net/metadata_of_song.php?song_id='.$target_songID.'&wanted=img_go';
            
            echo '<li class="album">';
            echo '<a target="new" href="' . $link . '" ';

            //if ($counter<=3){echo 'float:left;';}
            //else {echo 'float:none:clear:both;';$counter=1;}

            echo '><img id="recentlyPlayedImg-'.($i-1).'" class="albumimg" src="' . $imagelink . '"/><br/><p>' . htmlspecialchars(substr($description, 0,30));
            if (substr($description, 0,30)!==$description){echo '...';}
            echo '</p></a>';
            echo '</li>';
        }
    }
}




/*** Affiche les 10 derniers sujets du forum ***/

function lastPost()
{
    $target = 'http://forum.musique-libre.org/discussions/feed.rss';
    //here we go, mister D-sky
    $dom = new DOMDocument();
    if ($albums = get_rss_with_cache('musique-libre.org_feed',$target)) {
        //echo htmlspecialchars($albums);
        $dom->loadXML($albums);
        $dom->preserveWhiteSpace=false;
        $items = $dom->getElementsByTagName('item');
        //echo htmlspecialchars(var_dump($items));
        $i = 0;
        while (($item = $items->item($i++))&&$i<=5) {
            //$image=$item->getElementsByTagName('image')->item(0)->nodeValue;
            $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
            $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
            //$creator=$item->getElementsByTagName('dc:creator')->item(0)->nodeValue;
            $pubdate = substr($item->getElementsByTagName('pubDate')->item(0)->nodeValue, 5, -9);


            echo '<p><a target="new" href="' . $link . '">' . htmlspecialchars($title) . '</a><br/>';
            echo '<span class="pubDate">' . htmlspecialchars($pubdate) . '</span></p>';
        }
    }
}

/*** Affiche les 10 derniers commentaires ***/

function lastComments()
{
    //here we go, mister D-sky
    $dom = new DOMDocument();
    if ($albums = get_rss_with_cache('play.dogmazic.net_latest_shout','https://play.dogmazic.net/rss.php?type=latest_shout')){
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
            echo '<a target="new" href="' . $link . '"><p><span class="comment">' . htmlspecialchars(html_entity_decode($description)) . '</span>
            <br /><span class="commentAuthor">' . str_replace('Shout by', '', htmlspecialchars($title)) . '</span></p></a>';
        }
    }
}

/*** Affiche les 10 posts do blog ***/

function lastBlogPosts()
{
    $dom = new DOMDocument();
    if ($blogPosts = get_rss_with_cache('musique-libre.org_blog','http://musique-libre.org/feed/')){
        //echo htmlspecialchars($albums);
        $dom->loadXML($blogPosts);
        $dom->preserveWhiteSpace=false;
        $items = $dom->getElementsByTagName('item');
        //echo htmlspecialchars(var_dump($items));
        $i = 0;
        while(($item = $items->item($i++))&&$i<=5) {
            $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
            $pubDate = substr($item->getElementsByTagName('pubDate')->item(0)->nodeValue, 5, -9);
            $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
            echo '<p><a target="new" href="' . $link . '">' . htmlspecialchars($title) . '</a><br/>';
            echo '<span class="pubDate">' . htmlspecialchars($pubDate) . '</span></p>';
        }
    }
}

//Ajax hook
if (isset($_GET['get'])&&$_GET['get']==='nowplaying'){
    $hasdisplayed=false;
    $dom = new DOMDocument();
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


?>
