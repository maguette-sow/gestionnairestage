

<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idu=isset($_GET['idu'])?$_GET['idu']:0;
    $requete="select * from utilisateurs WHERE iduser=$idu";
    $resultat=$pdo->query($requete);
    $utilisateur=$resultat->fetch();
    $login=$utilisateur['logins'];
    $email=$utilisateur['email'];
?>

<!DOCTYPE html> 
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
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop">
                <div class="panel-heading">Edition de l'utilisateur :</div>
                <div class="panel-body">
                    <form method="post" action="updateUtilisateur.php" class="form">
						<div class="form-group">
                           <label for="iduser">id user: <?php echo $idu ?></label>
                            <input type="hidden" name="iduser" class="form-control" value="<?php echo $idu ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="logins">Login :</label>
                            <input type="text" name="logins" placeholder="Login" class="form-control" value="<?php echo $login ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="email">Email :</label>
                            <input type="email" name="email" placeholder="Email" class="form-control"
                                   value="<?php echo $email ?>"/>
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button>

                        <a href="editPwd.php">Changer le mot de passe</a>
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>