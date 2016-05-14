<?php
session_start();

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