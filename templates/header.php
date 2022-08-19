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
	<title>RAJA VAPOR</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- StyleSheet -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>css/magnific-popup.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>css/themify-icons.css">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>css/niceselect.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>css/animate.css">
	<!-- Flex Slider CSS -->
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>css/flex-slider.min.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>css/owl-carousel.css">
	<!-- Slicknav -->
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>css/slicknav.min.css">

	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>css/reset.css">
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>style.css">
	<link rel="stylesheet" href="<?= $url_assets . "eshop/eshop/" ?>css/responsive.css">

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
								<li><i class="ti-headphone-alt"></i> 0812 3667 8888</li>
								<li><i class="ti-email"></i> rajavapor@gmail.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">

								<?php if (isset($_SESSION['id_user'])) { ?>
									<li>
										<i class="ti-user"></i>
										<a href="#">My account <?= $_SESSION['username']; ?> </a>
									</li>
									<li><i class="ti-power-off"></i><a href="<?= base_url('logout.php') ?>">Logout</a></li>
								<?php } else { ?>
									<li>
										<i class="ti-power-off"></i>
										<a href="<?= base_url('?halaman=login') ?>">Login</a>
									</li>
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

							<a href="/201753028/"><img src="<?= $url_assets . "eshop/eshop/" ?>images/rajavapor.png" width="60px" style="" alt="logo"></a>

							<a href="/201753028/"><img src="<?= $url_assets . "eshop/eshop/" ?>images/rajavapor.jpg" width="50px" style="" alt="logo"></a>

						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form action="<?= base_url('search.php') ?>" method="POST"  class="search-form">
									<input type="text" placeholder="Cari Produk disini..." name="search">
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
								<select class="form">
									<option selected="selected">All Category</option>
									<?php
									$sql_kategori = "SELECT * FROM kategori";
									$query_tampil_kategori = mysqli_query($koneksi, $sql_kategori);
									$no = 1; //nilai awal nomer
									while ($kategori = mysqli_fetch_array($query_tampil_kategori, MYSQLI_BOTH)) {
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

								<form action="<?= base_url('search.php') ?>" method="GET">
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
									<a href="http://localhost/201753028/shop/user/index.php" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
								</div>

							<?php } else { ?>
								<div class="sinlge-bar">
									<a href="<?= base_url('?halaman=login') ?>" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>								
								</div>							
								
							<?php } ?>

							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i>
									<?php
									// Jika Sudah Login
									if (isset($_SESSION['id_user'])) {
										$id_user = $_SESSION['id_user'];
										// Mencari jumlah keranjang yang amasih aktif
										// $num_keranjang = $this->db->query("SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1")->num_rows();
										$cek_keranjang = mysqli_query($koneksi, "SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1");
										$jumlah_keranjang = mysqli_num_rows($cek_keranjang);

										// JIka ada keranjang aktif 
										if ($jumlah_keranjang > 0) { ?>
											<span class="total-count">
												<?= $jumlah_keranjang ?>
											</span>
									<?php
											// Jika tidak ada keranjang aktif
										} else {
										}
									} else {
									}
									?>

								</a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span>
											<?php
											// Mencari jumlah items keranjang yang masih aktif										
											if (isset($_SESSION['id_user'])) { ?>
												<?= $jumlah_keranjang ?>
											<?php } else {
												echo 0;
											} ?>
											Items</span>
										<?php
										// Jika Sudah Login
										if (isset($_SESSION['id_user'])) { ?>
											<a href="<?= base_url('cart/index.php') ?>">View Cart</a>
										<?php } ?>
									</div>
									<ul class="shopping-list">
										<?php
										// Jika Sudah Login
										if (isset($_SESSION['id_user'])) {
											// SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1 
											$sql_keranjang_user = "SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1 ";
											$query_keranjang_user = mysqli_query($koneksi, $sql_keranjang_user);
											$no = 1; //nilai awal nomer
											while ($keranjang_user = mysqli_fetch_array($query_keranjang_user, MYSQLI_BOTH)) {
										?>

												<li>
													<a href="<?= base_url('cart/remove_on.php?id=') ?><?= $keranjang_user['id_keranjang'] ?>" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
													<a class="cart-img" href="#"><img src="<?= base_url('uploads/produk/') ?>61.png" alt="#"></a>
													<h4><a href="#">
															<?php
															$keranjang_user_id_produk = $keranjang_user['id_produk'];
															$sql_produk_keranjang = "SELECT * FROM produk WHERE id_produk = $keranjang_user_id_produk";
															$query_produk_keranjang = mysqli_query($koneksi, $sql_produk_keranjang);

															$data_produk_keranjang = mysqli_fetch_array($query_produk_keranjang, MYSQLI_BOTH);

															echo $data_produk_keranjang['nama_produk'];
															?>
														</a></h4>
													<p class="quantity"><?= $keranjang_user['jumlah_keranjang']; ?>x
														<?= $data_produk_keranjang['harga_produk']; ?> <span class="amount"><?= rupiah($keranjang_user['harga_keranjang']) ?></span></p>
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
												if (isset($_SESSION['id_user'])) {

													$sql_total_produk = "SELECT SUM(harga_keranjang) as total FROM keranjang WHERE id_user = $id_user AND status_keranjang = 1";
													$query_total_produk = mysqli_query($koneksi, $sql_total_produk);
													$data_total_produk = mysqli_fetch_array($query_total_produk, MYSQLI_BOTH);
													
													echo rupiah($data_total_produk['total']);
												} else {
													echo 0;
												} ?>
											</span>
										</div>
										<!-- <a href="checkout.html" class="btn animate">Checkout</a> -->
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
												<li class="active"><a href="<?= base_url('') ?>">Home</a></li>
												<li><a href="<?= base_url('') ?>">Product</a></li>
												<!-- <li><a href="#">Service</a></li>
												<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
													<ul class="dropdown">
														<li><a href="shop-grid.html">Shop Grid</a></li>
														<li><a href="cart.html">Cart</a></li>
														<li><a href="checkout.html">Checkout</a></li>
													</ul>
												</li> -->
												<!-- <li><a href="#">Pages</a></li>
												<li><a href="#">Blog<i class="ti-angle-down"></i></a>
													<ul class="dropdown">
														<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
													</ul>
												</li> -->
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