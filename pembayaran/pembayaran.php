
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

