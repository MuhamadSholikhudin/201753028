        <!-- Batas Item set 2 -->
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

            <div class="col-xl-12 mt-3">
                <table class="table" border="1">
                    <tr>
                        <th>Item set-3</th>
                        <th>Jumlah Transaksi</th>
                        <th>Suppport</th>
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

                                    // echo $results[$row][$col] . ",";
                                    $produk3itemset = querysatudata("SELECT * FROM produk WHERE id_produk =" . $results[$row][$col] . " ");
                                    echo $produk3itemset['nama_produk'];
                                    echo  ", ";


                                    $dataset[] = $results[$row][$col];
                                }
                                $setdat = s3($dataset, $transaksi);
                                // var_dump($dataset);

                                if ($setdat >= $minimum_jumlah_transaksi) {

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
                                if ($setdat < $minimum_jumlah_transaksi) {
                                    echo "style='background-color:red;'";
                                }
                                ?>>
                                <?= $setdat ?>
                            </td>
                            <td <?php
                                $hitung_support3 = ($setdat / $count_barang) * 100;
                                if ($setdat < $minimum_jumlah_transaksi) {
                                    echo "style='background-color:red;'";
                                }
                                ?>>

                                <?php
                                echo   round(($setdat  / $count_transaksi) * 100) . "%";

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
                    if (count($data_tampung_itemset3) > 0) {
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

                        function searchab3($array, $transaksi)
                        {
                            $count_trxs = count($transaksi);

                            $ino = 0;
                            for ($row = 0; $row < $count_trxs; $row++) {

                                $search1 = (array_search(current($array), $transaksi[$row]));
                                $search2 = (array_search(end($array), $transaksi[$row]));

                                if ($search1 == false and $search2 == false) {
                                    $ino += 0;
                                } elseif ($search1 == true and $search2 == false) {
                                    $ino += 0;
                                } elseif ($search1 == false and $search2 == true) {
                                    $ino += 0;
                                } elseif ($search1 == true and $search2 == true) {
                                    $ino += 1;
                                }
                            }
                            return  $ino;
                        }


                        foreach ($data_tampung_itemset3 as $tampil_itemset3) {
                            foreach ($tampil_itemset3 as $tampil_3) {
                        ?>
                                <tr>
                                    <td>Jika Membeli</td>

                                    <td>
                                        <?php
                                        $unset_arr = $tampil_itemset3;
                                        $key = array_search($tampil_3, $unset_arr);
                                        unset($unset_arr[$key]);
                                        // var_dump($unset_arr);


                                        foreach ($unset_arr as $unar) {

                                            $produk3un = querysatudata("SELECT * FROM produk WHERE id_produk =" . $unar . " ");
                                            echo $produk3un['nama_produk'] . ", ";
                                        }

                                        ?>
                                    </td>
                                    <td>Maka beli</td>
                                    <td>
                                        <!-- <?= $tampil_3 ?> -->

                                        <?php
                                        $produk3A = querysatudata("SELECT * FROM produk WHERE id_produk =" . $tampil_3 . " ");
                                        echo $produk3A['nama_produk'];

                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $setdat33 = s3($tampil_itemset3, $transaksi);
                                        echo $setdat33
                                        // var_dump($unset_arr);

                                        ?>
                                    </td>
                                    <td>

                                        <?php
                                        echo $count3_A =  searchab3($unset_arr, $transaksi);
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $setdat33 / $count3_A;
                                        ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            <?php

                        // mengubah array multidimensi menjadi array single
                        $hasil_itemset3single = call_user_func_array('array_merge', $data_tampung_itemset3);

                        //menghasilkan array unique tidak duplicat
                        $hasil_itemset3unique = array_unique($tampung_itemset3single);
                    }
            ?>
            <!-- Batas Item set 2 -->
        <?php
                }
        ?>
        <!-- Batas Item set 1 -->