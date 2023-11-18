-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: zte1
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
  `present` varchar(255) DEFAULT NULL,
  `absent` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `attendance_time` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `attendance_sheet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `daily_sales`
--

DROP TABLE IF EXISTS `daily_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `daily_sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `promoter_name` varchar(255) DEFAULT NULL,
  `promoter_phone` varchar(255) DEFAULT NULL,
  `shop` varchar(255) DEFAULT NULL,
  `doc_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `a33_core_available` varchar(255) DEFAULT NULL,
  `a31_lite_available` varchar(255) DEFAULT NULL,
  `blade_a31_available` varchar(255) DEFAULT NULL,
  `blade_a51_available` varchar(255) DEFAULT NULL,
  `blade_a71_available` varchar(255) DEFAULT NULL,
  `blade_v30_available` varchar(255) DEFAULT NULL,
  `mf971L_available` varchar(255) DEFAULT NULL,
  `mf286c_available` varchar(255) DEFAULT NULL,
  `a33_core_sold` varchar(255) DEFAULT NULL,
  `a31_lite_sold` varchar(255) DEFAULT NULL,
  `blade_a31_sold` varchar(255) DEFAULT NULL,
  `blade_a51_sold` varchar(255) DEFAULT NULL,
  `blade_a71_sold` varchar(255) DEFAULT NULL,
  `blade_v30_sold` varchar(255) DEFAULT NULL,
  `mf971L_sold` varchar(255) DEFAULT NULL,
  `mf286c_sold` varchar(255) DEFAULT NULL,
  `a33_core_left` varchar(255) DEFAULT NULL,
  `a31_lite_left` varchar(255) DEFAULT NULL,
  `blade_a31_left` varchar(255) DEFAULT NULL,
  `blade_a51_left` varchar(255) DEFAULT NULL,
  `blade_a71_left` varchar(255) DEFAULT NULL,
  `blade_v30_left` varchar(255) DEFAULT NULL,
  `mf971L_left` varchar(255) DEFAULT NULL,
  `mf286c_left` varchar(255) DEFAULT NULL,
  `a33_core_remark` varchar(255) DEFAULT NULL,
  `a31_lite_remark` varchar(255) DEFAULT NULL,
  `blade_a31_remark` varchar(255) DEFAULT NULL,
  `blade_a51_remark` varchar(255) DEFAULT NULL,
  `blade_a71_remark` varchar(255) DEFAULT NULL,
  `blade_v30_remark` varchar(255) DEFAULT NULL,
  `mf971L_remark` varchar(255) DEFAULT NULL,
  `mf286c_remark` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `present_users_view`
--

DROP TABLE IF EXISTS `present_users_view`;
/*!50001 DROP VIEW IF EXISTS `present_users_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `present_users_view` AS SELECT 
 1 AS `user_id`,
 1 AS `user_name`,
 1 AS `promoter_name`,
 1 AS `promoter_phone`,
 1 AS `shop`,
 1 AS `role`,
 1 AS `attendance_id`,
 1 AS `present`,
 1 AS `absent`,
 1 AS `location`,
 1 AS `latitude`,
 1 AS `longitude`,
 1 AS `remark`,
 1 AS `attendance_time`,
 1 AS `attendance_date`*/;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
 1 AS `total_sold`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `present_users_view`
--

/*!50001 DROP VIEW IF EXISTS `present_users_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `present_users_view` AS select `u`.`id` AS `user_id`,`u`.`user_name` AS `user_name`,`u`.`promoter_name` AS `promoter_name`,`u`.`promoter_phone` AS `promoter_phone`,`u`.`shop` AS `shop`,`u`.`role` AS `role`,max(`a`.`id`) AS `attendance_id`,max(`a`.`present`) AS `present`,max(`a`.`absent`) AS `absent`,max(`a`.`location`) AS `location`,max(`a`.`latitude`) AS `latitude`,max(`a`.`longitude`) AS `longitude`,max(`a`.`remark`) AS `remark`,max(`a`.`attendance_time`) AS `attendance_time`,coalesce(cast(max(`a`.`attendance_time`) as date),`dates`.`date`) AS `attendance_date` from ((`users` `u` join (select distinct cast(`att`.`attendance_time` as date) AS `date` from `attendance_sheet` `att`) `dates`) left join `attendance_sheet` `a` on(((`u`.`id` = `a`.`user_id`) and (cast(`a`.`attendance_time` as date) = `dates`.`date`)))) where (`u`.`role` = 2) group by `u`.`id`,`dates`.`date` */;
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
/*!50001 VIEW `weekly_sales_report` AS select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`shop` AS `shop`,yearweek(`daily_sales`.`doc_date`,1) AS `week_number`,min(`daily_sales`.`doc_date`) AS `week_start_date`,max(`daily_sales`.`doc_date`) AS `week_end_date`,coalesce(sum(cast(`daily_sales`.`a33_core_sold` as signed)),0) AS `total_a33_core_sold`,coalesce(sum(cast(`daily_sales`.`a31_lite_sold` as signed)),0) AS `total_a31_lite_sold`,coalesce(sum(cast(`daily_sales`.`blade_a31_sold` as signed)),0) AS `total_blade_a31_sold`,coalesce(sum(cast(`daily_sales`.`blade_a51_sold` as signed)),0) AS `total_blade_a51_sold`,coalesce(sum(cast(`daily_sales`.`blade_a71_sold` as signed)),0) AS `total_blade_a71_sold`,coalesce(sum(cast(`daily_sales`.`blade_v30_sold` as signed)),0) AS `total_blade_v30_sold`,coalesce(sum(cast(`daily_sales`.`mf971L_sold` as signed)),0) AS `total_mf971L_sold`,coalesce(sum(cast(`daily_sales`.`mf286c_sold` as signed)),0) AS `total_mf286c_sold`,(((((((coalesce(sum(cast(`daily_sales`.`a33_core_sold` as signed)),0) + coalesce(sum(cast(`daily_sales`.`a31_lite_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`blade_a31_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`blade_a51_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`blade_a71_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`blade_v30_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`mf971L_sold` as signed)),0)) + coalesce(sum(cast(`daily_sales`.`mf286c_sold` as signed)),0)) AS `total_sold` from `daily_sales` where ((yearweek(`daily_sales`.`doc_date`,1) <= yearweek(now(),1)) and (`daily_sales`.`doc_date` <= now())) group by `daily_sales`.`promoter_name`,`week_number` */;
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

-- Dump completed on 2023-11-17 11:17:29
