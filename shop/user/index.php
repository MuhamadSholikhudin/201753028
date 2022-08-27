<?php
session_start();

include '../../koneksi.php';

include '../../function.php';

?>


<?php
include '../../templates/header.php';
?>
<!-- Slider Area -->
<!-- Product Style -->
<section class=" shop-sidebar shop " style="margin-top:10px; margin-bottom:50px;">
    <div class="container">
        <div class="row">
            <!-- Batas Konten -->
            <?php

            //jika halaman http://localhost/201753028/shop/user/index.php?halaman=
            if (isset($_GET['halaman'])) {
                $hal = $_GET['halaman'];
                switch ($hal) {

                    case 'dashboard':
                        include 'sidebar.php'; //memanggil file sidebar.php
                        include "dashboard.php";
                        break;

                    case 'profile':
                        include 'sidebar.php'; //memanggil file sidebar.php
                        include "profile.php";
                        break;

                        // Tampilan edit data profile
                    case 'profile_edit':
                        include 'sidebar.php'; //memanggil file sidebar.php
                        include "profile_edit.php";
                        break;

                        // Tampilan edit data profile
                    case 'alamat_tambah':
                        include 'sidebar.php'; //memanggil file sidebar.php
                        include "alamat.php";
                        break;

                        // Tampilan edit data profile
                    case 'alamat_edit':
                        include 'sidebar.php'; //memanggil file sidebar.php
                        include "alamat_edit.php";
                        break;

                        // Tampilan edit password
                    case 'profile_password':
                        include 'sidebar.php'; //memanggil file sidebar.php
                        include "profile_password.php";
                        break;

                    default: //jika memanggil halaman tidak ada maka..
                        include "home.php";
                        break;
                }
            } else { //jika tidak memanggil halaman apapun maka..
                include 'sidebar.php'; //memanggil file sidebar.php
                include 'dashboard.php'; //memanggil file home.php
            }

            ?>
            <!-- Batas Konten Bawah -->
        </div>
    </div>
</section>
<!--/ End Product Style 1  -->

<?php
include '../../templates/footer.php';
?>