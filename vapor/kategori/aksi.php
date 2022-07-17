<?php
    include '../../koneksi.php';
    if (isset ($_POST['btnSIMPAN'])){
        //mulai proses simpan
        $sql_simpan = "INSERT INTO kategori (nama_kategori, kategori) VALUES (
            '".$_POST['nama_kategori']."',
            '".$_POST['kategori']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        if($query_simpan){
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=kategori'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=kategori_tambah'>";
        } //proses simpan selesai
    }
    
    else if (isset ($_POST['btnUBAH'])){
        $sql_ubah = "UPDATE kategori SET
            nama_kategori = '".$_POST['nama_kategori']."',
            kategori ='".$_POST['kategori']."' 
            WHERE id_kategori =".$_POST['id_kategori']."";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        if($query_ubah){
            echo "<script>alert('Ubah Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=kategori'>";
        }else{
            echo "<script>alert('Ubah Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=kategori_edit&id_kategori=".$_POST['id_kategori']."'>";
        } //proses ubah selesai

    }
