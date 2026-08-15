<?php
define('RSS_CACHE_TIME', 10); // cache flux rss en minutes
define('RSS_CACHE_DIR', '/tmp/www-dogmazic-net-cache-rss/');
include_once 'socials.php';
?>

    <!-- ===================== HERO : LA GALAXIE ===================== -->

    <div class="hero">
        <div class="wrap">

            <div class="orbite">
                <div class="anneau a1"></div>
                <div class="anneau a2"></div>

                <a class="astre orb-archive" href="https://play.dogmazic.net" target="_blank" rel="noopener">
                    <span><b><?php trans('nav_archive'); ?></b><span class="sous"><?php trans('orbite_archive_sous'); ?></span></span>
                </a>
                <a class="astre orb-radio" href="https://radio.dogmazic.net" target="_blank" rel="noopener">
                    <span><b><?php trans('nav_radio'); ?></b><span class="sous"><?php trans('orbite_radio_sous'); ?></span></span>
                </a>
                <a class="astre orb-asso" href="https://www.musique-libre.org" target="_blank" rel="noopener">
                    <span><b><?php trans('nav_asso'); ?></b><span class="sous"><?php trans('orbite_asso_sous'); ?></span></span>
                </a>

                <button type="button" class="platine" onclick="basculeRadio()"
                        aria-label="<?php trans('lancer_radio'); ?>">
                    <img src="<?= IMG_PATH . '/disque-vinyle.svg' ?>" alt="" width="420" height="420">
                    <span class="badge" id="badgePlay" aria-hidden="true">&#9654;</span>
                </button>

                <span class="legende"><?php trans('ecouter_en_direct'); ?></span>
            </div>

            <div>
                <span class="eyebrow"><?php trans('hero_surtitre'); ?></span>
                <h1><?php trans('hero_titre'); ?></h1>
                <p class="chapeau"><?php trans('hero_chapeau'); ?></p>
                <div class="actions">
                    <button type="button" class="btn plein" onclick="basculeRadio()">
                        &#9654; <?php trans('lancer_radio'); ?>
                    </button>
                    <a class="btn" href="https://play.dogmazic.net" target="_blank" rel="noopener"><?php trans('fouiller_archive'); ?></a>
                    <a class="btn" href="//play.dogmazic.net/register.php" target="_blank" rel="noopener"><?php trans('publier_ma_musique'); ?></a>
                </div>
            </div>

        </div>
    </div>

    <!-- ===================== LECTEUR RADIO ===================== -->

    <div class="radio-bar">
        <div class="wrap">

            <audio id="dogplayer" onpause="etatRadio()" onplay="etatRadio()" preload="none">
                <source src="<?php echo $flux; ?>" type="audio/mpeg">
            </audio>

            <button type="button" class="play" id="btnPlay" onclick="basculeRadio()"
                    aria-label="<?php trans('lancer_radio'); ?>">&#9654;</button>

            <span class="onde" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i></span>

            <a href="#" target="_blank" rel="noopener" id="link_album" title="<?php trans('voir_album'); ?>">
                <img src="/blank_album_art.png" alt="" id="albumart" class="pochette-radio">
            </a>

            <div class="piste">
                <div class="titre" id="titrePiste">
                    <span id="metainfos">
                        <a href="#" id="link_artist" target="_blank" rel="noopener"></a>
                        <span id="sep_meta"></span>
                        <a href="#" id="link_song" target="_blank" rel="noopener"></a>
                    </span>
                    <span id="titre_repos"><?php trans('radio_titre_repos'); ?></span>
                </div>
                <div class="meta" id="metaPiste"><?php trans('radio_invite'); ?></div>
            </div>

            <a class="chip libre" id="chipLicence" style="margin-left:auto"
               href="licences.php" title="<?php trans('radio_licence_repos'); ?>">
                <span id="chipLicenceTexte"><?php trans('radio_chip_licence'); ?></span>
            </a>
            <a class="chip" href="<?php echo $flux; ?>" target="_blank" rel="noopener"><?php trans('radio_chip_flux'); ?></a>

        </div>
    </div>

    <!-- ===================== NOUVEAUX ALBUMS ===================== -->

    <section id="albums">
        <div class="wrap">
            <div class="titre-rang">
                <div>
                    <span class="eyebrow"><?php trans('albums_surtitre'); ?></span>
                    <h2><?php trans('nouveaux_albums'); ?></h2>
                </div>
                <a href="//play.dogmazic.net/browse.php?action=album" target="_blank" rel="noopener"><?php trans('tout_parcourir'); ?></a>
            </div>
            <ul class="grille-albums">
                <?php albumList(); ?>
            </ul>
        </div>
    </section>

    <!-- ===================== DERNIERS MORCEAUX ===================== -->

    <section id="morceaux">
        <div class="wrap">
            <div class="titre-rang">
                <div>
                    <span class="eyebrow"><?php trans('morceaux_surtitre'); ?></span>
                    <h2><?php trans('récemment_joué'); ?></h2>
                </div>
                <a href="//play.dogmazic.net/browse.php?action=song" target="_blank" rel="noopener"><?php trans('tout_parcourir'); ?></a>
            </div>
            <ul class="pistes">
                <?php recentlyPlayedList(); ?>
            </ul>
        </div>
    </section>

    <!-- ===================== TROIS FAÇONS D'ÉCOUTER ===================== -->

    <section id="ecouter">
        <div class="wrap">
            <span class="eyebrow"><?php trans('trois_surtitre'); ?></span>
            <h2 style="margin-bottom:26px"><?php trans('trois_titre'); ?></h2>
            <div class="trois">

                <div class="carte">
                    <span class="num"><?php trans('trois_1_num'); ?></span>
                    <h3><?php trans('trois_1_titre'); ?></h3>
                    <p><?php trans('trois_1_texte'); ?></p>
                    <a href="https://play.dogmazic.net" target="_blank" rel="noopener">play.dogmazic.net &rarr;</a>
                </div>

                <div class="carte">
                    <span class="num"><?php trans('trois_2_num'); ?></span>
                    <h3><?php trans('trois_2_titre'); ?></h3>
                    <p><?php trans('trois_2_texte'); ?></p>
                    <button type="button" id="apps_mobiles"><?php trans('trois_2_lien'); ?> &rarr;</button>
                </div>

                <div class="carte">
                    <span class="num"><?php trans('trois_3_num'); ?></span>
                    <h3><?php trans('trois_3_titre'); ?></h3>
                    <p><?php trans('trois_3_texte'); ?></p>
                    <a href="https://radio.dogmazic.net" target="_blank" rel="noopener">radio.dogmazic.net &rarr;</a>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== DOGMAZIC EN CHIFFRES ===================== -->

    <?php statsBlock(); ?>

    <!-- ===================== VIE DE L'ASSOCIATION ===================== -->

    <section id="vie">
        <div class="wrap">
            <div class="titre-rang">
                <div>
                    <span class="eyebrow"><?php trans('vie_surtitre'); ?></span>
                    <h2><?php trans('vie_titre'); ?></h2>
                </div>
            </div>

            <div class="vie">

                <div class="colonne">
                    <header>
                        <h3><?php trans('blog_colonne'); ?></h3>
                        <span class="source">musique-libre.org</span>
                    </header>
                    <?php lastBlogPosts(); ?>
                    <div class="pied-colonne">
                        <a href="https://www.musique-libre.org" target="_blank" rel="noopener"><?php trans('tous_articles'); ?></a>
                    </div>
                </div>

                <div class="colonne">
                    <header>
                        <h3><?php trans('forum_colonne'); ?></h3>
                        <span class="source">forum.musique-libre.org</span>
                    </header>
                    <?php lastPost(); ?>
                    <div class="pied-colonne">
                        <a href="https://forum.musique-libre.org" target="_blank" rel="noopener"><?php trans('ouvrir_forum'); ?></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== PUBLIER SA MUSIQUE ===================== -->

    <section id="publier">
        <div class="wrap">
            <span class="eyebrow"><?php trans('publier_surtitre'); ?></span>
            <h2 style="margin-bottom:22px"><?php trans('publier'); ?></h2>
            <div class="publier">
                <?php trans('pub_content'); ?>
            </div>
        </div>
    </section>

    <!-- ===================== L'ASSOCIATION ===================== -->

    <section id="association">
        <div class="wrap">
            <div class="asso">

                <div>
                    <span class="eyebrow"><?php trans('asso_surtitre'); ?></span>
                    <h2 style="margin-bottom:14px"><?php trans('asso_titre_court'); ?></h2>
                    <p><?php trans('asso_texte_court'); ?></p>
                    <p style="margin-bottom:0"><?php trans('asso_ag'); ?></p>
                </div>

                <div class="soutien" id="don">
                    <a class="btn plein" href="https://www.musique-libre.org" target="_blank" rel="noopener"><?php trans('adherer_titre'); ?></a>
                    <a class="btn" href="https://liberapay.com/Dogmazic/" target="_blank" rel="noopener"><?php trans('don_liberapay'); ?></a>
                    <a class="btn" href="https://www.paypal.com/donate?hosted_button_id=DPXFCDQGX2ZBC" target="_blank" rel="noopener"><?php trans('don_paypal'); ?></a>
                    <p class="fiscal"><?php trans('don_fiscal'); ?></p>

                    <div class="social-rang">
                        <?php foreach ($socials as $social): ?>
                            <a href="<?= $social['url']; ?>" target="_blank" rel="noopener<?= isset($social['rel']) ? ' ' . $social['rel'] : '' ?>">
                                <?= $social['name'][LANG]; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== PIED DE PAGE ===================== -->

    <footer>
        <div class="wrap">
            <div class="plan">

                <div>
                    <h4><?php trans('plan_ecouter'); ?></h4>
                    <ul>
                        <li><a href="//play.dogmazic.net/browse.php?action=artist" target="_blank" rel="noopener"><?php trans('Artists'); ?></a></li>
                        <li><a href="//play.dogmazic.net/browse.php?action=album" target="_blank" rel="noopener"><?php trans('Albums'); ?></a></li>
                        <li><a href="//play.dogmazic.net/browse.php?action=tag" target="_blank" rel="noopener"><?php trans('Tags'); ?></a></li>
                        <li><a href="//play.dogmazic.net/browse.php?action=label" target="_blank" rel="noopener"><?php trans('Labels'); ?></a></li>
                        <li><a href="//play.dogmazic.net/browse.php?action=playlist" target="_blank" rel="noopener"><?php trans('Playlists'); ?></a></li>
                        <li><a href="https://radio.dogmazic.net" target="_blank" rel="noopener"><?php trans('nav_radio'); ?></a></li>
                    </ul>
                </div>

                <div>
                    <h4><?php trans('plan_publier'); ?></h4>
                    <ul>
                        <li><a href="//play.dogmazic.net/register.php" target="_blank" rel="noopener"><?php trans('creer_compte'); ?></a></li>
                        <li><a href="//play.dogmazic.net/login.php" target="_blank" rel="noopener"><?php trans('Connexion'); ?></a></li>
                        <li><a href="#publier"><?php trans('publier'); ?></a></li>
                        <li><a href="licences.php"><?php trans('licences_page_titre'); ?></a></li>
                    </ul>
                </div>

                <div>
                    <h4><?php trans('plan_asso'); ?></h4>
                    <ul>
                        <li><a href="https://www.musique-libre.org" target="_blank" rel="noopener"><?php trans('site_asso'); ?></a></li>
                        <li><a href="https://www.musique-libre.org" target="_blank" rel="noopener"><?php trans('le_blog'); ?></a></li>
                        <li><a href="#don"><?php trans('adherer_titre'); ?></a></li>
                        <li><a href="#don"><?php trans('faire_un_don_titre'); ?></a></li>
                        <li><a href="https://musique-libre.org/contact/" target="_blank" rel="noopener"><?php trans('nous_ecrire'); ?></a></li>
                    </ul>
                </div>

                <div>
                    <h4><?php trans('plan_suivre'); ?></h4>
                    <ul>
                        <?php foreach ($socials as $cle => $social): ?>
                            <li>
                                <a href="<?= $social['url']; ?>" target="_blank" rel="noopener<?= isset($social['rel']) ? ' ' . $social['rel'] : '' ?>">
                                    <?= $social['name'][LANG]; ?><?= !empty($social['neuf']) ? '<span class="neuf">' . trans_r('nouveau') . '</span>' : '' ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <li><a href="https://www.musique-libre.org/feed/" target="_blank" rel="noopener"><?php trans('flux_rss'); ?></a></li>
                    </ul>
                </div>

            </div>

            <div class="legal">
                <p><?php trans('legal'); ?> <?php trans('mention_cookie'); ?></p>
                <!-- Mentions legales obligatoires : editeur et hebergeur (LCEN art. 6 III) -->
                <p class="mentions">
                    <?php trans('mentions_editeur'); ?><br>
                    <?php trans('mentions_hebergeur'); ?>
                </p>
            </div>
        </div>
    </footer>

    <!-- ===================== POPUP APPLIS MOBILES ===================== -->

    <div id="apps_mobiles_popup">
        <header>
            <h4 class="modal-title"><?php trans('apps_mobiles'); ?></h4>
            <button type="button">&times;</button>
        </header>
        <article>
            <p><?php trans('apps_mobiles_texte'); ?></p>
            <p><small><?php trans('apps_mobiles_texte_avert'); ?></small></p>
        </article>
        <footer>
            <button type="button" class="btn"><?php trans('fermer'); ?></button>
        </footer>
    </div>

    <script>
    /* ------------------------------------------------------------------
       Radio : un seul bouton pour lancer/arreter, l'etat est porte par la
       classe .joue sur <body> (fait tourner le disque et bouger le VU-metre).
       ------------------------------------------------------------------ */
    var lecteur = document.getElementById('dogplayer');

    function basculeRadio()
    {
        if (lecteur.paused) {
            lecteur.play();
        } else {
            lecteur.pause();
        }
    }

    function etatRadio()
    {
        var joue = !lecteur.paused;
        document.body.classList.toggle('joue', joue);
        var icone = joue ? '\u275A\u275A' : '\u25B6';
        document.getElementById('btnPlay').innerHTML   = icone;
        document.getElementById('badgePlay').innerHTML = icone;
        document.getElementById('metaPiste').innerHTML = joue
            ? <?= json_encode(trans_r('radio_en_direct')) ?>
            : <?= json_encode(trans_r('radio_invite')) ?>;
        rafraichitInfos();
    }

    var LICENCE_REPOS   = <?= json_encode(trans_r('radio_licence_repos')) ?>;
    var LICENCE_PREFIXE = <?= json_encode(trans_r('radio_licence_morceau')) ?>;

    /* Renseigne la puce de licence. Le nom est prefixe par « Ce morceau est
       sous licence… » : sans cette phrase, on croit lire la licence de la
       radio entiere alors qu'elle change a chaque morceau. */
    function majLicence(nom, url)
    {
        var puce = $('#chipLicence');
        if (nom) {
            puce.attr('title', LICENCE_PREFIXE.replace('{licence}', nom))
                .attr('href', url || 'licences.php');
        } else {
            puce.attr('title', LICENCE_REPOS).attr('href', 'licences.php');
        }
    }

    // Metadonnees du morceau en cours (endpoint de radio.dogmazic.net)
    var current_song_id = null;

    function rafraichitInfos()
    {
        if (document.hidden) {
            return;
        }
        if (lecteur.paused) {
            $('#metainfos').hide();
            $('#titre_repos').show();
            $('#albumart').attr('src', '/blank_album_art.png');
            majLicence('', '');
            return;
        }
        $.getJSON('https://radio.dogmazic.net/metadata.php?wanted=json', function (obj) {
            if (current_song_id == obj['title_id']) {
                return;
            }
            current_song_id = obj['title_id'];

            $('#link_album').attr('href', obj['album_url']);
            $('#albumart').attr('src', obj['label_img']);
            $('#link_artist').attr('href', obj['artist_url']).html(obj['artist']);
            $('#link_song').attr('href', obj['song_url']).html(obj['title']);
            $('#sep_meta').html(' &mdash; ');

            $('#titre_repos').hide();
            $('#metainfos').show();

            // Licence exacte du morceau en cours : le libelle de la puce ne
            // bouge pas (il tiendrait mal la place), c'est l'infobulle qui
            // donne le nom, et le lien mene au texte de la licence.
            majLicence(obj['license'], obj['license_url']);

            if ('mediaSession' in navigator) {
                navigator.mediaSession.metadata = new MediaMetadata({
                    title: obj['title'],
                    artist: obj['artist'],
                    album: obj['album'],
                    artwork: [
                        { src: obj['label_img'], sizes: '96x96',   type: 'image/png' },
                        { src: obj['label_img'], sizes: '256x256', type: 'image/png' }
                    ]
                });
            }
        });
    }

    etatRadio();
    setInterval(rafraichitInfos, 5000);
    document.addEventListener('visibilitychange', function () {
        if (document.visibilityState === 'visible') {
            rafraichitInfos();
        }
    });
    </script>

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
function get_rss_with_cache($name, $feed_url, $duree_cache=10)
{
    if (! is_dir(RSS_CACHE_DIR)) {
        mkdir(RSS_CACHE_DIR, 0700, true);
    }

    $cache_time = 60 * $duree_cache; // convertie la duree en seconde
    $cache_file = RSS_CACHE_DIR . $name;
    $timedif    = @(time() - filemtime($cache_file));

    // Si le fichiers est assez "jeune"
    if (file_exists($cache_file) && $timedif < $cache_time) {
        $string = file_get_contents($cache_file);

        // Sinon, on récupére le fichier
    } else {
        // Timeout, okazou
        $ctx = stream_context_create(
            [
      'http' => [
             'timeout' => 3
             ]
      ]
        );
        $string = file_get_contents("$feed_url", 0, $ctx);

        // On tente de parser le flux -> si on y arrive pas, on ne sauvegarde pas
        $xml = @simplexml_load_string($string);
        if ($xml === false) {
            // Et on tente de servir la version en cache...
            $string = file_get_contents($cache_file);

            return $string;
        }
        file_put_contents($cache_file, $string);
    }

    // if ($_SERVER["HTTP_X_FORWARDED_PROTO"] == "https") { // Fufroma
    //   $string = str_replace('http://play.dogmazic.net/image.php', 'https://play.dogmazic.net/image.php', $string);
    // }

    return $string;
}

