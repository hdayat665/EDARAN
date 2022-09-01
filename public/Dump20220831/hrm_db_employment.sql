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
-- Table structure for table `employment`
--

DROP TABLE IF EXISTS `employment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) DEFAULT NULL,
  `tenant_id` varchar(25) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `branch` varchar(45) DEFAULT NULL,
  `jobGrade` varchar(45) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `employmentType` varchar(45) DEFAULT NULL,
  `userRole` varchar(45) DEFAULT NULL,
  `supervisor` varchar(45) DEFAULT NULL,
  `joinedDate` date DEFAULT NULL,
  `COR` varchar(45) DEFAULT NULL,
  `employeeId` varchar(45) DEFAULT NULL,
  `employeeName` varchar(45) DEFAULT NULL,
  `employeeEmail` varchar(45) DEFAULT NULL,
  `workingEmail` varchar(45) DEFAULT NULL,
  `effectiveFrom` date DEFAULT NULL,
  `event` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employment`
--

LOCK TABLES `employment` WRITE;
/*!40000 ALTER TABLE `employment` DISABLE KEYS */;
INSERT INTO `employment` VALUES (3,'23',NULL,'test','test','test','test','test','test','test',NULL,'test','2022-08-19',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'inactive','2022-08-19 08:39:30.000000','2022-08-22 08:08:56.000000'),(4,'10',NULL,'ll','l','l','ll','l','l','l','l','l','2022-08-19',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'inactive','2022-08-19 08:39:30.000000','2022-08-22 00:32:40.000000'),(5,'27',NULL,'3','3','1','2','1','2','1',NULL,'1','2022-08-24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-22 09:41:08.000000','2022-08-22 09:41:08.000000'),(6,'11',NULL,'3','1','1','2','1','2','1',NULL,'2','2022-08-25',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-24 19:09:34.000000','2022-08-24 19:09:34.000000'),(7,'41',NULL,'1','1','1','1','1','1','1',NULL,'1','2022-08-30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-29 21:01:17.000000','2022-08-29 21:01:17.000000'),(8,'42',NULL,'2','1','1','1','1','1','1',NULL,'2','2022-08-30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-29 21:05:56.000000','2022-08-29 21:05:56.000000'),(9,'44',NULL,'2','1','2','3',NULL,'2',NULL,NULL,'1','2022-08-31',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-30 00:19:37.000000','2022-08-30 00:19:37.000000'),(10,'57','19','3','1','2','3','0','2','0',NULL,'1',NULL,NULL,'57146','5 name','57@mm.com',NULL,'2022-12-24','2',NULL,'2022-08-30 00:45:30.000000','2022-08-31 01:58:37.000000'),(11,'58','19','1','1','2','4','0','2','0',NULL,'on',NULL,NULL,'test','asdasd','asdasd',NULL,'2022-12-31','2',NULL,'2022-08-30 01:02:24.000000','2022-08-31 02:13:08.000000'),(18,'62','19','2','1','2','3','0','2','0',NULL,'1',NULL,NULL,'122131','asdasd','asdasd@ddm.com',NULL,NULL,'1',NULL,'2022-08-31 02:22:44.000000','2022-08-31 02:26:28.000000'),(19,'63','19','2','1','2','4',NULL,'2',NULL,NULL,'2','2022-08-03',NULL,'asddsadaas',NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-31 02:28:00.000000','2022-08-31 02:28:00.000000'),(20,'64','19','2','1','2','3',NULL,'2',NULL,NULL,'1','2022-08-09',NULL,'111111111','mat kilau','sadasd@cc.com',NULL,NULL,NULL,NULL,'2022-08-31 02:34:10.000000','2022-08-31 02:34:10.000000'),(21,'66','65','1','1','2','5','0','2','0',NULL,'1','2022-08-31',NULL,'ahmad','ahmad','ddd@dd.mm',NULL,'2022-08-31','0',NULL,'2022-08-31 02:45:57.000000','2022-08-31 02:55:01.000000');
/*!40000 ALTER TABLE `employment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-31 20:19:29
