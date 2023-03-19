<?php session_start(); 
    session_unset();
    session_destroy();
    echo "deconnexion réussie";
    echo "<a href='index.php'>ok</a>"
?>