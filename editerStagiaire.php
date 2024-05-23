<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idS=isset($_GET['idS'])?$_GET['idS']:0;
    $requeteS="select * from stagiaires where idstagiaires=$idS";
    $resultatS=$pdo->query($requeteS);
    $stagiaire=$resultatS->fetch();
    $nom=$stagiaire['nomstagiaires'];
    $prenom=$stagiaire['prenom'];
    $civilite=strtoupper($stagiaire['civilite']);
    $idFiliere=$stagiaire['idfilieres'];
    $nomPhoto=$stagiaire['photho'];

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
                       
             <div class="panel panel-primary margetop">
                <div class="panel-heading">Edition du stagiaire :</div>
                <div class="panel-body">
                    <form method="post" action="updateStagiaire.php" class="form"  enctype="multipart/form-data">
						<div class="form-group">
                             <label for="idstagiaires">id du stagiaire: <?php echo $idS ?></label>
                            <input type="hidden" name="idstagiaires" class="form-control" value="<?php echo $idS ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nomstagiaires">Nom :</label>
                            <input type="text" name="nomstagiaires" placeholder="Nom" class="form-control" value="<?php echo $nom ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control"
                                   value="<?php echo $prenom ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="civilite">Civilité :</label>
                            <div class="radio">
                                <label><input type="radio" name="civilite" value="F"
                                    <?php if($civilite==="F")echo "checked" ?> checked/> F </label><br>
                                <label><input type="radio" name="civilite" value="M"
                                    <?php if($civilite==="M")echo "checked" ?>/> M </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="idfilieres">Filière:</label>
				            <select name="idfilieres" class="form-control" id="idfilieres">
                              <?php while($filiere=$resultatF->fetch()) { ?>
                                <option value="<?php echo $filiere['idfilieres'] ?>"
                                         <?php if($idFiliere===$filiere['idfilieres']) echo "selected" ?>> 
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