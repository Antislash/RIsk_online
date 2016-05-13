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
		<?php include('include/navigation.php');?>
		<?php include('include/notif.php');?>
		<?php include('../php/connexion.php');$image = "images/avatar.png";?>
		<div class="bloc" id="option">
			<form>
				<input class="textbox" type="text" name="nom_room" maxlength=20/>
				<input class="textbox" id="number" type="number" value="4" min="2" max="6"/>
				<input class="textbox" type="password" name="password" maxlength=20/>
				<input class="button" type="submit" value="Lancer"/>
			</form>
		</div>
		<div class="bloc" id="room">
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
							<input class="textbox" type="textarea" name="msg_chat" id="barre-msg"/>
							<input class="button" type="submit" value="Envoyer" id="send-msg"/>
						</form>
					</td>
				</tr>
			</table>
		</div>
		<?php include('include/contact.php');?>
	</body>
</html>
