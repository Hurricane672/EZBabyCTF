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
    //isset($_GET["tname"])&&
    //
    if (isset($_GET["id"])) {
        //$tname=$_GET["tname"];
        $id=urldecode($_GET["id"]);
        if(!check($id)){
            die("Invalid call.");
        }
        //$s = "select team from ".$tb." where name=\"".$name."\" and captain=\"".$captain."\" active=\"1\"";
        $s = "select name from ".$tb." where id=\"".$id."\"";
        if($r1 = $conn->query($s)){
            //echo 1;
            exit(mysqli_fetch_row($r1)[0]);
        }
        else{
            die("Unmatch.");
        }
}
    else{
        die("Invalid call.");
    }
}
//http://192.168.64.129/idtoname.php?id=c81e728d9d4c2f636f067f89cc14862c
?>
