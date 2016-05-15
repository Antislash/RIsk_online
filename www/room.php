<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width" />
		<title>Room</title>		
        <script href="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/site/room.js"></script>
	</head>
	<body>
		<?php
			include('include/navigation.php');
			include('include/notif.php');
			include('../php/site/connexion.php');
			$image = "images/avatar.png";

			//On récupére les informations d'une room
			$room = $bdd->query("SELECT * FROM room rm 
								 INNER JOIN user_has_room uhr ON rm.room_id = uhr.id_room  
								 WHERE rm.statut_room= 'en cours' 
								 AND uhr.id_user ='". $_SESSION['usr_id']."'");

			$room = $room->fetch();

			if($room != false){
				$_SESSION['room_id'] = $room['id_room'];
			}
		?>

		<div class="bloc" id="room"><form>
				<table class="options">
					<tr>
						<td colspan="2">
							<h2>Options parties</h2>
						</td>
					</tr>
					<tr>
						<td>
							Nom de la partie:
						</td>
						<td>
							<label><?php echo $room['room_name']; ?></label>
						</td>
					</tr>
					<tr>
						<td>
							Privée:
						</td>
						<td>
							<?php if($room['room_password'] == NULL ){
								echo "Non";
							} else{
								echo "Oui";
							} ?>
						</td>
					</tr>
					<!--
					<?php if($room['room_password'] =! NULL ){ ?>
						<tr>
							<td>
								Mot de passe:
							</td>
							<td>
								<?php echo $room['room_password'] ?>
							</td>
						</tr>
					<?php } ?>
					-->
					<tr>
						<td>
							Nombre de joueurs (2 - 6):
						</td>
						<td>
							<label><?php echo $room['room_nb_joueur']; ?></label>
						</td>
					</tr>
					<?php if($room['usr_admin']){?>
					<tr>
						<td >
							<center><input class="button" type="submit" value="Lancer"/></center>
						</td>

					<?php } ?>
					<td >
						<a href="../php/site/leave_room.php" class="button">Quitter</a>
					</td>
					</tr>
				</table>
			</form>
			<table>
				<tr>
					<td colspan="3">
						<h2>Liste des joueurs</h2>
					</td>
				</tr>
				<tr>
					<td>
						<table class="liste-joueur" id="liste_joueur">

						</table>
					</td>
				</tr>
				<tr>
					<td>
						<div class="chat" id="chat-room">
						</div>
						<form id="chat-message">
							<input class="textbox" onclick="if(event.keyCode==13){saveMessage(); clear();}" type="textarea" name="msg_chat" id="barre-msg"/>
							<input class="button" onClick="saveMessage(), clear()" value="Envoyer" id="send-msg"/>
						</form>
					</td>
				</tr>
			</table>
		</div>
		<?php include('include/contact.php');?>
	</body>
</html>
