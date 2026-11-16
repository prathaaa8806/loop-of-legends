-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2025 at 01:28 PM
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
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` enum('kingdom','game') DEFAULT 'kingdom'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image_path`, `deleted`, `uploaded_at`, `category`) VALUES
(1, 'Ember – Fire warriors', 'img/ember.jpg', 0, '2025-07-14 12:50:21', 'kingdom'),
(2, 'Ember – Perspective', 'img/a_land_ruled_by_a_powerful_monarch.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(3, 'Glacia – Ice mages', 'img/glacia.jpg', 0, '2025-07-14 12:50:21', 'kingdom'),
(4, 'Glacia – Perspective', 'img/kingdom_of_glacia_land_of_of_ice.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(5, 'Syliva – Forest spirits', 'img/kingdom_of_syliva_with_forest_guardians_and.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(6, 'Syliva – Perspective', 'img/kingdom_syliva_gaurdians_of_forest_and_beast.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(7, 'Zephyrus – Shadow Blaze', 'img/umbra.jpg', 0, '2025-07-14 12:50:21', 'kingdom'),
(8, 'Zephyrus – Perspective', 'img/kingdom_of_umbra_with_shadows_and_secrets.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(9, 'Samurai – Kage', 'img/kingdom of samurai.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(10, 'Samurai – Perspective', 'img/kingdom of samurai2.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(11, 'Elven – Fury Warrior', 'img/kingdom of elven rage1.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(12, 'Elven – Perspective', 'img/kingdom of elven rage2.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(13, 'Map – Geography Of The Legends Of Enchanted Realms', 'img/legends_of_enchanted_realm_with_all_the.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(14, '4 Kingdoms – League', 'img/legends_of_enchanted_realm_with_kingdom_of.jpeg', 1, '2025-07-14 12:50:21', 'kingdom'),
(15, 'Scenic Beauty Of The Reaml', 'img/1755605072_scenic beauty.jpeg', 0, '2025-08-19 12:04:32', 'kingdom'),
(16, 'Mechanism Of All The Kingdoms', 'img/1755605294_mechanism .jpg', 0, '2025-08-19 12:08:14', 'kingdom'),
(17, 'Elven Rage', 'img/1755605968_eleven rage.jpg', 0, '2025-08-19 12:19:28', 'game'),
(18, 'Immortal Dark Slayer', 'img/1755606330_immortal-dark-slayer (1).jpg', 0, '2025-08-19 12:22:37', 'game'),
(19, 'Samurai Shadow', 'img/1755606600_samurai.jpg', 0, '2025-08-19 12:30:00', 'game'),
(20, 'Fray Fight', 'img/1755606754_fray-fight.PNG', 0, '2025-08-19 12:32:34', 'game'),
(21, 'Fantasy Madness', 'img/1755606969_fantasy-madness.PNG', 0, '2025-08-19 12:36:09', 'game'),
(22, 'Vampire Master', 'img/1755876426_vampire master.jpg', 0, '2025-08-22 15:27:06', 'game'),
(23, 'Legends Of Enchanted Reaml', 'img/1755876544_game.jpg', 0, '2025-08-22 15:29:04', 'game'),
(24, 'Rome Simulator', 'img/1755943878_Rome-Simulator.jpg', 0, '2025-08-23 10:11:18', 'game');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
