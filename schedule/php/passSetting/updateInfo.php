<?php
    $msg = "";
  require('../include.php');
  if(isset($_POST['user_name']) && isset($_POST['pass'])){
    /*初回パス設定*/
    $user_id = $_POST['id'];
    $new_user_name = $_POST['user_name'];
    $new_password = $_POST['pass'];
    $sql = 'UPDATE user SET user_name = "'.$new_user_name. '", password = "'.$new_password.'" WHERE user_id = ?';
    $query_result = $dbh->prepare($sql);
    $query_result->bindValue(1,$user_id, PDO::PARAM_STR);
    $query_result->execute();

    $msg = "更新が成功しました。";

}else {
    //ユーザ名だけとかの変更で使う？
    $msg = "不正な遷移です。トップページに戻る";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>トライプラスイオンモール和歌山校</title>

</head>
<body>
    <?php echo $msg;?>
    <a href = "/schedule/index.php">ログインページに戻る</a>
</body>
</html>