<?php
    /**
     * Permet d'afficher dynamiquement la liste de room qu'un utilisateur peut rejoindre
     * Fichier appelé via la méthode Ajax "requestRoom()" contenu dans le fichier "js/site/liste_room.js"
     */

    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "connexion.php";
    //Requête pour récupérer la liste de room
    $list_room = $bdd->query("SELECT * 
                              FROM room 
                              WHERE statut_room = 'en cours'");
?>
<table>
    <!--On affiche les room	-->
    <?php while($room = $list_room->fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
            <td class="room-date">
                <a href="../php/site/join_game.php?room_id=<?php echo $room['room_id']; ?>"><?php echo $room['room_date_creation']; ?></a>
            </td>

            <td class="room-name">
                <?php echo $room['room_name']; ?>
            </td>
            <td class="room-nb">
                <?php
                //On récupére le nombre de joueur pour cette room
                $nb_joueur = $bdd->query("SELECT COUNT(*) AS nbJoueur 
														  FROM user_has_room 
														  WHERE statut_usr_room = 'in'
														  AND id_room = ". $room['room_id']);
                $nb_joueur = $nb_joueur->fetch();

                //On affiche le nombre de joueur / nombre de joueur max
                echo  $nb_joueur['nbJoueur']."/". $room['room_nb_joueur']; ?>
            </td>
        </tr>
    <?php } ?>
</table>