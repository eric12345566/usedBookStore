<?php
  require __DIR__ . '/../vendor/autoload.php';
  session_start();
  $db = Database::get();
  $result = $db->execute("SELECT * FROM book_product WHERE username=?", array($_SESSION['username']));
  $count = $db->getRowCount();
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

<!DOCTYPE html>

<html>

<head>
    <title>賣家中心</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="./css/sellercenter.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

    <!--This is navbar-->
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9">
          <h2 style="color: darkcyan; font-weight: bold; font-family: Microsoft JhengHei;">
            二手書網
          </h2>
        </div>
        <div class="col-md-2">
          <nav id="main-nav" class="navbar navbar-expand-sm navbar-dark fixed-top">
            <div id="myBar" class="container">
              <ul class="navbar-nav ml-auto">
                <col class="nav-item" />
                <a href="#home-section" class="nav-link topNavbar active">首頁</a>
                <col class="nav-item" />
                <a href="#explore-head-section" class="nav-link topNavbar">搜尋</a>
                <col class="nav-item" />
                <a href="#author-head-section" class="nav-link topNavbar">分類</a>
                <col class="nav-item" />
                <a href="#mission-head-section" class="nav-link topNavbar">賣書</a>
                <col class="nav-item" />
                <a href="#mission-head-section" class="nav-link topNavbar">會員中心</a>
                <col class="nav-item" />
                <col class="nav-item" />
                <img src="image/account.png" alt="Avatar" id="account" />
                <col class="nav-item" />
              </ul>
            </div>
          </nav>
        </div>
      </div>

    <div class="row">
        <div class="col-md-3">
            <h3 id="Title">會員中心</h3>
        </div>
    </div>

    <div class="row" style="width: 80%; margin: 0 auto;">
        <div class="card col-md-2" id="card1">
            <div class="index">
                <div class="row">
                    <a href="#" id="profile">
                        <img src="image/profile.png" style="width: 25px;">
                        個人基本資料
                    </a>
                </div>
                <div class="row">
                    <a href="#" id="change">
                        <img src="image/security.png" style="width: 25px;">
                        帳號密碼修改
                    </a>
                </div>
                <div class="row">
                    <a href="#" id="order">
                        <img src="image/list.png" style="width: 25px;">
                        訂單查詢
                    </a>
                </div>
            </div>
        </div>

        <div class="card col-md-9" id="card2" style="margin-bottom: 5em; height: auto; margin-left: 3em;">
            <div class="row">
                <span style="margin-left: 4em; font-family: Microsoft JhengHei;">
                    <h4>商品管理</h4>
                </span>
                <span style="margin: auto; margin-right: 5em;">
                    <button type="button" class="btn btn-success button1"><img src="image/add.png"
                            style="width: 20px;">新增商品</button>
                </span>
            </div>
            <div class="row" style="margin-top: 2em;">
                <span style="margin-left: 4em; font-family: Microsoft JhengHei;">
                    <h5>上架中</h5>
                </span>
                <span style="margin: auto; margin-right: 0em;">
                    <div class="search-container">
                        <input type="text" placeholder="Search.." id="search">
                        <input class="btn btn-primary" type="button" value="搜尋">
                    </div>
                </span>
            </div>

            <!--放置第一列Card-->
            <section id="CardRow1">
                <div class="row" style="margin-top: 2em;">

                  <?php
                    for ($i=0 ; $i<$count ; $i++) {
                        $status = "已售完或下架";
                        if($result[$i]["avialiable"]) {
                          $status = ;
                        }
                        echo '<div class="col-md-4">
                          <div style="box-shadow:3px 3px 12px gray;width:250px;height:auto; margin-bottom: 5em;">
                              <button type="button" class="btn btn-light">
                                  <img src="image/card.jpg" alt="Denim Jeans" style="width:250px">
                                  <div style="margin-left: 1em; font-family: Microsoft JhengHei;">
                                      <div style="font-size: larger;font-weight: bold;font-family: Microsoft JhengHei;">
                                          '.$result[$i]["book_name"].'
                                      </div>
                                      <p>狀態: <span><a href="#" style="color: #8FBC94;">'.$result[$i][""].'</a></span></p>
                                      <p>庫存量: 1/1</p>
                                      <p>上架日期: 2020/06/20</p><br>
                                      <p style="color: #8FBC94;">價格: 200元</p>
                                  </div>
                              </button>
                          </div>
                      </div>';
                    }

                   ?>





                </div>
            </section>

            <section id="CardRow2">
                <div class="row">
                    <span style="margin-left: 4em; font-family: Microsoft JhengHei;">
                        <h5>已售完/下架</h5>
                    </span>
                </div>
                <div class="row" style="margin-top: 2em;">
                    <div class="col-md-4">
                        <div style="box-shadow:3px 3px 12px gray;width:250px;height:auto; margin-bottom: 5em;">
                            <button type="button" class="btn btn-light">
                                <img src="image/card.jpg" alt="Denim Jeans" style="width:250px">
                                <div style="margin-left: 1em; font-family: Microsoft JhengHei;">
                                    <div style="font-size: larger;font-weight: bold;font-family: Microsoft JhengHei;">
                                        系統程式
                                    </div>
                                    <p>狀態: <span><a href="#" style="color: #8FBC94;">售完</a></span></p>
                                    <p>庫存量: 0/1</p>
                                    <p>上架日期: 2020/06/20</p><br>
                                    <p style="color: #8FBC94;">價格: 200元</p>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="box-shadow:3px 3px 12px gray;width:250px;height:auto; margin-bottom: 5em;">
                            <button type="button" class="btn btn-light">
                                <img src="image/card1.jpg" alt="Denim Jeans" style="width:250px">
                                <div style="margin-left: 1em; font-family: Microsoft JhengHei;">
                                    <div style="font-size: larger;font-weight: bold;font-family: Microsoft JhengHei;">
                                        系統程式
                                    </div>
                                    <p>狀態: <span><a href="#" style="color: #8FBC94;">售完</a></span></p>
                                    <p>庫存量: 0/1</p>
                                    <p>上架日期: 2020/06/20</p><br>
                                    <p style="color: #8FBC94;">價格: 200元</p>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="box-shadow:3px 3px 12px gray;width:250px;height:auto; margin-bottom: 5em;">
                            <button type="button" class="btn btn-light">
                                <img src="image/card2.jpg" alt="Denim Jeans" style="width:250px">
                                <div style="margin-left: 1em; font-family: Microsoft JhengHei;">
                                    <div style="font-size: larger;font-weight: bold;font-family: Microsoft JhengHei;">
                                        系統程式
                                    </div>
                                    <p>狀態: <span><a href="#" style="color: #8FBC94;">下架</a></span></p>
                                    <p>庫存量: 1/1</p>
                                    <p>上架日期: 2020/06/20</p><br>
                                    <p style="color: #8FBC94;">價格: 200元</p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
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

</html>
