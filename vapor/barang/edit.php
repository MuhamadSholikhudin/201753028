<div class="main-content-container container-fluid px-4">
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Halaman Edit</span>
    <h3 class="page-title">Barang</h3>
  </div>
</div>
<!-- End Page Header -->

    <!-- Small Stats Blocks -->
  <div class="row">
    <div class="col-lg-6">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Form Edit Barang</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?= base_url('pemilik/barang/aksi_edit') ?>" enctype="multipart/form-data" method="POST">
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="hidden" class="form-control" id="id_barang"  name="id_barang" value="<?= $barang->id_barang ?>" > 
                                <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang" name="nama_barang" value="<?= $barang->nama_barang ?>" > 
                              </div>
                              <!-- <div class="form-group col-md-6">
                                <label for="feLastName">Last Name</label>
                                <input type="text" class="form-control" id="feLastName" placeholder="Last Name" value="Brooks"> 
                              </div> -->
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" id="stok" min="1"  name="stok_barang" value="<?= $barang->stok_barang ?>"> 
                              </div>
                            </div>

                            <div class="form-group">
                                <label for="feInputState">Kategori</label>
                                <select id="feInputState" class="form-control" name="id_kategori">
                                  <?php foreach($kategori as $jb): ?>
                                  <?php if($jb->id_kategori == $barang->id_kategori){ ?>
                                      <option value="<?= $jb->id_kategori ?>" selected><?= $jb->kategori ?></option>
                                  <?php }else{?>
                                      <option value="<?= $jb->id_kategori ?>" ><?= $jb->kategori ?></option>
                                  <?php } ?>
                                  <?php endforeach; ?>
                                </select>
                             </div>
                            <div class="form-group">
                                <label for="feInputState">Status barang</label>
                                <select id="feInputState" class="form-control" name="status_barang">
                                  <?php 
                                  $status_barang = [1, 2, 3, 4]; 
                                  $is_active = ["Aktif" => 1, "Tidak Aktif" =>0];
                                  ?>
                
                                  <?php foreach($is_active as $x => $x_value): ?>
                                    <?php if($x_value == $barang->status_barang ){ ?>
                                        <option value="<?= $x_value ?>" selected><?= $x ?></option>
                                    <?php }else{?>
                                        <option value="<?= $x_value ?>" ><?= $x ?></option>
                                    <?php } ?>
                                  <?php endforeach; ?>
                                </select>
                             </div>
                            <!-- <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feInputCity">City</label>
                                <input type="text" class="form-control" id="feInputCity"> </div>
                              <div class="form-group col-md-4">
                                <label for="feInputState">State</label>
                                <select id="feInputState" class="form-control">
                                  <option selected="">Choose...</option>
                                  <option>...</option>
                                </select>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip"> </div>
                            </div> -->
                            <div class="form-row">
                              <div class="form-group ">
                                <label for="gambar">Gambar Barang</label>
                              <img src="<?= base_url('uploads/barang/'). $barang->gambar ?>" id="output"/>                                
                                <input type="file" class="form-control" id="gambar"  name="gambar" accept="image/png, image/jpeg, image/jpg, image/img" onchange="loadFile(event)"> 

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
                                <textarea class="form-control" name="deskripsi"><?= $barang->deskripsi ?></textarea>
                              </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-accent">Update Account</button>  -->
                            <button type="submit" class="btn btn-accent">Submit</button>
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