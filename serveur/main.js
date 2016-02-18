var express = require('express'); //Module express requis (Framework node js)
var path = require('path'); //Module Path requis, pour les chemins de fichier
var http = require('http');
var app = express(); //Instantiation du serveur

http.createServer(app).listen(8080); //Création du serveur et écoute du port 8080

console.log('Ouverture du serveur');


//On renvois le fichier index.html lorsque l'on cherche le chemin /
app.get('/', function(req, res){
	app.use(express.static(path.join(__dirname, '../www')));
	res.sendFile(path.resolve(__dirname + '/../www/index.html'));
})

//app.listen(8080); //On écoute le port 8080