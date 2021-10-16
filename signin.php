<?php
$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "users";
$conn = new mysqli("localhost",$user,$passwd,$db);
if($conn->connect_error){
    die("Connection faild.".$conn->connect_error);
}
else{
    if(isset($_GET["name"])&&isset($_GET["password"])){
        $name = $_GET["name"];
        $password = $_GET["password"];
        $s2 = "select * from ".$tb." where name=".$name." and password=".$password;
        $conn->query($s2);
        if(mysqli_affected_rows($conn)!=1){
            exit("Wrong name or password.");
        }
        else{
            echo "Successfully sign in!";
            header("Location:index.html");
        }
    }
    else{
        die("Invalid call.");
    }
}
?>
