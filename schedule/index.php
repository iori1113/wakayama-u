<?php require('./php/login.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>トライプラスイオンモール和歌山校</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="section"> 
    <h1 id = "title">トライプラスイオンモール和歌山校 <br> 予定表確認サービス_β版</h1>
    <div class = "login-form">
        <h3 class = "login-title en">Login</h3>
        <form method = "POST" action = "index.php">
        <div>
              <label class ="en" for="user_name en"> UserName </label>
              <input type = "text" name = "user_name">
              <label class ="en" for="pass" > Password  </label>
              <input type = "password" name = "pass">
            </div>
          <input class = "button-primary login-button" type = "submit" value = "ログイン">
        </form>
          <p style ='color : red;font-weight : bold;'><?php echo $failed;?> </p>
          <a href = "./php/passSetting/firstSetting.php?status=0">初回ログインの方はこちら</a> <br>
          <a href = "./php/passSetting/confirmInfo.php?">ID、パスワードを忘れた方</a>
      </div>
</div>
</body>
</html>


<link href="/schedule/css/style.css" media="all" rel="Stylesheet" type="text/css" /> 
<script src="/schedule/js/jquery-3.6.0.min.js"></script>
<script src="/schedule/js/base.js"></script>