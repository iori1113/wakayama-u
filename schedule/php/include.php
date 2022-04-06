<?php
    /*デプロイ時はこっちの設定
      $dsn = 'mysql:dbname=LAA1404857-root;host=mysql201.phy.lolipop.lan';
      $dbh = new PDO($dsn, 'LAA1404857', 'iorie2000');
      */
      $dsn = 'mysql:dbname=management;host=localhost';
      $dbh = new PDO($dsn, 'root', 'iorie2000');
?>