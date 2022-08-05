<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <h1>Hello, world!</h1>
    <?php

include 'function.php';
    
    $mysqli = new mysqli("localhost","root","","201753028");

    $query = 'SELECT * FROM checkout';

    // Using iterators
    $result = $mysqli->query($query);

    $arraytransaksicheckout = [];
    foreach ($result as $row) {
        $trxc =  explode(",",$row["id_keranjang"]) ;

        $push_produk =[];
        array_push($push_produk, "");
        foreach($trxc as $trkp){
            $produk = querysatudata("SELECT * FROM keranjang JOIN produk ON keranjang.id_produk = produk.id_produk WHERE keranjang.id_keranjang =".$trkp." ");
            
            echo $produk['id_produk'];
            array_push($push_produk, $produk['id_produk']);
        }

        array_push($arraytransaksicheckout, $push_produk);
    

    }
    echo "</br>";
    var_dump($arraytransaksicheckout);
    // echo "</br>";

    $array_unique = call_user_func_array('array_merge', $arraytransaksicheckout);
    echo "</br>";

    $barang = array_unique($array_unique);
    

    /* 
        Terdapat ada 6 Transaksi
        Dengan jenis barang berjumlah 5
    */


    // buat 5 barang yang di beli pembeli

    $barang0 = '';
    $barang1 = 'onion';
    $barang2 = 'potato';
    $barang3 = 'burger';
    $barang4 = 'milk';
    $barang5 = 'tea';

    // buat array barang yang di beli pembeli

    // $barang = [$barang0, $barang1, $barang2, $barang3, $barang4, $barang5];

    // buat data transaksi pembeli

    $tr1    = [$barang0, $barang1, $barang2, $barang3];
    $tr2    = [$barang0, $barang2, $barang3, $barang4];
    $tr3    = [$barang0, $barang4, $barang5];
    $tr4    = [$barang0, $barang1, $barang2, $barang4];
    $tr5    = [$barang0, $barang1, $barang2, $barang3, $barang5];
    $tr6    = [$barang0, $barang1, $barang2, $barang3, $barang4];


    //  Gabungkan data transaksi pembelian

    $transaksi_kosong = [];

    array_push($transaksi_kosong, $tr1);
    array_push($transaksi_kosong, $tr2);
    array_push($transaksi_kosong, $tr3);
    array_push($transaksi_kosong, $tr4);
    array_push($transaksi_kosong, $tr5);
    array_push($transaksi_kosong, $tr6);

    $transaksi = $arraytransaksicheckout;

    $count_transaksi = count($transaksi);

    for ($row = 0; $row < $count_transaksi; $row++) {
        echo "<p><b>Row number $row</b></p>";
        echo "<ul>";

        $count_index_transaksi = count($transaksi[$row]);

        for ($col = 0; $col < $count_index_transaksi; $col++) {
            echo "<li>" . $transaksi[$row][$col] . "</li>";
        }
        echo "</ul>";
    }

    /*
    Tentukan minim nilai support
    Contoh
    Minim nilai support 50%
    Minim support = 3 (mengambil item sejumlah)

    - Item set-1	
    Pattern	Support count
    onion	4
    potato	5
    burger	4
    milk	4
    tea	2

    Menentukan peluang item sering muncul
    Item Tea dieliminasi karena tidak memenuhi nilai minimal support 3
*/

    // PHP function to illustrate the use of array_search()
    function Search($xvalue, $array)
    {

        // foreach($array as $key => $value){

        // }
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

    <div class="row">
        <div class="col-md-9"> 9 </div>
        <div class="col-md-3"> 3 </div>

        <div class="col-md-9">
            <br>
            <p>Data</p>
            <table class="table table-bordered">
                <tr>
                    <td>Transaksi</td>
                    <td>Barang</td>
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
        <div class="col-md-3">
            <br>
            <br>
            <br>

            Terdapat ada 6 Transaksi
            Dengan jenis barang berjumlah 5

            <br>
            Tentukan minim nilai support
            Contoh
            Minim nilai support 50%
            Minim support = 3 (mengambil item sejumlah)

        </div>

        <div class="col-9">
            <br>
            <p>Item set-1</p>
            <table class="table table-bordered">
                <tr>
                    <th>Pattern Itern set 1</th>
                    <th>Super Count</th>
                </tr>
                <?php
                //menampung Item set-1
                $itemset1 = [];
                $itemset1_values = [];


                foreach ($barang as $bar) {
                    if ($bar !== "") {
                ?>
                        <tr>
                            <td><?= $bar ?></td>
                            <td>
                                <?php

                                //index support count dimulai dari 0
                                $supportcount = 0;

                                for ($row = 0; $row < $count_transaksi; $row++) {
                                    //kolom support count
                                    $supportcount += Search($bar, $transaksi[$row]);
                                }
                                echo $supportcount;
                                ?>

                            </td>
                        </tr>
                        <?php

                        $nilai_minimal_support = 3;
                        if ($supportcount > 2) {
                            //membuat array multidimensi assosiative pattern
                            $pattern = [$bar => $supportcount];

                            // menggabungkan pattern pada item set 1
                            array_push($itemset1, $pattern);

                            //membuat array assosiative pattern
                            $pattern_value = [$bar];
                            array_push($itemset1_values, $pattern_value);
                        }

                        ?>

                <?php
                    }
                }
                ?>
            </table>

        </div>
        <div class="col-3">
            <br>
            <br>

            Terdapat ada 6 Transaksi
            Dengan jenis barang berjumlah 5
            <br>

            Tentukan minim nilai support
            Contoh
            Minim nilai support 50%
            Minim support = 3 (mengambil item sejumlah)

        </div>


        <div class="col-md-9">

            <br>
            <p>
                Item set-2
            </p>

            <?php

            var_dump($itemset1_values);
            echo "<br>";
            var_dump($itemset1);
            echo "<br>";

            

            $tampung_item_set = [];
            foreach ($itemset1_values as $x => $x_value) {
                echo " index = " . $x;
                foreach ($x_value as $barang => $barang_value) {
                    echo " Key= " . $barang . " value " . $barang_value;
                    echo "<br>";

                    //menambahkan value item set
                    array_push($tampung_item_set, $barang_value);
                }
            }


            //menghihitung jumlah array item set
            $count_item_set = count($tampung_item_set);

            $slice_tampung_item_set = $tampung_item_set;

            // $itemset_kebawah = $tampung_item_set;
            // // membuat item set ke bawah
            $item_set_kebawah = array_shift($slice_tampung_item_set);

            // // jumlah item set ke bawah
            // $count_item_set_kebawah = $count_item_set - 1;

            echo "<br>";

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
                    <th>Pattern Itern set 2</th>
                    <th>Super Count</th>
                </tr>
                <?php
                $tampung_itemset3 = [];
                $index_itemset = 0;
                foreach ($slice_tampung_item_set as $key => $value) {
                    echo $tampung_item_set[$key] . " ";

                    $mulai = $key + 1;
                    for ($v = $mulai; $v < $count_item_set; $v++) {

                        $count_tampung_3 = 0;
                        for ($row = 0; $row < $count_transaksi; $row++) {
                            $count_tampung_3 += searchitemset2($tampung_item_set[$key], $tampung_item_set[$v], $transaksi[$row]);
                            
                        }
                ?>
                        <tr>
                            <td><?= $tampung_item_set[$key] . ", " . $tampung_item_set[$v] ?> </td>
                            <td> <?= $count_tampung_3; ?> </td>
                        </tr>

                <?php
                        $index_itemset += 1;
                        if ($count_tampung_3 > 2) {
                     
                            $pattern_value1 = [$index_itemset => $tampung_item_set[$key]];
                            $pattern_value2 = [$index_itemset => $tampung_item_set[$v]];
                            array_push($tampung_itemset3, $pattern_value1);
                            array_push($tampung_itemset3, $pattern_value2);
                        }
                    }

                    // echo "<br>";
                }
                ?>
            </table>


            <?php
            // var_dump($tampung_itemset3);
            echo "<br>";
            echo "<br>";
            // print_r(array_unique($tampung_itemset3));
            $tampung_itemset3single = call_user_func_array('array_merge', $tampung_itemset3);
            var_dump($tampung_itemset3single);

            echo "<br>";
            echo "<br>";

            // $input = array(4, "4", "3", 4, 3, "3");
            $tampung_itemset3unique = array_unique($tampung_itemset3single);
            var_dump($tampung_itemset3unique);

            echo "<br>";
            echo "<br>";

            //menghihitung jumlah array item set
            $count_item_set = count($tampung_item_set);

            $slice_tampung_item_set = $tampung_item_set;

 
            var_dump($slice_tampung_item_set);
            echo "<br>";
            echo "<br>";

            var_dump(['2', '3', '4', '5']);

            ?>

            <?php
            echo "<br>";
            echo "<br>";
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


            $results = computePermutations($slice_tampung_item_set);
            // var_dump($results);

            $count_result = count($slice_tampung_item_set);

            for ($row = 0; $row < 4; $row++) {
                echo "<p><b>Row number $row</b></p>";
                echo "<ul>";
                for ($col = 0; $col < 3; $col++) {
                    echo "<li>" . var_dump($results[$row][$col]) . "</li>";
                }
                echo "</ul>";
            }



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

                    // $ino += 1;
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
            <table class="table" border="1">
                <tr>
                    <th>Item set-3</th>
                    <th>Super Count</th>
                </tr>
                <?php
                $data_tampung = [];
                $bs = 0;
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
                            // var_dump($dataset) ;
                            $setdat = s3($dataset, $transaksi);

                            if ($setdat > $bs) {
                                $bs = $setdat;
                                $bc = array_diff_key($dataset);
                            }

                            // array_push
                            ?>
                        </td>
                        <td><?= $setdat ?></td>
                    </tr>
                <?php
                }

                ?>

            </table>

            <?php

            // var_dump($bs);
            var_dump($bc);
            foreach ($bc as $bf) {
                echo $bf;
            }

            echo "<br>";

            $trxs = $transaksi;
            $count_trxs = count($transaksi);
            $s3 = ["onion", "potato", "burger"];
            // echo s3($s3, $trxs);
            echo "<br>";
            $arr = array(
                array(110, 20, 52),
                array(1105, 56, 89, 96),
                array(556, 89, 96)
            );

            $b = 0;
            foreach ($arr as $val) {
                foreach ($val as $key => $val1) {
                    if ($val1 > $b) {
                        $b = $val1;
                        $c = array_diff_key($val);
                    }
                }
            }
            // var_dump($c);
            // var_dump($b);


            ?>
        </div>
        <div class="col-md-3">
            Mengambil berjumlah 3 item yang memiliki peuang paling sering
            <br>
            Dan, mengeliminasi peluang support kurang dari 3

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>