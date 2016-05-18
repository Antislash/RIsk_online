<?php
	function frontiereCommune(id_partie, id_joueur, id_pays1, id_pays2){
		$req = $bdd->query("SELECT * FROM partie_has_joueur_has_pays WHERE id_partie = ".id_partie." AND id_joueur = ".id_joueur."");
		$allPays = $req->fetch();
		if($allPays != false){
			foreach($allPays as $pays){
				
			}
		}
		else{
			return false;
		}
	}
?>
