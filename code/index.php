<?php
/**
 * Created by PhpStorm.
 * User: shahmir
 * Date: 2019-02-03
 * Time: 19:58
 */

$toast = false;

if (isset($_POST['logout'])) {
    session_start();
    unset($_SESSION["username"]);
    session_destroy();
    header("location:login.php");
}

session_start();

if (empty($_SESSION["username"])) {
    header("location:login.php");
} else {
    $toast = true;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chatroom</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>


</head>
<body>



<div style="display: inline-block;width: 100%">
    <h1 style="padding-left: 1%;padding-top: 1%;display: inline-block">Chatroom </h1>

    <form style="display: inline-block;float:right;margin-right: 1%;margin-top: 1%" method="post" action="index.php">
        <button type="submit" name="logout" style="display: inline-block;float: right;margin-top: 1%;margin-right: 1%"
                class="mdl-button mdl-js-button mdl-button--raised">
            Logout
        </button>
    </form>
</div>


<div id="chatbox">

    <div id="chat">
    </div>

    <div id="textbox">
        <form style="width: 100%;height: 100%">
            <textarea id='chatText' style="width: 100%;height: 100%;overflow-y: auto"
                      placeholder="Type here bitch..."></textarea>
        </form>
    </div>

    <div style="float: bottom">


        <button onclick="getText()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                style="margin-left: 1%;margin-top: 1%;float: right">
            Send
        </button>


    </div>

</div>


<style>
    #chatbox {
        border: solid;
        border-color: #0062cc;
        height: 80%;
        width: 60%;
        align;
        margin-top: 2%;
        margin-left: 1%;

    }

    #chat {
        border-bottom: solid;
        border-color: #0062cc;
        height: 80%;
        width: 100%;
        float: top;
        padding: 2%;
        overflow-y: auto;
    }

    #textbox {
        float: top;
        height: 20%;
        width: 100%;
        padding: 2%;
    }


</style>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>




<script>

    function getText() {

        let string = document.getElementById('chatText').value;


        if (/\S/.test(string)) {
            document.getElementById('chatText').value = "";
            let xhr = new XMLHttpRequest();
            xhr.open('POST','uploadText.php',true);
            xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
            xhr.send('chat='+string);
            xhr.onreadystatechange=function(){
                if(xhr.responseText){
                    //document.getElementById('chatText').innerHTML = '';

                }
            }
        }

    }

    function getChat(){
        let xhr = new XMLHttpRequest();
        xhr.open('POST','getchat.php',true);
        xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
        xhr.send();
        xhr.onreadystatechange = function()
        {
            document.getElementById('chat').innerHTML = xhr.responseText;
        }

    }

    setInterval("getChat()",1000);



</script>


<?php

if ($toast) {
    toast();
    $toast = false;
}

function toast()
{
    $t = "<script>{ toastr.success('', 'Sucessfully Logged in!')};</script>";
    echo $t;
}
?>

</body>


</html>
