var express = require('express'); //Module express requis (Framework node js)
var http = require('http');
<<<<<<< HEAD

var path = require('path'); //Module Path requis, pour les chemins de fichier

//var util = require('util');

var bosyParser = require("body-parser"); //Utile pour lire les réponses des formulaires
var cookieSession = require('express-session');
var cookieParser = require('cookie-parser'); //La session est stocké dans un cookie, nous utilisons ce parse 

=======
var bosyParser = require("body-parser");
var util = require('util');
var md5 = require('md5');
>>>>>>> a860204187e349bafaab15d0d170593167646d4d

var app = express(); //Instantiation du serveur



app.set('port', process.env.PORT || 8080) //Port d'écoute
app.use(bosyParser.urlencoded({extended: true})); //Utile pour lire les données envoyés dans les formulaires.
app.use(express.static(path.join(__dirname, '../www'))); //Pour pouvoir utiliser des chemins relatifs dans les fichier utilisés

//Autorisé les cookie dans les entête html

app.use(cookieParser());
app.set('trust proxy', 1) // trust first proxy
app.use(session({
  secret: 'keyboard cat',
  resave: false,
  saveUninitialized: true,
  cookie: { secure: true }
}))

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

	req.session.pseudo = name;

	var compte = new Object();
	compte.name = name;
	compte.mdp = mdp;
	compte.req = req;
	compte.res = res;

	console.log(md5(mdp));
	console.log(name);

	//console.log('La variable vaut = ' + name + mdp);

	var requette = "SELECT * FROM user WHERE pseudo = \'" + name + "\' AND password = \'" + md5(mdp) + "\'";
	db.executeSelectQuery(requette, connexion, compte);
	
})

//On renvois le fichier index.html lorsque l'on cherche le chemin /
app.get('/', function(req, res){
	res.sendFile(path.resolve(__dirname + '/../www/index.html')); //Envoi à la page de connection
})

//Renvois la page home
app.get('/home', /*[requireLogin],*/ function(req, res){
	res.sendFile(path.resolve(__dirname + '/../www/acceuil.html')); //Envoye la page d'accueil
})


//Fonction de gestion des inscription
function inscription(row, data) {

	var name = data.name;
	var mdp = data.mdp

	if(row.length == 0){

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

	console.log(data.req.session.pseudo);
	if (row.length == 0) {
		data.res.redirect('/');
	}

	else {
		data.res.redirect('/home');
	}
}