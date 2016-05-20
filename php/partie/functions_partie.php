<?php

include "../site/connexion.php";

//TODO récupérer ces valeurs en GET
//TEST
/*$id_partie = 165;
$id_joueur = 11;
getNbRenforts($bdd, $id_partie, $id_joueur);*/

//initialiseRenfortStart($bdd, $id_partie);
//addRenfortPays($bdd, $id_partie, $id_joueur, 2);
//removeRenfortPays($bdd, $id_partie, $id_joueur, 2);
//moveOneToFrom($bdd, $id_partie, $id_joueur, 2, 3);
/*initialiseRenfortTour($bdd, $id_partie, $id_joueur);
$pays = array(1 => 4, 4 => 3, 11 => 7);
addArrayRenfort($bdd, $id_partie, $id_joueur, $pays);*/
//getAllCountryJoueur($bdd, $id_partie, $id_joueur, true);


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


/**
 * Fonction pour récupérer les pays voisins d'un joueur
 * @param $bdd
 * @param $id_partie
 * @param $id_joueur
 * @param $id_pays
 * @return Pays voisins du joueur
 */
function getNeighbourCountry($bdd, $id_partie, $id_joueur, $id_pays){
	//On recupere les pays voisins du pays
	$neighboursCountries = $bdd->query("SELECT * 
										FROM  `pays1_has_pays2`  
										WHERE `id_pays1` = ".$id_pays);
	$neighboursCountriesPlayer = array();
	//On parcourt les pays voisins
	foreach($neighboursCountries as $country){
		$req = $bdd->query("SELECT * 
							FROM partie_has_joueur_has_pays 
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur." AND id_pays = ".$country['id_pays2']);
		$joueurHasPays = $req->fetch();
		if($joueurHasPays != false){	//Si le joueur possède le pays
			array_push($neighboursCountriesPlayer, $country['id_pays2']);
		}
	}
	return $neighboursCountriesPlayer;
}

/**
 * Fonctions qui déplace un renfort d'un pays à l'autre, si c'est possible
 * @param $bdd
 * @param $id_partie
 * @param $id_joueur
 * @param $id_paysFrom
 * @param $id_paysTo
 */
function moveOneToFrom($bdd, $id_partie, $id_joueur, $id_paysFrom, $id_paysTo){
	$allPays = $bdd->query("SELECT * 
							FROM partie_has_joueur_has_pays 
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur);
	global $paysVisited;
	$paysVisited = array();
	//On initialise le tabeleau des pays visités à false
	foreach($allPays as $pays){
		$paysVisited[$pays['id_pays']] = false;
	}
	//On vérifie que le joueurs possède bien les deux pays
	$req1 = $bdd->query("	SELECT * 
							FROM partie_has_joueur_has_pays 
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur." AND id_pays = ".$id_paysFrom);
	$paysFrom = $req1->fetch();
	$req2 = $bdd->query("	SELECT * 
							FROM partie_has_joueur_has_pays 
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur." AND id_pays = ".$id_paysTo);
	$paysTo = $req2->fetch();
	if($paysFrom != false && $paysTo != false) {    //Si le joueur possède les 2 pays
		//pays appartiennent au joueur
		if($paysFrom['nb_pions'] > 1){
			//nb pion suffisant
			if (canMove($bdd, $id_partie, $id_joueur, $id_paysFrom, $id_paysTo)) {
				//frontièere commune
				$update1 = "UPDATE partie_has_joueur_has_pays
							SET nb_pions = ".($paysFrom['nb_pions']-1)."
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur." AND id_pays = ".$paysFrom['id_pays'];
				$update2 = "UPDATE partie_has_joueur_has_pays
							SET nb_pions = ".($paysTo['nb_pions']+1)."
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur." AND id_pays = ".$paysTo['id_pays'];
				$req1 = $bdd->exec($update1);
				$req2 = $bdd->exec($update2);
				if(!($req1 == false || $req2 == false)){	//Si l'update est bon
					return true;
				}
			}
		}
	}
	return false;
}

function getContinentJoueur($bdd, $id_partie, $id_joueur){
	//Tableau pour savoir le le nombre de pays pour chaque continent
	$continentArrayNb = array();
	//Tableau retourné avec les continents possédés par le joueur
	$continentArray = array();
	//Tableau de tous les continents
	$allContinent = array();
	$reqContinent = $bdd->query("	SELECT * 
									FROM continent");
	//On récupère tous les continents
	foreach($reqContinent as $continent){
		$allContinent[$continent['cnt_id']] = $continent;
	}
	//On initialise un tableau à 0 avec comme clé l'id du continent
	foreach($allContinent as $continent){
		$continentArrayNb[$continent['cnt_id']] = 0;
	}
	//On récupère tous les pays du joueur
	$allPaysJoueur = getAllCountryJoueur($bdd, $id_partie, $id_joueur);
	//On calcule combien de pays à la joueur dans chaque continent
	foreach($allPaysJoueur as $pays){
		$continentArrayNb[intval($pays['continent_id'])]++;
	}
	foreach($continentArrayNb as $key => $nbPays){
		//Si le joueur possède le continent
		if($nbPays == $allContinent[$key]['cnt_nb_pays']){
			array_push($continentArray, $allContinent[$key]);
		}
	}
	return $continentArray;
}

function getAllCountryJoueur($bdd, $id_partie, $id_joueur, $implode = false){
	//On récupère tous les pays du joueur
	$allPaysJoueur = array();
	$allPays = $bdd->query("SELECT * 
							FROM partie_has_joueur_has_pays 
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur);
	//On récupère le pays complet pour chaque pays
	foreach($allPays as $pays){
		$req = $bdd->query("SELECT * 
						  	FROM pays
							WHERE id_pays = ".$pays['id_pays']);
		$paysComplete = $req->fetch();
		array_push($allPaysJoueur, $paysComplete);
	}
	if($implode){
		$chaine = "";
		foreach($allPaysJoueur as $pays){
			$chaine = $chaine.$pays['id_pays'].";";
		}
		return $chaine;
	}
	else{
		return $allPaysJoueur;
	}
}

function getNbRenforts($bdd, $id_partie, $id_joueur){
	//On récupère l'état du jeu
	$req = $bdd->query("SELECT * 
						FROM partie_has_joueur 
						WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur);
	$joueur = $req->fetch();
	if($joueur == false){
		return false;
	}
	else if($joueur['etat_joueur'] == 'init'){
		initialiseRenfortStart($bdd, $id_partie);
	}
	else{
		initialiseRenfortTour($bdd, $id_partie, $id_joueur);
	}
	//On récupère les continents possédés par le joueur;
	$continentJoueur = getContinentJoueur($bdd, $id_partie, $id_joueur);

	//On récupère les pays possédés par le joueur;
	$paysJoueur = getAllCountryJoueur($bdd, $id_partie, $id_joueur);

	//On prend le max entre 3 et (nb_pays)/3 (Pour avoir au minimum 3 renforts)
	$nbRenfortsPays = max(3, sizeof($paysJoueur)/3);
	$nbRenfortsContinent = 0;

	//On récupère le nombre de renfort pour chaque continent possédé par le joueur
	foreach($continentJoueur as $continent){
		$nbRenfortsContinent += $continent['cnt_nb_renfort'];
	}
	return $nbRenfortsPays + $nbRenfortsContinent;
}

function initialiseRenfortTour($bdd, $id_partie, $id_joueur){
	$nbRenfort = getNbRenforts($bdd, $id_partie, $id_joueur);
	$reqRenfort = $bdd->query("	SELECT * 
								FROM partie_has_joueur
								WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur);
	$joueur = $reqRenfort->fetch();
	if($joueur['nb_renforts'] != 0){
		return false;
	}
	$update = "	UPDATE partie_has_joueur
			  	SET nb_renforts = ".$nbRenfort."
				WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur;
	$req = $bdd->exec($update);
	if($req != false){
		return true;
	}
	return false;
}

function initialiseRenfortStart($bdd, $id_partie){
	$joueurs =array();
	$req = $bdd->query("SELECT * 
						FROM partie_has_joueur
						WHERE id_partie = ".$id_partie);
	foreach($req as $joueur){
		array_push($joueurs, $joueur);
	}
	$nb_joueurs = sizeof($joueurs);
	switch($nb_joueurs){
		case 2: $nb_renforts = 40;
			break;
		case 3: $nb_renforts = 35;
			break;
		case 4 : $nb_renforts = 30;
			break;
		case 5 : $nb_renforts = 25;
			break;
		case 6 : $nb_renforts = 20;
			break;
		default : $nb_renforts = 0;
	}
	foreach($joueurs as $joueur){
		$update = "	UPDATE partie_has_joueur
				  	SET nb_renforts = ".$nb_renforts."
					WHERE id_partie = ".$id_partie." AND id_joueur = ".$joueur['id_joueur'];
		$req = $bdd->exec($update);
		if($req == false){
			return false;
		}
	}
}

function addRenfortPays($bdd, $id_partie, $id_joueur, $id_pays){
	$req = $bdd->query("SELECT * 
						FROM partie_has_joueur_has_pays 
						WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur." AND id_pays = ".$id_pays);
	$pays = $req->fetch();
	if($pays != false){	//Si le joueur possède bien le pays
		$req = $bdd->query("SELECT * 
							FROM partie_has_joueur
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur);
		$joueur = $req->fetch();
		if($joueur != false){
			if($joueur['nb_renforts'] > 0){
				//var_dump($pays);
				$update1 = "UPDATE partie_has_joueur
							SET nb_renforts = ".($joueur['nb_renforts']-1)."
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur;
				$update2 = "UPDATE partie_has_joueur_has_pays
							SET nb_pions = ".($pays['nb_pions']+1)."
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur." AND id_pays = ".$pays['id_pays'];
				$req1 = $bdd->exec($update1);
				$req2 = $bdd->exec($update2);
				if($req1 != false && $req2 != false){
					return true;
				}
			}
		}
	}
	return false;
}

function removeRenfortPays($bdd, $id_partie, $id_joueur, $id_pays){
	$req = $bdd->query("SELECT * 
						FROM partie_has_joueur_has_pays 
						WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur." AND id_pays = ".$id_pays);
	$pays = $req->fetch();
	if($pays != false){	//Si le joueur possède bien le pays avec + d'1 renfort
		$req = $bdd->query("SELECT * 
							FROM partie_has_joueur
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur);
		$joueur = $req->fetch();
		if($joueur != false){
			if($pays['nb_pions'] > 1){
				//var_dump($pays);
				$update1 = "UPDATE partie_has_joueur
							SET nb_renforts = ".($joueur['nb_renforts']+1)."
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur;
				$update2 = "UPDATE partie_has_joueur_has_pays
							SET nb_pions = ".($pays['nb_pions']-1)."
							WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur." AND id_pays = ".$pays['id_pays'];
				$req1 = $bdd->exec($update1);
				$req2 = $bdd->exec($update2);
				if($req1 != false && $req2 != false){
					return true;
				}
			}
		}
	}
	return false;
}

function addArrayRenfort($bdd, $id_partie, $id_joueur, array $pays){
	foreach($pays as $key => $value){
		for($i=0;$i<$value;$i++){
			addRenfortPays($bdd, $id_partie, $id_joueur, $key);
		}
	}
}
?>
