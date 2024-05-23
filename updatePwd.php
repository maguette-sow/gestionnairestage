<?php

require_once ('identifier.php');

require_once ('connexiondb.php');

$iduser=$_SESSION['user']['iduser'];

$oldpwd=isset($_POST['oldpwd'])?$_POST['oldpwd']:"";

$newpwd=isset($_POST['newpwd'])?$_POST['newpwd']:"";

$requete="select * from utilisateurs where iduser=$iduser and pwd=MD5('$oldpwd') ";

$resultat=$pdo->prepare($requete);

$resultat->execute();

$msg="";
$interval=3;
$url="login.php";

if($resultat->fetch()) {
    $requete = "update utilisateurs set pwd=MD5(?) where iduser=?";
    $params = array($newpwd, $iduser);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);

    $msg="<div class='alert alert-success' >
                <strong>Félicitation!</strong> Votre mot de passe est modifié avec succés
           </div>";

}else{
    $msg="<div class='alert alert-danger' >
            <strong>Erreur!</strong> L'ancien mot de passe est incorrect !!!!
           </div>";
    $url=$_SERVER['HTTP_REFERER'];
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
    <div class="container">
        <br><br>
        <?php
            echo  $msg;
            header("refresh:$interval;url=$url");
        ?>

    </div>
</body>
</html>

