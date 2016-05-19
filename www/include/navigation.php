<?php
	//On vérifie si les session sont déja activées
	if(session_id() == null){
		session_start();
	}

	include "../php/site/connexion.php"; //Connexion a la base de données
	include('../php/site/verif_connexion.php'); //Permet de garantir que l'utilisateur posséde bien les cookies et les variables de session essentiel
?>


<nav id="top_navigation" onBeforeUnload="return confirm('sur?');" onUnload="alert('ok');">
	<a href="acceuil.php"><img id="logo_risk" src="images/logo_risk.png"/></a>
	<a href="#"><img class="icon_menu" src="images/profil.png" onmouseover="this.src='images/profil_hover.png'" onmouseout="this.src='images/profil.png'"/></a>
	<a href="../php/site/logout.php"><img class="icon_menu" src="images/deco.png" onmouseover="this.src='images/deco-hover.png'" onmouseout="this.src='images/deco.png'"/></a>

	<?php //Requête pour chercher si le joueur est présent dans une room
	$room = $bdd->query("SELECT id_room 
						 FROM user_has_room uhr 
						 INNER JOIN room r ON r.room_id = uhr.id_room 
						 WHERE id_user='".$_SESSION['usr_id']."'
						 AND statut_usr_room = 'in'
						 AND statut_room IN ('en cours', 'pleine')");
	$room = $room->fetch();

	//On vérifie si le joueur est présent dans une partie
	$partie = $bdd->query("SELECT p.id_partie
						   FROM partie p 
						   INNER JOIN partie_has_joueur phj ON p.id_partie = phj.id_partie
						   WHERE phj.joueur_dans_partie = 1
						   AND p.partie_statut IN ('en cours', 'init')
						   AND phj.id_joueur = ".$_SESSION['usr_id']);

	$partie = $partie->fetch();
		//On vérifie que le joueur n'est pas déja présent dans une room, pour afficher les bouttons de création/rejoindre partie
		if($room['id_room'] == null && $partie['id_partie'] == null){
	?>
    <div id="table_login">
		<table>
			<tr>
				<td class="button" id="button_game"><a href="create_room.php">New Game</a></td>
				<td class="button" id="button_game"><a href="list-room.php">Join Game</a></td>
			</tr>
		</table>
	</div>

	<?php }else if ($room['id_room'] != null){
			echo "
	<a href='room.php'><img class=\"icon_menu\" src=\"images/icon-room.png\" onmouseover=\"this.src='images/icon-room-hover.png'\" onmouseout=\"this.src='images/icon-room.png'\"/></a>";
		}
		else if($partie['id_partie'] != null){
			echo "
	<a href='game.php'><img class=\"icon_menu\" src=\"images/icon-game.png\" onmouseover=\"this.src='images/icon-game-hover.png'\" onmouseout=\"this.src='images/icon-game.png'\"/></a>";
		}
	?>

</nav>
