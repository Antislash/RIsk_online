<?php
    //On vérifie sur les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "connexion.php";

    $joueur = $bdd->query("SELECT usr_admin 
                           FROM user_has_room
                           WHERE id_user=".$_SESSION['usr_id']."
                           AND id_room=". $_SESSION['room_id']);

    $joueur = $joueur->fetch();

    if($joueur == false){
        echo "Problème de connexion a la base de données";
    }

    //On vérifie si le joueur qui veut quitter est admin
    if($joueur['usr_admin']== 1){


        //On récupére le nombre de joueurs toujours présent dans ma room
        $room = $bdd->query("SELECT count(*) as nb_joueur
                             FROM user_has_room
                             WHERE statut_usr_room = 'in'
                             AND id_room =  ". $_SESSION['room_id']);

        $room = $room->fetch();
        if($room == false){
            echo "Problème de connexion a la base de données";
        }

        //Si le joueur qui veut quitter est le dernier
        if($room['nb_joueur'] == 1){

            //On met le statut de la room a supprimé
            $bdd->exec("UPDATE room 
                        SET statut_room = 'supprime'
                        WHERE room_id = ".$_SESSION['room_id']);


        }
        else{
            //Un autre joueur passe admin ( ne fonctionne pas avec le LIMIT 1
            $bdd->query("UPDATE user_has_room
                        SET usr_admin = 1
                        WHERE id_room=".$_SESSION['room_id']."
                        AND statut_usr_room = 'in'" );
        }

        //Le joueur n'est plus admin
        $bdd->exec("UPDATE user_has_room 
                        SET usr_admin = 0
                        WHERE id_room = ".$_SESSION['room_id']."
                        AND id_user =".$_SESSION['usr_id']);

    }
    //On met le statut de la room lié au joueur a out
    $bdd->exec("UPDATE user_has_room 
                SET statut_usr_room ='out'
                WHERE id_user=".$_SESSION['usr_id']."
                AND id_room=". $_SESSION['room_id']);

    //On change le statut du joueur
    $bdd->exec("UPDATE user
                SET code_sta='on'
                WHERE usr_id = ".$_SESSION['usr_id']);

    unset($_SESSION['room_id']);
    header('Location: ../../www/acceuil.php');
?>