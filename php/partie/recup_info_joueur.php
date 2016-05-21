<?php
    /**
     * Ce fichier permet de récupérer les informations essentielles avant de commencer une partie sur un joueur et les met en variable de session
     */

    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../site/connexion.php";

    //On récupére la liste des joueurs
    $id_partie= $bdd->query("SELECT p.id_partie
						    FROM partie p
						    INNER JOIN partie_has_joueur phj ON p.id_partie = phj.id_partie
						    WHERE phj.joueur_dans_partie = 1
                            AND p.partie_statut IN ('en cours', 'init')
                            AND phj.id_joueur = ".$_SESSION['usr_id']);

    $id_partie = $id_partie->fetch();

    //Si le joueur n'est pas présent dans une partie
    if($id_partie == false){
       // header('Location: ../../www/acceuil.php');

    }
    //Si il y a bien une partie
    else{
        $_SESSION['id_partie'] = intval($id_partie['id_partie']);

        //On récupère la liste des joueurs
        $liste_joueur = $bdd->query("SELECT id_joueur
                                    FROM partie_has_joueur
                                    WHERE id_partie =". $_SESSION['id_partie']);
        //On récupére l'id du joueur suivant
        $liste = array();
        $nb_joueur=0;
        while($joueur = $liste_joueur->fetch()){
            array_push($liste,$joueur['id_joueur']);
            $nb_joueur++;
        }

        $_SESSION['nb_joueur'] = $nb_joueur;

        for ($i = 0; $i < count($liste)-1 ; $i++){

            //Quand on tombe sur nous même
            if($liste[$i] == $_SESSION['usr_id']){
                $_SESSION['id_joueur_suivant'] = intval($liste[$i+1]);
                break;
            }
        }

        //Dans le cas où le joueur est le dernier
        if(!isset($_SESSION['id_joueur_suivant'])){
            $_SESSION['id_joueur_suivant'] = intval($liste[0]);
        }

        if(isset($_SESSION['room_id'])){
            $bdd->query("UPDATE room
                     SET statut_room='fermer'
                     WHERE room_id = ".$_SESSION['room_id']);

            unset($_SESSION['room_id']);
        }



        header('Location: ../../www/game.php');
    }

?>