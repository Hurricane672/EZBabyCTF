<?php

function copydir($source, $dest)
{
    if (!file_exists($dest)) {
        mkdir($dest);
    }
    $handle = opendir($source);
    while (($item = readdir($handle)) !== false) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        $_source = $source . '/' . $item;
        $_dest = $dest . '/' . $item;
        if (is_file($_source)) {
            copy($_source, $_dest);
        }
        if (is_dir($_source)) {
            copydir($_source, $_dest);
        }
    }
    closedir($handle);
}

$path1 = "./challenges/" . $_POST["chall_type"] . "/" . $_POST["chall_name"];
$path2 = "./TEMP/" . $_POST["chall_name"] . $_POST["user_id"];
copydir($path1, $path2);
// echo $path1;
// echo $path2;
$cmd1 = "find ./TEMP/" . $_POST["chall_name"] . $_POST["user_id"] . " -name docker-compose.yml";
$path3 = shell_exec($cmd1);
echo $path3 . "<br>";

$content = file_get_contents($path3);
echo "-----------------------";
var_dump($content);
$Num1 = mt_rand(40000, 65535);
$Num2 = mt_rand(10000, 40000);
$before = '/\d{1,}:\d{1,}/';
preg_match($before, $content, $match);
$after = $Num1 . ':' . $Num2;
$content = str_replace($match, $after, $content);
<<<<<<< HEAD
var_dump($content);
$r1 = file_put_contents($path, $content);
var_dump($r1);
$cmd1 = "cd ./challenges/" . $_POST["type_name"] . "/" . $_POST["challenge_name"] . "&& sudo docker-compose up -d"; //正常
echo $cmd1;
$output = shell_exec($cmd1);
var_dump($output);
echo "192.168.64.129:" . $Num1;
=======
file_put_contents($path, $content);
$cmd2 = "cd ./TEMP/" . $_POST["chall_name"] . $_POST["user_id"] . " && sudo docker-compose up -d"; //正常
echo "-----------------------";
echo $cmd2;
$result=shell_exec($cmd2);
echo "-----------------------";
var_dump($result);
echo "192.168.223.131:" . $Num1;
>>>>>>> d8848b82f0e9bbd5d1ca1aa0ffe7b8c8d606c534
