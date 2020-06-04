<?php
  require __DIR__ . '/../../vendor/autoload.php';
  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];
  $password = $_POST["hello"];

  $db = Database::get();
  $result = $db->execute("SELECT * from Admin Where Admin_name = ? AND password = ?", array($username, $password));

  if ($db->getRowCount()) {
      header("Location: ");
  }
