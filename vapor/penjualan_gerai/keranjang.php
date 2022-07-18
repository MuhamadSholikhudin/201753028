<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Page</span>
            <h3 class="page-title">Penjualan Gerai</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Small Stats Blocks -->
    <div class="row">

    </div>
    <!-- End Small Stats Blocks -->
    <div class="row">
        <div class="col">
        <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">
                        <form action="<?= base_url('vapor/penjualan_gerai/aksi.php') ?>" method="post" enctype="multipart/form-data">
                        
                            <input type="text" id="searchkeranjang" class="form-control" name="nomer_penjualan" placeholder="KETIKKAN NAMA BARANG UNTUK MENALPILKAN BARANG"  style="width:400px;">
                        </form>
                        <button onclick="keluar();">keluar</button>
                    </h6>
                </div>
                <div class="card-body  pb-3 text-center">
                    <h1 id="keluar"></h1>

                </div>
            </div>

        </div>
    </div>

    <!-- Small Stats Blocks -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header text-center border-bottom ">
                    <h6 style="margin:auto;">
                       DAFTAR KERANJANG PENJUALAN
                    </h6>
                </div>
                <div class="card-body  pb-3 text-center">

                    <table id="table_id" class="table mb-0 row-border">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#</th>
                                <th scope="col" class="border-0">Nama Gerai</th>
                                <th scope="col" class="border-0">Cabang</th>
                                <th scope="col" class="border-0">Alamat Gerai</th>
                                <th scope="col" class="border-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $keranjang_gerai = querybanyak('SELECT * FROM keranjang_gerai');
                            foreach ($keranjang_gerai as $penj) : ?>
                                <tr>
                                    <td> <?= $no++ ?></td>
                                    <td><?= $penj['nomor_penjualan'] ?></td>
                                    <td><?= $penj['id_stok_gerai'] ?></td>
                                    <td><?= $penj['jumlah_harga'] ?></td>
                                    <td> <a href="<?= base_url('vapor/index.php?halaman=keranjang_gerai_edit&id_keranjang_gerai=' .  $penj['id_keranjang_gerai']) ?>" type="button" class="btn btn-success"> Edit</a>
                                        <a href="<?= base_url('pemilik/keranjang_gerai/hapus/' .  $penj['id_keranjang_gerai']) ?>" type="button" class="btn btn-danger"> Hapus</a>
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