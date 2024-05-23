

<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>vouvelle filière</title>
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
             <div class="panel-heading">veuillez saisir les nouvelles données de la filière</div>
             <div class="panel-body">
             <form action="insertFiliere.php" method="Post" class="form">
             

                  <div class="form-group">
                  <label for="niveau">Nom de la filière:</label>
                  <input type="text" name="nomF" placeholder="Taper le nom de la filière" class="form-control"  >
                  </div>

                  <div class="form-group">
                  <label for="niveau">Niveau:</label> 
                   <select name="niveau" class="form-control" id="niveau" >                 
                   <option value="L" >License</option>
                   <option value="M" >Master</option>
                   <option value="T" >Technicien</option>
                   <option value="TS" selected>Technicien Spécialisé</option>
                   <option value="Q" >Qualification</option>
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