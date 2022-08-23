<!-- Sidebar -->
<div class="col-lg-3 col-md-4 col-12">
    <div class="shop-sidebar">
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

        <!-- Berdasarkan Harga -->
        <!-- <div class="single-widget range">
            <h3 class="title">Berdasarkan Harga</h3>
            <div class="price-filter">
                <div class="price-filter-inner">
                    <div id="slider-range"></div>
                    <div class="price_slider_amount">
                        <div class="label-input">
                            <span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price" />
                        </div>
                    </div>
                </div>
            </div>

            <ul class="check-box-list">
                <li>
                    <label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">10K - 100K<span class="count">(3)</span></label>
                </li>
                <li>
                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">100K - 100K<span class="count">(5)</span></label>
                </li>
                <li>
                    <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">1000K - 10000K<span class="count">(8)</span></label>
                </li>
            </ul>
        </div> -->



        <div class="single-widget recent-post">
            <h3 class="title">Product Baru</h3>

            <!-- Single Post -->
            <?php
            $sql_tampil_produk = "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 3";
            $query_tampil_produk = mysqli_query($koneksi, $sql_tampil_produk);
            $no = 1; //nilai awal nomer
            while ($bar_bar = mysqli_fetch_array($query_tampil_produk, MYSQLI_BOTH)) {
            ?>
                <div class="single-post first">
                    <div class="image">
                        <img src="<?= base_url('gambar/produk/') ?><?= $bar_bar['gambar']; ?>" alt="#">
                    </div>
                    <div class="content">
                        <h5><a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $bar_bar['id_produk'] ?>"><?= $bar_bar['nama_produk']; ?></a></h5>
                        <p class="price"><?= rupiah($bar_bar['harga_produk']); ?></p>
                        <ul class="reviews">
                            <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') ?><?= $bar_bar['id_produk']; ?>">
                                <li class="yellow"><i class="ti-eye"></i> Lihat</li>
                            </a>

                        </ul>
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