<?php
    session_start();
    require_once('connexiondb.php');
    
    $login=isset($_POST['logins'])?$_POST['logins']:"";
    
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

    $requete="select iduser,logins,email,roles,etat 
                from utilisateurs where logins='$login' 
                and pwd=MD5('$pwd')";
    
    $resultat=$pdo->query($requete);

    if($user=$resultat->fetch()){
       
        if($user['etat']==1){
            
            $_SESSION['user']=$user;
            header('location:index.php');
            
        }else{
            
            $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Votre compte est désactivé.<br> Veuillez contacter l'administrateur";
            header('location:login.php');
        }
    }else{
        $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
        header('location:login.php');
    }

