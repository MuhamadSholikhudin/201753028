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

    $nomor_penjualan = strtotime("now");
    $sql_insert_pembayaran = "INSERT INTO `pembayaran`( `id_checkout`, `nomor_pembayaran`, `total_pembayaran`, `status_pembayaran`, `id_bank`,`id_user`) VALUES 
    (
        " . $_POST['id_checkout'] . ",
        'RV".$nomor_penjualan."',
        " . $_POST['total_pembayaran'] . ",
        1,
        " . $_POST['id_bank'] . ",
        ". $_SESSION['id_user'] ."
    )";

        //eksekusi simpan data pembayaran
    $query_insert_pembayaran = mysqli_query($koneksi, $sql_insert_pembayaran);

    // cari pembayaran yang di simpan
    $cari_pembayaran = querysatudata("SELECT * FROM pembayaran WHERE id_checkout = ".$_POST['id_checkout']."");
    
    // print("<pre>".print_r($cari_pembayaran,true)."</pre>");

    // simpan data pengiriman
    $sql_insert_pengiriman = "INSERT INTO pengiriman( `id_user`, `id_pembayaran`, `nama_penerima`, `nomor_penerima`, `provinsi`, `kota`, `kecamatan`, `kode_pos`, `alamat_jalan`, `alamat_lengkap`, `status_pengiriman`) VALUES 
    (
        ".$_POST['id_user'].",
        ".$cari_pembayaran['id_pembayaran'].",
        '".$_POST['nama_penerima']."',
        '".$_POST['nomor_penerima']."',
        '".$_POST['provinsi']."',
        '".$_POST['kota']."',
        '".$_POST['kecamatan']."',
        '".$_POST['kode_pos']."',
        '".$_POST['alamat_jalan']."',
        '".$_POST['alamat_lengkap']."',
        1
    )";

    // print("<pre>".print_r($cari_pembayaran,true)."</pre>");
    // print("<pre>".print_r($sql_insert_pengiriman,true)."</pre>");

    // echo $sql_insert_pengiriman;

    $query_insert_pengiriman = mysqli_query($koneksi, $sql_insert_pengiriman);
    // print("<pre>".print_r($query_insert_pengiriman,true)."</pre>");

    // var_dump($query_insert_pengiriman);

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
