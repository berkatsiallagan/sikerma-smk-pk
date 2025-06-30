-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2025 at 06:10 AM
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
-- Database: `sikerma_db_restructured`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_dokumen_status_batch` ()   BEGIN
    UPDATE dokumen 
    SET status = 'Kadaluarsa'
    WHERE tanggal_selesai < CURDATE()
    AND status != 'Tidak Aktif';

    UPDATE dokumen 
    SET status = 'Akan Berakhir'
    WHERE tanggal_selesai >= CURDATE() 
    AND DATEDIFF(tanggal_selesai, CURDATE()) <= 30
    AND status != 'Tidak Aktif';

    UPDATE dokumen 
    SET status = 'Aktif'
    WHERE tanggal_selesai >= CURDATE() 
    AND DATEDIFF(tanggal_selesai, CURDATE()) > 30
    AND status NOT IN ('Kadaluarsa', 'Tidak Aktif', 'Akan Berakhir');
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `kata_sandi`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$PUopdhNrDMn2Oz7mgpn3Ye3hytvOhzK7Mb2FEzMUkaG6o6yMuKvk2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ajuan`
--

CREATE TABLE `ajuan` (
  `id_ajuan` bigint(20) UNSIGNED NOT NULL,
  `tanggal_ajuan` date NOT NULL DEFAULT current_timestamp(),
  `id_admin` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ajuan`
--

INSERT INTO `ajuan` (`id_ajuan`, `tanggal_ajuan`, `id_admin`, `created_at`, `updated_at`) VALUES
(1, '2025-01-15', NULL, NULL, NULL),
(2, '2025-02-20', NULL, NULL, NULL),
(3, '2025-03-10', NULL, NULL, NULL),
(4, '2025-04-05', NULL, NULL, NULL),
(5, '2025-05-12', NULL, NULL, NULL),
(6, '2025-06-18', NULL, NULL, NULL),
(7, '2025-07-22', NULL, NULL, NULL),
(8, '2025-08-30', NULL, NULL, NULL),
(9, '2025-09-14', NULL, NULL, NULL),
(10, '2025-10-25', NULL, NULL, NULL),
(11, '2025-11-08', NULL, NULL, NULL),
(12, '2025-12-03', NULL, NULL, NULL),
(13, '2026-01-17', NULL, NULL, NULL),
(14, '2026-02-21', NULL, NULL, NULL),
(15, '2026-03-09', NULL, NULL, NULL),
(17, '2025-06-29', NULL, NULL, NULL),
(18, '2025-06-30', NULL, NULL, NULL),
(19, '2025-06-30', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bidang_kerjasama`
--

CREATE TABLE `bidang_kerjasama` (
  `id_bidang` bigint(20) UNSIGNED NOT NULL,
  `nama_bidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidang_kerjasama`
--

INSERT INTO `bidang_kerjasama` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Pendidikan'),
(2, 'Penelitian'),
(3, 'Pengabdian kepada Masyarakat'),
(4, 'Digitalisasi Produk'),
(5, 'Pelatihan dan Sertifikasi'),
(6, 'Pertukaran Pelajar'),
(7, 'Magang dan Rekrutmen'),
(8, 'Pengembangan Kurikulum'),
(9, 'Budak');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` bigint(20) UNSIGNED NOT NULL,
  `catatan` text NOT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif','Kadaluarsa','Akan Berakhir') DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `catatan`, `dokumen`, `status`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 'Kerjasama pendidikan dengan PT. Infineon', 'dokumen/mou_infineon_2025.pdf', 'Aktif', '2025-01-20', '2028-01-19'),
(2, 'Kerjasama penelitian dengan PT. Telkom', 'dokumen/moa_telkom_2025.pdf', 'Aktif', '2025-02-25', '2026-02-24'),
(3, 'Kerjasama magang dengan PT. Astra', 'dokumen/mou_astra_2025.pdf', 'Akan Berakhir', '2025-03-15', '2025-07-14'),
(4, 'Kerjasama sertifikasi dengan BCA', 'dokumen/moa_bca_2025.pdf', 'Aktif', '2025-04-10', '2027-04-09'),
(5, 'Kerjasama digitalisasi dengan Google', 'dokumen/mou_google_2025.pdf', 'Aktif', '2025-05-15', '2030-05-14'),
(6, 'Kerjasama kurikulum dengan Microsoft', 'dokumen/moa_microsoft_2025.pdf', 'Aktif', '2025-06-20', '2025-07-30'),
(7, 'Kerjasama pelatihan dengan Samsung', 'dokumen/mou_samsung_2025.pdf', 'Aktif', '2025-07-25', '2026-07-24'),
(8, 'Kerjasama CSR dengan Unilever', 'dokumen/moa_unilever_2025.pdf', 'Kadaluarsa', '2025-01-05', '2025-06-04'),
(9, 'Kerjasama energi dengan Pertamina', 'dokumen/mou_pertamina_2025.pdf', 'Aktif', '2025-09-15', '2028-09-14'),
(10, 'Kerjasama transportasi dengan Gojek', 'dokumen/moa_gojek_2025.pdf', 'Tidak Aktif', '2025-10-30', '2026-10-29'),
(11, 'Kerjasama e-commerce dengan Tokopedia', 'dokumen/mou_tokopedia_2025.pdf', 'Aktif', '2025-11-10', '2027-11-09'),
(12, 'Kerjasama marketplace dengan Bukalapak', 'dokumen/moa_bukalapak_2025.pdf', 'Aktif', '2025-12-05', '2026-12-04'),
(13, 'Kerjasama digital dengan Shopee', 'dokumen/mou_shopee_2026.pdf', 'Aktif', '2026-01-20', '2029-01-19'),
(14, 'Kerjasama teknologi dengan Huawei', 'dokumen/moa_huawei_2026.pdf', 'Aktif', '2026-02-25', '2027-02-24'),
(15, 'Kerjasama industri dengan Siemens', 'dokumen/mou_siemens_2026.pdf', 'Aktif', '2026-03-15', '2028-03-14'),
(17, 'YAYAYA', 'MOU_PT_Shopee_Indonesia_2025-06-18.pdf', 'Aktif', '2025-06-18', '2025-10-30'),
(18, 'tes', 'MOA_PT_Pertamina_2025-06-30.pdf', 'Aktif', '2025-06-30', '2025-07-01');

--
-- Triggers `dokumen`
--
DELIMITER $$
CREATE TRIGGER `update_dokumen_status_on_insert` BEFORE INSERT ON `dokumen` FOR EACH ROW BEGIN
    IF NEW.status != 'Tidak Aktif' THEN
        IF NEW.tanggal_selesai < CURDATE() THEN
            SET NEW.status = 'Kadaluarsa';
        ELSEIF DATEDIFF(NEW.tanggal_selesai, CURDATE()) <= 30 THEN
            SET NEW.status = 'Akan Berakhir';
        ELSE
            SET NEW.status = 'Aktif';
        END IF;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` bigint(20) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Desain Komunikasi Visual'),
(2, 'Rekayasa Perangkat Lunak'),
(3, 'Teknik Instalasi Tenaga Listrik'),
(4, 'Teknik Jaringan Akses Telekomunikasi'),
(5, 'Teknik Komputer dan Jaringan'),
(6, 'Akuntansi'),
(7, 'Bisnis Digital'),
(8, 'Teknik Elektronika'),
(9, 'Teknik Mekatronika'),
(10, 'Administrasi Perkantoran');

-- --------------------------------------------------------

--
-- Table structure for table `kerjasama`
--

CREATE TABLE `kerjasama` (
  `id_kerjasama` bigint(20) UNSIGNED NOT NULL,
  `id_ajuan` bigint(20) UNSIGNED NOT NULL,
  `id_pemohon` bigint(20) UNSIGNED NOT NULL,
  `id_mitra` bigint(20) UNSIGNED NOT NULL,
  `id_bidang` bigint(20) UNSIGNED DEFAULT NULL,
  `id_dokumen` bigint(20) UNSIGNED NOT NULL,
  `jenis_kerjasama` enum('Memorandum of Understanding (MoU)','Memorandum of Agreement (MoA)') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kerjasama`
--

INSERT INTO `kerjasama` (`id_kerjasama`, `id_ajuan`, `id_pemohon`, `id_mitra`, `id_bidang`, `id_dokumen`, `jenis_kerjasama`) VALUES
(2, 18, 17, 13, NULL, 17, 'Memorandum of Understanding (MoU)'),
(3, 19, 18, 9, NULL, 18, 'Memorandum of Agreement (MoA)');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` bigint(20) UNSIGNED NOT NULL,
  `nama_mitra` varchar(255) NOT NULL,
  `lingkup` enum('Nasional','Internasional') DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_mitra`, `lingkup`, `website`, `email`) VALUES
(1, 'PT. Infineon Technologies', 'Internasional', 'https://www.infineon.com', 'contact@infineon.com'),
(2, 'PT. Telkom Indonesia', 'Nasional', 'https://www.telkom.co.id', 'info@telkom.co.id'),
(3, 'PT. Astra International', 'Nasional', 'https://www.astra.co.id', 'corporate@astra.co.id'),
(4, 'PT. Bank Central Asia', 'Nasional', 'https://www.bca.co.id', 'customer@bca.co.id'),
(5, 'PT. Google Indonesia', 'Internasional', 'https://about.google', 'indonesia@google.com'),
(6, 'PT. Microsoft Indonesia', 'Internasional', 'https://www.microsoft.com/id-id', 'indonesia@microsoft.com'),
(7, 'PT. Samsung Electronics', 'Internasional', 'https://www.samsung.com/id', 'support.id@samsung.com'),
(8, 'PT. Unilever Indonesia', 'Nasional', 'https://www.unilever.co.id', 'info@unilever.co.id'),
(9, 'PT. Pertamina', 'Nasional', 'https://www.pertamina.com', 'pcc@pertamina.com'),
(10, 'PT. Gojek Indonesia', 'Nasional', 'https://www.gojek.com', 'support@gojek.com'),
(11, 'PT. Tokopedia', 'Nasional', 'https://www.tokopedia.com', 'help@tokopedia.com'),
(12, 'PT. Bukalapak', 'Nasional', 'https://www.bukalapak.com', 'support@bukalapak.com'),
(13, 'PT. Shopee Indonesia', 'Internasional', 'https://shopee.co.id', 'cs@shopee.co.id'),
(14, 'PT. Huawei Technologies', 'Internasional', 'https://www.huawei.com/id', 'indonesia@huawei.com'),
(15, 'PT. Siemens Indonesia', 'Internasional', 'https://www.siemens.com/id/id', 'info.id@siemens.com'),
(16, 'PT. Berkat Sentosa', 'Internasional', 'https://chat.deepseek.com', 'flowtunder@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE `pemohon` (
  `id_pemohon` bigint(20) UNSIGNED NOT NULL,
  `no_permohonan` varchar(15) NOT NULL,
  `nama_pemohon` varchar(30) NOT NULL,
  `nomor_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`id_pemohon`, `no_permohonan`, `nama_pemohon`, `nomor_telp`) VALUES
(1, 'PMH2025001', 'Budi Santoso', '081234567890'),
(2, 'PMH2025002', 'Ani Wijaya', '082134567890'),
(3, 'PMH2025003', 'Citra Dewi', '083123456789'),
(4, 'PMH2025004', 'Dodi Pratama', '084123456789'),
(5, 'PMH2025005', 'Eka Putri', '085123456789'),
(6, 'PMH2025006', 'Fajar Nugroho', '086123456789'),
(7, 'PMH2025007', 'Gita Sari', '087123456789'),
(8, 'PMH2025008', 'Hadi Susanto', '088123456789'),
(9, 'PMH2025009', 'Indah Permata', '089123456789'),
(10, 'PMH2025010', 'Joko Prabowo', '081012345678'),
(11, 'PMH2025011', 'Kartika Wulandari', '081112345678'),
(12, 'PMH2025012', 'Luki Hermawan', '081212345678'),
(13, 'PMH2025013', 'Maya Indah', '081312345678'),
(14, 'PMH2025014', 'Nanda Putra', '081412345678'),
(15, 'PMH2025015', 'Oki Setiawan', '081512345678'),
(16, 'PMH2025016', 'bagus', '081534337041'),
(17, 'PMH2025017', 'Bagus', '123456789044'),
(18, 'PMH2025018', 'bagus', '081534337041');

-- --------------------------------------------------------

--
-- Table structure for table `pemohon_bidang`
--

CREATE TABLE `pemohon_bidang` (
  `id_bidang` bigint(20) UNSIGNED NOT NULL,
  `id_pemohon` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemohon_bidang`
--

INSERT INTO `pemohon_bidang` (`id_bidang`, `id_pemohon`) VALUES
(1, 1),
(1, 2),
(1, 7),
(1, 10),
(1, 15),
(2, 1),
(2, 3),
(2, 8),
(2, 11),
(3, 1),
(3, 4),
(3, 9),
(3, 12),
(3, 16),
(3, 18),
(4, 2),
(4, 5),
(4, 10),
(4, 13),
(4, 17),
(5, 3),
(5, 6),
(5, 11),
(5, 14),
(6, 4),
(6, 7),
(6, 12),
(6, 15),
(7, 5),
(7, 8),
(7, 13),
(8, 6),
(8, 9),
(8, 14),
(8, 16);

-- --------------------------------------------------------

--
-- Table structure for table `pemohon_jurusan`
--

CREATE TABLE `pemohon_jurusan` (
  `id_jurusan` bigint(20) UNSIGNED NOT NULL,
  `id_pemohon` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemohon_jurusan`
--

INSERT INTO `pemohon_jurusan` (`id_jurusan`, `id_pemohon`) VALUES
(1, 1),
(1, 6),
(1, 10),
(2, 1),
(2, 7),
(2, 11),
(3, 2),
(3, 6),
(3, 12),
(3, 16),
(3, 18),
(4, 2),
(4, 7),
(4, 13),
(5, 3),
(5, 8),
(5, 12),
(6, 3),
(6, 9),
(6, 13),
(7, 4),
(7, 8),
(7, 14),
(7, 16),
(8, 4),
(8, 9),
(8, 15),
(9, 5),
(9, 10),
(9, 14),
(9, 17),
(10, 5),
(10, 11),
(10, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD PRIMARY KEY (`id_ajuan`),
  ADD KEY `ajuan_id_admin_foreign` (`id_admin`);

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
  ADD KEY `kerjasama_id_ajuan_foreign` (`id_ajuan`),
  ADD KEY `kerjasama_id_bidang_foreign` (`id_bidang`),
  ADD KEY `kerjasama_id_dokumen_foreign` (`id_dokumen`),
  ADD KEY `kerjasama_id_mitra_foreign` (`id_mitra`),
  ADD KEY `kerjasama_id_pemohon_foreign` (`id_pemohon`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id_pemohon`),
  ADD UNIQUE KEY `pemohon_no_permohonan_unique` (`no_permohonan`);

--
-- Indexes for table `pemohon_bidang`
--
ALTER TABLE `pemohon_bidang`
  ADD PRIMARY KEY (`id_bidang`,`id_pemohon`),
  ADD KEY `pemohon_bidang_id_pemohon_foreign` (`id_pemohon`);

--
-- Indexes for table `pemohon_jurusan`
--
ALTER TABLE `pemohon_jurusan`
  ADD PRIMARY KEY (`id_jurusan`,`id_pemohon`),
  ADD KEY `pemohon_jurusan_id_pemohon_foreign` (`id_pemohon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ajuan`
--
ALTER TABLE `ajuan`
  MODIFY `id_ajuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bidang_kerjasama`
--
ALTER TABLE `bidang_kerjasama`
  MODIFY `id_bidang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kerjasama`
--
ALTER TABLE `kerjasama`
  MODIFY `id_kerjasama` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id_pemohon` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD CONSTRAINT `ajuan_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE;

--
-- Constraints for table `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD CONSTRAINT `kerjasama_id_ajuan_foreign` FOREIGN KEY (`id_ajuan`) REFERENCES `ajuan` (`id_ajuan`) ON DELETE CASCADE,
  ADD CONSTRAINT `kerjasama_id_bidang_foreign` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_kerjasama` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kerjasama_id_dokumen_foreign` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kerjasama_id_mitra_foreign` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id_mitra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kerjasama_id_pemohon_foreign` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemohon_bidang`
--
ALTER TABLE `pemohon_bidang`
  ADD CONSTRAINT `pemohon_bidang_id_bidang_foreign` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_kerjasama` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemohon_bidang_id_pemohon_foreign` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemohon_jurusan`
--
ALTER TABLE `pemohon_jurusan`
  ADD CONSTRAINT `pemohon_jurusan_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemohon_jurusan_id_pemohon_foreign` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `event_update_dokumen_status` ON SCHEDULE EVERY 1 DAY STARTS '2025-06-20 01:12:35' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    CALL update_dokumen_status_batch();
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
