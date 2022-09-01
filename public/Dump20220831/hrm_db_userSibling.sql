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
-- Table structure for table `userSibling`
--

DROP TABLE IF EXISTS `userSibling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userSibling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `nonCitizen` varchar(45) DEFAULT NULL,
  `idNo` varchar(45) DEFAULT NULL,
  `passport` varchar(45) DEFAULT NULL,
  `gender` varchar(25) DEFAULT NULL,
  `expiryDate` date DEFAULT NULL,
  `issuingCountry` varchar(45) DEFAULT NULL,
  `contactNo` varchar(45) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `relationship` varchar(45) DEFAULT NULL,
  `address1` varchar(45) DEFAULT NULL,
  `address2` varchar(45) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userSibling`
--

LOCK TABLES `userSibling` WRITE;
/*!40000 ALTER TABLE `userSibling` DISABLE KEYS */;
INSERT INTO `userSibling` VALUES (1,'19','test','test',NULL,NULL,NULL,NULL,'2',NULL,NULL,'XXXXXXXXXX','2022-12-31',NULL,'2',NULL,NULL,NULL,'0','0','0','2022-08-30 01:47:28.000000','2022-08-30 14:44:58.000000'),(2,'19','asdas','dasdas',NULL,NULL,NULL,NULL,'1',NULL,NULL,'XXXXXXXXXX','2022-08-12',NULL,'1','12312','3123123','1231232','13123','Pahang','VG','2022-08-30 14:43:26.000000','2022-08-30 14:44:35.000000'),(4,'66','daf','daf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'XXXXXXXXXX','2022-08-26',NULL,'2','asd','asd','as','dsadasd','Pahang','AI','2022-08-31 02:53:19.000000','2022-08-31 02:53:42.000000');
/*!40000 ALTER TABLE `userSibling` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-31 20:19:43
