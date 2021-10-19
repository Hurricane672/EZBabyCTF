<?php
// 允许上传的图片后缀
$allowedExts = array("zip");
$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
if (($_FILES["file"]["type"] == "application/x-zip-compressed")&& ($_FILES["file"]["size"] < 204800) && in_array($extension, $allowedExts))
{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "错误：: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{
		// echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
		// echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
		// echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		// echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
		$cmd="find ./ -name " . $_POST["type_name"];
        $path=shell_exec($cmd) . "/" . $_FILES["file"]["name"];
		
		//$path路径中的空格删不掉！！！！！！？？？？？？？？？？
		if (file_exists($path))
		{
			echo $_FILES["file"]["name"] . " 文件已经存在。 ";
		}
		else
		{
			move_uploaded_file($_FILES["file"]["tmp_name"], $path);
			echo "文件存储在: " . $path;
		}
	}
}
else
{
	echo "非法的文件格式";
}
