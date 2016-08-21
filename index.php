<?php
if (isset($_GET['lang'])){
    $lang=$_GET['lang'];
}
else{
    $lang='fr';
}

$trans['ecouter']['fr']='Écouter';
$trans['ecouter']['en']='Listen';

$trans['publier']['fr']='Publier votre musique';
$trans['publier']['en']='Upload your music';

$trans['gotaccount']['fr']='Je suis connecté, upload';
$trans['gotaccount']['en']='I am loggued, upload';

$trans['forum']['fr']='Forum';
$trans['forum']['en']='Forum';

$trans['chat']['fr']='Chat';
$trans['chat']['en']='Chat';



$trans['intro_asso']['fr']='Depuis 2004 l\'association Musique Libre propose aux mélomanes et aux artistes son archive musicale comptant maintenant plus de 50 000 titres, provenant de projets musicaux du monde entier, et tous placés sous licence libre ou ouverte. Financée exclusivement par les adhésions et les dons, Musique Libre est une association à but non lucratif.';
$trans['intro_asso']['en']='Since 2004, the Musique Libre volunteer organisation provides to listeners and musicians its music archive with now more than 50 000 tracks, coming from the entire world, all of them available under various free or open licenses. Funded exclusively by donations and memberships, Musique Libre is a non-for-profit organisation.';

$trans['acces_archive']['fr']='Accéder à l\'archive';
$trans['acces_archive']['en']='Browse the archive';

$trans['apps_mobiles']['fr']='Applis mobiles';
$trans['apps_mobiles']['en']='Mobile apps';

$trans['apps_mobiles_texte']['fr']='Le nouveau Dogmazic est compatible avec toutes les applications supportant les APIs standards de Subsonic ou Ampache (oui, oui, même celles sur votre smart TV). Recherchez simplement une application compatible Ampache ou Subsonic dans celles disponibles sur votre système, et entrez <strong>play.dogmazic.net</strong> comme adresse de serveur.';
$trans['apps_mobiles_texte']['en']='The new Dogmazic is compatible with any application supporting the standard Ampache or Subsonic APIs (yes, even on your smart TV). Just search for a Subsonic or Ampache compatible application among the ones available for your device, and type in <strong>play.dogmazic.net</strong> as the server address.';

$trans['apps_mobiles_texte_avert']['fr']='Notez que la plupart, sinon toutes les applications mobiles compatibles Ampache ou Subsonic, demandent que vous possédiez un compte sur notre serveur. Si vous n\'en avez pas déjà créé un, vous pouvez le faire <a href="http://play.dogmazic.net/register.php">ici</a>.';
$trans['apps_mobiles_texte_avert']['en']='Please note that most, if not any, mobile application compatible with Ampache and Subsonic will require that you have an account on our server. If you have not already created one, you can do so <a href="http://play.dogmazic.net/register.php">here</a>.';

$trans['nouveaux_albums']['fr']='Nouveaux albums';
$trans['nouveaux_albums']['en']='Latest releases';

$trans['nouveaux_commentaires']['fr']='Nouveaux commentaires';
$trans['nouveaux_commentaires']['en']='Latest comments';

$trans['adherer_titre']['fr']='Adhérer à l\'asso';
$trans['adherer_titre']['en']='Join the non-for-profit association';

