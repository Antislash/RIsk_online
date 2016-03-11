var express = require('express'); //Module express requis (Framework node js)
var path = require('path'); //Module Path requis, pour les chemins de fichier
var http = require('http');
var bosyParser = require("body-parser");
var util = require('util');

var app = express(); //Instantiation du serveur

app.set('port', process.env.PORT || 8080) //Port d'écoute
app.use(bosyParser.urlencoded({extended: true}));
app.use(express.static(path.join(__dirname, '../www'))); //Pour pouvoir utiliser des chemins relatifs dans les fichier utilisés

id_joueur = 0;

http.createServer(app).listen(app.get('port'), function(){
	console.log('Serveur express ouvert au port ' + app.get('port'));
}); //Création du serveur et écoute du port 8080

//Sert pour les inscription
app.post('/inscription.html', function(req, res){
	var name = req.body.nom;

	var mdp = req.body.pass;

	if(name && mdp){
		id_joueur += 1;

		var requette = "INSERT INTO utilisateur (id_user, password,email,avatar,date_inscription,statut) VALUES( "+ id_joueur+ ","+ mdp +", NULL," + name +", NULL,NULL, 'new')";
		console.log(requette);
		//db.executeInsertQuery();
	}
})

//Fonction qui gère le formulaire de connexion
app.post('/post.html', function(req,res){
	var name = req.body.pseudo;
	console.log('La variable vaut = ' + name);

	//db.executeSelectQuery("select * from joueur",processResult);

	res.redirect('/');
	res.sendFile(path.resolve(__dirname + '/../www/acceuil.html')); //Envoye la page d'accueil

	/*db.connect("localhost", "root", "gatien", "test");//Connexion à la base de données
	console.log('Ouverture de la base de donnée');*/
	
})



//On renvois le fichier index.html lorsque l'on cherche le chemin /
app.get('/', function(req, res){
	console.log('ok');
	res.sendFile(path.resolve(__dirname + '/../www/index.html'));
})



//app.listen(8080); //On écoute le port 8080