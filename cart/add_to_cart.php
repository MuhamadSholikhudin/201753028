<?php
session_start();
include '../koneksi.php';

if(isset($_GET['id'])){
    if(isset($_SESSION['id_user'])){
        //menampung data dari inputan html
        $id_user = $_SESSION['id_user'];
        $status_keranjang = 1;	
        $id_produk = $_GET['id'];
        

        // Menampilkan data barang berdasarkan id_produk
        $print_barang = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_produk = $id_produk ");
        $barang = mysqli_fetch_array($print_barang,MYSQLI_BOTH);

        // Mencari jumlah keranjang jika ada barangnya maka akan di update jika tida maka di tambah 1
        $query_keranjang = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id_user = $id_user AND id_produk = $id_produk AND status_keranjang = 1  ");
        $cari_keranjang = mysqli_num_rows($query_keranjang);

        if($cari_keranjang > 0){

            // Menampilkan keranjang ynag jumlah lebih dari satu
            // $tampil_keranjang = $this->db->query("SELECT * FROM keranjang WHERE id_user = $id_user AND id_produk = $id_produk AND status_keranjang = 1 ")->row();
            $query_cari_keranjang = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE id_user = ".$id_user." AND id_produk = ".$id_produk." AND status_keranjang = 1 ");
            $tampil_keranjang = mysqli_fetch_array($query_cari_keranjang, MYSQLI_BOTH);

            

            // Penjumlahan jumlah barang dengan harga barang
            $jumlah = $tampil_keranjang['jumlah_keranjang'];
            $jumlah_keranjang = $jumlah + 1;
            $harga = $barang['harga_barang'];
            $harga_keranjang = $harga * $jumlah_keranjang;
            
            $sql_ubah_keranjang = "UPDATE keranjang SET
                jumlah_keranjang = ".$jumlah_keranjang.",
                harga_keranjang = ".$harga_keranjang."
                WHERE id_keranjang = ".$tampil_keranjang['id_keranjang']."";
          
            $query_ubah_keranjang = mysqli_query($koneksi, $sql_ubah_keranjang);

            if($query_ubah_keranjang){
                echo "<script>alert('Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/index.php'>";
            }else{
                echo "<script>alert('Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/index.php'>";
            } //proses ubah selesai

        }else{

            //data input di tampung dalam bentuk array

            
            //Menambahkan file melalui Model barang  dengan function tambah barang
            // $this->Model_keranjang->tambah_keranjang($data, 'keranjang');

            $sql_simpan = "INSERT INTO keranjang (id_produk, jumlah_keranjang, harga_keranjang, status_keranjang, id_user) VALUES (
                ".$id_produk.",
                1,
                ".$barang['harga_barang'].",
                1,
                ".$id_user."            
                )";

            $query_simpan = mysqli_query($koneksi, $sql_simpan);

            if($query_simpan){
                echo "<script>alert('Simpan Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/index.php'>";
            }else{
                echo "<script>alert('Simpan Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/index.php'>";
            } //proses simpan selesai
        }

    // Jika Belum Login
    }else{
        //login
        echo "<script>alert('Anda Belum Login')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/index.php?halaman=login'>";
    }

}


?>