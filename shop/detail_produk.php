<?php
if (isset($_GET['id_produk'])) {
    $produk = querysatudata("SELECT * FROM produk WHERE id_produk =" . $_GET['id_produk'] . " ");
}
?>
<section class="blog-single section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="blog-single-main">
                    <div class="row">
                        <div class="col-12">
                            <div class="image">
                                <img src="https://source.unsplash.com/950x460" alt="#">
                            </div>
                            <div class="blog-detail">
                                <h2 class="blog-title"><?= $produk['nama_produk'] ?></h2>
                                <div class="blog-meta">
                                    <!-- <span class="author"><a href="#"><i class="fa fa-user"></i>By Admin</a><a href="#"><i class="fa fa-calendar"></i>Dec 24, 2018</a><a href="#"><i class="fa fa-comments"></i>Comment (15)</a></span> -->
                                </div>
                                <div class="content">
                                    <p>What a crazy time. I have five children in colleghigh school graduates.jpge or pursing post graduate studies Each of my children attends college far from home, the closest of which is more than 800 miles away. While I miss being with my older children, I know that a college experience can be the source of great growth and experience can be the source of source of great growth and can provide them with even greater in future.</p>
                                </div>
                            </div>
                            <div class="share-social mt-4">
                                <div class="row">
                                    <div class="col-12">
                                        <h5>#Rekomendasi produk untuk anda :</h5>

                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <?php
                                            //Menampilkan data produk banyak dalam arrray
                                            $sql_produks = "SELECT * FROM produk LIMIT 4";
                                            $query_produks = mysqli_query($koneksi, $sql_produks);
                                            $no = 1; //nilai awal nomer
                                            while ($data_produks = mysqli_fetch_array($query_produks, MYSQLI_BOTH)) {
                                            ?>
                                                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                    <div class="single-product">
                                                        <div class="product-img">
                                                            <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $data_produks['id_produk'] ?>">
                                                                <!-- <img class="default-img" src="https://source.unsplash.com/550x750" alt="#"> -->
                                                                <img class="default-img" src="https://source.unsplash.com/550x750/?<?= $data_produks['nama_produk'] ?>" alt="#">
                                                                <img class="hover-img" src="https://source.unsplash.com/550x750" alt="#">
                                                            </a>
                                                            <div class="button-head">
                                                                <div class="product-action">
                                                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                                    <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                                </div>
                                                                <div class="product-action-2">
                                                                    <a title="Add to cart" href="<?= base_url('cart/add_to_cart.php?id=' . $data_produks['id_produk']) ?>">Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3><a href="<?= base_url('welcome/detail/') . $data_produks['id_produk'] ?>"><?= $data_produks['nama_produk'] ?></a></h3>
                                                            <div class="product-price">
                                                                <span><?= rupiah($data_produks['harga_produk']) ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                //auto increment nomer
                                                $no++;
                                            }
                                            ?>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="main-sidebar">
                    <!-- Single Widget -->

                    <div class="card">
                        <div class="card-header text-white" style="background-color:#F7941D ;">
                            <b>
                                Atur Jumlah Pembelian
                            </b>
                        </div>
                        <div class="card-body">


                            <h5 class="card-title">Stok Tersedia : <?= $produk['stok_produk'] ?></h5>
                            <input type="hidden" name="harga_produk" value="<?= $produk['harga_produk'] ?>" id="harga_produk">
                            <h5 class="card-title">Harga : <?= rupiah($produk['harga_produk']) ?></h5>

                            <br>
                            <tr>
                                <td class="qty" data-title="Qty">
                                    <!-- Input Order -->
                                    <div class="input-group ">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quant[1]" id="atur_jumlah" onchange="atur_jumlah()" class="input-number" data-min="1" data-max="<?= $produk['stok_produk'] ?>" value="1" style="width:80px;">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </td>
                            </tr>

                            <br>
                            <br>
                            <form action="<?= base_url('cart/add_to_cart.php') ?>" method="post">

                                <input type="number" class="d-none" name="id_produk" value="<?= $produk['id_produk'] ?>" id="">
                                <input type="number" class="d-none" name="jumlah_keranjang" id="jumlah_keranjang" value="1">
                                <input type="number" class="d-none" name="harga_keranjang" id="harga_keranjang" value="<?= $produk['harga_produk'] ?>">
                                <h5 class="card-title" id="total_harga">Total : <?= rupiah($produk['harga_produk']) ?></h5>

                                <button type="submit" name="btnTAMBAHKERANJANGPRODUK" class="btn btn-primary btn-badge text-white" style="width:100%;">+ keranjang</button>
                            </form>
                        </div>
                    </div>

                    <!--/ End Single Widget -->
                    <!-- Single Widget -->
                    <div class="single-widget category">
                        <h3 class="title">Kategori</h3>
                        <ul class="categor-list">
                            <?php
                            // perulangan data kategoori  
                            $sql_kategories = "SELECT * FROM kategori";
                            $query_kategories = mysqli_query($koneksi, $sql_kategories);
                            $no = 1; //nilai awal nomer
                            while ($data_kategori = mysqli_fetch_array($query_kategories, MYSQLI_BOTH)) {

                            ?>
                                <li><a href="<?= base_url('shop/index.php?halaman=kategori&kategori=') ?><?= $data_kategori['kategori'] ?>"><?= $data_kategori['kategori'] ?></a></li>
                            <?php
                                //auto increment nomer
                                $no++;
                            }
                            ?>
                        </ul>
                    </div>
                    <!--/ End Single Widget -->
                    <!-- Single Widget -->
                    <div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</section>