/* Affiche les 10 derniers albums publiés*/

function albumList()
{
    $dom = new DOMDocument();
    if ($albums = get_rss_with_cache('play.dogmazic.net_latest_album', 'https://play.dogmazic.net/rss.php?type=latest_album')) {
        $dom->loadXML($albums);
        $dom->preserveWhiteSpace=false;
        $items                  = $dom->getElementsByTagName('item');
        $i                      = 0;
        $counter                =1;
        while (($item = $items->item($i++)) && $i <= 11) {

            $link        = $item->getElementsByTagName('link')->item(0)->nodeValue;
            $description = $item->getElementsByTagName('description')->item(0)->nodeValue;

            // Ampache < 7.4.0, rss got an <image> tag
            //$image = str_replace('https://', '//', $item->getElementsByTagName('image')->item(0)->nodeValue); // http and https available
            // Ampache >= 7.4.0, no more <image> tag
            parse_str(parse_url($link)['query'], $parsed);
            $album_id = $parsed['album'];

            $image    = "//play.dogmazic.net/image.php?object_id=" . $album_id . "&object_type=album&size=200x200";

            // <title> = le nom de l'album seul ; <description> = « Artiste - Album ».
            // On retire le suffixe pour isoler l'artiste, plutot que de couper
            // sur le premier tiret (un nom d'artiste peut en contenir un).
            $titreNode = $item->getElementsByTagName('title')->item(0);
            $album     = $titreNode ? trim($titreNode->nodeValue) : $description;

            $artiste = trim(preg_replace(
                '~\s*-\s*' . preg_quote($album, '~') . '\s*$~u',
                '',
                $description
            ));
            if ($artiste === $description) {
                $artiste = ''; // suffixe absent : on n'invente rien
            }

            echo '<li class="album"><a target="_blank" rel="noopener" href="' . htmlspecialchars($link) . '"'
               . ' title="' . htmlspecialchars($description) . '">'
               . '<span class="pochette"><img src="' . $image . '" alt="" loading="lazy"></span>'
               . '<p>' . htmlspecialchars($album) . '</p>'
               . ($artiste !== '' ? '<span class="par">' . htmlspecialchars($artiste) . '</span>' : '')
               . '</a></li>';
        }
    }
}

