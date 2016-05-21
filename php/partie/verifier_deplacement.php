<?php

    /**
     * Ce fichier renvois 1 si le joueur peut effectuer le déplacement d'un pays vers un autre sinon 0
     */

    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../site/connexion.php";
    include "functions_partie.php";

    //Si les 2 pays sont bien renseignés
    if(isset($_GET['paysSource']) && isset($_GET['paysDestination'])){
        if(moveOneToFrom($bdd,$_SESSION['id_partie'], $_SESSION['usr_id'], $_GET['paysSource'],$_GET['paysDestination'])){
            echo "1";
        }
        else{
            echo "0";
        }
    }

?>