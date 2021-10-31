<?php
header("Content-type:text/html;charset=utf-8");

$results = array(1 => "Invalid characters", 2 => "text too long", 3 => "challenge score too big", 4 => "Invalid flag", 5 => "File format error", 6 => "upgrade", 7 => "Invalid file format", 8 => "db faild", 9 => "not the same name", 10 => "success");
var_dump(json_encode($results));
function unzip_file(string $zipName, string $dest)
{
	// echo ("------------------------");
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


function check($str)
{
	if (!strstr($str, '!') && !strstr($str, '@') && !strstr($str, '#') && !strstr($str, '$') && !strstr($str, '%') && !strstr($str, '^') && !strstr($str, '&') && !strstr($str, '*') && !strstr($str, '(') && !strstr($str, ')') && !strstr($str, '-') && !strstr($str, '_') && !strstr($str, '=') && !strstr($str, '+') && !strstr($str, '[') && !strstr($str, ']') && !strstr($str, '"') && !strstr($str, '\'') && !strstr($str, ';') && !strstr($str, '<') && !strstr($str, '>') && !strstr($str, '?') && !strstr($str, '`') && !strstr($str, '~') && !strstr($str, '\\') && !strstr($str, '/') && !strstr($str, '|') && !strstr($str, '\'')) {
		return TRUE;
	} else {
		return FALSE;
	}
}

$cmd3 = "cd .. && chmod -R 777 *"; //有点小问题
shell_exec($cmd3);
if (!check($_POST["chall_name"]) && !check($_POST["chall_des"]) && !check($_POST["chall_flag"])) {
	die("1");
}


if (mb_strlen($_POST["chall_name"]) > 56) {
	die("2");
}
if (mb_strlen($_POST["chall_des"]) > 56) {
	die("2");
}
if ($_POST["chall_score"] > 1000) {
	die("3");
}
if (mb_strlen($_POST["chall_flag"]) > 50 && strstr($str, 'flag{')) {
	die("4");
}


$allowedExts = array("zip");
$temp = explode(".", $_FILES["chall_file"]["name"]);

$extension = end($temp);     // 获取文件后缀名
$no_extension_name = str_replace(".zip", "", $_FILES["chall_file"]["name"]);
if ($no_extension_name !== $_POST["chall_name"]) {
	die("9");
}

if (($_FILES["chall_file"]["type"] == "application/x-zip-compressed") && ($_FILES["chall_file"]["size"] < 204800) && in_array($extension, $allowedExts)) {
	if ($_FILES["chall_file"]["error"] > 0) {
		// die("错误：: " . $_FILES["chall_file"]["error"] . "<br>");
		die("5");
	} else {
		// echo ("------------------------");
		$cmd = "find / -name " . $_POST["chall_type"];
		$path = substr(shell_exec($cmd), 0, -1) . "/" . $_FILES["chall_file"]["name"];
		// echo $cmd;

		if (file_exists($path)) {
			$str1 = shell_exec($cmd);
			$str1 = str_replace("\n", "", $str1);
			$cmd3="cd " . $str1. "&&rm -rf " . $_FILES["chall_file"]["name"] . " " . $no_extension_name;
			// echo $cmd3;
			shell_exec($cmd3);
			move_uploaded_file($_FILES["chall_file"]["tmp_name"], $path);
			echo("6" . "<br>");
		} else {
			move_uploaded_file($_FILES["chall_file"]["tmp_name"], $path);
			// echo "文件存储在: " . $path;
		}
	}
} else {
	die("7");
}


$cmd2 = "cd ../challenges/" . $_POST["chall_type"] . " && mkdir " . $no_extension_name;
shell_exec($cmd2);
$path2 = "../challenges/" . $_POST["chall_type"] . "/" . $no_extension_name;
unzip_file($path, $path2);

// $cmd3 = "rm ../challenges/" . $_POST["chall_type"] . "/" . $_FILES["chall_file"]["name"];
// shell_exec($cmd3);

$user = "ezbabyctf";
$passwd = "ezbabyctf";
$db = "ezbabyctf";
$tb = "challenges";
$conn = new mysqli("localhost", $user, $passwd, $db);
if ($conn->connect_error) {
	// die("Connection faild." . $conn->connect_error);
	die("8");
}
$path3 = "./challenges/" . $_POST["chall_type"] . "/" . $_FILES["chall_file"]["name"];
$sql = "INSERT INTO  challenges (`id`,`name`,`category`, `message`,`value`,`flag`,`file`)  VALUES (\"" . md5($_POST["chall_name"]) . "\",\"" . $_POST["chall_name"] . "\",\"" . $_POST["chall_type"] . "\",\"" . $_POST["chall_des"] . "\"," . $_POST["chall_score"] . ",\"" . $_POST["chall_flag"] . "\",\"" . $path3 . "\")";
$sql2 = "SELECT * FROM challenges where name=\"" . $no_extension_name . "\"";
// echo $sql2;

$result2 = $conn->query($sql2);
if (mysqli_affected_rows($conn) > 0) {
	//var_dump($conn->query($sql2));
	$sql3 = "DELETE FROM challenges WHERE name=\"" . $no_extension_name . "\"";
	// var_dump($sql3);
	$conn->query($sql3);
	echo("6" . "<br>");

	if ($conn->query($sql) === TRUE) {
		// echo "<br>" . "success";
		//echo $sql;
		echo ("10");
		$result3 = $conn->query($sql2);
		$data = mysqli_fetch_object($result3);
		var_dump(json_encode($data));

		// var_dump($result3);
	} else {
		//die("<br>" . "Error: " . $sql . "<br>" . $conn->error);
		die("8");
	}
	// die("6");
} else {
	if ($conn->query($sql) === TRUE) {
		// echo "<br>" . "success";
		//echo $sql;
		echo ("10");
		$result3 = $conn->query($sql2);
		$data = mysqli_fetch_object($result3);
		var_dump(json_encode($data));

		// var_dump($result3);
	} else {
		//die("<br>" . "Error: " . $sql . "<br>" . $conn->error);
		die("8");
	}
}
$conn->close();