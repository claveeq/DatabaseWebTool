-- MySQL dump 10.16  Distrib 10.1.10-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: webtool_db
-- ------------------------------------------------------
-- Server version	10.1.10-MariaDB

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
-- Table structure for table `dbconnection`
--

DROP TABLE IF EXISTS `dbconnection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbconnection` (
  `db_id` int(11) NOT NULL AUTO_INCREMENT,
  `db_host` varchar(15) NOT NULL,
  `db_username` varchar(45) NOT NULL,
  `db_password` varchar(45) NOT NULL,
  `db_database` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`db_id`),
  UNIQUE KEY `db_host_UNIQUE` (`db_host`),
  UNIQUE KEY `db_id_UNIQUE` (`db_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbconnection`
--

LOCK TABLES `dbconnection` WRITE;
/*!40000 ALTER TABLE `dbconnection` DISABLE KEYS */;
INSERT INTO `dbconnection` VALUES (1,'localhost','root','1234','dbconnection'),(4,'192.168.1.74','developer','performance',''),(5,'192.168.233.129','root','1996',NULL);
/*!40000 ALTER TABLE `dbconnection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `history_server_name` varchar(20) NOT NULL,
  `history_db_name` varchar(20) NOT NULL,
  `history_date` varchar(20) NOT NULL,
  `history_dumpfile_loc` varchar(50) NOT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (11,'localhost','webtool_db','2016-05-12-08-05-55','C:/webtool_db2016-05-12-08-05-55.sql'),(12,'localhost','new_schema','2016-05-17-06-05-31','C:/new_schema2016-05-17-06-05-31.sql'),(13,'localhost','new_schema','2016-05-18-04-05-49','C:/new_schema2016-05-18-04-05-49.sql'),(14,'localhost','new_schema','2016-05-18-04-05-49','C:/new_schema2016-05-18-04-05-49.sql'),(15,'localhost','mysql','2016-05-18-04-05-48','C:/mysql2016-05-18-04-05-48.sql'),(16,'localhost','mysql','2016-05-18-05-05-28','C:/xampp/htdocsmysql2016-05-18-05-05-28.sql'),(17,'localhost','mysql','2016-05-18-05-05-47','C:/xampp/htdocs/mysql2016-05-18-05-05-47.sql'),(18,'localhost','mysql','2016-05-18-05-05-10','C:/xampp/htdocs/mysql2016-05-18-05-05-10.sql'),(19,'localhost','performance_schema','2016-05-18-05-05-42','C:/xampp/htdocs/performance_schema2016-05-18-05-05'),(20,'localhost','mysql','2016-05-18-05-05-30','C:/xampp/htdocs/mysql2016-05-18-05-05-30.sql'),(21,'localhost','new_schema','2016-05-18-05-05-00','C:/xampp/htdocs/new_schema2016-05-18-05-05-00.sql'),(22,'localhost','mysql','2016-05-18-05-05-46','C:/xampp/htdocs/mysql2016-05-18-05-05-46.sql'),(23,'localhost','information_schema','2016-05-18-05-05-05','C:/xampp/htdocs/information_schema2016-05-18-05-05'),(24,'localhost','information_schema','2016-05-18-05-05-09','C:/xampp/htdocs/information_schema2016-05-18-05-05'),(25,'localhost','new_schema','2016-05-18-05-05-46','C:/xampp/htdocs/new_schema2016-05-18-05-05-46.sql'),(26,'localhost','mysql','2016-05-18-06-05-41','C:/xampp/htdocs/mysql2016-05-18-06-05-41.sql'),(27,'localhost','performance_schema','2016-05-18-06-05-41','C:/xampp/htdocs/performance_schema2016-05-18-06-05'),(28,'localhost','mysql','2016-05-18-08-05-12','C:/xampp/htdocs/mysql2016-05-18-08-05-12.sql'),(29,'localhost','mysql','2016-05-18-08-05-26','C:/xampp/htdocs/mysql2016-05-18-08-05-26.sql');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servers`
--

DROP TABLE IF EXISTS `servers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servers` (
  `ip_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`ip_id`),
  UNIQUE KEY `ip_UNIQUE` (`ip`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servers`
--

LOCK TABLES `servers` WRITE;
/*!40000 ALTER TABLE `servers` DISABLE KEYS */;
INSERT INTO `servers` VALUES (1,'192.168.1.1'),(2,'192.168.1.2'),(3,'192.168.1.3'),(4,'192.168.1.4'),(5,'localhost');
/*!40000 ALTER TABLE `servers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `User_id` int(11) NOT NULL AUTO_INCREMENT,
  `User_name` varchar(45) NOT NULL,
  `User_password` varchar(45) NOT NULL,
  PRIMARY KEY (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-18 14:59:36
