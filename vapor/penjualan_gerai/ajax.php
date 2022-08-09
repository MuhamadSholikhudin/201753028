<?php
include '../../koneksi.php';
include '../../function.php';

if (isset($_POST['searchkeranjang']) and isset($_POST['id_penjualan_gerai'])) {

    $sql = "SELECT * FROM stok_gerai LEFT JOIN produk ON stok_gerai.id_produk = produk.id_produk  WHERE produk.nama_produk  LIKE '%" . $_POST['searchkeranjang'] . "%' LIMIT 5";

    $cari = mysqli_query($koneksi, $sql);

    $cek = mysqli_num_rows($cari);

    if($_POST['searchkeranjang'] == ""){
        $barang_loop = '<tr>nothing</tr>';
        echo json_encode($barang_loop);
    }
    elseif ($cek > 0) {

        $barang_loop = '';
        $barang_loop .= '<tr><th>Nama Produk</th><th>Jumlah</th><th>Harga</th><th>Add</th></tr>';
        $produk = querybanyak($sql);

        foreach ($produk as $brg) {

            $barang_loop .= '
                
                    <tr>
                    
                        <td>' . $brg['nama_produk'] . '</td>
                        <td> 
                            <input type="number" id="qty' . $brg['id_produk'] . '" class="form-control banyak" data-id="' . $brg['id_produk'] . '" name="jumlah_beli"  value="1" min="1" max="' . $brg['stok_gerai'] . '"> 
                            <input type="number" id="hrg' . $brg['id_produk'] . '" class="form-control d-none" data-id="' . $brg['id_produk'] . '" name="harga_produk"  value="' . $brg['harga_produk'] . '" min="1">
                            <script>
                                $("#qty' . $brg['id_produk'] . '").on("change", function() {
                                    var nilai = document.getElementById("qty' . $brg['id_produk'] . '").value; 
                                    var hrgambil = document.getElementById("hrg' . $brg['id_produk'] . '").value; 
                                    
                                    if(nilai >= 3){
                                       var harga = hrgambil * 0.1;
                                    }else{
                                       var harga =  hrgambil;
                                    }
                                    $("#opt' . $brg['id_produk'] . '").html(harga);	
                                    $("#banyak' . $brg['id_produk'] . '").val(nilai);	
                                    // console.log(hrgambil);
                                });
                             </script>
                        </td>
                        <td id="opt' . $brg['id_produk'] . '">' . $brg['harga_produk'] . '
                            
                            
                        </td>							
                        <td>
                            <form action="' . base_url("vapor/penjualan_gerai/aksi.php/") . '" method="POST">
                                <input type="hidden" id="banyak' . $brg['id_produk'] . '" class="form-control" data-id="' . $brg['id_produk'] . '" name="qty" value="1" min="1">
                                <input type="hidden"  class="form-control" data-id="' . $brg['id_produk'] . '" name="harga_produk"  value="' . $brg['harga_produk'] . '" min="1">

                                <input type="hidden" class="form-control" name="id_penjualan_gerai" value="' . $_POST['id_penjualan_gerai'] . '">
                                <input type="hidden" class="form-control" name="id_produk" value="' . $brg['id_produk'] . '">
                                <button type="submit" name="btnINPUTKERANJANGGERAI" class="btn btn-primary"><i class="fa fa-plus"> </i></button>
                            </form>
                        </td>
                        
                    </tr>
            ';
        }

        echo json_encode($barang_loop);
    } else {
        $barang_loop = '<tr>nothing</tr>';
        echo json_encode($barang_loop);
    }
}
//ajax ubah barang jumlah barang
elseif (isset($_POST['qty']) and isset($_POST['id_keranjang_gerai'])) {

    //mencari keranjang gerai
    $keranjang_gerai = querysatudata("SELECT * FROM keranjang_gerai LEFT JOIN stok_gerai ON keranjang_gerai.id_stok_gerai = stok_gerai.id_stok_gerai  WHERE id_keranjang_gerai = " . $_POST['id_keranjang_gerai'] . "");

    //mencari produk
    $produk = querysatudata("SELECT * FROM produk WHERE id_produk = " . $keranjang_gerai['id_produk'] . "");

    //jika produk lebbih dari 3
    if ($_POST['qty'] >= 3) {
        $harga = $produk['harga_produk'] * 0.05;
        $diskon = ($produk['harga_produk'] * $_POST['qty']) * 0.05;
        $jumlah_harga = ($produk['harga_produk'] * $_POST['qty']) - $diskon;

    } else {
        $harga = $produk['harga_produk'];
        $jumlah_harga = $harga * $_POST['qty'];
    }

    //update data keranjang gerai terbaru
    $sql_keranjang_gerai = "UPDATE keranjang_gerai SET banyak = " . $_POST['qty'] . ", jumlah_harga = " . $jumlah_harga . " WHERE id_keranjang_gerai = " . $_POST['id_keranjang_gerai'] . " ";

    $query_update_keranjang_gerai = mysqli_query($koneksi, $sql_keranjang_gerai);

    // total_penjualan
    $keranjang_gerais = querybanyak("SELECT * FROM keranjang_gerai  WHERE id_penjualan_gerai =" . $keranjang_gerai['id_penjualan_gerai'] . "");
    $jumlah_total = 0;
    foreach ($keranjang_gerais as $penj) {
        $jumlah_total += $penj['jumlah_harga'] *  $penj['banyak'];
    }

    $total = $jumlah_total;

    //Edit Data pada tabel penjulan gerai
    $sql_penjualan_gerai = "UPDATE penjualan_gerai SET total_penjualan = " . $total  . " WHERE id_penjualan_gerai = " . $keranjang_gerai['id_penjualan_gerai'] . " ";
    $query_update_penjualan_gerai = mysqli_query($koneksi, $sql_penjualan_gerai);


    $data = [$harga, $jumlah_harga, $total];
    // $data = [0, 1, 2];
    echo json_encode($data);
}

