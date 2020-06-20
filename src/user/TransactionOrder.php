<?php
  require __DIR__ . '/../vendor/autoload.php';

  // 建立 Session
  session_start();

  // 獲取資料庫連線 DAO
  $db = Database::get();

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $db->execute("SELECT * FROM p_order WHERE order_no = ?;", array($id));
    //echo $db->getRowCount()."<br />";
    
    if($db->getRowCount() == 0 ){
      echo "出事了啊杯result";
    }
    
    $item = $db->execute("SELECT * FROM items WHERE order_no = ?;", array($id));
    //echo $db->getRowCount()."<br />";

    if($db->getRowCount() == 0){
      echo "出事了阿貝item";
    }

    $book = $db->execute("SELECT * FROM book_product WHERE product_no = ?;", array($item[0]['product_no']));
    //echo $db->getRowCount()."<br />";

    if($db->getRowCount() == 0){
      echo "出事了阿貝item";
    }

    $p_user = $db->execute("SELECT * FROM GeneralUser WHERE username = ?;", array($result[0]['p_username']));
    //echo $db->getRowCount()."<br />";

    if($db->getRowCount() == 0){
      echo "出事了阿貝puser";
    }

    $s_user = $db->execute("SELECT * FROM GeneralUser WHERE username = ?;", array($result[0]['s_username']));
    //echo $db->getRowCount()."<br />";

    if($db->getRowCount() == 0){
      echo "出事了阿貝suser";
    }
    $condition = -1;
    if($result[0]['order_status'] == "買賣家取消訂單" || $result[0]['order_status'] == "因爽約取消"){
      $condition = 1;
    }else if($result[0]['order_status'] == "已媒合等待交書"){
      $condition = 2;
    }else if($result[0]['order_status'] == "已交貨結案"){
      $condition = 3;
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>交易訂單</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="./css/TransactionOrder.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!--Get your own code at fontawesome.com-->
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
        <a href="sellercenter.php" class="nav-link topNavbar">賣書</a>
        <col class="nav-item">
        <a href="#" class="nav-link topNavbar">會員中心</a>
        <col class="nav-item">
        <a href="login.php"><img src="image/account.png" alt="Avatar" id="account"></a>
      </ul>
    </div>
  </nav>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
          <h4 style="margin-top: 5em;">交易訂單</h4>
          <span id="Orderlabel"
            >訂單編號:<span id="Ordernumber"><?php echo $result[0]['order_no'] ?></span></span
          >
        </div>
      </div>

          <div class="row" style="margin-top: 3em;">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <div class="row">
                <div class="col-md-4">
              <div class="bookname">書本名稱</div>
            </div>
            <div class="col-md-4">
              <div class="orderprice">單價</div>
            </div>
            <div class="col-md-4">
              <div class="orderquantity">數量</div>
            </div>
              </div>
            </div>
          </div>
        

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-4">
                <div class="bookname"><?php echo $book[0]['book_name'] ?></div>
              </div>
              <div class="col-md-4">
                <div class="orderprice">NT$<?php echo $book[0]['price'] ?>元</div>
              </div>
              <div class="col-md-4">
                <div class="orderprice">1</div>
              </div>
            </div>
          </div>
        </div>
      <!--Orderlist-->

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
          <p id="pricetext">總價:<span id="price"> NT$<?php echo $book[0]['price'] ?></span></p>
          <div class="contenttext">
            訂單建立日期:<?php echo $result[0]['build_date'] ?><br />
            訂單結案日期:<?php echo $result[0]['complete_date'] ?>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
          <h4>聯絡資訊</h4>
          <div class="contenttext">
            <span class="person">買家資訊</span><br /><br />
            <p><?php echo $p_user[0]['name'] ?></p>
            <p>電話:<?php echo $p_user[0]['phonenumber'] ?></p>
            <p>偏好面交地點:<?php echo $p_user[0]['prefer_loc'] ?></p>
          </div>
          <div class="contenttext">
            <span class="person">賣家資訊</span><br /><br />
            <p><?php echo $s_user[0]['name'] ?></p>
            <p>電話:<?php echo $s_user[0]['phonenumber'] ?></p>
            <p>偏好面交地點:<?php echo $s_user[0]['prefer_loc'] ?></p>
          </div>
        </div>
        <div class="col-md-5">
          <h4>交書方式</h4>
          <div class="contenttext">
            請先與對方用電話約定時間與地點，並在依照約定好的時間地點，與對⽅實體交書<br />
            若已成功完成交書，請回到此頁面<span style="color: cornflowerblue;"
              >點選「訂單完成」</span
            >，雙⽅都按下訂單完成後，訂單才會結單。<br />
          </div>
          <p class="person" style="margin-top: 2.6em;">注意事項</p>
          <!--有特別修改margin-top-->
          <div>
            1. 為了您的安全，建議攜帶同伴前往交書，書很重的，你需要有⼈幫你&lt;3
            <br />
            2.
            請依照約定時間地點赴約，爽約⾏為若被回報，將會留下紀錄，嚴重者停⽤帳號。<br />
            <br />
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
          <h4>訂單狀態</h4>
          <div id="order_status">
            <i class="fas fa-clock"></i>
            <span><?php echo $result[0]['order_status']; ?></span>
          </div>
        </div>
        <div class="col-md-5">
          <h4>訂單操作</h4>
          <div>
            <?php 
              if($condition==2){
                echo '
                <a
                href="./TransactionOrder-api.php?id='.$id.'&op=1"
                class="button"
                style="background-color: rgb(25, 110, 82);color: #ffffff; text-decoration:none;"
              >
                訂單完成
              </a>
              <a
              href="./TransactionOrder-api.php?id='. $id.'&op=2"
              class="button"
              style="background-color: rgb(53, 57, 58);color: #ffffff; text-decoration:none;"
            >
              訂單取消
            </a>
            <a
              href="./TransactionOrder-api.php?id='.$id.'&op=3"
              class="button"
              style="background-color: rgb(201, 212, 216);color: black; text-decoration:none;"
            >
              爽約回報
            </a>
              ';
              }else if($condition==1){
                echo '<p style="margin:5em;">訂單已取消，不可操作</p>';
              }else if($condition==3){
                echo '<p style="margin:5em;">訂單已交貨結案，不可操作</p>';
              }
            ?>
            
            
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
</html>
