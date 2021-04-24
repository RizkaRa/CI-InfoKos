-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 02:52 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kos`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kos`
--

CREATE TABLE `data_kos` (
  `id_kos` int(11) NOT NULL,
  `nama_kos` varchar(50) NOT NULL,
  `untuk` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `jml_kamar` int(11) NOT NULL,
  `luas` varchar(10) NOT NULL,
  `km` varchar(20) NOT NULL,
  `fasilitas` text NOT NULL,
  `gmb_kos` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat_kos` text,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kos`
--

INSERT INTO `data_kos` (`id_kos`, `nama_kos`, `untuk`, `harga`, `jml_kamar`, `luas`, `km`, `fasilitas`, `gmb_kos`, `email`, `alamat_kos`, `deskripsi`) VALUES
(1, 'Kos Orange', 'Laki-laki', 500000, 4, '3x3', 'Luar', 'Mesin Cuci, TV, Kipas,', 'Mensetting-Kamar-Kost-Agar-Menjadi-Lebih-Nyaman.jpg', 'pemilik@gmail.com', 'Jl. Pemuda No.23, Barongan, Panjunan, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59312', ''),
(2, 'Kos Putri', 'Perempuan', 450000, 4, '4x4', 'Luar', 'AC', 'unnamed.jpg', 'andrian@gmail.com', 'Jl. Suka Mlati No.2, Mlati Kidul, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59319', 'Depan Kos ada Mini market, ATM'),
(3, 'The King Kos', 'Campur', 600000, 2, '5x5', 'Dalam', 'AC', 'bedroom-3d-model-low-poly-animated-max.jpg', 'rizka@gmail.com', 'Jl. satu dua tiga, 59876', 'Bisa untuk 1 keluarga :v'),
(4, 'Kos Mamah Muda', 'Laki-laki', 500000, 10, '6x6', 'Luar', 'AC', 'Cara-Mudah-Desain-Kamar-Tidur-Minimalis-720x480.jpg', 'pemilik@gmail.com', 'Jl. Cendol dawet, cendol dawet seger , lima ngatusan terus gak pake ketan', 'Khusus buat anak kuliah yang ganteng\"');

-- --------------------------------------------------------

--
-- Table structure for table `data_order`
--

CREATE TABLE `data_order` (
  `id_order` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `namapemesan` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `waktu` datetime NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_order`
--

INSERT INTO `data_order` (`id_order`, `id_kos`, `namapemesan`, `no_hp`, `waktu`, `comment`) VALUES
(1, 3, 'bambang', '08771724569', '2019-12-19 14:16:16', 'booking 1 tante :)'),
(2, 4, 'Bambang', '08771724569', '2019-12-19 14:29:39', 'Booking 1 om');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`) VALUES
(24, 'AC'),
(25, 'Spring Bed'),
(27, 'Kipas'),
(28, 'TV'),
(29, 'Mesin Cuci'),
(30, 'Kompor');

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE `iklan` (
  `id_iklan` int(11) NOT NULL,
  `nama_iklan` varchar(100) NOT NULL,
  `gmb_iklan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`id_iklan`, `nama_iklan`, `gmb_iklan`) VALUES
(9, 'iklan 1', 'baner1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Pencari'),
(3, 'Pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text,
  `tmpt_lahir` varchar(30) DEFAULT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `no_hp`, `gender`, `tgl_lahir`, `alamat`, `tmpt_lahir`, `id_level`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 'L', '2019-11-06', NULL, NULL, 1),
(17, 'pencari', 'pencari@gmail.com', '86ecd2486b77ff40f3b16569a19a3dc2', '08771724569', 'P', '2019-11-28', 'Dawe ', 'Kudus', 2),
(19, 'Pemilik', 'pemilik@gmail.com', '58399557dae3c60e23c78606771dfa3d', '087717246581', 'L', '2000-01-01', 'Kaliwungu', 'Kudus', 3),
(20, 'Andrian', 'andrian@gmail.com', 'f3432339f2fb1092d4e8a2fc3843c147', '0877172465867', 'L', '2000-09-09', NULL, 'Kudus', 3),
(21, 'Rizka', 'rizka@gmail.com', 'aef2c231d5e776c0e0656eaf68767848', '08654588778', 'P', '2000-01-12', NULL, 'Kudus', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kos`
--
ALTER TABLE `data_kos`
  ADD PRIMARY KEY (`id_kos`);

--
-- Indexes for table `data_order`
--
ALTER TABLE `data_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kos`
--
ALTER TABLE `data_kos`
  MODIFY `id_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_order`
--
ALTER TABLE `data_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id_iklan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
