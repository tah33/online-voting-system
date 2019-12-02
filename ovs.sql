-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 04:14 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovs`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(100) NOT NULL,
  `division_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `division_id`, `name`) VALUES
(1, '1', 'Dhaka-1'),
(2, '1', 'Dhaka-2'),
(3, '1', 'Dhaka-3'),
(4, '1', 'Dhaka-4'),
(5, '1', 'Dhaka-5'),
(6, '1', 'Dhaka-6'),
(7, '1', 'Dhaka-7'),
(8, '1', 'Dhaka-8'),
(9, '1', 'Dhaka-9'),
(10, '1', 'Dhaka-10'),
(11, '1', 'Dhaka-11'),
(12, '1', 'Dhaka-12'),
(13, '1', 'Dhaka-13'),
(14, '1', 'Dhaka-14'),
(15, '1', 'Dhaka-15'),
(16, '1', 'Dhaka-16'),
(17, '1', 'Dhaka-17'),
(18, '1', 'Dhaka-18'),
(19, '1', 'Dhaka-19'),
(20, '1', 'Dhaka-20'),
(21, '1', 'Gazipur-1'),
(22, '1', 'Gazipur-2'),
(23, '1', 'Gazipur-3'),
(24, '1', 'Gazipur-4'),
(25, '1', 'Gazipur-5'),
(26, '1', 'Narsingdi-1'),
(27, '1', 'Narsingdi-2'),
(28, '1', 'Narsingdi-3'),
(29, '1', 'Narsingdi-4'),
(30, '1', 'Narsingdi-5'),
(31, '1', 'Narayanganj-1'),
(32, '1', 'Narayanganj-2'),
(33, '1', 'Narayanganj-3'),
(34, '1', 'Narayanganj-4'),
(35, '1', 'Narayanganj-5'),
(36, '1', 'Tangail-1'),
(37, '1', 'Tangail-2'),
(38, '1', 'Tangail-3'),
(39, '1', 'Tangail-4'),
(40, '1', 'Tangail-5'),
(41, '1', 'Tangail-6'),
(42, '1', 'Tangail-7'),
(43, '1', 'Tangail-8'),
(44, '1', 'Manikganj-1'),
(45, '1', 'Manikganj-2'),
(46, '1', 'Manikganj-3'),
(47, '1', 'Munshiganj-1'),
(48, '1', 'Munshiganj-2'),
(49, '1', 'Munshiganj-3'),
(50, '1', 'Kishoreganj-1'),
(51, '1', 'Kishoreganj-2'),
(52, '1', 'Kishoreganj-3'),
(53, '1', 'Kishoreganj-4'),
(54, '1', 'Kishoreganj-5'),
(55, '1', 'Kishoreganj-6'),
(56, '1', 'Shariatpur-1'),
(57, '1', 'Shariatpur-2'),
(58, '1', 'Shariatpur-3'),
(59, '1', 'Rajbari-1'),
(60, '1', 'Rajbari-2'),
(61, '1', 'Faridpur-1'),
(62, '1', 'Faridpur-2'),
(63, '1', 'Faridpur-3'),
(64, '1', 'Faridpur-4'),
(65, '1', 'Gopalganj-1'),
(66, '1', 'Gopalganj-2'),
(67, '1', 'Gopalganj-3'),
(68, '1', 'Madaripur-1'),
(69, '1', 'Madaripur-2'),
(70, '1', 'Madaripur-3'),
(71, '2', 'Panchagarh-1'),
(72, '2', 'Panchagarh-2'),
(73, '2', 'Thakurgaon-1'),
(74, '2', 'Thakurgaon-2'),
(75, '2', 'Thakurgaon-3'),
(76, '2', 'Dinajpur-1'),
(77, '2', 'Dinajpur-2'),
(78, '2', 'Dinajpur-3'),
(79, '2', 'Dinajpur-4'),
(80, '2', 'Dinajpur-5'),
(81, '2', 'Dinajpur-6'),
(82, '2', 'Nilphamari-1'),
(83, '2', 'Nilphamari-2'),
(84, '2', 'Nilphamari-3'),
(85, '2', 'Nilphamari-4'),
(86, '2', 'Lalmonirhat-1'),
(87, '2', 'Lalmonirhat-2'),
(88, '2', 'Lalmonirhat-3'),
(89, '2', 'Rangpur-1'),
(90, '2', 'Rangpur-2'),
(91, '2', 'Rangpur-3'),
(92, '2', 'Rangpur-4'),
(93, '2', 'Rangpur-5'),
(94, '2', 'Rangpur-6'),
(95, '2', 'Kurigram-1'),
(96, '2', 'Kurigram-2'),
(97, '2', 'Kurigram-3'),
(98, '2', 'Kurigram-4'),
(99, '2', 'Gaibandha-1'),
(100, '2', 'Gaibandha-2'),
(101, '2', 'Gaibandha-3'),
(102, '2', 'Gaibandha-4'),
(103, '2', 'Gaibandha-5'),
(104, '3', 'Brahmanbaria-1'),
(105, '3', 'Brahmanbaria-2'),
(106, '3', 'Brahmanbaria-3'),
(107, '3', 'Brahmanbaria-4'),
(108, '3', 'Brahmanbaria-5'),
(109, '3', 'Brahmanbaria-6'),
(110, '3', 'Cumilla-1'),
(111, '3', 'Cumilla-2'),
(112, '3', 'Cumilla-3'),
(113, '3', 'Cumilla-4'),
(114, '3', 'Cumilla-5'),
(115, '3', 'Cumilla-6'),
(116, '3', 'Cumilla-7'),
(117, '3', 'Cumilla-8'),
(118, '3', 'Cumilla-9'),
(119, '3', 'Cumilla-10'),
(120, '3', 'Cumilla-11'),
(121, '3', 'Chandpur-1'),
(122, '3', 'Chandpur-2'),
(123, '3', 'Chandpur-3'),
(124, '3', 'Chandpur-4'),
(125, '3', 'Chandpur-5'),
(126, '3', 'Feni-1'),
(127, '3', 'Feni-2'),
(128, '3', 'Feni-3'),
(129, '3', 'Noakhali-1'),
(130, '3', 'Noakhali-2'),
(131, '3', 'Noakhali-3'),
(132, '3', 'Noakhali-4'),
(133, '3', 'Noakhali-5'),
(134, '3', 'Noakhali-6'),
(135, '3', 'Laxmipur-1'),
(136, '3', 'Laxmipur-2'),
(137, '3', 'Laxmipur-3'),
(138, '3', 'Laxmipur-4'),
(139, '3', 'Chattogram-1'),
(140, '3', 'Chattogram-2'),
(141, '3', 'Chattogram-3'),
(142, '3', 'Chattogram-4'),
(143, '3', 'Chattogram-5'),
(144, '3', 'Chattogram-6'),
(145, '3', 'Chattogram-7'),
(146, '3', 'Chattogram-8'),
(147, '3', 'Chattogram-9'),
(148, '3', 'Chattogram-10'),
(149, '3', 'Chattogram-11'),
(150, '3', 'Chattogram-12'),
(151, '3', 'Chattogram-13'),
(152, '3', 'Chattogram-14'),
(153, '3', 'Chattogram-15'),
(154, '3', 'Chattogram-16'),
(155, '3', 'Coxs Bazar-1'),
(156, '3', 'Coxs Bazar-2'),
(157, '3', 'Coxs Bazar-3'),
(158, '3', 'Coxs Bazar-4'),
(159, '3', 'Khagrachhari'),
(160, '3', 'Rangamati'),
(161, '3', 'Bandarban'),
(162, '4', 'Sunamganj-1'),
(163, '4', 'Sunamganj-2'),
(164, '4', 'Sunamganj-3'),
(165, '4', 'Sunamganj-4'),
(166, '4', 'Sunamganj-5'),
(167, '4', 'Sylhet-1'),
(168, '4', 'Sylhet-2'),
(169, '4', 'Sylhet-3'),
(170, '4', 'Sylhet-4'),
(171, '4', 'Sylhet-5'),
(172, '4', 'Sylhet-6'),
(173, '4', 'Moulvibazar-1'),
(174, '4', 'Moulvibazar-2'),
(175, '4', 'Moulvibazar-3'),
(176, '4', 'Moulvibazar-4'),
(177, '4', 'Habiganj-1'),
(178, '4', 'Habiganj-2'),
(179, '4', 'Habiganj-3'),
(180, '4', 'Habiganj-4'),
(181, '5', 'Barguna-1'),
(182, '5', 'Barguna-2'),
(183, '5', 'Patuakhali-1'),
(184, '5', 'Patuakhali-2'),
(185, '5', 'Patuakhali-3'),
(186, '5', 'Patuakhali-4'),
(187, '5', 'Bhola-1'),
(188, '5', 'Bhola-2'),
(189, '5', 'Bhola-3'),
(190, '5', 'Bhola-4'),
(191, '5', 'Barishal-1'),
(192, '5', 'Barishal-2'),
(193, '5', 'Barishal-3'),
(194, '5', 'Barishal-4'),
(195, '5', 'Barishal-5'),
(196, '5', 'Barishal-6'),
(197, '5', 'Jhalokathi-1'),
(198, '5', 'Jhalokathi-2'),
(199, '5', 'Pirojpur-1'),
(200, '5', 'Pirojpur-2'),
(201, '5', 'Pirojpur-3'),
(202, '6', 'Bogura-1'),
(203, '6', 'Bogura-2'),
(204, '6', 'Bogura-3'),
(205, '6', 'Bogura-4'),
(206, '6', 'Bogura-5'),
(207, '6', 'Bogura-6'),
(208, '6', 'Bogura-7'),
(209, '6', 'Chapainawabganj-1'),
(210, '6', 'Chapainawabganj-2'),
(211, '6', 'Chapainawabganj-3'),
(212, '6', 'Naogaon-1'),
(213, '6', 'Naogaon-2'),
(214, '6', 'Naogaon-3'),
(215, '6', 'Naogaon-4'),
(216, '6', 'Naogaon-5'),
(217, '6', 'Naogaon-6'),
(218, '6', 'Rajshahi-1'),
(219, '6', 'Rajshahi-2'),
(220, '6', 'Rajshahi-3'),
(221, '6', 'Rajshahi-4'),
(222, '6', 'Rajshahi-5'),
(223, '6', 'Rajshahi-6'),
(224, '6', 'Natore-1'),
(225, '6', 'Natore-2'),
(226, '6', 'Natore-3'),
(227, '6', 'Natore-4'),
(228, '6', 'Sirajganj-1'),
(229, '6', 'Sirajganj-2'),
(230, '6', 'Sirajganj-3'),
(231, '6', 'Sirajganj-4'),
(232, '6', 'Sirajganj-5'),
(233, '6', 'Sirajganj-6'),
(234, '6', 'Pabna-1'),
(235, '6', 'Pabna-2'),
(236, '6', 'Pabna-3'),
(237, '6', 'Pabna-4'),
(238, '6', 'Pabna-5'),
(239, '6', 'Jaypurhat-1'),
(240, '6', 'Jaypurhat-2'),
(241, '7', 'Meherpur-1'),
(242, '7', 'Meherpur-2'),
(243, '7', 'Kushtia-1'),
(244, '7', 'Kushtia-2'),
(245, '7', 'Kushtia-3'),
(246, '7', 'Kushtia-4'),
(247, '7', 'Chuadanga-1'),
(248, '7', 'Chuadanga-2'),
(249, '7', 'Jhenaidah-1'),
(250, '7', 'Jhenaidah-2'),
(251, '7', 'Jhenaidah-3'),
(252, '7', 'Jhenaidah-4'),
(253, '7', 'Jashore-1'),
(254, '7', 'Jashore-2'),
(255, '7', 'Jashore-3'),
(256, '7', 'Jashore-4'),
(257, '7', 'Jashore-5'),
(258, '7', 'Jashore-6'),
(259, '7', 'Magura-1'),
(260, '7', 'Magura-2'),
(261, '7', 'Narail-1'),
(262, '7', 'Narail-2'),
(263, '7', 'Bagerhat-1'),
(264, '7', 'Bagerhat-2'),
(265, '7', 'Bagerhat-3'),
(266, '7', 'Bagerhat-4'),
(267, '7', 'Khulna-1'),
(268, '7', 'Khulna-2'),
(269, '7', 'Khulna-3'),
(270, '7', 'Khulna-4'),
(271, '7', 'Khulna-5'),
(272, '7', 'Khulna-6'),
(273, '7', 'Satkhira-1'),
(274, '7', 'Satkhira-2'),
(275, '7', 'Satkhira-3'),
(276, '7', 'Satkhira-4'),
(277, '8', 'Jamalpur-1'),
(278, '8', 'Jamalpur-2'),
(279, '8', 'Jamalpur-3'),
(280, '8', 'Jamalpur-4'),
(281, '8', 'Jamalpur-5'),
(282, '8', 'Sherpur-1'),
(283, '8', 'Sherpur-2'),
(284, '8', 'Sherpur-3'),
(285, '8', 'Mymensingh-1'),
(286, '8', 'Mymensingh-2'),
(287, '8', 'Mymensingh-3'),
(288, '8', 'Mymensingh-4'),
(289, '8', 'Mymensingh-5'),
(290, '8', 'Mymensingh-6'),
(291, '8', 'Mymensingh-7'),
(292, '8', 'Mymensingh-8'),
(293, '8', 'Mymensingh-9'),
(294, '8', 'Mymensingh-10'),
(295, '8', 'Mymensingh-11'),
(296, '8', 'Netrokona-1'),
(297, '8', 'Netrokona-2'),
(298, '8', 'Netrokona-3'),
(299, '8', 'Netrokona-4'),
(300, '8', 'Netrokona-5');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `election_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `votes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `user_id`, `election_id`, `status`, `votes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, 1, 0, '2019-12-01 10:56:54', '2019-12-01 10:56:54', NULL),
(2, 6, 1, 1, 1, '2019-12-01 10:57:07', '2019-12-02 09:06:04', NULL),
(3, 4, 1, 1, 0, '2019-12-01 11:39:07', '2019-12-01 11:39:07', NULL),
(4, 5, 1, 1, 1, '2019-12-01 11:39:49', '2019-12-01 11:39:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `name`) VALUES
(1, 'Dhaka'),
(2, 'Rangpur'),
(3, 'Chattogram'),
(4, 'Sylhet'),
(5, 'Barishal'),
(6, 'Rajshahi'),
(7, 'Khulna'),
(8, 'Mymensingh');

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `election_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `name`, `status`, `election_date`, `created_at`, `updated_at`) VALUES
(1, 'Presidency', 1, '2019-12-02', '2019-12-01 10:55:55', '2019-12-01 10:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_11_10_124651_create_elections_table', 1),
(3, '2019_11_21_144721_create_voters_table', 1),
(4, '2019_11_21_144826_create_candidates_table', 1),
(6, '2019_12_01_143958_create_parties_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `user_id`, `name`, `symbol`, `symbol_name`, `created_at`, `updated_at`) VALUES
(1, 3, 'Natinal Awami League', 'tah@mailinator.net . jpeg', 'Grape', '2019-12-01 09:35:58', '2019-12-01 09:35:58'),
(2, 4, 'BNP', 'tah3@mailinator.net . jpeg', 'Otto Clayton', '2019-12-01 10:07:00', '2019-12-01 10:07:00'),
(3, 5, 'National Party', 'tah33@mailinator.com . jpeg', 'Sydnee Prince', '2019-12-01 10:09:57', '2019-12-01 10:09:57'),
(4, 6, 'Shibir Party', 'tah333@mailinator.com . jpeg', 'Galena Olsen', '2019-12-01 10:18:48', '2019-12-01 10:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `nid`, `role`, `gender`, `dob`, `phone`, `area`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Saria', 'saria', 'saria@gmail.com', '$2y$10$/eLgmZW9dGSdSzT3aaqQfOF3WyTiLxw/19MRvxEHwcq0NabOS98PK', '1365465465464', 'admin', NULL, NULL, NULL, 1, NULL, NULL, '2019-12-01 08:53:28', '2019-12-01 08:53:28'),
(3, 'Zachery Howe', 'wugyzika', 'tah@mailinator.net', '$2y$10$81.KX704VQFiK/m/Xs.jPu5hX4KhReHyXFZ7b6XXOG43cwYonkCym', '1234567899', 'candidate', 'female', '2000-06-19', '01631102838', 27, 'wugyzika . jpeg', NULL, '2019-12-01 09:35:58', '2019-12-01 09:35:58'),
(4, 'Malik Trevino', 'gywepyhese', 'tah3@mailinator.net', '$2y$10$BATiBsSHz6h7hdcQ5x.bMej/K01W2I0ooHn2rGECd0ILcVcTISsr2', '1234567898', 'candidate', 'male', '1993-06-21', '01631102837', 52, 'gywepyhese . jpeg', NULL, '2019-12-01 10:07:00', '2019-12-01 10:07:00'),
(5, 'Silas Randall', 'gapol', 'tah33@mailinator.com', '$2y$10$aGXKv3xFlQcieOaPaUE0C.cDQvjpzQmUDpL91NDQGHsrAyyxn6jMa', '1234567897', 'candidate', 'male', '1982-01-25', '01631102839', 5, 'gapol . jpeg', NULL, '2019-12-01 10:09:57', '2019-12-01 10:09:57'),
(6, 'Yvette Curtis', 'gusipy', 'tah333@mailinator.com', '$2y$10$Nr846WjpWxFqvtcTejhF6OZAHPyfbUOAOKXiCLD5A5CMndZxyLaFi', '1234567896', 'candidate', 'female', '2000-12-12', '01631102840', 5, 'gusipy . jpeg', NULL, '2019-12-01 10:18:48', '2019-12-01 10:18:48'),
(7, 'Nola Sutton', 'wixoqa', 'sa@gmail.com', '$2y$10$5aPkU1tGcrcAg0SonJ48d.pMC7M4NCbAA/3q2ZSGzNePm.pmMfPiq', '1234567891', 'voter', 'male', '1982-12-19', '01631102842', 5, 'wixoqa.jpeg', NULL, '2019-12-01 12:19:40', '2019-12-02 09:12:25'),
(8, 'Nola Sutton', 'sa', 's@gmail.com', '$2y$10$5aPkU1tGcrcAg0SonJ48d.pMC7M4NCbAA/3q2ZSGzNePm.pmMfPiq', '1234567892', 'voter', 'female', '1982-12-19', '01631102841', 5, 'wixoqa.jpeg', NULL, '2019-12-01 12:19:40', '2019-12-01 12:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `election_id` bigint(20) UNSIGNED NOT NULL,
  `wrong_attempt` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `user_id`, `candidate_id`, `election_id`, `wrong_attempt`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 1, 0, '2019-12-02 09:06:04', '2019-12-02 09:06:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
