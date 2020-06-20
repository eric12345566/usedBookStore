<?php
  require __DIR__ . '/../../vendor/autoload.php';
  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];

  function GetIP(){
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
     $cip = $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
     $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif(!empty($_SERVER["REMOTE_ADDR"])){
     $cip = $_SERVER["REMOTE_ADDR"];
    }
    else{
     $cip = "無法取得IP位址！";
    }
    return $cip;
   }

  $db = Database::get();
  $result = $db->execute("SELECT * from Admin Where Admin_name = ?", array($username));
  if ($db->getRowCount() && password_verify($password, $result[0]['password'])) {
      $_SESSION['adminName'] = $username;
      $result = $db->execute("INSERT INTO admin_login_log (content, admin_name, ip) VALUES (?, ?, ?)", array("Login System",$username, GetIP()));
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/index.php");
  } else {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/error/login-error.php");
  }
