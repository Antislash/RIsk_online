var arrayP;
var intervalMap = setInterval('refreshMap()', 4000);

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
			refreshEtatPartie();
			refreshPlayers();
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
			if(etat.indexOf("init",0) != -1  || etat.indexOf("renfort",0) != -1){
				document.getElementById("unites").style.display = "block";
				clearInterval(intervalMap);
				iniRenfort();
			}
			else{
				document.getElementById("unites").style.display = "none";
			}
			if(etat.indexOf("attente",0) != -1 || etat.indexOf("joue",0) != -1){
				document.getElementById("fleche").style.display = "none";
			}
			else{
				document.getElementById("fleche").style.display = "block";
				eventFleche(etat);
			}
			if(etat == "init" || etat == "renfort"){
				document.getElementById('etat').innerHTML = "Renforcement";
			}
			else if(etat == "attaque"){
				document.getElementById('etat').innerHTML = "Attaquer";
			}
			else if(etat == "deplace"){
				document.getElementById('etat').innerHTML = "Déplacer";
			}
			else{
				document.getElementById('etat').innerHTML = etat;
			}
		}
	};
	xhr.open("GET", "../php/partie/etat_partie.php", true);
	xhr.send(null);
}

function explodeArrayPays(chaine){
	var res = chaine.split(";");
	return res;
}

function getPays(){
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			arrayP = explodeArrayPays(xhr.responseText);
		}
	};
	xhr.open("GET", "../php/partie/get_pays_joueur.php", true);
	xhr.send(null);
}

getPays();
var renfort = new Array(50);
var nbRenfort;

function renforcePays(idPays, mode){
	if (!arrayP.includes(idPays)){
		return false;
	}
	if(mode == 'plus' && nbRenfort > 0){
		if(renfort[idPays] > 0){
			renfort[idPays] += 1;
		}
		else{
			renfort[idPays] = 1;
		}
		nbRenfort += -1;
		document.getElementById("renfort_"+idPays.toString()).innerHTML = (parseInt(document.getElementById("renfort_"+idPays.toString()).innerHTML) + 1).toString();
	}
	else if(renfort[idPays] != -1 && nbRenfort > 0){
		renfort[idPays] += -1;
		if(renfort[idPays] == 0){
			renfort[idPays] = -1;
		}
		nbRenfort += 1;
		document.getElementById("renfort_"+idPays.toString()).innerHTML = (parseInt(document.getElementById("renfort_"+idPays.toString()).innerHTML) - 1).toString();
	}

	refreshNbRenfort();
	return true;
}

function renforcer(){
	if(nbRenfort == 0){
		var xhr = getXMLHttpRequest();
		xhr.open("POST", "../php/partie/renforce.php", true);
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				nextStep();
			}
		};
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("renfort="+renfort);
	}
	else{
		notif("Vous avez encore des troupes a utiliser",2);
	}
}

function refreshNbRenfort(){
	document.getElementById("unites-sup").innerHTML = nbRenfort;
}

function setMapSize(){
	var w = 750;
	var h = 520;
	var ratio = w/h;
	var wEcran = document.body.clientWidth;
	var hEcran = document.body.clientHeight - 100;
	if(wEcran < ratio * hEcran){
		newW = wEcran;
		newH = wEcran/ratio;
	}
	else{
		newW = hEcran * ratio;
		newH = hEcran;
	}
	document.getElementById("map-svg").style.width = newW;
	document.getElementById("map-svg").style.height = newH;
}

function eventFleche(etat){
	var e = document.getElementById('fleche');
	if(etat == 'renfort' || etat == 'init') {
		e.addEventListener('click', function (e) {
			renforcer();
		});
	}
	else{
		e.addEventListener('click', function (e) {
			nextStep();
		});
	}
}

function addListenerCountry(){
	var i;
	for(i=1; i < 43; i++){
		var e = document.getElementById(i);
		e.addEventListener('click', function(e) {
			renforcePays(e.target.id, 'plus');
			if(e.target.id == 43){
				nextStep();
			}
		});
	}
}

function nextStep(){
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			refreshMap();

			//Si le joueur a fini sa phase d'initialisation ou de renforcement on relance l'intervalle de rafraichissement de la map
			if(xhr.responseText == "fini"){
				var intervalMap = setInterval('refreshMap()', 4000);
			}
		}
	};
	xhr.open("GET", "../php/partie/next_step.php", true);
	xhr.send(null);
}


function iniRenfort(){
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			nbRenfort = parseInt(xhr.responseText);
			refreshNbRenfort();
		}
	};
	xhr.open("GET", "../php/partie/nb_renfort.php", true);
	xhr.send(null);
}

function derouler(elm){
	if(elm.className == "unwrap"){
		elm.className = "wrapped";
	}
	else{
		elm.className = "unwrap";
	}
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