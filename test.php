<?php
var_dump(shell_exec("id"));
echo "<br>";
$s1 = "version: '2'\nservices:\nweb:\nbuild: .\nports:\n- \"3000:3000\"\ndb:\nimage: \"mongo\"";
var_dump($s1);
echo "<br>";
$s2 = preg_replace('/\d{1,}:\d{1,}/','200:200',$s1);
var_dump($s2);

?> 