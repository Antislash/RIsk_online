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
            //alert(xhr.responseText);
            arrayP = explodeArrayPays(xhr.responseText);
        }
    };
    xhr.open("GET", "../../php/partie/get_pays_joueur.php", true);
    xhr.send(null);
}

