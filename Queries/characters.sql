-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2025 at 01:36 PM
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
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `power` varchar(255) NOT NULL,
  `role_or_goal` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` enum('hero','villain') NOT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `name`, `power`, `role_or_goal`, `image`, `type`, `is_deleted`, `created_at`) VALUES
(1, '🔥 Adalia Ember – Flame Knight', 'Commands fire, sword slashes burn through shadows.', 'Defender of Ember, frontline warrior against the cursed armies.', 'img/godess of flame.JPG', 'hero', 0, '2025-07-14 12:54:04'),
(2, '❄️ Wyllan Glacia – Frost Mage', 'Ice spells freeze enemies and slow down time itself.', 'Strategist of Glacia, freezes gateways to stall shadow invasions.', 'img/ice gode.JPG', 'hero', 0, '2025-07-14 12:54:04'),
(3, '🌿 Falencia Syliva – Forest Guardian', 'Controls nature, summons beasts and healing roots.', 'Protector of Syliva, heals warriors and commands beast alliances.', 'img/forest guardian.JPG', 'hero', 0, '2025-07-14 12:54:04'),
(4, '🕊️🗡️ Vellius Zephyrus – Skyblade', 'Aerial swordplay and wind manipulation.', 'Guardian of skies, patrols realms and slices shadow invasions mid-air.', 'img/Vellius Zephyrus.jpg', 'hero', 0, '2025-07-14 12:54:04'),
(5, '🗡️ Samurai – Feudal Avenger', 'Master of blade arts and shadow stealth.', 'Ancient warrior summoned from the past to eliminate cursed spirits.', 'img/samurai3.JPG', 'hero', 0, '2025-07-14 12:54:04'),
(6, '🎯 Elven Rage – Fury Archer', 'Precision arrows and nature’s wrath.', 'Forest\'s wrath unleashed, defender of balance and light.', 'img/fury archer.jpg', 'hero', 0, '2025-07-14 12:54:04'),
(7, '🕶️🗡️ Shadow – Eclipsion', 'Absorbs light, becomes stronger in darkness.', 'Seeks to merge all realms into the Eternal Eclipse.', 'img/zeph.JPG', 'villain', 0, '2025-07-14 12:54:04'),
(8, '🕸️👑 Night Widow – Lord of the Mindfang', 'Mind control, dream entrapment.', 'Controls leaders and twists fate silently.', 'img/night widow.JPG', 'villain', 0, '2025-07-14 12:54:04'),
(9, '🌌🕷️ Void Lord – The Cursebound Lord', 'Uses void rifts to summon corrupted beasts.', 'Collapse space-time and unleash a curse wave across realms.', 'img/void.JPG', 'villain', 0, '2025-07-14 12:54:04'),
(10, '🌑 Nyx – Shadow Witch', 'Hex spells and dark illusions.', 'Distract and confuse heroes through mental traps.', 'img/nyx.JPG', 'villain', 0, '2025-07-14 12:54:04'),
(11, '🕸️ Arachzor – Web Tyrant', 'Nightmare webs and venomous illusions.', 'Spread fear and poison across realm gates.', 'img/spidy.JPG', 'villain', 0, '2025-07-14 12:54:04'),
(12, '🔥 Lucenth – Fallen Lightbringer', 'Twisted radiant magic, illusion of hope before doom.', 'Convert light itself into destruction and betray celestial harmony.', 'img/light.JPG', 'villain', 0, '2025-07-14 12:54:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
