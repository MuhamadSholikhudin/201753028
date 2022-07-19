-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 11:24 PM
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
(1, 'BRI', 12345678, 'sdfsedfewrferfgerferferf', 'Ervan', 1, 'ss3.JPG'),
(2, 'BCA', 7040342, 'MASUKKAN PIN      ', 'Ervan', 1, 'photo_2022-04-19_17-59-49.jpg'),
(3, '1', 1, '1', '1', 1, '2022-07-17WhatsApp Image 2022-02-19 at 05.43.58.jpeg');

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
(1, '2022-07-11', '2022-07-12', 1, 350000, '16,17', 2);

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
(1, 'raja vapor kalinyamatan', 'kalinyamatan', 'Jl. kalinyamatan'),
(2, '1', '2', '3');

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

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `foto`, `id_user`, `id_gerai`, `bagian`) VALUES
(1, 'x.png', 2, 1, 'kasir');

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
(4, 'Tank', 'Tank Vape'),
(5, 'Aksesories', 'Aksesories Vape'),
(6, 'pangestu', 'pangestu');

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
(16, 2, 2, 13, 260000, 1),
(17, 2, 3, 3, 90000, 1);

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
-- Table structure for table `penjualan_gerai`
--

CREATE TABLE `penjualan_gerai` (
  `id_penjualan_gerai` int(11) NOT NULL,
  `nomor_penjualan` varchar(30) NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `bayar_tunai` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status_penjualan_gerai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan_gerai`
--

INSERT INTO `penjualan_gerai` (`id_penjualan_gerai`, `nomor_penjualan`, `total_penjualan`, `bayar_tunai`, `kembalian`, `status_penjualan_gerai`) VALUES
(1, '1658151936', 0, 0, 0, 0),
(2, '1658152019', 0, 0, 0, 0),
(3, '1658152071', 0, 0, 0, 0),
(4, '1658152137', 0, 0, 0, 0),
(5, '1658152187', 0, 0, 0, 0),
(6, '1658234891', 0, 0, 0, 0);

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
(1, 2, 2, 2, 0, 'pesan', 'warna hitam'),
(2, 2, 7, 5, 0, 'belum pesan', 'warna putih');

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
(2, 'Dovpo MVV 2 Panda Edition', 1, 20, 1, 'Vapor Terbaik', 'Dovpo MVV 2 Panda Edition', 20000, 1),
(3, 'Joyetech Exceed Grip', 2, 20, 1, 'Vapor Terbaik', 'Joyetech Exceed Grip', 30000, 1),
(4, 'Upods Cube', 3, 20, 1, 'Vapor Terbaik', 'Upods Cube', 40000, 1),
(5, 'Vaporite Mecha Kit 22mm', 4, 20, 1, 'Vapor Terbaik', 'Vaporite Mecha Kit 22mm', 50000, 1),
(6, 'HexOhm v3.0 30 Amp Anodized by Craving Vapor', 5, 20, 1, 'Vapor Terbaik', 'HexOhm v3.0 30 Amp Anodized by Craving Vapor', 60000, 1),
(7, 'JUUL', 1, 20, 1, 'Vapor Terbaik', 'JUUL', 70000, 1),
(8, 'SMOK Fetch Mini', 2, 20, 1, 'Vapor Terbaik', 'SMOK Fetch Mini', 80000, 1),
(9, 'Art Mod by Preva x Owlexandrea', 3, 20, 1, 'Vapor Terbaik', 'Art Mod by Preva x Owlexandrea', 90000, 1),
(10, 'Joyetech Teros Zoo Pod', 4, 20, 1, 'Vapor Terbaik', 'Joyetech Teros Zoo Pod', 100000, 1),
(11, 'Uwell Caliburn', 5, 20, 1, 'Vapor Terbaik', 'Uwell Caliburn', 110000, 1),
(12, 'Teslacigs Terminator VAPE', 1, 20, 1, 'Vapor Terbaik', 'Teslacigs Terminator VAPE', 120000, 1),
(13, 'Smok RPM 40', 2, 20, 1, 'Vapor Terbaik', 'Smok RPM 40', 130000, 1),
(14, 'Eleaf iStick Pico (75 W) Authentic', 3, 20, 1, 'Vapor Terbaik', 'Eleaf iStick Pico (75 W) Authentic', 140000, 1),
(15, 'Suorin Air', 4, 20, 1, 'Vapor Terbaik', 'Suorin Air', 150000, 1),
(16, 'AugVape Druga Squonk', 5, 20, 1, 'Vapor Terbaik', 'AugVape Druga Squonk', 160000, 1),
(17, 'Mecha Kit AV Timekeeper Revolver Kit', 1, 20, 1, 'Vapor Terbaik', 'Mecha Kit AV Timekeeper Revolver Kit', 170000, 1),
(18, 'Smoant Charon TS (218 W)', 2, 20, 1, 'Vapor Terbaik', 'Smoant Charon TS (218 W)', 20000, 1),
(19, 'GeekVape Aegis Legend', 3, 20, 1, 'Vapor Terbaik', 'GeekVape Aegis Legend', 180000, 1),
(20, 'Voopoo Drag 2 Refresh Edition productnation', 4, 20, 1, 'Vapor Terbaik', 'Voopoo Drag 2 Refresh Edition productnation', 190000, 1),
(21, 'Dovpo MVV 2 Panda Edition', 5, 20, 1, 'Vapor Terbaik', 'Dovpo MVV 2 Panda Edition', 200000, 1),
(22, 'Joyetech Exceed Grip', 1, 20, 1, 'Vapor Terbaik', 'Joyetech Exceed Grip', 210000, 1),
(23, 'Upods Cube', 2, 20, 1, 'Vapor Terbaik', 'Upods Cube', 220000, 1),
(24, 'Vaporite Mecha Kit 22mm', 3, 20, 1, 'Vapor Terbaik', 'Vaporite Mecha Kit 22mm', 230000, 1),
(25, 'HexOhm v3.0 30 Amp Anodized by Craving Vapor', 4, 20, 1, 'Vapor Terbaik', 'HexOhm v3.0 30 Amp Anodized by Craving Vapor', 240000, 1),
(26, 'JUUL', 5, 20, 1, 'Vapor Terbaik', 'JUUL', 250000, 1),
(27, 'SMOK Fetch Mini', 1, 20, 1, 'Vapor Terbaik', 'SMOK Fetch Mini', 260000, 1),
(28, 'Art Mod by Preva x Owlexandrea', 2, 20, 1, 'Vapor Terbaik', 'Art Mod by Preva x Owlexandrea', 270000, 1),
(29, 'Joyetech Teros Zoo Pod', 3, 20, 1, 'Vapor Terbaik', 'Joyetech Teros Zoo Pod', 280000, 1),
(30, 'Uwell Caliburn', 4, 20, 1, 'Vapor Terbaik', 'Uwell Caliburn', 290000, 1),
(31, 'Teslacigs Terminator VAPE', 5, 20, 1, 'Vapor Terbaik', 'Teslacigs Terminator VAPE', 300000, 1),
(32, 'Smok RPM 40', 1, 20, 1, 'Vapor Terbaik', 'Smok RPM 40', 310000, 1),
(33, 'Eleaf iStick Pico (75 W) Authentic', 2, 20, 1, 'Vapor Terbaik', 'Eleaf iStick Pico (75 W) Authentic', 320000, 1),
(34, 'Suorin Air', 3, 20, 1, 'Vapor Terbaik', 'Suorin Air', 340000, 1),
(35, 'AugVape Druga Squonk', 4, 20, 1, 'Vapor Terbaik', 'AugVape Druga Squonk', 350000, 1),
(36, 'Mecha Kit AV Timekeeper Revolver Kit', 5, 20, 1, 'Vapor Terbaik', 'Mecha Kit AV Timekeeper Revolver Kit', 360000, 1),
(37, 'Smoant Charon TS (218 W)', 1, 20, 1, 'Vapor Terbaik', 'Smoant Charon TS (218 W)', 370000, 1),
(38, 'GeekVape Aegis Legend', 2, 20, 1, 'Vapor Terbaik', 'GeekVape Aegis Legend', 380000, 1),
(39, 'Voopoo Drag 2 Refresh Edition productnation', 3, 20, 1, 'Vapor Terbaik', 'Voopoo Drag 2 Refresh Edition productnation', 380000, 1),
(40, 'Dovpo MVV 2 Panda Edition', 4, 20, 1, 'Vapor Terbaik', 'Dovpo MVV 2 Panda Edition', 390000, 1),
(41, 'Joyetech Exceed Grip', 5, 20, 1, 'Vapor Terbaik', 'Joyetech Exceed Grip', 400000, 1),
(42, 'Upods Cube', 1, 20, 1, 'Vapor Terbaik', 'Upods Cube', 410000, 1),
(43, 'Vaporite Mecha Kit 22mm', 2, 20, 1, 'Vapor Terbaik', 'Vaporite Mecha Kit 22mm', 420000, 1),
(44, 'HexOhm v3.0 30 Amp Anodized by Craving Vapor', 3, 20, 1, 'Vapor Terbaik', 'HexOhm v3.0 30 Amp Anodized by Craving Vapor', 430000, 1),
(45, 'JUUL', 4, 20, 1, 'Vapor Terbaik', 'JUUL', 440000, 1),
(46, 'SMOK Fetch Mini', 5, 20, 1, 'Vapor Terbaik', 'SMOK Fetch Mini', 450000, 1),
(47, 'Art Mod by Preva x Owlexandrea', 1, 20, 1, 'Vapor Terbaik', 'Art Mod by Preva x Owlexandrea', 460000, 1),
(48, 'Joyetech Teros Zoo Pod', 2, 20, 1, 'Vapor Terbaik', 'Joyetech Teros Zoo Pod', 470000, 1),
(49, 'Uwell Caliburn', 3, 20, 1, 'Vapor Terbaik', 'Uwell Caliburn', 480000, 1),
(50, 'Teslacigs Terminator VAPE', 4, 20, 1, 'Vapor Terbaik', 'Teslacigs Terminator VAPE', 490000, 1),
(51, 'Smok RPM 40', 5, 20, 1, 'Vapor Terbaik', 'Smok RPM 40', 500000, 1),
(53, 'ervan', 2, 200, 0, '200\r\n                                ', '2022-07-17JANE.png', 200, 0);

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
  `status_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `email`, `hakakses`, `nomer_hp`, `date_created`, `status_user`) VALUES
(2, 'Muhamad Sholikhudin', 'muhamad_sholikhudin', '$2y$10$nv2T15kceSffGR0ZjztcE.fIBk76wcoy9aZL4OavB7Ko9XjqpSeXm', 'muhammadsholihudin18@gmail.com', 3, '62895433553643', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gerai`
--
ALTER TABLE `gerai`
  MODIFY `id_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `harga_produk`
--
ALTER TABLE `harga_produk`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `keranjang_gerai`
--
ALTER TABLE `keranjang_gerai`
  MODIFY `id_keranjang_gerai` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `penjualan_gerai`
--
ALTER TABLE `penjualan_gerai`
  MODIFY `id_penjualan_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan_stok_gerai`
--
ALTER TABLE `pesanan_stok_gerai`
  MODIFY `id_pesanan_stok_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `stok_gerai`
--
ALTER TABLE `stok_gerai`
  MODIFY `id_stok_gerai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
