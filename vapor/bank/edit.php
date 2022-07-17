<?php
if (isset($_GET['id_bank'])) {
  $bank = querysatudata("SELECT * FROM bank WHERE id_bank =" . $_GET['id_bank'] . " ");
}
?>
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Halaman Edit</span>
      <h3 class="page-title">Bank</h3>
    </div>
  </div>
  <!-- End Page Header -->

  <!-- Small Stats Blocks -->
  <div class="row">
    <div class="col-lg-6">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Form Edit Bank</h6>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">
            <div class="row">
              <div class="col">
                <form action="<?= base_url('vapor/bank/aksi.php') ?>" enctype="multipart/form-data" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="nama_bank">Nama Bank</label>
                      <input type="hidden" class="form-control" id="id_bank" name="id_bank" value="<?= $bank['id_bank'] ?>">
                      <input type="text" class="form-control" id="nama_bank" placeholder="Nama bank" name="nama_bank" value="<?= $bank['nama_bank'] ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="no_rekening">Nomer Rekening</label>
                      <input type="number" class="form-control" id="no_rekening" name="no_rekening" value="<?= $bank['no_rekening'] ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="atas_nama">Atas Nama</label>
                      <input type="text" class="form-control" id="atas_nama" name="atas_nama" value="<?= $bank['atas_nama'] ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group ">
                      <label for="gambar">Gambar Logo</label>
                      <img src="<?= base_url('gambar/bank/') . $bank['gambar_logo'] ?>" id="output" />
                      <input type="file" class="form-control" id="gambar_logo" name="gambar_logo" accept="image/png, image/jpeg, image/jpg, image/img" onchange="loadFile(event)">

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
                      <label for="feDescription">Tutorial Pembayaran</label>
                      <textarea class="form-control" name="tutorial_pembayaran"><?= $bank['tutorial_pembayaran'] ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="feInputState">Status bank</label>
                    <select id="feInputState" class="form-control" name="status_bank">
                      <?php
                      $status_produk = [1, 2, 3, 4];
                      $is_active = ["Aktif" => 1, "Tidak Aktif" => 0];
                      ?>

                      <?php foreach ($is_active as $x => $x_value) : ?>
                        <?php if ($x_value == $bank['status_bank']) { ?>
                          <option value="<?= $x_value ?>" selected><?= $x ?></option>
                        <?php } else { ?>
                          <option value="<?= $x_value ?>"><?= $x ?></option>
                        <?php } ?>
                      <?php endforeach; ?>
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