-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2021 at 10:19 PM
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
  `id_diag` int(11) NOT NULL,
  `kd_diag` varchar(30) DEFAULT NULL,
  `id_periksa` int(10) DEFAULT NULL,
  `nm_diag` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id_diag`, `kd_diag`, `id_periksa`, `nm_diag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'l22', 1, 'Sakit Perut Edit', '2021-06-05 06:07:17', '2021-06-05 06:07:17', NULL),
(2, 'l22', 2, 'Sakit Perut Edit', '2021-06-07 15:18:43', '2021-06-07 15:18:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `kd_dokter` varchar(10) DEFAULT NULL,
  `nm_dokter` varchar(30) DEFAULT NULL,
  `j_kelamin` char(1) DEFAULT NULL,
  `spesialis` varchar(20) DEFAULT NULL,
  `alamat` varchar(25) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `kd_dokter`, `nm_dokter`, `j_kelamin`, `spesialis`, `alamat`, `no_telp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'DR0002', 'Dr Stone', 'P', 'Ganguan Jiwa', 'Pluto', '08123456789', '2021-06-07 14:44:27', '2021-06-07 14:44:27', NULL);

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
('RM000007', 'Elon Jr', 'Pria', 'Islam', 'Mars', '2021-06-07', '1234567890', '08123456789', 'Elon Musk', 'Anak Kandung'),
('RM000008', 'agus', 'Pria', 'Islam', 'Mars', '2021-06-01', '1234567890', '08123456789', 'Elon Musk', 'Anak Kandung'),
('RM0003', 'deni', 'Pria', 'Islam', 'jl. mawar no 9', '2000-09-12', '', '086518900123', 'tono', 'Anak Kandung');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `no_pendaftaran` int(10) NOT NULL,
  `no_rm` varchar(10) NOT NULL,
  `kd_dokter` varchar(10) DEFAULT NULL,
  `kd_poli` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_pendaftaran`, `no_rm`, `kd_dokter`, `kd_poli`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'RM000007', 'DR0002', 'PL0001', '2021-06-07 15:06:01', '2021-06-07 15:06:01', NULL),
(2, 'RM000008', 'DR0002', 'PL0001', '2021-06-07 15:10:31', '2021-06-07 15:10:31', NULL),
(4, 'RM0003', 'DR0002', 'PL0001', '2021-06-07 15:18:13', '2021-06-07 15:18:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id_periksa` int(10) NOT NULL,
  `no_pendaftaran` int(10) NOT NULL,
  `tensi` varchar(20) DEFAULT NULL,
  `nadi` varchar(20) DEFAULT NULL,
  `suhu` varchar(20) DEFAULT NULL,
  `napas` varchar(20) DEFAULT NULL,
  `bb` varchar(20) DEFAULT NULL,
  `keluhan` text DEFAULT NULL,
  `kd_diagnosa` varchar(20) DEFAULT NULL,
  `kd_tindakan` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp(),
  `daleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id_periksa`, `no_pendaftaran`, `tensi`, `nadi`, `suhu`, `napas`, `bb`, `keluhan`, `kd_diagnosa`, `kd_tindakan`, `created_at`, `update_at`, `daleted_at`) VALUES
(1, 1, '120/80', '80 detak/menit', '80 °C', 'Normal', '80 kg', 'Perut Mual', NULL, NULL, '2021-06-05 06:06:24', '2021-06-05 06:06:24', NULL),
(2, 4, '120/80', '80 detak/menit', '40 C', 'ngap 2 kali', '60 kg', 'sdada', NULL, NULL, '2021-06-07 15:18:13', '2021-06-07 15:18:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `kd_poli` varchar(10) DEFAULT NULL,
  `nm_poli` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `kd_poli`, `nm_poli`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PL0001', 'Poli Gigi', '2021-06-07 14:52:17', '2021-06-07 14:52:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resep_obt`
--

CREATE TABLE `resep_obt` (
  `id_resep` int(11) NOT NULL,
  `no_pendaftaran` int(10) DEFAULT NULL,
  `kd_obat` varchar(10) DEFAULT NULL,
  `aturan` text DEFAULT NULL,
  `takaran` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep_obt`
--

INSERT INTO `resep_obt` (`id_resep`, `no_pendaftaran`, `kd_obat`, `aturan`, `takaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, NULL, NULL, '2021-06-05 06:07:17', '2021-06-05 06:07:17', NULL),
(2, 4, NULL, NULL, NULL, '2021-06-07 15:18:51', '2021-06-07 15:18:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `kd_tindakan` int(11) NOT NULL,
  `id_periksa` int(10) DEFAULT NULL,
  `nm_tindakan` varchar(300) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`kd_tindakan`, `id_periksa`, `nm_tindakan`, `ket`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '99.22', 'Nasi Goreng', '2021-06-05 06:07:17', '2021-06-05 06:07:17', NULL),
(2, 2, '99.38', 'sda', '2021-06-07 15:18:51', '2021-06-07 15:18:51', NULL);

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
  ADD PRIMARY KEY (`id_diag`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id_periksa`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

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
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `no_pendaftaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id_periksa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resep_obt`
--
ALTER TABLE `resep_obt`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `kd_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
