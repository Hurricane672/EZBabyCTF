<?php


$path = "./challenges/" . $_POST["type_name"] . "/" . $_POST["challenge_name"] . "/docker-compose.yml";
// echo $path;
// echo "<br>";
$content = file_get_contents($path);
// echo $content;
// echo "<br>";

$Num = mt_rand(20000, 30000);
// echo $Num;
// echo "<br>";

$before = '/\d{1,}:\d{1,}/';

preg_match($before, $content, $match);
var_dump($match);
// 从yml文件中找到“xxx:xxx”
echo $match . "<br>";
// echo $before;
$after = $Num . ':3000';
// 配置新的端口
echo $after . "<br>";

$content = str_replace($match, $after, $content);
echo $content;
echo "<br>";
if (!file_put_contents($path, $content)) {
    echo "error";
}

// $content = file_get_contents($path);
// echo $content;
// echo "<br>";
// $output=shell_exec("whoami");
// echo $output;

// echo $_POST["type_name"];
// echo "<br>";
// echo $_POST["challenge_name"];
// echo "<br>";

$cmd1 = "cd ./challenges/" . $_POST["type_name"] . "/" . $_POST["challenge_name"] . "&& sudo docker-compose up -d";//正常
echo $cmd1. "<br>";
$output=shell_exec($cmd1);

?>