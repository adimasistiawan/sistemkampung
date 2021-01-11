-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2021 at 06:12 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notoharjo`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
CREATE TABLE IF NOT EXISTS `berita` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `tanggal`, `foto`, `isi`, `created_at`, `updated_at`) VALUES
(3, 'PEMBAGIAN BLT Tahap satu', '2021-01-03', 'ECW01hDCldgzXWJzform.PNG', '<p>\r\n\r\n</p><div><div></div></div>\r\n\r\nPembagian BLT DD Triwulwn tiga tahap satu langsung dipimpin oleh Bapak Kepala Desa Sokogrenjeng Kecamatan Kenduruan Kabupaten Tuban.Pesan dari Bapak Kepala Desa, Bantuan BLT DD ini mudah - mudahan Bermafaat dan menjadi barokah,bantuan ini hingga berlanjut hinga desember tahun 2020.tak ketingalan juga arahan dari Bapak Sekcam Kenduruan,mengingat virus ini belum reda semua warga tetap mengikuti protokol kesehatan yaitu jaga jarak,pakai masker,cuci tanagan.\r\n\r\n<small></small><br><p></p>', '2021-01-03 06:20:47', '2021-01-03 06:47:22'),
(2, 'PEMBAGIAN BLT DD TRI WULWN TIGA TAHAP DUA', '2021-01-09', 'J9SPznGWyKdv5qQgss.PNG', '<p>\r\n\r\nPembagian BLT DD Triwulan tiga tahap dua desa Sokogrenjeng berjalan dengan lancar. BLT yang bersumber dari dana Desa ini untuk tahun 2020 ini yang terakir kalinya. Seperti biasa dalam pelaksanaan penbagianya tetap memperhatikan protokol kesehatan yaitu 3 M .Mencuci Tangan,Memakai Masker, Menjaga Jarak\r\n\r\n</p>', '2021-01-01 05:48:19', '2021-01-03 06:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_12_28_122740_create_pekerjaans_table', 1),
(4, '2020_12_28_123125_create_pendidikans_table', 1),
(7, '2020_12_31_141954_create_beritas_table', 2),
(8, '2021_01_01_143442_create_profils_table', 3),
(9, '2021_01_02_100316_create_wargas_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

DROP TABLE IF EXISTS `pekerjaan`;
CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'test3', 1, '2020-12-29 01:12:11', '2020-12-29 01:39:16'),
(2, 'Petani', 0, '2020-12-29 04:33:08', '2020-12-29 04:33:08'),
(3, 'Buruh Tani', 0, '2020-12-29 04:33:22', '2020-12-29 04:33:22'),
(4, 'PNS', 0, '2020-12-29 04:33:35', '2020-12-29 04:33:35'),
(5, 'Pengrajin Industri Rumah Tangga', 0, '2020-12-29 04:34:23', '2020-12-29 04:34:23'),
(6, 'Pedagang Keliling', 0, '2020-12-29 04:34:43', '2020-12-29 04:34:43'),
(7, 'Peternak', 0, '2020-12-29 04:35:01', '2020-12-29 04:35:01'),
(8, 'Montir', 0, '2020-12-29 04:35:10', '2020-12-29 04:35:10'),
(9, 'Dokter Swasta', 0, '2020-12-29 04:35:32', '2020-12-29 04:35:32'),
(10, 'Bidan Swasta', 0, '2020-12-29 04:36:14', '2020-12-29 04:36:14'),
(11, 'Perawat Swasta', 0, '2020-12-29 04:36:32', '2020-12-29 04:36:32'),
(12, 'TNI', 0, '2020-12-29 04:36:40', '2020-12-29 04:36:40'),
(13, 'Polri', 0, '2020-12-29 04:36:48', '2020-12-29 04:36:48'),
(14, 'Pensiunan', 0, '2020-12-29 04:37:07', '2020-12-29 04:37:07'),
(15, 'Pengusaha Kecil dan Menengah', 0, '2020-12-29 04:37:51', '2020-12-29 04:38:05'),
(16, 'Dukun Kampung Terlatih', 0, '2020-12-29 04:38:39', '2020-12-29 04:38:39'),
(17, 'Jasa Pengobatan Terlatih', 0, '2020-12-29 04:39:00', '2020-12-29 04:39:00'),
(18, 'Dosen Swasta', 0, '2020-12-29 04:39:24', '2020-12-29 04:39:24'),
(19, 'Pengusaha Besar', 0, '2020-12-29 04:39:39', '2020-12-29 04:39:39'),
(20, 'Karyawan Perusahaan Swasta', 0, '2020-12-29 04:40:05', '2020-12-29 04:40:05'),
(21, 'Karyawan Perusahaan Negeri', 0, '2020-12-29 04:40:25', '2020-12-29 04:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nama`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'SDs', 1, '2020-12-29 01:44:39', '2020-12-29 01:44:58'),
(2, 'TAMAT SD / SEDERAJAT', 0, '2020-12-29 05:17:29', '2020-12-29 05:17:29'),
(3, 'SLTP/SEDERAJAT', 0, '2020-12-29 05:17:45', '2020-12-29 05:17:45'),
(4, 'TIDAK / BELUM SEKOLAH', 0, '2020-12-29 05:18:02', '2020-12-29 05:18:02'),
(5, 'SLTA / SEDERAJAT', 0, '2020-12-29 05:18:26', '2020-12-29 05:18:26'),
(6, 'BELUM TAMAT SD/SEDERAJAT', 0, '2020-12-29 05:18:38', '2020-12-29 05:18:38'),
(7, 'DIPLOMA IV/ STRATA I', 0, '2020-12-29 05:18:57', '2020-12-29 05:18:57'),
(8, 'AKADEMI/ DIPLOMA III/S. MUDA', 0, '2020-12-29 05:19:14', '2020-12-29 05:19:14'),
(9, 'DIPLOMA I / II', 0, '2020-12-29 05:19:29', '2020-12-29 05:19:29'),
(10, 'STRATA II', 0, '2020-12-29 05:19:43', '2020-12-29 05:19:43'),
(11, 'STRATA III', 0, '2020-12-29 05:19:56', '2020-12-29 05:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

DROP TABLE IF EXISTS `penduduk`;
CREATE TABLE IF NOT EXISTS `penduduk` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_kk` bigint(20) NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt_rw` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepala_keluarga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `no_kk`, `alamat`, `rt_rw`, `kepala_keluarga`, `created_at`, `updated_at`) VALUES
(4, 3233435435432, 'jalan', 'sadasd', 'fdsfsdf', '2020-12-31 05:54:18', '2020-12-31 05:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_detail`
--

DROP TABLE IF EXISTS `penduduk_detail`;
CREATE TABLE IF NOT EXISTS `penduduk_detail` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `penduduk_id` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` bigint(20) NOT NULL,
  `status_keluarga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkawinan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_paspor` bigint(30) DEFAULT NULL,
  `no_kitap` bigint(30) DEFAULT NULL,
  `ayah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ibu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penduduk_detail`
--

INSERT INTO `penduduk_detail` (`id`, `penduduk_id`, `nama`, `nik`, `status_keluarga`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_perkawinan`, `kewarganegaraan`, `no_paspor`, `no_kitap`, `ayah`, `ibu`, `pendidikan`, `pekerjaan_id`, `created_at`, `updated_at`) VALUES
(7, 4, 'fdsfsdf', 43534534, 'Kepala Keluarga', 'Laki-laki', 'dsfdsfdsf', '2020-12-15', 'Islam', 'Belum Kawin', 'WNI', NULL, NULL, 'dsf', 'ewew', 'SLTA / SEDERAJAT', 16, '2020-12-31 05:54:18', '2020-12-31 05:54:18'),
(8, 4, 'fdsfds', 3435345, 'Pembantu', 'Laki-laki', 'fdsfsdf', '2020-12-23', 'Islam', 'Kawin', 'WNI', 3423432, 432423424, 'fwefds', 'dsdsfs', 'DIPLOMA I / II', 19, '2020-12-31 05:54:18', '2020-12-31 05:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `data`, `created_at`, `updated_at`) VALUES
(4, '{\"sejarah\":\"<p>sejarah sada<\\/p>\",\"visi\":\"<p>visi<\\/p>\",\"misi\":\"<p>misii<\\/p>\",\"struktur_organisasi\":\"2ok38znfCoRN28GQstruktur.jpg\"}', '2021-01-01 07:21:17', '2021-01-03 06:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$rVy7xk/nlt7WWTduKMaKdeiGrfonMtdPMqtoz.2n9mWL8nufa650m', '2020-12-28 06:53:39', '2020-12-28 06:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

DROP TABLE IF EXISTS `warga`;
CREATE TABLE IF NOT EXISTS `warga` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` bigint(20) NOT NULL,
  `no_kk` bigint(20) NOT NULL,
  `no_hp` bigint(20) NOT NULL,
  `status_kawin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_id` int(11) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `nama`, `nik`, `no_kk`, `no_hp`, `status_kawin`, `pekerjaan_id`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Adimas Putra Istiawan', 2321432434535436, 4325435436547567, 865457678745, 'Belum Kawin', 4, 'jl kampung notoharjo', 'Laki-laki', 'Lampung Tengah', '2021-01-01', 'Kristen', 'adimasistiawan01@gmail.com', '$2y$10$spOeS9khrXOdPpSJxPDRK.Tn4/bfxwAlyWDVTkmymDg4mJNQBVMg.', 'Telah Diverifikasi', '2021-01-02 05:20:38', '2021-01-05 21:26:42'),
(3, 'Adimas Istiawan', 2321432434535443, 4325435436547567, 865457678745, 'Belum Kawin', 2, 'jl kampung', 'Laki-laki', 'Lampung', '2005-01-07', 'Islam', 'adimasistiawan02@gmail.com', '$2y$10$.uuXyyn.0Cajv.UMuezKoux.qrh3BWVfPJsehfNnjjcOqyBdzNjkq', 'Belum Diverifikasi', '2021-01-05 21:06:00', '2021-01-05 21:06:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
