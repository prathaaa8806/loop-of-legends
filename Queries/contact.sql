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
(2, 'ShadowStrikerX', 'shadowgamerx@gmail.com', 'Loved the last battle sequence!', 'Yo Guardians of the Realm! Just wanted to say the last boss fight was absolutely insane 🔥🔥. Those power-up effects were next level! Hoping to see more villain reveals and maybe an arena mode? Keep the battles coming, you’ve got a fan for life!\r\n\r\n', 0, '2025-07-14 13:15:17', NULL),
(3, 'Lyria Nightfall', 'lyria.explorer@realmsgate.com', 'Feedback on Realm Environments', 'Hail, defenders of Loop of Legends! I recently ventured through the Frosted Peaks and Shadow Caves, and I must say — the environments were breathtaking. The attention to detail in the realms makes every adventure thrilling. Would love to see hidden side-quests or treasure hunts in future realms. Awaiting your magical reply. May the stars guide you!\r\n\r\n', 0, '2025-07-14 13:16:23', NULL),
(4, 'Dreadlord Varkon', 'varkon.reigns@darkspire.com', 'Challenge from the Shadows', 'Dark greetings, Realm Keepers. I am Dreadlord Varkon, conqueror of the Abyss Trials. Your heroes grow strong… but none shall stand against my rising forces. Prepare your defenses, for I intend to break your strongest quests. Release more boss battles… or face the wrath of the shadows! The darkness awaits your move…\r\n\r\n', 0, '2025-07-14 13:17:14', 'Your journey inspires the Realms!\r\nWe welcome your alliance with honor. 🤝\r\nSecret chambers shall soon open for warriors like you. 🗝️⚔️\r\nDrop your battle ideas — the Keepers await your wisdom. 🧠✨\r\nTogether, we rise.\r\nFor the Realm! For the Loop! 🌌👑');

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