/* Affiche les 10 derniers albums joués */

function recentlyPlayedList()
{
    $dom = new DOMDocument();
    if ($albums = get_rss_with_cache('play.dogmazic.net_recently_played', 'https://play.dogmazic.net/rss.php?type=recently_played')) {
        $dom->loadXML($albums);
        $dom->preserveWhiteSpace=false;
        $items                  = $dom->getElementsByTagName('item');
        $i                      = 0;
        $counter                =1;
        while (($item = $items->item($i++)) && $i <= 11) {
            $link        = $item->getElementsByTagName('link')->item(0)->nodeValue;
            $description = $item->getElementsByTagName('title')->item(0)->nodeValue;

            $target_songID=-1;

            //we now parse the link provided by the RSS feed
            //If the link can't be parsed, the song id will
            //default to -1

            if (($parsed_url=parse_url($link)) !== false) {
                $parsed_url_pairs=explode("&", $parsed_url['query']);
                foreach ($parsed_url_pairs as $pair) {
                    $splited_pair=explode("=", $pair);
                    if ($splited_pair[0] == 'song_id' && is_numeric($splited_pair[1])) {
                        $target_songID=$splited_pair[1];
                    }
                }
            }
            $imagelink = 'https://radio.dogmazic.net/metadata_of_song.php?song_id=' . $target_songID . '&wanted=img_go';

            // Metadonnees structurees si Ampache les fournit, sinon repli sur le
            // decoupage du titre « Titre - Artiste - Album ».
            $desc_node = $item->getElementsByTagName('description')->item(0);
            $desc      = $desc_node ? $desc_node->nodeValue : '';

            $titre   = champ_rss($desc, ['Titre', 'Title']);
            $artiste = champ_rss($desc, ['Artiste', 'Artist']);

            if ($titre === '') {
                $morceaux = explode(' - ', $description, 3);
                $titre    = $morceaux[0];
                $artiste  = isset($morceaux[1]) ? $morceaux[1] : '';
            }

            echo '<li><a target="_blank" rel="noopener" href="' . htmlspecialchars($link) . '">'
               . '<span class="rang">' . $i . '</span>'
               . '<span class="vignette"><img id="recentlyPlayedImg-' . ($i - 1) . '" src="' . $imagelink . '" alt="" loading="lazy"></span>'
               . '<span class="quoi"><b>' . htmlspecialchars($titre) . '</b>'
               . '<span>' . htmlspecialchars($artiste) . '</span></span>'
               . '<span class="chip">' . trans_r('ecouter_sur_archive') . '</span>'
               . '<span class="ecouter">&#9654;</span>'
               . '</a></li>';
        }
    }
}




