<?php
//On démarre les session
session_start();

//On inclut le fichier de connexion a la base de données
include("connexion.php");

//On vérifie que l'utilisateur à bien renseigné le login et le mdp
if (isset($_POST['connexionPseudo']) && isset($_POST['connexionPassword'])) {
    $pseudo = htmlspecialchars($_POST['connexionPseudo']);
    $mdp = htmlspecialchars($_POST['connexionPassword']);

    //On recherche l'utilisateur dans la base de données
    $result = $bdd->query("Select * FROM user WHERE pseudo = " . $pseudo . " AND password = " . $mdp);

    //On vérifie que l'utilisateur existe
    if(isset($result['pseudo']) && sizeof($result) == 1){
        $_SESSION['login'] = $pseudo;
        header('Location: ../www/acceuil.html');
    }

    header('Location: ../www/login.html');


}

?>