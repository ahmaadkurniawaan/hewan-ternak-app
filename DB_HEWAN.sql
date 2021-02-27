-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2021 at 05:08 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB_HEWAN`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_order`
--

CREATE TABLE `tb_detail_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) DEFAULT NULL,
  `produk` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_order`
--

INSERT INTO `tb_detail_order` (`id`, `order_id`, `produk`, `qty`, `harga`) VALUES
(8, 4, 30, 1, '55000000'),
(9, 4, 28, 1, '550000'),
(10, 4, 31, 1, '15000000'),
(11, 5, 30, 1, '55000000'),
(12, 6, 29, 2, '600000'),
(13, 7, 30, 1, '55000000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hewan`
--

CREATE TABLE `tb_hewan` (
  `idhewan` int(10) UNSIGNED NOT NULL,
  `nama_hewan` varchar(255) DEFAULT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `stok` varchar(255) NOT NULL,
  `berat` varchar(255) NOT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `umur` varchar(255) NOT NULL,
  `kelamin` enum('Jantan','Betina') NOT NULL,
  `img_hewan` varchar(50) DEFAULT NULL,
  `kondisi` enum('Baik','Sangat Baik') NOT NULL,
  `alamat` text NOT NULL,
  `link_alamat` varchar(255) NOT NULL,
  `kategori` int(10) DEFAULT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hewan`
--

INSERT INTO `tb_hewan` (`idhewan`, `nama_hewan`, `nama_pemilik`, `deskripsi`, `stok`, `berat`, `harga`, `umur`, `kelamin`, `img_hewan`, `kondisi`, `alamat`, `link_alamat`, `kategori`, `date_created`) VALUES
(28, 'Kambing Cempe', 'HETER', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '4', '25kg', '550000', '2 tahun', 'Jantan', '309648f1e811871fff0a0f98a59d3f3c.jpg', 'Baik', 'Kebumen', 'https://goo.gl/maps/5FujkLnXRAvLxVuX6', 1, '2020-12-18'),
(29, 'Kambing Gembel', 'HETER', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '3', '23kg', '600000', '1 tahun', 'Betina', 'e846b0062a0a8f205e0871eb8d1132d8.jpg', 'Sangat Baik', 'Purworejo', 'https://goo.gl/maps/5FujkLnXRAvLxVuX6', 1, '2020-12-18'),
(30, 'Sapi ', 'HETER', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '7', '200kg', '55000000', '5 tahun', 'Betina', '9cb144e88f9ad0938f0d31a76fe6dbf2.jpg', 'Sangat Baik', 'Purworejo', 'https://goo.gl/maps/5FujkLnXRAvLxVuX6', 2, '2020-12-18'),
(31, 'Sapi Salju', 'HETER', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '3', '270kg', '15000000', '3 tahun', 'Jantan', '2265d85c139472abca080c87937bf065.jpg', 'Sangat Baik', 'Yogyakarta', 'https://goo.gl/maps/5FujkLnXRAvLxVuX6', 2, '2020-12-18'),
(32, 'Sapi Betina', 'HETER', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '6', '20 kg', '600.000', '2tahun', 'Betina', 'a908dc58ad00acae9144ded95a7236a0.jpg', 'Sangat Baik', 'Lampung', 'https://goo.gl/maps/zoVRKyMA2Kk3FzLS6', 2, '2020-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Kambing'),
(2, 'Sapi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `pelanggan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `tanggal`, `pelanggan`) VALUES
(4, '2020-12-18', 4),
(5, '2020-12-18', 5),
(6, '2020-12-18', 6),
(7, '2020-12-20', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `nama`, `email`, `alamat`, `telp`, `pesan`) VALUES
(4, 'Muhammad Amien', 'amin@gmail.com', 'Kebumen', '0833-8989-6735', 'Tambahkan Tali Untung mengikat...'),
(6, 'Restinur', 'restinur0202@gmail.com', 'Kebumen', '0834-8688-8923', 'Kirim cepat sekarang yaa'),
(7, 'kharisma', 'kharisma@gmail.com', 'Yogyakarta', '8234234234', 'cepat..\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `idslider` int(11) NOT NULL,
  `link_slider` varchar(255) NOT NULL,
  `img_slider` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`idslider`, `link_slider`, `img_slider`, `date_created`) VALUES
(28, 'goat', 'person-b1-wYLPGAAzlu0-unsplash.jpg', '2020-12-25'),
(29, 'cow', 'sergey-semin-y9b1WdKR5dQ-unsplash.jpg', '2020-12-25'),
(30, 'goat', 'ray-aucott-xB0e8bDV4ww-unsplash.jpg', '2020-12-25'),
(31, 'goat', 'lamine-bendib-Ep-jQikE3-w-unsplash.jpg', '2020-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subscribe`
--

CREATE TABLE `tb_subscribe` (
  `idsubscribe` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_subscribe`
--

INSERT INTO `tb_subscribe` (`idsubscribe`, `email`) VALUES
(1, 'ahmaadkurniawaan@gmail.com'),
(2, 'ahmadwawan520@gmail.com'),
(3, 'hendradarmawan30ma@gmail.com'),
(4, 'restinur0202@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_voucher`
--

CREATE TABLE `tb_voucher` (
  `id` int(11) NOT NULL,
  `voucher` varchar(255) NOT NULL,
  `diskon` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_voucher`
--

INSERT INTO `tb_voucher` (`id`, `voucher`, `diskon`, `date_created`) VALUES
(1, 'V123', '1000', '2020-12-08'),
(2, 'V345', '2000', '2020-12-08'),
(3, 'V678', '3000', '2020-12-08'),
(5, 'V332', '300000', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_hewan`
--
ALTER TABLE `tb_hewan`
  ADD PRIMARY KEY (`idhewan`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`idslider`);

--
-- Indexes for table `tb_subscribe`
--
ALTER TABLE `tb_subscribe`
  ADD PRIMARY KEY (`idsubscribe`);

--
-- Indexes for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_hewan`
--
ALTER TABLE `tb_hewan`
  MODIFY `idhewan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `idslider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_subscribe`
--
ALTER TABLE `tb_subscribe`
  MODIFY `idsubscribe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
