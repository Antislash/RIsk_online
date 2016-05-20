<?php
	include "../site/connexion.php";
	include "../site/verif_connexion.php";
	include "functions_partie.php";
	
	if(isset($_POST['renfort']) && strlen($_POST['renfort']) > 0){
		$renforts = explode(",", $_POST['renfort']);
		$i = 0;
		$tabRenfort = array();
		foreach($renforts as $renfort)
		{
			if($renfort != ''){
				$tabRenfort[$i] = $renfort;
			}
			$i++;
		}
		var_dump($tabRenfort);
		initialiseRenfortTour($bdd, $_SESSION['id_partie'], $_SESSION['usr_id']);
		addArrayRenfort($bdd, $_SESSION['id_partie'], $_SESSION['usr_id'], $tabRenfort);
	}
?>