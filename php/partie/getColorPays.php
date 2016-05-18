<?php
include "../site/connexion.php"; //Connexion a la base de données

$infos = $bdd->query("	SELECT t1.id_pays, col.clr_css, t2.id_joueur, t1.nb_pions
						FROM partie_has_joueur_has_pays t1
						INNER JOIN partie_has_joueur t2 ON t1.id_partie = t2.id_partie
						INNER JOIN couleur col ON col.clr_code = t2.code_clr
						AND t2.id_joueur = t1.id_joueur
						WHERE t2.id_partie =119");
$listePays = "";
$listeCouleur = "";
$listePions = "";
while($info = $infos->fetch()){
	$listePays = $listePays.$info['id_pays'].";";
	$listeCouleur = $listeCouleur.$info['clr_css'].";";
	$listePions = $listePions.$info['nb_pions'].";";
}
$listePays = substr($listePays, 0, -1);
$listeCouleur = substr($listeCouleur, 0, -1);
$listePions = substr($listePions, 0, -1);

echo $listePays . "|" . $listeCouleur . "|" . $listePions;
?>