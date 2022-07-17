<?php
if (isset($_GET['id_kategori'])) {
  $kategori = querysatudata("SELECT * FROM kategori WHERE id_kategori =" . $_GET['id_kategori'] . " ");
}
?>

<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Halaman Edit</span>
      <h3 class="page-title">kategori</h3>
    </div>
  </div>
  <!-- End Page Header -->

  <!-- Small Stats Blocks -->
  <div class="row">
    <div class="col-lg-6">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Form Edit kategori</h6>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">
            <div class="row">
              <div class="col">
                <form action="<?= base_url('vapor/kategori/aksi.php') ?>" enctype="multipart/form-data" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="nama_kategori">Nama kategori</label>
                      <input type="hidden" class="form-control" id="id_kategori" name="id_kategori" value="<?= $kategori['id_kategori'] ?>">
                      <input type="text" class="form-control" id="nama_kategori" placeholder="Nama kategori" name="nama_kategori" value="<?= $kategori['nama_kategori'] ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="kategori">Kategori</label>
                      <input type="text" class="form-control" id="kategori" min="1" name="kategori" value="<?= $kategori['kategori'] ?>">
                    </div>
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
</div>