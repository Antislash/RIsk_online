<!DOCTYPE html>
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
			$image = "images/avatar.png";

		?>
		<div class="bloc" id="list">
			<div class="list-room" id="liste_room">

			</div>
		</div>
		<?php include('include/contact.php');?>
	</body>
</html>
