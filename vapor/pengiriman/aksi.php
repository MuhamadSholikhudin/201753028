<?php 
if(isset($_POST['btnSIMPANBUKTIPENGIRIMAN'])){
     
    $bukti_pengiriman = (date('Y-m-d') . $_FILES['bukti_pengiriman']['name']);
    $lokasi = $_FILES['bukti_pengiriman']['tmp_name'];
    
    $sql_update_pengiriman = "UPDATE `pengiriman` SET 
        `status_pengiriman`= 2,
        `keterangan`='".$_POST['keterangan']."',
        `bukti_pengiriman`='".$_POST['bukti_pengiriman']."' 
        WHERE id_pengiriman = ".$_POST['id_pengiriman']."";

     move_uploaded_file($lokasi, "../../gambar/bukti_pengiriman/".$bukti_pengiriman);

     $query_simpan = mysqli_query($koneksi, $sql_update_pengiriman);

}elseif(isset($_POST['btnUPDATEBUKTIPENGIRIMAN'])){

    
}


?>