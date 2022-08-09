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
                                    <?php 
                                    if(isset($_SESSION['id_user'])){


                                    ?>
                                    <div class="col-12">
                                        <h5>#Rekomendasi produk untuk anda :</h5>
                                    </div>
                                    <?php 
                                    }
                                    ?>
                                    <div class="col-12 mb-3">
                                        <div class="row">

                                            <?php
                                            //Jika dia login 
                                            if (isset($_SESSION['id_user'])) {

                                                //cari data checkout
                                                $cari_checkout = querysatudata("SELECT COUNT(id_checkout) as id_checkout FROM checkout WHERE id_user = " . $_SESSION['id_user'] . "");

                                                //  jika ada checkout lebih dari 3 maka jalan algoritma Apriori
                                                if ($cari_checkout['id_checkout'] > 3) {

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

                                                    // nilai minimum 50%
                                                    $minimum_support = $count_barang * 0.1;

                                                    //membuat variabel transaksi berdasarkan array checkout
                                                    $transaksi = $arraytransaksicheckout;

                                                    //menghitung jumlah transaksi
                                                    $count_transaksi = count($transaksi);

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

                                                    <div class="col-md-12">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>Transaksi</td>
                                                                <td>Produk</td>
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
                                                                            echo $transaksi[$row][$col] . ",";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>Pattern Item set 1</th>
                                                                <th>Super Count</th>
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
                                                                        <td><?= $bar ?></td>

                                                                        <?php

                                                                        //index support count dimulai dari 0
                                                                        $supportcount = 0;

                                                                        for ($row = 0; $row < $count_transaksi; $row++) {
                                                                            //kolom support count
                                                                            $supportcount += Search($bar, $transaksi[$row]);
                                                                        }
                                                                        ?>
                                                                        <td <?php
                                                                            if ($supportcount < $minimum_support) {
                                                                                echo "style='background-color:red;'";
                                                                            }
                                                                            ?>>
                                                                            <?php
                                                                            echo $supportcount;
                                                                            ?>

                                                                        </td>
                                                                    </tr>
                                                            <?php


                                                                    if ($supportcount >= $minimum_support) {
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
                                                    <div class="col-md-12">
                                                        <?php
                                                        //jika item set 1 memiliki supercount
                                                        if ($cek_jumlah_itemset1_supercount > 0) {

                                                            if (count($itemset1_values) > 1) {
                                                                // membuat tampung data item set
                                                                $tampung_item_set = [];
                                                                foreach ($itemset1_values as $x => $x_value) {
                                                                    // echo " index = " . $x;
                                                                    foreach ($x_value as $barang => $barang_value) {
                                                                        // echo " Key= " . $barang . " value " . $barang_value;
                                                                        // echo "<br>";

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
                                                                        <th>Super Count</th>
                                                                    </tr>
                                                                    <?php
                                                                    $tampung_itemset3 = [];
                                                                    $index_itemset = 0;
                                                                    $cek_jumlah_itemset2_supercount = 0;

                                                                    foreach ($slice_tampung_item_set as $key => $value) {
                                                                        $mulai = $key + 1;
                                                                        for ($v = $mulai; $v < $count_item_set; $v++) {

                                                                            $count_tampung_3 = 0;
                                                                            for ($row = 0; $row < $count_transaksi; $row++) {
                                                                                $count_tampung_3 += searchitemset2($tampung_item_set[$key], $tampung_item_set[$v], $transaksi[$row]);
                                                                            }
                                                                    ?>
                                                                            <tr>
                                                                                <td><?= $tampung_item_set[$key] . ", " . $tampung_item_set[$v] ?> </td>
                                                                                <td <?php
                                                                                    if ($count_tampung_3 < $minimum_support) {
                                                                                        echo "style='background-color:red;'";
                                                                                    }
                                                                                    ?>> <?= $count_tampung_3; ?> </td>
                                                                            </tr>

                                                                    <?php
                                                                            $index_itemset += 1;

                                                                            //Eleminasi berdasarkan nminimum support
                                                                            if ($count_tampung_3 >= $minimum_support) {

                                                                                $cek_jumlah_itemset2_supercount += 1;

                                                                                $pattern_value1 = [$index_itemset => $tampung_item_set[$key]];
                                                                                $pattern_value2 = [$index_itemset => $tampung_item_set[$v]];
                                                                                array_push($tampung_itemset3, $pattern_value1);
                                                                                array_push($tampung_itemset3, $pattern_value2);
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </table>

                                                        <?php
                                                            }
                                                        } else {
                                                            /// Nilai rekomendasi itemset 1
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-md-12">
                                                    </div>
                                                    <?php
                                                    if ($cek_jumlah_itemset2_supercount > 0) {

                                                        // mengubah array multidimensi menjadi array single
                                                        $tampung_itemset3single = call_user_func_array('array_merge', $tampung_itemset3);

                                                        //menghasilkan array unique tidak duplicat
                                                        $tampung_itemset3unique = array_unique($tampung_itemset3single);

                                                        //membuat variabel 
                                                        $slice_tampung_item_set = $tampung_item_set;

                                                        //menghihitung jumlah array item set
                                                        $count_item_set = count($tampung_item_set);

                                                        function computePermutations($array)
                                                        {
                                                            $result = [];

                                                            $recurse = function ($array, $start_i = 0) use (&$result, &$recurse) {
                                                                if ($start_i === count($array) - 1) {
                                                                    array_push($result, $array);
                                                                }

                                                                for ($i = $start_i; $i < count($array); $i++) {
                                                                    //Swap array value at $i and $start_i
                                                                    $t = $array[$i];
                                                                    $array[$i] = $array[$start_i];
                                                                    $array[$start_i] = $t;

                                                                    //Recurse
                                                                    $recurse($array, $start_i + 1);

                                                                    //Restore old order
                                                                    $t = $array[$i];
                                                                    $array[$i] = $array[$start_i];
                                                                    $array[$start_i] = $t;
                                                                }
                                                            };

                                                            $recurse($array);

                                                            return $result;
                                                        }

                                                        //eksekusi permutasi data berdasarkan id_produk yang unique
                                                        $results = computePermutations($slice_tampung_item_set);

                                                        //menghitung jumlah array unique
                                                        $count_result = count($slice_tampung_item_set);

                                                        function searchitemset3($value1, $value2, $array)
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

                                                        function arrayitemset3($arraysearch, $arraytransaksi)
                                                        {
                                                            searchitemset3($arraysearch[0], $arraysearch[1], $arraysearch[2], $arraytransaksi);
                                                        }


                                                        function s3($array, $transaksi)
                                                        {
                                                            $count_trxs = count($transaksi);

                                                            $ino = 0;
                                                            for ($row = 0; $row < $count_trxs; $row++) {

                                                                $search1 = (array_search($array[0], $transaksi[$row]));
                                                                $search2 = (array_search($array[1], $transaksi[$row]));
                                                                $search3 = (array_search($array[2], $transaksi[$row]));

                                                                if ($search1 == false and $search2 == false and $search3 == false) {
                                                                    $ino += 0;
                                                                } elseif ($search1 == true and $search2 == false and $search3 == false) {
                                                                    $ino += 0;
                                                                } elseif ($search1 == true and $search2 == true and $search3 == false) {
                                                                    $ino += 0;
                                                                } elseif ($search1 == true and $search2 == false and $search3 == true) {
                                                                    $ino += 0;
                                                                } elseif ($search1 == false and $search2 == true and $search3 == false) {
                                                                    $ino += 0;
                                                                } elseif ($search1 == false and $search2 == true and $search3 == true) {
                                                                    $ino += 0;
                                                                } elseif ($search1 == false and $search2 == false and $search3 == true) {
                                                                    $ino += 0;
                                                                } elseif ($search1 == true and $search2 == true and $search3 == true) {
                                                                    $ino += 1;
                                                                }
                                                            }
                                                            return  $ino;
                                                        }
                                                    ?>


                                                        <div class="col-xl-12">
                                                            <table class="table" border="1">
                                                                <tr>
                                                                    <th>Item set-3</th>
                                                                    <th>Super Count</th>
                                                                </tr>
                                                                <?php
                                                                $data_tampung_itemset3 = [];
                                                                $bs = 0;
                                                                $cek_jumlah_itemset3_supercount = 0;
                                                                for ($row = 0; $row <  $count_result; $row++) {
                                                                ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php
                                                                            $dataset = [];
                                                                            for ($col = 0; $col < 3; $col++) {

                                                                                echo $results[$row][$col] . ",";

                                                                                $dataset[] = $results[$row][$col];
                                                                            }
                                                                            $setdat = s3($dataset, $transaksi);

                                                                            if ($setdat >= $minimum_support) {

                                                                                //tambahkan cek jumlah item set 3
                                                                                $cek_jumlah_itemset3_supercount += 1;

                                                                                array_push($data_tampung_itemset3, $dataset);
                                                                            }

                                                                            if ($setdat > $bs) {
                                                                                $bs = $setdat;
                                                                                $bc = array_diff_key($dataset);
                                                                            }

                                                                            ?>
                                                                        </td>
                                                                        <td <?php
                                                                            if ($setdat < $minimum_support) {
                                                                                echo "style='background-color:red;'";
                                                                            }
                                                                            ?>>

                                                                            <?= $setdat ?></td>
                                                                    </tr>
                                                                <?php
                                                                }

                                                                // mengubah array multidimensi menjadi array single
                                                                $hasil_itemset3single = call_user_func_array('array_merge', $data_tampung_itemset3);

                                                                //menghasilkan array unique tidak duplicat
                                                                $hasil_itemset3unique = array_unique($tampung_itemset3single);

                                                                ?>

                                                            </table>

                                                        </div>
                                                        <?php
                                                    } else {
                                                        // echo "Tidak Ada Isinya";
                                                    }


                                                    /// Logika menampilkan hasil 

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
                                                        foreach ($rekomendasi as $id_produk) { ?>
                                                            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                                <div class="single-product">
                                                                    <div class="product-img">
                                                                        <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $id_produk ?>">
                                                                            <?php
                                                                            $hasilproduk = querysatudata("SELECT * FROM produk WHERE id_produk =" . $id_produk . " ");


                                                                            ?>
                                                                            <img class="default-img" src="https://source.unsplash.com/550x750/?<?= $hasilproduk['nama_produk'] ?>" alt="#">
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
                                                }
                                                ?>





                                            <?php
                                            }

                                            ?>



                                        </div>
                                    </div>

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