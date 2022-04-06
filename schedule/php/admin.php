


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
    <div id = "title">予定確認サービス 管理画面</div>
    <div id = "content">
        <div id = "content-header">
            <ul>
                <li id = "schedule">予定表アップロード</li>
                <li id = "others">その他</li>
            <ul>
        </div>
        <hr>
        <div id = "insert-form" style= "display:block">
            <form id = "insert" method = "post" action = "admin.php" enctype="multipart/form-data">
                <div class = "upload-area">
                <i class="fas fa-cloud-upload-alt"></i>
                    <p id = "drag-file">Drag and drop a file or click</p>
                    <input name="pdf" type = "file" accept="pdf" id="input-files" onchange="inputFile()">
                    <div id = "pdf-wrapper" style = "display:none">
                        <p id = "pdfName"></p>
                        <img id = "pdficon" src="../images/pdficon.png">
                    </div>
                </div>
                <select name="name">
                    <option value="A">生徒A</option>
                    <option value="B">生徒B</option>
                </select>
                <div id = "btns">
                    <p><input id = "submit-btn" type = "submit"  ></p>
                    <p><input id = "delete-btn" type = "button" onclick="fileClear()" value="ファイルをクリアする"></p>
                </div>
                <p id = "result">
                    <?php
                        require("insertFile.php"); 
                        if(isset($result)) echo $result;?></p>
            </form>
        </div>
        <div id = "other-content" style = "display:none">
            <h2>コンテンツ無し</h2>
        </div>
    </div>
</body>
</html>

<link href="/schedule/css/style.css" media="all" rel="Stylesheet" type="text/css" /> 
<script src="/schedule/js/jquery-3.6.0.min.js"></script>
<script src="/schedule/js/base.js"></script>

<script>
    function fileClear(){
        $("#drag-file").css("display", "block");
        $("#pdf-wrapper").css("display", "none");
        document.getElementById("input-files").value = "";
        console.log("ファイルが削除されました。");
    }

    function inputFile(){
        $("#drag-file").css("display", "none");
        $("#pdf-wrapper").css("display", "block");
        if(document.getElementById("input-files").value){
        let fileInfo = document.getElementById("input-files").files;
        $("#pdfName").text(fileInfo[0].name);
        }
    }

    function init(){
        if(document.getElementById("input-files").value){
            window.location.href = "admin.php";
        }
    }

    $("#schedule").click(function(){
        $("#insert-form").css("display", "block");
        $("#other-content").css("display", "none");
        
    });

    $("#others").click(function(){
        $("#insert-form").css("display", "none");
        $("#other-content").css("display", "block");
    });
</script>

