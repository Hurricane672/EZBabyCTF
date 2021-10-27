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
    if(isset($_GET["id"])&&isset($_GET["password"])&&isset($_GET["newpassword"])){
        $id = urldecode($_GET["id"]);
        $password = urldecode($_GET["password"]);
        $newpassword = urldecode($_GET["newpassword"]);
        if(!check($id)||!check($password)||!check($newpassword)){
            die("Invalid call.");
        }
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
