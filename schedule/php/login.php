<?php
  require('include.php');
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
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['user_name'] = $row['user_name'];
          $_SESSION['real_name'] = $row['real_name'];
          $_SESSION['file_name'] = $row['file_name'];
          //$_SESSION['user_id'] = $row['user_id'];
          session_write_close();
          /*ロールを判別して応じたページへ*/
          $roll = $row["type"];
          switch ($roll){
            case 0 : header('Location: ./php/maintain.php'); break;
            case 1 : header('Location: ./php/admin.php'); break;
            case 2 : header('Location: ./php/userPage_student.php'); break;
            case 3 : header('Location: ./php/userPage_teacher.php'); break;
          }
          break;
        }
      }
      $failed = 'パスワードまたはユーザ名が違います。';
  }else{
    $failed = '';
  }

  ?>