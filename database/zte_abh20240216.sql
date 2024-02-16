-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: zte_abh
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attendance_sheet`
--

DROP TABLE IF EXISTS `attendance_sheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendance_sheet` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `check_in` varchar(255) DEFAULT NULL,
  `check_out` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude_check_out` varchar(255) DEFAULT NULL,
  `longitude_check_out` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `check_out_time` datetime DEFAULT NULL,
  `attendance_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `attendance_sheet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance_sheet`
--

LOCK TABLES `attendance_sheet` WRITE;
/*!40000 ALTER TABLE `attendance_sheet` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendance_sheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `check_in`
--

DROP TABLE IF EXISTS `check_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `check_in` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `check_in` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `attendance_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `check_in_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_in`
--

LOCK TABLES `check_in` WRITE;
/*!40000 ALTER TABLE `check_in` DISABLE KEYS */;
/*!40000 ALTER TABLE `check_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `check_out`
--

DROP TABLE IF EXISTS `check_out`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `check_out` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `check_out` varchar(255) DEFAULT NULL,
  `latitude_check_out` varchar(255) DEFAULT NULL,
  `longitude_check_out` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `check_out_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `check_out_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_out`
--

LOCK TABLES `check_out` WRITE;
/*!40000 ALTER TABLE `check_out` DISABLE KEYS */;
/*!40000 ALTER TABLE `check_out` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `combined_attendance_view`
--

DROP TABLE IF EXISTS `combined_attendance_view`;
/*!50001 DROP VIEW IF EXISTS `combined_attendance_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `combined_attendance_view` AS SELECT 
 1 AS `user_id`,
 1 AS `promoter_name`,
 1 AS `shop`,
 1 AS `status`,
 1 AS `date`,
 1 AS `check_in_id`,
 1 AS `check_out_id`,
 1 AS `check_in`,
 1 AS `latitude`,
 1 AS `longitude`,
 1 AS `attendance_time`,
 1 AS `remark_check_in`,
 1 AS `check_out`,
 1 AS `latitude_check_out`,
 1 AS `longitude_check_out`,
 1 AS `check_out_time`,
 1 AS `remark_check_out`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `daily_sales`
--

DROP TABLE IF EXISTS `daily_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `daily_sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `promoter_name` varchar(100) DEFAULT NULL,
  `promoter_phone` varchar(20) DEFAULT NULL,
  `shop` varchar(255) DEFAULT NULL,
  `doc_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `a33_core_available` varchar(10) DEFAULT NULL,
  `a31_lite_available` varchar(10) DEFAULT NULL,
  `blade_a31_available` varchar(10) DEFAULT NULL,
  `blade_a51_available` varchar(10) DEFAULT NULL,
  `blade_a71_available` varchar(10) DEFAULT NULL,
  `blade_v30_available` varchar(10) DEFAULT NULL,
  `mf971L_available` varchar(10) DEFAULT NULL,
  `mf286c_available` varchar(10) DEFAULT NULL,
  `a33_core_sold` varchar(10) DEFAULT NULL,
  `a31_lite_sold` varchar(10) DEFAULT NULL,
  `blade_a31_sold` varchar(10) DEFAULT NULL,
  `blade_a51_sold` varchar(10) DEFAULT NULL,
  `blade_a71_sold` varchar(10) DEFAULT NULL,
  `blade_v30_sold` varchar(10) DEFAULT NULL,
  `mf971L_sold` varchar(10) DEFAULT NULL,
  `mf286c_sold` varchar(10) DEFAULT NULL,
  `a33_core_left` varchar(10) DEFAULT NULL,
  `a31_lite_left` varchar(10) DEFAULT NULL,
  `blade_a31_left` varchar(10) DEFAULT NULL,
  `blade_a51_left` varchar(10) DEFAULT NULL,
  `blade_a71_left` varchar(10) DEFAULT NULL,
  `blade_v30_left` varchar(10) DEFAULT NULL,
  `mf971L_left` varchar(10) DEFAULT NULL,
  `mf286c_left` varchar(10) DEFAULT NULL,
  `a33_core_remark` text,
  `a31_lite_remark` text,
  `blade_a31_remark` text,
  `blade_a51_remark` text,
  `blade_a71_remark` text,
  `blade_v30_remark` text,
  `mf971L_remark` text,
  `mf286c_remark` text,
  `V50_Design_available` varchar(10) DEFAULT NULL,
  `A54_available` varchar(10) DEFAULT NULL,
  `V40_available` varchar(10) DEFAULT NULL,
  `V50_Design_sold` varchar(10) DEFAULT NULL,
  `A54_sold` varchar(10) DEFAULT NULL,
  `V40_sold` varchar(10) DEFAULT NULL,
  `V50_Design_left` varchar(10) DEFAULT NULL,
  `A54_left` varchar(10) DEFAULT NULL,
  `V40_left` varchar(10) DEFAULT NULL,
  `V50_Design_remark` text,
  `A54_remark` text,
  `V40_remark` text,
  `remark` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_sales`
