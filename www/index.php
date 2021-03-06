<!DOCTYPE html>
<!--Page permettant a un utilisateur de se connecter-->
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width" />
		<link rel="icon" type="image/png" href="images/favicon.png" />
		<title>Risk Online</title>
	</head>
	<body>
		<?php
			//Destruction des cookies
			setcookie('pseudo',NULL,time()-3600);
			setcookie('password',NULL,time()-3600);

			include "include/notif.php";

			if(isset($_GET['mess'])){
				if($_GET['mess']== 1){
					echo "<script type=\"text/javascript\">notif(\"Le nom d'utilisateur ou le mot de passe est incorrect\",2)</script>";
				}
				if($_GET['mess'] == 2){
					echo "<script type=\"text/javascript\">notif(\"Le nom d'utilisateur existe déja\",2)</script>";
				}

			}
		?>
		<nav id="top_navigation">
			<img id="logo_risk" src="images/logo_risk.png"/>
			<div id="table_login">
				<table>
					<!-- Formulaire de connexion-->
					<form method="post" action="../php/site/log.php">
						<tr>
							<td>Identifiant:</td>
							<td colspan="2">Mot de passe:</td>
						</tr>
						<tr>
							<td><input class="textbox" type="text" name="connexionPseudo" onkeypress="return checkSpecialCharacters(event)" maxlength=20/></td>
							<td><input class="textbox" type="password" name="connexionPassword" id="connexionPassword" onkeypress="return checkPasswordCharacters(event)" maxlength=20/></td>
							<td><input class="button" type="submit" value="GO"></td>
						</tr>
					</form>
				</table>
			</div>
		</nav>
		<div class="bloc" id="table_signin">

			<!--Bloc d'inscription-->
			<h2>INSCRIPTION</h2>		
			<form method="post" action="../php/site/inscription.php" onSubmit="return checkRegistration(this)">
					<table>
						<tr>
							<td>Identifiant:</td>
							<td><input class="textbox" type="text" name="inscriptionPseudo" id="inscriptionIdentifier" onkeypress="return checkSpecialCharacters(event)" maxlength=20/></td>
						</tr>
						<tr>
							<td>Mot de passe:</td>
							<td><input class="textbox" type="password" name="inscriptionPassword1" id="inscriptionPassword1" onkeypress="return checkPasswordCharacters(event)" maxlength=20/></td>
						</tr>
						<tr>
							<td>Confirmation: </td>
							<td><input class="textbox" type="password" name="inscriptionPassword2" id="inscriptionPassword2" onkeypress="return checkPasswordCharacters(event)" maxlength=20/></td>
						</tr>

					</table>

					<input class="button" id="button_submit" type="submit" value="ENVOYER">

					<div class="error" id="passError">
					</div>
				</form>
		</div>
	</body>
</html>

<script language="JavaScript">
	function checkRegistration(form) {
	  if (form.inscriptionPassword1.value == '' || form.inscriptionPassword2.value == '') {
	    document.getElementById('passError').innerHTML = ("Veuillez remplir tous les champs.");
	    form.inscriptionPassword1.focus();
	    return false;
	  }

	  else if (form.inscriptionPassword1.value != form.inscriptionPassword2.value) {
	    document.getElementById('passError').innerHTML = ("Les deux mots de passes sont différents.");
	    form.inscriptionPassword1.focus();
	    return false;
	  }

	  else if (form.inscriptionPassword1.value == form.inscriptionPassword2.value) {
	    return true;
	  }

	  else {
	    form.inscriptionPassword1.focus();
	    return false;
	    }
	 }

	 // Empêche l'utilisation de caractères spéciaux dans le login
	function checkSpecialCharacters (event) {
		
		var key = String.fromCharCode(event.charCode);

		var listChars = 'àâäãçéèêëìîïòôöõùûüñ &*?!:;,\t#~"^¨%$£?²¤§%*()]{}<>|\\/`\'';
		if (listChars.indexOf(key) == -1) {
			document.getElementById('passError').innerHTML = "";
			return true;
		}

		else {
			document.getElementById('passError').innerHTML = ("Caractères spéciaux interdits.");
			return false;
		}
	}

	// Empêche l'utilisation de certains caractères dans le mot de passe (évite ainsi l'injection SQL)
	function checkPasswordCharacters (event) {
		
		var key = String.fromCharCode(event.charCode);

		var listChars = ' <>\\/`\'';
		if (listChars.indexOf(key) == -1) {
			document.getElementById('passError').innerHTML = "";
			return true;
		}

		else {
			document.getElementById('passError').innerHTML = ("Caractère interdit.");
			return false;
		}
	}

	/*function cryptConnexionPassword (form) {
		//document.getElementById('connexionMD5').value = md5(document.getElementById('connexionPassword').value);
		document.getElementById('connexionPassword').value = md5(document.getElementById('connexionPassword').value);
		return true;
	}

	function cryptInscriptionPasswords (form) {
		//document.getElementById('inscriptionMD51').value = md5(document.getElementById('inscriptionPassword1').value);
		//document.getElementById('inscriptionMD52').value = md5(document.getElementById('inscriptionPassword2').value);
		document.getElementById('inscriptionPassword1').value = md5(document.getElementById('inscriptionPassword1').value);
		document.getElementById('inscriptionPassword2').value = md5(document.getElementById('inscriptionPassword2').value);
		return true;
	}*/
</script>

