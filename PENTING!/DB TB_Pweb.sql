-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 02:22 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_pweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `krs_id` bigint(20) UNSIGNED NOT NULL,
  `pertemuan_id` bigint(20) UNSIGNED NOT NULL,
  `jam_masuk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_keluar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `krs_id`, `pertemuan_id`, `jam_masuk`, `jam_keluar`, `durasi`, `created_at`, `updated_at`) VALUES
(170, 13, 3, '2:50:27', '3:14:19', '23m 52s', '2021-06-04 05:10:31', '2021-06-04 05:10:31'),
(171, 15, 3, '2:51:16', '3:14:18', '23m 2s', '2021-06-04 05:10:31', '2021-06-04 05:10:31'),
(172, 18, 2, '2:50:15', '3:14:17', '24m 1s', '2021-06-04 05:10:59', '2021-06-04 05:10:59'),
(173, 16, 2, '2:50:51', '3:14:19', '23m 27s', '2021-06-04 05:10:59', '2021-06-04 05:10:59'),
(174, 17, 2, '2:51:12', '3:14:10', '22m 57s', '2021-06-04 05:10:59', '2021-06-04 05:10:59'),
(175, 19, 47, '2:52:52', '3:14:11', '21m 19s', '2021-06-04 05:22:06', '2021-06-04 05:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kelas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_matkul` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matkul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `sks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `kode_matkul`, `nama_matkul`, `tahun`, `semester`, `sks`, `created_at`, `updated_at`) VALUES
(1, 'K001', 'TSI206', 'Bahasa Pemrograman Web', 2021, 4, 2, '2021-05-23 01:43:21', '2021-06-04 04:57:41'),
(2, 'K002', 'TSI208', 'Analisis & Perancangan Sistem Informasi', 2021, 4, 4, '2021-05-23 18:33:47', '2021-06-04 03:16:14'),
(3, 'K003', 'TSI104', 'Dasar Infastruktur Teknologi', 2020, 3, 4, '2021-05-25 01:04:00', '2021-06-04 03:16:05'),
(15, 'K004', 'PAM212', 'Kalkulus', 2019, 2, 3, '2021-06-02 13:45:13', '2021-06-04 03:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `kelas_id`, `mahasiswa_id`, `created_at`, `updated_at`) VALUES
(13, 1, 18, '2021-06-04 03:22:32', '2021-06-04 03:22:32'),
(14, 1, 22, '2021-06-04 03:22:38', '2021-06-04 03:22:38'),
(15, 1, 21, '2021-06-04 03:22:44', '2021-06-04 03:22:44'),
(16, 2, 24, '2021-06-04 04:58:37', '2021-06-04 04:58:37'),
(17, 2, 28, '2021-06-04 04:58:44', '2021-06-04 04:58:44'),
(18, 2, 20, '2021-06-04 04:58:49', '2021-06-04 04:58:49'),
(19, 3, 27, '2021-06-04 05:03:50', '2021-06-04 05:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `password`, `created_at`, `updated_at`) VALUES
(18, 'Fathia Rahma', '1911523013', 'fathia@gmail.com', '$2y$10$qiWUkKx2jqym16HhgmBBLu/2r7FKalg5k2SYNQRSa92plGLjxZOS6', '2021-06-03 22:04:20', '2021-06-04 00:26:17'),
(19, 'Laila Rahmatul Aufa', '1911522013', 'aufawelza@gmail.com', '$2y$10$.SZFr01aPZhSvn596vxB7OAWNoPUSgfF4RSHNfyCVehuIptvn8nbi', '2021-06-03 22:05:55', '2021-06-03 22:05:55'),
(20, 'Miftah Mussaumi Adi', '1911522009', 'miftah@gmail.com', '$2y$10$0O/76JmVcvG2hrrYwT9LSuFestyuStfQ05Yd9Q2nW77tTeK18d.bG', '2021-06-03 22:06:06', '2021-06-03 22:06:06'),
(21, 'M Ravy Octa Nugraha', '1911523007', 'ravy@gmail.com', '$2y$10$Vlrd7v1rIX2jsRUy6bBq8utMR8lwjFrFrnN/sR3NFfN0h5CwG2rk2', '2021-06-03 22:10:47', '2021-06-03 22:10:47'),
(22, 'M Kevin Beslia', '1911523009', 'kevin@gmail.com', '$2y$10$oLP5za.RbfrjNz/k3AY7n.BjKATyPV7csuByGzCallFvMFKiLlOGe', '2021-06-03 22:11:05', '2021-06-03 22:11:05'),
(23, 'Nadya Gusdita', '1911521001', 'nadya@gmail.com', '$2y$10$Kv.OSB.a8XEHIWXp1V5WTevL/vSQITfGKyO7xB0Smss3lk0bYfwG6', '2021-06-04 02:29:31', '2021-06-04 04:57:58'),
(24, 'Rivonny Wulandari', '1911522019', 'vony@gmail.com', '$2y$10$ulLknC1rGKmh5BMmKjbkTuU1ibOZIY/lrYI4oARQ2PGuPSeRhR0Sa', '2021-06-04 02:57:43', '2021-06-04 02:57:43'),
(25, 'Ade Iqbal', '1911521025', 'iqbal@gmail.com', '$2y$10$GLOLlg1vjs97KmqNghScAewB/6qPiD8XquDwK6fD5j.ZJsoTWHtVm', '2021-06-04 02:58:16', '2021-06-04 02:58:16'),
(26, 'Hadef Petriza', '1911521007', 'hadef@gmail.com', '$2y$10$adgrHyVR9ScSdm5Ld/3IIedUJs9OCkLZMf2dVJEuKmtSSxASFx2Si', '2021-06-04 02:59:19', '2021-06-04 02:59:19'),
(27, 'Regita tjahjantari', '1911522021', 'gita@gmail.com', '$2y$10$X1/3bD8O06Q5KcjUKgBeze7K44VJs72E6ApH97G7OFhhgw80u0.wi', '2021-06-04 02:59:46', '2021-06-04 02:59:46'),
(28, 'Immalatunil Khaira', '1911522017', 'imma@gmail.com', '$2y$10$HxH.eWQI.HwskdrdpZ6lvu6MOR8MsrNIt9WuzU1RSAJZp7isoxC/i', '2021-06-04 03:00:24', '2021-06-04 03:00:24'),
(29, 'Dhiya Nabila Denta', '1911523021', 'didi@gmail.com', '$2y$10$wGMmOmoNtzkUOa712ElmU.cLq4Om0Cu8jMPzDefoA8k.o9HlGuEMG', '2021-06-04 03:00:47', '2021-06-04 03:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(32, '2021_05_20_040949_create_kelas_table', 1),
(33, '2021_05_20_043533_create_mahasiswa_table', 1),
(34, '2021_05_20_043728_create_pertemuan_table', 1),
(35, '2021_05_20_043808_create_absensi_table', 1),
(36, '2021_05_20_053040_create_krs_table', 1),
(44, '2014_10_12_000000_create_users_table', 2),
(45, '2014_10_12_100000_create_password_resets_table', 2),
(46, '2019_08_19_000000_create_failed_jobs_table', 2),
(47, '2021_05_21_040257_create_kelas_table', 2),
(48, '2021_05_21_040502_create_mahasiswa_table', 2),
(49, '2021_05_21_040545_create_krs_table', 2),
(50, '2021_05_21_040617_create_pertemuan_table', 2),
(51, '2021_05_21_040639_create_absensi_table', 2),
(52, '2021_05_31_080126_create_absensi_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan`
--

