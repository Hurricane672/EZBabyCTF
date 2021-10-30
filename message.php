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
$tb = "notifacations";
$conn = new mysqli("localhost",$user,$passwd,$db);
if($conn->connect_error){
    die("Connection faild.".$conn->connect_error);
}
else{
    if(isset($_GET["from"])&&isset($_GET["msg"])&&isset($_GET["to"])){
        $from = urldecode($_GET["from"]);
        $msg = urldecode($_GET["msg"]);
        $to = urldecode($_GET["to"]);
        if(!check($from)||!check($msg)||!check($to)){
            die("Invalid call.");
        }
        mysqli_query($conn,"SET NAMES UTF8");
        $s1 = "insert into notifications (`from`,`to`,`message`) values (\"".$from."\",\"".$to."\",\"".$msg."\")";
        //echo $s1;
        $conn->query($s1);
        if(mysqli_affected_rows($conn)!=0){
            exit("done");
        }
        else{
            die("Invalid call.");
        }
    }   
    else{
        die("Invalid call.");
    }
}
//http://192.168.64.129/message.php?from=1&msg=2&to=3
?>







