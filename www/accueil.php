<!DOCTYPE html>
<!--Page d'accueil lorsqu'un utilisateur est connecté-->
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link rel="icon" type="image/png" href="images/favicon.png" />
		<meta name="viewport" content="width=device-width" />
		<title>Risk Online</title>
	</head>
	<body>
		<?php
			include('include/notif.php'); //Permet d'afficher des notifications sur la page
			include('../php/site/connexion.php'); //Connexion
			include ('../php/site/verif_connexion.php'); //Permet de vérifier que l'utilisateur posséde les variables de session et cookies
			include('include/navigation.php'); //Affiche la barre de navigation
		?>
		<div class="bloc" id="profil_home">
			<?php
				//Requête pour récupérer les informations d'un profil
				$profils = $bdd->query("SELECT usr.usr_pseudo, img.img_chemin,img.img_nom, sta.sta_nom, DATEDIFF(CURDATE(), usr.usr_date_inscription) as date, usr_level
										FROM user usr INNER JOIN image img ON img.img_id = usr.id_img 
										INNER JOIN statut_user sta ON sta.sta_code = usr.code_sta 
										WHERE usr.usr_id ='".$_SESSION['usr_id']."'" );
				$profil = $profils->fetch();
			?>
			<img id="avatar" src="<?php echo "images/".$profil['img_nom'];?>"/>
			<div id="profil_infos">
				<h2><?php echo $profil['usr_pseudo'];?></h2>
				Membre depuis <?php echo $profil['date'];?> jours <br/>
				Niveau <?php echo $profil['usr_level'];;?><br/>
				<span id="status_profil"><?php echo $profil["sta_nom"];?></span><br/>
			</div>
		</div>
		<div class="bloc" id="news_home">
			<h2>Actualités</h2>
			<?php
				$news = $bdd->query('SELECT nws.nws_id, img.img_chemin, nws.nws_date, nws.nws_contenu, nws.nws_titre 
									 FROM news nws 
									 INNER JOIN image img ON img.img_id = nws.id_img 
									 ORDER BY nws.nws_date desc');
				$i = 0;
				while($new = $news->fetch()){
					if($i == 0){
						echo "<img id=\"img_news\" src=\"images/img_news.png\"/>";
						echo "<h3>".$new['nws_titre']."</h3>";
						echo "<span class=\"date_news\">".$new['nws_date']."</span><br/><br/>";
						echo mb_strimwidth($new['nws_contenu'], 0, 100, "...")."<br/><br/>";
						echo "<span class=\"more\"><a href=\"#\">Plus d'infos ...</a></span>";
						echo "<div id=\"list_news\">";
						$i=-1;
					}
					else{
						echo "<span class=\"date_news\">".$new['nws_date']."</span><a href=\"#\">".mb_strimwidth($new['nws_titre'], 0, 40, "...")."</a><br/>";
					}
				}
				$news->closeCursor();
			?>
			</div>
		</div>
		<!--Bloc de contact amis-->
		<?php include('include/contact.php');?>
	</body>
</html>
