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
-- Table structure for table `userProfile`
--

DROP TABLE IF EXISTS `userProfile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userProfile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `nonNetizen` varchar(45) DEFAULT NULL,
  `idNo` varchar(45) DEFAULT NULL,
  `passport` varchar(45) DEFAULT NULL,
  `expiryDate` datetime DEFAULT NULL,
  `issuingCountry` varchar(45) DEFAULT NULL,
  `DOB` datetime DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `maritialStatus` varchar(45) DEFAULT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `race` varchar(45) DEFAULT NULL,
  `phoneNo` varchar(45) DEFAULT NULL,
  `homeNo` varchar(45) DEFAULT NULL,
  `extensionNo` varchar(45) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `personalEmail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userProfile`
--

LOCK TABLES `userProfile` WRITE;
/*!40000 ALTER TABLE `userProfile` DISABLE KEYS */;
INSERT INTO `userProfile` VALUES (6,'27','hdyat665',NULL,'wan muhammad hidayat','wan shukri','wan muhammad hidayat bin wan shukri','on','9090909081',NULL,'2022-08-24 00:00:00','MY','2022-08-24 00:00:00','Male','married','Islam','Malay','012292883921','0199299311','2091','2022-08-22 09:38:28.000000','2022-08-22 09:38:28.000000','dd@gmail.com'),(7,'30','b',NULL,NULL,NULL,NULL,'on',NULL,NULL,'2022-08-22 17:47:19','0','2022-08-22 17:47:19','0','0','0','0',NULL,NULL,NULL,'2022-08-22 09:47:19.000000','2022-08-22 09:47:19.000000',NULL),(8,'31','h',NULL,NULL,NULL,NULL,'on',NULL,NULL,'2022-08-22 17:54:00','0','2022-08-22 17:54:00','0','0','0','0',NULL,NULL,NULL,'2022-08-22 09:54:00.000000','2022-08-22 09:54:00.000000',NULL),(9,'32','qqwe',NULL,NULL,NULL,NULL,'on',NULL,NULL,'2022-08-22 17:54:34','0','2022-08-22 17:54:34','0','0','0','0',NULL,NULL,NULL,'2022-08-22 09:54:34.000000','2022-08-22 09:54:34.000000',NULL),(10,'33','zxczxczxc',NULL,NULL,NULL,NULL,'on',NULL,NULL,'2022-08-22 18:00:56','0','2022-08-22 18:00:56','0','0','0','0',NULL,NULL,NULL,'2022-08-22 10:00:56.000000','2022-08-22 10:00:56.000000',NULL),(11,'34','mkm',NULL,'km','kmkmkm','kmkmkmk','on','8989',NULL,'2022-08-23 00:00:00','DZ','2022-08-30 00:00:00','Male','single','Islam','Malay','1212123123','q',NULL,'2022-08-22 10:12:21.000000','2022-08-22 10:12:21.000000','asd@sdsd.com'),(12,'35','hdayat665@gmail.com',NULL,'ahmad','mohsin','ahmad mohsin','on','123211123123',NULL,'2022-08-25 00:00:00','MY','2022-08-01 00:00:00','Male','single','Islam','Malay','123121123123',NULL,NULL,'2022-08-24 19:06:15.000000','2022-08-24 19:06:15.000000','hdayat665@gmail.com'),(13,'19','m@gmail.com',NULL,'asdasdd','police','aasdasda','','1312312',NULL,'2022-09-10 00:00:00','0','2022-08-17 00:00:00','0','0','Islam','Malay','asdasd',NULL,NULL,'2022-08-24 19:08:53.000000','2022-08-26 08:40:26.000000','asadasdas@gmail.com');
/*!40000 ALTER TABLE `userProfile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-30 11:01:57
