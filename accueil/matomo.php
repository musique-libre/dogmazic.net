<?php

/*
 * Mesure d'audience Matomo, auto-hebergee par l'association.
 *
 * Configuration volontairement minimale et sans cookie :
 *
 *  - disableCookies : Matomo ne depose AUCUN cookie. C'est ce qui permet de
 *    se passer d'un bandeau de consentement. La CNIL exempte la mesure
 *    d'audience de consentement lorsqu'elle sert uniquement a produire des
 *    statistiques anonymes pour l'editeur, sans recoupement ni transmission
 *    a des tiers. Contrepartie : un visiteur qui revient est compte comme
 *    un nouveau visiteur, les chiffres de "visiteurs uniques" sont donc
 *    approximatifs. Pour une association, c'est un echange qui vaut le coup.
 *
 *  - setDoNotTrack : les navigateurs qui envoient l'en-tete Do Not Track
 *    ne sont pas comptes du tout.
 *
 * Cote serveur Matomo, il reste a verifier deux reglages pour rester dans
 * le cadre de l'exemption : l'anonymisation d'au moins 2 octets de l'adresse
 * IP, et une duree de conservation des donnees d'au plus 25 mois.
 *
 * Pour desactiver completement le suivi : vider MATOMO_URL dans ini.php.
 */

if (!defined('MATOMO_URL') || MATOMO_URL === '') {
    return;
}
?>
<script>
var _paq = window._paq = window._paq || [];
_paq.push(['disableCookies']);
_paq.push(['setDoNotTrack', true]);
_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);
(function () {
    var u = <?= json_encode(MATOMO_URL) ?>;
    _paq.push(['setTrackerUrl', u + 'matomo.php']);
    _paq.push(['setSiteId', <?= json_encode(MATOMO_SITE_ID) ?>]);
    var d = document,
        g = d.createElement('script'),
        s = d.getElementsByTagName('script')[0];
    g.async = true;
    g.src = u + 'matomo.js';
    s.parentNode.insertBefore(g, s);
})();
</script>
<noscript><p><img referrerpolicy="no-referrer-when-downgrade"
    src="<?= htmlspecialchars(MATOMO_URL) ?>matomo.php?idsite=<?= htmlspecialchars(MATOMO_SITE_ID) ?>&amp;rec=1"
    style="border:0" alt="" width="1" height="1"></p></noscript>
