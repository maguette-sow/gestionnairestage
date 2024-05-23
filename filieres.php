<?php
require_once("connexiondb.php");

/*if(isset( $_GET['nameF']))
$nomf = $_GET['nameF'];
else
  $nomf = "";
  */
/* offset c'est pour a partir de combien l'affichage commance
 limit size c'est pour nombre de partie à afficher
*/
  $nomf = isset($_GET['nomF']) ? $_GET['nomF'] : "";
  $niveau = isset($_GET['niveau']) ? $_GET['niveau'] : "all";

  $size = isset($_GET['size']) ? $_GET['size'] : 9; 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page-1)*$size;

  if ($niveau=="all") {
      $requete="select * from filieres
       where nomfiliere like '%$nomf%'
       limit $size 
       offset $offset";

       $requeteCount="select count(*) countF from filieres
       where nomfiliere like '%$nomf%' ";
  }else{ 
      $requete="select * from filieres
         where nomfiliere like '%$nomf%'
          and niveau='$niveau'
          limit $size
          offset $offset ";

  $requeteCount = "select count(*) countF from filieres
       where nomfiliere like '%$nomf%' 
       and niveau='$niveau'";
         }
  $resultatF=$pdo -> query($requete);
  $resultatCount=$pdo -> query($requeteCount);
$tabCount = $resultatCount->fetch();
$nbrfiliere = $tabCount['countF'];
$reste=$nbrfiliere%$size; //% operateur modulo: le reste de la division euclidienne de $nbrfiliere par $size

if ($reste === 0) //$nbrfiliere est un multiple de $size
  $nbrPage = $nbrfiliere / $size;
else
  $nbrPage = floor($nbrfiliere / $size) + 1; // floor: la partie entiere d'un nombre decimal

?>
<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>gestion des filieres</title>
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
          <div class="panel panel-success margetop">
             <div class="panel-heading">Rechercher des filieres...</div>
             <div class="panel-body">
               <form action="filieres.php" method="get" class="form-inline">
                  <div class="form-group">
                  <input type="text" name="nomF" placeholder="Taper le nom de la filière" class="form-control" value="<?php echo $nomf ?>">
                  </div>
                  <label for="niveau">Niveau:</label> 
                   <select name="niveau" class="form-control" id="niveau" onchange="this.form.submit()">
                   <option value="all" <?php if($niveau==="all")echo "selected" ?>>Tous les niveau</option>
                   <option value="L" <?php if($niveau==="L")echo "selected" ?>>License</option>
                   <option value="M" <?php if($niveau==="M")echo "selected" ?>>Master</option>
                   <option value="T" <?php if($niveau==="T")echo "selected" ?>>Technicien</option>
                   <option value="TS" <?php if($niveau==="TS")echo "selected" ?>>Technicien Spécialisé</option>
                   <option value="Q" <?php if($niveau==="Q")echo "selected" ?>>Qualification</option>
                  </select>
                  <button type="submit" class="btn btn-success">
                     <span class="glyphicon glyphicon-search"></span>
                      Rechercher...
                     </button>
                     <!-- pour avoir d' espace on utilse `&nbsp &nbsp  -->
                     `&nbsp &nbsp    
                     <a href="nouvellefiliere.php">
                     <span class="glyphicon glyphicon-plus"></span>Nouvelle filière</a>
               </form>
             </div>
          </div>
          <div class="panel panel-primary margetop">
             <div class="panel-heading">Liste des filieres (<?php echo $nbrfiliere?> filieres )</div>
             <div class="panel-body">
               <table class="table table-striped table-bordered">
                  <thead>
                   <tr>
                     <th>id filieres</th><th>nom filiere</th><th>niveau</th><th>Action</th>
                   </tr>
                  </thead>
                  <tbody>
                   
                   <?php while($filieres=$resultatF->fetch()){ ?>
                     <tr>
                        <td><?php echo $filieres['idfilieres'] ?></td>
                        <td><?php echo $filieres['nomfiliere'] ?></td>
                        <td><?php echo $filieres['niveau']     ?></td>
                        <td>
                         <a href="editerfiliere.php?idF=<?php echo $filieres['idfilieres'] ?>">
                           <span class="glyphicon glyphicon-edit"></span>
                         </a>
                         &nbsp;
                         <a onclick="return confirm('Êtes vous sûr de vouloir supprimer la filière')"
                          href="supprimerfiliere.php?idF=<?php echo $filieres['idfilieres'] ?>">
                         <span class="glyphicon glyphicon-trash"></span>
                         </a>
                        </td>
                     </tr>
                   <?php
                    } 
                   ?>
                  </tbody>
               </table>
               <div>
                  <ul class="pagination">
                   <?php  for($i=1;$i<=$nbrPage;$i++)  { ?>
                     <li class="<?php if($i==$page) echo'active'?>"> <a href="filieres.php?page=<?php echo $i; ?> ">
                             <?php echo $i; ?> 
                          </a> 
                    </li>
                   <?php }  ?>                                   
                   </ul>
               </div>
             </div>
          </div>
     </div>
 </body>
</html>