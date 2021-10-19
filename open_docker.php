<?php

$path = "./challenges/" . $_POST["type_name"] . "/" . $_POST["challenge_name"] . "/docker-compose.yml";
$content = file_get_contents($path);
$Num = mt_rand(20000, 30000);
$before = '/\d{1,}:\d{1,}/';
preg_match($before, $content, $match);
$after = $Num . ':3000';
$content = str_replace($match, $after, $content);
file_put_contents($path, $content);
$cmd1 = "cd ./challenges/" . $_POST["type_name"] . "/" . $_POST["challenge_name"] . "&& sudo docker-compose up -d";//正常
$output=shell_exec($cmd1);

echo "192.168.223.131:" . $Num;
?>