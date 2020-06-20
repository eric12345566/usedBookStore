<?php
  session_start();
  header('Content-Type: application/json; charset=UTF-8');
  require __DIR__ . '/../../../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }

  $username = $_GET['uid'];

  $db = Database::get();
  $result = $db->execute("SELECT * FROM GeneralUser WHERE username = ?;", array($username));
  if ($db->getRowCount()) {
      $data_json = json_encode($result);
      echo $data_json;
  }
