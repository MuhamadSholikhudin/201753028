<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Page</span>
      <h3 class="page-title">Keranjang Gerai</h3>
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
                <th scope="col" class="border-0" valign="top">#</th>
                <th scope="col" class="border-0">Produk</th>
                <th scope="col" class="border-0">jumlah pesanan</th>
                <th scope="col" class="border-0">Keterangan</th>
                <th scope="col" class="border-0">Gerai</th>
                <th scope="col" class="border-0">tersedia</th>
                <th scope="col" class="border-0">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              $keranjang_gerai = querybanyak("SELECT * FROM keranjang_gerai WHERE status_keranjang_gerai = 0 ORDER BY status_keranjang_gerai ASC ");
              foreach ($stok_gerai as $ger) : ?>
               <form action="<?= base_url('vapor/pesanan_stok/aksi.php') ?>" method="post">
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
                  <td>
                    <?php 
                    $gerai = querysatudata("SELECT gerai.nama_gerai as nama_gerai FROM gerai JOIN karyawan ON gerai.id_gerai =karyawan.id_gerai WHERE karyawan.id_user =" . $ger['id_user'] . " ");
                    ?>
                    <?= $gerai['nama_gerai'] ?>
                  </td>
                  <td> 
                    <?php
                      $maxtersedia = querysatudata("SELECT stok_produk FROM produk  WHERE id_produk =" . $ger['id_produk'] . " ");
                    ?>
                    <input type="hidden" name="id_pesanan_stok_gerai" value="<?= $ger['id_pesanan_stok_gerai'] ?>" id="">
                    <input type="hidden" name="id_produk" value="<?= $ger['id_produk'] ?>" id="">
                    <input type="number" name="stok_tersedia" min="1" max="<?= $maxtersedia['stok_produk'] ?>" value="<?= $get['stok_tersedia'] ?>" id=""></td>
                  <td>
                    <?php
                    if ($ger['status_pesanan_stok'] == 'tersedia') { ?>
                    <button type="submit" name="btnBATALTERSEDIA" class="btn btn-wheat">Tersedia</button>
                    <?php
                    } elseif ($ger['status_pesanan_stok'] == 'pesan') { ?>          
                        <button type="submit" name="btnTERSEDIA" class="btn btn-wheat">Tersedia</button>
                      
                    <?php
                    } else { ?>
                                 
                    <?php
                    }
                    ?>
                  </td>
                </tr>

               </form>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- End Small Stats Blocks -->


</div>
