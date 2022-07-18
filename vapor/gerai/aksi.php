<?php
    include '../../koneksi.php';
    if (isset($_POST['btnSIMPAN'])){

        //mulai proses simpan
        $sql_simpan = "INSERT INTO gerai (nama_gerai, cabang, alamat_gerai) VALUES (
            '".$_POST['nama_gerai']."',
            ".$_POST['cabang'].",
            '".$_POST['alamat_gerai']."')";

        $query_simpan = mysqli_query($koneksi, $sql_simpan);

        if($query_simpan){
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=gerai'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=gerai_tambah'>";
        } //proses simpan selesai
    }
    
    else if (isset ($_POST['btnUBAH'])){
        //mulai proses simpan

        $sql_ubah = "UPDATE gerai SET
            nama_gerai = '".$_POST['nama_gerai']."',
            cabang = '".$_POST['cabang']."',
            alamat_gerai = '".$_POST['alamat_gerai']."'
            WHERE id_gerai =".$_POST['id_gerai']."";

        $query_ubah = mysqli_query($koneksi, $sql_ubah);

        if($query_ubah){
            echo "<script>alert('Ubah Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=gerai'>";
        }else{
            echo "<script>alert('Ubah Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=gerai_edit&id_gerai=".$_POST['id_gerai']."'>";
        } //proses ubah selesai

    }
