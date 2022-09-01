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
  `tenant_id` varchar(25) DEFAULT NULL,
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
INSERT INTO `userProfile` VALUES (1,'48',NULL,'km',NULL,'km','k','mk','on','mk',NULL,'2022-08-30 00:00:00','KE','2022-08-30 00:00:00','Male','single','Islam','Malay','kmkmkkm',NULL,NULL,'2022-08-30 00:31:04.000000','2022-08-30 00:31:04.000000','kmkmk@gg.com'),(2,'49',NULL,'kmss',NULL,'km','k','mk','on','mk',NULL,'2022-08-30 00:00:00','KE','2022-08-30 00:00:00','Male','single','Islam','Malay','kmkmkkm',NULL,NULL,'2022-08-30 00:31:39.000000','2022-08-30 00:31:39.000000','kmkmk@gg.com'),(3,NULL,NULL,'kmssqwe',NULL,'km','k','mk','on','mk',NULL,'2022-08-30 00:00:00','KE','2022-08-30 00:00:00','Male','single','Islam','Malay','kmkmkkm',NULL,NULL,'2022-08-30 00:32:12.000000','2022-08-30 00:32:12.000000','kmkmk@gg.com'),(4,'57','19','m@gmail.com',NULL,'km','k','mk','on','mk',NULL,'2022-08-30 00:00:00','0','2022-08-30 00:00:00','0','0','Islam','Malay','kmkmkkm',NULL,NULL,'2022-08-30 00:44:50.000000','2022-08-30 15:38:11.000000','asd'),(5,'58','19','kmkmkmkmkmk',NULL,'kmkm','kmkmk','mkm','on','kmkm',NULL,'2022-08-30 00:00:00','AR','2022-08-30 00:00:00','1','2','Buddhist','Indian','kmkmk',NULL,NULL,'2022-08-30 01:01:00.000000','2022-08-30 15:41:42.000000','kmkm@m.com'),(6,'60',NULL,'t@gmail.com',NULL,'kmk','mkm','k','on','m','kmmk','2022-08-30 00:00:00','0','2022-08-30 00:00:00','0','0',NULL,NULL,'dsad','dasdasd','sada','2022-08-30 01:59:25.000000','2022-08-30 02:04:26.000000','kkmkm@cc.xom'),(7,'19',NULL,'m@gmail.com',NULL,'km','k','mk','on','mk',NULL,'2022-08-30 00:00:00','BZ','2022-08-30 00:00:00','0','3','Islam','Malay','kmkmkkm','asassds','adasd',NULL,'2022-08-30 15:44:49.000000','aaadds'),(8,'61','19','kiko',NULL,'kiol','koil','loio','on','123123121',NULL,'2022-08-31 00:00:00','AO','2022-08-23 00:00:00','Female','married','Christian','Others','123123123','qwqweqw','eqweqwe','2022-08-31 02:14:55.000000','2022-08-31 02:14:55.000000','1123123@c.cmo'),(9,'62','19','3213123',NULL,'12313','123123','1232131','on','31321313',NULL,'2022-08-31 00:00:00','BJ','2022-08-31 00:00:00','Female','married','Christian','Malay','12312321',NULL,NULL,'2022-08-31 02:22:05.000000','2022-08-31 02:22:05.000000','dasd@dsdsd.com'),(10,'63','19','dasdasd',NULL,'asdasda','dasdasd','asdasdadasd','on','1231231',NULL,'2022-08-31 00:00:00','AO','2022-08-31 00:00:00','Male','single','Islam','Chinese','123123','12321','3213123','2022-08-31 02:27:25.000000','2022-08-31 02:27:25.000000','wdsad@sdsdac.mm'),(11,'64','19','1111111111111',NULL,'11111111111','1111111111','mat kilau','on','1212',NULL,'2022-09-25 00:00:00','DZ','2022-08-31 00:00:00','Female','single','Others','Chinese','123123',NULL,NULL,'2022-08-31 02:33:37.000000','2022-08-31 02:33:37.000000','sadasd@cc.com'),(12,'65',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-31 02:41:21.000000','2022-08-31 02:41:21.000000',NULL),(13,'66','65','ahmad@f.com',NULL,'ahmad','ahmad','ahmad','on','12345677',NULL,'2022-08-31 00:00:00','MY','2022-08-31 00:00:00','Male','single','Islam','Malay','12345677','123456788','123456789','2022-08-31 02:43:18.000000','2022-08-31 02:43:18.000000','ddd@dd.mm');
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

-- Dump completed on 2022-08-31 20:19:50
