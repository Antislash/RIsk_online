
<?php 
	include "connexion.php";
	
	//Exemple TEST
	$_POST['connexionPseudo'] = 'Luc';
	$_POST['connexionPassword'] = 'test';
	if(isset($_POST['connexionPseudo']) && isset($_POST['connexionPassword'])){
		$pseudo = filter_var($_POST['connexionPseudo'], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST['connexionPassword'], FILTER_SANITIZE_STRING);
		$user = $bdd->query("SELECT * FROM user WHERE pseudo = '".$pseudo."'");
		/*foreach($user as $us){
			var_dump($us);
		}*/
		if($user == false){
			//l'user n'existe pas
			//TODO renvoyer vers inscription
		}
		else if(true){	//TODO comparer les password
			
		}
		//var_dump($user);
	}
?>