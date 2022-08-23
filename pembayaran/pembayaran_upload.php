<?php
if (isset($_GET['id_pembayaran'])) {
    $pembayaran = querysatudata("SELECT * FROM pembayaran JOIN bank ON pembayaran.id_bank = bank.id_bank WHERE id_pembayaran = " . $_GET['id_pembayaran'] . "");
}
?>
<!-- Start Checkout -->
<section class="shop checkout section">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 col-12 ">

                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TAGIHAN
                        <div class="content">
                            <ul>
                                <li class="last">

                                </li>

                                <li class="text-center">
                                    <b>
                                        Total Tagihan
                                    </b>

                                    <h3>
                                        <?= rupiah($pembayaran['total_pembayaran']) ?>
                                        </h1>
                                </li>
                                <li>
                                    <br><br>
                                    Nomer Pembayaran <br>
                                    <?= $pembayaran['nomor_pembayaran'] ?>
                                    <br>
                                    <br>

                                    <?= $pembayaran['nama_bank'] ?> <br>
                                    NO. REK : 58348329439 <br><br>

                                    <!-- Pembayaran dimulai <br>
                                    09:12 <br><br>

                                    Pembayaran kadaluarsa <br>
                                    21:12 <br><br>
                                    Segera lengkapi pembayaran anda dalam 12 jam. <br> -->

                                </li>
                            </ul>
                        </div>
                    </div>

                </div>


            </div>
            <div class="col-lg-7 col-12">
                <div class="order-details mb-3">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
                        if ($pembayaran['status_pembayaran'] == 1) {
                            echo ' Silahkan Upload Bukti pembayaran Anda ';
                        } elseif ($pembayaran['status_pembayaran'] == 2) {
                            echo 'Bukti pembayaran Anda Upload tidak valid';
                        } elseif ($pembayaran['status_pembayaran'] == 3) {
                            echo 'Bukti pembayaran Anda Berhasil di upload tunggu konfirmasi pembayaran';
                        } elseif ($pembayaran['status_pembayaran'] == 4) {
                            echo ' Pembayaran berhasil di konfirmasi ';
                        }
                        ?>

                        <div class="content">

                            <ul>
                                <li class="last">
                                </li>
                                <li>
                                    Berikut langkah-langkah untuk melengkapi pembayaran. <br>
                                    1. Login aplikasi dengan username dan password <br>
                                    2. Pilih menu pembayaran, pilih pembayaran yang belum complete. <br>
                                    3. klik upload bukti pembayran dan save <br>
                                    4. Tunggu sampai proses selesai <br>
                                    5. Pembayaran Berhasil di upload tinggal menunggu konfirmasi dari admin
                                </li>
                            </ul>
                        </div>
                    </div>


                    <form action="<?= base_url('pembayaran/aksi.php') ?>" method="post" enctype="multipart/form-data">

                        <div class="single-widget">
                            <div class="content">
                                <ul>
                                    <li>
                                        <input type="file" name="butkipembayaran" class="form-control " id="" required>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="single-widget get-button">
                            <div class="content">
                                <div class="button">
                                    <input type="hidden" name="id_pembayaran" value="<?= $pembayaran['id_pembayaran'] ?>" id="" >
                                    <button type="submit" name="btnUPLOADBUKTIPEMBAYARAN" class="btn">Upload Pembayaran</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <?php
                if ($pembayaran['status_pembayaran'] == 3) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Selamat !</strong> Upload Pembayaran anda berhasil dikirim.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
                ?>



            </div>


        </div>
    </div>

    <!--/ End Checkout -->
    <div style="height:50px;">
    </div>