-- Loop of Legends Complete Database Dump
-- Database: loop_of_legends

CREATE DATABASE IF NOT EXISTS `loop_of_legends`;
USE `loop_of_legends`;

-- =============================================
-- Table: admin_users.sql
-- =============================================

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
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password_hash`, `created_at`) VALUES
(1, 'legends', '6161b2838ffa6ce17b84db3b45b4f8437855ecf43e75de2d1ad0008eaae91aa0', '2025-07-14 13:31:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- =============================================
-- Table: characters.sql
-- =============================================

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
(1, 'ðŸ”¥ Adalia Ember â€“ Flame Knight', 'Commands fire, sword slashes burn through shadows.', 'Defender of Ember, frontline warrior against the cursed armies.', 'img/godess of flame.JPG', 'hero', 0, '2025-07-14 12:54:04'),
(2, 'â„ï¸ Wyllan Glacia â€“ Frost Mage', 'Ice spells freeze enemies and slow down time itself.', 'Strategist of Glacia, freezes gateways to stall shadow invasions.', 'img/ice gode.JPG', 'hero', 0, '2025-07-14 12:54:04'),
(3, 'ðŸŒ¿ Falencia Syliva â€“ Forest Guardian', 'Controls nature, summons beasts and healing roots.', 'Protector of Syliva, heals warriors and commands beast alliances.', 'img/forest guardian.JPG', 'hero', 0, '2025-07-14 12:54:04'),
(4, 'ðŸ•Šï¸ðŸ—¡ï¸ Vellius Zephyrus â€“ Skyblade', 'Aerial swordplay and wind manipulation.', 'Guardian of skies, patrols realms and slices shadow invasions mid-air.', 'img/Vellius Zephyrus.jpg', 'hero', 0, '2025-07-14 12:54:04'),
(5, 'ðŸ—¡ï¸ Samurai â€“ Feudal Avenger', 'Master of blade arts and shadow stealth.', 'Ancient warrior summoned from the past to eliminate cursed spirits.', 'img/samurai3.JPG', 'hero', 0, '2025-07-14 12:54:04'),
(6, 'ðŸŽ¯ Elven Rage â€“ Fury Archer', 'Precision arrows and natureâ€™s wrath.', 'Forest\'s wrath unleashed, defender of balance and light.', 'img/fury archer.jpg', 'hero', 0, '2025-07-14 12:54:04'),
(7, 'ðŸ•¶ï¸ðŸ—¡ï¸ Shadow â€“ Eclipsion', 'Absorbs light, becomes stronger in darkness.', 'Seeks to merge all realms into the Eternal Eclipse.', 'img/zeph.JPG', 'villain', 0, '2025-07-14 12:54:04'),
(8, 'ðŸ•¸ï¸ðŸ‘‘ Night Widow â€“ Lord of the Mindfang', 'Mind control, dream entrapment.', 'Controls leaders and twists fate silently.', 'img/night widow.JPG', 'villain', 0, '2025-07-14 12:54:04'),
(9, 'ðŸŒŒðŸ•·ï¸ Void Lord â€“ The Cursebound Lord', 'Uses void rifts to summon corrupted beasts.', 'Collapse space-time and unleash a curse wave across realms.', 'img/void.JPG', 'villain', 0, '2025-07-14 12:54:04'),
(10, 'ðŸŒ‘ Nyx â€“ Shadow Witch', 'Hex spells and dark illusions.', 'Distract and confuse heroes through mental traps.', 'img/nyx.JPG', 'villain', 0, '2025-07-14 12:54:04'),
(11, 'ðŸ•¸ï¸ Arachzor â€“ Web Tyrant', 'Nightmare webs and venomous illusions.', 'Spread fear and poison across realm gates.', 'img/spidy.JPG', 'villain', 0, '2025-07-14 12:54:04'),
(12, 'ðŸ”¥ Lucenth â€“ Fallen Lightbringer', 'Twisted radiant magic, illusion of hope before doom.', 'Convert light itself into destruction and betray celestial harmony.', 'img/light.JPG', 'villain', 0, '2025-07-14 12:54:04');

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


-- =============================================
-- Table: contact.sql
-- =============================================

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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `your_name` varchar(100) NOT NULL,
  `your_email` varchar(100) NOT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `your_message` text NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_reply` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `your_name`, `your_email`, `subject`, `your_message`, `deleted`, `created_at`, `admin_reply`) VALUES
