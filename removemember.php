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
    if(isset($_GET["tname"])&&isset($_GET["id"])&&isset($_GET["rmname"])){
        $tname = $_GET["tname"];
        $captain = $_GET["id"];
        $rmname = $_GET["rmname"];
        mysqli_query($conn,"SET NAMES UTF8");
        $s1 = "select * from ".$tb." where tname=\"".$tname."\" and captain=\"".$captain."\" active=\"1\"";
        $conn->query($s1);
        if(mysqli_affected_rows($conn)!=0){
            $s2 = "update users team=\"__NONE__\" where name=".$rmname;
            $conn->query($s2);
            echo $s2;
            if(mysqli_affected_rows($conn)!=-1){
                echo "done";
            }
            else{
                die("Tamper with the package is invalid!");
            }
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







