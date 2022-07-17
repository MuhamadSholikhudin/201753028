<!-- Start Checkout -->
<section class="shop checkout section">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-12">
				<div class="order-details">
					<!-- Order Widget -->
					<div class="single-widget">
					    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						PRODUK YANG DI BELI
                        <div class="content">
                            <ul>
                                <li class="last">
                                <!-- <table class="table shopping-summery "> -->
                                    <table class="table ">
                                        <thead>
                                            <tr class="main-hading">
                                                <th>PRODUCT</th>
                                                <th>NAMA</th>
                                                <th class="text-center">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            // Jika Sudah Login
                                            if(isset($_SESSION['id_user'])){
                                                // SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1 
                                                $sql_keranjang_user = "SELECT * FROM keranjang where id_user = $id_user and status_keranjang = 1 ";
                                                $query_keranjang_user = mysqli_query($koneksi, $sql_keranjang_user);
                                                $no=1; //nilai awal nomer
                                                $dataset = array();
                                                while ($keranjang_user = mysqli_fetch_array($query_keranjang_user,MYSQLI_BOTH)){

                                                    $keranjang_user_id_produk = $keranjang_user['id_produk'];
                                                    $sql_barang_keranjang= "SELECT * FROM barang WHERE id_produk = $keranjang_user_id_produk";
                                                    $query_barang_keranjang = mysqli_query($koneksi, $sql_barang_keranjang);

                                                    $data_barang_keranjang = mysqli_fetch_array($query_barang_keranjang, MYSQLI_BOTH);
                                                
                                                    $dataset[] = $keranjang_user['id_keranjang'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <img src="https://source.unsplash.com/100x100/?<?= $data_barang_keranjang['nama_barang'] ?>"
                                                    alt="#">
                                                </td>
                                                <td class="product-des" data-title="Description">
                                                    <p class="product-name">
                                                        <a href="#">
                                                            <?= $data_barang_keranjang['nama_barang'] ?>
                                                        </a>
                                                    </p>
                                                    <p class="product-des"></p>
                                                </td>
                                                </td>
                                                <td class="total-amount" data-title="Total">
                                                    <span>
                                                        <?= rupiah($data_barang_keranjang['harga_barang'])  ?>
                                                    </span>
                                                </td>
                                            </tr>

                                        <?php 
                                            //auto increment nomer
                                                    $no++;
                                                }
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </li>
                            </ul>
                        </div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12 ">
				<div class="order-details">
					<!-- Order Widget -->
					<div class="single-widget">
						<form action="<?= base_url('pengiriman/index.php') ?>" <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INFORMASI PENGIRIMAN</h2>
							<div class="content">
								<ul>
									<li class="last">
										<div class="content">
											<div class="row">
												<div class="col-lg-12 col-md-6 col-12">
													<div class="form-group">
														<label>Nama Penerima
															<span>*</span>
														</label>
														<br>
														<input type="text" name="name" placeholder="" required="required" style="width:100%;">
													</div>
												</div>
												<div class="col-lg-12 col-md-6 col-12">
													<div class="form-group">
														<label>Nomer Telpon / HP
															<span>*</span>
														</label>
														<br>
														<input type="number" name="number" placeholder="" required="required" style="width:100%;">
													</div>
												</div>
												<div class="col-lg-12 col-md-6 col-12">
													<div class="form-group">
														<label for="provinc">Provinsi
															<span>*</span>
														</label> <br>
														<select name="country_name" id="provinc"  style="width:100%; height:35px;">
															<option value="AF">Afghanistan</option>
															<option value="AX">Åland Islands</option>
														</select>
													</div>
												</div>
												<div class="col-lg-12 col-md-6 col-12">
													<div class="form-group">
														<label for="country">Kota / Kabupaten
															<span>*</span>
														</label>
														<select name="country_name" id="country"  style="width:100%; height:35px;">
															<option value="AF">Afghanistan</option>
															<option value="AX">Åland Islands</option>

														</select>
													</div>
												</div>
												<div class="col-lg-12 col-md-6 col-12">
													<div class="form-group">
														<label for="distric">Kecamatan
															<span>*</span>
														</label>
														<select name="country_name" id="distric"  style="width:100%; height:35px;">
															<option value="AF">Afghanistan</option>
															<option value="AX">Åland Islands</option>

														</select>
													</div>
												</div>
												<div class="col-lg-12 col-md-6 col-12">
													<div class="form-group">
														<label>Kode Post
															<span>*</span>
														</label>
														<br>
														<input type="text" name="address" placeholder="" required="required" style="width:100%;">
													</div>
												</div>

												<div class="col-lg-12 col-md-6 col-12">
													<div class="form-group">
														<label>Alamat Jalan
															<span>*</span>
														</label>
														<textarea name="address" placeholder="Contoh : Jl. Ahmad Yani 12 BLOK B" required="required"></textarea>
													</div>
												</div>
												<div class="col-lg-12 col-md-6 col-12">
													<div class="form-group">
														<label>Alamat Lengkap
															<span>*</span>
														</label>
														<textarea name="address" rows="5" placeholder="Contoh : Rumah bapak Johan, RT.2/RW 56 Mlati Mejobo Kudus Jawa Tengah" required="required"></textarea>
													</div>
												</div>


											</div>
										</div>
									</li>
								</ul>
							</div>
					</div>

				</div>


			</div>
			<div class="col-lg-4 col-12">
				<div class="order-details">
					<!-- Order Widget -->
					<div class="single-widget">
						<form action="<?= base_url('') ?>" <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CART TOTALS</h2>
							<div class="content">
								<?php
										// // Mengambil data cart menjadi satu value
										// foreach($keranjangs as $keranjang) {
										// 	//menampung cart dalam elemem
										// 	$elements[] = $keranjang->id_keranjang;
										// }

										// // Menyatukan cart dengan pemisah koma ( ,)
										// $implode_keranjang = implode(',', $elements);
									?>

								<!-- Menampung hasil implode ke input html -->
								<input type="hidden" name="implode_keranjang" value=""
								 id="">


								<!-- Menampung id_user sebagai orang yang membeli produk -->
								<input type="hidden" name="id_user" value=""
								 id="">

								<ul>
									<!-- <li>Sub Total<span>
								
										</span></li> -->
									<!-- <li>(+) Shipping<span>$10.00</span></li> -->
									<li class="last">Total
										<span>
											<?php
											// Jika Sudah Login
											if(isset($_SESSION['id_user'])){

												// Membuat variabel id-user sebagai pembeli
												$id_user = $_SESSION['id_user'];
												
												// Tampilkan harga_keranjang dari tabel keranjang yang pembelinya = id_user dan statusnya belum di bayar
												$sql_total_barang = "SELECT SUM(jumlah_checkout) as total FROM checkout WHERE id_user = ".$id_user." 
														AND id_checkout =".$_GET['id_checkout']."";
												$query_total_barang = mysqli_query($koneksi, $sql_total_barang);
												$data_total_barang = mysqli_fetch_array($query_total_barang, MYSQLI_BOTH);

												// Output total
												echo rupiah($data_total_barang['total']);
											
											}else{
												echo rupiah(0);
											}
										?>
										</span>
									</li>
								</ul>
							</div>
					</div>
					<!--/ End Order Widget -->
					<!-- Order Widget -->
					<div class="single-widget">
						<h2>Payments</h2>
						<div class="content">
							
							<ul>
								<?php 
									$sql_bank = "SELECT * FROM bank";
									$query_bank = mysqli_query($koneksi, $sql_bank);
									$no=1; //nilai awal nomer
									while ($bank = mysqli_fetch_array($query_bank,MYSQLI_BOTH)){						
								?>								
									<li>
									<img src="https://source.unsplash.com/50x50/?<?= $bank['nama_bank'] ?>" alt="#"> 
										&nbsp;&nbsp;&nbsp;&nbsp;
										<input name="id_bank" id="3" type="radio"> 

										<?= $bank['nama_bank'] ?>
									
									</li>
									<?php
									//auto increment nomer
									$no++;
									} ?>
										
							</ul>
								
							
						</div>
					</div>
					
					<div class="single-widget get-button">
						<div class="content">
							<div class="button">
								<a href="<?= base_url('raja_vapor/pembayaran') ?>" class="btn">proceed to checkout</a>
							</div>
						</div>
					</div>
					<!--/ End Button Widget -->
				</div>
			</div>
		</div>
	</div>

	<!--/ End Checkout -->
	<div style="height:50px;">
	</div>