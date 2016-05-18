<?php
    /**
     * Ce fichier permet aux joueurs de se connecter au site, appelé par le fichier "www/login.php"
     */

    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "connexion.php";

    //Connexion par le formulaire de connexion
    if (isset($_POST['connexionPseudo']) && isset($_POST['connexionPassword'])) {

        $pseudo = filter_var($_POST['connexionPseudo'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['connexionPassword'], FILTER_SANITIZE_STRING);

        //On vérifie en base de données
        $user = $bdd->query("SELECT * 
                             FROM user WHERE usr_pseudo = '" . $pseudo . "' 
                             AND usr_password = '" . md5($password)."'");
        $user = $user->fetch();

        if($user == false){
            header('Location: ../../www/login.php?mess=1');
            echo "Problème de connexion a la base de données 1";
        }

        //On vérifie que l'utilisateur est bien présent et qu'il n'est pas présent plusieurs fois
        if ($user['usr_pseudo'] != null) {

            //On créé les variables de session
            $_SESSION['usr_id'] = $user['usr_id'];
            $_SESSION['pseudo'] = $user['usr_pseudo'];
            $_SESSION['password'] = $user['usr_password'];

            //On met le statut du joueur en ligne
            $bdd->exec("UPDATE user SET code_sta = 'on' WHERE usr_pseudo = '".$pseudo."'");
            //Redirection vers la page d'accueil
            header('Location: ../../www/acceuil.php');
        }

    }

    //Connexion par le formulaire d'inscription
    else if (isset($_SESSION['pseudo']) && isset($_SESSION['password'])) {

        $select = "SELECT * FROM user WHERE usr_pseudo = '" . $_SESSION['pseudo'] . "' AND usr_password = '" . $_SESSION['password']."'";
        $user = $bdd->query($select);

        $user = $user->fetch();

        if($user == false){
            echo "Problème de connexion a la base de données";
        }

        if ($user['usr_pseudo'] != null) {
            //TODO Rediriger l'utilisateur sur la page d'accueil
            header('Location: ../../www/acceuil.php');
        }
        else{
            //TODO Rediriger l'utilisateur sur la page de login
            header('Location: ../../www/login.php');
        }
    }
    else{
        header('Location: ../../www/login.php');
    }
?>