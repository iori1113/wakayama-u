<?php require('./php/login.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>トライプラスイオンモール和歌山校</title>

</head>
<body>
    <div id = "title">トライプラスイオンモール和歌山校 予定表確認サービス</div>
    <div class = "login-form">
        <span class = "login-title">ログイン</span>
        <form method = "POST" action = "index.php">
          <p> <div style="font-weight : bold;"> &nbsp ID &nbsp </div>
            <div class = "input-form"><input type = "text" name = "user_name"> </div>
          </p>
          <p> <div style="font-weight : bold;"> pass  </div>
            <div class = "input-form"><input type = "password" name = "pass"> </div>
          </p>
          <input class = "login-button" type = "submit" value = "ログイン">
        </form>
          <p style ='color : red;font-weight : bold;'><?php echo $failed;?> </p>
          <a href = "./php/passSetting/firstSetting.php?status=0">初回ログインの方はこちら</a> <br>
          <a href = "./php/passSetting/confirmInfo.php?">ID、パスワードを忘れた方</a>
      </div>
</body>
</html>


<link href="/schedule/css/style.css" media="all" rel="Stylesheet" type="text/css" /> 
<script src="/schedule/js/jquery-3.6.0.min.js"></script>
<script src="/schedule/js/base.js"></script>