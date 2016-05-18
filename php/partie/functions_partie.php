<?php
	$paysVisited = array();
	foreach($allPays as $pays){
		$paysVisited[$pays['id_pays']] = false;
	}

	function canMove($id_partie, $id_joueur, $id_pays1, $id_pays2){
		$allPays = $bdd->query("SELECT * FROM partie_has_joueur_has_pays WHERE id_partie = ".$id_partie." AND id_joueur = ".$id_joueur."");
		return canMoveRecursive($id_partie, $id_joueur, $id_pays1, $id_pays2, $paysVisited);
	}
	
	function canMoveRecursive($id_partie, $id_joueur, $id_pays1, $id_pays2){
		if(isAllPaysVisited($paysVisited) == true){	//si on a parcouru tous les pays
			return false;
		}
		else if(true){	//TODO si on est sur le bon pays
			
		}
		else{
			//TODO marquer le pays comme visited
			return canMoveRecursive($id_partie, $id_joueur, /*pays voisin de $id_pays1*/, $id_pays2);
		}
	}
	
	function isAllPaysVisited(array $paysVisited){
		foreach($paysVisited as $pays){
			if($pays == false){
				return false;
			}
		}
		return true;
	}
?>
