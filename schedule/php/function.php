<?php
    //gcsへの認証アクセス 使わない
    function gcsAccess($file_pass){
        require_once '../authorize/google-api-php-client-1.1.7/src/Google/autoload.php';
        $json_path = '../authorize/speedy-victory-343308-e536c4cee705.json';
        $json_string = file_get_contents($json_path, true);
        $json = json_decode($json_string, true);

        $private_key = $json['private_key'];
        $client_email = $json['client_email'];
        $client_id = $json['client_id'];
        $private_key = $json['private_key'];
        
        $scopes = array("https://www.googleapis.com/auth/drive.apps.readonly");
        
        $credentials = new Google_Auth_AssertionCredentials(
            $client_email,
            $scopes,
            $private_key
        );

        
        putenv('GOOGLE_APPLICATION_CREDENTIALS=');
        $client = new Google_Client();
        $client->setApplicationName("Google PHP");
        $client->setClientId($client_id);

        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https: //www.googleapis.com/auth/drive.readonly']);
        $service = new Google_Service_Drive($client);

 
    }

    //jsonデータの取得
    $file_pass = "";
    $schedule_json = "";
    function getJsonData($file_id, $year, $month){
        $file_pass = "https://storage.googleapis.com/hogehogetemprary/scheduleJsonData/".$file_id."_".$year."_".$month."_ver.1";
        $verNum = 1;
        while(@file_get_contents($file_pass)){
            $schedule_json = file_get_contents($file_pass);
            $file_pass = "https://storage.googleapis.com/hogehogetemprary/scheduleJsonData/".$file_id."_".$year."_".$month."_ver.".$verNum++;
        }
        
        //$schedule_json = file_get_contents($file_pass);
        //$schedule_json = gcsAccess($file_pass);
        $schedule_data = json_decode($schedule_json,true);
        return $schedule_data;
    }

    //jsonデータからスケジュール生成
    function outputSchedule($schedule_data, $year, $month){
        $timeTable = ["", "11:40~13:10","12:50~14:20","14:00~15:30",
        "14:50~16:20","16:00~17:30","17:10~18:40","17:45~19:15",
        "18:15~19:15","19:20~20:50","20:30~22:00"];
        $dayOfWeek = ["日","月","火","水","木","金","土"];
        //日数の取得
        $numDays = 0;
        for($i = 0; $i < count($schedule_data) ; $i++){
            if($numDays < $schedule_data[$i]["day"]) $numDays = $schedule_data[$i]["day"];
        }
        //当月1日の曜日を取得
        $date = $year."-".$month."-01";
        $datetime = new DateTime($date);
        $w = (int)$datetime->format('w');
        $wTmp = $w;
        //最大時限数の取得
        $numPeriods = 0;
        for($i = 0; $i < count($schedule_data) ; $i++){
            if($numPeriods < $schedule_data[$i]["period"]) $numPeriods = $schedule_data[$i]["period"];
        }

        $responseMsg = "<table><tr><td id = 'time-table' rowspan = '2'>時限</td><td id = 'month-header' rowspan = '2'>".(int)$month."月</td>";

        //一行目日付
        for($i = 1; $i <= $numDays; $i++){
            $responseMsg .="<td class = 'day-index day-".$i."'>".$i."</td>";
        } 
        $responseMsg .="</tr><tr>";
        for($i = 1; $i <= $numDays; $i++){
            $responseMsg .="<td class = 'dayOfWeek-index week-".($w % 7)."'>".$dayOfWeek[$w % 7]."</td>";
            $w++;
        } 
        $responseMsg .="</tr>";


        //予定内容
        $count = 0;
        for($y = 1; $y <= $numPeriods; $y++){
            $responseMsg .="<tr><td class = 'period-index period-".$y."'>".$y."</td>";
            $responseMsg .="<td class = 'timeTable-index period-". $y ."'>".$timeTable[$y]."</td>";
            $weekTmp = $wTmp;
            for($x = 1; $x <= $numDays; $x++){
                $responseMsg .="<td class = 'day-".$x." week-". $weekTmp % 7 ." period-".$y."'>".$schedule_data[$count++]["subject"]."</td>";
                $weekTmp++;
            }
            
            $responseMsg .="</tr>";
        } 

        $responseMsg .="</table>";
        return $responseMsg;
    }
?>