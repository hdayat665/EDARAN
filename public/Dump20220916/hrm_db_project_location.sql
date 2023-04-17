-- MySQL dump 10.13  Distrib 5.7.38, for Win32 (AMD64)
--
-- Host: localhost    Database: hrm_db
-- ------------------------------------------------------
-- Server version	5.7.35-0ubuntu0.18.04.1

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
-- Table structure for table `project_location`
--

DROP TABLE IF EXISTS `project_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) DEFAULT NULL,
  `project_id` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `location_google` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_location`
--

LOCK TABLES `project_location` WRITE;
/*!40000 ALTER TABLE `project_location` DISABLE KEYS */;
INSERT INTO `project_location` VALUES (1,NULL,'2','2','aaaaa','aaaaa',NULL,'aaaa',NULL,'Kelantan',NULL,'aaaadd','2022-09-08 18:35:18','2022-09-08 18:35:18'),(3,1,'2','2','LLLLLLLLLLLLLLL','LLLLLLLLLL',NULL,'LLLLLLLLL',NULL,'Kelantan',NULL,'DDDDDDD','2022-09-08 19:03:11','2022-09-08 19:03:11'),(4,1,'2','2','mmmmmmmmmmM','MMMMMMMMMMMMM','MMMMMMMM','MMMMMMMM','MMMMMMMMM','Kedah',NULL,'MMMMMMMMMMM','2022-09-08 19:04:37','2022-09-08 19:05:07'),(5,53,'4','4','site a','adasd','dassdas','adasd','3123','Kedah',NULL,'kedah','2022-09-12 15:43:50','2022-09-12 15:43:50'),(6,53,'4','4','site b','sad','lmlm','mlml','lmlml','Kelantan',NULL,'asda','2022-09-12 16:48:05','2022-09-12 16:48:05'),(7,53,'4','4','site 3','kkk','kjkj','jkjkjkj','kjk','Kedah',NULL,'asdas','2022-09-12 16:48:27','2022-09-12 16:48:27');
/*!40000 ALTER TABLE `project_location` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-16  0:45:25
