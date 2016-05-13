function getXhr(){
	var xhr = null; 
	if(window.XMLHttpRequest) // Firefox et autres
	   xhr = new XMLHttpRequest(); 
	else if(window.ActiveXObject){ // Internet Explorer 
	   try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
	}
	else { // XMLHttpRequest non support� par le navigateur 
	   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
	   xhr = false; 
	}
	return xhr;
}

function getHostProjectName(projectName = "/RIsk_online"){
	var pathname = window.location.pathname;
	pathname = pathname.substr(0,pathname.indexOf(projectName)+projectName.length);
	return pathname;
}

function reqAjax(param, pageActionPhp, action){
	if( (typeof param === "object") && (param !== null) )
	{
		var xhr = getXhr();
		var url = getHostProjectName() + pageActionPhp + "?";
		for (var id in param) {
			url = url + id+"="+param[id]+"&";
			//alert(id+" = "+param[id]);
		}
		//On enleve le dernier "&"
		url = url.substr(0, url.length-1);
		xhr.onreadystatechange = function(){
		// On ne fait quelque chose que si on a tout re�u et que le serveur est ok
		if(xhr.readyState == 4 && xhr.status == 200){
			if(xhr.responseText != ""){
				action(xhr.responseText);
			}
		}
	}
	xhr.open("GET",url,true);	//On lance la page en GET
	xhr.send(null);
	}
	else{
		return false;
	}
}

