<?php
$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "scoreboard";
$conn = new mysqli("localhost",$user,$passwd,$db);
if($conn->connect_error){
    die("Connection faild.".$conn->connect_error);
}
else{
    $s1 = "select tname,score from scoreboard where tname != '__NONE__' and tname !='__ADMIN__' order by score desc";
    $result = array();
    if ($r = $conn->query($s1)) {
        while($row = mysqli_fetch_row($r)){
            array_push($result,$row);
        }
    }
    exit(json_encode($result));
}
