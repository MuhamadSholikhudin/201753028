
<div class="col-lg-9 col-md-8 col-12">
	<div class="card bg-light mb-3 mt-2" style="max-width: 50rem;">
		<div class="card-header" style="background-color: #F7941D; color:#fff;">
			DATA PEMBAYARAN  <?= $_SESSION['username'] ?>
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
						<th>Total Pembayaran</th>
						<th>Bukti Pembayaran</th>
						<th>Tanggal Upload Pembayaran</th>
						<th>Status Pembayaran</th>
						<th>Aksi</th>
					</tr>

				</thead>
				<tbody>
					<?php
     $no = 1;
     $pembayarans = querybanyak('SELECT * FROM pembayaran WHERE id_user = ' . $profile['id_user'] . '');

     foreach ($pembayarans as $pembayaran) { ?>
					<tr >
						<td><?= $no ?></td>
						<td><?= rupiah($pembayaran['total_pembayaran']) ?></td>
						<td>
							<?php if ($pembayaran['bukti_pembayaran'] !== NULL) { ?> 
								<img src="<?= "http://localhost/201753028/gambar/butkipembayaran/". $pembayaran['bukti_pembayaran'] ?>" width="40px" style="" alt="logo">

							<?php } else { ?> 
								

							<?php } ?>
						</td>
						<td><?= $pembayaran['tanggal_pembayaran'] ?></td>
						<td>
							<?php if ($pembayaran['status_pembayaran'] == 1) { ?>

							<?php } elseif ($pembayaran['status_pembayaran'] == 2) { ?>

							<?php } elseif ($pembayaran['status_pembayaran'] == 3) { ?>

							<?php } elseif ($pembayaran['status_pembayaran'] == 4) { ?>

							<?php } ?>
						</td>
						<td>

						</td>
					</tr>
					<?php $no++;}
     ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

