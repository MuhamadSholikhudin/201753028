<?php
    include '../../koneksi.php';
    if (isset ($_POST['btnTERSEDIA'])){
        //mulai proses simpan
        $sql_simpan = "INSERT INTO pesanan_stok_gerai (id_user, id_produk, pesanan_stok, keterangan, status_pesanan_stok) VALUES (
            ".$_POST['id_user'].",
            ".$_POST['id_produk'].",
            ".$_POST['pesanan_stok'].",
            '".$_POST['keterangan']."',
            '".$_POST['status_pesanan_stok']."')";

        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        if($query_simpan){
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pesanan_stok_gerai'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pesanan_stok_gerai_tambah'>";
        } //proses simpan selesai
    }
    
    else if (isset ($_POST['btnUBAH'])){
        $sql_ubah = "UPDATE pesanan_stok_gerai SET
            id_user = ".$_POST['id_user'].",
            id_produk = ".$_POST['id_produk'].",
            pesanan_stok = ".$_POST['pesanan_stok'].",
            keterangan = '".$_POST['keterangan']."',
            status_pesanan_stok = '".$_POST['status_pesanan_stok']."'

            WHERE id_pesanan_stok_gerai =".$_POST['id_pesanan_stok_gerai']."";

        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        if($query_ubah){
            echo "<script>alert('Ubah Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pesanan_stok_gerai'>";
        }else{
            echo "<script>alert('Ubah Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pesanan_stok_gerai_edit&id_pesanan_stok_gerai=".$_POST['id_pesanan_stok_gerai']."'>";
        } //proses ubah selesai

    }elseif(isset ($_POST['btnPESAN'])){
        $sql_ubah = "UPDATE pesanan_stok_gerai SET
            status_pesanan_stok = 'pesan'

            WHERE id_pesanan_stok_gerai =".$_POST['id_pesanan_stok_gerai']."";

        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        if($query_ubah){
            echo "<script>alert('Pesan Stok Produk Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pesanan_stok_gerai'>";
        }else{
            echo "<script>alert('Pesan Stok Produk Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pesanan_stok_gerai'>";
        } //proses ubah selesai

    }elseif(isset ($_POST['btnBATALPESAN'])){
        $sql_ubah = "UPDATE pesanan_stok_gerai SET
            status_pesanan_stok = 'belum pesan'

            WHERE id_pesanan_stok_gerai =".$_POST['id_pesanan_stok_gerai']."";

        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        if($query_ubah){
            echo "<script>alert('Pesan Stok Produk Berhasil Batalkan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pesanan_stok_gerai'>";
        }else{
            echo "<script>alert('Pembatalan Stok Produk Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pesanan_stok_gerai'>";
        } //proses ubah selesai

    }
