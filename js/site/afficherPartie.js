var arrayP;
var modeRenfort = 'plus';
var intervalMap = setInterval('refreshMap()', 4000);
var etat_joueur = ""; // Etat globale du joueur dans la partie, sert notamment pour l'écoute des pays savoir quels fonction appellé


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
			getPays();
			if(etat.indexOf("init",0) != -1  || etat.indexOf("renfort",0) != -1){
				document.getElementById("unites").style.display = "block";
				etat_joueur = "renfort";
				clearInterval(intervalMap);
				iniRenfort();
			}
			else{
				document.getElementById("unites").style.display = "none";
				etat_joueur = "attente";
			}
			if(etat.indexOf("attente",0) != -1 || etat.indexOf("joue",0) != -1){
				document.getElementById("fleche").style.display = "none";
				etat_joueur = "attente";
			}
			else{
				document.getElementById("fleche").style.display = "block";
				etat_joueur = "joue";

			}
			if(etat == "init" || etat == "renfort"){
				document.getElementById('etat').innerHTML = "Renforcement";
				etat_joueur = "renfort";
				clearInterval(intervalMap);
			}
			else if(etat == "attaque"){
				document.getElementById('etat').innerHTML = "Attaquer";
				etat_joueur = "attaque";
			}
			else if(etat == "deplace"){
				document.getElementById('etat').innerHTML = "Déplacer";
				etat_joueur = "deplace";
				clearInterval(intervalMap);
				phaseDeplacement();
			}
			else{
				document.getElementById('etat').innerHTML = etat;
				etat_joueur = "attente";
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
	else if(renfort[idPays] != null && renfort[idPays] != -1 && nbRenfort >= 0 && mode == 'moins'){
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

function clickFleche(e){
	if(etat_joueur == 'renfort' || etat_joueur == 'init') {
		renforcer();
	}
	else if(etat_joueur = "deplace"){
		procederDeplacement();
	}
	else{
		nextStep();
	}
}


function eventFleche(){
	var e = document.getElementById('fleche');
	e.addEventListener('click', clickFleche);
}

function clickCountry(e) {
	if(victoire){
		deplacementVerife(e.target.id);
	}
	else if(etat_joueur == "renfort"){
		renforcePays(e.target.id, modeRenfort);
	}
	else if(etat_joueur == "deplace"){
		phaseDeplacement(e.target.id);
	}
	else if(etat_joueur == "attaque"){
		attaquePays(e.target.id);
	}
	else if(e.target.id == 43){
		nextStep();
	}
}

function addListenerCountry(){
	var i;
	for(i=1; i < 43; i++){
		var e = document.getElementById(i);
		e.addEventListener('click',clickCountry);
	}
}

function nextStep(){
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			refreshMap();

			//Si le joueur a fini sa phase d'initialisation ou de renforcement  ou de déplacement
			// on relance l'intervalle de rafraichissement de la map
			if(xhr.responseText == "fini"){
				intervalMap = setInterval('refreshMap()', 4000);
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

function changeModeRenfort(mode){
	if(mode == 'moins'){
		document.getElementById('unites-plus').className = null;
		document.getElementById('unites-moins').className = 'td-selected';
		modeRenfort = 'moins';
	}
	else if(mode == 'plus'){
		document.getElementById('unites-moins').className = null;
		document.getElementById('unites-plus').className = 'td-selected';
		modeRenfort = 'plus';
	}
}

/**
 * Utilisé pour la phase de déplacement du joueur
 */
var paysSource = "";
var paysDestination = "";

var move = new Array(50);

var deplacementOK = false;

function phaseDeplacement(idPays){

	//Si le pays n'est pas contenu dans la liste de pays appartenant au joueur
	if (!arrayP.includes(idPays)){
		if(paysSource != "") {
			document.getElementById(paysSource).classList.remove("countrySelected");
		}
		if(paysDestination != "") {
			document.getElementById(paysDestination).classList.remove("countrySelected");
		}
		paysSource = "";
		paysDestination = "";
	}
	// Si le joueur n'a pas de paysSource selectionné
	else if (arrayP.includes(idPays) && paysSource == ""){
		paysSource = idPays;
		document.getElementById(paysSource).classList.add("countrySelected");
	}
	// Si le joueur n'a pas de paysDestination selectionné
	else if (arrayP.includes(idPays) && paysSource != "" && paysDestination == "" && paysSource != idPays){
		paysDestination = idPays;
		document.getElementById(paysDestination).classList.add("countrySelected");

		//On vérifie si le déplacement est possible
		verifierDeplacement();
	}
	else if (arrayP.includes(idPays) && paysSource == idPays && paysDestination ==""){
		if(paysSource != "") {
			document.getElementById(paysSource).classList.remove("countrySelected");
		}
		if(paysDestination != "") {
			document.getElementById(paysDestination).classList.remove("countrySelected");
		}
		paysSource = "";
	}
	else if(idPays != paysSource && idPays != paysDestination){
		if(paysSource != "") {
			document.getElementById(paysSource).classList.remove("countrySelected");
		}
		if(paysDestination != "") {
			document.getElementById(paysDestination).classList.remove("countrySelected");
		}
		paysSource = "";
		paysDestination = ""

	}
	// SI le joueur a renseigné les 2 pays
	else if(arrayP.includes(idPays) && paysSource != "" && paysDestination != "" && deplacementOK){

		//On procéde au déplacement des troupes
		deplacementVerife(idPays);
	}

}

function verifierDeplacement(){
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			if(xhr.responseText == "1"){

				deplacementOK = true;
			}
			else{

				deplacementOK = false;

				//Le joueur doit selectionner 1 nouveaux pays de destination si le déplacement n'est pas possible
				document.getElementById(paysDestination).classList.remove("countrySelected");
				notif("Il n'est pas possible de faire ce déplacement",2);
				paysDestination = "";
			}
		}
	};
	xhr.open("GET", "../php/partie/verifier_deplacement.php?paysSource=" + paysSource + "&paysDestination=" + paysDestination, true);
	xhr.send(null);
}

//Appelé une fois que la vérification du déplacement possible est faite
function deplacementVerife(idPays){
	if(idPays != paysDestination && idPays != paysSource){
		procederDeplacement();
		intervalMap = setInterval('refreshMap()', 4000);
	}

	//Dans le cas ou le joueur a selectionner le paysSource, PaysDestination et veut déplacer ses renfort de paysSource => PaysDestination
	//et qu'il reste plus d'une unité sur le paysSource
	 if(paysDestination == idPays && document.getElementById("renfort_"+paysSource.toString()).innerHTML > 1 ){

		move[paysSource] =  parseInt(document.getElementById("renfort_"+paysSource.toString()).innerHTML) -1;
		move[paysDestination] = parseInt(document.getElementById("renfort_"+paysDestination.toString()).innerHTML) +1;

		document.getElementById("renfort_"+paysSource.toString()).innerHTML = (parseInt(document.getElementById("renfort_"+paysSource.toString()).innerHTML) - 1).toString();
		document.getElementById("renfort_"+paysDestination.toString()).innerHTML = (parseInt(document.getElementById("renfort_"+paysDestination.toString()).innerHTML) + 1).toString();
	}

	//Dans le cas ou le joueur a selectionner le paysSource, PaysDestination et veut déplacer ses renfort de PaysDestination => paysSource
	//et qu'il reste plus d'une unité sur le PaysDestination
	if(paysSource == idPays	&& document.getElementById("renfort_"+paysDestination.toString()).innerHTML > 1){

		move[paysDestination] = parseInt(document.getElementById("renfort_"+paysDestination.toString()).innerHTML) - 1;
		move[paysSource] = parseInt(document.getElementById("renfort_"+paysSource.toString()).innerHTML) + 1;

		document.getElementById("renfort_"+paysDestination.toString()).innerHTML = (parseInt(document.getElementById("renfort_"+paysDestination.toString()).innerHTML) - 1).toString();
		document.getElementById("renfort_"+paysSource.toString()).innerHTML = (parseInt(document.getElementById("renfort_"+paysSource.toString()).innerHTML) + 1).toString();
	}
}

function procederDeplacement(){
	if(paysDestination != "") {
		document.getElementById(paysDestination).classList.remove("countrySelected");
	}
	if(paysSource != "") {
		document.getElementById(paysSource).classList.remove("countrySelected");
	}
	var xhr = getXMLHttpRequest();
	xhr.open("POST", "../php/partie/proceder_deplacement.php", true);
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			paysSource = "";
			paysDestination = "";
			if(!victoire) {
				nextStep();
			}
			else{
				victoire = false;
			}
		}
	};
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("move="+move);
}

