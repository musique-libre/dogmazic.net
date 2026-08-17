<?php

/*
 * Pied de page legal, commun a toutes les pages.
 * La page d'accueil ajoute par-dessus son plan du site et sa scene finale.
 */
?>
<div class="legal">
    <p><?php trans('legal'); ?> <?php trans('mention_cookie'); ?></p>
    <!-- Mentions legales obligatoires : editeur et hebergeur (LCEN art. 6 III) -->
    <p class="mentions">
        <?php trans('mentions_editeur'); ?><br>
        <?php trans('mentions_hebergeur'); ?>
    </p>
</div>
