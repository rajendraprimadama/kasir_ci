-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Sep 2019 pada 07.59
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbpertanian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Koala.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pertanian`
--

CREATE TABLE IF NOT EXISTS `data_pertanian` (
`idpertanian` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pertanian`
--

INSERT INTO `data_pertanian` (`idpertanian`, `jenis`) VALUES
(1, ''),
(2, 'tomat'),
(3, 'Beras'),
(4, 'fasasfa'),
(5, 'dassafas'),
(6, 'dassafas'),
(7, ''),
(8, ''),
(9, 'kkk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_petani`
--

CREATE TABLE IF NOT EXISTS `data_petani` (
`id` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_petani`
--

INSERT INTO `data_petani` (`id`, `nama`, `alamat`, `telepon`) VALUES
(1, 'agus', 'cilteng', '0000'),
(2, 'nugroho', 'gatau', '08989');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_transaksi`
--

CREATE TABLE IF NOT EXISTS `data_transaksi` (
`id` int(20) NOT NULL,
  `no_nota` varchar(40) NOT NULL,
  `nm_id` varchar(30) NOT NULL,
  `jns` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `setor` int(20) NOT NULL,
  `hrgperkg` varchar(10) NOT NULL,
  `total` int(30) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `stts` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_transaksi`
--

INSERT INTO `data_transaksi` (`id`, `no_nota`, `nm_id`, `jns`, `tgl`, `setor`, `hrgperkg`, `total`, `tagihan`, `stts`) VALUES
(6, '', '1', 'tomat', '2019-08-22', 2, '12000', 24000, 0, 'lunas'),
(7, '', '1', 'Beras', '2019-08-22', 90, '8000', 720000, 0, 'lunas'),
(8, '', '1', 'tomat', '2019-08-22', 99, '9000', 891000, 0, 'lunas'),
(9, '', '1', 'tomat', '2019-08-22', 90, '80000', 7200000, 0, 'lunas'),
(10, '', '1', 'Beras', '2019-08-05', 9, '9000', 81000, 0, 'lunas'),
(11, '', '1', 'Beras', '2019-08-23', 9, '80000', 720000, 0, 'lunas'),
(12, '', '1', 'tomat', '2019-08-12', 89, '100000', 8900000, 0, 'lunas'),
(13, '', '2', 'tomat', '2019-08-28', 89, '9000', 801000, 100, 'Belum lunas'),
(14, '', '2', 'Beras', '2019-08-28', 90, '9000', 810000, 730000, 'Belum lunas'),
(15, '', '2', 'Beras', '2019-08-28', 3, '90000', 270000, 250000, 'Belum lunas'),
(16, 'N190922120948', '1', 'tomat', '2019-09-22', 18, '9000', 162000, 0, 'lunas'),
(17, 'N190930070945', '1', 'tomat', '2019-09-30', 10, '1000', 10000, 0, 'lunas'),
(18, 'N190930070943', '1', 'Beras', '2019-09-30', 5, '222', 1110, 0, 'lunas'),
(19, 'N190930070911', '1', 'tomat', '2019-09-30', 10, '100', 1000, 0, 'lunas'),
(20, 'N190930070912', '2', 'tomat', '2019-09-30', 5, '10', 50, 0, 'lunas'),
(21, 'N190930070934', '1', 'tomat', '2019-09-30', 10, '100000', 1000000, 900000, 'BELUM LUNAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_pertanian`
--
ALTER TABLE `data_pertanian`
MODIFY `idpertanian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `data_petani`
--
ALTER TABLE `data_petani`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
