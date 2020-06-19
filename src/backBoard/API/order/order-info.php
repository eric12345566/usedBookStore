<?php
  session_start();
  header('Content-Type: application/json; charset=UTF-8');
  require __DIR__ . '/../../../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }

  $order_no = $_GET['oid'];

  $db = Database::get();
  $result = $db->execute("SELECT * FROM p_order WHERE order_no = ?;", array($order_no));
  $item = $db->execute("SELECT * FROM items WHERE order_no = ?;", array($order_no));
  if ($db->getRowCount() > 0) {
      $result[0]['item'] = $item;
      $data_json = json_encode($result);
      echo $data_json;
  }else{
      echo "出現錯誤，請聯絡資工系的猴子學生們";
      die();
  }
