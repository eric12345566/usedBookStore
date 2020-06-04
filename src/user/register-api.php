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
  $stdId_img = $_POST['stdId_img'];
  
  //判斷是否填寫
  if($name == "" || $password == "") {
    echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."請填寫完成！"."\"".")".";"."</script>";
    echo "<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://localhost/eric12345566/src/user/register.php"."\""."</script>";    
    exit;
  }
  
  //驗證資料格式
  if(preg_match('/^[A-Za-z0-9]*[A-Z]+[A-Za-z0-9]*[0-9]+[A-Za-z0-9]*$/', $password)) {
     if(preg_match('/^09[0-9]{8}$/' , $phonenumber)) {
        if(preg_match('/^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$/',$email)) {
          if(preg_match('/^[A-Za-z0-9]*[A-Z]+[A-Za-z0-9]*[0-9]+[A-Za-z0-9]*$/',$stdId)) {
            if($gender == '男' || $gender == '女' ) {
              if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$name)) {
                $repeat_email = $db->execute("SELECT * FROM generaluser WHERE email = ? ;", array($email));
                if($db->getRowCount() == 0) {
                    $hash_password = password_hash($password, PASSWORD_BCRYPT);
                    $result = $db->execute("INSERT INTO generaluser (username, email, password, name, phonenumber, gender, bdate, university, major, stdId ,stdId_img) VALUES ( ?,?,?,?,?,?,?,?,?,?,?)",array($username,$email,$hash_password,$name,$phonenumber,$gender,$bdate,$university,$major,$stdId,$stdId_img));
                    echo $db->getErrorMessage();
                    if($db->getRowCount()) {
                      echo "註冊成功";
                   } else { 
                     echo "註冊失敗";
                   } 
              } else {
                echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."該信箱已被註冊過!"."\"".")".";"."</script>";
                echo "<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://localhost/eric12345566/src/user/register.php"."\""."</script>";
                exit;  
              }
             } else {
               echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."姓名不可有特殊字元或英文"."\"".")".";"."</script>";
               echo "<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://localhost/eric12345566/src/user/register.php"."\""."</script>";
               exit;   
            }
          } else {
            echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."請填寫正確性別"."\"".")".";"."</script>";
            echo "<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://localhost/eric12345566/src/user/register.php"."\""."</script>";
            exit;
           }  
          } else {
            echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."學號錯誤"."\"".")".";"."</script>";
            echo "<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://localhost/eric12345566/src/user/register.php"."\""."</script>";
            exit;
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
