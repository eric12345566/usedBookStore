<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="./css/Book_information.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
  <section id="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6">
          <section id="images">
            <div id="demo" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
              </ul>

              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100 h-55" src="./image/card1.jpg" width="700" height="450" />
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 h-55" src="./image/card2.jpg" width="700" height="450" />
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 h-55" src="./image/card3.jpg" width="700" height="450" />
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
          </section>
        </div>


        <?php
            require __DIR__ . '/../vendor/autoload.php';
            $db = Database::get();

            $product_no=empty($_GET['product_no'])?'':$_GET['product_no'];
              if (empty($product_no)) {
                  $product_no = null;
              }
            //echo "系所： ".$keyword; //show出 關鍵字

            $result = $db->execute("SELECT * FROM book_product WHERE product_no = ?;", array($product_no));
            $count = $db->getRowCount();
            //echo "$count";

            if ($count == 0) {   //如果沒有搜尋結果
                echo "頁面發生錯誤";
                echo '<script type="text/javascript">alert("頁面錯誤！");</script>';
                echo '<script type="text/javascript">window.location.href="homepage.php"</script>';//重新導向
            }?>

        <div class="col-md-4">
          <section id="imagesinformation">
            <p class="booktitle"><?php echo $result[0]["book_name"]; ?></p>
            <div id="bookinformation">
              作者:<?php echo $result[0]["author"]; ?>
              <br />ISBN:<?php echo $result[0]["ISBN"]; ?> <br />出版年份:<?php echo $result[0]["publish_date"]; ?>
              <br />出版商:<?php echo $result[0]["publisher"]; ?> <br />語言: <?php echo $result[0]["b_language"]; ?>
              <?php
                  $result_tag = $db->execute("SELECT class_name FROM Classify_tag WHERE product_no = ?;", array($product_no));
                  if ($db->getRowCount() == 0) {
                      echo '<script type="text/javascript">alert("頁面錯誤！");</script>';
                      echo '<script type="text/javascript">window.location.href="homepage.php"</script>';//重新導向
                  }
                ?>
              <p>書籍分類:<?php echo $result_tag[0]["class_name"]; ?></p>
              <br />
            </div>

            <div id="bookinformation">
              <p class="Lab">書籍狀況</p>
              <i class="fa">&#xf046;</i>
              <?php echo $result[0]["exterior"]; ?>
              <p></p>
              <br />
            </div>

            <div id="bookinformation">
              <p class="Lab">銷售狀況</p>
              庫存:<?php echo $result[0]["stock"]; ?>
              <br />交貨方式:面交 <br />
              <p></p>
            </div>

            <div>
              價格:&nbsp;&nbsp;NT$&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="price"><?php echo $result[0]["price"]; ?></a>
              <button type="button" id="paybuttom" class="btn btn-primary btn-lg">
                立即購買
              </button>
            </div>
          </section>
        </div>
      </div>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6">
          <p class="booktitle">書本簡介</p>
          <br />
          <p>
            <?php echo $result[0]["introduce"]; ?>
          </p>
        </div>
        <a href="#">
          <div class="col-md-5">
            <div id="card">
              <div class="card mb-3">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="./image/cardperson.jpg" style="width: 8em;
                      height: 8em;
                      border-radius: 50%;" class="card-img">
                  </div>

                  <?php
                    $result_inform = $db->execute("SELECT register_name,uuiversity,major FROM GeneralUser as G
                    ,book_product as B WHERE G.username=B.username AND G.username=?;", array($result[0]["username"]));
                   ?>


                  <div class="col-md-8">
                    <div class="card-body">
                      <div class="seller-title">賣家資訊</div>
                      <div class="sellername"><?php echo $result_inform[0]["register_name"]; ?></div>
                      <div class="sellerDepartment">
                        <small><?php echo $result_inform[0]["uuiversity"]; ?>&nbsp;&nbsp;<?php echo $result_inform[0]["major"]; ?></small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
</body>

</html>
