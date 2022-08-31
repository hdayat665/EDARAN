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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `failLogin` varchar(45) DEFAULT NULL,
  `remember_token` varchar(655) DEFAULT NULL,
  `tenant` varchar(255) DEFAULT NULL,
  `is_login` varchar(45) DEFAULT NULL,
  `package` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (10,'a@gmail.com','$2y$10$LWPxSI1rNhwIM9I1wDRHIuBp0ggA7NwuPToSiXgLBxdufaK8Q4ZzS','inactive','domain','2022-08-06 17:03:50.000000','2022-08-22 00:32:40.000000',NULL,NULL,NULL,NULL,NULL),(11,'h@gmail.com','$2y$10$4ynbf3jgm7/cu/qZopElmOEj7hSaua3XOJ/57M2IfglP4S99c.2DW','active','admin','2022-08-06 18:18:05.000000','2022-08-29 07:20:25.000000','0',NULL,'tng','yes',NULL),(19,'m@gmail.com','$2y$10$vlS3KkNBF2WxEkJNCYCtju3FpFMWzoSW8LrlAm05a8vhFaXpdNRJ2','not verified','host','2022-08-18 11:24:27.000000','2022-08-29 17:42:23.000000',NULL,NULL,'pnb','yes','premium'),(34,'mkm',NULL,'not verified','employee','2022-08-22 10:12:21.000000','2022-08-22 10:12:21.000000',NULL,NULL,NULL,NULL,NULL),(35,'hdayat665@gmail.com',NULL,'not verified','employee','2022-08-24 19:06:15.000000','2022-08-24 19:06:15.000000',NULL,NULL,NULL,NULL,NULL),(36,'waadasd',NULL,'not verified','employee','2022-08-24 19:08:53.000000','2022-08-24 19:08:53.000000',NULL,NULL,NULL,NULL,NULL),(37,'g@gmail.com','$2y$10$M6W5p3IXO25VEaKtMRvD5Ox9hRImmqTqlZ5W2TCxK9WfrERcmESry','not verified','tenant','2022-08-25 19:58:31.000000','2022-08-25 20:12:48.000000',NULL,NULL,'sunway','yes','gold'),(38,'r@gmail.com','$2y$10$lqg8EHBMRiyqpozsL553w.4Nkh/hZmjH03xgnBca9Hcvx3QxAMkxC','not verified','tenant','2022-08-29 18:25:28.000000','2022-08-29 18:25:28.000000',NULL,NULL,'sunway',NULL,'basic');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-30 11:01:25
