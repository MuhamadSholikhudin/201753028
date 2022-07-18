<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Halaman Tambah</span>
      <h3 class="page-title">Gerai</h3>
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
                <form action="<?= base_url('vapor/gerai/aksi.php') ?>" enctype="multipart/form-data" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="nama_gerai">Nama Gerai</label>
                      <input type="text" class="form-control" id="nama_gerai" placeholder="Nama gerai" name="nama_gerai">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="cabang">Cabang</label>
                      <input type="text" class="form-control" id="cabang" name="cabang">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="alamat_gerai">Alamat Gerai</label>
                      <textarea class="form-control" name="alamat_gerai" id="alamat_gerai"></textarea>
                    </div>
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