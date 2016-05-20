<?php
	include "connexion.php";
	include "verif_connexion.php";
	include "../partie/functions_partie.php";
	
	$joueurs = $bdd->query('SELECT p.id_joueur, p.nb_renforts, u.usr_pseudo, i.img_chemin, c.clr_css, t.nb_pays, i.img_nom
							FROM partie_has_joueur p
							INNER JOIN user u ON u.usr_id = p.id_joueur
							INNER JOIN image i ON i.img_id = u.id_img
							INNER JOIN couleur c ON c.clr_code = p.code_clr
							INNER JOIN 
							(SELECT COUNT(id_pays) as nb_pays, id_joueur
							 FROM partie_has_joueur_has_pays
							 WHERE id_partie = '.$_SESSION['id_partie'].'
							 GROUP BY id_joueur) t ON t.id_joueur = p.id_joueur
							WHERE p.id_partie = '.$_SESSION['id_partie']);

	while($joueur = $joueurs->fetch()){
		$nb_renforts = getNbRenforts($bdd, $_SESSION['id_partie'], $joueur['id_joueur']);
		echo "<tr class=\"bloc_player\">";
		echo "<td class=\"avatar_player\">";
		echo "<img src=\"images/" . $joueur['img_nom'] . "\"/>";
		echo "</td>";
		echo "<td class=\"info_player\">";
		echo "<span style=\"color: #".$joueur['clr_css']."\">".$joueur['usr_pseudo']."</span></br>";
		echo "Nb renfort : ".$nb_renforts."  |  Nb pays: ".$joueur['nb_pays']."";
		echo "</td>";
		echo "</tr>";
	}
?>