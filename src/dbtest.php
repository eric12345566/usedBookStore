<?php
  require 'vendor/autoload.php';

  $db = Database::get();
  // $dbc = $db->getDB();
  // // $stmt = $dbc->prepare("INSERT INTO user (name, sex) VALUES (?,?)");
  // $stmt = $dbc->prepare("SELECT * FROM user");
  // $stmt->execute();
  // $result = $stmt->fetchAll();
  // echo $stmt->rowCount()."<br />";
  // echo count($result);

  // $result =  $db->execute("INSERT INTO user (name, sex) VALUES (?,?)", array("hello", "W"));
  $result =  $db->execute("SELECT * FROM user");
  echo $db->getLastId() . "<br />" . $db->getRowCount() . "<br />";
  echo $Server::serverUrl;
