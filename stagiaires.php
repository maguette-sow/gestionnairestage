<?php
    require_once('identifier.php');
    
    require_once("connexiondb.php");
  
    $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
    $idfiliere=isset($_GET['idfilieres'])?$_GET['idfilieres']:0;
    
    $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteFiliere="select * from filieres";

    if($idfiliere==0){
        $requeteStagiaire="select idstagiaires,nomstagiaires,prenom,nomfiliere,photho,civilite 
                from filieres as f,stagiaires as s
                where f.idfilieres=s.idfilieres
                and (nomstagiaires like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                order by idstagiaires
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from stagiaires
                where nomstagiaires like '%$nomPrenom%' or prenom like '%$nomPrenom%'";
    }else{
         $requeteStagiaire="select idstagiaires,nomstagiaires,prenom,nomfiliere,photho,civilite 
                from filieres as f,stagiaires as s
                where f.idfilieres=s.idfilieres
                and (nomstagiaires like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and f.idfilieres=$idfiliere
                 order by idstagiaires
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from stagiaires
                where (nomstagiaires like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and idfilieres=$idfiliere";
    }

    $resultatFiliere=$pdo->query($requeteFiliere);
    $resultatStagiaire=$pdo->query($requeteStagiaire);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrStagiaire=$tabCount['countS'];
    $reste=$nbrStagiaire % $size;   
    if($reste===0) 
        $nbrPage=$nbrStagiaire/$size;   
    else
        $nbrPage=floor($nbrStagiaire/$size)+1;  
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
        <?php require("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success margetop60">
            
				<div class="panel-heading">Rechercher des stagiaires</div>
				
				<div class="panel-body">
					<form method="get" action="stagiaires.php" class="form-inline">
						<div class="form-group">
						
                            <input type="text" name="nomPrenom" 
                                   placeholder="Nom et prénom"
                                   class="form-control"
                                   value="<?php echo $nomPrenom ?>"/>
                        </div>
                            <label for="idfilieres">Filière:</label>
                            
				            <select name="idfilieres" class="form-control" id="idfilieres"
                                    onchange="this.form.submit()">
                                    
                                    <option value=0>Toutes les filières</option>
                                    
                                <?php while ($filiere=$resultatFiliere->fetch()) { ?>
                                
                                    <option value="<?php echo $filiere['idfilieres'] ?>"
                                    
                                        <?php if($filiere['idfilieres']===$idfiliere) echo "selected" ?>>
                                        
                                        <?php echo $filiere['nomfiliere'] ?> 
                                        
                                    </option>
                                    
                                <?php } ?>
                                
				            </select>
				            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                         <?php if ($_SESSION['user']['roles']== 'ADMIN') {?>
                         
                            <a href="nouveauStagiaire.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                Nouveau Stagiaire
                                
                            </a>
                            
                         <?php }?>
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Stagiaires (<?php echo $nbrStagiaire ?> Stagiaires)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id Stagiaire</th> <th>Nom</th> <th>Prénom</th> 
                                <th>Filière</th> <th>Photo</th> 
                                <?php if ($_SESSION['user']['roles']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($stagiaire=$resultatStagiaire->fetch()){ ?>
                                <tr>
                                    <td><?php echo $stagiaire['idstagiaires'] ?> </td>
                                    <td><?php echo $stagiaire['nomstagiaires'] ?> </td>
                                    <td><?php echo $stagiaire['prenom'] ?> </td> 
                                    <td><?php echo $stagiaire['nomfiliere'] ?> </td>
                                    <td>
                                        <img src="../images/<?php echo $stagiaire['photho']?>"
                                        width="50px" height="50px" class="img-circle">
                                    </td> 
                                    
                                     <?php if ($_SESSION['user']['roles']== 'ADMIN') {?>
                                        <td>
                                            <a href="editerStagiaire.php?idS=<?php echo $stagiaire['idstagiaires'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le stagiaire')"
                                            href="supprimerStagiaire.php?idS=<?php echo $stagiaire['idstagiaires'] ?>">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    <?php }?>
                                    
                                 </tr>
                             <?php } ?>
                        </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="stagiaires.php?page=<?php echo $i;?>&nomPrenom=<?php echo $nomPrenom ?>&idfiliere=<?php echo $idfiliere ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </body>
</HTML>