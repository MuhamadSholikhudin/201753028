<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Page</span>
            <h3 class="page-title">Laporan Penjualan</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Small Stats Blocks -->


    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Laporan Data Penjualan Online</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <strong class="text-muted d-block mb-2">Keterangan</strong>
                                <div class="form-group">
                                    Tanggal Awal
                                </div>
                                <div class="form-group">
                                    Tanggal Akhir
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <strong class="text-muted d-block mb-2">Form</strong>
                                <form action="<?= base_url("vapor/laporan/aksi.php") ?>" method="POST">
                                    <div class="form-group">
                                        <input type="date" class="form-control is-valid" id="validationServer01" name="tanggal_awal" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control is-valid" id="validationServer02" name="tanggal_akhir" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="cetak_online" name="cetak">
                                        <button type="submit" class="form-control is-invalid" id="validationServer03" value="prosesonline"> Proses </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <!-- Sliders & Progress Bars -->
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Laporan Data Penjualan Gerai</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <strong class="text-muted d-block mb-2">Keterangan</strong>
                                <div class="form-group">
                                    Tanggal Awal
                                </div>
                                <div class="form-group">
                                    Tanggal Akhir
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <strong class="text-muted d-block mb-2">Form</strong>
                                <form action="<?= base_url("vapor/laporan/aksi.php") ?>" method="POST">
                                    <div class="form-group">
                                        <input type="date" class="form-control is-valid" id="validationServer01" name="tanggal_awal" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control is-valid" id="validationServer02" name="tanggal_akhir" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="cetak_gerai" name="cetak">
                                        <button type="submit" class="form-control is-invalid" id="validationServer03" value="prosesonline"> Proses </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- End Small Stats Blocks -->

    <!-- Small Stats Blocks -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">

            </div>
        </div>
    </div>
    <!-- End Small Stats Blocks -->


</div>