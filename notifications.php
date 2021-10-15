<?php
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
        $name=$_GET["name"];
        $s1 = "select from,to,message from notifications where to=\"".$name."\";";
        $result = array();
        if ($r = $conn->query($s1)) {
            while($row = mysqli_fetch_row($r)){
                array_push($result,$row);
            }
        }
        var_dump(json_encode($result));
    }
    else{
        die("Invalid call.");
    }
}
?>
