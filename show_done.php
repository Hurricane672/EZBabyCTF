<?php

use function PHPSTORM_META\type;

$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "done";
$conn = new mysqli("localhost", $user, $passwd, $db);
if ($conn->connect_error) {
    // die("Connection faild." . $conn->connect_error);
    die("Connection faild");
} else {
    $sql1 = "SELECT challenge FROM done WHERE id=\"" . $_POST["id"] . "\"";
    // var_dump($sql1);
    $arr = array();
    if ($result = $conn->query($sql1)) {
        while ($row = mysqli_fetch_row($result)) {
            array_push($arr, $row[0]);
        }
    }
    $arr = array_diff($arr, [""]);
    $arr = array_values($arr);

    var_dump(json_encode($arr));
}
$conn->close();
