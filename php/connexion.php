<?php

try {
	//Pour se connecter en local au PUIO
    $bdd = new PDO('mysql:host=tp-sgbd;dbname=vblum_a;charset=utf8', 'vblum_a', 'vblum_a');
    //Pour se connecter en local ailleurs
<<<<<<< HEAD
    //$bdd = new PDO('mysql:host=localhost;dbname=risk;charset=utf8', 'root', '');
=======
    $bdd = new PDO('mysql:host=localhost;dbname=risk;charset=utf8', 'root', 'root');
>>>>>>> b42d00cad1d9dab172f654bc3c2c601b7e7784e6
    //Pour se connecter sur le serveur
    //TODO ...

} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}
?>
