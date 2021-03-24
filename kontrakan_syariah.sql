-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 04:34 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kontrakan_syariah`
--

-- --------------------------------------------------------

--
-- Table structure for table `cetak`
--

CREATE TABLE `cetak` (
  `id_cetak` int(50) NOT NULL,
  `id_krn` int(11) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak`
--

INSERT INTO `cetak` (`id_cetak`, `id_krn`, `id_invoice`, `no_invoice`, `tanggal`) VALUES
(2, 1, '1', 'a10', '2020-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id` int(11) NOT NULL,
  `nama_level` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Pemilik Kontrakan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`, `status`) VALUES
(1, 'Kepin Permana', 'Tangerang, Cipondoh', '2020-10-26 23:23:37', '0000-00-00 00:00:00', 'Sudah'),
(2, 'Ade Putra ', 'Tangerang, Cipondoh', '2020-10-27 09:03:39', '0000-00-00 00:00:00', 'Sudah Di Bayar'),
(3, 'Kepin Permana', 'Bekasi, Jawa Barat', '2020-10-28 12:13:50', '0000-00-00 00:00:00', 'Sudah Di Bayar'),
(4, 'ade Putran', 'Cipondoh, Tangerang', '2020-10-28 13:54:20', '0000-00-00 00:00:00', 'belom dibayar'),
(10, 'Komar', 'Komarudin', '2020-11-17 03:23:47', '2020-11-18 03:23:47', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontrakan`
--

CREATE TABLE `tb_kontrakan` (
  `id_krn` int(11) NOT NULL,
  `nama_krn` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `katagori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` varchar(4) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `no_pemilik` varchar(12) NOT NULL,
  `alamat_pemilik` varchar(255) NOT NULL,
  `luas` varchar(100) NOT NULL,
  `tb_kontrakan_status_id` int(11) NOT NULL DEFAULT '10',
  `tb_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kontrakan`
--

INSERT INTO `tb_kontrakan` (`id_krn`, `nama_krn`, `keterangan`, `katagori`, `harga`, `stok`, `gambar`, `nama_pemilik`, `no_pemilik`, `alamat_pemilik`, `luas`, `tb_kontrakan_status_id`, `tb_user_id`) VALUES
(23, 'Kontrakan Haji Supriadi', 'Kontrakan 2 Kamar Tidur 1 Kamar Mandi Di Dalam', 'Syariah', 600000, '4', 'kontrakan31.jpg', 'Haji Supriadi', '08136854476', 'Jl. Kh Hasyim Ahsari Rt10/03 Dekat Masjid Al Fitroh Cipondoh Tangerang', '3 x 4 Meter', 11, 22),
(29, 'kontrakan haji supriadi', 'Kontrakan 4 Ruangan Fasilitas Air dan Halaman', 'Rumahan', 700000, '3', 'rumah-kos5.png', 'Bpak Supriadi', '08131555301', 'Jl Panglima Polim Rt06/07 , Cipondoh Tangerang', '3 x 4 Meter', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontrakan_status`
--

CREATE TABLE `tb_kontrakan_status` (
  `id` int(11) NOT NULL,
  `status_kontrakan` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kontrakan_status`
--

INSERT INTO `tb_kontrakan_status` (`id`, `status_kontrakan`) VALUES
(10, 'Active'),
(11, 'Tidak aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_krn` int(11) NOT NULL,
  `nama_krn` varchar(100) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_krn`, `nama_krn`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 1, 'kontrakan haji dadang', 2, 500000, ''),
(2, 2, 2, 'Kontrakan Haji Subur', 2, 500000, ''),
(3, 2, 6, 'Kontrakan Haji Dadang', 1, 700000, ''),
(4, 3, 1, 'kontrakan haji dadang', 1, 500000, ''),
(5, 4, 2, 'Kontrakan Haji Subur', 1, 500000, ''),
(6, 5, 1, 'kontrakan haji dadang', 1, 500000, ''),
(7, 24, 1, 'kontrakan haji dadang', 1, 500000, ''),
(8, 25, 22, 'Kontrakan Bapak Dovi', 1, 400000, ''),
(9, 26, 3, 'kontrakan haji kepin', 1, 700000, ''),
(10, 27, 1, 'kontrakan haji dadang', 1, 500000, ''),
(12, 5, 27, 'Kontrakan Bapak Dedi', 1, 600000, ''),
(13, 7, 27, 'Kontrakan Bapak Dedi', 1, 600000, ''),
(15, 8, 24, 'Kontrakan Bapak Deni', 1, 500000, ''),
(16, 9, 27, 'Kontrakan Bapak Dedi', 1, 600000, ''),
(17, 10, 27, 'Kontrakan Bapak Dedi', 1, 600000, ''),
(18, 9, 27, 'Kontrakan Bapak Dedi', 1, 600000, ''),
(19, 10, 29, 'kontrakan haji supriadi', 1, 700000, '');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN 
	UPDATE tb_kontrakan SET stok = stok-NEW.jumlah
	WHERE id_krn = NEW.id_krn;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sewa`
--

CREATE TABLE `tb_sewa` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_krn` int(11) NOT NULL,
  `nama_krn` varchar(200) NOT NULL,
  `nama_pemesan` varchar(200) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sewa`
--

INSERT INTO `tb_sewa` (`id`, `id_invoice`, `id_krn`, `nama_krn`, `nama_pemesan`, `jumlah`, `gambar`, `status`) VALUES
(1, 1, 1, 'kontrakanku', 'kepin permana', '1', 'kepin.jpg', 'belum lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`, `no_tlp`, `nama_lengkap`, `gender`) VALUES
(1, 'admin', 'adminku', '81dc9bdb52d04dc20036dbd8313ed055', 1, '', '', '0'),
(2, 'user', 'user', '81dc9bdb52d04dc20036dbd8313ed055', 2, '', '', '0'),
(3, 'medina', 'medina', '81dc9bdb52d04dc20036dbd8313ed055', 2, '', '', '0'),
(4, 'bewok', 'bewok', '81dc9bdb52d04dc20036dbd8313ed055', 2, '', '', '0'),
(15, 'kepin permana', 'kepinpermana', '81dc9bdb52d04dc20036dbd8313ed055', 2, '', '', '0'),
(16, '', 'costumer1', '81dc9bdb52d04dc20036dbd8313ed055', 2, '', '', '0'),
(17, '', 'user2', 'c20ad4d76fe97759aa27a0c99bff6710', 2, '', '', '0'),
(18, 'supriadi', 'supriadi', 'supriadi', 3, '087676', 'supriadi', 'LAKI LAKI'),
(19, 'kk', 'kk', 'kk', 3, 'kk', 'kk', 'kk'),
(20, 'ujang', 'ujangaja', '81dc9bdb52d04dc20036dbd8313ed055', 3, '09878', '987688', 'laki laki'),
(21, 'Bapak Dendi Matura', 'Dendi1234', '81dc9bdb52d04dc20036dbd8313ed055', 3, '0876787656', 'Dendi Matura', 'Laki Laki'),
(22, 'dedi', 'dedi123', '81dc9bdb52d04dc20036dbd8313ed055', 3, '08767', 'dedi', 'Laki Laki'),
(23, 'pemilik1', 'pemilik1', '202cb962ac59075b964b07152d234b70', 3, '08987', 'pemilik1', 'Laki Laki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cetak`
--
ALTER TABLE `cetak`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_level` (`nama_level`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kontrakan`
--
ALTER TABLE `tb_kontrakan`
  ADD PRIMARY KEY (`id_krn`);

--
-- Indexes for table `tb_kontrakan_status`
--
ALTER TABLE `tb_kontrakan_status`
  ADD UNIQUE KEY `status_kontrakan` (`status_kontrakan`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cetak`
--
ALTER TABLE `cetak`
  MODIFY `id_cetak` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_kontrakan`
--
ALTER TABLE `tb_kontrakan`
  MODIFY `id_krn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
