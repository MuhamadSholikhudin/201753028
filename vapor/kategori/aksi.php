<?php
include '../../koneksi.php';
include '../../function.php';

if (isset($_POST['btnSIMPAN'])) {
    //mulai proses simpan
    $sql_simpan = "INSERT INTO kategori (nama_kategori, kategori) VALUES (
            '" . $_POST['nama_kategori'] . "',
            '" . $_POST['kategori'] . "')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    if ($query_simpan) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=kategori'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=kategori_tambah'>";
    } //proses simpan selesai
} else if (isset($_POST['btnUBAH'])) {
    $sql_ubah = "UPDATE kategori SET
            nama_kategori = '" . $_POST['nama_kategori'] . "',
            kategori ='" . $_POST['kategori'] . "' 
            WHERE id_kategori =" . $_POST['id_kategori'] . "";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=kategori'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=kategori_edit&id_kategori=" . $_POST['id_kategori'] . "'>";
    } //proses ubah selesai

} elseif (isset($_GET['aksi']) and isset($_GET['id_kategori'])) {

    //cari data stok kategori
    $cari_kategori = querysatudata("SELECT COUNT(id_kategori) as id_kategori FROM produk WHERE id_kategori = " . $_GET['id_kategori'] . "");

    if ($cari_kategori['id_kategori'] > 0) {
        echo "<script>alert('Hapus Gagal Karena Masih di gunakan pada Produk')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=kategori'>";
    } else {

        //mulai proses hapus
        $sql_hapus = "DELETE FROM kategori WHERE
                id_kategori='" . $_GET['id_kategori'] . "'";
        $query_hapus = mysqli_query($koneksi, $sql_hapus);

        if ($query_hapus) {
            echo "<script>alert('Hapus Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=kategori'>";
        } else {
            echo "<script>alert('Hapus Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=kategori'>";
        } //proses hapus selesai

    }
}
