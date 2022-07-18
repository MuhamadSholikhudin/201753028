<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Page</span>
      <h3 class="page-title">Pesanan Stok Gerai</h3>
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
            <a href="<?= base_url('vapor/index.php?halaman=pesanan_stok_gerai_tambah') ?>" type="button" class="btn btn-primary"> + Tambah</a>
          </h6>
        </div>
        <div class="card-body  pb-3 text-center">

          <table id="table_id" class="table mb-0 row-border">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">#</th>
                <th scope="col" class="border-0">Produk</th>
                <th scope="col" class="border-0">jumlah pesanan</th>
                <th scope="col" class="border-0">Keterangan</th>
                <th scope="col" class="border-0">Status</th>
                <th scope="col" class="border-0">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              $stok_gerai = querybanyak('SELECT * FROM pesanan_stok_gerai');
              foreach ($stok_gerai as $ger) : ?>
                <tr>
                  <td> <?= $no++ ?></td>
                  <td>
                    <?php
                    $produk = querysatudata("SELECT nama_produk as nama_produk FROM produk WHERE id_produk =" . $ger['id_produk'] . " ");
                    ?>
                    <?= $produk['nama_produk'] ?>

                  </td>
                  <td><?= $ger['pesanan_stok'] ?></td>
                  <td><?= $ger['keterangan'] ?></td>
                  <td><?= $ger['status_pesanan_stok'] ?></td>
                  <td>
                    <?php
                    if ($ger['status_pesanan_stok'] == 'tersedia') { ?>
                      <form action="<?= base_url('vapor/pesanan_stok_gerai/aksi.php') ?>" method="post">
                        <input type="hidden" name="id_pesanan_stok_gerai" value="<?= $ger['id_pesanan_stok_gerai'] ?>" id="">
                        <button type="submit" name="btnTERIMAPESANAN" class="btn btn-dark">Batal pesan</button>
                      </form>
                    <?php
                    } elseif ($ger['status_pesanan_stok'] == 'pesan') { ?>

                      <form action="<?= base_url('vapor/pesanan_stok_gerai/aksi.php') ?>" method="post">
                        <input type="hidden" name="id_pesanan_stok_gerai" value="<?= $ger['id_pesanan_stok_gerai'] ?>" id="">
                        <button type="submit" name="btnBATALPESAN" class="btn btn-dark">Batal pesan</button>
                      </form>
                    <?php
                    } else { ?>

                      <form action="<?= base_url('vapor/pesanan_stok_gerai/aksi.php') ?>" method="post">
                        <input type="hidden" name="id_pesanan_stok_gerai" value="<?= $ger['id_pesanan_stok_gerai'] ?>" id="">
                        <button type="submit" name="btnPESAN" class="btn btn-info"> pesan</button>
                      </form>
                    <?php
                    }
                    ?>

                    <a href="<?= base_url('vapor/index.php?halaman=pesanan_stok_gerai_edit&id_pesanan_stok_gerai=' . $ger['id_pesanan_stok_gerai']) ?>" type="button" class="btn btn-success"> Edit</a>
                    <a href="<?= base_url('pemilik/pesanan_stok_gerai/hapus/' . $ger['id_pesanan_stok_gerai']) ?>" type="button" class="btn btn-danger"> Hapus</a>
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
