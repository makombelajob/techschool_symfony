-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Jun 09, 2025 at 09:26 AM
-- Server version: 8.0.42
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `level`) VALUES
(1, '6e A', 6),
(2, '5e B', 5),
(3, '4e C', 4),
(4, '3e A', 3),
(5, '3e B', 3);

-- --------------------------------------------------------

--
-- Table structure for table `classes_users`
--

CREATE TABLE `classes_users` (
  `classes_id` int NOT NULL,
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes_users`
--

INSERT INTO `classes_users` (`classes_id`, `users_id`) VALUES
(4, 6),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `subjects_id` int NOT NULL,
  `classes_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coefficient` double NOT NULL,
  `day` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `started_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `end_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `room` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `subjects_id`, `classes_id`, `name`, `coefficient`, `day`, `started_at`, `end_at`, `room`) VALUES
(1, 1, 4, 'Introduction à kali linux', 2.5, 'Lundi 11 mai', '2025-06-09 09:21:14', '2025-06-09 09:21:14', '6B');

-- --------------------------------------------------------

--
-- Table structure for table `courses_users`
--

CREATE TABLE `courses_users` (
  `courses_id` int NOT NULL,
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses_users`
--

INSERT INTO `courses_users` (`courses_id`, `users_id`) VALUES
(1, 2),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250607084142', '2025-06-09 09:20:03', 2730),
('DoctrineMigrations\\Version20250607085601', '2025-06-09 09:20:06', 231),
('DoctrineMigrations\\Version20250607092914', '2025-06-09 09:20:06', 150),
('DoctrineMigrations\\Version20250607093448', '2025-06-09 09:20:07', 41),
('DoctrineMigrations\\Version20250607152635', '2025-06-09 09:20:07', 18);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ressources`
--

CREATE TABLE `ressources` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ressources`
--

INSERT INTO `ressources` (`id`, `name`, `file_type`, `uploaded_at`) VALUES
(1, 'Base de Linux', 'pdf', '2025-06-09 09:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `ressources_courses`
--

CREATE TABLE `ressources_courses` (
  `ressources_id` int NOT NULL,
  `courses_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ressources_courses`
--

INSERT INTO `ressources_courses` (`ressources_id`, `courses_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int NOT NULL,
  `courses_id` int NOT NULL,
  `users_id` int NOT NULL,
  `note` int NOT NULL,
  `monthly` int NOT NULL,
  `yearly` int NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `courses_id`, `users_id`, `note`, `monthly`, `yearly`, `remark`) VALUES
(1, 1, 6, 7, 7, 7, 'Fait encore plus des efforts pour arrivé au bon résultat.');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(1, 'Informatique'),
(2, 'Electronique'),
(3, 'Mathematique'),
(4, 'Culture generale');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)',
  `lastlogin` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`, `lastname`, `firstname`, `register_at`, `lastlogin`) VALUES
(1, 'kverdier@legall.fr', '[\"ROLE_USER\"]', '$2y$13$bmY8KASvWNhzPnOlPTCuT.CDsMfFZ5f6rG1jVeFIHf.Qk6sALgcE2', 'Colas', 'Véronique', '2024-09-28 09:20:25', NULL),
(2, 'brigitte.lambert@gmail.com', '[\"ROLE_USER\"]', '$2y$13$FySnr7wVXkSunidv3Vi7JeGm23.tmgr4P8MO.X/xJigFHYsz4JiUC', 'Tanguy', 'Adélaïde', '2025-01-12 17:03:36', NULL),
(3, 'mcohen@barre.fr', '[\"ROLE_USER\"]', '$2y$13$bQcKeNejPZ5hSfDBOuj0R.cwN8Ox51KHTd.4Ef4rwdFKoHQyYbRyy', 'Guilbert', 'Nathalie', '2024-07-23 01:11:25', NULL),
(4, 'ines68@laposte.net', '[\"ROLE_USER\"]', '$2y$13$n189ldA8Wug70wYtEmUjE.fiGs3sP5mKArDFVA3xXtSzA4OK5OKoy', 'Gerard', 'Guillaume', '2025-02-14 18:03:25', NULL),
(5, 'qdeoliveira@dbmail.com', '[\"ROLE_USER\"]', '$2y$13$flnnyETskLX5nQp6FFppieAf84Q9MUnS6LXFDfq0qzctup8aY804y', 'Gaillard', 'Susan', '2024-08-28 21:30:30', NULL),
(6, 'elise.gaudin@dbmail.com', '[\"ROLE_USER\"]', '$2y$13$B8kxaKs6QOsHi.lKF0Ivj.hP2LV1LC3gUsWWYybJR.PMQfVOJd6YW', 'Marques', 'Michèle', '2025-03-24 15:49:36', NULL),
(7, 'yhamon@fouquet.com', '[\"ROLE_USER\"]', '$2y$13$8iJ5HAZTZuqcZRyAK7DVRuEAGMfmkSs7CqBI3yHgt2O/dOEF0uQr.', 'Picard', 'René', '2025-04-20 07:31:38', NULL),
(8, 'njourdan@morin.com', '[\"ROLE_USER\"]', '$2y$13$kUn83GOG7HpBkwWUZ4cBO.UrBWnQG8IClTKOX38xmkJ31pjfix25y', 'Gros', 'Alain', '2024-09-07 21:07:57', NULL),
(9, 'patrick.goncalves@loiseau.fr', '[\"ROLE_USER\"]', '$2y$13$KqG7XzrVkGW09I0MmjJILOYP8krzrxN0.51Vck8vO1XYC1oeGEUIy', 'Gosselin', 'Théophile', '2025-01-27 09:34:48', NULL),
(10, 'auguste06@carre.com', '[\"ROLE_USER\"]', '$2y$13$yYCCcC346vkLlhWC4HA1UuTSTV92rA0RhzZuTajHaSoQ56DxQS73S', 'Vallee', 'Virginie', '2025-03-03 23:27:54', NULL),
(11, 'qrousset@live.com', '[\"ROLE_USER\"]', '$2y$13$.zIPDMhGCA4XvDtA1y/.yONcwkASEkkvFF2dJWwUe5o.zol/2q94O', 'Guillot', 'Olivie', '2024-07-29 19:13:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes_users`
--
ALTER TABLE `classes_users`
  ADD PRIMARY KEY (`classes_id`,`users_id`),
  ADD KEY `IDX_BEEDD5579E225B24` (`classes_id`),
  ADD KEY `IDX_BEEDD55767B3B43D` (`users_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A9A55A4C94AF957A` (`subjects_id`),
  ADD KEY `IDX_A9A55A4C9E225B24` (`classes_id`);

--
-- Indexes for table `courses_users`
--
ALTER TABLE `courses_users`
  ADD PRIMARY KEY (`courses_id`,`users_id`),
  ADD KEY `IDX_389EDBD0F9295384` (`courses_id`),
  ADD KEY `IDX_389EDBD067B3B43D` (`users_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `ressources`
--
ALTER TABLE `ressources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ressources_courses`
--
ALTER TABLE `ressources_courses`
  ADD PRIMARY KEY (`ressources_id`,`courses_id`),
  ADD KEY `IDX_F799735C3C361826` (`ressources_id`),
  ADD KEY `IDX_F799735CF9295384` (`courses_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9FA3E414F9295384` (`courses_id`),
  ADD KEY `IDX_9FA3E41467B3B43D` (`users_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ressources`
--
ALTER TABLE `ressources`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes_users`
--
ALTER TABLE `classes_users`
  ADD CONSTRAINT `FK_BEEDD55767B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_BEEDD5579E225B24` FOREIGN KEY (`classes_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `FK_A9A55A4C94AF957A` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `FK_A9A55A4C9E225B24` FOREIGN KEY (`classes_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `courses_users`
--
ALTER TABLE `courses_users`
  ADD CONSTRAINT `FK_389EDBD067B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_389EDBD0F9295384` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ressources_courses`
--
ALTER TABLE `ressources_courses`
  ADD CONSTRAINT `FK_F799735C3C361826` FOREIGN KEY (`ressources_id`) REFERENCES `ressources` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F799735CF9295384` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `FK_9FA3E41467B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_9FA3E414F9295384` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
