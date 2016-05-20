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

    if($statut['etat_joueur'] == "attente pret"){
        //On place l'état du joueur à attente
        $bdd->exec("UPDATE partie_has_joueur 
                    SET etat_joueur = 'attente' 
                    WHERE id_partie = ".$_SESSION['id_partie']." 
                    AND id_joueur = ".$_SESSION['usr_id']);

    }else if($statut['etat_joueur'] == "renfort"){
        //On place l'état du joueur à attaque
        $bdd->exec("UPDATE partie_has_joueur 
                    SET etat_joueur = 'attaque' 
                    WHERE id_partie = ".$_SESSION['id_partie']." 
                    AND id_joueur = ".$_SESSION['usr_id']);
    }
    else if($statut['etat_joueur'] == "attaque"){
        //On place l'état du joueur à deplace
        $bdd->exec("UPDATE partie_has_joueur 
                    SET etat_joueur = 'deplace' 
                    WHERE id_partie = ".$_SESSION['id_partie']." 
                    AND id_joueur = ".$_SESSION['usr_id']);
    }
    else if($statut['etat_joueur'] == "deplace"){
        //On place l'etat du joueur à attente
        $bdd->exec("UPDATE partie_has_joueur 
                    SET etat_joueur = 'attente' 
                    WHERE id_partie = ".$_SESSION['id_partie']." 
                    AND id_joueur = ".$_SESSION['usr_id']);

        //On passe la main au joueur suivant
        $bdd->exec();
    }
?>