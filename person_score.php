<?php
$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "users";
$conn = new mysqli("localhost", $user, $passwd, $db);
if ($conn->connect_error) {
    // die("Connection faild." . $conn->connect_error);
    die("Connection faild");
}
$sql = "SELECT score FROM users WHERE id=\"" . $_POST["id"] . "\"";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
var_dump($row[0]);
