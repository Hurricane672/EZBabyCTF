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
    if(isset($_GET["id"])&&isset($_GET["password"])&&isset($_GET["newpassword"])){
        $id = $_GET["id"];
        $password = $_GET["password"];
        $newpassword = $_GET["newpassword"];
        $s2 = "update users set password=\"".$newpassword."\" where id=\"".$id."\" and password=\"".$password."\"";
        echo $s2;
        $conn->query($s2);
        if(mysqli_affected_rows($conn)!=1){
            exit("Wrong.");
        }
        else{
            echo "Successfully modified!";
            //header("Location:index.html");
        }
    }
    else{
        die("Invalid call.");
    }
}
?>
