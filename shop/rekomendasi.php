<?php
// Logika menampilkan hasil 
// Jika itemset satu ada maka
if ($cek_jumlah_itemset1_supercount > 0) {

    // cek jika itemset 2 ada
    if ($cek_jumlah_itemset2_supercount > 0) {

        // cek jika itemset 3 ada
        if ($cek_jumlah_itemset3_supercount > 0) {
            $rekomendasi = $hasil_itemset3unique;
            // cek jika itemset 3 tidak ada
        } else {
            $rekomendasi = $tampung_itemset3unique;
        }

        // cek jika itemset 2 tidak ada
    } else {
        $rekomendasi = $c_barang;
    }
    //jika items set 1 tidak ada
} else {
    $rekomendasi = $c_barang;
}

if ($rekomendasi == null) {
} else {
?>
    <div class="row">
        <?php
        if (isset($_SESSION['id_user'])) {
        ?>
            <div class="col-12">
                <h5>#Rekomendasi produk untuk anda :</h5>
            </div>
        <?php
        }
        ?>
        <?php
        foreach ($rekomendasi as $id_produk) { ?>
            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $id_produk ?>">
                            <?php
                            $hasilproduk = querysatudata("SELECT * FROM produk WHERE id_produk =" . $id_produk . " ");


                            ?>
                            <img class="default-img" src="<?= base_url('gambar/produk/') ?><?= $hasilproduk['gambar'] ?>" height="200" alt="<?= $hasilproduk['gambar'] ?>" alt="#">
                            <img class="hover-img" src="https://source.unsplash.com/550x750" alt="#">
                        </a>
                        <div class="button-head">
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                            </div>
                            <div class="product-action-2">
                                <a title="Add to cart" href="<?= base_url('cart/add_to_cart.php?id=' . $hasilproduk['id_produk']) ?>">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="<?= base_url('welcome/detail/') . $hasilproduk['id_produk'] ?>"><?= $hasilproduk['nama_produk'] ?></a></h3>
                        <div class="product-price">
                            <span><?= rupiah($hasilproduk['harga_produk']) ?></span>
                        </div>
                    </div>
                </div>
            </div>

    <?php }
    }
    ?>
    </div>