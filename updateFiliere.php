


















<?php
require_once('connexiondb.php');

$idf= isset($_POST['idF'])?$_POST['idF']:0;
$nomf= isset($_POST['nomF'])?$_POST['nomF']:"";
$niveau= isset($_POST['niveau'])?strtoupper($_POST['niveau']):"";

$requete="update  filieres set nomfiliere=?,niveau=? where  idfilieres=?";

$params= array($nomf,$niveau,$idf);
$resultat= $pdo->prepare($requete);
$resultat ->execute($params);

header('location: filieres.php'); 
