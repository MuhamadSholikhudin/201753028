
<div class="col-lg-9 col-md-8 col-12">
	<div class="card bg-light mb-3 mt-2" style="max-width: 50rem;">
		<div class="card-header" style="background-color: #F7941D; color:#fff;">FORM EDIT PROFILE <?= $_SESSION['username'] ?></div>

		<div class="card-body bg-white">
			<?php
			//Membuat varialbel username dari session login username 
			$username = $_SESSION['username'];

			//Mencari data profile dari tabel user
			// $profile = $this->db->query("SELECT * FROM user WHERE username = '$username' ")->row();
			$profile = querysatudata("SELECT * FROM user WHERE username = '$username'  ");
			?>
			<form class="form" action="<?= base_url('shop/user/aksi.php') ?>" method="POST" entype="multipart/form-data">
				<div class="row">
					<div class="col-lg-3">
						New Password
					</div>
					<div class="col-lg-9">
						<div class="form-group">
							<input type="password" class="form-control" name="password1" value="" placeholder="Password Baru" required="required">
							<input type="hidden" class="form-control" name="id_user" value="<?= $profile['id_user'] ?>" placeholder="Nama Lengkap" required="required">
						</div>
					</div>
					<div class="col-lg-3">
						Confirm Password
					</div>
					<div class="col-lg-9">
						<div class="form-group">
							<input type="password" class="form-control" name="password2" value="" placeholder="Ulangi Password Baru" required="required">
						</div>
					</div>
					<div class="col-lg-3">

					</div>
					<div class="col-lg-9">
						<button type="submit" name="btnUBAHPASSWORD"><span class="badge badge-primary">Ubah PAssword</span></button>
					</div>

				</div>
			</form>
		</div>
	</div>










</div>
</div>
</div>

<section class="shop-newsletter section">

</section>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
			</div>
			<div class="modal-body">
				<div class="row no-gutters">
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<!-- Product Slider -->
						<div class="product-gallery">
							<div class="quickview-slider-active">
								<div class="single-slider">
									<img src="https://via.placeholder.com/569x528" alt="#">
								</div>
								<div class="single-slider">
									<img src="https://via.placeholder.com/569x528" alt="#">
								</div>
								<div class="single-slider">
									<img src="https://via.placeholder.com/569x528" alt="#">
								</div>
								<div class="single-slider">
									<img src="https://via.placeholder.com/569x528" alt="#">
								</div>
							</div>
						</div>
						<!-- End Product slider -->
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="quickview-content">
							<h2>Flared Shift Dress</h2>
							<div class="quickview-ratting-review">
								<div class="quickview-ratting-wrap">
									<div class="quickview-ratting">
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="#"> (1 customer review)</a>
								</div>
								<div class="quickview-stock">
									<span><i class="fa fa-check-circle-o"></i> in stock</span>
								</div>
							</div>
							<h3>$29.00</h3>
							<div class="quickview-peragraph">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
							</div>
							<div class="size">
								<div class="row">
									<div class="col-lg-6 col-12">
										<h5 class="title">Size</h5>
										<select>
											<option selected="selected">s</option>
											<option>m</option>
											<option>l</option>
											<option>xl</option>
										</select>
									</div>
									<div class="col-lg-6 col-12">
										<h5 class="title">Color</h5>
										<select>
											<option selected="selected">orange</option>
											<option>purple</option>
											<option>black</option>
											<option>pink</option>
										</select>
									</div>
								</div>
							</div>
							<div class="quantity">
								<!-- Input Order -->
								<div class="input-group">
									<div class="button minus">
										<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
											<i class="ti-minus"></i>
										</button>
									</div>
									<input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="1">
									<div class="button plus">
										<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
											<i class="ti-plus"></i>
										</button>
									</div>
								</div>
								<!--/ End Input Order -->
							</div>
							<div class="add-to-cart">
								<a href="#" class="btn">Add to cart</a>
								<a href="#" class="btn min"><i class="ti-heart"></i></a>
								<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
							</div>
							<div class="default-social">
								<h4 class="share-now">Share:</h4>
								<ul>
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
									<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal end -->