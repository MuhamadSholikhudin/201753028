<div class="shopping-cart section">
	<div class="container">
		<div class="row">
			<div class="col-12 ">

				<!-- Shopping Summery -->
				<table class="table shopping-summery">
					<thead>
						<tr class="main-hading">
							<th>PRODUCT</th>
							<th>Nama Produk</th>
							<th class="text-center">Harga</th>
							<th class="text-center">Qty</th>
							<th class="text-center">TOTAL</th>
							<th class="text-center"><i class="ti-trash remove-icon"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php
						// Jika Sudah Login
						if (isset($_SESSION['id_user'])) {

							// // SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1 
							// $sql_keranjang_user = "SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1 ";
							// $query_keranjang_user = mysqli_query($koneksi, $sql_keranjang_user);
							// while ($keranjang_user = mysqli_fetch_array($query_keranjang_user,MYSQLI_BOTH)){


							// // SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1 
							$no = 1; //nilai awal nomer
							$dataset = array();

							$keranjang = querybanyak("SELECT * FROM keranjang where id_user =" . $_SESSION['id_user'] . " and status_keranjang = 1");
							foreach ($keranjang as $keranjang_user) {
						?>

								<?php
								$keranjang_user_id_produk = $keranjang_user['id_produk'];
								// $sql_produk_keranjang= "SELECT * FROM produk WHERE id_produk = $keranjang_user_id_produk";
								// $query_produk_keranjang = mysqli_query($koneksi, $sql_produk_keranjang);
								// $data_produk_keranjang = mysqli_fetch_array($query_produk_keranjang, MYSQLI_BOTH);

								$data_produk_keranjang = querysatudata("SELECT * FROM produk WHERE id_produk =" . $keranjang_user_id_produk . " ");

								$dataset[] = $keranjang_user['id_keranjang'];
								?>

								<?php
								// $tproduk = $this->db->query("SELECT * FROM produk WHERE id_produk = $keranjang->id_produk ")->row();
								?>
								<tr>
									<td><img src="https://source.unsplash.com/100x100/?<?= $data_produk_keranjang['nama_produk'] ?>" alt="#"></td>
									<td class="product-des" data-title="Description">
										<p class="product-name"><a href="#"><?= $data_produk_keranjang['nama_produk'] ?></a></p>
										<p class="product-des"></p>
									</td>
									<td class="price" data-title="Price"><span id="harga<?= $keranjang_user['id_keranjang'] ?>"><?= rupiah($data_produk_keranjang['harga_produk']) ?> </span></td>
									<td class="qty" data-title="Qty">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[<?= $keranjang_user['id_keranjang'] ?>]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="number" name="quant[<?= $keranjang_user['id_keranjang'] ?>]" class="input-number banyak" data-id="<?= $keranjang_user['id_keranjang'] ?>" data-id_user="<?= $_SESSION['id_user'] ?>" data-min="1" data-max="<?= $data_produk_keranjang['stok_produk'] ?>" value="<?= $keranjang_user['jumlah_keranjang'] ?>">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[<?= $keranjang_user['id_keranjang'] ?>]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->

									</td>

									<td class="total-amount" data-title="Total"><span id="jumlah_harga<?= $keranjang_user['id_keranjang'] ?>"><?= rupiah($keranjang_user['harga_keranjang']) ?></span></td>
									<td class="action" data-title="Remove"><a href="<?= base_url('raja_vapor/cart/remove_on_cart/') . $keranjang_user['id_keranjang'] ?>"><i class="ti-trash remove-icon"></i></a></td>
								</tr>

						<?php
								//auto increment nomer
								$no++;
							}
						}
						?>
					</tbody>
				</table>
				<!--/ End Shopping Summery -->
			</div>

			<div class="col-12">
				<!-- Total Amount -->
				<div class="total-amount">
					<div class="row">
						<div class="col-lg-6 col-md-5 col-12">
							<div class="left">
								<!-- <div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div> -->
							</div>
						</div>
						<div class="col-lg-6 col-md-7 col-12">
							<div class="right">
								<ul>
									<!-- <li>Cart Subtotal<span>$330.00</span></li>
										<li>Shipping<span>Free</span></li>
										<li>You Save<span>$20.00</span></li> -->
									<li class="last">Total Pembayaran
										<span style="text-align:center;" id="total_belanjahtml">
											<?php
											// Jika Sudah Login
											if (isset($_SESSION['id_user'])) {
												$id_user = $_SESSION['id_user'];
												$sql_total_produk = "SELECT SUM(harga_keranjang) as total FROM keranjang WHERE id_user = $id_user";
												$query_total_produk = mysqli_query($koneksi, $sql_total_produk);
												$data_total_produk = mysqli_fetch_array($query_total_produk, MYSQLI_BOTH);
												$total_belanja = $data_total_produk['total'];
												echo rupiah($total_belanja);
											} else {
												$total_belanja = 0;
												echo rupiah($total_belanja);
											} ?>
										</span>
										<input type="number" id="total_belanja" value="<?= $total_belanja ?>">
									</li>
								</ul>
								<div class="button5">
									<form action="<?= base_url('checkout/add_checkout.php') ?>" method="post">
										<?php
										$implode_id_keranjang = implode(",", $dataset);
										?>
										<input type="text" name="id_user" value="<?= $_SESSION['id_user'] ?>" id="">
										<input type="text" name="implode_id_keranjang" value="<?= $implode_id_keranjang ?>" id="">
										<input type="number" name="jumlah_checkout" value="<?= $data_total_produk['total'] ?>" id="jumlah_checkout">

										<button type="submit" class="btn">Checkout</button>
									</form>
									<!-- <a href="<?= base_url('raja_vapor/checkout') ?>#" class="btn">Checkout</a> -->
									<a href="<?= base_url('index.php') ?>" class="btn">Continue shopping</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ End Total Amount -->
			</div>
		</div>
	</div>
</div>