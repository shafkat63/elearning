-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 08:49 PM
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
(1, 'create permission', 'web', '2024-03-14 23:43:20', '2024-03-15 02:11:39'),
(2, 'view permission', 'web', '2024-03-14 23:44:37', '2024-03-15 02:11:45'),
(3, 'edit permission', 'web', '2024-03-14 23:44:59', '2024-03-15 02:11:55'),
(7, 'delete permission', 'web', '2024-03-15 05:10:06', '2024-03-15 05:10:06'),
(8, 'aaa', 'web', '2024-03-22 11:53:50', '2024-03-22 11:53:50');

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
(1, 'Tezta', 'web', '2024-03-15 02:24:22', '2024-03-15 23:13:19'),
(2, 'root', 'web', '2024-03-15 02:24:30', '2024-03-15 02:27:58'),
(3, 'editor', 'web', '2024-03-15 02:24:36', '2024-03-15 02:28:04'),
(5, 'aaaa', 'web', '2024-03-15 16:55:10', '2024-03-15 16:55:10');

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
(3, 1),
(3, 2),
(7, 1),
(7, 2);

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
(7, 'Science', 'A', 'A', 'A', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
