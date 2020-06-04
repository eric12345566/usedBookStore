<?php
  require __DIR__ . '/../vendor/autoload.php';
  session_start();
  $db = Database::get();
  $password = $_POST["pass"];
  $check = $_POST['checkpass'];
  echo $_SESSION["token"];
  if (!strcmp($password, $check)) {
      $result = $db->execute("UPDATE USERNAME SET password = ? WHERE email = (SELECT usermail FROM UserEP WHERE link_no = ?) ;", array($password, $_SESSION["token"]));
      if ($db->getRowCount()) {
          echo "更新成功";
      } else {
          echo $db->getErrorMessage();
          echo "請聯絡我們的助教";
      }
  } else {
      // TODO 返回到輸入密碼
      echo "shit";
  }