function getAttackableCountries(idcountry) {
	var xhr = getXMLHttpRequest();
	var pays;
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			arrayA = xhr.responseText.split(";");
			for(var i = 0; i < arrayA.length ; i++){
				if(arrayA[i] != "") {
					document.getElementById(arrayA[i]).classList.add("countryAttaque");
				}
			}
		}
	};
	xhr.open("GET", "../php/partie/getAttackableCountry.php?country="+idcountry, true);
	xhr.send(null);
}

var idAttaque = "";
var idDefense = "";
var arrayA = new Array();
var victoire = false;

function attaquePays(idPays) {
	if(idAttaque == ""){
		if (!arrayP.includes(idPays)){
			return ;
		}
		idAttaque = idPays.toString();
		getAttackableCountries(idPays);
		return ;
	}
	else if(idDefense == "" && arrayA.includes(idPays)){
		idDefense = idPays.toString();
		victoire = false;
		document.getElementById("info-attaque").innerHTML = "";
		attaquer();
		return ;
	}
	else if(idAttaque == idPays.toString()){
		idAttaque = "";
		for(var i = 0; i < arrayA.length ; i++){
			if(arrayA[i] != "") {
				document.getElementById(arrayA[i]).classList.remove("countryAttaque");
			}
		}
	}
}

