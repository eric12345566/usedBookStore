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

  if ( $_FILES["book_img"]["size"] > 0  &&  $_FILES["book_img"]["size"] < 10000000){
    //開啟圖片檔
    $file = fopen($_FILES["book_img"]["tmp_name"], "rb");
    // 讀入圖片檔資料
    $fileContents = fread($file, filesize($_FILES["book_img"]["tmp_name"]));
    //關閉圖片檔
    fclose($file);
    // 圖片檔案資料編碼
    $fileContents = base64_encode($fileContents);
    } else {
      echo "<script>alert('警告: 檔案過大，無法儲存'); location.href = 'http://localhost/eric12345566/src/user/register.php';history.go(-1);</script>";
      exit;
    }
    
  $result1 = $db->execute("INSERT INTO photo (product_no,photo_no,base64) VALUES(?,?,?)",array(10,1,$filecontents)) ;
  $result = $db->execute("INSERT INTO book_product (book_name,ISBN,publisher,avialiable,price,b_language,publish_date,exterior,stock,author,introduce,username,set_time) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)"
            ,array($book_name,$ISBN,$publisher,1,$price,$b_language,$publish_date,$exterior,$stock,$author,$introduce,$_SESSION['username'],NULL));
  
  if($db->getRowCount()) {
    echo "新增書本商品成功";
    header("Location: seller_baseinformation_product.php");
  } else {
    echo $db->getErrorMessage();  
  }


?>
