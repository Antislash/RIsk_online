document.write("<script type='text/javascript' src='../../ajax/ajax_functions.js'></script>" );

setInterval('requestRoom(readRoom)',1000);

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

//Requête pour demander les room
function requestRoom(callback) {
    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {

            callback(xhr.responseText);

        }
    };

    xhr.open("GET", "../php/site/liste_room.php", true);
    xhr.send(null);
}

//Méthode pour afficher les room
function readRoom(sData) {
    if (sData.length > 0) {
        document.getElementById('liste_room').innerHTML = sData;
    }
}