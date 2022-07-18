<?php 
    include '../../koneksi.php';
    include '../../function.php';

    if(isset($_POST['btnTAMBAHPENJUALAN'])){

        $nomor_penjualan = strtotime(date('Y-m-d H:i:s'));

        $sql_simpan = "INSERT INTO `penjualan_gerai`
            ( `nomor_penjualan`, `total_penjualan`, `bayar_tunai`, `kembalian`, `status_penjualan_gerai`) 
                VALUES (
                '".$nomor_penjualan."',
                0,
                0,
                0,
                'belum bayar')";

        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        $penjualan_gerai = querysatudata("SELECT * FROM penjualan_gerai WHERE nomor_penjualan = '".$nomor_penjualan."' ");

        if($query_simpan){
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=penjualan_gerai_keranjang&id_penjualan_gerai=".$penjualan_gerai['id_penjulan_gerai']."'>";
        
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=penjualan_gerai'>";
        } //proses simpan selesai

    }

?>