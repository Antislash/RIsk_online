<?php
    /**
     * Ce fichier permet de récupérer les informations essentielles avant de commencer une partie sur un joueur et les met en variable de session
     */

    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../site/connexion.php";

    unset($_SESSION['room_id']);

    $id_partie= $bdd->query("SELECT p.id_partie
						    FROM partie p
						    INNER JOIN partie_has_joueur phj ON p.id_partie = phj.id_partie
						    WHERE phj.joueur_dans_partie = 1
                            AND p.partie_statut IN ('en cours', 'init')
                            AND phj.id_joueur = ".$_SESSION['usr_id']);

    $id_partie = $id_partie->fetch();

    //Si le joueur n'est pas présent dans une partie
    if($id_partie == false){
        header('Location: ../../www/acceuil.php');
    }
    else{
        $_SESSION['id_partie'] = $id_partie['id_partie'];

        header('Location: ../../www/game.php');
    }

?>