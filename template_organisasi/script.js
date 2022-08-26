function keluar() {
  var search = document.getElementById("search").value;
  alert(search);
  console.log(search);
}

// Pencarian produk berdasarkan stok gerai
$("#searchkeranjang").keydown(function () {
  // var keyword = $(this).val();
  var searchkeranjang = document.getElementById("searchkeranjang").value;
  var id_penjualan_gerai = document.getElementById("id_penjualan_gerai").value;
  var id_gerai = document.getElementById("id_gerai").value;
  // alert(searchkeranjang);

  $.ajax({
    type: "POST",
    url: "http://localhost/201753028/vapor/penjualan_gerai/ajax.php",
    data: {
      searchkeranjang: searchkeranjang,
      id_penjualan_gerai: id_penjualan_gerai,
      id_gerai: id_gerai
    },
    dataType: "json",
    beforeSend: function () {
      $("#hasil_cari").hide();
    },
    success: function (data) {
      //   console.log(data);
      $("#hasil_cari").show();
      $("#hasil_cari").html(data);
    },
  });
});

// Pencarian produk berdasarkan stok gerai
$("#searchkeranjang").keyup(function () {
  // var keyword = $(this).val();
  var searchkeranjang = document.getElementById("searchkeranjang").value;
  var id_penjualan_gerai = document.getElementById("id_penjualan_gerai").value;
  var id_gerai = document.getElementById("id_gerai").value;
  // alert(searchkeranjang);

  $.ajax({
    type: "POST",
    url: "http://localhost/201753028/vapor/penjualan_gerai/ajax.php",
    data: {
      searchkeranjang: searchkeranjang,
      id_penjualan_gerai: id_penjualan_gerai,
      id_gerai: id_gerai
    },
    dataType: "json",
    beforeSend: function () {
      $("#hasil_cari").hide();
    },
    success: function (data) {
      //   console.log(data);
      $("#hasil_cari").show();
      $("#hasil_cari").html(data);
    },
  });
});

$("#bayar").keyup(function () {
  $("#kembali").css("background-color", "white");
  $("#bayar").css("background-color", "white");
  var bayar = $(this).val();
  var total = $(".total_belanja").val();
  var kembali = bayar - total;
  $("#kembali").val(kembali);
  $("#bayarinput").val(bayar);
  $(".kembali").val(kembali);

  var butonbayar =  document.getElementById('butonbayar');

  if(kembali >= 0){
    butonbayar.disabled = false;
  }else{
    butonbayar.disabled = true;
  }
});

$("#bayar").on("change", function () {
  $("#kembali").css("background-color", "white");
  $("#bayar").css("background-color", "white");
  var bayar = $(this).val();
  var total = $(".total_belanja").val();
  var kembali = bayar - total;

  $("#kembali").val(kembali);
  $("#bayarinput").val(bayar);
  $(".kembali").val(kembali);
});

$(".qty").on("change", function () {
  var qty = $(this).val();
  var id_keranjang_gerai = $(this).data("id");

  var harga = "#harga" + id_keranjang_gerai;
  var jumlah_harga = "#jumlah_harga" + id_keranjang_gerai;
  $.ajax({
    type: "POST",
    url: "http://localhost/201753028/vapor/penjualan_gerai/ajax.php",
    data: {
      qty: qty,
      id_keranjang_gerai: id_keranjang_gerai,
    },
    dataType: "json",
    success: function (data) {
      //harga
      $(harga).html(data[0]);

      //jumlah harga
      $(jumlah_harga).html(data[1]);

      //total penjualan
      $("#total_belanjahtml").html(data[2]);
      $("#total_belanja").val(data[2]);
    },
    error() {
      alert("ERROR");
    },
  });
});


$(document).ready(function () {
  $("#table_id").DataTable();
});
