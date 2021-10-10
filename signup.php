<?php
$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "users";
$conn = new mysqli("localhost","root");
if($coon->connect_error){
    die("Connection faild.".$coon->connect_error);
}
if(isset($_GET["flag"])){
    echo 2;
}
echo $_POST["name"]."</br>";
echo $_POST["password"]."</br>";
?>
