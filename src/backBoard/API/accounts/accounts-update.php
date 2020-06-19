<?php
  session_start();
  require __DIR__ . '/../../../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }


  $userName = $_POST['username'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $bdate = $_POST['bdate'];
  $phonenumber = $_POST['phonenumber'];
  $gender = $_POST['gender'];
  $stdId = $_POST['stdId'];
  $uiversity = $_POST['uiversity'];
  $major = $_POST['major'];
  $stdauthen = $_POST['stdauthen'];
  $sflag = $_POST['sflag'];
  $address = $_POST['address'];
  $register_name = $_POST['register_name'];
  $man_in_charge = $_POST['man_in_charge'];
  $hashPwd;
  $isError = false;
  $error_msg = "000"; // 1: adminName error, 2: email error, 3: password error

  $db = Database::get();
  if ($isError) {
      header("Location: ../../accounts.php?errorupdatemsg=" . $error_msg);
  } else {
      $hashPwd = password_hash($password, PASSWORD_DEFAULT);
      if ($password == "") {
          $result =  $db->execute("UPDATE GeneralUser SET name=?, bdate=?, phonenumber=?, gender=?, email=?, stdId=?, uuiversity=?, major=?, std_authen=?, s_flag=?, address=?, register_name=?, man_in_charge=? WHERE username=?", array($name, $bdate, $phonenumber, $gender, $email, $stdId, $uiversity, $major, $stdauthen, $sflag, $address, $register_name, $man_in_charge, $userName));
      } else {
          $result =  $db->execute("UPDATE GeneralUser SET name=?, password=?, bdate=?, phonenumber=?, gender=?, email=?, stdId=?, uuiversity=?, major=?, std_authen=?, s_flag=?, address=?, register_name=?, man_in_charge=? WHERE username=?", array($name, $password, $bdate, $phonenumber, $gender, $email, $stdId, $uiversity, $major, $stdauthen, $sflag, $address, $register_name, $man_in_charge, $userName));
      }

      if ($db->getRowCount()) {
          header("Location: ../../accounts.php");
      }
  }
