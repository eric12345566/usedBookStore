<?php
  require __DIR__ . '/../vendor/autoload.php';
  $db = Database::get();

  $keyword=empty($_GET['keyword'])?'':$_GET['keyword'];
    if (empty($keyword)) {
        $keyword='資工系';
    }
  //echo "系所： ".$keyword; //show出 關鍵字

  $result = $db->execute("SELECT * FROM book_product as B, Classify_tag as C WHERE B.product_no = C.product_no
  AND class_name = ?  ;", array($keyword));
  $count = $db->getRowCount();
  //echo "$count";

  if ($count == 0) {   //如果沒有搜尋結果
      echo "此分類目前沒有書籍喔！";
  } else {
      if ($count>0) {
          //  echo "共有".$count."筆資料！";
      } ?>
      <?php
  }
?>


<!DOCTYPE html>
<html>

<head>
  <title>二手書店</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="./css/classification.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>

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
        <img src="image/account.png" alt="Avatar" id="account">
      </ul>
    </div>
  </nav>
  <img src="image/homepage.jpg" id="topImage">


  <div class="container-fluid">
    <section class="classification">
      <div class="column1_class">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <button onclick="location.href='classification.php?keyword=資工系'" class="button">資工系</button>
            <button onclick="location.href='classification.php?keyword=光電系'" class="button">光電系</button>
            <button onclick="location.href='classification.php?keyword=通訊系'" class="button">通訊系</button>
            <button onclick="location.href='classification.php?keyword=電機系'" class="button">電機系</button>
            <button onclick="location.href='classification.php?keyword=電子系'" class="button">電子系</button>
            <button onclick="location.href='classification.php?keyword=機電系'" class="button">機電系</button>
            <button onclick="location.href='classification.php?keyword=航太系'" class="button">航太系</button>
            <button onclick="location.href='classification.php?keyword=應數系'" class="button">應數系</button>
          </div>
        </div>
      </div>

      <div class="column1_class">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <button onclick="location.href='classification.php?keyword=光電系'" class="button">企管系</button>
            <button onclick="location.href='classification.php?keyword=行銷系'" class="button">行銷系</button>
            <button onclick="location.href='classification.php?keyword=經濟系'" class="button">經濟系</button>
            <button onclick="location.href='classification.php?keyword=國貿系'" class="button">國貿系</button>
            <button onclick="location.href='classification.php?keyword=財經系'" class="button">財經系</button>
            <button onclick="location.href='classification.php?keyword=財稅系'" class="button">財稅系</button>
            <button onclick="location.href='classification.php?keyword=風保系'" class="button">風保系</button>

            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
              <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  更多
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                  <a class="dropdown-item active" href="#">會計系</a>
                  <a class="dropdown-item" href="#">工工系</a>
                  <a class="dropdown-item" href="#">外文系</a>
                  <a class="dropdown-item" href="#">中文系</a>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>
  </div>
  <section id="cardsection">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="label"><?php echo"$keyword "?></div>
        </div>
      </div>
        <div class="row">
        <?php
        for ($i=0 ; $i<$count ; $i++) {
            echo '<div class="col-md-3" style="padding: 3em;">
            <div class="card">
              <img class="card-img-top" src="./image/card.jpg" alt="Card image cap">
              <div class="card-body">
                <div class="card-book">'.$result[$i]["book_name"].'</div>
                <p class="card-writer">作者 ：'.$result[$i]["author"].'</p>
                <p class="card-pay">價格: '.$result[$i]["price"].'</p>
              </div>
            </div>
          </div>' ;
        } ?>
      </div>
    </div>
  </section>

  <!--This is buttonbar-->
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
