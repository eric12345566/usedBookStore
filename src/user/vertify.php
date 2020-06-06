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
          echo '<script type="text/javascript">alert("帳號已經重設過!");</script>'; ?>
<script type="text/javascript">
  window.location.href = "login.php"
</script>; //重新導向
<?php
      }
  } else {
      echo "驗證失敗";
      echo '<script type="text/javascript">alert("無法取的修改權限!");</script>'; ?>
<script type="text/javascript">
window.location.href = "login.php"
</script>;
  }
?>
<html>

<head>
  <title>
    使用者登入
  </title>
</head>

<body>
  <form id="passform" action="checkpassword.php" method="post">
    <lable>密碼：</lable>
    <input id="password" type="password" name="pass"><br>
    <script>
      var pattern = new RegExp('/^[A-Za-z0-9]*[A-Z]+[A-Za-z0-9]*[0-9]+[A-Za-z0-9]*$/');
      const password = document.getElementById("password");
      if (password.match(pattern)) {
        document.write("密碼符合格式");
      } else {
        document.write("密碼不符合格式");
      }
    </script>
    <lable>確認密碼：</lable>
    <input id="repassword" type="password" name="checkpass"><br>
    <input type="button" value="送出" onclick="formSubmit()">
  </form>
  <script>
    function formSubmit() {
      if (checkpw() === false) {
        alert("兩次輸入的密碼不一致！請再試一次");
      } else {
        document.getElementById("passform").submit()
      }
    }

    function checkpw() { //點選提交按鈕時，觸發checkpas2事件，會進行彈框提醒以防無視錯誤資訊提交
      var pas1 = document.getElementById("password").value;
      var pas2 = document.getElementById("repassword").value;
      if (pas1 != pas2) {
        return false;
      }
    }
  </script>
</body>

</html>
