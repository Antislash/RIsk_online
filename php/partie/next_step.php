<?php

/**
 * Ce fichier sert à gérer les étapes d'un tours
 */

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

    if($statut['etat_joueur'] == "init"){
        //On place l'état du joueur à attente
        $bdd->exec("UPDATE partie_has_joueur 
                    SET etat_joueur = 'attente' 
                    WHERE id_partie = ".$_SESSION['id_partie']." 
                    AND id_joueur = ".$_SESSION['usr_id']);

        //On regarde si tous les joueur sont en attente
        $statut_joueurs = $bdd->query("SELECT *
                                       FROM partie_has_joueur
                                       WHERE id_partie =".$_SESSION['id_partie']."
                                       AND etat_joueur = 'init'");

        $statut_joueurs = $statut_joueurs->fetch();

        echo "fini";

        //Si tous les joueur sont pret on place le statut de la partie à 'en cours'
        if($statut_joueurs == false){
            $bdd->exec("UPDATE partie
                        SET partie_statut = 'en cours'
                        WHERE id_partie =".$_SESSION['id_partie']);

            //On récupére le joueur à qui c'est de commencer
            $a_qui_le_tour = $bdd->query("SELECT a_qui_le_tour
                                          FROM partie
                                          WHERE id_partie =".$_SESSION['id_partie']);

            $a_qui_le_tour = $a_qui_le_tour->fetch();

            //On le met a la phase de renfort
            $bdd->exec("UPDATE partie_has_joueur 
                        SET etat_joueur = 'renfort' 
                        WHERE id_partie = ".$_SESSION['id_partie']." 
                        AND id_joueur = ".$_SESSION['usr_id']);
        }

    }
    //Si le joueur veut passer à la prochaine étape après la phase de renfort
    else if($statut['etat_joueur'] == "renfort"){

        //On place l'état du joueur à attaque
        $bdd->exec("UPDATE partie_has_joueur 
                    SET etat_joueur = 'attaque' 
                    WHERE id_partie = ".$_SESSION['id_partie']." 
                    AND id_joueur = ".$_SESSION['usr_id']);

        echo "fini";
    }
    //Si le joueur veut passer à la prochaine étape après la phase d'attaque
    else if($statut['etat_joueur'] == "attaque"){
        //On place l'état du joueur à deplace
        $bdd->exec("UPDATE partie_has_joueur 
                    SET etat_joueur = 'deplace' 
                    WHERE id_partie = ".$_SESSION['id_partie']." 
                    AND id_joueur = ".$_SESSION['usr_id']);
    }
    //Quand le joueur a fini la phase de déplacement
    else if($statut['etat_joueur'] == "deplace"){
        //On place l'etat du joueur à attente
        $bdd->exec("UPDATE partie_has_joueur 
                    SET etat_joueur = 'attente' 
                    WHERE id_partie = ".$_SESSION['id_partie']." 
                    AND id_joueur = ".$_SESSION['usr_id']);

        //On annonce dans la partie qui a la main
        $bdd->exec("UPDATE partie 
                    SET a_qui_le_tour = ".$_SESSION['id_joueur_suivant']." 
                    WHERE id_partie = ". $_SESSION['id_partie']);

        //On place ce nouveau joueur à la phase de renfort
        $bdd->exec("UPDATE partie_has_joueur 
                    SET etat_joueur = 'renfort' 
                    WHERE id_partie = ".$_SESSION['id_partie']." 
                    AND id_joueur = ".$_SESSION['id_joueur_suivant']);

        echo "fini";
    }
?>