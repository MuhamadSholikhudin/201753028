<?php
session_start();

include '../koneksi.php';
include '../function.php';

include '../templates/header.php';

$col_atas = '
<section class=" shop-sidebar shop " style="margin-top:10px; margin-bottom:50px;">
    <div class="container">
        <div class="row">
';

$col_bawah = '</div></div></section>';

if (isset($_GET['halaman'])) {
    $hal = $_GET['halaman'];
    switch ($hal) {

        case 'pengiriman':
            echo $col_atas;
            include "../shop/user/sidebar.php";
            include "pengiriman.php";
            echo $col_bawah;
            break;

        default: //jika memanggil halaman tidak ada maka..
            echo $col_atas;
            include "../shop/user/sidebar.php";
            include "pengiriman.php";
            echo $col_bawah;
            break;
    }
} else { //jika tidak memanggil halaman apapun maka..
    echo $col_atas;
    include "../shop/user/sidebar.php";
    include "pengiriman.php";
    echo $col_bawah;
}
?>
<!-- Batas Konten Bawah -->


<!--/ End Product Style 1  -->
<?php
include '../templates/footer.php';
?>