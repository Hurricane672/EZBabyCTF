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
    if(!check($path1)||!check($path2)){
        die("Invalid call.");
    }
    $cmd = "python3 countDown.py \"".$path1."\" \"".$path2."\"";
    echo $cmd;
    shell_exec($cmd);
}
else{
    echo "Invalid call.";
}
?>