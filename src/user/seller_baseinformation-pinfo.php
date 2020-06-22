<?php
  require __DIR__ . '/../vendor/autoload.php';
  // 建立 Session
  session_start();
  $db = Database::get();
  if (!isset($_SESSION['username'])) {
      header("Location: login.php");
  }

  $pid = $_GET['pid'];
  $result = $db->execute("SELECT * FROM book_product WHERE product_no = ?;", array($pid));
  if ($db->getRowCount() == 0) {
      echo "出事了阿貝";
  }

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


?>
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
        <h3 id="Title">賣家中心</h3>
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
                    新增商品
                  </div>
                </div>
              </div>
            </div>

            <div class="division">
              <div class="row">
                <!-- 資料內容-->

                <div class="col-sm-1"></div>
                <!--space-->

                <div class="col-sm-6">
                  <section id="images">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ul class="carousel-indicators">
                        <li
                          data-target="#demo"
                          data-slide-to="0"
                          class="active"
                        ></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                      </ul>

                      <!-- The slideshow -->
                      <div class="carousel-inner">
                        <!--輪轉照片-->
                        <div class="carousel-item active">
                          <?php
                            echo '<img class="card-img-top image" src="data:image/png;base64,'.find_base64($result[0]["product_no"]).'" alt="Card image cap" >'
                           ?>
                        </div>
                      </div>

                      <!-- Left and right controls -->
                      <a
                        class="carousel-control-prev"
                        href="#demo"
                        data-slide="prev"
                      >
                        <span class="carousel-control-prev-icon"></span>
                      </a>
                      <a
                        class="carousel-control-next"
                        href="#demo"
                        data-slide="next"
                      >
                        <span class="carousel-control-next-icon"></span>
                      </a>
                    </div>
                  </section>
                </div>
                <!--輪轉圖結束 -->
                <div class="col-sm-5">
                  <!--右邊區塊-->
                    <div class="form-group">
                    <form method="post" action="create_commodity-api.php" enctype = "multipart/form-data">
                      <input type="file" name="book_img" class="form-control-file" id="exampleFormControlFile1" accept=".jpg , .jpeg" required>
                    </div>
                  <p
                    id="text1"
                    style="font-size: 0.9em; margin-left: 3.2em; margin-top: 2em;"
                  >
                  </p>
                </div>
              </div>
            </div>
            <!--上半結束 -->
            <!--下半開始-->
            <div class="division">
              <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-5">
                  <!--下半左邊-->
                  <!-- 會有8個輸入框-->
                  <p class="input_text" for="exampleInputbook_name">書名</p>
                  <div class="col-sm-10">
                    <input
                    name="book_name"
                    type="text"
                    class="form-control form-control-sm"
                    id="exampleInputbook_name"
                    aria-describedby="book_nameHelp"
                    value="<?php echo $result[0]['book_name']; ?>"
                  />
                  </div>


                  <p class="input_text" for="exampleInputauthor">作者</p>
                  <div class="col-sm-10">
                    <input
                    name="author"
                    type="text"
                    class="form-control form-control-sm"
                    id="exampleInputauthor"
                    aria-describedby="authorHelp"
                    value="<?php echo $result[0]['author']; ?>"
                  />
                  </div>


                  <p class="input_text" for="exampleInputISBN">ISBN</p>
                  <div class="col-sm-10">
                    <input
                    name="ISBN"
                    type="text"
                    class="form-control form-control-sm"
                    id="exampleInputISBN"
                    aria-describedby="ISBNHelp"
                    value="<?php echo $result[0]['ISBN']; ?>"
                  />
                  </div>


                  <p class="input_text" style="margin-right: 2em;">出版日期</p>
                  <div class="form-group row">
                    <div class="col-10">
                      <input
                        name="publish_date"
                        class="form-control"
                        type="date"
                        value="2011-08-19"
                        id="exampleInputpublish_date"
                        value="<?php echo $result[0]['publish_date']; ?>"
                      />
                    </div>
                  </div>

                  <p class="input_text" for="exampleInputpublisher">出版商</p>
                  <div class="col-sm-10">
                    <input
                    name="publisher"
                    type="text"
                    class="form-control form-control-sm"
                    id="exampleInputpublisher"
                    aria-describedby="publisherHelp"
                    value="<?php echo $result[0]['publisher']; ?>"
                  />
                  </div>


                  <p class="input_text" for="exampleInputlanguage">語言</p>
                  <div class="col-sm-10">
                    <input
                    name="b_language"
                    type="text"
                    class="form-control form-control-sm"
                    id="exampleInputlanguage"
                    aria-describedby="languageHelp"
                    value="<?php echo $result[0]['b_language']; ?>"
                  />
                  </div>


                  <p class="input_text">書籍分類</p>
                  <div class="col-sm-10">
                    <select name="class_name" class="form-control form-control-sm">
                        <option>資工系</option>
                        <option>企管系</option>
                        <option>經濟系</option>
                        <option>國貿系</option>
                        <option>行銷系</option>
                        <option>風保系</option>
                        <option>財經系</option>
                        <option>財稅系</option>
                        <option>會計系</option>
                        <option>外文系</option>
                        <option>工工系</option>
                        <option>建築系</option>
                        <option>材料系</option>
                        <option>通訊系</option>
                        <option>中文系</option>
                      </select>
                  </div>

                  <p class="input_text" for="exampleInputpublisher">庫存量</p>
                  <div class="col-sm-10">
                    <input
                    name="stock"
                    type="text"
                    class="form-control form-control-sm"
                    id="exampleInputpublisher"
                    aria-describedby="publisherHelp"
                    value="<?php echo $result[0]['stock']; ?>"
                  />
                  </div>


                </div>
                <!--下半左邊結束-->
                <!--下半右邊開始-->
                <div class="col-sm-5">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">書籍狀況</label>
                    <textarea
                      class="form-control"
                      name="exterior"
                      id="exampleFormControlTextarea1"
                      rows="9"
                      placeholder="請輸入文字..."
                    ><?php echo $result[0]['exterior']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">書籍簡介</label>
                    <textarea
                      class="form-control"
                      name="introduce"
                      id="exampleFormControlTextarea2"
                      rows="9"
                      placeholder="請輸入文字..."
                    ><?php echo $result[0]['introduce']; ?></textarea>
                  </div>

                  <div id="price_text" style="margin-left: 3em;margin-top: 4.7em;">
                    <p class="input_text" for="exampleInputpublisher">價格</p>
                    <input
                      name="price"
                      type="text"
                      class="form-control form-control-sm"
                      id="exampleInputpublisher"
                      aria-describedby="publisherHelp"
                      value="<?php echo $result[0]['price']; ?>"
                    />
                  </div>

                </div>
                <!--下半右邊結束-->
              </div>
              <div class="buttom_location">
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
              </div>

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
