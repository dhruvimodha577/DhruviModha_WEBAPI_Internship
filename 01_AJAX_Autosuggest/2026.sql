-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2026 at 04:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2026`
--

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE `internship` (
  `stud_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `mode` enum('online','onsite','hybrid') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`stud_name`, `email`, `contact`, `mode`) VALUES
('Dhruvi Modha', 'dhruvi@gmail.com', '9876543210', 'online'),
('Rahul Patel', 'rahul@gmail.com', '9123456780', 'onsite'),
('Priya Shah', 'priya@gmail.com', '9988776655', 'hybrid'),
('Meet Joshi', 'meet@gmail.com', '9012345678', 'online'),
('Krisha Mehta', 'krisha@gmail.com', '9871234560', 'onsite'),
('Yash Parmar', 'yash@gmail.com', '9988123456', 'hybrid'),
('Riya Desai', 'riya@gmail.com', '9876541230', 'online'),
('Harsh Vora', 'harsh@gmail.com', '9090909090', 'onsite'),
('Neha Trivedi', 'neha@gmail.com', '9879879870', 'hybrid'),
('Jay Patel', 'jay@gmail.com', '9019019019', 'online');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
