<?php
  require __DIR__ . '/../vendor/autoload.php';
  session_start();
  $db = Database::get();
  $password = $_POST["pass"];
  $check = $_POST['checkpass'];
  echo $_SESSION["token"];
  if (!strcmp($password, $check)) {  //比較密碼與確認密碼有無被取用
      $result = $db->execute("UPDATE USERNAME SET password = ?
      WHERE email = (SELECT usermail FROM UserEP WHERE link_no = ?) ;", array($password, $_SESSION["token"]));

      $result = $db->execute("UPDATE UserEP SET orded = ? WHERE token = ?;", array(1, $_SESSION["token"]));

      if ($db->getRowCount()) { //如果
          
          echo "更新成功";
      } else {
          echo $db->getErrorMessage();
          echo "請聯絡我們的助教";
      }
  } else {
      // TODO 返回到輸入密碼
      echo "shit";
  }
