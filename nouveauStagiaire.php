<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
   
    $requeteF="select * from filieres";
    $resultatF=$pdo->query($requeteF);

?>
<! DOCTYPE HTML>
<HTML>
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
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Les infos du nouveau stagiaire :</div>
                <div class="panel-body">
                    <form method="post" action="insertStagiaire.php" class="form"  enctype="multipart/form-data">
						
                        <div class="form-group">
                             <label for="nomstagiaires">Nom :</label>
                            <input type="text" name="nomstagiaires" placeholder="Nom" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="civilite">Civilité :</label>
                            <div class="radio">
                                <label><input type="radio" name="civilite" value="F" checked/> F </label><br>
                                <label><input type="radio" name="civilite" value="M"/> M </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="idfilieres">Filière:</label>
				            <select name="idfilieres" class="form-control" id="idfilieres">
                              <?php while($filiere=$resultatF->fetch()) { ?>
                                <option value="<?php echo $filiere['idfilieres'] ?>"> 
                                    <?php echo $filiere['nomfiliere'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                        <div class="form-group">
                             <label for="photho">Photo :</label>
                            <input type="file" name="photho" />
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>