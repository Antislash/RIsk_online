<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width" />
		<title>Room</title>
	</head>
	<body>
		<?php
			include('include/navigation.php');
			include('include/notif.php');
			include('../php/connexion.php');
			$image = "images/avatar.png";

			//Requête pour récupérer la liste de room
			$list_room = $bdd->query("SELECT * FROM room WHERE statut_room = 'en cours'");

		?>
		<div class="bloc" id="list">
			<div class="list-room">
				<table>
					<?php while($room = $list_room->fetch(PDO::FETCH_ASSOC)){ ?>

							<tr>
								<td class="room-date">
									<?php echo $room['room_date_creation']; ?>
								</td>
								<td class="room-name">
									<?php echo $room['room_name']; ?>
								</td>
								<td class="room-nb">
									<?php
									$nb_joueur = $bdd->query("SELECT COUNT(*) AS nbJoueur FROM user_has_room WHERE id_room = ". $room['room_id']);
									$nb_joueur = $nb_joueur->fetch();
									echo  $nb_joueur['nbJoueur']."/". $room['room_nb_joueur']; ?>
								</td>
				<?php } ?>
				</table>
			</div>
		</div>
		<?php include('include/contact.php');?>
	</body>
</html>
