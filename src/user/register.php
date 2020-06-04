<html>
  <head>
    <title>
      使用者註冊
    </title>
    <script type="text/javascript" src="../user/checkpwd.js"></script>
  </head>
  <body>
  <div>
        <p >會員註冊</p>
        <form method="post" action="register-api.php">
            <p><label>username</label><input type="text" name="username"  required></p>
            <p><label>Email</label><input type="email" name="email"  required></p>
            <p><label>姓名</label><input type="text" name="name" required></p>
            <p><label>密碼</label><input type="password" id="password" name="password"  required></p>
            <p><label>確認密碼</label><input type="password" id="passwordcheck" required></p>
            <p><label>手機</label><input type="tel" name="phonenumber" required></p>
            性別<select name="gender">
            <option value="男">男</option>
　          <option value="女">女</option>
            </select>    
            <p><label>生日</label><input type="date" name="bdate" required></p>
            學校<select name="university">
            <option value="逢甲大學">逢甲大學</option>
　          <option value="國立台灣大學">國立台灣大學</option>
            </select>
            科系<select name="major">
            <option value="資工系">資工系</option>
　          <option value="電機系">電機系</option>
            </select>  
            <p><label>學號</label><input type="text" name="stdId" required></p>
            <form action = register-api.php method = post enctype = multipart/form-data>
            學生證上傳<br><input type=file name=stdId_img accept=".jpg , .gif" > <br>
            <input type="submit"  value="確認" onclick="login();"/>
            </form>
                <div>
                </div>
        </form>
    </div>
  </body>
</html>



