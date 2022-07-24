<?php
    session_start();

    include '../koneksi.php';
    include '../function.php';

    include '../templates/header.php';
?>
    <!-- Batas Konten -->
    <?php                

        if(isset($_GET['halaman'])){
            $hal = $_GET['halaman'];
            switch ($hal){
                case 'checkout': 
                    include "checkout.php"; 
                break;
                default: //jika memanggil halaman tidak ada maka..
                    include "checkout.php";
                break;
            }
        }
        else{ //jika tidak memanggil halaman apapun maka..
            include "checkout.php";
        }
    ?>
<?php
    include '../templates/footer.php';
?>


	
