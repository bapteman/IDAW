<?php

$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
  case 'GET':
    if (!empty($_GET["id_user"])) {
      $id = intval($_GET["id_user"]);
      getConsomme($id);
    } else {
      // Récupérer tous les produits
      getConsomme();
    }
    break;
  case 'POST':

    addConsomme();

    break;
  case 'DELETE':
    if (!empty($_GET["id"])) {
      $id = intval($_GET["id"]);
      deleteConsomme($id);
    } else {
      // Récupérer tous les produits
      deleteConsomme();
    }
    break;
  case 'PUT':
    updateConsomme();
    break;

  default:
    // Requête invalide
    header("HTTP/1.0 405 Method Not Allowed");
    break;
}

function getConsomme($id = null)
{
  require_once('dbconnect.php');
  if ($id === null) {
    $query = $pdo->prepare("SELECT c.id_alim, c.quantité, c.date_consommation, a.nom 
    FROM consomme c 
    JOIN aliments a ON c.id_alim = a.id");
  } else {
    $query = $pdo->prepare("SELECT c.id_alim, c.quantité, c.date_consommation, a.nom 
    FROM consomme c 
    JOIN aliment a ON c.id_alim = a.id
    WHERE c.id_user = ?");
  }
  $query->execute();
  $response = array();
  $response = $query->fetchAll();
  $res = array("data" => $response);
  header('Content-Type: application/json');
  echo json_encode($res, JSON_PRETTY_PRINT);
}
function addConsomme()
{
  require_once('dbconnect.php');
  $id_alim = $_POST['id_alim'];
  $id_user = $_POST['id_user'];
  $quantité = $_POST['quantité'];
  $date_consommation = $_POST['date_consommation'];

  $sql = "INSERT INTO consomme(id_alim,id_user,quantité,date_consommation)  VALUES ('$id_alim','$id_user','$quantité','$date_consommation')";
  $result = $pdo->prepare($sql)->execute();
  if ($result) {
    $response = array(
      'status' => "HTTP 201",
      'status_message' => 'Utilisateur ajoute avec succes.'
    );
  } else {
    $response = array(
      'status' => 0,
      'status_message' => 'Erreur de la requête.'
    );
  }
  header('Content-Type: application/json');
  echo json_encode($response);
}
function deleteConsomme($id = null)
{
  require_once('dbconnect.php');
  if ($id === null) {
    $sql = " TRUNCATE TABLE `consomme`";
    $query = $pdo->prepare($sql);
  } else {
    $sql = "DELETE FROM `consomme`
        WHERE id=$id";
    $query = $pdo->prepare($sql);
  }
  $query->execute();
  $result = $query->execute();
  $response = array();
  if ($result) {
    $response = array(
      'status' => 1,
      'status_message' => 'Utilisateur ajoute avec succes.'
    );
  } else {
    $response = array(
      'status' => 0,
      'status_message' => 'Erreur de la requête.'
    );
  }

  $response = array(
    'status' => 1,
    'status_message' => 'Utilisateur supprimmer avec succes.'
  );
  header('Content-Type: application/json');
  echo json_encode($response, JSON_PRETTY_PRINT);
}

function updateConsomme()
{
  require_once('dbconnect.php');
  $json = file_get_contents('php://input');
  $put = json_decode($json, TRUE);
  $id = $put['id'];
  $quantité = $put['quantité'];
  $date_consommation = $put['date_consommation'];
  $sql = "UPDATE consomme
  SET quantité = '$quantité',
    date_consommation = '$date_consommation'
  WHERE id =$id";

  $test = $pdo->prepare($sql)->execute();
  if ($test) {
    $response = array(
      'status' => 1,
      'status_message' => 'Utilisateur mis à jour  avec succes.'
    );
  } else {
    $response = array(
      'status' => 0,
      'status_message' => 'erreur'
    );
  }
  header('Content-Type: application/json');
  echo json_encode($response, JSON_PRETTY_PRINT);
}

?>