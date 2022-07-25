<?php
include '../function.php';
if (isset($_GET['id_pembayaran'])) {
    $pembayaran = querysatudata(
        'SELECT * FROM pembayaran  JOIN bank ON pembayaran.id_bank = bank.id_bank
        JOIN user ON pembayaran.id_user = user.id_user WHERE id_pembayaran = '.
            $_GET['id_pembayaran'] .
            ''
    );
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

.kop{
            /* height: 1010px;
            margin:0%; */
            border: 3px solid black;
        }
.bawah{
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
                    Nama &nbsp; &nbsp;: <?= $pembayaran['nama_lengkap'] ?>
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
$checkout = querysatudata("SELECT * FROM checkout WHERE id_checkout = ".$pembayaran['id_checkout']."");
                                //update status keranjang
    $explode_id_keranjang = explode(",", $checkout['id_keranjang']);

    $no=1;
    foreach ($explode_id_keranjang as $id_keranjang) { 
        $keranjang = querysatudata(
            'SELECT * FROM keranjang JOIN produk ON keranjang.id_produk = produk.id_produk WHERE id_keranjang = '.$id_keranjang.'');
    ?>

                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                <?= $keranjang['nama_produk'] ?> 
                                </td>
                                <td><?= $keranjang['jumlah_keranjang'] ?> </td>
                                <td><?= $keranjang['harga_keranjang'] ?></td>
                                
                            </tr>
                            <?php  
                            $no++;
    }
    ?>
              <tr>
                                <td colspan="2"></td>
                                <td >Total : </td>
                                
                                <td><?= $pembayaran['total_pembayaran'] ?></td>
                                
                            </tr>
                        </thead>
                    </table>
                    <br>
                    <br>
                    <p>NB : Telah melakaukan pembayaran dengan melalui <?= $pembayaran['nama_bank'] ?></p>
                </div>
             </div>
        </div>
</div>



    <script>
        window.print();
    </script>
</body>

</html>