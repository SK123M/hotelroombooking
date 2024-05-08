-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 06:00 PM
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
-- Database: `tourism_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_list`
--

CREATE TABLE `book_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending,1=confirm, 2=cancelled\r\n',
  `roomType` varchar(255) NOT NULL,
  `schedule` date DEFAULT NULL,
  `checkout` date NOT NULL,
  `amount` varchar(255) NOT NULL,
  `numStay` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_list`
--

INSERT INTO `book_list` (`id`, `user_id`, `package_id`, `status`, `roomType`, `schedule`, `checkout`, `amount`, `numStay`, `date_created`) VALUES
(2, 4, 8, 3, '', '2021-06-21', '0000-00-00', '', '', '2021-06-19 08:37:59'),
(3, 5, 8, 3, '', '2021-06-18', '0000-00-00', '', '', '2021-06-19 11:51:50'),
(11, 7, 9, 3, 'luxury', '2023-12-12', '2023-12-14', '7000', '2', '2023-12-11 12:37:44'),
(12, 1, 9, 3, 'luxury', '2023-12-11', '2023-12-27', '56000', '16', '2023-12-11 12:46:27'),
(13, 7, 10, 0, 'luxury', '2023-12-14', '2023-12-16', '7000', '2', '2023-12-13 10:37:05'),
(14, 7, 12, 3, 'single', '2023-12-15', '2023-12-15', '0', '0', '2023-12-14 15:16:27'),
(15, 7, 12, 0, 'luxury', '2023-12-15', '2023-12-23', '28000', '8', '2023-12-14 15:16:55'),
(16, 7, 12, 3, 'single', '2024-02-04', '2024-02-06', '4000', '2', '2024-02-03 10:05:20'),
(17, 1, 11, 3, 'double', '2024-02-04', '2024-02-05', '2700', '1', '2024-02-03 10:08:50'),
(18, 7, 10, 3, 'luxury', '2024-02-04', '2024-02-04', '0', '0', '2024-02-03 17:00:37'),
(19, 7, 12, 0, 'luxury', '2024-03-06', '2024-03-06', '0', '0', '2024-03-04 14:52:39'),
(20, 7, 12, 0, 'luxury', '2024-03-06', '2024-03-08', '7000', '2', '2024-03-04 14:53:27'),
(21, 7, 12, 0, 'single', '2024-03-06', '2024-03-08', '4000', '2', '2024-03-04 14:54:28'),
(22, 7, 10, 0, 'luxury', '2024-03-27', '2024-03-28', '3500', '1', '2024-03-26 12:18:58'),
(23, 9, 9, 3, 'luxury', '2024-03-27', '2024-03-31', '14000', '4', '2024-03-26 12:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(30) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `subject`, `message`, `status`, `date_created`) VALUES
(6, 'asdasd', 'asdasd@asdasd.com', 'asdasd', 'asdasd', 1, '2021-06-19 10:19:27'),
(9, 'Mohammad Hafiz', '192011153.sse@saveetha.com', 'ntg', 'hi', 1, '2023-12-11 12:13:57'),
(10, 'Mohammad Hafiz', '192011153.sse@saveetha.com', 'ntg', 'hi', 1, '2023-12-11 12:37:10'),
(11, 'Mohammad Hafiz', '192011153.sse@saveetha.com', 'ntg', 'hi', 1, '2024-02-03 10:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(30) NOT NULL,
  `title` text DEFAULT NULL,
  `tour_location` text DEFAULT NULL,
  `cost` double NOT NULL,
  `description` text DEFAULT NULL,
  `upload_path` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 =active ,2 = Inactive',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `tour_location`, `cost`, `description`, `upload_path`, `status`, `date_created`) VALUES
(9, 'Luxury Room', '', 3500, '&lt;p&gt;Lavish bathrooms with upscale features such as heated floors and soaking tubs. High-end, lush linens and towels. Deluxe pillows and mattresses so your sleeping hours are as blissful as your waking ones.&lt;br&gt;&lt;/p&gt;', 'uploads/package_9', 0, '2023-12-02 11:10:08'),
(10, 'Deluxe Room', '', 3000, '&lt;p&gt;Deluxe rooms are&amp;nbsp;usually larger than their standard counterparts, may include a bathtub and a shower in the bathroom, and include more high-end amenities.&lt;br&gt;&lt;/p&gt;', 'uploads/package_10', 1, '2023-12-02 11:12:04'),
(11, 'Double Room', 'Bangalore', 2700, '&lt;p&gt;A double room is&amp;nbsp;a hotel room with a double bed that can accommodate two people. Double rooms come in different sizes, and the room size can affect the room rate. A double room can be a good option for couples or solo travelers who want more space than a single room&lt;br&gt;&lt;/p&gt;', 'uploads/package_11', 1, '2023-12-02 11:14:32'),
(12, 'Single Room', 'Chennai', 1999, '&lt;p&gt;A single hotel room is&amp;nbsp;a hotel room designed for one guest with a single bed. Single rooms are ideal for solo travelers who want a private and comfortable place to stay.&lt;br&gt;&lt;/p&gt;', 'uploads/package_12', 1, '2023-12-02 11:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `rate_review`
--

CREATE TABLE `rate_review` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `rate` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate_review`
--

INSERT INTO `rate_review` (`id`, `user_id`, `package_id`, `rate`, `review`, `date_created`) VALUES
(3, 5, 8, 5, '<p>Sample</p>', '2021-06-19 11:53:16'),
(4, 5, 8, 3, '&lt;p&gt;Sample feedback only&lt;/p&gt;', '2021-06-19 13:49:26'),
(5, 6, 9, 4, '&lt;p&gt;devipriya&lt;/p&gt;', '2023-12-02 11:50:01'),
(6, 9, 9, 4, '&lt;p&gt;hi&lt;/p&gt;', '2024-03-26 12:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Blue Door'),
(6, 'short_name', 'Admin'),
(11, 'logo', 'uploads/1701508860_profile-removebg-preview.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1701508860_booking.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Mohammad', 'Hafiz', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1620201300_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2023-12-11 11:24:24'),
(4, 'John', 'Smith', 'jsmith', '1254737c076cf867dc53d60a0364f38e', NULL, NULL, 0, '2021-06-19 08:36:09', '2021-06-19 10:53:12'),
(5, 'Claire', 'Blake', 'cblake', '4744ddea876b11dcb1d169fadf494418', NULL, NULL, 0, '2021-06-19 10:01:51', '2021-06-19 12:03:23'),
(6, 'Devi', 'priya', 'Devipriya', '202cb962ac59075b964b07152d234b70', NULL, NULL, 0, '2023-12-02 11:03:09', NULL),
(7, 'Mohammad', 'Hafiz', 'mohammad', '202cb962ac59075b964b07152d234b70', NULL, NULL, 0, '2023-12-11 08:36:33', NULL),
(8, 'mohammad', 'mamu', 'mohammad mamu', '202cb962ac59075b964b07152d234b70', NULL, NULL, 0, '2023-12-11 08:59:17', NULL),
(9, 'len', 'sam', 'len', '202cb962ac59075b964b07152d234b70', NULL, NULL, 0, '2024-03-26 12:23:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_list`
--
ALTER TABLE `book_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_review`
--
ALTER TABLE `rate_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
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
-- AUTO_INCREMENT for table `book_list`
--
ALTER TABLE `book_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rate_review`
--
ALTER TABLE `rate_review`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
