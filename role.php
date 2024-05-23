<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit();
} else {
    if ($_SESSION['user']['roles'] != 'ADMIN') {
        header('location:seDeconnecter.php');
        exit();
    }
}

