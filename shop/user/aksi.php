<?php
session_start();
include '../../koneksi.php';
include '../../function.php';

if (isset($_POST['btnUPDATEUSER'])) {

    // query mengubah data user
    $sql_simpan = "UPDATE user SET 
        nama_lengkap = '" . $_POST['nama_lengkap'] . "',
        email = '" . $_POST['email'] . "',
        nomer_hp = '" . $_POST['nomer_hp'] . "'
        WHERE id_user = " . $_POST['id_user'] . "";


    $query_update_user = mysqli_query($koneksi, $sql_simpan);

    if ($query_update_user) {
        echo "<script>alert('Berhasil Mengubah data profile')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/shop/user/index.php?halaman=profile_edit&id_user=" . $_POST['id_user']  . "'>";
    } else {
        echo "<script>alert('Gagal Mengubah data Profile')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/shop/user/index.php?halaman=profile_edit&id_user=" . $_POST['id_user']  . "'>";
    }
}
// Aksi Ubah Password
elseif (isset($_POST['btnUBAHPASSWORD'])) {

    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    // cek password harus sama
    if ($password1 == $password2) {
        $sql_simpan = "UPDATE user SET 
        password = '" . $_POST['password1'] . "'
        WHERE id_user = " . $_POST['id_user'] . "";

        $query_update_user = mysqli_query($koneksi, $sql_simpan);

        if ($query_update_user) {
            echo "<script>alert('Berhasil Mengubah Password')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/shop/user/index.php?halaman=profile'>";
        } else {
            echo "<script>alert('Gagal Mengubah data Password')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/shop/user/index.php?halaman=profile_password'>";
        }

    } else {
        echo "<script>alert('Gagal Mengubah Password, Password baru tidak sama dengan ulangi password')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/shop/user/index.php?halaman=profile_password'>";
    }
}
