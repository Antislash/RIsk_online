<?php
	//On vérifie si les session sont déja activées
	if(session_id() == null){
		session_start();
	}
	include "../site/connexion.php";
	include "../site/verif_connexion.php";
	include "functions_partie.php";
	
	echo getNbRenforts($bdd, $_SESSION['id_partie'], $_SESSION['usr_id']);

?>