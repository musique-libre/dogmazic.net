<?php

/*
 * Reseaux de l'association, affiches sous les boutons de don et dans le
 * pied de page. Ajouter une entree ici suffit, les deux endroits suivent.
 *
 * 'neuf' => true affiche un badge « nouveau » dans le pied de page.
 * 'rel'  => 'me' sert a la verification de lien cote Mastodon.
 */
$socials = [
  'bluesky' => [
    'name' => [
      'fr' => 'Bluesky',
      'en' => 'Bluesky',
    ],
    'url'  => 'https://bsky.app/profile/dogmazic.bsky.social',
    'rel'  => 'me',
    'neuf' => true,
  ],
  'mastodon' => [
    'name' => [
      'fr' => 'Mastodon',
      'en' => 'Mastodon',
    ],
    'url' => 'https://framapiaf.org/@dogmazic',
    'rel' => 'me',
  ],
  'forum' => [
    'name' => [
      'fr' => 'Le forum',
      'en' => 'The forum',
    ],
    'url' => 'https://forum.musique-libre.org',
  ],
  'chat_irc' => [
    'name' => [
      'fr' => 'Chat IRC',
      'en' => 'IRC chatroom',
    ],
    'url' => '/irc/',
  ],
  'contact' => [
    'name' => [
      'fr' => 'Contact',
      'en' => 'Contact',
    ],
    'url' => 'https://musique-libre.org/contact/',
  ],
];
