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
  `tenant_id` varchar(25) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (10,NULL,'a@gmail.com','$2y$10$LWPxSI1rNhwIM9I1wDRHIuBp0ggA7NwuPToSiXgLBxdufaK8Q4ZzS','inactive','domain','2022-08-06 17:03:50.000000','2022-08-22 00:32:40.000000',NULL,NULL,NULL,NULL,NULL),(11,NULL,'h@gmail.com','$2y$10$4ynbf3jgm7/cu/qZopElmOEj7hSaua3XOJ/57M2IfglP4S99c.2DW','active','admin','2022-08-06 18:18:05.000000','2022-08-30 01:48:38.000000','0',NULL,'tng','yes',NULL),(19,'1','m@gmail.com','$2y$10$d94tKNYpcAWU8Ne/Yxl9X.iYsqq/lEQfhkT4UcGkdVPKD58IkiFMy','active','host','2022-08-18 11:24:27.000000','2022-09-11 16:23:27.000000',NULL,NULL,'pnb','yes','premium'),(34,NULL,'mkm',NULL,'not verified','employee','2022-08-22 10:12:21.000000','2022-08-22 10:12:21.000000',NULL,NULL,NULL,NULL,NULL),(35,NULL,'hdayat665@gmail.com',NULL,'not verified','employee','2022-08-24 19:06:15.000000','2022-08-24 19:06:15.000000',NULL,NULL,NULL,NULL,NULL),(36,NULL,'waadasd',NULL,'not verified','employee','2022-08-24 19:08:53.000000','2022-08-24 19:08:53.000000',NULL,NULL,NULL,NULL,NULL),(37,NULL,'g@gmail.com','$2y$10$M6W5p3IXO25VEaKtMRvD5Ox9hRImmqTqlZ5W2TCxK9WfrERcmESry','not verified','tenant','2022-08-25 19:58:31.000000','2022-08-25 20:12:48.000000',NULL,NULL,'sunway','yes','gold'),(38,NULL,'r@gmail.com','$2y$10$lqg8EHBMRiyqpozsL553w.4Nkh/hZmjH03xgnBca9Hcvx3QxAMkxC','not verified','tenant','2022-08-29 18:25:28.000000','2022-08-29 18:25:28.000000',NULL,NULL,'sunway',NULL,'basic'),(39,NULL,'p@gmail.com','$2y$10$gjESG01r97Bv2MUiKmvHtuiXS8ie64ObCozCL7rSbyAiTga5JlN32','not verified','tenant','2022-08-29 19:34:23.000000','2022-08-29 19:34:23.000000',NULL,NULL,'loki',NULL,'basic'),(40,NULL,'kmkmk',NULL,'not verified','employee','2022-08-29 20:58:58.000000','2022-08-29 20:58:58.000000',NULL,NULL,NULL,NULL,NULL),(41,NULL,'kmk',NULL,'not verified','employee','2022-08-29 21:00:41.000000','2022-08-29 21:00:41.000000',NULL,NULL,NULL,NULL,NULL),(42,NULL,'kkkok',NULL,'not verified','employee','2022-08-29 21:05:23.000000','2022-08-29 21:05:23.000000',NULL,NULL,NULL,NULL,NULL),(43,NULL,'l@gmail.com','$2y$10$aiXFz7CoVgb4.85Ow0bvR.fyVYs.lEj3Lee1dqob8z713frmfu12m','not verified','tenant','2022-08-29 22:02:12.000000','2022-08-29 22:02:12.000000',NULL,NULL,'s',NULL,'premium'),(44,NULL,'mkmkm',NULL,'not verified','employee','2022-08-30 00:18:51.000000','2022-08-30 00:18:51.000000',NULL,NULL,NULL,NULL,NULL),(45,NULL,'lolp',NULL,'not verified','employee','2022-08-30 00:23:51.000000','2022-08-30 00:23:51.000000',NULL,NULL,NULL,NULL,NULL),(46,NULL,'lolipop',NULL,'not verified','employee','2022-08-30 00:28:15.000000','2022-08-30 00:28:15.000000',NULL,NULL,NULL,NULL,NULL),(47,NULL,'lolipopa',NULL,'not verified','employee','2022-08-30 00:29:10.000000','2022-08-30 00:29:10.000000',NULL,NULL,NULL,NULL,NULL),(48,NULL,'km',NULL,'not verified','employee','2022-08-30 00:31:04.000000','2022-08-30 00:31:04.000000',NULL,NULL,NULL,NULL,NULL),(49,NULL,'kmss',NULL,'not verified','employee','2022-08-30 00:31:39.000000','2022-08-30 00:31:39.000000',NULL,NULL,NULL,NULL,NULL),(50,NULL,'kmssqwe',NULL,'not verified','employee','2022-08-30 00:32:12.000000','2022-08-30 00:32:12.000000',NULL,NULL,NULL,NULL,NULL),(51,NULL,'kmssqweaa',NULL,'not verified','employee','2022-08-30 00:34:27.000000','2022-08-30 00:34:27.000000',NULL,NULL,NULL,NULL,NULL),(52,NULL,'lplplpplp',NULL,'not verified','employee','2022-08-30 00:35:03.000000','2022-08-30 00:35:03.000000',NULL,NULL,NULL,NULL,NULL),(53,NULL,'lplplpplpqqqqqqqqqqqq',NULL,'not verified','employee','2022-08-30 00:35:34.000000','2022-08-30 00:35:34.000000',NULL,NULL,NULL,NULL,NULL),(54,NULL,'ppopo',NULL,'not verified','employee','2022-08-30 00:42:02.000000','2022-08-30 00:42:02.000000',NULL,NULL,NULL,NULL,NULL),(55,NULL,'ppopoaa',NULL,'not verified','employee','2022-08-30 00:42:50.000000','2022-08-30 00:42:50.000000',NULL,NULL,NULL,NULL,NULL),(56,NULL,'ADSASD',NULL,'not verified','employee','2022-08-30 00:43:51.000000','2022-08-30 00:43:51.000000',NULL,NULL,NULL,NULL,NULL),(57,NULL,'m@gmail.com',NULL,'not verified','employee','2022-08-30 00:44:50.000000','2022-08-30 15:38:11.000000',NULL,NULL,NULL,NULL,NULL),(58,NULL,'kmkmkmkmkmk',NULL,'not verified','employee','2022-08-30 01:01:00.000000','2022-08-30 15:41:42.000000',NULL,NULL,NULL,NULL,NULL),(59,NULL,'o@gmail.com','$2y$10$iqpgXBocaX.9McVcDh6JUOAI94f6l1130zYkKEJiee1zylfsfbI9C','not verified','tenant','2022-08-30 01:52:14.000000','2022-08-30 01:52:29.000000',NULL,NULL,'king','yes','basic'),(60,NULL,'t@gmail.com','$2y$10$yQoQwx8q7.SS6K2xjAV.ue//Jd7nqYDwLA7lL0niV2AaU82qjjb0m','not verified','tenant','2022-08-30 01:59:25.000000','2022-08-30 02:04:26.000000',NULL,NULL,'lol','yes','gold'),(61,NULL,'kiko',NULL,'not verified','employee','2022-08-31 02:14:55.000000','2022-08-31 02:14:55.000000',NULL,NULL,NULL,NULL,NULL),(62,NULL,'3213123',NULL,'not verified','employee','2022-08-31 02:22:05.000000','2022-08-31 02:22:05.000000',NULL,NULL,NULL,NULL,NULL),(63,NULL,'dasdasd',NULL,'not verified','employee','2022-08-31 02:27:25.000000','2022-08-31 02:27:25.000000',NULL,NULL,NULL,NULL,NULL),(64,NULL,'1111111111111',NULL,'not verified','employee','2022-08-31 02:33:37.000000','2022-08-31 02:33:37.000000',NULL,NULL,NULL,NULL,NULL),(65,NULL,'y@gmail.com','$2y$10$dgQQg0rHqsDRMQL9vl9EJOhKDuoQJKJWEyv9jKek3MZrfBLJaLyEy','not verified','tenant','2022-08-31 02:41:21.000000','2022-08-31 02:41:34.000000',NULL,NULL,'ter','yes','basic'),(66,NULL,'ahmad@f.com',NULL,'not verified','employee','2022-08-31 02:43:18.000000','2022-08-31 02:43:18.000000',NULL,NULL,NULL,NULL,NULL),(67,NULL,'ma@gmail.com','$2y$10$rjZs35FfgypBTocHlc6MJuJDmz3GA0IQuhw7sPtT0ABxob65uWkFq','not verified','tenant','2022-09-02 16:56:52.000000','2022-09-02 16:56:52.000000',NULL,NULL,NULL,NULL,'premium'),(68,NULL,'do@gmail.com','$2y$10$dpYFUz0wj.HV9.K57PeveO6r0faC5RZe.b.IGKg/sDwI.QQVksX9S','not verified','tenant','2022-09-02 16:59:40.000000','2022-09-02 16:59:40.000000',NULL,NULL,NULL,NULL,'premium'),(69,'83','dsdd@gmail.com','$2y$10$4z4dRqLRvFeABn1WdR0bGe2Vd2FEr.UCD/Ixy9v6FxKSZkdsXxnCS','not verified','tenant','2022-09-02 17:01:49.000000','2022-09-02 17:01:49.000000',NULL,NULL,NULL,NULL,'premium'),(70,'100','masdasda@gmail.com','$2y$10$v2qguYcZvy77Q99Kk3e2QOqi2bo0v9QeTrwtX3s2Ni8CztInj/yyK','not verified','tenant','2022-09-02 17:02:32.000000','2022-09-02 17:02:32.000000',NULL,NULL,NULL,NULL,'gold'),(71,NULL,'asdasd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(72,'42','asdada@gmail.com','$2y$10$vzh6ed6L2xV77SNXet0Jsei5OsyZ6CIILZfT2PQtg8UELQc9m/ZuS','not verified','tenant','2022-09-02 17:06:00.000000','2022-09-02 17:06:00.000000',NULL,NULL,NULL,NULL,'gold'),(73,'43','asdasdaqqq@gmail.com','$2y$10$pAMz98Gf9LvHpQm5SgcKEOJSkmgjHUifGijA.W6joBBUNgHPWvS6.','not verified','tenant','2022-09-02 17:06:20.000000','2022-09-02 17:06:20.000000',NULL,NULL,NULL,NULL,'gold'),(74,'44','rttutu@gmail.com','$2y$10$JWkoy/Iu1r7norxko6Vgp.RETbCpxkbYs/emHYYAvPxHbxQKra5DS','not verified','tenant','2022-09-02 17:06:33.000000','2022-09-02 17:06:33.000000',NULL,NULL,NULL,NULL,'gold'),(75,'45','asdasdavvv@gmail.com','$2y$10$D4v7KPfLkzlPl/uKohw6ju8dPkVS/QmMNoB7229ACxn5LxJ.DAEcq','not verified','tenant','2022-09-02 17:07:34.000000','2022-09-02 17:07:34.000000',NULL,NULL,NULL,NULL,'premium'),(76,'46','hidayat@gmail.com','$2y$10$DHMzKqjt5fBTU3oB7mvqme/BatZyubGHbj2JZmEoL3UjJOLgPdbVC','not verified','tenant','2022-09-02 17:09:25.000000','2022-09-02 17:10:30.000000',NULL,NULL,'hidayat','yes','premium'),(77,'46','asdasdas',NULL,'not verified','employee','2022-09-02 17:21:40.000000','2022-09-02 17:21:40.000000',NULL,NULL,NULL,NULL,NULL),(78,'48','ali@gmail.com','$2y$10$gV1u3yZW/K0wVJI5wLymbewAbQWCVH/KojYk0q97CFPuokJDtSEqO','not verified','tenant','2022-09-03 14:50:24.000000','2022-09-03 15:45:31.000000',NULL,NULL,'ali sbn bhd','yes','premium'),(79,'49','ah@gmail.com','$2y$10$ZFrQmBmanDi5BkC1UtOmMeoIK0n2kInqGgqG0O6CuQyHJjhTucfiK','not verified','tenant','2022-09-03 15:45:12.000000','2022-09-03 15:45:55.000000',NULL,NULL,'ali','yes','premium'),(80,NULL,'hida@gmail.com',NULL,'not verified','employee','2022-09-05 19:25:32.000000','2022-09-05 19:25:32.000000',NULL,NULL,NULL,NULL,NULL),(81,NULL,'lolo@gmial.com','$2y$10$BpUFwXJYXME9G4DgM.3xceEQSDfmCOo15FO2URvKtGAJdkZL/z.NS','not verified','employee','2022-09-05 19:52:00.000000','2022-09-05 19:52:00.000000',NULL,NULL,NULL,NULL,NULL),(82,NULL,'al@gmail.com','$2y$10$FIxccqXMklEqAUe1WgbzzO9p/rEF/HVh8YsslL3mEYUAR4a9Aj3Qu','active','employee','2022-09-05 19:58:26.000000','2022-09-05 20:00:31.000000',NULL,NULL,'pnb','yes',NULL),(83,'53','admin@gmail.com','$2y$10$57kiKRoFUc8d3TRohwNAfOEvxM/l111wKfEAflcN.BdlZmBltylSG','active','tenant','2022-09-11 15:27:34.000000','2022-09-15 05:58:52.000000',NULL,NULL,'Edaran','yes','gold'),(85,'54','miau@gmail.com','$2y$10$I3akQctDq3OuIMW75Cf1yuTjTes4n4UDzfqABX.bAzmNrc/nA9o7K','active','tenant','2022-09-11 15:34:10.000000','2022-09-11 15:34:27.000000',NULL,NULL,'miau',NULL,'gold'),(86,'53','mmmm','$2y$10$ZBkC.ebIqGCgWpadnqurO.3SQCVWi8Bo2mSRQNDn9Wh2Lm/aSjrOi','active','employee','2022-09-12 15:36:32.000000','2022-09-12 18:04:07.000000',NULL,NULL,'Edaran','yes',NULL),(87,'53','aaa@mm.com','$2y$10$oJf14ROycrdFPGbywgjJMuc/IoJQTAXsdL.GOTpEbPcpOVHx.D.m2','active','employee','2022-09-12 18:07:33.000000','2022-09-15 06:29:54.000000',NULL,NULL,'Edaran','yes',NULL);
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

-- Dump completed on 2022-09-16  0:45:53
