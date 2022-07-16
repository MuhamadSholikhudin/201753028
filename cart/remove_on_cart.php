<?php


include '../koneksi.php';

if (isset($_GET['id'])){

    //mulai proses hapus
    $sql_hapus = "DELETE FROM keranjang WHERE id_keranjang = ".$_GET['id']."";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    if($query_hapus){
        echo "<script>alert('Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/cart/index.php'>";
    }else{
        echo "<script>alert('".$_GET['id']."')</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/cart/index.php'>";
    } //proses ubah selesai
}

    //Menampilkan keranjang berdasarkan id_keranjang
    // $keranjang = $this->db->query("SELECT * FROM barang WHERE id_keranjang = $id_keranjang ")->row();

    //Menghapus data keranjang dari database
    // $delete = $this->db->query("DELETE FROM keranjang WHERE id_keranjang = $id_keranjang ");

    // return $delete;
    // header('location:http://localhost/201753028/index.php');
?>