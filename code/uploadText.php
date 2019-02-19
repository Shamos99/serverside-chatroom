<?php
/**
 * Created by PhpStorm.
 * User: shahmir
 * Date: 2019-02-05
 * Time: 20:56
 */
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "chatroom";

$dbconn = mysqli_connect($servername,$username,$password,$dbname);


if(isset($_POST['chat'])){


    $txt = $_POST['chat'];
    $usr = $_SESSION['username'];
    $txt = "<strong>".$usr."</strong>".': '.$txt;
    $cmd = "INSERT INTO chatData (chatValue) VALUES ('$txt')";

    $result = mysqli_query($dbconn,$cmd);
    mysqli_close($dbconn);
}
