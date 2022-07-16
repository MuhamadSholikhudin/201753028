<div class="main-content-container container-fluid px-4">
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Page</span>
    <h3 class="page-title">Barang</h3>
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
            
        <a href="<?= base_url('pemilik/barang/tambah/') ?>" type="button" class="btn btn-primary"> + Tambah</a>
        </h6>
      </div>
      <div class="card-body  pb-3 text-center">

      <table id="table_id" class="table mb-0 row-border">
        <thead class="bg-light">
          <tr>
            <th scope="col" class="border-0">#</th>
            <th scope="col" class="border-0">Nama Barang</th>
            <th scope="col" class="border-0">Kategori Barang</th>
            <th scope="col" class="border-0">Harga</th>
            <th scope="col" class="border-0">Status Barang</th>
            <th scope="col" class="border-0">Stok</th>
            <th scope="col" class="border-0">Deskripsi</th>
            <th scope="col" class="border-0">Aksi</th>
          </tr>
        </thead>
          <tbody>
          <?php $no = 1; ?>
          <?php 
        
        
        //Menampilkan data barang banyak dalam arrray
        $sql_barangs = "SELECT * FROM barang";
        $query_barangs = mysqli_query(
            $koneksi, 
        $sql_barangs);
        $no=1; //nilai awal nomer
        while ($bar = mysqli_fetch_array($query_barangs, MYSQLI_BOTH)){

    ?>
            <tr>
              <td>
                <a href="<?= base_url('pemilik/barang/detail/'. $bar['id_barang'] ) ?>">
                    <?= $no++ ?>
                </a>
              </td>
              <td><?= $bar['nama_barang'] ?></td>
              <td>
                <?php 
                echo $bar['id_kategori'];
                  // $kategori = $this->db->query("SELECT * FROM kategori WHERE id_kategori = $bar->id_kategori")->row();
                  // echo $kategori->kategori;
                ?>
              </td>
              <td>
                <?php 
                echo $bar['harga_barang'];
                /*
                     $num_harga = $this->db->query("SELECT * FROM harga_barang WHERE id_barang = $bar->id_barang")->num_rows();
                     
                     if($num_harga > 0){ ?>
                        <?php 
                            $harga = $this->db->query("SELECT * FROM harga_barang WHERE id_barang = $bar->id_barang")->row();
                        ?>
                      <a href="<?= base_url('pemilik/harga/barang/').$bar->id_barang ?>"><?= $harga->harga ?></a>
                    <?php }else{ ?>

                      <a href="<?= base_url('pemilik/harga/barang/').$bar->id_barang ?>"> Kosong</a>

                      <?php }
                      */
                ?>
              </td>
              <td>
              
              <?php
             
                  
                  if($bar['status_barang'] == 1){
                    echo "Aktif";
                  }else{
                    echo "Tidak Aktif";
                  }
                  
                ?>
              </td>
              <td><?= $bar['stok_barang'] ?></td>
              <td><?= $bar['deskripsi'] ?></td>
              <td>        <a href="<?= base_url_halaman('pemilik/barang/edit/'. $bar['id_barang']) ?>" type="button" class="btn btn-success"> Edit</a>
              <a href="<?= base_url_halaman('pemilik/barang/hapus/'. $bar['id_barang']) ?>" type="button" class="btn btn-danger"> Hapus</a>
              </td>
            </tr>
            <?php 
                //auto increment nomer
                $no++;
            }
        ?>
       
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- End Small Stats Blocks -->


</div>