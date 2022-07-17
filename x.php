<?php 

    $mysqli = new mysqli("localhost","root","","201753028");

    $query = 'SELECT * FROM produk';

    // Using iterators
    $result = $mysqli->query($query);
    foreach ($result as $row) {
        printf("%s (%s)\n", $row["nama_produk"], $row["harga_produk"]);
    }
    
?>