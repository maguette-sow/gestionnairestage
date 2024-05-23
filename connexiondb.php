
 <?php
try{
    $pdo=new PDO("mysql:host=localhost;dbname=gestionstage","root","MAGUETTESOW1121999");
}
catch(Exception $e) {
    die('Erreur de connexion :'.$e->getMessage());
}

?>



