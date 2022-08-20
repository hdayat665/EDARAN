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
-- Table structure for table `users_details`
--

DROP TABLE IF EXISTS `users_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `employee_id` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `domain` varchar(45) DEFAULT NULL,
  `tenant` varchar(45) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `allocated_malaysia` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `terms` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `user_type` varchar(45) DEFAULT NULL,
  `profile_pic` varchar(45) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_details`
--

LOCK TABLES `users_details` WRITE;
/*!40000 ALTER TABLE `users_details` DISABLE KEYS */;
INSERT INTO `users_details` VALUES (7,10,NULL,'wan','hidayat','a@gmail.com','1234','tng','1234','1231231','on',NULL,'on','active',NULL,NULL,'16607289621UfGsO.jpg','2022-08-06 17:03:50.000000','2022-08-17 01:36:02.000000'),(8,11,NULL,'hh','hhh','h@gmail.com','adasd','tng','adasd','13123','on',NULL,'on','not verified',NULL,NULL,NULL,'2022-08-06 18:18:05.000000','2022-08-06 18:18:05.000000'),(9,13,NULL,'lk','lk','lk','lkll',NULL,'k','lk',NULL,NULL,NULL,'active',NULL,NULL,NULL,'2022-08-08 20:22:53.000000','2022-08-08 20:22:53.000000'),(10,15,NULL,'wan','hidayat','hd@gmail.com','hidaat',NULL,'hidayat','0119928291',NULL,'Malaysia',NULL,'not verified',NULL,NULL,NULL,'2022-08-15 00:20:05.000000','2022-08-15 00:20:05.000000'),(11,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'not verified',NULL,NULL,NULL,'2022-08-18 11:15:48.000000','2022-08-18 11:15:48.000000'),(12,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'not verified',NULL,NULL,NULL,'2022-08-18 11:17:59.000000','2022-08-18 11:17:59.000000'),(13,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'not verified',NULL,NULL,NULL,'2022-08-18 11:20:49.000000','2022-08-18 11:20:49.000000'),(14,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'not verified',NULL,NULL,NULL,'2022-08-18 11:24:27.000000','2022-08-18 11:24:27.000000');
/*!40000 ALTER TABLE `users_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-21  1:46:46
