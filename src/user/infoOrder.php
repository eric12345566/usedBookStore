<?php
  require __DIR__ . '/../vendor/autoload.php';
  // 建立 Session
  session_start();
  $db = Database::get();

?>

<!DOCTYPE html>

<html>

<head>
    <title>會員中心</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="./css/infoOrder.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

    <!--This is navbar-->
    <nav id="main-nav" class="navbar navbar-expand-sm navbar-dark fixed-top">
        <div id="myBar" class="container">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <h2 style="position: fixed; left: 3em; color: darkcyan; font-family: Microsoft JhengHei;">二手書網</h2>
                </li>
                <col class="nav-item">
                <a href="homepage.php" class="nav-link topNavbar active">首頁</a>
                <col class="nav-item">
                <a href="search.php" class="nav-link topNavbar">搜尋</a>
                <col class="nav-item">
                <a href="classification.php" class="nav-link topNavbar">分類</a>
                <col class="nav-item">
                <a href="seller_baseinformation.php" class="nav-link topNavbar">賣書</a>
                <col class="nav-item">
                <a href="personinfo.php" class="nav-link topNavbar">會員中心</a>
                <col class="nav-item">
                <img src="image/account.png" alt="Avatar" id="account">
            </ul>
        </div>
    </nav>

    <div class="row">
        <h3 id="Title">賣家中心</h3>
    </div>
    <div class="row" style="width: 90%; margin: 0 auto;">
        <div class="card col-md-2" id="card1">
            <div class="index">
              <div class="row" style="line-height: 3em;">
                <a href="seller_baseinformation.php" id="profile">
                  <img src="image/profile.png" style="width: 25px;">
                  賣家基本資料
                </a>
              </div>
              <div class="row" style="line-height: 3em;">
                <a href="seller_baseinformation_product.php" id="change">
                  <img src="image/security.png" style="width: 25px;">
                    商品管理
                </a>
              </div>
              <div class="row" style="line-height: 3em;">
                <a href="infoOrder.php" id="order">
                  <img src="image/list.png" style="width: 25px;">
                  訂單查詢
                </a>
              </div>
            </div>
          </div>

        <div class="card col-md-9" id="card2" style="margin-bottom: 5em; height: auto; margin-left: 5em;">
            <div class="row">
                <span style="margin-left: 2.9em; font-family: Microsoft JhengHei; margin-top: 2em; margin-bottom: 3em;">
                    <h4>訂單資訊</h4>
                </span>
            </div>
            <div class="row">
                <div style="font-family: Microsoft JhengHei;">
                    <span style="margin-left: 3em;">訂單編號</span>
                    <span style="margin-left: 7em;">總價</span>
                    <span style="margin-left: 7em;">訂單交易狀況</span>
                    <span style="margin-left: 7em;">訂單操作</span>
                </div>
            </div>
            <hr>
            <?php $price = 0;
            $sname = $db->execute("SELECT * FROM p_order WHERE s_username = ?;", array($_SESSION['username']));
            for($i = 0 ; $i < $db->getRowCount() ; $i++) {
                $result = $db->execute("SELECT * FROM items WHERE order_no = ?;", array($sname[$i]['order_no']));
                for($j = 0 ; $j < $db->getRowCount() ; $j++) { 
                    $price += $result[$j]['price'] * $result[$j]['amount'];
                } 
            echo '<div class="row">';
            echo '<span style="margin-left: 3em;">'.$sname[$i]['order_no'].'</span>';
            echo '<span style="margin-left: 10.7em;">'.$price.'</span>';
            echo '<span style="margin-left: 7.5em;">'.$sname[$i]['order_status'].'</span>';
            echo '<a href="'. 'TransactionOrder.php?id='. $sname[$i]['order_no'] .'" style="margin-left: 9em; color: #8FBC94;">'."查看詳細".'</a>';
            echo '</div>';
            echo '<hr>';
             $price=0;
             }
            ?>
            
            
            <hr>
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
