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
if (is_dir($path2)) {
    die("Cannot open again.");
}
copydir($path1, $path2);
// echo $path1;
// echo $path2;
$cmd1 = "find ./TEMP/" . $_POST["chall_name"] . $_POST["user_id"] . " -name docker-compose.yml";

$path3 = shell_exec($cmd1);
// echo $path3 . "<br>";
$path3 = str_replace("\n", "", $path3);
$content = file_get_contents($path3);
// echo "-----------------------";
// var_dump($content);
$Num1 = mt_rand(40000, 65535);
// $Num2 = mt_rand(10000, 40000);
$before = '/- "\d{1,}:/';
preg_match($before, $content, $match);
$after = "- \"" . $Num1 . ':';
$content = str_replace($match, $after, $content);
// echo $content;
// $cmd3 = "chmod -R 777 * && ls";
// shell_exec($cmd3);
// echo "-----------------------";
$newfile = file_put_contents($path3, $content);
// var_dump($newfile);
// echo "-----------------------";
$cmd2 = "cd ./TEMP/" . $_POST["chall_name"] . $_POST["user_id"] . " && sudo docker-compose up -d"; //正常
// echo "-----------------------";
// echo $cmd2;
$result = shell_exec($cmd2);
// echo "-----------------------";
// var_dump($result);
$list = array();
// echo $Num1;
$url = "http://192.168.223.131:" . $Num1;
array_push($list, $url);
// echo "http://192.168.64.129:" . $Num1;

array_push($list, $path2);
$path4 = "./TEMP/" . $_POST["chall_name"] . $_POST["user_id"];
array_push($list, $path4);
echo json_encode($list);
// var_dump(json_decode(json_encode($list)));
// $cmd4 = "python3 countDown.py \"".$path2."\"";
// echo $cmd4;
// shell_exec($cmd4);
// echo "15 seconds left.";
