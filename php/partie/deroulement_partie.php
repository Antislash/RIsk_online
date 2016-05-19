<?php
    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../site/connexion.php";



    //On récupére l'etat du joueur dans la partie
    $etat_joueur = $bdd->query("SELECT etat_joueur
                                FROM partie_has_joueur
                                WHERE id_joueur = ".$_SESSION['usr_id']."
                                AND id_partie =".$_SESSION['id_partie']);

    $etat_joueur = $etat_joueur->fetch();

    //On regarde si le joueur doit placer ses troupes
    if($etat_joueur['etat_joueur'] == 'attente pret'){
        include "initialiser_renfort.php";
    }
    //Si le joueur a fait sa phase d'initialisation de renfort
    else if($etat_joueur['etat_joueur'] == 'pret'){

        //On récupére le statut de tous les joueurs
        $etat_joueurs = $bss->query("SELECT etat_joueur
                                     FROM partie_has_joueur
                                     WHERE id_partie =".$_SESSION['id_partie']);

        //On regarde si tous les joueur sont prêt
        $joueur_ok = true;
        while($joueur = $etat_joueur->fetch()){
            if($joueur['etat_joueur']){
                $joueur_ok = false;
            }
        }

        //Si tous les joueurs sont ok on passe le statut de la partie à 'en cours'
        $bdd->exec("UPDATE partie SET partie_statut = 'en cours' Where id_partie = ".$_SESSION['id_partie']);
    }
    else if($etat_joueur['renforcement']){

    }
?>