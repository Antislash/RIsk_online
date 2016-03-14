chat = module.exports = {
  socket : require('socket.io'), //Ce qui va être nécessaire pour faire fonctionner l'objet db
  mySqlClient : null, //Variable qui va contenir la connexion et les différentes fonction d'intéraction avec la bd
 
  //Fonction de connexion
  connect : function (host, user, password, database) {
    this.mysql = require('mysql');
    this.mySqlClient = this.mysql.createConnection({
      host     : host,
      user     : user,
      password : password,
      database : database
    });  

    console.log("Connection à la base de données");
  },
 
  //Fonction de fermeture
  close : function() {
    this.mySqlClient.end();
    console.log("Fermeture de la base de données");
  },
 
  //Executé une requête de selection (use sert à demander si on veut utiliser la fonction de callback)
  executeSelectQuery : function( selectQuery, callbackResultFunction, donnees ) { 
    this.mySqlClient.query(
    selectQuery,
    function select(error, results, fields) {
      //En cas d'erreur
      if (error) {
        console.log(error);
        this.mySqlClient.end();
        return;
      }
      //Si nous avons au moins un résultat
      if ( results.length > 0 ){ 
        console.log('Données récupéré');

        callbackResultFunction(results,donnees);

      } else {
          console.log('Données vides');
          callbackResultFunction(results, donnees);

      }
      //this.mySqlClient.end();
    });
  },

    //Exécuté une requête d'insertion
  executeInsertQuery : function( insertQuery ) {
    this.mySqlClient.query(
      insertQuery,
      function result(error, info) {

        

        if (error) {
          console.log(error);
          db.close();
          return error;
        }
        else console.log("Donnée inséré");
        return info.insertId;
      }
    );
  },

  //Exécuté une requête de mise à jour
  executeUpdateQuery : function(updateQuery){
     this.mySqlClient.query(
    updateQuery,
    function result(error){

      console.log("Donnée mise à jour");

      if(error){
        db.close();
        return error;
      }
      return;
    }
  );
  }
 
};