<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" />
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width" />
		<title>Acceuil</title>
		<script>
			function derouler(){
				elm = document.getElementById("friends");
				if(elm.className == "unwrap"){
					elm.className = "wrapped";
				}
				else{
					elm.className = "unwrap";
				}
			}
		</script>
	</head>
	<body>
		<?php include('include/navigation.php');?>
		<?php include('include/notif.php');?>
		<?php include('../php/connexion.php');$image = "images/avatar.png";?>
		<div class="bloc" id="profil_home">
			<?php 
				$profils = $bdd->query('SELECT usr.usr_pseudo, img.img_chemin, sta.sta_nom, DATEDIFF(CURDATE(), usr.usr_date_inscription) as date FROM user usr INNER JOIN image img ON img.img_id = usr.id_img INNER JOIN statut_user sta ON sta.sta_code = usr.code_sta WHERE usr.usr_id = 2');
				$profil = $profils->fetch();
			?>
			<img id="avatar" src="<?php echo $image;?>"/>
			<div id="profil_infos">
				<h2><?php echo $profil['usr_pseudo'];?></h2>
				Membre depuis <?php echo $profil['date'];?> jours <br/>
				Niveau <?php echo "8";?><br/>
				<span id="status_profil"><?php echo $profil["sta_nom"];?></span><br/>
			</div>
		</div>
		<div class="bloc" id="news_home">
			<h2>Actualités</h2>
			<?php
				$news = $bdd->query('SELECT nws.nws_id, img.img_chemin, nws.nws_date, nws.nws_contenu, nws.nws_titre FROM news nws INNER JOIN image img ON img.img_id = nws.id_img ORDER BY nws.nws_date desc');
				$i = 0;
				while($new = $news->fetch()){
					if($i == 0){
						echo "<img id=\"img_news\" src=\"images/img_news.png\"/>";
						echo "<h3>".$new['nws_titre']."</h3>";
						echo "<span class=\"date_news\">".$new['nws_date']."</span><br/><br/>";
						echo mb_strimwidth($new['nws_contenu'], 0, 100, "...")."<br/><br/>";
						echo "<span class=\"more\"><a href=\"news.php?news=".$new['nws_id']."\">Plus d'infos ...</a></span>";
						echo "<div id=\"list_news\">";
						$i=-1;
					}
					else{
						echo "<span class=\"date_news\">".$new['nws_date']."</span><a href=\"news.php?news=".$new['nws_id']."\">".mb_strimwidth($new['nws_titre'], 0, 40, "...")."</a><br/>";
					}
				}
			?>
			</div>
		</div>
		<div class="bloc" id="stats_home">
			<h2>Statistiques</h2>
			<table id="list_stats">
				<tr>
					<td class="stats_chiffre"><?php echo "55";?></td>
					<td class="stats_text">% de parties gagnés</td>
				</tr>
				<tr>
					<td class="stats_chiffre"><?php echo "37";?></td>
					<td class="stats_text">nombre de tours moyen pour gagner</td>
				</tr>
				<tr>
					<td class="stats_chiffre"><?php echo "8";?></td>
					<td class="stats_text">achievements</td>
				</tr>
			</table>
		</div>		
		<?php include('include/contact.php');?>
	</body>
</html>
