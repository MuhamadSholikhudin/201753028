<div class="main-content-container container-fluid px-4">
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Page</span>
    <h3 class="page-title">Harga Barang</h3>
  </div>
</div>
<!-- End Page Header -->

<!-- Small Stats Blocks -->
<div class="row">
<?= $this->session->flashdata('pesan'); ?>

</div>
<!-- End Small Stats Blocks -->

<!-- Small Stats Blocks -->
<div class="row">
    <div class="col-lg-4">
        <div class="card card-small mb-4 pt-3">
            <div class="card-header border-bottom text-center">
            <div class="mb-3 mx-auto">
                <img src="<?= base_url('uploads/barang/') ?>61.png" alt="User Avatar" width="100%"> </div>
           
            </div>
            <ul class="list-group list-group-flush">
         
            <li class="list-group-item p-4">
                <strong class="text-muted d-block mb-2">Description</strong>
                <span>
                    <?= $barang->deskripsi ?>
                </span>
            </li>
            </ul>
        </div>
        </div>
        <div class="col-lg-8">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
            <h6 class="m-0"><?= $barang->nama_barang ?></h6>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                <div class="col">
                    <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="feFirstName">First Name</label>
                        <input type="text" class="form-control" id="feFirstName" placeholder="First Name" value="Sierra"> </div>
                        <div class="form-group col-md-6">
                        <label for="feLastName">Last Name</label>
                        <input type="text" class="form-control" id="feLastName" placeholder="Last Name" value="Brooks"> </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="feEmailAddress">Email</label>
                        <input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="sierra@example.com"> </div>
                        <div class="form-group col-md-6">
                        <label for="fePassword">Password</label>
                        <input type="password" class="form-control" id="fePassword" placeholder="Password"> </div>
                    </div>
                    <div class="form-group">
                        <label for="feInputAddress">Address</label>
                        <input type="text" class="form-control" id="feInputAddress" placeholder="1234 Main St"> </div>
                    <div class="form-row">
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
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="feDescription">Description</label>
                        <textarea class="form-control" name="feDescription" rows="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-accent">Update Account</button>
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