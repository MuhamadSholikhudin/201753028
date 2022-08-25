<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Halaman Tambah</span>
      <h3 class="page-title">Pesanan Stok</h3>
    </div>
  </div>
  <!-- End Page Header -->

  <?php 
      if($_SESSION['hakakses'] == 3){

      $user = querysatudata("SELECT * FROM user WHERE id_user =".$_SESSION['id_user']." ");

      $gerai = querysatudata("SELECT * FROM gerai WHERE id_gerai =".$user['id_gerai']." ");
      
      $nama_gerai = $gerai['cabang'];

      $id_gerai = $gerai['id_gerai'];

      }else{
        $nama_gerai = "";
        $id_gerai = 1;
      }

  ?>

  <!-- Small Stats Blocks -->
  <div class="row">
    <div class="col-lg-6">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Form Tambah Pesan Stok Gerai</h6>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">
            <div class="row">
              <div class="col">
                <form action="<?= base_url('vapor/pesanan_stok_gerai/aksi.php') ?>" enctype="multipart/form-data" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="nama_kategori">Nama Gerai</label>
                      <input type="text" class="form-control" id="id_produk" value="<?= $nama_gerai ?>" disabled>
                      <input type="text" class="form-control d-none" id="id_user" placeholder="id_user" name="id_user"  value="<?= $_SESSION['id_user'] ?>">
                      <input type="text" class="form-control d-none" id="id_gerai" placeholder="id_gerai" name="id_gerai"  value="<?= $id_gerai?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="feInputState">Nama Produk</label>
                    <select id="feInputState" class="form-control" name="id_produk" required>
                      <?php 
                        // menampilkan data produk
                        $produk = querybanyak("SELECT * FROM produk");
                        foreach ($produk as $pro) :
                      ?>
                        <option value="<?= $pro['id_produk']?>"><?= $pro['nama_produk']?></option>
                      <?php
                        endforeach;
                      ?>
                    </select>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="pesanan_stok">Pesanan Stok</label>
                      <input type="number" class="form-control" id="pesanan_stok" placeholder="pesanan_stok" min="1" name="pesanan_stok" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="keterangan">keterangan</label>
                      <input type="text" class="form-control" id="keterangan" placeholder="keterangan" name="keterangan" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="feInputState">Status pesanan</label>
                    <select id="feInputState" class="form-control" name="status_pesanan_stok" required>
                      <option value="belum pesan" selected>belum pesan</option>
                      <option value="pesan">pesan</option>
                    </select>
                  </div>
                  <button type="submit" name="btnSIMPAN" class="btn btn-accent">Submit</button>
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