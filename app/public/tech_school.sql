-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Jun 24, 2025 at 07:33 AM
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
(1, 8),
(1, 13),
(1, 14),
(4, 6);

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

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `subject`, `message`, `send_at`) VALUES
(3, 'secondtest@test.fr', 'demande de confirmation', 'Je suis un développeur web à la recherche d\'un post de chef d\'équipe.', '2025-06-17 07:10:47');

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
(1, 1, 4, 'Introduction à kali linux', 2.5, 'Lundi 11 mai', '2025-06-09 09:21:14', '2025-06-09 09:21:14', '6B'),
(4, 4, 1, 'Cultures Génerales', 1.5, 'Lundi', '2025-06-17 09:11:54', '2025-06-17 09:11:54', 'Room_6B'),
(5, 1, 1, 'Le base de python', 2, 'Mardi', '2025-06-24 09:00:00', '2025-06-18 17:00:00', 'Room_6B'),
(6, 1, 2, 'commande NMAP', 1.5, 'Jeudi', '2025-06-26 09:00:00', '2025-06-23 17:00:00', 'Room_6B'),
(7, 1, 1, 'commande NMAP', 1.5, 'Lundi', '2025-06-23 09:53:27', '2025-06-23 09:53:27', 'Room_6B');

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
(1, 6),
(4, 1),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(5, 12),
(5, 13),
(5, 14),
(6, 23),
(7, 24);

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
('DoctrineMigrations\\Version20250607152635', '2025-06-09 09:20:07', 18),
('DoctrineMigrations\\Version20250617081729', '2025-06-17 08:17:41', 66),
('DoctrineMigrations\\Version20250617122939', '2025-06-17 12:29:43', 74),
('DoctrineMigrations\\Version20250617125946', '2025-06-17 12:59:52', 250),
('DoctrineMigrations\\Version20250618123256', '2025-06-22 19:11:36', 34),
('DoctrineMigrations\\Version20250622191130', '2025-06-22 19:11:36', 500),
('DoctrineMigrations\\Version20250623093440', '2025-06-23 09:34:47', 295),
('DoctrineMigrations\\Version20250623131825', '2025-06-23 13:18:33', 38);

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

