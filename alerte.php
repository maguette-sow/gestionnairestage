<?php
$message=isset($_GET['message'])?($_GET['message']):"Erreur";
?>

<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>Alerte</title>
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
          <div class="panel panel-danger margetop">
             <div class="panel-heading"><h4>Erreur:</h4> </div>
             <div class="panel-body">
                <h3><?php echo $message ?></h3>
                <h4><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Retour >>></a></h4>
          </div>
          
     </div>
</body>
</html>