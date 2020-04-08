-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 05:48 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengepul`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'profil21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_pertanian`
--

CREATE TABLE `data_pertanian` (
  `idpertanian` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pertanian`
--

INSERT INTO `data_pertanian` (`idpertanian`, `jenis`) VALUES
(3, 'Beras'),
(4, 'Sagu'),
(5, 'Kentang'),
(6, 'Terong'),
(10, 'Jagung'),
(11, 'Telo');

-- --------------------------------------------------------

--
-- Table structure for table `data_petani`
--

CREATE TABLE `data_petani` (
  `id` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_petani`
--

INSERT INTO `data_petani` (`id`, `nama`, `alamat`, `telepon`) VALUES
(1, 'agus', 'cilteng', '0000'),
(2, 'nugroho', 'gatau', '08989'),
(5, 'Arinto', 'Purbalingga', '10101010'),
(6, 'robert', 'coba', '123'),
(7, 'nganu', 'nganu', '1212');

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id` int(20) NOT NULL,
  `nm_id` varchar(30) NOT NULL,
  `jns` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `setor` int(20) NOT NULL,
  `hrgperkg` varchar(10) NOT NULL,
  `total` int(30) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `stts` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_transaksi`
--

INSERT INTO `data_transaksi` (`id`, `nm_id`, `jns`, `tgl`, `setor`, `hrgperkg`, `total`, `tagihan`, `stts`) VALUES
(10, '2', 'Terong', '2019-08-30', 20, '20000', 400000, 300000, 'Belum lunas'),
(12, '6', 'Jagung', '2019-08-30', 10, '10000', 100000, 99000, 'Belum lunas'),
(13, '1', 'Beras', '2019-08-30', 10, '20000', 200000, 0, 'lunas'),
(14, '5', 'Beras', '2019-08-30', 20, '10000', 200000, 200000, 'Belum lunas'),
(15, '1', 'Kentang', '2019-08-30', 20, '100000', 2000000, 0, 'Lunas'),
(16, '1', 'Beras', '2019-08-30', 50, '20000', 1000000, 0, 'LUNAS'),
(17, '7', 'Beras', '2019-08-30', 50, '2500', 125000, 0, 'lunas'),
(18, '6', 'Beras', '2019-08-30', 10, '2300', 23000, 23000, 'BELUM LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nama`) VALUES
(1, 'Lunas'),
(2, 'Terhutang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pertanian`
--
ALTER TABLE `data_pertanian`
  ADD PRIMARY KEY (`idpertanian`);

--
-- Indexes for table `data_petani`
--
ALTER TABLE `data_petani`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_pertanian`
--
ALTER TABLE `data_pertanian`
  MODIFY `idpertanian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `data_petani`
--
ALTER TABLE `data_petani`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
