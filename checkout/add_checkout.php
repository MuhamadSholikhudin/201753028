<?php 
    session_start();
    include '../koneksi.php';

    $explode_id_keranjang = explode(",",$_POST['implode_id_keranjang']);

    // foreach ($explode_id_keranjang as $id_keranjang) {
    //     // echo "$id_keranjang <br>";
    //     $sql_ubah_keranjang = "UPDATE keranjang SET
    //         status_keranjang = 2
    //         WHERE id_keranjang = ".$id_keranjang."";
    //     $query_ubah_keranjang = mysqli_query($koneksi, $sql_ubah_keranjang);
    // }

    //  simpan checkout 
        $date_now = date('Y-m-d');
        $date_str = strtotime($date_now);
        $date_add = strtotime("+1 day", $date_str);
        $date_1 = date('Y-m-d', $date_add);

    $sql_simpan_checkout = "INSERT INTO checkout (tanggal_transaksi, tanggal_kadaluarsa, status_transaksi, id_user, id_keranjang, jumlah_checkout) VALUES (
        '".date('Y-m-d')."',
        '".$date_1."',
        1,
        ".$_SESSION['id_user'].",
        '".$_POST['implode_id_keranjang']."',
        ".$_POST['jumlah_checkout']."
        )";       
    // var_dump($sql_simpan_checkout);
    $query_insert_checkout = mysqli_query($koneksi, $sql_simpan_checkout);
    // var_dump($query_insert_checkout);
    if($query_insert_checkout){
        // Mencari checkout yang sudah di insert
        $cari_checkout = mysqli_query($koneksi,"SELECT * FROM checkout WHERE id_keranjang = '".$_POST['implode_id_keranjang']."' AND jumlah_checkout = ".$_POST['jumlah_checkout']." AND id_user = ".$_SESSION['id_user']."");
        // Menampilkan data check out yang sudah di insert
        $data_checkout = mysqli_fetch_array($cari_checkout,MYSQLI_BOTH);

        echo "<script>alert('Berhasil Menambahkan Checkout')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/index.php?halaman=checkout&id_checkout=".$data_checkout['id_checkout']."'>";
    }else{
        echo "<script>alert('gagal Menambahkan Checkout')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/cart/index.php'>";
    }


?>