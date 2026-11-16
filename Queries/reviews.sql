-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2025 at 12:15 PM
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
-- Database: `loop_of_legends`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `your_message` text NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_name`, `rating`, `your_message`, `deleted`, `created_at`, `admin_reply`) VALUES
(1, 'pratha  more', 5, 'Best game experience I’ve had in a while!', 1, '2025-07-14 13:02:37', ''),
(2, 'Pratha More', 5, 'Perfect fantasy vibes, totally addictive.', 0, '2025-07-14 13:03:01', ''),
(3, 'Ananya', 4, 'Loved the characters, especially the villains!', 0, '2025-07-14 13:03:59', ''),
(4, 'Harsh', 4, 'Epic battles and amazing storyline!', 0, '2025-07-14 13:10:05', ''),
(5, 'Rohit', 3, 'NICE BT..... LOGIN PLZ', 0, '2025-07-22 09:22:01', ''),
(6, 'pratha', 5, 'very well done! I really appreciate your dedication towards this website may u grow more in this field', 1, '2025-07-23 06:09:08', ''),
(7, 'Shriya More', 5, 'very well done!i really appreciate your dedication towards this website may you rise in your field.', 0, '2025-07-23 06:15:07', 'thankyouu soo muchhh'),
(8, 'pratha', 3, 'noiceeee', 1, '2025-07-23 06:29:55', ''),
(9, 'pratha', 4, 'wowwwww', 1, '2025-07-23 06:32:18', ''),
(10, 'pratha', 4, 'wowwww', 1, '2025-07-23 06:44:15', ''),
(11, 'pratha', 4, 'noicceeee', 1, '2025-07-23 06:46:31', ''),
(12, 'pratha', 3, 'noiceee', 1, '2025-07-23 06:47:17', ''),
(13, 'pratha', 4, 'wowowow', 1, '2025-07-23 09:52:16', ''),
(14, 'pratha', 4, 'good', 1, '2025-07-23 09:59:26', ''),
(15, 'pratha', 4, 'wowowowo', 1, '2025-07-23 10:16:20', ''),
(16, 'pratha', 4, 'wowooww', 1, '2025-07-23 13:27:21', ''),
(17, 'pratha', 4, 'wowooww', 1, '2025-07-23 13:27:59', ''),
(18, 'pratha', 4, 'wowooww', 1, '2025-07-23 13:28:02', ''),
(19, 'pratha', 4, 'wowooww', 1, '2025-07-23 13:30:53', ''),
(20, '', 4, 'noiceee', 1, '2025-07-23 13:35:18', ''),
(21, 'admin', 2, 'can do better', 1, '2025-07-24 06:01:20', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
