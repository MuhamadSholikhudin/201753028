<?php

include '../../koneksi.php';
include '../../function.php';

if (isset($_GET['id_pembayaran']) and isset($_GET['status_pembayaran'])) {

    $sql_update_pembayaran = "UPDATE pembayaran SET 
        status_pembayaran = " . $_GET['status_pembayaran'] . "
        WHERE id_pembayaran = " . $_GET['id_pembayaran'] . "";

    $query_update_pembayaran = mysqli_query($koneksi, $sql_update_pembayaran);

    if ($query_update_pembayaran) {

        $pembayaran = querysatudata("SELECT * FROM pembayaran WHERE id_pembayaran = ".$_GET['id_pembayaran']."");

        //update status checkout
        $sql_ubah_checkout = "UPDATE checkout SET
            status_transaksi = 3
            WHERE id_checkout = " . $pembayaran['id_checkout'] . "";
        $query_ubah_checkout = mysqli_query($koneksi, $sql_ubah_checkout);

        /*  status_pembayaran 
                    1 = belum upload bukti pembayaran
                    2 = upload bukti pembayran tidak vali
                    3 = pembeli sudah upload bukti pembayaran
                    4 = pembayaran berhasil di konfirmasi
            */

        if ($_GET['status_pembayaran'] == 2) {
            echo "<script>alert('Pembayaran Berhasil dikonfirmasi tidak valid')</script>";
        } elseif ($_GET['status_pembayaran'] == 3) {
            echo "<script>alert('Pembayaran Berhasil di batalkan')</script>";
        } elseif ($_GET['status_pembayaran'] == 4) {
            echo "<script>alert('Pembayaran Berhasil di konfirmasi')</script>";
        }

        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pembayaran'>";
    } else {
        echo "<script>alert('Pembayaran Gagal di konfirmasi!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pembayaran'>";
    }
} else {
    var_dump($_GET);
}
