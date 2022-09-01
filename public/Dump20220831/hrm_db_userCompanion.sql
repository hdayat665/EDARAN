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
  `expiryDate` date DEFAULT NULL,
  `issuingCountry` varchar(45) DEFAULT NULL,
  `contactNo` varchar(45) DEFAULT NULL,
  `DOB` datetime DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `DOM` datetime DEFAULT NULL,
  `marrigeCert` varchar(255) DEFAULT NULL,
  `marrigeStatus` varchar(25) DEFAULT NULL,
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
  `dateJoined` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userCompanion`
--

LOCK TABLES `userCompanion` WRITE;
/*!40000 ALTER TABLE `userCompanion` DISABLE KEYS */;
INSERT INTO `userCompanion` VALUES (1,'19','adas','lkllkl','mat jijang',NULL,'09090','090','2022-12-31','BS','212121','2022-12-31 00:00:00','12','2022-12-31 00:00:00','16618971161UfGsO.jpg','3','12121212','12121','12121','121212','Kedah','AW',NULL,NULL,'11211212','2121212','16618971164f96ffd5f607adedf6c9cd89ee07acea.png','1212121','21212','121212','21212','121212','Kelantan','AW',NULL,'2022-08-30 14:05:16.000000','2022-08-30 14:07:15.000000','2022-08-30'),(2,'19','asdas',NULL,'asdasda',NULL,NULL,NULL,'2022-08-30','AI',NULL,'2022-08-30 00:00:00',NULL,'2022-08-30 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,'0','AI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','AI',NULL,'2022-08-30 14:10:30.000000','2022-08-30 14:10:30.000000',NULL),(3,'58','kmkmk','gdg','mat kilau 6',NULL,'123','123123','2022-12-31','AG','123123','2022-08-30 00:00:00','12','2022-12-31 00:00:00','16619039091UfGsO.jpg','3','dfsdfsk','k','nk','k','Negeri Sembilan','AR',NULL,NULL,'kmkmk','kj','16619039094f96ffd5f607adedf6c9cd89ee07acea.png','njnj','nj','nj','njnjn','nj','Johor','AG',NULL,'2022-08-30 15:58:29.000000','2022-08-30 16:01:25.000000','2022-08-31'),(4,'66','lisaf','lisa','lisaf',NULL,'1235','123456','2022-08-31','MY','12456','2022-08-31 00:00:00','34','2022-08-17 00:00:00','16619429351UfGsO.jpg','0','kota bharu','kota bharu','1234','kota bharu','Kelantan','MY',NULL,NULL,'zaju','123456','16619429354f96ffd5f607adedf6c9cd89ee07acea.png','1234567','kota bharu','kota bharu','123456','kota bharu','Kelantan','MY',NULL,'2022-08-31 02:48:55.000000','2022-08-31 02:49:33.000000','2022-08-31');
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

-- Dump completed on 2022-08-31 20:19:34
