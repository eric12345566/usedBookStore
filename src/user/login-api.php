<?php
  require __DIR__ . '/../vendor/autoload.php';

  // 建立 Session
  session_start();

  // 獲取資料庫連線 DAO
  $db = Database::get();

  // 取得POST登入資料
  $username = $_POST['username'];
  $password = $_POST['password'];

  // 查詢資料庫

  // TODO: 針對使用者POST的資料做安全性過濾，再傳入 SQL 裡 query

  //有安全疑慮的寫法 $result = $db->execute("SELECT * FROM user WHERE username = " . "'" . $username. "'" . " AND password = " . "'" . $password . "';");
  $result = $db->execute("SELECT * FROM USERNAME WHERE username = ? AND password = ?;", array($username, $password));
  if ($db->getRowCount()) {
      echo "歡迎登入，". $username;

      // username 註冊到 session 變數
      $_SESSION['username'] = $result[0]['username'];
  } else {
      echo "登入失敗";
  }
