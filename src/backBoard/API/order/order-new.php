<?php
  session_start();
  require __DIR__ . '/../../../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }


  // $order_no = $_POST['order_no'];
  $p_username = $_POST['p_username'];
  $s_username = $_POST['s_username'];
  $order_status = $_POST['order_status'];
  $product_no = $_POST['product_no'];
  $amount = $_POST['amount'];
  //$build_date = $_POST['build_date'];
  //$complete_date = $_POST['complete_date'];
  $cancel_reason = $_POST['cancel_reason'];

  $isError = false;

  $db = Database::get();
  if ($isError) {
      header("Location: ../../order.php?errormsg=" . $error_msg);
  } else {
      $result =  $db->execute("INSERT INTO p_order (p_username, s_username, order_status, cancel_reason) VALUES (?, ?, ?, ?);", array($p_username, $s_username, $order_status, $cancel_reason));
      $order_no = $db->getLastId();
      // check p_user exist
      $db->execute("SELECT * FROM GeneralUser WHERE username=?", array($p_username));
      $p_userExist = $db->getRowCount();

      // check s_user exist
      $db->execute("SELECT * FROM GeneralUser WHERE username=?", array($s_username));
      $s_userExist = $db->getRowCount();
      if ($p_userExist > 0 && $s_userExist > 0) {
          if ($db->getRowCount() > 0) {
              
              $bookResult = $db->execute("SELECT * FROM book_product WHERE product_no=?", array($product_no));
              if ($db->getRowCount() > 0 && $bookResult[0]['avialiable'] == 1) {
                  if ($bookResult[0]['stock'] < $amount) {
                        echo "數量不足夠";
                        die();
                  }
                  $db->execute("INSERT INTO items (product_no, order_no, price, amount) VALUES (?, ?, ?, ?);", array($product_no, $order_no, $bookResult[0]['price'], $amount));
                  if ($db->getRowCount() > 0) {
                    $db->execute("UPDATE book_product SET stock = stock - 1 WHERE product_no=?", array($product_no));
                      if ($db->getRowCount() > 0) {
                          $bookResult = $db->execute("SELECT * FROM book_product WHERE product_no=?", array($product_no));
                          if ($bookResult[0]['stock'] == 0) {
                              $db->execute("UPDATE book_product SET avialiable = 0 WHERE product_no=?", array($product_no));
                              if ($db->getRowCount() == 0) {
                                  echo "錯誤發生，請聯絡資工系的猴子們";
                              } else {
                                  header("Location: ../../order.php");
                              }
                          } else {
                              header("Location: ../../order.php");
                          }
                      }
                  } else {
                      echo "錯誤發生，請聯絡資工系的猴子們";
                  }
              } else {
                  echo "沒有此編號的書或此書已下架";
              }
          } else {
              echo "錯誤發生，請聯絡資工系的猴子們";
          }
      } else {
          echo "沒有這個賣家（買家）帳號";
      }
  }
