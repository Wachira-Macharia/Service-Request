-- phpMyAdmin SQL Dump
-- version 5.2.1-1.fc37
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2023 at 01:47 PM
-- Server version: 10.5.18-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `ticket_no` varchar(20) NOT NULL,
  `pno` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `pax` varchar(50) DEFAULT NULL,
  `courseName` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `details` longtext NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_resolved` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `ticket_no`, `pno`, `email`, `room`, `pax`, `courseName`, `date`, `time`, `details`, `date_requested`, `date_resolved`) VALUES
(1, 'ROOM1653955', NULL, 'john@gmail.com', 'on', '20', 'Pedagogy', '2023-04-20', '04:47:00', 'Water and Books', '2023-04-18 11:44:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `ticket_no` varchar(20) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `attachment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `ticket_no`, `phone`, `email`, `subject`, `details`, `attachment`) VALUES
(2, 'COMPLAINT9882073', '(254) 798-7878', 'joe@gmail.com', NULL, 'Broken desk', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(11) NOT NULL,
  `ticket_no` varchar(20) NOT NULL,
  `personal_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `details` longtext NOT NULL,
  `Date_Requested` timestamp NOT NULL DEFAULT current_timestamp(),
  `Date_Resolved` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`id`, `ticket_no`, `personal_number`, `email`, `subject`, `details`, `Date_Requested`, `Date_Resolved`) VALUES
(1, 'DESIGN4838900', '1000', 'john@gmail.com', 'Test', 'Design a Map', '2023-04-18 10:13:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `ticket_no` varchar(20) NOT NULL,
  `pno` varchar(20) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `date_Requested` timestamp NOT NULL DEFAULT current_timestamp(),
  `deadline_Date` date NOT NULL,
  `objective` longtext NOT NULL,
  `audience` varchar(20) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `Date_Resolved` datetime DEFAULT NULL,
  `attachment` text DEFAULT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `ticket_no`, `pno`, `contact`, `phone`, `email`, `date_Requested`, `deadline_Date`, `objective`, `audience`, `message`, `Date_Resolved`, `attachment`, `Status`) VALUES
(1, 'SMS3091187', '1000', 'John', '9889798967', 'joe@gmail.com', '2023-04-18 11:07:54', '2023-04-20', 'Test', 'Students', 'test sms request', NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pno` varchar(100) NOT NULL,
  `service` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pno`, `service`, `password`) VALUES
(12, 'john@gmail.com', '', '', '$2y$10$FrdfiSD55Uxa.Vy71cDU9eLtG5SYIQm6tJcCqDeHRQ14gMhnECtO2'),
(13, 'jaime@gmail.com', '', '', '$2y$10$wwUcUnnYSGh.xrOeHMBFseqO1Fz1wK./7m1OrMuSr8yCYT6uiMWZ6');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `ticket_no` varchar(255) NOT NULL,
  `personal_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `Date_Requested` timestamp NOT NULL DEFAULT current_timestamp(),
  `Date_Resolved` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `ticket_no`, `personal_number`, `email`, `subject`, `details`, `Date_Requested`, `Date_Resolved`) VALUES
(4, 'WEB7325175', '1000', 'Jane@gmail.com', 'Test', 'Web Request', '2023-04-18 10:03:46', NULL),
(6, 'WEB5195238', '1000', 'Jane@gmail.com', 'Diploma Programs', 'Program requirements change to  C Plain to qualify', '2023-04-18 12:36:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pnumber` (`email`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
