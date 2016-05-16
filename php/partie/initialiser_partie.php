<?php
    /**
     * Ce fichier permet d'initialiser une partie
     */

    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../site/connexion.php";

    //On récupére la liste des joueurs
    $liste_joueur = $bdd->query("SELECT *
                                 FROM user_has_room
                                 WHERE statut_usr_room = 'in'
                                 AND id_room =". $_SESSION['room_id']);

    //On enregistre les joueurs dans une liste ainsi que leur nombre
    $_SESSION['liste_user'] = array();
    $nb_joueur = 0;

    while($joueur = $liste_joueur->fetch()){
        array_push($_SESSION['liste_user'], $joueur['id_user']);
        $nb_joueur++;
    }


    //On créé la partie en base
    $bdd->exec("INSERT INTO partie (a_qui_le_tour, date_crea, date_maj, map, nb_joueurs, partie_statut)
               VALUES (NULL, CURDATE(),CURDATE(),'Monde', ".$nb_joueur.", 'init')");

    //On récupére l'id de la partie créé
    $id_partie = $bdd->query("SELECT MAX(id_partie) as id 
                              FROM partie");

    $id_partie = $id_partie->fetch();
    //On créé les joueur et on les lie à la partie
    for($i = 0; $i < $nb_joueur; $i++){
        $bdd->exec("INSERT INTO joueur (nb_continent, nb_pays, stats_id, usr_id)
                                        VALUES (0,0,1,".intval($_SESSION['liste_joueur'][$i]).")");

        $bdd->exec("INSERT INTO partie_has_joueur (id_joueur, id_partie)
                                        VALUES (".intval($_SESSION['liste_joueur'][$i])." , ".intval($id_partie['id']).")");
    var_dump("INSERT INTO partie_has_joueur (id_joueur, id_partie)
                                        VALUES (".intval($_SESSION['liste_joueur'][$i])." , ".intval($id_partie['id']).")");
    }

?>