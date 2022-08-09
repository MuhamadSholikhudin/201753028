<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Halaman Tambah</span>
      <h3 class="page-title">Pengguna</h3>
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
                <form action="<?= base_url('vapor/pengguna/aksi.php') ?>" enctype="multipart/form-data" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="nama_lengkap">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama user" name="nama_lengkap" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="user">Username</label>
                      <input type="text" class="form-control" id="user" name="username" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="user">Password</label>
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="nomer_hp">Nomer HP</label>
                      <input type="text" class="form-control" id="nomer_hp" name="nomer_hp" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="feInputState">Hak Akses</label>
                    <select id="feInputState" class="form-control" name="hakakses" required>
                      <?php
                      $hakakses = ["Pemilik" => 1, "Admin" => 2, "Karyawan" => 3, "Pembeli" => 4 ];
                      ?>

                      <?php foreach ($hakakses as $x => $x_value) : ?>
                          <option value="<?= $x_value ?>"><?= $x ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="feInputState">Status</label>
                    <select id="feInputState" class="form-control" name="status_user" required>
                      <?php
                      $is_active = ["Aktif" => 1, "Tidak Aktif" => 0];
                      ?>

                      <?php foreach ($is_active as $x => $x_value) : ?>
                          <option value="<?= $x_value ?>"><?= $x ?></option>
                      <?php endforeach; ?>
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