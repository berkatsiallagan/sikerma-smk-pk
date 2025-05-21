-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 09:32 AM
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
-- Database: `sikerma_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian_pengguna`
--

CREATE TABLE `bagian_pengguna` (
  `id_bagian` int(11) NOT NULL,
  `bagian_pengguna` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bagian_pengguna`
--

INSERT INTO `bagian_pengguna` (`id_bagian`, `bagian_pengguna`) VALUES
(1, 'Humas'),
(2, 'TU_IF'),
(3, 'TU_EL'),
(4, 'TU_MS'),
(5, 'TU_MB'),
(6, 'Development');

-- --------------------------------------------------------

--
-- Table structure for table `bidang_kerja_sama`
--

CREATE TABLE `bidang_kerja_sama` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bidang_kerja_sama`
--

INSERT INTO `bidang_kerja_sama` (`id_bidang`, `nama_bidang`) VALUES
(1, 'pendidikan'),
(2, 'penelitian'),
(3, 'pengabdian kepada masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `no_kerja_sama` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `status` enum('aktif','tidak aktif','kadaluarsa','') NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `no_kerja_sama`, `dokumen`, `status`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, '022/MOU.PL\r\n29/III/2017', 'dokumen1.pdf', 'kadaluarsa', '2017-07-07', '2022-08-08'),
(2, '05/MOU.PL29/\r\nII/2018', 'dokumen2.pdf', 'aktif', '2018-07-07', '2028-08-08'),
(4, 'MEM-003', 'uploads/6803c40202711_P4_PART1_TRPL2C_PAGI_4342401085.pdf', '', '2025-04-19', '2025-04-26'),
(5, 'MEM-004', 'uploads/68051ac98a974_P4_PART1_TRPL2C_PAGI_4342401085.pdf', '', '2025-04-19', '2025-04-23');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kerja_sama`
--

CREATE TABLE `kerja_sama` (
  `id_kerja_sama` int(11) NOT NULL,
  `no_kerja_sama` varchar(255) NOT NULL,
  `id_ajuan` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `jenis_kerja_sama` enum('Memorandum of Understanding (MoU)','Memorandum of Agreement (MoA)','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kerja_sama`
--

INSERT INTO `kerja_sama` (`id_kerja_sama`, `no_kerja_sama`, `id_ajuan`, `id_unit`, `id_bidang`, `jenis_kerja_sama`) VALUES
(1, '022/MOU.PL29/III/2\r\n017', 1, 1, 1, 'Memorandum of Understanding (MoU)'),
(2, '022/MOU.PL29/III/2\r\n017', 1, 2, 2, 'Memorandum of Understanding (MoU)'),
(3, '022/MOU.PL29/III/2\r\n017', 1, 3, 3, 'Memorandum of Understanding (MoU)'),
(4, '05/MOU.PL29/II/2018 ', 2, 4, 1, 'Memorandum of Agreement (MoA)'),
(5, '05/MOU.PL29/II/2018 ', 2, 5, 2, 'Memorandum of Agreement (MoA)'),
(6, 'MEM-003', 3, 2, 1, 'Memorandum of Understanding (MoU)'),
(7, 'MEM-004', 4, 2, 1, 'Memorandum of Understanding (MoU)');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

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
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_ajuan` int(11) NOT NULL,
  `NIP` varchar(18) NOT NULL,
  `nama_mitra` varchar(255) NOT NULL,
  `tanggal_ajuan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_ajuan`, `NIP`, `nama_mitra`, `tanggal_ajuan`) VALUES
(1, '199008172020041066', 'PT. Sumitomo', '2025-03-10'),
(2, '197501012003100377', 'PT. Panasonic', '2025-03-10'),
(3, '000', 'sumitomo', '2025-04-19'),
(4, '000', 'sumitomo', '2025-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `NIP` varchar(18) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `peran` enum('Admin','Super admin','Development','') NOT NULL,
  `status` enum('aktif','tidak aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`NIP`, `id_bagian`, `nama_lengkap`, `email`, `kata_sandi`, `peran`, `status`) VALUES
('000', 6, 'PBL215', 'pbl215@gmail.com', '$2y$10$9CswtQ4VeN2QPYdCXAT9auLf3MhIAuSuuB66il.lDKtaMzSorRpXS', 'Development', 'aktif'),
('197501012003100377', 3, 'Prakarta Jaya', 'jaya@gmail.com', '$2y$10$.lyoEtKvtILuC6Yf6lFWtOsmLXK.2P0GwMVT/MGJaWNSs.8swOblC', 'Admin', 'aktif'),
('199008172020041066', 2, 'Joko Wijaka', 'joko@gmail.com', '$2y$10$1FbayZzLhDf2D55kGQvrrOgqWTEA7bdRbEcCm.JHmVMjCt49hG.Te', 'Admin', 'aktif'),
('199608182022041001', 1, 'Budiyono', 'budi@gmail.com', '$2y$10$U5N0h8kn9BjJbY5cJY2PCu6BOytMRy1FWUZSs3qZw3k3rBiaz.wvy', 'Super admin', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3m3N0trdOk0jCpgUMiLrEE90h4rtLkmyHaOO8L19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0s3YncwYm5pYTUzYk9JTEhmTEdOazN5N3k0TmxJbUo3dVBBWmlMSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbC8yQy1QYWdpLTIwMjUtU2lrZXJtYS1TTUtQSy9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746781381),
('Mp6m8MIJB4yFH3wuyMk9kH61boMXzkTcBwtWj8qf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWd3NW1YZHd1bVZ3dnFVRUVlSzhEbXhoTkZ4OGxUQVJZWUhEdGV0MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tb25pdG9yaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1746799500),
('njGLq0ZtjbXYhez8Gi1KIZMELlELUek9pWsb3HVd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDc3VXpCVUtyTkNmdnJUcFZNZjBFRkpRR3lObjJZNVBCeXBmelV1WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tb25pdG9yaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1746780498),
('Re70dR6PuAuHW6lemO1jBR8uUjIvocecSbIidxer', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2Z2TmdRcWQ0MDBrVDhuYlRXallhRXZtVFdZMU1JU3NualZITms0WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tb25pdG9yaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1747711957);

-- --------------------------------------------------------

--
-- Table structure for table `unit_pengaju`
--

CREATE TABLE `unit_pengaju` (
  `id_unit` int(11) NOT NULL,
  `unit_pengaju` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_pengaju`
--

INSERT INTO `unit_pengaju` (`id_unit`, `unit_pengaju`) VALUES
(1, 'Koordinator Perencanaan'),
(2, 'Humas'),
(3, 'Unit Kerjasama'),
(4, 'Pusat Penelitian'),
(5, 'Pengabdian Masyarakat\r\n');

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$4oRxm7692W2i3ccGy5et3Ow2OXzmfvsVlMghW8DLHXTG2p36sz1VS', NULL, '2025-05-01 01:09:06', '2025-05-01 01:09:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian_pengguna`
--
ALTER TABLE `bagian_pengguna`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `bidang_kerja_sama`
--
ALTER TABLE `bidang_kerja_sama`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD UNIQUE KEY `no_kerja_sama` (`no_kerja_sama`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kerja_sama`
--
ALTER TABLE `kerja_sama`
  ADD PRIMARY KEY (`id_kerja_sama`),
  ADD KEY `id_ajuan` (`id_ajuan`),
  ADD KEY `id_unit` (`id_unit`),
  ADD KEY `id_bidang` (`id_bidang`);

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
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_ajuan`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `id_bagian` (`id_bagian`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `unit_pengaju`
--
ALTER TABLE `unit_pengaju`
  ADD PRIMARY KEY (`id_unit`);

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
-- AUTO_INCREMENT for table `bagian_pengguna`
--
ALTER TABLE `bagian_pengguna`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bidang_kerja_sama`
--
ALTER TABLE `bidang_kerja_sama`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kerja_sama`
--
ALTER TABLE `kerja_sama`
  MODIFY `id_kerja_sama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_ajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unit_pengaju`
--
ALTER TABLE `unit_pengaju`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kerja_sama`
--
ALTER TABLE `kerja_sama`
  ADD CONSTRAINT `kerja_sama_ibfk_1` FOREIGN KEY (`id_ajuan`) REFERENCES `pengajuan` (`id_ajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kerja_sama_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unit_pengaju` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kerja_sama_ibfk_3` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_kerja_sama` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk1` FOREIGN KEY (`NIP`) REFERENCES `pengguna` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian_pengguna` (`id_bagian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