(1, 'Kaelion Stormblade', 'kaelion@warriorrealm.com', 'Alliance Proposal for Realm Expansion', 'Greetings to the Keepers of Loop of Legends! I, Kaelion of the Emberlands, wish to form an alliance with your mighty realm. I have conquered several quests and seek to unlock secret chambers in upcoming episodes. Also, I have valuable suggestions regarding boss battles and realm quests. Awaiting your response, fellow warriors. For the Realm!\r\n\r\n', 0, '2025-07-14 13:14:19', NULL),
(2, 'ShadowStrikerX', 'shadowgamerx@gmail.com', 'Loved the last battle sequence!', 'Yo Guardians of the Realm! Just wanted to say the last boss fight was absolutely insane ðŸ”¥ðŸ”¥. Those power-up effects were next level! Hoping to see more villain reveals and maybe an arena mode? Keep the battles coming, youâ€™ve got a fan for life!\r\n\r\n', 0, '2025-07-14 13:15:17', NULL),
(3, 'Lyria Nightfall', 'lyria.explorer@realmsgate.com', 'Feedback on Realm Environments', 'Hail, defenders of Loop of Legends! I recently ventured through the Frosted Peaks and Shadow Caves, and I must say â€” the environments were breathtaking. The attention to detail in the realms makes every adventure thrilling. Would love to see hidden side-quests or treasure hunts in future realms. Awaiting your magical reply. May the stars guide you!\r\n\r\n', 0, '2025-07-14 13:16:23', NULL),
(4, 'Dreadlord Varkon', 'varkon.reigns@darkspire.com', 'Challenge from the Shadows', 'Dark greetings, Realm Keepers. I am Dreadlord Varkon, conqueror of the Abyss Trials. Your heroes grow strongâ€¦ but none shall stand against my rising forces. Prepare your defenses, for I intend to break your strongest quests. Release more boss battlesâ€¦ or face the wrath of the shadows! The darkness awaits your moveâ€¦\r\n\r\n', 0, '2025-07-14 13:17:14', 'Your journey inspires the Realms!\r\nWe welcome your alliance with honor. ðŸ¤\r\nSecret chambers shall soon open for warriors like you. ðŸ—ï¸âš”ï¸\r\nDrop your battle ideas â€” the Keepers await your wisdom. ðŸ§ âœ¨\r\nTogether, we rise.\r\nFor the Realm! For the Loop! ðŸŒŒðŸ‘‘');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- =============================================
-- Table: episodes.sql
-- =============================================

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
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `bg_image` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- =============================================
-- Table: gallery.sql
-- =============================================

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
(1, 'Ember â€“ Fire warriors', 'img/ember.jpg', 0, '2025-07-14 12:50:21', 'kingdom'),
(2, 'Ember â€“ Perspective', 'img/a_land_ruled_by_a_powerful_monarch.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(3, 'Glacia â€“ Ice mages', 'img/glacia.jpg', 0, '2025-07-14 12:50:21', 'kingdom'),
(4, 'Glacia â€“ Perspective', 'img/kingdom_of_glacia_land_of_of_ice.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(5, 'Syliva â€“ Forest spirits', 'img/kingdom_of_syliva_with_forest_guardians_and.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(6, 'Syliva â€“ Perspective', 'img/kingdom_syliva_gaurdians_of_forest_and_beast.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(7, 'Zephyrus â€“ Shadow Blaze', 'img/umbra.jpg', 0, '2025-07-14 12:50:21', 'kingdom'),
(8, 'Zephyrus â€“ Perspective', 'img/kingdom_of_umbra_with_shadows_and_secrets.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(9, 'Samurai â€“ Kage', 'img/kingdom of samurai.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(10, 'Samurai â€“ Perspective', 'img/kingdom of samurai2.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(11, 'Elven â€“ Fury Warrior', 'img/kingdom of elven rage1.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(12, 'Elven â€“ Perspective', 'img/kingdom of elven rage2.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(13, 'Map â€“ Geography Of The Legends Of Enchanted Realms', 'img/legends_of_enchanted_realm_with_all_the.jpeg', 0, '2025-07-14 12:50:21', 'kingdom'),
(14, '4 Kingdoms â€“ League', 'img/legends_of_enchanted_realm_with_kingdom_of.jpeg', 1, '2025-07-14 12:50:21', 'kingdom'),
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


-- =============================================
-- Table: games.sql
-- =============================================

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
(1, ' ðŸ¥·ðŸŒ‘Samuraiâ€™s Shadow', 'Step into the shadows of feudal Japan. Fight with honor. Strike with precision.', 'https://www.crazygames.com/embed/samurai-s-shadow-qtn', 0, '2025-07-14 12:53:15'),
(2, ' ðŸ§â€â™€ï¸ðŸ”¥Elven Rage', 'Unleash the fury of the elven warrior and restore the balance of nature!', 'https://www.crazygames.com/embed/elvenrage', 0, '2025-07-14 12:53:15'),
(3, 'âš”ï¸ðŸ”¥Immortal-Dark-Slayer', 'A legendary tale of an eternal warrior, forged in darkness, who unleashes unstoppable wrath against all who dare defy him.', 'https://www.crazygames.com/embed/immortal-dark-slayer', 1, '2025-07-14 13:28:29'),
(4, 'ðŸ›ï¸âš”ï¸ Rome Simulator', 'Step into the ancient empire, roam grand arenas, and carve your legacy as a fearless warrior of Rome.', 'https://www.onlinegames.io/games/2021/unity/rome-simulator/index.html', 1, '2025-07-14 13:30:04');

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


-- =============================================
-- Table: reviews.sql
-- =============================================

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
(1, 'pratha  more', 5, 'Best game experience Iâ€™ve had in a while!', 1, '2025-07-14 13:02:37', ''),
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


-- =============================================
-- Table: submit_trailer_review.sql
-- =============================================

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
-- Table structure for table `submit_trailer_review`
--

CREATE TABLE `submit_trailer_review` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `your_message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `admin_reply` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submit_trailer_review`
--

INSERT INTO `submit_trailer_review` (`id`, `user_name`, `rating`, `your_message`, `created_at`, `is_deleted`, `admin_reply`) VALUES
(1, 'pratha', 4, 'wow what preview and you improve more in the upcoming game', '2025-07-29 18:19:57', 0, 'First of all thankyou so much for your response. And yes ofc we\'ll surely do'),
(2, 'anan', 5, 'wow noiceee trailer waiting for the game', '2025-07-30 07:12:33', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `submit_trailer_review`
--
ALTER TABLE `submit_trailer_review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `submit_trailer_review`
--
ALTER TABLE `submit_trailer_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- =============================================
-- Table: support_questions.sql
-- =============================================

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2025 at 01:38 PM
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
-- Table structure for table `support_questions`
--

CREATE TABLE `support_questions` (
  `id` int(11) NOT NULL,
  `your_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reply` text DEFAULT NULL,
  `replied_at` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_questions`
--

INSERT INTO `support_questions` (`id`, `your_name`, `email`, `question`, `created_at`, `reply`, `replied_at`, `deleted`) VALUES
(1, 'Anan', 'anan28@gmail.com', 'Will there be new characters or realms in the next update?', '2025-07-30 09:02:36', 'Yes Ofc we\'ll surely add new characters or realms in the next update', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `support_questions`
--
ALTER TABLE `support_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `support_questions`
--
ALTER TABLE `support_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


