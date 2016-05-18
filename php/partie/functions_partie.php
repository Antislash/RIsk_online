<?php

include "../site/connexion.php";

$id_partie = 119;
$id_joueur = 11;
$allPays = $bdd->query("SELECT * FROM partie_has_joueur_has_pays WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur."");
$paysVisited = array();
foreach($allPays as $pays){
	//var_dump($pays);
	$paysVisited[$pays['id_pays']] = false;
}
//var_dump(isAllPaysVisited($paysVisited));
//getNeighbourCountry($bdd, $id_partie, $id_joueur, 37);
var_dump(canMoveRecursive($bdd, $id_partie, $id_joueur, 11, 21));

/*function canMove($id_partie, $id_joueur, $id_pays1, $id_pays2){
	global $paysVisited;
	return canMoveRecursive($id_partie, $id_joueur, $id_pays1, $id_pays2, $paysVisited);
}*/

function canMoveRecursive($bdd, $id_partie, $id_joueur, $id_pays1, $id_pays2){
	global $paysVisited;
	if(isAllPaysVisited($paysVisited) == true){	//si on a parcouru tous les pays
		return false;
	}
	else if($id_pays1 == $id_pays2){	//TODO si on est sur le bon pays
		return true;
	}
	else{
		//TODO marquer le pays comme visited
		$bool = false;
		foreach(getNeighbourCountry($bdd, $id_partie, $id_joueur, $id_pays1) as $pays) {
			if ($paysVisited[$pays] != true) {
				$paysVisited[$pays] = true;
				$bool = $bool || canMoveRecursive($bdd, $id_partie, $id_joueur, $pays, $id_pays2);
			}
		}
		return $bool;
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
	$neighboursCountries = $bdd->query("SELECT * FROM  `pays1_has_pays2`  WHERE `id_pays1` = ".$id_pays);
	//On recupere les pays du joueur
	$allPays = $bdd->query("SELECT * FROM partie_has_joueur_has_pays WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur);
	$neighboursCountriesPlayer = array();
	foreach($neighboursCountries as $country){
		$req = $bdd->query("SELECT * FROM partie_has_joueur_has_pays WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur." AND id_pays = ".$country['id_pays2']);
		$joueurHasPays = $req->fetch();
		if($joueurHasPays != false){
			array_push($neighboursCountriesPlayer, $country['id_pays2']);
		}
	}
	return $neighboursCountriesPlayer;
}
?>
