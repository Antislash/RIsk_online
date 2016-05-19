<?php
    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }

    include "../site/connexion.php";

    $renfort = $bdd->query("SELECT nb_renforts
                            FROM partie_has_joueur
                            WHERE id_joueur =".$_SESSION['usr_id']."
                            AND id_partie = ".$_SESSION['id_partie']);

    $renfort = $renfort->fetch();
?>

<table>
    <tr>
        <td rowspan="2">
            <span id="unites-sup"><?php echo $renfort['nb_renforts']; ?></span>
        </td>
        <td onclick="bouttonPlus()" class="td-selected" >
            <span id="unites-plus">+</span>
        </td>
    </tr>
    <tr>
        <td onclick="bouttonMoin()">
            <span id="unites-moins">-</span>
        </td>
    </tr>
</table>