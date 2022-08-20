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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `personal_access_tokenscol` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\Users',11,'eKfmSzRm65wAhij8rEpPHhsRDMPkpNstY4jldYkt','818957d4a9fc1864067f87ddd732bf8ac25ebb80a38d20d0c6959ff836d4eb6e','[\"*\"]',NULL,'2022-08-18 00:30:28','2022-08-18 00:30:28',NULL,NULL),(2,'App\\Models\\Users',11,'3COC1IkS0YulYA0Fb9B0hjBMiKyUfBzWeh43yqxd','1923aff9f4c348ff74e2c5f45a442d2773db718822f4b752f9037c7145016b4c','[\"*\"]','2022-08-18 00:49:05','2022-08-18 00:30:59','2022-08-18 00:49:05',NULL,NULL),(3,'App\\Models\\Users',11,'vnLrPSOrwxWMgR6cmjwE0NusadKmAHEtxw7jSJZX','c1fceb4f594f3277878e33dde933c83f5bede4c155eb786ce8a0977da5d6ee7a','[\"*\"]',NULL,'2022-08-18 09:55:10','2022-08-18 09:55:10',NULL,NULL),(4,'App\\Models\\Users',11,'aflTTfxE7LHNpn2sHnCYvm9XasVcrTWwKsogx41B','00fc09dac9d35b0fbe044cd531456b4600e03086f4bbe55918830273629d0962','[\"*\"]',NULL,'2022-08-18 09:56:21','2022-08-18 09:56:21',NULL,NULL),(5,'App\\Models\\Users',11,'oi892g7lm7jZDNdQtx01PwyrjvjYwUrgAQCZJYQ6','71dd36cbe17ae5c20095191f2ae542c895122e5d1c9c5b6a06305cf502ffe564','[\"*\"]',NULL,'2022-08-18 09:56:34','2022-08-18 09:56:34',NULL,NULL),(6,'App\\Models\\Users',11,'e6AsfAK3x2ntr04YPQ3ICZedFaCqzZjhcIBDfPgN','3bb9ade738d058d24eab6c882b00b443c73a459cf9fe1572a3784b9223d0bfa8','[\"*\"]',NULL,'2022-08-18 09:57:08','2022-08-18 09:57:08',NULL,NULL),(7,'App\\Models\\Users',11,'4mdl96nUTrdKICgIJwY0l5FlKEAAjmEKP3dJ0WOK','11afd6239d43bb76bf660cea71543f7de6d5ce6935a3c4100284f18bb2206491','[\"*\"]',NULL,'2022-08-18 09:57:26','2022-08-18 09:57:26',NULL,NULL),(8,'App\\Models\\Users',11,'7eSVglq69A2P0sJyShjpDhrrym3ZSTPHAQ9Myatp','4a369c2f827a8a9977fc3df32e9409d96e65f70d076ff22cad99e7ca758f2d3e','[\"*\"]',NULL,'2022-08-18 09:57:33','2022-08-18 09:57:33',NULL,NULL),(9,'App\\Models\\Users',11,'hr68ngCwbI2RqF3yZcDH6vT4djyUHRMcf8yOt3zU','c2fc6d08174c0bb7885ff872cc92d80ec1b99852c9cec32b4e71b5b3f8643858','[\"*\"]',NULL,'2022-08-18 09:58:11','2022-08-18 09:58:11',NULL,NULL),(10,'App\\Models\\Users',11,'ehmgFvdomxPx5zUijYVZA7Tn7vIFqxwWF7NGZ3bZ','94639b2b70de55bead756c4e4b9c9a46b9307e0bcedfa54348a685ef6854ac1f','[\"*\"]',NULL,'2022-08-18 09:58:30','2022-08-18 09:58:30',NULL,NULL);
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-21  1:47:23
