<?php
if (isset($_GET['id_produk'])) {
  $sql_cek = "SELECT * FROM produk WHERE
      id_produk='" . $_GET['id_produk'] . "'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

?>

<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Halaman Edit</span>
      <h3 class="page-title">produk</h3>
    </div>
  </div>

  <!-- End Page Header -->

  <!-- Small Stats Blocks -->
  <div class="row">
    <div class="col-lg-6">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Form Edit produk</h6>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">
            <div class="row">
              <div class="col">
                <form action="<?= base_url('vapor/produk/aksi.php') ?>" enctype="multipart/form-data" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="nama_produk">Nama produk</label>
                      <input type="hidden" class="form-control" id="id_produk" name="id_produk" value="<?= $data_cek['id_produk'] ?>">
                      <input type="text" class="form-control" id="nama_produk" placeholder="Nama produk" name="nama_produk" value="<?= $data_cek['nama_produk'] ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="stok">Stok</label>
                      <input type="number" class="form-control" id="stok" min="1" name="stok_produk" value="<?= $data_cek['stok_produk'] ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="harga_produk">Harga Produk</label>
                      <input type="number" class="form-control" id="harga_produk" min="1" name="harga_produk" value="<?= $data_cek['harga_produk'] ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="feInputState">Kategori</label>
                    <select id="feInputState" class="form-control" name="id_kategori">
                      <?php

                      // $mysqli = new mysqli("localhost","root","","201753028");

                      // $query = 'SELECT * FROM kategori';

                      // menggunakan foreach
                      // $result = $mysqli->query($query);

                      $result = querybanyak('SELECT * FROM kategori');

                      foreach ($result as $row) { ?>

                        <?php if ($row['id_kategori'] == $data_cek['id_kategori']) { ?>
                          <option value="<?= $row['id_kategori'] ?>" selected><?= $row['kategori'] ?></option>
                        <?php } else { ?>
                          <option value="<?= $row['id_kategori'] ?>"><?= $row['kategori'] ?></option>
                      <?php }
                      }

                      ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="feInputState">Status produk</label>
                    <select id="feInputState" class="form-control" name="status_produk">
                      <?php
                      $status_produk = [1, 2, 3, 4];
                      $is_active = ["Aktif" => 1, "Tidak Aktif" => 0];
                      ?>

                      <?php foreach ($is_active as $x => $x_value) : ?>
                        <?php if ($x_value == $data_cek['status_produk']) { ?>
                          <option value="<?= $x_value ?>" selected><?= $x ?></option>
                        <?php } else { ?>
                          <option value="<?= $x_value ?>"><?= $x ?></option>
                        <?php } ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-row">
                    <div class="form-group ">
                      <label for="gambar">Gambar produk</label>
                      <img src="<?= base_url('produk/') . $data_cek['gambar'] ?>" id="output" />
                      <input type="file" class="form-control" id="gambar" name="gambar" accept="image/png, image/jpeg, image/jpg, image/img" onchange="loadFile(event)">

                    </div>

                    <script>
                      var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                          URL.revokeObjectURL(output.src) // free memory
                        }
                      };
                    </script>
                    <!-- </div> -->
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="feDescription">Deskripsi</label>
                      <textarea class="form-control" name="deskripsi"><?= $data_cek['deskripsi'] ?></textarea>
                    </div>
                  </div>
                  <!-- <button type="submit" class="btn btn-accent">Update Account</button>  -->
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