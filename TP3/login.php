<?php 
    if(isset($_GET['css'])){
        $Style = $_GET['css'];
        setcookie('style',$Style,time()+3600);
    }else{
        echo("erreur");
    }
?>

<form id="login_form" action="connected.php" method="POST">
    <table>
        <tr>
            <th>Login :</th>
            <td><input type="text" name="login"></td>
        </tr>
        <tr>
            <th>Mot de passe :</th>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="Se connecter..." /></td>
        </tr>
    </table>
</form>


<?php 
    if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
    }else{
        echo"session fermée";
    }
?>