$trans['adherer_texte']['fr']='Plus nous serons nombreux dans l\'association, et plus notre parole aura de poids pour représenter les musiciens sous licence libre ou ouverte et leurs auditeurs auprès des acteurs de l\'industrie musicale.<br/>En rejoignant l\'association, vous serez conviés à nos assemblées générales qui ont lieu via internet, et vous pourrez voter pour les prises de décision. <br/>L\'adhésion pour les personnes physiques se monte à 10 euros par an, et pour les personnes morales (associations, entreprises) à 50 euros par an. <br/>Pour nous rejoindre ou renouveler votre adhésion, utilisez les boutons de don ci-dessous en indiquant "adhésion" dans les commentaires de la transaction, où envoyez un chèque (émis par une banque française uniquement), accompagné d\'une lettre indiquant que vous voulez adhérer ou renouveler votre adhésion, à l\'adresse mentionnée ci-dessous.';
$trans['adherer_texte']['en']='The more people there will be in the volunteer organisation, the louder we will be heard representing musicians using free or open licenses and their listeners toward corporate actors of the music industry.<br/>By joining the non-for-profit association, you will be invited to join our general meetings that take place over the internet, and you will be able to vote for decision taking. <br/>Membership for natural persons is costing 10 euros a year, and for legal persons (organisations, companies) it is 50 euros per year. <br/>To join us or renew your membership, use the donation buttons below, indicating "membership" in the comment of the money transfer, or send a check (drawn on a French bank only), along with a letter indicating you want to join or renew, to the address mentioned below.';

$trans['faire_un_don_titre']['fr']='Dogmazic a besoin de vous !';
$trans['faire_un_don_titre']['en']='Dogmazic needs you!';

$trans['faire_un_don_texte']['fr']='En Juillet 2016 l\'association <em><strong>Musique Libre</strong></em> présente un rapport matériel et moral pour l\'année en cours et la précédente. <a href="http://musique-libre.org/blog/2016/08/19/ag-2016-compte-rendu/">Lire le rapport de l\'assemblée générale de l\'association</a><br/>Nous avons plus que jamais besoin de votre soutien pour assurer la pérénité du projet porté par Dogmazic / Musique Libre, notamment pour assurer les capacités du site à répondre à la demande, des mélomanes comme des musiciens.<br/>Pour les résidents fiscaux en France : Musique Libre étant reconnue association d\'intérêt général, vos dons sont déductibles de vos impôts à hauteur de 66% (donner 20 euros vous coûte 6,80 euros). Vous recevrez un reçu fiscal courant avril de l\'année suivant celle de votre don.
    <h4>Faire un don via Paypal</h4><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="TGZABWN33JJ5C">
