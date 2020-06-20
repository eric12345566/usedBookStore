<?php
  require __DIR__ . '/../vendor/autoload.php';

  // 建立 Session
  session_start();

  // 獲取資料庫連線 DAO
  $db = Database::get();

  $book_name = $_POST['book_name'];
  $author = $_POST['author'];
  $ISBN = $_POST['ISBN'];
  $publish_date = $_POST['publish_date'];
  $b_language = $_POST['b_language'];		
  $class_name = $_POST['class_name'];
  $stock = $_POST['stock'];
  $exterior = $_POST['exterior'];
  $introduce = $_POST['introduce'];
  $price = $_POST['price'];
  $publisher = $_POST['publisher'];

  $result = $db->execute("INSERT INTO book_product (book_name,ISBN,publisher,avialiable,price,b_language,publish_date,exterior,stock,author,introduce,username,set_time) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)"
            ,array($book_name,$ISBN,$publisher,1,$price,$b_language,$publish_date,$exterior,$stock,$author,$introduce,$_SESSION['username'],NULL));
  
  if($db->getRowCount()) {
    echo "新增書本商品成功";
    header("Location: seller_baseinformation_product.php");
  } else {
    echo $db->getErrorMessage();  
  }


?>
