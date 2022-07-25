<?php 
include '../koneksi.php';
include '../function.php';

//ajax ubah barang jumlah produk
if (isset($_POST['qty']) and isset($_POST['id_keranjang']) and isset($_POST['id_user'])) {

    // mencari keranjang gerai
    $keranjang = querysatudata("SELECT * FROM keranjang LEFT JOIN produk ON keranjang.id_produk = produk.id_produk  WHERE id_keranjang = " . $_POST['id_keranjang'] . "");

    //mencari produk
    $produk = querysatudata("SELECT * FROM produk WHERE id_produk = " . $keranjang['id_produk'] . "");

    //jika produk lebbih dari 3
    if ($_POST['qty'] >= 3) {
        $harga = $produk['harga_produk'] * 0.05;
        $diskon = ($produk['harga_produk'] * $_POST['qty']) * 0.05;
        $harga_keranjang = ($produk['harga_produk'] * $_POST['qty']) - $diskon;
    } else {
        $harga = $produk['harga_produk'];
        $harga_keranjang = $harga * $_POST['qty'];
    }

    //update data keranjang terbaru
    $sql_keranjang = "UPDATE keranjang SET jumlah_keranjang = " . $_POST['qty'] . ", harga_keranjang = " . $harga_keranjang . " WHERE id_keranjang = " . $_POST['id_keranjang'] . "";

    $query_update_keranjang = mysqli_query($koneksi, $sql_keranjang);

    // total_penjualan
    $keranjangs = querybanyak("SELECT * FROM keranjang  WHERE id_user =" .$_POST['id_user']. " AND status_keranjang = 1");
    $jumlah_total = 0;
    foreach ($keranjangs as $penj) {
        $jumlah_total += $penj['harga_keranjang'];
    }

    $total = $jumlah_total;

    $total_rupiah = "Rp " . number_format($total, 2, ',', '.');

    $data = ["Rp " . number_format($harga, 2, ',', '.'), "Rp " . number_format($harga_keranjang, 2, ',', '.'), $total_rupiah, $total];
    // $data = [0, 1, 2];
    echo json_encode($data);
}