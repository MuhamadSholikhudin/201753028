<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Page</span>
      <h3 class="page-title">Pengguna</h3>
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

            <a href="<?= base_url('vapor/index.php?halaman=pengguna_tambah') ?>" type="button" class="btn btn-primary"> + Tambah</a>
          </h6>
        </div>
        <div class="card-body  pb-3 text-center">

          <table id="table_id" class="table mb-0 row-border">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">#</th>
                <th scope="col" class="border-0">Nama</th>
                <th scope="col" class="border-0">Username</th>
                <th scope="col" class="border-0">Email</th>
                <th scope="col" class="border-0">Hak Akses</th>
                <th scope="col" class="border-0">Status</th>
                <th scope="col" class="border-0">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php
              $kategori = querybanyak('SELECT * FROM user WHERE hakakses != 1 ');
              foreach ($kategori as $bar) : ?>
                <tr>
                  <td>
                    
                      <?= $no++ ?>
                    
                  </td>
                  <td>
                    <?= $bar['nama_lengkap'] ?>
                  </td>
                  <td><?= $bar['username'] ?></td>
                  <td><?= $bar['email'] ?></td>
                  <td>
                    <?php 
                      if($bar['hakakses'] == 1){
                        echo "Pemilik";
                      }elseif($bar['hakakses'] == 2){
                        echo "Admin";
                      }elseif($bar['hakakses'] == 3){
                        echo "Karyawan";
                      }elseif($bar['hakakses'] == 4){
                        echo "Pembeli";
                      }
                    ?>
                  </td>
                  <td>
                    <?php 
                      if($bar['status_user'] == 1){
                        echo "Aktif";
                      }else{
                        echo "Tidak Aktif";
                      }
                    ?>
                </td>
                  <td>
                    <a href="<?= base_url('vapor/index.php?halaman=pengguna_edit&id_user=' . $bar['id_user']) ?>" type="button" class="btn btn-success"> Edit</a>
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