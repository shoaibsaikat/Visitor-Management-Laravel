-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2025 at 08:43 AM
-- Server version: 12.1.2-MariaDB
-- PHP Version: 8.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitor-management`
--

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
(5, '2023_10_02_043655_create_people_table', 2),
(6, '2023_10_02_044452_create_visitor_histories_table', 2),
(7, '2023_10_02_101323_update_people_table', 3),
(8, '2023_10_03_083115_people_phone_unique', 4),
(9, '2023_10_03_085956_visitor_history_id_type_change', 5),
(12, '2023_10_03_090419_visitor_history_foreignkey_constraint', 6),
(13, '2023_10_11_091425_can_manage_people_role', 7),
(14, '2023_10_19_080307_people_user_relationship', 8),
(15, '2023_10_19_081528_create_leave_table', 8),
(16, '2023_10_29_094147_user_people_ralation', 8),
(17, '2025_12_16_084158_drop_leaves_table', 9);

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
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `created_at`, `updated_at`, `name`, `designation`, `address`, `phone`, `nid`, `type`, `user_id`) VALUES
(1, '2023-10-02 02:53:29', '2025-12-16 02:39:39', 'Rahman Subhan', 'Director', 'Agargaon', '1985648907', NULL, 0, 5),
(2, '2023-10-02 02:55:19', '2023-10-11 04:18:52', 'Rahim Didar', 'Director', 'Agargaon', '1567487705', NULL, 0, NULL),
(3, '2023-10-02 04:20:40', '2023-10-10 03:23:54', 'Hakimuzzaman Khan', 'Deputy Director', 'Agargaon', '3675484568', NULL, 0, NULL),
(4, '2023-10-02 22:43:11', '2023-10-08 02:40:52', 'Abdul Hamid', 'Deputy Director', 'Agargaon', '1234567891', NULL, 0, NULL),
(19, '2023-10-04 04:09:20', '2023-10-04 04:09:20', 'Tipu', 'Pion', 'Kawran Bazar', '5674389219', NULL, 1, NULL),
(21, '2023-10-05 02:19:31', '2023-10-05 02:19:31', 'Karim Molla', 'Delivery Man', 'Mirpur', '4658739876', NULL, 1, NULL),
(22, '2023-10-08 02:36:22', '2023-10-08 02:36:22', 'Monir Khan', 'Delivery Man', 'Mirpur', '3567589487', NULL, 1, NULL),
(23, '2023-10-08 04:22:17', '2023-10-08 04:22:17', 'Hamid Molla', 'Land Developer', 'Matuail', '4673829865', NULL, 1, NULL),
(24, '2023-10-08 04:23:04', '2023-10-08 04:23:04', 'Asad Mahbub', 'CEO', 'Gulshan', '6473869500', NULL, 1, NULL),
(25, '2023-10-08 04:23:45', '2023-10-08 04:23:45', 'Hamid Zaman', 'Marketing Director', 'Banani', '7584937865', NULL, 1, NULL),
(26, '2023-10-08 04:24:20', '2023-10-08 04:24:20', 'Abida Sultana', 'CFO', 'Banani', '6589998765', NULL, 1, NULL),
(27, '2023-10-08 04:25:01', '2023-10-08 04:25:01', 'Abdul Yusuf', 'Banker', 'Motijheel', '6655443322', NULL, 1, NULL),
(28, '2023-10-08 04:25:35', '2023-10-08 04:25:35', 'Fahmida Anam', 'Director', 'Gulshan', '2343256789', NULL, 1, NULL),
(29, '2023-10-08 04:26:08', '2023-10-08 04:26:08', 'Abdul Jabbar', 'Consultant', 'Mirpur', '5889765465', NULL, 1, NULL),
(30, '2023-10-08 04:27:52', '2023-10-08 04:27:52', 'Mustafa Jabbar', 'Minister', 'Mirpur', '5643675890', NULL, 1, NULL),
(31, '2023-10-08 04:28:42', '2023-10-08 04:28:42', 'Mahmuda Khanam', 'Banker', 'Motijheel', '3423567567', NULL, 1, NULL),
(32, '2023-10-11 03:26:56', '2023-10-11 03:30:31', 'Hasna Hena', 'Deputy Director', 'Azimpur', '5664341768', NULL, 0, NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_manage_people` tinyint(1) NOT NULL DEFAULT 0,
  `officer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `can_manage_people`, `officer_id`) VALUES
(4, 'Developer', 'dev@dev.com', NULL, '$2y$10$ufzU5kYZg4deqvh6SyRf8.gPEzQ3BjwgzQkO8TpmxGXWNz5X0C2YW', 'wm7cp7ChGOhyLDD07it2BMW3n3p6lFR42GiaRvtK9Aq6BLWQYTfLAYJRmMAM', '2023-10-11 02:20:59', '2023-10-11 02:20:59', 1, NULL),
(5, 'Guest', 'guest@dev.com', NULL, '$2y$10$Y3rz9hQzs/Gs8LekEzc0Q./bQd5/I7FzHZbhk2.Znyy5ySP9venlO', NULL, '2023-10-11 03:28:13', '2025-12-16 02:39:39', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_histories`
--

