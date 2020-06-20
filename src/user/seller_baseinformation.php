<?php
<<<<<<< HEAD
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
=======
  require __DIR__ . '/../vendor/autoload.php';
  // 建立 Session
  session_start();
  $db = Database::get();

  $result = $db->execute("SELECT * FROM generaluser WHERE username = ?;", array($_SESSION['username']));
?>

>>>>>>> origin/註冊
<!DOCTYPE html>

<head>
  <title>搜尋</title>
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
  />
  <link rel="stylesheet" href="./css/seller_baseinformation.css" />
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  />
</head>

<body>
  <!--This is navbar-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <nav id="main-nav" class="navbar navbar-expand-sm navbar-dark fixed-top">
          <div id="myBar" class="container">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <h2 style="position: fixed; left: 4.3em; color: darkcyan; font-family: Microsoft JhengHei;">二手書網</h2>
              </li>
              <col class="nav-item">
              <a href="#home-section" class="nav-link topNavbar active">首頁</a>
              <col class="nav-item">
              <a href="#explore-head-section" class="nav-link topNavbar">搜尋</a>
              <col class="nav-item">
              <a href="#author-head-section" class="nav-link topNavbar">分類</a>
              <col class="nav-item">
              <a href="#mission-head-section" class="nav-link topNavbar">賣書</a>
              <col class="nav-item">
              <a href="#mission-head-section" class="nav-link topNavbar">會員中心</a>
              <col class="nav-item">
              <img src="image/card.jpg" alt="Avatar" id="account">
            </ul>
          </div>
        </nav>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <h3 id="Title">賣家中心</h3>
      </div>
    </div>
  
    <div class="row" id="seller_card">
      <div class="col-sm-1"></div>
  
      <div class="col-sm-2">
        <div class="card" id="card1">
          <div class="index">
            <div class="row">
<<<<<<< HEAD
              <a href="seller_baseinformation.php" id="profile">
=======
              <a href="#" id="profile">
>>>>>>> origin/註冊
                <i class="fas fa-user" style="font-size: 1em;"></i>
                賣家基本資料
              </a>
            </div>
  
            <div class="row">
<<<<<<< HEAD
              <a href="seller_baseinformation_product.php" id="change">
=======
              <a href="#" id="change">
>>>>>>> origin/註冊
                <i
                  class="fas fa-shield-alt"
                  style="color:lightblue; font-size: 1em;"
                ></i>
                商品管理
              </a>
            </div>
            <div class="row">
              <a href="#" id="order">
                <i
                  class="fas fa-chart-line"
                  style="color:gray; font-size: 1em;"
                ></i>
                訂單查詢
              </a>
            </div>
          </div>
        </div>
      </div>
  
      <div class="col-md-8">
        <div id="information_card">
          <div class="card" id="card2">
            <div class="row">
              <div class="col-sm-1"></div>
  
              <div class="col-md-4">
                <div class="row">
                  <div id="card_title">
                    賣家基本資料
                  </div>
                </div>
              </div>
            </div>
  
            <div class="row">
              <!-- 資料內容-->
  
              <div class="col-sm-1"></div>
  
              <div class="col-sm-5">
                <!--左邊區塊-->
                <div class="input_div">
                  <div class="input">
                    <div class="row">
                      <span class="input_text">地址:&nbsp;<?php echo $result[0]['address'] ; ?> </span>
                      <span class="information_text"
                        ></span
                      >
                    </div>
                  </div>

                  <div class="input">
                    <div class="row">
                      <div class="input_text">
                        負責人 :&nbsp;
                        <span class="information_text"><?php echo $result[0]['man_in_charge'] ; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="col-sm-5">
                <!--右邊區塊-->

                <div class="input">
                  <div class="row">
                    <div class="input_text">
                      註冊商家名稱 :&nbsp;
                      <span class="information_text"><?php echo $result[0]['register_name'] ; ?> </span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <!--This is bottombar-->
      <section id="header">
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
      </section>
  </div>
</body>
<<<<<<< HEAD
</html>
=======
>>>>>>> origin/註冊
