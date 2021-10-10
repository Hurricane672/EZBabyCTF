<?php
<<<<<<< HEAD
if(null!==($_GET["name"])&&null!==($_GET["flag"]))
    echo $_GET["name"];

=======
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
        $s1 = "select * from ".$tb." where name=".$name;
        mysqli_query($conn,$s1);
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
        // $s1 = "select * from ".$tb." where name=".$name;
        // echo $s1;
        $s2 = "insert into ".$tb." (`id`,`name`,`team`,`password`) values (\"".$id."\",\"".$name."\",\"".$team."\",\"".$password."\");";
        $conn->query($s2);
        // mysqli_query($conn,$s2);
        if(mysqli_affected_rows($conn)!=-1){
            exit("Successfully sign up!");
        }
        else{
            die("Tamper with the package is invalid!");
        }
    }
    else{
        die("Invalid call.");
    }
    
    // echo $_POST["name"]."</br>";
    // echo $_POST["password"]."</br>";
}
<<<<<<< HEAD

=======
echo $_POST["name"]."</br>";
echo $_POST["password"]."</br>";
>>>>>>> 0b17790f0e18367f74ef3c4518454169ef4cfdec
>>>>>>> 8daa2e76cb6e2a0c5bd642fd11039847e60d46e5
?>
