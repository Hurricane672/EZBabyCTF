<?php
$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "teams";
$conn = new mysqli("localhost",$user,$passwd,$db);
if($conn->connect_error){
    die("Connection faild.".$conn->connect_error);
}
else{
    if(isset($_GET["tname"])&&isset($_GET["name"])){
        $tname = $_GET["tname"];
        $name = $_GET["name"];
        mysqli_query($conn,"SET NAMES UTF8");
        $s1 = "update users team=\"".$tname."\" where name=\"".$name."\"";
        $conn->query($s1);
        if(mysqli_affected_rows($conn)==1){
            echo "done";
        }
        else{
            die("Invalid call.");
        }
    }   
    else{
        die("Invalid call.");
    }
}
//http://192.168.64.129/removeteam.php?tname=1&name=1
?>







