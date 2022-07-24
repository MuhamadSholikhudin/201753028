<?php
// menghubungkan php dengan koneksi database
include 'koneksi.php';

if (isset($_POST['cekLogin'])) {

    // menangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // menghitung jumlah data yang ditemukan
    $login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($login);
    $data_cek = mysqli_fetch_array($login, MYSQLI_BOTH);


    // cek apakah username dan password di temukan pada database
    if ($cek > 0) {
        // mengaktifkan session pada php
        session_start();

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        $_SESSION['id_user'] = $data_cek['id_user'];
        $_SESSION['nama_lengkap'] = $data_cek['nama_lengkap'];
        $_SESSION['hakakses'] = $data_cek['hakakses'];
        $_SESSION['email'] = $data_cek['email'];
        $_SESSION['status_user'] = $data_cek['status_user'];


        //hakakses pemilik
        if ($data_cek['hakakses'] == 1) {
            echo "<script>alert('Berhasil Login')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=beranda'>";
        //hakakses admin
        } elseif ($data_cek['hakakses'] == 2) {
            echo "<script>alert('Berhasil Login')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=beranda'>";
            // hakakses karyawan
        } elseif ($data_cek['hakakses'] == 3) {
            echo "<script>alert('Berhasil Login')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=beranda'>";

            //hakakses umum
        } elseif ($data_cek['hakakses'] == 4) {
            echo "<script>alert('Berhasil Login')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/'>";
        }
    } else {
        // Kembali ke halaman login
        echo "<script>alert('Gagal Login')</script>";
        header("location: http://localhost/201753028/?halaman=login");
    }
} else {
    // Kembali ke halaman login
    echo "<script>alert('Gagal Login')</script>";
    header("location: http://localhost/201753028/?halaman=login");
}
