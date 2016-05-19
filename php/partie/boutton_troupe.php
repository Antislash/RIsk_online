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


    if(isset($_GET['b'])){
        if($_GET['b'] == 1){
            $_SESSION['boutton_troupe'] = "+";
    }
        if($_GET['b'] == 2){
            $_SESSION['boutton_troupe'] = "-";
    }
    }

?>

<table>
    <tr>
        <td rowspan="2">
            <span id="unites-sup"><?php echo $renfort['nb_renforts']; ?></span>
        </td>
        <td onclick="bouttonPlus()" <?php if(isset($_SESSION['boutton_troupe']) && $_SESSION['boutton_troupe'] == "+") {  echo "class=\"td-selected\""; } ?> >
            <span id="unites-plus">+</span>
        </td>
    </tr>
    <tr>
        <td onclick="bouttonMoin()" <?php if(isset($_SESSION['boutton_troupe']) && $_SESSION['boutton_troupe'] == "-") {  echo "class=\"td-selected\""; } ?>>
            <span id="unites-moins">-</span>
        </td>
    </tr>
</table>