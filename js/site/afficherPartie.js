refreshEtatPartie();
setInterval('refreshMap()', 4000);
setInterval('refreshEtatPartie()', 7000);

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
	var strPions = infos.split("|")[2];
	var pays = strPays.split(";");
	var couleur = strCouleur.split(";");
	var pions = strPions.split(";");
	if(couleur.length == pays.length){
		for(var i = 0 ; i < couleur.length ; i++){
			document.getElementById(pays[i]).style.fill = "#" + couleur[i];
			document.getElementById("renfort_" + pays[i]).innerHTML = pions[i];
		}
	}
}

function refreshEtatPartie(){
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			var etat = xhr.responseText;
			if(etat.lastIndexOf("attente") != -1){
				document.getElementById("unites").style.display = "hidden";
			}
			else{
				document.getElementById("unites").style.display = "block";
				refreshNbRenfort();
			}
			document.getElementById('etat').innerHTML = etat;
		}
	};
	xhr.open("GET", "../php/partie/etat_partie.php", true);
	xhr.send(null);
}