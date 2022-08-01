<div class="col-lg-9 col-md-8 col-12">
    <div class="card bg-light mb-3 mt-2" style="max-width: 50rem;">
        <div class="card-header" style="background-color: #F7941D; color:#fff;">
            DATA PENGIRIMAN <?= $_SESSION['username'] ?>
        </div>

        <!-- Large modal -->



        <div class="card-body bg-white">
            <?php
            //Membuat varialbel username dari session login username
            $username = $_SESSION['username'];

            //Mencari data profile dari tabel user
            $profile = querysatudata("SELECT * FROM user WHERE username = '$username' ");
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th>Alamat Tujuan</th>
                        <th>Bukti Pengiriman</th>
                        <th>Tanggal Pengiriman</th>
                        <th>Status Pengiriman</th>
                        <th>Aksi</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $pengirimans = querybanyak('SELECT * FROM pengiriman WHERE id_user = ' . $profile['id_user'] . '');

                    foreach ($pengirimans as $pengiriman) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td>
                                <?= $pengiriman['provinsi'] . " " . $pengiriman['kota'] . " " . $pengiriman['kecamatan'] . " " . $pengiriman['kode_pos'] . " " . $pengiriman['alamat_jalan']  ?> <br>
                                <?= $pengiriman['alamat_lengkap']  ?>
                            </td>
                            <td>
                                <?php if ($pengiriman['bukti_pengiriman'] !== NULL) { ?>
                                    <img src="<?= base_url("gambar/buktipengiriman/") . $pengiriman['bukti_pengiriman'] ?>" width="40px" alt="logo" data-toggle="modal" data-target=".bd-example-modal-lg<?= $pengiriman['id_pengiriman'] ?>" />


                                    <div class="modal fade bd-example-modal-lg<?= $pengiriman['id_pengiriman'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <img src="<?= base_url("gambar/buktipengiriman/") . $pengiriman['bukti_pengiriman'] ?> ?>" height="200px" alt="logo" />

                                            </div>
                                        </div>
                                    </div>

                                <?php } else { ?>


                                <?php } ?>
                            </td>
                            <td><?= $pengiriman['tanggal_pengiriman'] ?></td>
                            <td>
                                <?php if ($pengiriman['status_pengiriman'] == 1) { ?>
                                    Belum Dikirim
                                <?php } elseif ($pengiriman['status_pengiriman'] == 2) { ?>
                                    Proses Dikirim
                                <?php } elseif ($pengiriman['status_pengiriman'] == 3) { ?>
                                    Selesai
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($pengiriman['status_pengiriman'] == 1) { ?>
                                    Tungguh Pengiriman
                                <?php } elseif ($pengiriman['status_pengiriman'] == 2) { ?>
                                    <a href="<?= base_url('pengiriman/aksi.php?id_pengiriman=').$pengiriman['id_pengiriman'] ?>&status_pengiriman=3" target="_blank" class="single-icon badge btn-success text-white"><i class="ti-check-box"></i> <span class="total-count">Klaim Sudah Terkirim</span></a>
                                <?php } elseif ($pengiriman['status_pengiriman'] == 3) { ?>
                                    Selesai
                                <?php } ?>
                            </td>
                        </tr>
                    <?php $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>