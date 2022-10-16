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
-- Table structure for table `timesheet_event`
--

DROP TABLE IF EXISTS `timesheet_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timesheet_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `type_recurring` varchar(100) DEFAULT NULL,
  `set_reccuring_date_month` varchar(100) DEFAULT NULL,
  `set_reccuring_week_month` varchar(100) DEFAULT NULL,
  `set_reccuring_month_yearly2` varchar(100) DEFAULT NULL,
  `set_reccuring_date_yearly` varchar(100) DEFAULT NULL,
  `set_reccuring_week_yearly` varchar(100) DEFAULT NULL,
  `set_reccuring_day_yearly` varchar(100) DEFAULT NULL,
  `set_reccuring_yearly` varchar(100) DEFAULT NULL,
  `set_reccuring_month_yearly` varchar(100) DEFAULT NULL,
  `set_reccuring_day_month` varchar(100) DEFAULT NULL,
  `set_reccuring_month` varchar(100) DEFAULT NULL,
  `set_reccuring` varchar(100) DEFAULT NULL,
  `recurring` varchar(100) DEFAULT NULL,
  `all_day` varchar(100) DEFAULT NULL,
  `priority` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `participant` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `reminder` varchar(255) DEFAULT NULL,
  `file_upload` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-16  8:50:37
