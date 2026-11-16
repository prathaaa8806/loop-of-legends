-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2025 at 01:37 PM
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
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `iframe_url` varchar(255) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `description`, `iframe_url`, `deleted`, `created_at`) VALUES
(1, ' 🥷🌑Samurai’s Shadow', 'Step into the shadows of feudal Japan. Fight with honor. Strike with precision.', 'https://www.crazygames.com/embed/samurai-s-shadow-qtn', 0, '2025-07-14 12:53:15'),
(2, ' 🧝‍♀️🔥Elven Rage', 'Unleash the fury of the elven warrior and restore the balance of nature!', 'https://www.crazygames.com/embed/elvenrage', 0, '2025-07-14 12:53:15'),
(3, '⚔️🔥Immortal-Dark-Slayer', 'A legendary tale of an eternal warrior, forged in darkness, who unleashes unstoppable wrath against all who dare defy him.', 'https://www.crazygames.com/embed/immortal-dark-slayer', 1, '2025-07-14 13:28:29'),
(4, '🏛️⚔️ Rome Simulator', 'Step into the ancient empire, roam grand arenas, and carve your legacy as a fearless warrior of Rome.', 'https://www.onlinegames.io/games/2021/unity/rome-simulator/index.html', 1, '2025-07-14 13:30:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
