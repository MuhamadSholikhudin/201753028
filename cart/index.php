<?php
    session_start();

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


    include '../koneksi.php';

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


	
