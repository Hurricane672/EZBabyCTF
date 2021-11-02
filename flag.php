<?php

$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "done";
$conn1 = new mysqli("localhost", $user, $passwd, $db);
if ($conn1->connect_error) {
    // die("Connection faild." . $conn->connect_error);
    die("Connection1 faild");
} else {
    $sql1 = "select challenges from done where id=" . $_POST["id"];
    if ($r = $conn->query($sql1)) {
        while ($_POST["chall_name"] === mysqli_fetch_row($r)) {
            die("you have done this challenges");
        }
    } else {
        echo 1;
    }
}
