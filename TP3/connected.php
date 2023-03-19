<?php session_start(); ?>
<head>
    <?php 
        if(isset($_COOKIE['style'])){
            echo "<link rel='stylesheet' href='{$_COOKIE["style"]}.css'>";
        }else{
            echo "<link rel='stylesheet' href='style1.css'>";
        }
    ?>
</head>

<?php if(isset($_COOKIE['style']))
    echo $_COOKIE['style'];
?>


<?php
    // on simule une base de données
    $users = array(
    // login => password
        'riri' => 'fifi',
        'yoda' => 'maitrejedi' );
    $login = "anonymous";
    $errorText = "";
    $successfullyLogged = false;
    if(isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin=$_POST['login'];
        $tryPwd=$_POST['password'];
        // si login existe et password correspond
        if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
            $successfullyLogged = true;
            $login = $tryLogin;
            $_SESSION['login'] = $login;
            $_SESSION['mdp'] = $tryPwd;
        } else
            $errorText = "Erreur de login/password";
    } else
        $errorText = "Merci d'utiliser le formulaire de login";
    if(!$successfullyLogged) {
        echo $errorText;
    } else {
        echo "<h1>Bienvenue ".$login."</h1>";
    }
?>

<?php if(isset($_SESSION['login']))
    echo $_SESSION['login'];
?>

<a href='page1.php'>page 1</a>
<a href='page2.php'>page 2</a>

<a href='disconnect.php'>disconnect</a>