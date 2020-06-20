<?php
  require __DIR__ . '/../vendor/autoload.php';

  // 建立 Session
  session_start();
  if (!isset($_SESSION['username'])) {
    header("Location: login.php");
  }

  // 獲取資料庫連線 DAO
  $db = Database::get();

  $id=$_GET["id"];
  $op=$_GET["op"];

  if($op == 1){
    $db->execute("UPDATE p_order SET order_status=? WHERE order_no=?", array("已交貨結案", $id));
  }else if($op == 2){
    $db->execute("UPDATE p_order SET order_status=? WHERE order_no=?", array("買賣家取消訂單", $id));
  }else if($op == 3){
    $db->execute("UPDATE p_order SET order_status=? WHERE order_no=?", array("因爽約取消", $id));
  }else{
    echo "還敢亂玩啊";
    die();
  }

  if($db->getRowCount() > 0){
    header("Location: TransactionOrder.php?id=" . $id);
  }else{
    echo "出事了啊杯";
    die();
  }

?>
