<?php
session_start();

include "connexion.php";

if (isset($_COOKIE['pseudo']) && isset($_COOKIE['password']) && !isset($_SESSION['pseudo']) && !isset($_SESSION['password'])) {
    //On créé les session a partir des cookies

    $pseudo = $_COOKIE['pseudo'];
    $mdp = $_COOKIE['password'];

    //On vérifie que les données des cookies ne soient pas erronés
	$pseudo = 'Luc';
	$mdp = '893785018d20a58cf029e2e9fa6aacf8';
	echo "SELECT * FROM user WHERE usr_pseudo = '" . $pseudo . "' AND usr_password = '" . $mdp."'";
    $users = $bdd->query("SELECT * FROM user WHERE usr_pseudo = '" . $pseudo . "' AND usr_password = '" . $mdp."'");
    $user = $users->fetch();

    if ($user['usr_id'] == null) {
        header('Location: ../www/login.html');
    } else {
        $_SESSION['usr_id'] = $user['id'];
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['password'] = $mdp;
    }

}
else if (isset($_COOKIE['pseudo']) && isset($_COOKIE['password'])
    && isset($_SESSION['pseudo']) && isset($_SESSION['password'])
    && $_SESSION['pseudo'] != $_COOKIE['pseudo']){

    //On créé les cookie a partir des session pendant 1 journée
    setcookie('pseudo', $_SESSION['pseudo'], time() + 24 * 3600, null, null, false, true);
    setcookie('password', $_SESSION['password'], time() + 24 * 3600, null, null, false, true);
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
