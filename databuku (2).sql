-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 05:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `jumlah_halaman` varchar(250) NOT NULL,
  `penulis_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `penerbit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `kategori`, `tahun_terbit`, `jumlah_halaman`, `penulis_id`, `created_at`, `updated_at`, `penerbit_id`) VALUES
(2, 'Si Kancil', 'Dongeng', '2023-03-23', '50', 1, NULL, '2023-06-25 13:33:58', 2),
(3, 'Kamus Bahasa Inggris ', 'Pendidikan', '2013-05-01', '1000', 2, NULL, NULL, 0),
(4, 'Naruto Shipuden', 'Anime', '2013-05-22', '100', 2, NULL, NULL, 0),
(5, 'Dilan 1990', 'Novel Romance', '2023-05-02', '250', 3, NULL, NULL, 0),
(7, 'Cara Agar Cepat Lulus', 'Pendidikan', '2023-06-07', '100', 4, '2023-06-07 07:19:10', '2023-06-07 07:19:10', 0),
(9, 'Kisah 25 Nabi', 'Agama', '2023-06-07', '100', 15, '2023-06-07 07:53:20', '2023-06-08 17:40:26', 0),
(11, 'Ilmu Pengetahua Alam', 'Pendidikan', '2020-02-20', '200', 2, '2023-06-07 16:35:14', '2023-06-07 16:37:13', 0),
(12, 'Bahasa Koetai', 'Pendidikan', '2023-06-08', '180', 11, '2023-06-08 15:43:36', '2023-06-09 04:09:59', 0),
(13, 'Si Bisu Dan Si Tuli', 'Dongeng', '2023-06-09', '50', 6, '2023-06-09 04:16:24', '2023-06-09 04:16:24', 0),
(14, 'Matematik Jitu', 'Pendidikan', '2023-06-12', '100', 1, '2023-06-12 02:13:04', '2023-06-12 02:13:04', 0),
(15, 'Laravel 10', 'Pendidikan', '2023-06-25', '100', 1, '2023-06-25 13:55:05', '2023-06-25 14:04:23', 4),
(16, 'Cara Agar Cepat Lulus2', 'pendidikan', '2023-06-08', '180', 1, '2023-06-26 02:18:15', '2023-06-26 02:18:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buku_mahasiswa`
--

CREATE TABLE `buku_mahasiswa` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_mahasiswa`
--

INSERT INTO `buku_mahasiswa` (`id`, `mahasiswa_id`, `buku_id`) VALUES
(5, 2, 2),
(6, 2, 4),
(7, 2, 5),
(8, 3, 1),
(9, 3, 3),
(10, 4, 1),
(11, 4, 2),
(12, 4, 4),
(13, 4, 6),
(14, 12, 1),
(15, 12, 2),
(16, 12, 3),
(17, 13, 4),
(18, 13, 5),
(20, 14, 1),
(21, 14, 2),
(22, 14, 3),
(23, 15, 7),
(24, 15, 8),
(25, 15, 9),
(26, 9, 15),
(27, 16, 2),
(28, 16, 3),
(29, 16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` int(13) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `created_at`, `updated_at`) VALUES
(2, 1234567891, 'Aulia Wd', 'Samarinda', '2001-05-31', NULL, NULL),
(3, 1234567892, 'Firdan OKT', 'Jakarta', '2002-01-09', NULL, '2023-06-08 12:24:32'),
(4, 1234567893, 'Firda Dy', 'Kalimantan Barat', '2002-05-01', NULL, NULL),
(5, 1234567894, 'Adit', 'Nganjuk', '2003-07-02', '2023-06-08 11:50:20', '2023-06-08 11:50:20'),
(6, 1234567895, 'Sandra', 'Samarinda', '2002-01-23', '2023-06-23 01:59:58', '2023-06-23 01:59:58'),
(7, 1234567895, 'Agus', 'Jakarta', '2023-06-23', '2023-06-23 02:01:01', '2023-06-23 02:01:01'),
(8, 1234567898, 'Andi', 'Nganjuk', '2023-06-23', '2023-06-23 02:01:34', '2023-06-23 02:01:34'),
(9, 1234567891, 'Anugrah', 'Samarinda', '2023-06-23', '2023-06-23 03:13:34', '2023-06-23 03:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama`, `alamat`, `tgl_lahir`) VALUES
(1, 'lukman', 'Muara Bengkal Ilir', '2013-06-02'),
(2, 'Soni', 'Muara Bengkal Ulu', '2014-06-26'),
(3, 'Alul', 'Loa Kulu', '2000-06-15'),
(4, 'Aldi', 'Benua Baru', '2008-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id`, `nama`, `alamat`, `tgl_lahir`) VALUES
(1, 'Robiul Hijati', 'Muara Bengkal', '2003-05-29'),
(2, 'Rizky Patra', 'Jakarta Timur', '1999-05-03'),
(3, 'Alan Evin Gerardi', 'Tenggarong | Kutai Kartanegara', '2023-05-01'),
(4, 'Fahreza Agung Firmansyah', 'Barong Tongkok | Kutai Barat', '2023-05-01'),
(6, 'Sopian', 'Ngayau', '2011-06-30'),
(11, 'Tsamara', 'Muara Bengkal', '2020-01-05'),
(15, 'Fathur Rahman', 'MBI RT 3', '2003-02-11'),
(18, 'Rahman', 'MBI', '2023-06-18'),
(22, 'Janii', 'Mana', '2023-06-23'),
(23, 'Bambang', 'Bandung', '2001-01-24'),
(24, 'Sintia', 'Samarinda', '2001-06-26'),
(25, 'Budianto', 'Kaliorang', '2010-01-12'),
(26, 'Adaman', 'Mekkah', '2023-06-26'),
(27, 'Sulastri', 'Samarinda', '2003-01-20'),
(28, 'Diana', 'Muara Bengkal', '2023-06-10'),
(29, 'Sushi', 'South Korea', '2023-06-02'),
(30, 'ayu ayu', 'Tenggarong', '2023-05-29'),
(31, 'Zakian', 'Benua Baru', '2014-01-28'),
(32, 'Indah Permata', 'NTT', '2023-05-31'),
(33, 'riyanto', 'jakarta', '2023-06-02'),
(34, 'Auliaaa', 'Samarinda', '2023-05-31'),
(35, 'Alpian', 'Bandung', '2023-06-01'),
(36, 'Aliman', 'Sedulang', '2023-05-31'),
(37, 'hirooo', 'Tenggarong', '2023-06-16'),
(38, 'Sonia', 'Berau', '2002-07-01'),
(39, 'Farida', 'Berau', '2023-05-31'),
(40, 'Jarwo', 'jawa barat', '2023-06-14'),
(41, 'Abdul', 'Kutim', '2023-06-23'),
(42, 'andri', 'Kubar', '2023-06-27'),
(43, 'Nining', 'Benua Baru Ulu', '2023-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `penulis_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `penulis_id`, `created_at`, `updated_at`) VALUES
(3, 'mr0003', 'mr0003', 'penulis', 3, NULL, NULL),
(4, 'mr0004', 'mr0004', 'penulis', 4, NULL, NULL),
(5, 'mr0005', 'mr0005', 'penulis', 5, NULL, NULL),
(6, 'mr0006', 'mr0006', 'penulis', 6, NULL, NULL),
(7, 'mr0007', 'mr0007', 'penulis', 7, NULL, NULL),
(8, 'mr00081', 'mr00081', 'penulis', 15, '2023-06-08 17:25:14', '2023-06-08 18:26:06'),
(9, 'mr1234', 'mr1234', 'penulis', 16, '2023-06-11 05:44:55', '2023-06-11 05:44:55'),
(14, 'administrator', 'admin123', 'admin', NULL, '2023-06-11 15:02:26', '2023-06-11 15:18:19'),
(17, 'rahman123', 'rahman123', 'penulis', 18, '2023-06-17 16:55:24', '2023-06-17 16:55:24'),
(20, 'adminutama', 'admin1234', 'admin', NULL, '2023-06-19 06:03:48', '2023-06-19 06:03:48'),
(21, 'operator1', 'operator123', 'operator', NULL, '2023-06-19 06:04:15', '2023-06-19 06:04:15'),
(23, 'jani123456', 'jani123456', 'penulis', 22, '2023-06-23 03:47:12', '2023-06-23 03:47:12'),
(24, 'mr0001', 'robiulhijati123', 'penulis', 1, NULL, '2023-06-23 04:00:10'),
(25, 'mr0002', 'mr0002', 'penulis', 2, NULL, NULL),
(26, 'mr00011', 'mr00011', 'penulis', 11, NULL, NULL),
(27, 'bambang123', 'bambang123', 'penulis', 23, '2023-06-26 02:51:18', '2023-06-26 02:51:18'),
(28, 'sintia123', 'sintia123', 'penulis', 24, '2023-06-26 02:52:29', '2023-06-26 02:52:29'),
(29, 'budianto123', 'budianto123', 'penulis', 25, '2023-06-26 02:53:30', '2023-06-26 02:53:30'),
(30, 'adaman123', 'adaman123', 'penulis', 26, '2023-06-26 02:54:27', '2023-06-26 02:54:27'),
(31, 'sulastri123', 'sulastri123', 'penulis', 27, '2023-06-26 02:55:40', '2023-06-26 02:55:40'),
(32, 'diana123', 'diana123', 'penulis', 28, '2023-06-26 02:56:33', '2023-06-26 02:56:33'),
(33, 'sushi123', 'sushi123', 'penulis', 29, '2023-06-26 02:57:46', '2023-06-26 02:57:46'),
(34, 'ayuayu123', 'ayuayu123', 'penulis', 30, '2023-06-26 02:58:39', '2023-06-26 02:58:39'),
(35, 'zakian123', 'zakian123', 'penulis', 31, '2023-06-26 02:59:31', '2023-06-26 02:59:31'),
(36, 'indah123', 'indah123', 'penulis', 32, '2023-06-26 03:00:09', '2023-06-26 03:00:09'),
(37, 'riyan123', 'riyan123', 'penulis', 33, '2023-06-26 03:00:50', '2023-06-26 03:00:50'),
(38, 'aulia123', 'aulia123', 'penulis', 34, '2023-06-26 03:01:32', '2023-06-26 03:01:32'),
(39, 'alpian123', 'alpian123', 'penulis', 35, '2023-06-26 03:02:15', '2023-06-26 03:02:15'),
(40, 'aliman123', 'aliman123', 'penulis', 36, '2023-06-26 03:03:37', '2023-06-26 03:03:37'),
(41, 'Hiroooo123', 'Hiroooo123', 'penulis', 37, '2023-06-26 03:04:49', '2023-06-26 03:04:49'),
(42, 'sonia123', 'sonia123', 'penulis', 38, '2023-06-26 03:05:41', '2023-06-26 03:05:41'),
(43, 'farida123', 'farida123', 'penulis', 39, '2023-06-26 03:06:29', '2023-06-26 03:06:29'),
(44, 'jarwo123', 'jarwo123', 'penulis', 40, '2023-06-26 03:07:09', '2023-06-26 03:07:09'),
(45, 'abdul123', 'abdul123', 'penulis', 41, '2023-06-26 03:07:48', '2023-06-26 03:07:48'),
(46, 'andri123', 'andri123', 'penulis', 42, '2023-06-26 03:08:20', '2023-06-26 03:08:20'),
(47, 'nining123', 'nining123', 'penulis', 43, '2023-06-26 03:09:03', '2023-06-26 03:09:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku_mahasiswa`
--
ALTER TABLE `buku_mahasiswa`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `buku_mahasiswa`
--
ALTER TABLE `buku_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
