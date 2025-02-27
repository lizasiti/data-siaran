-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2025 at 02:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataaset`
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
-- Table structure for table `jadwal_siaran`
--

CREATE TABLE `jadwal_siaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penyiar` varchar(255) NOT NULL,
  `senin` varchar(255) DEFAULT NULL,
  `selasa` varchar(255) DEFAULT NULL,
  `rabu` varchar(255) DEFAULT NULL,
  `kamis` varchar(255) DEFAULT NULL,
  `jumat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_siaran`
--

INSERT INTO `jadwal_siaran` (`id`, `penyiar`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `created_at`, `updated_at`) VALUES
(1, 'Bella', NULL, '21:00 - 02:00', '14:00 - 20:00', '08:00 - 20:00', '07:00 - 14:00', '2025-02-12 09:52:06', '2025-02-12 09:52:06');

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
(5, '2025_01_31_141859_create_news_table', 1),
(6, '2025_02_10_132004_create_shift_penyiarans_table', 2),
(7, '2025_02_10_151531_create_siarans_table', 3),
(9, '2025_02_11_013657_create_penyiars_table', 4),
(10, '2025_02_11_043614_create_jadwals_table', 4),
(11, '2025_02_12_025655_rename_isi_berita_to_naskah_berita', 5),
(12, '2025_02_12_030328_rename_isi_berita_to_naskah_siaran', 6),
(13, '2025_02_12_152647_create_broadcast_schedules_table', 7),
(14, '2025_02_12_165016_create_jadwal_siarans_table', 8),
(15, '2025_02_14_133453_create_info_pro2s_table', 9),
(16, '2025_02_19_020002_create_programs_table', 10);

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
-- Table structure for table `penyiars`
--

CREATE TABLE `penyiars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyiars`
--

INSERT INTO `penyiars` (`id`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'FARIDA', 'penyiar/QYvQHU7etImxq7NAVPYKb4k8lUC2M9DsGMkbRfJz.jpg', '2025-02-11 23:34:37', '2025-02-16 21:24:34'),
(2, 'RIA MAGHFIROH', 'penyiar/geAVYgJ78NNBvH0kBtsbDbI9zJJOuVm1zvxIGBVR.jpg', '2025-02-12 06:50:16', '2025-02-16 21:25:23'),
(3, 'KHOIRUN NISAK', 'penyiar/aNxj6AZJa0uLWYFkeX714eOFCFFcAOwvdMHCrhZm.jpg', '2025-02-16 21:27:38', '2025-02-16 21:27:38'),
(4, 'INDAH FITRIANA', 'penyiar/9XJxkFXuSAYrTDohruNnK7YDtU94ygtAbf1QXRom.jpg', '2025-02-16 21:28:24', '2025-02-16 21:28:24'),
(5, 'REFKA KARKHI', 'penyiar/uuRswQUwMkjbM2NwL3vovZdGoKqQe1A2zLyqO4Es.jpg', '2025-02-16 21:28:44', '2025-02-16 21:28:44'),
(6, 'SANDRI SETIAWAN', 'penyiar/GgsKwZ8V9PHvA4XTDblUaOCbU6CNSsWQCFTKnYf2.jpg', '2025-02-16 21:29:05', '2025-02-16 21:29:05'),
(7, 'IZAL WAISUL KARNI', 'penyiar/QaOCdoWcM3P67d3R3wHXOIjMerbiraTEBBlknx8v.jpg', '2025-02-16 21:29:25', '2025-02-16 21:29:25');

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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `nama_program` varchar(255) NOT NULL,
  `waktu` date NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_penyiarans`
--

CREATE TABLE `shift_penyiarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_penyiar` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `naskah_siaran` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siarans`
--

CREATE TABLE `siarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `daypart` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `penyiar` varchar(255) NOT NULL,
  `interaksi_pendengar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siarans`
--

INSERT INTO `siarans` (`id`, `daypart`, `tanggal`, `penyiar`, `interaksi_pendengar`, `created_at`, `updated_at`) VALUES
(7, 'SPADA', '2025-02-01', 'intan', 'Via WhatsApp', '2025-02-19 06:54:05', '2025-02-23 05:05:57');

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$EgqjrBXUWBBAEI15dMKRdOODqRaKa1iXMp9FIRXhh60nTj7Dutahu', NULL, '2025-02-04 07:25:30', '2025-02-04 07:25:30');

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
-- Indexes for table `jadwal_siaran`
--
ALTER TABLE `jadwal_siaran`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `penyiars`
--
ALTER TABLE `penyiars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `shift_penyiarans`
--
ALTER TABLE `shift_penyiarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siarans`
--
ALTER TABLE `siarans`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_siaran`
--
ALTER TABLE `jadwal_siaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penyiars`
--
ALTER TABLE `penyiars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shift_penyiarans`
--
ALTER TABLE `shift_penyiarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `siarans`
--
ALTER TABLE `siarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
