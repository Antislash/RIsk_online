<?php
  session_start();

  include "connexion.php";


  if(isset($_POST['nom_room']) && isset($_POST['nb_joueur']) && !empty($_POST['nom_room']) && !empty($_POST['nb_joueur'])){
    room_creation($_SESSION['usr_id'], $bdd, $_POST['nb_joueur'], $_POST['nom_room'],$_POST['password']);
  }
  else{

    header('Location: ../../www/create_room.php');
  }

  function room_creation ($user_id, $bdd, $nb_joueur,$room_name, $room_mdp) {

    if(empty($room_mdp)) {
      $room_mdp = NULL;
    }

      $room = $bdd->prepare("INSERT INTO room (room_date_creation, room_nb_joueur, room_name,room_password, statut_room) VALUES (CURRENT_TIMESTAMP(), :nb_joueur, :room_name, :room_password, 'en cours')");
      $room->execute(array(
          'nb_joueur' => $nb_joueur,
          'room_name' => $room_name,
          'room_password' => $room_mdp,
      ));

    $max_room_id = $bdd->prepare("SELECT MAX(room_id) FROM room");
    $max_room_id->execute();
    $room_id = $max_room_id->fetch();

    $user_has_room = $bdd->prepare("INSERT INTO user_has_room (id_room, id_user,usr_admin) VALUES (:room_id, :user_id, 1)");
    $user_has_room->execute(array(
      'room_id' => $room_id[0],
      'user_id' => $user_id,
      ));

    header('Location: ../../www/room.php');
  }
?>
