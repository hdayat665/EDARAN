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
-- Table structure for table `userAddress`
--

DROP TABLE IF EXISTS `userAddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userAddress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `address1c` varchar(255) DEFAULT NULL,
  `address2c` varchar(255) DEFAULT NULL,
  `postcodec` varchar(45) DEFAULT NULL,
  `cityc` varchar(45) DEFAULT NULL,
  `statec` varchar(45) DEFAULT NULL,
  `countryc` varchar(45) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userAddress`
--

LOCK TABLES `userAddress` WRITE;
/*!40000 ALTER TABLE `userAddress` DISABLE KEYS */;
INSERT INTO `userAddress` VALUES (4,'27','lot 447 kg parit','cina jalan 12','123900','kota vharu','Kelantan','0','lot 448 kg parit','melayu jalan 13','123011','kota bharu','Kedah',NULL,'2022-08-22 09:39:44.000000','2022-08-22 09:39:44.000000'),(5,NULL,NULL,NULL,NULL,NULL,NULL,'Malaysia',NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-22 10:18:36.000000','2022-08-22 10:18:36.000000'),(6,'35',NULL,NULL,NULL,NULL,NULL,'Malaysia',NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-24 19:06:20.000000','2022-08-24 19:06:20.000000'),(7,'35','kg hulu langat',NULL,NULL,NULL,NULL,'Malaysia',NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-24 19:06:30.000000','2022-08-24 19:06:30.000000'),(8,'35','kg hulu langat','kg hulu langat',NULL,NULL,NULL,'Malaysia',NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-24 19:06:33.000000','2022-08-24 19:06:33.000000'),(9,'35','kg hulu langat','kg hulu langat','123123','aaaa',NULL,'Malaysia',NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-24 19:06:49.000000','2022-08-24 19:06:49.000000'),(10,'35','kg hulu langat','kg hulu langat','123123','aaaa',NULL,'Malaysia',NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-24 19:06:57.000000','2022-08-24 19:06:57.000000'),(11,'19','JAN 14','TESTTT','56002','kkk','Kedah','MY','JAN 15','TESTTT','56001','0','Negeri Sembilan','MY','2022-08-24 19:09:14.000000','2022-08-30 13:47:31.000000'),(12,'41','mkmk','mkmk','kmk','kmkmk','Johor','Malaysia','kmkm','kmkmk','mkm','kmkk','Kelantan',NULL,'2022-08-29 21:01:04.000000','2022-08-29 21:01:04.000000'),(13,'42','kmkm','kmk','km','km','Kedah','Malaysia','mkmk','mkmk','mmkm','kkmk','Johor',NULL,'2022-08-29 21:05:37.000000','2022-08-29 21:05:37.000000'),(14,'44','kkmk','mk','mk','mk','Sarawak','Malaysia','kmk','mkm','kmk','mkmkmk','Johor',NULL,'2022-08-30 00:19:08.000000','2022-08-30 00:19:08.000000'),(15,'57','kkm','kmk','mk','m','Kedah','Malaysia','kkmk','mk','mkmkmkm','kmk','Kedah',NULL,'2022-08-30 00:45:12.000000','2022-08-30 00:45:12.000000'),(16,'60','l,kmk','mk','mk','0','0','0','l,kmk','mk','mk','0','0','0','2022-08-30 01:59:25.000000','2022-08-30 02:04:58.000000'),(17,'58','sa','asd','asd','aaa','Negeri Sembilan','VG','asdasd','asdasd','asd','asd','Kelantan','BO',NULL,'2022-08-30 15:51:18.000000'),(18,'61','saasdasd','asdasdsa','dasdasd','sadasdsad','Kelantan','Malaysia','adasd','asdasd','asdasd','asdasdsad','Kelantan',NULL,'2022-08-31 02:15:13.000000','2022-08-31 02:15:13.000000'),(19,'62','asdsadsad','asdsad','asdsad','sadsad','Negeri Sembilan','Malaysia','asdasd','sadsadsa','dsadsa','dsaddasdas','Pahang',NULL,'2022-08-31 02:22:18.000000','2022-08-31 02:22:18.000000'),(20,'63','wewqe','eqweqwe','eqweqwe','eqweqwe','Pahang','Malaysia','qweqwe','qeqwe','qeqwe','qweqw','Kelantan',NULL,'2022-08-31 02:27:37.000000','2022-08-31 02:27:37.000000'),(21,'64','qweqwewq','eqwewqe','qwewqe','qwe',NULL,'Malaysia',NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-31 02:33:45.000000','2022-08-31 02:33:45.000000'),(22,'65',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-08-31 02:41:21.000000','2022-08-31 02:41:21.000000'),(23,'66','kota bharu','kota bharu','1234','kota bharu','Kelantan','Malaysia','kota bharu','kota bharu','12345','kota bharu','Kelantan',NULL,'2022-08-31 02:43:49.000000','2022-08-31 02:43:49.000000');
/*!40000 ALTER TABLE `userAddress` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-31 20:19:52
