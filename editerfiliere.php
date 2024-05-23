
<?php 
require_once('connexiondb.php');
$idf= isset($_GET['idF'])?$_GET['idF']:0;
$requete="select * from filieres where idfilieres=$idf ";
$resultat=$pdo->query($requete);
$filiere=$resultat->fetch();
$nomf=$filiere['nomfiliere'];
$niveau=strtolower($filiere['niveau']);
?>

<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>Edition d'une filière</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/monstyle.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
 <script src="jquery.js"></script>
  <script src="js/monjs.js"></script>

</head>
<body>
     <?php include("menu.php"); ?>

     <div class="container">
         
          <div class="panel panel-primary margetop">
             <div class="panel-heading">Edition de la filière:</div>
             <div class="panel-body">
             <form action="updateFiliere.php" method="Post" class="form">

             <div class="form-group">
                  <label for="niveau">id de la filière: <?php echo $idf ?> </label>
                  <input type="hidden" name="idF" class="form-control" 
                  value="<?php echo $idf ?>" >
                  </div>
                  <div class="form-group">
                  <label for="niveau">Nom de la filière:</label>
                  <input type="text" name="nomF" placeholder="Taper le nom de la filière" class="form-control" 
                  value="<?php echo $nomf ?>"  >
                  </div>

                  <div class="form-group">
                  <label for="niveau">Niveau:</label>       
                   <select name="niveau" class="form-control" id="niveau" >                 
                   <option value="L" <?php if($niveau=="L") echo "selected" ?>>icense</option>
                   <option value="M" <?php if($niveau=="m") echo "selected" ?>>Master</option>
                   <option value="T" <?php if($niveau=="T") echo "selected" ?>>Technicien</option>
                   <option value="TS" <?php if($niveau=="TS") echo "selected" ?>selected>Technicien Spécialisé</option>
                   <option value="Q" <?php if($niveau=="Q") echo "selected" ?>>Qualification</option>
                  </select>
                  </div>

                  <button type="submit" class="btn btn-success">
                     <span class="glyphicon glyphicon-save"></span>
                      Enregistrer
                     </button>
                     <!-- pour avoir d' espace on utilse `&nbsp &nbsp  -->
                     `
               </form>
             </div>
          </div>
     </div>
</body>
</html>