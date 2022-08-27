-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 07:34 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `201753028`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `status_alamat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_user`, `provinsi`, `kota`, `kecamatan`, `kode_pos`, `alamat_lengkap`, `status_alamat`) VALUES
(1, 31, 'Jawa Barat', 'Bandung', 'Lembang', '5644', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_rekening` int(11) NOT NULL,
  `tutorial_pembayaran` text NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `status_bank` int(11) NOT NULL,
  `gambar_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rekening`, `tutorial_pembayaran`, `atas_nama`, `status_bank`, `gambar_logo`) VALUES
(1, 'BANK RAKYAT INDONESIA', 2147483647, '', 'RAJA VAPOR', 1, 'BRI.jpg'),
(2, 'BANK MANDIRI', 52997777, '', 'RAJA VAPOR', 1, 'MANDIRI.jpg'),
(3, 'BANK NEGARA INDONESIA', 5709506, '', 'RAJA VAPOR', 1, 'BNI.png'),
(4, 'BANK TABUNGAN NEGARA', 26533555, '', 'RAJA VAPOR', 1, 'BTN.jpg'),
(5, 'BANK CENTRAL ASIA', 23588000, '', 'RAJA VAPOR', 1, 'BCA.png'),
(6, 'BANK SYARIAH INDONESIA', 3450227, '', 'RAJA VAPOR', 1, 'BSI.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `status_transaksi` int(11) DEFAULT NULL,
  `jumlah_checkout` int(11) NOT NULL,
  `id_keranjang` varchar(225) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `tanggal_transaksi`, `tanggal_kadaluarsa`, `status_transaksi`, `jumlah_checkout`, `id_keranjang`, `id_user`) VALUES
(3, '2022-07-23', '2022-07-24', 3, 70000, '19,20', 31),
(4, '2022-08-13', '2022-08-14', 3, 20000, '21', 31),
(5, '2022-08-15', '2022-08-16', 1, 920000, '22,23,24', 9),
(6, '2022-08-15', '2022-08-16', 1, 1200000, '25,26,27', 9),
(7, '2022-08-15', '2022-08-16', 1, 890000, '28,29,30', 9),
(8, '2022-08-15', '2022-08-16', 1, 1100000, '31,32,33', 9),
(9, '2022-08-15', '2022-08-16', 1, 670000, '34,35', 9),
(10, '2022-08-15', '2022-08-16', 1, 940000, '36,37,38', 9),
(11, '2022-08-15', '2022-08-16', 1, 1100000, '39,40,41,42', 9),
(12, '2022-08-17', '2022-08-18', 1, 905500, '43,44,45', 13),
(13, '2022-08-17', '2022-08-18', 1, 950000, '46,47,48', 13),
(21, '2022-08-18', '2022-08-19', 2, 300000, '65,66', 31),
(22, '2022-08-18', '2022-08-19', 2, 210000, '67,68', 31),
(23, '2022-08-18', '2022-08-19', 2, 210000, '69,70', 31),
(24, '2022-08-18', '2022-08-19', 3, 180000, '71', 31),
(25, '2022-08-18', '2022-08-19', 2, 450000, '72', 31),
(26, '2022-08-18', '2022-08-19', 3, 210000, '73,74', 31),
(27, '2022-08-18', '2022-08-19', 1, 680000, '75,76', 10),
(28, '2022-08-18', '2022-08-19', 1, 630000, '77,78,79', 10),
(29, '2022-08-18', '2022-08-19', 1, 540000, '80,81,82', 10),
(30, '2022-08-18', '2022-08-19', 1, 1360000, '83,84', 10),
(31, '2022-08-18', '2022-08-19', 1, 910000, '85,86,87', 10),
(32, '2022-08-18', '2022-08-19', 1, 550000, '88,89,90', 10),
(33, '2022-08-18', '2022-08-19', 1, 1010000, '91,92,93,94', 13),
(34, '2022-08-18', '2022-08-19', 1, 160000, '95,96', 13),
(35, '2022-08-18', '2022-08-19', 1, 50000, '97,98', 13),
(36, '2022-08-18', '2022-08-19', 1, 850000, '99,100,101', 13),
(37, '2022-08-18', '2022-08-19', 1, 1015000, '102,103', 13),
(38, '2022-08-18', '2022-08-19', 1, 790000, '104,105,106', 19),
(39, '2022-08-18', '2022-08-19', 1, 3090000, '107,108,109', 19),
(40, '2022-08-18', '2022-08-19', 1, 130000, '110', 19),
(41, '2022-08-18', '2022-08-19', 1, 525000, '111,112', 19),
(42, '2022-08-18', '2022-08-19', 1, 660000, '113,114,115', 19),
(43, '2022-08-18', '2022-08-19', 1, 610000, '116,117,118', 19),
(44, '2022-08-18', '2022-08-19', 1, 255000, '119,120', 19),
(45, '2022-08-18', '2022-08-19', 1, 910000, '121,122,123', 19),
(46, '2022-08-18', '2022-08-19', 1, 450000, '124,125', 23),
(47, '2022-08-18', '2022-08-19', 1, 420000, '126,127,128', 23),
(48, '2022-08-18', '2022-08-19', 1, 350000, '129', 23),
(49, '2022-08-18', '2022-08-19', 1, 1290000, '130,131', 23),
(50, '2022-08-18', '2022-08-19', 1, 320000, '132,133', 23),
(51, '2022-08-18', '2022-08-19', 1, 1280000, '134,135,136', 23),
(52, '2022-08-18', '2022-08-19', 1, 580000, '137,138,139', 23),
(53, '2022-08-18', '2022-08-19', 1, 440000, '140', 23),
(54, '2022-08-18', '2022-08-19', 1, 230000, '141', 15),
(55, '2022-08-18', '2022-08-19', 1, 540000, '142,143', 15),
(56, '2022-08-18', '2022-08-19', 1, 1180000, '144,145,146', 15),
(57, '2022-08-18', '2022-08-19', 1, 400000, '147,148', 15),
(58, '2022-08-18', '2022-08-19', 1, 180000, '149,150', 15),
(59, '2022-08-18', '2022-08-19', 1, 1235000, '151,152,153', 15),
(60, '2022-08-18', '2022-08-19', 1, 427500, '154', 15),
(61, '2022-08-18', '2022-08-19', 1, 230000, '155', 16),
(62, '2022-08-18', '2022-08-19', 1, 390000, '156,157', 16),
(63, '2022-08-18', '2022-08-19', 1, 390000, '158,159', 16),
(64, '2022-08-18', '2022-08-19', 1, 140000, '160,161', 16),
(65, '2022-08-18', '2022-08-19', 1, 1270000, '162,163,164', 16),
(66, '2022-08-18', '2022-08-19', 1, 220000, '165,166', 16),
(67, '2022-08-18', '2022-08-19', 1, 260000, '167,168', 16),
(68, '2022-08-18', '2022-08-19', 1, 360000, '169,170', 16),
(69, '2022-08-18', '2022-08-19', 1, 585000, '171,172', 16),
(70, '2022-08-18', '2022-08-19', 1, 460000, '173', 16),
(71, '2022-08-18', '2022-08-19', 1, 600000, '174,175,176', 21),
(72, '2022-08-18', '2022-08-19', 1, 380000, '177,178,179', 21),
(73, '2022-08-18', '2022-08-19', 1, 530000, '180,181', 21),
(74, '2022-08-18', '2022-08-19', 1, 120000, '182', 21),
(75, '2022-08-18', '2022-08-19', 1, 35000, '183,184', 21),
(76, '2022-08-18', '2022-08-19', 1, 320000, '185,186', 21),
(77, '2022-08-18', '2022-08-19', 1, 610000, '187,188', 21),
(78, '2022-08-18', '2022-08-19', 1, 460000, '189', 21),
(79, '2022-08-18', '2022-08-19', 1, 240000, '190,191', 21),
(80, '2022-08-18', '2022-08-19', 1, 30000, '192', 21),
(81, '2022-08-18', '2022-08-19', 1, 230000, '193', 24),
(82, '2022-08-18', '2022-08-19', 1, 120000, '194', 24),
(83, '2022-08-18', '2022-08-19', 1, 320000, '195,196', 24),
(84, '2022-08-18', '2022-08-19', 1, 270000, '197,198', 24),
(85, '2022-08-18', '2022-08-19', 1, 420000, '199,200', 24),
(86, '2022-08-18', '2022-08-19', 1, 1220000, '201,202', 24),
(87, '2022-08-18', '2022-08-19', 1, 110000, '203,204', 24),
(88, '2022-08-18', '2022-08-19', 1, 340000, '205,206', 24),
(89, '2022-08-18', '2022-08-19', 1, 1070000, '207,208', 24),
(90, '2022-08-18', '2022-08-19', 1, 145000, '209,210', 24),
(91, '2022-08-18', '2022-08-19', 1, 220000, '211', 9),
(92, '2022-08-18', '2022-08-19', 1, 310000, '212,213', 9),
(93, '2022-08-18', '2022-08-19', 1, 220000, '214,215', 9),
(94, '2022-08-18', '2022-08-19', 1, 580000, '216,217', 9),
(95, '2022-08-18', '2022-08-19', 1, 520000, '218,219', 9),
(96, '2022-08-18', '2022-08-19', 1, 730000, '220,221,222', 9),
(97, '2022-08-18', '2022-08-19', 1, 230000, '223', 9),
(98, '2022-08-18', '2022-08-19', 1, 240000, '224,225', 9),
(99, '2022-08-18', '2022-08-19', 1, 30000, '226', 9),
(100, '2022-08-18', '2022-08-19', 1, 15000, '227', 9),
(101, '2022-08-18', '2022-08-19', 1, 630000, '228,229', 9),
(102, '2022-08-18', '2022-08-19', 1, 230000, '230', 12),
(103, '2022-08-18', '2022-08-19', 1, 670000, '231,232', 12),
(104, '2022-08-18', '2022-08-19', 1, 160000, '233', 12),
(105, '2022-08-18', '2022-08-19', 1, 170000, '234', 12),
(106, '2022-08-18', '2022-08-19', 1, 210000, '235,236', 12),
(107, '2022-08-18', '2022-08-19', 1, 1200000, '237', 12),
(108, '2022-08-18', '2022-08-19', 1, 240000, '238,239', 12),
(109, '2022-08-18', '2022-08-19', 1, 290000, '240,241', 12),
(110, '2022-08-19', '2022-08-20', 1, 706500, '242,243', 31),
(111, '2022-08-19', '2022-08-20', 1, 180000, '244', 31),
(112, '2022-08-19', '2022-08-20', 1, 60000, '245', 31),
(113, '2022-08-19', '2022-08-20', 1, 340000, '246,247', 31),
(114, '2022-08-19', '2022-08-20', 1, 290000, '248,249', 31);

-- --------------------------------------------------------

--
-- Table structure for table `gerai`
--

CREATE TABLE `gerai` (
  `id_gerai` int(11) NOT NULL,
  `nama_gerai` varchar(100) NOT NULL,
  `cabang` varchar(225) NOT NULL,
  `alamat_gerai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gerai`
--

INSERT INTO `gerai` (`id_gerai`, `nama_gerai`, `cabang`, `alamat_gerai`) VALUES
(1, 'RAJA VAPOR gebog', 'gebog', 'Jl. Raya Jurang, Krasak, Jurang, Kec. Gebog, Kabupaten Kudus, Jawa Tengah 59333'),
(2, 'RAJA VAPOR kaliwungu', 'KALIWUNGU', 'bangjo RS.yakis / RS.islam, Jl. Raya Kudus - Jepara meter barat No.200, Garung Lor, Kec. Kaliwungu, Kabupaten Kudus, Jawa Tengah 59333'),
(3, 'RAJA VAPOR Kudus', 'KUDUS KOTA', 'Jl. Tanjung No.14-16, Nganguk, Kramat, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59312'),
(4, 'RAJA VAPOR PURWOGONDO', 'PURWOGONDO', 'Sendang, Kec. Kalinyamatan, Kabupaten Jepara, Jawa Tengah 59462'),
(5, 'RAJA VAPOR LORAM', 'WERGU LORAM WETAN', 'Jl. Patimura, Loram Wetan Krajan, Loram Wetan, Kec. Jati, Kabupaten Kudus, Jawa Tengah 59344');

-- --------------------------------------------------------

--
-- Table structure for table `harga_produk`
--

CREATE TABLE `harga_produk` (
  `id_harga` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_gerai` int(11) NOT NULL,
  `bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori`) VALUES
