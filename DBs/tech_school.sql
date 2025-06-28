-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Jun 28, 2025 at 12:55 PM
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
(6, '6e A', 6),
(7, '5e B', 5),
(8, '4e C', 4),
(9, '3e A', 3),
(10, '3e B', 3);

-- --------------------------------------------------------

--
-- Table structure for table `classes_users`
--

CREATE TABLE `classes_users` (
  `classes_id` int NOT NULL,
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `courses_users`
--

CREATE TABLE `courses_users` (
  `courses_id` int NOT NULL,
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('DoctrineMigrations\\Version20250628122453', '2025-06-28 12:25:00', 4459),
('DoctrineMigrations\\Version20250628124356', '2025-06-28 12:44:02', -205);

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
  `uploaded_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ressources_courses`
--

CREATE TABLE `ressources_courses` (
  `ressources_id` int NOT NULL,
  `courses_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `school_fees`
--

CREATE TABLE `school_fees` (
  `id` int NOT NULL,
  `users_id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, 'Informatique'),
(6, 'Electronique'),
(7, 'Mathematique'),
(8, 'Culture generale');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)',
  `last_login` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `email`, `roles`, `password`, `lastname`, `firstname`, `register_at`, `last_login`, `reset_token`) VALUES
(12, NULL, 'claire79@guillet.fr', '[\"ROLE_USER\"]', '$2y$13$BWxlgI0hGDXvpeiU1qZZMuwaVEwaOEqrMxeCfQoQWlGJYH6lBEv3e', 'Rey', 'Marine', '2025-02-21 10:03:48', NULL, NULL),
(13, 23, 'wbouchet@club-internet.fr', '[\"ROLE_USER\"]', '$2y$13$Bxz9xEHeV0dJA8znfUOzz.fPGVfUUuHoF2H2Iyf9wzUZhNFA.zldS', 'Grenier', 'Adrienne', '2024-10-16 08:35:36', '2025-06-28 12:45:17', NULL),
(14, NULL, 'dominique.poirier@bousquet.com', '[\"ROLE_USER\"]', '$2y$13$hAw7hJIA7M8oLdkps9i0wOqY9a.cJ4CxnuX.5dzvFM6TNxK2Yh0ym', 'Barbier', 'Adélaïde', '2025-02-15 01:31:57', NULL, NULL),
(15, NULL, 'merle.thierry@club-internet.fr', '[\"ROLE_USER\"]', '$2y$13$7iInVduOxY/3ETuTfKCHT.sYtvdGWaYivwcNvqtFBz0FJRb8b1bdS', 'Jacquot', 'Cécile', '2025-04-07 15:47:42', NULL, NULL),
(16, NULL, 'isaac.perrot@bonneau.com', '[\"ROLE_USER\"]', '$2y$13$8HmgwKtqZ69k6jykpAI/eOk1K/fjPLitdkh6hWLPChOau2cW1kalK', 'Adam', 'Claudine', '2024-09-07 19:02:55', NULL, NULL),
(17, NULL, 'clemence.leroux@gonzalez.fr', '[\"ROLE_USER\"]', '$2y$13$LZfttjEX2d81QVsvBMPU3e6l4X2lOP/eRYfYOfZkrSkHjOTLCOVVe', 'Bodin', 'Frédéric', '2025-05-16 21:49:49', NULL, NULL),
(18, NULL, 'adrienne08@bonnet.fr', '[\"ROLE_USER\"]', '$2y$13$2TH1L709Yrxr9QNZfkkO8eaxEy7pq858JQx0S0xXCQNn9aOkXmhae', 'Samson', 'Guillaume', '2024-09-03 20:54:22', NULL, NULL),
(19, NULL, 'eleonore.leleu@baudry.net', '[\"ROLE_USER\"]', '$2y$13$nvv7pVIavVOQVXlnrTcc3uGM4VavBS086y3yCG4oQfisVytcPxL7a', 'Robert', 'Étienne', '2024-12-18 15:30:50', NULL, NULL),
(20, NULL, 'noel.grondin@laposte.net', '[\"ROLE_USER\"]', '$2y$13$ln73l.pz4VR/S3oasTPtl.d95r6cVd7SX4ElbN9cBML.dVXkF7amq', 'Legrand', 'Aimée', '2025-06-21 03:39:59', NULL, NULL),
(21, NULL, 'louis.joseph@hubert.com', '[\"ROLE_USER\"]', '$2y$13$uMpZrgre1Xl0DytiGyboO.mOs0kRpc65Y78/7mny5AnXdI5Kr.bp2', 'Lambert', 'Virginie', '2025-02-23 14:58:00', NULL, NULL),
(22, NULL, 'yves93@paris.net', '[\"ROLE_USER\"]', '$2y$13$4z09Acl56i/xOMvHPE9l2.by9t8Vk7dyLE9NoR25usgnRFUmyureG', 'Merle', 'Grégoire', '2024-10-07 12:27:25', NULL, NULL),
(23, NULL, 'Jackgrenier@techschool.fr', '[\"ROLE_PARENT\"]', '$2y$13$1FlTX4y5r5REuwV2FL7ehOjNrRKDzvjber6kE4iMWWgIzL96IIT9a', 'Jack', 'Grenier', '2025-06-28 12:48:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_courses`
--

CREATE TABLE `users_courses` (
  `users_id` int NOT NULL,
  `courses_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `school_fees`
--
ALTER TABLE `school_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E1BB1E8167B3B43D` (`users_id`);

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
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`),
  ADD KEY `IDX_1483A5E9727ACA70` (`parent_id`);

--
-- Indexes for table `users_courses`
--
ALTER TABLE `users_courses`
  ADD PRIMARY KEY (`users_id`,`courses_id`),
  ADD KEY `IDX_59A52E8667B3B43D` (`users_id`),
  ADD KEY `IDX_59A52E86F9295384` (`courses_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ressources`
--
ALTER TABLE `ressources`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_fees`
--
ALTER TABLE `school_fees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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

--
-- Constraints for table `school_fees`
--
ALTER TABLE `school_fees`
  ADD CONSTRAINT `FK_E1BB1E8167B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E9727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_courses`
--
ALTER TABLE `users_courses`
  ADD CONSTRAINT `FK_59A52E8667B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_59A52E86F9295384` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
