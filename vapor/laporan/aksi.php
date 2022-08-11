<?php 

if(isset($_POST['tanggal_awal']) AND isset($_POST['tanggal_akhir'])){

    // $query_pertanggal = "SELECT * FROM pembayaran WHERE tanggal_pembayaran BETWEEN '".$_POST['tanggal_awal']."' AND '".$_POST['tanggal_akhir']."'";
    if($_POST['cetak'] == 'cetak_online'){
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/laporan/cetak_online.php?tanggal_awal=".$_POST['tanggal_awal']."&tanggal_akhir=".$_POST['tanggal_akhir']."'>";
    }else{
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/laporan/cetak_gerai.php?tanggal_awal=".$_POST['tanggal_awal']."&tanggal_akhir=".$_POST['tanggal_akhir']."'>";
    }

}