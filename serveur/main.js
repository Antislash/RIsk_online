var express = require('express'); //Module express requis (Framework node js)
var path = require('path'); //Module Path requis, pour les chemins de fichier
var http = require('http');
var bosyParser = require("body-parser");
var util = require('util');

var app = express(); //Instantiation du serveur

app.set('port', process.env.PORT || 8080) //Port d'écoute
app.use(bosyParser.urlencoded({extended: true}));
app.use(express.static(path.join(__dirname, '../www'))); //Pour pouvoir utiliser des chemins relatifs dans les fichier utilisés

http.createServer(app).listen(app.get('port'), function(){
	console.log('Serveur express ouvert au port ' + app.get('port'));
}); //Création du serveur et écoute du port 8080

//Sert pour les inscription
app.post('/inscription.html', function(req, res){
	var name = req.body.nom;

	var mdp = req.body.pass1;

	var compte = new Object();
	compte.name = name;
	compte.mdp = mdp;
	compte.res = res;

db.executeSelectQuery("select * from utilisateur where avatar = \'" +  name+"\'",inscription,compte);		

})

//Fonction qui gère le formulaire de connexion
app.post('/post.html', function(req,res){
	var name = req.body.pseudo;
	console.log('La variable vaut = ' + name);

	//db.executeSelectQuery("select * from joueur",processResult);

	res.redirect('/');
	
})

//On renvois le fichier index.html lorsque l'on cherche le chemin /
app.get('/', function(req, res){
	res.sendFile(path.resolve(__dirname + '/../www/index.html')); //Envoi à la page de connection
})

//Renvois la page home
app.get('/home', function(req, res){
	res.sendFile(path.resolve(__dirname + '/../www/acceuil.html')); //Envoye la page d'accueil
})

function inscription(row, data) {

	var name = data.name;
	var mdp = data.mdp

	if(row.length == 0){

		var requette = "INSERT INTO utilisateur (password,email,avatar,date_inscription,statut) VALUES( \'"+ mdp +"\' , NULL, \'" + name +"\', CURDATE(),NULL)";
		db.executeInsertQuery(requette);

		data.res.redirect('/home');
	}
	else data.res.redirect('/');
}