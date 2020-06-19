<?php
  session_start();
  header('Content-Type: application/json; charset=UTF-8');
  require __DIR__ . '/../../../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }

  $Class_name = $_GET['cid'];

  $db = Database::get();
  $result = $db->execute("SELECT * FROM tag WHERE Class_name = ?;", array($Class_name));

  if ($db->getRowCount() > 0) {
      $data_json = json_encode($result);
      echo $data_json;
  }
