<?php

error_reporting(0);

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
                            <div class="share-social mt-4">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="row">
                                        <div style="display: none;">
                                            <?php
                                            //Jika pengunjung login 
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
                                                        } // Looping data explode

                                                        // membuat array data id_produk dalam semua checkout
                                                        array_push($arraytransaksicheckout, $push_produk);
                                                    } //Looping data checkout

                                                    //mengubah array arraytransaksicheckout menjadi array single atau baris
                                                    $array_unique = call_user_func_array('array_merge', $arraytransaksicheckout);

                                                    // menghilangkan data id_produk yang duplicat dengan unique
                                                    $barang = array_unique($array_unique);

                                                    //membuat variabel count barang
                                                    $c_barang = array_unique($array_unique);

                                                    //menghilangkan shift
                                                    $shift_shift = array_shift($c_barang);

                                                    // Tampung data array
                                                    $delkos = $c_barang;

                                                    //mencari index array yang mau dihilangkan
                                                    $delkey = array_search("", $delkos);

                                                    //Menghilangkan satu array di berdasarkan key
                                                    unset($delkos[$delkey]);

                                                    // print("<pre>".print_r($delkos,true)."</pre>");

                                                    $rekomendasi = $delkos;

                                                    //count barang
                                                    $count_barang = count($c_barang);

                                                    // nilai minimum 30%
                                                    $minimum_support = 0.3;

                                                    //minimum jumlah transaksi support
                                                    $minimum_jumlah_transaksi = round($count_barang * $minimum_support);

                                                    //membuat variabel transaksi berdasarkan array checkout
                                                    $transaksi = $arraytransaksicheckout;

                                                    //menghitung jumlah transaksi
                                                    $count_transaksi = count($transaksi);

                                                    //memmbuat constan banyak transaksi
                                                    define("ci_transaksi", $count_transaksi);

                                                    // function mencari id_produk pada transaksi
                                                    function Search($xvalue, $array)
                                                    {
                                                        //mencari id produk berdasarkan nilai array
                                                        $search = (array_search($xvalue, $array));

                                                        //jika tidak ada id_produk pada arrat
                                                        if ($search == false) {
                                                            $val = 0;

                                                        //jika ada id_produk pada array
                                                        } elseif ($search == 0) {
                                                            $val = 1;
                                                        } else {
                                                            $val = 1;
                                                        }
                                                        return  $val;
                                                    } // function mencari id_produk pada transaksi
                                                    ?>

                                                    <!-- Transaksi -->
                                                    <div class="col-md-12 mt-3"> 
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>Transaksi</td>
                                                                <td>Pattern</td>
                                                            </tr>
                                                            <?php
                                                            $no = 1; // no dimulai dari 1

                                                            //Looping menggunakan for pada id_produk
                                                            for ($row = 0; $row < $count_transaksi; $row++) { ?>
                                                                <tr>
                                                                    <td><?= $no++ ?></td>
                                                                    <td>
                                                                        <?php
                                                                        //menghitung jumlah transaksi per checkout
                                                                        $count_index_transaksi = count($transaksi[$row]);

                                                                        // Looping id_peoduk sebanyak transaksi checkout untuk mencari jumlah item id_produk pada transaksi
                                                                        for ($col = 0; $col < $count_index_transaksi; $col++) {
                                                                            // echo $transaksi[$row][$col] . ",";

                                                                            //jika id_produk tidak ada pada transaksi maka biarkan
                                                                            if ($transaksi[$row][$col] == "") {

                                                                            //kecuali id_produk ada pada transaksi maka tampilkan
                                                                            } else {

                                                                                //menampilkan produk berdasarkan id_produk
                                                                                $produk1 = querysatudata("SELECT * FROM produk WHERE id_produk =" . $transaksi[$row][$col] . " ");

                                                                                //output nama produk
                                                                                echo $produk1['nama_produk'] . ", ";
                                                                            }
                                                                        } // End Looping transaksi
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            } // End Looping id_produk
                                                            ?>
                                                        </table>
                                                    </div>
                                                    <!-- Transaksi -->

                                                    <!-- Pattern Item set 1 -->
                                                    <div class="col-md-12 mt-3">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>Pattern Item set 1</th>
                                                                <th>Jumlah Transaksi</th>
                                                                <th>Support </th>
                                                            </tr>
                                                            <?php
                                                            //menampung Item set-1
                                                            $itemset1 = []; //array kosong sebagai penampung $itemset1
                                                            $itemset1_values = []; //array kosong sebagai penampung $itemset1_values
                                                            $cek_jumlah_itemset1_supercount = 0; // variabel penampung dimulai dari 0 

                                                            foreach ($barang as $bar) { // Looping Produk 
                                                                if ($bar !== "") { // Jika data produk tidak sama dengan kosong atau nulll
                                                            ?>
                                                                    <tr>
                                                                        <td>
                                                                            <!-- <?= $bar ?> -->
                                                                            <?php
                                                                            //menampilkan produk berdasarkan id_produk
                                                                            $produk1itemset = querysatudata("SELECT * FROM produk WHERE id_produk =" . $bar . " ");
                                                                            echo $produk1itemset['nama_produk'];
                                                                            ?>
                                                                        </td>

                                                                        <?php

                                                                        //index support count dimulai dari 0
                                                                        $supportcount = 0;

                                                                        //Looping id_produk sebanyak transaksi
                                                                        for ($row = 0; $row < $count_transaksi; $row++) { 
                                                                            
                                                                            //cek muncul banyaknya id_produk pada transaki checkout
                                                                            $supportcount += Search($bar, $transaksi[$row]);
                                                                        }
                                                                        ?>
                                                                        <td <?php
                                                                            //hitung jumlah id_produk yang muncul pada transaksi 
                                                                            $hitung_support1 = ($supportcount / count($barang)) * 100;

                                                                            //jika id_produk kurang dari jumlah minimum transaksi maka kolol berwarna merah
                                                                            if ($supportcount < $minimum_jumlah_transaksi) {
                                                                                echo "style='background-color:red;'";
                                                                            }
                                                                            ?>>
                                                                            <?php

                                                                            //jumlah id_produk yang muncul pada transaksi
                                                                            echo $supportcount;
                                                                            ?>

                                                                        </td>
                                                                        <td <?php

                                                                            //jumlah id_produk yang muncul pada transaksi
                                                                            if ($supportcount < $minimum_jumlah_transaksi) {
                                                                                echo "style='background-color:red;'";
                                                                            }
                                                                            ?>>
                                                                            <?php
                                                                            //output hitung persen support
                                                                            echo  round($hitung_support1) . "%";

                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    
                                                                    //jika id_produk memenuhi nilai minimum support maka tampung dalam array $pattern
                                                                    if ($supportcount >= $minimum_jumlah_transaksi) {

                                                                        //membuat array multidimensi assosiative pattern
                                                                        $pattern = [$bar => $supportcount];

                                                                        // menambahkan pattern pada item set 1
                                                                        array_push($itemset1, $pattern);

                                                                        ///menambahkan 1 setiap ada id_produk yang memenuhi 
                                                                        $cek_jumlah_itemset1_supercount += 1;

                                                                        //membuat array assosiative pattern
                                                                        $pattern_value = [$bar];

                                                                        // menambahkan pattern pada item set 1
                                                                        array_push($itemset1_values, $pattern_value);
                                                                    }
                                                                } // Jika data produk tidak sama dengan kosong atau nulll
                                                            } // Looping Produk 
                                                            ?>
                                                        </table>
                                                    </div>
                                                    <!-- Pattern Item set 1 -->


                                                    
                                                    <?php
                                                        //jika item set 1 memiliki supercount
                                                        if ($cek_jumlah_itemset1_supercount > 0) {

                                                                $rekomendasi = $delkos;

                                                            //Jika array dari itemset 1 lebih dari satu
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
                                                                    //mencari id_produk 1 pada data transaksi checkout
                                                                    $search1 = (array_search($value1, $array));

                                                                    //mencari id_produk 2 pada data transaksi checkout
                                                                    $search2 = (array_search($value2, $array));

                                                                    // cek jika ada 2 id_produk pada transaksi checkout
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

                                                                    //kembalikan nilai $val
                                                                    return  $val;
                                                                }
                                                            ?>
                                                            <div class="col-md-12 mt-3">
                                                                <table class="table border">
                                                                    <tr>
                                                                        <th>Pattern Item set 2</th>
                                                                        <th>Jumlah Transaksi</th>
                                                                        <th>Support</th>
                                                                    </tr>
                                                                    <?php
                                                                    $tampung_itemset3 = []; // buat array kosong $tampung_itemset3 untuk mrnampung data array yang memenuhi nilai support
                                                                    $index_itemset = 0; // buat indek id_produk yang memenuhi dimulai dari 0
                                                                    $cek_jumlah_itemset2_supercount = 0; // buat variabel cek jumlah id_Produk yang memenuhi support

                                                                    $tampung_confident = []; // buat array kosong $tampung_confident untuk menampung data itemset yang memenuhi support

                                                                    //Looping data array id_produk memenuhi support 1 
                                                                    foreach ($slice_tampung_item_set as $key => $value) {
                                                                        // mulai di looping dari 0 + 1
                                                                        $mulai = $key + 1;

                                                                        //Looping data array produk dengan item ke 2
                                                                        for ($v = $mulai; $v < $count_item_set; $v++) {


                                                                            $count_tampung_3 = 0; // buat variabel untuk menghitung pencarian id_produk pada transaksi

                                                                            // hitung item set yang juumlahnya ada 2
                                                                            for ($row = 0; $row < $count_transaksi; $row++) {

                                                                                // cek 2 id_produk yang pada transaksi checkout
                                                                                $count_tampung_3 += searchitemset2($tampung_item_set[$key], $tampung_item_set[$v], $transaksi[$row]);
                                                                            }
                                                                            ?>

                                                                            <tr>
                                                                                <td>

                                                                                    <!-- <?= $tampung_item_set[$key] . ", " . $tampung_item_set[$v] ?>  -->

                                                                                    <?php
                                                                                    //menampilkan produk 1
                                                                                    $produk2key = querysatudata("SELECT * FROM produk WHERE id_produk =" . $tampung_item_set[$key] . " ");
                                                                                    echo $produk2key['nama_produk'];
                                                                                    echo ", ";

                                                                                    //menampilkan produk 2
                                                                                    $produk2v = querysatudata("SELECT * FROM produk WHERE id_produk =" . $tampung_item_set[$v]  . " ");
                                                                                    echo $produk2v['nama_produk'];
                                                                                    ?>

                                                                                </td>
                                                                                <td <?php
                                                                                    // hitung prosen 2 id_produk yang memenuhi supoort
                                                                                    $hitung_support2 = ($count_tampung_3 / $count_transaksi) * 100;

                                                                                    // jika  2 id_produk tidak memenuhi supoort maka sel baris berwarna merah
                                                                                    if ($count_tampung_3 <  $minimum_jumlah_transaksi) {
                                                                                        echo "style='background-color:red;'";
                                                                                    }
                                                                                    ?>>
                                                                                    <?= $count_tampung_3; ?>
                                                                                </td>
                                                                                <td <?php
                                                                                    // jika  2 id_produk tidak memenuhi supoort maka sel baris berwarna merah
                                                                                    if ($count_tampung_3 <  $minimum_jumlah_transaksi) {
                                                                                        echo "style='background-color:red;'";
                                                                                    }
                                                                                    ?>> <?= round($hitung_support2) . "%"; ?>
                                                                                </td>
                                                                            </tr>

                                                                        <?php

                                                                            $index_itemset += 1; // menambah 1 pada setiap transaksi pada 2 id_produk yang memenuhi support sebagai array key

                                                                            //Eleminasi berdasarkan nminimum support
                                                                            if ($count_tampung_3 >=  $minimum_jumlah_transaksi) {

                                                                                //menambahkan 1 pada cek_jumlah_itemset2_supercount jika memenuhi support
                                                                                $cek_jumlah_itemset2_supercount += 1;

                                                                                //membuat data array berdasarkan index dan id_produk 1
                                                                                $pattern_value1 = [$index_itemset => $tampung_item_set[$key]];

                                                                                //membuat data array berdasarkan index dan id_produk 1
                                                                                $pattern_value2 = [$index_itemset => $tampung_item_set[$v]];

                                                                                //menambahkan array $pattern_value1 kedalam array $tampung_itemset3
                                                                                array_push($tampung_itemset3, $pattern_value1);

                                                                                //menambahkan array $pattern_value2 kedalam array $tampung_itemset3
                                                                                array_push($tampung_itemset3, $pattern_value2);

                                                                                //membuat array $keyvdengan key dan value nya $tampung_item_set[$v]
                                                                                $keyv = ["$tampung_item_set[$key]" => $tampung_item_set[$v]];

                                                                                //menambahkan array berdasarkan produk yang memenuhi nilai minimum_jumlah_transaksi 
                                                                                array_push($tampung_confident,  $keyv);
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </table>
                                                            </div>




                                                            <?php
                                                            //jika data tampung array $tampung_confident lebih dari 0 
                                                            if (count($tampung_confident) > 0) {
                                                            ?>
                                                                <div class="col-xl-12 mt-3 mb-3">
                                                                    <?php
                                                                        // mencari key pada $tampung_confident
                                                                        $keys = array_keys($tampung_confident);
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
                                                                        //Looping data confident berdasarkan jumlah confident
                                                                        for ($i = 0; $i < count($tampung_confident); $i++) { ?>

                                                                            <tr>
                                                                                <?php
                                                                                // Looping data $tampung_confident dengan index key dan value $tampung_confident
                                                                                foreach ($tampung_confident[$keys[$i]] as $key => $value) {
                                                                                ?>
                                                                                    <td>Jika membeli</td>
                                                                                    <td>
                                                                                        <?php
                                                                                        //menampilkan data produk
                                                                                        $confidenmembeli2 = querysatudata("SELECT * FROM produk WHERE id_produk =" . $key . " ");
                                                                                        ?>
                                                                                        <!-- <?= $key  ?> -->
                                                                                        <?= $confidenmembeli2['nama_produk'] ?>
                                                                                    </td>
                                                                                    <td>Maka, beli</td>
                                                                                    <td>
                                                                                        <!-- <?= $value ?> -->
                                                                                        <?php
                                                                                        //menampilkan data produk
                                                                                        $confidenmaka2 = querysatudata("SELECT * FROM produk WHERE id_produk =" . $value . " ");
                                                                                        ?>
                                                                                        <?= $confidenmaka2['nama_produk'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                                                                                        $count_valAB = 0; // hitung jumlah AB di mulai dari 0
                                                                                        for ($row = 0; $row < $count_transaksi; $row++) {

                                                                                            //hitung jumlah AB ditambahkan 1 jika ada pada transaksi
                                                                                            $count_valAB += searchitemset2($key, $value, $transaksi[$row]);
                                                                                        }

                                                                                        //output jumlah AB
                                                                                        echo $count_valAB;

                                                                                        ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                                                                                        $count_valA = 0; // hitung jumlah A di mulai dari 0
                                                                                        for ($row = 0; $row < $count_transaksi; $row++) {

                                                                                            //hitung jumlah AB ditambahkan 1 jika ada pada transaksi
                                                                                            $count_valA += Search($value, $transaksi[$row]);
                                                                                        }

                                                                                        //output jumlah A
                                                                                        echo $count_valA;
                                                                                        ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                                                                                        //output Confident
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

                                                    //jika jumlah itemset yang memenuhi item set 2 lebih dari 0
                                                    if ($cek_jumlah_itemset2_supercount > 0) {

                                                        //membuat uniq data confident 2 atau menghilangkan duplikayt id_produk
                                                        $single_tampung_confident = array_unique($tampung_confident);

                                                        $rekomendasi = $single_tampung_confident;

                                                        // mengubah array multidimensi menjadi array single
                                                        $tampung_itemset3single = call_user_func_array('array_merge', $tampung_itemset3);

                                                        //menghasilkan array unique tidak duplicat
                                                        $tampung_itemset3unique = array_unique($tampung_itemset3single);

                                                        $rekomendasi = $tampung_itemset3unique;
                                                        //membuat variabel 
                                                        $slice_tampung_item_set = $tampung_item_set;

                                                        //menghihitung jumlah array item set
                                                        $count_item_set = count($tampung_item_set);

                                                        // membuat function permutation dengan parameter array 
                                                        function computePermutations($array)
                                                        {
                                                            $result = []; // buat array $result

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


                                                        // membuat function s3 untuk mengecek data 3 id_produk pada transaksi
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


                                                        <div class="col-xl-12 mt-3">
                                                            <table class="table" border="1">
                                                                <tr>
                                                                    <th>Item set-3</th>
                                                                    <th>Jumlah Transaksi</th>
                                                                    <th>Suppport</th>
                                                                </tr>
                                                                <?php
                                                                $data_tampung_itemset3 = []; // membuat array $data_tampung_itemset3 untuk menampung data yang memenuhi support
                                                                $bs = 0;  // buat variabel bs dimulai dari 0
                                                                $cek_jumlah_itemset3_supercount = 0; // buat variabel bs dimulai dari 0

                                                                //Looping data permutasi yang di buat berdasarkan jumlah hasil permutasi
                                                                for ($row = 0; $row <  $count_result; $row++) {
                                                                ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php
                                                                            $dataset = []; // membuat array data set untuk menampung array 

                                                                            //Looping data 3 id_produk dari hasil permutasi 3 berdasarkan index 0,1,2 
                                                                            for ($col = 0; $col < 3; $col++) {

                                                                                // echo $results[$row][$col] . ",";

                                                                                //menampilkan data produk
                                                                                $produk3itemset = querysatudata("SELECT * FROM produk WHERE id_produk =" . $results[$row][$col] . " ");
                                                                                echo $produk3itemset['nama_produk'];
                                                                                echo  ", ";


                                                                                //menampung data array permutasi 3 produk ke $dataset
                                                                                $dataset[] = $results[$row][$col];
                                                                            }

                                                                            //cek jumlah kombinasi e id_produk pada tranasaksi checkout
                                                                            $setdat = s3($dataset, $transaksi);
                                                                            // var_dump($dataset);

                                                                            //jika $setdat dari jumlah minimum support maka
                                                                            if ($setdat >= $minimum_jumlah_transaksi) {

                                                                                //tambahkan cek jumlah item set 3
                                                                                $cek_jumlah_itemset3_supercount += 1;

                                                                                //tambahkan nilai array pada array $data_tampung_itemset3 
                                                                                array_push($data_tampung_itemset3, $dataset);
                                                                            }

                                                                            if ($setdat > $bs) {
                                                                                $bs = $setdat;
                                                                                $bc = array_diff_key($dataset);
                                                                            }

                                                                            ?>
                                                                        </td>
                                                                        <td <?php
                                                                            //$setdat kurang dari jumlah minimum support maka berwarna merah
                                                                            if ($setdat < $minimum_jumlah_transaksi) {
                                                                                echo "style='background-color:red;'";
                                                                            }
                                                                            ?>>
                                                                            <?= $setdat ?>
                                                                        </td>
                                                                        <td <?php
                                                                            $hitung_support3 = ($setdat / $count_barang) * 100;
                                                                            //$setdat kurang dari jumlah minimum support maka berwarna merah
                                                                            if ($setdat < $minimum_jumlah_transaksi) {
                                                                                echo "style='background-color:red;'";
                                                                            }
                                                                            ?>>

                                                                            <?php
                                                                            //output prosen setdat dari transaksi
                                                                            echo   round(($setdat  / $count_transaksi) * 100) ."%";

                                                                            ?>

                                                                            <!-- <?= $setdat ?> -->
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>


                                                            </table>

                                                        </div>

                                                        <?php

                                                        // Jika data item set 3 ada yang memenuhi jumlah minimum transaksi maka hitung Confident
                                                        if (count($data_tampung_itemset3) > 0) {

                                                            // $rekomendasi = $data_tampung_itemset3;
                                                           // var_dump($data_tampung_itemset3);
                                                        ?>
                                                        <div class="col-xl-12 mt-3">


                                                            <h3>Confidence</h3>
                                                            <p>Asosiasi 3 item dari terpilih</p>
                                                            <table class="table mt-3 mb-3">
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
                                                                    // Function mencari jumlah transaksi pada A
                                                                    function searchab3($array, $transaksi)
                                                                    {
                                                                        $count_trxs = count($transaksi);

                                                                        $ino = 0;
                                                                        for ($row = 0; $row < $count_trxs; $row++) {

                                                                            $search1 = (array_search(current($array), $transaksi[$row]));
                                                                            $search2 = (array_search(end($array), $transaksi[$row]));

                                                                            if ($search1 == false and $search2 == false ) {
                                                                                $ino += 0;
                                                                            } elseif ($search1 == true and $search2 == false ) {
                                                                                $ino += 0;
                                                                            }  elseif ($search1 == false and $search2 == true ) {
                                                                                $ino += 0;
                                                                            }  elseif ($search1 == true and $search2 == true ) {
                                                                                $ino += 1;
                                                                            }
                                                                        }

                                                                        // mengembalikan data $ino
                                                                        return  $ino;
                                                                    }


                                                                // Loping data produk item set 3 yang lolos jumlah minimum pada item set 3
                                                                foreach ($data_tampung_itemset3 as $tampil_itemset3) {

                                                                    //Looping produk yang item set 3 
                                                                    foreach($tampil_itemset3 as $tampil_3){
                                                                    ?>
                                                                        <tr>
                                                                            <td>Jika Membeli</td>

                                                                            <td>
                                                                                <?php 

                                                                                    // Tampung data array
                                                                                    $unset_arr = $tampil_itemset3;

                                                                                    //mencari index array yang mau dihilangkan
                                                                                    $key = array_search($tampil_3, $unset_arr);

                                                                                    //Menghilangkan satu array di berdasarkan key
                                                                                    unset($unset_arr[$key]);

                                                                                    //Looping data array yang sudah di hilangkang
                                                                                    foreach($unset_arr as $unar){

                                                                                        //Menampilkan data produk berdasarkan id_produk
                                                                                        $produk3un = querysatudata("SELECT * FROM produk WHERE id_produk =" . $unar . " ");
                                                                                        echo $produk3un['nama_produk'].", ";
                                                                                    }

                                                                                ?>
                                                                            </td>
                                                                            <td>Maka beli</td>
                                                                            <td>
                                                                                <!-- <?= $tampil_3 ?> -->
                                                                                <?php 
                                                                                    // Menampilkan produk yang confident 
                                                                                    $produk3A = querysatudata("SELECT * FROM produk WHERE id_produk =" . $tampil_3 . " ");
                                                                                    echo $produk3A['nama_produk'];
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php 
                                                                                    // Menghitung jumlah A dan B pada transaksi
                                                                                    $setdat33 = s3($tampil_itemset3, $transaksi);
                                                                                    echo $setdat33
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                
                                                                                <?php 

                                                                                    //Menghitung jumlah produk A pada transaksi
                                                                                    echo $count3_A = searchab3($unset_arr, $transaksi);
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php 

                                                                                // NIlai Confidente yaitu cell AB di bagi A
                                                                                echo $setdat33 / $count3_A;
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                } // Loping data produk item set 3 yang lolos jumlah minimum pada item set 3
                                                                ?>
                                                            </table>
                                                        </div>


                                                        <?php

                                                            // mengubah array multidimensi menjadi array single
                                                            $hasil_itemset3single = call_user_func_array('array_merge', $data_tampung_itemset3);

                                                            //menghasilkan array unique tidak duplicat
                                                            $hasil_itemset3unique = array_unique($tampung_itemset3single);

                                                        } // Jika data item set 3 ada yang memenuhi jumlah minimum transaksi maka hitung Confident
                                                        ?>

                                                        <?php
                                                    } //jika jumlah itemset yang memenuhi item set 2 lebih dari 0
                                                                
                                                                } //jika data tampung array lebih dari 0 
                                                            } //Jika array dari itemset 1 lebih dari satu
                                                        }  //jika item set 1 memiliki supercount
                                                    ?>


                                        </div>
                                                
                                                
                                                <?php
                                                    if ($rekomendasi == null) {

                                                    } else {

                                                        // Jika pengunjung LOgin
                                                        if (isset($_SESSION['id_user'])) {
                                                        ?>
                                                            <div class="col-12">
                                                                <h5>#Rekomendasi produk untuk anda :</h5>
                                                            </div>
                                                        <?php
                                                        }

                                                        foreach ($rekomendasi as $id_produk) { ?>
                                                            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                                <div class="single-product">
                                                                    <div class="product-img">
                                                                        <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $id_produk ?>">
                                                                            <?php
                                                                            $hasilproduk = querysatudata("SELECT * FROM produk WHERE id_produk =" . $id_produk . " ");
                                                                            ?>
                                                                            <img class="default-img" src="<?= base_url('gambar/produk/') ?><?= $hasilproduk['gambar'] ?>" height="200" alt="<?= $hasilproduk['gambar'] ?>" alt="#">
                                                                            <!-- <img class="hover-img" src="https://source.unsplash.com/550x750" alt="#"> -->
                                                                        </a>
                                                                        <div class="button-head">
                                                                            <div class="product-action">
                                                                                <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $hasilproduk['id_produk'] ?>"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                                                <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a> -->
                                                                                <!-- <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> -->
                                                                            </div>
                                                                            <div class="product-action-2">
                                                                                <a title="Add to cart" href="<?= base_url('cart/add_to_cart.php?id=' . $hasilproduk['id_produk']) ?>">Add to cart</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-content">
                                                                        <h3><a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $id_produk ?>"><?= $hasilproduk['nama_produk'] ?></a></h3>
                                                                        <div class="product-price">
                                                                            <span><?= rupiah($hasilproduk['harga_produk']) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                <?php }
                                                    }
                                                } //  jika ada checkout lebih dari 3 maka jalan algoritma Apriori
                                                ?>

                                            <?php
                                            } //Jika pengunjung login 
                                            ?>



                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <h5>#Produk yang mungkin anda minati :</h5>

                                        <div class="row">
                                            <?php
                                            //Menampilkan data produk banyak dalam arrray
                                            $sql_produks = "SELECT * FROM produk WHERE id_kategori = ".$produk['id_kategori']." ORDER BY id_produk DESC LIMIT 4 ";
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
                                                                    <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $data_produks['id_produk'] ?>"><i class=" ti-eye"></i><span>Quick Shop</span></a>
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
                                                                    <a href="<?= base_url('shop/index.php?halaman=detail_produk&id_produk=') . $data_produks['id_produk'] ?>"><i class=" ti-eye"></i><span>Quick Shop</span></a>
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