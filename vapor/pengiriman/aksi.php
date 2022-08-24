<?php 
include '../../koneksi.php';
include '../../function.php';

if(isset($_POST['btnSIMPANBUKTIPENGIRIMAN'])){
     
    $bukti_pengiriman = (date('Y-m-d') . $_FILES['bukti_pengiriman']['name']);
    $lokasi = $_FILES['bukti_pengiriman']['tmp_name'];
    
    $sql_update_pengiriman = "UPDATE `pengiriman` SET 
        `status_pengiriman`= 2,
        `tanggal_pengiriman` = ".$_POST['tanggal_pengiriman'].",
        `keterangan`='".$_POST['keterangan']."',
        `bukti_pengiriman`='".$_POST['bukti_pengiriman']."' 
        WHERE id_pengiriman = ".$_POST['id_pengiriman']."";

     move_uploaded_file($lokasi, "../../gambar/bukti_pengiriman/".$bukti_pengiriman);

    $query_simpan = mysqli_query($koneksi, $sql_update_pengiriman);

    $bukti_pengiriman = (strtotime('now') . $_FILES['bukti_pengiriman']['name']);
    $lokasi = $_FILES['bukti_pengiriman']['tmp_name'];

    $sql_update_pengiriman = "UPDATE `pengiriman` SET
        `status_pengiriman`= 2 ,
        `keterangan`='".$_POST['keterangan']."',
        `bukti_pengiriman`='".$bukti_pengiriman."' 
        WHERE id_pengiriman = ".$_POST['id_pengiriman']."";

        move_uploaded_file($lokasi, "../../gambar/buktipengiriman/".$bukti_pengiriman);

        $query_simpan = mysqli_query($koneksi, $sql_update_pengiriman);

        if($query_simpan){
            echo "<script>alert('Bukti pengiriman Berhasil Di Simpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pengiriman'>";
        }else{
            echo "<script>alert('Simpan Bukti Pengiriman Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=pengiriman'>";
        } //proses simpan selesai

}elseif(isset($_POST['btnUPDATEBUKTIPENGIRIMAN'])){

    
}


?>