<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>
<h4>Faire un don par chèque</h4>
Envoyez votre chèque (émis par une banque française uniquement) à l\'adresse suivante : <br/>
<address>Association <strong>Musique Libre !</strong><br/>
3, rue Burdeau 69001 Lyon<br/>France</address>
<h4>Faire un don via Flattr</h4>
<a href="https://flattr.com/profile/dogmazic"><img src="data:image/jpeg;base64,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A8MMxsmlPTjW0/dbT91rbAgc3nc5BjEx9VKLegg9n7rgoeZ+6GMSef8Autp+63n7refut5+63n7ocx7n5otYgSuJM0zeX10pQncAXrW8/dbT91JIZE4HN53DiNCCRp2QPI9mu6Z+63n7pwoXPdpCi5JCxkciyIkYdTmUzsR8JP3W8/dIPnIRHTGaCD/qb//aAAwDAQACAAMAAAAQ88888888888888888888888888888888888888888888888888888888888888888888888888888888888888c6AAAAF8884488408408888884ww8840888888888yjAAAAF7u8sCCCCSUgAU888888qCC8ooE88888888XhANOAD/AA/vIgjkMMnAAFPPPPPPKgoPKCENPPPMMPPBgEenxPyQ6aCBNPPPPAAFOAAAJFPgohgKEsHIAsMvPKwwfPM/IA4KIlEssstAAFMvPAgiugluAKANNAAjCPPAA1fItPCA6KAgggggvAAFNCDDAhvgqvKKFPPKAvPPPAgxXY1howqKAgJDDDHAABCAhCAlPgovKKAPPAgvPPPABm4QEoAB9KAlPPPPPAAAAhFLAlOgoOIKBENAgvPPPFH4QQQQR0PKAlPPPPPCAALAgggluCglBIAgnCglPPPPIPPPPLkfPLLDPPPPPLDHLDDDjjPHDHHPLDPDDPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP/EABsRAAICAwEAAAAAAAAAAAAAAAFQETEQIGAh/9oACAEDAQE/EOWFBetttEYBIijEB4bQEBKCnAIQE2wSA6AARizJmU4S1WGSJhQA04NqQYAIlWQAA2ABHb//xAAhEQABBAEDBQAAAAAAAAAAAAABABARUDEgIUFgYXBx8P/aAAgBAgEBPxDpYBJLhun/AP5cqdlIECCQVhRtCAbw1QQbIKMLsdSI0uAAIkIwEgDFzEuKNAAA+3tsbj4p+AAAAbG2+1BAAEENAJkUFAkuBAqIACQIM5EdWBAKMALuRHxMgIAASSSIA//EACwQAAECBAYCAQQCAwAAAAAAAAEAERAgITEwQEFRYfBxoYFQkbHRgPFgweH/2gAIAQEAAT8Q/iiwVU+CPH+DmyOsa2dWzCjSlKUpShBJMlCBLNwcGi6v3IQWYm8Ow8MMMNIBAqHMMMAyNHyFD9H005MUSIC0l6MHJTBqEHIwbwCIuAe+UR/bI1bbNziuIADUDc/UHVi7mM5aADTQJCN7ATwBsRmUGABGBh9jQiF9oG/IyAoYvQBFrcbWtAmIHiARAAfQnTcMkVAcqbkAEAcMAAAH9alaGikkoBWwytz0aoif6j+h9CMAIWAdvBiAfgWRDRUdiIAAAAxAJVQwgAICLZl8A6HKqvGqpJACDnQB0URSBiu5AIECA7iKgSD4JBngAhYpBAuzJgQ0TU3oeZQLTXcL0L046NEyAAAAbrQl4YQAC9IEM4PcAukFmLqnKTiIwz4BCgO+GqwQAFbizIhx7pAe51DXY9w0XdbRAABebSXRHEKVWzAAAIHAREAKLeBAAAGNMgAgQt+PB90dhDoBIAAAGND5AudB6n1PZSHjqudbXcyE6QCQU40EwAhT9uIAVPnKfypgLdM+9U+yjWoQcqRBJk8B+xS18gBVeDQEAfgQIkGA0V71EASGi51IyAR/Q3yqgXRh3W0AAGxSWHgIV0t6qIV4zRACCoFW5XXhCPrV9weVEqAIBxJZXGmAYFuWZQelJC54yPEAj3bZWYGBfnMAANhPfIgAhsyDD+gi77q3tCQgQICwHylgFiHlZCsnASrd0ICBBtsXHACqYBhGhwKKBBq8YAIgGwKoIeEAEwdlTVvKPRkh6fKABRBn+4fjggXZFODBgwYMGAo3TWAY4ZRAAIUcyA+AVyR0QjBE0AeaCAG6VihYCOwggwAGEtjD/miWlgSoKfBIgNJyIJyHIBe4TyAkvDVYIAUHq/wkOZBogEJCexwBBlYUPAEhNoCUAPUzw0ISLpLD1cg6foSBACBCcIAhaapEpgLBSQRkFgIkAIECAbiSChPLCAPUzw0ISQgND0P4QZE5R1HmEAABaQBL4cAiIBxp+BjfBNU6AAAAAAAAAKf3R8hAAABYDBAQMmMJfHgAepgjQxlQBsHY5A4SAEABVaxtA6EsjusQABAFo8AIe52lgQAyukM5AFNkAAECAjAm2wOMQah+yJHOYMYcdAKA5wYADauZGhCHA2ksAAARkBddEcnHUeZAAAAB1wiwkUhlvnRzQAAYAEMAEBLCykDo8cQ1xcwEKAAK0cGA0cG5yAEOBjYAAAqDRDu8CoYLEIAAa5BzAQwAQP1EAOZH8q1SkYgLGyiDBgdpKAGoJiAMGOgBzEZsooBhpAIDAAJPNBJiiAAEFQFy6H4VMcAAVEG4xBDgYhQBBFZYHd4GV8B7viAAB1slUfN8zBDABAdCAJbFAgDBNQBUEwMx1iKBxaqGmpMWAB8WhikEGyGxqnboQvpiP0eAACgASYgghQECrqXK5WOmuMJANyYwCyDnIuiCUDnnRCxP+auVQJxLAAuNYA/5FEEDI3/0MFiQtkhIYDzp5086edPOnnTzp54AA1SNkDGKtUIMn+SfgoGMAABNEB5n2mHgiAADglRJQ1rkPswo+M9CfYgRnwEAAQQQQBOUASG2ROZB09e0gxKxBQAW+9DJD0BwMCOVAhovKECAUzSADXmseDkjrAQfc0yGkUAYNP5O/wD/2Q==" name="HTTP://WWW.FLATTR.COM/" width="104" height="35" border="0"></a> 
<h4>Virement bancaire</h4>
<a href="http://musique-libre.org/wp-content/uploads/2014/03/ribmlo.pdf">IBAN/RIB</a> pour faire un virement bancaire 
';
$trans['faire_un_don_texte']['en']='In July 2016 the <em><strong>Musique Libre</strong></em> volunteer organisation publishes a material and human report for its previous two years of activity. <a href="http://musique-libre.org/blog/2016/08/19/ag-2016-compte-rendu/">Read the report of the non-profit general meeting (in French)</a><br/>We are still deeply in need of your support to ensure that the Dogmazic / Musique Libre project will be kept alive. Including for allowing our servers to handle the ever-growing use of the website, by music lovers as well as by musicians.<br>For France tax residents, Musique Libre being recognized as a public interest organisation, your donations can be substracted from your income tax at a 66% rate (a 20 euros donation will cost you 6.80 euros). You will receive a receipt during April of the year following the one you donated.
    <h4>Donate with Paypal</h4><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="TGZABWN33JJ5C">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>
