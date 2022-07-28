<?php 
include '../koneksi.php';
include '../function.php';
if(isset($_GET['id_pengiriman']) AND isset($_GET['status_pengiriman'])){

    $sql_update_pengiriman = "UPDATE `pengiriman` SET
        `status_pengiriman`= ".$_GET['status_pengiriman']."
        WHERE id_pengiriman = ".$_GET['id_pengiriman']."";

    $query_simpan = mysqli_query($koneksi, $sql_update_pengiriman);

    if($query_simpan){
        echo "<script>alert('Pengiriman Berhasil di Klain dan Selesai')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/pengiriman/'>";
    }else{
        echo "<script>alert('Pengiriman Pengiriman Gagal di Klaim Selesai')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/pengiriman/'>";
    } //proses simpan selesai

}else{

}
?>