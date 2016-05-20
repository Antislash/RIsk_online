<?php
function attack($bdd, $id_partie, $id_pays_attack, $id_pays_defense, $id_joueur_attack) {

	$query_troop_attack = $bdd->query("SELECT * FROM  `partie_has_joueur_has_pays` WHERE id_partie = ".$id_partie." AND id_pays = ".$id_pays_attack);
	$troop_attack = $query_troop_attack->fetch();
	$query_troop_defense = $bdd->query("SELECT * FROM  `partie_has_joueur_has_pays` WHERE id_partie = ".$id_partie." AND id_pays = ".$id_pays_defense);
	$troop_defense = $query_troop_defense->fetch();

	if ($troop_defense['id_joueur'] != $id_joueur_attack) {
		$nb_des_attack = $troop_attack['nb_pions'] - 1;
		$nb_des_defense = $troop_defense['nb_pions'];
		echo "<p>L'attaque possède ".$troop_attack['nb_pions']." troupes.</p>";
		echo "<p>La défense possède ".$troop_defense['nb_pions']." troupes.</p>";

		if($nb_des_attack > 3) {
			$nb_des_attack = 3;
		}

		else if($nb_des_attack < 1) {
			return false;
		}

		if($nb_des_defense > 2) {
			$nb_des_defense = 2;
		}

		else if ($nb_des_defense < 1) {
			return false;
		}

		for ($i = 0; $i < $nb_des_attack; $i++) {
			$des_attack[$i] = rand(1,6);
		}

		for ($i = 0; $i < $nb_des_defense; $i++) {
			$des_defense[$i] = rand(1,6);
		}

		rsort($des_attack);
		rsort($des_defense);

		affichage_des($des_attack, $des_defense);
		suppression_troupes($bdd, $des_attack, $des_defense, $id_pays_attack, $id_pays_defense, $id_joueur_attack, $id_partie);
	}

	else {
		echo "Victoire !";
	}
}

function suppression_troupes($bdd, $des_attack, $des_defense, $id_pays_attack, $id_pays_defense, $id_joueur, $id_partie) {

	$attack_loose = 0;
	$defense_loose = 0;

	for($i = 0; $i <count($des_attack); $i++) {
		if(isset($des_defense[$i]) && $des_attack[$i] > $des_defense[$i]) {
			$defense_loose = $defense_loose + 1;
		}

		else if(isset($des_defense[$i]) && $des_attack[$i] <= $des_defense[$i]) {
			$attack_loose = $attack_loose + 1;
		}
	}

	echo "<p>L'attaque a perdu ".$attack_loose." troupes.</p>";
	echo "<p>La défense a perdu ".$defense_loose." troupes.</p>";

	$bdd->query("UPDATE partie_has_joueur_has_pays SET nb_pions=nb_pions - '".$attack_loose."'  WHERE id_partie = ".$id_partie." AND id_pays='".$id_pays_attack."'");
	$bdd->query("UPDATE partie_has_joueur_has_pays SET nb_pions=nb_pions - '".$defense_loose."'  WHERE id_partie = ".$id_partie." AND id_pays='".$id_pays_defense."'");

	$query_troop_defense = $bdd->query("SELECT * FROM  `partie_has_joueur_has_pays` WHERE id_partie = ".$id_partie." AND id_pays = ".$id_pays_defense);
	$troop_defense = $query_troop_defense->fetch();
	$query_troop_attack = $bdd->query("SELECT * FROM  `partie_has_joueur_has_pays` WHERE id_partie = ".$id_partie." AND id_pays = ".$id_pays_attack);
	$troop_attack = $query_troop_attack->fetch();
	if($troop_defense['nb_pions'] == 0) {
		$bdd->query("UPDATE partie_has_joueur_has_pays SET id_joueur='".$id_joueur."', nb_pions = '1' WHERE id_partie = ".$id_partie." AND id_pays='".$id_pays_defense."'");
		$bdd->query("UPDATE partie_has_joueur_has_pays SET nb_pions = nb_pions - '1' WHERE id_partie = ".$id_partie." AND id_pays='".$id_pays_attack."'");
	}
}

function affichage_des($des_attack, $des_defense) {

	echo '<div id="des_attaquant">';
	for($i = 0; $i <count($des_attack); $i++) {
		if(isset($des_defense[$i]) && $des_attack[$i] > $des_defense[$i]) {
			echo '<img src="../images/dés/dé'.$des_attack[$i].' - win.png" alt="dé'.$des_attack[$i].'" height="60" width="60">';
		}
		else if(isset($des_defense[$i]) && $des_attack[$i] <= $des_defense[$i]) {
			echo '<img src="../images/dés/dé'.$des_attack[$i].' - loose.png" alt="dé'.$des_attack[$i].'" height="60" width="60">';
		}
		else {
			echo '<img src="../images/dés/dé'.$des_attack[$i].'.png" alt="dé'.$des_attack[$i].'" height="60" width="60">';
		}
	}
	echo '</div>';
	echo '<div id="des_defenseur">';
	for($i = 0; $i <count($des_defense); $i++) {
		if(isset($des_attack[$i]) && $des_defense[$i] >= $des_attack[$i]) {
			echo '<img src="../images/dés/dé'.$des_defense[$i].' - win.png" alt="dé'.$des_defense[$i].'" height="60" width="60">';
		}
		else if(isset($des_attack[$i]) && $des_defense[$i] < $des_attack[$i]) {
			echo '<img src="../images/dés/dé'.$des_defense[$i].' - loose.png" alt="dé'.$des_defense[$i].'" height="60" width="60">';
		}
		else {
			echo '<img src="../images/dés/dé'.$des_defense[$i].'.png" alt="dé'.$des_defense[$i].'" height="60" width="60">';
		}
	}
	echo '</div>';
}
?>