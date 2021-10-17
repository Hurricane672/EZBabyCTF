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
    if(isset($_GET["flag"])&&isset($_GET["name"])){
        $name = $_GET["name"];
        mysqli_query($conn,"SET NAMES UTF8");
        $s1 = "select * from ".$tb." where name=\"".$name."\"";
        echo $s1;
        $conn->query($s1);
        if(mysqli_affected_rows($conn)!=0){
            exit("false");
        }
        else{
            exit("true");
        }
    }
    elseif(isset($_GET["name"])&&isset($_GET["password"])){
        $name = $_GET["name"];
        $password = $_GET["password"];
        $id = md5($name);
        $team = "__NONE__";
        $s2 = "insert into ".$tb." (`id`,`name`,`team`,`password`) values (\"".$id."\",\"".$name."\",\"".$team."\",\"".$password."\");";
        $conn->query($s2);
        // mysqli_query($conn,$s2);
        if(mysqli_affected_rows($conn)!=-1){
            echo "Successfully sign up!";
            header("Location:index.html");
        }
        else{
            die("Tamper with the package is invalid!");
        }
    }
    else{
        die("Invalid call.");
    }
}
?>
//http://192.168.64.129/signup.php?name=1&password=1