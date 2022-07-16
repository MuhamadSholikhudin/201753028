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
    <title>Raja Vapor</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?= base_url('assets/eshop/eshop/') ?>images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>css/reset.css">
	<link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>style.css">
    <link rel="stylesheet" href="<?= base_url('assets/eshop/eshop/') ?>css/responsive.css">

	
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<!-- <div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div> -->
	<!-- End Preloader -->
	<?php
		function rupiah($angka)
		{

		$hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
		return $hasil_rupiah;
		}

	?>
		
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

									<?php if ($this->session->userdata('username')) { ?>
										<li><i class="ti-user"></i> <a href="#">My account</a></li>

									<?php } else { ?>
										<li><i class="ti-power-off"></i><a href="<?= base_url('raja_vapor/login') ?>">Login</a></li>

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
								<a href="index.html"><img src="<?= base_url('assets/images/content-management/raja_vapor.jpg') ?>" width="40px" style="" alt="logo"></a>
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
										<?php foreach($kategories as $kategori) : ?>
											<option value="<?= $kategori->kategori ?>"><?= $kategori->kategori ?></option>
										<?php endforeach; ?>	
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

								<?php if ($this->session->userdata('username')) { ?>
									<div class="sinlge-bar">
										<a href="<?= base_url('raja_vapor/login') ?>" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
									</div>

								<?php } else { ?>
									<div class="sinlge-bar">
										<a href="<?= base_url('raja_vapor/login') ?>" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
									</div>
								<?php } ?>
						
								<div class="sinlge-bar shopping">
									<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
									<!-- Shopping Item -->
									<div class="shopping-item">
										<div class="dropdown-cart-header">
											<span>2 Items</span>
											<a href="<?= base_url('raja_vapor/index/cart_view/') ?>">View Cart</a>
										</div>
										<ul class="shopping-list">
											<li>
												<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
												<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
												<h4><a href="#">Woman Ring</a></h4>
												<p class="quantity">1x - <span class="amount">$99.00</span></p>
											</li>
											<li>
												<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
												<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
												<h4><a href="#">Woman Necklace</a></h4>
												<p class="quantity">1x - <span class="amount">$35.00</span></p>
											</li>
										</ul>
										<div class="bottom">
											<div class="total">
												<span>Total</span>
												<span class="total-amount">$134.00</span>
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
													<li class="active"><a href="#">Home</a></li>
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
		<!-- <div class="breadcrumbs">
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
		</div> -->
		<!-- End Breadcrumbs -->
		
		<section class="shop checkout section">
		<div class="container">
			<div class="row"> 
				<div class="col-lg-2 col-12">
				</div>
				<div class="col-lg-8 col-12">
					<div class="checkout-form">
						<h2 class="text-center">Registration</h2>
						<p class="text-center">Silahkan Mengisi form dibawah ini untuk mendaftar akun baru</p>
						<!-- Form -->
						<form class="form" method="post" action="<?= base_url('raja_vapor/login/post_registration') ?>">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Nama Lengkap<span>*</span></label>
										<input type="text" name="nama_lengkap" value="
										
										" placeholder="" required="required">
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Username<span>*</span></label>
										<input type="text" name="username" placeholder="" value="
										
										" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Password<span>*</span></label>
										<input type="password" name="password1" value="" placeholder="Password : MIn 6 Karakter" required="required">
										
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Confirm Password<span>*</span></label>
										<input type="password" name="password2" value="" placeholder="Konfirmasi Password" required="required">
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Email Address<span>*</span></label>
										<input type="email" name="email" value="" placeholder="example@gmail.com" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Phone Number<span>*</span></label>
										<input type="number" name="nomer_hp" value="" placeholder="6283123456" min="0" required="required">
									</div>
								</div>
								<!-- <div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Provinsi<span>*</span></label>
										<select name="country_name" id="country" style="display: none;">
											
											<option value="ZW">Zimbabwe</option>
										</select>
										<div class="nice-select" tabindex="0"><span class="current">United Kingdom</span><ul class="list"><li data-value="AF" class="option">Afghanistan</li><li data-value="AX" class="option">Åland Islands</li><li data-value="AL" class="option">Albania</li><li data-value="DZ" class="option">Algeria</li><li data-value="AS" class="option">American Samoa</li><li data-value="AD" class="option">Andorra</li><li data-value="AO" class="option">Angola</li><li data-value="AI" class="option">Anguilla</li><li data-value="AQ" class="option">Antarctica</li><li data-value="AG" class="option">Antigua and Barbuda</li><li data-value="AR" class="option">Argentina</li><li data-value="AM" class="option">Armenia</li><li data-value="AW" class="option">Aruba</li><li data-value="AU" class="option">Australia</li><li data-value="AT" class="option">Austria</li><li data-value="AZ" class="option">Azerbaijan</li><li data-value="BS" class="option">Bahamas</li><li data-value="BH" class="option">Bahrain</li><li data-value="BD" class="option">Bangladesh</li><li data-value="BB" class="option">Barbados</li><li data-value="BY" class="option">Belarus</li><li data-value="BE" class="option">Belgium</li><li data-value="BZ" class="option">Belize</li><li data-value="BJ" class="option">Benin</li><li data-value="BM" class="option">Bermuda</li><li data-value="BT" class="option">Bhutan</li><li data-value="BO" class="option">Bolivia</li><li data-value="BA" class="option">Bosnia and Herzegovina</li><li data-value="BW" class="option">Botswana</li><li data-value="BV" class="option">Bouvet Island</li><li data-value="BR" class="option">Brazil</li><li data-value="IO" class="option">British Indian Ocean Territory</li><li data-value="VG" class="option">British Virgin Islands</li><li data-value="BN" class="option">Brunei</li><li data-value="BG" class="option">Bulgaria</li><li data-value="BF" class="option">Burkina Faso</li><li data-value="BI" class="option">Burundi</li><li data-value="KH" class="option">Cambodia</li><li data-value="CM" class="option">Cameroon</li><li data-value="CA" class="option">Canada</li><li data-value="CV" class="option">Cape Verde</li><li data-value="KY" class="option">Cayman Islands</li><li data-value="CF" class="option">Central African Republic</li><li data-value="TD" class="option">Chad</li><li data-value="CL" class="option">Chile</li><li data-value="CN" class="option">China</li><li data-value="CX" class="option">Christmas Island</li><li data-value="CC" class="option">Cocos [Keeling] Islands</li><li data-value="CO" class="option">Colombia</li><li data-value="KM" class="option">Comoros</li><li data-value="CG" class="option">Congo - Brazzaville</li><li data-value="CD" class="option">Congo - Kinshasa</li><li data-value="CK" class="option">Cook Islands</li><li data-value="CR" class="option">Costa Rica</li><li data-value="CI" class="option">Côte d’Ivoire</li><li data-value="HR" class="option">Croatia</li><li data-value="CU" class="option">Cuba</li><li data-value="CY" class="option">Cyprus</li><li data-value="CZ" class="option">Czech Republic</li><li data-value="DK" class="option">Denmark</li><li data-value="DJ" class="option">Djibouti</li><li data-value="DM" class="option">Dominica</li><li data-value="DO" class="option">Dominican Republic</li><li data-value="EC" class="option">Ecuador</li><li data-value="EG" class="option">Egypt</li><li data-value="SV" class="option">El Salvador</li><li data-value="GQ" class="option">Equatorial Guinea</li><li data-value="ER" class="option">Eritrea</li><li data-value="EE" class="option">Estonia</li><li data-value="ET" class="option">Ethiopia</li><li data-value="FK" class="option">Falkland Islands</li><li data-value="FO" class="option">Faroe Islands</li><li data-value="FJ" class="option">Fiji</li><li data-value="FI" class="option">Finland</li><li data-value="FR" class="option">France</li><li data-value="GF" class="option">French Guiana</li><li data-value="PF" class="option">French Polynesia</li><li data-value="TF" class="option">French Southern Territories</li><li data-value="GA" class="option">Gabon</li><li data-value="GM" class="option">Gambia</li><li data-value="GE" class="option">Georgia</li><li data-value="DE" class="option">Germany</li><li data-value="GH" class="option">Ghana</li><li data-value="GI" class="option">Gibraltar</li><li data-value="GR" class="option">Greece</li><li data-value="GL" class="option">Greenland</li><li data-value="GD" class="option">Grenada</li><li data-value="GP" class="option">Guadeloupe</li><li data-value="GU" class="option">Guam</li><li data-value="GT" class="option">Guatemala</li><li data-value="GG" class="option">Guernsey</li><li data-value="GN" class="option">Guinea</li><li data-value="GW" class="option">Guinea-Bissau</li><li data-value="GY" class="option">Guyana</li><li data-value="HT" class="option">Haiti</li><li data-value="HM" class="option">Heard Island and McDonald Islands</li><li data-value="HN" class="option">Honduras</li><li data-value="HK" class="option">Hong Kong SAR China</li><li data-value="HU" class="option">Hungary</li><li data-value="IS" class="option">Iceland</li><li data-value="IN" class="option">India</li><li data-value="ID" class="option">Indonesia</li><li data-value="IR" class="option">Iran</li><li data-value="IQ" class="option">Iraq</li><li data-value="IE" class="option">Ireland</li><li data-value="IM" class="option">Isle of Man</li><li data-value="IL" class="option">Israel</li><li data-value="IT" class="option">Italy</li><li data-value="JM" class="option">Jamaica</li><li data-value="JP" class="option">Japan</li><li data-value="JE" class="option">Jersey</li><li data-value="JO" class="option">Jordan</li><li data-value="KZ" class="option">Kazakhstan</li><li data-value="KE" class="option">Kenya</li><li data-value="KI" class="option">Kiribati</li><li data-value="KW" class="option">Kuwait</li><li data-value="KG" class="option">Kyrgyzstan</li><li data-value="LA" class="option">Laos</li><li data-value="LV" class="option">Latvia</li><li data-value="LB" class="option">Lebanon</li><li data-value="LS" class="option">Lesotho</li><li data-value="LR" class="option">Liberia</li><li data-value="LY" class="option">Libya</li><li data-value="LI" class="option">Liechtenstein</li><li data-value="LT" class="option">Lithuania</li><li data-value="LU" class="option">Luxembourg</li><li data-value="MO" class="option">Macau SAR China</li><li data-value="MK" class="option">Macedonia</li><li data-value="MG" class="option">Madagascar</li><li data-value="MW" class="option">Malawi</li><li data-value="MY" class="option">Malaysia</li><li data-value="MV" class="option">Maldives</li><li data-value="ML" class="option">Mali</li><li data-value="MT" class="option">Malta</li><li data-value="MH" class="option">Marshall Islands</li><li data-value="MQ" class="option">Martinique</li><li data-value="MR" class="option">Mauritania</li><li data-value="MU" class="option">Mauritius</li><li data-value="YT" class="option">Mayotte</li><li data-value="MX" class="option">Mexico</li><li data-value="FM" class="option">Micronesia</li><li data-value="MD" class="option">Moldova</li><li data-value="MC" class="option">Monaco</li><li data-value="MN" class="option">Mongolia</li><li data-value="ME" class="option">Montenegro</li><li data-value="MS" class="option">Montserrat</li><li data-value="MA" class="option">Morocco</li><li data-value="MZ" class="option">Mozambique</li><li data-value="MM" class="option">Myanmar [Burma]</li><li data-value="NA" class="option">Namibia</li><li data-value="NR" class="option">Nauru</li><li data-value="NP" class="option">Nepal</li><li data-value="NL" class="option">Netherlands</li><li data-value="AN" class="option">Netherlands Antilles</li><li data-value="NC" class="option">New Caledonia</li><li data-value="NZ" class="option">New Zealand</li><li data-value="NI" class="option">Nicaragua</li><li data-value="NE" class="option">Niger</li><li data-value="NG" class="option">Nigeria</li><li data-value="NU" class="option">Niue</li><li data-value="NF" class="option">Norfolk Island</li><li data-value="MP" class="option">Northern Mariana Islands</li><li data-value="KP" class="option">North Korea</li><li data-value="NO" class="option">Norway</li><li data-value="OM" class="option">Oman</li><li data-value="PK" class="option">Pakistan</li><li data-value="PW" class="option">Palau</li><li data-value="PS" class="option">Palestinian Territories</li><li data-value="PA" class="option">Panama</li><li data-value="PG" class="option">Papua New Guinea</li><li data-value="PY" class="option">Paraguay</li><li data-value="PE" class="option">Peru</li><li data-value="PH" class="option">Philippines</li><li data-value="PN" class="option">Pitcairn Islands</li><li data-value="PL" class="option">Poland</li><li data-value="PT" class="option">Portugal</li><li data-value="PR" class="option">Puerto Rico</li><li data-value="QA" class="option">Qatar</li><li data-value="RE" class="option">Réunion</li><li data-value="RO" class="option">Romania</li><li data-value="RU" class="option">Russia</li><li data-value="RW" class="option">Rwanda</li><li data-value="BL" class="option">Saint Barthélemy</li><li data-value="SH" class="option">Saint Helena</li><li data-value="KN" class="option">Saint Kitts and Nevis</li><li data-value="LC" class="option">Saint Lucia</li><li data-value="MF" class="option">Saint Martin</li><li data-value="PM" class="option">Saint Pierre and Miquelon</li><li data-value="VC" class="option">Saint Vincent and the Grenadines</li><li data-value="WS" class="option">Samoa</li><li data-value="SM" class="option">San Marino</li><li data-value="ST" class="option">São Tomé and Príncipe</li><li data-value="SA" class="option">Saudi Arabia</li><li data-value="SN" class="option">Senegal</li><li data-value="RS" class="option">Serbia</li><li data-value="SC" class="option">Seychelles</li><li data-value="SL" class="option">Sierra Leone</li><li data-value="SG" class="option">Singapore</li><li data-value="SK" class="option">Slovakia</li><li data-value="SI" class="option">Slovenia</li><li data-value="SB" class="option">Solomon Islands</li><li data-value="SO" class="option">Somalia</li><li data-value="ZA" class="option">South Africa</li><li data-value="GS" class="option">South Georgia</li><li data-value="KR" class="option">South Korea</li><li data-value="ES" class="option">Spain</li><li data-value="LK" class="option">Sri Lanka</li><li data-value="SD" class="option">Sudan</li><li data-value="SR" class="option">Suriname</li><li data-value="SJ" class="option">Svalbard and Jan Mayen</li><li data-value="SZ" class="option">Swaziland</li><li data-value="SE" class="option">Sweden</li><li data-value="CH" class="option">Switzerland</li><li data-value="SY" class="option">Syria</li><li data-value="TW" class="option">Taiwan</li><li data-value="TJ" class="option">Tajikistan</li><li data-value="TZ" class="option">Tanzania</li><li data-value="TH" class="option">Thailand</li><li data-value="TL" class="option">Timor-Leste</li><li data-value="TG" class="option">Togo</li><li data-value="TK" class="option">Tokelau</li><li data-value="TO" class="option">Tonga</li><li data-value="TT" class="option">Trinidad and Tobago</li><li data-value="TN" class="option">Tunisia</li><li data-value="TR" class="option">Turkey</li><li data-value="TM" class="option">Turkmenistan</li><li data-value="TC" class="option">Turks and Caicos Islands</li><li data-value="TV" class="option">Tuvalu</li><li data-value="UG" class="option">Uganda</li><li data-value="UA" class="option">Ukraine</li><li data-value="AE" class="option">United Arab Emirates</li><li data-value="US" class="option selected">United Kingdom</li><li data-value="UY" class="option">Uruguay</li><li data-value="UM" class="option">U.S. Minor Outlying Islands</li><li data-value="VI" class="option">U.S. Virgin Islands</li><li data-value="UZ" class="option">Uzbekistan</li><li data-value="VU" class="option">Vanuatu</li><li data-value="VA" class="option">Vatican City</li><li data-value="VE" class="option">Venezuela</li><li data-value="VN" class="option">Vietnam</li><li data-value="WF" class="option">Wallis and Futuna</li><li data-value="EH" class="option">Western Sahara</li><li data-value="YE" class="option">Yemen</li><li data-value="ZM" class="option">Zambia</li><li data-value="ZW" class="option">Zimbabwe</li></ul></div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Kota / Kabupaten<span>*</span></label>
										<select name="state-province" id="state-province" style="display: none;">
											<option value="divition" selected="selected">New Yourk</option>
										</select>
										<div class="nice-select" tabindex="0"><span class="current">New Yourk</span><ul class="list"><li data-value="divition" class="option selected focus">New Yourk</li><li data-value="Los Angeles" class="option">Los Angeles</li><li data-value="Chicago" class="option">Chicago</li><li data-value="Houston" class="option">Houston</li><li data-value="San Diego" class="option">San Diego</li><li data-value="Dallas" class="option">Dallas</li><li data-value="Charlotte" class="option">Charlotte</li></ul></div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Kecamatan<span>*</span></label>
										<select name="country_name" id="country" style="display: none;">
											
											<option value="ZW">Zimbabwe</option>
										</select>
										<div class="nice-select" tabindex="0"><span class="current">United Kingdom</span><ul class="list"><li data-value="AF" class="option">Afghanistan</li><li data-value="AX" class="option">Åland Islands</li><li data-value="AL" class="option">Albania</li><li data-value="DZ" class="option">Algeria</li><li data-value="AS" class="option">American Samoa</li><li data-value="AD" class="option">Andorra</li><li data-value="AO" class="option">Angola</li><li data-value="AI" class="option">Anguilla</li><li data-value="AQ" class="option">Antarctica</li><li data-value="AG" class="option">Antigua and Barbuda</li><li data-value="AR" class="option">Argentina</li><li data-value="AM" class="option">Armenia</li><li data-value="AW" class="option">Aruba</li><li data-value="AU" class="option">Australia</li><li data-value="AT" class="option">Austria</li><li data-value="AZ" class="option">Azerbaijan</li><li data-value="BS" class="option">Bahamas</li><li data-value="BH" class="option">Bahrain</li><li data-value="BD" class="option">Bangladesh</li><li data-value="BB" class="option">Barbados</li><li data-value="BY" class="option">Belarus</li><li data-value="BE" class="option">Belgium</li><li data-value="BZ" class="option">Belize</li><li data-value="BJ" class="option">Benin</li><li data-value="BM" class="option">Bermuda</li><li data-value="BT" class="option">Bhutan</li><li data-value="BO" class="option">Bolivia</li><li data-value="BA" class="option">Bosnia and Herzegovina</li><li data-value="BW" class="option">Botswana</li><li data-value="BV" class="option">Bouvet Island</li><li data-value="BR" class="option">Brazil</li><li data-value="IO" class="option">British Indian Ocean Territory</li><li data-value="VG" class="option">British Virgin Islands</li><li data-value="BN" class="option">Brunei</li><li data-value="BG" class="option">Bulgaria</li><li data-value="BF" class="option">Burkina Faso</li><li data-value="BI" class="option">Burundi</li><li data-value="KH" class="option">Cambodia</li><li data-value="CM" class="option">Cameroon</li><li data-value="CA" class="option">Canada</li><li data-value="CV" class="option">Cape Verde</li><li data-value="KY" class="option">Cayman Islands</li><li data-value="CF" class="option">Central African Republic</li><li data-value="TD" class="option">Chad</li><li data-value="CL" class="option">Chile</li><li data-value="CN" class="option">China</li><li data-value="CX" class="option">Christmas Island</li><li data-value="CC" class="option">Cocos [Keeling] Islands</li><li data-value="CO" class="option">Colombia</li><li data-value="KM" class="option">Comoros</li><li data-value="CG" class="option">Congo - Brazzaville</li><li data-value="CD" class="option">Congo - Kinshasa</li><li data-value="CK" class="option">Cook Islands</li><li data-value="CR" class="option">Costa Rica</li><li data-value="CI" class="option">Côte d’Ivoire</li><li data-value="HR" class="option">Croatia</li><li data-value="CU" class="option">Cuba</li><li data-value="CY" class="option">Cyprus</li><li data-value="CZ" class="option">Czech Republic</li><li data-value="DK" class="option">Denmark</li><li data-value="DJ" class="option">Djibouti</li><li data-value="DM" class="option">Dominica</li><li data-value="DO" class="option">Dominican Republic</li><li data-value="EC" class="option">Ecuador</li><li data-value="EG" class="option">Egypt</li><li data-value="SV" class="option">El Salvador</li><li data-value="GQ" class="option">Equatorial Guinea</li><li data-value="ER" class="option">Eritrea</li><li data-value="EE" class="option">Estonia</li><li data-value="ET" class="option">Ethiopia</li><li data-value="FK" class="option">Falkland Islands</li><li data-value="FO" class="option">Faroe Islands</li><li data-value="FJ" class="option">Fiji</li><li data-value="FI" class="option">Finland</li><li data-value="FR" class="option">France</li><li data-value="GF" class="option">French Guiana</li><li data-value="PF" class="option">French Polynesia</li><li data-value="TF" class="option">French Southern Territories</li><li data-value="GA" class="option">Gabon</li><li data-value="GM" class="option">Gambia</li><li data-value="GE" class="option">Georgia</li><li data-value="DE" class="option">Germany</li><li data-value="GH" class="option">Ghana</li><li data-value="GI" class="option">Gibraltar</li><li data-value="GR" class="option">Greece</li><li data-value="GL" class="option">Greenland</li><li data-value="GD" class="option">Grenada</li><li data-value="GP" class="option">Guadeloupe</li><li data-value="GU" class="option">Guam</li><li data-value="GT" class="option">Guatemala</li><li data-value="GG" class="option">Guernsey</li><li data-value="GN" class="option">Guinea</li><li data-value="GW" class="option">Guinea-Bissau</li><li data-value="GY" class="option">Guyana</li><li data-value="HT" class="option">Haiti</li><li data-value="HM" class="option">Heard Island and McDonald Islands</li><li data-value="HN" class="option">Honduras</li><li data-value="HK" class="option">Hong Kong SAR China</li><li data-value="HU" class="option">Hungary</li><li data-value="IS" class="option">Iceland</li><li data-value="IN" class="option">India</li><li data-value="ID" class="option">Indonesia</li><li data-value="IR" class="option">Iran</li><li data-value="IQ" class="option">Iraq</li><li data-value="IE" class="option">Ireland</li><li data-value="IM" class="option">Isle of Man</li><li data-value="IL" class="option">Israel</li><li data-value="IT" class="option">Italy</li><li data-value="JM" class="option">Jamaica</li><li data-value="JP" class="option">Japan</li><li data-value="JE" class="option">Jersey</li><li data-value="JO" class="option">Jordan</li><li data-value="KZ" class="option">Kazakhstan</li><li data-value="KE" class="option">Kenya</li><li data-value="KI" class="option">Kiribati</li><li data-value="KW" class="option">Kuwait</li><li data-value="KG" class="option">Kyrgyzstan</li><li data-value="LA" class="option">Laos</li><li data-value="LV" class="option">Latvia</li><li data-value="LB" class="option">Lebanon</li><li data-value="LS" class="option">Lesotho</li><li data-value="LR" class="option">Liberia</li><li data-value="LY" class="option">Libya</li><li data-value="LI" class="option">Liechtenstein</li><li data-value="LT" class="option">Lithuania</li><li data-value="LU" class="option">Luxembourg</li><li data-value="MO" class="option">Macau SAR China</li><li data-value="MK" class="option">Macedonia</li><li data-value="MG" class="option">Madagascar</li><li data-value="MW" class="option">Malawi</li><li data-value="MY" class="option">Malaysia</li><li data-value="MV" class="option">Maldives</li><li data-value="ML" class="option">Mali</li><li data-value="MT" class="option">Malta</li><li data-value="MH" class="option">Marshall Islands</li><li data-value="MQ" class="option">Martinique</li><li data-value="MR" class="option">Mauritania</li><li data-value="MU" class="option">Mauritius</li><li data-value="YT" class="option">Mayotte</li><li data-value="MX" class="option">Mexico</li><li data-value="FM" class="option">Micronesia</li><li data-value="MD" class="option">Moldova</li><li data-value="MC" class="option">Monaco</li><li data-value="MN" class="option">Mongolia</li><li data-value="ME" class="option">Montenegro</li><li data-value="MS" class="option">Montserrat</li><li data-value="MA" class="option">Morocco</li><li data-value="MZ" class="option">Mozambique</li><li data-value="MM" class="option">Myanmar [Burma]</li><li data-value="NA" class="option">Namibia</li><li data-value="NR" class="option">Nauru</li><li data-value="NP" class="option">Nepal</li><li data-value="NL" class="option">Netherlands</li><li data-value="AN" class="option">Netherlands Antilles</li><li data-value="NC" class="option">New Caledonia</li><li data-value="NZ" class="option">New Zealand</li><li data-value="NI" class="option">Nicaragua</li><li data-value="NE" class="option">Niger</li><li data-value="NG" class="option">Nigeria</li><li data-value="NU" class="option">Niue</li><li data-value="NF" class="option">Norfolk Island</li><li data-value="MP" class="option">Northern Mariana Islands</li><li data-value="KP" class="option">North Korea</li><li data-value="NO" class="option">Norway</li><li data-value="OM" class="option">Oman</li><li data-value="PK" class="option">Pakistan</li><li data-value="PW" class="option">Palau</li><li data-value="PS" class="option">Palestinian Territories</li><li data-value="PA" class="option">Panama</li><li data-value="PG" class="option">Papua New Guinea</li><li data-value="PY" class="option">Paraguay</li><li data-value="PE" class="option">Peru</li><li data-value="PH" class="option">Philippines</li><li data-value="PN" class="option">Pitcairn Islands</li><li data-value="PL" class="option">Poland</li><li data-value="PT" class="option">Portugal</li><li data-value="PR" class="option">Puerto Rico</li><li data-value="QA" class="option">Qatar</li><li data-value="RE" class="option">Réunion</li><li data-value="RO" class="option">Romania</li><li data-value="RU" class="option">Russia</li><li data-value="RW" class="option">Rwanda</li><li data-value="BL" class="option">Saint Barthélemy</li><li data-value="SH" class="option">Saint Helena</li><li data-value="KN" class="option">Saint Kitts and Nevis</li><li data-value="LC" class="option">Saint Lucia</li><li data-value="MF" class="option">Saint Martin</li><li data-value="PM" class="option">Saint Pierre and Miquelon</li><li data-value="VC" class="option">Saint Vincent and the Grenadines</li><li data-value="WS" class="option">Samoa</li><li data-value="SM" class="option">San Marino</li><li data-value="ST" class="option">São Tomé and Príncipe</li><li data-value="SA" class="option">Saudi Arabia</li><li data-value="SN" class="option">Senegal</li><li data-value="RS" class="option">Serbia</li><li data-value="SC" class="option">Seychelles</li><li data-value="SL" class="option">Sierra Leone</li><li data-value="SG" class="option">Singapore</li><li data-value="SK" class="option">Slovakia</li><li data-value="SI" class="option">Slovenia</li><li data-value="SB" class="option">Solomon Islands</li><li data-value="SO" class="option">Somalia</li><li data-value="ZA" class="option">South Africa</li><li data-value="GS" class="option">South Georgia</li><li data-value="KR" class="option">South Korea</li><li data-value="ES" class="option">Spain</li><li data-value="LK" class="option">Sri Lanka</li><li data-value="SD" class="option">Sudan</li><li data-value="SR" class="option">Suriname</li><li data-value="SJ" class="option">Svalbard and Jan Mayen</li><li data-value="SZ" class="option">Swaziland</li><li data-value="SE" class="option">Sweden</li><li data-value="CH" class="option">Switzerland</li><li data-value="SY" class="option">Syria</li><li data-value="TW" class="option">Taiwan</li><li data-value="TJ" class="option">Tajikistan</li><li data-value="TZ" class="option">Tanzania</li><li data-value="TH" class="option">Thailand</li><li data-value="TL" class="option">Timor-Leste</li><li data-value="TG" class="option">Togo</li><li data-value="TK" class="option">Tokelau</li><li data-value="TO" class="option">Tonga</li><li data-value="TT" class="option">Trinidad and Tobago</li><li data-value="TN" class="option">Tunisia</li><li data-value="TR" class="option">Turkey</li><li data-value="TM" class="option">Turkmenistan</li><li data-value="TC" class="option">Turks and Caicos Islands</li><li data-value="TV" class="option">Tuvalu</li><li data-value="UG" class="option">Uganda</li><li data-value="UA" class="option">Ukraine</li><li data-value="AE" class="option">United Arab Emirates</li><li data-value="US" class="option selected">United Kingdom</li><li data-value="UY" class="option">Uruguay</li><li data-value="UM" class="option">U.S. Minor Outlying Islands</li><li data-value="VI" class="option">U.S. Virgin Islands</li><li data-value="UZ" class="option">Uzbekistan</li><li data-value="VU" class="option">Vanuatu</li><li data-value="VA" class="option">Vatican City</li><li data-value="VE" class="option">Venezuela</li><li data-value="VN" class="option">Vietnam</li><li data-value="WF" class="option">Wallis and Futuna</li><li data-value="EH" class="option">Western Sahara</li><li data-value="YE" class="option">Yemen</li><li data-value="ZM" class="option">Zambia</li><li data-value="ZW" class="option">Zimbabwe</li></ul></div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Postal Code<span>*</span></label>
										<input type="text" name="post" placeholder="" required="required">
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Alamat Lengkap<span>*</span></label>
										<input type="text" name="address" placeholder="" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Nama Jalan<span>*</span></label>
										<input type="text" name="address" placeholder="" required="required">
									</div>
								</div> -->

								<!-- <div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Postal Code<span>*</span></label>
										<input type="text" name="post" placeholder="" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Company<span>*</span></label>
										<select name="company_name" id="company" style="display: none;">
											<option value="company" selected="selected">Microsoft</option>
											<option>Apple</option>
											<option>Xaiomi</option>
											<option>Huawer</option>
											<option>Wpthemesgrid</option>
											<option>Samsung</option>
											<option>Motorola</option>
										</select><div class="nice-select" tabindex="0"><span class="current">Microsoft</span><ul class="list"><li data-value="company" class="option selected focus">Microsoft</li><li data-value="Apple" class="option">Apple</li><li data-value="Xaiomi" class="option">Xaiomi</li><li data-value="Huawer" class="option">Huawer</li><li data-value="Wpthemesgrid" class="option">Wpthemesgrid</li><li data-value="Samsung" class="option">Samsung</li><li data-value="Motorola" class="option">Motorola</li></ul></div>
									</div>
								</div> -->
							
							</div>
						
						<!--/ End Form -->
					</div>
					<div class="single-widget get-button mt-2">
						<div class="content">
							<div class="button">
								<button type="submit" class="btn">Daftar</button>
							</div>
						</div>
					</div>
					<div class="col-12 text-center">
						<div class="form-group create-account">
							<label><a href="<?= base_url('raja_vapor/login/registration') ?>">Sudah Punya akun Silahkan Login akun anda!</a></label>
						</div>
					</div>
					</form>
				</div>

				<div class="col-lg-2 col-12">
				</div>

		

			</div>
		</div>
	</section>


		
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
    <script src="<?= base_url('assets/eshop/eshop/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/eshop/eshop/') ?>js/jquery-migrate-3.0.0.js"></script>
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/magnific-popup.js"></script>
	<!-- Waypoints JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/nicesellect.js"></script>
	<!-- Flex Slider JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/easing.js"></script>
	<!-- Active JS -->
	<script src="<?= base_url('assets/eshop/eshop/') ?>js/active.js"></script>
</body>
</html>