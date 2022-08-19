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
-- Table structure for table `userCompanion`
--

DROP TABLE IF EXISTS `userCompanion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userCompanion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `nonCitizen` varchar(45) DEFAULT NULL,
  `idNo` varchar(45) DEFAULT NULL,
  `passport` varchar(45) DEFAULT NULL,
  `expiryDate` varchar(45) DEFAULT NULL,
  `issuingCountry` varchar(45) DEFAULT NULL,
  `contactNo` varchar(45) DEFAULT NULL,
  `DOB` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `DOM` varchar(45) DEFAULT NULL,
  `marrigeCert` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `working` varchar(45) DEFAULT NULL,
  `employment` varchar(45) DEFAULT NULL,
  `companyName` varchar(45) DEFAULT NULL,
  `incomeTax` varchar(45) DEFAULT NULL,
  `payslip` varchar(255) DEFAULT NULL,
  `officeNo` varchar(45) DEFAULT NULL,
  `address1E` varchar(255) DEFAULT NULL,
  `address2E` varchar(255) DEFAULT NULL,
  `postcodeE` varchar(45) DEFAULT NULL,
  `cityE` varchar(45) DEFAULT NULL,
  `stateE` varchar(45) DEFAULT NULL,
  `countryE` varchar(45) DEFAULT NULL,
  `mainCompanion` varchar(45) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userCompanion`
--

LOCK TABLES `userCompanion` WRITE;
/*!40000 ALTER TABLE `userCompanion` DISABLE KEYS */;
INSERT INTO `userCompanion` VALUES (1,'10','qqqqqqqq','kmkmkmkmkk','kmkmkm','asdasd','dasdas','sadasd','asdasdas','sadsad','sadasdas','asdasd','asdasd','asdasd','16607476791UfGsO.jpg','dasdasd','sadasdsad','dasd','dsadsadas','sadas','asdasd','asdasd','asdasd','asdadasd','asdasd','16607476791UfGsO.jpg','adasd','asdasd','asdasd','asdasd','asdasd','asdasd','asdas','asdasdasd',NULL,'2022-08-17 06:47:59.000000');
/*!40000 ALTER TABLE `userCompanion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-19  4:00:22
