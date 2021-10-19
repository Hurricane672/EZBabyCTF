<?php
// var_dump(shell_exec("id"));
// echo "<br>";
// $s1 = "version: '2'\nservices:\nweb:\nbuild: .\nports:\n- \"3000:3000\"\ndb:\nimage: \"mongo\"";
// var_dump($s1);
// echo "<br>";
// $s2 = preg_replace('/\d{1,}:\d{1,}/','200:200',$s1);
// var_dump($s2);
//echo shell_exec("cd ./challenges/Web/CandyShop;sudo docker-compose up -d;sudo docker-compose ps");
$r = shell_exec("sudo cd ./challenges/Web/CandyShop&&sudo docker-compose up -d");
echo $r?$r:"null";
// array(1) { [0]=> string(10) "29699:3000" } Array
// 29746:3000
// version: '2' services: web: build: . ports: - "29746:3000" db: image: "mongo"
// errorwww cd ./challenges/Web/CandyShop
// error1
// error2
?> 