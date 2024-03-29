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
-- Table structure for table `tenant`
--

DROP TABLE IF EXISTS `tenant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tenant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(20) DEFAULT NULL,
  `tenant_name` varchar(45) DEFAULT NULL,
  `tenant_status` varchar(45) DEFAULT NULL,
  `tenant_decs` varchar(45) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenant`
--

LOCK TABLES `tenant` WRITE;
/*!40000 ALTER TABLE `tenant` DISABLE KEYS */;
INSERT INTO `tenant` VALUES (1,1,'pnb',NULL,NULL,'2022-09-02 16:56:52.000000','2022-09-02 16:56:52.000000'),(2,NULL,'ttt',NULL,NULL,'2022-09-02 17:01:49.000000','2022-09-02 17:01:49.000000'),(3,NULL,'aaaa',NULL,NULL,'2022-09-02 17:06:33.000000','2022-09-02 17:06:33.000000'),(4,45,'asda',NULL,NULL,'2022-09-02 17:07:34.000000','2022-09-02 17:07:34.000000'),(5,46,'hidayat',NULL,NULL,'2022-09-02 17:09:25.000000','2022-09-02 17:09:25.000000'),(6,48,'ali sbn bhd',NULL,NULL,'2022-09-03 14:50:24.000000','2022-09-03 14:50:24.000000'),(7,49,'ali',NULL,NULL,'2022-09-03 15:45:12.000000','2022-09-03 15:45:12.000000'),(8,53,'Edaran',NULL,NULL,'2022-09-11 15:27:34.000000','2022-09-11 15:27:34.000000'),(9,54,'miau',NULL,NULL,'2022-09-11 15:31:45.000000','2022-09-11 15:31:45.000000'),(10,54,'miau',NULL,NULL,'2022-09-11 15:34:10.000000','2022-09-11 15:34:10.000000');
/*!40000 ALTER TABLE `tenant` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-16  0:46:23
