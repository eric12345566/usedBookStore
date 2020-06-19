<?php
  require __DIR__ . '/../vendor/autoload.php';

  // 建立 Session
  session_start();
  $_SESSION['username'] = "user1";
  if (!isset($_SESSION['username'])) {
    header("Location: login.php");
  }

  // 獲取資料庫連線 DAO
  $db = Database::get();

  $pid=$_GET["pid"];

  $username = $_SESSION['username'];
  //http://127.0.0.1/ub/src/user/TransactionOrder-new-api.php?pid=6
  $book = $db->execute("SELECT * FROM book_product WHERE product_no = ?;", array($pid));
  if($book[0]['username'] == $username){
    echo "<script type='text/javascript'>alert('不可以買自己的書喔！');</script>";
    header("Location: Book_information.php?product_no=".$pid);
  }else{
    if($db->getRowCount() > 0){
      $db->execute("INSERT INTO p_order (p_username, s_username, order_status) VALUES (?,?,?)", array($username, $book[0]['username'], "已媒合等待交書"));
      if($db->getRowCount() > 0){
        $order_id = $db->getLastId();
        $db->execute("INSERT INTO items (product_no, order_no, price, amount) VALUES (?, ?, ?, ?);", array($pid, $order_id, $book[0]['price'], 1));
        if($db->getRowCount() > 0){
          header("Location: TransactionOrder.php?id=" . $order_id);
        }else{
          echo "出事了啊杯";
          die();
        }
      }else{
        echo "出事了啊杯";
        die();
      }
  
    }else{
      echo "出事了啊杯";
      die();
    }
  }
  
  

?>
