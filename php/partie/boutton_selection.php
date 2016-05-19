<?php

    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../site/connexion.php";

    if(isset($_GET['b'])){
        if($_GET['b'] == 1){
            $_SESSION['boutton_troupe'] = "+";
        }
        else{
            $_SESSION['boutton_troupe'] = "-";
        }
    }
?>