/*
 * Ampache range les metadonnees dans la description, en clair :
 *   <p>Titre: ...</p><p>Artiste: ...</p><p>Album: ...</p>
 * C'est bien plus fiable que de decouper le <title> sur les tirets, car un
 * titre de morceau ou un nom d'album peut lui-meme contenir « - ».
 * On accepte les libelles FR et EN, la langue depend du serveur Ampache.
 */
function champ_rss($description, array $libelles)
{
    foreach ($libelles as $libelle) {
        $motif = '~<p>\s*' . preg_quote($libelle, '~') . '\s*:\s*(.*?)</p>~is';
        if (preg_match($motif, $description, $m)) {
            return trim(html_entity_decode(strip_tags($m[1]), ENT_QUOTES, 'UTF-8'));
        }
    }

    return '';
}

/*
 * Date courte et lisible : « 6 août », « 6 Aug ».
 * On evite strftime (deprecie en PHP 8.1) et l'extension intl, pas garantie.
 */
function date_courte($date)
{
    $t = strtotime($date);
    if (!$t) {
        return '';
    }
    $mois = explode(',', trans_r('mois_courts'));
    $m    = (int) date('n', $t) - 1;

    return (int) date('j', $t) . ' ' . (isset($mois[$m]) ? $mois[$m] : date('M', $t));
}

