<?php
include '../../function.php';
if (isset($_GET['id_pembayaran'])) {
    $pembayaran = querysatudata(
        'SELECT * FROM pembayaran  JOIN bank ON pembayaran.id_bank = bank.id_bank
        JOIN user ON pembayaran.id_user = user.id_user WHERE id_pembayaran = ' .
            $_GET['id_pembayaran'] .
            ''
    );
}
echo $pembayaran['total_pembayaran'];
include '../../template_organisasi/header.php';
?>
<?php
include '../../template_organisasi/sidebar.php';
?>




<?php
include '../../template_organisasi/footer.php';

?>

