-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2013 at 07:42 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rsia`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `menu_order` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `parent_id`, `title`, `url`, `menu_order`) VALUES
(1, 0, 'Home', '?menu=home', 1),
(2, 0, 'Pengaturan Akun', '#', 2),
(3, 2, 'Ubah Password', '?menu=akun', 1),
(4, 0, 'Pemilihan Supplier', '#', 3),
(5, 4, 'Hasil Pemilihan', '?menu=hasil_pemilihan', 1),
(6, 4, 'Aspek Penilaian', '?menu=aspek', 2),
(7, 4, 'Kriteria Pemilihan', '?menu=kriteria', 3),
(8, 0, 'Data Master', '#', 4),
(9, 8, 'Data User', '?menu=user', 1),
(10, 8, 'Data Supplier', '?menu=supplier', 2),
(11, 8, 'Data Obat', '?menu=obat', 3),
(12, 0, 'Menu', '?menu=menu', 5),
(13, 0, 'Purchase Request', '?menu=pr', 6),
(14, 0, 'Laporan', '#', 7),
(15, 14, 'Laporan PO', '?menu=laporan_po', 1),
(16, 14, 'laporan PR', '?menu=laporan_pr', 2),
(17, 14, 'Laporan Return PO', '?menu=laporan_return_po', 3),
(18, 0, 'Purchase Order', '#', 8),
(19, 18, 'PO', '?menu=purchase_po', 1),
(20, 18, 'Return PO', '?menu=purchase_return_po', 2),
(21, 0, 'Order On Delivery', '?menu=ood', 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