CREATE TABLE `visitor_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `visitor_id` bigint(20) UNSIGNED NOT NULL,
  `officer_id` bigint(20) UNSIGNED NOT NULL,
  `card_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_histories`
--

INSERT INTO `visitor_histories` (`id`, `created_at`, `updated_at`, `visitor_id`, `officer_id`, `card_no`) VALUES
(1, '2023-10-04 04:09:20', '2023-10-04 04:09:20', 19, 4, 88),
(2, '2023-10-05 02:13:35', '2023-10-05 02:13:35', 19, 4, 55),
(3, '2023-10-05 02:19:31', '2023-10-05 02:19:31', 21, 4, 4),
(4, '2023-10-08 02:36:22', '2023-10-08 02:36:22', 22, 3, 8),
(5, '2023-10-08 04:22:17', '2023-10-08 04:22:17', 23, 4, 9),
(6, '2023-10-08 04:23:04', '2023-10-08 04:23:04', 24, 1, 67),
(7, '2023-10-08 04:23:45', '2023-10-08 04:23:45', 25, 1, 23),
(8, '2023-10-08 04:24:20', '2023-10-08 04:24:20', 26, 3, 66),
(9, '2023-10-08 04:25:01', '2023-10-08 04:25:01', 27, 3, 77),
(10, '2023-10-08 04:25:35', '2023-10-08 04:25:35', 28, 1, 43),
(11, '2023-10-08 04:26:08', '2023-10-08 04:26:08', 29, 2, 73),
(12, '2023-10-08 04:27:52', '2023-10-08 04:27:52', 30, 4, 32),
(13, '2023-10-08 04:28:42', '2023-10-08 04:28:42', 31, 3, 79),
(14, '2023-10-09 23:04:59', '2023-10-09 23:04:59', 29, 1, 76),
(15, '2023-10-11 02:30:40', '2023-10-11 02:30:40', 19, 2, 7),
(16, '2023-10-11 02:31:11', '2023-10-11 02:31:11', 24, 3, 4),
(17, '2023-10-11 02:31:44', '2023-10-11 02:31:44', 28, 3, 1),
(18, '2023-10-11 03:27:36', '2023-10-11 03:27:36', 29, 3, 12);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `people_phone_unique` (`phone`),
  ADD KEY `people_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_officer_id_foreign` (`officer_id`);

--
-- Indexes for table `visitor_histories`
--
ALTER TABLE `visitor_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitor_histories_visitor_id_foreign` (`visitor_id`),
  ADD KEY `visitor_histories_officer_id_foreign` (`officer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visitor_histories`
--
ALTER TABLE `visitor_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_officer_id_foreign` FOREIGN KEY (`officer_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `visitor_histories`
--
ALTER TABLE `visitor_histories`
  ADD CONSTRAINT `visitor_histories_officer_id_foreign` FOREIGN KEY (`officer_id`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `visitor_histories_visitor_id_foreign` FOREIGN KEY (`visitor_id`) REFERENCES `people` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
