<?php
session_start();

if (isset($_SESSION['id'])) {
    $bdd->query("UPDATE user SET statut = 'off' WHERE id = " . $_SESSION['id_user']);
}

setcookie('pseudo',NULL,time()-3600);
setcookie('password',NULL,time()-3600);

session_destroy();
header('Location: ../../www/login.php');
?>