CREATE TABLE `pertemuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `materi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertemuan`
--

INSERT INTO `pertemuan` (`id`, `kelas_id`, `pertemuan_ke`, `tanggal`, `materi`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-05-23', 'sdfsdfsv', '2021-05-23 02:02:41', '2021-05-23 02:02:41'),
(2, 2, 1, '2021-05-24', 'dfgfdgdf', '2021-05-23 22:14:32', '2021-05-23 22:14:32'),
(3, 1, 1, '2021-05-24', 'dfre', NULL, NULL),
(4, 1, 3, '2021-05-25', 'ini pertemuan 3', '2021-05-25 01:18:18', '2021-05-25 01:18:18'),
(5, 1, 4, '2021-05-13', 'r', '2021-05-25 03:36:35', '2021-05-25 03:36:35'),
(6, 1, 5, '2021-05-27', 'f', '2021-05-25 23:31:59', '2021-05-25 23:31:59'),
(7, 1, 6, '2021-05-27', 'enam', '2021-05-27 02:37:35', '2021-05-27 02:37:35'),
(44, 1, 7, '2021-05-29', 'fhgvhgv', '2021-05-28 13:43:05', '2021-05-28 13:43:05'),
(45, 3, 1, '2021-05-29', 'satu', '2021-05-28 23:19:03', '2021-05-28 23:19:03'),
(46, 3, 3, '2021-05-30', '233', '2021-05-29 20:36:02', '2021-05-29 20:36:02'),
(47, 3, 2, '2021-05-30', '1', '2021-05-29 20:36:18', '2021-05-29 20:36:18'),
(48, 2, 2, '2021-06-04', 'Pertemuan 4', '2021-06-04 05:02:49', '2021-06-04 05:02:49'),
(49, 3, 4, '2021-06-04', 'Pertemuan ke 4', '2021-06-04 05:04:15', '2021-06-04 05:04:15'),
(50, 15, 1, '2021-06-04', 'Pertemuan 1', '2021-06-04 05:05:00', '2021-06-04 05:05:00'),
(51, 15, 2, '2021-06-04', 'Pertemuan ke-2', '2021-06-04 05:05:52', '2021-06-04 05:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, 'Admin 1', 'miftahmussaumi84@gmail.com', NULL, '$2y$10$b2b5SkUArhmtifGX4FRbkOfcml94ydTUgtzkSwYPi1411M9e2g6w6', 'C16X8yJcNMAtrsbJHYSEk1Ddp91ci1J3C6cBfgvUbJS2CYyA8EpndCXTQw4z', '2021-05-22 17:26:09', '2021-05-22 17:26:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_krs_id_foreign` (`krs_id`),
  ADD KEY `absensi_pertemuan_id_foreign` (`pertemuan_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `krs_kelas_id_foreign` (`kelas_id`),
  ADD KEY `krs_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertemuan_kelas_id_foreign` (`kelas_id`);

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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_krs_id_foreign` FOREIGN KEY (`krs_id`) REFERENCES `krs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_pertemuan_id_foreign` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD CONSTRAINT `pertemuan_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
