<?php
    include "functions_partie.php";
    include "../site/connexion.php";
    include "../site/verif_connexion.php";
    $id_partie = $_SESSION['id_partie'];
    $id_joueur = $_SESSION['usr_id'];
    echo getAllCountryJoueur($bdd, $id_partie, $id_joueur, true);
?>