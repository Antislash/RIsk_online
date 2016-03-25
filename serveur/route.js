var app = require('./main.js');
//Sert pour les inscription
app.post('/inscription', function(req, res){
	var name = req.body.inscriptionPseudo;
	var mdp = req.body.inscriptionPassword1;

	req.session.expires = new Date(Date.now() + 720000);
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
	req.session.cookie.expires = new Date(Date.now() + 720000);
	req.session.pseudo = name;

	var compte = new Object();
	compte.name = name;
	compte.mdp = mdp;
	compte.req = req;
	compte.res = res;

	var requette = "SELECT * FROM user WHERE pseudo = \'" + req.session.pseudo + "\' AND password = \'" + md5(mdp) + "\'";
	db.executeSelectQuery(requette, connexion, compte);
	
})

//On renvois le fichier index.html lorsque l'on cherche le chemin /
app.get('/', function(req, res){

	if(req.session.pseudo){
		res.redirect('/' + req.session.pseudo);
	}else{
		res.redirect('/login');
	}
})

//On renvois le fichier index.html lorsque l'on cherche le chemin /
app.get('/login', function(req, res){
	res.sendFile(path.resolve(__dirname + '/../www/login.html')); //Envoi à la page de connection
})

//Renvois la page home
app.get('/:home', /*[requireLogin],*/ function(req, res){
	res.sendFile(path.resolve(__dirname + '/../www/acceuil.html')); //Envoye la page d'accueil
})

//Fonction de gestion des inscription
function inscription(row, data) {

	var name = data.name;
	var mdp = data.mdp;

	if(row.length == 0 && data.req.session.pseudo &&  data.req.session.pseudo == name){

		var requette = "INSERT INTO user (password,email,pseudo,date_inscription,statut) VALUES( \'"+ md5(mdp) +"\' , NULL, \'" + name +"\', CURDATE(),'En ligne')";
		db.executeInsertQuery(requette);

		data.res.redirect('/' + data.req.session.pseudo);
	}
	else data.res.redirect('/');
}

function connexion(row, data) {

	if (row.length > 0 && data.req.session.pseudo && data.req.session.pseudo == data.name) {
		data.res.redirect('/' + data.req.session.pseudo);
	}

	else {
		data.res.redirect('/');
	}
}