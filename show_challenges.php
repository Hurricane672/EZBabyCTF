<?php
$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "challenges";
$conn = new mysqli("localhost",$user,$passwd,$db);
if($conn->connect_error){
    die("Connection faild.".$conn->connect_error);
}
else{
    $s1 = "select id,name,category,message,value,file from challenges";
    $result = array();
    if ($r = $conn->query($s1)) {
        while($row = mysqli_fetch_row($r)){
            array_push($result,$row);
        }
    }
    exit(json_encode($result));
}
?>