

<div class="col-lg-4 col-md-4 col-12">

</div>
	
<div class="col-lg-4 col-md-8 col-12 border">
	<div class="checkout-form mt-4">
		<h2 class="text-center">LOGIN</h2>
		<h5 class="text-center"></h5>
		
		<p class="text-center mb-2">Silahkan Masuk terlebih dahulu !</p>
		<!-- Form -->
		<form class="form" method="POST" action="<?= base_url('ceklogin.php') ?>" enctype="multipart/form-data">
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
						<label><a href="<?= base_url('index.php?halaman=registration') ?>">Belum Punya akun Silahkan Buat akun anda!</a></label>
					</div>
				</div>

			</div>
		</form>
		<!--/ End Form -->
	</div>
</div>

<div class="col-lg-4 col-md-4 col-12">

</div>

<?php
// menghubungkan php dengan koneksi database
include 'koneksi.php';

if (isset($_POST['cekLogin'])) {
    // menangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

	var_dump($_POST);
	
    // menghitung jumlah data yang ditemukan
    $login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($login);
    $data_cek = mysqli_fetch_array($login, MYSQLI_BOTH);


    // cek apakah username dan password di temukan pada database
    if ($cek > 0) {
        // mengaktifkan session pada php
        session_start();

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        $_SESSION['id_user'] = $data_cek['id_user'];
        $_SESSION['nama_lengkap'] = $data_cek['nama_lengkap'];
        $_SESSION['hakakses'] = $data_cek['hakakses'];
        $_SESSION['email'] = $data_cek['email'];
        $_SESSION['status_user'] = $data_cek['status_user'];

        // alihkan ke halaman dashboard admin
        // header("location:index.php");
        // echo 'Berhasil Login';

        if ($data_cek['hakakses'] == 1) {
            header("Location: http://localhost/201753028/vapor/index.php?halaman=beranda");
        } elseif ($data_cek['hakakses'] == 2) {
            header("Location: http://localhost/201753028/vapor/index.php?halaman=beranda");
        } elseif ($data_cek['hakakses'] == 3) {
            header("Location: http://localhost/201753028/vapor/index.php?halaman=beranda");
        } elseif ($data_cek['hakakses'] == 4) {
            header("Location: http://localhost/201753028/vapor/index.php?halaman=beranda");
        }
    } else {
        // header("location:index.php?pesan=gagal");
        echo "<script>alert('Gagal Login')</script>";
        header("location: http://localhost/201753028/?halaman=login");
        // echo 'Gagal Login';
    }
}
?>
	