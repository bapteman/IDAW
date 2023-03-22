<?php

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
  case 'GET':
    if(!empty($_GET["id"]))
    {
      $id = intval($_GET["id"]);
      getUsers($id);
    }
    else
    {
      // Récupérer tous les produits
      getUsers();
    }
    break;
  case 'POST':
    if(!empty($_GET['id']))
    {
        $id = intval($_GET["id"]);
        updateUsers($id);
    }
    else
    {
    addUsers();
    }
    break;
    case 'DELETE':
        if(!empty($_GET["id"]))
        {
          $id = intval($_GET["id"]);
          deleteUsers($id);
        }
        else
        {
          // Récupérer tous les produits
          deleteUsers();
        }
        break;
        case 'PUT':
            updateUsers();
            break;

  default:
    // Requête invalide
    header("HTTP/1.0 405 Method Not Allowed");
    break;
}

function getUsers($id = null){
    require_once('dbconnect.php');
    if($id === null) {
        $query = $pdo->prepare("select * from users");
    } else {
        $query = $pdo->prepare("select * from users where id = $id");
    }
    $query->execute();
    $response=array();
    $response = $query->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}
function addUsers(){
    require_once('dbconnect.php');
    $name =  $_POST['name'];
    $email = $_POST['email'];
      
     $sql = "INSERT INTO users(login,email)  VALUES ('$name',
         '$email')";
     $pdo->prepare($sql)->execute();
     if ($pdo->prepare($sql)->rowCount() > 0)
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
    $query->execute();
    $response=array();

    $response=array(
        'status' => 1,
        'status_message' =>'Utilisateur supprimmer avec succes.'
      );
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function updateUsers($id){
    require_once('dbconnect.php');
    $name =  $_POST['name'];
    $email = $_POST['email'];
     $sql = "UPDATE users
     SET name = '$name',
       email = '$email'
     WHERE id =$id";
    
     $pdo->prepare($sql)->execute();
     $response=array(
        'status' => 1,
        'status_message' =>'Utilisateur mis à jour  avec succes.'
      );
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);



}

?>