<?php
  session_start();
  require __DIR__ . '/../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }
 ?>
<!doctype html>
<html lang="zh-tw">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

  <link rel="stylesheet" href="./style/base.css">
  <link rel="stylesheet" href="./style/accounts.css">
  <title>用戶管理 - Admin Dashboard</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Admin Board</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <span class="navbar-text user-name">
            <svg class="bi bi-emoji-sunglasses" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
              <path fill-rule="evenodd"
                d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM6.5 6.497V6.5h-1c0-.568.447-.947.862-1.154C6.807 5.123 7.387 5 8 5s1.193.123 1.638.346c.415.207.862.586.862 1.154h-1v-.003l-.003-.01a.213.213 0 0 0-.036-.053.86.86 0 0 0-.27-.194C8.91 6.1 8.49 6 8 6c-.491 0-.912.1-1.19.24a.86.86 0 0 0-.271.194.213.213 0 0 0-.036.054l-.003.01z" />
              <path d="M2.31 5.243A1 1 0 0 1 3.28 4H6a1 1 0 0 1 1 1v1a2 2 0 0 1-2 2h-.438a2 2 0 0 1-1.94-1.515L2.31 5.243zM9 5a1 1 0 0 1 1-1h2.72a1 1 0 0 1 .97 1.243l-.311 1.242A2 2 0 0 1 11.439 8H11a2 2 0 0 1-2-2V5z" />
            </svg>
            你好, <?php echo $_SESSION['adminName']; ?>
          </span>
          <li class="nav-item">
            <a class="nav-link" href="./logout.php">登出</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <section id="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-2">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" href="./index.php" role="tab"><svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
              </svg> 儀表板</a>
            <a class="nav-link active" href="./accounts.php" role="tab">
              <svg class="bi bi-people" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zm7.973.056v-.002.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
              </svg>
              用戶管理
            </a>
            <a class="nav-link" href="./index.php" role="tab"><svg class="bi bi-cart3" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
              </svg> 訂單管理</a>
            <a class="nav-link" href="./product.php" role="tab"> <svg class="bi bi-gift" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M2 6v8.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V6h1v8.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V6h1zm8-5a1.5 1.5 0 0 0-1.5 1.5c0 .098.033.16.12.227.103.081.272.15.49.2A3.44 3.44 0 0 0 9.96 3h.015L10 2.999l.025.002h.014A2.569 2.569 0 0 0 10.293 3c.17-.006.387-.026.598-.073.217-.048.386-.118.49-.199.086-.066.119-.13.119-.227A1.5 1.5 0 0 0 10 1zm0 3h-.006a3.535 3.535 0 0 1-.326 0 4.435 4.435 0 0 1-.777-.097c-.283-.063-.614-.175-.885-.385A1.255 1.255 0 0 1 7.5 2.5a2.5 2.5 0 0 1 5 0c0 .454-.217.793-.506 1.017-.27.21-.602.322-.885.385a4.434 4.434 0 0 1-1.104.099H10z" />
                <path fill-rule="evenodd"
                  d="M6 1a1.5 1.5 0 0 0-1.5 1.5c0 .098.033.16.12.227.103.081.272.15.49.2A3.44 3.44 0 0 0 5.96 3h.015L6 2.999l.025.002h.014l.053.001a3.869 3.869 0 0 0 .799-.076c.217-.048.386-.118.49-.199.086-.066.119-.13.119-.227A1.5 1.5 0 0 0 6 1zm0 3h-.006a3.535 3.535 0 0 1-.326 0 4.435 4.435 0 0 1-.777-.097c-.283-.063-.614-.175-.885-.385A1.255 1.255 0 0 1 3.5 2.5a2.5 2.5 0 0 1 5 0c0 .454-.217.793-.506 1.017-.27.21-.602.322-.885.385a4.435 4.435 0 0 1-1.103.099H6zm1.5 12V6h1v10h-1z" />
                <path fill-rule="evenodd" d="M15 4H1v1h14V4zM1 3a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1z" />
              </svg> 商品管理</a>
            <a class="nav-link" href="./tag.php" role="tab"><svg class="bi bi-tag" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M.5 2A1.5 1.5 0 0 1 2 .5h4.586a1.5 1.5 0 0 1 1.06.44l7 7a1.5 1.5 0 0 1 0 2.12l-4.585 4.586a1.5 1.5 0 0 1-2.122 0l-7-7A1.5 1.5 0 0 1 .5 6.586V2zM2 1.5a.5.5 0 0 0-.5.5v4.586a.5.5 0 0 0 .146.353l7 7a.5.5 0 0 0 .708 0l4.585-4.585a.5.5 0 0 0 0-.708l-7-7a.5.5 0 0 0-.353-.146H2z" />
                <path fill-rule="evenodd" d="M2.5 4.5a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm2-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
              </svg> 分類標籤管理</a>
            <a class="nav-link" href="./index.php" role="tab"><svg class="bi bi-card-list" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                <circle cx="3.5" cy="5.5" r=".5" />
                <circle cx="3.5" cy="8" r=".5" />
                <circle cx="3.5" cy="10.5" r=".5" />
              </svg> 學校列表管理</a>
            <a class="nav-link" href="./admin.php" role="tab"> <svg class="bi bi-gear" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
              </svg> 管理者帳號</a>
          </div>
        </div>
        <div class="col-10">
          <section id="header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <h2>用戶管理</h2>
                </div>
              </div>
            </div>
          </section>
          <!-- user account info Modal -->
          <div class="modal fade" id="account-info" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <form action="./API/accounts/accounts-update.php" method="post">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">查看/修改管理者帳號</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>使用者帳號</label>
                      <input type="text" class="form-control" id="info-username" disabled>
                      <input type="hidden" name="username" class="form-control" id="info-username-post">
                      <div class="invalid-feedback">帳號格式錯誤</div>
                    </div>
                    <div class="form-group">
                      <label>名稱</label>
                      <input type="text" name="name" class="form-control" id="info-name">
                    </div>
                    <div class="form-group">
                      <label>Email address</label>
                      <input type="email" name="email" class="form-control" id="info-email" aria-describedby="emailHelp" required>
                      <div class="invalid-feedback">電子郵件格式錯誤</div>
                    </div>
                    <div class="form-group">
                      <label>密碼</label>
                      <input type="password" name="password" class="form-control" id="info-password">
                      <div class="invalid-feedback">密碼格式錯誤 - 4~50字元，至少一個特殊符號，至少一個大小寫、0~9數字</div>
                    </div>
                    <div class="form-group">
                      <label>生日</label>
                      <input id="info-bdate" type="date" name="bdate">
                    </div>
                    <div class="form-group">
                      <label>電話號碼</label>
                      <input type="text" name="phonenumber" class="form-control" id="info-phonenumber" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">性別</label>
                      <select class="form-control" id="info-gender" name="gender">
                        <option>M</option>
                        <option>F</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">學號</label>
                      <input type="text" name="stdId" class="form-control" id="info-stdId" required>
                    </div>
                    <div class="form-group">
                      <label>大學</label>
                      <input type="text" name="uiversity" class="form-control" id="info-uiversity" required>
                    </div>
                    <div class="form-group">
                      <label>系所</label>
                      <input type="text" name="major" class="form-control" id="info-major" required>
                    </div>
                    <div class="form-group">
                      <label>學生證是否驗證</label>
                      <select class="form-control" id="info-authen" name="stdauthen">
                        <option>0</option>
                        <option>1</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>是否為賣家</label>
                      <select class="form-control" id="info-sflag" name="sflag">
                        <option>0</option>
                        <option>1</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>地址</label>
                      <input type="text" name="address" class="form-control" id="info-address">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">商家名</label>
                      <input type="text" name="register_name" class="form-control" id="info-registername">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">負責人</label>
                      <input type="text" name="man_in_charge" class="form-control" id="info-manincharge">
                    </div>
                    <div class="form-group">
                      <label>審核管理員</label>
                      <p id="info-checkadmin"></p>
                    </div>
                    <img id="info-userphoto"/>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete">刪除</button>
                    <button type="submit" class="btn btn-primary">送出</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <section id="user-list">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <table class="table" id="myTable">
                    <thead class="thead-dark">
                      <tr>
                        <th>帳號</th>
                        <th>姓名</th>
                        <th>大學</th>
                        <th>學系</th>
                        <th>是否通過驗證</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>ericlion</th>
                        <td>施冠彰</td>
                        <td>逢甲大學</td>
                        <td>正常</td>
                        <td>正常</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var table = $('#myTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "./API/accounts/accounts-table.php"
      });

      $('#myTable tbody').on('click', 'tr', function() {
        var data = table.row(this).data();
        //alert('You clicked on ' + data[0] + '\'s row');
        $('#account-info').modal('show');
        $.ajax({
          type: 'GET',
          url: './API/accounts/accounts-info.php',
          dataType: 'json',
          data: {
            uid: data[0]
          },
          complete: function() {
            console.log("complete");
          },
          success: function(msg) {
            console.log(msg);

            // username
            $('#info-username').val(msg[0].username);
            $('#info-username-post').val(msg[0].username);

            // Name
            $('#info-name').val(msg[0].name);

            //email
            $('#info-email').val(msg[0].email);

            //PASSWORD
            // $('#info-password').val(msg[0].password);

            //bdate
            $('#info-bdate').val(msg[0].bdate);

            //phonenumber
            $('#info-phonenumber').val(msg[0].phonenumber);

            //gender
            $('#info-gender').val(msg[0].gender);

            //學號
            $('#info-stdId').val(msg[0].stdId);

            //大學
            $('#info-uiversity').val(msg[0].uuiversity);

            //系所
            $('#info-major').val(msg[0].major);

            //學生證是否驗證
            $('#info-authen').val(msg[0].std_authen);

            //是否為賣家
            $('#info-sflag').val(msg[0].s_flag);

            //地址
            $('#info-address').val(msg[0].address);

            // 商家名
            $('#info-registername').val(msg[0].register_name);

            // 負責人
            $('#info-manincharge').val(msg[0].man_in_charge);

            // 審核管理員
            $('#info-checkadmin').text(msg[0].Admin_name);

            // 學生證
            imgsrc = `data:image/jpeg;base64,${msg[0].stdId_img}`;
            $('#info-userphoto').attr("src", imgsrc);
          },
          error: function(msg) {
            console.log(msg);
          }
        });
      });
    });
  </script>
</body>

</html>
