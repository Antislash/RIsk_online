<?php
    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../site/connexion.php";

    //On récupére l'état de la partie
    $partie = $bdd->query("SELECT partie_statut
                           FROM partie
                           WHERE id_partie = ".$_SESSION['id_partie']);

    $partie = $partie->fetch();

    //On regarde l'etat du joueur
    $statut = $bdd->query("SELECT etat_joueur
                           FROM partie_has_joueur
                           WHERE id_joueur=".$_SESSION['usr_id']."
                           AND id_partie =".$_SESSION['id_partie']);

    $statut = $statut->fetch();


    //On regarde si le joueur a gagné
    $victoire = $bdd->query("SELECT etat_joueur
                             FROM partie_has_joueur
                             WHERE id_partie = ".$_SESSION['id_partie']."
                             AND etat_joueur <> 'defaite'");
    $victoire = $victoire->fetch();

    if($partie == false){
        echo "Problème pour récupérer l'état de la partie";
    }
    else if($partie['partie_statut'] == 'init'){
        if($statut == false){

            echo "Problème pour récupérer l'état du joueur";
        }
        else if($statut['etat_joueur'] != 'attente'){

            echo $statut['etat_joueur'];
        }
        else{

            echo "En attente des autres joueurs...";

        }
    }
    else if($partie['partie_statut'] == 'en cours'){


        if($statut == false) {

            echo "Problème pour récupérer l'état du joueur";
        }
            //SI le joueur a gagné
        else if($victoire['etat_joueur'] == null){

            //On place le statut du joueur a victoire en base de données
            $bdd->exec("UPDATE partie_has_joueur 
                        SET etat_joueur = 'victoire' 
                        WHERE id_partie = ".$_SESSION['id_partie']." 
                        AND id_joueur = ".$_SESSION['usr_id']);

            echo "<a href= \"acceuil.php\"> Victoire! </a>";

        }else if($statut['etat_joueur'] != 'attente'){

            echo $statut['etat_joueur'];

        }
        else if($statut['etat_joueur'] == "victoire"){
            echo "<a href= \"accueil.php\"> Victoire! </a>";
        }
        else if($statut['etat_joueur'] == "defaite"){
            echo "<a href= \"accueil.php\"> Defaite... </a>";
        }
        else{

            //On récupére le nombre de pays que possede le joueur
            $nb_pays = $bdd->query("SELECT count(*) as nbPays
                                    FROM partie_has_joueur_has_pays
                                    WHERE id_joueur = ".$_SESSION['usr_id']."
                                    AND id_partie = ".$_SESSION['id_partie']);

            $nb_pays = $nb_pays->fetch();

            if($nb_pays['nbPays'] == 0){
                $bdd->exec("UPDATE partie_has_joueur 
                            SET etat_joueur = 'defaite' 
                            WHERE id_partie = ".$_SESSION['id_partie']." 
                            AND id_joueur = ".$_SESSION['usr_id']);

                echo "<a href= \"accueil.php\"> Defaite... </a>";
            }
            else{
                //On regarde qui joue
                $joueur_joue = $bdd->query("SELECT usr_pseudo
                                        FROM partie p
                                        INNER JOIN user u ON p.a_qui_le_tour = u.usr_id
                                        WHERE id_partie=". $_SESSION['id_partie']);
                $joueur_joue = $joueur_joue->fetch();

                echo $joueur_joue['usr_pseudo']. " joue...";
            }

        }
    }

?>