-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 04:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `name`, `value`, `modified_at`, `created_at`) VALUES
(1, 'institute_name', 'Sunsea Technical Training Centre', '2024-11-13 20:47:45', '2024-11-13 20:14:14'),
(2, 'institute_code', '1167', '2024-11-13 20:47:45', '2024-11-13 20:14:55'),
(3, 'institute_reg_no', 'T/D/017004', '2024-11-13 20:47:45', '2024-11-13 20:21:31'),
(4, 'qr_code', '67356c8025847.png', '2024-11-14 03:20:32', '2024-11-13 20:28:46'),
(5, 'chief_sign', '67356e0c8d1d1.png', '2024-11-14 03:27:08', '2024-11-14 03:22:42'),
(6, 'manager_sign', '67356e0c902d6.png', '2024-11-14 03:27:08', '2024-11-14 03:22:42'),
(7, 'license_no', 'C-170272', '2024-11-15 15:18:59', '2024-11-15 14:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'student',
  `status` int(1) NOT NULL DEFAULT 1,
  `full_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `address` text DEFAULT NULL,
  `course_name` varchar(255) NOT NULL,
  `institute_name` varchar(255) NOT NULL,
  `institute_code` varchar(50) DEFAULT NULL,
  `serial_no` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `test_date` date DEFAULT NULL,
  `course_issue_date` date DEFAULT NULL,
  `test_issue_date` date DEFAULT NULL,
  `session_start` date DEFAULT NULL,
  `session_end` date DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `written_mark` varchar(255) NOT NULL,
  `practical_mark` varchar(255) NOT NULL,
  `viva_mark` varchar(255) NOT NULL,
  `total_mark` varchar(255) NOT NULL,
  `recommendation` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `role`, `status`, `full_name`, `father_name`, `mother_name`, `dob`, `email`, `phone`, `gender`, `address`, `course_name`, `institute_name`, `institute_code`, `serial_no`, `roll_no`, `reg_no`, `test_date`, `course_issue_date`, `test_issue_date`, `session_start`, `session_end`, `grade`, `written_mark`, `practical_mark`, `viva_mark`, `total_mark`, `recommendation`, `photo`, `created_at`, `modified_at`) VALUES
(4, 'student', 1, 'Md Omar Faruk', 'Shofi Uddin', 'Khadiza Begum', '2024-11-13', 'ofaruk936@gmail.com', '01684285963', 'male', 'Demra', 'Full Stack Web Developer', 'Sunsea Technical Training Center', '1168', '15', '15', '25435365', '2024-10-29', '2024-11-14', NULL, '2024-11-01', '2024-11-30', 'A+', '50', '30', '20', '100', 'FIT', '67360f39edc7e.jpg', '2024-11-13 19:40:29', '2024-11-15 13:24:16'),
(6, 'student', 1, 'Md Omar Faruk', 'Shofi Uddin', 'Khadiza Begum', '2024-11-14', 'faruk@gmail.com', '01684285963', 'male', 'Demra', 'Full Stack Web Developer', 'Shikhbe Shobai', '1167', '434324', '12', '25435363', NULL, '2024-11-18', NULL, '2024-11-05', '2024-11-30', 'A+', '50', '30', '20', '100', 'FIT', '1659029552_a.jpg', '2024-11-14 15:19:35', '2024-11-14 15:19:35'),
(7, 'student', 1, 'Afsana Mim', 'Shofi Uddin', 'Khadiza Begum', '2024-11-14', 'omar@gmail.com', '01684285963', 'male', 'demra', 'Full Stack Web Developer', 'Shikhbe Shobai', '1168', '124', '125', '25435365', '2024-11-05', '2024-11-27', NULL, '2024-11-11', '2024-11-30', 'B', '50', '30', '20', '100', 'FIT', '518371979_460100906_122175398066225618_507882286384557145_n.jpg', '2024-11-14 16:57:31', '2024-11-15 12:54:12'),
(8, 'student', 1, 'Samiul Islam', 'Shahid', 'Mehran', '2003-11-12', 'samiul1@gmail.com', '01684285963', 'male', 'Dhaka', 'WordPress Developer', 'Shikhbe Shobai', '1168', '1233', '1224', '2543536334', '2024-11-01', '2024-11-15', NULL, '2024-11-01', '2024-11-15', 'A+', '50', '40', '10', '100', 'FIT', '1125725043_young-adult-enjoying-virtual-date.jpg', '2024-11-15 14:00:53', '2024-11-15 14:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_img` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_phone` int(11) NOT NULL,
  `u_address` varchar(255) NOT NULL,
  `u_gender` varchar(12) NOT NULL,
  `u_dob` date NOT NULL,
  `u_biodata` text NOT NULL,
  `u_role` int(1) NOT NULL,
  `u_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_img`, `u_email`, `u_pass`, `u_phone`, `u_address`, `u_gender`, `u_dob`, `u_biodata`, `u_role`, `u_status`) VALUES
(66, 'Sunsea Overseas Training Center', '1851462398logo.jpeg', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 160000000, 'Dhaka', '', '1999-09-01', '', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
