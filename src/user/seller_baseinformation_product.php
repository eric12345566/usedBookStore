
<!DOCTYPE html>
<html>
<head>
  <title>搜尋</title>
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
  />
  <link rel="stylesheet" href="./css/create_commodity.css" />
  <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
  />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
  />

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!--icon-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--輪轉照片-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!--輪轉照片-->
</head>

<?php
  require __DIR__ . '/../vendor/autoload.php';
  session_start();
  $db = Database::get();
  $result = $db->execute("SELECT * FROM book_product WHERE username=?", array($_SESSION['username']));
  $count = $db->getRowCount(); //商品數量
  function find_base64($product_no)
  {
      require __DIR__ . '/../vendor/autoload.php';
      $db = Database::get();
      $photo_result = $db->execute("SELECT base64 FROM photo WHERE product_no=?", array($product_no));

      if ($db->getRowCount()!=0) {
          return $photo_result[0]["base64"];
      } else {
          return null;
      }
  }
 ?>


<body>
  <!--This is navbar-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <nav
          id="main-nav"
          class="navbar navbar-expand-sm navbar-dark fixed-top"
        >
          <div id="myBar" class="container">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <h2
                  style="position: fixed; left: 4.3em; color: darkcyan; font-family: Microsoft JhengHei;"
                >
                  二手書網
                </h2>
              </li>
              <col class="nav-item" />
              <a href="homepage.php" class="nav-link topNavbar active">首頁</a>
              <col class="nav-item" />
              <a href="search.php" class="nav-link topNavbar"
                >搜尋</a
              >
              <col class="nav-item" />
              <a href="classification.php" class="nav-link topNavbar">分類</a>
              <col class="nav-item" />
              <a href="seller_baseinformation.php" class="nav-link topNavbar"
                >賣書</a
              >
              <col class="nav-item" />
              <a href="personinfo.php" class="nav-link topNavbar"
                >會員中心</a
              >
              <col class="nav-item" />
              <img src="image/card.jpg" alt="Avatar" id="account" />
            </ul>
          </div>
        </nav>
      </div>
    </div>

    <!-- 本頁內容-->
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <h3 id="Title">會員中心</h3>
      </div>
    </div>

    <div class="row" id="seller_card">
      <div class="col-sm-1"></div>

      <div class="col-sm-2">
        <div class="card" id="card1">
          <div class="index">
            <div class="row">
              <a href="seller_baseinformation.php" id="profile">
                <i class="fas fa-user" style="font-size: 1em;"></i>
                賣家基本資料
              </a>
            </div>

            <div class="row">
              <a href="seller_baseinformation_product.php" id="change">
                <i
                  class="fas fa-shield-alt"
                  style="color:lightblue; font-size: 1em;"
                ></i>
                商品管理
              </a>
            </div>
            <div class="row">
              <a href="infoOrder.php" id="order">
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
      <!-- 主要內容-->
      <div class="col-md-8">
        <div id="information_card">
          <div class="card" id="card2">
            <div class="row">
              <div class="col-sm-1"></div>
              <!-- space -->

              <div class="col-md-4">
                <div class="row">
                  <div id="card_title">
                    管理商品
                  </div>
                </div>
              </div>
            </div>

            <div class="division">
              <div class="row" >
                  <div class="col-md-3 offset-md-10">
                  <a class="btn btn-primary" href="seller_baseinformation.php" role="button">新增商品</a>
                  </div>
              </div>
              <div class="row">
                <!-- 資料內容-->
                 <?php
                 for ($i=0 ; $i<$count ; $i++) {
                     $link="Book_information.php?product_no=".$result[$i]["product_no"]."";
                     $status = "已售完或下架";
                     if ($result[$i]["avialiable"]) {
                         $status = "上架中";
                     }
                     echo '<div class="col-md-6">
                       <div class="card pcard" style="width: 18rem;">
                        <div class="box">
                        <img class="imgsize" class="card-img-top" src="data:image/png;base64,'.find_base64($result[$i]["product_no"]).'" alt="Card image cap">
                         <div class="card-body">
                           <h5 class="card-title">'.$result[$i]["book_name"].'</h5>
                           <p class="card-text pcontent">狀態：'.$status.'</p>
                           <p class="card-text pcontent">上架日期：'.$result[$i]["set_time"].'</p>
                           <p class="card-text pcontent">價格：'.$result[$i]["price"].'元</p>
                           <a href="'.$link.'" class="btn btn-primary pbtn">書籍詳細</a>
                         </div>
                       </div>
                       </div>
                     </div>';
                 }
                  ?>

                <!--下半右邊結束-->
              </div>
              <!-- <div class="buttom_location">
                <button
                    type="submit"
                    class="btn btn-light"
                    style="background-color: rgb(38, 102, 110); width: 6em;"
                  >
                    儲存修改
                  </button>
                  </form>
                <button
                    type="button"
                    class="btn btn-light"
                    style="background-color: white; color: black; width: 6em;"
                    onclick="javascript:location.href='http://localhost/eric12345566/src/user/homepage.php'"
                  >
                    取消
                  </button>
              </div> -->

            </div>
            <!--下半結束-->
          </div>
        </div>
      </div>
      <!--主要內容結束-->
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
</html>
