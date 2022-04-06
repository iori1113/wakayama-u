<?php
    $msg = "<p>事前に通知された初回ログイン用IDとパスワードをご入力ください。</p>";
    $msg2 = '<form method = "POST" action = "firstSetting.php">';
  require('../include.php');
    /*ログイン失敗時*/
  if(isset($_POST['user_name']) && isset($_POST['pass'])){
    /*ログイン処理*/
    $user_name = $_POST['user_name'];
    $password = $_POST['pass'];
    $sql = 'SELECT * FROM user WHERE user_name = ?';
    $query_result = $dbh->prepare($sql);
    $query_result->bindValue(1, $user_name, PDO::PARAM_STR);
    $query_result->execute();
    foreach($query_result as $row){
      if($row["password"] == $password){
        /*セッションの保存*/
        session_start();
        $msg = "<p>ログインに成功しました。</p>";
        $msg .= "<p>ユーザ名とパスワードの設定を行います。 <br> お好きなユーザ名とパスワードをご入力してください。</p>";
        //hidden要素で該当ユーザのidをget
        $msg2 ='<form method = "POST" action = "updateInfo.php">';
        $msg2 .= '<input type = "hidden" name = "id" value = "'. $row["user_id"] .'">';
        break;
      }else{
        $msg .= 'パスワードまたはユーザ名が違います。';
        $msg2 = '<form method = "POST" action = "firstSetting.php">';
      }
    }

}
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>トライプラスイオンモール和歌山校</title>

</head>
<body>
    <div id = "first-login">
        <div class = "title">初回ログインの方</div>        
        <div id = "input-first-password">

        <?php  echo($msg); ?>
            <div class = "input-form">
                <?php echo($msg2); ?>
                <p> <div style="font-weight : bold;"> &nbsp ID &nbsp </div>
                    <div class = "input-form"><input type = "text" name = "user_name"> </div>
                </p>
                <p> <div style="font-weight : bold;"> pass  </div>
                    <div class = "input-form"><input type = "password" name = "pass"> </div>
                </p>
                <input class = "login-button" type = "submit" value = "ログイン">
                </form>
            </div>
        </div>

    </div>
    
</body>
</html>


<link href="/schedule/css/style.css" media="all" rel="Stylesheet" type="text/css" /> 
<script src="/schedule/js/jquery-3.6.0.min.js"></script>
<script src="/schedule/js/base.js"></script>

<script>
    function outputDisplay(){
        getUrlParameter();
        if(arg.status == 0){
            //初回ログイン
            $("#first-login").css("display", "block");
        }else if(arg.status == 1){
            //ID,パスワード変更
            $("#change-info").css("display", "block");
        }
    }

</script>

