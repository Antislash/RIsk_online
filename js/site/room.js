setInterval('requestListeJoueur(affichageListeJoueur)',1500);
var chat = setInterval('requestChat(readMessage)',500);
var verif = setInterval('verifierRoom()',2000);

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

//Requête pour demander les message
function requestChat(callback) {
    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            
			callback(xhr.responseText);
            
        }
    };
 var action  = encodeURIComponent('new');
   xhr.open("GET", "../php/site/get_message_room.php?action=" + action, true);
    xhr.send(null);   
}

//Méthode pour afficher les message reçu
function readMessage(sData) {
    if (sData.length > 0) {
	document.getElementById('chat-room').innerHTML = sData;
	}
	else {
	document.getElementById('chat-room').innerHTML = '<center><b>Pas de messages pour le moment.</b></center>';
	}
}

//Méthode pour enregistrer les message en base de données
function saveMessage() {
  var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
           // callback(xhr.responseText);
         //write(msg);
        }
    };
    var msg = encodeURIComponent(document.getElementById("barre-msg").value);
      xhr.open("GET", "../php/site/save_chat_room.php?message=" + msg, true);
      xhr.send(null);

      document.getElementById("barre-msg").value = '';
}

//Affiche la liste des joueurs
function requestListeJoueur(callback) {
    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseText);
        }
    };
    var msg = encodeURIComponent(document.getElementById("barre-msg").value);
    xhr.open("GET", "../php/site/liste_joueur_room.php", true);
    xhr.send(null);
}

//Permet d'afficher la liste des joueur dynamiquement
function affichageListeJoueur(data){
    if(data.length > 0){
        document.getElementById('liste_joueur').innerHTML = data;
    }
}

//Permet de changer la statut de la room au clique du boutton "Lancer"
function debutPartie(){
    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById('chat-room').innerHTML =xhr.responseText;
        }
    };
    xhr.open("GET", "../php/site/lancer_partie.php", true);
    xhr.send(null);
}

//Méthode pour vérifier si la partie commence
function verifierRoom(){
    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
     
            //Si la partie commence
            if(xhr.responseText == "1" || xhr.responseText == 1){
                //Cacher le boutton quitter et lancer
                document.getElementById("quitter").style.display = "none";
                document.getElementById("lancer").style.display = "none";

                //On déasctive le chat et la vérification du statut de la room
                clearInterval(verif);
                clearInterval(chat);

                //On lance le compte a rebours
                setInterval('compteARebours()',1000);
            }
        }
    };

    xhr.open("GET", "../php/site/commencer_partie.php", true);
    xhr.send(null);
}

var seconde = 4; //Sert pour le compte a rebours

//Lorsque la partie commence on fait un compte a rebours
function compteARebours(){

    //Si 3s sont passé on redirige vers la partie
    if(seconde == 0){
        var adresseActuelle = window.location.origin ;
        window.location = adresseActuelle + "/risk_online/php/partie/recup_info_joueur.php";
    }
    //On annonce le début de la partie
    else if(seconde == 4){
        document.getElementById('chat-room').innerHTML = "La partie commence";
    }
    //On fait un compte a rebours de 3s
    else{
        var msg = "dans "+ seconde + "s";
        document.getElementById('chat-room').innerHTML = msg;
    }
    seconde -= 1;
}