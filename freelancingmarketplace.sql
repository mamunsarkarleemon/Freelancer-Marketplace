-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2025 at 11:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancingmarketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `fullname` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nid` int(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `present_address` varchar(100) NOT NULL,
  `permanent_address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `repassword` varchar(50) NOT NULL,
  `userType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fullname`, `username`, `email`, `nid`, `phone`, `dob`, `gender`, `present_address`, `permanent_address`, `password`, `repassword`, `userType`) VALUES
(1, 'Maruf Billah', 'admin', 'maruf123@gmail.com', 2147483647, 1736828282, '2024-12-02', 'male', 'Basundhara', 'Basundhara', 'asd@123', 'asd@123', 'admin'),
(2, 'Maruf Billah', 'admin1', 'maruf123@gmail.com', 2147483647, 1736828282, '2024-12-24', 'female', 'Basundhara', 'Basundhara', 'asd@12', 'asd@12', 'admin'),
(3, 'Maruf Billah', 'admin12', 'maruf123@gmail.com', 2147483647, 1736828282, '2024-12-10', 'male', 'Basundhara', 'Basundhara', 'asd@123', 'asd@123', 'admin'),
(4, 'Manumsad', 'Manumsad', 'Manumsad@gmail.com', 2147483647, 1999, '0000-00-00', '$2y$10$xJEuC4AYhu76EZL1DWRgiOEinXfxRHkVr3fVHp0d1ot.gU/QEoIbq', 'ABC123abc@', 'Manumsad', 'admin', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(100) NOT NULL,
  `job_id` int(100) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `application_text` text NOT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('pending','accepted','rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(100) NOT NULL,
  `fullname` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `repassword` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `userType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `fullname`, `username`, `email`, `phone`, `dob`, `gender`, `password`, `repassword`, `address`, `userType`) VALUES
(1, 'Maruf Billah', 'client', 'maruf123@gmail.com', 1736828282, '2024-12-10', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(5, 'Maruf Billah', 'marufbs', 'maruf123@gmail.com', 1736828282, '2024-12-03', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(8, 'Maruf Billah', 'marufbsbs', 'maruf123@gmail.com', 1736828282, '2024-12-10', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(9, 'Maruf Billah', 'marufbss', 'maruf123@gmail.com', 1736828282, '2024-12-09', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(10, 'Maruf Billah', 'marufbssb', 'maruf123@gmail.com', 1736828282, '2024-12-09', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(11, 'Maruf Billah', 'marufbbss', 'maruf123@gmail.com', 1736828282, '2024-12-09', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(12, 'Maruf Billah', 'marufbbsss', 'maruf123@gmail.com', 1736828282, '2024-12-17', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(13, 'Maruf Billah', 'nayeem', 'maruf123@gmail.com', 1736828282, '2024-12-20', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(14, 'Maruf Billah', 'nayeem1', 'maruf123@gmail.com', 1736828282, '2024-12-10', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(15, 'Maruf Billah', 'marufdgr', 'maruf123@gmail.com', 1736828282, '2025-01-14', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(16, 'Maruf Billah', 'maruf123', 'maruf123@gmail.com', 1736828282, '2025-01-07', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(17, 'Maruf Billah', 'marufbswer', 'maruf123@gmail.com', 1736828282, '2025-01-07', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(18, 'Maruf Billah', 'sgsdfg', 'maruf123@gmail.com', 1736828282, '2025-01-06', 'male', 'asd123', 'asd123', 'Basundhara', 'client'),
(19, 'Maruf Billah', 'marufbs42343', 'maruf123@gmail.com', 1736828282, '2025-01-13', 'male', 'A@$DFDAFSs1', 'A@$DFDAFSs1', 'Basundhara', 'client'),
(20, 'Maruf Billah', 'marufbsfdg454', 'maruf123@gmail.com', 1736828282, '2024-12-29', 'male', 'Asd123456', 'Asd123456', 'basundhara', 'client'),
(21, 'Maruf Billah', 'marufbsfdg454e', 'maruf123@gmail.com', 1736828282, '2025-01-07', 'male', 'Asd1234f', 'Asd1234f', 'basundhara', 'client'),
(22, 'insertAdminData', 'insertAdminData', 'insertAdminData@gmail.com', 2147483647, '0000-00-00', '1999-12-02', 'male', 'dsajkasdjk', 'dsfdlka', 'ABC123abc@');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer`
--

CREATE TABLE `freelancer` (
  `freelancer_id` int(100) NOT NULL,
  `fullname` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`freelancer_id`, `fullname`, `username`, `email`, `gender`, `dob`, `password`, `confirm_password`) VALUES
(1, 'maruf', 'marufbs', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(100) NOT NULL,
  `client_id` int(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `job_type` enum('hourly','fixed') NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `status` enum('open','in progress','completed') NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `client_id`, `title`, `description`, `job_type`, `payment`, `status`, `post_date`) VALUES
(31, 2, 'tertt', 'retrey', 'hourly', 456754.00, 'open', '2024-12-23 15:44:09'),
(32, 2, 'maruf', 'sfgh', 'hourly', 500.00, 'open', '2024-12-23 15:47:13'),
(33, 17, '24', 'fsdf', 'hourly', 3434.00, 'open', '2025-01-02 08:32:52'),
(90, 2, 'maruf', 'maruf', 'hourly', 435.00, 'open', '2025-01-28 19:36:36'),
(91, 2, 'maruf', 'maruf', 'fixed', 435.00, 'open', '2025-01-28 19:37:30'),
(164, 2, 'Software', 'asdgsg', 'fixed', 99999999.99, 'open', '2025-01-28 20:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(100) NOT NULL,
  `receiver_id` int(100) NOT NULL,
  `message_text` varchar(500) NOT NULL,
  `send_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `moderator_id` int(100) NOT NULL,
  `fullname` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `present_address` varchar(50) NOT NULL,
  `parmanent_address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `repassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `job_id` int(100) NOT NULL,
  `freelancer_id` int(100) NOT NULL,
  `client_id` int(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userType` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `userType`) VALUES
(1, 'admin', '123', 'Mamun@gmail.com', 'admin'),
(2, 'client', '111', 'MoshaKheko@mgmail.com', 'client'),
(5, 'marufbs', 'asd123', 'maruf123@gmail.com', 'client'),
(8, 'marufbsbs', 'asd123', 'maruf123@gmail.com', 'client'),
(9, 'marufbss', 'asd123', 'maruf123@gmail.com', 'client'),
(10, 'marufbssb', 'asd123', 'maruf123@gmail.com', 'client'),
(11, 'marufbbss', 'asd123', 'maruf123@gmail.com', 'client'),
(12, 'admin1', 'asd@12', 'maruf123@gmail.com', 'admin'),
(13, 'marufbbsss', 'asd123', 'maruf123@gmail.com', 'client'),
(14, 'Masum', 'asd@123', 'maruf123@gmail.com', 'modarator'),
(15, 'nayeem', 'asd123', 'maruf123@gmail.com', 'client'),
(16, 'nayeem1', 'asd123', 'maruf123@gmail.com', 'client'),
(17, 'marufdgr', 'asd123', 'maruf123@gmail.com', 'client'),
(18, 'maruf123', 'asd123', 'maruf123@gmail.com', 'client'),
(19, 'marufbswer', 'asd123', 'maruf123@gmail.com', 'client'),
(20, 'sgsdfg', 'asd123', 'maruf123@gmail.com', 'client'),
(21, 'marufbs42343', 'A@$DFDAFSs1', 'maruf123@gmail.com', 'client'),
(22, 'mobin', 'maruf', 'maruf', 'freelancer'),
(23, 'karim', 'ratul', 'ratul', 'freelancer'),
(24, 'marufbsfdg454', 'Asd123456', 'maruf123@gmail.com', 'client'),
(25, 'marufbsfdg454e', 'Asd1234f', 'maruf123@gmail.com', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `applications_ibfk_1` (`job_id`),
  ADD KEY `applications_ibfk_2` (`freelancer_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `freelancer`
--
ALTER TABLE `freelancer`
  ADD PRIMARY KEY (`freelancer_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `jobs_ibfk_1` (`client_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `messages_ibfk_1` (`sender_id`),
  ADD KEY `messages_ibfk_2` (`receiver_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD KEY `payments_ibfk_1` (`job_id`),
  ADD KEY `payments_ibfk_2` (`freelancer_id`),
  ADD KEY `payments_ibfk_3` (`client_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `freelancer`
--
ALTER TABLE `freelancer`
  MODIFY `freelancer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`freelancer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`freelancer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
