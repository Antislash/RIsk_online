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
                        AND id_joueur = ".$a_qui_le_tour['a_qui_le_tour']);
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

        //On récupére le nombre de pays du joueur suivant
        $nb_pays = $bdd->query("SELECT count(*) as nbPays
                                FROM partie_has_joueur_has_pays
                                WHERE id_joueur = ".$_SESSION['id_joueur_suivant']."
                                AND id_partie = ".$_SESSION['id_partie']);

        $nb_pays = $nb_pays->fetch();


        //Dans le cas où le joueur suivant n'a plus de pays
        if($nb_pays['nbPays'] == 0){

            do{
                //On place le statut du joueur suivant a defaite
                $bdd->exec("UPDATE partie_has_joueur 
                            SET etat_joueur = 'defaite' 
                            WHERE id_partie = ".$_SESSION['id_partie']." 
                            AND id_joueur = ".$_SESSION['id_joueur_suivant']);

                $liste_joueur = $bdd->query("SELECT id_joueur
                                             FROM partie_has_joueur
                                             WHERE id_partie = 166
                                             AND etat_joueur <> 'defaite'");

                //On récupére le joueur suivant qui n'a pas de défaite
                $liste = array();
                $nb_joueur=0;
                while($joueur = $liste_joueur->fetch()){
                    array_push($liste,$joueur['id_joueur']);
                    $nb_joueur++;
                }

                //Dans le cas où
                if($nb_joueur == 1){
                    //On place le statut du joueur suivant a defaite
                    $bdd->exec("UPDATE partie_has_joueur 
                                SET etat_joueur = 'victoire' 
                                WHERE id_partie = ".$_SESSION['id_partie']." 
                                AND id_joueur = ".$_SESSION['usr_id']);
                }

                $_SESSION['nb_joueur'] = $nb_joueur;

                //Récupérer l'id du joueur suivant
                for ($i = 0; $i < count($liste)-1 ; $i++){

                    if($liste[$i] == $_SESSION['usr_id']){
                        $_SESSION['id_joueur_suivant'] = intval($liste[$i+1]);
                        break;
                    }
                }

                //Dans le cas où nous sommes le dernier
                if(!isset($_SESSION['id_joueur_suivant'])){
                    $_SESSION['id_joueur_suivant'] = intval($liste[0]);
                }

                //On vérifie que le joueur suivant posséde toujours des pays
                $nb_pays = $bdd->query("SELECT count(*) as nbPays
                                    FROM partie_has_joueur_has_pays
                                    WHERE id_joueur = ".$_SESSION['id_joueur_suivant']."
                                    AND id_partie = ".$_SESSION['id_partie']);

                $nb_pays = $nb_pays->fetch();
            }while($nb_pays['nbPays'] == 0);

        }

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