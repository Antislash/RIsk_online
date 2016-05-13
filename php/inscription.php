<?php
	session_start();
	include "connexion.php";
	
	//Exemple TEST
	//$_POST['connexionPseudo'] = 'Luc';
	//$_POST['connexionPassword'] = 'test';
	if(isset($_POST['inscriptionPseudo']) && isset($_POST['inscriptionPassword1'])){
		$pseudo = filter_var($_POST['inscriptionPseudo'], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST['inscriptionPassword1'], FILTER_SANITIZE_STRING);

		$select = "SELECT * FROM user WHERE usr_pseudo = '".$pseudo."'";
		$user = $bdd->query($select);
		$user = $user->fetch(PDO::FETCH_ASSOC);

		if($user['usr_pseudo'] == null){
			//l'user n'existe pas
			//TODO inscrire le joueur
			$insert = "INSERT INTO user (usr_pseudo, usr_password, usr_email, usr_date_inscription, id_img,code_sta) VALUES ('".$pseudo."','". md5($password)."', NULL,CURDATE(), 1, 'on'  )";
			$req = $bdd->exec($insert);

			$user = $bdd->query("SELECT * FROM user WHERE usr_pseudo = '" . $pseudo . "' AND usr_password = '" . md5($password)."'");
			$user = $user->fetch(PDO::FETCH_ASSOC);

			//TODO redirigé vers connexion.php
			$_SESSION['pseudo'] = $pseudo;
			$_SESSION['password'] = md5($password);
			$_SESSION['usr_id'] = $user['usr_id'];
			header('Location: login.php');
		}
		else{
			//Nom d'utilisateur déjà existant.
			//TODO Redirigé vers formulaire inscription
			header('Location: ../www/login.php');
		}
	}
	else{
		//Formulaire incomlet
		//TODO Redirigé vers formulaire inscription
		header('Location: ../www/login.php');
	}
?>
