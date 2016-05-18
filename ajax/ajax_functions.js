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

function getHostProjectName(projectName = "/RIsk_online"){
	var pathname = window.location.pathname;
	pathname = pathname.substr(0,pathname.indexOf(projectName)+projectName.length);
	return pathname;
}

function reqAjax(param = null, pageActionPhp, action, mod = 'Text'){
	var xhr = getXMLHttpRequest();
	var url = getHostProjectName() + pageActionPhp + "?";
	if( (typeof param === "object") && (param !== null) )
	{
		for (var id in param) {
			url = url + id+"="+param[id]+"&";
			//alert(id+" = "+param[id]);
		}
		//On enleve le dernier "&"
		url = url.substr(0, url.length-1);
	}
	xhr.onreadystatechange = function(){
			// On ne fait quelque chose que si on a tout re�u et que le serveur est ok
			if(xhr.readyState == 4 && xhr.status == 200){
				if(mod == 'Text'){
					if(xhr.responseText != ""){
						action(xhr.responseText);
					}
				}
				else{	//HTML
					action(xhr.responseXML);
				}
			}
	}
	xhr.open("GET",url,true);	//On lance la page en GET
	xhr.send(null);
}

