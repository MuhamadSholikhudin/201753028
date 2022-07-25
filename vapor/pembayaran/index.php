<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Page</span>
      <h3 class="page-title">Pembayaran</h3>
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

            DAFTAR DATA PEMBAYARAN
          </h6>
        </div>
        <div class="card-body  pb-3 text-center">

       
	<div class="card-body bg-white">
		<?php
  //Membuat varialbel username dari session login username
  $username = $_SESSION['username'];

  //Mencari data profile dari tabel user
  $profile = querysatudata("SELECT * FROM user WHERE username = '$username' ");
  ?>
			<table id="table_id" class="table mb-0 row-border" >
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
     $pembayarans = querybanyak('SELECT * FROM pembayaran');

     foreach ($pembayarans as $pembayaran) { ?>
					<tr >
						<td><?= $no ?></td>
						<td><?= rupiah($pembayaran['total_pembayaran']) ?></td>
						<td>
							<?php if ($pembayaran['bukti_pembayaran'] !== null) { ?> 
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
  </div>
  <!-- End Small Stats Blocks -->


</div>
</div>