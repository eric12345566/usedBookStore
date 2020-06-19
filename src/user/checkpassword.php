<?php
  require __DIR__ . '/../vendor/autoload.php';
  session_start();
  $db = Database::get();
  $password = $_POST["pass"];
  $check = $_POST['checkpass'];
  echo $_SESSION["token"]; //TODO token 驗證
  if (!strcmp($password, $check)) {  //比較密碼與確認密碼有無被取用
      $result = $db->execute("UPDATE USERNAME SET password = ?
      WHERE email = (SELECT usermail FROM UserEP WHERE link_no = ?) ;", array($password, $_SESSION["token"])); //修改密碼
      if ($db->getRowCount()) { //如果
          $result = $db->execute("UPDATE UserEP SET orded = ? WHERE token = ?;", array(1, $_SESSION["token"]));   //使token 失效
          echo "更新成功"; //之後導入登入頁面
      } else {
          echo $db->getErrorMessage();   //修改失敗，要求重試或是聯絡客服、技術人員
          echo "請聯絡我們的助教";
      }
  } else {

      // TODO 返回到輸入修改頁面
  }
