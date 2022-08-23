<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Page</span>
			<h3 class="page-title">Pengiriman</h3>
		</div>
	</div>
	<!-- End Page Header -->

	<!-- Small Stats Blocks -->
	<div class="row">

	</div>
	<!-- End Small Stats Blocks -->

	<!-- Small Stats Blocks -->
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">
						DAFTAR DATA PENGIRIMAN PEMBELIAN
					</h6>
				</div>
				<div class="card-body  pb-3 text-center">
					<div class="card-body bg-white">
					<?php
						//Membuat varialbel username dari session login username
						$username = $_SESSION['username'];

						//Mencari data profile dari tabel user
						$profile = querysatudata("SELECT * FROM user WHERE username = '$username' "					);
					?>
						<table id="table_id" class="table mb-0 row-border">
							<thead>
								<tr>
									<th class="text-center">NO</th>
									<th>Nomor Pembayaran</th>
									<th>Bukti pengiriman</th>
									<th>Keterangan</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								$pengirimans = querybanyak('SELECT * FROM pengiriman JOIN pembayaran 
								ON  pengiriman.id_pembayaran = pembayaran.id_pembayaran 
								WHERE pembayaran.status_pembayaran > 3');

									foreach ($pengirimans as $pengiriman) { ?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $pengiriman['nomor_pembayaran'] ?></td>
										<td>
											<?php if ($pengiriman['bukti_pengiriman'] !== null) { ?>
												<img src="<?= base_url('gambar/buktipengiriman/') .
												$pengiriman[
													'bukti_pengiriman'
												] ?>" width="40px" height="40px" style="" alt="logo">
											<?php } else { ?>

											<?php } ?>
										</td>
										<td>
											<?= $pengiriman['keterangan'] ?>

										</td>
										<td>
										<?php if ($pengiriman['status_pengiriman'] == 1) { ?>
											Belum dikirim
											<?php } elseif ($pengiriman['status_pengiriman'] == 2) { ?>
												Sudah Upload Bukti
											<?php } elseif ($pengiriman['status_pengiriman'] == 3) { ?>

											<?php } ?>
										</td>
										<td>
											<?php if ($pengiriman['status_pengiriman'] == 1) { ?>
												<a href="<?= base_url(
													'vapor/index.php?halaman=pengiriman_upload&id_pengiriman='
												) . $pengiriman['id_pengiriman'] ?>">Upload Pengiriman</a>
											<?php } elseif ($pengiriman['status_pengiriman'] == 2) { ?>
												<a href="<?= base_url(
												'vapor/index.php?halaman=pengiriman_upload_edit&id_pengiriman='
												) . $pengiriman['id_pengiriman'] ?>">Edit Pengiriman</a>

											<?php } elseif ($pengiriman['status_pengiriman'] == 3) { ?>

											<?php } ?>

										</td>
									</tr>
								<?php $no++; }	?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- End Small Stats Blocks -->
	</div>
</div>