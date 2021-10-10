<?php
echo $_POST["challeng_name"];

$user = "ezbabyctf";
$db = "ezbabyctf";
$tb = "challenges";
$conn = new mysqli("localhost","root");
if($coon->connect_error){
    die("Connection faild.".$coon->connect_error);
}
else{
    
}



$conn->close();

?>