<h4>Donate with a check</h4>
Send your check (drawn on a French bank only) to this postal address : <br/>
<address>Association <strong>Musique Libre !</strong><br/>
3, rue Burdeau 69001 Lyon<br/>France</address>
<h4>Donate with Flattr</h4>
<a href="https://flattr.com/profile/dogmazic"><img src="data:image/jpeg;base64,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A8MMxsmlPTjW0/dbT91rbAgc3nc5BjEx9VKLegg9n7rgoeZ+6GMSef8Autp+63n7refut5+63n7ocx7n5otYgSuJM0zeX10pQncAXrW8/dbT91JIZE4HN53DiNCCRp2QPI9mu6Z+63n7pwoXPdpCi5JCxkciyIkYdTmUzsR8JP3W8/dIPnIRHTGaCD/qb//aAAwDAQACAAMAAAAQ88888888888888888888888888888888888888888888888888888888888888888888888888888888888888c6AAAAF8884488408408888884ww8840888888888yjAAAAF7u8sCCCCSUgAU888888qCC8ooE88888888XhANOAD/AA/vIgjkMMnAAFPPPPPPKgoPKCENPPPMMPPBgEenxPyQ6aCBNPPPPAAFOAAAJFPgohgKEsHIAsMvPKwwfPM/IA4KIlEssstAAFMvPAgiugluAKANNAAjCPPAA1fItPCA6KAgggggvAAFNCDDAhvgqvKKFPPKAvPPPAgxXY1howqKAgJDDDHAABCAhCAlPgovKKAPPAgvPPPABm4QEoAB9KAlPPPPPAAAAhFLAlOgoOIKBENAgvPPPFH4QQQQR0PKAlPPPPPCAALAgggluCglBIAgnCglPPPPIPPPPLkfPLLDPPPPPLDHLDDDjjPHDHHPLDPDDPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP/EABsRAAICAwEAAAAAAAAAAAAAAAFQETEQIGAh/9oACAEDAQE/EOWFBetttEYBIijEB4bQEBKCnAIQE2wSA6AARizJmU4S1WGSJhQA04NqQYAIlWQAA2ABHb//xAAhEQABBAEDBQAAAAAAAAAAAAABABARUDEgIUFgYXBx8P/aAAgBAgEBPxDpYBJLhun/AP5cqdlIECCQVhRtCAbw1QQbIKMLsdSI0uAAIkIwEgDFzEuKNAAA+3tsbj4p+AAAAbG2+1BAAEENAJkUFAkuBAqIACQIM5EdWBAKMALuRHxMgIAASSSIA//EACwQAAECBAYCAQQCAwAAAAAAAAEAERAgITEwQEFRYfBxoYFQkbHRgPFgweH/2gAIAQEAAT8Q/iiwVU+CPH+DmyOsa2dWzCjSlKUpShBJMlCBLNwcGi6v3IQWYm8Ow8MMMNIBAqHMMMAyNHyFD9H005MUSIC0l6MHJTBqEHIwbwCIuAe+UR/bI1bbNziuIADUDc/UHVi7mM5aADTQJCN7ATwBsRmUGABGBh9jQiF9oG/IyAoYvQBFrcbWtAmIHiARAAfQnTcMkVAcqbkAEAcMAAAH9alaGikkoBWwytz0aoif6j+h9CMAIWAdvBiAfgWRDRUdiIAAAAxAJVQwgAICLZl8A6HKqvGqpJACDnQB0URSBiu5AIECA7iKgSD4JBngAhYpBAuzJgQ0TU3oeZQLTXcL0L046NEyAAAAbrQl4YQAC9IEM4PcAukFmLqnKTiIwz4BCgO+GqwQAFbizIhx7pAe51DXY9w0XdbRAABebSXRHEKVWzAAAIHAREAKLeBAAAGNMgAgQt+PB90dhDoBIAAAGND5AudB6n1PZSHjqudbXcyE6QCQU40EwAhT9uIAVPnKfypgLdM+9U+yjWoQcqRBJk8B+xS18gBVeDQEAfgQIkGA0V71EASGi51IyAR/Q3yqgXRh3W0AAGxSWHgIV0t6qIV4zRACCoFW5XXhCPrV9weVEqAIBxJZXGmAYFuWZQelJC54yPEAj3bZWYGBfnMAANhPfIgAhsyDD+gi77q3tCQgQICwHylgFiHlZCsnASrd0ICBBtsXHACqYBhGhwKKBBq8YAIgGwKoIeEAEwdlTVvKPRkh6fKABRBn+4fjggXZFODBgwYMGAo3TWAY4ZRAAIUcyA+AVyR0QjBE0AeaCAG6VihYCOwggwAGEtjD/miWlgSoKfBIgNJyIJyHIBe4TyAkvDVYIAUHq/wkOZBogEJCexwBBlYUPAEhNoCUAPUzw0ISLpLD1cg6foSBACBCcIAhaapEpgLBSQRkFgIkAIECAbiSChPLCAPUzw0ISQgND0P4QZE5R1HmEAABaQBL4cAiIBxp+BjfBNU6AAAAAAAAAKf3R8hAAABYDBAQMmMJfHgAepgjQxlQBsHY5A4SAEABVaxtA6EsjusQABAFo8AIe52lgQAyukM5AFNkAAECAjAm2wOMQah+yJHOYMYcdAKA5wYADauZGhCHA2ksAAARkBddEcnHUeZAAAAB1wiwkUhlvnRzQAAYAEMAEBLCykDo8cQ1xcwEKAAK0cGA0cG5yAEOBjYAAAqDRDu8CoYLEIAAa5BzAQwAQP1EAOZH8q1SkYgLGyiDBgdpKAGoJiAMGOgBzEZsooBhpAIDAAJPNBJiiAAEFQFy6H4VMcAAVEG4xBDgYhQBBFZYHd4GV8B7viAAB1slUfN8zBDABAdCAJbFAgDBNQBUEwMx1iKBxaqGmpMWAB8WhikEGyGxqnboQvpiP0eAACgASYgghQECrqXK5WOmuMJANyYwCyDnIuiCUDnnRCxP+auVQJxLAAuNYA/5FEEDI3/0MFiQtkhIYDzp5086edPOnnTzp54AA1SNkDGKtUIMn+SfgoGMAABNEB5n2mHgiAADglRJQ1rkPswo+M9CfYgRnwEAAQQQQBOUASG2ROZB09e0gxKxBQAW+9DJD0BwMCOVAhovKECAUzSADXmseDkjrAQfc0yGkUAYNP5O/wD/2Q==" name="HTTP://WWW.FLATTR.COM/" width="104" height="35" border="0"></a>
<h4>Wire transfer</h4>
<a href="http://musique-libre.org/wp-content/uploads/2014/03/ribmlo.pdf">IBAN/RIB</a> for wire transfer 
';

