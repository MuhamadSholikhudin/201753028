<?php
    include '../../koneksi.php';
    if (isset ($_POST['btnSIMPAN'])){

        //mulai proses simpan
        $gambar_logo = (date('Y-m-d') . $_FILES['gambar_logo']['name']);
        $lokasi = $_FILES['gambar_logo']['tmp_name'];

        $sql_simpan = "INSERT INTO bank (nama_bank, no_rekening, tutorial_pembayaran, atas_nama, status_bank, gambar_logo) VALUES (
            '".$_POST['nama_bank']."',
            ".$_POST['no_rekening'].",
            '".$_POST['tutorial_pembayaran']."',
            '".$_POST['atas_nama']."',
            '".$_POST['status_bank']."',
            '".$gambar_logo."')";

        move_uploaded_file($lokasi, "../../gambar/bank/".$gambar_logo);

        $query_simpan = mysqli_query($koneksi, $sql_simpan);

        if($query_simpan){
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=bank'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=bank_tambah'>";
        } //proses simpan selesai
    }
    
    else if (isset ($_POST['btnUBAH'])){
        //mulai proses simpan
        $gambar_logo = (date('Y-m-d') . $_FILES['gambar_logo']['name']);
        $lokasi = $_FILES['gambar_logo']['tmp_name'];

        $sql_ubah = "UPDATE bank SET
            nama_bank = '".$_POST['nama_bank']."',
            no_rekening = ".$_POST['no_rekening'].",
            tutorial_pembayaran = '".$_POST['tutorial_pembayaran']."',
            atas_nama = '".$_POST['atas_nama']."',
            status_bank = ".$_POST['status_bank'].",
            gambar_logo = '".$gambar_logo."'
            WHERE id_bank =".$_POST['id_bank']."";

        move_uploaded_file($lokasi, "../../gambar/bank/".$gambar_logo);

        $query_ubah = mysqli_query($koneksi, $sql_ubah);

        if($query_ubah){
            echo "<script>alert('Ubah Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=bank'>";
        }else{
            echo "<script>alert('Ubah Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://localhost/201753028/vapor/index.php?halaman=bank_edit&id_bank=".$_POST['id_bank']."'>";
        } //proses ubah selesai

    }
