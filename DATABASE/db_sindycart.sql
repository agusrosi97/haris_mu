/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.8-MariaDB : Database - db_sindycart
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sindycart` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_sindycart`;

/*Table structure for table `tbl_barang` */

DROP TABLE IF EXISTS `tbl_barang`;

CREATE TABLE `tbl_barang` (
  `id_barang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_barang` varchar(100) DEFAULT NULL,
  `bahan_barang` varchar(100) DEFAULT NULL,
  `foto_barang` longblob DEFAULT NULL,
  `keterangan_barang` varchar(10) DEFAULT NULL,
  `harga_barang` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_barang` */

insert  into `tbl_barang`(`id_barang`,`jenis_barang`,`bahan_barang`,`foto_barang`,`keterangan_barang`,`harga_barang`) values 
(1,'Baju','katun','CC WEB PHOTO  (4 of 15).jpg','ada','50000');

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `id_customer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(100) DEFAULT NULL,
  `email_customer` varchar(100) NOT NULL,
  `notelp_customer` varchar(15) DEFAULT NULL,
  `alamat_customer` varchar(255) DEFAULT NULL,
  `username_customer` varchar(100) NOT NULL,
  `password_customer` varchar(255) NOT NULL,
  `foto_customer` longtext DEFAULT NULL,
  `dob_customer` date DEFAULT NULL,
  `jk_customer` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_customer`),
  KEY `index_customer` (`nama_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`id_customer`,`nama_customer`,`email_customer`,`notelp_customer`,`alamat_customer`,`username_customer`,`password_customer`,`foto_customer`,`dob_customer`,`jk_customer`) values 
(1,NULL,'agusrosiadi.p@gmail.com','081236573724',NULL,'Agus Rosi','$2y$12$D9xj9l7I6NtKcU3ZmOetyuG2DhasgIq7n9nyjTF6XRR8yXXIT12zK',NULL,NULL,NULL),
(2,NULL,'qwe@gmail.com','000000',NULL,'qwe','$2y$12$dbjwSZnDk5euPu2grZiSa.PcNGSOhA0W3XXKYc5ql1IvXU3cqw8wC',NULL,NULL,NULL),
(3,NULL,'123@123',NULL,NULL,'123','$2y$12$9suS9bX1yAsHIFLvsi7lE.pnLEAN.C8gxVPBo3s2/RZO/hAqHC6i6',NULL,NULL,NULL);

/*Table structure for table `tbl_pesanan` */