/*
 * Coupe proprement une chaine UTF-8, sans couper un caractere en deux.
 * mbstring n'est pas garanti sur tous les hebergements : on prevoit le repli.
 */
function coupe($texte, $max)
{
    if (function_exists('mb_strlen')) {
        return (mb_strlen($texte, 'UTF-8') > $max)
            ? mb_substr($texte, 0, $max, 'UTF-8') . '...'
            : $texte;
    }
    if (strlen($texte) <= $max) {
        return $texte;
    }
    // Repli sans mbstring : on coupe sur une frontiere de caractere UTF-8.
    $coupe = substr($texte, 0, $max);

    return preg_replace('/[\x80-\xBF]*$|[\xC0-\xFF]$/', '', $coupe) . '...';
}

/*
 * Anciennete lisible : « il y a 3 j », « il y a 2 h »...
 * Plus parlant qu'une date brute pour du forum, ou c'est la fraicheur qui compte.
 */
function depuis($date_iso)
{
    $t = strtotime($date_iso);
    if (!$t) {
        return '';
    }
    $ecart = max(0, time() - $t);

    if ($ecart < 3600) {
        return strtr(trans_r('il_y_a_min'), ['{n}' => max(1, (int) ($ecart / 60))]);
    }
    if ($ecart < 86400) {
        return strtr(trans_r('il_y_a_h'), ['{n}' => (int) ($ecart / 3600)]);
    }
    if ($ecart < 2592000) {
        return strtr(trans_r('il_y_a_j'), ['{n}' => (int) ($ecart / 86400)]);
    }

    return date('d/m/Y', $t);
}

