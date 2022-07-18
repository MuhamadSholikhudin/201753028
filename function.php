<?php
    $url_assets = "http://localhost/201753028/assets/";
    $url = "http://localhost/201753028/";

    function base_url($urlparam){
        $url = "http://localhost/201753028/".$urlparam;
        return $url;
    }

    function hello(){
        $hello = "Hello";
        return $hello;
    }

    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }

    //url internal raja vapor
    function base_url_halaman($urlparam){
        $url = "http://localhost/201753028/vapor/".$urlparam;
        return $url;
    }

    //function query banyak
    function querybanyak($query){
        $mysqli = new mysqli("localhost","root","","201753028");
        // menggunakan foreach
        return $mysqli->query($query);
    }

    //function query satu data
    function querysatudata($query){
        $koneksi = mysqli_connect("localhost","root","","201753028");
        $query_cek = mysqli_query($koneksi, $query);
        return mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    }
