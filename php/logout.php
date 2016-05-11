<?php
session_start();

if (isset($_SESSION['id'])) {
    $bdd->query("UPDATE user SET statut = off WHERE id = " . $_SESSION['id_user']);
}

session_destroy();

header('Location: ../www/login.html');
?>