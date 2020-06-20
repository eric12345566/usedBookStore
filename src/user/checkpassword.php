<?php
  require __DIR__ . '/../vendor/autoload.php';
  session_start();
  $db = Database::get();
  $password = $_POST["password"];
  $check = $_POST['checkpassword'];

  //echo $_SESSION["token"]; //TODO token 驗證
  if (!strcmp($password, $check)) {  //比較密碼與確認密碼有無被取用
      $new_password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 11]);
      $result = $db->execute("UPDATE GeneralUser SET password = ?
      WHERE email = (SELECT useremail FROM UserEP WHERE link_no = ?) ;", array($new_password, $_SESSION["token"])); //修改密碼
      if ($db->getRowCount()) { //如果
          $result = $db->execute("UPDATE UserEP SET used = ? WHERE link_no = ?;", array(1, $_SESSION["token"]));   //使token 失效
          if ($db->getRowCount()) {
              echo '<script type="text/javascript">alert("更新成功！請至首頁登入");</script>'; ?>
              <script type="text/javascript">window.location.href="login.php"</script>; //重新導向至首頁
              <?php
          } else {
              echo "請聯絡我們的助教"; //
          }
      } else {
          echo $db->getErrorMessage();   //修改失敗，要求重試或是聯絡客服、技術人員
          echo "請聯絡我們的助教";
          header("Refresh:2 ; url=login.php");
      }
  } else {
      echo '<script type="text/javascript">alert("還敢偷偷關Javascript？？？");</script>'; ?>

    <?php
  }
  ?>
