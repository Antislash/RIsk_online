<?php
	//On vérifie si les session sont déja activées
	if(session_id() == null){
		session_start();
	}

	include "../../php/site/connexion.php";

	//On vérifie qu'un utilisateur a ajouter est bien renseigné ainsi que la personne voulant l'ajouter
	if(isset($_GET['pseudoSearch']) && isset($_SESSION['usr_id'])){

		//On vérifie que le joueur recherché existe bien
		$req = $bdd->query("SELECT * 
							FROM user 
							WHERE usr_pseudo = '".$_GET['pseudoSearch']."'");
		$user_ami = $req->fetch();

		if($user_ami != false){

			//On vérifie que le joueur ne s'ajoute pas lui même en amis
			if($user_ami['usr_id'] == $_SESSION['usr_id']){
				echo "Vous ne pouvez pas etre ami avec vous-meme";
			}
			else{
				$req2 = $bdd->query("SELECT * 
									 FROM user1_has_user2 
									 WHERE (id_usr1 = ".$_SESSION['usr_id']." 
									 AND id_usr2 = ".$user_ami['usr_id'].")");

				if($req2->fetch() == false){
					$insert1 = "INSERT INTO user1_has_user2 (id_usr1, id_usr2) VALUES (".$_SESSION['usr_id'].",". $user_ami['usr_id'].")";
					$insert2 = "INSERT INTO user1_has_user2 (id_usr1, id_usr2) VALUES (".$user_ami['usr_id'].",". $_SESSION['usr_id'].")";
					$req1 = $bdd->exec($insert1);
					$req2 = $bdd->exec($insert2);
					if($req1 != false && $req2 != false){
						echo "Vous etes ami avec '".$user_ami['usr_pseudo']."'";
					}
				}
				else{
					echo "Vous etes deja ami avec '".$user_ami['usr_pseudo']."'";
				}
			}
		}
		else{
			echo 'Le joueur \''.$_GET['pseudoSearch'].'\' n\'existe pas.';
		}
	}
	else{
		echo "";
	}
?>