function keluar() {
  var search = document.getElementById("search").value;
  alert(search);
  console.log(search);
}

$("#searchkeranjang").keydown(function () {
  // var keyword = $(this).val();
  var searchkeranjang = document.getElementById("searchkeranjang").value;
  var id_penjualan_gerai = document.getElementById("id_penjualan_gerai").value;
  // alert(searchkeranjang);

  $.ajax({
    type: "POST",
    url: "http://localhost/201753028/vapor/penjualan_gerai/ajax.php",
    data: {
      searchkeranjang: searchkeranjang,
      id_penjualan_gerai: id_penjualan_gerai,
    },
    dataType: "json",
    beforeSend: function () {
      $("#hasil_cari").hide();
      // alert('1');
    },
    success: function (data) {
      //   console.log(data);
      $("#hasil_cari").show();
      $("#hasil_cari").html(data);
    },
  });
});

$("#searchkeranjang").keyup(function () {
  // var keyword = $(this).val();
  var searchkeranjang = document.getElementById("searchkeranjang").value;
  var id_penjualan_gerai = document.getElementById("id_penjualan_gerai").value;
  // alert(searchkeranjang);

  $.ajax({
    type: "POST",
    url: "http://localhost/201753028/vapor/penjualan_gerai/ajax.php",
    data: {
      searchkeranjang: searchkeranjang,
      id_penjualan_gerai: id_penjualan_gerai,
    },
    dataType: "json",
    beforeSend: function () {
      $("#hasil_cari").hide();
      // alert('1');
    },
    success: function (data) {
      //   console.log(data);
      $("#hasil_cari").show();
      $("#hasil_cari").html(data);
    },
  });
});

// aotomatis hitung bayar
$("#bayar").keydown(function () {
  $("#kembali").css("background-color", "yellow");
  $("#bayar").css("background-color", "yellow");
  var bayar = $(this).val();
  var total = $("#total_belanja").val();
  var kembali = bayar - total;
  $("#kembali").val(kembali);
  // if(bayar < total){
  // 	$("#proses_bayar").attr("disabled", true);
  // }else{
  // 	$("#proses_bayar").attr("disabled", false);
  // }
});

$("#bayar").keyup(function () {
  $("#kembali").css("background-color", "white");
  $("#bayar").css("background-color", "white");
  var bayar = $(this).val();
  var total = $("#total_belanja").val();
  var kembali = bayar - total;
  $("#kembali").val(kembali);
});

$("#bayar").on("change", function () {
  $("#kembali").css("background-color", "white");
  $("#bayar").css("background-color", "white");
  var bayar = $(this).val();
  var total = $("#total_belanja").val();
  var kembali = bayar - total;
  $("#kembali").val(kembali);
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