--

LOCK TABLES `daily_sales` WRITE;
/*!40000 ALTER TABLE `daily_sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `daily_sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `daily_sales_view`
--

DROP TABLE IF EXISTS `daily_sales_view`;
/*!50001 DROP VIEW IF EXISTS `daily_sales_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `daily_sales_view` AS SELECT 
 1 AS `promoter_name`,
 1 AS `promoter_phone`,
 1 AS `shop`,
 1 AS `remark_w`,
 1 AS `model`,
 1 AS `available_stock`,
 1 AS `apparatus_sold`,
 1 AS `net_stock`,
 1 AS `document_date`,
 1 AS `remark`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `monthly_attendance_view`
--

DROP TABLE IF EXISTS `monthly_attendance_view`;
/*!50001 DROP VIEW IF EXISTS `monthly_attendance_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `monthly_attendance_view` AS SELECT 
 1 AS `promoter`,
 1 AS `status`,
 1 AS `year`,
 1 AS `month`,
 1 AS `user_id`,
 1 AS `total_yes`,
 1 AS `day_1`,
 1 AS `day_2`,
 1 AS `day_3`,
 1 AS `day_4`,
 1 AS `day_5`,
 1 AS `day_6`,
 1 AS `day_7`,
 1 AS `day_8`,
 1 AS `day_9`,
 1 AS `day_10`,
 1 AS `day_11`,
 1 AS `day_12`,
 1 AS `day_13`,
 1 AS `day_14`,
 1 AS `day_15`,
 1 AS `day_16`,
 1 AS `day_17`,
 1 AS `day_18`,
 1 AS `day_19`,
 1 AS `day_20`,
 1 AS `day_21`,
 1 AS `day_22`,
 1 AS `day_23`,
 1 AS `day_24`,
 1 AS `day_25`,
 1 AS `day_26`,
 1 AS `day_27`,
 1 AS `day_28`,
 1 AS `day_29`,
 1 AS `day_30`,
 1 AS `day_31`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `monthly_sales_report`
--

DROP TABLE IF EXISTS `monthly_sales_report`;
/*!50001 DROP VIEW IF EXISTS `monthly_sales_report`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `monthly_sales_report` AS SELECT 
 1 AS `promoter_name`,
 1 AS `shop`,
 1 AS `year_number`,
 1 AS `month_name`,
 1 AS `month_start_date`,
 1 AS `month_end_date`,
 1 AS `total_a33_core_sold`,
 1 AS `total_a31_lite_sold`,
 1 AS `total_blade_a31_sold`,
 1 AS `total_blade_a51_sold`,
 1 AS `total_blade_a71_sold`,
 1 AS `total_blade_v30_sold`,
 1 AS `total_mf971L_sold`,
 1 AS `total_mf286c_sold`,
 1 AS `total_V50_Design_sold`,
 1 AS `total_A54_sold`,
 1 AS `total_V40_sold`,
 1 AS `total_sold`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `promoter_name` varchar(255) NOT NULL,
  `promoter_phone` varchar(255) NOT NULL,
  `shop` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'27445619','Admin','$2y$10$7NlbIKLRrW1j71DJ8./bwu8k6Bkt4lFG2jWKoeIHOCPlJv392a8f6','admin','1234','ABH HQ','1',NULL,'Active');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `weekly_sales_report`
--

DROP TABLE IF EXISTS `weekly_sales_report`;
/*!50001 DROP VIEW IF EXISTS `weekly_sales_report`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `weekly_sales_report` AS SELECT 
 1 AS `promoter_name`,
 1 AS `shop`,
 1 AS `week_number`,
 1 AS `week_start_date`,
 1 AS `week_end_date`,
 1 AS `total_a33_core_sold`,
 1 AS `total_a31_lite_sold`,
 1 AS `total_blade_a31_sold`,
 1 AS `total_blade_a51_sold`,
 1 AS `total_blade_a71_sold`,
 1 AS `total_blade_v30_sold`,
 1 AS `total_mf971L_sold`,
 1 AS `total_mf286c_sold`,
 1 AS `total_V50_Design_sold`,
 1 AS `total_A54_sold`,
 1 AS `total_V40_sold`,
 1 AS `total_sold`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `combined_attendance_view`
--

/*!50001 DROP VIEW IF EXISTS `combined_attendance_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `combined_attendance_view` AS select `u`.`id` AS `user_id`,`u`.`promoter_name` AS `promoter_name`,`u`.`shop` AS `shop`,`u`.`status` AS `status`,`d`.`date` AS `date`,`a`.`id` AS `check_in_id`,`co`.`id` AS `check_out_id`,coalesce(`a`.`check_in`,'No') AS `check_in`,ifnull(`a`.`latitude`,'') AS `latitude`,ifnull(`a`.`longitude`,'') AS `longitude`,ifnull(`a`.`attendance_time`,'') AS `attendance_time`,ifnull(`a`.`remark`,'') AS `remark_check_in`,coalesce(`co`.`check_out`,'No') AS `check_out`,ifnull(`co`.`latitude_check_out`,'') AS `latitude_check_out`,ifnull(`co`.`longitude_check_out`,'') AS `longitude_check_out`,ifnull(`co`.`check_out_time`,'') AS `check_out_time`,ifnull(`co`.`remark`,'') AS `remark_check_out` from ((((select distinct `users`.`user_id` AS `user_id`,`dates`.`date` AS `date` from ((select `users`.`id` AS `user_id` from `users` where (`users`.`role` = 2)) `users` join (select distinct `combined_dates`.`date` AS `date` from (select `check_in`.`date` AS `date` from `check_in` union select `check_out`.`date` AS `date` from `check_out`) `combined_dates`) `dates`)) `d` left join `users` `u` on((`d`.`user_id` = `u`.`id`))) left join `check_in` `a` on(((`d`.`user_id` = `a`.`user_id`) and (`d`.`date` = `a`.`date`)))) left join `check_out` `co` on(((`d`.`user_id` = `co`.`user_id`) and (`d`.`date` = `co`.`date`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `daily_sales_view`
--

/*!50001 DROP VIEW IF EXISTS `daily_sales_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `daily_sales_view` AS select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'A33 CORE' AS `model`,`daily_sales`.`a33_core_available` AS `available_stock`,`daily_sales`.`a33_core_sold` AS `apparatus_sold`,`daily_sales`.`a33_core_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`a33_core_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'A31 Lite' AS `model`,`daily_sales`.`a31_lite_available` AS `available_stock`,`daily_sales`.`a31_lite_sold` AS `apparatus_sold`,`daily_sales`.`a31_lite_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`a31_lite_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'Blade A31' AS `model`,`daily_sales`.`blade_a31_available` AS `available_stock`,`daily_sales`.`blade_a31_sold` AS `apparatus_sold`,`daily_sales`.`blade_a31_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`blade_a31_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'Blade A51' AS `model`,`daily_sales`.`blade_a51_available` AS `available_stock`,`daily_sales`.`blade_a51_sold` AS `apparatus_sold`,`daily_sales`.`blade_a51_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`blade_a51_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'Blade A71' AS `model`,`daily_sales`.`blade_a71_available` AS `available_stock`,`daily_sales`.`blade_a71_sold` AS `apparatus_sold`,`daily_sales`.`blade_a71_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`blade_a71_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'Blade V30' AS `model`,`daily_sales`.`blade_v30_available` AS `available_stock`,`daily_sales`.`blade_v30_sold` AS `apparatus_sold`,`daily_sales`.`blade_v30_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`blade_v30_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'MF971L' AS `model`,`daily_sales`.`mf971L_available` AS `available_stock`,`daily_sales`.`mf971L_sold` AS `apparatus_sold`,`daily_sales`.`mf971L_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`mf971L_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'MF286C' AS `model`,`daily_sales`.`mf286c_available` AS `available_stock`,`daily_sales`.`mf286c_sold` AS `apparatus_sold`,`daily_sales`.`mf286c_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`mf286c_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'V50_Design' AS `model`,`daily_sales`.`V50_Design_available` AS `available_stock`,`daily_sales`.`V50_Design_sold` AS `apparatus_sold`,`daily_sales`.`V50_Design_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`V50_Design_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'A54' AS `model`,`daily_sales`.`A54_available` AS `available_stock`,`daily_sales`.`A54_sold` AS `apparatus_sold`,`daily_sales`.`A54_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`A54_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'V40' AS `model`,`daily_sales`.`V40_available` AS `available_stock`,`daily_sales`.`V40_sold` AS `apparatus_sold`,`daily_sales`.`V40_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`V40_remark` AS `remark` from `daily_sales` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `monthly_attendance_view`
--

/*!50001 DROP VIEW IF EXISTS `monthly_attendance_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `monthly_attendance_view` AS select `u`.`promoter_name` AS `promoter`,`u`.`status` AS `status`,year(`ci`.`date`) AS `year`,monthname(`ci`.`date`) AS `month`,`ci`.`user_id` AS `user_id`,sum((`ci`.`check_in` = 'Yes')) AS `total_yes`,max((case when (dayofmonth(`ci`.`date`) = 1) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_1`,max((case when (dayofmonth(`ci`.`date`) = 2) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_2`,max((case when (dayofmonth(`ci`.`date`) = 3) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_3`,max((case when (dayofmonth(`ci`.`date`) = 4) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_4`,max((case when (dayofmonth(`ci`.`date`) = 5) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_5`,max((case when (dayofmonth(`ci`.`date`) = 6) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_6`,max((case when (dayofmonth(`ci`.`date`) = 7) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_7`,max((case when (dayofmonth(`ci`.`date`) = 8) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_8`,max((case when (dayofmonth(`ci`.`date`) = 9) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_9`,max((case when (dayofmonth(`ci`.`date`) = 10) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_10`,max((case when (dayofmonth(`ci`.`date`) = 11) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_11`,max((case when (dayofmonth(`ci`.`date`) = 12) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_12`,max((case when (dayofmonth(`ci`.`date`) = 13) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_13`,max((case when (dayofmonth(`ci`.`date`) = 14) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_14`,max((case when (dayofmonth(`ci`.`date`) = 15) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_15`,max((case when (dayofmonth(`ci`.`date`) = 16) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_16`,max((case when (dayofmonth(`ci`.`date`) = 17) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_17`,max((case when (dayofmonth(`ci`.`date`) = 18) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_18`,max((case when (dayofmonth(`ci`.`date`) = 19) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_19`,max((case when (dayofmonth(`ci`.`date`) = 20) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_20`,max((case when (dayofmonth(`ci`.`date`) = 21) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_21`,max((case when (dayofmonth(`ci`.`date`) = 22) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_22`,max((case when (dayofmonth(`ci`.`date`) = 23) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_23`,max((case when (dayofmonth(`ci`.`date`) = 24) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_24`,max((case when (dayofmonth(`ci`.`date`) = 25) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_25`,max((case when (dayofmonth(`ci`.`date`) = 26) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_26`,max((case when (dayofmonth(`ci`.`date`) = 27) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_27`,max((case when (dayofmonth(`ci`.`date`) = 28) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_28`,max((case when (dayofmonth(`ci`.`date`) = 29) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_29`,max((case when (dayofmonth(`ci`.`date`) = 30) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_30`,max((case when (dayofmonth(`ci`.`date`) = 31) then concat(`ci`.`check_in`,' ',`ci`.`attendance_time`) else NULL end)) AS `day_31` from (`check_in` `ci` left join `users` `u` on((`ci`.`user_id` = `u`.`id`))) group by year(`ci`.`date`),month(`ci`.`date`),`ci`.`user_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `monthly_sales_report`
--

/*!50001 DROP VIEW IF EXISTS `monthly_sales_report`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `monthly_sales_report` AS select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`shop` AS `shop`,year(`daily_sales`.`doc_date`) AS `year_number`,monthname(`daily_sales`.`doc_date`) AS `month_name`,min(`daily_sales`.`doc_date`) AS `month_start_date`,max(`daily_sales`.`doc_date`) AS `month_end_date`,coalesce(sum(cast(`daily_sales`.`a33_core_sold` as signed)),0) AS `total_a33_core_sold`,coalesce(sum(cast(`daily_sales`.`a31_lite_sold` as signed)),0) AS `total_a31_lite_sold`,coalesce(sum(cast(`daily_sales`.`blade_a31_sold` as signed)),0) AS `total_blade_a31_sold`,coalesce(sum(cast(`daily_sales`.`blade_a51_sold` as signed)),0) AS `total_blade_a51_sold`,coalesce(sum(cast(`daily_sales`.`blade_a71_sold` as signed)),0) AS `total_blade_a71_sold`,coalesce(sum(cast(`daily_sales`.`blade_v30_sold` as signed)),0) AS `total_blade_v30_sold`,coalesce(sum(cast(`daily_sales`.`mf971L_sold` as signed)),0) AS `total_mf971L_sold`,coalesce(sum(cast(`daily_sales`.`mf286c_sold` as signed)),0) AS `total_mf286c_sold`,coalesce(sum(cast(`daily_sales`.`V50_Design_sold` as signed)),0) AS `total_V50_Design_sold`,coalesce(sum(cast(`daily_sales`.`A54_sold` as signed)),0) AS `total_A54_sold`,coalesce(sum(cast(`daily_sales`.`V40_sold` as signed)),0) AS `total_V40_sold`,((((((((((coalesce(sum(cast(`daily_sales`.`a33_core_sold` as signed)),0) + coalesce(sum(cast(`daily_sales`.`a31_lite_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`blade_a31_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`blade_a51_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`blade_a71_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`blade_v30_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`mf971L_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`mf286c_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`V50_Design_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`A54_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`V40_sold` as signed)),0)) AS `total_sold` from `daily_sales` where ((year(`daily_sales`.`doc_date`) = year(now())) and (`daily_sales`.`doc_date` <= now())) group by `daily_sales`.`promoter_name`,`year_number`,`month_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `weekly_sales_report`
--

/*!50001 DROP VIEW IF EXISTS `weekly_sales_report`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `weekly_sales_report` AS select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`shop` AS `shop`,yearweek(`daily_sales`.`doc_date`,1) AS `week_number`,min(`daily_sales`.`doc_date`) AS `week_start_date`,max(`daily_sales`.`doc_date`) AS `week_end_date`,coalesce(sum(cast(`daily_sales`.`a33_core_sold` as signed)),0) AS `total_a33_core_sold`,coalesce(sum(cast(`daily_sales`.`a31_lite_sold` as signed)),0) AS `total_a31_lite_sold`,coalesce(sum(cast(`daily_sales`.`blade_a31_sold` as signed)),0) AS `total_blade_a31_sold`,coalesce(sum(cast(`daily_sales`.`blade_a51_sold` as signed)),0) AS `total_blade_a51_sold`,coalesce(sum(cast(`daily_sales`.`blade_a71_sold` as signed)),0) AS `total_blade_a71_sold`,coalesce(sum(cast(`daily_sales`.`blade_v30_sold` as signed)),0) AS `total_blade_v30_sold`,coalesce(sum(cast(`daily_sales`.`mf971L_sold` as signed)),0) AS `total_mf971L_sold`,coalesce(sum(cast(`daily_sales`.`mf286c_sold` as signed)),0) AS `total_mf286c_sold`,coalesce(sum(cast(`daily_sales`.`V50_Design_sold` as signed)),0) AS `total_V50_Design_sold`,coalesce(sum(cast(`daily_sales`.`A54_sold` as signed)),0) AS `total_A54_sold`,coalesce(sum(cast(`daily_sales`.`V40_sold` as signed)),0) AS `total_V40_sold`,coalesce(sum(((((((((((cast(`daily_sales`.`a33_core_sold` as signed) + cast(`daily_sales`.`a31_lite_sold` as signed)) + cast(`daily_sales`.`blade_a31_sold` as signed)) + cast(`daily_sales`.`blade_a51_sold` as signed)) + cast(`daily_sales`.`blade_a71_sold` as signed)) + cast(`daily_sales`.`blade_v30_sold` as signed)) + cast(`daily_sales`.`mf971L_sold` as signed)) + cast(`daily_sales`.`mf286c_sold` as signed)) + cast(`daily_sales`.`V50_Design_sold` as signed)) + cast(`daily_sales`.`A54_sold` as signed)) + cast(`daily_sales`.`V40_sold` as signed))),0) AS `total_sold` from `daily_sales` where ((yearweek(`daily_sales`.`doc_date`,1) <= yearweek(now(),1)) and (`daily_sales`.`doc_date` <= now())) group by `daily_sales`.`promoter_name`,`week_number` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-16  4:22:07
