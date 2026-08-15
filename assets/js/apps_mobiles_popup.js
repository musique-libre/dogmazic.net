/*
 * Fenetre « Applis mobiles ».
 * Reecrit pour la refonte : l'ancienne version ciblait « main > header
 * #apps_mobiles », un selecteur qui n'existe plus, et animait la propriete
 * top alors que le CSS centre desormais la boite avec transform.
 * Plus de jQuery ici : la classe .ouvert suffit, la transition est en CSS.
 */
(function () {
    var boite = document.getElementById('apps_mobiles_popup');
    if (!boite) {
        return;
    }

    function ouvre() {
        boite.classList.add('ouvert');
        var fermeture = boite.querySelector('button');
        if (fermeture) {
            fermeture.focus();
        }
    }

    function ferme() {
        boite.classList.remove('ouvert');
    }

    document.querySelectorAll('#apps_mobiles, #logo_mobile').forEach(function (el) {
        el.addEventListener('click', ouvre);
    });

    boite.querySelectorAll('button').forEach(function (b) {
        b.addEventListener('click', ferme);
    });

    // Fermeture au clic hors de la boite, et a la touche Echap.
    document.addEventListener('click', function (e) {
        if (boite.classList.contains('ouvert')
            && !boite.contains(e.target)
            && !e.target.closest('#apps_mobiles, #logo_mobile')) {
            ferme();
        }
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            ferme();
        }
    });
})();
