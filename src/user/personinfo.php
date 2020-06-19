<?php
  require __DIR__ . '/../vendor/autoload.php';
  // 建立 Session
  session_start();
  $db = Database::get();
  
  $result = $db->execute("SELECT * FROM generaluser WHERE username = ?;", array($_SESSION['username']));
   
?>


<!DOCTYPE html>
<html>
<head>
  <title>會員中心</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="./css/VIPcenter.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
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
            <a href="homepage.php" class="nav-link topNavbar active">首頁</a>
            <col class="nav-item" />
            <a href="search.php" class="nav-link topNavbar">搜尋</a>
            <col class="nav-item" />
            <a href="classification.php" class="nav-link topNavbar">分類</a>
            <col class="nav-item" />
            <a href="seller_baseinformation.php" class="nav-link topNavbar">賣書</a>
            <col class="nav-item" />
            <a href="personinfo.php" class="nav-link topNavbar">會員中心</a>
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
    <div class="col-md-1"></div>
    <div class="col-md-3">
      <h3 id="Title">會員中心</h3>
    </div>
  </div>

  <div class="row">
    <div class="card col-md-2" id="card1">
      <div class="index">
        <div class="row" style="line-height: 3em;">
          <a href="personinfo.php" id="profile">
            <img src="image/profile.png" style="width: 25px;">
            個人基本資料
          </a>
        </div>
        <div class="row" style="line-height: 3em;">
          <a href="repassword.php" id="change">
            <img src="image/security.png" style="width: 25px;">
            帳號密碼修改
          </a>
        </div>
        <div class="row" style="line-height: 3em;">
          <a href="TransactionOrder.php" id="order">
            <img src="image/list.png" style="width: 25px;">
            訂單查詢
          </a>
        </div>
      </div>
    </div>
    
    <div class="col-md-8">
      <div class="row">
        <div class="card_center" id="card2">
        <form method="post" action="personinfo-api.php">
          <div class="row">
            <div class="col-md-3">
              <img src="image/account.png" alt="Avatar" style="width: 10em; border-radius: 50%;">
            </div>
            <div class="col-md-9 group1">
              <div class="row">
                <div class="col-md-4"><span>姓名: <input type="text" name="newname" style="width: 7em; height: 2em;" value=<?php echo $result[0]['name'] ; ?>></span></div>
                <div class="col-md-5"><span>電話號碼: <input type="text" name="newphonenumber" style="width: 9em; height: 2em;" value=<?php echo $result[0]['phonenumber'] ; ?>></span></div>
                <div class="col-md-3"><span>性別: <?php echo $result[0]['gender'] ; ?></span></div>
              </div>
              <div class="row">
                <div class="col-md-4"><span>生日: <input type="date" name="newbdate" style="width: 9.2em; height: 2em;" value=<?php echo $result[0]['bdate'] ; ?>></span></div>
                <div class="col-md-7">電子信箱: <?php echo $result[0]['email'] ; ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="card" id="card3">
          <div class="row">
            <div class="col-md-3">
              <i class="material-icons" id="done">done</i>
            </div>
            <div class="col-md-8">
              <div style="font-size: 22px; font-weight: bolder; color: #548687;" id="idCard">學生證已通過驗證</div>
              <div class=" row group2">
                <div class="col-md-4">
                  <div>學校: <?php echo $result[0]['university'] ; ?></div>
                  <div>學號: <?php echo $result[0]['stdId'] ; ?></div>
                  <div>系所: <?php echo $result[0]['major'] ; ?></div>
                </div>
                <div class="col-md-6">
                  <div>偏好面交地點: <span><select name="prefer_loc">
                        <option></option>
                        <option>逢甲大門</option>
                        <option>福星宿舍</option>
                        <option>逢甲東門停車場</option>
                      </select></span></div>
                      <div>是否公開學校: <span><input type="radio" name="choose" value="Taipei"> 是
                      <input type="radio" name="choose" value="Taoyuan"> 否</span></div>
                 </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--This is button-->
  <div id="store" style="margin-bottom: 5em;">
    <button type="submit" class="btn btn-success button1">儲存更改</button>
    <button type="button" class="btn btn-secondary button1" onclick="javascript:location.href='http://localhost/eric12345566/src/user/homepage.php'">取消</button>
  </div>
</form>
  

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