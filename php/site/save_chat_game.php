<?php
  /**
   * Ce fichier enregistre les message du chat en base de données, il supprime aussi les anciens messages en les transférant dans une autres table
   */

  //On vérifie si les session sont déja activées
  if(session_id() == null){
    session_start();
  }

  include "connexion.php";

  delete_msg($bdd);
  $req = $bdd->prepare('INSERT INTO chat_game (pseudo, message_text, timetsamp, message_partie_id) VALUES(:pseudo, :message_text, :timetsamp, :id_partie)');
  $req->execute(array(
    'pseudo' => $_SESSION['pseudo'],
    'message_text' => $_GET['message'],
    'timetsamp' => time(),
    'id_partie' => $_SESSION['id_partie']
  ));

  //header('Location: room.php#chat-room');

  function delete_msg($bdd) {

    $time_out = time()-900;
    $recup_message = $bdd->prepare('SELECT * FROM chat_game WHERE timestamp < :time');
    $recup_message->execute(array(
      'time' => $time_out
    ));

    while ($message = $recup_message->fetch()) {
      $query_1 = $bdd->prepare('INSERT INTO ancien_message (message, pseudo) VALUES (:message, :pseudo)');
      $query_1->execute(array(
        'message' => $message['message_text'],
        'pseudo' => $message['pseudo'],
      ));
    }

    $query = $bdd->prepare("DELETE FROM chat_game WHERE timestamp < :time");
    $query->execute(array(
      'time' => $time_out
    ));
  }
?>
