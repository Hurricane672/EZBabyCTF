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
$tb = "notifications";
$conn = new mysqli("localhost",$user,$passwd,$db);
if($conn->connect_error){
    die("Connection faild.".$conn->connect_error);
}
else{
    if(isset($_GET["name"])){
        $name=urldecode($_GET["name"]);
        if (!check($name)) {
            die("Invalid call.");
        }
        $s1 = "select `from`,`message` from `notifications` where `to`=\"".$name."\";";
        // echo $s1;
        $result = array();
        if ($r = $conn->query($s1)) {
            while($row = mysqli_fetch_row($r)){
                array_push($result,$row);
            }
        }
        exit(json_encode($result));
    }
    else{
        die("Invalid call.");
    }
}
//http://192.168.64.129/notifications.php?name=3
?>
