<?php
  require __DIR__ . '/../vendor/autoload.php';

  // 建立 Session
  session_start();

  // 獲取資料庫連線 DAO
  $db = Database::get();

  // 取得POST登入資料
  $username = $_POST['username'];
  $password = $_POST['password'];

  // 查詢資料庫

  // TODO: 針對使用者POST的資料做安全性過濾，再傳入 SQL 裡 query
  //$hash = password_hash('qazzaqqaz', PASSWORD_DEFAULT, ['cost' => 11]);
  //echo $hash;
  //有安全疑慮的寫法 $result = $db->execute("SELECT * FROM user WHERE username = " . "'" . $username. "'" . " AND password = " . "'" . $password . "';");
  $result = $db->execute("SELECT * FROM generaluser WHERE username = ?;", array($username));
  if ($db->getRowCount()) {
      if (password_verify($password, $result[0]["password"])) {
          echo "歡迎登入，". $username;
          // username 註冊到 session 變數?>
          <script type="text/javascript">window.location.href="homepage.php"</script>; //重新導向
          <?php
          $_SESSION['username'] = $result[0]['username'];
      } else {
          //echo '<script type="text/javascript">alert("登入失敗!密碼錯誤！");</script>';?>
  <script type="text/javascript">window.location.href="login.php"</script>; //重新導向
  <?php
      }
  } else {
      echo '<script type="text/javascript">alert("登入失敗!請確認帳號或密碼");</script>'; ?>
<script type="text/javascript">window.location.href="login.php"</script>; //重新導向
<?php
  }
