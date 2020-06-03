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
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $bdate = $_POST['bdate'];
  $university = $_POST['university'];
  $major = $_POST['major'];
  $stdId = $_POST['stdId'];
  
  //判斷是否填寫
  if($name == "" || $password == "") {
    echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."請填寫完成！"."\"".")".";"."</script>";
    echo "<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://localhost/eric12345566/src/user/register.php"."\""."</script>";    
    exit;
  }
  
  //驗證資料格式
  if(preg_match('/^[A-Za-z0-9]*[A-Z]+[A-Za-z0-9]*[0-9]+[A-Za-z0-9]*$/', $password)) {
     if(preg_match('/^09[0-9]{8}$/' , $phone)) {
        if(preg_match('/^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$/',$email)) {
          $result = $db->execute("INSERT INTO generaluser (username,email, password, name, phone, gender, bdate, university, major, stdId) VALUES ( ?,?,?,?,?,?,?,?,?,?)",array($username.$email,$password,$name,$phone,$gender,$bdate,$university,$major,$stdId));
          echo $db->getLastId();
          if($result) {
             echo "註冊成功";
            } else { 
              echo "註冊失敗";
            }  
        } else {
          echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."信箱格式錯誤"."\"".")".";"."</script>";
          echo "<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://localhost/eric12345566/src/user/register.php"."\""."</script>";
          exit;
        } 
     } else {
         echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."手機格式錯誤"."\"".")".";"."</script>";
         echo "<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://localhost/eric12345566/src/user/register.php"."\""."</script>";
         exit; 
       }
  } else {
     echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."密碼格式錯誤"."\"".")".";"."</script>";
     echo "<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://localhost/eric12345566/src/user/register.php"."\""."</script>";     
     exit;
  }
  
?>
