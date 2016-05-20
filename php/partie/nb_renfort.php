<?php
	include "../site/connexion.php";
	include "../site/verif_connexion.php";
	include "functions_partie.php";
	
	echo getNbRenforts($bdd, $_SESSION['id_partie'], $_SESSION['id_joueur']);
?>