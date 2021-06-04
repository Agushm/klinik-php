-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2021 at 08:16 AM
-- Server version: 10.3.29-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `kd_diag` varchar(11) NOT NULL,
  `id_periksa` int(10) NOT NULL,
  `nm_diag` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`kd_diag`, `id_periksa`, `nm_diag`, `created_at`, `updated_at`, `deleted_at`) VALUES
('I10', 0, 'Hypertension', '2021-06-03 14:11:27', '2021-06-03 14:11:27', '2021-06-03 14:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `no_kunjungan` int(10) NOT NULL,
  `no_rm` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`no_kunjungan`, `no_rm`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'RM000001', '2021-06-03 15:59:27', '2021-06-03 15:59:27', NULL),
(3, 'RM000002', '2021-06-03 16:09:18', '2021-06-03 16:09:18', NULL),
(6, 'RM000001', '2021-06-03 16:28:32', '2021-06-03 16:28:32', NULL),
(7, 'RM000001', '2021-06-03 16:28:43', '2021-06-03 16:28:43', NULL),
(8, 'RM000001', '2021-06-03 16:33:07', '2021-06-03 16:33:07', NULL),
(9, 'RM000001', '2021-06-03 16:34:25', '2021-06-03 16:34:25', NULL),
(10, 'RM000001', '2021-06-03 16:35:40', '2021-06-03 16:35:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kd_obat` varchar(10) NOT NULL,
  `nm_obat` varchar(30) NOT NULL,
  `ukuran` int(20) NOT NULL,
  `ket` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp(),
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nm_obat`, `ukuran`, `ket`, `created_at`, `update_at`, `delete_at`) VALUES
('OBT001', 'Sinovac', 500, 'Vaksin Covid', '2021-06-03 15:18:07', '2021-06-03 15:18:07', NULL),
('OBT002', 'Pil Koplo edited', 100, 'Dapat menyebabkan pusing', '2021-06-03 15:31:44', '2021-06-03 15:31:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `no_rm` varchar(11) NOT NULL,
  `nm_pasien` varchar(300) NOT NULL,
  `j_kel` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `nm_kel` varchar(20) NOT NULL,
  `hub_kel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_rm`, `nm_pasien`, `j_kel`, `agama`, `alamat`, `tgl_lhr`, `ktp`, `no_tlp`, `nm_kel`, `hub_kel`) VALUES
('RM000001', 'anita', 'Pria', 'Islam', 'Jl.sudirman no 90', '2000-09-12', '', '089732100018', 'septian', 'Anak Kandung'),
('RM000002', 'anta', 'Pria', 'Islam', 'surakarta', '2000-09-23', '', '082316723421', 'susanto', 'Anak Kandung'),
('RM0003', 'deni', 'Pria', 'Islam', 'jl. mawar no 9', '2000-09-12', '', '086518900123', 'tono', 'Anak Kandung');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id_periksa` int(10) NOT NULL,
  `no_kunjungan` int(10) NOT NULL,
  `tensi` varchar(10) DEFAULT NULL,
  `nadi` varchar(10) DEFAULT NULL,
  `suhu` varchar(10) DEFAULT NULL,
  `napas` varchar(10) DEFAULT NULL,
  `bb` varchar(10) DEFAULT NULL,
  `keluhan` varchar(30) DEFAULT NULL,
  `kd_diagnosa` varchar(20) DEFAULT NULL,
  `kd_tindakan` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp(),
  `daleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id_periksa`, `no_kunjungan`, `tensi`, `nadi`, `suhu`, `napas`, `bb`, `keluhan`, `kd_diagnosa`, `kd_tindakan`, `created_at`, `update_at`, `daleted_at`) VALUES
(1, 1, 'embuh', 'embuh', 'embuh', 'embuh', 'embuh', 'pusing', '', '', '2021-06-03 16:14:38', '2021-06-03 16:14:38', NULL),
(2, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-03 16:35:40', '2021-06-03 16:35:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resep_obt`
--

CREATE TABLE `resep_obt` (
  `id_resep` int(11) NOT NULL,
  `no_kunjungan` int(10) NOT NULL,
  `kd_obat` varchar(10) NOT NULL,
  `aturan` varchar(20) NOT NULL,
  `takaran` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `kd_tindakan` int(11) NOT NULL,
  `id_periksa` int(10) NOT NULL,
  `nm_tindakan` varchar(300) NOT NULL,
  `ket` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`kd_tindakan`, `id_periksa`, `nm_tindakan`, `ket`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 0, '99.21', 'Injeksi Anti Biotik', '2021-06-03 14:05:04', '2021-06-03 14:05:04', '2021-06-03 14:05:04'),
(11, 0, '99.18', 'INFUS', '2021-06-03 14:05:04', '2021-06-03 14:05:04', '2021-06-03 14:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `alamat`, `role`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'desi', 'boyolali', 'admin', '2021-06-03 14:27:41', '2021-06-03 14:27:41', NULL),
(2, 'dokter', 'd22af4180eee4bd95072eb90f94930e5', 'Dr Stone', 'Mars', 'dokter', '2021-06-03 15:00:04', '2021-06-03 15:00:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`kd_diag`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`no_kunjungan`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id_periksa`);

--
-- Indexes for table `resep_obt`
--
ALTER TABLE `resep_obt`
  ADD PRIMARY KEY (`id_resep`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`kd_tindakan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `no_kunjungan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id_periksa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resep_obt`
--
ALTER TABLE `resep_obt`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `kd_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
