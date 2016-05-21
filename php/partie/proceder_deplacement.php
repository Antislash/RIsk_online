<?php
    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../site/connexion.php";
    include "../site/verif_connexion.php";
    include "functions_partie.php";

    if(isset($_POST['move']) && strlen($_POST['move']) > 0){
        $moves = explode(",", $_POST['move']);
        $i = 0;
        $tabDeplace = array();
        foreach($moves as $deplace)
        {
            if($deplace != ''){
                $tabDeplace[$i] = $deplace;
            }
            $i++;
        }

        deplacement($bdd, $_SESSION['id_partie'], $_SESSION['usr_id'], $tabDeplace);
    }

    //Fonction qui place le bon nombre de pion sur les pays concernés par le déplacement
    function deplacement($bdd, $id_partie, $id_joueur, array $tab){
        foreach($tab as $key => $value){
            $bdd->exec("UPDATE partie_has_joueur_has_pays
                    SET nb_pions = ".$value."
                    WHERE id_partie =".$id_partie."  
                    AND id_joueur = ".$id_joueur." 
                    AND id_pays =".$key);
        }
    }
?>