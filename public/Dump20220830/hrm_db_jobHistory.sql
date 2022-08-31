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
-- Table structure for table `jobHistory`
--

DROP TABLE IF EXISTS `jobHistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobHistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) DEFAULT NULL,
  `employmentDetail` varchar(255) DEFAULT NULL,
  `effectiveDate` date DEFAULT NULL,
  `event` varchar(45) DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobHistory`
--

LOCK TABLES `jobHistory` WRITE;
/*!40000 ALTER TABLE `jobHistory` DISABLE KEYS */;
INSERT INTO `jobHistory` VALUES (1,'11','Ex: Unit has changed from Application Unit to Solution Analyst Unit','2022-08-17','terbaik','saaiful','2022-08-19 07:42:58.000000','2022-08-19 07:42:58.000000',NULL),(2,'23','test','2022-08-19',NULL,NULL,'2022-08-19 09:00:15.000000','2022-08-19 09:00:15.000000',NULL),(3,'23','test','2022-08-19',NULL,'h@gmail.com','2022-08-19 09:01:15.000000','2022-08-19 09:01:15.000000',NULL),(4,'23','test','2022-08-19',NULL,'h@gmail.com','2022-08-19 09:04:18.000000','2022-08-19 09:04:18.000000',NULL),(5,'10','2','2022-08-22',NULL,'m@gmail.com','2022-08-22 00:29:41.000000','2022-08-22 00:29:41.000000',NULL),(6,'10','1','2022-08-22',NULL,'m@gmail.com','2022-08-22 00:31:47.000000','2022-08-22 00:31:47.000000',NULL),(7,'10','1','2022-08-22',NULL,'m@gmail.com','2022-08-22 00:32:40.000000','2022-08-22 00:32:40.000000',NULL),(8,'23','2','2022-08-23',NULL,'m@gmail.com','2022-08-22 08:08:56.000000','2022-08-22 08:08:56.000000',NULL);
/*!40000 ALTER TABLE `jobHistory` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-30 11:01:53
