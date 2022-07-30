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

    /* 
    $mysqli = new mysqli("localhost","root","","201753028");

    $query = 'SELECT * FROM produk';

    // Using iterators
    $result = $mysqli->query($query);
    foreach ($result as $row) {
        printf("%s (%s)\n", $row["nama_produk"], $row["harga_produk"]);
    }
*/

    /* 
        Terdapat ada 6 Transaksi
        Dengan jenis barang berjumlah 5
*/

    $barang0 = '';
    $barang1 = 'onion';
    $barang2 = 'potato';
    $barang3 = 'burger';
    $barang4 = 'milk';
    $barang5 = 'tea';

    $barang = [$barang0, $barang1, $barang2, $barang3, $barang4, $barang5];

    $tr1    = [$barang0, $barang1, $barang2, $barang3];
    $tr2    = [$barang0, $barang2, $barang3, $barang4];
    $tr3    = [$barang0, $barang4, $barang5];
    $tr4    = [$barang0, $barang1, $barang2, $barang4];
    $tr5    = [$barang0, $barang1, $barang2, $barang3, $barang5];
    $tr6    = [$barang0, $barang1, $barang2, $barang3, $barang4];

    $transaksi_kosong = [];

    array_push($transaksi_kosong, $tr1);
    array_push($transaksi_kosong, $tr2);
    array_push($transaksi_kosong, $tr3);
    array_push($transaksi_kosong, $tr4);
    array_push($transaksi_kosong, $tr5);
    array_push($transaksi_kosong, $tr6);

    $transaksi = $transaksi_kosong;

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


    var_dump($itemset1);
    echo "</br>";
    $patern1 = $barang1;
    $supportcount1 = Search($patern1, $tr1) + Search($patern1, $tr2) + Search($patern1, $tr3) + Search($patern1, $tr4) + Search($patern1, $tr5) + Search($patern1, $tr6);

    echo  $supportcount1;
    echo "</br>";

    $patern2 = $barang2;
    $supportcount2 = Search($patern2, $tr1) + Search($patern2, $tr2) + Search($patern2, $tr3) + Search($patern2, $tr4) + Search($patern2, $tr5) + Search($patern2, $tr6);
    echo  $supportcount2;
    echo "</br>";

    $patern3 = $barang3;
    $supportcount3 = Search($patern3, $tr1) + Search($patern3, $tr2) + Search($patern3, $tr3) + Search($patern3, $tr4) + Search($patern3, $tr5) + Search($patern3, $tr6);
    echo  $supportcount3;
    echo "</br>";

    $patern4 = $barang4;
    $supportcount4 = Search($patern4, $tr1) + Search($patern4, $tr2) + Search($patern4, $tr3) + Search($patern4, $tr4) + Search($patern4, $tr5) + Search($patern4, $tr6);
    echo  $supportcount4;
    echo "</br>";

    $patern5 = $barang5;
    $supportcount5 = Search($patern5, $tr1) + Search($patern5, $tr2) + Search($patern5, $tr3) + Search($patern5, $tr4) + Search($patern5, $tr5) + Search($patern5, $tr6);
    echo  $supportcount5;
    echo "</br>";




    // $a = [
    // $tr1,
    // $tr2,
    // $tr3,
    // $tr4,
    // $tr5,
    // $tr6
    // ];
    // echo count($a);

    var_dump($transaksi);
    echo "</br>";



    $trx1 = [$barang0, "onion", "potato", "burger"];
    $xvalue = "onion";

    echo array_search($xvalue, $trx1);

    echo "</br>";

    $array = ["ram", "aakash", "saran", "mohan", "saran", "onion", "potato", "burger"];

    $value = "aakash";

    var_dump(Search($value, $array));

    $bj = 2;
    var_dump($bj);
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
                    <td>Pattern</td>
                    <td>Support count</td>
                </tr>
                <?php
                //menampung Item set-1
                $itemset1 = [];

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
                            if($supportcount > 2){
                            //membuat array assosiative pattern
                            $pattern = [$bar => $supportcount];

                            // menggabungkan pattern pada item set 1
                            array_push($itemset1, $pattern);
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

    </div>


    <div class="col-md-9">
        <br>
        <p>
        Item set-2
        </p>
        <table>
            <tr>
                <td>Pattern</td>
                <td>Support Count</td>
            </tr>

            <tr>
                <td>
                    <?php 
var_dump($itemset1);
                    ?>
                </td>
                <td>Support Count</td>
            </tr>

        </table>

    </div>
    <div class="col-md-3">  </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>