<?php
require_once('connexiondb.php');

require_once('fonctions.php');

if (isset($_POST['email']))
    $email = $_POST['email'];
else
    $email = "";

$user = rechercher_user_par_email($email);

if ($user != null) {
    $id = $user['iduser'];
    $requete = $pdo->prepare("update utilisateurs set pwd=MD5('0000') where iduser=$id");
    $requete->execute();

    $to = $user['email'];

    $objet = "Initialisation de  votre mot de passe";

    $content = "Votre nouveau mot de passe est 0000, veuillez le modifier à la prochaine ouverture de session";

    $entetes = "From: GesStag" . "\r\n" . "CC: maguettesow066@gmail.com";

    mail($to, $objet, $content, $entetes);

    $erreur = "non";

    $msg = "Un message contenant votre nouveau mot de passe a été envoyé sur votre adresse Email.";

} else {
    $erreur = "oui";

    $msg = "<strong>Erreur!</strong> L'Email est incorrecte!!!";

}


?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Page Blanche</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/monstyle.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
 <script src="jquery.js"></script>
  <script src="js/monjs.js"></script>

</head>
<body>
<div class="container col-md-6 col-md-offset-3">
    <br>
    <div class="panel panel-primary ">
        <div class="panel-heading">Initiliser votre mot de passe</div>
        <div class="panel-body">
            <form method="post" class="form">

                <div class="form-group">
                    <label class="control-label">
                        Veuillez saisir votre email de récuperation
                    </label>

                    <input type="email" name="email" class="form-control"/>
                </div>

                <button type="submit" class="btn btn-success">Initialiser le mot de passe</button>

            </form>
        </div>
    </div>


    <div class="text-center">

        <?php

        if ($erreur == "oui") {

            echo '<div class="alert alert-danger">' . $msg . '</div>';

            header("refresh:3;url=initialiserPwd.php");

            exit();
        } else if ($erreur == "non") {

            echo '<div class="alert alert-success">' . $msg . '</div>';

            header("refresh:3;url=login.php");

            exit();
        }

        ?>

    </div>


</div>
</body>
</html>


