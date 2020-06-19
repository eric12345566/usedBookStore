<?php
  require __DIR__ . '/../vendor/autoload.php';
  // 建立 Session
  session_start();
  $db = Database::get();
  
  $result = $db->execute("SELECT * FROM generaluser WHERE username = ?;", array($_SESSION['username']));
   
?>

<html>
  <head>
    <title>
      修改個人基本資料
    </title>
    <script type="text/javascript" src="../user/checkpwd.js"></script>
  </head>
  <body>
  <div>
        <p>修改個人基本資料</p>
        <form method="post" action="personinfo-api.php">
            <p><label>姓名 </label><input type="text" name="newname" value=<?php echo $result[0]['name'] ; ?>  required></p>
            <p>Email: <?php echo $result[0]['email'] ; ?> </p>
            <p><label>手機 </label><input type="tel" name="newphonenumber" value=<?php echo $result[0]['phonenumber'] ; ?> required></p>
            <p>性別: <?php echo $result[0]['gender'] ; ?></p> 
            <p><label>生日 </label><input type="date" name="newbdate" value=<?php echo $result[0]['bdate'] ; ?> required></p>
            
            <input type="submit"  value="確認修改" onclick="login();"/>
                <div>
                </div>
        </form>
    </div>
  </body>
</html>