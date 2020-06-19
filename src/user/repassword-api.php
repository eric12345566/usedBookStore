<?php
  require __DIR__ . '/../vendor/autoload.php';

  // 建立 Session
  session_start();

  // 獲取資料庫連線 DAO
  $db = Database::get();

  $password = $_POST['password'];
  $newpassword = $_POST['newpassword'];
  $newpasswordcheck = $_POST['newpasswordcheck'];
  
  $result = $db->execute("SELECT * FROM generaluser WHERE username = ?;", array($_SESSION['username']));
  if (password_verify($password, $result[0]["password"])) {
    if(preg_match('/^(?!.*[^\x21-\x7e])(?=.{4,50})(?=.*[\W])(?=.*[a-zA-Z])(?=.*\d).*$/', $newpassword)) {
      if(strcmp($newpassword,$newpasswordcheck) == 0 ){
        $hash_password = password_hash($newpassword, PASSWORD_DEFAULT,['cost' => 11]);
        $result = $db->execute("UPDATE generaluser SET password=? WHERE username = ?;", array($hash_password,$_SESSION['username']));
        if($db->getRowCount()) {
          echo "更新成功";  
        }
     } else {
        echo "密碼與確認密碼不一致";  
      }
    } else {
      echo "新密碼格式不符合規定";
    }
  } else {
    echo "與舊有密碼不一致，請重新確認";
  }
?>

