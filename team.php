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
    //isset($_GET["tname"])&&
    //
    if (isset($_GET["name"])) {
        //$tname=$_GET["tname"];
        $name=$_GET["name"];
        //$s = "select team from ".$tb." where name=\"".$name."\" and captain=\"".$captain."\" active=\"1\"";
        $s = "select team from ".$tb." where name=\"".$name."\"";
        $r1 = $conn->query($s);
        $tname = mysqli_fetch_row($r1)[0];
        //echo $tname;
        $s3 = "select captain from teams where tname=\"".$tname."\"";
        $r3 = $conn->query($s3);
        $captain = mysqli_fetch_row($r3)[0];
        //mysqli_affected_rows($conn)==1
        if($name===$captain){
            $s1="select name from users where team=\"".$tname."\"";
            $result = array($tname,"captain");
            $s2 = "select score from scoreboard where tname=\"".$tname."\"";
            if ($r = $conn->query($s2)) {
                while($row = mysqli_fetch_row($r)){
                    array_push($result,$row[0]);
                }
            }
            if ($r = $conn->query($s1)) {
                while($row = mysqli_fetch_row($r)){
                    array_push($result,$row[0]);
                }
            }

            var_dump(json_encode($result));
        }
        else{
            $s1="select name from users where team=\"".$tname."\"";
            $result = array($tname,"member");
            $s2 = "select score from scoreboard where tname=\"".$tname."\"";
            if ($r = $conn->query($s2)) {
                while($row = mysqli_fetch_row($r)){
                    array_push($result,$row[0]);
                }
            }
            if ($r = $conn->query($s1)) {
                while($row = mysqli_fetch_row($r)){
                    array_push($result,$row[0]);
                }
            }

            var_dump(json_encode($result));
        }
    }
    else{
        die("Invalid call.");
    }
}
//http://192.168.64.129/team.php?name=1
?>
