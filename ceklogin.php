<?php 
// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// menghitung jumlah data yang ditemukan
$login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);
$data_cek = mysqli_fetch_array($login,MYSQLI_BOTH);


// cek apakah username dan password di temukan pada database
if($cek > 0){
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

    // alihkan ke halaman dashboard admin
    // header("location:index.php");
    // $2y$10$nv2T15kceSffGR0ZjztcE.fIBk76wcoy9aZL4OavB7Ko9XjqpSeXm
    // echo 'Berhasil Login';
    
    header("Location: http://localhost/201753028/index.php");
    
    
}else{
    // header("location:index.php?pesan=gagal");
    // header("location:/index.php?pesan=gagal");
    echo 'Gagal Login';

    
}

?>
