<div id="friends">
	<div id="languette">
		<span id="deroule" onclick="derouler(document.getElementById('friends'));"></span>
	</div>
	<div id="friends_scroll" class="null">
		<table id="list_friends" cellspacing="0">
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
refreshFriends();
refreshNbFriends();
setInterval('refreshNbFriends()',5000);
setInterval('refreshFriends()',5000);

function derouler(elm){
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
			refreshFriends();
			refreshNbFriends();
		}
	};
	xhr.open("GET", "include/ajout_ami.php?pseudoSearch=" + param, true);
	xhr.send(null);
}
		
function refreshFriends(){
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			document.getElementById('list_friends').innerHTML = xhr.responseText;
		}
	};
	xhr.open("GET", "../php/site/listContact.php", true);
	xhr.send(null);
}

function refreshNbFriends(){
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			document.getElementById('deroule').innerHTML = xhr.responseText;
		}
	};
	xhr.open("GET", "../php/site/nb_amis.php", true);
	xhr.send(null);
}
</script>
