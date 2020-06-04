<!doctype html>
<html lang="zh-tw">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/base.css">
    <link rel="stylesheet" href="./style/accounts.css">
    <title>用戶管理 - Admin Dashboard</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Admin Board</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <span class="navbar-text user-name">
              <svg class="bi bi-emoji-sunglasses" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM6.5 6.497V6.5h-1c0-.568.447-.947.862-1.154C6.807 5.123 7.387 5 8 5s1.193.123 1.638.346c.415.207.862.586.862 1.154h-1v-.003l-.003-.01a.213.213 0 0 0-.036-.053.86.86 0 0 0-.27-.194C8.91 6.1 8.49 6 8 6c-.491 0-.912.1-1.19.24a.86.86 0 0 0-.271.194.213.213 0 0 0-.036.054l-.003.01z"/>
                <path d="M2.31 5.243A1 1 0 0 1 3.28 4H6a1 1 0 0 1 1 1v1a2 2 0 0 1-2 2h-.438a2 2 0 0 1-1.94-1.515L2.31 5.243zM9 5a1 1 0 0 1 1-1h2.72a1 1 0 0 1 .97 1.243l-.311 1.242A2 2 0 0 1 11.439 8H11a2 2 0 0 1-2-2V5z"/>
              </svg>
                你好, Eric
            </span>
            <li class="nav-item">
              <a class="nav-link" href="#">登出</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link" href="./index.php" role="tab" >儀表板</a>
              <a class="nav-link active" href="./accounts.php" role="tab" >用戶管理</a>
              <a class="nav-link" href="./index.php" role="tab" >訂單管理</a>
              <a class="nav-link" href="./index.php" role="tab" >商品管理</a>
              <a class="nav-link" href="./index.php" role="tab" >分類標籤管理</a>
              <a class="nav-link" href="./index.php" role="tab" >學校列表管理</a>
              <a class="nav-link" href="./index.php" role="tab" >管理者帳號</a>
            </div>
          </div>
          <div class="col-9">
            <section id="header">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <h2>用戶管理</h2>
                  </div>
                </div>
              </div>
            </section>
            <section id="user-list">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Username</th>
                    <th scope="col">姓名</th>
                    <th scope="col">學校</th>
                    <th scope="col">帳號狀態</th>
                    <th scope="col">身份驗證狀態</th>
                    <th scope="col">操作</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">ericlion</th>
                    <td>施冠彰</td>
                    <td>逢甲大學</td>
                    <td>正常</td>
                    <td>已驗證</td>
                    <td><a href="#">詳細資料</a></td>
                  </tr>
                  <tr>
                    <th scope="row">ericlion</th>
                    <td>施冠彰</td>
                    <td>逢甲大學</td>
                    <td>正常</td>
                    <td>已驗證</td>
                    <td><a href="#">詳細資料</a></td>
                  </tr>
                  <tr>
                    <th scope="row">ericlion</th>
                    <td>施冠彰</td>
                    <td>逢甲大學</td>
                    <td>正常</td>
                    <td>已驗證</td>
                    <td><a href="#">詳細資料</a></td>
                  </tr>
                  <tr>
                    <th scope="row">ericlion</th>
                    <td>施冠彰</td>
                    <td>逢甲大學</td>
                    <td>正常</td>
                    <td>已驗證</td>
                    <td><a href="#">詳細資料</a></td>
                  </tr>
                  <tr>
                    <th scope="row">ericlion</th>
                    <td>施冠彰</td>
                    <td>逢甲大學</td>
                    <td>正常</td>
                    <td>已驗證</td>
                    <td><a href="#">詳細資料</a></td>
                  </tr>
                  <tr>
                    <th scope="row">ericlion</th>
                    <td>施冠彰</td>
                    <td>逢甲大學</td>
                    <td>正常</td>
                    <td>已驗證</td>
                    <td><a href="#">詳細資料</a></td>
                  </tr>
                </tbody>
              </table>
            </section>

          </div>
        </div>
      </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
