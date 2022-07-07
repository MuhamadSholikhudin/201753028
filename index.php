<?php

$url_assets = "http://localhost/201753028/assets/";

define("URL_WEB", "http://127.0.0.1:8000");
define("SUM_URL_WEB", 22);

function hello(){

    $hello = "Hello";
  return $hello;
}

$session = "login";
// window.location.href = "http://www.w3schools.com";
if($session ==  "belum login"){
    header("location:login.php");
}
// echo hello();

$koneksi = mysqli_connect("localhost","root","","201753028");
 
// Check connection
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}


?>