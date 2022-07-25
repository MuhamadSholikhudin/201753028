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
								<a href="<?= base_url('vapor/pembayaran/lihat.php?id_pembayaran=').$pembayaran['id_pembayaran'] ?>">

							<img src="<?= 'http://localhost/201753028/gambar/butkipembayaran/' .
           $pembayaran['bukti_pembayaran'] ?>" width="40px" style="" alt="logo">
								</a>
								
							<?php } else { ?> 
								
							<?php } ?>
						</td>
						<td><?= $pembayaran['tanggal_pembayaran'] ?></td>
						<td>
							<?php if ($pembayaran['status_pembayaran'] == 1) { ?>
								Belum Bayar
							<?php } elseif ($pembayaran['status_pembayaran'] == 2) { ?>
								Data Pembayaran Tidak Valid
							<?php } elseif ($pembayaran['status_pembayaran'] == 3) { ?>
								Pembayaran di Upload
							<?php } elseif ($pembayaran['status_pembayaran'] == 4) { ?>
								Pembayaran di konfirmasi
							<?php } ?>
						</td>
						<td>
							<?php if ($pembayaran['status_pembayaran'] == 2) { ?>
								<a href="<?=base_url('vapor/pembayaran/aksi.php')?>" class="btn btn-primary"> Konfirmasi</a>
							<?php } elseif ($pembayaran['status_pembayaran'] == 3) { ?>
								<a href="<?=base_url('vapor/pembayaran/aksi.php?id_pembayaran=')?><?=$pembayaran['id_pembayaran']?>&status_pembayaran=4" type="button" class="btn btn-white">
									<span class="text-success"><i class="material-icons">check</i></span> Konfirmasi 
								</a>
								<a href="<?=base_url('vapor/pembayaran/aksi.php?id_pembayaran=')?><?=$pembayaran['id_pembayaran']?>&status_pembayaran=2" type="button" class="btn btn-white">
									<span class="text-success"><i class="material-icons">keyboard_return</i></span> Bukti Tidak Valid 
								</a>
							<?php } elseif ($pembayaran['status_pembayaran'] == 4) { ?>
								<a href="<?=base_url('vapor/pembayaran/aksi.php?id_pembayaran=')?><?=$pembayaran['id_pembayaran']?>&status_pembayaran=3" type="button" class="btn btn-white">
									<span class="text-success"><i class="material-icons">clear</i></span> Batalkan Konfirmasi
								</a>
							<?php } ?>
							
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