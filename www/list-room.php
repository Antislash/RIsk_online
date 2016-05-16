<!DOCTYPE html>
<!--Page pemettant d'afficher la liste des rooms-->
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width" />
		<script type="text/javascript" src="../js/site/liste_room.js"></script>
		<title>Room</title>
	</head>
	<body>
		<?php
			include('include/navigation.php');
			include('include/notif.php');
			include('../php/site/connexion.php');
		?>
		<div class="bloc" id="list">
			<div class="list-room" id="liste_room">
			<!--On affiche la liste des room grace à une méthode Ajax contenu dans le fichier "js/site/liste_room.js-->
				
			</div>
		</div>
		<?php include('include/contact.php');?>
	</body>
</html>
