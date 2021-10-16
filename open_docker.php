<?php
// echo $_POST["type_name"];
// echo "<br>";
// echo $_POST["challenge_name"];
// echo "<br>";

$path="./challenges/" . $_POST["type_name"] . "/" . $_POST["challenge_name"] . "/docker-compose.yml";
// echo $path;
// echo "<br>";
$content = file_get_contents($path);
// echo $content;
// echo "<br>";

$Num = mt_rand(20000,30000);
// echo $Num;
// echo "<br>";

$before = "/[(\d)*:(\d)*]/" ;
preg_match($before,$content,$match);
var_dump( $match);
echo $match . "<br>";
// echo $before;
$after = $Num . ':3000';
echo $after . "<br>";

$content = str_replace($match,$after,$content);
echo $content;
echo "<br>";
if(!file_put_contents($path,$content))
{
    echo "error";
}

$content = file_get_contents($path);
echo $content;
echo "<br>";
echo shell_exec("whoami");
