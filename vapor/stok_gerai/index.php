<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Page</span>
      <h3 class="page-title">Gerai</h3>
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
            <a href="<?= base_url('vapor/index.php?halaman=gerai_tambah') ?>" type="button" class="btn btn-primary"> + Tambah</a>
          </h6>
        </div>
        <div class="card-body  pb-3 text-center">

          <table id="table_id" class="table mb-0 row-border">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">#</th>
                <th scope="col" class="border-0">Nama Gerai</th>
                <th scope="col" class="border-0">Cabang</th>
                <th scope="col" class="border-0">Alamat Gerai</th>
                <th scope="col" class="border-0">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;               
              $stok_gerai = querybanyak('SELECT * FROM stok_gerai');
              foreach ($stok_gerai as $ger) : ?>
                <tr>
                  <td> <?= $no++ ?></td>
                  <td><?= $ger['id_gerai'] ?></td>
                  <td><?= $ger['id_produk'] ?></td>
                  <td><?= $ger['stok_gerai'] ?></td>
                  <td> <a href="<?= base_url('vapor/index.php?halaman=stok_gerai_edit&id_stok_gerai=' . $ger['id_stok_gerai']) ?>" type="button" class="btn btn-success"> Edit</a>
                    <a href="<?= base_url('pemilik/stok_gerai/hapus/' . $ger['id_stok_gerai']) ?>" type="button" class="btn btn-danger"> Hapus</a>
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