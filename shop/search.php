<?php 
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
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
            $sql_produks = "SELECT * FROM produk WHERE 
                nama_produk like ='%".$_GET['search']."%'
            ";
            $query_produks = mysqli_query(
                $koneksi, 
            $sql_produks);
            $no=1; //nilai awal nomer
            while ($data_produks = mysqli_fetch_array($query_produks, MYSQLI_BOTH)){

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
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                            </div>
                            <div class="product-action-2">
                                <a title="Add to cart" href="<?= base_url('cart/add_to_cart.php?id='. $data_produks['id_produk']) ?>">Add to cart</a>
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