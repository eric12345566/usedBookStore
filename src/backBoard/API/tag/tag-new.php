<?php
  session_start();
  require __DIR__ . '/../../../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }


  $Class_name = $_POST['Class_name'];
  $isError = false;

  $db = Database::get();
  if ($isError) {
      header("Location: ../../tag.php?errormsg=" . $error_msg);
  } else {
      $hashPwd = password_hash($password, PASSWORD_DEFAULT);
      $result =  $db->execute("INSERT INTO tag (Class_name) VALUES (?);", array($Class_name));
      if ($db->getRowCount() > 0) {
          header("Location: ../../tag.php");
      }else{
          echo "出事了啊杯";
      }
  }
