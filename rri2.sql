-- phpMyAdmin SQL Dump
-- version 5.2.2-1.fc40
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2025 at 02:17 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rri2`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `judul`, `deskripsi`, `jam_mulai`, `jam_selesai`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'SPADA', 'Diskusi interaktif tentang topik aktual.', '06:00:00', '09:00:00', 'jadwal-siaran/BVZ2AZxF7MC66Ucg3xgQ09uf5QyfY2EX8dzZSA0d.png', '2025-04-11 11:28:52', '2025-04-12 21:36:39'),
(3, 'TEKA-TEKI SUMENEP', 'Kuis berbahasa Madura untuk menguji pengetahuan budaya lokal.', '06:30:00', '07:00:00', 'jadwal-siaran/EA34H7hM9s9c282yjHBeQfrvKEhH06255We4R2uw.png', '2025-04-11 11:29:37', '2025-04-11 11:39:52'),
(4, 'AKU PILIH KAMU', 'Mengajak pendengar memilih salah satu pilihan seru dengan gimmick kreatif dan interaktif.', '07:00:00', '08:00:00', 'jadwal-siaran/kSvxhy6TLXtT6XJxihYhdkQI3bATWNR2Ztt4gH3z.jpg', '2025-04-11 11:41:48', '2025-04-11 11:41:48'),
(5, 'PRO2 HITLIST', 'Mengulas lagu-lagu hits terbaru.', '10:00:00', '12:00:00', 'jadwal-siaran/vyB4PZO8xobA6YL1dIa1Rfstu64GKaucsXLZ4Ggi.jpg', '2025-04-11 11:44:00', '2025-04-11 11:44:00'),
(6, 'SANTAI SIANG', 'Program siang yang berisi (Dengan format majalah udara).', '12:00:00', '16:00:00', 'jadwal-siaran/QxmsHe1uykHLPBV71V5qyY14Yo8yVASOjhZ0nbKR.png', '2025-04-11 11:45:05', '2025-04-11 11:45:05'),
(7, 'SORE CERIA', 'Program dengan musik ceria dan obrolan santai di sore hari.', '16:00:00', '20:00:00', 'jadwal-siaran/1ikDysQ0nVmxQeLljJOoV7JPT0U8TZGyqtVVTbjp.png', '2025-04-11 11:46:07', '2025-04-11 11:46:07'),
(8, 'JAGA MALAM', 'Musik santai menemani malam hingga tengah malam.', '20:00:00', '23:59:00', 'jadwal-siaran/jdv6jRqX2BHtpwTSnfknP5aC68pFSPosj3NETmnf.png', '2025-04-11 11:50:07', '2025-04-11 11:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_siaran`
--

CREATE TABLE `jadwal_siaran` (
  `id` bigint UNSIGNED NOT NULL,
  `penyiar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selasa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rabu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kamis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
(16, '2025_02_19_020002_create_programs_table', 10),
(17, '2025_04_11_132904_create_table_jadwal_table', 11),
(18, '2025_04_12_024047_create_weekly_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyiars`
--

CREATE TABLE `penyiars` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `nama_program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` date NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_penyiarans`
--

CREATE TABLE `shift_penyiarans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penyiar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `naskah_siaran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shift_penyiarans`
--

INSERT INTO `shift_penyiarans` (`id`, `nama_penyiar`, `hari`, `jam_mulai`, `jam_selesai`, `naskah_siaran`, `created_at`, `updated_at`) VALUES
(17, 'jksf', 'Rabu', '02:10:00', '03:00:00', 'djajshjh', '2025-04-12 11:35:04', '2025-04-12 11:35:04'),
(18, 'jksf', 'Senin', '08:00:00', '08:30:00', 'gfhfgg', '2025-04-13 06:07:38', '2025-04-13 06:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `siarans`
--

CREATE TABLE `siarans` (
  `id` bigint UNSIGNED NOT NULL,
  `daypart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `penyiar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interaksi_pendengar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$EgqjrBXUWBBAEI15dMKRdOODqRaKa1iXMp9FIRXhh60nTj7Dutahu', NULL, '2025-02-04 07:25:30', '2025-02-04 07:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `weekly`
--

CREATE TABLE `weekly` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `hari` enum('sabtu','minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weekly`
--

INSERT INTO `weekly` (`id`, `judul`, `deskripsi`, `gambar`, `jam_mulai`, `jam_selesai`, `hari`, `created_at`, `updated_at`) VALUES
(3, 'PRO2 CLASS', 'Program edukatif yang menyajikan informasi dan wawasan menarik.', 'weekly/aYC6T8Dc2W4ReLzC4RYbO6I1dBtHP7jsYUbnC2El.png', '16:00:00', '17:00:00', 'minggu', '2025-04-11 20:18:17', '2025-04-12 04:15:14'),
(4, 'SINGLE OF THE WEEK', 'Mengulas 20 lagu terpopuler minggu ini.', 'weekly/cIRq2qkjQqRkLJZayB1b9Mopn9FTp068iqYAhJnV.jpg', '20:00:00', '21:00:00', 'minggu', '2025-04-12 04:16:07', '2025-04-12 04:16:07'),
(5, 'RESENSI BUKU', 'Mengulas buku - buku menarik dengan pembahasan ringan dan informatif.', 'weekly/OPUAFdz0vPmD9Cm3nuwecrbzX2jFL2U0YTAzEOTc.jpg', '16:00:00', '17:00:00', 'sabtu', '2025-04-12 04:16:58', '2025-04-12 04:16:58'),
(6, 'TOP 20 COUNTDOWN', 'Mengulas lagu terpopuler dari Indo dan Inter.', 'weekly/y7GmB9ClZZaztet8VhAPdpBeKgMZdkD41k2rQXuf.jpg', '14:00:00', '16:00:00', 'sabtu', '2025-04-12 04:17:55', '2025-04-12 04:17:55');

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
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `weekly`
--
ALTER TABLE `weekly`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jadwal_siaran`
--
ALTER TABLE `jadwal_siaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penyiars`
--
ALTER TABLE `penyiars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shift_penyiarans`
--
ALTER TABLE `shift_penyiarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `siarans`
--
ALTER TABLE `siarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `weekly`
--
ALTER TABLE `weekly`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
