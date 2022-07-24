<?php
// mengaktifkan session php
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman ke halaman login
// header("location:index.php");
// Kembali ke halaman login
echo "<script>alert('Berhasil Logout')</script>";
header("location: http://localhost/201753028/?halaman=login");
