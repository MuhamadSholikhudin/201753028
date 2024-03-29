<?php
if (isset($_GET['id_penjualan_gerai'])) {
    $id_penjualan_gerai = $_GET['id_penjualan_gerai'];
    $penjualan_gerai = querysatudata("SELECT * FROM penjualan_gerai WHERE id_penjualan_gerai =" . $_GET['id_penjualan_gerai'] . " ");

    if($_SESSION['hakakses'] == 3){

        $user = querysatudata("SELECT * FROM user WHERE id_user =".$_SESSION['id_user']." ");

        $gerai = querysatudata("SELECT * FROM gerai WHERE id_gerai =".$user['id_gerai']." ");
        
       echo $nama_gerai = $gerai['cabang'];
       echo $id_gerai = $gerai['id_gerai'];

    }else{
           
        echo $nama_gerai = "";
           
           //gerai rajavapor gebog
           echo $id_gerai = 3;
    }

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
                        <input type="text" id="id_gerai" name="id_gerai" value="<?= $id_gerai ?>" class="form-control" >
                        <input type="text" id="searchkeranjang" class="form-control" name="nomer_penjualan" placeholder="KETIKKAN NAMA BARANG UNTUK MENALPILKAN BARANG" style="width:400px;">
                        <input type="text" id="id_penjualan_gerai" class="form-control d-none" name="" value="<?= $id_penjualan_gerai; ?>" style="width:400px;">
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
                                    <td id="harga<?= $penj['id_keranjang_gerai'] ?>"><?= $produk['harga_produk'] ?></td>
                                    <td id="jumlah_harga<?= $penj['id_keranjang_gerai'] ?>"><?= $penj['jumlah_harga']?></td>
                                    <td>
                                        <a href="<?= base_url('vapor/penjualan_gerai/aksi.php?id_penjualan_gerai='.$penj['id_penjualan_gerai'].'&id_keranjang_gerai=' .  $penj['id_keranjang_gerai']) ?>"> <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
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
                                        <input type="hidden" name="total_penjualan" value="<?= $penjualan_gerai['total_penjualan'] ?>" class="total_belanja"  id="total_belanja">
                                    </th>
                                    <th scope="col" class="border-0">
                                    </th>
                                    <th scope="col" class="total_belanja" id="total_belanjahtml">
                                        <?= $penjualan_gerai['total_penjualan'] ?>
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
                                            <input type="hidden" name="id_pejualan_gerai" value="<?= $_GET['id_penjualan_gerai'] ?>" id="">
                                            <button class="btn btn-primary"  onClick="klikinput();" id="butonbayar" disabled>Bayar</button>
                                            <script>
                                                function klikinput(){
                                                    var proses_bayar = document.getElementById("proses_bayar");
                                                    proses_bayar.click(); 
                                                    // alert("OKE");
                                                }
                                            </script>
                                        </th>
                                </tr>
                            </tfoot>
                    </table>
                    <form action="<?= base_url('vapor/penjualan_gerai/aksi.php') ?>" class="d-none" method="POST" >
                        <input type="number" name="bayar_tunai" id="bayarinput">
                        <input type="number" name="kembalian" class="kembali">
                        <input type="hidden" name="id_pejualan_gerai" value="<?= $_GET['id_penjualan_gerai'] ?>" id="">
                        <button class="btn btn-primary" type="submit" name="btnBAYARPENJUALAN" id="proses_bayar">Bayar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- End Small Stats Blocks -->


</div>