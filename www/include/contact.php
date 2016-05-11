		<div id="friends">
			<div id="languette">
				<?php 
					$nb_amis = $bdd->query('SELECT COUNT(1) as nb FROM user usr INNER JOIN user1_has_user2 frd ON frd.id_usr2 = usr.usr_id WHERE (usr.code_sta = \'gam\' OR usr.code_sta = \'on\') AND frd.id_usr1 = 2 GROUP BY frd.id_usr1');
					$nb_ami = $nb_amis->fetch();
				?>
				<span id="deroule" onclick="derouler();">Contacts (<?php echo $nb_ami['nb'];?>)</span>
			</div>
			<div id="friends_scroll" class="null">
				<table id="list_friends" cellspacing="0">
				<?php
					$amis = $bdd->query('SELECT usr.usr_pseudo, img.img_chemin, sta.sta_nom, sta.sta_class, DATEDIFF(CURDATE(), usr.usr_date_inscription) FROM user usr INNER JOIN user1_has_user2 frd ON frd.id_usr2 = usr.usr_id INNER JOIN image img ON img.img_id = usr.id_img INNER JOIN statut_user sta ON sta.sta_code = usr.code_sta WHERE frd.id_usr1 = 2 ORDER BY sta.sta_code desc');
					while($ami = $amis->fetch()){
						echo "<tr class=\"bloc_friends\">";
						echo "<td class=\"avatar_friends\">";
						echo "<img src=\"" . $image . "\"/>";
						echo "</td>";
						echo "<td class=\"info_friends\">";
						echo $ami['usr_pseudo']."<br/>";
						echo "<span class=\"".$ami['sta_class']."\">".$ami['sta_nom']."</span>";
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