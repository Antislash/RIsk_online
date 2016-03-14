var express = require('express'); //Module express requis (Framework node js)
var path = require('path'); //Module Path requis, pour les chemins de fichier
var http = require('http');
var bosyParser = require("body-parser");
var util = require('util');

var app = express(); //Instantiation du serveur

/** Configuration **/
app.configure(function(){
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

});

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

});

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
app.get('/home', [requireLogin], function(req, res){
	res.sendFile(path.resolve(__dirname + '/../www/acceuil.html')); //Envoye la page d'accueil
})


//Fonction de gestion des inscription
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

function requireLogin(req, res, next){
	if(req.session.username){
		next(); 
	} else {
		res.redirect('/');
	}
}