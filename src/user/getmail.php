<?php
  require __DIR__ . '/../vendor/autoload.php';
  $db = Database::get();
  /**
   *
   */
   class randomtoken
   {
       public function getrand_id()
       {
           $id_len = 10;//字串長度
           $id = '';
           $word = 'abcdefghijkmnpqrstuvwxyz23456789';//字典檔 你可以將 數字 0 1 及字母 O L 排除
       $len = strlen($word);//取得字典檔長度

       for ($i = 0; $i < $id_len; $i++) { //總共取 幾次
           $id .= $word[rand() % $len];//隨機取得一個字元
       }
           return $id;//回傳亂數帳號
       }
       public function getnum()
       {
           $a=array();//初始化一個陣列要來存放所產生的亂數
       for ($x=0;$x<1;$x++) { //$x=>要取得幾筆亂數帳號
           $b= $this->getrand_id();//取得亂數帳號
           if (!in_array($b, $a)) {//判斷有沒有重覆
               array_push($a, $b);//將產生的亂數帳號加入陣列
           } else {
               $x-=1;
           }//有重覆再重新產生一筆
       }
           for ($x=0;$x<1;$x++) {
               echo $a[$x].'<br/>';//顯示結果
           }
       }
   }
   $num = new randomtoken;
  $usermail = stripslashes(trim($_POST['email']));
  echo "User's email is ".$usermail;

  $result = $db->execute("SELECT * FROM USERNAME WHERE email = ?", array($usermail));
  if ($db->getRowCount()) {
      $token = $num->getrand_id();
      $token = sha1($token);
      $db->execute("INSERT INTO UserEP(usermail, link_no, used) VALUE(?, ?, ?);", array($usermail, $token,0));
      echo $token;
      $link = "http://127.0.0.1/usedBookStore/src/user/vertify.php?"."token=$token";
      mb_internal_encoding("utf-8");
      $to= $usermail;
      $subject=mb_encode_mimeheader("你不得不承認這是一個忘記密碼的信", "utf-8");
      $message= "請點選驗證連結： ".$link ;
      $headers="MIME-Version: 1.0\r\n";
      $headers.="Content-type: text/html; charset=utf-8\r\n";
      $headers.="From:".mb_encode_mimeheader("PJCHENder", "utf-8")."<email@anywhere.com>\r\n";

      if (mail($to, $subject, $message, $headers)) {
          echo "信件已傳送到信箱";
      //echo "<br />hekko" . $db->getRowCount();
      } else {
          echo "失敗";
      }
  } else {
      echo "使用者信箱不存在";
  }
