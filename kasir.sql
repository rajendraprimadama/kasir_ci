/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - kasir
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kasir` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kasir`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `authority_level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`username`,`password`,`nama`,`foto`,`authority_level`) values 
(1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','profil11.jpg','admin'),
(2,'primadama','b0d6b4e1f6c2c4fd16c8114fc4edd087',NULL,NULL,'admin'),
(3,'primadama','b0d6b4e1f6c2c4fd16c8114fc4edd087',NULL,NULL,'admin');

/*Table structure for table `data_barang` */

DROP TABLE IF EXISTS `data_barang`;

CREATE TABLE `data_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_brg` varchar(50) NOT NULL COMMENT 'prefix 3 karakter pertama + lima digit generate',
  `barcode_brg` varchar(50) DEFAULT NULL COMMENT 'barcode di barang',
  `nama_brg` varchar(40) NOT NULL,
  `kategori` varchar(40) NOT NULL,
  `hrg_beli` int(10) DEFAULT '0',
  `pcs_hrgjual_retail` int(10) DEFAULT '0',
  `pax_hrgjual_retail` int(10) DEFAULT '0',
  `dus_hrgjual_retail` int(10) DEFAULT '0',
  `pcs_hrgjual_grosir` int(10) DEFAULT '0',
  `pax_hrgjual_grosir` int(10) DEFAULT '0',
  `dus_hrgjual_grosir` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `data_barang` */

insert  into `data_barang`(`id`,`id_brg`,`barcode_brg`,`nama_brg`,`kategori`,`hrg_beli`,`pcs_hrgjual_retail`,`pax_hrgjual_retail`,`dus_hrgjual_retail`,`pcs_hrgjual_grosir`,`pax_hrgjual_grosir`,`dus_hrgjual_grosir`) values 
(1,'TES00001',NULL,'TES BARANG PERTAMA','1',34343434,43434344,3434343,32323232,3232323,232323,2323232);

/*Table structure for table `data_customer` */

DROP TABLE IF EXISTS `data_customer`;

CREATE TABLE `data_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` int(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_customer` */

/*Table structure for table `data_karyawan` */

DROP TABLE IF EXISTS `data_karyawan`;

CREATE TABLE `data_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_karyawan` */

/*Table structure for table `data_kategori` */

DROP TABLE IF EXISTS `data_kategori`;

CREATE TABLE `data_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `data_kategori` */

insert  into `data_kategori`(`id`,`kategori`) values 
(1,'ALAT TULIS'),
(2,'BAHAN ROTI'),
(3,'BEDAK'),
(4,'ALAT POTONG');

/*Table structure for table `data_supplier` */

DROP TABLE IF EXISTS `data_supplier`;

CREATE TABLE `data_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` int(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_supplier` */

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status` */

insert  into `status`(`id`,`nama`) values 
(1,'Lunas'),
(2,'Terhutang');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
