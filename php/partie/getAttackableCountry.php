<?php
session_start();
include "../../php/site/connexion.php";

function getAttackableCountry($bdd, $id_partie, $id_joueur, $id_pays){
	//On recupere les pays voisins du pays
	$neighboursCountries = $bdd->query("SELECT * FROM  `pays1_has_pays2`  WHERE `id_pays1` = ".$id_pays);
	$neighboursCountriesPlayer = array();
	//On parcourt les pays voisins
	foreach($neighboursCountries as $country){
		$req = $bdd->query("SELECT * FROM partie_has_joueur_has_pays WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur." AND id_pays = ".$country['id_pays2']);
		$joueurHasPays = $req->fetch();
		if($joueurHasPays == false){	//Si le joueur ne possède pas le pays
			array_push($neighboursCountriesPlayer, $country['id_pays2']);
		}
	}
	return $neighboursCountriesPlayer;
}

$attackableCountries = getAttackableCountry($bdd, $_SESSION['id_partie'], $_SESSION['usr_id'], $_GET['country']);
$retour = '';
foreach($attackableCountries as $attackableCountry) {
	$retour = $retour.$attackableCountry.";";
}

echo $retour;
?>