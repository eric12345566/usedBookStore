<?php
  require __DIR__ . '/../vendor/autoload.php';

  // 建立 Session
  session_start();

  // 獲取資料庫連線 DAO
  $db = Database::get();

  $newname = $_POST['newname'];
  $newphonenumber = $_POST['newphonenumber'];
  $newbdate = $_POST['newbdate'];
  
  

  if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$newname)) {
      if(preg_match('/^09[0-9]{8}$/' , $newphonenumber)) {
        $result = $db->execute("UPDATE generaluser SET name=?,phonenumber=?,bdate=? WHERE username = ?;", array($newname,$newphonenumber,$newbdate,$_SESSION['username']));  
        if($db->getRowCount() == 1) {
        echo "基本資料修改完成";
        }
     } else {
       echo "電話不符合格式";
    }
  } else {
    echo "姓名不符合格式"; 
  }


