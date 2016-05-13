<?php
	//On vérifie sur les session sont déja activées
	if(session_id() == null){
		session_start();
	}

	include "../php/connexion.php";
?>

<nav id="top_navigation">
	<img id="logo_risk" src="images/logo_risk.png"/>
	<a href="#"><img class="icon_menu" src="images/profil.png" onmouseover="this.src='images/profil_hover.png'" onmouseout="this.src='images/profil.png'"/></a>
	<a href="#"><img class="icon_menu" src="images/stats.png" onmouseover="this.src='images/stats_hover.png'" onmouseout="this.src='images/stats.png'"/></a>
	<a href="#"><img class="icon_menu" src="images/news.png" onmouseover="this.src='images/news_hover.png'" onmouseout="this.src='images/news.png'"/></a>
	<a href="#"><img class="icon_menu" src="images/help.png" onmouseover="this.src='images/help_hover.png'" onmouseout="this.src='images/help.png'"/></a>

	<?php //Requête pour chercher si le joueur est présent dans une room
	$user = $bdd->query("SELECT * FROM user_has_room uhr INNER JOIN room r ON r.room_id = uhr.id_room WHERE statut_room = 'en cours' AND id_user='".$_SESSION['usr_id']."'");
	$user = $user->fetch();

		//On vérifie que le joueur n'est pas déja présent dans une room, pour afficher les bouttons de création/rejoindre partie
		if($user['id_room'] == null){
	?>
    <div id="table_login">
		<table>
			<tr>
				<td class="button" id="button_game"><a href="create_room.php">New Game</a></td>
				<td class="button" id="button_game"><a href="list-room.php">Join Game</a></td>
			</tr>
		</table>
	</div>
	<?php } ?>
	<a href="../php/logout.php">Déconnexion</a>
</nav>
