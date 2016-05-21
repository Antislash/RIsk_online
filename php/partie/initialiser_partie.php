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
                                 FROM user_has_room uhr
                                 INNER JOIN room r ON r.room_id = uhr.id_room
                                 WHERE statut_usr_room = 'in'
                                 AND statut_room = 'en partie'
                                 AND id_room =". $_SESSION['room_id']);

    //On enregistre les joueurs dans une liste ainsi que leur nombre
    $liste_user = array();
    $nb_joueur = 0;
    while($joueur = $liste_joueur->fetch()){
        array_push($liste_user, $joueur['id_user']);
        $nb_joueur++;
    }

    //On enregistre le nombre de joueur
    $_SESSION['nb_joueur'] = $nb_joueur;

    //On créé la partie en base
    $bdd->exec("INSERT INTO partie (a_qui_le_tour, date_crea, date_maj, map, nb_joueurs, partie_statut)
               VALUES (NULL, CURRENT_DATE,CURRENT_DATE,'0', ".$nb_joueur.", 'init')");

    //On récupére l'id de la partie créé
    $id_partie = $bdd->query("SELECT MAX(id_partie) as id 
                              FROM partie");

    $id_partie = $id_partie->fetch();

    //On enregistre l'id de la partie dans une session
    $_SESSION['id_partie'] = $id_partie['id'];

    $couleur = array("rouge","bleu", "vert", "jaune", "orange", "blanc");


    //On créé les joueur et on les lie à la partie
    for($i = 0; $i < $nb_joueur; $i++){
        $bdd->exec("INSERT INTO joueur (nb_continent, nb_pays, stats_id, usr_id)
                                        VALUES (0,0,1,".intval($liste_user[$i]).")");
        
        $bdd->exec("INSERT INTO partie_has_joueur (id_joueur, id_partie, code_clr, joueur_dans_partie, etat_joueur)
                                        VALUES (".intval($liste_user[$i])." , ".intval($id_partie['id']).",'".$couleur[$i]."',1, 'init')");

    }

    //On choisi un joueur au hasard qui commencera
    $joueur_commence = $liste_user[rand(0, $nb_joueur-1)];

    //On met a jour en base de données
    $bdd->exec("UPDATE partie SET a_qui_le_tour = ".$joueur_commence." WHERE id_partie = ". intval($id_partie['id']));

    //On récupére le nombre de pays
    $nb_pays = $bdd->query("SELECT COUNT(*) as nb FROM pays");
    $nb_pays = $nb_pays->fetch();

    if($nb_pays != false){

        $liste_pays = array();

        //On rentre les id des pays
        for($i = 0; $i < intval($nb_pays['nb']); $i++){
            array_push($liste_pays, $i+1);
        }

        //On attribu les pays aléatoirement aux joueurs
        for($i = intval($nb_pays['nb'])-1; $i >= 0; $i--){
            $alea = rand(0, $i);

            $bdd->query("INSERT INTO partie_has_joueur_has_pays (id_joueur, id_partie, id_pays, nb_pions)
                         VALUES (".$liste_user[$i%$nb_joueur].",".$id_partie['id'].",".$liste_pays[$alea].",1)");

            $arr1 = array_slice($liste_pays,0,$alea);
            $arr2 = array_slice($liste_pays,$alea+1);
            $liste_pays = array_merge($arr1,$arr2 );

        }
    }
    else{
        echo "Erreur nombre de pays";
    }

?>