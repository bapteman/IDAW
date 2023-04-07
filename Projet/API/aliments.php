<?php

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
  case 'GET':
    if(!empty($_GET["nom"]))
    {
      $nom = $_GET["nom"];
      getAliment($nom);
    }else if(!empty($_GET["id"])){
      getAliment(null,$_GET["id"]);
    }
    else{
      getAliment();
    }
    break;
  case 'POST':
    addAliment();
    break;

  default:
    // Requête invalide
    header("HTTP/1.0 405 Method Not Allowed");
    break;
}

function getAliment($nom = null,$id = null){
    require_once('dbconnect.php');
    if($nom == null && $id == null){
      $query = $pdo->prepare("SELECT id, nom FROM aliments");
    $query->execute();
    }else if($id==null){
      $query = $pdo->prepare("SELECT * FROM aliments WHERE nom = ?");
      $query->execute([$nom]);
    }else{
      $query = $pdo->prepare("SELECT nom FROM aliments WHERE id = ?");
      $query->execute([$id]);
    }
    $response=array();
    $response = $query->fetchAll();
    $res = array("data" => $response);
    header('Content-Type: application/json');
    echo json_encode($res);
}
function addAliment(){
    require_once('dbconnect.php');
    $nom =  $_POST['nom'];
    $type = $_POST['type'];
    $sql = "INSERT INTO aliments(nom,id_type)  VALUES ('$nom','$type')";
    $test=$pdo->prepare($sql)->execute();
    if ($test)
    {$response=array(
        'status' => 1,
        'status_message' =>'Aliment ajoute avec succes.'
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
?>