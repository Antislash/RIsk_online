<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
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
		<?php include('navigation.php');?>
		<?php include('../serveur/connexion.php');$image = "images/avatar.png";?>
		<div class="bloc" id="profil_home">
			<?php 
				$profils = $bdd->query('SELECT usr.pseudo, img.chemin, sta.nom_complet, DATEDIFF(CURDATE(), usr.date_inscription) as date FROM user usr INNER JOIN image img ON img.id_image = usr.image_id INNER JOIN statut_user sta ON sta.nom = usr.statut WHERE usr.id_user = 2');
				$profil = $profils->fetch();
			?>
			<img id="avatar" src="<?php echo $image;?>"/>
			<div id="profil_infos">
				<h2><?php echo $profil['pseudo'];?></h2>
				Membre depuis <?php echo $profil['date'];?> jours <br/>
				Niveau <?php echo "8";?><br/>
				<span id="status_profil"><?php echo $profil["nom_complet"];?></span><br/>
			</div>
		</div>
		<div class="bloc" id="news_home">
			<h2>Actualités</h2>
			<?php
				$news = $bdd->query('SELECT nws.id_actualite, img.chemin, nws.date, nws.contenu, nws.titre FROM actualites nws INNER JOIN image img ON img.id_image = nws.image_id ORDER BY nws.date desc');
				$i = 0;
				while($new = $news->fetch()){
					if($i == 0){
						echo "<img id=\"img_news\" src=\"images/img_news.png\"/>";
						echo "<h3>".$new['titre']."</h3>";
						echo "<span class=\"date_news\">".$new['date']."</span><br/><br/>";
						echo mb_strimwidth($new['contenu'], 0, 100, "...")."<br/><br/>";
						echo "<span class=\"more\"><a href=\"news.php?news=".$new['id_actualite']."\">Plus d'infos ...</a></span>";
						echo "<div id=\"list_news\">";
						$i=-1;
					}
					else{
						echo "<span class=\"date_news\">".$new['date']."</span><a href=\"news.php?news=".$new['id_actualite']."\">".mb_strimwidth($new['titre'], 0, 40, "...")."</a><br/>";
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
		<div id="friends">
			<div id="languette">
				<?php 
					$nb_amis = $bdd->query('SELECT COUNT(1) as nb FROM user usr INNER JOIN user1_has_user2 frd ON frd.id_user2 = usr.id_user WHERE (usr.statut = \'gam\' OR usr.statut = \'on\') AND frd.id_user1 = 2 GROUP BY frd.id_user1');
					$nb_ami = $nb_amis->fetch();
				?>
				<span id="deroule" onclick="derouler();">Contacts (<?php echo $nb_ami['nb'];?>)</span>
			</div>
			<div id="friends_scroll" class="null">
				<table id="list_friends" cellspacing="0">
				<?php
					$amis = $bdd->query('SELECT usr.pseudo, img.chemin, sta.nom_complet, sta.statut_class, DATEDIFF(CURDATE(), usr.date_inscription) FROM user usr INNER JOIN user1_has_user2 frd ON frd.id_user2 = usr.id_user INNER JOIN image img ON img.id_image = usr.image_id INNER JOIN statut_user sta ON sta.nom = usr.statut WHERE frd.id_user1 = 2 ORDER BY statut desc');
					while($ami = $amis->fetch()){
						echo "<tr class=\"bloc_friends\">";
						echo "<td class=\"avatar_friends\">";
						echo "<img src=\"" . $image . "\"/>";
						echo "</td>";
						echo "<td class=\"info_friends\">";
						echo $ami['pseudo']."<br/>";
						echo "<span class=\"".$ami['statut_class']."\">".$ami['nom_complet']."</span>";
						echo "</td>";
						echo "</tr>";
					}
				?>
				</table>
				<form id="add_friends">
					<input class="textbox" type="text" name="friend" maxlength=20/>
					<input class="button" type="submit" value="+">
				</form>
			</div>
		</div>
	</body>
</html>
