function keluar() {
  var search = document.getElementById("search").value;
  alert(search);
  console.log(search);
}

$("#searchkeranjang").keydown(function() {
    // var keyword = $(this).val();
    var searchkeranjang = document.getElementById("searchkeranjang").value;
    console.log(searchkeranjang)

}

/*
    $("#btn_bayar").on('click', function() {
      var total = document.getElementById("total_belanja").value;
      var bayar = document.getElementById("bayar").value;
      var id_transaksi = document.getElementById("id_transaksi").value;
      $.ajax({
        type: "POST",
        url: "<?= site_url('pemilik/transaksi/bayar'); ?>",
        data: {
          total: total,
          bayar: bayar,
          id_transaksi: id_transaksi
        },
        dataType: 'json',
        success: function(byr) {
          alert(byr);
          location.reload();
        }
      });
      return false;
    });


    	function cari()
	{
		// $this->load->Model('Model_barang', 'cari_barang', TRUE);
		// $keyword = $this->input->post('keyword');
		$keyword = $this->input->post('keyword', TRUE);
		$pembeli = $this->input->post('pembeli', TRUE);

		// $keyword = trim(strip_tags($_POST['keyword']));
		if ($keyword == " ") {
			$barang_loop = 'nothing';
			echo json_encode($barang_loop);
		} elseif ($keyword == "") {
			$barang_loop = 'nothing';
			echo json_encode($barang_loop);
		} else {

			$barang = $this->Model_barang->get_barang($keyword);
			// $data['keca'] = $this->db->query("SELECT COUNT(kode_wilayah), kecamatan FROM wilayah GROUP BY kecamatan")->result();

			// if($hakakses == 3){

			// $keca = $this->dep_kategori->get_sub_desa($id_kec);
			if (count($barang) > 0) {

				$barang_loop = '';
				$barang_loop .= '<tr><th>Kode Barang</th><th>Nama Barang</th><th>Jumlah</th><th>Harga</th><th>Add</th></tr>';
				foreach ($barang as $brg) {

					$cek_hrg = $this->db->query("SELECT * FROM harga_barang WHERE id_barang= $brg->id_barang ");
					if($cek_hrg->num_rows() > 0){
						$hrg = $cek_hrg->row();
						// $barang_loop .= '<tr><td>' . $brg->kode_barang . '</td><td>' . $brg->nama_barang . '</td><td>' . $hrg->harga_bakul . '</td><td> <a href="' . base_url("pemilik/transaksi/aksi_tambah_barang/$pembeli/$brg->id_barang") . '" class="btn btn-danger"><i class="fa fa-plus" </i></a></td></tr>';
						$barang_loop .= '
					
						<tr>
						
							<td>' . $brg->kode_barang . '</td><td>' . $brg->nama_barang . '</td>
							<td>
							<form action="' . base_url("pemilik/transaksi/aksi_tambah_cari/") . '" method="POST" >
								<input type="number" class="form-control" name="jumlah_beli" value="1" min="1">
								<input type="hidden" class="form-control" name="pembeli" value="' . $pembeli . '">
								<input type="hidden" class="form-control" name="id_barang" value="' . $brg->id_barang . '">
								<button type="submit" id="klik' . $brg->id_barang . '" class="d-none"><i class="fa fa-plus"> </i></button>
							 </form>
								</td>
							<td>' . $hrg->harga_bakul . '</td>							
							<td>
							
							 <button id="cu' . $brg->id_barang . '" data-id="' . $brg->id_barang . '" class="btn btn-danger"><i class="fa fa-plus"> </i></button>
							 <script>
							 $("#cu' . $brg->id_barang . '").on("click", function() {
								const id = $(this).data("id");
								var button = "klik" + id;

								if (id == 0) {
								// 	var button = "klik" + id;
								// 	 document.getElementById(button).click;
								}else{
								document.getElementById(button).click();
								}
							});         
							 </script>
							 </td>
						
						</tr>
					';
					}else{
						// $barang_loop .= '<tr><td>' . $brg->kode_barang . '</td><td>' . $brg->nama_barang . '</td><td>' . $hrg->harga_bakul . '</td><td> <a href="' . base_url("pemilik/transaksi/aksi_tambah_barang/$pembeli/$brg->id_barang") . '" class="btn btn-danger"><i class="fa fa-plus" </i></a></td></tr>';
						$barang_loop .= '
					
						<tr>
						
							<td>' . $brg->kode_barang . '</td><td>' . $brg->nama_barang . '</td>
							<td>
							<form action="' . base_url("pemilik/transaksi/aksi_tambah_cari/") . '" method="POST" >
								<input type="number" class="form-control" name="jumlah_beli" value="1" min="1">
								<input type="hidden" class="form-control" name="pembeli" value="' . $pembeli . '">
								<input type="hidden" class="form-control" name="id_barang" value="' . $brg->id_barang . '">
								<button type="submit" id="klik' . $brg->id_barang . '" class="d-none"><i class="fa fa-plus"> </i></button>
							 </form>
								</td>
							<td>0</td>							
							<td>
							
							 <button id="cu' . $brg->id_barang . '" data-id="' . $brg->id_barang . '" class="btn btn-danger"><i class="fa fa-plus"> </i></button>
							 <script>
							 $("#cu' . $brg->id_barang . '").on("click", function() {
								const id = $(this).data("id");
								var button = "klik" + id;

								if (id == 0) {
								// 	var button = "klik" + id;
								// 	 document.getElementById(button).click;
								}else{
								document.getElementById(button).click();
								}
							});         
							 </script>
							 </td>
						
						</tr>
					';
					}
					
				}
				echo json_encode($barang_loop);
			} else {
				$barang_loop = 'nothing';
				echo json_encode($barang_loop);
			}
			// }
		}
	}

    $("#cari").keydown(function() {
      var keyword = $(this).val();
      var pembeli = document.getElementById("id_pembeli").value;
      $.ajax({
        type: "POST",
        url: "<?= site_url('pemilik/transaksi/cari'); ?>",
        data: {
          keyword: keyword,
          pembeli: pembeli
        },
        dataType: 'json',
        beforeSend: function() {
          $("#hasil_cari").hide();
          $("#tunggu").html('<div class="spinner-border" role="status"> <span class = "visually-hidden" >  </span> </div>');
        },
        success: function(html) {
          if (html == 'noting') {
            alert(html);
          } else {
            $("#tunggu").html('');
            $("#hasil_cari").show();
            $("#hasil_cari").html(html);
          }
        }
      });
    });


*/

/*
    $("#bayar").keydown(function() {
      $("#kembali").css("background-color", "yellow");
      $("#bayar").css("background-color", "yellow");
      var bayar = $(this).val();
      var total = $("#total_belanja").val();
      var kembali = bayar - total;
      $("#kembali").val(kembali);
    });
    $("#bayar").keyup(function() {
      $("#kembali").css("background-color", "white");
      $("#bayar").css("background-color", "white");
      var bayar = $(this).val();
      var total = $("#total_belanja").val();
      var kembali = bayar - total;
      $("#kembali").val(kembali);
    });


*/

$(document).ready(function () {
  $("#table_id").DataTable();
});
