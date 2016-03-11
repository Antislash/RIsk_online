var main = require('./main.js');
var db = require('./sql.js');

console.log('fichier application');


/*
*Fonction de traitement de la base de données
*/
var empty = function empty(object) {
  for (var i in object) 
    if (object.hasOwnProperty(i))
      return false;
 
  return true;
}

//Test d'utilisation de la connection avec la base de données
var processResult = function(row) {
	if(row == 0){
		console.log("ok");
	}
	else{
    	console.log(row[0]['nom']);
    }		
}



/*Fonction de test pour les instructions SQL*/

db.connect("localhost", "root", "gatien", "risk");
//db.executeSelectQuery("select * from continent",processResult);		
//db.executeInsertQuery("INSERT INTO test (id, label,valeur) VALUES(4,'je fais un test',7)");
//db.close();