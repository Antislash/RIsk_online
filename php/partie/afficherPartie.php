<script>
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
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			afficherCouleurCarte(xhr.responseText);
		}
	};
	xhr.open("GET", "include/ajout_ami.php?pseudoSearch=" + param, true);
	xhr.send(null);
}
		
function afficherCouleurCarte(infos){
	var strPays = infos.split("|")[0];
	var strCouleur = infos.split("|")[1];
	var pays = strPays.split(";");
	var couleur = strCouleur.split(";");
	if(couleur.length == pays.lenght){
		for(var i = 0 ; i < couleur.lenght ; i++){
			document.getElementById(pays[i]).style.backgroundColor = couleur[i];
		}
	}
}
</script>