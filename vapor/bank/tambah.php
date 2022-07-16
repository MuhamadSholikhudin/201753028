<div class="main-content-container container-fluid px-4">
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Halaman Tambah</span>
    <h3 class="page-title">Bank</h3>
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
                          <form action="<?= base_url('pemilik/bank/aksi_tambah') ?>" enctype="multipart/form-data" method="POST">
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="nama_bank">Nama Bank</label>
                                <input type="text" class="form-control" id="nama_bank" placeholder="Nama Bank" name="nama_bank" > 
                              </div>

                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="no_rekening">Nomer rekening</label>
                                <input type="number" class="form-control" id="no_rekening"  name="no_rekening" > 
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="tutorial_pembayaran">Tutorial Pembayaran</label>
                                <textarea class="form-control" name="tutorial_pembayaran" id="tutorial_pembayaran" >
                                
                                </textarea>
                                <!-- <input type="text" class="form-control" id="tutorial_pembayaran" placeholder="Last Name" value="Brooks"> -->

                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="atas_nama">Atas Nama</label>
                                <input type="text" class="form-control" id="atas_nama"  name="atas_nama" > 
                              </div>
                            </div>

                            <div class="form-group">
                                <label for="feInputState">Status Bank</label>
                                <select id="feInputState" class="form-control" name="status_bank">
                                  <option value="1" selected>1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
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
                                <label for="gambar_logo">Gambar Logo</label>
                              <img id="output"/>                                
                                <input type="file" class="form-control" id="gambar_logo"  name="gambar_logo" accept="image/png, image/jpeg, image/jpg, image/img" onchange="loadFile(event)"> 

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
                            <!-- <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" >

                                </textarea>
                              </div>
                            </div> -->
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