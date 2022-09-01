<div class="col-lg-9 col-md-8 col-12">
	<div class="card bg-light mb-3 mt-2" style="max-width: 50rem;">
		<div class="card-header" style="background-color: #F7941D; color:#fff;">
			DATA CHECKOUT <?= $_SESSION['username'] ?>
		</div>
		<div class="card-body bg-white">
			<?php
			//Membuat varialbel username dari session login username
			$username = $_SESSION['username'];

			//Mencari data profile dari tabel user
			$profile = querysatudata("SELECT * FROM user WHERE username = '$username' ");
			?>
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">NO</th>
						<th>Jumlah produk</th>
						<th>Total</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>

				</thead>
				<tbody>
					<?php
					$no = 1;
					$checkouts = querybanyak('SELECT * FROM checkout WHERE id_user = ' . $profile['id_user'] . '');

					foreach ($checkouts as $checkout) { ?>
						<tr>
							<td><?= $no ?></td>
							<td>
								<?php
								$explode_id_keranjang = explode(",", $checkout['id_keranjang']);
								echo count($explode_id_keranjang);
								?>

							</td>
							<td><?= rupiah($checkout['jumlah_checkout'])  ?></td>
							<td><?= $checkout['tanggal_transaksi']  ?></td>
							<td><?= $checkout['status_transaksi']  ?></td>
							<td>

								<?php if ($checkout['status_transaksi'] == 1) { ?>
									<a href="<?= base_url('checkout/index.php?halaman=checkout_prosess&id_checkout=') . $checkout['id_checkout'] ?>" target="_blank" class="single-icon badge btn-success text-white"><i class="ti-ticket"></i> <span class="total-count">Lanjutkan checkout</span></a>
								<?php } elseif ($checkout['status_transaksi'] == 2) { ?>
									<?php
									$pembayaran = querysatudata("SELECT * FROM pembayaran WHERE id_checkout = " . $checkout['id_checkout'] . " ");
									?>
									<a href="<?= base_url('pembayaran/index.php?halaman=pembayaran_upload&id_pembayaran=') . $pembayaran['id_pembayaran'] ?>" target="_blank" class="single-icon badge btn-success text-white"><i class="ti-upload"></i> <span class="total-count">Upload Pembayaran</span></a>
								<?php } ?>
							</td>
						</tr>
					<?php $no++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

</div>