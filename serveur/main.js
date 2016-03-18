var express = require('express'); //Module express requis (Framework node js)
var http = require('http');


var path = require('path'); //Module Path requis, pour les chemins de fichier

//var util = require('util');

var bosyParser = require("body-parser"); //Utile pour lire les réponses des formulaires
var cookieSession = require('express-session');
var cookieParser = require('cookie-parser'); //La session est stocké dans un cookie, nous utilisons ce parse 

var bosyParser = require("body-parser");
var util = require('util');
var md5 = require('md5');

var app = express(); //Instantiation du serveur



app.set('port', process.env.PORT || 8080) //Port d'écoute
app.use(bosyParser.urlencoded({extended: true})); //Utile pour lire les données envoyés dans les formulaires.
app.use(express.static(path.join(__dirname, '../www'))); //Pour pouvoir utiliser des chemins relatifs dans les fichier utilisés


//Autorisé les cookie dans les entête html

app.use(cookieParser());
// Session management
// Internal session data storage engine, this is the default engine embedded with connect.
// Much more can be found as external modules (Redis, Mongo, Mysql, file...). look at "npm search connect session store"
app.use(cookieSession({
  secret: 'keyboard cat',
  resave: false,
  saveUninitialized: true
}))

var server = http.createServer(app).listen(app.get('port'), function(){
	console.log('Serveur express ouvert au port ' + app.get('port'));
}); //Création du serveur et écoute du port 8080

exports.server = server;

//Sert pour les inscription
app.post('/inscription', function(req, res){
	var name = req.body.inscriptionPseudo;
	var mdp = req.body.inscriptionPassword1;

	req.session.pseudo = name;

	var compte = new Object();
	compte.name = name;
	compte.mdp = mdp;
	compte.req = req;
	compte.res = res;

	db.executeSelectQuery("select * from user where pseudo = \'" +  name + "\'", inscription, compte);		

})

//Fonction qui gère le formulaire de connexion
app.post('/connexion', function(req,res){
	var name = req.body.connexionPseudo;
	var mdp = req.body.connexionPassword;

	 // Increment "index" in session
	  req.session.pseudo = name;

	var compte = new Object();
	compte.name = name;
	compte.mdp = mdp;
	compte.req = req;
	compte.res = res;

	var requette = "SELECT * FROM user WHERE pseudo = \'" + req.session.pseudo + "\' AND password = \'" + md5(mdp) + "\'";
	db.executeSelectQuery(requette, connexion, compte);
	
})

app.post('/co',function(req,res){
	  console.log("Session id vaut : "+ req.session.pseudo);
	  res.redirect('/home');
	
})

//On renvois le fichier index.html lorsque l'on cherche le chemin /
app.get('/', function(req, res){
	console.log('passe1');
	if(req.session.pseudo){

	console.log('passe2');
		res.redirect('/home');
	}else{
	console.log('passe3');
		res.redirect('/login');
	}
})

//On renvois le fichier index.html lorsque l'on cherche le chemin /
app.get('/login', function(req, res){
	res.sendFile(path.resolve(__dirname + '/../www/index.html')); //Envoi à la page de connection
})

//Renvois la page home
app.get('/home', /*[requireLogin],*/ function(req, res){
	res.sendFile(path.resolve(__dirname + '/../www/acceuil.html')); //Envoye la page d'accueil
})




//Fonction de gestion des inscription
function inscription(row, data) {

	var name = data.name;
	var mdp = data.mdp;

	if(row.length == 0 && data.req.session.pseudo &&  data.req.session.pseudo == name){

		var requette = "INSERT INTO user (password,email,pseudo,date_inscription,statut) VALUES( \'"+ md5(mdp) +"\' , NULL, \'" + name +"\', CURDATE(),'En ligne')";
		db.executeInsertQuery(requette);

		data.res.redirect('/home');
	}
	else data.res.redirect('/');
}

/*function requireLogin(req, res, next){
	if(req.session.username){
		next(); 
	} else {
		res.redirect('/');
}*/
function connexion(row, data) {

	if (row.length > 0 && data.req.session.pseudo && data.req.session.pseudo == data.name) {
		data.res.redirect('/home');
	}

	else {
		data.res.redirect('/');
	}
}