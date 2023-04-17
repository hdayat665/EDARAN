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
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `file` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments`
--

LOCK TABLES `attachments` WRITE;
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
INSERT INTO `attachments` VALUES (6,'22','termination',NULL,'16611557481UfGsO.jpg','2022-08-22 00:09:08','2022-08-22 00:09:08'),(7,'22','termination',NULL,'16611557484f96ffd5f607adedf6c9cd89ee07acea.png','2022-08-22 00:09:08','2022-08-22 00:09:08'),(8,'10','termination',NULL,'16611566201UfGsO.jpg','2022-08-22 00:23:40','2022-08-22 00:23:40'),(9,'10','termination',NULL,'16611566204f96ffd5f607adedf6c9cd89ee07acea.png','2022-08-22 00:23:40','2022-08-22 00:23:40'),(10,'10','termination',NULL,'16611568081UfGsO.jpg','2022-08-22 00:26:48','2022-08-22 00:26:48'),(11,'10','termination',NULL,'16611568094f96ffd5f607adedf6c9cd89ee07acea.png','2022-08-22 00:26:49','2022-08-22 00:26:49'),(12,'10','termination',NULL,'16611568191UfGsO.jpg','2022-08-22 00:26:59','2022-08-22 00:26:59'),(13,'10','termination',NULL,'16611568194f96ffd5f607adedf6c9cd89ee07acea.png','2022-08-22 00:26:59','2022-08-22 00:26:59'),(14,'23','termination',NULL,'16611845361UfGsO.jpg','2022-08-22 08:08:56','2022-08-22 08:08:56'),(15,'23','termination',NULL,'16611845364f96ffd5f607adedf6c9cd89ee07acea.png','2022-08-22 08:08:56','2022-08-22 08:08:56');
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-16  0:46:27
