<?php
	include "connexion.php";
	include "verif_connexion.php";
	
	$amis = $bdd->query('SELECT usr.usr_pseudo, img.img_chemin,img.img_nom, sta.sta_nom, sta.sta_class, DATEDIFF(CURDATE(), usr.usr_date_inscription) 
						 FROM user usr INNER JOIN user1_has_user2 frd ON frd.id_usr2 = usr.usr_id 
						 INNER JOIN image img ON img.img_id = usr.id_img 
						 INNER JOIN statut_user sta ON sta.sta_code = usr.code_sta 
						 WHERE frd.id_usr1 = '.$_SESSION['usr_id'].' 
						 ORDER BY sta.sta_code desc');

	while($ami = $amis->fetch()){
		echo "<tr class=\"bloc_friends\">";
		echo "<td class=\"avatar_friends\">";
		echo "<img src=\"images/" . $ami['img_nom'] . "\"/>";
		echo "</td>";
		echo "<td class=\"info_friends\">";
		echo $ami['usr_pseudo']."<br/>";
		echo "<span class=\"".$ami['sta_class']."\">".$ami['sta_nom']."</span>";
		echo "</td>";
		echo "</tr>";
	}
?>