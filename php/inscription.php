<?php 
	include "connexion.php";
	
	//Exemple TEST
	//$_POST['connexionPseudo'] = 'Luc';
	//$_POST['connexionPassword'] = 'test';
	if(isset($_POST['inscriptionPseudo']) && isset($_POST['inscriptionPassword1'])){
		$pseudo = filter_var($_POST['inscriptionPseudo'], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST['inscriptionPassword1'], FILTER_SANITIZE_STRING);
		$user = $bdd->query("SELECT * FROM user WHERE pseudo = '".$pseudo."'");
		if($user == false){
			//l'user n'existe pas
			//TODO inscrire le joueur
			//TODO redirigé vers connexion.php
		}
		else{
			//Nom d'utilisateur déjà existant
			//TODO Redirigé vers formulaire inscription
		}
	}
	else{
		//Formulaire incomlet
		//TODO Redirigé vers formulaire inscription
	}
?>
