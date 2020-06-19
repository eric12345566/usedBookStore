


<!DOCTYPE html>
<html>
  <head>
    <title>註冊頁面</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="./css/register.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../user/checkpwd.js"></script>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="register_card">
            <div id="logo">L O G O</div>
            <div style="font-size: 1em; text-align: center;font-weight: bolder;">
              註冊帳號
            </div>
            <form method="post" action="register-api.php" enctype = "multipart/form-data">
            <div class="input">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="form-group">
                    <p class="input_text" for="exampleInputUsername">暱稱</p>
                    <input 
                    name="username"
                    type="username" 
                    class="form-control form-control-sm" 
                    id="exampleInputusername" 
                    placeholder="輸入username.."
                    aria-describedby="usernameHelp">
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <p class="input_text">性別</p>
                  <select class="form-control form-control-sm" name="gender">
                    <option>男</option>
                    <option>女</option>
                    <option>其他</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="input">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="form-group">
                    <p class="input_text" for="exampleInputEmail1">Email</p>
                    <input 
                    name="email"
                    type="email" 
                    class="form-control form-control-sm" 
                    id="exampleInputEmail1" 
                    placeholder="輸入email.."
                    aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <p class="input_text" style="margin-right: 2em;">生日</p>
                  <div class="form-group row">
                    <div class="col-10">
                      <input name="bdate" class="form-control" type="date" value="2011-08-19" id="example-date-input">
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="input">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="form-group">
                    <p class="input_text" for="exampleInputEmail1">密碼</p>
                    <input 
                    name="password"
                    type="password"
                    class="form-control form-control-sm" 
                    id="exampleInputEmail1" 
                    aria-describedby="emailHelp"
                    placeholder="至少8個字，並且包含一個英文與一個數字..">
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <p class="input_text">學校</p>
                  <select name="university" class="form-control form-control-sm" aria-placeholder="輸日">
                    <option>逢甲大學</option>
                    <option>清華大學</option>
                    <option>台灣大學</option>
                  </select>
                </div>
              </div>
            </div>
    
            <div class="input">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="form-group">
                      <p class="input_text" for="exampleInputEmail1">姓名</p>
                      <input 
                      name="name"
                      type="text" 
                      class="form-control form-control-sm" 
                      id="exampleInputEmail1" 
                      aria-describedby="emailHelp"
                      placeholder="輸入姓名..">
                    </div>
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <p class="input_text">科系</p>
                  <select name="major" class="form-control form-control-sm">
                    <option>資工系</option>
                    <option>企管系</option>
                    <option>經濟系</option>
                    <option>國貿系</option>
                    <option>行銷系</option>
                    <option>風保系</option>
                    <option>財經系</option>
                    <option>財稅系</option>
                    <option>會計系</option>
                    <option>外文系</option>
                    <option>工工系</option>
                    <option>建築系</option>
                    <option>材料系</option>
                    <option>通訊系</option>
                    <option>中文系</option>
                  </select>
              </div>
            </div>
    
            <div class="input">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="form-group">
                    <p class="input_text" for="exampleInputEmail1">手機號碼</p>
                    <input 
                    name="phonenumber"
                    type="text" 
                    class="form-control form-control-sm" 
                    id="exampleInputEmail1" 
                    aria-describedby="emailHelp"
                    placeholder="輸入手機號碼..">
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="form-group">
                    <p class="input_text" for="exampleInputEmail1">學號</p>
                    <input
                    name="stdId"
                    type="text" 
                    class="form-control form-control-sm" 
                    id="exampleInputEmail1" 
                    aria-describedby="emailHelp"
                    placeholder="輸入學號..">
                  </div>
                </div>
              </div>
            </div>
            <div class="input">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <p class="input_text">
                    上傳學生證 (認證身份，<a
                      href="#"
                      style="color: rgb(53, 165, 159);"
                      >查看個資隱私政策</a
                    >)
                  </p>
                  <form>
                    <div class="form-group">
                      <input type="file" name="stdId_img" class="form-control-file" id="exampleFormControlFile1" accept=".jpg , .jpeg">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="buttom_location">
              <button class="button" onclick="login();">立即註冊</button>
            </div>
            </form>
          </div>
        </div>
      </div>
        <div id="space"></div>
      </div>
    </div>
  </body>
</html>
