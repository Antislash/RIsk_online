var express = require('express'); //Module express requis (Framework node js)
var http = require('http');

var path = require('path'); //Module Path requis, pour les chemins de fichier

//var util = require('util');

var bosyParser = require("body-parser"); //Utile pour lire les réponses des formulaires
var cookieSession = require('cookie-session');
var cookieParser = require('cookie-parser'); //La session est stocké dans un cookie, nous utilisons ce parse 


var app = express(); //Instantiation du serveur



app.set('port', process.env.PORT || 8080) //Port d'écoute
app.use(bosyParser.urlencoded({extended: true})); //Utile pour lire les données envoyés dans les formulaires.
app.use(express.static(path.join(__dirname, '../www'))); //Pour pouvoir utiliser des chemins relatifs dans les fichier utilisés

//Autorisé les cookie dans les entête html

app.use(cookieParser());
app.use(cookieSession({ name: 'testSession', keys: ['key1', 'key2']}));

/** Configuration **/
/*app.configure(function(){
	//this.set('views', path.join(__dirname, 'view'));
	//this.set('view engine', 'ejs');

	// Allow parsing cookie from request header
	this.use(express.cokieParser());
	//session management
	this.use(express.session({
		//private scripting key
		"secret" : "some private string",
		// Internal session data storage engine, this is the default engine embedded with connect.
    	// Much more can be found as external modules (Redis, Mongo, Mysql, file...). look at "npm search connect session store"
    	"store":  new express.session.MemoryStore({ reapInterval: 60000 * 10 })
	}));

});*/

http.createServer(app).listen(app.get('port'), function(){
	console.log('Serveur express ouvert au port ' + app.get('port'));
}); //Création du serveur et écoute du port 8080

//Sert pour les inscription
app.post('/inscription', function(req, res){
	var name = req.body.nom;

	var mdp = req.body.pass1;

	var compte = new Object();
	compte.name = name;
	compte.mdp = mdp;
	compte.res = res;

	db.executeSelectQuery("select * from user where pseudo = \'" +  name + "\'", inscription, compte);		

})

//Fonction qui gère le formulaire de connexion
app.post('/connexion', function(req,res){
	var name = req.body.pseudo;
	var mdp = req.body.mdp;

	req.session.pseudo = name;

	var compte = new Object();
	compte.name = name;
	compte.mdp = mdp;
	compte.req = req;
	compte.res = res;

	var requette = "SELECT * FROM user WHERE pseudo = \'" + name + "\' AND password = \'" + mdp + "\'";
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

		var requette = "INSERT INTO user (password,email,pseudo,date_inscription,statut) VALUES( \'"+ mdp +"\' , NULL, \'" + name +"\', CURDATE(),'En ligne')";
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