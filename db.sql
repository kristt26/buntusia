-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 07:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `pekerjaan_id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `bobot` double NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `pekerjaan_id`, `detail`, `bobot`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Mobilisasi Tenaga Kerja, Material, dan Peralatan', 53.33, '1', '2021-12-20 22:45:12', '2021-12-20 22:45:12', NULL),
(2, 1, 'Peralatan Safety', 16.67, '1', '2021-12-20 23:10:57', '2021-12-20 23:10:57', NULL),
(3, 1, 'Dokumen Administrasi dan CSMS', 10, '1', '2021-12-20 23:11:29', '2021-12-20 23:11:29', NULL),
(4, 1, 'Safety Man', 20, '0', '2021-12-20 23:11:46', '2021-12-21 20:57:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` int(11) NOT NULL,
  `nama` varchar(191) DEFAULT NULL,
  `alamat` varchar(191) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `nama`, `alamat`, `tgl_lahir`, `tempat_lahir`, `email`, `no_telp`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Manajer', NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL),
(6, 'Deni Malik', 'Tanah Hitam', '2021-12-16', 'Ambon', 'kristt26@gmail.com', '082238281801', 12, '2021-12-20 18:41:04', '2021-12-20 18:55:32', NULL),
(7, 'Bagus Joko Susilo', 'Aryoko', '2021-12-01', 'Jayapura', 'bagus@mail.com', '082238281801', 13, '2021-12-21 19:44:08', '2021-12-21 19:44:08', NULL),
(8, 'Candra Putra Wicaksana', 'Perum Permata Indah Blod D No. 141', '1995-05-20', 'Arso', 'candra@mail.com', '08232156132', 14, '2021-12-22 07:07:25', '2021-12-22 07:07:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaans`
--

CREATE TABLE `pekerjaans` (
  `id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `pekerjaan` text NOT NULL,
  `bobot` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerjaans`
--

INSERT INTO `pekerjaans` (`id`, `proyek_id`, `pekerjaan`, `bobot`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 'Pekerjaan Persiapan', 6.04, '2021-12-20 21:24:53', '2021-12-20 21:38:53', NULL),
(2, 6, 'Perawatan Tangki Timbun  Nomor 5', 6.63, '2021-12-20 21:34:03', '2021-12-20 21:34:03', NULL),
(3, 6, 'Perawatan Tangki Timbun  Nomor 8', 37.43, '2021-12-20 21:40:21', '2021-12-20 21:42:59', NULL),
(4, 6, 'Roof Tangki 13', 47.37, '2021-12-20 21:43:44', '2021-12-20 21:43:44', NULL),
(5, 6, 'Pekerjaan Akhir', 2.53, '2021-12-20 21:44:04', '2021-12-20 21:44:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proyeks`
--

CREATE TABLE `proyeks` (
  `id` int(11) NOT NULL,
  `proyek` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `pegawai_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `proyeks`
--

INSERT INTO `proyeks` (`id`, `proyek`, `lokasi`, `waktu`, `pegawai_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Perawatan Tangki Timbun Nomor 5 & 8 dan Roof Tangki 13', 'Fuel Pertamina Jayapura', '60 Hari Kalender', 7, '2021-12-20 19:33:52', '2021-12-20 19:33:52', NULL),
(10, 'Peremajaan Jalur Listrik dan Pemasangan Panel ATS Genset di Fuel Terminal Jayapura', 'Fuel Terminal Jayapura', '30 Hari Kalender', 8, '2021-12-20 21:59:25', '2021-12-20 21:59:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `role` enum('Administrator','Pengawas','Manajer') DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'Manajer', '$2y$10$efwTHouBsRkW0xFiXITMPO8cDjXFnemPG9S.Hd5z9J4O7h3JzcMtC', 'Manajer', '1', NULL, NULL, NULL),
(12, 'Admin', '$2y$10$Ipb2TICTzL38W8p1gTlx/eCdAeeJk9Rk83O84InQjBoknPd7gAXw.', 'Administrator', '1', '2021-12-20 18:41:04', '2021-12-21 09:24:42', NULL),
(13, 'bagus', '$2y$10$qSaruLdEunAWh9WSD9nj8.K.ghKjKgnq9YiYFVxRDo7k1cLa/IAqK', 'Pengawas', '1', '2021-12-21 19:44:08', '2021-12-21 19:44:08', NULL),
(14, 'candra', '$2y$10$R1eDtUbMAVFLSoZ7F/Lq/O8NRzGQcRykcKvuyPavfGwmYsBRsrMUW', 'Pengawas', '1', '2021-12-22 07:07:25', '2021-12-22 07:39:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_details_pekerjaans1_idx` (`pekerjaan_id`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_pegawai_users1_idx` (`user_id`);

--
-- Indexes for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pekerjaan_proyek1_idx` (`proyek_id`);

--
-- Indexes for table `proyeks`
--
ALTER TABLE `proyeks`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_proyek_pegawai_idx` (`pegawai_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proyeks`
--
ALTER TABLE `proyeks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `fk_details_pekerjaans1` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaans` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `fk_pegawai_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  ADD CONSTRAINT `fk_pekerjaan_proyek1` FOREIGN KEY (`proyek_id`) REFERENCES `proyeks` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `proyeks`
--
ALTER TABLE `proyeks`
  ADD CONSTRAINT `fk_proyek_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
