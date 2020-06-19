<?php
  session_start();
  require __DIR__ . '/../../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }


  $adminName = $_POST['adminName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashPwd;
  $isError = false;
  $error_msg = "000"; // 1: adminName error, 2: email error, 3: password error

  if (!preg_match('/^(?!.*[^\x21-\x7e])(?=.{4,10})(?=.*[\W])(?=.*[a-zA-Z])(?=.*\d).*$/', $password)) {
      $error_msg[2] = '1';
      $isError = true;
  }

  if (!preg_match('/^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$/', $email)) {
      $error_msg[1] = '1';
      $isError = true;
  }

  $db = Database::get();
  if ($isError) {
      header("Location: ../admin.php?errormsg=" . $error_msg);
  } else {
      $hashPwd = password_hash($password, PASSWORD_DEFAULT);
      $result =  $db->execute("INSERT INTO Admin (Admin_name, password, Email) VALUES (?, ?, ?);", array($adminName, $hashPwd, $email));
      if ($db->getRowCount()) {
          header("Location: ../admin.php");
      }
  }
