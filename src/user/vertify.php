<?php
  require __DIR__ . '/../vendor/autoload.php';

  // 獲取資料庫連線 DAO
  $db = Database::get();
  $token = $_GET["token"];
  $result = $db->execute("SELECT * FROM UserEP WHERE link_no = ?;", array($token));
  if ($db->getRowCount()) {
      echo "驗證成功";
      header("Location:set_password.php");
  } else {
      echo "驗證失敗";
  }
