<?php
/**
 * Created by PhpStorm.
 * User: shahmir
 * Date: 2019-02-07
 * Time: 00:02
 */

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "chatroom";

$dbconn = mysqli_connect($servername,$username,$password,$dbname);

$result= mysqli_query($dbconn , "SELECT * FROM chatData");

while ($row = mysqli_fetch_assoc($result)){
    echo $row['chatValue']."<br>";
}
?>