<?php
    //On vérifie sur les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "connexion.php";

    //On récupére le statut de la room
    $statut_room = $bdd->query("SELECT statut_room
                                FROM room
                                WHERE room_id =".$_SESSION['room_id']);

    $statut_room = $statut_room->fetch();
    //On vérifie que le statut soit bien "en partie"
    if($statut_room != false && $statut_room['statut_room'] == 'en partie'){

        //On insère le message pour prévenir que la partie commence
        $req = $bdd->prepare('INSERT INTO chat_messages (pseudo, message_text, timestamp, message_room_id) VALUES(:pseudo, :message_text, :timestamp, :room_id)');
        $req->execute(array(
            'pseudo' => 'room_'.$_SESSION['room_id'],
            'message_text' => 'La partie commence',
            'timestamp' => time(),
            'room_id' => $_SESSION['room_id']
        ));
        echo "1";
    }
    else{
        echo "0";
    }
?>