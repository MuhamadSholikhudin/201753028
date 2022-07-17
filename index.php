<?php
session_start();

include 'koneksi.php';

include 'function.php';

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