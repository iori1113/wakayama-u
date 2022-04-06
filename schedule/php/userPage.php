<?php
require("function.php");
?>

<link href="../css/style.css" media="all" rel="Stylesheet" type="text/css" /> 
<script src="../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../js/base.js"></script>

<script>
    function fill_color(){
    const color_code = "#efefef";
    $(".week-0" + ".period-6").css("background-color", color_code);
    $(".week-0" + ".period-7").css("background-color", color_code);
    $(".week-0" + ".period-8").css("background-color", color_code);
    $(".week-0" + ".period-9").css("background-color", color_code);
    $(".week-0" + ".period-10").css("background-color", color_code);
    for(let i = 1; i <= 5; i++){
        $(".week-"+ i + ".period-1").css("background-color", color_code);
        $(".week-"+ i + ".period-2").css("background-color", color_code);
        $(".week-"+ i + ".period-3").css("background-color", color_code);
        $(".week-"+ i + ".period-4").css("background-color", color_code);
    }
    $(".week-6" + ".period-10").css("background-color", color_code);
}
</script>



<?php
session_start();
if (!isset($_SESSION['user_id'])){
    echo 'セッションが切れました。';
    return;
}
    $year = "2022";
    $month = "03";
    $file_id = $_SESSION['file_name'];
    $schedule_data = getJsonData($file_id, $year, $month);
    
  ?>

  


<style>



    form {
        margin: 50px auto;
        width: 800px;
        height: 400px;
        box-shadow: 0 0 2px #3e3e3e;
        padding: 30px;
        text-align: center;
    }

    .upload-area {
        margin: auto;
        width: 85%;
        height: 300px;
        position: relative;
        border: 1px dotted rgba(0, 0, 0, .4);
    }
    .upload-area i {
        position: absolute;
        font-size: 120px;
        opacity: .1;
        width: 100%;
        left: 0;
        top: 80px;
    }
    .upload-area p {
        width: 100%;
        position: absolute;
        top: 200px;
        opacity: .8;
    }

    #input-files {
        top: 0;
        left: 0;
        opacity: 0;
        position: absolute;
        width: 100%;
        height: 100%;
    }

    #submit-btn {
        background-color: rgba(108, 168, 255, .7);
    }
    #submit-btn:hover {
        background-color: rgba(108, 168, 255, 1.0);
    }

    #delete-btn {
        background-color: rgba(255, 50, 50, .7);
    }
    #delete-btn:hover {
        background-color: rgba(255, 50, 50, 1.0);
    }

    #btns input{
        display:inline;
        font-weight: bold;
        margin-top: 20px;
        border-radius: 3px;
        width: 200px;
        height: 45px;
        border: none;
        box-shadow: 0 5px 0 rgba(0, 0, 0, 0.6);
        opacity: .6;
        cursor: pointer;
    }

    #btns input:active{
        position: relative;
        top: 5px;
        box-shadow: none;
    }

    #btns p{
        display:inline;
        padding: 20px;
    }

    #content-header li{
        cursor: pointer;
        background-color : #faefdc;
        display:inline;
        width : 50%;
        border : solid 2px black;
        padding : 10px 20px;
        margin : none;
    }

</style>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>トライプラスイオンモール和歌山校</title>

</head>
<body onload="init();" onunload = "init()">
    <div id = "title">予定確認サービス</div>
    <div id = "content">
        <div id = "content-header">
            <ul>
                <li id = "schedule">3月の予定</li>
                <li id = "others">その他</li>
            <ul>
        </div>
        <hr>
        <div class = "schedule-content" id = "schedule-2022-03" style= "display:block">
            <?php echo outputSchedule($schedule_data,$year,$month); ?>
            <script> fill_color(); </script>
        </div>
        <div id = "other-content" style = "display:none">
            <h2>コンテンツ無し</h2>
        </div>
    </div>
</body>
</html>

<script>
    function init(){
        if(document.getElementById("input-files").value){
            window.location.href = "userPage.php";
        }
    }

    $("#schedule").click(function(){
        $("#schedule-2022-03").css("display", "block");
        $("#other-content").css("display", "none");
        
    });

    $("#others").click(function(){
        $("#schedule-2022-03").css("display", "none");
        $("#other-content").css("display", "block");
    });

    function fill_color(){
    const color_code = "#efefef";
    $(".week-0" + ".period-6").css("background-color", color_code);
    $(".week-0" + ".period-7").css("background-color", color_code);
    $(".week-0" + ".period-8").css("background-color", color_code);
    $(".week-0" + ".period-9").css("background-color", color_code);
    $(".week-0" + ".period-10").css("background-color", color_code);
    for(let i = 1; i <= 5; i++){
        $(".week-"+ i + ".period-1").css("background-color", color_code);
        $(".week-"+ i + ".period-2").css("background-color", color_code);
        $(".week-"+ i + ".period-3").css("background-color", color_code);
        $(".week-"+ i + ".period-4").css("background-color", color_code);
    }
    $(".week-6" + ".period-10").css("background-color", color_code);
}
</script>