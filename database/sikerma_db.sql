-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Jun 2025 pada 05.34
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `kata_sandi`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$iQfI4RLnjdz0BQAOrk9/KesEQsIHWbq4FjokDx0jc9KhmbnKvCAk.', NULL, NULL),
(2, 'afifah@gmail.com', '$2y$10$UHqqv44uVYex/UCRlOtAauMF1fXCq8CE8DD/M8V7ahRdOibSZr/8S', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ajuan`
--

CREATE TABLE `ajuan` (
  `id_ajuan` int(10) UNSIGNED NOT NULL,
  `tanggal_ajuan` date NOT NULL DEFAULT current_timestamp(),
  `id_admin` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ajuan`
--

INSERT INTO `ajuan` (`id_ajuan`, `tanggal_ajuan`, `id_admin`, `created_at`, `updated_at`) VALUES
(1, '2025-03-10', NULL, NULL, NULL),
(2, '2025-03-10', NULL, NULL, NULL),
(3, '2025-04-19', NULL, NULL, NULL),
(4, '2025-04-20', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_kerjasama`
--

CREATE TABLE `bidang_kerjasama` (
  `id_bidang` int(10) UNSIGNED NOT NULL,
  `nama_bidang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bidang_kerjasama`
--

INSERT INTO `bidang_kerjasama` (`id_bidang`, `nama_bidang`, `created_at`, `updated_at`) VALUES
(1, 'pendidikan', NULL, NULL),
(2, 'penelitian', NULL, NULL),
(3, 'pengabdian kepada masyarakat', NULL, NULL),
(4, 'digitalisasi produk', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(10) UNSIGNED NOT NULL,
  `catatan` text DEFAULT NULL,
  `dokumen` varchar(255) NOT NULL,
  `status` enum('aktif','tidak aktif','kadaluarsa','') NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `catatan`, `dokumen`, `status`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
(1, NULL, 'PMP_PBL-215_M8.pdf', 'tidak aktif', '2025-05-07', '2025-05-16', '2025-06-09 23:44:34', '2025-06-14 02:25:42'),
(2, NULL, 'dokumentrial.pdf', 'aktif', '2025-06-03', '2025-06-24', '2025-06-14 09:48:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(10) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Desain Komunikasi Visual', NULL, NULL),
(2, 'Rekayasa Perangkat Lunak', NULL, NULL),
(3, 'Teknik Instalasi Tenaga Listrik', NULL, NULL),
(4, 'Teknik Jaringan Akses Telekomunikasi', NULL, NULL),
(5, 'Teknik Komputer dan Jaringan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerjasama`
--

CREATE TABLE `kerjasama` (
  `id_kerjasama` int(10) UNSIGNED NOT NULL,
  `no_kerjasama` varchar(255) NOT NULL,
  `id_ajuan` int(10) UNSIGNED NOT NULL,
  `id_pemohon` int(10) UNSIGNED NOT NULL,
  `id_mitra` int(10) UNSIGNED NOT NULL,
  `id_bidang` int(10) UNSIGNED NOT NULL,
  `id_dokumen` int(10) UNSIGNED NOT NULL,
  `jenis_kerjasama` enum('Memorandum of Understanding (MoU)','Memorandum of Agreement (MoA)') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kerjasama`
--

INSERT INTO `kerjasama` (`id_kerjasama`, `no_kerjasama`, `id_ajuan`, `id_pemohon`, `id_mitra`, `id_bidang`, `id_dokumen`, `jenis_kerjasama`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 1, 1, 1, 1, 'Memorandum of Understanding (MoU)', '2025-06-09 23:44:34', '2025-06-09 23:44:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_06_03_081245_create_admin_table', 1),
(2, '2025_06_03_081330_create_jurusan_table', 1),
(3, '2025_06_03_081411_create_mintra_table', 1),
(4, '2025_06_03_081446_create_pemohon_table', 1),
(5, '2025_06_03_081522_create_bidang_kerjasama', 1),
(6, '2025_06_03_081546_create_dokumen_table', 1),
(7, '2025_06_03_081618_create_ajuan_table', 1),
(8, '2025_06_03_081737_create_kerjasama_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(10) UNSIGNED NOT NULL,
  `nama_mitra` varchar(255) NOT NULL,
  `negara` varchar(30) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_mitra`, `negara`, `website`, `email`, `created_at`, `updated_at`) VALUES
(1, 'PT. Mandiri Jaya', 'Indonesia', 'www.mandirijaya.com', 'mandirijaya@gmail.com', '2025-06-09 23:44:34', '2025-06-09 23:44:34'),
(2, 'PT. Soemitomo', 'Indonesia', 'www.soemitomo.com', 'soemitomo@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemohon`
--

CREATE TABLE `pemohon` (
  `id_pemohon` int(10) UNSIGNED NOT NULL,
  `no_permohonan` varchar(15) NOT NULL,
  `nama_pemohon` varchar(30) NOT NULL,
  `id_jurusan` int(10) UNSIGNED DEFAULT NULL,
  `nomor_telp` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemohon`
--

INSERT INTO `pemohon` (`id_pemohon`, `no_permohonan`, `nama_pemohon`, `id_jurusan`, `nomor_telp`, `created_at`, `updated_at`) VALUES
(1, 'PMH01', 'Budi Susanto', 3, 828220848, NULL, NULL),
(2, 'PMH02', '0', 5, 0, NULL, NULL);

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
  ADD KEY `kerjasama_id_pemohon_foreign` (`id_pemohon`),
  ADD KEY `kerjasama_id_mitra_foreign` (`id_mitra`),
  ADD KEY `kerjasama_id_bidang_foreign` (`id_bidang`),
  ADD KEY `kerjasama_id_dokumen_foreign` (`id_dokumen`);

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
  ADD UNIQUE KEY `pemohon_no_permohonan_unique` (`no_permohonan`),
  ADD KEY `pemohon_id_jurusan_foreign` (`id_jurusan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ajuan`
--
ALTER TABLE `ajuan`
  MODIFY `id_ajuan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bidang_kerjasama`
--
ALTER TABLE `bidang_kerjasama`
  MODIFY `id_bidang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=544;

--
-- AUTO_INCREMENT untuk tabel `kerjasama`
--
ALTER TABLE `kerjasama`
  MODIFY `id_kerjasama` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id_pemohon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ajuan`
--
ALTER TABLE `ajuan`
  ADD CONSTRAINT `ajuan_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD CONSTRAINT `kerjasama_id_ajuan_foreign` FOREIGN KEY (`id_ajuan`) REFERENCES `ajuan` (`id_ajuan`),
  ADD CONSTRAINT `kerjasama_id_bidang_foreign` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_kerjasama` (`id_bidang`),
  ADD CONSTRAINT `kerjasama_id_dokumen_foreign` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`),
  ADD CONSTRAINT `kerjasama_id_mitra_foreign` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id_mitra`),
  ADD CONSTRAINT `kerjasama_id_pemohon_foreign` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id_pemohon`);

--
-- Ketidakleluasaan untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  ADD CONSTRAINT `pemohon_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
