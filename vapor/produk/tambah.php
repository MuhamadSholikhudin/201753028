<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Halaman Tambah</span>
      <h3 class="page-title">produk</h3>
    </div>
  </div>
  <!-- End Page Header -->

  <!-- Small Stats Blocks -->
  <div class="row">
    <div class="col-lg-6">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Form Tambah</h6>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">
            <div class="row">
              <div class="col">
                <form action="<?= base_url('vapor/produk/aksi.php') ?>" enctype="multipart/form-data" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="nama_produk">Nama produk</label>
                      <input type="text" class="form-control" id="nama_produk" placeholder="Nama produk" name="nama_produk">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="stok">Stok</label>
                      <input type="number" class="form-control" id="stok" name="stok_produk">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="harga_produk">Harga produk</label>
                      <input type="number" class="form-control" id="harga_produk" name="harga_produk">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="feInputState">Jenis produk</label>
                    <select id="feInputState" class="form-control" name="id_kategori">
                      <?php
                      $sql_tampil_kategori = "SELECT * FROM kategori";
                      $query_tampil_kategori = mysqli_query($koneksi, $sql_tampil_kategori);
                      $no = 1; //nilai awal nomer
                      while ($kat = mysqli_fetch_array($query_tampil_kategori, MYSQLI_BOTH)) {
                      ?>
                        <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] . " / " . $kat['kategori']   ?></option>
                      <?php
                        //auto increment nomer
                        $no++;
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="feInputState">Status produk</label>
                    <select id="feInputState" class="form-control" name="status_produk">
                      <option value="1" selected>1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                  </div>
                  <div class="form-row">
                    <div class="form-group ">
                      <label for="gambar">Gambar produk</label>
                      <img id="output" />
                      <input type="file" class="form-control" id="gambar" name="gambar" accept="image/png, image/jpeg, image/jpg, image/img" onchange="loadFile(event)">

                    </div>
                    <!-- <div class="form-group col-md-6">                              -->
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
                      <textarea class="form-control" name="deskripsi"></textarea>
                    </div>
                  </div>
                  <!-- <button type="submit" class="btn btn-accent">Update Account</button>  -->
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