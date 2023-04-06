<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<?php
if(isset($_POST['login'])){
    $login = $_POST['login'];
}else{
    echo("erreur");
}

if(isset($_POST['password'])){
    $password = $_POST['password'];
}else{
    echo("erreur");
}
    require_once('API/dbconnect.php');
    $query = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $query->execute([$login]);
    $response=array();
    $response = $query->fetchAll();
    $res = array("data" => $response);
    $mdp = $res['data'][0]['mdp'];
    if($password==$mdp){
        session_start();
        $_SESSION["user"] = $res['data'][0]['id_user'];
        $_SESSION["nom_user"] = $res['data'][0]['nom'];
        $_SESSION["prenom_user"] = $res['data'][0]['prenom'];
        $_SESSION["login"] = $res['data'][0]['login'];
        $_SESSION["niveau"] = $res['data'][0]['niveau'];
        require_once('accueil.php');
    }
?>