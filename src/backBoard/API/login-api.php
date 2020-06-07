<?php
  require __DIR__ . '/../../vendor/autoload.php';
  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];

  $db = Database::get();
  $result = $db->execute("SELECT * from Admin Where Admin_name = ?", array($username));
  if ($db->getRowCount() && password_verify($password, $result[0]['password'])) {
      $_SESSION['adminName'] = $username;
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/index.php");
  } else {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/error/login-error.php");
  }
