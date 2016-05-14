<?php
    session_start();

    include "connexion.php";

    if(isset($_GET['room_id']) && isset($_SESSION['usr_id'])){
        join_room($_GET['room_id'], $_SESSION['usr_id'], $bdd);
    }

    function join_room($id_room, $user, $bdd){

        $user_has_room = $bdd->prepare("INSERT INTO user_has_room (id_room, id_user,usr_admin) VALUES (:room_id, :user_id, 0)");
        $user_has_room->execute(array(
            'room_id' => $id_room,
            'user_id' => $user,
        ));
    }
?>