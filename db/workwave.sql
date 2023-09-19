-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 07:31 AM
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
(16, 'SUP', '2023-09-07 11:55:12', '1'),
(18, 'SUP', '2023-09-19 03:52:38', '1'),
(19, 'SUP', '2023-09-19 03:53:17', '1');

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
(15, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_desc` text DEFAULT NULL,
  `task_status` enum('0','1') DEFAULT '1',
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `task_desc`, `task_status`, `due_date`, `created_at`) VALUES
(10, 'Task 04', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Placerat vestibulum lectus mauris ultrices eros in. Ac feugiat sed lectus vestibulum mattis. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. Et netus et malesuada fames ac turpis egestas. Consequat semper viverra nam libero justo laoreet sit. Facilisis gravida neque convallis a cras semper auctor. Lorem ipsum dolor sit amet consectetur adipiscing elit. Eget mauris pharetra et ultrices neque ornare aenean euismod elementum. Scelerisque eu ultrices vitae auctor eu augue. Lacinia quis vel eros donec ac odio.\n\nVestibulum sed arcu non odio euismod lacinia at quis. Arcu risus quis varius quam quisque. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Luctus accumsan tortor posuere ac ut consequat. Placerat orci nulla pellentesque dignissim enim sit amet. Vulputate sapien nec sagittis aliquam malesuada bibendum. Mus mauris vitae ultricies leo integer. Purus viverra accumsan in nisl nisi scelerisque. Porttitor eget dolor morbi non arcu risus. Felis eget velit aliquet sagittis id consectetur purus ut faucibus. Quis lectus nulla at volutpat diam ut. Dictum non consectetur a erat nam at lectus urna duis. Sed sed risus pretium quam vulputate. Tempus urna et pharetra pharetra massa massa ultricies mi. Consequat semper viverra nam libero. Ultrices gravida dictum fusce ut placerat orci nulla. Pulvinar elementum integer enim neque. Morbi tincidunt ornare massa eget.', '0', '2023-09-06', '2023-09-06 06:51:38'),
(11, 'Task 05', 'new task', '0', '2023-09-06', '2023-09-06 08:33:47'),
(12, 'taks 06', 'hmm', '1', '2023-09-07', '2023-09-06 09:20:14'),
(13, 'Task 06', '06 task', '1', '2023-09-06', '2023-09-06 09:42:55'),
(14, 'Submit Project Features', 'Submit Project Features', '0', '2023-09-19', '2023-09-19 03:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `task_emp_map`
--

CREATE TABLE `task_emp_map` (
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_emp_map`
--

INSERT INTO `task_emp_map` (`task_id`, `user_id`) VALUES
(10, 16),
(10, 17),
(11, 16),
(11, 17),
(13, 17),
(14, 17);

-- --------------------------------------------------------

--
-- Table structure for table `task_files`
--

CREATE TABLE `task_files` (
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `upload_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_files`
--

INSERT INTO `task_files` (`user_id`, `task_id`, `file_path`, `upload_date`) VALUES
(16, 10, 'emp02-Task 04.pdf', '2023-09-06 13:16:06'),
(17, 10, 'emp03-Task 04.pdf', '2023-09-19 08:51:10'),
(17, 11, 'emp03-Task 05.pdf', '2023-09-06 15:44:26'),
(17, 13, 'emp03-Task 06.pdf', '2023-09-06 15:44:20'),
(17, 14, 'emp03-Submit Project Features.pdf', '2023-09-19 09:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `task_sup_map`
--

CREATE TABLE `task_sup_map` (
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_sup_map`
--

INSERT INTO `task_sup_map` (`task_id`, `user_id`) VALUES
(10, 15),
(11, 15),
(13, 15),
(14, 15);

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
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `image_path`, `active`) VALUES
(15, 'sup01', 'testuser01@gmail.com', '123', 'TestUser01.png', 1),
(16, 'emp02', 'testuser02@gmail.com', '123', 'TestUser02.png', 1),
(17, 'emp03', 'testuser03@gmail.com', '123', 'TestUser03.png', 1),
(18, 'user04', 'testuser04@gmail.com', '123', 'TestUser04.png', 1),
(19, 'user05', 'testuser05@gmail.com', '123', 'TestUser05.png', 1),
(20, 'TestUser06', 'testuser06@gmail.com', '123', 'TestUser06.png', 1),
(21, 'TestUser07', 'testuser07@gmail.com', '123', 'TestUser07.png', 1),
(22, 'TestUser08', 'testuser08@gmail.com', '123', 'TestUser08.png', 1),
(23, 'TestUser09', 'testuser09@gmail.com', '123', 'TestUser09.png', 1),
(24, 'admin', 'testuser10@gmail.com', '123', 'TestUser10.png', 1);

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

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_emp_map`
--
ALTER TABLE `task_emp_map`
  ADD PRIMARY KEY (`task_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `task_files`
--
ALTER TABLE `task_files`
  ADD PRIMARY KEY (`user_id`,`task_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `task_sup_map`
--
ALTER TABLE `task_sup_map`
  ADD PRIMARY KEY (`task_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `task_emp_map`
--
ALTER TABLE `task_emp_map`
  ADD CONSTRAINT `task_emp_map_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`),
  ADD CONSTRAINT `task_emp_map_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `task_files`
--
ALTER TABLE `task_files`
  ADD CONSTRAINT `task_files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `task_files_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`);

--
-- Constraints for table `task_sup_map`
--
ALTER TABLE `task_sup_map`
  ADD CONSTRAINT `task_sup_map_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`),
  ADD CONSTRAINT `task_sup_map_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