DROP TABLE IF EXISTS `tbl_pesanan`;

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_customer` int(10) unsigned DEFAULT NULL,
  `id_user` int(10) unsigned DEFAULT NULL,
  `id_transaksi_pembayaran` int(10) unsigned DEFAULT NULL,
  `id_barang` int(10) unsigned DEFAULT NULL,
  `pesanan_untuk` varchar(200) DEFAULT NULL,
  `ukuran` varchar(200) DEFAULT NULL,
  `pcs` varchar(200) DEFAULT NULL,
  `bahan` varchar(10) DEFAULT NULL,
  `jenis` varchar(10) DEFAULT NULL,
  `warna` varchar(10) DEFAULT NULL,
  `foto_item` longblob DEFAULT NULL,
  `foto_desain` longblob DEFAULT NULL,
  `status_pesanan` varchar(50) DEFAULT NULL,
  `jumlah_pesanan` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`),
  KEY `customermemesan` (`id_customer`),
  KEY `mempunyaibarang` (`id_barang`),
  KEY `mengkonfirmasi` (`id_user`),
  KEY `menghasilkan` (`id_transaksi_pembayaran`),
  CONSTRAINT `customermemesan` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`),
  CONSTRAINT `mempunyaibarang` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`),
  CONSTRAINT `menghasilkan` FOREIGN KEY (`id_transaksi_pembayaran`) REFERENCES `tbl_transaksi_pembayaran` (`id_transaksi_pembayaran`),
  CONSTRAINT `mengkonfirmasi` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pesanan` */

insert  into `tbl_pesanan`(`id_pesanan`,`id_customer`,`id_user`,`id_transaksi_pembayaran`,`id_barang`,`pesanan_untuk`,`ukuran`,`pcs`,`bahan`,`jenis`,`warna`,`foto_item`,`foto_desain`,`status_pesanan`,`jumlah_pesanan`) values 
(1,2,NULL,1,1,'Pria Dewasa, Wanita Dewasa','M, M','6, 7','katun','Baju','biru','CC WEB PHOTO  (4 of 15).jpg','CC WEB PHOTO  (53 of 164) copy.jpg',NULL,13),
(2,2,NULL,2,1,'Pria Dewasa, Wanita Dewasa','S, L','12, 23','katun','Baju','biru_muda','CC WEB PHOTO  (4 of 15).jpg','',NULL,35),
(3,2,NULL,3,1,'Anak Perempuan','M','12','katun','Baju','merah','CC WEB PHOTO  (4 of 15).jpg','',NULL,12),
(4,2,NULL,4,1,'Wanita Dewasa','XL','12','katun','Baju','merah','CC WEB PHOTO  (4 of 15).jpg','CC WEB PHOTO  (70 of 164).jpg',NULL,12);

/*Table structure for table `tbl_transaksi_pembayaran` */

DROP TABLE IF EXISTS `tbl_transaksi_pembayaran`;

CREATE TABLE `tbl_transaksi_pembayaran` (
  `id_transaksi_pembayaran` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pesanan` int(10) unsigned DEFAULT NULL,
  `total_pembayaran` varchar(50) DEFAULT NULL,
  `foto_bukti_transaksi` longblob DEFAULT NULL,
  `sisa_pembayaran` varchar(50) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `bank_pilihan` varchar(20) DEFAULT NULL,
  `jam_transaksi` timestamp NULL DEFAULT current_timestamp(),
  `jam_transaksi_sisa_pembayaran` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_pembayaran`),
  KEY `mempunyai` (`id_pesanan`),
  CONSTRAINT `mempunyai` FOREIGN KEY (`id_pesanan`) REFERENCES `tbl_pesanan` (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_transaksi_pembayaran` */

insert  into `tbl_transaksi_pembayaran`(`id_transaksi_pembayaran`,`id_pesanan`,`total_pembayaran`,`foto_bukti_transaksi`,`sisa_pembayaran`,`metode_pembayaran`,`bank_pilihan`,`jam_transaksi`,`jam_transaksi_sisa_pembayaran`) values 
(1,1,'650000','foto_transaksi.jpg','325000','dp','mandiri','2020-05-21 02:33:09',NULL),
(2,2,'1750000','foto_transaksi.jpg','0','dp','bni','2020-05-21 03:32:31','2020-05-22 13:18:06'),
(3,3,'600000','foto_transaksi.jpg','0','transfer_lunas','mandiri','2020-05-21 11:02:33',NULL),
(4,4,'600000','foto_transaksi.jpg','0','dp','mandiri','2020-05-22 13:09:02','2020-05-22 13:16:24');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `username_user` varchar(50) DEFAULT NULL,
  `password_user` char(255) DEFAULT NULL,
  `notelp_user` varchar(15) DEFAULT NULL,
  `hak_akses_user` varchar(50) DEFAULT NULL,
  `status_user` varchar(30) DEFAULT NULL,
  `alamat_user` varchar(255) DEFAULT NULL,
  `dob_user` date DEFAULT NULL,
  `jk_user` varchar(1) DEFAULT NULL,
  `foto_user` longtext DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`nama_user`,`email_user`,`username_user`,`password_user`,`notelp_user`,`hak_akses_user`,`status_user`,`alamat_user`,`dob_user`,`jk_user`,`foto_user`) values 
(1,'agus rosi','admin@gamil.com','qwe','$2y$12$5/z5bs9mLGPCCfX9xegyuO.aFGhSTVDkSgpt.9wKnXOZSRekanXoO','123','Admin','Aktif','asda','1997-09-25','L',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
