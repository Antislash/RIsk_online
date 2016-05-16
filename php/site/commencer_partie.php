<?php
    /**
     * Ce fichier sert à déclencher le début de partie dans la room appelé par la méthode AJax "verifierRoom()" dans le fichier "js/site/room.js"
     **/

    //On vérifie si les session sont déja activées
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
        echo "1";
    }
    else{
        echo "0";
    }
?>