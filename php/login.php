<?php
session_start();

include "connexion.php";

//Connexion par le formulaire de connexion
if (isset($_POST['connexionPseudo']) && isset($_POST['connexionPassword'])) {

    $pseudo = filter_var($_POST['connexionPseudo'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['connexionPassword'], FILTER_SANITIZE_STRING);

    //On vérifie en base de données
    $user = $bdd->query("SELECT * FROM user WHERE pseudo = " . $pseudo . " AND password = " . md5($password));

    //On vérifie que l'utilisateur est bien présent et qu'il n'est pas présent plusieurs fois
    if ($user != false && sizeof($user['pseudo']) == 1) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['pseudo'] = $user['pseudo'];
        $_SESSION['password'];

        //Redirection vers la page d'accueil
        header('Location: ../www/accueil.php');
    }

} //Connexion par le formulaire d'inscription
else if (isset($_POST['pseudo']) && isset($_POST['password'])) {
    $user = $bdd->query("SELECT * FROM user WHERE pseudo = " . $pseudo . " AND password = " . md5($password));

    if ($user != false && sizeof($user['pseudo']) == 1) {
        header('Location: ../www/accueil.php');
    }
}
header('Location: ../www/login.html');
?>