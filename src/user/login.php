<!--body 大小不是左右填滿的-->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="./css/login.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="register_card">
          <div id="logo">L O G O</div>
          <form action="login-api.php" method="post" id = "login">
            <div class="input">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <p class="input_text">帳號</p>
                  <input type="text" name="username" size="15" />
                </div>
              </div>
            </div>

            <div class="input">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <p class="input_text">密碼</p>
                  <input type="password" name="password" size="15" />
                </div>
              </div>
            </div>
            <div class="buttom_location">
              <button class="button" onclick="formSubmit()">登入</button>
            </div>
          </form>
          <script>
            function formSubmit() {
                document.getElementById("login").submit();
            }
          </script>
          <div class="forgot">
            <button type="button" class="btn btn-link" style="font-size: 0.9em"
            onclick="location.href='forget.php'">忘記密碼</button>
          </div>
        </div>
      </div>
    </div>
    <div id="space"></div>
  </div>
</body>

</html>
