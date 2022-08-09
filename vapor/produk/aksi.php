<?php
    include '../../koneksi.php';
    if (isset ($_POST['btnSIMPAN'])){
        //mulai proses simpan
        $gambar = (date('Y-m-d') . $_FILES['gambar']['name']);
        $lokasi = $_FILES['gambar']['tmp_name'];

        $sql_simpan = "INSERT INTO produk (nama_produk, id_kategori,stok_produk,status_produk, harga_produk, gambar, deskripsi) VALUES (
            '".$_POST['nama_produk']."',
            ".$_POST['id_kategori'].",
            ".$_POST['stok_produk'].",
            ".$_POST['status_produk'].",
            ".$_POST['harga_produk'].",
            '".$gambar."',
            '".$_POST['deskripsi']."')";
        
            move_uploaded_file($lokasi, "../../gambar/produk/".$gambar);

        $query_simpan = mysqli_query($koneksi, $sql_simpan);

        if($query_simpan){
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=produk'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=produk_tambah'>";
        } //proses simpan selesai



    }else if (isset ($_POST['btnUBAH'])){
        //mulai proses ubah
        $gambar = (date('Y-m-d') . $_FILES['gambar']['name']);
        $lokasi = $_FILES['gambar']['tmp_name'];

        // var_dump($_POST);

        if (!empty($lokasi)){

            move_uploaded_file($lokasi, "../../gambar/produk/".$gambar);
            
            $sql_ubah = "UPDATE produk SET
                nama_produk = '".$_POST['nama_produk']."',
                id_kategori =".$_POST['id_kategori'].",
                stok_produk =".$_POST['stok_produk'].",
                status_produk =".$_POST['status_produk'].",
                harga_produk =".$_POST['harga_produk'].",
                gambar ='".$gambar."',
                deskripsi ='".$_POST['deskripsi']."'
                WHERE id_produk =".$_POST['id_produk']."";
            $query_ubah = mysqli_query($koneksi, $sql_ubah);
        }else{
            move_uploaded_file($lokasi, "../../gambar/produk/".$gambar);

            $sql_ubah = "UPDATE produk SET
                nama_produk = '".$_POST['nama_produk']."',
                id_kategori =".$_POST['id_kategori'].",
                stok_produk =".$_POST['stok_produk'].",
                status_produk =".$_POST['status_produk'].",
                harga_produk =".$_POST['harga_produk'].",
                gambar ='".$gambar."',
                deskripsi ='".$_POST['deskripsi']."'
                WHERE id_produk =".$_POST['id_produk']."";
            $query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

        if($query_ubah){
            echo "<script>alert('Ubah Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=produk'>";
        }else{
            echo "<script>alert('Ubah Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=produk_edit&id_produk='>";
        } //proses ubah selesai

    }
?>