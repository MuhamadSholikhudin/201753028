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

    }elseif(isset($_POST['btnINPUTKERANJANGGERAI'])){

        $qty = $_POST['qty'];
        $harga_produk = $_POST['harga_produk'];

        if($qty >= 3){
            $harga = $harga_produk * 0.1;
         }else{
            $harga = $harga_produk;
         }

         $stok_produk = querysatudata("SELECT * FROM stok_gerai WHERE id_produk = ".$_POST['id_produk']." ");

         //menampung data stok gerai lama
         $stok_lama = $stok_produk['stok_gerai'];

         //perhitungan data stok gerai baru
         $stok_baru = $stok_lama - $qty;

         //update data stok gerai terbaru
         $sql_stok_gerai = "UPDATE stok_gerai SET stok_gerai = ".$stok_baru." WHERE id_produk = ".$_POST['id_produk']." ";

        $query_update_stok_gerai = mysqli_query($koneksi, $sql_stok_gerai);

        //  id_keranjang_gerai	id_stok_gerai	banyak	jumlah_harga	status_keranjang_gerai	id_penjualan_gerai

        $sql_simpan = "INSERT INTO `keranjang_gerai`
        ( `nomor_penjualan`, `total_penjualan`, `bayar_tunai`, `kembalian`, `status_penjualan_gerai`) 
            VALUES (
            '".$nomor_penjualan."',
            0,
            0,
            0,
            'belum bayar')";

    }

?>