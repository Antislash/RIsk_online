<?php
    /**
     * Ce fichier permet aux joueur de se déconnecter appelé par le fichier "www/include/navigation.php"
     */
    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "connexion.php";

    if (isset($_SESSION['usr_id'])) {

        //Met le statut du joueur à "hors ligne"
        $bdd->exec("UPDATE user SET code_sta = 'off' WHERE usr_id =" . $_SESSION['usr_id']);
    }

    setcookie('pseudo',NULL,time()-3600);
    setcookie('password',NULL,time()-3600);

    session_destroy();
    header('Location: ../../www/login.php');
?>