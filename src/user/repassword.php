<html>
  <head>
    <title>
      修改帳密頁面
    </title>
    <script type="text/javascript" src="../user/checkpwd.js"></script>
  </head>
  <body>
  <div>
        <p >帳號密碼修改</p>
        <form method="post" action="repassword-api.php">
            
            <p><label>目前密碼</label><input type="password" id="password" name="password"  required></p>
            <p><label>新設密碼</label><input type="password" id="newpassword" required></p>
            <p><label>再次輸入新密碼</label><input type="password" id="newpasswordcheck" required></p>
            <input type="submit"  value="確認" onclick="login();"/>
                <div>
                </div>
        </form>
    </div>
  </body>
</html>