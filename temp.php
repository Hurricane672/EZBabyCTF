<?php
$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "users";
$conn = new mysqli("localhost",$user,$passwd,$db);
if($conn->connect_error){
    die("Connection faild.".$conn->connect_error);
}
$tname = "987的战队";
$s3 = "select captain from teams where tname=\"".$tname."\"";
$r3 = $conn->query($s3);
$captainid = mysqli_fetch_row($r3)[0];
$s4="select name from users where id=\"".$captainid."\"";
$r4 = $conn->query($s4);
$captain = mysqli_fetch_row($r4)[0];
exit($captain);
?>