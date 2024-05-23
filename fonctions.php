<?php

function rechercher_par_login($login){
    global $pdo;
    $requete=$pdo->prepare("select * from utilisateurs where logins =?");
    $requete->execute(array($login));
    return $requete->rowCount();
}

function rechercher_par_email($email){
    global $pdo;
    $requete=$pdo->prepare("select * from utilisateurs where email =?");
    $requete->execute(array($email));
    return $requete->rowCount();
}

function rechercher_user_par_email($email){
    global $pdo;

    $requete=$pdo->prepare("select * from utilisateurs where email =?");

    $requete->execute(array($email));

    $user=$requete->fetch();

    if($user)
        return $user;
    else
        return null;
}