$trans['chat_titre']['fr']='Participer : ';
$trans['chat_titre']['en']='Get involved: ';

$trans['chat_header']['fr']='Après de longs efforts nous sommes fiers de vous présenter la nouvelle version de Dogmazic.net. Vos retours, vos questions nous aident à construire le projet et sont précieux ! ';
$trans['chat_header']['en']='After a long work we are proud to present the new version of Dogmazic.net. Your feeback, your questions help us building the project and are precious! ';

$trans['chat_soustitre']['fr']='Soyez présents sur notre <a title="Dogmazic chat" href="./irc">chat IRC</a>, pour discuter et agir avec nous.';
$trans['chat_soustitre']['en']='Be there on our <a title="Dogmazic chat" href="./irc">IRC chatroom</a>, to discuss and act with us.';



$trans['chat_texte']['fr']='Vous avez une idée, ou bien du temps pour être présent, discuter de l\'asso et faire circuler les infos ? Rejoignez nous sur notre <a href="./irc">chat IRC</a> (<em>#dogmazic</em> sur <em>Freenode</em>). <br/>';
$trans['chat_texte']['en']='Do you have an idea, or just some time to be around, discuss about the non-for-profit association and make information flow? Join us on <a href="./irc">IRC chat</a> (<em>#dogmazic</em> on <em>Freenode</em>). <br/>';

