<?php
include '../../koneksi.php';
include '../../function.php';

if (isset($_POST['btnSIMPAN'])) {

    //mulai proses simpan
    $sql_simpan = "INSERT INTO user (nama_lengkap, username,password,nomer_hp,hakakses,status_user) VALUES (
            '" . $_POST['nama_lengkap'] . "',
            '" . $_POST['username'] . "',
            '" . $_POST['password'] . "',
            '" . $_POST['email'] . "',
            '" . $_POST['nomer_hp'] . "',
            " . $_POST['hakakses'] . ",
            " . $_POST['status_user'] . "           
        )";

    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    if ($query_simpan) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pengguna'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pengguna_tambah'>";
    } //proses simpan selesai


} else if (isset($_POST['btnUBAHPENGGUNA'])) {

    $sql_ubah = "UPDATE user SET
            nama_lengkap = '" . $_POST['nama_lengkap'] . "',
            username ='" . $_POST['username'] . "',
            password ='" . $_POST['password'] . "',
            nomer_hp ='" . $_POST['nomer_hp'] . "',
            email ='" . $_POST['email'] . "',
            hakakses =" . $_POST['hakakses'] . ",
            status_user =" . $_POST['status_user'] . "
            WHERE id_user =" . $_POST['id_user'] . "";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pengguna'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pengguna_edit&id_user=" . $_POST['id_user'] . "'>";
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
