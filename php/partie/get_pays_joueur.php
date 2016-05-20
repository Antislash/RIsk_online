<?php
    include "functions_partie.php";
    include "../site/connexion.php";
    //$id_partie = $_SESSION['id_partie'];
    $id_partie = 166;
    //$id_joueur = $_SESSION[''];
    $id_joueur = 2;
    echo getAllCountryJoueur($bdd, $id_partie, $id_joueur, true);
?>