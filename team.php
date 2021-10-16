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
    if (isset($_GET["tname"])&&isset($_GET["name"])) {
        $tname=$_GET["tname"];
        $name=$_GET["name"];
        $s = "select * from ".$tb." where tname=\"".$tname."\" and captain=\"".$captain."\" active=\"1\"";
        $conn->query($s);
        if(mysqli_affected_rows($conn)==1){
            $s1="select * from users where team=\"".$tname."\"";
            $result = array("captain");
            if ($r = $conn->query($s1)) {
                while($row = mysqli_fetch_row($r)){
                    array_push($result,$row);
                }
            }
            $s2 = "select score from scoreboard where tname=\"".$tname."\"";
            if ($r = $conn->query($s2)) {
                while($row = mysqli_fetch_row($r)){
                    array_push($result,$row);
                }
            }
            var_dump(json_encode($result));
        }
        else{
            $s1="select * from users where team=\"".$tname."\"";
            $result = array("member");
            if ($r = $conn->query($s1)) {
                while($row = mysqli_fetch_row($r)){
                    array_push($result,$row);
                }
            }
            $s2 = "select score from scoreboard where tname=\"".$tname."\"";
            if ($r = $conn->query($s2)) {
                while($row = mysqli_fetch_row($r)){
                    array_push($result,$row);
                }
            }
            var_dump(json_encode($result));
        }
    }
    else{
        die("Invalid call.");
    }
}
?>
//http://192.168.64.129/signup.php?name=1&password=1