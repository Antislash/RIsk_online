<?php 
	include "connexion.php";
	include "verif_connexion.php";
	$nb_amis = $bdd->query('SELECT COUNT(1) as nb 
							FROM user usr 
							INNER JOIN user1_has_user2 frd ON frd.id_usr2 = usr.usr_id 
							WHERE (usr.code_sta = \'gam\' OR usr.code_sta = \'on\') 
							AND frd.id_usr1 = '.$_SESSION['usr_id'].' 
							GROUP BY frd.id_usr1');
	$nb_ami = $nb_amis->fetch();
	if($nb_ami == false){
		$nb_ami['nb'] = 0;
	}
	echo "Contacts (".$nb_ami['nb'].")";
?>