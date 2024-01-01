-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 02:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengelolaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_perusahaan`
--

CREATE TABLE `email_perusahaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_perusahaan`
--

INSERT INTO `email_perusahaan` (`id`, `perusahaan_id`, `email`, `created_at`, `updated_at`) VALUES
(16, 6, 'email4Edit@gmail.com', '2023-12-31 12:34:18', '2023-12-31 12:37:10'),
(18, 6, 'email6@gmail.com', '2023-12-31 12:34:18', '2023-12-31 12:35:56'),
(20, 6, 'email7@gmail.com', '2023-12-31 15:04:31', '2023-12-31 15:04:31'),
(21, 6, 'email8@gmail.com', '2023-12-31 15:04:31', '2023-12-31 15:04:31');

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
-- Table structure for table `kargo_perusahaan`
--

CREATE TABLE `kargo_perusahaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` bigint(20) UNSIGNED NOT NULL,
  `port_loading` bigint(20) UNSIGNED NOT NULL,
  `port_discharge` bigint(20) UNSIGNED NOT NULL,
  `freight` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kargo_perusahaan`
--

INSERT INTO `kargo_perusahaan` (`id`, `perusahaan_id`, `port_loading`, `port_discharge`, `freight`, `created_at`, `updated_at`) VALUES
(9, 6, 1, 2, 'WMBUWoMrBk Edit', '2023-12-31 10:03:28', '2023-12-31 13:21:28'),
(10, 6, 3, 4, '789789 Edit', '2023-12-31 10:03:28', '2023-12-31 13:21:28'),
(14, 6, 4, 4, '21212', '2023-12-31 15:04:31', '2023-12-31 15:04:31'),
(15, 6, 2, 3, 'ererere', '2023-12-31 15:04:31', '2023-12-31 15:04:31');

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
(5, '2023_12_29_155522_create_port_table', 1),
(6, '2023_12_30_011306_create_perusahaan_table', 1),
(7, '2023_12_30_022522_create_email_perusahaan_table', 1),
(8, '2023_12_30_101942_create_kargo_perusahaan_table', 1),
(9, '2023_12_31_020553_create_permission_tables', 2),
(10, '2023_12_31_145418_add_url_table', 3);

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
(1, 'App\\Models\\User', 1);

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
(1, 'view_port', 'web', '2023-12-30 19:39:27', '2023-12-30 19:39:27'),
(2, 'tambah_perusahaan', 'web', '2023-12-30 19:46:57', '2023-12-30 19:46:57');

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
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(150) NOT NULL,
  `kode_perusahaan` varchar(100) NOT NULL,
  `siup` varchar(100) NOT NULL,
  `npwp` varchar(16) NOT NULL,
  `cp` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `url`, `nama_perusahaan`, `kode_perusahaan`, `siup`, `npwp`, `cp`, `phone`, `alamat`, `created_at`, `updated_at`) VALUES
(6, 'Co-Hq492XsuH3xvrKYI09pRVUTrne9j8FF8Z1GbTdQ8fhJTHpr0Igsm60WG0NVTB1od', 'Perusahaan 1', 'K-Perusahaafdfda', '85675675', '67567576', 'Ati', '089364536475', 'Jl Adam Malik 2', '2023-12-31 10:03:28', '2023-12-31 12:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `port`
--

CREATE TABLE `port` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `port` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `port`
--

INSERT INTO `port` (`id`, `port`, `created_at`, `updated_at`) VALUES
(1, 'Nama Port 1 Edit', '2023-12-30 17:35:10', '2023-12-31 17:24:47'),
(2, 'Nama Port 2', '2023-12-30 17:35:16', '2023-12-30 17:35:43'),
(3, 'Nama Port 3', '2023-12-30 17:35:21', '2023-12-30 17:35:21'),
(4, 'Nama Port 4', '2023-12-30 17:35:25', '2023-12-30 17:35:25');

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
(1, 'superadmin', 'web', '2023-12-30 19:17:06', '2023-12-30 19:17:06'),
(2, 'pengguna', 'web', '2023-12-30 19:17:06', '2023-12-30 19:17:06'),
(3, 'hrd', 'web', '2023-12-31 18:10:25', '2023-12-31 18:17:58');

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
(2, 1);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin@gmail.com', '2023-12-30 17:31:26', '$2y$12$zPpYqaLc/k5VoXoq2I6AR.0Xp3EVCLQwAhwA7c9zRmKgVEnWHql/O', '29ohJUehUqEQCw4CzqiHqfwnYHuXM0yUWmD9xsqa0dWPdh48PssB3EXbItXN', '2023-12-30 17:31:27', '2023-12-30 17:31:27'),
(2, 'Pengguna', 'pengguna@gmail.com', '2023-12-30 19:59:15', '$2y$12$T7.6ClvAlziHX09oFpS6.OliB2z5hRGzt566KwyI8KK/tIw/Z3uIC', 'd8krHuPma8iE4yEh2SILOyF53lSS3RrqExZAFWDpmLaHRN4mYMyCV2qZd0b6', '2023-12-30 19:59:16', '2023-12-30 19:59:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_perusahaan`
--
ALTER TABLE `email_perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_perusahaan_perusahaan_id_foreign` (`perusahaan_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kargo_perusahaan`
--
ALTER TABLE `kargo_perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kargo_perusahaan_perusahaan_id_foreign` (`perusahaan_id`),
  ADD KEY `kargo_perusahaan_port_loading_foreign` (`port_loading`),
  ADD KEY `kargo_perusahaan_port_discharge_foreign` (`port_discharge`);

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
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port`
--
ALTER TABLE `port`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_perusahaan`
--
ALTER TABLE `email_perusahaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kargo_perusahaan`
--
ALTER TABLE `kargo_perusahaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `port`
--
ALTER TABLE `port`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `email_perusahaan`
--
ALTER TABLE `email_perusahaan`
  ADD CONSTRAINT `email_perusahaan_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kargo_perusahaan`
--
ALTER TABLE `kargo_perusahaan`
  ADD CONSTRAINT `kargo_perusahaan_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kargo_perusahaan_port_discharge_foreign` FOREIGN KEY (`port_discharge`) REFERENCES `port` (`id`),
  ADD CONSTRAINT `kargo_perusahaan_port_loading_foreign` FOREIGN KEY (`port_loading`) REFERENCES `port` (`id`);

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
