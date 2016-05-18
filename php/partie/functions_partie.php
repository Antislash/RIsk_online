<?php

	include "../site/connexion.php";

	function canMove($id_partie, $id_joueur, $id_pays1, $id_pays2){
		return canMoveRecursive($id_partie, $id_joueur, $id_pays1, $id_pays2, $paysVisited);
	}
	
	function canMoveRecursive($id_partie, $id_joueur, $id_pays1, $id_pays2){
		
		if(isAllPaysVisited($paysVisited) == true){	//si on a parcouru tous les pays
			return false;
		}
		else if(true){	//TODO si on est sur le bon pays
			
		}
		else{
			//TODO marquer le pays comme visited
			return canMoveRecursive($id_partie, $id_joueur, /*pays voisin de $id_pays1,*/ $id_pays2);
		}
	}
	
	function isAllPaysVisited(array $paysVisited){
		foreach($paysVisited as $pays){
			if($pays == false){
				return false;
			}
		}
		return true;
	}
	
	function getNeighbourCountry($bdd, $id_partie, $id_joueur, $id_pays){
		//On recupere les pays voisins du pays
		$neighboursCountries = $bdd->query("SELECT * FROM  `pays1_has_pays2`  WHERE `id_pays1` = ".$id_pays."");
		//On recupere les pays du joueur
		$allPays = $bdd->query("SELECT * FROM partie_has_joueur_has_pays WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur."");
		$neighboursCountriesPlayer = array();
		foreach($neighboursCountries as $country){
			//var_dump($country);
		}
	}
	
	$id_partie = 1;
	$id_joueur = 1;
	$allPays = $bdd->query("SELECT * FROM partie_has_joueur_has_pays WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur."");
	$paysVisited = array();
	foreach($allPays as $pays){
		//var_dump($pays);
		$paysVisited[$pays['id_pays']] = false;
	}
	
	getNeighbourCountry($bdd, $id_partie, $id_joueur, 39);
?>