$trans['annonces_concert']['fr']='Concerts &amp; évènements';
$trans['annonces_concert']['en']='Concerts &amp; events';

$trans['nouveaux_articles']['fr']='Nouveaux articles';
$trans['nouveaux_articles']['en']='New blog posts';

$trans['nouveaux_forum']['fr']='Sur le forum';
$trans['nouveaux_forum']['en']='New forum posts';

$trans['legal']['fr']='Copyright 2004-2015 Association Musique Libre. Sauf autre mention (par exemple pour les morceaux de l\'archive musicale), ce site et son contenu sont disponibles sous licence <a target="new" href="https://creativecommons.org/licenses/by-sa/2.0/">Creative Commons BY-SA</a>. Numéro CNIL : 1208661';
$trans['legal']['en']='Copyright 2004-2015 Musique Libre volunteer organisation. Unless otherwise mentioned (as an example, the tracks in the music archive), this site and its content are published under the terms of the <a target="new" href="https://creativecommons.org/licenses/by-sa/2.0/">Creative Commons BY-SA</a> license. CNIL number : 1208661';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel='shortcut icon' href='http://play.dogmazic.net/favicon_dogmazic.ico' />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dogmazic.net</title>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="#">Dogmazic.net <i><small>BETA</small></i></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="?lang=fr" class="icon-fr">Français</a></li>
            <li><a href="?lang=en" class="icon-en">English</a></li>
            <li><a href="http://play.dogmazic.net"><strong><?php echo $trans['ecouter'][$lang]; ?></strong></a></li>
            <li><a href="http://play.dogmazic.net/login.php"><?php echo $trans['publier'][$lang]; ?></a></li>
			<li><a href="http://musique-libre.org/forum"><?php echo $trans['forum'][$lang];?></a></li>
			<li><a href="./irc"><?php echo $trans['chat'][$lang];?></a></li>
         
          </ul>
        </div>
      </div>
    </nav>
	<div class="container container-full">
		    
		
    
    
    
    
    
        <div class="row row-offcanvas row-offcanvas-right">

            <div class="col-xs-12 col-sm-3 sidebar-offcanvas">
              <div class="col-sidebar col-sidebar1">
                <h4><?php echo $trans['nouveaux_albums'][$lang];?></h4>
                <div class="list-group">
