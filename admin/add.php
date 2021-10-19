<?php
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
$temp = explode(".", $_FILES["file"]["name"]);

$extension = end($temp);     // 获取文件后缀名
if (($_FILES["file"]["type"] == "application/x-zip-compressed") && ($_FILES["file"]["size"] < 204800) && in_array($extension, $allowedExts)) {
	if ($_FILES["file"]["error"] > 0) {
		echo "错误：: " . $_FILES["file"]["error"] . "<br>";
	} else {

		$cmd = "find / -name " . $_POST["type_name"];
		$path = substr(shell_exec($cmd), 0, -1) . "/" . $_FILES["file"]["name"];


		if (file_exists($path)) {
			echo $_FILES["file"]["name"] . " 文件已经存在。 ";
		} else {
			move_uploaded_file($_FILES["file"]["tmp_name"], $path);
			echo "文件存储在: " . $path;
		}
	}
} else {
	echo "非法的文件格式";
}
$no_extension_name = str_replace(".zip", "", $_FILES["file"]["name"]);

$cmd2 = "cd ../challenges/" . $_POST["type_name"] . " && mkdir " . $no_extension_name;
shell_exec($cmd2);
$path2 = "../challenges/" . $_POST["type_name"] . "/" . $no_extension_name;
unzip_file($path, $path2);

$cmd3 = "rm ../challenges/" . $_POST["type_name"] . "/" . $_FILES["file"]["name"];
shell_exec($cmd3);
