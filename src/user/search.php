<!DOCTYPE html>
<html>
<head>
    <title>搜尋</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="./css/search.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
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
          <a href="login.php"><img src="image/account.png" alt="Avatar" id="account"></a>
      </ul>
    </div>
  </nav>


  <!--This is searchbar-->
  <form action="search.php" method="GET">
  <div class="search-container">
      <input type="text" name="keyword" placeholder="Search.." id="search">
      <input type="submit" class="btn btn-primary"  value="搜尋">
  </div>
  </form>
  <p id="keyword">熱門關鍵字</p>

  <?php
    require __DIR__ . '/../vendor/autoload.php';
    $db = Database::get();

    $keyword=empty($_GET['keyword'])?'':$_GET['keyword'];
      if (!empty($keyword)) {
          $where='where book_name like "%'.$keyword.'%" ';
          $link="&keyword=".$keyword; //keyword為空 送回去
      } else {
          $where = 'where book_name like "%'.'nope'.'%" ';
      }
    echo "關鍵字： ".$keyword; //show出 關鍵字
    $page_size = 5;
    $count = $db->execute("SELECT count(*) as C FROM book_product ".$where); //紀錄搜尋總數
    $amount = $count[0]["C"];
    if ($amount == 0) {   //如果沒有搜尋結果
        echo "沒有搜尋結果 請輸入關鍵字搜尋";
    } else {
        $page_cnt = ceil($amount/$page_size);//紀錄頁面有幾個
        $page_num = empty($_GET['page'])?1:$_GET['page'];

        if ($page_cnt<=0) {
            $page_cnt = 1;
        } elseif ($page_cnt>$page_size) {
            $page_cnt = $page_size;
        }
        // TODO 拼接搜尋SQL 語句

        $limit="limit ".($page_num-1)*$page_size.",".$page_size;
        //echo $limit;
        echo "<br>";
        $sql = "SELECT * FROM book_product ".$where."ORDER BY product_no ".$limit;
        //echo $sql;
        $result = $db->execute($sql);
        if ($db->getRowCount()>0) {
            //TODO: 放Card顯示出來
            echo "共有".$amount."筆資料！";
        } ?>
        <div class="row">


        <?php
        function find_base64($product_no)
        {
            require __DIR__ . '/../vendor/autoload.php';
            $db = Database::get();
            $photo_result = $db->execute("SELECT base64 FROM photo WHERE product_no=?", array($product_no)); //隨機取四本

            if ($db->getRowCount()!=0) {
                return $photo_result[0]["base64"];
            } else {
                return null;
            }
        }


        for ($i=0 ; $i<$amount ; $i++) {
            $link="'Book_information.php?product_no=".$result[$i]["product_no"]."'";
            echo '<div class="col-md-3" style="padding: 3em;">
           <button type="button" class="card-button" onclick="location.href='.$link.'" style="border:none">
          <div class="card">
            <div class="box">
            <img class="imgsize" class="card-img-top" src="data:image/png;base64,'.find_base64($result[$i]["product_no"]).'" alt="Card image cap" >
            </div>
            <div class="card-body">
              <div class="card-book">'.$result[$i]["book_name"].'</div>
              <p class="card-writer">作者 ：'.$result[$i]["author"].'</p>
              <p class="card-pay">價格: '.$result[$i]["price"].'</p>
            </div>
          </div>
           </button>
        </div>' ;
        } ?>
      </div>
        <?php
    }
?>

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
