<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<?php
require_once('config.php');
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
    $url = API_URL_BASE . "/users.php?login=" . $login;
    $data = file_get_contents($url);
    $res = json_decode($data, true);
    $mdp = $res["data"][0]["mdp"];
    if($password==$mdp){
        session_start();
        $_SESSION["user"] = $res['data'][0]['id_user'];
        $_SESSION["nom_user"] = $res['data'][0]['nom'];
        $_SESSION["prenom_user"] = $res['data'][0]['prenom'];
        $_SESSION["login"] = $res['data'][0]['login'];
        $_SESSION["niveau"] = $res['data'][0]['niveau'];
        $_SESSION["date_naissance"] = $res['data'][0]['dateDeNaissance'];
        require_once('accueil.php');
    } 
?>