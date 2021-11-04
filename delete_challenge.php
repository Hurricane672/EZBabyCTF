<?php
$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "challenges";
$conn = new mysqli("localhost", $user, $passwd, $db);
if ($conn->connect_error) {
    // die("Connection faild." . $conn->connect_error);
    die("Connection faild.");
}
$sql = "DELETE FROM challenges WHERE name=\"" . $_POST["chall_name"] . "\"";
// echo $sql . "<br>";
$conn->query($sql);
$cmd1 = "rm -rf ./challenges/" . $_POST["chall_type"] . "/" . $_POST["chall_name"];
// echo $cmd1 . "<br>";
shell_exec($cmd1);
$cmd2 = "rm ./challenges/" . $_POST["chall_type"] . "/" . $_POST["chall_name"] . ".zip";
// echo $cmd2 . "<br>";
shell_exec($cmd2);
