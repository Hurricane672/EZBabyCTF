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
$tb = "teams";
$conn = new mysqli("localhost",$user,$passwd,$db);
if($conn->connect_error){
    die("Connection faild.".$conn->connect_error);
}
else{
    if(isset($_GET["tname"])&&isset($_GET["id"])&&isset($_GET["inname"])){
        $tname = urldecode($_GET["tname"]);
        $captain = urldecode($_GET["id"]);
        $inname = urldecode($_GET["inname"]);
        if(!check($tname)||!check($captain)||!check($inname)){
            die("Invalid call.");
        }
        mysqli_query($conn,"SET NAMES UTF8");
        $s1 = "select * from ".$tb." where tname=\"".$tname."\" and captain=\"".$captain."\" active=\"1\"";
        $conn->query($s1);
        if(mysqli_affected_rows($conn)!=0){
            $mes = "\"The captain of ".$tname." who named ".$captain." invite you to join.\"";
            $s2 = "insert into notifications (`from`,`to`,`message`) values (\"".$captain."\",\"".$inname."\",".$mes.")";
            $conn->query($s2);
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







