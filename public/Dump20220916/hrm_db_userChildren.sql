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
-- Table structure for table `userChildren`
--

DROP TABLE IF EXISTS `userChildren`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userChildren` (
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
  `DOB` date DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `maritalStatus` varchar(45) DEFAULT NULL,
  `educationType` varchar(45) DEFAULT NULL,
  `educationLevel` varchar(45) DEFAULT NULL,
  `instituition` varchar(45) DEFAULT NULL,
  `supportDoc` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userChildren`
--

LOCK TABLES `userChildren` WRITE;
/*!40000 ALTER TABLE `userChildren` DISABLE KEYS */;
INSERT INTO `userChildren` VALUES (1,'58','asdasd','asdas','dasdasd','on','asdasd','21312',NULL,'AI',NULL,'sadasd','1','2','3','1','sadasd','16618976301UfGsO.jpg','2022-08-30 14:13:50.000000','2022-08-30 16:18:01.000000'),(2,'19','adas','lml','m',NULL,'ml','lm',NULL,'AI',NULL,'mlm','0','0','0','0',NULL,NULL,'2022-08-30 15:01:06.000000','2022-08-30 15:01:06.000000'),(3,NULL,'kmkmk','mk','mk','on','mkmkmk',NULL,NULL,'AI',NULL,NULL,'0','0','0','0',NULL,NULL,'2022-08-30 16:09:47.000000','2022-08-30 16:09:47.000000'),(5,'66','jojo','jojo','jojos','on','123412',NULL,NULL,'AI','2022-08-02','1','1','1','0','0',NULL,NULL,'2022-08-31 02:50:17.000000','2022-08-31 02:50:48.000000');
/*!40000 ALTER TABLE `userChildren` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-16  0:46:32
