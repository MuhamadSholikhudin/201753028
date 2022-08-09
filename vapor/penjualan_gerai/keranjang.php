<?php
if (isset($_GET['id_penjualan_gerai'])) {
    echo $id_penjualan_gerai = $_GET['id_penjualan_gerai'];
    $penjualan_gerai = querysatudata("SELECT * FROM penjualan_gerai WHERE id_penjualan_gerai =" . $_GET['id_penjualan_gerai'] . " ");
}
?>
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

                            <input type="text" id="searchkeranjang" class="form-control" name="nomer_penjualan" placeholder="KETIKKAN NAMA BARANG UNTUK MENALPILKAN BARANG" style="width:400px;">
                            <input type="text" id="id_penjualan_gerai" class="form-control d-none" name="" value="<?= $id_penjualan_gerai; ?>" style="width:400px;">
                        </form>
                        <!-- <button onclick="keluar();">keluar</button> -->
                    </h6>
                    <h6 class="pt-2 align-content-lg-end">
                        &nbsp;&nbsp;&nbsp;
                        MOMOR PENJUALAN : <?= $penjualan_gerai['nomor_penjualan'] ?>

                    </h6>
                </div>
                <div class="card-body  pb-3 text-center">
                    <h1 id="keluar"></h1>
                    <div>
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <table id="hasil_cari" class="table" border="1">

                    </table>

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
                                <th scope="col" class="border-0">Nama Produk</th>
                                <th scope="col" class="border-0">Banyak</th>
                                <th scope="col" class="border-0">Harga</th>
                                <th scope="col" class="border-0">Jumlah harga</th>
                                <th scope="col" class="border-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $keranjang_gerai = querybanyak("SELECT * FROM keranjang_gerai JOIN stok_gerai ON keranjang_gerai.id_stok_gerai = stok_gerai.id_stok_gerai WHERE id_penjualan_gerai =" . $_GET['id_penjualan_gerai'] . "");
                            foreach ($keranjang_gerai as $penj) : ?>
                                <tr>
                                    <td> <?= $no++ ?></td>
                                    <td>
                                        <?php
                                        $produk = querysatudata("SELECT * FROM produk WHERE id_produk = " . $penj['id_produk'] . "");
                                        ?>
                                        <?= $produk['nama_produk'] ?>
                                    </td>
                                    <td>
                                        <?php

                                        $stok_gerai_sekarang = $penj['stok_gerai'];

                                        $qtykeranjang = $penj['banyak'];

                                        $max_stok = $qtykeranjang + $stok_gerai_sekarang;

                                        ?>
                                        <input type="number" name="qty" class="form-control qty" value="<?= $penj['banyak'] ?>" id="qty<?= $penj['id_keranjang_gerai'] ?>" data-id="<?= $penj['id_keranjang_gerai'] ?>" min="1" max="<?= $max_stok ?>">
                                    </td>
                                    <td id="harga<?= $penj['id_keranjang_gerai'] ?>"><?= $penj['jumlah_harga'] ?></td>
                                    <td id="jumlah_harga<?= $penj['id_keranjang_gerai'] ?>"><?= $penj['jumlah_harga'] *  $penj['banyak']  ?></td>
                                    <td>
                                        <a href="<?= base_url('pemilik/keranjang_gerai/hapus/' .  $penj['id_keranjang_gerai']) ?>"> <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                        <form action="<?= base_url('vapor/penjualan_gerai/aksi.php') ?>" method="POST" enctype="multipart/form-data">
                            <tfoot>
                                <?php
                                $jumlah_total = 0;
                                foreach ($keranjang_gerai as $penj) {
                                    $jumlah_total += $penj['jumlah_harga'] *  $penj['banyak'];
                                }
                                ?>
                                <tr>
                                    <th scope="col" class="border-0"></th>
                                    <th scope="col" class="border-0"></th>
                                    <th scope="col" class="border-0">
                                        <input type="hidden" name="total_penjualan" value="<?= $jumlah_total ?>" id="total_belanja">
                                    </th>
                                    <th scope="col" class="border-0">
                                    </th>
                                    <th scope="col" id="total_belanjahtml">
                                        <?= $jumlah_total ?>
                                    </th>
                                    <th scope="col" class="border-0"> </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="border-0">Tunai</th>
                                    <th scope="col" class="border-0"><input type="number" name="bayar_tunai" id="bayar"></th>
                                    <th scope="col" class="border-0">Kembalian</th>
                                    <th scope="col" class="border-0"><input type="number" name="kembalian" id="kembali"></th>
                                    <th scope="col" class="border-0">
                                    </th>
                                    <th scope="col" class="border-0">
                                        <input type="number" name="id_pejualan_gerai" value="<?= $_GET['id_penjualan_gerai'] ?>" id="">
                                        <button class="btn btn-primary" name="btnBAYARPENJUALAN" id="proses_bayar">Bayars</button>
                                    </th>
                                </tr>
                            </tfoot>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Small Stats Blocks -->


</div>