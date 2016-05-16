		<div id="friends">
			<div id="languette">
				<?php 
					$nb_amis = $bdd->query('SELECT COUNT(1) as nb 
											FROM user usr 
											INNER JOIN user1_has_user2 frd ON frd.id_usr2 = usr.usr_id 
											WHERE (usr.code_sta = \'gam\' OR usr.code_sta = \'on\') 
											AND frd.id_usr1 = '.$_SESSION['usr_id'].' 
											GROUP BY frd.id_usr1');
					$nb_ami = $nb_amis->fetch();
					if($nb_ami == false){
						$nb_ami['nb'] = 0;
					}
				?>
				<span id="deroule" onclick="derouler();">Contacts (<?php echo $nb_ami['nb'];?>)</span>
			</div>
			<div id="friends_scroll" class="null">
				<table id="list_friends" cellspacing="0">
				<?php
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
				</table>
				<form id="add_friends">
					<input class="textbox" id="search_user" type="text" name="friend" maxlength=20/>
					<input class="button" id="submit_friend" onclick="searchUser();" value="+">
				</form>
			</div>
		</div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="../ajax/ajax_functions.js"></script>
		<script type="text/javascript">
		
		function derouler(){
			elm = document.getElementById("friends");
			if(elm.className == "unwrap"){
				elm.className = "wrapped";
			}
			else{
				elm.className = "unwrap";
			}
		}
		//Instantiation de l'objet ajax
		function getXMLHttpRequest() {
			var xhr = null;

			if (window.XMLHttpRequest || window.ActiveXObject) {
				if (window.ActiveXObject) {
					try {
						xhr = new ActiveXObject("Msxml2.XMLHTTP");
					} catch(e) {
						xhr = new ActiveXObject("Microsoft.XMLHTTP");
					}
				} else {
					xhr = new XMLHttpRequest();
				}
			} else {
				alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
				return null;
			}

			return xhr;
		}

		function searchUser(){

			var param = $("#search_user").val();
			//reqAjax(param, "/www/include/ajout_ami.php", notif);
			//reqAjax(null, "/www/include/contact.php", $("#friends").html);

			var xhr = getXMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {

					notif(xhr.responseText,1);
				}
			};


			xhr.open("GET", "include/ajout_ami.php?pseudoSearch=" + param, true);
			xhr.send(null);


		}
		</script>
