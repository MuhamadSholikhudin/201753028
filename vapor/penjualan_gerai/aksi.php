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

        //Tambah keranjang
    }elseif(isset($_POST['btnINPUTKERANJANGGERAI'])){
        var_dump($_POST);
        echo "<br>";

        // tampilkan stok gerai	
         $stok_produk = querysatudata("SELECT * FROM stok_gerai WHERE id_produk = ".$_POST['id_produk']." ");
         var_dump($stok_produk);
         echo "<br>";

         //mencari keranjang gerai
        $cari_keranjang_gerai = querysatudata("SELECT COUNT(id_stok_gerai) as id_stok_gerai, banyak, jumlah_harga, id_keranjang_gerai FROM keranjang_gerai WHERE id_penjualan_gerai = ".$_POST['id_penjualan_gerai']." AND id_stok_gerai = ".$stok_produk['id_stok_gerai']." ");

        // $penjualan_gerai_count = querysatudata("SELECT COUNT() FROM penjualan_gerai WHERE id_penjualan_gerai = ".$_POST['id_penjualan_gerai']."");



        //Jika sudah ada produk maka lanjut tambahkan jumlahnya saja
        if($cari_keranjang_gerai['id_stok_gerai'] > 0){
            
            //Tampil banyak lama keranjang
            $banyak_keranjang_lama = $cari_keranjang_gerai['banyak'];

            //Tampil jumlah harga lama keranjang
            $banyak_keranjang_lama = $cari_keranjang_gerai['jumlah_harga'];

            $penjualan_gerai = querysatudata("SELECT * FROM penjualan_gerai WHERE id_penjualan_gerai = ".$_POST['id_penjualan_gerai']."");
            
            // Tampil jumlah penjualan lama
            $jumlah_penjualan_lama = $penjualan_gerai['total_penjualan'];

            $qty = $_POST['qty'] + $banyak_keranjang_lama;

            $harga_produk = $_POST['harga_produk'];

            if($qty >= 3){
                    $harga = $harga_produk * 0.05;
            }else{
                    $harga = $harga_produk;
            }

            //menampung data stok gerai lama
            $stok_lama = $stok_produk['stok_gerai'];

            //perhitungan data stok gerai baru
            $stok_baru = $stok_lama - $_POST['qty'];

            //update data keranjang penjualan terbaru
            $sql_keranjang_penjualan = "UPDATE keranjang_penjualan SET jumlah_harga = ".$harga." , banyak = ".$qty." WHERE id_produk = ".$_POST['id_keranjang_gerai']." ";
            
            var_dump($sql_keranjang_penjualan);
            echo "<br>";

            $query_update_keranjang_penjualan = mysqli_query($koneksi, $sql_keranjang_penjualan);
            
            //update data stok gerai terbaru
            $sql_stok_gerai = "UPDATE stok_gerai SET stok_gerai = ".$stok_baru." WHERE id_produk = ".$_POST['id_produk']." ";
            var_dump($sql_stok_gerai);
            echo "<br>";

            $query_update_stok_gerai = mysqli_query($koneksi, $sql_stok_gerai);

            //total penjualan baru
            $total_penjualan_baru = ($jumlah_penjualan_lama - $banyak_keranjang_lama) + $harga;

            $sql_penjualan_gerai = "UPDATE penjualan_gerai SET total_penjualan = " . $total_penjualan_baru  . " WHERE id_penjualan_gerai = " . $_POST['id_penjualan_gerai'] . " ";
            var_dump($sql_penjualan_gerai);
            echo "<br>";
            
            $query_update_penjualan_gerai = mysqli_query($koneksi, $sql_penjualan_gerai);

            // if($query_update_penjualan_gerai){
            //     echo "<script>alert('Tambah Stok Gerai Berhasil')</script>";
            //     echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=penjualan_gerai_keranjang&id_penjualan_gerai=".$_POST['id_penjualan_gerai']."'>";
            // }else{
            //     echo "<script>alert('Simpan Gagal')</script>";
            //     echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=penjualan_gerai_keranjang&id_penjualan_gerai=".$_POST['id_penjualan_gerai']."'>";
            // } //proses simpan selesai      

        //Jika Belum ada produknya
        }else{

            $qty = $_POST['qty'];
            $harga_produk = $_POST['harga_produk'];

            if($qty >= 3){
                $harga = $harga_produk * 0.05;
            }else{
                $harga = $harga_produk;
            }

            //menampung data stok gerai lama
            $stok_lama = $stok_produk['stok_gerai'];

            //perhitungan data stok gerai baru
            $stok_baru = $stok_lama - $qty;

            //update data stok gerai terbaru
            $sql_stok_gerai = "UPDATE stok_gerai SET stok_gerai = ".$stok_baru." WHERE id_produk = ".$_POST['id_produk']." ";

            $query_update_stok_gerai = mysqli_query($koneksi, $sql_stok_gerai);

            $sql_simpan_keranjang_gerai = "INSERT INTO `keranjang_gerai`
            (`id_stok_gerai`,`banyak`,`jumlah_harga`,`id_penjualan_gerai`,`status_keranjang_gerai`) 
                VALUES (
                '".$stok_produk['id_stok_gerai']."',
                ".$qty.",
                ".$harga.",
                ".$_POST['id_penjualan_gerai'].",
                0)";

            $query_simpan_keranjang_gerai = mysqli_query($koneksi, $sql_simpan_keranjang_gerai);
            
            if($query_simpan_keranjang_gerai){

                $penjualan_gerai = querysatudata("SELECT * FROM penjualan_gerai WHERE id_penjualan_gerai = ".$_POST['id_penjualan_gerai']."");

                $total = $penjualan_gerai['total_penjualan'] + $harga;
                //Edit Data pada tabel penjulan gerai
                $sql_penjualan_gerai = "UPDATE penjualan_gerai SET total_penjualan = " . $total  . " WHERE id_penjualan_gerai = " . $_POST['id_penjualan_gerai'] . " ";
                $query_update_penjualan_gerai = mysqli_query($koneksi, $sql_penjualan_gerai);

                echo "<script>alert('Tambah Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=penjualan_gerai_keranjang&id_penjualan_gerai=".$_POST['id_penjualan_gerai']."'>";
            }else{
                echo "<script>alert('Simpan Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=penjualan_gerai_keranjang&id_penjualan_gerai=".$_POST['id_penjualan_gerai']."'>";
            } //proses simpan selesai
        }



    }
    elseif(isset($_GET['id_keranjang_gerai']) AND isset($_GET['id_penjualan_gerai'])){



    }

    // Proses bayar penjualan
    elseif(isset($_POST['btnBAYARPENJUALAN'])){

        

    }

?>