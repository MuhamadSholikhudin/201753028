<?php

  include '../koneksi.php';
  include '../function.php';
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
            
            case 'produk': //produk    
                include '../template_organisasi/sidebar.php';
                include '../vapor/produk/index.php';
            break;
            case 'produk_tambah': //produk    
                include '../template_organisasi/sidebar.php';
                include '../vapor/produk/tambah.php';
            break;
            case 'produk_edit': //produk    
                include '../template_organisasi/sidebar.php';
                include '../vapor/produk/edit.php';
            break;

            case 'kategori': 
                include '../template_organisasi/sidebar.php';
                include '../vapor/kategori/index.php';
            break;
            case 'kategori_tambah': 
                include '../template_organisasi/sidebar.php';
                include '../vapor/kategori/tambah.php';
            break;
            case 'kategori_edit': 
                include '../template_organisasi/sidebar.php';
                include '../vapor/kategori/edit.php';
            break;

            case 'bank': 
                include '../template_organisasi/sidebar.php';
                include '../vapor/bank/index.php';
            break;
            case 'bank_tambah': 
                include '../template_organisasi/sidebar.php';
                include '../vapor/bank/tambah.php';
            break;
            case 'bank_edit': 
                include '../template_organisasi/sidebar.php';
                include '../vapor/bank/edit.php';
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