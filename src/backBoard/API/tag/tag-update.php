<?php
  session_start();
  require __DIR__ . '/../../../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }


    $Class_name = $_POST['Class_name'];
    $old_cname = $_POST['old_cname'];

    $isError = false;

  $db = Database::get();
  if ($isError) {
      header("Location: ../../tag.php?errorupdatemsg=" . $error_msg);
  } else {
      $result =  $db->execute("UPDATE tag SET Class_name=? WHERE Class_name=?", array($Class_name, $old_cname));
      
      if ($db->getRowCount() > 0) {
          header("Location: ../../tag.php");
      }else{
        echo $db->getRowCount();
        echo $db->getErrorMessage();
        echo "出事情了啊杯";
        die();
      }
  }
