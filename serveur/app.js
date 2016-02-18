var main = require('./main.js');
var sql = require('./sql.js');
var color = require('color');

console.log('fichier application');

var empty = function empty(object) {
  for (var i in object) 
    if (object.hasOwnProperty(i))
      return false;
 
  return true;
}

//Test d'utilisation de la connection avec la base de données
var processResult = function(row) {
    console.log(row[0]['id']);		
}

db.connect("localhost", "root", "gatien", "test");
db.executeSelectQuery("select * from test",processResult);
//db.executeInsertQuery("INSERT INTO test (id, label,valeur) VALUES(4,'je fais un test',7)");
db.close();