<?php
define('RSS_CACHE_TIME', 10); // cache flux rss en minutes
define('RSS_CACHE_DIR', '/tmp/www-dogmazic-net-cache-rss/'); // cache flux rss en minutes

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

  return $string;
}

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
    while($item = $items->item($i++)) {
        $image = $item->getElementsByTagName('image')->item(0)->nodeValue;
        $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
        $description = $item->getElementsByTagName('description')->item(0)->nodeValue;
        echo '<a href="' . $link . '" class="list-group-item"><img class="albumimg" src="' . $image . '"/><br/>' . htmlspecialchars($description) . '</a></li>';
    }
}
?>
                </div>
              </div>
              <div class="col-sidebar col-sidebar2">
                <h4><?php echo $trans['nouveaux_commentaires'][$lang];?></h4>
                <div class="list-group">
<?php
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
    while($item = $items->item($i++)) {
        $image = $item->getElementsByTagName('image')->item(0)->nodeValue;
        $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
        $description = $item->getElementsByTagName('description')->item(0)->nodeValue;
        $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
        echo '<a href="' . $link . '" class="list-group-item"><b>' . str_replace('Shout by', '', htmlspecialchars($title)) . '</b><br /> <span class="unimportant">' . htmlspecialchars($description) . '</span></a>';
    }
}
?>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6">
			   <div class="col-frontheader">
					<h4 style="display:inline;"><?php echo $trans['chat_soustitre'][$lang];?></h4>
					<h5 style="display:inline;"><?php echo $trans['chat_header'][$lang];?></h5>
				</div>                    


                <div class="jumbotron">
                    <h1>
                        <a href="http://play.dogmazic.net" alt="Dogmazic archive" >
                            <img src="dogmaziclogo.png" class="img1" /><img src="logotitre.png" alt="Dogmazic.net"/>
                        </a>
                    </h1>
                    <h2 class=".h2">Yes, we're back !</h2>
                    <div style="padding-top:0.33%;">
                        <?php echo $trans['intro_asso'][$lang]; ?>
                    </div>
                    <h2>
                        <a href="http://play.dogmazic.net" class="btn btn-large btn-default">
                            <?php echo $trans['acces_archive'][$lang];?>
                        </a>
                        <a class="btn btn-large btn-default" href="#appsModal" role="button" data-toggle="modal">
                            <?php echo $trans['apps_mobiles'][$lang];?>
                        </a>
                    </h2>
                </div>
                <div class="row">  