(1, 'Mod', 'Mod Vape'),
(2, 'Kit', 'Vape Kit'),
(3, 'Dripper', 'Dripper Vape'),
(4, 'RDA, RTA, RDTA', 'Atomizer'),
(5, 'Aksesories', 'Aksesories Vape'),
(7, 'Baterai', 'Baterai vape'),
(8, 'Liquid freebase', 'Liquid'),
(9, 'Kapas', 'Kapas vape'),
(10, 'AIO Pod system', 'Pod'),
(11, 'Coil baby, Anarchist', 'Coil');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah_keranjang` int(11) NOT NULL,
  `harga_keranjang` int(11) NOT NULL,
  `status_keranjang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_produk`, `jumlah_keranjang`, `harga_keranjang`, `status_keranjang`) VALUES
(19, 31, 2, 1, 20000, 3),
(20, 31, 5, 1, 50000, 3),
(21, 31, 2, 1, 20000, 3),
(22, 9, 47, 1, 460000, 2),
(23, 9, 26, 1, 250000, 2),
(24, 9, 22, 1, 210000, 2),
(25, 9, 47, 1, 460000, 2),
(26, 9, 26, 1, 250000, 2),
(27, 9, 50, 1, 490000, 2),
(28, 9, 26, 1, 250000, 2),
(29, 9, 22, 1, 210000, 2),
(30, 9, 44, 1, 430000, 2),
(31, 9, 47, 1, 460000, 2),
(32, 9, 22, 1, 210000, 2),
(33, 9, 44, 1, 430000, 2),
(34, 9, 22, 1, 210000, 2),
(35, 9, 47, 1, 460000, 2),
(36, 9, 22, 1, 210000, 2),
(37, 9, 47, 1, 460000, 2),
(38, 9, 28, 1, 270000, 2),
(39, 9, 44, 1, 430000, 2),
(40, 9, 47, 1, 460000, 2),
(41, 9, 22, 1, 210000, 2),
(42, 9, 50, 1, 490000, 2),
(43, 13, 3, 1, 30000, 2),
(44, 13, 23, 1, 220000, 2),
(45, 13, 24, 3, 655500, 2),
(46, 13, 23, 1, 220000, 2),
(47, 13, 24, 2, 460000, 2),
(48, 13, 28, 1, 270000, 2),
(49, 31, 2, 1, 450000, 2),
(50, 31, 4, 2, 400000, 2),
(51, 31, 4, 3, 570000, 2),
(52, 31, 54, 1, 50000, 2),
(53, 31, 4, 2, 400000, 2),
(54, 31, 22, 2, 120000, 2),
(55, 31, 6, 1, 2800000, 2),
(56, 31, 4, 1, 200000, 2),
(57, 31, 56, 2, 240000, 2),
(58, 31, 58, 2, 60000, 2),
(59, 31, 29, 2, 2400000, 2),
(60, 31, 58, 2, 60000, 2),
(61, 31, 61, 1, 130000, 2),
(62, 31, 56, 1, 120000, 2),
(63, 31, 4, 1, 200000, 2),
(64, 31, 56, 1, 120000, 2),
(65, 31, 56, 2, 240000, 3),
(66, 31, 22, 1, 60000, 3),
(67, 31, 56, 1, 120000, 3),
(68, 31, 21, 1, 90000, 3),
(69, 31, 56, 1, 120000, 3),
(70, 31, 21, 1, 90000, 3),
(71, 31, 21, 2, 180000, 3),
(72, 31, 2, 1, 450000, 3),
(73, 31, 21, 1, 90000, 3),
(74, 31, 56, 1, 120000, 3),
(75, 10, 2, 1, 450000, 2),
(76, 10, 3, 1, 230000, 2),
(77, 10, 2, 1, 450000, 2),
(78, 10, 56, 1, 120000, 2),
(79, 10, 22, 1, 60000, 2),
(80, 10, 2, 1, 450000, 2),
(81, 10, 22, 1, 60000, 2),
(82, 10, 58, 1, 30000, 2),
(83, 10, 29, 1, 1200000, 2),
(84, 10, 16, 1, 160000, 2),
(85, 10, 21, 1, 90000, 2),
(86, 10, 37, 1, 370000, 2),
(87, 10, 2, 1, 450000, 2),
(88, 10, 4, 1, 200000, 2),
(89, 10, 9, 1, 230000, 2),
(90, 10, 7, 1, 120000, 2),
(91, 13, 3, 1, 230000, 2),
(92, 13, 4, 1, 200000, 2),
(93, 13, 57, 1, 120000, 2),
(94, 13, 47, 1, 460000, 2),
(95, 13, 61, 1, 130000, 2),
(96, 13, 58, 1, 30000, 2),
(97, 13, 58, 1, 30000, 2),
(98, 13, 59, 1, 20000, 2),
(99, 13, 38, 1, 380000, 2),
(100, 13, 25, 1, 30000, 2),
(101, 13, 45, 1, 440000, 2),
(102, 13, 55, 1, 1000000, 2),
(103, 13, 60, 1, 15000, 2),
(104, 19, 2, 1, 450000, 2),
(105, 19, 7, 1, 120000, 2),
(106, 19, 8, 1, 220000, 2),
(107, 19, 4, 1, 200000, 2),
(108, 19, 6, 1, 2800000, 2),
(109, 19, 21, 1, 90000, 2),
(110, 19, 61, 1, 130000, 2),
(111, 19, 37, 1, 370000, 2),
(112, 19, 28, 1, 155000, 2),
(113, 19, 14, 1, 400000, 2),
(114, 19, 10, 1, 110000, 2),
(115, 19, 12, 1, 150000, 2),
(116, 19, 20, 1, 350000, 2),
(117, 19, 23, 1, 90000, 2),
(118, 19, 27, 1, 170000, 2),
(119, 19, 32, 1, 240000, 2),
(120, 19, 60, 1, 15000, 2),
(121, 19, 13, 1, 230000, 2),
(122, 19, 18, 1, 330000, 2),
(123, 19, 20, 1, 350000, 2),
(124, 23, 3, 1, 230000, 2),
(125, 23, 8, 1, 220000, 2),
(126, 23, 16, 1, 160000, 2),
(127, 23, 17, 1, 170000, 2),
(128, 23, 21, 1, 90000, 2),
(129, 23, 20, 1, 350000, 2),
(130, 23, 47, 2, 920000, 2),
(131, 23, 37, 1, 370000, 2),
(132, 23, 22, 1, 60000, 2),
(133, 23, 61, 2, 260000, 2),
(134, 23, 56, 1, 120000, 2),
(135, 23, 16, 1, 160000, 2),
(136, 23, 55, 1, 1000000, 2),
(137, 23, 44, 1, 430000, 2),
(138, 23, 58, 1, 30000, 2),
(139, 23, 57, 1, 120000, 2),
(140, 23, 45, 1, 440000, 2),
(141, 15, 3, 1, 230000, 2),
(142, 15, 2, 1, 450000, 2),
(143, 15, 21, 1, 90000, 2),
(144, 15, 54, 1, 50000, 2),
(145, 15, 61, 1, 130000, 2),
(146, 15, 55, 1, 1000000, 2),
(147, 15, 38, 1, 380000, 2),
(148, 15, 59, 1, 20000, 2),
(149, 15, 58, 2, 60000, 2),
(150, 15, 57, 1, 120000, 2),
(151, 15, 29, 1, 1200000, 2),
(152, 15, 59, 1, 20000, 2),
(153, 15, 60, 1, 15000, 2),
(154, 15, 15, 3, 427500, 2),
(155, 16, 3, 1, 230000, 2),
(156, 16, 9, 1, 230000, 2),
(157, 16, 16, 1, 160000, 2),
(158, 16, 16, 1, 160000, 2),
(159, 16, 9, 1, 230000, 2),
(160, 16, 11, 1, 110000, 2),
(161, 16, 58, 1, 30000, 2),
(162, 16, 12, 1, 150000, 2),
(163, 16, 56, 1, 120000, 2),
(164, 16, 55, 1, 1000000, 2),
(165, 16, 22, 1, 60000, 2),
(166, 16, 16, 1, 160000, 2),
(167, 16, 23, 1, 90000, 2),
(168, 16, 24, 1, 170000, 2),
(169, 16, 25, 1, 30000, 2),
(170, 16, 18, 1, 330000, 2),
(171, 16, 44, 1, 430000, 2),
(172, 16, 28, 1, 155000, 2),
(173, 16, 47, 1, 460000, 2),
(174, 21, 7, 1, 120000, 2),
(175, 21, 2, 1, 450000, 2),
(176, 21, 58, 1, 30000, 2),
(177, 21, 3, 1, 230000, 2),
(178, 21, 56, 1, 120000, 2),
(179, 21, 58, 1, 30000, 2),
(180, 21, 5, 2, 420000, 2),
(181, 21, 10, 1, 110000, 2),
(182, 21, 57, 1, 120000, 2),
(183, 21, 59, 1, 20000, 2),
(184, 21, 60, 1, 15000, 2),
(185, 21, 27, 1, 170000, 2),
(186, 21, 12, 1, 150000, 2),
(187, 21, 30, 1, 170000, 2),
(188, 21, 45, 1, 440000, 2),
(189, 21, 47, 1, 460000, 2),
(190, 21, 56, 1, 120000, 2),
(191, 21, 57, 1, 120000, 2),
(192, 21, 58, 1, 30000, 2),
(193, 24, 3, 1, 230000, 2),
(194, 24, 7, 1, 120000, 2),
(195, 24, 4, 1, 200000, 2),
(196, 24, 56, 1, 120000, 2),
(197, 24, 15, 1, 150000, 2),
(198, 24, 57, 1, 120000, 2),
(199, 24, 38, 1, 380000, 2),
(200, 24, 59, 2, 40000, 2),
(201, 24, 29, 1, 1200000, 2),
(202, 24, 59, 1, 20000, 2),
(203, 24, 21, 1, 90000, 2),
(204, 24, 59, 1, 20000, 2),
(205, 24, 27, 1, 170000, 2),
(206, 24, 24, 1, 170000, 2),
(207, 24, 26, 1, 70000, 2),
(208, 24, 55, 1, 1000000, 2),
(209, 24, 60, 1, 15000, 2),
(210, 24, 61, 1, 130000, 2),
(211, 9, 8, 1, 220000, 2),
(212, 9, 8, 1, 220000, 2),
(213, 9, 21, 1, 90000, 2),
(214, 9, 16, 1, 160000, 2),
(215, 9, 22, 1, 60000, 2),
(216, 9, 47, 1, 460000, 2),
(217, 9, 57, 1, 120000, 2),
(218, 9, 21, 1, 90000, 2),
(219, 9, 44, 1, 430000, 2),
(220, 9, 23, 1, 90000, 2),
(221, 9, 45, 1, 440000, 2),
(222, 9, 4, 1, 200000, 2),
(223, 9, 3, 1, 230000, 2),
(224, 9, 10, 1, 110000, 2),
(225, 9, 61, 1, 130000, 2),
(226, 9, 25, 1, 30000, 2),
(227, 9, 60, 1, 15000, 2),
(228, 9, 19, 1, 410000, 2),
(229, 9, 8, 1, 220000, 2),
(230, 12, 3, 1, 230000, 2),
(231, 12, 2, 1, 450000, 2),
(232, 12, 8, 1, 220000, 2),
(233, 12, 16, 1, 160000, 2),
(234, 12, 17, 1, 170000, 2),
(235, 12, 16, 1, 160000, 2),
(236, 12, 54, 1, 50000, 2),
(237, 12, 29, 1, 1200000, 2),
(238, 12, 56, 1, 120000, 2),
(239, 12, 57, 1, 120000, 2),
(240, 12, 7, 1, 120000, 2),
(241, 12, 17, 1, 170000, 2),
(242, 31, 2, 1, 450000, 2),
(243, 31, 21, 3, 256500, 2),
(244, 31, 21, 2, 180000, 2),
(245, 31, 22, 1, 60000, 2),
(246, 31, 22, 2, 120000, 2),
(247, 31, 8, 1, 220000, 2),
(248, 31, 22, 1, 60000, 2),
(249, 31, 9, 1, 230000, 2),
(250, 29, 3, 1, 230000, 1),
(251, 29, 2, 1, 450000, 1),
(252, 29, 4, 1, 200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_gerai`
--

