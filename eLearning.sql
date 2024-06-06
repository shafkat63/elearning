-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 09:10 AM
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
-- Database: `laravel-role-permissions`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `paper_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `subject_id`, `paper_id`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(14, 3, 10, 'Bangla 2nd Chapter 12', 'A', 'A', 'A', 'A', 'A'),
(15, 3, 10, 'Bangla 2nd Chapter', 'A', 'A', 'A', NULL, NULL),
(16, 3, 10, 'Here is a mathematical expression: \\( f(x) = \\int_{a}^{b} \\frac{x^2}{2}\\,  \\)', 'A', 'A', 'A', 'A', 'A'),
(17, 5, 2, 'English 1st Chapter', 'A', 'A', 'A', NULL, NULL),
(18, 7, 29, 'History Of Science', 'A', 'A', 'A', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_13_181625_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 6),
(5, 'App\\Models\\User', 9),
(5, 'App\\Models\\User', 10),
(5, 'App\\Models\\User', 11),
(5, 'App\\Models\\User', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`) VALUES
(17, 'Dhali Abir', 'dhali@gmail.com', '014785223', 50, 'NO', 'Processing', '66071aa0e0580', 'BDT'),
(18, 'Dhali Abir', 'dhali@gmail.com', '014785223', 50, 'NO', 'Processing', '66071ce4d879e', 'BDT'),
(19, 'Dhali Abir', 'dhali@gmail.com', '014785223', 80, 'NO', 'Processing', '66071d2dd3caa', 'BDT'),
(20, 'Ashif', 'ashif@gmail.com', '01676735476', 80, 'NO', 'Processing', '66071dcf69d43', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `subject_id`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(2, 5, 'English 1st', 'A', 'A', 'A', 'A', 'A'),
(3, 5, 'English 2st', 'A', 'A', 'A', 'A', 'A'),
(4, 6, 'Math 1st', 'A', 'A', 'A', 'A', 'A'),
(10, 3, 'Bangla 1st', 'A', 'A', 'A', 'A', 'A'),
(29, 7, 'Science 1st', 'A', 'A', 'A', 'A', 'A'),
(30, 3, 'Bangla 2nd Paper', 'A', 'A', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-permission', 'web', '2024-03-14 23:43:20', '2024-03-25 15:46:28'),
(2, 'view-permission', 'web', '2024-03-14 23:44:37', '2024-03-25 15:46:35'),
(7, 'delete-permission', 'web', '2024-03-15 05:10:06', '2024-03-25 15:46:40'),
(11, 'update-permission', 'web', '2024-03-25 15:27:15', '2024-03-25 15:46:46'),
(12, 'create-role', 'web', '2024-03-25 15:29:06', '2024-03-25 15:46:53'),
(13, 'view-role', 'web', '2024-03-25 15:29:16', '2024-03-25 15:47:00'),
(14, 'update-role', 'web', '2024-03-25 15:29:50', '2024-03-25 15:47:06'),
(15, 'delete-role', 'web', '2024-03-25 15:30:00', '2024-03-25 15:47:12'),
(16, 'subject-create', 'web', '2024-03-25 16:11:14', '2024-03-25 16:11:14'),
(17, 'subject-view', 'web', '2024-03-25 16:11:25', '2024-03-25 16:11:25'),
(18, 'subject-update', 'web', '2024-03-25 16:11:35', '2024-03-25 16:11:35'),
(19, 'subject-delete', 'web', '2024-03-25 16:11:42', '2024-03-25 16:11:42'),
(20, 'paper-create', 'web', '2024-03-25 16:12:06', '2024-03-25 16:12:06'),
(21, 'paper-view', 'web', '2024-03-25 16:12:15', '2024-03-25 16:12:15'),
(22, 'paper-update', 'web', '2024-03-25 16:12:26', '2024-03-25 16:12:26'),
(23, 'paper-delete', 'web', '2024-03-25 16:12:33', '2024-03-25 16:12:33'),
(24, 'chapter-create', 'web', '2024-03-25 16:12:49', '2024-03-25 16:12:49'),
(25, 'chapter-view', 'web', '2024-03-25 16:12:56', '2024-03-25 16:12:56'),
(26, 'chapter-update', 'web', '2024-03-25 16:13:05', '2024-03-25 16:13:05'),
(27, 'chapter-delete', 'web', '2024-03-25 16:13:14', '2024-03-25 16:13:14'),
(28, 'question-create', 'web', '2024-03-25 16:13:37', '2024-03-25 16:13:37'),
(29, 'question-view', 'web', '2024-03-25 16:13:44', '2024-03-25 16:13:44'),
(30, 'question-update', 'web', '2024-03-25 16:13:59', '2024-03-25 16:13:59'),
(31, 'question-delete', 'web', '2024-03-25 16:14:08', '2024-03-25 16:14:08'),
(32, 'user-create', 'web', '2024-03-25 16:15:40', '2024-03-25 16:15:40'),
(33, 'user-view', 'web', '2024-03-25 16:15:48', '2024-03-25 16:15:48'),
(34, 'user-update', 'web', '2024-03-25 16:15:56', '2024-03-25 16:15:56'),
(35, 'user-delete', 'web', '2024-03-25 16:16:03', '2024-03-25 16:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL DEFAULT 0,
  `paper_id` int(10) NOT NULL DEFAULT 0,
  `chapter_id` int(10) NOT NULL,
  `question_name` longtext NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subject_id`, `paper_id`, `chapter_id`, `question_name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(17, 3, 10, 14, 'Here is a mathematical expression: \\( f(x) = \\int_{a}^{b} \\frac{x^2}{2}\\, dx \\)', 'A', 'A', 'A', NULL, NULL),
(28, 3, 10, 14, 'Find the  mathematical expression: \\( f(x) = \\int_{a}^{b} \\frac{x^2}{2}\\,  \\)', 'A', 'A', 'A', NULL, NULL),
(34, 5, 2, 17, 'Test Question', 'A', 'A', '2024-03-21 22:51:21', 'A', '2024-03-22 11:02:26'),
(35, 5, 2, 17, 'Test Question 2', 'A', 'A', '2024-03-22 08:21:03', 'A', '2024-03-22 11:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `question_option`
--

CREATE TABLE `question_option` (
  `id` int(10) NOT NULL,
  `questions_id` int(10) NOT NULL,
  `options` longtext NOT NULL,
  `optionanser` int(2) NOT NULL DEFAULT 0,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_option`
--

INSERT INTO `question_option` (`id`, `questions_id`, `options`, `optionanser`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(13, 17, 'expression: \\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 0, 'A', 'A', 'A', NULL, NULL),
(14, 17, 'expression: \\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 1, 'A', 'A', 'A', NULL, NULL),
(15, 17, 'expression: \\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 0, 'A', 'A', 'A', NULL, NULL),
(16, 17, 'expression: \\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 0, 'A', 'A', 'A', NULL, NULL),
(21, 28, '\\( f(x) =  \\frac{x^2}{2}\\,  \\)', 1, 'A', 'A', 'A', NULL, NULL),
(22, 28, '\\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 0, 'A', 'A', 'A', NULL, NULL),
(23, 28, '\\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 0, 'A', 'A', 'A', NULL, NULL),
(24, 28, '\\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 0, 'A', 'A', 'A', NULL, NULL),
(45, 34, 'Option 1', 0, 'A', 'A', '2024-03-21 22:51:21', 'A', '2024-03-22 11:02:26'),
(46, 34, 'Option 2', 0, 'A', 'A', '2024-03-21 22:51:21', 'A', '2024-03-22 11:02:26'),
(47, 34, 'Option 3', 1, 'A', 'A', '2024-03-21 22:51:21', 'A', '2024-03-22 11:02:26'),
(48, 34, 'Option 4', 0, 'A', 'A', '2024-03-21 22:51:21', 'A', '2024-03-22 11:02:26'),
(49, 35, 'A1', 0, 'A', 'A', '2024-03-22 08:21:03', 'A', '2024-03-22 11:02:53'),
(50, 35, 'A2', 1, 'A', 'A', '2024-03-22 08:21:03', 'A', '2024-03-22 11:02:53'),
(51, 35, 'A3', 0, 'A', 'A', '2024-03-22 08:21:03', 'A', '2024-03-22 11:02:53'),
(52, 35, 'A4', 0, 'A', 'A', '2024-03-22 08:21:03', 'A', '2024-03-22 11:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2024-03-15 02:24:22', '2024-03-25 15:30:23'),
(2, 'Admin', 'web', '2024-03-15 02:24:30', '2024-03-25 15:30:29'),
(3, 'Editor', 'web', '2024-03-15 02:24:36', '2024-03-25 13:52:35'),
(5, 'Student Free', 'web', '2024-03-15 16:55:10', '2024-03-25 13:53:01'),
(7, 'Student Silver', 'web', '2024-03-25 13:53:37', '2024-03-25 13:53:37'),
(8, 'Student  Platinum', 'web', '2024-03-25 13:53:46', '2024-03-25 13:53:46'),
(9, 'Student Gold', 'web', '2024-03-25 13:53:55', '2024-03-25 13:53:55'),
(11, 'Test', 'web', '2024-03-25 15:45:00', '2024-03-25 15:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(7, 1),
(7, 2),
(11, 1),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(19, 1),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `name` varchar(80) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'Bangla', 'A', 'A', 'A', 'A', 'A'),
(5, 'Engilish', 'A', 'A', 'A', 'A', 'A'),
(6, 'Math', 'A', 'A', 'A', 'A', 'A'),
(7, 'Science', 'A', 'A', 'A', 'A', 'A'),
(23, 'adadad', 'A', 'A', 'A', NULL, NULL),
(24, 'adadad', 'A', 'A', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super User', 'root@gmail.com', '01315007287', NULL, '$2y$10$FJvqtKNhkaONv/aVH6K7W.L1.OyWk.XSX3HRWpvIEnC7QakzDRa3a', NULL, '2024-03-23 13:16:02', '2024-03-26 04:58:56'),
(4, 'Editor', 'editor@gmail.com', '0147852339', NULL, '$2y$10$GcPECm/wRYTWGevXnjhWMOEEn4yg.zo0cRcBzeK4YIBw8M0R6DP0i', NULL, '2024-03-25 15:36:28', '2024-03-25 16:34:37'),
(5, 'Admin User', 'admin@gmail.com', '0147852369', NULL, '$2y$10$SAwqJEMji.MSF6CN6tD/KuhQntltfArSiB2xVJAfMb8sr3NN61eBW', NULL, '2024-03-26 04:59:28', '2024-03-26 04:59:28'),
(6, 'Dhali Abir', 'dhali@gmail.com', '014785223', NULL, '$2y$10$1Kkl9mwbkzNfDukRfxJ4yuUnltrZfRrMxc5OQ3fZ8D4a6prJD45.W', NULL, '2024-03-26 05:17:12', '2024-03-26 05:17:12'),
(9, 'Abir Dhali', 'abir@gmail.com', '01315107287', NULL, '$2y$10$c8cpZruqXv7xq2d3Udv3wuNeUJ4rY6fEes8Wn/pczXiOBlawIFJSK', NULL, '2024-03-28 23:06:38', '2024-03-28 23:06:38'),
(10, 'Abir Dhali', 'abirdhali@gmail.com', '01500728745', NULL, '$2y$10$kN6/DWWzGPNvSECZ7sPYJ.TamUHIbGQSdeDsKIwETp7OYweC6aPuC', NULL, '2024-03-29 12:46:07', '2024-03-29 12:46:07'),
(11, 'Test Student 01', 'student1@gmail.com', '01478523', NULL, '$2y$10$77mm6TZB5EbPTDzEofZileMLyAXhvycklbJc2MVVsJ8s7AQyj2MWa', NULL, '2024-03-29 13:17:20', '2024-03-29 13:17:20'),
(12, 'Ashif', 'ashif@gmail.com', '01676735476', NULL, '$2y$10$evi5l55Qr4l3.8DENVWPjObUqGPREpaKFCVNi7lN6sVtemnQFgA7O', NULL, '2024-03-29 13:59:55', '2024-03-29 13:59:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_option`
--
ALTER TABLE `question_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `question_option`
--
ALTER TABLE `question_option`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
