<?php
echo $_POST["type_name"];
echo "<br>";
echo $_POST["challenge_name"];
echo "<br>";

$path="./challenges/" . $_POST["type_name"] . "/" . $_POST["challenge_name"] . "/docker-compose.yml";
echo $path;
echo "<br>";
$content = file_get_contents($path);
echo $content;
echo "<br>";
$content = str_replace('- "3000:3000"','- "3001:3000"',$content);
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


?>