--
-- Dumping data for table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":5:{i:0;s:25:\\\"emails/register.html.twig\\\";i:1;N;i:2;a:3:{i:0;s:9:\\\"Christine\\\";i:1;s:8:\\\"Florence\\\";i:2;s:21:\\\"gg4um3dqo@mozmail.com\\\";}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:21:\\\"gg4um3dqo@mozmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:20:\\\"admin@tech-school.fr\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:21:\\\"Nouvelle inscriptions\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}i:4;N;}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2025-06-17 07:40:07', '2025-06-17 07:40:07', NULL),
(2, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":5:{i:0;s:25:\\\"emails/register.html.twig\\\";i:1;N;i:2;a:3:{s:8:\\\"lastname\\\";s:11:\\\"Notexisting\\\";s:9:\\\"firstname\\\";s:4:\\\"User\\\";s:10:\\\"user_email\\\";s:19:\\\"notexisting@user.fr\\\";}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:19:\\\"notexisting@user.fr\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:20:\\\"admin@tech-school.fr\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:21:\\\"Nouvelle inscriptions\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}i:4;N;}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2025-06-17 07:48:49', '2025-06-17 07:48:49', NULL),
(3, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":5:{i:0;s:25:\\\"emails/register.html.twig\\\";i:1;N;i:2;a:3:{s:8:\\\"lastname\\\";s:3:\\\"Job\\\";s:9:\\\"firstname\\\";s:6:\\\"Repair\\\";s:10:\\\"user_email\\\";s:24:\\\"notexisting@jobrepair.fr\\\";}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:24:\\\"notexisting@jobrepair.fr\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:20:\\\"admin@tech-school.fr\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:21:\\\"Nouvelle inscriptions\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}i:4;N;}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2025-06-17 08:02:21', '2025-06-17 08:02:21', NULL),
(4, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":5:{i:0;s:25:\\\"emails/register.html.twig\\\";i:1;N;i:2;a:2:{s:8:\\\"lastname\\\";s:4:\\\"Last\\\";s:9:\\\"firstname\\\";s:6:\\\"Mailer\\\";}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:16:\\\"last@mailer.test\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:20:\\\"admin@tech-school.fr\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:20:\\\"Nouvelle inscription\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}i:4;N;}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2025-06-17 08:11:28', '2025-06-17 08:11:28', NULL);

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

--
-- Dumping data for table `ressources`
--

INSERT INTO `ressources` (`id`, `name`, `file_type`, `uploaded_at`) VALUES
(1, 'Base de Linux', 'pdf', '2025-06-09 09:22:22'),
(2, 'kali linux-partie-1', 'pdf', '2025-06-18 12:35:00');

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
(1, 1),
(2, 1);

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
-- Table structure for table `school_fees`
--

CREATE TABLE `school_fees` (
  `id` int NOT NULL,
  `users_id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_fees`
--

INSERT INTO `school_fees` (`id`, `users_id`, `name`, `amount`, `created_at`) VALUES
(1, 35, 'Frais de la cantine', 87, '2025-06-23 14:55:29'),
(2, 35, 'Frais de la cantine', 35, '2025-06-23 17:54:15');

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
(4, 'Culture generale'),
(7, 'Sports');

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
  `last_login` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enfant_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`, `lastname`, `firstname`, `register_at`, `last_login`, `reset_token`, `enfant_id`) VALUES
(1, 'kverdier@legall.fr', '[\"ROLE_USER\"]', '$2y$13$bmY8KASvWNhzPnOlPTCuT.CDsMfFZ5f6rG1jVeFIHf.Qk6sALgcE2', 'Colas', 'Véronique', '2024-09-28 09:20:00', NULL, '', NULL),
(3, 'mcohen@barre.fr', '[\"ROLE_USER\"]', '$2y$13$bQcKeNejPZ5hSfDBOuj0R.cwN8Ox51KHTd.4Ef4rwdFKoHQyYbRyy', 'Guilbert', 'Nathalie', '2024-07-23 01:11:25', NULL, '', NULL),
(4, 'ines68@laposte.net', '[\"ROLE_USER\"]', '$2y$13$n189ldA8Wug70wYtEmUjE.fiGs3sP5mKArDFVA3xXtSzA4OK5OKoy', 'Gerard', 'Guillaume', '2025-02-14 18:03:25', NULL, '', NULL),
(5, 'qdeoliveira@dbmail.com', '[\"ROLE_USER\"]', '$2y$13$Q3stMADMEIdCTpC2BRNJReq3WJHGfFN103XimSFJxJj0EQxSf2Kn6', 'Gaillard', 'Susan', '2024-08-28 21:30:30', NULL, NULL, NULL),
(6, 'elise.gaudin@dbmail.com', '[\"ROLE_USER\"]', '$2y$13$B8kxaKs6QOsHi.lKF0Ivj.hP2LV1LC3gUsWWYybJR.PMQfVOJd6YW', 'Marques', 'Michèle', '2025-03-24 15:49:36', NULL, '', NULL),
(7, 'yhamon@fouquet.com', '[\"ROLE_USER\"]', '$2y$13$IY9DN916u1VwkM9wKNTKC.urVwQQx1Xa4WgJmxNwPNzevj/qgIK9q', 'Picard', 'René', '2025-04-20 07:31:00', NULL, NULL, NULL),
(8, 'njourdan@morin.com', '[\"ROLE_USER\"]', '$2y$13$kUn83GOG7HpBkwWUZ4cBO.UrBWnQG8IClTKOX38xmkJ31pjfix25y', 'Gros', 'Alain', '2024-09-07 21:07:00', NULL, '', NULL),
(9, 'patrick.goncalves@loiseau.fr', '[\"ROLE_USER\"]', '$2y$13$KqG7XzrVkGW09I0MmjJILOYP8krzrxN0.51Vck8vO1XYC1oeGEUIy', 'Gosselin', 'Théophile', '2025-01-27 09:34:48', NULL, '', NULL),
(10, 'auguste06@carre.com', '[\"ROLE_USER\"]', '$2y$13$yYCCcC346vkLlhWC4HA1UuTSTV92rA0RhzZuTajHaSoQ56DxQS73S', 'Vallee', 'Virginie', '2025-03-03 23:27:54', NULL, '', NULL),
(11, 'qrousset@live.com', '[\"ROLE_TEACHER\"]', '$2y$13$.zIPDMhGCA4XvDtA1y/.yONcwkASEkkvFF2dJWwUe5o.zol/2q94O', 'Guillot', 'Olivie', '2024-07-29 19:13:44', NULL, '', NULL),
(12, 'avatar@upload.done', '[\"ROLE_ADMIN\", \"ROLE_TEACHER\"]', '$2y$13$wbE0WVUrl0MrKxkvoDdXf.Lq6YBfcFLHCnE3cgbxucwhzntx8ZIZu', 'job', 'johnny', '2025-06-09 10:24:29', NULL, '', NULL),
(13, 'christine.robet@example.com', '[\"ROLE_USER\"]', '$2y$13$N537y.ZV9lQOEd1f1BThxOfaTANs3lcecabx9nF4AsLLqCq8lOb7O', 'Christine', 'Florence', '2025-06-17 07:39:00', NULL, '', NULL),
(14, 'gg4um3dqo@mozmail.com', '[\"ROLE_USER\"]', '$2y$13$xdv6lYk/q6dmr9bMe5Ji9.koawZI.k0FADLhrO4JasC8o5bCI9lrS', 'Christine', 'Florence', '2025-06-17 07:40:06', NULL, NULL, NULL),
(15, 'maggie19@descamps.fr', '[\"ROLE_USER\"]', '$2y$13$/rpeta0naMqACAQtbrxGW.xbs6cHUOK2Ai4t.Onkdvy6nGaYhQe5S', 'Maggie', 'dance', '2025-06-17 07:45:27', NULL, '', NULL),
(16, 'notexisting@user.fr', '[\"ROLE_USER\"]', '$2y$13$QM0vbStXpZWmoIpQAUl63.39P1R1eNyvBvQAphbnXUSOWYPmpd60O', 'Notexisting', 'User', '2025-06-17 07:48:49', NULL, '', NULL),
(17, 'notexisting@admin.fr', '[\"ROLE_USER\"]', '$2y$13$dcpzjmFjlD0aukvMRW99OOyO8KDfXu8C7PA4Mof4iwM5A9ToEeARm', 'Notexisting', 'User', '2025-06-17 07:52:50', NULL, '', NULL),
(18, 'notexisting@jobrepair.fr', '[\"ROLE_USER\"]', '$2y$13$hgdm8vYkmHPIxfmaGy28b.fJJl16niofSlCgNr3hSyohS1lZyTT.K', 'Job', 'Repair', '2025-06-17 08:02:20', NULL, '', NULL),
(19, 'mailer@bug.hope', '[\"ROLE_USER\"]', '$2y$13$b4IEe8Z1iKVQ5mokZOhZMuVGcZtazNZWQvWfNyhHypsEYSqq0z36i', 'Mailer', 'Buug', '2025-06-17 08:09:56', NULL, '', NULL),
(20, 'last@mailer.test', '[\"ROLE_USER\"]', '$2y$13$2t1atLGBFovGc/qbppULDOWqfpl7/sJAsnpwLnqceq9b2yei8Y1b6', 'Last', 'Mailer', '2025-06-17 08:11:27', NULL, '', NULL),
(21, 'symfony@from.benoit', '[\"ROLE_USER\"]', '$2y$13$h2IWXuRpq3WiKzGbWPUHIev6SqjrStfUwbyMP0Rn0jD3kslKLwX2S', 'Symfony from', 'Benoit the best', '2025-06-17 09:33:16', NULL, NULL, NULL),
(22, 'johnny@jobrepair.cd', '[\"ROLE_USER\"]', '$2y$13$6dMG9/ZDtsiQT9iQChO5zOhs2HWY8pRYYI47BCo5qfJFtqlLjbNDq', 'Johnny', 'Jobrepair', '2025-06-17 09:53:47', NULL, '', NULL),
(23, 'brigitte.lambert@gmail.com', '[\"ROLE_USER\"]', '$2y$13$xvuLf8.KGspCwozHo0xV6ukf6xl24J2WeYyYB.oa38b0Vv8NQvhSu', 'Brigitte', 'MacronBug', '2025-06-17 10:09:02', NULL, NULL, NULL),
(24, 'christine.robert@example.com', '[\"ROLE_USER\"]', '$2y$13$Wb3ffOcnv2xMFQ9mv3d6P.f1R/1SonlPHxdMtqh0Qu5cJp09vuDzu', 'Brigitte', 'Macron', '2025-06-17 13:00:06', NULL, NULL, NULL),
(32, 'responsable@tech-school.fr', '[\"ROLE_PARENT\"]', '$2y$13$9CwmQ3JSdTU7Xj/NjJFLyuIEQOkadU5VyGvPsEJPuN8/d9v.fH4iO', 'Jo', 'Respo', '2025-06-22 19:29:43', NULL, NULL, 23),
(33, 'david.meyer@example.com', '[\"ROLE_USER\"]', '$2y$13$IG9NaRSX9.ImSJlrzngIGexhQhDPRkjxgO8X7T/XfMSc6m0Bq5h7y', 'David', 'mayer', '2025-06-23 10:04:09', NULL, NULL, NULL),
(34, 'marques@resposable.fr', '[\"ROLE_PARENT\"]', '$2y$13$G5vEdiSLpKzMftBUZtYwRe8FvztIncvQEpJ243DFGsb8/1CLoKWHS', 'Marques', 'Papa', '2025-06-23 11:55:39', NULL, NULL, 6),
(35, 'Mon-responsable@tech-school.fr', '[\"ROLE_PARENT\"]', '$2y$13$jfLMtKZKtFvi/PN1xVYfpOhFxlRne74LpM90CrGBdPXo.jQgnBSqi', 'Mon-resposable', 'scolaire', '2025-06-23 12:11:21', NULL, NULL, 24);

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
  ADD KEY `IDX_1483A5E9450D2529` (`enfant_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ressources`
--
ALTER TABLE `ressources`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_fees`
--
ALTER TABLE `school_fees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  ADD CONSTRAINT `FK_1483A5E9450D2529` FOREIGN KEY (`enfant_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
