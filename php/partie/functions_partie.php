<?php

include "../site/connexion.php";
//TEST
//TODO récupérer ces valeurs en GET
$id_partie = 119;
$id_joueur = 11;

//On récupère les pays d'un joueur
$allPays = $bdd->query("SELECT * FROM partie_has_joueur_has_pays WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur);
$paysVisited = array();
//On initialise le tabeleau des pays visités à false
foreach($allPays as $pays){
	$paysVisited[$pays['id_pays']] = false;
}
//TEST
//var_dump(canMove($bdd, $id_partie, $id_joueur, 11, 15));

//Fonction récursive pour savoir s'il existe un chemin entre 2 pays
function canMove($bdd, $id_partie, $id_joueur, $id_pays1, $id_pays2){
	global $paysVisited;	//On récupère le tableau des pays visités
	if(isAllPaysVisited($paysVisited) == true){	//si on a parcouru tous les pays du joueur
		return false;
	}
	else if($id_pays1 == $id_pays2){	//Si on est dans le bon pays
		return true;
	}
	else{
		$bool = false;
		//On récupère tous les pays voisins du joueur
		foreach(getNeighbourCountry($bdd, $id_partie, $id_joueur, $id_pays1) as $pays) {
			//Si on a pas déjà visité le pays
			if ($paysVisited[$pays] != true) {
				$paysVisited[$pays] = true;	//On le marque comme visité
				//Le bool prend la valeur false OU valeur de la récursivité
				$bool = $bool || canMove($bdd, $id_partie, $id_joueur, $pays, $id_pays2);
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

//Fonction pour récupérer les pays voisins d'un joueur
function getNeighbourCountry($bdd, $id_partie, $id_joueur, $id_pays){
	//On recupere les pays voisins du pays
	$neighboursCountries = $bdd->query("SELECT * FROM  `pays1_has_pays2`  WHERE `id_pays1` = ".$id_pays);
	$neighboursCountriesPlayer = array();
	//On parcourt les pays voisins
	foreach($neighboursCountries as $country){
		$req = $bdd->query("SELECT * FROM partie_has_joueur_has_pays WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur." AND id_pays = ".$country['id_pays2']);
		$joueurHasPays = $req->fetch();
		if($joueurHasPays != false){	//Si le joueur possède le pays
			array_push($neighboursCountriesPlayer, $country['id_pays2']);
		}
	}
	return $neighboursCountriesPlayer;
}
?>
