<?php
    //On vérifie sur les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../php/site/connexion.php";

?>