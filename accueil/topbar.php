<?php

/*
 * Barre haute commune a toutes les pages du site.
 *
 * Avant de l'inclure, on peut definir :
 *   $topbar_ici    la page courante ('accueil', 'licences', 'irc'...) pour
 *                  mettre le lien correspondant en surbrillance
 *   $topbar_stats  false pour masquer le bandeau de statistiques
 *
 * Elle etait auparavant recopiee dans chaque page : toute correction devait
 * etre faite en trois endroits, et la page irc/ avait fini par diverger
 * completement.
 */

$topbar_ici   = isset($topbar_ici) ? $topbar_ici : '';
$topbar_stats = isset($topbar_stats) ? $topbar_stats : true;
?>
<div class="topbar">
    <div class="wrap">

        <a class="marque" href="/" title="Dogmazic">DOGMA<span>ZIC</span></a>

        <nav class="galaxie-liens" aria-label="<?php trans('nav_galaxie'); ?>">
            <a href="/" class="<?= $topbar_ici === 'accueil' ? 'ici' : '' ?>"><?php trans('nav_accueil'); ?></a>
            <a href="https://play.dogmazic.net" target="_blank" rel="noopener"><?php trans('nav_archive'); ?></a>
            <a href="https://radio.dogmazic.net" target="_blank" rel="noopener"><?php trans('nav_radio'); ?></a>
            <a href="https://www.musique-libre.org" target="_blank" rel="noopener"><?php trans('nav_asso'); ?></a>
        </nav>

        <?php
        if ($topbar_stats) {
            include_once(HOME_PATH . DS . 'stats.php');
            statsBandeau();
        }
?>

        <div class="langues" <?= $topbar_stats ? '' : 'style="margin-left:auto"' ?>>
            <a href="?lang=fr" class="<?= LANG === 'fr' ? 'ici' : '' ?>" lang="fr" hreflang="fr">FR</a>
            <a href="?lang=en" class="<?= LANG === 'en' ? 'ici' : '' ?>" lang="en" hreflang="en">EN</a>
        </div>

        <a class="recherche-mini" href="//play.dogmazic.net/search.php?type=song"
           target="_blank" rel="noopener"
           title="<?php trans('Rechercher'); ?>">
            <img src="<?= IMG_PATH . '/loupe_blanche.png' ?>" alt="<?php trans('Rechercher'); ?>">
        </a>

        <a class="connexion" href="//play.dogmazic.net/login.php" target="_blank" rel="noopener"><?php trans('Connexion'); ?></a>

    </div>
</div>
