<?php
$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "teams";
$conn = new mysqli("localhost",$user,$passwd,$db);
if($conn->connect_error){
    die("Connection faild.".$conn->connect_error);
}
else{
    if(isset($_GET["tname"])&&isset($_GET["name"])){
        $tname = $_GET["tname"];
        $captain = $_GET["name"];
        $id = md5($tname);
        mysqli_query($conn,"SET NAMES UTF8");
        $s1 = "select * from ".$tb." where tname=\"".$tname."\" and active=\"1\"";

        $conn->query($s1);
        if(mysqli_affected_rows($conn)!=0){
            exit("teame name already exist.");
        }

        else{
            $s2="insert into teams (`id`,`tname`,`captain`) values (\"".$id."\",\"".$tname."\",\"".$captain."\");";
            
            $conn->query($s2);
            echo $s2;
            if(mysqli_affected_rows($conn)!=-1){
                $score = 0;
                $s3="insert into scoreboard (`id`,`tname`,`score`) values (\"".$id."\",\"".$tname."\",\"".$score."\");";
                $conn->query($s3);
                echo $s3;
                if(mysqli_affected_rows($conn)!=-1){
                    $s4="update users team=\"".$tname."\" where name=".$name ;
                    $conn->query($s4);
                    echo $s4;
                    if(mysqli_affected_rows($conn)!=-1){
                        exit("done");
                    }
                    else{
                        die("Tamper with the package is invalid!");
                    }
                }
                else{
                    die("Tamper with the package is invalid!");
                }
            }
            else{
                die("Tamper with the package is invalid!");
            }
        } 
    }
    else{
        die("Invalid call.");
    }
}
//http://192.168.64.129/createteam.php?tname=1&name=1