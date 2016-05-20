<?php
    /**
     * Permet d'afficher dynamiquement la liste de joueurs dans une room
     * Fichier appelé via une methode Ajax dans "js/site/liste_room.js"
     */

    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }
    include "connexion.php";

    header("Content-Type: text/plain");

?>
<tr>
								<?php
									//Requête pour récupérer les informations des profils des joueurs d'une room
									$joueurs = $bdd->query("SELECT id_img, usr_pseudo, usr_level
															FROM `user` u
															INNER JOIN user_has_room uhr ON uhr.id_user = u.usr_id
															WHERE statut_usr_room = 'in'
															AND uhr.id_room=". $_SESSION['room_id']);


									$saut_ligne = 0;
									while($joueur = $joueurs->fetch(PDO::FETCH_ASSOC)){
                                        //On récupére le chemin de l'image à partir de l'id
                                        $img = $bdd->query("SELECT img_nom FROM image WHERE img_id = ".$joueur['id_img']);
                                        $img = $img->fetch();

                                        if($saut_ligne == 0 || $saut_ligne == 3) {
                                            ?> <tr> <?php
                                        }
                                        ?>
                                        <td class="player-desc">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo "images/".$img['img_nom'];?>"/>
                                                    </td>
                                                    <td>
                                                        <span class="txt-desc"><?php echo $joueur['usr_pseudo']; ?></br>Niveau <?php echo $joueur['usr_level']; ?></span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>

                                        <?php
                                        if($saut_ligne == 2 || $saut_ligne ==5) {
                                            ?> </tr> <?php
                                        }
                                        $saut_ligne += 1;
                                    }
                                    $joueurs->closeCursor();
								?>
</tr>


