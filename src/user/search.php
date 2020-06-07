<?php
  require __DIR__ . '/../vendor/autoload.php';
  $db = Database::get();

  $keyword=empty($_GET['keyword'])?'':$_GET['keyword'];
    if (!empty($keyword)) {
        $where='where book_name like "%'.$keyword.'%" ';
        $link="&keyword=".$keyword; //keyword為空 送回去
    } else {
        header("Location:homepage.php");
    }
  echo $keyword;
  $page_size = 5;
  $count = $db->execute("SELECT count(*) as C FROM book_product ".$where); //紀錄搜尋總數
  $amount = $count[0]["C"];
  if ($amount == 0) {
      echo "沒有搜尋結果";
  } else {
      $page_cnt = ceil($amount/$page_size);//紀錄頁面有幾個
      $page_num = empty($_GET['page'])?1:$_GET['page'];

      if ($page_cnt<=0) {
          $page_cnt = 1;
      } elseif ($page_cnt>$page_size) {
          $page_cnt = $page_size;
      }
      // TODO 拼接搜尋SQL 語句

      $limit="limit ".($page_num-1)*$page_size.",".$page_size;
      //echo $limit;
      echo "<br>";
      $sql = "SELECT * FROM book_product ".$where."ORDER BY product_no ".$limit;
      //echo $sql;
      $result = $db->execute($sql);
      if ($db->getRowCount()>0) {
          echo "有東西"; //TODO: 放Card顯示出來
      }
      echo "<a href='?page=1".$link."'>首頁</a>";
      if ($page_num>1) {
          echo "<a href='?page=".($page_num-1).$link."'>上一頁</a>";
      }
      if ($page_cnt>$page_num) {
          echo "<a href='?page=".($page_num+1).$link."'>下一頁</a>";
      }
      if ($page_num>1) {
          echo "<a href='?page=".($page_cnt-1).$link."'>最後一頁</a>";
      }
      //echo $result[0]["book_name"]; 測試資料輸出
      echo "<br/>";
      echo "當前第".$page_num."頁 共".$page_cnt."頁本  有".(($page_num!=$page_cnt||$amount%$page_size==0)?$page_size:($amount%$page_size))."條資料  共".$amount."條資料";
      echo "<br/>";

      if ($page_num>6) {
          //如果訪問的當前頁碼>=7的，應該7-5=2開始，最大顯示到7+4=11；
          for ($i=($page_num-5);$i<=($page_num+4);$i++) {
              echo "<a class='page' href='?page=".$i."'>".$i."</a>";
          }
      } else {
          //當前頁碼小於6，判斷頁總數是否大於10，如果10，最多顯示10個頁碼，否則等於$page_count個頁碼
          if ($page_cnt<=10) {
              $size=$page_cnt;
          } else {
              $size=10;
          }
          for ($i=1;$i<=$size;$i++) {
              echo "<a class='page' href='?page=".$i."'>".$i."</a>  ";
          }
      }
  }