function attaquer(){
	document.getElementById("attaque").className = "a-actif";
	if(!victoire && parseInt(document.getElementById("renfort_"+idAttaque.toString()).innerHTML) > 1 && parseInt(document.getElementById("renfort_"+idDefense.toString()).innerHTML) > 0){
		procederAttaque();
		refreshMap();
	}
	else {
		sleep(2000);
		for(var i = 0; i < arrayA.length ; i++){
			if(arrayA[i] != "") {
				document.getElementById(arrayA[i]).classList.remove("countryAttaque");
			}
		}
		document.getElementById("attaque").className = "a-inactif";
		if(victoire){
			clearInterval(intervalMap);
			paysDestination = idDefense;
			paysSource = idAttaque;
			arrayP.push(idDefense);
			document.getElementById(paysSource).classList.add("countrySelected");
			document.getElementById(paysDestination).classList.add("countrySelected");
		}
		idAttaque = "";
		idDefense = "";
	}
}

function procederAttaque(){
	var xhr = getXMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			if(xhr.responseText.indexOf("code_victoire",0) != -1){
				victoire = true;
			}
			else {
				document.getElementById("info-attaque").innerHTML = xhr.responseText;
			}
			sleep(1000);
			attaquer();
		}
	};
	xhr.open("GET", "../php/partie/proceder_attaque.php?idAttaque="+idAttaque+"&idDefense="+idDefense, true);
	xhr.send(null);
}

function sleep(milliseconds) {
	var start = new Date().getTime();
	for (var i = 0; i < 1e7; i++) {
		if ((new Date().getTime() - start) > milliseconds){
			break;
		}
	}
}