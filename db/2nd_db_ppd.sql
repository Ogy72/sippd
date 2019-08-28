-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2019 at 05:22 PM
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
  `label_biaya` varchar(35) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `biaya` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_biaya`
--

INSERT INTO `data_biaya` (`kd_biaya`, `label_biaya`, `kategori`, `biaya`) VALUES
('BSR001', 'Cetak Brosur', 'Biaya Print', 1500),
('CBWA470', 'Cetak A4 70gsm Hitam Putih', 'Biaya Print', 500),
('CBWA480', 'Cetak A4 80gsm Hitam Putih', 'Biaya Print', 500),
('CWA470', 'Cetak A4 70gsm Berwarna', 'Biaya Print', 700),
('CWA480', 'Cetak A4 80gsm Berwarna', 'Biaya Print', 800),
('JHCV001', 'Jilid Hard Cover', 'Biaya Jilid', 35000),
('JSCV001', 'Jilid Soft Cover Mika', 'Biaya Jilid', 7000),
('JSCV002', 'Jilid Soft Cover Karton', 'Biaya Jilid', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `data_kertas`
--

CREATE TABLE `data_kertas` (
  `kd_kertas` varchar(9) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `ukuran` varchar(15) NOT NULL,
  `ketebalan` varchar(10) NOT NULL,
  `warna` varchar(35) NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kertas`
--

INSERT INTO `data_kertas` (`kd_kertas`, `jenis`, `ukuran`, `ketebalan`, `warna`, `stok`) VALUES
('ART001', 'Art Paper', 'A4', '150gsm', 'Putih', 200),
('ART002', 'Art Karton', 'A4', '150gsm', 'Putih', 200),
('HCV001', 'Hard Cover', 'A3', '150gsm', 'Biru', 200),
('HVSA470', 'HVS', 'A4', '70gsm', 'Putih', 1000),
('HVSA480', 'HVS', 'A4', '80gsm', 'Putih', 1000),
('SCV001', 'Soft Cover Mika', 'A3', '80gsm', 'Bening', 200),
('SCV002', 'Soft Cover Karton', 'A3', '150gsm', 'Kuning', 200);

-- --------------------------------------------------------

--
-- Table structure for table `data_kurir`
--

CREATE TABLE `data_kurir` (
  `kd_kurir` varchar(9) NOT NULL,
  `label_kurir` varchar(35) NOT NULL,
  `tarif_min` int(7) NOT NULL,
  `tarif_km` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kurir`
--

INSERT INTO `data_kurir` (`kd_kurir`, `label_kurir`, `tarif_min`, `tarif_km`) VALUES
('COD', 'Cash On Delivery', 0, 0),
('GJK001', 'Gojek', 8000, 2000),
('GRB001', 'Grab', 10000, 2000);

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
-- Table structure for table `detail_kertas`
--

CREATE TABLE `detail_kertas` (
  `kd_pesanan` varchar(9) NOT NULL,
  `kd_kertas` varchar(9) NOT NULL,
  `digunakan` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(3) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `kontent` text NOT NULL,
  `tgl_post` date NOT NULL,
  `img` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `kategori`, `judul`, `kontent`, `tgl_post`, `img`) VALUES
(3, 'promo', 'test promo 2', 'Gratis Macbook Bagi Pemesan Pertama ', '2019-08-08', 'macbook.png'),
(11, 'promo', 'Promo MSI', 'Percobaan edit Promo Hanya Untuk Ermine 31', '2019-08-31', 'laptop_msi.png'),
(15, 'promo', 'input promo terbaruku hari ini merubah halaman adm', 'ini promo baru saja diinput sebagai test', '2019-08-17', 'laptop_asus.jpg'),
(16, 'informasi', 'Fotocopy Sinar Putri Samarinda', 'Dengan visi menjadi Fotocopy berkualitas dan professional dalam setiap aspek usaha sehingga menjadi andalan para pengguna jasa percetakan dan menjadi mitra yang baik serta dipercaya oleh konsumen. Seiring dengan perkembangan zaman dibidang teknologi, perusahaan-perusahaan semakin dipicu untuk menggunakan teknologi yang maju sebagai alat atau media untuk tetap bertahan dan memenangkan persaingan yang kian hari terasa sangat ketat antar usaha. Dampak pada aspek persaingan adalah terbentuknya tingkat kompetisi yang semakin tajam. Internet merupakan suatu media yang sudah tidak asing lagi diberbagai belahan dunia yang memiliki banyak fungsi. Sebagai contoh apabila ingin melakukan transaksisepertimemesanmelalui internet sangat cepat walau pun tentunya harus melewati langkah-langkah pembayaran yang berbeda, seperti menggunakan metode pembayaran lewat kartu kredit, debit master dan berbagai jenis metode lain. Tentunya cukup praktis dan sederhana tanpa harus dating langsung untuk melakukan pembayaran ditempat yang membutuhkan waktu yang lama dan biaya. Pada saat ini dalam melakukan kegiatan mencetak dokumen masih di lakukan dengan cara konvensional yaitu konsumen yang ingin mencetak dokumen harus mancari dan memilih tempat percetakan yang baik. Kemudian konsumen masih di haruskan dating ketempat tersebut untuk mencetak langsung dokumen yang ingin di cetak, dengan begitu pelanggan membuang-buang waktu dalam memilih tempat cetak yang tepat dan murah. Selain itu pelanggang tidak bisa memantau apakah percetakanya dilakukan tepat waktu atau tidak. Dari masalah diatas jelas tidak sesuai dengan perkembangan zaman saat ini dimana pada dasarnya konsumen lebih memilih jasa yang dapat melayani dengan cepat, baik dan murah.', '2019-08-15', 'sinarputri.png');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `username` varchar(18) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`username`, `nama`, `email`, `password`, `alamat`, `status`) VALUES
('Misquen88', 'Misqueen', 'sobatmisquen@gmail.c', 'lupa', 'Jalan Pinggir sungai yang sering banjir', 'activ'),
('senja9', 'Senja Mentari', 'senja99@gmail.com', 'mentari', 'Jalan Ir H Juanda 8 Gang Badak No.77 Samarinda Kaltim', 'activ');

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
  `halaman` int(4) NOT NULL,
  `copy` int(4) NOT NULL,
  `jenis_print` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(8) NOT NULL
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `password`, `level`) VALUES
('dewi45', 'dewi apriyani', 'dewi1945', 'karyawan'),
('ogy729', 'Ogy Tirta Perdana', 'shark729', 'admin');

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
-- Indexes for table `detail_kertas`
--
ALTER TABLE `detail_kertas`
  ADD KEY `foreign-key pesanan` (`kd_pesanan`),
  ADD KEY `foreign-key kertas` (`kd_kertas`);

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
  ADD KEY `foreign-key pelanggan` (`username`);

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- Constraints for table `detail_kertas`
--
ALTER TABLE `detail_kertas`
  ADD CONSTRAINT `detail_kertas_ibfk_1` FOREIGN KEY (`kd_pesanan`) REFERENCES `pesanan` (`kd_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_kertas_ibfk_2` FOREIGN KEY (`kd_kertas`) REFERENCES `data_kertas` (`kd_kertas`) ON DELETE CASCADE ON UPDATE CASCADE;

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
