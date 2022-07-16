<?php

//function url asset tampilah
  function base_url($urlparam){
    $url = "http://localhost/201753028/".$urlparam;
    return $url;
  }

  //url internal raja vapor
  function base_url_halaman($urlparam){
    $url = "http://localhost/201753028/vapor/".$urlparam;
    return $url;
  }

  include '../koneksi.php';
?>

<?php                
    include '../template_organisasi/header.php';


    if(isset($_GET['halaman'])){
        $hal = $_GET['halaman'];
        switch ($hal){
            case 'home': 
                include '../template_organisasi/sidebar.php';
                include '../template_organisasi/isi.php';
            break;
            
            case 'barang': //barang    
                include '../template_organisasi/sidebar.php';
                include '../vapor/barang/index.php';
            break;
            case 'barang_tambah': //barang    
                include '../template_organisasi/sidebar.php';
                include '../vapor/barang/tambah.php';
            break;
            case 'barang_edit': //barang    
                include '../template_organisasi/sidebar.php';
                include '../vapor/barang/edit.php';
            break;

            case 'kategori': 
                include '../template_organisasi/sidebar.php';
                include '../vapor/kategori/index.php';
            break;
            case 'bank': 
                include '../template_organisasi/sidebar.php';
                include '../vapor/bank/index.php';
            break;
            case 'pembayaran': 
                include '../template_organisasi/sidebar.php';
                include '../vapor/pembayaran/index.php';
            break;
            case 'penjualan_gerai': 
                include '../template_organisasi/sidebar.php';
                include '../vapor/penjualan_gerai/index.php';
            break;
            default: //jika memanggil halaman tidak ada maka..
                include '../template_organisasi/sidebar.php';
                include '../vapor/bank/index.php';
            break;
            }
    }
    else{ //jika tidak memanggil halaman apapun maka..
        include 'templates/sidebar.php'; //memanggil file sidebar.php
        include 'home.php'; //memanggil file home.php


    }

    include '../template_organisasi/footer.php';
?>