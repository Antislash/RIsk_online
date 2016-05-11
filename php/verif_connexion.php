<?php
session_start();

include "connexion.php";

if (isset($_COOKIE['pseudo']) && isset($_COOKIE['password']) && !isset($_SESSION['pseudo']) && !isset($_SESSION['password'])) {
    //On créé les session a partir des cookies

    $pseudo = $_COOKIE['pseudo'];
    $mdp = $_COOKIE['password'];

    //On vérifie que les données des cookies ne soient pas erronés
    $user = $bdd->query("SELECT * FROM user WHERE pseudo = '" . $pseudo . "' AND password = '" . $mdp."'");
    $user = $user->fecth();

    if ($user['usr_id'] == null) {
        header('Location: ../www/login.html');
    } else {
        $_SESSION['id_user'] = $user['id'];
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['password'] = $mdp;
    }

}

//On vérifie si les session sont renseignés mais pas les cookies
else if (!isset($_COOKIE['pseudo']) && !isset($_COOKIE['password']) && isset($_SESSION['pseudo']) && isset($_SESSION['password'])) {
    //On créé les cookie a partir des session pendant 1 journée
    setcookie('pseudo', $_SESSION['pseudo'], time() + 24 * 3600, null, null, false, true);
    setcookie('password', $_SESSION['password'], time() + 24 * 3600, null, null, false, true);
}

//Si n'y les sessions, n'y les cookies ne sont renseignés nous considérons cela comme une fraude
else if (!isset($_COOKIE['pseudo']) && !isset($_COOKIE['password']) && !isset($_SESSION['pseudo']) && !isset($_SESSION['password'])) {
    header('Location: ../www/login.html');
}

//Dans le cas où les cookies et les session sont renseignés, nous ne faisons rien
?>
