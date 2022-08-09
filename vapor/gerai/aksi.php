<?php
include '../../koneksi.php';
include '../../function.php';
if (isset($_POST['btnSIMPAN'])) {

    //mulai proses simpan
    $sql_simpan = "INSERT INTO gerai (nama_gerai, cabang, alamat_gerai) VALUES (
            '" . $_POST['nama_gerai'] . "',
            " . $_POST['cabang'] . ",
            '" . $_POST['alamat_gerai'] . "')";

    $query_simpan = mysqli_query($koneksi, $sql_simpan);

    if ($query_simpan) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=gerai'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=gerai_tambah'>";
    } //proses simpan selesai
} else if (isset($_POST['btnUBAH'])) {
    //mulai proses simpan

    $sql_ubah = "UPDATE gerai SET
            nama_gerai = '" . $_POST['nama_gerai'] . "',
            cabang = '" . $_POST['cabang'] . "',
            alamat_gerai = '" . $_POST['alamat_gerai'] . "'
            WHERE id_gerai =" . $_POST['id_gerai'] . "";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=gerai'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=gerai_edit&id_gerai=" . $_POST['id_gerai'] . "'>";
    } //proses ubah selesai

} elseif (isset($_GET['aksi'])  and isset($_GET['id_gerai'])) {

    //cari data stok gerai
    $cari_stok_gerai = querysatudata("SELECT COUNT(id_gerai) as id_gerai FROM stok_gerai WHERE id_gerai = " . $_GET['id_gerai'] . "");

    if ($cari_stok_gerai['id_gerai'] > 0) {
        echo "<script>alert('Hapus Gagal Karena Masih di gunakan pada stok gerai')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=gerai'>";
    } else {

        //mulai proses hapus
        $sql_hapus = "DELETE FROM gerai WHERE
            id_gerai='" . $_GET['id_gerai'] . "'";
        $query_hapus = mysqli_query($koneksi, $sql_hapus);

        if ($query_hapus) {
            echo "<script>alert('Hapus Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=gerai'>";
        } else {
            echo "<script>alert('Hapus Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=gerai'>";
        } //proses hapus selesai

    }
}
