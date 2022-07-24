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
					<form class="form" method="post" action="<?= base_url('postregistration.php') ?>">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Nama Lengkap<span>*</span></label>
									<input type="text" name="nama_lengkap" placeholder="" required="required">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Username<span>*</span></label>
									<input type="text" name="username" placeholder="" required="required">
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
							<!-- 

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



						</div>

						<!--/ End Form -->
				</div>

				<div class="content text-center">
					<div class="button">
						<button type="submit" name="btnREGISTRATION" class="btn" style="width:100%;">Daftar</button>
					</div>
				</div>

				<div class="col-12 text-center mt-2">
					<div class="form-group create-account">
						<label><a href="<?= base_url('index.php?halaman=login') ?>">Sudah Punya akun Silahkan Login akun anda!</a></label>
					</div>
				</div>
				</form>
			</div>

			<div class="col-lg-2 col-12">
			</div>




		</div>
	</div>
</section>