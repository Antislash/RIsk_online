<?php
/**
 * Ce fichier sert à renvoyer la liste des message envoyé dans le chat
 * Appelé par la méthode "requestChat()" dans le fichier "js/site/game_chat.js
 */

//On vérifie si les session sont déja activées
if(session_id() == null){
    session_start();
}

include "connexion.php";

header("Content-Type: text/plain");

if($_GET['action'] == 'new') {
    $reponse = $bdd->query("SELECT pseudo, message_text 
                            FROM chat_game 
                            WHERE message_room_id=".$_SESSION['id_partie']."
                            ORDER BY message_id ASC LIMIT 0, 50");


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
  $reponse_2 = $bdd->query("SELECT pseudo, message 
                            FROM ancien_message_game 
                            WHERE message_room_id=".$_SESSION['id_partie']."
                            ORDER BY id ASC ");


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
  $texte = str_replace(' :) ', '<img src="./images/sourire.png" />', $texte);
  $texte = str_replace(':) ', '<img src="./images/sourire.png" />', $texte);
  $texte = str_replace(':)', '<img src="./images/sourire.png"  />', $texte);
  $texte = str_replace(' :)', '<img src="./images/sourire.png" />', $texte);
  $texte = str_replace(' ;) ', '<img src="./images/clin.png" />', $texte);
  $texte = str_replace(';) ', '<img src="./images/clin.png" />', $texte);
  $texte = str_replace(';)', '<img src="./images/clin.png" />', $texte);
  $texte = str_replace(' ;)', '<img src="./images/clin.png" />', $texte);
  $texte = str_replace(' :p ', '<img src="./images/langue.png" />', $texte);
  $texte = str_replace(':p ', '<img src="./images/langue.png" />', $texte);
  $texte = str_replace(' :p', '<img src="./images/langue.png" />', $texte);
  $texte = str_replace(':p', '<img src="./images/langue.png" />', $texte);
  $texte = str_replace(' :d ', '<img src="./images/rigole.png" />', $texte);
  $texte = str_replace(':d ', '<img src="./images/rigole.png" />', $texte);
  $texte = str_replace(' :d', '<img src="./images/rigole.png" />', $texte);
  $texte = str_replace(':d', '<img src="./images/rigole.png" />', $texte);
  $texte = str_replace(' :D ', '<img src="./images/rigole.png" />', $texte);
  $texte = str_replace(':D ', '<img src="./images/rigole.png" />', $texte);
  $texte = str_replace(' :D', '<img src="./images/rigole.png" />', $texte);
  $texte = str_replace(':D', '<img src="./images/rigole.png" />', $texte);
  $texte = str_replace(' <3 ', '<img src="./images/coeur.png" />', $texte);
  $texte = str_replace('<3 ', '<img src="./images/coeur.png" />', $texte);
  $texte = str_replace(' <3', '<img src="./images/coeur.png" />', $texte);
  $texte = str_replace('<3', '<img src="./images/coeur.png" />', $texte);
  $texte = str_replace('^^', '<img src="./images/hihi.png" />', $texte);
  $texte = str_replace(' ^^', '<img src="./images/hihi.png" />', $texte);
  $texte = str_replace('^^ ', '<img src="./images/hihi.png" />', $texte);
  $texte = str_replace(' ^^ ', '<img src="./images/hihi.png" />', $texte);

  return $texte;
}
?>