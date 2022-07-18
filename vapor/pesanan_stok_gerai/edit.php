<?php
if (isset($_GET['id_pesanan_stok_gerai'])) {
  $pesanan_stok_gerai = querysatudata("SELECT * FROM pesanan_stok_gerai WHERE id_pesanan_stok_gerai =" . $_GET['id_pesanan_stok_gerai'] . " ");
}
?>
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Halaman Edit</span>
      <h3 class="page-title">Pesanan Stok</h3>
    </div>
  </div>
  <!-- End Page Header -->

  <!-- Small Stats Blocks -->
  <div class="row">
    <div class="col-lg-6">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Form Edit</h6>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">
            <div class="row">
              <div class="col">
                <form action="<?= base_url('vapor/pesanan_stok_gerai/aksi.php') ?>" enctype="multipart/form-data" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="nama_kategori">Nama produk</label>
                      <input type="text" class="form-control" id="id_user" placeholder="id_user" name="id_user" value="<?= $pesanan_stok_gerai['id_user'] ?>">
                      <input type="text" class="form-control" id="id_pesanan_stok_gerai" placeholder="id_pesanan_stok_gerai" name="id_pesanan_stok_gerai" value="<?= $pesanan_stok_gerai['id_pesanan_stok_gerai'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="feInputState">Nama Produk</label>
                    <select id="feInputState" class="form-control" name="id_produk">
                      <?php 
                        // menampilkan data produk
                        $produk = querybanyak('SELECT * FROM produk');
                        foreach ($produk as $pro) :
                          if($pro['id_produk'] == $pesanan_stok_gerai['id_produk']){ ?>
                            <option value="<?= $pro['id_produk']?>" selected><?= $pro['nama_produk']?></option>
                          <?php 
                          }else{ ?>
                            <option value="<?= $pro['id_produk']?>"><?= $pro['nama_produk']?></option>
                          <?php
                          }
                      ?>
                        
                      <?php
                        endforeach;
                      ?>
                    </select>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="pesanan_stok">Pesanan Stok</label>
                      <input type="number" class="form-control" id="pesanan_stok" placeholder="pesanan_stok" name="pesanan_stok" value="<?= $pesanan_stok_gerai['pesanan_stok'] ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="keterangan">keterangan</label>
                      <input type="text" class="form-control" id="keterangan" placeholder="keterangan" name="keterangan" value="<?= $pesanan_stok_gerai['keterangan'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="feInputState">Status pesanan</label>
                    <select id="feInputState" class="form-control" name="status_pesanan_stok">
                      <option value="belum pesan" selected>belum pesan</option>
                      <option value="pesan">pesan</option>
                    </select>
                  </div>
                  <button type="submit" name="btnUBAH" class="btn btn-accent">Submit</button>
                </form>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Small Stats Blocks -->




</div>