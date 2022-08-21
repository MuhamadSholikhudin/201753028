<div class="col-lg-3 col-md-4 col-12 p-2">
    <div class="card border-warning " style="width: 18rem;">
        <div class="card-header text-white" style=" background-color: #F7941D; color:#fff;">
            <a href="<?= base_url('shop/user/index.php') ?>">Dashboard</a>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="<?= base_url('shop/user/index.php?halaman=profile') ?>">Profile</a></li>
            <li class="list-group-item"><a href="<?= base_url('cart') ?>">Keranjang</a></li>
            <li class="list-group-item"><a href="<?= base_url('checkout') ?>">Checkout</a></li>
            <li class="list-group-item"><a href="<?= base_url('pembayaran') ?>">Pembayaran</a></li>
            <li class="list-group-item"><a href="<?= base_url('pengiriman') ?>">Pengiriman</a></li>
        </ul>
    </div>

    <div class="single-widget recent-post border" style="background-color:white ;">
        <h3 class="title">Product Baru</h3>
        
        <?php
        $sql_tampil_produk = "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 3";
        $query_tampil_produk = mysqli_query($koneksi, $sql_tampil_produk);
        $no = 1; //nilai awal nomer
        while ($bar_bar = mysqli_fetch_array($query_tampil_produk, MYSQLI_BOTH)) {
        ?>
            <div class="single-post first">
                <div class="image">
                    <img src="https://source.unsplash.com/75x75?<?= $bar_bar['nama_produk']; ?>" alt="#">
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