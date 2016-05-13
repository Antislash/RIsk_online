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
        <script type="text/javascript" src="script.js"></script>
	</head>
	<body>
		<?php include('include/navigation.php');?>
		<?php include('include/notif.php');?>
		<?php include('../php/connexion.php');$image = "images/avatar.png";?>
		<?php include('../php/new_game.php');?>
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
							<input class="textbox" type="text" name="nom_room" maxlength=20/>
						</td>
					</tr>
					<tr>
						<td>
							Mot de passe (facultatif):
						</td>
						<td>
							<input class="textbox" type="password" name="password" maxlength=20/>
						</td>
					</tr>
					<tr>
						<td>
							Nombre de joueurs (2 - 6):
						</td>
						<td>
							<input class="textbox" id="number" type="number" value="4" min="2" max="6"/>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<center><input class="button" type="submit" value="Lancer"/></center>
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
						<table class="liste-joueur">
							<tr>
								<td class="player-desc">
									<table>
										<tr>
											<td>
												<img src="images/avatar.png"/>											
											</td>
											<td>
												<span class="txt-desc">Alexis</br>Niveau 8</span>
											</td>
										</tr>										
									</table>
								</td>
								<td class="player-desc">
									<table>
										<tr>
											<td>
												<img src="images/avatar.png"/>											
											</td>
											<td>
												<span class="txt-desc">Alexis</br>Niveau 8</span>
											</td>
										</tr>										
									</table>
								</td>
								<td class="player-desc">
									<table>
										<tr>
											<td>
												<img src="images/avatar.png"/>											
											</td>
											<td>
												<span class="txt-desc">Alexis</br>Niveau 8</span>
											</td>
										</tr>										
									</table>
								</td>
							</tr>
							<tr>
								<td class="player-desc">
									<table>
										<tr>
											<td>
												<img src="images/avatar.png"/>											
											</td>
											<td>
												<span class="txt-desc">Alexis</br>Niveau 8</span>
											</td>
										</tr>										
									</table>
								</td>
								<td class="player-desc">
									<table>
										<tr>
											<td>
												<img src="images/avatar.png"/>											
											</td>
											<td>
												<span class="txt-desc">Alexis</br>Niveau 8</span>
											</td>
										</tr>										
									</table>
								</td>
								<td class="player-desc">
									<table>
										<tr>
											<td>
												<img src="images/avatar.png"/>											
											</td>
											<td>
												<span class="txt-desc">Alexis</br>Niveau 8</span>
											</td>
										</tr>										
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<div class="chat">
						</div>
						<form id="chat-message">
							<input class="textbox" onclick="if(event.keyCode==13){post(); clear();}" type="textarea" name="msg_chat" id="barre-msg"/>
							<input class="button" onClick="post(), clear()" type="submit" value="Envoyer" id="send-msg"/>
						</form>
					</td>
				</tr>
			</table>
		</div>
		<?php include('include/contact.php');?>
	</body>
</html>
