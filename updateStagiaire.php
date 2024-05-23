<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idS=isset($_POST['idS'])?$_POST['idS']:0;
    $nom=isset($_POST['nomstagiaires'])?$_POST['nomstagiaires']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
    $idFiliere=isset($_POST['idfilieres'])?$_POST['idfilieres']:1;

    $nomPhoto=isset($_FILES['photho']['name'])?$_FILES['photho']['name']:"";
    $imageTemp=$_FILES['photho']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    echo $nomPhoto ."<br>";
    echo $imageTemp;
    if(!empty($nomPhoto)){
        $requete="update stagiaires set nomstagiaires=?,prenom=?,civilite=?,idfilieres=?,photho=? where idstagiaires=?";
        $params=array($nom,$prenom,$civilite,$idFiliere,$nomPhoto,$idS);
    }else{
        $requete="update stagiaires set nomstagiaires=?,prenom=?,civilite=?,idfilieres=? where idstagiaires=?";
        $params=array($nom,$prenom,$civilite,$idFiliere,$idS);
    }

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:stagiaires.php');

