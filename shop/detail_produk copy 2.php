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
                                <!-- <img src="https://source.unsplash.com/950x460" alt="#"> -->
                                <img src="<?= base_url('gambar/produk/') ?><?= $produk['gambar'] ?>" style=" width:950px; height:460px;" alt="<?= $produk['gambar'] ?>">
                            </div>
                            <div class="blog-detail">
                                <h2 class="blog-title"><?= $produk['nama_produk'] ?></h2>
                                <div class="blog-meta">
                                    <!-- <span class="author"><a href="#"><i class="fa fa-user"></i>By Admin</a><a href="#"><i class="fa fa-calendar"></i>Dec 24, 2018</a><a href="#"><i class="fa fa-comments"></i>Comment (15)</a></span> -->
                                </div>
                                <div class="content">
                                    <p>
                                        <?= $produk['deskripsi'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                            <div class="share-social mt-4">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="row">

                                            <?php
                                            //Jika dia login 
                                            if (isset($_SESSION['id_user'])) {

                                                //cari data checkout
                                                $cari_checkout = querysatudata("SELECT COUNT(id_checkout) as id_checkout FROM checkout WHERE id_user = " . $_SESSION['id_user'] . "");

                                                //  jika ada checkout lebih dari 3 maka jalan algoritma Apriori
                                                if ($cari_checkout['id_checkout'] > 0) {

                                                    //koneksi database
                                                    $mysqli = new mysqli("localhost", "root", "", "201753028");

                                                    //query cehckout user
                                                    $query = "SELECT * FROM checkout WHERE id_user = " . $_SESSION['id_user'] . "";

                                                    // eksekusi query
                                                    $result = $mysqli->query($query);

                                                    $arraytransaksicheckout = [];

                                                    //Looping data checkout
                                                    foreach ($result as $row) {

                                                        //explode data id_keranjang
                                                        $trxc =  explode(",", $row["id_keranjang"]);

                                                        //membuat array tampung
                                                        $push_produk = [];

                                                        // menambahkan satu array spasi
                                                        array_push($push_produk, "");

                                                        // Looping data explode
                                                        foreach ($trxc as $trkp) {

                                                            //menampilkan data produk
                                                            $produk = querysatudata("SELECT * FROM keranjang JOIN produk ON keranjang.id_produk = produk.id_produk WHERE keranjang.id_keranjang =" . $trkp . " ");

                                                            // membuat array data id_produk dalam satu checkout
                                                            array_push($push_produk, $produk['id_produk']);
                                                        }

                                                        // membuat array data id_produk dalam semua checkout
                                                        array_push($arraytransaksicheckout, $push_produk);
                                                    }

                                                    //mengubah array arraytransaksicheckout menjadi array single atau baris
                                                    $array_unique = call_user_func_array('array_merge', $arraytransaksicheckout);

                                                    // menghilangkan data id_produk yang duplicat dengan unique
                                                    $barang = array_unique($array_unique);


                                                    //membuat variabel count barang
                                                    $c_barang = array_unique($array_unique);

                                                    //menghilangkan shitf
                                                    $shift_shift = array_shift($c_barang);


                                                    //count barang
                                                    $count_barang = count($c_barang);

                                                    // nilai minimum 30%
                                                    $minimum_support = 0.05;
                                                    $minimum_jumlah_transaksi = round($count_barang / 10);


                                                    //membuat variabel transaksi berdasarkan array checkout
                                                    $transaksi = $arraytransaksicheckout;

                                                    //menghitung jumlah transaksi
                                                    $count_transaksi = count($transaksi);

                                                    define("ci_transaksi", $count_transaksi);

                                                    // function mencari id_produk pada transaksi
                                                    function Search($xvalue, $array)
                                                    {
                                                        $search = (array_search($xvalue, $array));

                                                        if ($search == false) {
                                                            $val = 0;
                                                        } elseif ($search == 0) {
                                                            $val = 1;
                                                        } else {
                                                            $val = 1;
                                                        }
                                                        return  $val;
                                                    }
                                            ?>
                                            <div class="col-md-12 mt-3">

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>Transaksi </td>
                                                        <td>Pattern</td>
                                                    </tr>
                                                    <?php
                                                    $no = 1;
                                                    for ($row = 0; $row < $count_transaksi; $row++) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td>
                                                                <?php
                                                                $count_index_transaksi = count($transaksi[$row]);
                                                                for ($col = 0; $col < $count_index_transaksi; $col++) {
                                                                    // echo $transaksi[$row][$col] . ",";

                                                                    if ($transaksi[$row][$col] == "") {
                                                                    } else {
                                                                        $produk1 = querysatudata("SELECT * FROM produk WHERE id_produk =" . $transaksi[$row][$col] . " ");

                                                                        echo $produk1['nama_produk'] . ", ";
                                                                    }
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                                    
                                            <div class="col-md-12 mt-3">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Pattern Item set 1</th>
                                                        <th>Jumlah Transaksi</th>
                                                        <th>Support </th>
                                                    </tr>
                                                    <?php
                                                    //menampung Item set-1
                                                    $itemset1 = [];
                                                    $itemset1_values = [];
                                                    $cek_jumlah_itemset1_supercount = 0;

                                                    foreach ($barang as $bar) {
                                                        if ($bar !== "") {
                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <!-- <?= $bar ?> -->
                                                                    <?php
                                                                    $produk1itemset = querysatudata("SELECT * FROM produk WHERE id_produk =" . $bar . " ");
                                                                    echo $produk1itemset['nama_produk'];
                                                                    ?>
                                                                </td>

                                                                <?php

                                                                //index support count dimulai dari 0
                                                                $supportcount = 0;

                                                                for ($row = 0; $row < $count_transaksi; $row++) {
                                                                    //kolom support count
                                                                    $supportcount += Search($bar, $transaksi[$row]);
                                                                }
                                                                ?>
                                                                <td <?php
                                                                    $hitung_support1 = ($supportcount / count($barang)) * 100;
                                                                    if ($supportcount < $minimum_jumlah_transaksi) {
                                                                        echo "style='background-color:red;'";
                                                                    }
                                                                    ?>>
                                                                    <?php
                                                                    echo $supportcount;
                                                                    ?>

                                                                </td>
                                                                <td <?php

                                                                    if ($supportcount < $minimum_jumlah_transaksi) {
                                                                        echo "style='background-color:red;'";
                                                                    }
                                                                    ?>>
                                                                    <?php
                                                                    echo  round($hitung_support1) . "%";

                                                                    ?>
                                                                </td>
                                                            </tr>
                                                    <?php


                                                            if ($supportcount >= $minimum_jumlah_transaksi) {
                                                                //membuat array multidimensi assosiative pattern
                                                                $pattern = [$bar => $supportcount];

                                                                // menggabungkan pattern pada item set 1
                                                                array_push($itemset1, $pattern);

                                                                $cek_jumlah_itemset1_supercount += 1;

                                                                //membuat array assosiative pattern
                                                                $pattern_value = [$bar];
                                                                array_push($itemset1_values, $pattern_value);
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </table>
                                            </div>


                                                <!-- LOGIKA ITEM SET 1 -->

                                                <?php 
                                                    if($cek_jumlah_itemset1_supercount >= $minimum_jumlah_transaksi){
                                                        echo 'cek_jumlah_itemset1_supercount';
                                                ?>
                                                    <div class="col-md-12 mt-3">
                                                    <?php
                                                    if (count($itemset1_values) > 1) {
                                                        // membuat tampung data item set
                                                        $tampung_item_set = [];
                                                        foreach ($itemset1_values as $x => $x_value) {
                                                            // echo " index = " . $x;
                                                            foreach ($x_value as $barang => $barang_value) {
                                                                // echo " Key= " . $barang . " value " . $barang_value;

                                                                //menambahkan value item set
                                                                array_push($tampung_item_set, $barang_value);
                                                            }
                                                        }
                                                        //menghihitung jumlah array item set 1
                                                        $count_item_set = count($tampung_item_set);

                                                        $slice_tampung_item_set = $tampung_item_set;

                                                        // $itemset_kebawah = $tampung_item_set;
                                                        // // membuat item set ke bawah
                                                        $item_set_kebawah = array_shift($slice_tampung_item_set);
                                                        
                                                        //mencari data item set2 berdasarkan transaksi
                                                        function searchitemset2($value1, $value2, $array)
                                                        {
                                                            $search1 = (array_search($value1, $array));
                                                            $search2 = (array_search($value2, $array));

                                                            if ($search1 == false and $search2 == false) {
                                                                $val = 0;
                                                            } elseif ($search1 == false and $search2 == true) {
                                                                $val = 0;
                                                            } elseif ($search1 == true and $search2 == false) {
                                                                $val = 0;
                                                            } elseif ($search1 == true and $search2 == true) {
                                                                $val = 1;
                                                            } else {
                                                                $val = 1;
                                                            }
                                                            return  $val;
                                                        }
                                                    ?>   
                                                    
                                                        <table class="table border">
                                                            <tr>
                                                                <th>Pattern Item set 2</th>
                                                                <th>Jumlah Transaksi</th>
                                                                <th>Support</th>
                                                            </tr>
                                                            <?php
                                                            $tampung_itemset3 = [];
                                                            $index_itemset = 0;
                                                            $cek_jumlah_itemset2_supercount = 0;

                                                            $tampung_confident = [];

                                                            foreach ($slice_tampung_item_set as $key => $value) {
                                                                $mulai = $key + 1;
                                                                for ($v = $mulai; $v < $count_item_set; $v++) {

                                                                    $count_tampung_3 = 0;
                                                                    for ($row = 0; $row < $count_transaksi; $row++) {
                                                                        $count_tampung_3 += searchitemset2($tampung_item_set[$key], $tampung_item_set[$v], $transaksi[$row]);
                                                                    }
                                                            ?>
                                                                    <tr>
                                                                        <td>

                                                                            <!-- <?= $tampung_item_set[$key] . ", " . $tampung_item_set[$v] ?>  -->

                                                                            <?php
                                                                            $produk2key = querysatudata("SELECT * FROM produk WHERE id_produk =" . $tampung_item_set[$key] . " ");
                                                                            echo $produk2key['nama_produk'];
                                                                            echo ", ";
                                                                            $produk2v = querysatudata("SELECT * FROM produk WHERE id_produk =" . $tampung_item_set[$v]  . " ");
                                                                            echo $produk2v['nama_produk'];
                                                                            ?>

                                                                        </td>
                                                                        <td <?php

                                                                            $hitung_support2 = ($count_tampung_3 / $count_transaksi) * 100;

                                                                            if ($count_tampung_3 <  $minimum_jumlah_transaksi) {
                                                                                echo "style='background-color:red;'";
                                                                            }
                                                                            ?>>
                                                                            <?= $count_tampung_3; ?>
                                                                        </td>
                                                                        <td <?php
                                                                            if ($count_tampung_3 <  $minimum_jumlah_transaksi) {
                                                                                echo "style='background-color:red;'";
                                                                            }
                                                                            ?>> <?= round($hitung_support2) . "%"; ?>
                                                                        </td>
                                                                    </tr>

                                                            <?php
                                                                    $index_itemset += 1;

                                                                    //Eleminasi berdasarkan nminimum support
                                                                    if ($count_tampung_3 >=  $minimum_jumlah_transaksi) {

                                                                        $cek_jumlah_itemset2_supercount += 1;

                                                                        $pattern_value1 = [$index_itemset => $tampung_item_set[$key]];
                                                                        $pattern_value2 = [$index_itemset => $tampung_item_set[$v]];
                                                                        array_push($tampung_itemset3, $pattern_value1);
                                                                        array_push($tampung_itemset3, $pattern_value2);

                                                                        $keyv = ["$tampung_item_set[$key]" => $tampung_item_set[$v]];
                                                                        array_push($tampung_confident,  $keyv);
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </table>
                                                    </div>

                                                    <!-- Batas Item set 1 -->
                                                    <?php
                                                    if (count($tampung_confident) > 0) {
                                                    ?>
                                                        <div class="col-xl-12 mt-3 mb-3">
                                                            <?php
                                                                // echo count($tampung_confident); 
                                                                // echo "<br>";
                                                                // var_dump($tampung_confident); 
                                                                // echo "<br>";

                                                                $keys = array_keys($tampung_confident);
                                                                // for($i = 0; $i < count($tampung_confident); $i++) {
                                                                //     echo $keys[$i] . " =>";
                                                                //     foreach($tampung_confident[$keys[$i]] as $key => $value) {
                                                                //         echo $key . " : " . $value . "<br>";
                                                                //     }
                                                                // }

                                                            ?>
                                                            <h3>Confidence</h3>
                                                            <div>Asosiasi 2 item dari terpilih</div>

                                                            <table class="table">
                                                                <tr>
                                                                    <td></td>
                                                                    <td>A</td>
                                                                    <td></td>
                                                                    <td>B</td>
                                                                    <td>A&B</td>
                                                                    <td>A</td>
                                                                    <td>confiden</td>
                                                                </tr>

                                                                <?php

                                                                for ($i = 0; $i < count($tampung_confident); $i++) { ?>

                                                                    <tr>
                                                                        <?php
                                                                        foreach ($tampung_confident[$keys[$i]] as $key => $value) {
                                                                        ?>
                                                                            <td>Jika membeli</td>
                                                                            <td>
                                                                                <?php
                                                                                $confidenmembeli2 = querysatudata("SELECT * FROM produk WHERE id_produk =" . $key . " ");
                                                                                ?>
                                                                                <!-- <?= $key  ?> -->
                                                                                <?= $confidenmembeli2['nama_produk'] ?>
                                                                            </td>
                                                                            <td>Maka, beli</td>
                                                                            <td>
                                                                                <!-- <?= $value ?> -->
                                                                                <?php
                                                                                $confidenmaka2 = querysatudata("SELECT * FROM produk WHERE id_produk =" . $value . " ");
                                                                                ?>
                                                                                <?= $confidenmaka2['nama_produk'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $count_valAB = 0;
                                                                                for ($row = 0; $row < $count_transaksi; $row++) {
                                                                                    $count_valAB += searchitemset2($key, $value, $transaksi[$row]);
                                                                                }
                                                                                echo $count_valAB;

                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $count_valA = 0;
                                                                                for ($row = 0; $row < $count_transaksi; $row++) {
                                                                                    // $count_c += searchitemset2($key, $value, $transaksi[$row]);
                                                                                    $count_valA += Search($value, $transaksi[$row]);
                                                                                }
                                                                                echo $count_valA;
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                echo ($count_valAB / $count_valA);
                                                                                ?>
                                                                            </td>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>


                                                        
                                                        <?php
                                                            require 'backupdetail2.php';
                                                        
                                                    }

                                                    ?>

                                                <?php
                                                        }
                                                    }else{}
                                                ?>
                                                



                                                <!-- LOGIKA ITEM SET 1 -->
                                                
                                            <?php
                                                }
                                            ?>

                                        <?php
                                            }
                                        ?>
                                    </div>




                                    <div class="col-12 mt-3">
                                        <h5>#Produk yang mungkin anda minati :</h5>

                                        <div class="row">
                                            <?php
                                            //Menampilkan data produk banyak dalam arrray
                                            $sql_produks = "SELECT * FROM produk WHERE id_kategori = " . $produk['id_kategori'] . " ORDER BY id_produk DESC LIMIT 4 ";
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
                                                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                                    <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a> -->
                                                                    <!-- <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> -->
                                                                </div>
                                                                <div class="product-action-2">
                                                                    <a title="Add to cart" href="<?= base_url('cart/add_to_cart.php?id=' . $data_produks['id_produk']) ?>">Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3><a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $data_produks['id_produk'] ?>"><?= $data_produks['nama_produk'] ?></a></h3>
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
                                    <!-- Batas -->
                                    <div class="col-12 mt-3">
                                        <h5>#Produk Terbaru Kami :</h5>

                                        <div class="row">
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
                                                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                                    <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a> -->
                                                                    <!-- <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> -->
                                                                </div>
                                                                <div class="product-action-2">
                                                                    <a title="Add to cart" href="<?= base_url('cart/add_to_cart.php?id=' . $data_produks['id_produk']) ?>">Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3><a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $data_produks['id_produk'] ?>"><?= $data_produks['nama_produk'] ?></a></h3>
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

            <!-- Atur Checkout -->
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