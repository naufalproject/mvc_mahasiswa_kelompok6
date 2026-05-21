-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2026 at 04:04 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniska_latihan_mvc_2026`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_id` int DEFAULT '1' COMMENT '1 = aktif, 0 = nonaktif',
  `npm` varchar(20) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `jurusan` enum('Teknik Informatika','Sistem Informasi') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `created_at`, `updated_at`, `status_id`, `npm`, `nama_lengkap`, `fakultas`, `jurusan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`) VALUES
(1, '2026-04-30 00:31:29', '2026-04-30 00:31:29', 1, '231001001', 'Ahmad Fauzi', 'Fakultas Teknik', 'Teknik Informatika', 'Banjarmasin', '2003-05-12', 'Laki-laki'),
(2, '2026-04-30 00:31:29', '2026-04-30 00:31:29', 1, '231001002', 'Siti Aisyah', 'Fakultas Teknik', 'Sistem Informasi', 'Banjarbaru', '2002-11-23', 'Perempuan'),
(3, '2026-04-30 00:31:29', '2026-04-30 00:31:29', 1, '231001003', 'Rizky Pratama', 'Fakultas Teknik', 'Teknik Informatika', 'Martapura', '2003-02-08', 'Laki-laki'),
(14, '2026-05-06 18:28:24', '2026-05-06 18:28:24', 1, '2310010123', 'Retno Fajar Jayanti', 'Fakultas Teknik', 'Teknik Informatika', 'Banjarmasin', '2003-05-12', 'Laki-laki'),
(15, '2026-05-06 18:28:24', '2026-05-06 18:28:24', 1, '2310010456', 'Indah Sulistiawati', 'Fakultas Teknik', 'Sistem Informasi', 'Banjarbaru', '2002-11-23', 'Perempuan'),
(16, '2026-05-06 18:28:24', '2026-05-06 18:28:24', 1, '2310010789', 'Naufal Rizky Prananda', 'Fakultas Teknik', 'Teknik Informatika', 'Martapura', '2003-02-08', 'Laki-laki'),
(17, '2026-05-06 18:28:24', '2026-05-06 18:28:24', 1, '2310010135', 'Dewi Lestari', 'Fakultas Teknik', 'Sistem Informasi', 'Pelaihari', '2002-09-17', 'Perempuan'),
(18, '2026-05-06 18:28:24', '2026-05-06 18:28:24', 1, '2310010790', 'Muhammad Iqbal', 'Fakultas Teknik', 'Teknik Informatika', 'Kotabaru', '2003-01-30', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '12345', 'admin', '2026-05-21 12:01:55'),
(2, 'user', '1234', 'user', '2026-05-21 12:01:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
