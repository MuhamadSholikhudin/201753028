<?php
    include '../../koneksi.php';
    include '../../function.php';

    if (isset ($_POST['btnTERSEDIA'])){
        //mulai proses simpan

        //menampilkan data pesanan_stok_gerai
        $getpesanan_stok_produk = querysatudata("SELECT * FROM pesanan_stok_gerai WHERE id_pesanan_stok_gerai = ".$_POST['id_pesanan_stok_gerai']." ");
        
        //menampilkan data user
        $getuser = querysatudata("SELECT * FROM user WHERE id_user = ".$getpesanan_stok_produk['id_user']." ");

        //menampilkan data produk
        $getproduk = querysatudata("SELECT * FROM produk WHERE id_produk = ".$_POST['id_produk']." ");
        
        //menampilkan data stok gerai
        $getstokgerai = querysatudata("SELECT * FROM stok_gerai WHERE id_produk = ".$_POST['id_produk']." AND id_gerai= ".$getuser['id_gerai']." ");

        //perhitungan stok produk yang baru pada tabel produk 
        $stok_produk = $getproduk['stok_produk'] - $_POST['stok_tersedia'];
        
        //perhitungan stok gerai yang baru pada tabel gerai 
        $stok_gerai = $getstokgerai['stok_gerai'] + $_POST['stok_tersedia'];

        //query update data stok produk pada tabel stok_gerai
        $sql_ubah_produk = "UPDATE produk SET
            stok_produk = ".$stok_produk."
            WHERE id_produk =".$_POST['id_produk']."";
        
        //execute stok produk pada stok produk
        $query_simpan_produk = mysqli_query($koneksi, $sql_ubah_produk);

        //query update data stok produk pada tabel stok_gerai
        $sql_ubah_stok_gerai = "UPDATE stok_gerai SET
            stok_gerai = ".$stok_gerai."
            WHERE id_produk =".$_POST['id_produk']." 
            AND id_gerai= ".$getuser['id_gerai']."";

        //execute stok produk pada stok_gerai
        $query_simpan_gerai = mysqli_query($koneksi, $sql_ubah_stok_gerai);

        $sql_ubah_pesanan_stok_gerai = "UPDATE pesanan_stok_gerai SET
            stok_tersedia = ".$_POST['stok_tersedia'].",
            status_pesanan_stok = 'tersedia'
            WHERE id_pesanan_stok_gerai =".$_POST['id_pesanan_stok_gerai']."";

        $query_simpan_pesanan_stok_gerai = mysqli_query($koneksi, $sql_ubah_pesanan_stok_gerai);

        if($query_simpan_pesanan_stok_gerai){ // Jika pesanan tersedia
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pesanan_stok'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pesanan_stok_gerai_tambah'>";
        } //proses simpan selesai

    }
    
    else if (isset ($_POST['btnBATALTERSEDIA'])){

        $getproduk = querysatudata("SELECT * FROM produk WHERE id_produk = ".$_POST['id_produk']." ");

        $getstokgerai = querysatudata("SELECT * FROM stok_gerai WHERE id_produk = ".$_POST['id_produk']." ");

        $getpesanstokgerai = querysatudata("SELECT * FROM pesanan_stok_gerai WHERE id_pesanan_stok_gerai = ".$_POST['id_pesanan_stok_gerai']." ");

        $stok_produk = $getproduk['stok_produk'] + $getpesanstokgerai['stok_tersedia'];
        $stok_gerai = $getstokgerai['stok_gerai'] - $getpesanstokgerai['stok_tersedia'];

        $sql_ubah_produk = "UPDATE produk SET
            stok_produk = ".$stok_produk."
            WHERE id_produk =".$_POST['id_produk']."";
        $query_simpan_produk = mysqli_query($koneksi, $sql_ubah_produk);

        $sql_ubah_stok_gerai = "UPDATE stok_gerai SET
            stok_gerai = ".$stok_gerai."
            WHERE id_produk =".$_POST['id_produk']."";
        $query_simpan_gerai = mysqli_query($koneksi, $sql_ubah_stok_gerai);

       $sql_ubah = "UPDATE pesanan_stok_gerai SET
            pesanan_stok = ".$_POST['pesanan_stok'].",
            stok_tersedia = 0,
            status_pesanan_stok = 'pesan'
            WHERE id_pesanan_stok_gerai =".$_POST['id_pesanan_stok_gerai']."";

        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        if($query_ubah){
            echo "<script>alert('Ubah Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pesanan_stok'>";
        }else{
            echo "<script>alert('Ubah Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pesanan_stok'>";
        } //proses ubah selesai

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

    }

elseif(isset ($_POST['btnPESAN'])){
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
