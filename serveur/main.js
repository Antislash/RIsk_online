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
app.post('/inscription', function(req, res){
	var name = req.body.inscriptionPseudo;
	var mdp = req.body.inscriptionPassword1;

	var compte = new Object();
	compte.name = name;
	compte.mdp = mdp;
	compte.res = res;

	console.log(mdp);
	console.log(name);

	db.executeSelectQuery("select * from user where pseudo = \'" +  name + "\'", inscription, compte);		

})

//Fonction qui gère le formulaire de connexion
app.post('/connexion', function(req,res){
	var name = req.body.connexionPseudo;
	var mdp = req.body.connexionPassword;

	var compte = new Object();
	compte.name = name;
	compte.mdp = mdp;
	compte.res = res;

	console.log(mdp);
	console.log(name);

	//console.log('La variable vaut = ' + name + mdp);

	var requette = "SELECT * FROM user WHERE pseudo = \'" + name + "\' AND password = \'" + mdp + "\'";
	db.executeSelectQuery(requette, connexion, compte);

	//res.redirect('/');
	
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

		var requette = "INSERT INTO user (password,email,pseudo,date_inscription,statut) VALUES( \'"+ mdp +"\' , NULL, \'" + name +"\', CURDATE(),'En ligne')";
		db.executeInsertQuery(requette);

		data.res.redirect('/home');
	}
	else data.res.redirect('/');
}

function connexion(row, data) {

	if (row.length == 0) {
		data.res.redirect('/');
	}

	else {
		data.res.redirect('/home');
	}
}