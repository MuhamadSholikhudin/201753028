<?php
session_start();
include '../koneksi.php';
include '../function.php';

if (!isset($_SESSION['hakakses'])) {
    header("Location: http://localhost/201753028/index.php?halaman=login");
}
?>

<?php
include '../template_organisasi/header.php';


if (isset($_GET['halaman'])) {
    $hal = $_GET['halaman'];
    switch ($hal) {
        case 'home':
            include '../template_organisasi/sidebar.php';
            include '../template_organisasi/isi.php';
            break;
        case 'beranda':
            include '../template_organisasi/sidebar.php';
            include '../vapor/beranda/index.php';
            break;

        case 'produk': //produk    
            include '../template_organisasi/sidebar.php';
            include '../vapor/produk/index.php';
            break;
        case 'produk_tambah': //produk    
            include '../template_organisasi/sidebar.php';
            include '../vapor/produk/tambah.php';
            break;
        case 'produk_edit': //produk    
            include '../template_organisasi/sidebar.php';
            include '../vapor/produk/edit.php';
            break;

        case 'kategori':
            include '../template_organisasi/sidebar.php';
            include '../vapor/kategori/index.php';
            break;
        case 'kategori_tambah':
            include '../template_organisasi/sidebar.php';
            include '../vapor/kategori/tambah.php';
            break;
        case 'kategori_edit':
            include '../template_organisasi/sidebar.php';
            include '../vapor/kategori/edit.php';
            break;

        case 'bank':
            include '../template_organisasi/sidebar.php';
            include '../vapor/bank/index.php';
            break;
        case 'bank_tambah':
            include '../template_organisasi/sidebar.php';
            include '../vapor/bank/tambah.php';
            break;
        case 'bank_edit':
            include '../template_organisasi/sidebar.php';
            include '../vapor/bank/edit.php';
            break;

        case 'gerai':
            include '../template_organisasi/sidebar.php';
            include '../vapor/gerai/index.php';
            break;
        case 'gerai_tambah':
            include '../template_organisasi/sidebar.php';
            include '../vapor/gerai/tambah.php';
            break;
        case 'gerai_edit':
            include '../template_organisasi/sidebar.php';
            include '../vapor/gerai/edit.php';
            break;

        case 'stok_gerai':
            include '../template_organisasi/sidebar.php';
            include '../vapor/stok_gerai/index.php';
            break;
        case 'stok_gerai_tambah':
            include '../template_organisasi/sidebar.php';
            include '../vapor/stok_gerai/tambah.php';
            break;
        case 'stok_gerai_edit':
            include '../template_organisasi/sidebar.php';
            include '../vapor/stok_gerai/edit.php';
            break;

        case 'pesanan_stok_gerai':
            include '../template_organisasi/sidebar.php';
            include '../vapor/pesanan_stok_gerai/index.php';
            break;
        case 'pesanan_stok_gerai_tambah':
            include '../template_organisasi/sidebar.php';
            include '../vapor/pesanan_stok_gerai/tambah.php';
            break;
        case 'pesanan_stok_gerai_edit':
            include '../template_organisasi/sidebar.php';
            include '../vapor/pesanan_stok_gerai/edit.php';
            break;

        case 'pesanan_stok':
            include '../template_organisasi/sidebar.php';
            include '../vapor/pesanan_stok/index.php';
            break;

        case 'penjualan_gerai':
            include '../template_organisasi/sidebar.php';
            include '../vapor/penjualan_gerai/index.php';
            break;

        case 'penjualan_gerai_keranjang':
            include '../template_organisasi/sidebar.php';
            include '../vapor/penjualan_gerai/keranjang.php';
            break;

            // case 'penjualan_gerai_cetak':
            //     include '../template_organisasi/sidebar.php';
            //     include '../vapor/penjualan_gerai/cetak.php';
            //     break;

        case 'pembayaran':
            include '../template_organisasi/sidebar.php';
            include '../vapor/pembayaran/index.php';
            break;

        case 'pengiriman':
            include '../template_organisasi/sidebar.php';
            include '../vapor/pengiriman/index.php';
            break;
        case 'pengiriman_upload':
            include '../template_organisasi/sidebar.php';
            include '../vapor/pengiriman/pengiriman_upload.php';
            break;
        case 'pengiriman_upload_edit':
            include '../template_organisasi/sidebar.php';
            include '../vapor/pengiriman/pengiriman_upload_edit.php';
            break;

        case 'pengguna':
            include '../template_organisasi/sidebar.php';
            include '../vapor/pengguna/index.php';
            break;

        case 'pengguna_tambah':
            include '../template_organisasi/sidebar.php';
            include '../vapor/pengguna/tambah.php';
            break;

        case 'pengguna_edit':
            include '../template_organisasi/sidebar.php';
            include '../vapor/pengguna/edit.php';
            break;

        case 'laporan':
            include '../template_organisasi/sidebar.php';
            include '../vapor/laporan/index.php';
            break;

        default: //jika memanggil halaman tidak ada maka..
            include '../template_organisasi/sidebar.php';
            include '../vapor/beranda/index.php';
            break;
    }
} else { //jika tidak memanggil halaman apapun maka..
    include 'templates/sidebar.php'; //memanggil file sidebar.php
    include 'home.php'; //memanggil file home.php
}

include '../template_organisasi/footer.php';
?>