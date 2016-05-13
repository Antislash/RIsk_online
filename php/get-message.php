<?php
include "connexion.php":

header("Content-Type: text/plain");

if($_GET['action'] == 'new') {
    $reponse = $bdd->query('SELECT pseudo, message_text FROM chat_messages ORDER BY message_id DESC LIMIT 0, 50');


    while ($donnees = $reponse->fetch())
    {
        $pseudo = $donnees['pseudo'];
        $texte = $donnees['message_text'];
        $message = smiley($texte);
    	echo '<p><strong>' . $pseudo . '</strong> : ' . $message . '</p>';    	
    }

    $reponse->closeCursor();
}

if ($_GET['action'] == 'anc') {
  $reponse_2 = $bdd->query('SELECT pseudo, message FROM ancien_message ORDER BY id DESC ');


    while ($donnees_2 = $reponse_2->fetch())
    {
        $pseudo_2 = $donnees_2['pseudo'];
        $texte_2 = $donnees_2['message'];
        $message_2 = smiley($texte_2);
    	echo '<p><strong>' . $pseudo_2 . '</strong> : ' . $message_2 . '</p>';
    }

    $reponse_2->closeCursor();
}

function smiley($texte) {
  $texte = str_replace(' :) ', '<img src="./image/sourire.png" />', $texte);
  $texte = str_replace(':) ', '<img src="./image/sourire.png" />', $texte);
  $texte = str_replace(':)', '<img src="./image/sourire.png"  />', $texte);
  $texte = str_replace(' :)', '<img src="./image/sourire.png" />', $texte);
  $texte = str_replace(' ;) ', '<img src="./image/clin.png" />', $texte);
  $texte = str_replace(';) ', '<img src="./image/clin.png" />', $texte);
  $texte = str_replace(';)', '<img src="./image/clin.png" />', $texte);
  $texte = str_replace(' ;)', '<img src="./image/clin.png" />', $texte);
  $texte = str_replace(' :p ', '<img src="./image/langue.png" />', $texte);
  $texte = str_replace(':p ', '<img src="./image/langue.png" />', $texte);
  $texte = str_replace(' :p', '<img src="./image/langue.png" />', $texte);
  $texte = str_replace(':p', '<img src="./image/langue.png" />', $texte);
  $texte = str_replace(' :d ', '<img src="./image/rigole.png" />', $texte);
  $texte = str_replace(':d ', '<img src="./image/rigole.png" />', $texte);
  $texte = str_replace(' :d', '<img src="./image/rigole.png" />', $texte);
  $texte = str_replace(':d', '<img src="./image/rigole.png" />', $texte);
  $texte = str_replace(' :D ', '<img src="./image/rigole.png" />', $texte);
  $texte = str_replace(':D ', '<img src="./image/rigole.png" />', $texte);
  $texte = str_replace(' :D', '<img src="./image/rigole.png" />', $texte);
  $texte = str_replace(':D', '<img src="./image/rigole.png" />', $texte);
  $texte = str_replace(' <3 ', '<img src="./image/coeur.png" />', $texte);
  $texte = str_replace('<3 ', '<img src="./image/coeur.png" />', $texte);
  $texte = str_replace(' <3', '<img src="./image/coeur.png" />', $texte);
  $texte = str_replace('<3', '<img src="./image/coeur.png" />', $texte);
  $texte = str_replace('^^', '<img src="./image/hihi.png" />', $texte);
  $texte = str_replace(' ^^', '<img src="./image/hihi.png" />', $texte);
  $texte = str_replace('^^ ', '<img src="./image/hihi.png" />', $texte);
  $texte = str_replace(' ^^ ', '<img src="./image/hihi.png" />', $texte);

  return $texte;
}
?>