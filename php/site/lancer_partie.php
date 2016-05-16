<?php
    /**
     * Ce script change le statut de la room a "en partie" si les conditions le permettent quand le joueur a cliquer sur le boutton "Lancer" dans une room
     * Appelé par la méthode "debutPartie()" dans le fichier "js/site/rooms.js
     */

    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "connexion.php";

    //On récupère le nombre de joueur
    $nb_joueur = $bdd->query("SELECT COUNT(*) as nbJoueur
                              FROM user_has_room
                              WHERE statut_usr_room = 'in'
                              AND id_room = ".$_SESSION['room_id']);

    $nb_joueur = $nb_joueur->fetch();

    //On vérifie que le joueur n'est pas tous seul
    if($nb_joueur != false && $nb_joueur['nbJoueur'] > 1){
        $bdd->query("UPDATE room 
                     SET statut_room='en partie' 
                     WHERE room_id = ".$_SESSION['room_id']);
    }

?>