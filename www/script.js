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

function request(callback) {
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
 
function readData(sData) {    
    if (sData.length > 0) {
	document.getElementById('chat-room').innerHTML = sData;
	}
	else {
	document.getElementById('chat-room').innerHTML = '<center><b>Pas de messages pour le moment.</b></center>';
	}
}
setInterval('request(readData)',500);

function post() {
  var xhr = getXMLHttpRequest();
     
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseText);
         write(msg);
        }
    };
    var msg = encodeURIComponent(document.getElementById("barre-msg").value);
      xhr.open("GET", "../php/site/post.php?message=" + msg, true);
      xhr.send(null);
	  
      document.getElementById("barre-msg").value = '';
}
