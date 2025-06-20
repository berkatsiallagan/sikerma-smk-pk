-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Jun 2025 pada 06.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_dokumen_status_batch` ()   BEGIN
    -- Update ke "Kadaluarsa" hanya jika bukan "Tidak Aktif"
    UPDATE dokumen 
    SET status = 'Kadaluarsa'
    WHERE tanggal_selesai < CURDATE()
    AND status != 'Tidak Aktif';

    -- Update ke "Akan Berakhir" hanya jika bukan "Tidak Aktif"
    UPDATE dokumen 
    SET status = 'Akan Berakhir'
    WHERE tanggal_selesai >= CURDATE() 
    AND DATEDIFF(tanggal_selesai, CURDATE()) <= 30
    AND status != 'Tidak Aktif';

    -- Update ke "Aktif" jika sisa hari > 30 dan bukan "Tidak Aktif"
    UPDATE dokumen 
    SET status = 'Aktif'
    WHERE tanggal_selesai >= CURDATE() 
    AND DATEDIFF(tanggal_selesai, CURDATE()) > 30
    AND status NOT IN ('Kadaluarsa', 'Tidak Aktif', 'Akan Berakhir');
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `kata_sandi`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$12$4oRxm7692W2i3ccGy5et3Ow2OXzmfvsVlMghW8DLHXTG2p36sz1VS', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ajuan`
--

