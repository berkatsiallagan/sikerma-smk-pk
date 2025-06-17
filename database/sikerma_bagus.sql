-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 06:02 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `kata_sandi`) VALUES
(1, 'admin@gmail.com', '$2y$12$4oRxm7692W2i3ccGy5et3Ow2OXzmfvsVlMghW8DLHXTG2p36sz1VS');

-- --------------------------------------------------------

--
-- Table structure for table `ajuan`
--

CREATE TABLE `ajuan` (
  `id_ajuan` int(11) NOT NULL,
  `tanggal_ajuan` date NOT NULL DEFAULT current_timestamp(),
  `id_admin` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ajuan`
--

INSERT INTO `ajuan` (`id_ajuan`, `tanggal_ajuan`, `id_admin`, `created_at`, `updated_at`) VALUES
(1, '2025-03-10', 1, '2025-06-10 07:10:20', '2025-06-10 07:10:20'),
(2, '2025-03-10', 1, '2025-06-10 07:10:20', '2025-06-10 07:10:20'),
(3, '2025-04-19', 1, '2025-06-10 07:10:20', '2025-06-10 07:10:20'),
(4, '2025-04-20', 1, '2025-06-10 07:10:20', '2025-06-10 07:10:20'),
(5, '2025-06-10', NULL, '2025-06-10 07:38:30', '2025-06-10 07:38:30'),
(6, '2025-06-10', NULL, '2025-06-10 08:03:26', '2025-06-10 08:03:26'),
(8, '2025-06-16', NULL, '2025-06-16 03:28:00', '2025-06-16 03:28:00'),
(12, '2025-06-16', NULL, '2025-06-16 03:40:15', '2025-06-16 03:40:15'),
(14, '2025-06-16', NULL, '2025-06-16 04:19:16', '2025-06-16 04:19:16'),
(15, '2025-06-17', NULL, '2025-06-17 02:02:26', '2025-06-17 02:02:26'),
(18, '2025-06-17', NULL, '2025-06-17 02:37:24', '2025-06-17 02:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `bidang_kerjasama`
--

CREATE TABLE `bidang_kerjasama` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bidang_kerjasama`
--

INSERT INTO `bidang_kerjasama` (`id_bidang`, `nama_bidang`) VALUES
(1, 'pendidikan'),
(2, 'penelitian'),
(3, 'pengabdian kepada masyarakat'),
(4, 'digitalisasi produk');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `status` enum('aktif','tidak aktif','kadaluarsa','') DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `catatan`, `dokumen`, `status`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, '', 'dokumencoba', 'tidak aktif', '2025-05-07', '2025-05-16'),
(2, 'qwer', NULL, 'aktif', NULL, NULL),
(3, 'wow', NULL, 'aktif', NULL, NULL),
(4, '123456', NULL, 'aktif', NULL, NULL),
(5, 'qwertyhj', NULL, 'aktif', NULL, NULL),
(6, 'asdfgy', NULL, 'aktif', NULL, NULL),
(7, 'wergfhn', NULL, 'aktif', NULL, NULL),
(8, 'qwef', NULL, 'aktif', NULL, NULL),
(9, 'qwef', NULL, 'aktif', NULL, NULL),
(10, 'qwert', NULL, 'aktif', NULL, NULL),
(11, 'qwer', NULL, 'aktif', NULL, NULL),
(13, 'qwerty', 'dokumen/pD3mXnett0vB2BGQ02V4xzK9wdwUhM6ZvlvmHg7o.pdf', 'aktif', NULL, NULL),
(17, 'qwe56yhn', 'dokumen/BImIU8hbERTAvbBLCMjTFxD3t71lP4zaTEi7SqXX.pdf', 'aktif', NULL, NULL),
(19, 'wesrd', 'dokumen/su9SRtSK4tY9hDTrsY9KlWRryBK4SkOzphzc90aJ.pdf', 'aktif', NULL, NULL),
(20, 'qwerty', 'dokumen/yNtxqgjwAnQ6nqSpnEmXXb3BtjGEpqTnAdQILwp7.pdf', 'aktif', NULL, NULL),
(21, 'PLIZ WORK', 'dokumen/HuNZt77PT3F0gQgV9DNZRWIofKUBtKw5UDkmKA1Z.pdf', 'aktif', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Desain Komunikasi Visual'),
(2, 'Rekayasa Perangkat Lunak'),
(3, 'Teknik Instalasi Tenaga Listrik'),
(4, 'Teknik Jaringan Akses Telekomunikasi'),
(5, 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `kerjasama`
--

CREATE TABLE `kerjasama` (
  `id_kerjasama` int(11) NOT NULL,
  `id_ajuan` int(11) NOT NULL,
  `id_pemohon` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `id_dokumen` int(11) NOT NULL,
  `jenis_kerjasama` enum('Memorandum of Understanding (MoU)','Memorandum of Agreement (MoA)') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kerjasama`
--

INSERT INTO `kerjasama` (`id_kerjasama`, `id_ajuan`, `id_pemohon`, `id_mitra`, `id_bidang`, `id_dokumen`, `jenis_kerjasama`) VALUES
(1, 12, 11, 20, NULL, 17, 'Memorandum of Understanding (MoU)'),
(2, 14, 12, 22, NULL, 19, 'Memorandum of Understanding (MoU)'),
(3, 15, 13, 23, NULL, 20, 'Memorandum of Understanding (MoU)'),
(4, 18, 14, 25, NULL, 21, 'Memorandum of Understanding (MoU)');

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
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_07_103437_create_form_data_table', 2),
(5, '2025_06_09_033145_create_employees_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `nama_mitra` varchar(255) NOT NULL,
  `lingkup` enum('Nasional','Internasional') DEFAULT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_mitra`, `lingkup`, `website`, `email`) VALUES
(1, 'PT. Infineon', 'Nasional', 'https://www.infineon.com', 'infineon@gmail.com'),
(2, 'PT. Berkat Sentosa', 'Nasional', 'https://chat.deepseek.com', 'flowtunder@gmail.com'),
(3, 'PT. Berkat Sentosa', 'Nasional', 'https://chat.deepseek.com', 'flowtunder@gmail.com'),
(4, 'PT. Berkat Sentosa', 'Nasional', 'https://chat.deepseek.com', 'flowtunder@gmail.com'),
(5, 'PT. Berkat Sentosa', 'Nasional', 'https://chat.deepseek.com', 'flowtunder@gmail.com'),
(6, 'PT. Fajar Jaya', 'Internasional', 'https://fadil.com', 'dwe@gmail.com'),
(7, 'PT. Bagus Raya', 'Nasional', 'https://fajar.com', 'harimuktibagus@gmail.com'),
(8, 'PT. Fajar Jaya', 'Internasional', 'https://fadil.com', 'flowtunder@gmail.com'),
(9, 'PT. Fajar Jaya', 'Nasional', 'https://chat.deepseek.com', 'admin@gmail.com'),
(10, 'PT. Berkat Sentosa', 'Nasional', 'https://chat.deepseek.com', 'admin@gmail.com'),
(11, 'PT. Berkat Sentosa', 'Nasional', 'https://chat.deepseek.com', 'flowtunder@gmail.com'),
(12, 'PT. Berkat Sentosa', 'Nasional', 'https://chat.deepseek.com', 'flowtunder@gmail.com'),
(13, 'PT. Fajar Jaya', 'Nasional', 'https://chat.deepseek.com', 'dwe@gmail.com'),
(14, 'PT. Fajar Jaya', 'Nasional', 'https://fadil.com', 'admin@gmail.com'),
(16, 'PT. Fajar Jaya', 'Nasional', 'https://fadil.com', 'dwe@gmail.com'),
(20, 'PT. Fajar Jaya', 'Nasional', 'https://chat.deepseek.com', 'harimuktibagus@gmail.com'),
(22, 'PT. Berkat Sentosa', 'Nasional', 'https://chat.deepseek.com', 'avivaharry.20@gmail.com'),
(23, 'PT. Berkat Sentosa', 'Nasional', 'https://chat.deepseek.com', 'flowtunder@gmail.com'),
(25, 'PT. Bagus Raya', 'Internasional', 'https://fajar.com', 'harimuktibagus@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE `pemohon` (
  `id_pemohon` int(11) NOT NULL,
  `no_permohonan` varchar(15) NOT NULL,
  `nama_pemohon` varchar(30) NOT NULL,
  `nomor_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`id_pemohon`, `no_permohonan`, `nama_pemohon`, `nomor_telp`) VALUES
(2, 'PMH02', 'sfxdcvgyu', '0778421558'),
(3, 'PMH03', 'paldi', '0778421558'),
(4, 'PMH04', 'paldi', '0778421558'),
(5, 'PMH05', 'paldi', '0778421558'),
(6, 'PMH06', 'paldi', '0778421558'),
(7, 'PMH07', 'bagus', '0778421558'),
(8, 'PMH08', 'bagus', '0778421558'),
(9, 'PMH09', 'bagus', '0778421558'),
(10, 'PMH10', 'bagus', '0778421558'),
(11, 'PMH11', 'paldi', '0778421558'),
(12, 'PMH12', 'bagus', '0778421558'),
(13, 'PMH13', 'bambang', '0778-4215-58'),
(14, 'PMH14', 'bambang', '0778-4215-58');

-- --------------------------------------------------------

--
-- Table structure for table `pemohon_bidang`
--

CREATE TABLE `pemohon_bidang` (
  `id_bidang` int(11) NOT NULL,
  `id_pemohon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemohon_bidang`
--

INSERT INTO `pemohon_bidang` (`id_bidang`, `id_pemohon`) VALUES
(1, 12),
(2, 12),
(2, 13),
(2, 14),
(3, 12),
(3, 13),
(4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `pemohon_jurusan`
--

CREATE TABLE `pemohon_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_pemohon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemohon_jurusan`
--

INSERT INTO `pemohon_jurusan` (`id_jurusan`, `id_pemohon`) VALUES
(1, 10),
(1, 12),
(1, 13),
(2, 11),
(2, 12),
(2, 13),
(3, 11),
(3, 12),
(3, 14),
(4, 12),
(5, 10),
(5, 12),
(5, 13);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('YI0xcYnwhwSl71fB9GhZhVdpNjeugxZqRzV8SNpk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMkt6SHprYXZqbDc1d0NrblQwTW5wVjFsT3J5am9qOGZrNENneHhBVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW5nYWp1YW4ta2VyamFzYW1hIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo4OiJhZG1pbl9pZCI7aToxO3M6MTE6ImFkbWluX2VtYWlsIjtzOjE1OiJhZG1pbkBnbWFpbC5jb20iO30=', 1750126141);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD PRIMARY KEY (`id_ajuan`),
  ADD KEY `fk1_id_admin` (`id_admin`);

--
-- Indexes for table `bidang_kerjasama`
--
ALTER TABLE `bidang_kerjasama`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD PRIMARY KEY (`id_kerjasama`),
  ADD KEY `id_ajuan` (`id_ajuan`),
  ADD KEY `id_bidang` (`id_bidang`),
  ADD KEY `fk1_id_pemohon` (`id_pemohon`),
  ADD KEY `fk1_id_dokumen` (`id_dokumen`),
  ADD KEY `fk1_id_mitra` (`id_mitra`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id_pemohon`),
  ADD UNIQUE KEY `no_permohonan` (`no_permohonan`);

--
-- Indexes for table `pemohon_bidang`
--
ALTER TABLE `pemohon_bidang`
  ADD UNIQUE KEY `unique_pemohon_bidang` (`id_bidang`,`id_pemohon`),
  ADD KEY `id_pemohon` (`id_pemohon`);

--
-- Indexes for table `pemohon_jurusan`
--
ALTER TABLE `pemohon_jurusan`
  ADD UNIQUE KEY `unique_pemohon_jurusan` (`id_jurusan`,`id_pemohon`),
  ADD KEY `id_pemohon` (`id_pemohon`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajuan`
--
ALTER TABLE `ajuan`
  MODIFY `id_ajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kerjasama`
--
ALTER TABLE `kerjasama`
  MODIFY `id_kerjasama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD CONSTRAINT `fk1_id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD CONSTRAINT `fk1_id_dokumen` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk1_id_mitra` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id_mitra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk1_id_pemohon` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kerjasama_ibfk_1` FOREIGN KEY (`id_ajuan`) REFERENCES `ajuan` (`id_ajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kerjasama_ibfk_3` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_kerjasama` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemohon_bidang`
--
ALTER TABLE `pemohon_bidang`
  ADD CONSTRAINT `pemohon_bidang_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_kerjasama` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemohon_bidang_ibfk_2` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemohon_jurusan`
--
ALTER TABLE `pemohon_jurusan`
  ADD CONSTRAINT `pemohon_jurusan_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemohon_jurusan_ibfk_2` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
