-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2018 at 05:01 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checkpoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkpoint`
--

CREATE TABLE `checkpoint` (
  `checkpoint-id` int(11) NOT NULL,
  `starttime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL,
  `checktime-id` int(11) NOT NULL,
  `users-id` int(11) NOT NULL,
  `course-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `checktime`
--

CREATE TABLE `checktime` (
  `id` int(11) NOT NULL,
  `time` int(11) DEFAULT NULL,
  `checkdate` date DEFAULT NULL,
  `course-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checktime`
--

INSERT INTO `checktime` (`id`, `time`, `checkdate`, `course-id`) VALUES
(1, 1, '2018-07-20', 387),
(2, 1, '2018-07-20', 343);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course-id` int(11) NOT NULL,
  `course-name` varchar(255) DEFAULT NULL,
  `course-decsription` varchar(255) DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `date` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course-id`, `course-name`, `course-decsription`, `starttime`, `endtime`, `date`) VALUES
(343, 'Service Oriented Architecture and Web Service Technology', 'SWE-343 Service Oriented Architecture and Web Service Technology   1 (3-2-7)c', '13:00:00', '17:00:00', 2),
(387, 'Database Application', 'SWE-387 Database Application 1 (3-2-7)', '13:00:00', '17:30:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', '$2y$10$z0glw9l0y.YcYQGPmM7eCuRmuNoZgVED5YxP/yVKBkJYrFaaNIVpe', 'admin admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_course`
--

CREATE TABLE `users_course` (
  `users-id` int(11) NOT NULL,
  `course-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_course`
--

INSERT INTO `users_course` (`users-id`, `course-id`) VALUES
(1, 343),
(1, 387);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkpoint`
--
ALTER TABLE `checkpoint`
  ADD PRIMARY KEY (`checkpoint-id`),
  ADD KEY `fk_checkpoint_checktime1_idx` (`checktime-id`),
  ADD KEY `fk_checkpoint_users_has_course1_idx` (`users-id`,`course-id`);

--
-- Indexes for table `checktime`
--
ALTER TABLE `checktime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_checktime_course1_idx` (`course-id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course-id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_course`
--
ALTER TABLE `users_course`
  ADD PRIMARY KEY (`users-id`,`course-id`),
  ADD KEY `fk_users_has_course_course1_idx` (`course-id`),
  ADD KEY `fk_users_has_course_users_idx` (`users-id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkpoint`
--
ALTER TABLE `checkpoint`
  MODIFY `checkpoint-id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checktime`
--
ALTER TABLE `checktime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkpoint`
--
ALTER TABLE `checkpoint`
  ADD CONSTRAINT `fk_checkpoint_checktime1` FOREIGN KEY (`checktime-id`) REFERENCES `checktime` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_checkpoint_users_has_course1` FOREIGN KEY (`users-id`,`course-id`) REFERENCES `users_course` (`users-id`, `course-id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `checktime`
--
ALTER TABLE `checktime`
  ADD CONSTRAINT `fk_checktime_course1` FOREIGN KEY (`course-id`) REFERENCES `course` (`course-id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_course`
--
ALTER TABLE `users_course`
  ADD CONSTRAINT `fk_users_has_course_course1` FOREIGN KEY (`course-id`) REFERENCES `course` (`course-id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_course_users` FOREIGN KEY (`users-id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
