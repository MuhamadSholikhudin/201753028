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
                case 'cart': 
                    include "cart.php"; 
                break;
                default: //jika memanggil halaman tidak ada maka..
                    include "cart.php";
                break;
            }
        }
        else{ //jika tidak memanggil halaman apapun maka..
            
            include "cart.php";
        }
    ?>

<?php
    include '../templates/footer.php';
?>


	
