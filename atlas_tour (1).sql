-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2026 at 08:36 AM
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
-- Database: `atlas_tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'dhrv', '$2y$10$nbVm6Phh.eCUPl2fPKKSyetRVGA6h6J.hVHkBVuqLwvW7UzsSsy9S');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `destination` varchar(200) NOT NULL,
  `travelers` int(5) DEFAULT 1,
  `travel_type` varchar(100) DEFAULT NULL,
  `special_requests` text DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `booked_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `full_name`, `email`, `phone`, `age`, `destination`, `travelers`, `travel_type`, `special_requests`, `payment_method`, `booked_at`) VALUES
(2, 3, 'Dhruvi Modha', 'modhadhruvi17@gmail.com', '7778843983', 17, 'Leh Ladakh', 1, 'Friends Group', 'no', 'UPI / QR Scan', '2026-05-01 13:24:30'),
(3, 4, 'daki hemali b', 'hemalidaki18@gmail.com', '8511482017', 21, 'Leh Ladakh', 2, 'Family Trip', 'no', 'Debit/Credit Card', '2026-05-07 04:38:39'),
(4, 3, 'Dhruvi Modha', 'modhadhruvi17@gmail.com', '7778843983', 12, 'Goa', 4, 'Family Trip', 'for now, no', 'Debit/Credit Card', '2026-06-10 02:19:51'),
(5, 3, 'Dhruvi Modha', 'modhadhruvi17@gmail.com', '7778843983', 12, 'Goa', 4, 'Family Trip', 'for now, no', 'Debit/Credit Card', '2026-06-10 02:20:01'),
(6, 3, 'Dhruvi Modha', 'modhadhruvi17@gmail.com', '7778843983', 12, 'Goa', 4, 'Family Trip', 'for now, no', 'Debit/Credit Card', '2026-06-10 02:22:17'),
(7, 3, 'Dhruvi Modha', 'modhadhruvi17@gmail.com', '7778843983', 12, 'Goa', 4, 'Family Trip', 'for now, no', 'Debit/Credit Card', '2026-06-10 02:28:46'),
(8, 3, 'Dhruvi Modha', 'modhadhruvi17@gmail.com', '7778843983', 12, 'Goa', 4, 'Family Trip', 'for now, no', 'Debit/Credit Card', '2026-06-10 02:31:19'),
(9, 3, 'Dhruvi Modha', 'modhadhruvi17@gmail.com', '7778843983', 12, 'Goa', 4, 'Family Trip', 'for now, no', 'Debit/Credit Card', '2026-06-10 02:31:33'),
(10, 3, 'Dhruvi Modha', 'modhadhruvi17@gmail.com', '7778843983', 12, 'Goa', 4, 'Family Trip', 'for now, no', 'Debit/Credit Card', '2026-06-10 02:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` varchar(100) NOT NULL,
  `photo_url` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `duration`, `description`, `price`, `photo_url`, `created_at`) VALUES
(1, 'Goa Beach Holiday', '4 Days / 3 Nights', 'Sun, sand, and seafood - explore the vibrant beaches and nightlife of Goa.', 'Rs.12,999 per person', 'photo/goa.jpg', '2026-04-25 09:44:46'),
(2, 'Hampi Heritage Tour', '3 Days / 2 Nights', 'Step back in time and explore the UNESCO World Heritage ruins of Hampi.', 'Rs.8,499 per person', 'photo/hampi.jpg', '2026-04-25 09:44:46'),
(3, 'Kerala Backwaters Bliss', '5 Days / 4 Nights', 'Cruise through serene backwaters, lush tea gardens, and pristine beaches of Gods Own Country.', 'Rs.18,999 per person', 'photo/kerala.jpg', '2026-04-25 09:44:46'),
(4, 'Nepal Adventure Trek', '7 Days / 6 Nights', 'Trek through the breathtaking Himalayas and experience the culture of Nepal.', 'Rs.22,499 per person', 'photo/nepal.jpg', '2026-04-25 09:44:46'),
(6, 'Manali Snow Escape', '4 Days / 3 Nights', 'Enjoy snow-capped peaks, adventure sports, and cozy stays in beautiful Manali.', 'Rs.14,499 per person', 'photo/manali.jpg', '2026-04-25 09:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `password`, `location`, `created_at`) VALUES
(3, 'Dhruvi Modha', 'modhadhruvi17@gmail.com', '7778843983', '123', NULL, '2026-05-01 13:23:26'),
(4, 'daki hemali b', 'hemalidaki18@gmail.com', '8511482017', 'daki@123', NULL, '2026-05-07 04:37:11'),
(5, 'Janvi Modha', 'janvi@gmail.com', '6356985744', 'janvi', NULL, '2026-06-10 06:27:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_booking_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
