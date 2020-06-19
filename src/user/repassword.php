<?php
  require __DIR__ . '/../vendor/autoload.php';
  // 建立 Session
  session_start();
  $db = Database::get();

  $result = $db->execute("SELECT * FROM generaluser WHERE username = ?;", array($_SESSION['username']));
?>


<!DOCTYPE html>

<head>
  <title>搜尋</title>
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
  />
  <link rel="stylesheet" href="./css/account_modify.css" />
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  />
</head>

<body>
  <!--This is navbar-->
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-9">
      <li class="nav-item">
        <h2 style="color: darkcyan;">
          二手書網
        </h2>
      </li>
    </div>
    <div class="col-md-2">
      <nav id="main-nav" class="navbar navbar-expand-sm navbar-dark fixed-top">
        <div id="myBar" class="container">
          <ul class="navbar-nav ml-auto">
            <col class="nav-item" />
            <a href="homepage.php" class="nav-link topNavbar active">首頁</a>
            <col class="nav-item" />
            <a href="search.php" class="nav-link topNavbar">搜尋</a>
            <col class="nav-item" />
            <a href="classification" class="nav-link topNavbar">分類</a>
            <col class="nav-item" />
            <a href="seller_baseinformation.php" class="nav-link topNavbar">賣書</a>
            <col class="nav-item" />
            <a href="personinfo.php" class="nav-link topNavbar"
              >會員中心</a
            >
            <col class="nav-item" />
            <col class="nav-item" />
            <img src="image/card.jpg" alt="Avatar" id="account" />
            <col class="nav-item" />
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3">
      <h3 id="Title">會員中心</h3>
    </div>
  </div>

  <div class="row">
    <div class="card" id="card1">
      <div class="index">
        <div class="row">
          <a href="personinfo.php" id="profile">
            <i class="fas fa-user" style="font-size: 1em;"></i>
            個人基本資料
          </a>
        </div>
        <div class="row">
          <a href="repassword.php" id="change">
            <i
              class="fas fa-shield-alt"
              style="color:lightblue; font-size: 1em;"
            ></i>
            帳號密碼修改
          </a>
        </div>
        <div class="row">
          <a href="TransactionOrder.php" id="order">
            <i
              class="fas fa-chart-line"
              style="color:gray; font-size: 1em;"
            ></i>
            訂單查詢
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="row">
        <div class="card" id="card2">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-8" id="card_title">
              帳號密碼修改
            </div>
          </div>
          <form method="post" action="repassword-api.php">
          <div class="input_div">
            <div class="input">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-8">
                  <span class="input_text"
                    >E-mail(帳號) : <?php echo $result[0]['email'] ; ?></span
                  >
                </div>
              </div>
            </div>

            <div class="input">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-8">
                  <span class="input_text">目前密碼 :&nbsp; </span>
                  <input type="password" name="password" />
                </div>
              </div>
            </div>
            <div class="input">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-8">
                  <span class="input_text">新設密碼 :&nbsp; </span>
                  <input type="password" name="newpassword" />
                </div>
              </div>
            </div>
            <div class="input">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-8">
                  <span class="input_text">再次輸入新密碼密碼 :&nbsp; </span>
                  <input type="password" name="newpasswordcheck" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
          <div class="buttom_location">
            <button
              class="button"
              style="background-color: rgb(67, 151, 126); color: white;"
            >
              儲存修改
            </button>
        </form>
            <button
              class="button"
              style="background-color: white; color: black;"
              onclick="javascript:location.href='http://localhost/eric12345566/src/user/personinfo.php'" 
            >
              取消
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--This is bottombar-->
  <section id="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <nav class="nav flex-column">
            <h4 class="bottomtext">認識我們</h4>
            <a class="nav-link bottomText" href="#">認識團隊</a>
            <a class="nav-link bottomText" href="#">關於此專案</a>
            <a class="nav-link bottomText" href="#">加入我們</a>
          </nav>
        </div>
        <div class="col-md-3">
          <nav class="nav flex-column">
            <h4 class="bottomtext">網站地圖</h4>
            <a class="nav-link bottomText" href="#">首頁</a>
            <a class="nav-link bottomText" href="#">搜尋</a>
            <a class="nav-link bottomText" href="#">分類</a>
            <a class="nav-link bottomText" href="#">賣書</a>
            <a class="nav-link bottomText" href="#">會員中心</a>
          </nav>
        </div>
        <div class="col-md-3">
          <nav class="nav flex-column">
            <h4 class="bottomtext">聯絡我們</h4>
            <a class="nav-link bottomText" href="#">錯誤回報</a>
            <a class="nav-link bottomText" href="#">其他服務</a>
          </nav>
        </div>
        <div class="col-md-3">
          <nav class="nav flex-column">
            <a class="nav-link active">logo</a>
          </nav>
        </div>
      </div>
    </div>
  </section>
</body>
