<?php
    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../site/connexion.php";

    switch($_SESSION['nb_joueur']){
        case 2: echo "40";
            break;

        case 3: echo "35";
            break;

        case 4 : echo "30";
            break;

        case 5 : echo "25";
            break;

        case 6 : echo "20";
            break;

        default : echo "Le nombre de joueur n'est pas correct";
    }
?>