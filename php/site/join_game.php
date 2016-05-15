<?php
    //On vérifie sur les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "connexion.php";

    if(isset($_GET['room_id']) && isset($_SESSION['usr_id'])){
        join_room($_GET['room_id'], $_SESSION['usr_id'], $bdd);
    }

    function join_room($id_room, $user_id, $bdd){

        //On vérifie si l'utilisateur n'a pas déja rejoint la room
        $search_playeur = $bdd->query("SELECT *
                                      FROM user_has_room
                                      WHERE statut_usr_room = 'out'
                                      AND id_room= ".$id_room."
                                      AND id_user=".$user_id);
        $search_playeur = $search_playeur->fetch();

        //Si le joueur est déja venu dans cette room
        if($search_playeur == false){
            $user_has_room = $bdd->prepare("INSERT INTO user_has_room (id_room, id_user,usr_admin, statut_usr_room) VALUES (:room_id, :user_id, 0, 'in')");
            $user_has_room->execute(array(
                'room_id' => $id_room,
                'user_id' => $user_id,
            ));
        }
        else{
            $bdd->exec("UPDATE user_has_room 
                        SET statut_usr_room = 'in'
                        WHERE id_room= ".$id_room."
                        AND id_user=".$user_id);
        }


        //On passe le status du joueur à occupé
        $bdd->exec("UPDATE user set code_sta = 'gam' WHERE usr_id =".$user_id );

        header('Location: ../../www/room.php');
    }
?>