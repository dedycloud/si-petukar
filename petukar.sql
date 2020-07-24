-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 03:48 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petukar`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'project_manager', 'General User'),
(3, 'karyawan', ''),
(4, 'co_project_manager', '');

-- --------------------------------------------------------

--
-- Table structure for table `history_tugas`
--

CREATE TABLE `history_tugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `id` int(11) NOT NULL,
  `nama_bagian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bagian`
--

INSERT INTO `tbl_bagian` (`id`, `nama_bagian`) VALUES
(1, 'erp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_tugas`
--

CREATE TABLE `tbl_jenis_tugas` (
  `id` int(11) NOT NULL,
  `jenis_tugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_tugas`
--

INSERT INTO `tbl_jenis_tugas` (`id`, `jenis_tugas`) VALUES
(1, 'new task'),
(2, 'job description ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modul`
--

CREATE TABLE `tbl_modul` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modul`
--

INSERT INTO `tbl_modul` (`id`, `nama`, `deskripsi`) VALUES
(1, 'human resource management', 'menimbang kelapa sawit'),
(2, 'sales management', 'pembuatan laporan penjualan yang lengkap'),
(3, 'accounting management', 'mengelola arus kas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modul_tugas`
--

CREATE TABLE `tbl_modul_tugas` (
  `id` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modul_tugas`
--

INSERT INTO `tbl_modul_tugas` (`id`, `id_tugas`, `id_modul`, `status`) VALUES
(1, 12, 1, 'dikerjakan'),
(2, 12, 2, 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tugas`
--

CREATE TABLE `tbl_tugas` (
  `id` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `jangka_waktu` date NOT NULL,
  `judul_tugas` varchar(50) NOT NULL,
  `deskripsi_tugas` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_penyetuju` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `update_at` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `status` enum('proccess','success','failed','available','waiting_accept') NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tugas`
--

INSERT INTO `tbl_tugas` (`id`, `id_tujuan`, `jangka_waktu`, `judul_tugas`, `deskripsi_tugas`, `jenis`, `id_jenis`, `id_penyetuju`, `created_at`, `created_by`, `update_at`, `update_by`, `status`, `komentar`) VALUES
(8, 2, '2020-05-28', 'penilaian kinerja karyawan', 'melihat kerja karyawan perhari', '', 1, 0, '2020-05-19', '3', '2020-05-30', '2', 'proccess', ''),
(9, 4, '2020-05-03', 'laporan analitik keuangan', 'menghitung akunntansi keuangan ', '', 1, 0, '2020-05-19', '3', '2020-05-20', '3', '', ''),
(10, 2, '2020-05-25', 'membuat laporan timbang ', '', '', 1, 4, '2020-05-19', '3', '2020-06-01', '4', 'proccess', ''),
(12, 2, '2020-05-23', 'sdm', 'penilaian kinerja karyawan', '', 2, 4, '2020-05-03', '3', '2020-06-01', '2', 'proccess', ''),
(13, 2, '0000-00-00', 'membuat laporan hasil timbang kelapa sawit', '', '', 1, 4, '2020-05-31', '3', '2020-06-01', '2', 'proccess', ''),
(14, 4, '2020-05-16', 'menghitung kurva pengeluaran', 'meghitung kurva pengeluaran setiap bulan nya ', '', 1, 0, '2020-05-31', '3', '2020-06-01', '4', 'proccess', ''),
(15, 2, '2020-05-28', 'menghitung laporan keuangan', 'hitung laporan keuangan tahunan', '', 1, 4, '2020-05-31', '3', '2020-06-01', '2', 'proccess', ''),
(16, 2, '2020-05-06', 'menghitung jumlah karyawan', 'itung karyawan nya berapa', '', 1, 4, '2020-05-31', '3', '2020-05-31', '4', 'failed', 'komen yang baru'),
(19, 8, '2020-05-28', 'nulis absen', 'tttt', '', 1, 4, '2020-05-31', '3', '2020-05-31', '8', 'waiting_accept', ''),
(21, 8, '2020-06-26', 'hasil ', 'akhir', '', 1, 4, '2020-06-01', '3', '2020-06-01', '4', 'success', ''),
(22, 8, '2020-06-26', 'menganalisa keuangan', 'analisa keuangan dengan jurnal tahunan ', '', 1, 4, '2020-06-27', '3', '0000-00-00', '', 'available', ''),
(24, 8, '2020-07-15', 'mencatat laporan buruh borongan ', 'buruh lokasi 36 ', '', 1, 4, '2020-07-03', '3', '2020-07-03', '8', 'waiting_accept', 'catatan dibuat perhari\r\n'),
(25, 2, '2020-07-31', 'membuat laporan hasil timbang mingguan', 'laporan hasil timbang yang sudah selesai dikerjakan, dikirim ke bagian sekretaris ', '', 1, 4, '2020-07-04', '3', '2020-07-04', '4', 'success', 'yang dibuat laporan hasil timbang dimulai dari bulan agustus '),
(26, 2, '2020-07-07', 'analisis pendapatan', 'analisa menggunakan metode pieces', '', 1, 4, '2020-07-04', '3', '2020-07-04', '2', 'waiting_accept', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `id_jabatan`, `id_bagian`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$ylyDzLYv7yrwn7pCMd4Q5.QYBTTCZjikRYWwhaDIJoPJGRF7FATGa', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1590757556, NULL, 'Admin', 'istrator', 'ADMIN', '0', 0, 0),
(2, '::1', 'rivalino', '$2y$10$GLkkGa2OYn3pgAOEgnpKQ.Y9xArh/ngWTlzDmZDIJVyDN2YetSyIO', 'rivalino@gmail.com', NULL, '1', NULL, NULL, NULL, NULL, NULL, 1589472383, 1593849644, 1, 'Rivalino', 'lino', 'ptpn7', '086662223', 0, 0),
(3, '', 'nugraha', '$2y$10$Uc6x/aEKToQxJK4SEapm1.1Gs.3UfkOfNMZuiidfmR62gb0b.AMdy', 'nugraha@gmail.com', NULL, '1', NULL, NULL, NULL, NULL, NULL, 0, 1594453564, 1, 'ela', 'lalala', NULL, NULL, 0, 0),
(4, '', 'ela', '$2y$10$fMb0ODomQJtXos4MHgHB7.hd5N6p5jTyNmWvN/U1SnBaQt1xTy2fG', 'ella@gmail.com', NULL, '1', NULL, NULL, NULL, NULL, NULL, 0, 1594453528, 1, 'rahmadi', 'rahmat', NULL, NULL, 0, 0),
(8, '', 'mumut', '$2y$10$fMb0ODomQJtXos4MHgHB7.hd5N6p5jTyNmWvN/U1SnBaQt1xTy2fG', 'mumut@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1593762512, 1, 'mumut', 'marmut', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 2, 3),
(6, 3, 2),
(7, 4, 4),
(8, 8, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_tugas`
--
ALTER TABLE `history_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_tugas`
--
ALTER TABLE `tbl_jenis_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_modul`
--
ALTER TABLE `tbl_modul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_modul_tugas`
--
ALTER TABLE `tbl_modul_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history_tugas`
--
ALTER TABLE `history_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jenis_tugas`
--
ALTER TABLE `tbl_jenis_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_modul`
--
ALTER TABLE `tbl_modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_modul_tugas`
--
ALTER TABLE `tbl_modul_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD CONSTRAINT `tbl_tugas_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tbl_jenis_tugas` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
