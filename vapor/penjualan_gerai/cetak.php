<?php
include '../../koneksi.php';
include '../../function.php';
if (isset($_GET['id_penjualan_gerai'])) {
    // echo $id_penjualan_gerai = $_GET['id_penjualan_gerai'];
    $penjualan_gerai = querysatudata("SELECT * FROM penjualan_gerai WHERE id_penjualan_gerai =" . $_GET['id_penjualan_gerai'] . " ");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .kop {
            /* height: 1010px;
            margin:0%; */
            border: 3px solid black;
        }

        .bawah {
            border-left: 3px solid black;
            border-right: 3px solid black;
            border-bottom: 3px solid black;
        }
    </style>

</head>

<body>


    <div class="kop">
        <h2 class="text-center" style="color:darkolivegreen;">RAJA VAPOR</h2>
        <h4 class="text-center">Kesenangan Anda Adalah Kesenangan Kami</h4>
        <div class="text-center">0840324734324</div>
    </div>
    <div class="bawah">
        <div class="container">
            <h4 class="text-center">Kwintansi</h4>

            <div class="row">
                <div class="col-md-12">
                    Tanggal : <?= date("Y-m-d") ?>
                </div>
                <div class="col-md-12">
                    Nomer &nbsp; &nbsp;: <?= $penjualan_gerai['nomor_penjualan'] ?>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>NO</td>
                                <td>Nama Produk</td>
                                <td>qty</td>
                                <td>Jumlah</td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $keranjang_gerai = querybanyak("SELECT * FROM keranjang_gerai WHERE id_penjualan_gerai =" . $_GET['id_penjualan_gerai'] . "");
                            //update status keranjang

                            $no = 1;
                            foreach ($keranjang_gerai as $keranjang_ger) {
                                $keranjang = querysatudata(
                                    "SELECT * FROM keranjang_gerai 
            JOIN stok_gerai ON keranjang_gerai.id_stok_gerai = stok_gerai.id_stok_gerai
            JOIN produk ON stok_gerai.id_produk = stok_gerai.id_produk
            WHERE keranjang_gerai.id_keranjang_gerai = " . $keranjang_ger['id_keranjang_gerai'] . ""
                                );
                            ?>

                                <tr>
                                    <td><?= $no ?></td>
                                    <td>
                                        <?= $keranjang['nama_produk'] ?>
                                    </td>
                                    <td><?= $keranjang['banyak'] ?> </td>
                                    <td><?= $keranjang['jumlah_harga'] ?></td>

                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                            <tr style="border: bottom 0;">
                                <td colspan="2"></td>
                                <td>Total : </td>

                                <td><?= $penjualan_gerai['total_penjualan'] ?></td>

                            </tr>
                            <tr>
                                <td>Tunai : <?= $penjualan_gerai['bayar_tunai'] ?></td>
                                <td>Kembalian : <?= $penjualan_gerai['kembalian'] ?></td>
                                <td> : </td>

                                <td></td>

                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <p>NB : Barang yang telah di beli tidak dapat dikembalikan</p>
                </div>
            </div>
        </div>
    </div>



    <script>
        window.print();
    </script>
</body>

</html>