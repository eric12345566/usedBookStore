<?php
  session_start();
  require __DIR__ . '/../../../vendor/autoload.php';
  if (!isset($_SESSION['adminName'])) {
      header("Location: http://" . Server::serverUrl . Server::prefixUrl . "/backboard/login.php");
  }


  $product_no = $_POST['product_no'];
  $book_name = $_POST['book_name'];
  $ISBN = $_POST['ISBN'];
  $publisher = $_POST['publisher'];
  $publish_date = $_POST['publish_date'];
  $price = $_POST['price'];
  $avialiable = $_POST['avialiable'];
  $b_language = $_POST['b_language'];
  $exterior = $_POST['exterior'];
  $stock = $_POST['stock'];
  $author = $_POST['author'];
  $introduce = $_POST['introduce'];

  $isError = false;

  $db = Database::get();
  if ($isError) {
      header("Location: ../../product.php?errorupdatemsg=" . $error_msg);
  } else {
      $result =  $db->execute("UPDATE book_product SET book_name=?, ISBN=?, publisher=?, publish_date=?, price=?, avialiable=?, b_language=?, exterior=?, stock=?, author=?, introduce=? WHERE product_no=?", array($book_name, $ISBN, $publisher, $publish_date, $price, $avialiable, $b_language, $exterior, $stock, $author, $introduce, $product_no));
      // echo $db->getRowCount();
      // echo $db->getErrorMessage();
      if ($db->getRowCount()) {
          header("Location: ../../product.php");
      }
  }
