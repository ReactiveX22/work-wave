-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 03:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workwave`
--

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `employee_id` int(11) NOT NULL,
  `balance` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`employee_id`, `balance`) VALUES
(16, 5100.00);

-- --------------------------------------------------------

--
-- Table structure for table `pending_balances`
--

CREATE TABLE `pending_balances` (
  `user_id` int(11) NOT NULL,
  `pending_amount` decimal(10,2) NOT NULL,
  `requested_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_pending` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pending_pay_reqs_view`
-- (See below for the actual view)
--
CREATE TABLE `pending_pay_reqs_view` (
`user_id` int(11)
,`username` varchar(25)
,`image_path` varchar(255)
,`pending_amount` decimal(10,2)
,`is_pending` enum('0','1')
);

-- --------------------------------------------------------

--
-- Table structure for table `pending_role_reqs`
--

CREATE TABLE `pending_role_reqs` (
  `user_id` int(11) NOT NULL,
  `requested_role` varchar(25) NOT NULL,
  `requested_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_pending` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_role_reqs`
--

INSERT INTO `pending_role_reqs` (`user_id`, `requested_role`, `requested_date`, `is_pending`) VALUES
(16, 'SUP', '2023-09-03 00:11:09', '1'),
(17, 'SUP', '2023-09-03 00:11:22', '1'),
(18, 'ADM', '2023-09-03 00:11:37', '1'),
(19, 'SUP', '2023-09-03 00:11:51', '1'),
(20, 'ADM', '2023-09-03 00:12:02', '1'),
(21, 'SUP', '2023-09-03 00:12:15', '1'),
(22, 'SUP', '2023-09-03 00:12:33', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pending_role_reqs_view`
-- (See below for the actual view)
--
CREATE TABLE `pending_role_reqs_view` (
`user_id` int(11)
,`username` varchar(25)
,`image_path` varchar(255)
,`requested_role` varchar(25)
,`requested_date` timestamp
,`is_pending` enum('0','1')
);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` varchar(25) NOT NULL,
  `role_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
('ADM', 'Admin'),
('EMP', 'Employee'),
('SUP', 'Supervisor');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sup_emp_list_view`
-- (See below for the actual view)
--
CREATE TABLE `sup_emp_list_view` (
`sup_id` int(11)
,`emp_id` int(11)
,`username` varchar(25)
,`image_path` varchar(255)
,`hourly_rate` decimal(8,2)
,`total_worked_hours` decimal(26,2)
,`pending_balance` decimal(32,2)
,`balance` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `sup_emp_map`
--

CREATE TABLE `sup_emp_map` (
  `sup_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sup_emp_map`
--

INSERT INTO `sup_emp_map` (`sup_id`, `emp_id`) VALUES
(15, 16),
(15, 17),
(15, 18),
(15, 19),
(15, 20),
(15, 21),
(15, 22);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL DEFAULT 'default_profile_pic.jpg',
  `hourly_rate` decimal(8,2) NOT NULL DEFAULT 10.00,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `image_path`, `hourly_rate`, `active`) VALUES
(15, 'TestUser01', 'testuser01@gmail.com', '123', 'TestUser01.png', 10.00, 1),
(16, 'TestUser02', 'testuser02@gmail.com', '123', 'TestUser02.png', 10.00, 1),
(17, 'TestUser03', 'testuser03@gmail.com', '123', 'TestUser03.png', 10.00, 1),
(18, 'TestUser04', 'testuser04@gmail.com', '123', 'TestUser04.png', 10.00, 1),
(19, 'TestUser05', 'testuser05@gmail.com', '123', 'TestUser05.png', 10.00, 1),
(20, 'TestUser06', 'testuser06@gmail.com', '123', 'TestUser06.png', 10.00, 1),
(21, 'TestUser07', 'testuser07@gmail.com', '123', 'TestUser07.png', 10.00, 1),
(22, 'TestUser08', 'testuser08@gmail.com', '123', 'TestUser08.png', 10.00, 1),
(23, 'TestUser09', 'testuser09@gmail.com', '123', 'TestUser09.png', 10.00, 1),
(24, 'TestUser10', 'testuser10@gmail.com', '123', 'TestUser10.png', 10.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(24, 'ADM'),
(16, 'EMP'),
(17, 'EMP'),
(18, 'EMP'),
(19, 'EMP'),
(20, 'EMP'),
(21, 'EMP'),
(22, 'EMP'),
(23, 'EMP'),
(15, 'SUP');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_roles_view`
-- (See below for the actual view)
--
CREATE TABLE `user_roles_view` (
`user_id` int(11)
,`username` varchar(25)
,`role_id` varchar(25)
,`role_name` varchar(25)
);

-- --------------------------------------------------------

--
-- Table structure for table `work_sessions`
--

CREATE TABLE `work_sessions` (
  `session_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `worked_hours` decimal(4,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_sessions`
--

INSERT INTO `work_sessions` (`session_id`, `employee_id`, `start_timestamp`, `end_timestamp`, `worked_hours`) VALUES
(1, 16, '2023-09-02 23:58:17', '2023-08-30 23:56:26', 1.00),
(2, 16, '2023-09-01 23:58:17', '2023-09-01 23:56:26', 2.00),
(3, 16, '2023-09-02 23:58:17', '2023-09-02 23:56:26', 4.00),
(4, 16, '2023-08-28 23:58:17', '2023-08-28 23:56:26', 5.00),
(5, 16, '2023-08-29 23:58:17', '2023-08-29 23:56:26', 1.00);

-- --------------------------------------------------------

--
-- Structure for view `pending_pay_reqs_view`
--
DROP TABLE IF EXISTS `pending_pay_reqs_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pending_pay_reqs_view`  AS SELECT `pb`.`user_id` AS `user_id`, `u`.`username` AS `username`, `u`.`image_path` AS `image_path`, `pb`.`pending_amount` AS `pending_amount`, `pb`.`is_pending` AS `is_pending` FROM (`pending_balances` `pb` join `users` `u` on(`pb`.`user_id` = `u`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `pending_role_reqs_view`
--
DROP TABLE IF EXISTS `pending_role_reqs_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pending_role_reqs_view`  AS SELECT `prr`.`user_id` AS `user_id`, `u`.`username` AS `username`, `u`.`image_path` AS `image_path`, `prr`.`requested_role` AS `requested_role`, `prr`.`requested_date` AS `requested_date`, `prr`.`is_pending` AS `is_pending` FROM (`pending_role_reqs` `prr` join `users` `u` on(`prr`.`user_id` = `u`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `sup_emp_list_view`
--
DROP TABLE IF EXISTS `sup_emp_list_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sup_emp_list_view`  AS SELECT DISTINCT `se`.`sup_id` AS `sup_id`, `se`.`emp_id` AS `emp_id`, `u`.`username` AS `username`, `u`.`image_path` AS `image_path`, `u`.`hourly_rate` AS `hourly_rate`, sum(`ws`.`worked_hours`) AS `total_worked_hours`, sum(`pb`.`pending_amount`) AS `pending_balance`, `b`.`balance` AS `balance` FROM ((((`sup_emp_map` `se` join `users` `u` on(`se`.`emp_id` = `u`.`user_id`)) left join `balances` `b` on(`b`.`employee_id` = `u`.`user_id`)) left join `pending_balances` `pb` on(`pb`.`user_id` = `u`.`user_id` and `pb`.`is_pending` = '1')) left join `work_sessions` `ws` on(`ws`.`employee_id` = `se`.`emp_id`)) GROUP BY `se`.`sup_id`, `se`.`emp_id` ;

-- --------------------------------------------------------

--
-- Structure for view `user_roles_view`
--
DROP TABLE IF EXISTS `user_roles_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_roles_view`  AS SELECT `ur`.`user_id` AS `user_id`, `u`.`username` AS `username`, `ur`.`role_id` AS `role_id`, `r`.`role_name` AS `role_name` FROM ((`user_roles` `ur` join `users` `u` on(`ur`.`user_id` = `u`.`user_id`)) join `roles` `r` on(`ur`.`role_id` = `r`.`role_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `pending_balances`
--
ALTER TABLE `pending_balances`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `pending_role_reqs`
--
ALTER TABLE `pending_role_reqs`
  ADD PRIMARY KEY (`user_id`,`requested_role`),
  ADD KEY `requested_role` (`requested_role`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sup_emp_map`
--
ALTER TABLE `sup_emp_map`
  ADD PRIMARY KEY (`sup_id`,`emp_id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `work_sessions`
--
ALTER TABLE `work_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `work_sessions`
--
ALTER TABLE `work_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balances`
--
ALTER TABLE `balances`
  ADD CONSTRAINT `balances_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `pending_balances`
--
ALTER TABLE `pending_balances`
  ADD CONSTRAINT `pending_balances_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `pending_role_reqs`
--
ALTER TABLE `pending_role_reqs`
  ADD CONSTRAINT `pending_role_reqs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pending_role_reqs_ibfk_2` FOREIGN KEY (`requested_role`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `sup_emp_map`
--
ALTER TABLE `sup_emp_map`
  ADD CONSTRAINT `sup_emp_map_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `sup_emp_map_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `work_sessions`
--
ALTER TABLE `work_sessions`
  ADD CONSTRAINT `work_sessions_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
