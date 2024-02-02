-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 09:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zte_abh`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_sheet`
--

CREATE TABLE `attendance_sheet` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `check_in` varchar(255) DEFAULT NULL,
  `check_out` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude_check_out` varchar(255) DEFAULT NULL,
  `longitude_check_out` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `check_out_time` datetime DEFAULT NULL,
  `attendance_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

CREATE TABLE `check_in` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `check_in` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `attendance_time` datetime DEFAULT current_timestamp(),
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `check_out`
--

CREATE TABLE `check_out` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `check_out` varchar(255) DEFAULT NULL,
  `latitude_check_out` varchar(255) DEFAULT NULL,
  `longitude_check_out` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `check_out_time` datetime DEFAULT current_timestamp(),
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `combined_attendance_view`
-- (See below for the actual view)
--
CREATE TABLE `combined_attendance_view` (
`user_id` bigint(20)
,`promoter_name` varchar(255)
,`shop` varchar(255)
,`status` varchar(20)
,`date` date
,`check_in_id` bigint(20)
,`check_out_id` bigint(20)
,`check_in` varchar(255)
,`latitude` varchar(255)
,`longitude` varchar(255)
,`attendance_time` varchar(19)
,`remark_check_in` varchar(255)
,`check_out` varchar(255)
,`latitude_check_out` varchar(255)
,`longitude_check_out` varchar(255)
,`check_out_time` varchar(19)
,`remark_check_out` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `daily_sales`
--

CREATE TABLE `daily_sales` (
  `id` int(11) NOT NULL,
  `promoter_name` varchar(255) DEFAULT NULL,
  `promoter_phone` varchar(255) DEFAULT NULL,
  `shop` varchar(255) DEFAULT NULL,
  `doc_date` datetime DEFAULT current_timestamp(),
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
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `daily_sales_view`
-- (See below for the actual view)
--
CREATE TABLE `daily_sales_view` (
`promoter_name` varchar(255)
,`promoter_phone` varchar(255)
,`shop` varchar(255)
,`remark_w` varchar(255)
,`model` varchar(9)
,`available_stock` varchar(255)
,`apparatus_sold` varchar(255)
,`net_stock` varchar(255)
,`document_date` datetime
,`remark` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `monthly_attendance_view`
-- (See below for the actual view)
--
CREATE TABLE `monthly_attendance_view` (
`user_id` bigint(20)
,`promoter_name` varchar(255)
,`shop` varchar(255)
,`status` varchar(20)
,`date` date
,`month` varchar(69)
,`check_in_id` bigint(20)
,`check_out_id` bigint(20)
,`check_in` varchar(255)
,`latitude` varchar(255)
,`longitude` varchar(255)
,`attendance_time` varchar(19)
,`remark_check_in` varchar(255)
,`check_out` varchar(255)
,`latitude_check_out` varchar(255)
,`longitude_check_out` varchar(255)
,`check_out_time` varchar(19)
,`remark_check_out` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `promoter_name` varchar(255) NOT NULL,
  `promoter_phone` varchar(255) NOT NULL,
  `shop` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `promoter_name`, `promoter_phone`, `shop`, `role`, `date`, `status`) VALUES
(1, '27445619', 'Admin', '$2y$10$7NlbIKLRrW1j71DJ8./bwu8k6Bkt4lFG2jWKoeIHOCPlJv392a8f6', 'admin', '1234', 'ABH HQ', '1', NULL, 'Active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `weekly_sales_report`
-- (See below for the actual view)
--
CREATE TABLE `weekly_sales_report` (
`promoter_name` varchar(255)
,`shop` varchar(255)
,`week_number` int(6)
,`week_start_date` datetime
,`week_end_date` datetime
,`total_a33_core_sold` decimal(65,0)
,`total_a31_lite_sold` decimal(65,0)
,`total_blade_a31_sold` decimal(65,0)
,`total_blade_a51_sold` decimal(65,0)
,`total_blade_a71_sold` decimal(65,0)
,`total_blade_v30_sold` decimal(65,0)
,`total_mf971L_sold` decimal(65,0)
,`total_mf286c_sold` decimal(65,0)
,`total_sold` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Structure for view `combined_attendance_view`
--
DROP TABLE IF EXISTS `combined_attendance_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `combined_attendance_view`  AS SELECT `u`.`id` AS `user_id`, `u`.`promoter_name` AS `promoter_name`, `u`.`shop` AS `shop`, `u`.`status` AS `status`, `d`.`date` AS `date`, `a`.`id` AS `check_in_id`, `co`.`id` AS `check_out_id`, coalesce(`a`.`check_in`,'No') AS `check_in`, ifnull(`a`.`latitude`,'') AS `latitude`, ifnull(`a`.`longitude`,'') AS `longitude`, ifnull(`a`.`attendance_time`,'') AS `attendance_time`, ifnull(`a`.`remark`,'') AS `remark_check_in`, coalesce(`co`.`check_out`,'No') AS `check_out`, ifnull(`co`.`latitude_check_out`,'') AS `latitude_check_out`, ifnull(`co`.`longitude_check_out`,'') AS `longitude_check_out`, ifnull(`co`.`check_out_time`,'') AS `check_out_time`, ifnull(`co`.`remark`,'') AS `remark_check_out` FROM ((((select distinct `users`.`user_id` AS `user_id`,`dates`.`date` AS `date` from ((select `users`.`id` AS `user_id` from `users` where `users`.`role` = 2) `users` join (select distinct `combined_dates`.`date` AS `date` from (select `check_in`.`date` AS `date` from `check_in` union select `check_out`.`date` AS `date` from `check_out`) `combined_dates`) `dates`)) `d` left join `users` `u` on(`d`.`user_id` = `u`.`id`)) left join `check_in` `a` on(`d`.`user_id` = `a`.`user_id` and `d`.`date` = `a`.`date`)) left join `check_out` `co` on(`d`.`user_id` = `co`.`user_id` and `d`.`date` = `co`.`date`))  ;

-- --------------------------------------------------------

--
-- Structure for view `daily_sales_view`
--
DROP TABLE IF EXISTS `daily_sales_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daily_sales_view`  AS SELECT `daily_sales`.`promoter_name` AS `promoter_name`, `daily_sales`.`promoter_phone` AS `promoter_phone`, `daily_sales`.`shop` AS `shop`, `daily_sales`.`remark` AS `remark_w`, 'A33 CORE' AS `model`, `daily_sales`.`a33_core_available` AS `available_stock`, `daily_sales`.`a33_core_sold` AS `apparatus_sold`, `daily_sales`.`a33_core_left` AS `net_stock`, `daily_sales`.`doc_date` AS `document_date`, `daily_sales`.`a33_core_remark` AS `remark` FROM `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'A31 Lite' AS `model`,`daily_sales`.`a31_lite_available` AS `available_stock`,`daily_sales`.`a31_lite_sold` AS `apparatus_sold`,`daily_sales`.`a31_lite_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`a31_lite_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'Blade A31' AS `model`,`daily_sales`.`blade_a31_available` AS `available_stock`,`daily_sales`.`blade_a31_sold` AS `apparatus_sold`,`daily_sales`.`blade_a31_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`blade_a31_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'Blade A51' AS `model`,`daily_sales`.`blade_a51_available` AS `available_stock`,`daily_sales`.`blade_a51_sold` AS `apparatus_sold`,`daily_sales`.`blade_a51_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`blade_a51_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'Blade A71' AS `model`,`daily_sales`.`blade_a71_available` AS `available_stock`,`daily_sales`.`blade_a71_sold` AS `apparatus_sold`,`daily_sales`.`blade_a71_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`blade_a71_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'Blade V30' AS `model`,`daily_sales`.`blade_v30_available` AS `available_stock`,`daily_sales`.`blade_v30_sold` AS `apparatus_sold`,`daily_sales`.`blade_v30_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`blade_v30_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'MF971L' AS `model`,`daily_sales`.`mf971L_available` AS `available_stock`,`daily_sales`.`mf971L_sold` AS `apparatus_sold`,`daily_sales`.`mf971L_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`mf971L_remark` AS `remark` from `daily_sales` union all select `daily_sales`.`promoter_name` AS `promoter_name`,`daily_sales`.`promoter_phone` AS `promoter_phone`,`daily_sales`.`shop` AS `shop`,`daily_sales`.`remark` AS `remark_w`,'MF286C' AS `model`,`daily_sales`.`mf286c_available` AS `available_stock`,`daily_sales`.`mf286c_sold` AS `apparatus_sold`,`daily_sales`.`mf286c_left` AS `net_stock`,`daily_sales`.`doc_date` AS `document_date`,`daily_sales`.`mf286c_remark` AS `remark` from `daily_sales`  ;

-- --------------------------------------------------------

--
-- Structure for view `monthly_attendance_view`
--
DROP TABLE IF EXISTS `monthly_attendance_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `monthly_attendance_view`  AS SELECT `u`.`id` AS `user_id`, `u`.`promoter_name` AS `promoter_name`, `u`.`shop` AS `shop`, `u`.`status` AS `status`, `d`.`date` AS `date`, date_format(`d`.`date`,'%M %Y') AS `month`, `a`.`id` AS `check_in_id`, `co`.`id` AS `check_out_id`, coalesce(`a`.`check_in`,'No') AS `check_in`, ifnull(`a`.`latitude`,'') AS `latitude`, ifnull(`a`.`longitude`,'') AS `longitude`, ifnull(`a`.`attendance_time`,'') AS `attendance_time`, ifnull(`a`.`remark`,'') AS `remark_check_in`, coalesce(`co`.`check_out`,'No') AS `check_out`, ifnull(`co`.`latitude_check_out`,'') AS `latitude_check_out`, ifnull(`co`.`longitude_check_out`,'') AS `longitude_check_out`, ifnull(`co`.`check_out_time`,'') AS `check_out_time`, ifnull(`co`.`remark`,'') AS `remark_check_out` FROM ((((select distinct `users`.`user_id` AS `user_id`,`dates`.`date` AS `date` from ((select `users`.`id` AS `user_id` from `users` where `users`.`role` = 2) `users` join (select distinct `combined_dates`.`date` AS `date` from (select `check_in`.`date` AS `date` from `check_in` union select `check_out`.`date` AS `date` from `check_out`) `combined_dates`) `dates`)) `d` left join `users` `u` on(`d`.`user_id` = `u`.`id`)) left join `check_in` `a` on(`d`.`user_id` = `a`.`user_id` and `d`.`date` = `a`.`date`)) left join `check_out` `co` on(`d`.`user_id` = `co`.`user_id` and `d`.`date` = `co`.`date`))  ;

-- --------------------------------------------------------

--
-- Structure for view `weekly_sales_report`
--
DROP TABLE IF EXISTS `weekly_sales_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `weekly_sales_report`  AS SELECT `daily_sales`.`promoter_name` AS `promoter_name`, `daily_sales`.`shop` AS `shop`, yearweek(`daily_sales`.`doc_date`,1) AS `week_number`, min(`daily_sales`.`doc_date`) AS `week_start_date`, max(`daily_sales`.`doc_date`) AS `week_end_date`, coalesce(sum(cast(`daily_sales`.`a33_core_sold` as signed)),0) AS `total_a33_core_sold`, coalesce(sum(cast(`daily_sales`.`a31_lite_sold` as signed)),0) AS `total_a31_lite_sold`, coalesce(sum(cast(`daily_sales`.`blade_a31_sold` as signed)),0) AS `total_blade_a31_sold`, coalesce(sum(cast(`daily_sales`.`blade_a51_sold` as signed)),0) AS `total_blade_a51_sold`, coalesce(sum(cast(`daily_sales`.`blade_a71_sold` as signed)),0) AS `total_blade_a71_sold`, coalesce(sum(cast(`daily_sales`.`blade_v30_sold` as signed)),0) AS `total_blade_v30_sold`, coalesce(sum(cast(`daily_sales`.`mf971L_sold` as signed)),0) AS `total_mf971L_sold`, coalesce(sum(cast(`daily_sales`.`mf286c_sold` as signed)),0) AS `total_mf286c_sold`, coalesce(sum(cast(`daily_sales`.`a33_core_sold` as signed)),0) + coalesce(sum(cast(`daily_sales`.`a31_lite_sold` as signed)),0) + coalesce(sum(cast(`daily_sales`.`blade_a31_sold` as signed)),0) + coalesce(sum(cast(`daily_sales`.`blade_a51_sold` as signed)),0) + coalesce(sum(cast(`daily_sales`.`blade_a71_sold` as signed)),0) + coalesce(sum(cast(`daily_sales`.`blade_v30_sold` as signed)),0) + coalesce(sum(cast(`daily_sales`.`mf971L_sold` as signed)),0) + coalesce(sum(cast(`daily_sales`.`mf286c_sold` as signed)),0) AS `total_sold` FROM `daily_sales` WHERE yearweek(`daily_sales`.`doc_date`,1) <= yearweek(current_timestamp(),1) AND `daily_sales`.`doc_date` <= current_timestamp() GROUP BY `daily_sales`.`promoter_name`, yearweek(`daily_sales`.`doc_date`,1)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_sheet`
--
ALTER TABLE `attendance_sheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `check_in`
--
ALTER TABLE `check_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `check_out`
--
ALTER TABLE `check_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `daily_sales`
--
ALTER TABLE `daily_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_sheet`
--
ALTER TABLE `attendance_sheet`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `check_in`
--
ALTER TABLE `check_in`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `check_out`
--
ALTER TABLE `check_out`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_sales`
--
ALTER TABLE `daily_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_sheet`
--
ALTER TABLE `attendance_sheet`
  ADD CONSTRAINT `attendance_sheet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `check_in`
--
ALTER TABLE `check_in`
  ADD CONSTRAINT `check_in_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `check_out`
--
ALTER TABLE `check_out`
  ADD CONSTRAINT `check_out_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
