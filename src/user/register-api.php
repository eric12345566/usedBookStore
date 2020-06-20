<?php
  require __DIR__ . '/../vendor/autoload.php';

  // 建立 Session
  session_start();

  // 獲取資料庫連線 DAO
  $db = Database::get();

  // 取得POST註冊資料
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $phonenumber = $_POST['phonenumber'];
  $gender = $_POST['gender'];
  $bdate = $_POST['bdate'];
  $university = $_POST['university'];
  $major = $_POST['major'];
  $stdId = $_POST['stdId'];
  
  //判斷是否填寫
  if($name == "" || $password == "") {
    echo "<script>alert('警告: 姓名及密碼不能為空'); location.href = 'http://localhost/eric12345566/src/user/register.php';history.go(-1);</script>";
    exit;
  }

  if ( $_FILES["stdId_img"]["size"] > 0 &&  $_FILES["stdId_img"]["size"] < 6000000){
  //開啟圖片檔
  $file = fopen($_FILES["stdId_img"]["tmp_name"], "rb");
  // 讀入圖片檔資料
  $fileContents = fread($file, filesize($_FILES["stdId_img"]["tmp_name"]));
  //關閉圖片檔
  fclose($file);
  // 圖片檔案資料編碼
  $fileContents = base64_encode($fileContents);
  } else {
    echo "<script>alert('警告: 檔案過大，無法儲存'); location.href = 'http://localhost/eric12345566/src/user/register.php';history.go(-1);</script>";
    exit;
  }

 //驗證資料格式
  if(preg_match('/^(?!.*[^\x21-\x7e])(?=.{4,50})(?=.*[\W])(?=.*[a-zA-Z])(?=.*\d).*$/', $password)) {
     if(preg_match('/^09[0-9]{8}$/' , $phonenumber)) {
        if(preg_match('/^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$/',$email)) {
           if(preg_match('/^D{1}[0-9]{7}/',$stdId)) {
              if($gender == '男' || $gender == '女' ) {
                 if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$name)) {
                    $repeat_email = $db->execute("SELECT * FROM generaluser WHERE email = ? ;", array($email));
                   if($db->getRowCount() == 0) {
                    $repeat_name = $db->execute("SELECT * FROM generaluser WHERE username = ? ;", array($username));
                   if($db->getRowCount() == 0) {
                    $hash_password = password_hash($password, PASSWORD_DEFAULT,['cost' => 11]);
                    $result = $db->execute("INSERT INTO generaluser (username, email, password, name, phonenumber, gender, bdate, uuiversity, major, stdId ,stdId_img) VALUES ( ?,?,?,?,?,?,?,?,?,?,?)",array($username,$email,$hash_password,$name,$phonenumber,$gender,$bdate,$university,$major,$stdId,$fileContents));
                   if($db->getRowCount()) {
                      echo "<script>alert('註冊成功'); location.href = 'login.php';</script>";
                   } else {
                      echo "註冊失敗";
                      echo $db->getErrorMessage();
                   }
                  } else {
                    echo "<script>alert('警告: 該使用者名稱已被註冊!'); location.href = 'http://localhost/eric12345566/src/user/register.php';history.go(-1);</script>";
                    exit;
                  }
                } else {
                echo "<script>alert('警告: 該信箱已被註冊!'); location.href = 'http://localhost/eric12345566/src/user/register.php';history.go(-1);</script>";
                exit;
              }
             } else {
               echo "<script>alert('警告: 姓名不可有特殊字元英文'); location.href = 'http://localhost/eric12345566/src/user/register.php';history.go(-1);</script>";
               exit;
            }
          } else {
            echo "<script>alert('警告: 請填寫正確性別'); location.href = 'http://localhost/eric12345566/src/user/register.php';history.go(-1);</script>";
            exit;
           }
          } else {
            echo "<script>alert('警告: 學號格式錯誤'); location.href = 'http://localhost/eric12345566/src/user/register.php';history.go(-1);</script>";
            exit;
          }
        } else {
          echo "<script>alert('警告: 信箱格式錯誤'); location.href = 'http://localhost/eric12345566/src/user/register.php';history.go(-1);</script>";
          exit;
        }
     } else {
       echo "<script>alert('警告: 手機格式錯誤'); location.href = 'http://localhost/eric12345566/src/user/register.php';history.go(-1);</script>";
       exit;    
    }
   } else {
     echo "<script>alert('警告: 密碼格式錯誤'); location.href = 'http://localhost/eric12345566/src/user/register.php';history.go(-1);</script>";
     exit;
  }

?>
