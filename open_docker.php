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
$output=shell_exec("whoami");
echo $output;

// echo $_POST["type_name"];
// echo "<br>";
// echo $_POST["challenge_name"];
// echo "<br>";

$cmd1 = "cd ./challenges/" . $_POST["type_name"] . "/" . $_POST["challenge_name"];//正常
echo $cmd1. "<br>";
$output = shell_exec($cmd1);
// shell_exec("ls");
if (!$output) 
{
    echo "error1<br>";//无输出，不是错误
}
else
{
    echo $output;
}


$cmd2 = "docker-compose up -d";
$output2 = shell_exec($cmd2);
if (!$output2) 
{
    echo "error2";
}
else
{
    echo $output2;
}
?>