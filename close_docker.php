<?php
function check($str)
{
    if (!strstr($str,"..")&&!strstr($str,"*")&&strstr($str,"/TEMP")) {
        return TRUE;
    }
    else{
        return FALSE;
    }
}
if(isset($_GET["arg1"])&&isset($_GET["arg2"])){
    $path1 = $_GET["arg1"];
    $path2 = $_GET["arg2"];
    echo $path1;
    echo $path2;
    if(!check($path1)||!check($path2)){
        die("Invalid call.");
    }
    $cmd1 = "cd ".$path1." && sudo docker-compose down";
    shell_exec($cmd1);
    /*
    这里写关闭docker的功能，
    arg1是yml所在路径（用于关闭docker），
    arg2是题目路径（用于删除）
    */
        $cmd2 = "rm -r \"".$path2."\"";
        shell_exec($cmd2);
}
else{
    echo "Invalid call.";
}
//http://192.168.64.129/close_docker.php?arg1=./TEMP/CandyShop0000111111&arg2=./TEMP/CandyShop0000111111
?>
