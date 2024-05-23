<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $nom=isset($_POST['nomstagiaires'])?$_POST['nomstagiaires']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
    $idFiliere=isset($_POST['idfilieres'])?$_POST['idfilieres']:1;

    $nomPhoto=isset($_FILES['photho']['name'])?$_FILES['photho']['name']:"";
    $imageTemp=$_FILES['photho']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    $requete="insert into stagiaires(nomstagiaires,prenom,civilite,idfilieres,photho) values(?,?,?,?,?)";
    $params=array($nom,$prenom,$civilite,$idFiliere,$nomPhoto);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:stagiaires.php');

