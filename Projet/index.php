<?php
    if (isset($_SESSION["user"])){
        require_once('accueil.php');
    }else{
        require_once('login.php');
    }
?>