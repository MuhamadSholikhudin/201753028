<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Page</span>
      
        <?php 
          /*
            SELECT id_produk
              FROM stok_gerai
              EXCEPT
            SELECT id_produk 
              FROM produk;

              ="UPDATE stok_gerai SET id_produk = "&D2&" WHERE id_produk="&B2&";"
          */
          

          if($_SESSION['hakakses'] == 3){

            $user = querysatudata("SELECT * FROM user WHERE id_user =".$_SESSION['id_user']." ");

            $gerai = querysatudata("SELECT * FROM gerai WHERE id_gerai =".$user['id_gerai']." ");
            
            $nama_gerai = $gerai['cabang'];

          }else{
            $nama_gerai = "";
          }

        ?>

      <h3 class="page-title">Penjualan Gerai <?= $nama_gerai ?></h3>
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
            <form action="<?= base_url('vapor/penjualan_gerai/aksi.php') ?>" method="post" enctype="multipart/form-data">
              <?php  $nomer_penjualan = strtotime(date('Y-m-d H:i:s')); ?>
              <input type="hidden" name="nomer_penjualan" value="<?= $nomer_penjualan ?>" id="">
              <button name="btnTAMBAHPENJUALAN" type="submit" class="btn btn-primary"> + Tambah</button>
            </form>
          </h6>
        </div>
        <div class="card-body  pb-3 text-center">

          <table id="table_id" class="table mb-0 row-border">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">#</th>
                <th scope="col" class="border-0">Nomor Penjualan</th>
                <th scope="col" class="border-0">Total</th>
                <th scope="col" class="border-0">Status Penjualan</th>
                <th scope="col" class="border-0">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              
              if($_SESSION['hakakses'] == 3){

                $penjualan_gerai = querybanyak("SELECT * FROM penjualan_gerai 
                JOIN keranjang_gerai ON penjualan_gerai.id_penjualan_gerai = keranjang_gerai.id_penjualan_gerai
                WHERE keranjang_gerai.id_stok_gerai = ".$gerai['id_gerai']."");
                
              }else{

                $penjualan_gerai = querybanyak('SELECT * FROM penjualan_gerai');
              }
              $no = 1;               
              foreach ($penjualan_gerai as $penj) : ?>
                <tr>
                  <td> <?= $no++ ?></td>
                  <td><?=  $penj['nomor_penjualan'] ?></td>
                  <td><?=  rupiah($penj['total_penjualan']) ?></td>
                  <td>
                    <?php 
                      if($penj['status_penjualan_gerai'] == 0){
                        echo "Belum Bayar";

                      }elseif($penj['status_penjualan_gerai'] == 1){
                        echo "Selesai";
                      }
                    ?>
                  </td>
                  <td> 
                    <?php 
                      if($penj['status_penjualan_gerai'] == 0){
                    ?>
                    <a href="<?= base_url('vapor/index.php?halaman=penjualan_gerai_keranjang&id_penjualan_gerai=' .  $penj['id_penjualan_gerai']) ?>" type="button" class="btn btn-success"> Edit</a>
                    <a href="<?= base_url('vapor/penjualan_gerai/aksi.php?hapus=' .  $penj['id_penjualan_gerai']) ?>" type="button" class="btn btn-danger"> Hapus</a>

                    <?php
                      }elseif($penj['status_penjualan_gerai'] == 1){
                    ?>
                      <a target="_blank" href="<?= base_url('vapor/penjualan_gerai/cetak.php?id_penjualan_gerai=' .  $penj['id_penjualan_gerai']) ?>" class="btn btn-warning"> Cetak</a>

                    <?php
                      }
                    ?>

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