/* Affiche les 10 derniers sujets du forum */

function lastPost()
{
    // phpBB sert un flux Atom sur /feed (et NON /feed.php ni l'ancien /discussions/feed.rss)
    $target = 'https://forum.musique-libre.org/feed';

    $dom = new DOMDocument();
    if ($feed = get_rss_with_cache('musique-libre.org_feed', $target)) {

        $prev = libxml_use_internal_errors(true);
        $ok   = $dom->loadXML($feed);
        libxml_use_internal_errors($prev);
        if (!$ok) {
            return; // XML invalide : on n'affiche rien plutot que planter
        }
        $dom->preserveWhiteSpace = false;

        // Atom : <entry><title><link href="..."/><published>
        $entries = $dom->getElementsByTagName('entry');
        $i       = 0;   // index de parcours du flux
        $montres = 0;   // sujets reellement affiches
        $vus     = [];  // sujets deja affiches (dedoublonnage)
        // On parcourt jusqu'a 40 messages pour en sortir 5 sujets distincts :
        // un fil actif peut occuper plusieurs entrees d'affilee.
        while (($entry = $entries->item($i++)) && $montres < 5 && $i <= 40) {

            $titleNode = $entry->getElementsByTagName('title')->item(0);
            $title     = $titleNode ? $titleNode->nodeValue : '';

            // Le lien Atom est dans l'attribut href (on privilegie rel="alternate" ou sans rel)
            $link = '';
            foreach ($entry->getElementsByTagName('link') as $l) {
                $rel = $l->getAttribute('rel');
                if ($rel === '' || $rel === 'alternate') {
                    $link = $l->getAttribute('href');
                    break;
                }
                if ($link === '') {
                    $link = $l->getAttribute('href');
                }
            }

            // Date : <published> (fallback <updated>), format ISO 2026-07-14T14:56:28+02:00
            $dateNode = $entry->getElementsByTagName('published')->item(0);
            if (!$dateNode) {
                $dateNode = $entry->getElementsByTagName('updated')->item(0);
            }
            $pubdate = $dateNode ? $dateNode->nodeValue : '';

            // Auteur du message : <author><name>
            $auteur     = '';
            $authorNode = $entry->getElementsByTagName('author')->item(0);
            if ($authorNode) {
                $nameNode = $authorNode->getElementsByTagName('name')->item(0);
                $auteur   = $nameNode ? $nameNode->nodeValue : '';
            }

            // phpBB titre ses entrees « Nom du forum • Re: Titre du sujet ».
            // Le nom du forum est aussi dans <category term="...">, on l'enleve
            // du titre pour l'afficher a part, et on retire le « Re: ».
            $forum   = '';
            $catNode = $entry->getElementsByTagName('category')->item(0);
            if ($catNode) {
                $forum = trim($catNode->getAttribute('term'));
            }

            $sujet = $title;
            if ($forum !== '' && strpos($sujet, $forum) === 0) {
                $sujet = ltrim(substr($sujet, strlen($forum)), " \t\xe2\x80\xa2•");
            }
            $sujet = preg_replace('~^\s*Re\s*:\s*~i', '', trim($sujet));

            // Le lien pointe sur le MESSAGE (viewtopic.php?p=NNN), jamais sur le
            // sujet : impossible de dedoublonner sur l'URL. On se rabat sur le
            // titre du sujet, une fois le « Re: » retire.
            $cle = function_exists('mb_strtolower') ? mb_strtolower($sujet, 'UTF-8') : strtolower($sujet);
            if ($cle === '' || isset($vus[$cle])) {
                continue; // deja affiche : on passe a l'entree suivante
            }
            $vus[$cle] = true;
            $montres++;

            $contexte = [];
            if ($forum !== '') {
                $contexte[] = $forum;
            }
            if ($auteur !== '') {
                $contexte[] = strtr(trans_r('dernier_message_de'), ['{qui}' => $auteur]);
            }

            echo '<a class="sujet" target="_blank" rel="noopener" href="' . htmlspecialchars($link) . '">'
               . '<span class="titre">' . htmlspecialchars($sujet) . '</span>'
               . '<span class="quand">' . htmlspecialchars(depuis($pubdate)) . '</span>'
               . ($contexte ? '<span class="qui">' . htmlspecialchars(implode(' · ', $contexte)) . '</span>' : '')
               . '</a>';
        }
    }
}

