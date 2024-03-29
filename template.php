<?php

	require 'index.php';

	// echo $url_assets;
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>css/reset.css">
	<link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>style.css">
    <link rel="stylesheet" href="<?= $url_assets."/eshop/eshop/" ?>css/responsive.css">

	
	
</head>
<body class="js">
	
	
	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
								<li><i class="ti-email"></i> support@shophub.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-location-pin"></i> Store location</li>
								<!-- <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li> -->

								<?php if (isset($_SESSION['id_user'])) { ?>
									<li><i class="ti-user"></i> <a href="#">My account</a></li>

								<?php } else { ?>
									<li><i class="ti-power-off"></i><a href="http://localhost/login.php">Login</a></li>

								<?php } ?>

							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="<?= $url_assets."/eshop/eshop/" ?>/images/content-management/raja_vapor.jpg" width="40px" style="" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<select>
									<option selected="selected">All Category</option>
									<?php
										$sql_kategori = "SELECT * FROM kategori";
										$query_tampil_kategori = mysqli_query($koneksi, $sql_kategori);
										$no=1; //nilai awal nomer
										while ($kategori = mysqli_fetch_array($query_tampil_kategori,MYSQLI_BOTH)){

									?>
										<option value="<?= $kategori['kategori'] ?>"><?= $kategori['kategori'] ?></option>
									
									<?php
										//auto increment nomer
										$no++;
										}
									?>

									<!-- <option>mobile</option>
									<option>kid’s item</option> -->
								</select>
								<form>
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<!-- <div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div> -->
								<!-- <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li> -->

							<?php if (isset($_SESSION['id_user'])) { ?>
								<div class="sinlge-bar">
									<a href="http://localhost/login" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
								</div>

							<?php } else { ?>
								<div class="sinlge-bar">
									<a href="http://localhost/login" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
								</div>
							<?php } ?>
					
							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i> 
								<?php
									// Jika Sudah Login
									if(isset($_SESSION['id_user'])){
										// Mencari jumlah keranjang yang amasih aktif
										// $num_keranjang = $this->db->query("SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1")->num_rows();
										$cek_keranjang = mysqli_query($koneksi,"SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1");
										$jumlah_keranjang = mysqli_num_rows($login);
									
										// JIka ada keranjang aktif 
										if($jumlah_keranjang > 0){ ?>
											<span class="total-count">
												<?= $jumlah_keranjang ?>
											</span>
										<?php
											// Jika tidak ada keranjang aktif
											}else{
										}
									}else{
									}
								?>
								
								</a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span>
										<?php
											// Mencari jumlah items keranjang yang masih aktif
											
											if($jumlah_keranjang > 0){ ?>
												<?= $jumlah_keranjang ?>
											<?php } ?>											
											Items</span>
											<?php 
											// Jika Sudah Login
											if(isset($_SESSION['id_user'])){?>
												<a href="http://localhost/cart">View Cart</a>
											<?php } ?>
									</div>
									<ul class="shopping-list">
									<?php 
										// Jika Sudah Login
										if(isset($_SESSION['id_user'])){
											// SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1 
											$sql_keranjang_user = "SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1 ";
											$query_keranjang_user = mysqli_query($koneksi, $sql_keranjang_user);
											$no=1; //nilai awal nomer
											while ($keranjang_user = mysqli_fetch_array($query_keranjang_user,MYSQLI_BOTH)){
									?>

										<li>
											<a href="http://localhost/cart/remove_on/"<?= $keranjang_user['id_keranjang']?>" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="<?= base_url('uploads/barang/') ?>61.png" alt="#"></a>
											<h4><a href="#">
											<?php
											        $sql_barang_keranjang= "SELECT * FROM barang WHERE id_produk = $keranjang_user_id_produk";
													$query_barang_keranjang = mysqli_query($koneksi, $sql_barang_keranjang);
													$data_barang_keranjang = mysqli_fetch_array($query_barang_keranjang,MYSQLI_BOTH);
								
												echo $data_barang_keranjang['nama_barang'];
											?>
											
											</a></h4>
											<p class="quantity"><?= $data_barang_keranjang['jumlah_keranjang'];?>x <?= $data_barang_keranjang['harga_barang'];?> <span class="amount"><?= rupiah($data_barang_keranjang['harga_keranjang']) ?></span></p>
										</li>

										<?php
											//auto increment nomer
											$no++;
											}
										}
										?>

									</ul>
									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount">
											<?php

											// Jika Sudah Login
											if(isset($_SESSION['id_user'])){

												$sql_total_barang = "SELECT SUM(harga_keranjang) as total FROM barang WHERE id_produk = $keranjang_user_id_produk";
												$query_total_barang = mysqli_query($koneksi, $sql_total_barang);
												$data_total_barang = mysqli_fetch_array($query_total_barang, MYSQLI_BOTH);
												echo $data_total_barang['total'];

											}else{
												echo 0;
											}?>
											</span>
										</div>
										<a href="checkout.html" class="btn animate">Checkout</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
												<li class="active"><a href="<?= base_url('/raja_vapor/index/home') ?>">Home</a></li>
												<li><a href="#">Product</a></li>												
												<li><a href="#">Service</a></li>
												<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
													<ul class="dropdown">
														<li><a href="shop-grid.html">Shop Grid</a></li>
														<li><a href="cart.html">Cart</a></li>
														<li><a href="checkout.html">Checkout</a></li>
													</ul>
												</li>
												<li><a href="#">Pages</a></li>									
												<li><a href="#">Blog<i class="ti-angle-down"></i></a>
													<ul class="dropdown">
														<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
													</ul>
												</li>
												<li><a href="contact.html">Contact Us</a></li>
											</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->

	<!-- Breadcrumbs -->
	<div class="breadcrumbs" style="margin-bottom:0%;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Shop Grid</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<!-- End Breadcrumbs -->

	

	<!-- Slider Area -->
	<!-- Product Style -->
	<section class=" shop-sidebar shop " style="margin-top:10px;">
		<div class="container">
			<div class="row">
				<!-- Batas Konten -->

				<!-- Sidebar -->
				<div class="col-lg-3 col-md-4 col-12">
					<div class="shop-sidebar">
						<!-- Single Widget -->
						<div class="single-widget category">
							<h3 class="title">Kategori</h3>
							<ul class="categor-list">

							<?php 
								// perulangan data kategoori  
								$sql_kategories = "SELECT * FROM kategori";
								$query_kategories = mysqli_query($koneksi, $sql_kategories);
								$no=1; //nilai awal nomer
								while ($data_kategori = mysqli_fetch_array($query_kategories,MYSQLI_BOTH)){

							?>
								<li><a href="http://localhost/index/kategori/') . $kategori->kategori ?>"><?= $data_kategori['kategori'] ?></a></li>
							<?php 
									//auto increment nomer
									$no++;
								}
							?>	
							</ul>
						</div>
						<!--/ End Single Widget -->
						<!-- Shop By Price -->
						<div class="single-widget range">
							<h3 class="title">Berdasarkan Harga</h3>
							<div class="price-filter">
								<div class="price-filter-inner">
									<div id="slider-range"></div>
										<div class="price_slider_amount">
										<div class="label-input">
											<span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price"/>
										</div>
									</div>
								</div>
							</div>

							<ul class="check-box-list">
								<li>
									<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">10K - 100K<span class="count">(3)</span></label>
								</li>
								<li>
									<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">100K - 100K<span class="count">(5)</span></label>
								</li>
								<li>
									<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">1000K - 10000K<span class="count">(8)</span></label>
								</li>
							</ul>
						</div>
						<!--/ End Shop By Price -->
						<!-- Single Widget -->
						<div class="single-widget recent-post">
							<h3 class="title">Product Baru</h3>

							<!-- Single Post -->
							<?php 
								$sql_tampil_barang = "SELECT * FROM barang ORDER BY id_produk DESC LIMIT 3";
								$query_tampil_barang = mysqli_query($koneksi, $sql_tampil_barang);
								$no=1; //nilai awal nomer
								while ($bar_bar = mysqli_fetch_array($query_tampil_barang,MYSQLI_BOTH)){
							?>
							<div class="single-post first">
								<div class="image">
									<img src="https://via.placeholder.com/75x75" alt="#">
								</div>
								<div class="content">
									<h5><a href="<?= $bar_bar['id_produk']; ?>"><?= $bar_bar['nama_barang']; ?></a></h5>
									<p class="price"><?= rupiah($bar_bar['harga_barang']); ?></p>
									<ul class="reviews">
										<li class="yellow"><i class="ti-star"></i></li>
										<li class="yellow"><i class="ti-star"></i></li>
										<li class="yellow"><i class="ti-star"></i></li>
										<li><i class="ti-star"></i></li>
										<li><i class="ti-star"></i></li>
									</ul>
								</div>
							</div>

							<?php
								//auto increment nomer
								$no++;
								}
							?>
						</div>
					</div>
				</div>



				<!-- Content -->
				<div class="col-lg-9 col-md-8 col-12">
					<div class="row">
						<div class="col-12">
							<!-- Shop Top -->
							<div class="shop-top">
								<div class="shop-shorter">
									<div class="single-shorter">
										<label>Show :</label>
										<select>
											<option selected="selected">09</option>
											<option>15</option>
											<option>25</option>
											<option>30</option>
										</select>
									</div>
									<div class="single-shorter">
										<label>Sort By :</label>
										<select>
											<option selected="selected">Name</option>
											<option>Price</option>
											<option>Size</option>
										</select>
									</div>
								</div>
							</div>
							<!--/ End Shop Top -->
						</div>
					</div>
					<div class="row">

						<?php 
						
							//Menampilkan data barang banyak dalam arrray
							$sql_barangs = "SELECT * FROM barang ";
							$query_barangs = mysqli_query($koneksi, $sql_barangs);
							$no=1; //nilai awal nomer
							while ($data_barangs = mysqli_fetch_array($query_barangs, MYSQLI_BOTH)){

						?>

							<div class="col-xl-3 col-lg-4 col-md-4 col-12">
								<div class="single-product">
									<div class="product-img">
										<a href="<?= base_url('welcome/detail/') . $data_barangs['id_produk'] ?>">
											<!-- <img class="default-img" src="https://source.unsplash.com/550x750" alt="#"> -->
											<img class="default-img" src="https://source.unsplash.com/550x750/?<?= $data_barangs['nama_barang'] ?>" alt="#">
											<img class="hover-img" src="https://source.unsplash.com/550x750" alt="#">
										</a>
										<div class="button-head">
											<div class="product-action">
												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
											</div>
											<div class="product-action-2">
												<a title="Add to cart" href="<?= base_url('raja_vapor/cart/add_to_cart/'. $data_barangs['id_produk']) ?>">Add to cart</a>
											</div>
										</div>
									</div>
									<div class="product-content">
										<h3><a href="<?= base_url('welcome/detail/') . $data_barangs['id_produk'] ?>"><?= $data_barangs['nama_barang'] ?></a></h3>
										<div class="product-price">
											<span><?= rupiah($data_barangs['harga_barang']) ?></span>
										</div>
									</div>
								</div>
							</div>
						<?php 
								//auto increment nomer
								$no++;
							}
						?>

					</div>
				</div>

				<!-- Batas Konten Bawah -->
			</div>
		</div>
	</section>
	<!--/ End Product Style 1  -->	


	

	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img src="images/logo2.png" alt="#"></a>
							</div>
							<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
							<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Customer Service</h4>
							<ul>
								<li><a href="#">Payment Methods</a></li>
								<li><a href="#">Money-back</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Tuch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>NO. 342 - London Oxford Street.</li>
									<li>012 United Kingdom.</li>
									<li>info@eshop.com</li>
									<li>+032 3456 7890</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="images/payments.png" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="<?= $url_assets."/eshop/eshop/" ?>js/jquery.min.js"></script>
    <script src="<?= $url_assets."/eshop/eshop/" ?>js/jquery-migrate-3.0.0.js"></script>
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/magnific-popup.js"></script>
	<!-- Waypoints JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/nicesellect.js"></script>
	<!-- Flex Slider JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/easing.js"></script>
	<!-- Active JS -->
	<script src="<?= $url_assets."/eshop/eshop/" ?>js/active.js"></script>
</body>
</html>