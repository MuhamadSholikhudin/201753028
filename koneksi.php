<?php

$koneksi = mysqli_connect("localhost","root","","201753028");
 
// Check connection
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}