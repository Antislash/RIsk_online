<?php
    //On vérifie si les session sont déja activées
    if(session_id() == null){
        session_start();
    }
?>
<!DOCTYPE html>
<!--Page permettant de demander les informations nécessaire pour la création d'une room-->
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style/style.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width" />
    <title>Room</title>
    <script href="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
<?php
    include('include/navigation.php');
    include('include/notif.php');
    include('../php/site/connexion.php');
?>
<div class="bloc" id="room"><form method="post" action="../php/site/new_game.php" >
        <table class="options">
            <tr>
                <td colspan="2">
                    <h2>Options parties</h2>
                </td>
            </tr>
            <tr>
                <td>
                    Nom de la partie:
                </td>
                <td>
                    <input class="textbox" type="text" name="nom_room" maxlength=20/>
                </td>
            </tr>
            <tr>
                <td>
                    Mot de passe (facultatif):
                </td>
                <td>
                    <input class="textbox" type="password" name="password" maxlength=20/>
                </td>
            </tr>
            <tr>
                <td>
                    Nombre de joueurs (2 - 6):
                </td>
                <td>
                    <input class="textbox" id="number" name="nb_joueur" type="number" value="4" min="2" max="6"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center><input class="button" type="submit" value="Créer"/></center>
                </td>
            </tr>
        </table>
    </form>
    <?php include('include/contact.php');?>
</body>
</html>