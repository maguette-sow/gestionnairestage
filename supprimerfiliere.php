<?php
require_once('connexiondb.php');

$idf= isset($_GET['idF'])?$_GET['idF']:0;

$requeteStage="select count(*) countStage from stagiaires where idfilieres=$idf";
$resultatStage=$pdo->query($requeteStage);
$tabCountStage=$resultatStage->fetch();
$nbrStage=$tabCountStage['countStage'];

if ($nbrStage==0) {
    $requete="delete from filieres  where  idfilieres=?";
    $params= array($idf);
    $resultat= $pdo->prepare($requete);
    $resultat ->execute($params);
    header('location: filieres.php');
}else {
    $msg="Suppression impossible: Vous devez supprimer tous les stagiaires inscris dans cette filière";
    header("location: alerte.php?message=$msg");

}




