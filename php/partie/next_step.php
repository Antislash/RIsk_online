<?php

    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../site/connexion.php";

    //On récupére le statut du joueur
    $statut = $bdd->query("SELECT etat_joueur
                           FROM partie_has_joueur
                           WHERE id_joueur = ".$_SESSION['usr_id']."
                           AND id_partie = ". $_SESSION['id_partie']);

    $statut = $statut->fetch();

    if($statut['etat_joueur'] == "renfort"){

    }else if($statut['etat_joueur'] == "renfort"){
        //On place l'état du joueur à attaque

    }
    else if($statut['etat_joueur'] == "attaque"){

    }
    else if($statut['etat_joueur'] == "deplace"){

    }
?>