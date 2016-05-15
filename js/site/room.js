setInterval('requestChat(readMessage)',500);
setInterval('requestListeJoueur(affichageListeJoueur)',700);
setInterval('verifierRoom()',2000);

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
   xhr.open("GET", "../php/site/get-message.php?action=" + action, true);
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
            callback(xhr.responseText);
         write(msg);
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

function affichageListeJoueur(data){
    if(data.length > 0){
        document.getElementById('liste_joueur').innerHTML = data;
    }
}

// function verifierRoom(callback){
//     var xhr = getXMLHttpRequest();
//
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
//             callback(xhr.responseText);
//             write(msg);
//         }
//     };
//     var msg = encodeURIComponent(document.getElementById("barre-msg").value);
//     xhr.open("GET", "../php/site/save_chat_room.php?message=" + msg, true);
//     xhr.send(null);
//
//     document.getElementById("barre-msg").value = '';
// }