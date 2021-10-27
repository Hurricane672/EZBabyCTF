<?php
function check($str)
{
    if (!strstr($str,'!')&&!strstr($str,'@')&&!strstr($str,'#')&&!strstr($str,'$')&&!strstr($str,'%')&&!strstr($str,'^')&&!strstr($str,'&')&&!strstr($str,'*')&&!strstr($str,'(')&&!strstr($str,')')&&!strstr($str,'-')&&!strstr($str,'_')&&!strstr($str,'=')&&!strstr($str,'+')&&!strstr($str,'[')&&!strstr($str,']')&&!strstr($str,'"')&&!strstr($str,'\'')&&!strstr($str,';')&&!strstr($str,'<')&&!strstr($str,'>')&&!strstr($str,'?')&&!strstr($str,'`')&&!strstr($str,'~')&&!strstr($str,'\\')&&!strstr($str,'/')&&!strstr($str,'|')) {
        return TRUE;
    }
    else{
        return FALSE;
    }
}

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
        $name = urldecode($_GET["name"]);
        mysqli_query($conn,"SET NAMES UTF8");
        $s1 = "select * from ".$tb." where name=\"".$name."\"";
        $conn->query($s1);
        if(mysqli_affected_rows($conn)!=0){
            exit("false");
        }
        else{
            exit("true");
        }
    }
    elseif(isset($_GET["name"])&&isset($_GET["password"])){
        $name = urldecode($_GET["name"]);
        $password = urldecode($_GET["password"]);
        if (!check($name)||!check($password)) {
            die("Invalid call.");}
        $id = md5($name);
        $team = "__NONE__";
        $s2 = "insert into ".$tb." (`id`,`name`,`team`,`password`) values (\"".$id."\",\"".$name."\",\"".$team."\",\"".$password."\");";
        $conn->query($s2);
        //echo $s2;
        // mysqli_query($conn,$s2);
        if(mysqli_affected_rows($conn)!=-1){
            echo "Successfully sign up!";
            //setcookie("salt",$id.time());
            //header("Location:index.html");
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