/* Affiche les 10 posts do blog */

function lastBlogPosts()
{
    $dom = new DOMDocument();
    if ($blogPosts = get_rss_with_cache('musique-libre.org_blog', 'http://musique-libre.org/feed/')) {
        $dom->loadXML($blogPosts);
        $dom->preserveWhiteSpace=false;
        $items                  = $dom->getElementsByTagName('item');
        $i                      = 0;
        while (($item = $items->item($i++)) && $i <= 5) {
            $title   = $item->getElementsByTagName('title')->item(0)->nodeValue;
            $pubDate = date_courte($item->getElementsByTagName('pubDate')->item(0)->nodeValue);
            $link    = $item->getElementsByTagName('link')->item(0)->nodeValue;

            // Le premier article passe a la une : date, gros titre, chapeau, categories.
            if ($i === 1) {
                $desc = $item->getElementsByTagName('description')->item(0);
                $desc = $desc ? trim(strip_tags($desc->nodeValue)) : '';
                $desc = coupe($desc, 260);

                $cats = '';
                foreach ($item->getElementsByTagName('category') as $n => $cat) {
                    if ($n >= 3) {
                        break;
                    }
                    $cats .= '<span class="chip">' . htmlspecialchars($cat->nodeValue) . '</span> ';
                }

                echo '<a class="billet-une" target="_blank" rel="noopener" href="' . htmlspecialchars($link) . '">'
                   . '<span class="date">' . htmlspecialchars($pubDate) . '</span>'
                   . '<h4>' . htmlspecialchars($title) . '</h4>'
                   . ($desc ? '<p>' . htmlspecialchars($desc) . '</p>' : '')
                   . ($cats ? '<span class="etiquettes">' . $cats . '</span>' : '')
                   . '</a>';
                continue;
            }

            echo '<a class="billet" target="_blank" rel="noopener" href="' . htmlspecialchars($link) . '">'
               . '<span class="date">' . htmlspecialchars($pubDate) . '</span>'
               . '<span class="titre">' . htmlspecialchars($title) . '</span></a>';
        }
    }
}

//Ajax hook
if (isset($_GET['get']) && $_GET['get'] === 'nowplaying') {
    $hasdisplayed=false;
    $dom         = new DOMDocument();
    if ($albums = file_get_contents('//play.dogmazic.net/rss.php')) {
        $dom->loadXML($albums);
        $dom->preserveWhiteSpace=false;
        $items                  = $dom->getElementsByTagName('item');
        $i                      = 0;
        while (($item = $items->item($i++)) && $i <= 10) {
            $hasdisplayed=true;
            $title       = $item->getElementsByTagName('title')->item(0)->nodeValue;
            $description = $item->getElementsByTagName('description')->item(0)->nodeValue;
            $link        = $item->getElementsByTagName('link')->item(0)->nodeValue;
            echo '<a style="border:solid 1px black;" target="new" href="' . $link . '" class="list-group-item">' . htmlspecialchars($description) . '</a></li>';
        }
    }
    if (!$hasdisplayed) {
        echo '...';
    }
    exit();
}


?>
