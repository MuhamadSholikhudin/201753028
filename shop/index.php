<?php
session_start();

include '../koneksi.php';

include '../function.php';

?>


<?php
include '../templates/header.php';
?>
<!-- Slider Area -->
<!-- Product Style -->
<section class=" shop-sidebar shop " style="margin-top:10px; margin-bottom:50px;">
    <div class="container">
        <div class="row">
            <!-- Batas Konten -->
            <?php

            //jika halaman http://localhost/201753028/index.php?halaman=
            if (isset($_GET['halaman'])) {
                $hal = $_GET['halaman'];
                switch ($hal) {

                    case 'kategori':
                        include '../templates/sidebar.php'; //memanggil file sidebar.php
                        include "kategori.php";
                        break;

                    case 'detail_produk':
                        include "detail_produk.php";
                        break;

                    case 'search':
                        include "search.php";
                        break;

                    default: //jika memanggil halaman tidak ada maka..
                        include "home.php";
                        break;
                }
            } else { //jika tidak memanggil halaman apapun maka..
                include '../../templates/sidebar.php'; //memanggil file sidebar.php
                include 'home.php'; //memanggil file home.php
            }

            ?>
            <!-- Batas Konten Bawah -->
        </div>
    </div>
</section>
<!--/ End Product Style 1  -->

<?php
include '../templates/footer.php';
?>