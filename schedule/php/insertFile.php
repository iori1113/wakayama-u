
<?php 
    if(isset($_FILES['pdf']['tmp_name'])){
        $tmpfile = $_FILES['pdf']['tmp_name'];
        $filename = '../pdf/' . $_FILES['pdf']['name'];
        $file = $_FILES["pdf"];
    
        if (is_uploaded_file($tmpfile)) {
            if ( move_uploaded_file($tmpfile , $filename )) {
            $result =  $_FILES['pdf']['name'] . "をアップロードしました。";
            } else {
                $result =  "ファイルをアップロードできません。";
            }
        } else {
            $result =  "ファイルが選択されていません。";
        } 
    }
?>