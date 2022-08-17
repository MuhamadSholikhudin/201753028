-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2022 pada 11.30
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

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
-- Struktur dari tabel `alamat`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
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
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rekening`, `tutorial_pembayaran`, `atas_nama`, `status_bank`, `gambar_logo`) VALUES
(1, 'BANK RAKYAT INDONESIA', 2147483647, '', 'RAJA VAPOR', 1, ''),
(2, 'BANK MANDIRI', 52997777, '', 'RAJA VAPOR', 1, ''),
(3, 'BANK NEGARA INDONESIA', 5709506, '', 'RAJA VAPOR', 1, ''),
(4, 'BANK TABUNGAN NEGARA', 26533555, '', 'RAJA VAPOR', 1, ''),
(5, 'BANK CENTRAL ASIA', 23588000, '', 'RAJA VAPOR', 1, ''),
(6, 'BANK SYARIAH INDONESIA', 3450227, '', 'RAJA VAPOR', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
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
-- Dumping data untuk tabel `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `tanggal_transaksi`, `tanggal_kadaluarsa`, `status_transaksi`, `jumlah_checkout`, `id_keranjang`, `id_user`) VALUES
(3, '2022-07-23', '2022-07-24', 2, 70000, '19,20', 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gerai`
--

CREATE TABLE `gerai` (
  `id_gerai` int(11) NOT NULL,
  `nama_gerai` varchar(100) NOT NULL,
  `cabang` varchar(225) NOT NULL,
  `alamat_gerai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gerai`
--

INSERT INTO `gerai` (`id_gerai`, `nama_gerai`, `cabang`, `alamat_gerai`) VALUES
(1, 'RAJA VAPOR gebog', 'gebog', 'Jl. Raya Jurang, Krasak, Jurang, Kec. Gebog, Kabupaten Kudus, Jawa Tengah 59333'),
(2, 'RAJA VAPOR kaliwungu', 'KALIWUNGU', 'bangjo RS.yakis / RS.islam, Jl. Raya Kudus - Jepara meter barat No.200, Garung Lor, Kec. Kaliwungu, Kabupaten Kudus, Jawa Tengah 59333'),
(3, 'RAJA VAPOR Kudus', 'KUDUS KOTA', 'Jl. Tanjung No.14-16, Nganguk, Kramat, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59312'),
(4, 'RAJA VAPOR PURWOGONDO', 'PURWOGONDO', 'Sendang, Kec. Kalinyamatan, Kabupaten Jepara, Jawa Tengah 59462'),
(5, 'RAJA VAPOR LORAM', 'WERGU LORAM WETAN', 'Jl. Patimura, Loram Wetan Krajan, Loram Wetan, Kec. Jati, Kabupaten Kudus, Jawa Tengah 59344');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_produk`
--

CREATE TABLE `harga_produk` (
  `id_harga` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
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
-- Struktur dari tabel `keranjang`
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
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_produk`, `jumlah_keranjang`, `harga_keranjang`, `status_keranjang`) VALUES
(19, 31, 2, 1, 20000, 3),
(20, 31, 5, 1, 50000, 3),
(21, 31, 2, 1, 20000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_gerai`
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
-- Dumping data untuk tabel `keranjang_gerai`
--

INSERT INTO `keranjang_gerai` (`id_keranjang_gerai`, `id_stok_gerai`, `banyak`, `jumlah_harga`, `status_keranjang_gerai`, `id_penjualan_gerai`) VALUES
(1, 3, 6, 228000, 0, 1),
(2, 4, 5, 25000, 0, 1),
(3, 48, 3, 1368000, 0, 1),
(4, 34, 1, 350000, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
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
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_checkout`, `nomor_pembayaran`, `total_pembayaran`, `bukti_pembayaran`, `status_pembayaran`, `tanggal_pembayaran`, `id_bank`, `id_user`) VALUES
(3, 3, '122333322', 70000, '1658630232Asus-Logo-HD-Wallpaper-Background.jpg', 4, '2022-07-24', 1, 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `status_pengiriman` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `bukti_pengiriman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_gerai`
--

CREATE TABLE `penjualan_gerai` (
  `id_penjualan_gerai` int(11) NOT NULL,
  `nomor_penjualan` varchar(30) NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `bayar_tunai` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status_penjualan_gerai` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan_gerai`
--

INSERT INTO `penjualan_gerai` (`id_penjualan_gerai`, `nomor_penjualan`, `total_penjualan`, `bayar_tunai`, `kembalian`, `status_penjualan_gerai`, `tanggal_penjualan`) VALUES
(1, '1658151936', 5947000, 0, 0, 0, '0000-00-00'),
(2, '1658152019', 0, 0, 0, 0, '0000-00-00'),
(3, '1658152071', 0, 0, 0, 0, '0000-00-00'),
(4, '1658152137', 0, 0, 0, 0, '0000-00-00'),
(5, '1658152187', 0, 0, 0, 0, '0000-00-00'),
(6, '1658234891', 0, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_stok_gerai`
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
-- Dumping data untuk tabel `pesanan_stok_gerai`
--

INSERT INTO `pesanan_stok_gerai` (`id_pesanan_stok_gerai`, `id_user`, `id_produk`, `pesanan_stok`, `stok_tersedia`, `status_pesanan_stok`, `keterangan`) VALUES
(1, 2, 2, 2, 0, 'pesan', 'warna hitam'),
(2, 2, 7, 5, 0, 'belum pesan', 'warna putih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `stok_produk`, `status_produk`, `deskripsi`, `gambar`, `harga_produk`, `id_user`) VALUES
(2, 'Dovpo MVV 2 Panda Edition', 1, 20, 1, 'Vapor Terbaik', 'dovpo panda.jpg', 20000, 1),
(3, 'Joyetech Exceed Grip', 2, 20, 1, 'Vapor Terbaik', 'exceed grip.jpg', 30000, 1),
(4, 'Upods Cube', 3, 20, 1, 'Vapor Terbaik', 'Upods Cube,jpg', 40000, 1),
(5, 'Vaporite Mecha Kit 22mm', 4, 20, 1, 'Vapor Terbaik', 'vaporite mecha kit 22.jpg', 50000, 1),
(6, 'HexOhm v3.0 30 Amp Anodized by Craving Vapor', 5, 20, 1, 'Vapor Terbaik', 'hexohm v3.jpg', 60000, 1),
(7, 'JUUL', 1, 20, 1, 'Vapor Terbaik', 'juul.jpg', 70000, 1),
(8, 'SMOK Fetch Mini', 2, 20, 1, 'Vapor Terbaik', 'smok fetch mini.jpg', 80000, 1),
(9, 'Art Mod by Preva x Owlexandrea', 3, 20, 1, 'Vapor Terbaik', 'Art Mod by Preva x Owlexandrea.jpg', 90000, 1),
(10, 'Joyetech Teros Zoo Pod', 4, 20, 1, 'Vapor Terbaik', 'zoo pod.jpg', 100000, 1),
(11, 'Uwell Caliburn', 5, 20, 1, 'Vapor Terbaik', 'caliburn.jpg', 110000, 1),
(12, 'Teslacigs Terminator VAPE', 1, 20, 1, 'Vapor Terbaik', 'tesla terminator.jpg', 120000, 1),
(13, 'Smok RPM 40', 2, 20, 1, 'Vapor Terbaik', 'smok rpm40.jpg', 130000, 1),
(14, 'Eleaf iStick Pico (75 W) Authentic', 3, 20, 1, 'Vapor Terbaik', 'pico75watt.jpg', 140000, 1),
(15, 'Suorin Air', 4, 20, 1, 'Vapor Terbaik', 'suorinair.jpg', 150000, 1),
(16, 'AugVape Druga Squonk', 5, 20, 1, 'Vapor Terbaik', 'druga squonk.jpg', 160000, 1),
(17, 'Mecha Kit AV Timekeeper Revolver Kit', 1, 20, 1, 'Vapor Terbaik', 'Mecha Kit AV Timekeeper Revolver Kit.jpg', 170000, 1),
(18, 'Smoant Charon TS (218 W)', 2, 20, 1, 'Vapor Terbaik', 'smoant tc 218.jpg', 20000, 1),
(19, 'GeekVape Aegis Legend', 3, 20, 1, 'Vapor Terbaik', 'aegis legend.jpg', 180000, 1),
(20, 'Voopoo Drag 2 Refresh Edition productnation', 4, 20, 1, 'Vapor Terbaik', 'voopoo drag 2.jpg', 190000, 1),
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
-- Struktur dari tabel `stok_gerai`
--

CREATE TABLE `stok_gerai` (
  `id_stok_gerai` int(11) NOT NULL,
  `id_gerai` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `stok_gerai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok_gerai`
--

INSERT INTO `stok_gerai` (`id_stok_gerai`, `id_gerai`, `id_produk`, `stok_gerai`) VALUES
(1, 3, 2, 10),
(2, 3, 3, 10),
(3, 3, 4, 10),
(4, 3, 5, 7),
(5, 3, 6, 10),
(6, 3, 7, 10),
(7, 3, 8, 10),
(8, 3, 9, 10),
(9, 3, 10, 10),
(10, 3, 11, 10),
(11, 3, 12, 10),
(12, 3, 13, 10),
(13, 3, 14, 10),
(14, 3, 15, 10),
(15, 3, 16, 10),
(16, 3, 17, 10),
(17, 3, 18, 10),
(18, 3, 19, 10),
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
(30, 3, 31, 10),
(31, 3, 32, 10),
(32, 3, 33, 10),
(33, 3, 34, 10),
(34, 3, 35, 9),
(35, 3, 36, 10),
(36, 3, 37, 10),
(37, 3, 38, 10),
(38, 3, 39, 10),
(39, 3, 40, 10),
(40, 3, 41, 10),
(41, 3, 42, 10),
(42, 3, 43, 10),
(43, 3, 44, 10),
(44, 3, 45, 10),
(45, 3, 46, 10),
(46, 3, 47, 10),
(47, 3, 48, 10),
(48, 3, 49, 2),
(49, 3, 50, 10),
(50, 3, 51, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `email`, `hakakses`, `nomer_hp`, `date_created`, `status_user`) VALUES
(1, 'ERVAN PANGESTU', 'ERVAN_PANGESTU', '1234', 'ervanpangestu@gmail.com', 1, '62895433553670', '0000-00-00 00:00:00', 1),
(2, 'YUS PRIYADI', 'YUS_PRIYADI', '1234', 'yuspriyadi@gmail.com', 2, '62895433553643', '0000-00-00 00:00:00', 1),
(3, 'YUSSINTHA AMRULLAH SUGIARTO', 'YUSSINTHA_AMRULLAH_SUGIARTO', '1234', 'yussinthaamrullahsugiarto@gmail.com', 3, '62895433553644', '0000-00-00 00:00:00', 1),
(4, 'MUHAMMADUN', 'MUHAMMADUN', '1234', 'muhammadun@gmail.com', 3, '62895433553645', '0000-00-00 00:00:00', 1),
(5, 'HERU SETIAWAN', 'HERU_SETIAWAN', '1234', 'herusetiawan@gmail.com', 3, '62895433553646', '0000-00-00 00:00:00', 1),
(6, 'HARYANTO', 'HARYANTO', '1234', 'haryanto@gmail.com', 3, '62895433553647', '0000-00-00 00:00:00', 1),
(7, 'BETTA ARISANDI', 'BETTA_ARISANDI', '1234', 'bettaarisandi@gmail.com', 3, '62895433553648', '0000-00-00 00:00:00', 1),
(8, 'AHMAD SETIONO', 'AHMAD_SETIONO', '1234', 'ahmadsetiono@gmail.com', 4, '62895433553649', '0000-00-00 00:00:00', 1),
(9, 'FERRY ANJAR PRIYANTO', 'FERRY_ANJAR_PRIYANTO', '1234', 'ferryanjarpriyanto@gmail.com', 4, '62895433553650', '0000-00-00 00:00:00', 1),
(10, 'SUPRIYANTO', 'SUPRIYANTO', '1234', 'supriyanto@gmail.com', 4, '62895433553651', '0000-00-00 00:00:00', 1),
(11, 'MUHAMMAD NAFIUDIN', 'MUHAMMAD_NAFIUDIN', '1234', 'muhammadnafiudin@gmail.com', 4, '62895433553652', '0000-00-00 00:00:00', 1),
(12, 'RIDWAN NAWAWI EKO PRASETYO', 'RIDWAN_NAWAWI_EKO_PRASETYO', '1234', 'ridwannawawiekoprasetyo@gmail.com', 4, '62895433553653', '0000-00-00 00:00:00', 1),
(13, 'ROZIKAN', 'ROZIKAN', '1234', 'rozikan@gmail.com', 4, '62895433553654', '0000-00-00 00:00:00', 1),
(14, 'EDI PRASETYA', 'EDI_PRASETYA', '1234', 'ediprasetya@gmail.com', 4, '62895433553655', '0000-00-00 00:00:00', 1),
(15, 'AMPRI ISROKHA', 'AMPRI_ISROKHA', '1234', 'ampriisrokha@gmail.com', 4, '62895433553656', '0000-00-00 00:00:00', 1),
(16, 'ALI MURTADHO', 'ALI_MURTADHO', '1234', 'alimurtadho@gmail.com', 4, '62895433553657', '0000-00-00 00:00:00', 1),
(17, 'HENI LUSIANA', 'HENI_LUSIANA', '1234', 'henilusiana@gmail.com', 4, '62895433553658', '0000-00-00 00:00:00', 1),
(18, 'NITA MARIA NINGSIH', 'NITA_MARIA_NINGSIH', '1234', 'nitamarianingsih@gmail.com', 4, '62895433553659', '0000-00-00 00:00:00', 1),
(19, 'PUJIATI', 'PUJIATI', '1234', 'pujiati@gmail.com', 4, '62895433553660', '0000-00-00 00:00:00', 1),
(20, 'ATMOJO EKO WIBOWO', 'ATMOJO_EKO_WIBOWO', '1234', 'atmojoekowibowo@gmail.com', 4, '62895433553661', '0000-00-00 00:00:00', 1),
(21, 'SYAIFUL ROKHMAN', 'SYAIFUL_ROKHMAN', '1234', 'syaifulrokhman@gmail.com', 4, '62895433553662', '0000-00-00 00:00:00', 1),
(22, 'ANIS SETYANINGSIH', 'ANIS_SETYANINGSIH', '1234', 'anissetyaningsih@gmail.com', 4, '62895433553663', '0000-00-00 00:00:00', 1),
(23, 'SULASTRI', 'SULASTRI', '1234', 'sulastri@gmail.com', 4, '62895433553664', '0000-00-00 00:00:00', 1),
(24, 'ARI ARDIANSYAH', 'ARI_ARDIANSYAH', '1234', 'ariardiansyah@gmail.com', 4, '62895433553665', '0000-00-00 00:00:00', 1),
(25, 'MUSTAJIB RIYADI', 'MUSTAJIB_RIYADI', '1234', 'mustajibriyadi@gmail.com', 4, '62895433553666', '0000-00-00 00:00:00', 1),
(26, 'SUKO CAHYONO', 'SUKO_CAHYONO', '1234', 'sukocahyono@gmail.com', 4, '62895433553667', '0000-00-00 00:00:00', 1),
(27, 'MUHAMMAD RIFAI', 'MUHAMMAD_RIFAI', '1234', 'muhammadrifai@gmail.com', 4, '62895433553668', '0000-00-00 00:00:00', 1),
(28, 'SUMIJAN', 'SUMIJAN', '1234', 'sumijan@gmail.com', 4, '62895433553669', '0000-00-00 00:00:00', 1),
(29, 'ABDULLAH', 'ABDULLAH', '1234', 'abdullah@gmail.com', 4, '62895433553670', '0000-00-00 00:00:00', 1),
(30, 'Muhamad Sholikhudin', 'Muhamad_Sholikhudin', '1234', 'muhamadsholikhudin@gmail.com', 1, '62895433553641', '0000-00-00 00:00:00', 1),
(31, 'Yusuf Hidayat', 'yusuf_hidayat', '2', 'yusuf_hidayat@gmail.com', 4, '62895433553643', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `gerai`
--
ALTER TABLE `gerai`
  ADD PRIMARY KEY (`id_gerai`);

--
-- Indeks untuk tabel `harga_produk`
--
ALTER TABLE `harga_produk`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `keranjang_gerai`
--
ALTER TABLE `keranjang_gerai`
  ADD PRIMARY KEY (`id_keranjang_gerai`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `penjualan_gerai`
--
ALTER TABLE `penjualan_gerai`
  ADD PRIMARY KEY (`id_penjualan_gerai`);

--
-- Indeks untuk tabel `pesanan_stok_gerai`
--
ALTER TABLE `pesanan_stok_gerai`
  ADD PRIMARY KEY (`id_pesanan_stok_gerai`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `stok_gerai`
--
ALTER TABLE `stok_gerai`
  ADD PRIMARY KEY (`id_stok_gerai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gerai`
--
ALTER TABLE `gerai`
  MODIFY `id_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `harga_produk`
--
ALTER TABLE `harga_produk`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `keranjang_gerai`
--
ALTER TABLE `keranjang_gerai`
  MODIFY `id_keranjang_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan_gerai`
--
ALTER TABLE `penjualan_gerai`
  MODIFY `id_penjualan_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pesanan_stok_gerai`
--
ALTER TABLE `pesanan_stok_gerai`
  MODIFY `id_pesanan_stok_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `stok_gerai`
--
ALTER TABLE `stok_gerai`
  MODIFY `id_stok_gerai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `pembeli_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD CONSTRAINT `pemilik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
