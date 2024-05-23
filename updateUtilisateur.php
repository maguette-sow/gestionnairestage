<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $iduser=isset($_POST['iduser'])?$_POST['iduser']:0;

    $login=isset($_POST['logins'])?$_POST['logins']:"";

    $email=isset($_POST['email'])?strtoupper($_POST['email']):"";
    
    $requete="update utilisateurs set logins=?,email=? where iduser=?";

    $params=array($login,$email,$iduser);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:login.php');