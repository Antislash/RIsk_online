<?php
    /**
     * Ce fichier sert à se connecter a la base de donnée
     */

try {
	//Pour se connecter en local au PUIO
    //$bdd = new PDO('mysql:host=tp-sgbd;dbname=vblum_a;charset=utf8', 'vblum_a', 'vblum_a');
    //Pour se connecter en local ailleurs
    //$bdd = new PDO('mysql:host=localhost;dbname=risk;charset=utf8', 'root', 'root');
    $bdd = new PDO('mysql:host=ivgz2rnl5rh7sphb.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=m9ivktqfxzjgpbe3;charset=utf8', 'dm0pel1q4vrf307y', 'ex0g988gs33tlltu');


} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}
?>
