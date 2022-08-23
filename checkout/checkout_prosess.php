<?php
if (isset($_GET['id_checkout'])) {
	$checkout = querysatudata("SELECT * FROM checkout WHERE id_checkout =" . $_GET['id_checkout'] . " ");
}
?>
<!-- Start Checkout -->
<section class="shop checkout section">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-12">
				<div class="order-details">
					<!-- Order Widget -->
					<div class="single-widget">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						PRODUK YANG DI BELI
						<div class="content">
							<ul>
								<li class="last">
									<!-- <table class="table shopping-summery "> -->
									<table class="table ">
										<thead>
											<tr class="main-hading">
												<th>PRODUCT</th>
												<th>NAMA</th>
												<th class="text-center">TOTAL</th>
											</tr>
										</thead>
										<tbody>
											<?php
											// Jika Sudah Login
											if (isset($_SESSION['id_user'])) {
												$no = 1; //nilai awal nomer
												$dataset = array();

												$explode_id_keranjang = explode(",", $checkout['id_keranjang']);

												foreach ($explode_id_keranjang as $id_keranjang) {
													$keranjang = querysatudata("SELECT * FROM keranjang LEFT JOIN produk ON keranjang.id_produk = keranjang.id_produk WHERE id_keranjang =" . $id_keranjang . " ");
												?>
													<tr>
														<td><img src="<?=base_url('gambar/produk/')  ?><?= $keranjang['gambar'] ?>" alt="<?= $keranjang['nama_produk'] ?>"></td>
														<td class="product-des" data-title="Description">
															<p class="product-name"><a href="#"><?= $keranjang['nama_produk'] ?></a></p>
															<p class="product-des"></p>
														</td>
														<td class="total-amount" data-title="Total"><span><?= rupiah($keranjang['harga_keranjang']) ?></span></td>
													</tr>
											<?php }
												$dataset[] = $checkout['id_keranjang'];
											}
											?>

										</tbody>
									</table>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12 ">
					<form action="<?= base_url('pembayaran/aksi.php') ?>" method="POST">
					<div class="order-details">
						<!-- Order Widget -->
						<div class="single-widget">
							 <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INFORMASI PENGIRIMAN</h2>
								<div class="content">
									<ul>
										<li class="last">
											<div class="content">
												<div class="row">
													<div class="col-lg-12 col-md-6 col-12">
														<div class="form-group">
															<label>Nama Penerima
																<span>*</span>
															</label>
															<br>
															<input type="text" name="nama_penerima" placeholder="" required="required" style="width:100%;">
														</div>
													</div>
													<div class="col-lg-12 col-md-6 col-12">
														<div class="form-group">
															<label>Nomer Telpon / HP
																<span>*</span>
															</label>
															<br>
															<input type="number" name="nomor_penerima" placeholder="" required="required" style="width:100%;">
														</div>
													</div>
													<div class="col-lg-12 col-md-6 col-12">
														<div class="form-group">
															<label for="provinc">Provinsi
																<span>*</span>
															</label> <br>
															<!-- <select name="provinsi" id="provinc" style="width:100%; height:35px;">
																<option value="jawa tengah">Jawa Tengah</option>
															</select> -->
															<input type="text" name="provinsi" placeholder="" required="required" style="width:100%;">
														</div>
													</div>
													<div class="col-lg-12 col-md-6 col-12">
														<div class="form-group">
															<label for="country">Kota / Kabupaten
																<span>*</span>
															</label>
															<!-- <select name="kota" id="country" style="width:100%; height:35px;">
																<option value="Kudus">Kudus</option>
																<option value="Pati">Pati</option>
																<option value="Jepara">Jepara</option>
															</select> -->

															<input type="text" name="kota" placeholder="" required="required" style="width:100%;">
														</div>
													</div>
													<div class="col-lg-12 col-md-6 col-12">
														<div class="form-group">
															<label for="distric">Kecamatan
																<span>*</span>
															</label>
															<input type="text" name="kecamatan" placeholder="" required="required" style="width:100%;">

															<!-- <select name="kecamatan" id="distric" style="width:100%; height:35px;">
																<option value="Kudus Kota">Kudus Kota</option>
																<option value="Pati Kota">Pati Kota</option>
																<option value="Jepara Kota">Jepara Kota</option>
															</select> -->
														</div>
													</div>
													<div class="col-lg-12 col-md-6 col-12">
														<div class="form-group">
															<label>Kode Post
																<span>*</span>
															</label>
															<br>
															<input type="text" name="kode_pos" placeholder="" required="required" style="width:100%;">
														</div>
													</div>

													<div class="col-lg-12 col-md-6 col-12">
														<div class="form-group">
															<label>Alamat Jalan
																<span>*</span>
															</label>
															<textarea name="alamat_jalan" placeholder="Contoh : Jl. Ahmad Yani 12 BLOK B" required="required"></textarea>
														</div>
													</div>
													<div class="col-lg-12 col-md-6 col-12">
														<div class="form-group">
															<label>Alamat Lengkap
																<span>*</span>
															</label>
															<textarea name="alamat_lengkap" rows="5" placeholder="Contoh : Rumah bapak Johan, RT.2/RW 56 Mlati Mejobo Kudus Jawa Tengah" required="required">Rumah bapak Johan, RT.2/RW 56 Mlati Mejobo Kudus Jawa Tengah</textarea>
														</div>
													</div>

												</div>
											</div>
										</li>
									</ul>
								</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-12">
					<div class="order-details">
						<!-- Order Widget -->
						<div class="single-widget">
							<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CART TOTALS</h2>
							<div class="content">

								<ul>
									
									<li class="last">Total
										<span>
											<?php
											// Jika Sudah Login
											if (isset($_SESSION['id_user'])) {

												// Membuat variabel id-user sebagai pembeli
												$id_user = $_SESSION['id_user'];

												// Tampilkan harga_keranjang dari tabel keranjang yang pembelinya = id_user dan statusnya belum di bayar
												$data_total_produk = querysatudata("SELECT SUM(jumlah_checkout) as total FROM checkout WHERE id_user = " . $id_user . " AND id_checkout =" . $_GET['id_checkout'] . "");

												// Output total
												echo rupiah($data_total_produk['total']);
											} else {
												echo rupiah(0);
											}
											?>
										</span>
									</li>
								</ul>
							</div>
						</div>
						<!--/ End Order Widget -->
						<!-- Order Widget -->
						<div class="single-widget">
							<h2>Payments</h2>
							<div class="content">

								<ul>
									<?php
									$no = 1; //nilai awal nomer

									// Menampilkan data bank
									$banks = querybanyak("SELECT * FROM bank");
									foreach ($banks as $bank) {
									?>
										<li>
											<img src="<?= base_url('gambar/bank/') ?><?= $bank['gambar_logo'] ?>" alt="#" style="width:40px; height:40px;">
											<!-- <img src="<?= base_url('gambar/bank/') ?><?= $bank['gambar_logo'] ?>" alt="" sizes="10" srcset=""> -->
											&nbsp;&nbsp;&nbsp;&nbsp;
											<input name="id_bank" id="<?= $bank['id_bank'] ?>" value="<?= $bank['id_bank'] ?>" type="radio" required>
											<?= $bank['nama_bank'] ?>
										</li>
									<?php
										//auto increment nomer
										$no++;
									} ?>
								</ul>
							</div>
						</div>

						<div class="single-widget get-button">
							<div class="content">
								<div class="button">
								<?php
								// // Mengambil data cart menjadi satu value
								// foreach($keranjangs as $keranjang) {
								// 	//menampung cart dalam elemem
								// 	$elements[] = $keranjang->id_keranjang;
								// }

								// // Menyatukan cart dengan pemisah koma ( ,)
								// $implode_keranjang = implode(',', $elements);
								?>

								<!-- Menampung hasil implode ke input html -->
								<input type="text" class="d-none" name="implode_id_keranjang" value="<?= $checkout['id_keranjang'] ?>" id="">

								<!-- Menampung id_checkout sebagai orang yang membeli checkout -->
								<input type="number" class="d-none" name="id_checkout" value="<?= $_GET['id_checkout'] ?>" id="">

								<!-- Menampung id_user sebagai orang yang membeli produk -->
								<input type="number" class="d-none" name="id_user" value="<?= $_SESSION['id_user'] ?>" id="">

								<!-- Menampung total checkout atau total pembayaran sebagai orang yang membeli produk -->
								<input type="number" class="d-none" name="total_pembayaran" value="<?= $checkout['jumlah_checkout'] ?>" id="">

									<button type="submit" name="btnPROSESPEMBAYARAN" class="btn">Proses Pembayaran</button>
								</div>
							</div>
						</div>

						<!--/ End Button Widget -->
					</div>
				</form>
				</div>
		</div>
	</div>

	<!--/ End Checkout -->
	<div style="height:50px;">
	</div>