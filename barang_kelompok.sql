-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 09:30 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barang_kelompok`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idb` varchar(15) NOT NULL,
  `idp` varchar(100) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `bk` varchar(100) DEFAULT NULL,
  `jml` varchar(100) DEFAULT NULL,
  `sisa` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`idb`, `idp`, `tgl`, `bk`, `jml`, `sisa`, `foto`) VALUES
('11001013', '01001013', '2020-10-13', 'Xiaomi', '100', '50', '60c47ce37554d.jpg'),
('11001020', '01001020', '2020-10-20', 'VIVO S11', '100', '50', '60c47d03e176a.jpg'),
('11001027', '01001027', '2020-10-27', 'OPPO A53', '150', '150', '60c47d122e553.jpg'),
('11001110', '01001110', '2020-11-10', 'VIVO S11', '150', '100', '60c47d261afde.jpg'),
('11001115', '01001115', '2020-11-15', 'SAMSUNG A12', '50', '150', '60c47d34db19a.jpg'),
('11001120', '01001120', '2020-11-20', 'SAMSUNG A10', '50', '250', '60c47d3fde2cb.jpg'),
('11001207', '01001207', '2020-12-07', 'SAMSUNG A20', '200', '250', '60c47d4d7a00c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idm` varchar(15) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `barang` varchar(100) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`idm`, `tgl_masuk`, `supplier`, `barang`, `jumlah`, `total`) VALUES
('10001011', '2020-10-11', 'PT Nusapersada', 'XIAOMI', '150', '150'),
('10001018', '2020-10-18', 'PT Nusapersada', 'VIVO S11', '150', '150'),
('10001025', '2020-10-25', 'PT Nusapersada', 'OPPO A53', '300', '300'),
('10001101', '2020-11-01', 'PT Nusapersada', 'XIAOMI', '300', '450'),
('10001108', '2020-11-08', 'PT Nusapersada', 'VIVO S11', '150', '300'),
('10001113', '2020-11-13', 'PT Nusapersada', 'OPPO A53', '200', '500'),
('20001112', '2020-11-12', 'PT DGI', 'SAMSUNG A12', '200', '200'),
('20001116', '2020-11-16', 'PT DGI', 'SAMSUNG A10', '150', '150'),
('20001120', '2020-11-20', 'PT DGI', 'SAMSUNG A10', '150', '300'),
('20001128', '2020-11-28', 'PT DGI', 'SAMSUNG A12', '200', '400'),
('20001201', '2020-12-01', 'PT DGI', 'SAMSUNG A20', '150', '150'),
('20001205', '2020-12-05', 'PT DGI', 'SAMSUNG A20', '400', '550'),
('20001209', '2020-12-09', 'PT DGI', 'SAMSUNG A12', '250', '650'),
('20001213', '2020-12-13', 'PT DGI', 'SAMSUNG A10', '150', '450');

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `idp` varchar(15) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`idp`, `nama`, `alamat`, `tgl_terima`, `nama_barang`, `jumlah`, `foto`) VALUES
('01001013', 'Aldo Cell', 'Tulungagung, Jawa timur', '2020-10-13', 'Xiaomi', '100', '60c47bbbf1c3a.jpg'),
('01001020', 'Aldo Cell', 'Tulungagung, Jawa timur', '2020-10-27', 'VIVO S11', '100', '60c47bf8010a1.jpg'),
('01001027', 'Aldo Cell', 'Tulungagung, Jawa timur', '2020-11-04', 'OPPO A53', '150', '60c47c9c2bd3a.jpg'),
('01001110', 'Aldo Cell', 'Tulungagung, Jawa timur', '2020-11-17', 'VIVO S11', '150', '60c47cac83365.jpg'),
('01001115', 'Aldo Cell', 'Tulungagung, Jawa timur', '2020-11-22', 'SAMSUNG A12', '50', '60c47cb899239.jpg'),
('01001120', 'Aldo Cell', 'Tulungagung, Jawa timur', '2020-11-27', 'SAMSUNG A10', '50', '60c47cc3e7f4f.jpg'),
('01001207', 'Aldo Cell', 'Tulungagung, Jawa timur', '2020-12-14', 'SAMSUNG A20', '200', '60c47ccf43741.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ids` varchar(15) NOT NULL,
  `namasp` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ids`, `namasp`, `alamat`, `no_telp`) VALUES
('10001011', 'PT Nusapersada', 'Jakarta, Indonesia', '085222123123'),
('10001018', 'PT Nusapersada', 'Jakarta, Indonesia', '085222123123'),
('10001025', 'PT Nusapersada', 'Jakarta, Indonesia', '085222123123'),
('10001101', 'PT Nusapersada', 'Jakarta, Indonesia', '085222123123'),
('10001108', 'PT Nusapersada', 'Jakarta, Indonesia', '085222123123'),
('10001113', 'PT Nusapersada', 'Jakarta, Indonesia', '085222123123'),
('20001112', 'PT DGI', 'Jakarta pusat, Indonesia', '08143143234'),
('20001116', 'PT DGI', 'Jakarta pusat, Indonesia', '08143143234'),
('20001120', 'PT DGI', 'Jakarta pusat, Indonesia', '08143143234'),
('20001128', 'PT DGI', 'Jakarta pusat, Indonesia', '08143143234'),
('20001201', 'PT DGI', 'Jakarta pusat, Indonesia', '08143143234'),
('20001205', 'PT DGI', 'Jakarta pusat, Indonesia', '08143143234'),
('20001209', 'PT DGI', 'Jakarta pusat, Indonesia', '08143143234'),
('20001213', 'PT DGI', 'Jakarta pusat, Indonesia', '08143143234');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(11, 'riski', '$2y$10$ujaWMOQDDIqeKe.sBZR.HOz08iKu1e1alnXUFbHESiMiox8sRNJ0.', 'rickolowo27@gmail.com'),
(12, 'ris', '$2y$10$axBvGb4UerKTrEbMm7NV5e2nJQDHaW1ixeV3vKt2/u1ezxNbCtFze', 'rizaltaufiq861@gmail.com'),
(13, 'vir', '$2y$10$Bk5ZuuPUbrRkr9/8AzhwfONEu5D8lVyTrcWB1JOJEmOPYHWzHhuzq', 'kiir616@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idb`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idm`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
