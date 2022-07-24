<?php

session_start();
include '../koneksi.php';
include '../function.php';

if (isset($_POST['btnPROSESPEMBAYARAN'])) {

    //update status keranjang
    $explode_id_keranjang = explode(",", $_POST['implode_id_keranjang']);

    foreach ($explode_id_keranjang as $id_keranjang) {
        $sql_ubah_keranjang = "UPDATE keranjang SET
            status_keranjang = 3
            WHERE id_keranjang = " . $id_keranjang . "";
        $query_ubah_keranjang = mysqli_query($koneksi, $sql_ubah_keranjang);
    }

    //update status checkout
    $sql_ubah_checkout = "UPDATE checkout SET
        status_transaksi = 2
        WHERE id_checkout = " . $_POST['id_checkout'] . "";
    $query_ubah_checkout = mysqli_query($koneksi, $sql_ubah_checkout);

    //insert data pembayaran

    $query_insert = "INSERT INTO `pembayaran`( `id_checkout`, `total_pembayaran`, `status_pembayaran`, `id_bank`) VALUES 
    (
        " . $_POST['id_checkout'] . ",
        " . $_POST['total_pembayaran'] . ",
        1,
        " . $_POST['id_bank'] . "
        )";

    $query_insert_pembayaran = mysqli_query($koneksi, $query_insert);
    if ($query_insert_pembayaran) {
        // Mencari pembayaran yang sudah di insert
        $cari_pembayaran = querysatudata("SELECT * FROM pembayaran WHERE id_checkout =" . $_POST['id_checkout'] . " ");

        echo "<script>alert('Berhasil Berhasil Menambahkan Pembayaran')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/pembayaran/index.php?halaman=pembayaran_upload&id_pembayaran=" . $cari_pembayaran['id_pembayaran'] . "'>";
    } else {
        echo "<script>alert('gagal Menambahkan Pembayaran')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/checkout/index.php?halaman=checkout&id_checkout=" . $_POST['id_checkout'] . "'>";
    }
} 
// Upload Bukti Pembayaran
elseif (isset($_POST['btnUPLOADBUKTIPEMBAYARAN'])) {
    $butkipembayaran = (strtotime("now") . $_FILES['butkipembayaran']['name']);
    $lokasi = $_FILES['butkipembayaran']['tmp_name'];

    $sql_update_pembayaran = "UPDATE pembayaran SET 
        bukti_pembayaran = '" . $butkipembayaran . "',
        status_pembayaran = 3,
        tanggal_pembayaran = '" . date('Y-m-d') . "'
        WHERE id_pembayaran = " . $_POST['id_pembayaran'] . "";

    move_uploaded_file($lokasi, "../gambar/butkipembayaran/".$butkipembayaran);

    $query_update_pembayaran = mysqli_query($koneksi, $sql_update_pembayaran);   

    if ($query_update_pembayaran) {
        echo "<script>alert('Upload bukti pembayaran Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/pembayaran/index.php?halaman=pembayaran_upload&id_pembayaran=" . $_POST['id_pembayaran'] . "'>";
    } else {
        echo "<script>alert('Upload Bukti Pembayaran Gagal!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/pembayaran/index.php?halaman=pembayaran_upload&id_pembayaran=" . $_POST['id_pembayaran'] . "'>";
    }
}
