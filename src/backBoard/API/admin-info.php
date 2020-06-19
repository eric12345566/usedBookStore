<?php
  session_start();
  require __DIR__ . '/../../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }

  $adminName = $_GET['uid'];

  $db = Database::get();
  $result = $db->execute("SELECT ")
