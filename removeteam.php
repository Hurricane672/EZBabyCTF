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
    if(isset($_GET["tname"])&&isset($_GET["name"])){
        $tname = urldecode($_GET["tname"]);
        $captain = urldecode($_GET["name"]);
        if(!check($tname)||!check($captain)){
            die("Invalid call.");
        }
        mysqli_query($conn,"SET NAMES UTF8");
        $s1 = "select * from ".$tb." where tname=\"".$tname."\" and captain=\"".$captain."\" active=\"1\"";
        $conn->query($s1);
        if(mysqli_affected_rows($conn)!=0){
            $s2 = "delete from teams where tname=\"".$tname."\"";
            $conn->query($s2);
            echo $s2;
            if(mysqli_affected_rows($conn)!=-1){
                $score = 0;
                $s3="delete from scoreboard where tname=\"".$tname."\"";
                $conn->query($s3);
                echo $s3;
                if(mysqli_affected_rows($conn)!=-1){
                    $s4="update users set team=\"__NONE__\" where team=\"".$tname."\"";
                    $conn->query($s4);
                    echo $s4;
                    if(mysqli_affected_rows($conn)!=-1){
                    
                        exit("done");
                    }
                    else{
                        die("Tamper with the package is invalid!");
                    }
                }
                else{
                    die("Tamper with the package is invalid!");
                }
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