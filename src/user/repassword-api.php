<?php
  require __DIR__ . '/../vendor/autoload.php';

  // 建立 Session
  session_start();

  // 獲取資料庫連線 DAO
  $db = Database::get();

  if($_SESSION['username'] != ""){//如果session的username不是空的話(就是已經有登入了)
    echo $_SESSION['username']; 
  } 
?>