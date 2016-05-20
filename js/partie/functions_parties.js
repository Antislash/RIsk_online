var arrayP;
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

function explodeArrayPays(chaine){
    var res = chaine.split(";");
    return res;
}

function nextStep(){
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            afficherCouleurCarte(xhr.responseText);
        }
    };
    xhr.open("GET", "../php/partie/getColorPays.php", true);
    xhr.send(null);
}

function getPays(){
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            arrayP = explodeArrayPays(xhr.responseText);
        }
    };
    xhr.open("GET", "../../php/partie/get_pays_joueur.php", true);
    xhr.send(null);
}


var renfort = new Array(pays.length + 1);
var nbRenfort = 5;

function renforcePays(idPays, mode){
	if (!arrayP.includes(idPays)){
		return false;
	}
	if(mode == 'plus' && nbRenfort > 0){
		if(renfort[idPays] != -1){
			renfort[idPays] += 1;
		}
		else{
			renfort[idPays] = 1;
		}
		nbRenfort += -1;
	}
	else if(renfort[idPays] != -1){
		renfort[idPays] += -1;
		if(renfort[idPays] == 0){
			renfort[idPays] = -1;
		}
		nbRenfort += 1;
	}
	refreshNbRenfort();
	return true;
}

function renforcer(){
	if(nbRenfort == 0){
		var xhr = getXMLHttpRequest();
		xhr.open("POST", "renforcer.php", true);
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

function iniRenfort(){
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			nbRenfort = parseFloat(xhr.responseText);
			refreshNbRenfort();
		}
	};
	xhr.open("GET", "../php/partie/nbRenfort.php", true);
	xhr.send(null);
}
