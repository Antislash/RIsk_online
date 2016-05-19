<?php
    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../site/connexion.php";

    //On regarde l'etat du joueur
    $statut = $bdd->query("SELECT etat_joueur
                           FROM partie_has_joueur
                           WHERE id_joueur=".$_SESSION['usr_id']."
                           AND id_partie =".$_SESSION['id_partie']);

    $statut = $statut->fetch();

    if($statut == false){
        
        echo "Problème pour récupérer l'état du joueur";
    }
    else if($statut['etat_joueur'] != 'attente'){

        echo $statut['etat_joueur'];
    }
    else{
        $joueur_joue = $bdd->query("SELECT a_qui_le_tour
                                    FROM partie
                                    WHERE id_partie". $_SESSION['id_partie']);

        $joueur_joue = $joueur_joue->fetch();

        echo $joueur_joue['a_qui_le_tour']. " joue...";
    }
?>