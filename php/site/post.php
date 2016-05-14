<?php
session_start();

include "connexion.php";

delete_msg($bdd);
$req = $bdd->prepare('INSERT INTO chat_messages (pseudo, message_text, timestamp) VALUES(:pseudo, :message_text, :timestamp)');
$req->execute(array(
  'pseudo' => $_SESSION['pseudo'],
  'message_text' => $_GET['message'],
  'timestamp' => time()
));
//header('Location: room.php#chat-room');

function delete_msg($bdd) {
  
  $time_out = time()-900;
  $recup_message = $bdd->prepare('SELECT * FROM chat_messages WHERE timestamp < :time');
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

  $query = $bdd->prepare("DELETE FROM chat_messages WHERE timestamp < :time");
  $query->execute(array(
    'time' => $time_out
  ));
   
}
?>