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
  window.location.href = "login.php";
</script> //重新導向
<?php
      }
  } else {
      echo "驗證失敗";
      echo '<script type="text/javascript">alert("無法取的修改權限!");</script>'; ?>
<script type="text/javascript">
window.location.href = "login.php";
</script>
<?php
  }
?>
<!--body 大小不是左右填滿的-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="./css/forgot_password.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <form id="passform" action="checkpassword.php" method="post">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="register_card">
            <div id="logo">重新設定密碼</div>

            <div class="input">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <p class="input_text">輸入新密碼</p>
                      <input type="password" name="password" id="password" size="15"/>
                    </div>
                  </div>
            </div>

            <div class="input">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <p class="input_text">確認新密碼</p>
                      <input type="password" name="checkpassword" id="checkpassword" size="15"/>
                    </div>
                  </div>
            </div>
            </form>
            <div class="buttom_location">
              <button type="button" class="button" onclick="formSubmit()">確認</button>
            </div>
            <script>
              function formSubmit() {
                if (checkpw() === false) {
                  alert("兩次輸入的密碼不一致！請再試一次");
                } else {
                  //document.getElementById("passform").submit()
                }
              }
              function checkpw() {
                var pas1 = document.getElementById("password").value;
                var pas2 = document.getElementById("checkpassword").value;
                if (pas1 != pas2) {
                  checkpassword.value = "";
                  return false;
                } else {
                  return true;
                }
              }
            </script>
          </div>
        </div>
      </div>
      <div id="space"></div>
    </div>
  </body>
</html>
