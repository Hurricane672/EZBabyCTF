<?php
header("Content-type:text/html;charset=utf-8");

function unzip_file(string $zipName, string $dest)
{
	if (!is_file($zipName)) {

		return false;
	}
	if (!is_dir($dest)) {
		echo "error";
		mkdir($dest, 0777, true);
	}

	$zip = new ZipArchive();

	if ($zip->open($zipName)) {

		$zip->extractTo($dest);

		$zip->close();

		return true;
	} else {

		return false;
	}
}

$allowedExts = array("zip");
$temp = explode(".", $_FILES["chall_file"]["name"]);

$extension = end($temp);     // 获取文件后缀名
if (($_FILES["chall_file"]["type"] == "application/x-zip-compressed") && ($_FILES["chall_file"]["size"] < 204800) && in_array($extension, $allowedExts)) {
	if ($_FILES["chall_file"]["error"] > 0) {
		echo "错误：: " . $_FILES["chall_file"]["error"] . "<br>";
	} else {

		$cmd = "find / -name " . $_POST["chall_type"];
		$path = substr(shell_exec($cmd), 0, -1) . "/" . $_FILES["chall_file"]["name"];


		if (file_exists($path)) {
			echo $_FILES["chall_file"]["name"] . " 文件已经存在。 ";
		} else {
			move_uploaded_file($_FILES["chall_file"]["tmp_name"], $path);
			echo "文件存储在: " . $path;
		}
	}
} else {
	echo "非法的文件格式";
}
$no_extension_name = str_replace(".zip", "", $_FILES["chall_file"]["name"]);

$cmd2 = "cd ../challenges/" . $_POST["chall_type"] . " && mkdir " . $no_extension_name;
shell_exec($cmd2);
$path2 = "../challenges/" . $_POST["chall_type"] . "/" . $no_extension_name;
unzip_file($path, $path2);

$cmd3 = "rm ../challenges/" . $_POST["chall_type"] . "/" . $_FILES["chall_file"]["name"];
shell_exec($cmd3);



$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "challenges";
$conn = new mysqli("localhost", $user, $passwd, $db);
if ($conn->connect_error) {
	die("Connection faild." . $conn->connect_error);
}

$sql = 'INSERT INTO  challenges (`id`,`name`,`category`, `message`,`value`,`flag`,`file`)  VALUES (md5($_POST["chall_name"]), $_POST["chall_name"],$_POST["chall_type"],$_POST["chall_des"],$_POST["chall_score"],$_POST["chall_flag"],$path2);';

if ($conn->query($sql) === TRUE) {
	echo "success";
} else {
	echo "<br>" . "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
