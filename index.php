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

// $session = "login";
// if($session == "belum login"){
//     header("location:login.php");
// }else{
//     header("location:home.php");
// }

// echo hello();

include 'koneksi.php';

?>


<?php
    include 'templates/header.php';
?>
    <!-- Slider Area -->
	<!-- Product Style -->
	<section class=" shop-sidebar shop " style="margin-top:10px; margin-bottom:50px;">
		<div class="container">
			<div class="row">
				<!-- Batas Konten -->
                <?php                

                if(isset($_GET['halaman'])){
                    $hal = $_GET['halaman'];
                    switch ($hal){
                        case 'home': 
                            include "home.php"; 
                        break;
                        //user    
                        case 'profil': 
                            include "profil.php"; 
                        break;
                        case 'login': 
                            include "login.php"; 
                        break;
                        case 'cart': 
                            include "cart/index.php"; 
                        break;
                        case 'checkout': 
                            include "checkout/index.php"; 
                        break;
                        default: //jika memanggil halaman tidak ada maka..
                            include "home.php";
                        break;
                   	 }
                }
                else{ //jika tidak memanggil halaman apapun maka..
                    include 'templates/sidebar.php'; //memanggil file sidebar.php
                    include 'home.php'; //memanggil file home.php


                }
                
                ?>


                <?php
                    // templates
                    // include 'templates/sidebar.php';
                    // include 'templates/content.php';
                ?>

                <!-- Batas Konten Bawah -->
            </div>
		</div>
	</section>
	<!--/ End Product Style 1  -->	

<?php
    include 'templates/footer.php';
?>