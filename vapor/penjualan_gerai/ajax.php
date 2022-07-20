<?php
include '../../koneksi.php';
include '../../function.php';

if (isset($_POST['searchkeranjang']) AND isset($_POST['id_penjualan_gerai'])) {

    $sql = "SELECT * FROM stok_gerai LEFT JOIN produk ON stok_gerai.id_produk = produk.id_produk  WHERE produk.nama_produk  LIKE '%" . $_POST['searchkeranjang'] . "%' LIMIT 5";

    $cari = mysqli_query($koneksi, $sql);

    $cek = mysqli_num_rows($cari);

    if ($cek > 0) {

        $barang_loop = '';
        $barang_loop .= '<tr><th>Nama Produk</th><th>Jumlah</th><th>Harga</th><th>Add</th></tr>';
        $produk = querybanyak($sql);

        foreach ($produk as $brg) {

             $barang_loop .= '
                
                    <tr>
                    
                        <td>'.$brg['nama_produk'].'</td>
                        <td> 
                            <input type="number" id="qty'.$brg['id_produk'].'" class="form-control banyak" data-id="' . $brg['id_produk'] . '" name="jumlah_beli"  value="1" min="1" max="'.$brg['stok_gerai'].'"> 
                            <input type="number" id="hrg'.$brg['id_produk'].'" class="form-control d-none" data-id="' . $brg['id_produk'] . '" name="harga_produk"  value="'.$brg['harga_produk'].'" min="1">
                            <script>
                                $("#qty'.$brg['id_produk'].'").on("change", function() {
                                    var nilai = document.getElementById("qty'.$brg['id_produk'].'").value; 
                                    var hrgambil = document.getElementById("hrg'.$brg['id_produk'].'").value; 
                                    
                                    if(nilai >= 3){
                                       var harga = hrgambil * 0.1;
                                    }else{
                                       var harga =  hrgambil;
                                    }
                                    $("#opt'. $brg['id_produk'] .'").html(harga);	
                                    $("#banyak'. $brg['id_produk'] .'").val(nilai);	
                                    // console.log(hrgambil);
                                });
                             </script>
                        </td>
                        <td id="opt'. $brg['id_produk'] .'">' . $brg['harga_produk'] . '
                            
                            
                        </td>							
                        <td>
                            <form action="' . base_url("vapor/penjualan_gerai/aksi.php/") . '" method="POST">
                                <input type="number" id="banyak'.$brg['id_produk'].'" class="form-control" data-id="' . $brg['id_produk'] . '" name="qty" value="1" min="1">
                                <input type="number"  class="form-control" data-id="' . $brg['id_produk'] . '" name="harga_produk"  value="'.$brg['harga_produk'].'" min="1">

                                <input type="number" class="form-control" name="id_penjualan_gerai" value="' . $_POST['id_penjualan_gerai'] . '">
                                <input type="number" class="form-control" name="id_produk" value="' . $brg['id_produk'] . '">
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
} else {

    $data = [2];
    echo json_encode($data);
}





// header("Content-type:application/json");
// require 'db_config.php';
// $num_rec = 10;
// if (isset($_GET['page'])) {
//     $page = $_GET['page'];
// } else {
//     $page = 1;
// };
// $start_from = ($page - 1) * $num_rec;
// $sqlTotal = "SELECT * FROM tb_user";
// $sql = "SELECT * FROM tb_user Order By user_id desc LIMIT $start_from, $num_rec";
// $result = $mysqli->query($sql);
// while ($row = $result->fetch_assoc()) {
//     $json[] = $row;
// }
// $data['data'] = $json;
// $result = mysqli_query($mysqli, $sqlTotal);
// $data['total'] = mysqli_num_rows($result);
// echo json_encode($data, JSON_PRETTY_PRINT);
