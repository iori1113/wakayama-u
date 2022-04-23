<?php
require("function.php");
?>

<script src="../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../js/base.js"></script>



<?php
session_start();
//セッションがなければエラー画面に遷移
if (!isset($_SESSION['user_id'])){
    header("Location: ../error.php");
    return;
}
    //とりあえず2022年5月分
    $year = "2022";
    $month = "05";
    $file_id = $_SESSION['file_name'];
    $schedule_data = getjson($file_id, $year, $month);
  ?>

  


<style>
    .schedule-content{
        overflow-x:scroll;
    }

    #title{
        border-bottom: double 5px #0b41a0;
        margin-bottom: 5rem;
    }
</style>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>トライプラスイオンモール和歌山校</title>
  <link rel="stylesheet" href="../css/skeleton.css">
  <link rel="stylesheet" href="../css/custom.css">
</head>
<body onload="init();" onunload = "init()">
    <div class="section">
        <h1 id = "title">予定確認サービス</h1>
        <div id = "content">
            <div id = "content-header">
                <a class="button button-primary" id="schedule" href="#">5月の予定</a>
                <a class="button button-primary" id="others" href="#">その他</a>
            </div>
            <hr>
            <div class = "schedule-content" id = "schedule-2022-05" style= "display:block">
            </div>
            <div id = "other-content" style = "display:none">
                <h2>コンテンツ無し</h2>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    function init(){
        if(document.getElementById("input-files").value){
            window.location.href = "userPage_student.php";
        }
    }

    window.onload = function(){
        let schedule_data = <?php echo $schedule_data; ?>;
        let year = <?php echo $year; ?>;
        let month = <?php echo $month; ?>;
        let timeTable = {
            1:  "11:40~13:10",
            2:  "12:50~14:20",
            3:  "14:00~15:30",
            4:  "14:50~16:20",
            5:  "16:00~17:30",
            6:  "17:10~18:40",
            7:  "17:45~19:15",
            8:  "18:15~19:15",
            9:  "19:20~20:50",
            10: "20:30~22:00"
        };

        let dayOfWeek = ["日","月","火","水","木","金","土"];

        let numDays = 0;
        for(let i = 0; i < schedule_data.length; i++){
            if(numDays < schedule_data[i]["day"]){
                numDays = schedule_data[i]["day"];
            }
        }

        //当月1日の曜日を取得
        let date = year + "-" + month + "-01";
        let datetime = new Date(date);
        let wTmp = datetime.getDay();

        //最大時限数の取得
        let numPeriods = 0;
        for(let i = 0; i < Object.keys(schedule_data).length; i++){
            if(numPeriods < schedule_data[i]["period"]){
                numPeriods = schedule_data[i]["period"];
            }
        }
        
        //table作成
        let schedule = document.getElementById('schedule-2022-05');
        let table = createTag('table', schedule, "");
        
        //head
        let tr_day = createTag('tr', table, "");
        let tr_dow = createTag('tr', table, "");
        createTag('th', tr_day, "時限").rowSpan = "2";
        createTag('th', tr_day, month+"月").rowSpan = "2";
        for(let i = 0; i < numDays; i++){
            let th_day = createTag('th', tr_day, i + 1);
            let th_dow = createTag('th', tr_dow, dayOfWeek[(i + wTmp) % 7]);
            th_day.style.borderCollapse = "collapse";
            th_dow.style.borderCollapse = "collapse";
            th_dow.style.borderBottom = 'thick inset #0b41a0';
            if(i % 2 == 0){
                th_day.style.color = '#0b41a0';
                th_dow.style.color = '#0b41a0';
            }
        }

        //body
        let count = 0;
        for(let i = 1; i <= numPeriods; i++){
            let tr = createTag('tr', table, "");
            createTag('th', tr,  i);
            createTag('th', tr, timeTable[i]);
            for(let j=1; j<= numDays; j++){   
                let td = createTag('td', tr, schedule_data[count]["subject"]);
                count++;
                if(j % 2==1){
                    td.style.color = '#0b41a0';
                }
            }
            if(i % 2==0){
                    tr.style.backgroundColor = '#f5f5f5';
            }else{
                tr.style.backgroundColor = '#e1e1e1';
            }
        }         
    }

    function createTag(tagName, parentTag, content){
        let newTag = document.createElement(tagName);
        newTag.textContent = content;
        parentTag.appendChild(newTag);
        return newTag;
    }
    

    $("#schedule").click(function(){
        $("#schedule-2022-05").css("display", "block");
        $("#other-content").css("display", "none");
        
    });

    $("#others").click(function(){
        $("#schedule-2022-05").css("display", "none");
        $("#other-content").css("display", "block");
    });

</script>