-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Generation Time: Feb 10, 2025 at 10:50 AM
-- Server version: 8.0.37-azure
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `tokabookings`
--

CREATE TABLE `tokabookings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `trainer_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Pending','Confirmed','Cancelled') NOT NULL DEFAULT 'Confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tokatracking`
--

CREATE TABLE `tokatracking` (
  `id` int NOT NULL COMMENT 'Primary Key',
  `user_id` int NOT NULL COMMENT 'Foreign Key to tokausers',
  `tracking_date` varchar(255) NOT NULL COMMENT 'Date of measurement',
  `bmi` decimal(4,2) DEFAULT NULL COMMENT 'Body Mass Index',
  `UserWeight` varchar(255) DEFAULT NULL COMMENT 'Weight in kg',
  `UserHeight` varchar(255) DEFAULT NULL COMMENT 'Height'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Health metrics tracking table';

--
-- Dumping data for table `tokatracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tokausers`
--

CREATE TABLE `tokausers` (
  `id` int NOT NULL,
  `LastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `FirstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'First Name',
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'Email',
  `UserPassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'Password',
  `Dob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'Age',
  `MembershipLevel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'Membership'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tokabookings`
--
ALTER TABLE `tokabookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tokatracking`
--
ALTER TABLE `tokatracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tokatracking_ibfk_1` (`user_id`);

--
-- Indexes for table `tokausers`
--
ALTER TABLE `tokausers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tokabookings`
--
ALTER TABLE `tokabookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tokatracking`
--
ALTER TABLE `tokatracking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tokausers`
--
ALTER TABLE `tokausers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tokabookings`
--
ALTER TABLE `tokabookings`
  ADD CONSTRAINT `tokabookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tokausers` (`id`);

--
-- Constraints for table `tokatracking`
--
ALTER TABLE `tokatracking`
  ADD CONSTRAINT `tokatracking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tokausers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
