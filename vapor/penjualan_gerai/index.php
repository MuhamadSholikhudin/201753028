<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Page</span>
      <h3 class="page-title">Penjualan Gerai</h3>
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
            <form action="<?= base_url('vapor/penjualan_gerai/aksi.php') ?>" method="post" enctype="multipart/form-data">
              <?php  $nomer_penjualan = strtotime(date('Y-m-d H:i:s')); ?>
              <input type="text" name="nomer_penjualan" value="<?= $nomer_penjualan ?>" id="">
              <button name="btnTAMBAHPENJUALAN" type="submit" class="btn btn-primary"> + Tambah</button>
            </form>
          </h6>
        </div>
        <div class="card-body  pb-3 text-center">

          <table id="table_id" class="table mb-0 row-border">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">#</th>
                <th scope="col" class="border-0">Nomor Penjualan</th>
                <th scope="col" class="border-0">Total</th>
                <th scope="col" class="border-0">Status Penjualan</th>
                <th scope="col" class="border-0">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;               
              $penjualan_gerai = querybanyak('SELECT * FROM penjualan_gerai');
              foreach ($penjualan_gerai as $penj) : ?>
                <tr>
                  <td> <?= $no++ ?></td>
                  <td><?=  $penj['nomor_penjualan'] ?></td>
                  <td><?=  $penj['total_penjualan'] ?></td>
                  <td><?=  $penj['status_penjualan_gerai'] ?></td>
                  <td> <a href="<?= base_url('vapor/index.php?halaman=penjualan_gerai_edit&id_penjualan_gerai=' .  $penj['id_penjualan_gerai']) ?>" type="button" class="btn btn-success"> Edit</a>
                    <a href="<?= base_url('pemilik/penjualan_gerai/hapus/' .  $penj['id_penjualan_gerai']) ?>" type="button" class="btn btn-danger"> Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- End Small Stats Blocks -->


</div>