CREATE TABLE `keranjang_gerai` (
  `id_keranjang_gerai` int(11) NOT NULL,
  `id_stok_gerai` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `status_keranjang_gerai` int(11) NOT NULL,
  `id_penjualan_gerai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang_gerai`
--

INSERT INTO `keranjang_gerai` (`id_keranjang_gerai`, `id_stok_gerai`, `banyak`, `jumlah_harga`, `status_keranjang_gerai`, `id_penjualan_gerai`) VALUES
(1, 3, 5, 950000, 0, 1),
(2, 4, 4, 798000, 0, 1),
(5, 6, 1, 70000, 0, 2),
(6, 12, 1, 130000, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `nomor_pembayaran` varchar(50) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_checkout`, `nomor_pembayaran`, `total_pembayaran`, `bukti_pembayaran`, `status_pembayaran`, `tanggal_pembayaran`, `id_bank`, `id_user`) VALUES
(3, 3, '122333322', 70000, '1658630232Asus-Logo-HD-Wallpaper-Background.jpg', 4, '2022-07-24', 1, 31),
(4, 4, 'RV1661292809', 20000, '1661293316bukti bayar.png', 4, '2022-08-24', 1, 31),
(5, 21, 'RV1661340959', 300000, '1661341040bukti bayar.png', 3, '2022-08-24', 1, 31),
(6, 23, 'RV1661341199', 210000, '', 1, '0000-00-00', 1, 31),
(7, 22, 'RV1661341288', 210000, '', 1, '0000-00-00', 2, 31),
(8, 24, 'RV1661341977', 180000, '1661341988bukti bayar.png', 4, '2022-08-24', 1, 31),
(9, 25, 'RV1661342191', 450000, '', 1, '0000-00-00', 1, 31),
(10, 25, 'RV1661342410', 450000, '', 1, '0000-00-00', 1, 31),
(11, 26, 'RV1661342469', 210000, '1661342479bukti bayar.png', 4, '2022-08-24', 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `nomor_penerima` varchar(20) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `alamat_jalan` varchar(100) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `status_pengiriman` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `bukti_pengiriman` text NOT NULL,
  `tanggal_pengiriman` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_user`, `id_pembayaran`, `nama_penerima`, `nomor_penerima`, `provinsi`, `kota`, `kecamatan`, `kode_pos`, `alamat_jalan`, `alamat_lengkap`, `status_pengiriman`, `keterangan`, `bukti_pengiriman`, `tanggal_pengiriman`) VALUES
(1, 31, 9, 'yusuf', '7865442324', 'Jawa Tengah', 'Kudus', 'Kota', '56445', '', 'Rumah bapak Johan, RT.2/RW 56 Mlati Mejobo Kudus Jawa Tengah', 2, 'INI Adalah Bukti Pengiriman ', '1661342569bukti bayar.png', '2022-08-17'),
(2, 31, 11, 'yusuf', '8763138137', 'Jawa Tengah', 'Kudus', 'Kota', '56445', '', 'Rumah bapak Johan, RT.2/RW 56 Mlati Mejobo Kudus Jawa Tengah', 2, 'INI Adalah Bukti Pengiriman 1', '1661343618data gambar excel.png', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_gerai`
--

CREATE TABLE `penjualan_gerai` (
  `id_penjualan_gerai` int(11) NOT NULL,
  `nomor_penjualan` varchar(30) NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `bayar_tunai` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status_penjualan_gerai` int(11) NOT NULL,
  `tanggal_penjualan_gerai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan_gerai`
--

INSERT INTO `penjualan_gerai` (`id_penjualan_gerai`, `nomor_penjualan`, `total_penjualan`, `bayar_tunai`, `kembalian`, `status_penjualan_gerai`, `tanggal_penjualan_gerai`) VALUES
(1, '1658151936', 1748000, 0, 0, 0, '2022-08-01'),
(2, '1658152019', 70000, 0, 0, 0, '2022-08-02'),
(3, '1658152071', 130000, 130000, 0, 1, '2022-08-03'),
(4, '1658152137', 0, 0, 0, 0, '0000-00-00'),
(5, '1658152187', 0, 0, 0, 0, '0000-00-00'),
(6, '1658234891', 0, 0, 0, 0, '0000-00-00'),
(7, '1661467180', 0, 0, 0, 0, '2022-08-26'),
(8, '1661467252', 0, 0, 0, 0, '2022-08-26'),
(9, '1661467301', 0, 0, 0, 0, '2022-08-26'),
(10, '1661518235', 0, 0, 0, 0, '2022-08-26'),
(11, '1661518501', 0, 0, 0, 0, '2022-08-26'),
(12, '1661521455', 0, 0, 0, 0, '2022-08-26'),
(13, '1661569551', 0, 0, 0, 0, '2022-08-27'),
(14, '1661573600', 0, 0, 0, 0, '2022-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_stok_gerai`
--

CREATE TABLE `pesanan_stok_gerai` (
  `id_pesanan_stok_gerai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `pesanan_stok` int(11) NOT NULL,
  `stok_tersedia` int(11) NOT NULL,
  `status_pesanan_stok` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan_stok_gerai`
--

INSERT INTO `pesanan_stok_gerai` (`id_pesanan_stok_gerai`, `id_user`, `id_produk`, `pesanan_stok`, `stok_tersedia`, `status_pesanan_stok`, `keterangan`) VALUES
(1, 5, 2, 2, 0, 'pesan', 'warna hitam'),
(2, 5, 7, 5, 0, 'belum pesan', 'warna putih'),
(3, 7, 2, 20, 0, 'pesan', 'Hitam'),
(4, 7, 19, 10, 10, 'tersedia', 'Hitam'),
(5, 7, 15, 10, 10, 'tersedia', 'Hitam'),
(6, 7, 11, 10, 10, 'tersedia', 'Hitam'),
(7, 7, 7, 10, 10, 'tersedia', 'Hitam'),
(8, 7, 14, 10, 10, 'tersedia', 'Hitam'),
(9, 6, 6, 5, 5, 'tersedia', 'warna hitam'),
(10, 4, 2, 5, 5, 'tersedia', 'warna hitam'),
(11, 2, 16, 2, 2, 'tersedia', 'warna hitam');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `status_produk` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `stok_produk`, `status_produk`, `deskripsi`, `gambar`, `harga_produk`, `id_user`) VALUES
(2, 'Mod Dovpo MVV 2 Panda Edition', 1, 200, 1, 'Vapor Terbaik', '2022-08-19', 450000, 1),
(3, 'Joyetech Exceed Grip', 2, 200, 1, 'Vapor Terbaik', '2022-08-172022-08-17exceed grip.jpg', 230000, 1),
(4, 'Upods Cube', 10, 200, 1, 'Vapor Terbaik', '2022-08-17upods cube.jpeg', 200000, 1),
(5, 'Mod Vaporite Mecha Kit 22mm', 4, 200, 1, 'Vapor Terbaik', '2022-08-19', 210000, 1),
(6, 'Mod HexOhm v3.0 30 Amp Anodized by Craving Vapor', 5, 200, 1, 'Vapor Terbaik', '2022-08-19', 2800000, 1),
(7, 'JUUL', 10, 200, 1, 'Vapor Terbaik', '2022-08-172022-08-17juul.jpg', 120000, 1),
(8, 'SMOK Fetch Mini', 10, 200, 1, 'Vapor Terbaik', '2022-08-172022-08-17smok fetch mini.jpg', 220000, 1),
(9, 'Art Mod by Preva x Owlexandrea', 1, 200, 1, 'Vapor Terbaik', '2022-08-17Art Mod by Preva x Owlexandrea.jpg', 230000, 1),
(10, 'Joyetech Teros Zoo Pod', 10, 200, 1, 'Vapor Terbaik', '2022-08-17', 110000, 1),
(11, 'Uwell Caliburn', 10, 200, 1, 'Vapor Terbaik', '2022-08-17', 110000, 1),
(12, 'Teslacigs Terminator VAPE', 1, 200, 1, 'Vapor Terbaik', '2022-08-17', 150000, 1),
(13, 'Smok RPM 40', 10, 200, 1, 'Vapor Terbaik', '2022-08-17', 230000, 1),
(14, 'Eleaf iStick Pico (75 W) Authentic', 1, 200, 1, 'Vapor Terbaik', '2022-08-17', 400000, 1),
(15, 'Suorin Air', 10, 200, 1, 'Vapor Terbaik', '2022-08-17', 150000, 1),
(16, 'AugVape Druga Squonk', 10, 200, 1, 'Mod mecha squonk desain simple', '2022-08-17druga squonk.jpg', 160000, 1),
(17, 'Mecha Kit AV Timekeeper Revolver Kit', 1, 200, 1, 'Mod mechanical terbaik', '2022-08-172022-08-17Mecha Kit AV Timekeeper Revolver Kit.jpg', 170000, 1),
(18, 'Smoant Charon TS (218 W)', 1, 200, 1, 'Vapor Terbaik', '2022-08-17', 330000, 1),
(19, 'GeekVape Aegis Legend', 1, 200, 1, 'Vapor Terbaik', '2022-08-17', 410000, 1),
(20, 'Voopoo Drag 2 Refresh Edition productnation', 1, 200, 1, 'Vapor Terbaik', '2022-08-17', 350000, 1),
(21, 'baterai awt 26650', 7, 200, 1, 'Vapor Terbaik', '2022-08-17baterai awt 26650.jpg', 90000, 1),
(22, 'baterai vrk 18650', 7, 200, 1, 'Harga baterai perbiji', '2022-08-172022-08-17baterai vrk 18650.jpg', 60000, 1),
(23, 'batre sony vtc 6a', 7, 200, 1, 'Vapor Terbaik', '2022-08-17', 90000, 1),
(24, 'FAQ funky monkey', 8, 200, 1, 'Liquid FAQ Funky monkey nic 3 dan 6 ready\r\n\r\nRasa Kiwi dingin low', '2022-08-17', 170000, 1),
(25, 'kapas holy fiber', 9, 200, 1, 'Vapor Terbaik', '2022-08-17', 30000, 1),
(26, 'kapas kendo', 9, 200, 1, 'Vapor Terbaik', '2022-08-17', 70000, 1),
(27, 'oatdrips', 8, 200, 1, 'Liquid OAT DRIPS ready nic 3 saja', '2022-08-17', 170000, 1),
(28, 'rda hadaly sxk', 4, 200, 1, 'Vapor Terbaik', '2022-08-17', 155000, 1),
(29, 'rta fatality 25mm', 4, 200, 1, 'Vapor Terbaik', '2022-08-172022-08-17rta fatality 25mm.jpg', 1200000, 1),
(30, 'Uwell Caliburn', 10, 200, 1, 'Vapor Terbaik', '2022-08-17', 170000, 1),
(32, 'Smok RPM 40', 10, 200, 1, 'Vapor Terbaik', '2022-08-17', 240000, 1),
(37, 'Smoant Charon TS (218 W)', 1, 200, 1, 'Vapor Terbaik', '2022-08-17smoant tc 218.jpg', 370000, 1),
(38, 'GeekVape Aegis Legend', 2, 200, 1, 'Vapor Terbaik', '2022-08-17aegis legend.jpg', 380000, 1),
(39, 'Voopoo Drag 2 Refresh Edition productnation', 3, 200, 1, 'Vapor Terbaik', '2022-08-17voopoo drag 2.jpg', 380000, 1),
(44, 'HexOhm v3.0 30 Amp Anodized by Craving Vapor', 1, 200, 1, 'Vapor Terbaik', '2022-08-17hexohm v3.jpg', 430000, 1),
(45, 'JUUL', 1, 200, 1, 'Vapor Terbaik', '2022-08-17juul.jpg', 440000, 1),
(47, 'Art Mod by Preva x Owlexandrea', 1, 200, 1, 'Vapor Terbaik', '2022-08-17smok fetch mini.jpg', 460000, 1),
(50, 'Teslacigs Terminator VAPE', 1, 200, 1, 'Vapor Terbaik', '2022-08-17tesla terminator.jpg', 490000, 1),
(54, 'Baterai vrk', 5, 200, 1, 'Baterai vrk 18650 authentic', '2022-08-17baterai vrk 18650.jpg', 50000, 0),
(55, 'Rta fatality authentic', 4, 200, 1, 'Rta fatality authentic', '2022-08-17rta fatality 25mm.jpg', 1000000, 0),
(56, 'Liquid Tokyoman banana nic 6mg', 8, 200, 1, 'Liquid Tokyoman banana', '2022-08-17tokyoman.jpg', 120000, 0),
(57, 'Liquid Banana licious nic 3 dan 6', 8, 200, 1, 'Liquid banan a licious', '2022-08-17bananalicious.jpg', 120000, 0),
(58, 'Liquid Es Teh Leci', 8, 200, 1, 'Liquid es teh leci segar dingin', '2022-08-17esteh leci.jpg', 30000, 0),
(59, 'Koil baby alien v2', 11, 200, 1, 'Koil terbaru baby alien v2\r\n', '2022-08-17baby alien.jpg', 20000, 0),
(60, 'Lanyard kalung pod', 5, 200, 1, 'Kalung pod', '2022-08-17lanyard.jpg', 15000, 0),
(61, 'Liquid choco malt', 8, 200, 1, 'Chocomalt liquid', '2022-08-17chocomalt.jpg', 130000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stok_gerai`
--

CREATE TABLE `stok_gerai` (
  `id_stok_gerai` int(11) NOT NULL,
  `id_gerai` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `stok_gerai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_gerai`
--

INSERT INTO `stok_gerai` (`id_stok_gerai`, `id_gerai`, `id_produk`, `stok_gerai`) VALUES
(1, 3, 2, 10),
(2, 3, 3, 10),
(3, 3, 4, 8),
(4, 3, 5, 6),
(5, 3, 6, 10),
(6, 3, 7, 9),
(7, 3, 8, 9),
(8, 3, 9, 10),
(9, 3, 10, 10),
(10, 3, 11, 20),
(11, 3, 12, 10),
(12, 3, 13, 9),
(13, 3, 14, 10),
(14, 3, 15, 20),
(15, 3, 16, 10),
(16, 3, 17, 10),
(17, 3, 18, 10),
(18, 3, 19, 30),
(19, 3, 20, 10),
(20, 3, 21, 10),
(21, 3, 22, 10),
(22, 3, 23, 10),
(23, 3, 24, 10),
(24, 3, 25, 10),
(25, 3, 26, 10),
(26, 3, 27, 10),
(27, 3, 28, 10),
(28, 3, 29, 10),
(29, 3, 30, 10),
(30, 3, 61, 10),
(32, 3, 54, 10),
(33, 3, 55, 10),
(34, 3, 56, 9),
(35, 3, 57, 10),
(36, 3, 37, 10),
(37, 3, 38, 10),
(38, 3, 39, 10),
(39, 3, 58, 10),
(40, 3, 59, 10),
(41, 3, 60, 10),
(42, 3, 54, 10),
(43, 3, 44, 10),
(44, 3, 45, 10),
(45, 3, 55, 10),
(46, 3, 47, 10),
(47, 3, 56, 10),
(48, 3, 57, 2),
(49, 3, 50, 10),
(50, 3, 58, 10),
(61, 3, 32, 10),
(63, 5, 19, 30),
(64, 5, 15, 20),
(65, 5, 11, 20),
(66, 5, 7, 19),
(67, 5, 14, 10),
(68, 4, 6, 5),
(69, 2, 2, 5),
(70, 1, 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `hakakses` int(11) DEFAULT NULL,
  `nomer_hp` varchar(15) NOT NULL,
  `date_created` datetime NOT NULL,
  `id_gerai` int(11) DEFAULT NULL,
  `status_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `email`, `hakakses`, `nomer_hp`, `date_created`, `id_gerai`, `status_user`) VALUES
(1, 'ERVAN PANGESTU', 'ERVAN_PANGESTU', '1234', 'ervanpangestu@gmail.com', 1, '62895433553670', '0000-00-00 00:00:00', 1, 1),
(2, 'YUS PRIYADI', 'YUS_PRIYADI', '1234', 'yuspriyadi@gmail.com', 2, '62895433553643', '0000-00-00 00:00:00', 1, 1),
(3, 'YUSSINTHA AMRULLAH SUGIARTO', 'YUSSINTHA_AMRULLAH_SUGIARTO', '1234', 'yussinthaamrullahsugiarto@gmail.com', 3, '62895433553644', '0000-00-00 00:00:00', 1, 1),
(4, 'MUHAMMADUN', 'MUHAMMADUN', '1234', 'muhammadun@gmail.com', 3, '62895433553645', '0000-00-00 00:00:00', 2, 1),
(5, 'HERU SETIAWAN', 'HERU_SETIAWAN', '1234', 'herusetiawan@gmail.com', 3, '62895433553646', '0000-00-00 00:00:00', 3, 1),
(6, 'HARYANTO', 'HARYANTO', '1234', 'haryanto@gmail.com', 3, '62895433553647', '0000-00-00 00:00:00', 4, 1),
(7, 'BETTA ARISANDI', 'BETTA_ARISANDI', '1234', 'bettaarisandi@gmail.com', 3, '62895433553648', '0000-00-00 00:00:00', 5, 1),
(8, 'AHMAD SETIONO', 'AHMAD_SETIONO', '1234', 'ahmadsetiono@gmail.com', 4, '62895433553649', '0000-00-00 00:00:00', NULL, 1),
(9, 'FERRY ANJAR PRIYANTO', 'FERRY_ANJAR_PRIYANTO', '1234', 'ferryanjarpriyanto@gmail.com', 4, '62895433553650', '0000-00-00 00:00:00', NULL, 1),
(10, 'SUPRIYANTO', 'SUPRIYANTO', '1234', 'supriyanto@gmail.com', 4, '62895433553651', '0000-00-00 00:00:00', NULL, 1),
(11, 'MUHAMMAD NAFIUDIN', 'MUHAMMAD_NAFIUDIN', '1234', 'muhammadnafiudin@gmail.com', 4, '62895433553652', '0000-00-00 00:00:00', NULL, 1),
(12, 'RIDWAN NAWAWI EKO PRASETYO', 'RIDWAN_NAWAWI_EKO_PRASETYO', '1234', 'ridwannawawiekoprasetyo@gmail.com', 4, '62895433553653', '0000-00-00 00:00:00', NULL, 1),
(13, 'ROZIKAN', 'ROZIKAN', '1234', 'rozikan@gmail.com', 4, '62895433553654', '0000-00-00 00:00:00', NULL, 1),
(14, 'EDI PRASETYA', 'EDI_PRASETYA', '1234', 'ediprasetya@gmail.com', 4, '62895433553655', '0000-00-00 00:00:00', NULL, 1),
(15, 'AMPRI ISROKHA', 'AMPRI_ISROKHA', '1234', 'ampriisrokha@gmail.com', 4, '62895433553656', '0000-00-00 00:00:00', NULL, 1),
(16, 'ALI MURTADHO', 'ALI_MURTADHO', '1234', 'alimurtadho@gmail.com', 4, '62895433553657', '0000-00-00 00:00:00', NULL, 1),
(17, 'HENI LUSIANA', 'HENI_LUSIANA', '1234', 'henilusiana@gmail.com', 4, '62895433553658', '0000-00-00 00:00:00', NULL, 1),
(18, 'NITA MARIA NINGSIH', 'NITA_MARIA_NINGSIH', '1234', 'nitamarianingsih@gmail.com', 4, '62895433553659', '0000-00-00 00:00:00', NULL, 1),
(19, 'PUJIATI', 'PUJIATI', '1234', 'pujiati@gmail.com', 4, '62895433553660', '0000-00-00 00:00:00', NULL, 1),
(20, 'ATMOJO EKO WIBOWO', 'ATMOJO_EKO_WIBOWO', '1234', 'atmojoekowibowo@gmail.com', 4, '62895433553661', '0000-00-00 00:00:00', NULL, 1),
(21, 'SYAIFUL ROKHMAN', 'SYAIFUL_ROKHMAN', '1234', 'syaifulrokhman@gmail.com', 4, '62895433553662', '0000-00-00 00:00:00', NULL, 1),
(22, 'ANIS SETYANINGSIH', 'ANIS_SETYANINGSIH', '1234', 'anissetyaningsih@gmail.com', 4, '62895433553663', '0000-00-00 00:00:00', NULL, 1),
(23, 'SULASTRI', 'SULASTRI', '1234', 'sulastri@gmail.com', 4, '62895433553664', '0000-00-00 00:00:00', NULL, 1),
(24, 'ARI ARDIANSYAH', 'ARI_ARDIANSYAH', '1234', 'ariardiansyah@gmail.com', 4, '62895433553665', '0000-00-00 00:00:00', NULL, 1),
(25, 'MUSTAJIB RIYADI', 'MUSTAJIB_RIYADI', '1234', 'mustajibriyadi@gmail.com', 4, '62895433553666', '0000-00-00 00:00:00', NULL, 1),
(26, 'SUKO CAHYONO', 'SUKO_CAHYONO', '1234', 'sukocahyono@gmail.com', 4, '62895433553667', '0000-00-00 00:00:00', NULL, 1),
(27, 'MUHAMMAD RIFAI', 'MUHAMMAD_RIFAI', '1234', 'muhammadrifai@gmail.com', 4, '62895433553668', '0000-00-00 00:00:00', NULL, 1),
(28, 'SUMIJAN', 'SUMIJAN', '1234', 'sumijan@gmail.com', 4, '62895433553669', '0000-00-00 00:00:00', NULL, 1),
(29, 'ABDULLAH', 'ABDULLAH', '1234', 'abdullah@gmail.com', 4, '62895433553670', '0000-00-00 00:00:00', NULL, 1),
(30, 'Muhamad Sholikhudin', 'Muhamad_Sholikhudin', '1234', 'muhamadsholikhudin@gmail.com', 1, '62895433553641', '0000-00-00 00:00:00', NULL, 1),
(31, 'Yusuf Hidayat', 'yusuf_hidayat', '2', 'yusuf_hidayat@gmail.com', 4, '62895433553643', '0000-00-00 00:00:00', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `gerai`
--
ALTER TABLE `gerai`
  ADD PRIMARY KEY (`id_gerai`);

--
-- Indexes for table `harga_produk`
--
ALTER TABLE `harga_produk`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `keranjang_gerai`
--
ALTER TABLE `keranjang_gerai`
  ADD PRIMARY KEY (`id_keranjang_gerai`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `penjualan_gerai`
--
ALTER TABLE `penjualan_gerai`
  ADD PRIMARY KEY (`id_penjualan_gerai`);

--
-- Indexes for table `pesanan_stok_gerai`
--
ALTER TABLE `pesanan_stok_gerai`
  ADD PRIMARY KEY (`id_pesanan_stok_gerai`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `stok_gerai`
--
ALTER TABLE `stok_gerai`
  ADD PRIMARY KEY (`id_stok_gerai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `gerai`
--
ALTER TABLE `gerai`
  MODIFY `id_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `harga_produk`
--
ALTER TABLE `harga_produk`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `keranjang_gerai`
--
ALTER TABLE `keranjang_gerai`
  MODIFY `id_keranjang_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan_gerai`
--
ALTER TABLE `penjualan_gerai`
  MODIFY `id_penjualan_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pesanan_stok_gerai`
--
ALTER TABLE `pesanan_stok_gerai`
  MODIFY `id_pesanan_stok_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `stok_gerai`
--
ALTER TABLE `stok_gerai`
  MODIFY `id_stok_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `pembeli_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD CONSTRAINT `pemilik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