CREATE TABLE `ajuan` (
  `id_ajuan` bigint(20) UNSIGNED NOT NULL,
  `tanggal_ajuan` date NOT NULL DEFAULT current_timestamp(),
  `id_admin` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ajuan`
--

INSERT INTO `ajuan` (`id_ajuan`, `tanggal_ajuan`, `id_admin`, `created_at`, `updated_at`) VALUES
(1, '2025-06-19', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_kerjasama`
--

CREATE TABLE `bidang_kerjasama` (
  `id_bidang` bigint(20) UNSIGNED NOT NULL,
  `nama_bidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bidang_kerjasama`
--

INSERT INTO `bidang_kerjasama` (`id_bidang`, `nama_bidang`) VALUES
(1, 'pendidikan'),
(2, 'penelitian'),
(3, 'pengabdian kepada masyarakat'),
(4, 'digitalisasi produk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
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
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `catatan`, `dokumen`, `status`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(24, 'Kerjasama aja', 'dokumen/sgC3b2QwtMwyeNSnTso0e18RaEeN4Iw2DW0pH0iN.pdf', 'Akan Berakhir', '2025-06-20', '2025-06-28');

--
-- Trigger `dokumen`
--
DELIMITER $$
CREATE TRIGGER `update_dokumen_status_on_insert` BEFORE INSERT ON `dokumen` FOR EACH ROW BEGIN
    -- Abaikan jika status sudah "Tidak Aktif" (biarkan seperti yang di-set frontend)
    IF NEW.status != 'Tidak Aktif' THEN
        -- Jika tanggal selesai sudah lewat, set "Kadaluarsa"
        IF NEW.tanggal_selesai < CURDATE() THEN
            SET NEW.status = 'Kadaluarsa';
        -- Jika sisa hari <= 30, set "Akan Berakhir"
        ELSEIF DATEDIFF(NEW.tanggal_selesai, CURDATE()) <= 30 THEN
            SET NEW.status = 'Akan Berakhir';
        -- Selainnya, set "Aktif" (jika belum di-set)
        ELSE
            SET NEW.status = 'Aktif';
        END IF;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` bigint(20) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Desain Komunikasi Visual'),
(2, 'Rekayasa Perangkat Lunak'),
(3, 'Teknik Instalasi Tenaga Listrik'),
(4, 'Teknik Jaringan Akses Telekomunikasi'),
(5, 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerjasama`
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
-- Dumping data untuk tabel `kerjasama`
--

INSERT INTO `kerjasama` (`id_kerjasama`, `id_ajuan`, `id_pemohon`, `id_mitra`, `id_bidang`, `id_dokumen`, `jenis_kerjasama`) VALUES
(1, 1, 1, 28, NULL, 24, 'Memorandum of Understanding (MoU)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` bigint(20) UNSIGNED NOT NULL,
  `nama_mitra` varchar(255) NOT NULL,
  `lingkup` enum('Nasional','Internasional') DEFAULT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_mitra`, `lingkup`, `website`, `email`) VALUES
(1, 'PT. Infineon', 'Nasional', 'https://www.infineon.com', 'infineon@gmail.com'),
(2, 'PT. Berkat Sentosa', 'Nasional', 'https://chat.deepseek.com', 'flowtunder@gmail.com'),
(6, 'PT. Fajar Jaya', 'Internasional', 'https://fadil.com', 'dwe@gmail.com'),
(7, 'PT. Bagus Raya', 'Nasional', 'https://fajar.com', 'harimuktibagus@gmail.com'),
(20, 'PT. Fajar Jaya', 'Nasional', 'https://chat.deepseek.com', 'harimuktibagus@gmail.com'),
(22, 'PT. Berkat Sentosa', 'Nasional', 'https://chat.deepseek.com', 'avivaharry.20@gmail.com'),
(23, 'PT. Berkat Sentosa', 'Nasional', 'https://chat.deepseek.com', 'flowtunder@gmail.com'),
(25, 'PT. Bagus Raya', 'Internasional', 'https://fajar.com', 'harimuktibagus@gmail.com'),
(26, 'PT. Berkat Jaya Perkasa', 'Nasional', 'https://berkat.my.id', 'berkatsiallagan201105@gmail.com'),
(27, 'PT. Berkat Jaya Perkasa', 'Nasional', 'https://berkat.my.id', 'berkatsiallagan201105@gmail.com'),
(28, 'PT. Sumitomo', 'Nasional', 'https://berkat.my.id', 'berkatsiallagan201105@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemohon`
--

CREATE TABLE `pemohon` (
  `id_pemohon` bigint(20) UNSIGNED NOT NULL,
  `no_permohonan` varchar(15) NOT NULL,
  `nama_pemohon` varchar(30) NOT NULL,
  `nomor_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemohon`
--

INSERT INTO `pemohon` (`id_pemohon`, `no_permohonan`, `nama_pemohon`, `nomor_telp`) VALUES
(1, 'PMH01', 'Berkat', '0822-8471-0929');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemohon_bidang`
--

CREATE TABLE `pemohon_bidang` (
  `id_bidang` bigint(20) UNSIGNED NOT NULL,
  `id_pemohon` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemohon_bidang`
--

INSERT INTO `pemohon_bidang` (`id_bidang`, `id_pemohon`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemohon_jurusan`
--

CREATE TABLE `pemohon_jurusan` (
  `id_jurusan` bigint(20) UNSIGNED NOT NULL,
  `id_pemohon` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemohon_jurusan`
--

INSERT INTO `pemohon_jurusan` (`id_jurusan`, `id_pemohon`) VALUES
(3, 1),
(5, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indeks untuk tabel `ajuan`
--
ALTER TABLE `ajuan`
  ADD PRIMARY KEY (`id_ajuan`),
  ADD KEY `ajuan_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `bidang_kerjasama`
--
ALTER TABLE `bidang_kerjasama`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD PRIMARY KEY (`id_kerjasama`),
  ADD KEY `kerjasama_id_ajuan_foreign` (`id_ajuan`),
  ADD KEY `kerjasama_id_bidang_foreign` (`id_bidang`),
  ADD KEY `kerjasama_id_dokumen_foreign` (`id_dokumen`),
  ADD KEY `kerjasama_id_mitra_foreign` (`id_mitra`),
  ADD KEY `kerjasama_id_pemohon_foreign` (`id_pemohon`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indeks untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id_pemohon`),
  ADD UNIQUE KEY `pemohon_no_permohonan_unique` (`no_permohonan`);

--
-- Indeks untuk tabel `pemohon_bidang`
--
ALTER TABLE `pemohon_bidang`
  ADD PRIMARY KEY (`id_bidang`,`id_pemohon`),
  ADD KEY `pemohon_bidang_id_pemohon_foreign` (`id_pemohon`);

--
-- Indeks untuk tabel `pemohon_jurusan`
--
ALTER TABLE `pemohon_jurusan`
  ADD PRIMARY KEY (`id_jurusan`,`id_pemohon`),
  ADD KEY `pemohon_jurusan_id_pemohon_foreign` (`id_pemohon`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ajuan`
--
ALTER TABLE `ajuan`
  MODIFY `id_ajuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bidang_kerjasama`
--
ALTER TABLE `bidang_kerjasama`
  MODIFY `id_bidang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kerjasama`
--
ALTER TABLE `kerjasama`
  MODIFY `id_kerjasama` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id_pemohon` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ajuan`
--
ALTER TABLE `ajuan`
  ADD CONSTRAINT `ajuan_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD CONSTRAINT `kerjasama_id_bidang_foreign` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_kerjasama` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kerjasama_id_dokumen_foreign` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kerjasama_id_mitra_foreign` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id_mitra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kerjasama_id_pemohon_foreign` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemohon_bidang`
--
ALTER TABLE `pemohon_bidang`
  ADD CONSTRAINT `pemohon_bidang_id_bidang_foreign` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_kerjasama` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemohon_bidang_id_pemohon_foreign` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemohon_jurusan`
--
ALTER TABLE `pemohon_jurusan`
  ADD CONSTRAINT `pemohon_jurusan_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemohon_jurusan_id_pemohon_foreign` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `event_update_dokumen_status` ON SCHEDULE EVERY 1 DAY STARTS '2025-06-20 01:12:35' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    CALL update_dokumen_status_batch();
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
