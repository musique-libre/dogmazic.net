<?php

/*
 * Tableau des licences libres et ouvertes de Dogmazic.
 * -------------------------------------------------------------------------
 * Transcription de l'image historique publiee sur le blog de l'association.
 *
 * Codes utilises dans les colonnes de droits :
 *   O = oui
 *   K = oui, avec obligation de reciprocite (copyleft)
 *   R = oui, avec reciprocite « copyfarleft » (Peer Production)
 *   N = non
 *   A = oui, mais avec l'accord prealable de l'auteur
 *   C = oui, sous conditions
 *   ? = non renseigne dans le tableau d'origine
 *
 * L'ordre des colonnes suit celui du tableau original :
 *   libre, reciprocite,
 *   modification privee, distribution privee, diffusion privee,
 *   usage commercial, modification commerciale, distribution commerciale,
 *   diffusion commerciale,
 *   propagation de la licence, responsabilite et garanties, paternite
 *
 * 'obsolete' => true correspond aux *** du tableau : licence mise a jour par
 * son auteur, remplacee par un equivalent, ou dont le texte n'est plus en ligne.
 */

$licences_colonnes = [
    'libre'          => ['fr' => 'Licence libre',              'en' => 'Free licence'],
    'reciprocite'    => ['fr' => 'Licence à réciprocité',      'en' => 'Reciprocal licence'],
    'mod_privee'     => ['fr' => 'Modification privée',        'en' => 'Private modification'],
    'dist_privee'    => ['fr' => 'Distribution privée',        'en' => 'Private distribution'],
    'diff_privee'    => ['fr' => 'Diffusion privée',           'en' => 'Private broadcast'],
    'usage_com'      => ['fr' => 'Usage commercial',           'en' => 'Commercial use'],
    'mod_com'        => ['fr' => 'Modification commerciale',   'en' => 'Commercial modification'],
    'dist_com'       => ['fr' => 'Distribution commerciale',   'en' => 'Commercial distribution'],
    'diff_com'       => ['fr' => 'Diffusion commerciale',      'en' => 'Commercial broadcast'],
    'propagation'    => ['fr' => 'Propagation de la licence',  'en' => 'Licence propagation'],
    'garanties'      => ['fr' => 'Responsabilité et garanties de l\'auteur', 'en' => 'Author\'s liability and warranties'],
    'paternite'      => ['fr' => 'Paternité',                  'en' => 'Attribution'],
];

/* Raccourci : une ligne = [nom, code libre, code reciprocite, puis les 10 droits] */
function lic($nom, $droits, $lien = '', $trads = [], $obsolete = false)
{
    $cles = ['libre','reciprocite','mod_privee','dist_privee','diff_privee','usage_com',
             'mod_com','dist_com','diff_com','propagation','garanties','paternite'];

    return [
        'nom'      => $nom,
        'droits'   => array_combine($cles, str_split($droits)),
        'lien'     => $lien,
        'trads'    => $trads,
        'obsolete' => $obsolete,
    ];
}

$cc = 'https://creativecommons.org/licenses/';

