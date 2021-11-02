<?php
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
    if ($result = $conn->query($sql1)) {
        while ($row = mysqli_fetch_row($result)) {
            // echo "------------------";
            // var_dump($row);
            if ($_POST["chall_name"] === $row[0]) {
                die("you have done this challenges");
            }
        }
    }
}

$sql2 = "SELECT flag FROM challenges WHERE name=\"" . $_POST["chall_name"] . "\"";
$result2 = $conn->query($sql2);
while ($row2 = mysqli_fetch_row($result2)) {
    if ($_POST["flag"] === $row2[0]) {
        echo "right";
    } else {
        die("wrong");
    }
}
$sql3 = "INSERT INTO done VALUES (\"" . $_POST["id"] . "\",\"" . $_POST["chall_name"] . "\")";
// echo $sql3;
$conn->query($sql3);
$sql4 = "SELECT value FROM challenges WHERE name=\"" . $_POST["chall_name"] . "\"";
$result4 = $conn->query($sql4);
$row4 = mysqli_fetch_row($result4);
// var_dump($row4[0]);
// echo "------------";
$sql5 = "SELECT score FROM scoreboard WHERE tname=\"" . $_POST["tname"] . "\"";
// echo $sql5;
$result5 = $conn->query($sql5);
$row5 = mysqli_fetch_row($result5);
// var_dump($row5[0]);
$new_score = $row4[0] + $row5[0];
// var_dump($new_score);

$sql6 = "UPDATE scoreboard SET score=" . $new_score  . " WHERE tname=\"" . $_POST["tname"] . "\"";
// var_dump($sql6);
$conn->query($sql6);
$conn->close();
