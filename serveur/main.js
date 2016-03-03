var express = require('express'); //Module express requis (Framework node js)
var path = require('path'); //Module Path requis, pour les chemins de fichier
var http = require('http');
var bosyParser = require("body-parser");

var app = express(); //Instantiation du serveur

app.set('port', process.env.PORT || 8080) //Port d'écoute
app.use(bosyParser.urlencoded({extended: true}));
app.use(express.static(path.join(__dirname, '../www'))); //Pour pouvoir utiliser des chemins relatifs dans les fichier utilisés

http.createServer(app).listen(app.get('port'), function(){
	console.log('Serveur express ouvert au port ' + app.get('port'));
}); //Création du serveur et écoute du port 8080

console.log('Ouverture du serveur');


//On renvois le fichier index.html lorsque l'on cherche le chemin /
app.get('/', function(req, res){

	res.sendFile(path.resolve(__dirname + '/../www/index.html'));
})

app.post('/post.html', function(request,response){
	var name = request.body.pseudo;
	console.log('La variable vaut = ' + name);

	response.sendFile(path.resolve(__dirname + '/../www/acceuil.html'));

	db.connect("localhost", "root", "gatien", "test");
	console.log('Ouverture de la base de donnée');
});

//app.listen(8080); //On écoute le port 8080