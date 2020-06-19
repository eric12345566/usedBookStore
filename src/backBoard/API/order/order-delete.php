<?php
  session_start();
  header('Content-Type: application/json; charset=UTF-8');
  require __DIR__ . '/../../../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }

  $order_no = $_GET['oid'];

  $db = Database::get();
  $result = $db->execute("DELETE FROM p_order WHERE order_no = ?;", array($order_no));
  // echo $db->getRowCount();
  // echo $db->getErrorMessage();
  if ($db->getRowCount() > 0) {
      $data_json = json_encode($result);
      echo $data_json;
  }else{
      echo "出事情了啊杯";
  }
