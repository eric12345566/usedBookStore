<?php
  require __DIR__ . '/../vendor/autoload.php';
  session_start();
  // 獲取資料庫連線 DAO
  $db = Database::get();
  $token = $_GET["token"];
  $result = $db->execute("SELECT * FROM UserEP WHERE link_no = ?;", array($token));
  if ($db->getRowCount()) {
      if (!$result[0]["used"]) {
          $_SESSION['token']= $token;
          echo "驗證成功<br>";
          echo "請重設密碼";
      } else {
          echo "驗證失敗";
          header("Location:forget.php"); //跳homepage
      }
  } else {
      echo "驗證失敗";
  }
?>
<html>
  <head>
    <title>
      使用者登入
    </title>
  </head>
  <body>
    <form action="checkpassword.php" method="post">
      <lable>密碼：</lable>
      <input type="password" name="pass"><br>
      <lable>確認密碼：</lable>
      <input type="password" name="checkpass"><br>
      <input type="submit" value="送出">
    </form>
  </body>
</html>
