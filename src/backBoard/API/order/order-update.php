<?php
  session_start();
  require __DIR__ . '/../../../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }


    $order_no = $_POST['order_no'];
    $order_status = $_POST['order_status'];

    $isError = false;

  $db = Database::get();
  if ($isError) {
      header("Location: ../../order.php?errorupdatemsg=" . $error_msg);
  } else {
      $result =  $db->execute("UPDATE p_order SET order_status=? WHERE order_no=?", array($order_status, $order_no));
      
      if ($db->getRowCount() > 0) {
          header("Location: ../../order.php");
      }else{
        echo $db->getRowCount();
        echo $db->getErrorMessage();
        echo "出事情了啊杯";
        die();
      }
  }
