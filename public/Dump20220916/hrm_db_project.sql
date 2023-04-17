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
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) DEFAULT NULL,
  `LOA_date` date DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `project_code` varchar(255) DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `desc` text,
  `acc_manager` varchar(255) DEFAULT NULL,
  `contract_value` varchar(255) DEFAULT NULL,
  `contract_type` varchar(255) DEFAULT NULL,
  `contract_start_date` date DEFAULT NULL,
  `contract_end_date` date DEFAULT NULL,
  `financial_year` varchar(100) DEFAULT NULL,
  `project_manager` varchar(100) DEFAULT NULL,
  `warranty_start_date` date DEFAULT NULL,
  `warranty_end_date` date DEFAULT NULL,
  `bank_guarantee_acc` varchar(255) DEFAULT NULL,
  `bank_guarantee_amount` varchar(255) DEFAULT NULL,
  `bank_guarantee_expiry_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `requested_date` date DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `status_request` varchar(100) DEFAULT NULL,
  `reason` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,1,'2022-09-07','0','dadasda','sdadad','qweqwefsdfswrwer','0','21312312312','ORI','2022-09-07','2022-09-07','2022','0','2022-09-07','2022-09-07',NULL,'234234','2022-09-07','Ongoing',NULL,NULL,'new','test','2022-09-06 21:26:40','2022-09-09 18:10:04'),(2,1,'2022-09-24','2','asdasdas','dasdasdasda',NULL,'0','2112312','EXT','2022-09-30','2022-09-28','2023','0','2022-09-28','2022-09-28',NULL,'12345','2022-09-30','Ongoing',NULL,NULL,'new',NULL,'2022-09-06 21:40:39','2022-09-08 18:31:50'),(3,53,'2022-09-12','5','new project','new','asdasd','0','212312','2','2022-09-19','2022-09-19','3',NULL,'2022-09-19','2022-09-20',NULL,NULL,'2022-09-19','Ongoing',NULL,NULL,'new',NULL,'2022-09-11 16:08:15','2022-09-11 16:08:15'),(4,53,'2022-09-13','4','3232','aaa','adad','0','13123','EXT','2022-09-13','2022-09-27','2025',NULL,'2022-09-12','2022-09-12',NULL,NULL,'2022-09-12','Ongoing',NULL,NULL,'new',NULL,'2022-09-12 15:42:47','2022-09-12 15:42:47'),(5,53,'2022-09-15','4','123','adsads','dasas','30','21312312','EXT','2022-09-15','2022-09-15','2024','31','2022-09-15','2022-09-15',NULL,'123123123','2022-09-15','Ongoing',NULL,NULL,'new',NULL,'2022-09-15 06:02:52','2022-09-15 06:09:57'),(6,53,'2022-09-22','4','8989898989','KJKJK','JKJKJK','31','09090','EXT','2022-09-14','2022-09-22','2025','30','2022-09-15','2022-09-15',NULL,'2121212','2022-09-15','Ongoing',NULL,NULL,'new',NULL,'2022-09-15 07:20:40','2022-09-15 07:24:03');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-16  0:45:32
