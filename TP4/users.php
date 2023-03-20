<?php
    require_once('config.php');
    $connectionString = "mysql:host=". _MYSQL_HOST;
    if(defined('_MYSQL_PORT'))
        $connectionString .= ";port=". _MYSQL_PORT;
    $connectionString .= ";dbname=" . _MYSQL_DBNAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
    try {
        $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $erreur) {
        myLog('Erreur : '.$erreur->getMessage());
    }
    $request = $pdo->prepare("select * from users");
    $request->execute();
    echo("<table>
    <tr>
      <th>ID</th>
      <th>Login</th>
      <th>Mail</th>
    </tr>");
    foreach($request as $user){
        echo("<tr>
        <td>{$user["ID"]}</td>
        <td>{$user["login"]}</td>
        <td>{$user["email"]}</td>
      </tr>");
    }
    // TODO: add your code here
    // retrieve data from database using fetch(PDO::FETCH_OBJ) and
    // display them in HTML array
    /*** close the database connection ***/
    $pdo = null;
