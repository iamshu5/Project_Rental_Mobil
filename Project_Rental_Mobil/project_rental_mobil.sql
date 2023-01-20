-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2022 at 06:15 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akun`
--

CREATE TABLE `tabel_akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `foto` varchar(60) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `tabel_akun`
--

INSERT INTO `tabel_akun` (`id`, `nama`, `username`, `password`, `foto`) VALUES
(1, 'ilham', 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenis_payment`
--

CREATE TABLE `tabel_jenis_payment` (
  `id` int(11) NOT NULL,
  `jenis_payment` varchar(25) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `tabel_jenis_payment`
--

INSERT INTO `tabel_jenis_payment` (`id`, `jenis_payment`) VALUES
(1, 'cash'),
(2, 'kredit');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_merk`
--

CREATE TABLE `tabel_merk` (
  `id` int(11) NOT NULL,
  `merk` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `tabel_merk`
--

INSERT INTO `tabel_merk` (`id`, `merk`) VALUES
(1, 'toyota');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mobil`
--

CREATE TABLE `tabel_mobil` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `no_polisi` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `warna` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `tahun_mobil` int(4) NOT NULL,
  `jumlah_kursi` int(1) NOT NULL,
  `gambar` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `id_merk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `tabel_mobil`
--

INSERT INTO `tabel_mobil` (`id`, `nama`, `no_polisi`, `warna`, `tahun_mobil`, `jumlah_kursi`, `gambar`, `id_merk`) VALUES
(2, 'FORTUNER', 'B 1234 ABC', 'HITAM', 2022, 7, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pemesan`
--

CREATE TABLE `tabel_pemesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `telp` int(11) NOT NULL,
  `foto` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_perjalanan`
--

CREATE TABLE `tabel_perjalanan` (
  `id` int(11) NOT NULL,
  `asal` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `tujuan` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `jarak` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pesanan`
--

CREATE TABLE `tabel_pesanan` (
  `id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_perjalanan` int(11) NOT NULL,
  `id_jenis_payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_akun`
--
ALTER TABLE `tabel_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_jenis_payment`
--
ALTER TABLE `tabel_jenis_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_merk`
--
ALTER TABLE `tabel_merk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merk` (`merk`);

--
-- Indexes for table `tabel_mobil`
--
ALTER TABLE `tabel_mobil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_merk` (`id_merk`);

--
-- Indexes for table `tabel_pemesan`
--
ALTER TABLE `tabel_pemesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_perjalanan`
--
ALTER TABLE `tabel_perjalanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_pesanan`
--
ALTER TABLE `tabel_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pemesan` (`id_pemesan`),
  ADD UNIQUE KEY `id_mobil` (`id_mobil`),
  ADD UNIQUE KEY `id_perjalanan` (`id_perjalanan`),
  ADD UNIQUE KEY `id_jenis_payment` (`id_jenis_payment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_akun`
--
ALTER TABLE `tabel_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_jenis_payment`
--
ALTER TABLE `tabel_jenis_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_merk`
--
ALTER TABLE `tabel_merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_mobil`
--
ALTER TABLE `tabel_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_pemesan`
--
ALTER TABLE `tabel_pemesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_perjalanan`
--
ALTER TABLE `tabel_perjalanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_pesanan`
--
ALTER TABLE `tabel_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_mobil`
--
ALTER TABLE `tabel_mobil`
  ADD CONSTRAINT `tabel_mobil_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `tabel_merk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_pesanan`
--
ALTER TABLE `tabel_pesanan`
  ADD CONSTRAINT `tabel_pesanan_ibfk_1` FOREIGN KEY (`id_pemesan`) REFERENCES `tabel_pemesan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_pesanan_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `tabel_mobil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_pesanan_ibfk_3` FOREIGN KEY (`id_perjalanan`) REFERENCES `tabel_perjalanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_pesanan_ibfk_4` FOREIGN KEY (`id_jenis_payment`) REFERENCES `tabel_jenis_payment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
