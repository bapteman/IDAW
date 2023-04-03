<?php

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
  case 'GET':
    if(!empty($_GET["login"]))
    {
      $login = $_GET["login"];
      getUsers($login);
    }
    break;
  case 'POST':
    addUsers();
    break;
    case 'PUT':
            updateUsers();
            break;

  default:
    // Requête invalide
    header("HTTP/1.0 405 Method Not Allowed");
    break;
}

function getUsers($login = null){
    require_once('dbconnect.php');
    $query = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $query->execute([$login]);
    $response=array();
    $response = $query->fetchAll();
    $res = array("data" => $response);
    header('Content-Type: application/json');
    echo json_encode($res, JSON_PRETTY_PRINT);
}
function addUsers(){
    require_once('dbconnect.php');
    $nom =  $_POST['nom'];
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $mdp = $_POST['mdp'];
    $sexe = $_POST['sexe'];
    $date = date($_POST['date']);
    $niveau = $_POST['niveau'];
      
     $sql = "INSERT INTO users(login,mdp,nom,prenom,sexe,niveau,dateDeNaissance)  VALUES ('$login',
         '$mdp','$nom','$prenom','$sexe','$niveau','$date')";
     $test=$pdo->prepare($sql)->execute();
     if ($test)
    {$response=array(
        'status' => 1,
        'status_message' =>'Utilisateur ajoute avec succes.'
      );}
 else
     {$response=array(
        'status' => 0,
        'status_message' =>'Erreur de la requête.'
      );
    }
     header('Content-Type: application/json');
     echo json_encode($response);
}
function deleteUsers($id = null){
    require_once('dbconnect.php');
    if($id === null) {
        $sql=" TRUNCATE TABLE `users`";
        $query=$pdo->prepare($sql);
    } else {
        $sql="DELETE FROM `users`
        WHERE id=$id";
        $query=$pdo->prepare($sql);
    }
    $test=$query->execute();
    $response=array();
    if($test){
        $response=array(
           'status' => 1,
           'status_message' =>'Utilisateur supprimé avec succes.'
         );}else{ $response=array(
           'status' => 0,
           'status_message' =>'erreur');
         }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}



function updateUsers(){
    require_once('dbconnect.php');
    $json=file_get_contents('php://input');
    $put= json_decode($json, TRUE);
    $id = $put['id'];
    $name = $put['name'];
    $email = $put['email'];
     $sql = "UPDATE users
     SET login = '$name',
       email = '$email'
     WHERE id =$id";
    
     $test = $pdo->prepare($sql)->execute();
     if($test){
     $response=array(
        'status' => 1,
        'status_message' =>'Utilisateur mis a jour  avec succes.'
      );}else{ $response=array(
        'status' => 0,
        'status_message' =>'erreur');
      }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

?>