<?php
//jika item set 1 memiliki supercount
if ($cek_jumlah_itemset1_supercount > 0) { ?>
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
            // require 'backupdetail2.php';
            



            }

        } else {
            /// Nilai rekomendasi itemset 1
        }
?>


<?php
} else {
    // echo "Tidak Ada Isinya";
}


?>