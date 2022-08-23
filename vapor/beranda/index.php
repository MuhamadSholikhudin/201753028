<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Page</span>
            <h3 class="page-title">Beranda</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Small Stats Blocks -->


    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">User</span>
                            <h6 class="stats-small__value count my-3">
                                <?php
                                
                                $user = querysatudata("SELECT COUNT(id_user) as jumlah_user FROM user ");

                                echo $user['jumlah_user'];

                                ?>
                            </h6>
                        </div>
                        <div class="stats-small__data">
                            <!-- <span class="stats-small__percentage stats-small__percentage--increase">4.7%</span> -->
                        </div>
                    </div>
                    <canvas height="76" class="blog-overview-stats-small-1 chartjs-render-monitor" width="191" style="display: block; width: 191px; height: 76px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Gerai</span>
                            <h6 class="stats-small__value count my-3">
                                <?php 
                                    $gerai = querysatudata("SELECT COUNT(id_gerai) as jumlah_gerai FROM gerai ");

                                    echo $gerai['jumlah_gerai'];
                                ?>
                            </h6>
                        </div>
                        <div class="stats-small__data">
                            <!-- <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span> -->
                        </div>
                    </div>
                    <canvas height="76" class="blog-overview-stats-small-2 chartjs-render-monitor" width="191" style="display: block; width: 191px; height: 76px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Produk</span>
                            <h6 class="stats-small__value count my-3">
                            <?php 
                                $produk = querysatudata("SELECT COUNT(id_produk) as jumlah_produk FROM produk ");

                                echo $produk['jumlah_produk'];
                            ?>
                            </h6>
                        </div>
                        <div class="stats-small__data">
                            <!-- <span class="stats-small__percentage stats-small__percentage--decrease">3.8%</span> -->
                        </div>
                    </div>
                    <canvas height="76" class="blog-overview-stats-small-3 chartjs-render-monitor" width="191" style="display: block; width: 191px; height: 76px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Checkout online</span>
                            <h6 class="stats-small__value count my-3">
                            <?php 
                                $checkout = querysatudata("SELECT COUNT(id_checkout) as jumlah_checkout FROM checkout WHERE status_transaksi = 1");

                                echo $checkout['jumlah_checkout'];
                            ?>
                            </h6>
                        </div>
                        <div class="stats-small__data">
                            <!-- <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span> -->
                        </div>
                    </div>
                    <canvas height="76" class="blog-overview-stats-small-4 chartjs-render-monitor" width="191" style="display: block; width: 191px; height: 76px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-4 col-sm-12 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Pembayaran Online</span>
                            <h6 class="stats-small__value count my-3">
                            <?php 
                                $pembayaran = querysatudata("SELECT COUNT(id_pembayaran) as jumlah_pembayaran FROM pembayaran WHERE status_pembayaran > 1");

                                echo $pembayaran['jumlah_pembayaran'];
                            ?>
                            </h6>
                        </div>
                        <div class="stats-small__data">
                            <!-- <span class="stats-small__percentage stats-small__percentage--decrease">2.4%</span> -->
                        </div>
                    </div>
                    <canvas height="76" class="blog-overview-stats-small-5 chartjs-render-monitor" width="191" style="display: block; width: 191px; height: 76px;"></canvas>
                </div>
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