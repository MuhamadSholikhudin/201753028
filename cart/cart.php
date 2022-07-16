<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12 ">
				
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>Nama Produk</th>
								<th class="text-center">Harga</th>
								<th class="text-center">Qty</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
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
                        ?>
                        
                            <?php
                                $keranjang_user_id_barang = $keranjang_user['id_barang'];
                                $sql_barang_keranjang= "SELECT * FROM barang WHERE id_barang = $keranjang_user_id_barang";
                                $query_barang_keranjang = mysqli_query($koneksi, $sql_barang_keranjang);

                                $data_barang_keranjang = mysqli_fetch_array($query_barang_keranjang, MYSQLI_BOTH);
                               
                                $dataset[] = $keranjang_user['id_keranjang'];
                            ?>

							<?php
								// $tbarang = $this->db->query("SELECT * FROM barang WHERE id_barang = $keranjang->id_barang ")->row();
							?>
							<tr>
								<td><img src="https://source.unsplash.com/100x100/?<?= $data_barang_keranjang['nama_barang'] ?>" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#"><?= $data_barang_keranjang['nama_barang'] ?></a></p>
									<p class="product-des"></p>
								</td>
								<td class="price" data-title="Price"><span><?= rupiah($data_barang_keranjang['harga_barang']) ?> </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number" data-min="1" data-max="100" value="<?= $keranjang_user['jumlah_keranjang'] ?>">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span><?= rupiah($keranjang_user['harga_keranjang']) ?></span></td>
								<td class="action" data-title="Remove"><a href="<?= base_url('raja_vapor/cart/remove_on_cart/'). $keranjang_user['id_keranjang'] ?>"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
							
							<?php 
                                //auto increment nomer
                                    $no++;
                                }
                            }
                             ?>
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
		
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-6 col-md-5 col-12">
								<div class="left">
									<!-- <div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div> -->
								</div>
							</div>
							<div class="col-lg-6 col-md-7 col-12">
								<div class="right">
									<ul>
										<!-- <li>Cart Subtotal<span>$330.00</span></li>
										<li>Shipping<span>Free</span></li>
										<li>You Save<span>$20.00</span></li> -->
										<li class="last">Total Pembayaran<span style="text-align:center;">
										<?php

										// Jika Sudah Login
										if(isset($_SESSION['id_user'])){
											$id_user = $_SESSION['id_user'];
											$sql_total_barang = "SELECT SUM(harga_keranjang) as total FROM keranjang WHERE id_user = $id_user";
                                            $query_total_barang = mysqli_query($koneksi, $sql_total_barang);
                                            $data_total_barang = mysqli_fetch_array($query_total_barang, MYSQLI_BOTH);
                                            echo rupiah($data_total_barang['total']);
										}else{
											echo rupiah(0);
										}?>
										</span></li>
									</ul>
									<div class="button5">
                                        <form action="<?= base_url('checkout/add_checkout.php') ?>" method="post" enctype="multipart/form-data">  
                                        <?php
                                            $implode_id_keranjang = implode (",", $dataset);
                                        ?>
                                            <input type="text" name="id_user" value="<?= $_SESSION['id_user'] ?>" id="">
                                            <input type="text" name="implode_id_keranjang" value="<?=  $implode_id_keranjang ?>" id="">
                                            <input type="number" name="jumlah_checkout" value="<?=  $data_total_barang['total'] ?>" id="">

                                            <button type="submit" class="btn">Checkout</button>
                                        </form>
										<!-- <a href="<?= base_url('raja_vapor/checkout') ?>#" class="btn">Checkout</a> -->
										<a href="<?= base_url('index.php') ?>" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
    </div>