<?php
if (file_exists('./news_'.$lang.'.php')) {
    echo '<div>';
    include('./news_'.$lang.'.php');
    echo '</div><hr/>';
}
?>
		<div style="margin-left:auto;margin-right:auto;">
			<strong><a title="Dogmazic Webradio" href="http://dmz.fm" style="text-align:right;float:right;">DogmaRadio : </a></strong>
			<br style="clear:both;"/>
			<span style="float:right;">
			<script type="text/javascript" src="js/mrp.js"></script>
			<script type="text/javascript">
				MRP.insert({'url':'http://dmz.fm:8000/stream.ogg', 'codec':'ogg', 'volume':90, 'autoplay':false, 'buffering':5, 'title':'Dogmazic WebRadio', 'bgcolor':'#222', 'skin':'eastanbul', 'width':467, 'height':26});
			</script>
			
			<object style="display:inline;" data="http://dmz.fm:8000/nowplaying.xsl" type="text/html" width="467" height="25"></object>
			</span>	
		</div>
					<div class="col-xs-12 col-sm-6">
                        <h2><?php echo $trans['adherer_titre'][$lang];?></h2>
                        <p>
                            <a href="http://musique-libre.org" alt="Musique Libre !"><img src="musiquelibrelogo.png" class="img2"/></a>
                            <div>
                                    <?php echo $trans['adherer_texte'][$lang];?>
                            </div>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <h2><?php echo $trans['faire_un_don_titre'][$lang];?></h2>
                        <p>
                            <div>
                                    <?php echo $trans['faire_un_don_texte'][$lang];?>
                            </div>
                        </p>
                    </div>
                    <hr/>
                    <div>
                        <h2><?php echo $trans['nouveaux_forum'][$lang];?></h2>
                    </div>
<?php
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
    while ($item = $items->item($i++)) {
        echo '<span style="width:20%;float:left">';
        //$image=$item->getElementsByTagName('image')->item(0)->nodeValue;
        $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
        $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
        //$creator=$item->getElementsByTagName('dc:creator')->item(0)->nodeValue;
        $pubdate = $item->getElementsByTagName('pubDate')->item(0)->nodeValue;


        echo '<div><a href="' . $link . '">' . htmlspecialchars($title) . '</a></div>';
        echo '<div> ' . htmlspecialchars($pubdate) . '</div><br/>';
        echo '</span>';
    }
}
?>
                </div>
            </div>

            <div class="col-xs-12 col-sm-3 sidebar-offcanvas">
                <div class="col-sidebar col-sidebar3">
                    <h4><?php echo $trans['nouveaux_articles'][$lang];?></h4>
                    <div class="list-group">
<?php
//here we go, mister D-sky
$dom = new DOMDocument();
#if($albums = file_get_contents('http://musique-libre.org/?feed=rss2')){
if($albums = get_rss_with_cache('musique-libre.org_feed_rss2','http://musique-libre.org/?feed=rss2')){
    //echo htmlspecialchars($albums);
    $dom->loadXML($albums);
    $dom->preserveWhiteSpace=false;
    $items = $dom->getElementsByTagName('item');
    //echo htmlspecialchars(var_dump($items));
    $i = 0;
    while($item = $items->item($i++)) {
        //$image=$item->getElementsByTagName('image')->item(0)->nodeValue;
        $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
        $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
        echo '<a href="' . $link . '" class="list-group-item">' . htmlspecialchars($title) . '</a>';
    }
}
?>
                    </div>
                </div>
                <div class="col-sidebar col-sidebar4">
                  <h4><?php echo $trans['annonces_concert'][$lang];?></h4>
                  <div class="list-group">
<?php
//here we go, mister D-sky
$dom = new DOMDocument();
#if ($albums = file_get_contents('http://musique-libre.org/forum/categories/annonces-concerts-manifs-confs-du-libre/feed.rss')){
if ($albums = get_rss_with_cache('musique-libre.org_annonces_concerts_feed', 'http://musique-libre.org/forum/categories/annonces-concerts-manifs-confs-du-libre/feed.rss')){
    //echo htmlspecialchars($albums);
    $dom->loadXML($albums);
    $dom->preserveWhiteSpace=false;
    $items = $dom->getElementsByTagName('item');
    //echo htmlspecialchars(var_dump($items));

    for($i=0; $i<=10;) {
        //$image=$item->getElementsByTagName('image')->item(0)->nodeValue;
        $item = $items->item($i++);
        $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
        $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
        echo '<a href="' . $link . '" class="list-group-item">' . htmlspecialchars($title) . '</a>';
    }
}
?>
                  </div>
                </div>
            </div>
            
        </div>
        <hr/>
        <footer>
            <p><?php echo $trans['legal'][$lang];?></p>
        </footer>
    
    </div>

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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

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
