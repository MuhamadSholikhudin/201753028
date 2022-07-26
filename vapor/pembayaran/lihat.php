<?php
session_start();
include '../../function.php';
if (isset($_GET['id_pembayaran'])) {
    $pembayaran = querysatudata(
        'SELECT * FROM pembayaran  JOIN bank ON pembayaran.id_bank = bank.id_bank
        JOIN user ON pembayaran.id_user = user.id_user WHERE id_pembayaran = ' .$_GET['id_pembayaran'] .''
    );
}
echo $pembayaran['total_pembayaran'];
include '../../template_organisasi/header.php';
include '../../template_organisasi/sidebar.php';
?>


<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Page</span>
      <h3 class="page-title">Pembayaran</h3>
    </div>
  </div>
  <!-- End Page Header -->

  <!-- Small Stats Blocks -->
  <div class="row">
    

  

  </div>
  <!-- End Small Stats Blocks -->

  <!-- Small Stats Blocks -->
  <div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">

            Bukti Pembayaran 
          </h6>
        </div>
        <div class="card-body  pb-3 text-center">

       
	<div class="card-body bg-white">
        <div class="row">
            <div class="col-md-4">
                <table>
                   
                <tbody>
                    <tr>
                        <td>Nomor </td>
                        <td>&nbsp; : &nbsp;</td>
                        <td><?= $pembayaran['nomor_pembayaran'] ?></td>
                    </tr>
                    <tr>
                        <td>Pembeli</td>
                        <td>&nbsp; : &nbsp;</td>
                        <td><?= $pembayaran['nama_lengkap'] ?></td>
                    </tr>
                    <tr>
                        <td>Total Pembayaran</td>
                        <td>&nbsp; : &nbsp;</td>
                        <td><?= $pembayaran['total_pembayaran'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>&nbsp; : &nbsp;</td>
                        <td><?= $pembayaran['tanggal_pembayaran'] ?></td>
                    </tr>
                </tbody>
                </table>

            </div>
            <div class="col-md-8">
                <img src="<?= 'http://localhost/201753028/gambar/butkipembayaran/' .
                    $pembayaran[
                        'bukti_pembayaran'
                    ] ?>" width="500px" heigth="500px style="" alt="logo">

            </div>
        </div>
			

        </div>
      </div>
    </div>
  </div>
  <!-- End Small Stats Blocks -->




</div>
</div>

<?php include '../../template_organisasi/footer.php'; ?>

