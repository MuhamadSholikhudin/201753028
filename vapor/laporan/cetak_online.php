<?php
include '../../koneksi.php';
include '../../function.php';
// if (isset($_GET['id_penjualan_gerai'])) {
//     // echo $id_penjualan_gerai = $_GET['id_penjualan_gerai'];
//     $penjualan_gerai = querysatudata("SELECT * FROM penjualan_gerai WHERE id_penjualan_gerai =" . $_GET['id_penjualan_gerai'] . " ");
// }
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
        <h2 class="text-center" style="color:darkolivegreen;">LAPORAN PENJUALAN ONLINE RAJA VAPOR</h2>
        <h4 class="text-center">Tanggal <?= $_GET['tanggal_awal'] ?> Sampai <?= $_GET['tanggal_akhir'] ?></h4>
    </div>
    <div class="bawah">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nomer Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Bank</th>
                                <th>Bukti Pembayaran</th>
                                <th>Pembeli</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                $total_penjualan = 0;
                                $pembayarans = querybanyak("SELECT * FROM pembayaran WHERE tanggal_pembayaran  BETWEEN '".$_GET['tanggal_awal']."' AND '".$_GET['tanggal_akhir']."'");
                                foreach($pembayarans as $pembayaran){
                                    $total_penjualan += $pembayaran['total_penjualan'];
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $pembayaran['nomor_pembayaran'] ?></td>
                                    <td><?= rupiah($pembayaran['tanggal_pembayaran']) ?></td>
                                    <td>
                                        <?php 
                                            $bank = querysatudata("SELECT * FROM bank WHERE id_bank = ".$pembayaran['id_bank']." ");
                                            echo $bank['nama_bank'];
                                        ?>
                                    </td>
                                    <td>Bukti Pembayaran</td>
                                    <td>
                                        <?php 
                                            $user = querysatudata("SELECT * FROM user WHERE id_user = ".$pembayaran['id_user']." ");
                                            echo $user['nama_lengkap'];
                                        ?>
                                    </td>
                                    <td><?= rupiah($pembayaran['total_pembayaran']) ?></td>
                                </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total</th>
                                <th>:</th>
                                <th><?= rupiah($total_penjualan) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                    <br>
                    <br>
                    <p>NB : Laporan Berdasarkan Pada pada tanggal inputan tertentu</p>
                </div>
            </div>
        </div>
    </div>



    <script>
        window.print();
    </script>
</body>

</html>