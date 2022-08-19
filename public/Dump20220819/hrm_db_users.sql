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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (10,'a@gmail.com','$2y$10$LWPxSI1rNhwIM9I1wDRHIuBp0ggA7NwuPToSiXgLBxdufaK8Q4ZzS','active','domain','2022-08-06 17:03:50.000000','2022-08-17 07:55:22.000000',NULL,NULL,NULL,NULL,NULL),(11,'h@gmail.com','$2y$10$hyOCOyzOwLa.NgwQfofpbOv9ru0dGchRB0vNlwGrh5ULCYIXhB2/a','active','admin','2022-08-06 18:18:05.000000','2022-08-18 10:34:26.000000','0',NULL,'tng','yes',NULL),(12,'b@gmail.com','$2y$10$GJxTtODoYSHIlBo/cq7Ez.ZppCjCjj9byCaGNkcaU/0YUwxRz1o1a','not verified','domain','2022-08-08 20:20:15.000000','2022-08-08 20:20:15.000000',NULL,NULL,NULL,NULL,NULL),(13,'lk','$2y$10$TyAPMpZ0rnmcHi/K7RE2ce5RWgYoQSoMKAhlJoOQguZUIaI3biDea','active','domain','2022-08-08 20:22:00.000000','2022-08-08 20:22:00.000000',NULL,NULL,NULL,NULL,NULL),(14,'lk','$2y$10$GZqrvgogjgjlx/nIeJLnGew8jUSadL7D7l.uXv8BVr31/CNsYUJRe','active','domain','2022-08-08 20:22:53.000000','2022-08-08 20:22:53.000000',NULL,NULL,NULL,NULL,NULL),(15,'hd@gmail.com','$2y$10$6O5RHbc4KgLqKG1WMq5aaeL5v4DcQshzYokul/KpURkYZyXZ36FPO','not verified','domain','2022-08-15 00:20:05.000000','2022-08-15 00:20:05.000000',NULL,NULL,NULL,NULL,NULL),(16,'k@gmail.com','$2y$10$C6Qsy9JwwYce8gu2DH3Vie6KKfeZVXjB.yKqX0j6TPuFYZ5ypNDd6','not verified','domain','2022-08-18 11:15:48.000000','2022-08-18 11:15:48.000000',NULL,NULL,NULL,NULL,NULL),(17,'k@gmail.com','$2y$10$yNd.QlbRtUubCGWGq2iuW.mADgSfzI7wwliiEQd6kgmLpc0TCu/qm','not verified','tenant','2022-08-18 11:17:59.000000','2022-08-18 11:17:59.000000',NULL,NULL,NULL,NULL,NULL),(18,'n@gmail.com','$2y$10$a06ejds10I/F5FMz3x81.eUXT90.RTQfT/QB4HiUChy5NQMSuhdoO','not verified','tenant','2022-08-18 11:20:49.000000','2022-08-18 11:20:49.000000',NULL,NULL,NULL,NULL,NULL),(19,'m@gmail.com','$2y$10$YCSv957F26dmLFKxtcBXtuC8gyC.NTvHI03YshFD4ALp64dgP.3ma','not verified','host','2022-08-18 11:24:27.000000','2022-08-18 11:51:54.000000',NULL,NULL,'pnb','yes','premium');
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

-- Dump completed on 2022-08-19  4:00:15
