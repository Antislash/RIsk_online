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
			if($renfort != '-1'){
				$tabRenfort[$i] = $renfort;
			}
			$i++;
		}
		addArrayRenfort($tabRenfort);
	}
?>