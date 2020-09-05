-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 06:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `penyetuju` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `jangka_waktu` date NOT NULL,
  `judul_tugas` varchar(150) NOT NULL,
  `deskripsi_tugas` text NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `status_success` varchar(100) NOT NULL,
  `status_proccess` varchar(100) NOT NULL,
  `status_waiting_accept` varchar(100) NOT NULL,
  `status_failed` varchar(100) NOT NULL,
  `status_revisi` varchar(100) NOT NULL,
  `updateAt_proccess` date NOT NULL,
  `updateAt_waiting_accept` date NOT NULL,
  `updateAt_failed` date NOT NULL,
  `updateAt_success` date NOT NULL,
  `updateAt_revisi` date NOT NULL,
  `tujuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_tugas`
--

INSERT INTO `history_tugas` (`id`, `penyetuju`, `created_at`, `jangka_waktu`, `judul_tugas`, `deskripsi_tugas`, `id_jenis`, `status_success`, `status_proccess`, `status_waiting_accept`, `status_failed`, `status_revisi`, `updateAt_proccess`, `updateAt_waiting_accept`, `updateAt_failed`, `updateAt_success`, `updateAt_revisi`, `tujuan`) VALUES
(55, 4, '0000-00-00', '0000-00-00', 'ini percobaan', 'asa', 1, 'success', 'proccess', 'waiting_acept', '', '', '2020-08-24', '2020-08-29', '0000-00-00', '2020-08-29', '0000-00-00', 2),
(56, 4, '0000-00-00', '0000-00-00', 'ini percobaan taks job', 'asa', 2, 'success', 'proccess', 'waiting_acept', '', '', '2020-08-24', '2020-08-29', '0000-00-00', '2020-08-29', '0000-00-00', 2),
(57, 4, '0000-00-00', '0000-00-00', 'ini percobaan', 'ok', 1, '', 'proccess', 'waiting_acept', 'failed', '', '2020-08-29', '2020-08-30', '2020-09-01', '0000-00-00', '0000-00-00', 8),
(58, 4, '0000-00-00', '0000-00-00', 'ini percobaan taks job', 'ok', 2, 'success', 'proccess', 'waiting_acept', '', '', '2020-08-29', '2020-08-30', '0000-00-00', '2020-09-01', '0000-00-00', 8),
(59, 0, '0000-00-00', '0000-00-00', '', '', 2, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(60, 0, '0000-00-00', '0000-00-00', '', '', 2, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(61, 0, '0000-00-00', '0000-00-00', '', '', 2, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(62, 0, '0000-00-00', '0000-00-00', '', '', 2, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(63, 4, '0000-00-00', '0000-00-00', 'task oke', 'ok', 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2),
(64, 4, '0000-00-00', '0000-00-00', 'stugass mumut', 'oke', 2, 'success', 'proccess', 'waiting_acept', 'failed', '', '2020-08-30', '2020-09-01', '2020-09-01', '2020-08-30', '0000-00-00', 8),
(65, 4, '0000-00-00', '0000-00-00', 'tugas revuisian', 'oke', 1, 'success', 'proccess', 'waiting_acept', 'failed', '', '2020-08-30', '2020-08-30', '2020-08-30', '2020-08-30', '0000-00-00', 8),
(66, 4, '0000-00-00', '0000-00-00', 'as', 'sa', 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2),
(67, 4, '0000-00-00', '0000-00-00', 'ini percobaan', 'sas', 2, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 8),
(68, 4, '0000-00-00', '0000-00-00', 'sas', 'sasw', 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2),
(69, 4, '0000-00-00', '0000-00-00', 'sas', 'asa', 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 8),
(70, 4, '0000-00-00', '0000-00-00', 'aea', 'aese', 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2),
(71, 4, '0000-00-00', '0000-00-00', 'd', 'ds', 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2),
(72, 4, '0000-00-00', '0000-00-00', 're1r', 'd', 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2),
(73, 4, '0000-00-00', '0000-00-00', 'sas', 'ds', 2, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2),
(74, 4, '0000-00-00', '0000-00-00', 'sd', 'sfs', 2, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2),
(75, 4, '0000-00-00', '0000-00-00', 'sds', 'ds', 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2),
(76, 4, '0000-00-00', '0000-00-00', 'oke', 'sd', 1, 'success', 'proccess', 'waiting_acept', 'failed', '', '2020-09-01', '2020-09-02', '2020-09-02', '2020-09-02', '0000-00-00', 2),
(77, 4, '0000-00-00', '0000-00-00', 'dsd', 'sds', 2, '', 'proccess', 'waiting_acept', '', '', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', 8),
(78, 0, '0000-00-00', '0000-00-00', '', '', 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(79, 0, '0000-00-00', '0000-00-00', '', '', 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(80, 4, '0000-00-00', '0000-00-00', 'a', 'dd', 2, '', 'proccess', '', '', '', '2020-09-02', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 2),
(81, 4, '0000-00-00', '0000-00-00', 'ini percobaan', 'j', 2, '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 10);

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
(1, 'erp'),
(2, 'it');

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
  `deskripsi` text NOT NULL,
  `divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modul`
--

INSERT INTO `tbl_modul` (`id`, `nama`, `deskripsi`, `divisi`) VALUES
(1, 'human resource management', 'menimbang kelapa sawit', 1),
(2, 'sales management', 'pembuatan laporan penjualan yang lengkap', 1),
(3, 'accounting management', 'mengelola arus kas', 1),
(4, 'baru', 'oke', 2),
(6, 'oke', 'mantap', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modul_tugas`
--

CREATE TABLE `tbl_modul_tugas` (
  `id` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `status` enum('proccess','success') NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modul_tugas`
--

INSERT INTO `tbl_modul_tugas` (`id`, `id_tugas`, `id_modul`, `status`, `file`) VALUES
(10, 56, 1, 'success', 'ptpn6.png'),
(11, 56, 2, 'success', 'image_(1).png'),
(12, 58, 1, 'success', 'MacBook_Pro_-_322.jpg'),
(13, 58, 2, 'success', 'MacBook_Pro_-_321.jpg'),
(14, 58, 3, 'success', 'MacBook_Pro_-_323.jpg'),
(15, 58, 5, 'success', 'MacBook_Pro_-_324.jpg'),
(16, 59, 0, 'proccess', 'not add file'),
(17, 59, 0, 'proccess', 'not add file'),
(18, 60, 0, 'proccess', 'not add file'),
(19, 60, 0, 'proccess', 'not add file'),
(20, 60, 0, 'proccess', 'not add file'),
(21, 64, 4, 'success', 'MacBook_Pro_-_325.jpg'),
(22, 64, 6, 'success', 'MacBook_Pro_-_326.jpg'),
(23, 67, 1, 'proccess', 'not add file'),
(24, 73, 3, 'proccess', 'not add file'),
(25, 74, 3, 'proccess', 'not add file'),
(26, 77, 4, 'success', 'MacBook_Pro_-_3216.jpg'),
(27, 77, 6, 'success', 'MacBook_Pro_-_3215.jpg'),
(28, 80, 1, 'success', 'MacBook_Pro_-_3218.jpg'),
(29, 80, 2, 'success', 'image1.png'),
(30, 80, 3, 'proccess', 'not add file'),
(31, 81, 1, 'proccess', 'not add file'),
(32, 81, 1, 'proccess', 'not add file');

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
  `dokumen` varchar(150) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_penyetuju` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `update_at` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `status` enum('proccess','success','failed','available','waiting_accept','revisi') NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tugas`
--

INSERT INTO `tbl_tugas` (`id`, `id_tujuan`, `jangka_waktu`, `judul_tugas`, `deskripsi_tugas`, `dokumen`, `id_jenis`, `id_penyetuju`, `created_at`, `created_by`, `update_at`, `update_by`, `status`, `komentar`) VALUES
(55, 2, '2020-08-24', 'ini percobaan', 'asa', 'ptpn5.png', 1, 4, '2020-08-24', '3', '2020-08-29', '4', 'success', ''),
(56, 2, '2020-08-25', 'ini percobaan taks job', 'asa', '', 2, 4, '2020-08-24', '3', '2020-08-29', '4', 'success', ''),
(57, 8, '2020-08-30', 'ini percobaan', 'ok', 'MacBook_Pro_-_32.jpg', 1, 4, '2020-08-29', '3', '2020-09-01', '4', 'failed', 'a'),
(58, 8, '2020-08-31', 'ini percobaan taks job', 'ok', '', 2, 4, '2020-08-29', '3', '2020-09-01', '4', 'success', ''),
(64, 8, '0000-00-00', 'stugass mumut', '', 'MacBook_Pro_-_3214.jpg', 1, 4, '2020-08-30', '3', '2020-09-01', '4', 'failed', 'gabole'),
(65, 8, '2020-08-31', 'tugas revuisian', 'oke', 'image.png', 1, 4, '2020-08-30', '3', '2020-08-30', '4', 'success', 'ga boke'),
(76, 2, '2020-09-10', 'oke', 'sd', 'MacBook_Pro_-_3219.jpg', 1, 4, '2020-09-01', '3', '2020-09-02', '4', 'success', 'no'),
(77, 8, '2020-09-16', 'dsd', 'sds', '', 2, 4, '2020-09-01', '3', '2020-09-01', '8', 'waiting_accept', ''),
(80, 2, '2020-09-18', 'a', 'dd', '', 2, 4, '2020-09-02', '3', '2020-09-05', '2', 'proccess', ''),
(81, 10, '2020-09-11', 'ini percobaan', 'j', '', 2, 4, '2020-09-05', '3', '0000-00-00', '', 'available', '');

--
-- Triggers `tbl_tugas`
--
DELIMITER $$
CREATE TRIGGER `add_histories` AFTER INSERT ON `tbl_tugas` FOR EACH ROW IF NEW.status = 'available' 
then
INSERT INTO history_tugas (id,judul_tugas,deskripsi_tugas,id_jenis,penyetuju,tujuan) VALUES (NEW.id,NEW.judul_tugas,New.deskripsi_tugas,NEW.id_jenis,NEW.id_penyetuju,NEW.id_tujuan);
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `histories` AFTER UPDATE ON `tbl_tugas` FOR EACH ROW IF NEW.status = 'proccess' 
then
UPDATE history_tugas 
SET updateAt_proccess = OLD.created_at,
status_proccess = 'proccess'
WHERE id = NEW.id ;

ELSEIF NEW.status = 'waiting_accept' 
then
UPDATE history_tugas 
SET updateAt_waiting_accept = SYSDATE(),
status_waiting_accept = 'waiting_acept'
WHERE id = NEW.id ;

ELSEIF NEW.status = 'success' 
then
UPDATE history_tugas 
SET updateAt_success = SYSDATE(),
status_success = 'success'
WHERE id = NEW.id ;


ELSEIF NEW.status = 'failed' 
then
UPDATE history_tugas 
SET updateAt_failed = SYSDATE(),
status_failed = 'failed'
WHERE id = NEW.id ;

ELSEIF NEW.status = 'revisi' 
then
UPDATE history_tugas 
SET updateAt_revisi = SYSDATE(),
status_revisi = 'revisi'
WHERE id = NEW.id ;

END IF
$$
DELIMITER ;

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
(1, '127.0.0.1', 'administrator', '$2y$12$ylyDzLYv7yrwn7pCMd4Q5.QYBTTCZjikRYWwhaDIJoPJGRF7FATGa', 'admin@admin.com', NULL, '1', NULL, NULL, NULL, NULL, NULL, 1268889823, 1599319531, 1, 'Admin', 'istrator', 'ADMIN', '0', 0, 1),
(2, '::1', 'rivalino', '$2y$10$GLkkGa2OYn3pgAOEgnpKQ.Y9xArh/ngWTlzDmZDIJVyDN2YetSyIO', 'rivalino@gmail.com', NULL, '1', NULL, NULL, NULL, NULL, NULL, 1589472383, 1599322795, 1, 'Rivalino', 'lino', 'ptpn7', '086662223', 0, 1),
(3, '', 'nugraha', '$2y$10$Uc6x/aEKToQxJK4SEapm1.1Gs.3UfkOfNMZuiidfmR62gb0b.AMdy', 'nugraha@gmail.com', NULL, '1', NULL, NULL, NULL, NULL, NULL, 0, 1599322844, 1, 'ela', 'lalala', NULL, NULL, 0, 1),
(4, '', 'ela', '$2y$10$fMb0ODomQJtXos4MHgHB7.hd5N6p5jTyNmWvN/U1SnBaQt1xTy2fG', 'ella@gmail.com', NULL, '1', NULL, NULL, NULL, NULL, NULL, 0, 1599322056, 1, 'rahmadi', 'rahmat', NULL, NULL, 0, 1),
(8, '', 'mumut', '$2y$10$fMb0ODomQJtXos4MHgHB7.hd5N6p5jTyNmWvN/U1SnBaQt1xTy2fG', 'mumut@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1599304309, 1, 'mumut', 'marmut', NULL, NULL, 0, 1),
(10, '::1', 'okrhh', '$2y$10$fsLiJcxSHKSY4BQV2mNdCOY4Y5qgp1Duklv2iX/GVQLqHyo9UqFa.', 'dedy.setiawan@aux.dkatalis.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1599308527, NULL, 1, 'dedy', 'dda', NULL, NULL, 0, 2),
(11, '::1', 'dedyw', '$2y$10$A3vtgSwUiOTmrsxlLPgcauKFd7zMQvEfyelBplrD2NA.j.2vNji3m', 'yuke.priantoko@dkatalis.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1599318368, NULL, 1, 'dedy', 'ok', NULL, NULL, 0, 1),
(16, '::1', 'hh', '$2y$10$do5a2M/8v9os8bbTjr739.MKSE/1uJlbAHC7ONmhg05x8rrOVppI6', 'd@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1599320878, NULL, 1, 'azka', 'yy', NULL, NULL, 0, 2),
(17, '::1', 'kaya ', '$2y$10$o87knInYWrLk4btS/f3MO.ToKqFcYslDUAQN/Wh/UK4JYzeYHbFwK', 'as@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1599321479, NULL, 0, 'dezda', 'asa', NULL, NULL, 0, 1);

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
(14, 8, 3),
(15, 10, 3),
(16, 11, 3),
(20, 16, 3),
(21, 17, 3);

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
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_modul_tugas`
--
ALTER TABLE `tbl_modul_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
