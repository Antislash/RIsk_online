		<div id="friends">
			<div id="languette">
				<?php 
					$nb_amis = $bdd->query('SELECT COUNT(1) as nb FROM user usr INNER JOIN user1_has_user2 frd ON frd.id_usr2 = usr.usr_id WHERE (usr.code_sta = \'gam\' OR usr.code_sta = \'on\') AND frd.id_usr1 = '.$_SESSION['usr_id'].' GROUP BY frd.id_usr1');
					$nb_ami = $nb_amis->fetch();
				?>
				<span id="deroule" onclick="derouler();">Contacts (<?php echo $nb_ami['nb'];?>)</span>
			</div>
			<div id="friends_scroll" class="null">
				<table id="list_friends" cellspacing="0">
				<?php
					$amis = $bdd->query('SELECT usr.usr_pseudo, img.img_chemin, sta.sta_nom, sta.sta_class, DATEDIFF(CURDATE(), usr.usr_date_inscription) FROM user usr INNER JOIN user1_has_user2 frd ON frd.id_usr2 = usr.usr_id INNER JOIN image img ON img.img_id = usr.id_img INNER JOIN statut_user sta ON sta.sta_code = usr.code_sta WHERE frd.id_usr1 = '.$_SESSION['usr_id'].' ORDER BY sta.sta_code desc');
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
					<input class="textbox" id="search_user" type="text" name="friend" maxlength=20/>
					<input class="button" onclick="searchUser();" value="+">
				</form>
			</div>
		</div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<<script type="text/javascript">
		function derouler(){
			elm = document.getElementById("friends");
			if(elm.className == "unwrap"){
				elm.className = "wrapped";
			}
			else{
				elm.className = "unwrap";
			}
		}
		function getXhr(){
			var xhr = null; 
			if(window.XMLHttpRequest) // Firefox et autres
			   xhr = new XMLHttpRequest(); 
			else if(window.ActiveXObject){ // Internet Explorer 
			   try {
		                xhr = new ActiveXObject("Msxml2.XMLHTTP");
		            } catch (e) {
		                xhr = new ActiveXObject("Microsoft.XMLHTTP");
		            }
			}
			else { // XMLHttpRequest non support� par le navigateur 
			   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
			   xhr = false; 
			}
			return xhr;
		}
			
		function searchUser(){
			var xhr = getXhr();
			//alert(getHostProjectName()); // /~vblum/RIsk_online/www/acceuil.php
			//alert(window.location.href); // http://tp-ssh2.ups.u-psud.fr/~vblum/RIsk_online/www/acceuil.php
			//var pathname = window.location.pathname;
			//pathname = pathname.substring(0,17);
			var url = getHostProjectName() + "/www/include/ajout_ami.php?";
			//var url2 = "/~vblum/RIsk_online/www/include/ajout_ami.php?";
			//alert(url);
			//alert(url2);
			//TODO onsubmit();
			//var urlH = window.location.href;
			//on construit l'url avec les params en GET
			if($("#search_user").val() != null && $("#search_user").val() != ""){
				url = url + "pseudoSearch=" + $("#search_user").val();
			}
			xhr.onreadystatechange = function(){
				// On ne fait quelque chose que si on a tout re�u et que le serveur est ok
				if(xhr.readyState == 4 && xhr.status == 200){
					if(xhr.responseText != ""){
						//alert("ca marche");
						notif(xhr.responseText,1);
					}
				}
			}
			xhr.open("GET",url,true);	//On lance la page en GET
			xhr.send(null);
		}
		
		function getHostProjectName(){
			var pathname = window.location.pathname;
			var projectName = "/RIsk_online/";
			pathname = pathname.substr(0,pathname.indexOf(projectName)+projectName.length);
			return pathname;
		}
		</script>
