<?php 
session_start(); 
if(isset($_SESSION['login']))
    echo "<h1>Page 2</h1>";
    echo $_SESSION['login'];
?>

<a href='disconnect.php'>disconnect</a>