$licences = [
    // --- Licences libres non Creative Commons ---------------------------
    lic('Licence Art Libre',            'KNOOOOOOOOOO', 'https://artlibre.org/licence/lal/', ['en' => 'https://artlibre.org/licence/lal/en/']),
    lic('Ethymonics Free Music Licence','KNOOOOOOOOOO', 'http://www.ethymonics.co.uk/fml.html'),
    lic('EFF Open Audio Licence',       'KNOOOOOOOOOO'),
    lic('Open Music Licence – Green',   'ONOOOOOOOOOO', 'http://openmusic.linuxtag.org/modules/freecontent/content/gomlicense.html'),
    lic('Open Music Licence – Yellow',  'NNOOOAAAANOO', 'http://openmusic.linuxtag.org/modules/freecontent/content/yomlicense.html'),
    lic('Free Music Public Licence',    'KNOOOOOOOOOO', 'https://web.archive.org/web/20130918003325/http://fmpl.org/'),
    lic('Open Source Music Licence',    'ONOOOOOOOOOO', 'https://web.archive.org/web/20140518054748/http://www.opensourcemusic.org/'),
    lic('Licence Musique Libre',        'KNOOOOOOOOOO'),
    lic('GNU GPL (GNUArt)',             'ONOOOOOOOOOO', 'http://gnuart.org/francais/gnugpl.html', ['fr' => 'http://gnuart.org/francais/gnugpl.html']),
    lic('IANG',                         'KNOOOOOOOOOO', 'http://iang.info/fr/license.html'),
    lic('C reaction',                   'NNOOONNNNOOO', 'http://morne.free.fr/Necktar7/creationfr.htm'),
    lic('Cogito Arcanum 2.0',           'NNOOOAAAAOOO', 'https://archive.org/details/Licence-Cogito-Arcanum-2.0'),
    lic('WTFPL',                        'NNOOOOOOONNN', 'http://www.wtfpl.net/', ['fr' => 'http://www.wtfpl.net/txt/copying/']),
    lic('Peer Production Licence',      'NROOOCCCCOOO', 'https://wiki.p2pfoundation.net/Peer_Production_License'),
    lic('Demerdenzicht Licence',        'NNOOOOOOONNN', 'http://la.buvette.org/fmbl/Demerdenzicht-Licence.txt'),
    lic('Domaine Public',               'NNOOOOOOONOO'),

    // --- Creative Commons 2.0 -------------------------------------------
    lic('Creative Commons - by 2.0',       'ONOOOOOOONOO', $cc . 'by/2.0/fr/',       ['fr' => $cc . 'by/2.0/fr/']),
    lic('Creative Commons - by-sa 2.0',    'ONOOOOOOOOOO', $cc . 'by-sa/2.0/fr/',    ['fr' => $cc . 'by-sa/2.0/fr/']),
    lic('Creative Commons - by-nc 2.0',    'NNOOOAAAANOO', $cc . 'by-nc/2.0/fr/',    ['fr' => $cc . 'by-nc/2.0/fr/']),
    lic('Creative Commons - by-nd 2.0',    'NNOOOOAOONOO', $cc . 'by-nd/2.0/fr/',    ['fr' => $cc . 'by-nd/2.0/fr/']),
    lic('Creative Commons - by-nc-sa 2.0', 'NNOOOAAAAOOO', $cc . 'by-nc-sa/2.0/fr/', ['fr' => $cc . 'by-nc-sa/2.0/fr/']),
    lic('Creative Commons - by-nc-nd 2.0', 'NNOOOAAAANOO', $cc . 'by-nc-nd/2.0/fr/', ['fr' => $cc . 'by-nc-nd/2.0/fr/']),

    // --- Creative Commons 2.5 -------------------------------------------
    lic('Creative Commons - by 2.5',       'ONOOOOOOONOO', $cc . 'by/2.5/',       ['fr' => $cc . 'by/2.5/deed.fr']),
    lic('Creative Commons - by-sa 2.5',    'ONOOOOOOOOOO', $cc . 'by-sa/2.5/',    ['fr' => $cc . 'by-sa/2.5/deed.fr']),
    lic('Creative Commons - by-nc 2.5',    'NNOOOAAAANOO', $cc . 'by-nc/2.5/',    ['fr' => $cc . 'by-nc/2.5/deed.fr']),
    lic('Creative Commons - by-nd 2.5',    'NNOOOAAAANOO', $cc . 'by-nd/2.5/',    ['fr' => $cc . 'by-nd/2.5/deed.fr']),
    lic('Creative Commons - by-nc-sa 2.5', 'NNOOOAAAAOOO', $cc . 'by-nc-sa/2.5/', ['fr' => $cc . 'by-nc-sa/2.5/deed.fr']),
    lic('Creative Commons - by-nc-nd 2.5', 'NNOOOAAAANOO', $cc . 'by-nc-nd/2.5/', ['fr' => $cc . 'by-nc-nd/2.5/deed.fr']),

    // --- Creative Commons 3.0 -------------------------------------------
    lic('Creative Commons - by 3.0',       'ONOOOOOOONOO', $cc . 'by/3.0/',       ['fr' => $cc . 'by/3.0/deed.fr']),
    lic('Creative Commons - by-sa 3.0',    'ONOOOOOOOOOO', $cc . 'by-sa/3.0/',    ['fr' => $cc . 'by-sa/3.0/deed.fr']),
    lic('Creative Commons - by-nc 3.0',    'NNOOOAAAANOO', $cc . 'by-nc/3.0/',    ['fr' => $cc . 'by-nc/3.0/deed.fr']),
    lic('Creative Commons - by-nd 3.0',    'NNOOOAAAANOO', $cc . 'by-nd/3.0/',    ['fr' => $cc . 'by-nd/3.0/deed.fr']),
    lic('Creative Commons - by-nc-sa 3.0', 'NNOOOAAAAOOO', $cc . 'by-nc-sa/3.0/', ['fr' => $cc . 'by-nc-sa/3.0/deed.fr']),
    lic('Creative Commons - by-nc-nd 3.0', 'NNOOOAAAANOO', $cc . 'by-nc-nd/3.0/', ['fr' => $cc . 'by-nc-nd/3.0/deed.fr']),

    // --- Creative Commons 4.0 -------------------------------------------
    lic('Creative Commons - by 4.0',       'ONOOOOOOOOOO', $cc . 'by/4.0/',       ['fr' => $cc . 'by/4.0/deed.fr']),
    lic('Creative Commons - by-sa 4.0',    'KNOOOOOOOOOO', $cc . 'by-sa/4.0/',    ['fr' => $cc . 'by-sa/4.0/deed.fr']),
    lic('Creative Commons - by-nc 4.0',    'NNOOOAAAANOO', $cc . 'by-nc/4.0/',    ['fr' => $cc . 'by-nc/4.0/deed.fr']),
    lic('Creative Commons - by-nd 4.0',    'NNOOOAAAANOO', $cc . 'by-nd/4.0/',    ['fr' => $cc . 'by-nd/4.0/deed.fr']),
    lic('Creative Commons - by-nc-sa 4.0', 'NNOOOAAAAOOO', $cc . 'by-nc-sa/4.0/', ['fr' => $cc . 'by-nc-sa/4.0/deed.fr']),
    lic('Creative Commons - by-nc-nd 4.0', 'NNOOOAAAANOO', $cc . 'by-nc-nd/4.0/', ['fr' => $cc . 'by-nc-nd/4.0/deed.fr']),

    // --- Creative Commons 0 ---------------------------------------------
    lic('Creative Commons 0', 'NNOOOOOOONNN', 'https://creativecommons.org/publicdomain/zero/1.0/',
        ['en' => 'https://creativecommons.org/publicdomain/zero/1.0/deed.en']),

    // --- Licences obsoletes (*** dans le tableau d'origine) --------------
    lic('Creative Commons - Public Domain',                 'NNOOOOOOONOO', 'https://creativecommons.org/licenses/publicdomain/', [], true),
    lic('Creative Commons - Developing Nations 2.0',        'NNOOOOOOOOOO', 'https://creativecommons.org/licenses/devnations/2.0/', [], true),
    lic('Creative Commons - Sampling 1.0',                  'NNOOOOOOONOO', 'https://creativecommons.org/licenses/sampling/1.0/', [], true),
    lic('Creative Commons - Sampling Plus 1.0',             'NNOOO?AAAOOO', 'https://creativecommons.org/licenses/sampling+/1.0/', [], true),
    lic('Creative Commons - NonCommercial Sampling Plus 1.0','NNOOOAAAAOOO', 'https://creativecommons.org/licenses/nc-sampling+/1.0/', [], true),
];
