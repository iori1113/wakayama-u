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
    function getjson($file_id, $year, $month){
        $file_pass = "https://storage.googleapis.com/hogehogetemprary/scheduleJsonData/".$file_id."_".$year."_".$month."_ver.1";
        $verNum = 1;
        while(@file_get_contents($file_pass)){
            $schedule_json = file_get_contents($file_pass);
            $file_pass = "https://storage.googleapis.com/hogehogetemprary/scheduleJsonData/".$file_id."_".$year."_".$month."_ver.".$verNum++;
        }
        
        //$schedule_json = file_get_contents($file_pass);
        //$schedule_json = gcsAccess($file_pass);
        return $schedule_json;
    }
?>