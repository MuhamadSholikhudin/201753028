<?php
if (isset($_GET['id_pengiriman'])) {
    $pengiriman = querysatudata(
        'SELECT * FROM pengiriman JOIN pembayaran ON pengiriman.id_pembayaran = pembayaran.id_pembayaran WHERE id_pengiriman = ' . $_GET['id_pengiriman'] . ''
    );
}
?>
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Page</span>
            <h3 class="page-title">pengiriman</h3>
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
                        Bukti Pengiriman NO Pembayaran : <?= $pengiriman['nomor_pembayaran'] ?>
                    </h6>
                </div>
                <div class="card-body  pb-3 ">
                    <div class="card-body bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?= base_url('vapor/pengiriman/aksi.php') ?>" enctype="multipart/form-data" method="POST">
                                <input type="hidden" class="form-control" name="id_pengiriman" value="<?= $_GET['id_pengiriman'] ?>">
                                    
                                <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="feDescription">Keterangan</label>
                                            <textarea class="form-control" name="keterangan" require><?= $pengiriman['keterangan'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group ">
                                            <label for="gambar">Bukti Pengiriman</label>
                                            <img id="output" src="<?= base_url("gambar/buktipengiriman/").$pengiriman['bukti_pengiriman'] ?>" />
                                            <input type="file" class="form-control" id="gambar" name="bukti_pengiriman" accept="image/png, image/jpeg, image/jpg, image/img" onchange="loadFile(event)" require>
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

                                    <!-- <button type="submit" class="btn btn-accent">Update Account</button>  -->
                                    <button type="submit" name="btnSIMPANBUKTIPENGIRIMAN" class="btn btn-accent">Submit</button>
                                </form>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- End Small Stats Blocks -->

    </div>
</div>