
function atur_jumlah() {
  var jumlah = document.getElementById("atur_jumlah").value;
  var harga_produk = document.getElementById("harga_produk").value;

  if (jumlah >= 3) {
    var diskon = (jumlah * harga_produk) * 0.05;
    var total_harga = (jumlah * harga_produk) - diskon;
  } else {
    var total_harga = jumlah * harga_produk;
  }

  document.getElementById("harga_keranjang").value = total_harga;
  document.getElementById("jumlah_keranjang").value = jumlah;
  document.getElementById("total_harga").innerHTML = "Total : " + rupiah(total_harga);
}


// fungsi menampilkan rupiah
function rupiah(numb){
    const format = numb.toString().split('').reverse().join('');
    const convert = format.match(/\d{1,3}/g);
    const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('') + ",00";
    return rupiah;
}

$(".banyak").on("change", function () {
    var qty = $(this).val();
    var id_keranjang = $(this).data("id");
    var id_user = $(this).data("id_user");
  
    var harga = "#harga" + id_keranjang;
    var jumlah_harga = "#jumlah_harga" + id_keranjang;

    $.ajax({
      type: "POST",
      url: "http://localhost/201753028/cart/ajax.php",
      data: {
        qty: qty,
        id_keranjang: id_keranjang,
        id_user : id_user
      },
      dataType: "json",
      success: function (data) {
        //harga
        $(harga).html(data[0]);
  
        //jumlah harga
        $(jumlah_harga).html(data[1]);
  
        //total penjualan
        $("#total_belanjahtml").html(data[2]);
        $("#total_belanja").val(data[3]);
        $("#jumlah_checkout").val(data[3]);
      },
      error() {
        alert("ERROR");
      },
    });
  });

$(document).ready(function () {});
