<?php
    /**
     * Ce fichier sert à se connecter a la base de donnée
     */

try {
	//Pour se connecter en local au PUIO
    //$bdd = new PDO('mysql:host=tp-sgbd;dbname=vblum_a;charset=utf8', 'vblum_a', 'vblum_a');
    //Pour se connecter en local ailleurs
    $bdd = new PDO('mysql:host=localhost;dbname=risk;charset=utf8', 'root', '');

} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}
?>
