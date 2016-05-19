<div id="player">
	<div id="languette">
		<span id="deroule" onclick="derouler(document.getElementById('player'));">Liste des joueurs</span>
	</div>
	<div id="player_scroll" class="null">
		<table id="list_player" cellspacing="0">
		</table>
	</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="../ajax/ajax_functions.js"></script>
<script type="text/javascript">
refreshPlayers();
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
		
function refreshPlayers(){
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			document.getElementById('list_player').innerHTML = xhr.responseText;
		}
	};
	xhr.open("GET", "../php/site/liste_joueur_game.php", true);
	xhr.send(null);
}
</script>
