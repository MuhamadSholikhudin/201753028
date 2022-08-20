<?php
session_start();

include 'koneksi.php';

include 'function.php';

?>

<?php
include 'templates/header.php';
?>
<!-- Slider Area -->
<!-- Product Style -->
<section class=" shop-sidebar shop " style="margin-top:10px; margin-bottom:50px;">
    <div class="container">
        <div class="row">
            <?php
            include 'templates/sidebar.php';

            ?>
            <!-- Content -->
            <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                    <div class="col-12">
                        <!-- Shop Top -->
                        <div class="shop-top">
                            <div class="shop-shorter">
                                <div class="single-shorter">
                                    <label>Show :</label>
                                    <select>
                                        <option selected="selected">09</option>
                                        <option>15</option>
                                        <option>25</option>
                                        <option>30</option>
                                    </select>
                                </div>
                                <div class="single-shorter">
                                    <label>Sort By :</label>
                                    <select>
                                        <option selected="selected">Name</option>
                                        <option>Price</option>
                                        <option>Size</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--/ End Shop Top -->
                    </div>
                </div>
                <div class="row">

                    <?php


                    //Menampilkan data produk banyak dalam arrray
                    if (isset($_GET['search'])) {
                        $banyakpencarian = querysatudata("SELECT COUNT(id_produk) as banyakpencarian FROM produk WHERE nama_produk LIKE '%" . $_GET['search'] . "%' ");

                        $sql_produks = "SELECT * FROM produk WHERE nama_produk LIKE '%" . $_GET['search'] . "%'";
                    } else {
                        $sql_produks = "SELECT * FROM produk";
                    }
                    $query_produks = mysqli_query($koneksi, $sql_produks);
                    $no = 1; //nilai awal nomer
                    $data_produks = mysqli_fetch_array($query_produks, MYSQLI_BOTH);

                    $tampung_array_kategory = [];
                    $tampung_where_id_produk = [];
                    while ($data_produks = mysqli_fetch_array($query_produks, MYSQLI_BOTH)) {
                        array_push($tampung_array_kategory, $data_produks['id_kategori']);
                        array_push($tampung_where_id_produk, "id_produk != ".$data_produks['id_produk']);

                    ?>

                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $data_produks['id_produk'] ?>">
                                        <!-- <img class="default-img" src="https://source.unsplash.com/550x750" alt="#"> -->
                                        <img class="default-img" src="<?= base_url('gambar/produk/') ?><?= $data_produks['gambar'] ?>" alt="#">
                                        <img class="hover-img" src="https://source.unsplash.com/550x750" alt="#">
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $data_produks['id_produk'] ?>">
                                                <i class=" ti-eye"></i><span>Detail</span>
                                            </a>

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

                <div class="row">

                    <?php if ($banyakpencarian['banyakpencarian'] > 0) { ?>
                        <div class="col-xl-12 col-lg-4 col-md-4 col-12">


                            <h6>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                Produk yang mungkin anda minati
                            </h6>

                        </div>
                        <?php 

                        $array_kategory = array_unique($tampung_array_kategory);
                        // var_dump($array_kategory);
                        // echo implode(" OR ",$array_kategory);

                        // var_dump($tampung_where_id_produk);

                        // echo implode(" AND ",$tampung_where_id_produk);


                        // $c_arr_kategori = count($array_kategory);

                         $sql_minati = "SELECT * FROM produk WHERE id_kategori = (".implode(" OR ",$array_kategory).") AND ".implode(" AND ",$tampung_where_id_produk)." LIMIT 4";

    $minati4 = querybanyak($sql_minati);
                       

foreach($minati4 as $min){

    $produksearkategori = querysatudata("SELECT * FROM produk WHERE  id_produk = ".$min['id_produk']."");


                        ?>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $produksearkategori['id_produk'] ?>">
                                            <!-- <img class="default-img" src="https://source.unsplash.com/550x750" alt="#"> -->
                                            <img class="default-img" src="<?= base_url('gambar/produk/') ?><?= $produksearkategori['gambar'] ?>" alt="#">
                                            <!-- <img class="hover-img" src="https://source.unsplash.com/550x750" alt="#"> -->
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $produksearkategori['id_produk'] ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a> -->
                                                <!-- <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> -->
                                            </div>
                                            <div class="product-action-2">
                                                <a title="Add to cart" href="<?= base_url('cart/add_to_cart.php?id=' . $produksearkategori['id_produk']) ?>">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="<?= base_url('welcome/detail/') . $produksearkategori['id_produk'] ?>"><?= $produksearkategori['nama_produk'] ?></a></h3>
                                        <div class="product-price">
                                            <span><?= rupiah($produksearkategori['harga_produk']) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php 
                        }


                    } else { ?>


                        <div class="row">

                            <div class="col-xl-12 col-lg-4 col-md-4 col-12">


                                <h6>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    Produk yang mungkin anda minati
                                </h6>

                            </div>

                            <?php
                            //Menampilkan data produk banyak dalam arrray
                            $sql_produks = "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 4 ";
                            $query_produks = mysqli_query($koneksi, $sql_produks);
                            $no = 1; //nilai awal nomer
                            while ($data_produks = mysqli_fetch_array($query_produks, MYSQLI_BOTH)) {
                            ?>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $data_produks['id_produk'] ?>">
                                                <!-- <img class="default-img" src="https://source.unsplash.com/550x750" alt="#"> -->
                                                <img class="default-img" src="<?= base_url('gambar/produk/') ?><?= $data_produks['gambar'] ?>" alt="#">
                                                <!-- <img class="hover-img" src="https://source.unsplash.com/550x750" alt="#"> -->
                                            </a>
                                            <div class="button-head">
                                                <div class="product-action">
                                                    <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $data_produks['id_produk'] ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                    <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a> -->
                                                    <!-- <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> -->
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


                    <?php }  ?>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">

                        <!-- <?= $banyakpencarian['banyakpencarian'] ?> -->
                    </div>
                </div>

            </div>
        </div>



        <!-- Batas Konten Bawah -->
    </div>
    </div>
</section>
<!--/ End Product Style 1  -->

<?php
include 'templates/footer.php';
?>
>>>>>>> 9a37a067c85f350b876cb0f170e366fc90be4237