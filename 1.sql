-- MySQL dump 10.13  Distrib 5.7.34, for Linux (x86_64)
--
-- Host: localhost    Database: ezbabyctf
-- ------------------------------------------------------
-- Server version	5.7.34-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `challenges`
--

DROP TABLE IF EXISTS `challenges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `challenges` (
  `id` varchar(32) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `value` int(11) NOT NULL,
  `flag` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `challenges`
--

LOCK TABLES `challenges` WRITE;
/*!40000 ALTER TABLE `challenges` DISABLE KEYS */;
INSERT INTO `challenges` VALUES ('02181ec55d150f6230547dbbf313e4f8','CheckIn','Misc','no',500,'flag{first_misc}','./challenges/Misc/CheckIn.zip'),('6ea6688cc99719eb4624eef718719215','LSB','Misc','no',500,'flag{second_misc}','./challenges/Misc/LSB.zip'),('ec7553e42cad6f1007645ba062f7e8ee','wireshark','Misc','no',500,'flag{third_misc}','./challenges/Misc/wireshark.zip'),('c8d46d341bea4fd5bff866a65ff8aea9','game','Pwn','no',1000,'flag{second_pwn}','./challenges/Pwn/game.zip'),('cc49f54502256234ab93de168a139971','EasySQLi','Web','no',1000,'flag{second_web}','./challenges/Web/EasySQLi.zip'),('1991a88ea2ab3389899ae933fe41b83d','ns_shaft_sql','Web','no',1000,'flag{third_web}','./challenges/Web/ns_shaft_sql.zip'),('7c02907ca91d6baabedf7e0ed952275d','ezheap','Pwn','no',1000,'flag{first_pwn}','./challenges/Pwn/ezheap.zip'),('4c60441fe7a879ce1dc5cb98ba327381','Pokemon','Pwn','no',1000,'flag{third_pwn}','./challenges/Pwn/Pokemon.zip'),('fb3ce13f227e58e90bc6b7e363667887','CandyShop','Web','no',1000,'flag{first_web}','./challenges/Web/CandyShop.zip');
/*!40000 ALTER TABLE `challenges` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-01 22:30:57
