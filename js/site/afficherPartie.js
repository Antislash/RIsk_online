function refreshMap(){
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			afficherCouleurCarte(xhr.responseText);
		}
	};
	xhr.open("GET", "../php/partie/getColorPays.php", true);
	xhr.send(null);
}
		
function afficherCouleurCarte(infos){
	var strPays = infos.split("|")[0];
	var strCouleur = infos.split("|")[1];
	var pays = strPays.split(";");
	var couleur = strCouleur.split(";");
	if(couleur.length == pays.length){
		for(var i = 0 ; i < couleur.length ; i++){
			document.getElementById(pays[i]).style.fill = "#" + couleur[i];
		}
	}
}