<?php
// menghubungkan php dengan koneksi database
include 'koneksi.php';

//menggunakan function
include 'function.php';

if (isset($_POST['btnREGISTRATION'])) {
    // Kembali ke halaman login

    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    $nomer_hp = $_POST['nomer_hp'];

    // jika password1 sama dengan password2
    if ($password1 = $password2) {

        // menghitung jumlah data yang ditemukan
        $query_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
        $cek_user = mysqli_num_rows($query_user);

        // jika username belum ada maka tambahkans
        if ($cek_user < 1) {

            // query menyimpan data user
            $query_simpan = "INSERT INTO `user`(`nama_lengkap`, `username`, `password`, `email`, `hakakses`, `nomer_hp`, `status_user`) VALUES 
            ('".$nama_lengkap."',
            '".$username."',
            '".$password1."',
            '".$email."',
            4,
            '".$nomer_hp."',
            1)";
            $query_simpan = mysqli_query($koneksi, $query_simpan);

            if ($query_simpan) {
                // Tampilkan reistrasi berhasil
                echo "<script>alert('Berhasil Melakukan registrasi')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/?halaman=login'>";
            } else {
                // Tampilkan reistrasi gagal
                echo "<script>alert('User Sudah Terdaftar')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/?halaman=registration'>";
            }
        } else {
            // Tampilkan pastikan password dengan konfirmasi password sama
            echo "<script>alert('Pastikan password dengan konfirmasi password sama')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/?halaman=registration'>";
        }
    } else {
        // Tampilkan pastikan password dengan konfirmasi password sama
        echo "<script>alert('Pastikan password dengan konfirmasi password sama')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/?halaman=registration'>";
    }
    // echo "<script>alert('Gagal Login')</script>";
    // echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/?halaman=registration'>";

} else {
    // Kembali ke halaman login
    echo "<script>alert('Gagal Login')</script>";
    echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/?halaman=registration'>";
}
