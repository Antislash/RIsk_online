<?php
  //session_start();

  //include "connexion.php";
  room_creation($_SESSION['usr_id'], $bdd);

  function room_creation ($user_id, $bdd) {

    $room = $bdd->prepare("INSERT INTO room (room_date_creation, room_nb_joueur) VALUES (CURRENT_TIMESTAMP(), 1)");
    $room->execute();

    $max_room_id = $bdd->prepare("SELECT MAX(room_id) FROM room");
    $max_room_id->execute();
    $room_id = $max_room_id->fetch();

    $user_has_room = $bdd->prepare("INSERT INTO user_has_room (id_room, id_user) VALUES (:room_id, :user_id)");
    $user_has_room->execute(array(
      'room_id' => $room_id[0],
      'user_id' => $user_id,
      ));
  }
?>
