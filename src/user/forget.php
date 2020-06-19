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
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="register_card">
            <div id="logo">輸入信箱</div>
            <form action="getmail.php" method="POST">
            <div class="input">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <p class="input_text"></p>
                      <input
                        type="text"
                        name="email"
                        size="15"
                      />
                    </div>
                  </div>
            </div>
            <div class="buttom_location" type = "submit">
              <button class="button">確定</button>
            </div>
          </div>
        </div>
      </div>
      <div id="space"></div>
    </div>
  </body>
</html>
