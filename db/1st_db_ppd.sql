-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2019 at 11:08 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppd`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_biaya`
--

CREATE TABLE `data_biaya` (
  `kd_biaya` varchar(9) NOT NULL,
  `label_biaya` varchar(25) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `biaya` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_kertas`
--

CREATE TABLE `data_kertas` (
  `kd_kertas` varchar(9) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `ukuran` varchar(15) NOT NULL,
  `ketebalan` varchar(10) NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_kurir`
--

CREATE TABLE `data_kurir` (
  `kd_kurir` varchar(9) NOT NULL,
  `label_kurir` varchar(15) NOT NULL,
  `tarif_min` int(7) NOT NULL,
  `tarif_km` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_biaya`
--

CREATE TABLE `detail_biaya` (
  `kd_bayar` varchar(9) NOT NULL,
  `kd_biaya` varchar(9) NOT NULL,
  `sub_biaya` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(3) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `kontent` text NOT NULL,
  `tgl_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `username` varchar(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kd_bayar` varchar(9) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `total_biaya` int(9) NOT NULL,
  `kd_pesanan` varchar(9) NOT NULL,
  `kd_kurir` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `kd_pesanan` varchar(9) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(50) NOT NULL,
  `copy` int(3) NOT NULL,
  `halaman` int(4) NOT NULL,
  `cover` varchar(25) NOT NULL,
  `ket_cetak` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(8) NOT NULL,
  `kd_kertas` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(9) NOT NULL,
  `date_time` datetime NOT NULL,
  `status_pengerjaan` varchar(50) NOT NULL,
  `kd_pesanan` varchar(9) NOT NULL,
  `username` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `password` varchar(16) NOT NULL,
  `level` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_biaya`
--
ALTER TABLE `data_biaya`
  ADD PRIMARY KEY (`kd_biaya`);

--
-- Indexes for table `data_kertas`
--
ALTER TABLE `data_kertas`
  ADD PRIMARY KEY (`kd_kertas`);

--
-- Indexes for table `data_kurir`
--
ALTER TABLE `data_kurir`
  ADD PRIMARY KEY (`kd_kurir`);

--
-- Indexes for table `detail_biaya`
--
ALTER TABLE `detail_biaya`
  ADD KEY `foreign-key pembayaran` (`kd_bayar`),
  ADD KEY `foreign-key biaya` (`kd_biaya`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kd_bayar`),
  ADD KEY `foreign-key pesanan` (`kd_pesanan`),
  ADD KEY `foreign-key kurir` (`kd_kurir`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`kd_pesanan`),
  ADD KEY `foreign-key pelanggan` (`username`),
  ADD KEY `foreign-key kertas` (`kd_kertas`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign-key pesanan` (`kd_pesanan`),
  ADD KEY `foreign-key user` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_biaya`
--
ALTER TABLE `detail_biaya`
  ADD CONSTRAINT `relasi ke biaya` FOREIGN KEY (`kd_biaya`) REFERENCES `data_biaya` (`kd_biaya`) ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi ke pembayaran` FOREIGN KEY (`kd_bayar`) REFERENCES `pembayaran` (`kd_bayar`) ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `relasi ke kurir` FOREIGN KEY (`kd_kurir`) REFERENCES `data_kurir` (`kd_kurir`) ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi ke pesanan` FOREIGN KEY (`kd_pesanan`) REFERENCES `pesanan` (`kd_pesanan`) ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `relasi ke kertas` FOREIGN KEY (`kd_kertas`) REFERENCES `data_kertas` (`kd_kertas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi ke pelanggan` FOREIGN KEY (`username`) REFERENCES `pelanggan` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `relasi ke user` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`kd_pesanan`) REFERENCES `pesanan` (`kd_pesanan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
