
<div class="col-lg-4 col-md-4 col-12">

</div>
	
<div class="col-lg-4 col-md-8 col-12 border">
	<div class="checkout-form mt-4">
		<h2 class="text-center">LOGIN</h2>
		<h5 class="text-center"></h5>
		
		<p class="text-center mb-2">Silahkan Masuk terlebih dahulu !</p>
		<!-- Form -->
		<form class="form" method="post" action="<?= base_url('/ceklogin.php') ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-12 mb-3">
					<div class="row">
						<div class="col-lg-4">
							<label>Username<span>*</span></label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="username" value="" placeholder="Username" required="required">
						</div>
					</div>
				</div>
				<div class="col-lg-12 mb-3">
					<div class="row">
						<div class="col-lg-4">
							<label>Password<span>*</span></label>
						</div>
						<div class="col-lg-8">
							<input type="password" class="form-control" name="password" placeholder="Password" required="required">
						</div>
					</div>
				</div>
				<div class="col-lg-12 mb-4">
					<div class="row">
						<div class="col-lg-4">

						</div>
						<div class="col-lg-8">
							<div class="button5">
								<button type="submit" name="cekLogin" class="btn">LOGIN</button>
							</div>

						</div>
					</div>
					
				</div>
				<div class="col-12">
					<div class="form-group create-account text-center">
						<label><a href="<?= base_url('/registration.php') ?>">Belum Punya akun Silahkan Buat akun anda!</a></label>
					</div>
				</div>

			</div>
		</form>
		<!--/ End Form -->
	</div>
</div>

<div class="col-lg-4 col-md-4 col-12">

</div>
	