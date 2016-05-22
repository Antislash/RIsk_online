<?php
include "../site/connexion.php";
include "../site/verif_connexion.php";
include "../../www/include/attack.php";

if(isset($_GET['idAttaque']) && isset($_GET['idDefense'])){
    attack($bdd, $_SESSION['id_partie'], $_GET['idAttaque'], $_GET['idDefense'], $_SESSION['usr_id']);
}
?>